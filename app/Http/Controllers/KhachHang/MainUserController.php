<?php

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use App\Http\Services\DanhMucService;
use Illuminate\Http\Request;
use App\Http\Services\SliderService;

use App\Http\Services\Product\ProductService;



class MainUserController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;

    public function __construct(DanhMucService $menu, SliderService $slider)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        // $this->product = $product;
    }

    public function index()
    {
        return view('user.home', [
            'title' => 'PetCare Shop ',
            'sliders' => $this->slider->show(),
            'menus' => $this->menu->show(),
            // 'products' => $this->product->get()
        ]);
    }

    // public function loadProduct(Request $request)
    // {

    //         $page = $request->input('page', 0);
    //         $result = $this->product->get($page);
    //         if (count($result) != 0) {
    //             $html = view('user.products.list', ['product' => $result])->render();

    //             return response()->json(['html' => $html]);
    //         }

    //         return response()->json(['html' => '']);
    // }
}
