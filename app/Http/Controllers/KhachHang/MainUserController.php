<?php

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use App\Http\Services\DanhMucService;
use App\Http\Services\DichvuService;
use App\Http\Services\NhanvienService;
use Illuminate\Http\Request;
use App\Http\Services\SliderService;
use App\Models\DichVu;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MainUserController extends Controller
{
    protected $slider;
    protected $menu;
    protected $dichvu;
    protected $profile;

    public function __construct(DanhMucService $menu, SliderService $slider, DichvuService $dichvu, NhanvienService $profile)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->dichvu = $dichvu;
        $this->profile = $profile;
    }

    public function index()
    {
        return view('user.home', [
            'title' => 'PetCare Shop ',
            'sliders' => $this->slider->show(),
            'menus' => $this->menu->getdichvu(),
            'banner' => $this->menu->getbanner(),
        ]);
    }
    public function show()
    {
        $shop = Shop::where('id', '<>', 0)
            ->where('trangthai', 1)
            ->paginate(2);

        return view('user.shop', [
            'title' => 'PetCare Shop ',
            'shops' => $shop,


        ]);
    }
    public function profile()
    {
        $user = Auth::user();
        return view('user.profile.index', [
            'title' => 'Trang Cá Nhân',
            'user' => $user,
        ]);
    }
    public function showp()
    {
        $user = Auth::user();
        return view('user.profile.edit', [
            'title' => 'Chỉnh Sửa Trang Cá Nhân',
            'user' => $user,

        ]);
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        $result = $this->profile->update($request, $user);
        if ($result) {
            return redirect('/profiles/index');
        }
    }
}
