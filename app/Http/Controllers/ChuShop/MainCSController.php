<?php

namespace App\Http\Controllers\ChuShop;

use App\Http\Controllers\Controller;
use App\Http\Services\ChuShopService;

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

        return view('ChuShop.home', [
            'title' => 'Trang Quản Trị Chủ Shop',
            'tenshop',
            'logo',
            'ten',

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
