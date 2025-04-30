<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\TaiKhoan;
use App\Models\VeDaDat;
use App\Models\ChuyenXe;
use App\Models\NhaXe;
use Carbon\Carbon;


class TaiKhoanController extends Controller
{
    // Hiển thị trang cập nhật mật khẩu
    public function showUpdatePassword()
    {
        $infoAcc = Auth::user();
        return view('user.updatePassword', compact('infoAcc'));
    }

    // Cập nhật mật khẩu
    public function updatePassword(Request $request)
    {
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:6',
            'confirmNewPassword' => 'required|same:newPassword'
        ]);

        $user = Auth::user();

        if (Hash::check($request->oldPassword, $user->password)) {
            $user->update(['password' => Hash::make($request->newPassword)]);
            return redirect()->back()->with(['message' => 'Đổi mật khẩu thành công', 'type' => 'alert-success']);
        } else {
            return redirect()->back()->with(['message' => 'Mật khẩu hiện tại bạn nhập sai. Vui lòng nhập lại !!!', 'type' => 'alert-danger']);
        }
    }


    // Hiển thị thông tin tài khoản người dùng
    public function showInfoAcc()
    {
        $infoAcc = Auth::user();
        return view('user.infoTaiKhoan', compact('infoAcc'));
    }

    public function updateInfoAcc(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->back()->with('error', 'Bạn cần đăng nhập để cập nhật thông tin!');
        }

        // Validate dữ liệu
        $request->validate([
            'fullName' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phoneNum' => 'required',
            'dob' => 'required|date',
            'sex' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Nếu có file ảnh mới
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = public_path('images/avatar');

            // Xóa ảnh cũ nếu có
            if ($user->imageAccount && file_exists(public_path($user->imageAccount)) && basename($user->imageAccount) != 'default.jpg')
            {
                unlink(public_path($user->imageAccount));
            }

            // Lưu ảnh vào thư mục public/images/avatar
            $file->move($filePath, $fileName);
            $user->imageAccount = 'images/avatar/' . $fileName;
        }

        // Cập nhật thông tin tài khoản
        $user->update([
            'fullName' => $request->fullName,
            'email' => $request->email,
            'phoneNum' => $request->phoneNum,
            'dob' => $request->dob,
            'isMale' => $request->sex === 'Nam',
        ]);

        $user->save(); // Lưu thay đổi

        return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
    }


    public function showMyTicket(Request $request)
    {
        $accId = Auth::id();
        $statusTicket = $request->query('statusTicket');

        // Cờ trạng thái
        $statusVuaDat = $statusTicket === 'Vừa đặt';
        $statusThanhToan = $statusTicket === 'Đã thanh toán';
        $statusDaHuy = $statusTicket === 'Đã hủy';

        $infoAcc = TaiKhoan::find($accId);

        // Phân trang thủ công
        $limit = 3;
        $page = $request->query('page', 1);
        $offset = ($page - 1) * $limit;

        // Query gốc
        $query = VeDaDat::where('accId', $accId)->with(['chuyenXe.nhaXe']);

        if ($statusTicket) {
            $query->where('statusTicket', $statusTicket);
        }

        $count = $query->count(); // Đếm tổng số vé theo bộ lọc
        $veDaDat = $query->offset($offset)->limit($limit)->get(); // Lấy vé phân trang

        return view('user.myTicket', [
            'veDaDat' => $veDaDat,
            'statusVuaDat' => $statusVuaDat,
            'statusThanhToan' => $statusThanhToan,
            'statusDaHuy' => $statusDaHuy,
            'infoAcc' => $infoAcc,
            'currentPage' => $page,
            'totalPage' => ceil($count / $limit),
            'statusTicket' => $statusTicket,
        ]);
    }

    public function showDetailsTicket($ticketId)
    {
        // Lấy ID người dùng từ session (Auth)
        $accId = Auth::id();

        // Lấy ngày hiện tại
        $today = Carbon::now()->format('Y-m-d'); // Định dạng chuẩn Y-m-d để so sánh ngày

        // Lấy thông tin tài khoản và vé đã đặt
        $infoAcc = TaiKhoan::where('id', $accId)
            ->with([
                'veDaDat' => function ($query) use ($ticketId) {
                    $query->where('id', $ticketId)
                        ->with(['chuyenXe.nhaXe']);
                }
            ])->first();

        // Lấy thông tin vé và chuyến xe

        $veDaDat = VeDaDat::where('id', $ticketId)->with(['chuyenXe.nhaXe'])->first();
        if (!$veDaDat) {
            return redirect()->back()->with('error', 'Không tìm thấy vé!');
        }

        // Kiểm tra chuyến xe của vé
        $chuyenXe = ChuyenXe::where('id', $veDaDat->jourId)->first();

        // Kiểm tra nếu không tìm thấy chuyến xe
        if (!$chuyenXe) {
            return redirect()->back()->with('error', 'Không tìm thấy chuyến xe!');
        }
        return view('user.xemChiTietVe', compact('infoAcc', 'veDaDat'));
    }



    public function cancelTicket(Request $request)
    {
        $ticketId = $request->input('id');
        $accId = Auth::id();
        $today = Carbon::now()->format('Y-m-d');

        $veDaDat = VeDaDat::find($ticketId);
        if (!$veDaDat) {
            return redirect()->back()->with('error', 'Không tìm thấy vé!');
        }

        $chuyenXe = ChuyenXe::find($veDaDat->jourId);
        if (!$chuyenXe) {
            return redirect()->back()->with('error', 'Không tìm thấy chuyến xe!');
        }

        // Kiểm tra nếu ngày hiện tại đã vượt quá ngày khởi hành => Không thể hủy
        if ($today > $chuyenXe->startDate) {
            return redirect()->back()->with('error', 'Vé không thể hủy vì chuyến xe đã khởi hành!');
        }

        // Cập nhật trạng thái vé
        $veDaDat->update(['statusTicket' => 'Đã hủy']);

        // Cập nhật số ghế còn lại
        $chuyenXe->increment('numSeats', $veDaDat->numSeats);

        return redirect()->back()->with('success', 'Hủy vé thành công!');
    }

}
