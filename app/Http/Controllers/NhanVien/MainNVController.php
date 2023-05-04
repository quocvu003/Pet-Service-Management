<?php

namespace App\Http\Controllers\NhanVien;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class MainNVController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $nhanvien = User::find($id);

        // dd($currentuser);
        return view('NhanVien.home', [
            'title' => 'Trang Quản Trị Chủ Shop',
            'nhanvien' => $nhanvien,


        ]);
    }
    // public function profile()
    // {
    //     $id = Auth::user()->id;
    //     $currentuser = User::find($id);
    //     // dd($currentuser);
    //     return view('ChuShop.profile', [
    //         'title' => 'Trang Cá Nhân',
    //         // 'name' => $currentuser->ten,

    //     ]);
    // }
}
