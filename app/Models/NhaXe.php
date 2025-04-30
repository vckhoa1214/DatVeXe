<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaXe extends Model
{
    use HasFactory;

    // Đặt tên cột thời gian để phù hợp với bảng
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    public $timestamps = true;  // Laravel sẽ sử dụng timestamps (createdAt, updatedAt)

    protected $table = 'NhaXes';  // Tên bảng
    protected $fillable = [
        'name', 'description', 'phoneNo', 'address', 'policy', 'mainRoute',
        'startTime', 'numOfTrip', 'ticketPrice', 'stars', 'imageCarCom', 'imageJours'
    ];

    protected $casts = [
        'phoneNo' => 'array',
        'address' => 'array',
        'mainRoute' => 'array',
        'startTime' => 'array',
        'ticketPrice' => 'array',
        'imageJours' => 'array',
    ];

    public function chuyenXes()
    {
        return $this->hasMany(ChuyenXe::class, 'carId');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'carId');
    }
    public function getAverageStarsAttribute()
    {
        return round($this->reviews()->avg('stars') ?? 0, 1);
    }

}
