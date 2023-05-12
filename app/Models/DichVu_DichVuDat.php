<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DichVu_DichVuDat extends Model
{

    use HasFactory;
    protected $table = 'dichvu_dichvudats';

    protected $fillable = [
        'dichvudat_id',
        'dichvu_id',
    ];
}
