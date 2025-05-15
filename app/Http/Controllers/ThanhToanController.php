<?php

namespace App\Http\Controllers;


use App\Models\TaiKhoan;
use App\Models\ChuyenXe;
use App\Models\NhaXe;
use App\Models\LoaiXe;
use App\Models\VeDaDat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketConfirmationMail;
use Carbon\Carbon;
use PayPal\Api\{Amount, Item, ItemList, Payer, Payment, PaymentExecution, RedirectUrls, Transaction};
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use Illuminate\Support\Facades\Auth;

class ThanhToanController extends Controller
{
    private $apiContext;
    private $totalprice;
    private $idTicket;

    public function __construct()
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                'AbQ_o3F6yI33YZWfjbuRJqHQvNpLv5C3kfCVdyRU4qwOanWzDxUniQ6199h8RUsM5aM0UI0WV_v8uSXO',
                'EBAlh_qzZV9mWs7ugc1odynzp8ICFDP-DZkipDHV2K6pps5Ht5H6lDtwIJVj_xar0m3CUL4vvhDc60od'
            )
        );

        $this->apiContext->setConfig([
            'mode' => 'sandbox'
        ]);
    }

    public function show(Request $request, $id)
    {
        $chuyenxe = ChuyenXe::with(['nhaXe', 'nhaXe.manager'])->findOrFail($id);
        $taikhoan = Auth::user();

        // Lấy các ghế đã được đặt
        $reservedSeatsRaw = VeDaDat::where('jourId', $id)->pluck('seatCodes')->toArray();

        $reservedSeats = [];
        foreach ($reservedSeatsRaw as $seatCode) {
            $decoded = json_decode($seatCode, true);
            if (is_array($decoded)) {
                $reservedSeats = array_merge($reservedSeats, $decoded);
            } else {
                $reservedSeats[] = $seatCode;
            }
        }

        // Tạo danh sách tất cả các ghế dựa vào loại xe
        $loaiXe = LoaiXe::find($chuyenxe->cateCarId);
        $totalSeats = $chuyenxe->totalNumSeats;

        $allSeats = [];

        if ($loaiXe && $loaiXe->name === 'Ghế ngồi') {
            // Ví dụ: A1 → A45
            $allSeats = array_map(fn($i) => 'A' . $i, range(1, $totalSeats));
        } else {
            // Giường nằm 2 tầng: A1 → A(half), B1 → B(half)
            $half = intval($totalSeats / 2);
            $allSeats = array_merge(
                array_map(fn($i) => 'A' . $i, range(1, $half)),
                array_map(fn($i) => 'B' . $i, range(1, $half))
            );
        }

        return view('user.thanhtoan', [
            'name' => $request->query('name'),
            'phone' => $request->query('phone'),
            'email' => $request->query('email'),
            'ticket' => $request->query('ticket'),
            'type' => $request->query('card'),
            'payment' => $request->query('card') === 'Paypal',
            'chuyenxe' => $chuyenxe,
            'taikhoan' => $taikhoan,
            'allSeats' => $allSeats,
            'reservedSeats' => $reservedSeats,
            'loaiXe' => $loaiXe
        ]);
    }

    public function payment(Request $request, $id)
    {
        // Bước 1: Xử lý và chuyển đổi tiền tệ
        $unitPriceRaw = (float) preg_replace('/[^0-9]/', '', $request->price);
        $quantity = (int) $request->ticket;
        $conversionRate = 0.000042;

        $unitPriceFloat = round($unitPriceRaw * $conversionRate, 2);
        $totalPriceFloat = round($unitPriceFloat * $quantity, 2);

        $unitPrice = number_format($unitPriceFloat, 2, '.', '');
        $totalPrice = number_format($totalPriceFloat, 2, '.', '');

        // Bước 2: Lưu vào session để xử lý sau khi thanh toán thành công
        session([
            'ticket_data' => [
                'quantity' => $quantity,
                'unit_price' => $unitPrice,
                'total_price' => $totalPrice,
                'phone' => $request->phone,
                'email' => $request->email,
                'name' => $request->name,
                'tuyenduong' => $request->tuyenduong,
                'seatCodes' => $request->seatCodes,  // Lưu seatCodes đã chọn
            ]
        ]);

        // Bước 3: Tạo thông tin PayPal
        $item = new \PayPal\Api\Item();
        $item->setName('Vé chặng ' . $request->tuyenduong)
            ->setCurrency('USD')
            ->setQuantity($quantity)
            ->setSku('TICKET_' . $id)
            ->setPrice($unitPrice);

        $itemList = new \PayPal\Api\ItemList();
        $itemList->setItems([$item]);

        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod("paypal");

        $amount = new \PayPal\Api\Amount();
        $amount->setCurrency("USD")->setTotal($totalPrice);

        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Thanh toán vé xe khách");

        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl(route('paypal.success', ['id' => $id]))
            ->setCancelUrl(route('paypal.cancel', ['id' => $id]));

        $payment = new \PayPal\Api\Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions([$transaction]);

        try {
            $payment->create($this->apiContext);
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()]);
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() === 'approval_url') {
                return redirect()->away($link->getHref());
            }
        }

        return redirect()->route('paypal.cancel', ['id' => $id]);
    }


    public function success(Request $request, $id)
    {
        // Nhận dữ liệu thanh toán
        $paymentId = $request->query('paymentId');
        $payerId = $request->query('PayerID');

        $payment = \PayPal\Api\Payment::get($paymentId, $this->apiContext);
        $execution = new \PayPal\Api\PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            $result = $payment->execute($execution, $this->apiContext);

            if ($result->getState() === 'approved') {
                $data = session('ticket_data');

                if (!$data) {
                    return redirect()->route('paypal.cancel', ['id' => $id]);
                }

                // Lưu vé
                $ve = \App\Models\VeDaDat::create([
                    'numSeats' => $data['quantity'],
                    'statusTicket' => 'Đã thanh toán',
                    'phoneNum' => $data['phone'],
                    'email' => $data['email'],
                    'jourId' => $id,
                    'accId' => auth()->id(),
                    'fullName' => $data['name'],
                    'createdAt' => \Carbon\Carbon::now(),
                    'updatedAt' => \Carbon\Carbon::now(),
                ]);

                // Lưu seatCodes từ dữ liệu đã chọn
                $ve->seatCodes = json_encode($data['seatCodes']);
                $ve->save();

                // Giảm số ghế còn lại
                $chuyenxe = \App\Models\ChuyenXe::findOrFail($id);
                $numSeatsRemaining = $chuyenxe->numSeats - $data['quantity'];

                $chuyenxe->update([
                    'numSeats' => $numSeatsRemaining
                ]);

                // Xoá session
                session()->forget('ticket_data');

                // Gửi email thông tin vé cho người dùng
                Mail::to($data['email'])->send(new TicketConfirmationMail($ve, $data['seatCodes'], $chuyenxe));

                return view('user.thanhcong', compact('ve'));
            }
        } catch (\Exception $e) {
            return redirect()->route('paypal.cancel', ['id' => $id]);
        }

        return redirect()->route('paypal.cancel', ['id' => $id]);
    }

    public function cancel($id)
    {
        // Xoá dữ liệu vé đã lưu tạm nếu huỷ thanh toán
        session()->forget('ticket_data');

        return view('user.thatbai');
    }

    public function paymentCOD(Request $request, $id)
    {
        $ve = VeDaDat::create([
            'numSeats' => $request->ticket,
            'statusTicket' => 'Vừa đặt',
            'phoneNum' => $request->phone,
            'email' => $request->email,
            'jourId' => $id,
            'accId' => Auth::id(),
            'fullName' => $request->name,
            'createdAt' => Carbon::now(),
            'updatedAt' => Carbon::now(),
        ]);

        // Lưu seatCodes từ dữ liệu đã chọn
        $seatCodes = $request->seatCodes;
        $ve->seatCodes = json_encode($seatCodes);
        $ve->save();

        // Giảm số ghế còn lại
        $chuyenxe = \App\Models\ChuyenXe::findOrFail($id);
        $numSeatsRemaining = $chuyenxe->numSeats - $request->ticket;

        $chuyenxe->update([
            'numSeats' => $numSeatsRemaining
        ]);

        // Gửi email thông tin vé cho người dùng
        Mail::to($request->email)->send(new TicketConfirmationMail($ve, $seatCodes, $chuyenxe));

        return view('user.thanhcong', [
            've' => $ve,
            'book' => true
        ]);
    }


    public function handlePayment(Request $request, $id)
    {
        if ($request->card === 'Paypal') {
            return $this->payment($request, $id);
        } else {
            return $this->paymentCOD($request, $id);
        }
    }

}
