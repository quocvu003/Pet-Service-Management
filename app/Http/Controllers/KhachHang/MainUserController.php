<?php

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use App\Http\Services\DanhMucService;
use App\Http\Services\DichvuService;
use Illuminate\Http\Request;
use App\Http\Services\SliderService;





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
            'dichvus' => $this->dichvu->get()
        ]);
    }
    public function showdanhmuc(Request $request, $id, $slug = '')
    {
        $danhmuc = $this->menu->getId($id);

        $dichvus = $this->dichvu->dvshop($danhmuc, $request);
        return view('user.service', [
            'title' => $danhmuc->ten,
            'dichvus' => $dichvus,
            'menus'  => $danhmuc,
        ]);
    }
}
