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

    public $timestamps = false;  // Tắt việc tự động quản lý thời gian (vì bạn đã có `createdAt`, `updatedAt`)

    protected $table = 'NhaXes';  // Tên bảng

    protected $fillable = [
        'name', 'description', 'phoneNo', 'address', 'policy', 'mainRoute',
        'startTime', 'numOfTrip', 'ticketPrice', 'stars', 'imageCarCom', 'imageJours', 'managerId'
    ];

    protected $casts = [
        'phoneNo' => 'array',  // Chuyển đổi kiểu dữ liệu của phoneNo từ JSON thành array
        'address' => 'array',
        'mainRoute' => 'array',
        'startTime' => 'array',
        'ticketPrice' => 'array',
        'imageJours' => 'array',
    ];

    // Mối quan hệ với bảng ChuyenXes (Chuyến xe)
    public function chuyenXes()
    {
        return $this->hasMany(ChuyenXe::class, 'carId');
    }

    // Mối quan hệ với bảng Reviews (Đánh giá)
    public function reviews()
    {
        return $this->hasMany(Review::class, 'carId');
    }

    // Trường tính toán trung bình sao từ các review
    public function getAverageStarsAttribute()
    {
        // Trả về giá trị trung bình của các review, nếu không có review thì trả về 0
        return round($this->reviews()->avg('stars') ?? 0, 1);
    }

    // Mối quan hệ với bảng TaiKhoans (Tài khoản người quản lý nhà xe)
    public function manager()
    {
        return $this->belongsTo(TaiKhoan::class, 'managerId');
    }
}
