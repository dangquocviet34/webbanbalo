<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table = 'donhang';

    public function chiTietDonHang()
    {
        return $this->hasMany(ChiTietDonHang::class, 'id_donhang');
    }
}
