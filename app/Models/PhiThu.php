<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhiThu extends Model
{
    use HasFactory;
    protected $table = 'phithus';
    protected $fillable = [
        'shop_id',
        'tien',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }
}
