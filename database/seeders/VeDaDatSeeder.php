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
                'seatCodes' => json_encode(["A1", "A2"]),
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
                'seatCodes' => json_encode(["A3"]),
            ],
            [
                'numSeats' => 3,
                'statusTicket' => 'Đã thanh toán',
                'email' => 'nvc03@gmail.com',
                'phoneNum' => '0223456789',
                'fullName' => 'Nguyễn Văn Cường',
                'jourId' => 3,
                'accId' => 4,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
                'seatCodes' => json_encode(["B1", "B2","B3"]),
            ],
            [
                'numSeats' => 1,
                'statusTicket' => 'Đã thanh toán',
                'email' => 'nvd03@gmail.com',
                'phoneNum' => '0223456789',
                'fullName' => 'Nguyễn Văn Dương',
                'jourId' => 4,
                'accId' => 5,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
                'seatCodes' => json_encode(["A5"]),
            ],
            [
                'numSeats' => 1,
                'statusTicket' => 'Đã thanh toán',
                'email' => 'nvd03@gmail.com',
                'phoneNum' => '0223456789',
                'fullName' => 'Nguyễn Văn Dương',
                'jourId' => 5,
                'accId' => 5,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
                'seatCodes' => json_encode(["A4","A5"]),
            ],
            [
                'numSeats' => 3,
                'statusTicket' => 'Đã thanh toán',
                'email' => 'nvc03@gmail.com',
                'phoneNum' => '0223456789',
                'fullName' => 'Nguyễn Văn Cường',
                'jourId' => 7,
                'accId' => 4,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
                'seatCodes' => json_encode(["A1", "A2","A3"]),
            ],
            [
                'numSeats' => 1,
                'statusTicket' => 'Đã thanh toán',
                'email' => 'nvb03@gmail.com',
                'phoneNum' => '0223456789',
                'fullName' => 'Nguyễn Văn Bắc',
                'jourId' => 9,
                'accId' => 2,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
                'seatCodes' => json_encode(["A3"]),
            ],
            [
                'numSeats' => 2,
                'statusTicket' => 'Đã thanh toán',
                'email' => 'nva03@gmail.com',
                'phoneNum' => '0123456789',
                'fullName' => 'Nguyễn Văn An',
                'jourId' => 11,
                'accId' => 1,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
                'seatCodes' => json_encode(["A1", "A2"]),
            ],
            [
                'numSeats' => 2,
                'statusTicket' => 'Đã thanh toán',
                'email' => 'vck03@gmail.com',
                'phoneNum' => '0913568692',
                'fullName' => 'Võ Chí Khoa',
                'jourId' => 15,
                'accId' => 6,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
                'seatCodes' => json_encode(["A6", "A7"]),
            ],
            [
                'numSeats' => 2,
                'statusTicket' => 'Đã thanh toán',
                'email' => 'vck03@gmail.com',
                'phoneNum' => '0913568692',
                'fullName' => 'Võ Chí Khoa',
                'jourId' => 18,
                'accId' => 6,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
                'seatCodes' => json_encode(["A3", "A4"]),
            ],
            [
                'numSeats' => 3,
                'statusTicket' => 'Đã thanh toán',
                'email' => 'nvc03@gmail.com',
                'phoneNum' => '0223456789',
                'fullName' => 'Nguyễn Văn Cường',
                'jourId' => 20,
                'accId' => 4,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
                'seatCodes' => json_encode(["A1", "A2","A3"]),
            ],
            [
                'numSeats' => 3,
                'statusTicket' => 'Đã thanh toán',
                'email' => 'nvc03@gmail.com',
                'phoneNum' => '0223456789',
                'fullName' => 'Nguyễn Văn Cường',
                'jourId' => 20,
                'accId' => 4,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
                'seatCodes' => json_encode(["A1", "A2","A3"]),
            ],
            [
                'numSeats' => 2,
                'statusTicket' => 'Đã thanh toán',
                'email' => 'nva03@gmail.com',
                'phoneNum' => '0123456789',
                'fullName' => 'Nguyễn Văn An',
                'jourId' => 24,
                'accId' => 1,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
                'seatCodes' => json_encode(["A1", "A2"]),
            ],
            [
                'numSeats' => 2,
                'statusTicket' => 'Đã thanh toán',
                'email' => 'vck03@gmail.com',
                'phoneNum' => '0913568692',
                'fullName' => 'Võ Chí Khoa',
                'jourId' => 27,
                'accId' => 6,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
                'seatCodes' => json_encode(["A3", "A4"]),
            ],
            [
                'numSeats' => 1,
                'statusTicket' => 'Đã thanh toán',
                'email' => 'nvb03@gmail.com',
                'phoneNum' => '0223456789',
                'fullName' => 'Nguyễn Văn Bắc',
                'jourId' => 31,
                'accId' => 2,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
                'seatCodes' => json_encode(["A3"]),
            ],
            [
                'numSeats' => 1,
                'statusTicket' => 'Đã thanh toán',
                'email' => 'nvd03@gmail.com',
                'phoneNum' => '0223456789',
                'fullName' => 'Nguyễn Văn Dương',
                'jourId' => 36,
                'accId' => 5,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
                'seatCodes' => json_encode(["A5"]),
            ],
            [
                'numSeats' => 3,
                'statusTicket' => 'Đã thanh toán',
                'email' => 'nvc03@gmail.com',
                'phoneNum' => '0223456789',
                'fullName' => 'Nguyễn Văn Cường',
                'jourId' => 40,
                'accId' => 4,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
                'seatCodes' => json_encode(["A1", "A2","A3"]),
            ],
        ]);
    }
}
