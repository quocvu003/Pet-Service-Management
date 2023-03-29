<?php


namespace App\Http\Services;


use App\Jobs\SendMail;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AccService
{

    public function getChuShop()
    {
        return User::where('role_id', 2)->get();
    }
    public function getkhachhang()
    {
        return User::where('role_id', 3)->get();
    }
}
