<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class VeDaDatSeeder extends Seeder
{
    public function run()
    {
        DB::table('vedadats')->insert([
            [
                'numSeats' => 2,
                'statusTicket' => 'Đã thanh toán',
                'email' => 'nva03@gmail.com',
                'phoneNum' => '0123456789',
                'fullName' => 'Nguyễn Văn An',
                'jourId' => 1,
                'accId' => 1,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
                'seatCodes' => json_encode(["S50", "S49"]),
            ],
            [
                'numSeats' => 1,
                'statusTicket' => 'Đã thanh toán',
                'email' => 'nvb03@gmail.com',
                'phoneNum' => '0223456789',
                'fullName' => 'Nguyễn Văn Bắc',
                'jourId' => 2,
                'accId' => 2,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
                'seatCodes' => json_encode(["S50"]),
            ],
            [
                'numSeats' => 3,
                'statusTicket' => 'Đã thanh toán',
                'email' => 'nvb03@gmail.com',
                'phoneNum' => '0223456789',
                'fullName' => 'Nguyễn Văn Bắc',
                'jourId' => 3,
                'accId' => 2,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
                'seatCodes' => json_encode(["S50", "S49","S48"]),
            ],
            [
                'numSeats' => 1,
                'statusTicket' => 'Đã thanh toán',
                'email' => 'nvb03@gmail.com',
                'phoneNum' => '0223456789',
                'fullName' => 'Nguyễn Văn Bắc',
                'jourId' => 4,
                'accId' => 2,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
                'seatCodes' => json_encode(["S50"]),
            ],
        ]);
    }
}
