<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'sanpham';

    public function discount()
    {
        return $this->hasOne(Discount::class, 'id_sanpham');
    }
}
