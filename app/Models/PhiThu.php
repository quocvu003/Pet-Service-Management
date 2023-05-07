<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phithu extends Model
{
    use HasFactory;
    protected $fillable = [

        'shop_id',
        'tien',
    ];
    protected $with = [
        'shops'
    ];

    public function shops()
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }
}
