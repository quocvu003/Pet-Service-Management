<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DichVu extends Model
{
    protected $table = 'dichvus';
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'danhmuc_id',
        'ten',
        'gia',
        'hinhanh',
        'mota',
        'trangthai',
    ];
    public function danhmucs()
    {
        return $this->belongsTo(DanhMuc::class, 'danhmuc_id', 'id');
    }
    public function shops()
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }
}
