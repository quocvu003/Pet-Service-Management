<?php

namespace App\Http\Controllers\ChuShop;

use App\Http\Controllers\Controller;
use App\Http\Services\ChuShopService;
use App\Models\DichVu;
use App\Models\DichVuDat;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MainCSController extends Controller
{
    protected  $ChuShopService;
    public function __construct(ChuShopService $ChuShopService)
    {
        $this->ChuShopService = $ChuShopService;
    }

    public function index()
    {
        $id = Auth::user()->id;
        // lấy từ bảng shop
        $currentuser = User::where('id', $id)->with('shops')->first();
        $shops = $currentuser->shops;

        $dv_hoanthanh = DichVuDat::where('trangthai', 3)->where('shop_id', $shops->id)->count();
        $tongtien = DichVuDat::where('trangthai', 3)
            ->where('shop_id', $shops->id)
            ->sum('tongtien');
        $dichvu = DichVu::where('shop_id', $shops->id)->where('trangthai', 1)->count();
        $nhanvien = User::where('shop_id', $shops->id)->where('quyen_id', 4)->where('trangthai', 1)->count();
        return view('ChuShop.home', [
            'title' => 'Trang Quản Trị Chủ Shop',
            'tenshop',
            'logo',
            'ten',
            'dv_hoanthanh' =>    $dv_hoanthanh,
            'doanhthu' =>    $tongtien,
            'dichvu' =>    $dichvu,
            'nhanvien' =>    $nhanvien,
        ]);
    }
    public function profile()
    {
        $user = Auth::user();
        $shop = $user->shops;

        return view('ChuShop.profile.index', [
            'title' => 'Trang Cá Nhân',
            'user' => $user,
            'shop' => $shop
        ]);
    }
    public function show()
    {
        $user = Auth::user();
        $shop = $user->shops;

        return view('ChuShop.profile.edit', [
            'title' => 'Chỉnh Sửa Trang Cá Nhân',
            'user' => $user,
            'shop' => $shop

        ]);
    }
    public function updateshop(Request $request)
    {
        $user = Auth::user();

        $shop = $user->shops;

        $result = $this->ChuShopService->updateshop($request, $user, $shop);

        if ($result) {
            return redirect('/ChuShop/profiles/index');
        }
    }
}
