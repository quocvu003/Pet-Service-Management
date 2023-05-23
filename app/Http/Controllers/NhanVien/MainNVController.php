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

        // dd($currentuser);
        return view('NhanVien.home', [
            'title' => 'Nhân viên :' . $nhanvien->ten,
            'nhanvien' => $nhanvien,


        ]);
    }
    public function list()
    {
        return view('nhanvien.congviec.index', [
            'title' => 'Công việc',
            'congviecs' => $this->congviec->list(),
        ]);
    }
    public function list_hoanthanh()
    {
        return view('nhanvien.congviec.index', [
            'title' => 'Công việc',
            'congviecs' => $this->congviec->list_hoanthanh(),
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




    public function update_dichvudat(Request $request, DichVuDat $dichvudat)
    {
        $dichvudats = $dichvudat;
        $result = $this->congviec->update_dichvudat($request, $dichvudats);
        if ($result) {
            return redirect('/NhanVien/congviecs/index');
        }
    }
}
