<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'taikhoans';


    protected $fillable = [
        'quyen_id',
        'shop_id',
        'ten',
        'email',
        'matkhau',
        'sdt',
        'diachi',
        'hinhanh',
        'trangthai',
    ];
    public function getAuthPassword()
    {
        return $this->attributes["matkhau"];
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'matkhau',
        'remember_token',
    ];

    protected $with = [
        'shops'
    ];

    public function shops()
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }
}
