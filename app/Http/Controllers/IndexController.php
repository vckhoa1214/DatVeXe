<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChuyenXe;
use App\Models\NhaXe;
use App\Models\Review;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IndexController extends Controller
{
    public static function generateStarList($stars)
    {
        $str = '';
        $count = 0;
        $decPart = $stars - floor($stars);
        $intPart = (int) $stars;

        for ($i = 1; $i <= $intPart; ++$i, ++$count) {
            $str .= '<i class="bi bi-star-fill icon"></i>';
        }

        if ($decPart >= 0.25 && $decPart <= 0.5) {
            $str .= '<i class="bi bi-star-half icon"></i>';
            ++$count;
        } elseif ($decPart > 0.5) {
            $str .= '<i class="bi bi-star-fill icon"></i>';
            ++$count;
        }

        for ($i = $count; $i < 5; ++$i) {
            $str .= '<i class="bi bi-star icon"></i>';
        }

        return $str;
    }

    public static function checkMinMaxPrice($minPrice, $maxPrice)
    {
        $minPrice = (float) $minPrice;
        $maxPrice = (float) $maxPrice;

        if ($minPrice === $maxPrice) {
            return "Giá vé: " . self::formatPrice($minPrice) . "đ";
        } else {
            return "Giá vé: Từ " . self::formatPrice($minPrice) . "đ đến " . self::formatPrice($maxPrice) . "đ";
        }
    }

    private static function formatPrice($price)
    {
        return number_format($price, 0, ',', '.'); // Định dạng số theo kiểu VNĐ
    }

    public function show()
    {
        $today = Carbon::now();
        $tomorrow = $today->addDay();
        $todayDate = $tomorrow->format('d-m-Y');

        // Lấy danh sách các tỉnh khởi hành và đến
        $searchStart = ChuyenXe::select('startProvince')
            ->groupBy('startProvince')
            ->get();

        $searchEnd = ChuyenXe::select('endProvince')
            ->groupBy('endProvince')
            ->get();

        // Lấy danh sách chuyến xe phổ biến
        $chuyenxes = ChuyenXe::select(
            'startProvince',
            'endProvince',
            DB::raw('MIN(price) as min_price'),
            DB::raw('COUNT(id) as count'),
            DB::raw('MAX(price) as max_price')
        )
            ->groupBy('startProvince', 'endProvince')
            ->orderByDesc('count')
            ->limit(6)
            ->get();

        // Lấy danh sách nhà xe
        $nhaxes = NhaXe::all();

        // Lấy danh sách đánh giá với thông tin tài khoản
        $comments = Review::with('taiKhoan:id,fullName,imageAccount')
            ->orderByDesc('stars')
            ->limit(3)
            ->get();

        return view('user.index', compact('searchStart', 'searchEnd', 'chuyenxes', 'todayDate', 'nhaxes', 'comments'));
    }
}
