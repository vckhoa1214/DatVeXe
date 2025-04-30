<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoan;
use App\Models\ChuyenXe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class XacNhanController extends Controller
{
    public function show($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors(['message' => 'Vui lòng đăng nhập để tiếp tục!']);
        }
        $taikhoan = Auth::user();
        $chuyenxe = ChuyenXe::find($id);

        return view('user.xacnhan', [
            'taikhoan' => $taikhoan,
            'chuyenxe' => $chuyenxe
        ]);
    }
}
