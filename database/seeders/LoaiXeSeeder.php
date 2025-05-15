<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LoaiXeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('LoaiXes')->insert([
            [
                'name' => 'Ghế ngồi',
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
            ],
            [
                'name' => 'Giường nằm',
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
            ],
        ]);
    }
}
