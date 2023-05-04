<?php


namespace App\Http\Services;


use App\Models\Shop;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;



class ChuShopService
{
    public function updateshop(Request $request, User $acc, Shop $shop)
    {
        // Cập nhật dữ liệu cho bảng users và shops
        $acc->ten = $request->ten;
        $acc->email = $request->email;
        $acc->save();

        $shop->ten = $request->tenshop;
        $shop->sdt = $request->sdt;
        $shop->diachi = $request->diachi;
        $shop->hinhanh = $request->hinhanh;
        $shop->save();

        Session::flash('success', 'Cập nhật tài khoản thành công');
        return true;
    }
}
