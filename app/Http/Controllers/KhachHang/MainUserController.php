<?php

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use App\Http\Services\DanhMucService;
use App\Http\Services\DichvuService;
use Illuminate\Http\Request;
use App\Http\Services\SliderService;
use App\Models\DichVu;
use App\Models\Shop;
use App\Models\User;

class MainUserController extends Controller
{
    protected $slider;
    protected $menu;
    protected $dichvu;

    public function __construct(DanhMucService $menu, SliderService $slider, DichvuService $dichvu)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->dichvu = $dichvu;
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
            ->get();

        return view('user.shop', [
            'title' => 'PetCare Shop ',
            'shops' => $shop,

        ]);
    }
}
