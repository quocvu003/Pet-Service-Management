<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'ten',
        'email',
        'sdt',
        'diachi',
        'hinhanh',
    ];

    protected $with = [
        'taikhoans',
        'dichvus'
    ];



    public function taikhoans()
    {
        return $this->hasMany(User::class, 'id', 'shop_id');
    }
    public function dichvus()
    {
        return $this->hasMany(DichVu::class, 'shop_id', 'id');
    }
}
