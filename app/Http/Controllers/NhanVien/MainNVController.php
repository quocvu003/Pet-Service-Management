<?php

namespace App\Http\Controllers\NhanVien;

use App\Http\Controllers\Controller;
use App\Http\Services\CongViecService;
use App\Models\DichVu_DichVuDat;
use App\Models\DichVuDat;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainNVController extends Controller
{
    protected $congviec;

    public function __construct(CongViecService $congviec)
    {

        $this->congviec = $congviec;
    }
    public function index()
    {
        $id = Auth::user()->id;
        $nhanvien = User::find($id);

        $dv_hoanthanh = DichVuDat::where('trangthai', 2)
            ->where('nhanvien_id', $id)->count();
        $dv_cho = DichVuDat::where('trangthai', 3)
            ->where('nhanvien_id', $id)->count();
        return view('NhanVien.home', [
            'title' => 'Nhân viên :' . $nhanvien->ten,
            'nhanvien' => $nhanvien,
            'dv_hoanthanh' => $dv_hoanthanh,
            'dv_cho' => $dv_cho,

        ]);
    }
    public function list()
    {
        $lichdatdvstemp = [];
        $dichvudats = $this->congviec->list();
        foreach ($dichvudats as $dichvudat) {
            $soluongdv = DichVu_DichVuDat::where('dichvudat_id', $dichvudat->id)->count();


            $dichvudat->soluongdv = $soluongdv;


            array_push($lichdatdvstemp, $dichvudat);
        };
        return view('nhanvien.congviec.index', [
            'title' => 'Công việc',
            'congviecs' => $lichdatdvstemp,
        ]);
    }
    public function list_hoanthanh()
    {
        $lichdatdvstemp = [];
        $dichvudats = $this->congviec->list_hoanthanh();
        foreach ($dichvudats as $dichvudat) {
            $soluongdv = DichVu_DichVuDat::where('dichvudat_id', $dichvudat->id)->count();


            $dichvudat->soluongdv = $soluongdv;


            array_push($lichdatdvstemp, $dichvudat);
        };
        return view('nhanvien.congviec.index_hoanthanh', [
            'title' => 'Công việc',
            'congviecs' => $lichdatdvstemp,
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

        return view('nhanvien.congviec.show', [
            'title' => 'Quản lý lịch đặt dịch vụ',
            'lichdats' => $lichdatdvs,
            'dichvu_dichvudats' => $dichvu_dichvudat,
            "arr_id" => $arr_id,
            'shops' => $shop,
        ]);
    }

    public function show_hoanthanh(DichVuDat $dichvudat)
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

        return view('nhanvien.congviec.show_hoanthanh', [
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
        $result = $this->congviec->update_dichvudat($request, $dichvudats);
        if ($result) {
            return redirect('/NhanVien/congviecs/index');
        }
    }
}
