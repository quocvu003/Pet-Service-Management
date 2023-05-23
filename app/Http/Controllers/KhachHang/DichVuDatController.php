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
        return redirect('/datlichs/index');
    }

    public function index()
    {
        $dichvudats = $this->dichvudat->list();

        // $dichvu_id = $dichvudats->id;

        // dd($dichvu_id);
        // $soluongdv = DichVu_DichVuDat::where('dichvudat_id', $dichvu_id)->get();

        return view('user.datlich.list', [
            'title' => ' Đặt lịch dịch vụ ',
            'dichvudats' => $dichvudats,
            // 'soluongdv' => $soluongdv,
        ]);
    }

    public function show(DichVuDat $dichvudat)
    {
        $lichdatdvs = $dichvudat;

        $dichvu_dichvudat = DichVu_DichVuDat::where('dichvudat_id', $lichdatdvs->id)->get();

        $arr_id = [];
        // id các dịch vụ đã đặt
        foreach ($dichvu_dichvudat as $item) {
            array_push($arr_id, $item->dichvus->id);
        }
        // shop của dịch vụ đã đặt
        $shop = Shop::where('id', $lichdatdvs->shop_id)->get();

        return view('user.datlich.show', [
            'title' => 'Quản lý lịch đặt dịch vụ',
            'lichdats' => $lichdatdvs,
            'dichvu_dichvudats' => $dichvu_dichvudat,
            "arr_id" => $arr_id,
            'shops' => $shop,
        ]);
    }

    public function edit(DichVuDat $dichvudat)
    {
        $lichdatdvs = $dichvudat;

        $dichvu_dichvudat = DichVu_DichVuDat::where('dichvudat_id', $lichdatdvs->id)->get();

        $arr_id = [];
        // id các dịch vụ đã đặt
        foreach ($dichvu_dichvudat as $item) {
            array_push($arr_id, $item->dichvus->id);
        }
        // shop của dịch vụ đã đặt
        $shop = Shop::where('id', $lichdatdvs->shop_id)->get();

        return view('user.datlich.edit', [
            'title' => 'Quản lý lịch đặt dịch vụ',
            'lichdats' => $lichdatdvs,
            'dichvu_dichvudats' => $dichvu_dichvudat,
            "arr_id" => $arr_id,
            'shops' => $shop,
        ]);
    }

    public function update_dichvudat(Request $request, DichVuDat $dichvudat)
    {
        $dichvudats = $dichvudat;
        $result = $this->dichvudat->update_dichvudat($request, $dichvudats);
        if ($result) {
            return redirect('/datlichs/index');
        }
    }
}
