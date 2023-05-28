<?php

namespace App\Http\Controllers\ChuShop;

use App\Http\Controllers\Controller;
use App\Http\Services\DichVuDatService;
use App\Models\DichVu;
use App\Models\DichVu_DichVuDat;
use App\Models\DichVuDat;
use App\Models\User;
use Illuminate\Http\Request;

class LichhenController extends Controller
{
    protected $dicvudatService;

    public function __construct(DichVuDatService $dicvudatService)
    {
        $this->dicvudatService = $dicvudatService;
    }

    public function index()
    {
        $lichdatdvstemp = [];
        $dichvudats = $this->dicvudatService->choduyet();
        foreach ($dichvudats as $dichvudat) {
            $soluongdv = DichVu_DichVuDat::where('dichvudat_id', $dichvudat->id)->count();


            $dichvudat->soluongdv = $soluongdv;


            array_push($lichdatdvstemp, $dichvudat);
        };
        return view('ChuShop.lichhen.index', [
            'title' => 'Quản lý lịch đặt dịch vụ',
            'lichdatdvs' => $lichdatdvstemp,

        ]);
    }

    public function index_daduyet()
    {
        $lichdatdvstemp = [];
        $dichvudats = $this->dicvudatService->daduyet();
        foreach ($dichvudats as $dichvudat) {
            $soluongdv = DichVu_DichVuDat::where('dichvudat_id', $dichvudat->id)->count();
            $nhanvien = User::where('id', $dichvudat->nhanvien_id)->first();

            $dichvudat->soluongdv = $soluongdv;
            $dichvudat->tenNhanVien = $nhanvien->ten;

            array_push($lichdatdvstemp, $dichvudat);
        };
        // dd($lichdatdvstemp);
        return view('ChuShop.lichhen.index_daduyet', [
            'title' => 'Quản lý lịch đặt dịch vụ',
            'lichdatdvs' => $lichdatdvstemp,
            // 'soluongdv' => $soluongdv,
        ]);
    }

    public function index_hoanthanh()
    {
        $lichdatdvstemp = [];
        $dichvudats = $this->dicvudatService->hoanthanh();
        foreach ($dichvudats as $dichvudat) {
            $soluongdv = DichVu_DichVuDat::where('dichvudat_id', $dichvudat->id)->count();
            $nhanvien = User::where('id', $dichvudat->nhanvien_id)->first();

            $dichvudat->soluongdv = $soluongdv;
            $dichvudat->tenNhanVien = $nhanvien->ten;

            array_push($lichdatdvstemp, $dichvudat);
        };
        return view('ChuShop.lichhen.index_hoanthanh', [
            'title' => 'Quản lý lịch đặt dịch vụ',
            'lichdatdvs' => $lichdatdvstemp,
        ]);
    }
    public function index_tuchoi()
    {
        $lichdatdvstemp = [];
        $dichvudats = $this->dicvudatService->tuchoi();
        foreach ($dichvudats as $dichvudat) {
            $soluongdv = DichVu_DichVuDat::where('dichvudat_id', $dichvudat->id)->count();


            $dichvudat->soluongdv = $soluongdv;


            array_push($lichdatdvstemp, $dichvudat);
        };
        return view('ChuShop.lichhen.index_tuchoi', [
            'title' => 'Quản lý lịch đặt dịch vụ',
            'lichdatdvs' => $lichdatdvstemp,
        ]);
    }
    public function show(DichVuDat $lichdatdv)
    {
        $lichdatdvs = $lichdatdv;

        $dichvu_dichvudat = DichVu_DichVuDat::where('dichvudat_id', $lichdatdvs->id)->get();

        $id_shop = $lichdatdvs->shop_id;

        $nhanvien = User::where('shop_id', $id_shop)->where('quyen_id', 4)->where('trangthai', 1)->get();

        return view('ChuShop.lichhen.show', [
            'title' => 'Quản lý lịch đặt dịch vụ',
            'lichdats' => $lichdatdvs,
            'dichvu_dichvudats' => $dichvu_dichvudat,
            'nhanviens' => $nhanvien,
        ]);
    }

    public function duyet(Request $request, DichVuDat $lichdatdv)
    {
        $lichdatdvs = $lichdatdv;

        $result = $this->dicvudatService->duyet($request, $lichdatdvs);

        if ($result->trangthai == 2) {
            return response()->json([
                'error' => false,
                'message' => 'Duyet Thanh Cong'
            ]);
        }
        if ($result->trangthai == 4) {
            return response()->json([
                'error' => false,
                'message' => 'Khong Duoc Duyet '
            ]);
        }

        return response()->json(['error' => true]);
    }
    public function show_daduyet(DichVuDat $lichdatdv)
    {
        $lichdatdvs = $lichdatdv;

        $dichvu_dichvudat = DichVu_DichVuDat::where('dichvudat_id', $lichdatdvs->id)->get();

        $id_shop = $lichdatdvs->shop_id;

        $listnhanvien = User::where('shop_id', $id_shop)->where('quyen_id', 4)->where('trangthai', 1)->get();

        return view('ChuShop.lichhen.show_daduyet', [
            'title' => 'Quản lý lịch đặt dịch vụ',
            'lichdats' => $lichdatdvs,
            'dichvu_dichvudats' => $dichvu_dichvudat,

            'listnhanviens' => $listnhanvien,
        ]);
    }
    public function update_daduyet(Request $request, DichVuDat $lichdatdv)
    {
        $lichdatdvs = $lichdatdv;


        $result = $this->dicvudatService->update_daduyet($request, $lichdatdvs);

        if ($result) {
            return redirect('/ChuShop/lichdatdvs/list_daduyet');
        }
    }
    public function show_hoanthanh(DichVuDat $lichdatdv)
    {
        $lichdatdvs = $lichdatdv;

        $dichvu_dichvudat = DichVu_DichVuDat::where('dichvudat_id', $lichdatdvs->id)->get();

        $id_shop = $lichdatdvs->shop_id;

        $listnhanvien = User::where('shop_id', $id_shop)->where('quyen_id', 4)->where('trangthai', 1)->get();

        return view('ChuShop.lichhen.show_hoanthanh', [
            'title' => 'Quản lý lịch đặt dịch vụ',
            'lichdats' => $lichdatdvs,
            'dichvu_dichvudats' => $dichvu_dichvudat,

            'listnhanviens' => $listnhanvien,
        ]);
    }
    public function show_tuchoi(DichVuDat $lichdatdv)
    {
        $lichdatdvs = $lichdatdv;

        $dichvu_dichvudat = DichVu_DichVuDat::where('dichvudat_id', $lichdatdvs->id)->get();


        return view('ChuShop.lichhen.show_tuchoi', [
            'title' => 'Quản lý lịch đặt dịch vụ',
            'lichdats' => $lichdatdvs,
            'dichvu_dichvudats' => $dichvu_dichvudat,


        ]);
    }
}
