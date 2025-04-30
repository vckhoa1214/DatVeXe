<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class TaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'email' => 'nva03@gmail.com',
                'password' => Hash::make('123456'),
                'phoneNum' => '0123456789',
                'fullName' => 'Nguyễn Văn An',
                'dob' => '2003-12-04',
                'isMale' => true,
                'imageAccount' => '/images/default.jpg',
                'isAdmin' => false,
                'isVerified' => true,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now()
            ],
            [
                'email' => 'nvb03@gmail.com',
                'password' => Hash::make('123456'),
                'phoneNum' => '0223456789',
                'fullName' => 'Nguyễn Văn Bắc',
                'dob' => '2003-06-04',
                'isMale' => false,
                'imageAccount' => '/images/default.jpg',
                'isAdmin' => false,
                'isVerified' => true,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now()
            ],
            [
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'phoneNum' => '0345678920',
                'fullName' => 'Admin',
                'dob' => '2003-03-04',
                'isMale' => true,
                'imageAccount' => '/images/default.jpg',
                'isAdmin' => true,
                'isVerified' => true,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now()
            ],
            [
                'email' => 'nvc03@gmail.com',
                'password' => Hash::make('123456'),
                'phoneNum' => '0334567899',
                'fullName' => 'Nguyễn Văn Cường',
                'dob' => '2003-03-29',
                'isMale' => true,
                'imageAccount' => '/images/default.jpg',
                'isAdmin' => false,
                'isVerified' => true,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now()
            ],
            [
                'email' => 'nvd03@gmail.com',
                'password' => Hash::make('123456'),
                'phoneNum' => '0425678930',
                'fullName' => 'Nguyễn Văn Dương',
                'dob' => '2002-03-25',
                'isMale' => true,
                'imageAccount' => '/images/default.jpg',
                'isAdmin' => false,
                'isVerified' => true,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now()
            ],
            [
                'email' => 'vck03@gmail.com',
                'password' => Hash::make('123456'),
                'phoneNum' => '0913568692',
                'fullName' => 'Võ Chí Khoa',
                'dob' => '2003-06-12',
                'isMale' => true,
                'imageAccount' => '/images/default.jpg',
                'isAdmin' => false,
                'isVerified' => true,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now()
            ]
        ];

        // Thêm dữ liệu vào bảng TaiKhoans
        DB::table('TaiKhoans')->insert($items);
    }
}
