<?php

namespace App\Http\Services;

use App\Jobs\SendMail;
use App\Jobs\SendMailShop;
use App\Models\DichVu;
use App\Models\DichVu_DichVuDat;
use App\Models\DichVuDat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DichVuDatService
{

    public function create($request)
    {
        $request->validate([
            'ngay' => 'required',
            'sdt' => 'required',
            'gio' => 'required',
            'loaithucung' => 'required',

        ], [
            'ngay.required' => 'Bạn chưa chọn ngày',
            'sdt.required' => 'Bạn chưa nhập số điện thoại',
            'gio.required' => 'Bạn chưa chọn giờ',
            'loaithucung.required' => 'Bạn chưa chọn loại thú cưng',

        ]);
        $dichVuDat = new DichVuDat([
            'shop_id' => $request->input('shop_id'),
            'ten' =>  $request->input('ten'),
            'email' =>  $request->input('email'),
            'sdt' =>  $request->input('sdt'),
            'ngay' =>  $request->input('ngay'),
            'gio' =>  $request->input('gio'),
            'loaithucung' =>  $request->input('loaithucung'),
            'taikhoan_id' =>  $request->input('taikhoan_id'),
            'tongtien' =>  $request->input('tongtien'),
            "trangthai" => 1
        ]);
        $dichVuDat->save();

        $dichvus = $request->input('dichvu');

        foreach ($dichvus as $dichvu_id) {
            $dichVuDat_dv = new DichVu_DichVuDat([
                'dichvudat_id' => $dichVuDat->id,
                'dichvu_id' =>  $dichvu_id,
            ]);
            $dichVuDat_dv->save();
        }
        Session::flash('success', 'Đặt dịch vụ thành công. Vui lòng chờ chủ Shop duyệt!');
    }
    public function choduyet()
    {
        $current_user = Auth::user();
        // Lấy shop_id của tài khoản hiện tại
        $shop_id = $current_user->shop_id;
        return DichVuDat::where('trangthai', 1)
            ->where('shop_id', $shop_id)->orderBy('ngay')
            ->paginate(10);
    }
    public function daduyet()
    {
        $current_user = Auth::user();
        // Lấy shop_id của tài khoản hiện tại
        $shop_id = $current_user->shop_id;

        return DichVuDat::where('trangthai', 2)
            ->where('shop_id', $shop_id)->orderBy('ngay')
            ->paginate(10);
    }
    public function hoanthanh()
    {
        $current_user = Auth::user();
        // Lấy shop_id của tài khoản hiện tại
        $shop_id = $current_user->shop_id;
        return DichVuDat::where('trangthai', 3)
            ->where('shop_id', $shop_id)->orderBy('ngay')
            ->paginate(10);
    }
    public function duyet($request, $lichdatdv)
    {
        $lichdatdv->nhanvien_id = $request->input('nhanvien');
        $lichdatdv->trangthai = $request->input('trangthai');
        $lichdatdv->save();

        Session::flash('success', 'Duyệt thành công');
        #Queue
        SendMailShop::dispatch($request->input('email'))->delay(now()->addSeconds(5));
        return true;
    }
    public function list()
    {
        $taikhoan_id = Auth::user()->id;
        return DichVuDat::where('taikhoan_id', '=', $taikhoan_id)->orderBy('trangthai')
            ->paginate(10);
    }
    public function update_daduyet($request, $lichdatdv)
    {
        $lichdatdv->fill($request->input());
        $lichdatdv->save();

        Session::flash('success', 'Duyệt thành công');
        return true;
    }
    public function update_dichvudat($request, $dichvudats)
    {
        $dichvudat = $dichvudats;
        DichVu_DichVuDat::where('dichvudat_id', $dichvudat->id)->delete();
        $dichvudat->fill($request->input());
        $dichvudat->save();
        $dichvus = $request->input('dichvu');

        foreach ($dichvus as $dichvu_id) {
            $dichvudat_dv = new DichVu_DichVuDat([
                'dichvudat_id' => $dichvudat->id,
                'dichvu_id' =>  $dichvu_id,
            ]);
            $dichvudat_dv->save();
        }
        Session::flash('success', 'Cập nhật thành công');
        return true;
    }
}
