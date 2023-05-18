<?php

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use App\Http\Services\DichVuDatService;
use App\Models\DichVu;
use App\Models\DichVu_DichVuDat;
use App\Models\DichVuDat;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DichVuDatController extends Controller
{
    protected $dichvudat;

    public function __construct(DichVuDatService $dichvudat)
    {

        $this->dichvudat = $dichvudat;
    }
    public function create(Shop $shop, DichVu $dichvu)
    {
        $dichvus = $dichvu;

        $shops = $shop;

        $user = Auth::user();

        return view('user.datlich.datlich', [
            'title' => ' Đặt lịch dịch vụ ',
            'dichvus' => $dichvus,
            'shops' => $shops,
            'user' => $user,
        ]);
    }
    public function store(Request $request)
    {
        $this->dichvudat->create($request);
        return redirect()->back();
    }

    public function index()
    {
        return view('user.datlich.list', [
            'title' => ' Đặt lịch dịch vụ ',
            'dichvudats' => $this->dichvudat->list(),
        ]);
    }
    public function show(DichVuDat $dichvudat)
    {
        $dichvudats = $dichvudat;

        return view('user.datlich.show', [
            'title' => ' Đặt lịch dịch vụ ',
            'dichvudats' => $dichvudats,
        ]);
    }
}
