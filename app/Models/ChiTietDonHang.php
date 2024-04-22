<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    protected $table = 'chitietdonhang';

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'id_sp');
    }
}
