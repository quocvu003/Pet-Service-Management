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
        'danhmuccha',
        'trangthai',
        'mota',
    ];
    public function dichvus()
    {
        return $this->hasMany(DichVu::class, 'danhmuc_id', 'id');
    }
}
