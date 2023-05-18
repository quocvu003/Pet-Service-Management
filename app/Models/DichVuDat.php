<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DichVuDat extends Model
{
    protected $table = 'dichvudats';
    use HasFactory;

    protected $fillable = [
        'id',
        'shop_id',
        'taikhoan_id',
        'trangthai',
        'ngay',
        'gio',
        'ten',
        'email',
        'sdt',
        'tongtien',
        'trangthai',
        'loaithucung',
        'nhanvien_id',
    ];

    protected $with = [
        'shops',
        'taikhoans',
    ];

    public function shops()
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }
    public function taikhoans()
    {
        return $this->belongsTo(User::class, 'taikhoan_id', 'id');
    }
}
