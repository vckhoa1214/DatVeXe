<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Quan trọng: Kế thừa từ User
use Illuminate\Notifications\Notifiable;

class TaiKhoan extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'TaiKhoans';  // Đặt tên bảng
    protected $primaryKey = 'id';    // Đặt khóa chính của bảng
    public $timestamps = false;      // Tắt Laravel tự động cập nhật thời gian

    protected $fillable = [
        'email', 'password', 'phoneNum', 'fullName', 'dob', 'isMale',
        'imageAccount', 'isAdmin', 'isVerified', 'isCarCompany',  // Thêm isCarCompany vào
        'createdAt', 'updatedAt'
    ];

    // Mối quan hệ với bảng VeDaDats (vé đã đặt)
    public function veDaDat()
    {
        return $this->hasMany(VeDaDat::class, 'accId', 'id');
    }

    // Mối quan hệ với bảng Reviews
    public function reviews()
    {
        return $this->hasMany(Review::class, 'accId');
    }

    // Mối quan hệ với bảng NhaXes (Nhà xe), một tài khoản có thể quản lý một nhà xe
    public function nhaXe()
    {
        return $this->hasOne(NhaXe::class, 'managerId', 'id');
    }
}
