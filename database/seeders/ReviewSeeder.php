<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('reviews')->insert([
            [
                'stars' => 3,
                'comment' => 'Chất lượng phục vụ khá tốt, tuy nhiên suốt dọc đường xe rung lắc khá nhiều làm cho tôi cảm thấy khó chịu',
                'carId' => 1,
                'accId' => 1,
                'veId' => 1,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
            ],
            [
                'stars' => 5,
                'comment' => 'Tôi cảm thấy khá ấn tượng với dịch vụ mà nhà xe mang đến cho khách hàng, các bạn nhân viên sẵn sàng có mặt để hỗ trợ khách hàng nếu có',
                'carId' => 4,
                'accId' => 2,
                'veId' => 2,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
            ],
            [
                'stars' => 1,
                'comment' => 'Quá tệ, mặc dù chất lượng xe khá tốt nhưng chất lượng phục vụ lại không được như vậy, hơn thế nữa tài xế còn chạy rất ẩu, coi thường tính mạng của hành khách và những người trên xe',
                'carId' => 2,
                'accId' => 2,
                'veId' => 3,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
            ],
            [
                'stars' => 2,
                'comment' => 'Tôi không thể nói gì hơn ngoài 2 từ "khủng khiếp", tôi chưa từng đi qua nhà xe nào có chất lượng tệ đến như vậy, cạch mặt từ đây',
                'carId' => 3,
                'accId' => 2,
                'veId' => 4,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
            ],
        ]);
    }
}
