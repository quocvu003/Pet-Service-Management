<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten',
        'email',
        'sdt',
        'diachi',
        'hinhanh',
    ];

    protected $with = [
        'taikhoans'
    ];

    // public function taikhoans()
    // {
    //     return $this->hasMany(User::class);
    // }

    public function taikhoans()
    {
        return $this->hasMany(User::class, 'id', 'shop_id');
    }

    // public function phithus()
    // {
    //     return $this->hasMany(PhiThu::class);
    // }
}
