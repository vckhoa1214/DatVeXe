<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class VeDaDat extends Model
{
    use HasFactory;
    protected $table = 'VeDaDats';
    protected $fillable = ['numSeats', 'statusTicket', 'email', 'phoneNum', 'fullName', 'jourId', 'accId', 'createdAt', 'updatedAt'];
    public $timestamps = false;

    public function taiKhoan()
    {
        return $this->belongsTo(TaiKhoan::class, 'accId','id');
    }

    public function chuyenXe()
    {
        return $this->belongsTo(ChuyenXe::class, 'jourId','id');
    }

    public function review()
    {
        return $this->hasOne(Review::class, 'veId', 'id');
    }
}
