<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DichVuDat extends Model
{
    protected $table = 'dichvudats';
    use HasFactory;

    protected $fillable = [
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

    ];
}
