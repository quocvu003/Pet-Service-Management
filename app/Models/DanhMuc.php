<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    protected $table = 'danhmucs';
    use HasFactory;

    protected $fillable = [
        'ten',
        'tieude',
        'trangthai',
        'mota',
        'hinhanh',
        'tenshop',
    ];
    public function dichvus()
    {
        return $this->hasMany(DichVu::class, 'danhmuc_id', 'id');
    }
    public function shops()
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }
}
