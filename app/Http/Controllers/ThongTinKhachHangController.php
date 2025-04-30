<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoan;
use App\Models\ChuyenXe;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class ThongTinKhachHangController extends Controller
{
    public function show($id)
    {
        $taikhoan = Auth::user();
        $chuyenxe = ChuyenXe::find($id);

        return view('user.thongtinkhachhang', [
            'taikhoan' => $taikhoan,
            'chuyenxe' => $chuyenxe,
            'id' => $id,
        ]);
    }
}
