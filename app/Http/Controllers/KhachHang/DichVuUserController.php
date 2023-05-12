<?php

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;


use App\Http\Services\DanhMucUserService;
use App\Models\DanhMuc;
use App\Models\DichVu;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class DichVuUserController extends Controller
{
    protected $dichvu;

    public function __construct(DanhMucUserService $dichvu)
    {

        $this->dichvu = $dichvu;
    }
    public function index(DanhMuc $danhmuc)
    {
        $danhmucs = $danhmuc;
        $id =  $danhmucs->id;
        $dichvu = $this->dichvu->getdichvu($id);

        return view('user.dichvu', [
            'title' => 'Dịch vụ ' . $danhmucs->ten,
            'danhmucs' => $danhmucs,
            'dichvus' => $dichvu,
        ]);
    }
    public function create(Shop $shop, DichVu $dichvu)
    {
        $dichvus = $dichvu;
        $shops = $shop;

        $user = Auth::user();

        return view('user.datlich', [
            'title' => ' Đặt lịch dịch vụ ',
            'dichvus' => $dichvus,
            'shops' => $shops,
            'user' => $user,
        ]);
    }
}
