<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChuyenXe;
use App\Models\NhaXe;
use App\Models\LoaiXe;
use Carbon\Carbon;

class SearchTripController extends Controller
{
    public function show(Request $request)
    {
        $sort       = $request->query('sort', 'earliest');
        $minPrice   = (int) $request->query('min', 0);
        $maxPrice   = (int) $request->query('max', 2000000);
        $page       = max((int) $request->query('page', 1), 1);
        $limit      = 3;
        $offset     = ($page - 1) * $limit;

        $orders = [
            'earliest'  => ['startTime', 'asc'],
            'latest'    => ['startTime', 'desc'],
            'cheapest'  => ['price', 'asc'],
            'expensive' => ['price', 'desc'],
        ];

        // Truy vấn cơ bản
        $query = ChuyenXe::with(['nhaXe.reviews', 'loaiXe'])->where('numSeats', '>', 0);

        if ($request->filled(['start', 'end'])) {
            $start = strtolower($request->query('start'));  // Chuyển start về chữ thường
            $end = strtolower($request->query('end'));      // Chuyển end về chữ thường

            // Kiểm tra xem start có trong routeProvinces và end là endProvince
            $query->where(function ($query) use ($start, $end) {
                // So sánh startProvince và endProvince
                $query->whereRaw('LOWER(startProvince) = ?', [$start])
                    ->whereRaw('LOWER(endProvince) = ?', [$end]);

                // Kiểm tra ngược lại: start là 1 tỉnh trong routeProvinces và end là endProvince
                $query->orWhere(function ($query) use ($start, $end) {
                    $query->whereRaw('LOWER(endProvince) = ?', [$end])
                        ->whereRaw('JSON_CONTAINS(LOWER(routeProvinces), ?)', [json_encode([$start])]);
                });

                // Kiểm tra ngược lại: end là 1 tỉnh trong routeProvinces và start là startProvince
                $query->orWhere(function ($query) use ($start, $end) {
                    $query->whereRaw('LOWER(startProvince) = ?', [$start])
                        ->whereRaw('JSON_CONTAINS(LOWER(routeProvinces), ?)', [json_encode([$end])]);
                });
            });
        }

        // Các điều kiện lọc khác như ngày, giá, nhà xe, v.v. ...
        if ($request->filled('date') && $request->query('date') !== 'all') {
            try {
                $startDate = Carbon::createFromFormat('d-m-Y', $request->query('date'))->format('Y-m-d');
                $query->where('startDate', $startDate);

                if ($startDate == Carbon::now()->format('Y-m-d')) {
                    $query->where('startTime', '>=', Carbon::now()->format('H:i'));
                }
            } catch (\Exception $e) {
                return back()->withErrors(['date' => 'Định dạng ngày không hợp lệ']);
            }
        }

        if ($request->filled('min') && $request->filled('max')) {
            $minPrice = (float) $request->query('min');
            $maxPrice = (float) $request->query('max');

            if ($minPrice >= 50000 && $maxPrice <= 1000000 && $minPrice <= $maxPrice) {
                $query->whereBetween('price', [$minPrice, $maxPrice]);
            }
        }

        if ($request->filled('nhaxe')) {
            $nhaxeIds = is_array($request->query('nhaxe')) ? $request->query('nhaxe') : explode(',', $request->query('nhaxe'));
            $query->whereIn('carId', $nhaxeIds);
        }

        if (isset($orders[$sort])) {
            [$column, $direction] = $orders[$sort];
            $query->orderBy($column, $direction);
        }

        // Đếm tổng kết quả
        $totalChuyenXe = $query->count();
        $totalPages = ceil($totalChuyenXe / $limit);

        // Lấy dữ liệu phân trang
        $chuyenxes = $query->skip($offset)->take($limit)->get();

        // Tính sao trung bình
        foreach ($chuyenxes as $chuyenxe) {
            $reviews = $chuyenxe->nhaXe->reviews ?? collect();
            $avgStars = $reviews->avg('stars') ?? 0;
            $chuyenxe->nhaXe_avgStars = round($avgStars, 1);
        }

        // Dữ liệu phụ cho view
        $nhaxes     = NhaXe::select('id', 'name')->get();
        $loaixes    = LoaiXe::select('id', 'name')->get();
        $searchStart = ChuyenXe::select('startProvince')->distinct()->pluck('startProvince');
        $searchEnd   = ChuyenXe::select('endProvince')->distinct()->pluck('endProvince');

        return view('user.search-trip', compact(
            'chuyenxes',
            'nhaxes',
            'loaixes',
            'searchStart',
            'searchEnd',
            'page',
            'totalPages'
        ))->with([
            'currentPage' => $page,
            'totalPage' => $totalPages,
            'requestParams' => $request->except('page'),
        ]);
    }

}
