<?php

namespace App\Http\Controllers\ChuShop;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class MainCSController extends Controller
{
    public function index()
    {

        $id = Auth::user()->id;
        $currentuser = User::find($id);
        // dd($currentuser);
        return view('ChuShop.home', [
            'title' => 'Trang Quản Trị Chủ Shop',
            'name' => $currentuser->name,

        ]);
    }
}
