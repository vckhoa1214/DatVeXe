<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'carId' => 'required|integer',
            'accId' => 'required|integer',
            'stars' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
            'veId' => 'required|integer',  // Validate veId
        ]);

        // Kiểm tra nếu đã có đánh giá cho vé cụ thể này
        $review = Review::where('carId', $validated['carId'])
            ->where('accId', $validated['accId'])
            ->where('veId', $validated['veId']) // Kiểm tra theo veId
            ->first();

        if ($review) {
            // Nếu đã có đánh giá, cập nhật lại
            $review->update([
                'stars' => $validated['stars'],
                'comment' => $validated['comment'],
                'updatedAt' => now(),
            ]);
        } else {
            // Nếu chưa có đánh giá, tạo mới
            $review = Review::create([
                'carId' => $validated['carId'],
                'accId' => $validated['accId'],
                'veId' => $validated['veId'],  // Lưu veId vào bảng Review
                'stars' => $validated['stars'],
                'comment' => $validated['comment'],
                'createdAt' => now(),
                'updatedAt' => now(),
            ]);
        }

        return redirect()->back()->with('success', 'Đánh giá của bạn đã được lưu!');
    }

}

