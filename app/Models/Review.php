<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'Reviews';
    protected $fillable = ['stars', 'comment', 'accId', 'carId', 'veId', 'createdAt', 'updatedAt'];
    public $timestamps = false;

    public function taiKhoan()
    {
        return $this->belongsTo(TaiKhoan::class, 'accId');
    }

    public function nhaXe()
    {
        return $this->belongsTo(NhaXe::class, 'carId');
    }

    public function ve()
    {
        return $this->belongsTo(VeDaDat::class, 'veId');
    }
}
