<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChuyenXe;

class TripInfoController extends Controller
{
    public function show($id)
    {
        // Lấy thông tin chuyến xe theo ID
        $trip = ChuyenXe::with(['nhaXe', 'loaiXe'])->findOrFail($id);

        return view('user.trip-info', compact('trip'));
    }
}
