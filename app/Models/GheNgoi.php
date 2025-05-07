<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GheNgoi extends Model
{
    use HasFactory;

    protected $table = 'GheNgois';

    protected $fillable = [
        'seatCode',
        'jourId',
        'isBooked',
        'veId',
        'createdAt',
        'updatedAt'
    ];

    public $timestamps = false;

    // Quan hệ: Ghế thuộc về một chuyến xe
    public function chuyenXe()
    {
        return $this->belongsTo(ChuyenXe::class, 'jourId');
    }

    // Quan hệ: Ghế thuộc về một vé
    public function ve()
    {
        return $this->belongsTo(VeDaDat::class, 'veId');
    }
}
