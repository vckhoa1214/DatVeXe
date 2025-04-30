<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiXe extends Model
{
    use HasFactory;
    protected $table = 'LoaiXes';
    protected $fillable = ['name', 'createdAt', 'updatedAt'];
    public $timestamps = false;

    public function chuyenXes()
    {
        return $this->hasMany(ChuyenXe::class, 'carId');
    }
}
