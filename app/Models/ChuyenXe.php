<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChuyenXe extends Model
{
    use HasFactory;

    protected $table = 'ChuyenXes';
    protected $fillable = [
        'startProvince', 'endProvince', 'startLocation', 'endLocation',
        'startDate', 'endDate', 'startTime', 'endTime', 'locationImage',
        'numSeats', 'totalNumSeats', 'price', 'carId', 'cateCarId', 'routeProvinces',
        'createdAt', 'updatedAt'
    ];

    public $timestamps = false;

    public function nhaXe()
    {
        return $this->belongsTo(NhaXe::class, 'carId');
    }

    public function loaiXe()
    {
        return $this->belongsTo(LoaiXe::class, 'cateCarId');
    }

    public function veDaDats()
    {
        return $this->hasMany(VeDaDat::class, 'jourId');  // Liên kết với VeDaDats qua jourId
    }

    public function manager()
    {
        return $this->hasOneThrough(TaiKhoan::class, NhaXe::class, 'id', 'id', 'carId', 'managerId');
    }
}
