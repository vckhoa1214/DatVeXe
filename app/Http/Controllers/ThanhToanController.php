<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoan;
use App\Models\ChuyenXe;
use App\Models\NhaXe;
use App\Models\VeDaDat;
use Illuminate\Http\Request;
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
        $chuyenxe = ChuyenXe::with('nhaXe')->findOrFail($id);
        $taikhoan = Auth::user();

        return view('user.thanhtoan', [
            'name' => $request->query('name'),
            'phone' => $request->query('phone'),
            'email' => $request->query('email'),
            'ticket' => $request->query('ticket'),
            'type' => $request->query('card'),
            'payment' => $request->query('card') === 'Paypal',
            'chuyenxe' => $chuyenxe,
            'taikhoan' => $taikhoan
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

                // Trừ ghế
                $chuyenxe = \App\Models\ChuyenXe::findOrFail($id);
                $chuyenxe->decrement('numSeats', $data['quantity']);

                // Xoá session
                session()->forget('ticket_data');

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

        $chuyenxe = ChuyenXe::findOrFail($id);
        $chuyenxe->update([
            'numSeats' => $chuyenxe->numSeats - $request->ticket
        ]);

        return view('user.thanhcong');
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
