<?php

namespace App\Http\Controllers;

use App\Models\NhaXe;
use App\Models\TaiKhoan;
use App\Models\ChuyenXe;
use App\Models\VeDaDat;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class QuanLyTaiKhoanController extends Controller
{
    public function show(Request $request)
    {
        $limit = 5;  // Giới hạn số lượng tài khoản hiển thị trên mỗi trang
        $page = $request->query('page', 1);  // Trang hiện tại
        $offset = ($page - 1) * $limit;

        // Lấy danh sách tài khoản, sắp xếp theo ID và phân trang
        $taiKhoans = TaiKhoan::orderBy('id', 'ASC')->offset($offset)->limit($limit)->get();
        $count = TaiKhoan::count();  // Đếm tổng số tài khoản

        $infoAcc = TaiKhoan::find(Session::get('user')->id);  // Lấy thông tin tài khoản hiện tại

        return view('admin.quanlytaikhoan', [
            'taiKhoans' => $taiKhoans,
            'currentPage' => $page,
            'totalPage' => ceil($count / $limit),
            'infoAcc' => $infoAcc,
        ]);
    }

    public function editTaiKhoan($id)
    {
        $taiKhoan = TaiKhoan::findOrFail($id);  // Lấy tài khoản theo ID

        $infoAcc = TaiKhoan::find(Session::get('user')->id);  // Lấy thông tin tài khoản hiện tại

        return view('admin.quanlychitiettaikhoan', [
            'taiKhoan' => $taiKhoan,
            'infoAcc' => $infoAcc,
        ]);
    }

    public function updateTaiKhoan(Request $request, $id)
    {
        $taiKhoan = TaiKhoan::findOrFail($id);

        // Kiểm tra nếu password mới có thay đổi thì mới mã hóa và cập nhật
        $password = $taiKhoan->password;
        if ($request->filled('password')) {
            $password = bcrypt($request->password); // Mã hóa mật khẩu mới
        }

        // Kiểm tra nếu có ảnh mới được upload
        $imageAccount = $taiKhoan->imageAccount;
        if ($request->hasFile('imageAccount')) {
            // Xử lý upload ảnh mới
            $imageAccount = $request->file('imageAccount')->store('images', 'public');
        }

        // Cập nhật thông tin tài khoản
        $taiKhoan->fill([
            'email' => $request->email,
            'phoneNum' => $request->phoneNum,
            'fullName' => $request->fullName,
            'dob' => $request->dob,
            'isMale' => $request->isMale,
            'imageAccount' => $imageAccount,
            'isAdmin' => $request->isAdmin,
            'isVerified' => $request->isVerified,
            'isCarCompany' => $request->isCarCompany,
            'password' => $password,
        ]);

        $taiKhoan->save();

        return redirect('/dashboard/quanlytaikhoan')->with('success', 'Tài khoản đã được cập nhật!');
    }


    public function deleteTaiKhoan(Request $request)
    {
        $id = $request->id;

        // Tìm tài khoản theo ID
        $taiKhoan = TaiKhoan::findOrFail($id);

        // Xóa các vé đã đặt liên quan tới tài khoản này
        foreach ($taiKhoan->veDaDat as $veDaDat) {
            $veDaDat->delete();  // Xóa vé đã đặt
        }

        // Xóa các đánh giá (reviews) liên quan tới tài khoản này
        foreach ($taiKhoan->reviews as $review) {
            $review->delete();  // Xóa review
        }

        // Cuối cùng, xóa tài khoản
        $taiKhoan->delete();

        return redirect()->back()->with('success', 'Tài khoản và tất cả các vé, đánh giá liên quan đã được xóa!');
    }



    public function themTaiKhoan()
    {
        $infoAcc = TaiKhoan::find(Session::get('user')->id);  // Lấy thông tin tài khoản hiện tại

        return view('admin.themtaikhoan', [
            'infoAcc' => $infoAcc,
        ]);
    }

    public function addTaiKhoan(Request $request)
    {
        // Kiểm tra nếu có ảnh được upload
        $imageAccount = '/images/default.jpg';  // Giá trị mặc định
        if ($request->hasFile('imageAccount')) {
            // Lưu ảnh nếu có được upload
            $imageAccount = $request->file('imageAccount')->store('images', 'public');
        }

        // Tạo tài khoản mới
        TaiKhoan::create([
            'email' => $request->email,
            'password' => bcrypt($request->password), // Mã hóa mật khẩu
            'phoneNum' => $request->phoneNum,
            'fullName' => $request->fullName,
            'dob' => $request->dob,
            'isMale' => $request->isMale,
            'imageAccount' => $imageAccount, // Sử dụng giá trị ảnh (mặc định hoặc upload)
            'isAdmin' => $request->isAdmin,
            'isVerified' => $request->isVerified,
            'isCarCompany' => $request->isCarCompany,
            'createdAt' => now(),
            'updatedAt' => now(),
        ]);

        return redirect('/dashboard/quanlytaikhoan')->with('success', 'Tài khoản mới đã được tạo!');
    }

}

