<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Quan trọng: Kế thừa từ User
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class TaiKhoan extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'TaiKhoans';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'email', 'password', 'phoneNum', 'fullName', 'dob', 'isMale',
        'imageAccount', 'isAdmin', 'isVerified', 'createdAt', 'updatedAt'
    ];

    public function veDaDat()
    {
        return $this->hasMany(VeDaDat::class, 'accId', 'id');
    }


    public function reviews()
    {
        return $this->hasMany(Review::class, 'accId');
    }
}
