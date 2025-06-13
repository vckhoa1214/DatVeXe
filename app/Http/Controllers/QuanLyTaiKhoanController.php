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
        $limit = 5;  // Số tài khoản mỗi trang
        $page = (int) $request->query('page', 1);
        $offset = ($page - 1) * $limit;

        $search = $request->query('search'); // Lấy từ khóa tìm kiếm

        $infoAcc = TaiKhoan::find(Session::get('user')->id);  // Thông tin tài khoản hiện tại

        if (!empty($search)) {
            // Tìm theo fullName hoặc email chứa từ khóa (case-insensitive)
            $query = TaiKhoan::where('fullName', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");

            $count = $query->count();

            $taiKhoans = $query->orderBy('id', 'ASC')
                ->offset($offset)
                ->limit($limit)
                ->get();
        } else {
            // Nếu không có từ khóa tìm kiếm thì lấy tất cả
            $count = TaiKhoan::count();

            $taiKhoans = TaiKhoan::orderBy('id', 'ASC')
                ->offset($offset)
                ->limit($limit)
                ->get();
        }

        return view('admin.quanlytaikhoan', [
            'taiKhoans' => $taiKhoans,
            'currentPage' => $page,
            'totalPage' => ceil($count / $limit),
            'infoAcc' => $infoAcc,
            'search' => $search,
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

        $taiKhoan = TaiKhoan::findOrFail($id);

        // Bỏ liên kết với các NhaXe (set managerId về null)
        NhaXe::where('managerId', $id)->update(['managerId' => null]);

        // Xóa các vé đã đặt
        foreach ($taiKhoan->veDaDat as $veDaDat) {
            $veDaDat->delete();
        }

        // Xóa các đánh giá
        foreach ($taiKhoan->reviews as $review) {
            $review->delete();
        }

        // Cuối cùng, xóa tài khoản
        $taiKhoan->delete();

        return redirect()->back()->with('success', 'Tài khoản và dữ liệu liên quan đã được xóa!');
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

