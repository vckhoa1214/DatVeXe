<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaXe;
use App\Models\Review;
use App\Models\TaiKhoan;
use App\Helpers\Helper;


class NhaXeController extends Controller
{
    public function index(Request $request)
    {
        $limit = 4;
        $page = $request->query('page', 1);
        $offset = ($page - 1) * $limit;

        // Lấy danh sách nhà xe cùng với review
        $nhaxeList = NhaXe::with('reviews')->offset($offset)->limit($limit)->get();

        // Tính số sao trung bình cho từng nhà xe
        foreach ($nhaxeList as $nhaxe) {
            $numOfComments = $nhaxe->reviews->count();
            $stars = $numOfComments > 0 ? round($nhaxe->reviews->avg('stars'), 1) : 0;
            $nhaxe->stars = $stars; // Không cần `update()`, tránh lỗi `updated_at`
        }

        $count = NhaXe::count();
        $totalPage = ceil($count / $limit);

        $nhaxePagination = [
            'previousPage' => max($page - 1, 1),
            'nextPage' => min($page + 1, $totalPage),
            'page' => $page,
            'totalPage' => $totalPage
        ];

        return view('user.nhaxe', [
            'carCom' => $nhaxeList,
            'nhaxePagination' => $nhaxePagination
        ]);
    }

    public function showDetails($id, Request $request)
    {
        $starFilter = $request->query('star', 0);
        $page = $request->query('page', 1);
        $limit = 2;
        $offset = ($page - 1) * $limit;

        $chiTietNhaXe = NhaXe::with('reviews')->where('id', $id)->firstOrFail();

        $reviewQuery = Review::where('carId', $id)->with('taiKhoan')->orderBy('id', 'DESC');

        if ($starFilter >= 1 && $starFilter <= 5) {
            $reviewQuery->whereBetween('stars', [$starFilter, $starFilter + 1]);
        }

        $totalReviews = $reviewQuery->count();
        $reviews = $reviewQuery->offset($offset)->limit($limit)->get();

        $totalPage = ceil($totalReviews / $limit);

        $reviewPagination = [
            'page' => $page,
            'previousPage' => max($page - 1, 1),
            'nextPage' => min($page + 1, $totalPage),
            'reviewStarFilter' => $starFilter,
            'totalPage' => $totalPage
        ];

        return view('user.chi_tiet_nha_xe', compact('chiTietNhaXe', 'reviews', 'reviewPagination'));
    }

    public function rating(Request $request, $id)
    {
        $review = new Review();
        $review->car_id = $id;
        $review->stars = $request->input('star');
        $review->comment = $request->input('cmt');
        $review->acc_id = session('user.id');
        $review->save();

        // Cập nhật lại số sao trung bình của nhà xe
        $nhaxe = NhaXe::with('reviews')->where('id', $id)->firstOrFail();
        $nhaxe->stars = round($nhaxe->reviews->avg('stars'), 1);
        $nhaxe->save();

        return redirect()->route('nhaxe.showDetails', ['id' => $id, '#review-section']);
    }
}
