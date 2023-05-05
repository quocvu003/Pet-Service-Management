<?php


namespace App\Http\Services;

use App\Models\DanhMuc;
use App\Models\DichVu;
use Illuminate\Support\Facades\Session;


use Illuminate\Support\Facades\Auth;


class DichvuService
{
    public function getdichvu()
    {
        $current_user = Auth::user();
        // Lấy shop_id của tài khoản hiện tại
        $shop_id = $current_user->shop_id;
        return DichVu::where('shop_id', $shop_id)
            ->get();
    }
    public function getdanhmuc()
    {
        return DanhMuc::where('danhmuccha', '<>', 0)
            ->get();
    }
}
