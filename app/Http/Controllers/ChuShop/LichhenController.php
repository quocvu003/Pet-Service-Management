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
        return view('ChuShop.lichhen.index', [
            'title' => 'Quản lý lịch đặt dịch vụ',
            'lichdatdvs' => $this->dicvudatService->choduyet(),

        ]);
    }

    public function index_daduyet()
    {

        return view('ChuShop.lichhen.index_daduyet', [
            'title' => 'Quản lý lịch đặt dịch vụ',
            'lichdatdvs' => $this->dicvudatService->daduyet(),

        ]);
    }

    public function index_hoanthanh()
    {
        return view('ChuShop.lichhen.index_hoanthanh', [
            'title' => 'Quản lý lịch đặt dịch vụ',
            'lichdatdvs' => $this->dicvudatService->hoanthanh(),
        ]);
    }

    public function show(DichVuDat $lichdatdv)
    {
        $lichdatdvs = $lichdatdv;

        $dichvu_dichvudat = DichVu_DichVuDat::where('dichvudat_id', $lichdatdvs->id)->get();

        $id_shop = $lichdatdvs->shop_id;

        $nhanvien = User::where('shop_id', $id_shop)->where('quyen_id', 4)->get();

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

        // Gọi hàm cập nhật dữ liệu từ
        $result = $this->dicvudatService->duyet($request, $lichdatdvs);

        if ($result) {
            return redirect('/ChuShop/lichdatdvs/list');
        }
    }
    public function show_daduyet(DichVuDat $lichdatdv)
    {
        $lichdatdvs = $lichdatdv;

        $dichvu_dichvudat = DichVu_DichVuDat::where('dichvudat_id', $lichdatdvs->id)->get();

        $id_shop = $lichdatdvs->shop_id;

        $listnhanvien = User::where('shop_id', $id_shop)->where('quyen_id', 4)->get();

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


        $result = $this->dicvudatService->update($request, $lichdatdvs);

        if ($result) {
            return redirect('/ChuShop/lichdatdvs/list_daduyet');
        }
    }
    public function show_hoanthanh(DichVuDat $lichdatdv)
    {
        $lichdatdvs = $lichdatdv;

        $dichvu_dichvudat = DichVu_DichVuDat::where('dichvudat_id', $lichdatdvs->id)->get();

        $id_shop = $lichdatdvs->shop_id;

        $listnhanvien = User::where('shop_id', $id_shop)->where('quyen_id', 4)->get();

        return view('ChuShop.lichhen.show_hoanthanh', [
            'title' => 'Quản lý lịch đặt dịch vụ',
            'lichdats' => $lichdatdvs,
            'dichvu_dichvudats' => $dichvu_dichvudat,

            'listnhanviens' => $listnhanvien,
        ]);
    }
}
