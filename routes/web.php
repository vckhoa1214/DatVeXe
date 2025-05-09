<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NhaXeController;
use App\Http\Controllers\SearchTripController;
use App\Http\Controllers\TripInfoController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\ThanhToanController;
use App\Http\Controllers\XacNhanController;
use App\Http\Controllers\ThongTinKhachHangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuanLyNhaXeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\QuanLyTaiKhoanController;

// Home
Route::get('/', [IndexController::class, 'show'])->name('home');
//About
Route::get('/about', [AboutController::class, 'showAbout']);


// Nhóm route cho nhà xe
Route::prefix('nha-xe')->group(function () {
    Route::get('/', [NhaXeController::class, 'index'])->name('nhaxe.index');
    Route::get('/{id}', [NhaXeController::class, 'showDetails'])->name('nhaxe.showDetails');
    Route::post('/{id}/rating', [NhaXeController::class, 'rating'])->name('nhaxe.rating');
});

// Search trip
Route::get('/search-trip', [SearchTripController::class, 'show'])->name('search-trip');
Route::get('/trip-info/{id}', [TripInfoController::class, 'show'])->name('trip-info');

// Nhóm route dành cho khách (chưa đăng nhập)
Route::middleware('guest')->group(function () {
    Route::get('/users/login', [UserController::class, 'showLoginForm'])->name('login');
    Route::post('/users/login', [UserController::class, 'login'])->name('login.post');

    Route::get('/users/register', [UserController::class, 'showRegisterForm'])->name('register');
    Route::post('users/register', [UserController::class, 'register'])->name('register.post');

    Route::get('/users/verify', [UserController::class, 'verifyUserByLink'])->name('user.verify');

    Route::get('/users/reset-password', [UserController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/users/reset-password', [UserController::class, 'resetPasswordSendEmail'])->name('password.email');
    Route::get('/users/reset-password-form', [UserController::class, 'showResetPasswordForm'])->name('password.reset.form');
    Route::post('/users/update-password', [UserController::class, 'updatePassword'])->name('password.updated');

    Route::get('/users/reset', [UserController::class, 'getLinkResetPassword'])->name('password.reset');
    Route::post('/users/reset', [UserController::class, 'resetPasswordAccount'])->name('password.update');
});


// Nhóm route dành cho người dùng đã đăng nhập
Route::middleware('auth')->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

// Nhóm route yêu cầu đăng nhập
Route::middleware(['auth'])->group(function () {
    // Hiển thị trang cập nhật mật khẩu
    Route::get('/tai-khoan/cap-nhat-mat-khau', [TaiKhoanController::class, 'showUpdatePassword'])->name('tai-khoan.show-update-password');
    // Cập nhật mật khẩu
    Route::post('/tai-khoan/cap-nhat-mat-khau', [TaiKhoanController::class, 'updatePassword'])->name('tai-khoan.update-password');
    // Hiển thị thông tin tài khoản
    Route::get('/tai-khoan/thong-tin', [TaiKhoanController::class, 'showInfoAcc'])->name('tai-khoan.show-info');
    // Cập nhật thông tin tài khoản
    Route::post('/tai-khoan/cap-nhat-thong-tin', [TaiKhoanController::class, 'updateInfoAcc'])->name('tai-khoan.update-info');
    // Hiển thị lịch sử vé (trang "Vé của tôi")
    Route::get('/tai-khoan/ve-cua-toi', [TaiKhoanController::class, 'showMyTicket'])->name('tai-khoan.ve-cua-toi');
    // Xem chi tiết vé
    Route::get('/tai-khoan/ve-cua-toi/{id}', [TaiKhoanController::class, 'showDetailsTicket'])
        ->name('tai-khoan.ve-chi-tiet');
    // Hủy vé
    Route::post('/tai-khoan/huy-ve', [TaiKhoanController::class, 'cancelTicket'])->name('tai-khoan.huy-ve');

    // Route gửi đánh giá
    Route::post('/danh-gia', [ReviewController::class, 'store'])->name('danhgia.store');
});



Route::middleware(['auth'])->group(function () {
    // Hiển thị trang thanh toán
    Route::get('/search-trip/{id}/thanh-toan/thanhtoan', [ThanhToanController::class, 'show'])->name('thanhtoan');
    Route::post('/search-trip/{id}/thanh-toan/thanhtoan', [ThanhToanController::class, 'handlePayment'])->name('thanhtoan.post');

    // Thông tin khách hàng
    Route::get('/search-trip/{id}/thanh-toan/thongtinkhachhang', [ThongTinKhachHangController::class, 'show'])->name('thongtinkhachhang');

    // Xác nhận
    Route::get('/search-trip/{id}/thanh-toan/xacnhan', [XacNhanController::class, 'show'])->name('xacnhan');
    // Thanh toán Paypal
    Route::post('/search-trip/{id}/thanh-toan/paypal', [ThanhToanController::class, 'payment'])->name('paypal.payment');
    Route::get('/search-trip/{id}/thanh-toan/paypal/success', [ThanhToanController::class, 'success'])->name('paypal.success');
    Route::get('/search-trip/{id}/thanh-toan/paypal/cancel', [ThanhToanController::class, 'cancel'])->name('paypal.cancel');

    // Thanh toán COD
    Route::post('/search-trip/{id}/thanh-toan/cod', [ThanhToanController::class, 'paymentCOD'])->name('cod.payment');
});


//Nhóm route cho quản lý dashboard
Route::prefix('dashboard')->group(function () {
    // Trang đăng nhập
    Route::get('/login', function () {
        return view('admin.loginAdmin');
    })->name('dashboard.login');

    // Xử lý đăng nhập
    Route::post('/login', [DashboardController::class, 'loginAdmin']);

    // Nhóm route cho các trang yêu cầu người dùng đã đăng nhập
    Route::middleware('check.admin.login')->group(function () {
        Route::get('/', [DashboardController::class, 'show'])->name('dashboard');

        // Đăng xuất
        Route::post('/logout', [DashboardController::class, 'logoutAdmin'])->name('dashboard.logout');

        // Quản lý vé
        Route::get('/quanlyve', [DashboardController::class, 'showTicket'])->name('dashboard.quanlyve');
        Route::get('/quanlyve/chitietve/{id}', [DashboardController::class, 'showDetailTicket'])->name('dashboard.chitietve');
        Route::post('/quanlyve/capnhat/{id}', [DashboardController::class, 'updateStatusTicket'])->name('dashboard.capnhatve');
        Route::post('/quanlyve/xoa', [DashboardController::class, 'deleteTicket'])->name('dashboard.xoave');

        // Quản lý chuyến xe
        Route::get('/quanlychuyenxe', [DashboardController::class, 'showChuyenXe'])->name('dashboard.quanlychuyenxe');
        Route::post('/quanlychuyenxe/feature', [DashboardController::class, 'featureChuyenXe'])->name('dashboard.featureChuyenxe');
        Route::get('/quanlychuyenxe/chinhsua/{id}', [DashboardController::class, 'editChuyenXe'])->name('dashboard.suachuyenxe');
        Route::post('/quanlychuyenxe/capnhat/{id}', [DashboardController::class, 'updateChuyenXe'])->name('dashboard.capnhatchuyenxe');

        // Thêm chuyến xe
        Route::get('/themchuyenxe', [DashboardController::class, 'themChuyenXe'])->name('dashboard.themchuyenxe');
        Route::post('/themchuyenxe', [DashboardController::class, 'addChuyenXe'])->name('dashboard.themchuyenxe.submit');

        // Quản lý nhà xe
        Route::get('/quanlynhaxe', [QuanLyNhaXeController::class, 'show'])->name('dashboard.quanlynhaxe');
        Route::get('/quanlynhaxe/themnhaxe', [QuanLyNhaXeController::class, 'themNhaXe'])->name('dashboard.themnhaxe');
        Route::post('/quanlynhaxe/themnhaxe', [QuanLyNhaXeController::class, 'addNhaXe'])->name('dashboard.themnhaxe.submit');
        Route::get('/quanlynhaxe/chinhsua/{id}', [QuanLyNhaXeController::class, 'editNhaXe'])->name('dashboard.suanhaxe');
        Route::post('/quanlynhaxe/capnhat/{id}', [QuanLyNhaXeController::class, 'updateNhaXe'])->name('dashboard.capnhatnhaxe');
        Route::post('/quanlynhaxe/xoa', [QuanLyNhaXeController::class, 'deleteNhaXe'])->name('dashboard.xoanhaxe');

        // Quản lý tài khoản
        Route::get('/quanlytaikhoan', [QuanLyTaiKhoanController::class, 'show'])->name('dashboard.quanlytaikhoan');
        Route::get('/quanlytaikhoan/chitiet/{id}', [QuanLyTaiKhoanController::class, 'editTaiKhoan'])->name('dashboard.suataikhoan');
        Route::post('/quanlytaikhoan/capnhat/{id}', [QuanLyTaiKhoanController::class, 'updateTaiKhoan'])->name('dashboard.capnhattaikhoan');
        Route::post('/quanlytaikhoan/xoa', [QuanLyTaiKhoanController::class, 'deleteTaiKhoan'])->name('dashboard.xoataikhoan');
        Route::get('/quanlytaikhoan/them', [QuanLyTaiKhoanController::class, 'themTaiKhoan'])->name('dashboard.themtaikhoan');
        Route::post('/quanlytaikhoan/them', [QuanLyTaiKhoanController::class, 'addTaiKhoan'])->name('dashboard.themtaikhoan.submit');
    });
});

