<?php

namespace App\Http\Services;

use App\Jobs\Duyet_LichDat;
use App\Jobs\SendMail;
use App\Jobs\SendMailShop;
use App\Jobs\TuChoi_LichDat;
use App\Mail\Duyet;
use App\Mail\TuChoi;
use App\Models\DichVu;
use App\Models\DichVu_DichVuDat;
use App\Models\DichVuDat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;

class DichVuDatService
{

    public function create($request)
    {
        $request->validate([
            'ngay' => 'required',
            'sdt' => 'required',
            'gio' => 'required',
            'loaithucung' => 'required',
            'dichvu' => 'required',
        ], [
            'ngay.required' => 'Bạn chưa chọn ngày',
            'sdt.required' => 'Bạn chưa nhập số điện thoại',
            'gio.required' => 'Bạn chưa chọn giờ',
            'loaithucung.required' => 'Bạn chưa chọn loại thú cưng',
            'dichvu.required' => 'Bạn chưa chọn dịch vụ',

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
        Session::flash('success', 'Đặt dịch vụ thành công. Chúng tôi sẽ thông báo qua Mail ngay khi dịch vụ được duyệt!');
    }
    public function choduyet()
    {
        $current_user = Auth::user();
        $shop_id = $current_user->shop_id;
        $lichdatdvs = DichVuDat::where('trangthai', 1)
            ->where('shop_id', $shop_id)
            ->orderBy('ngay')
            ->get();

        return $lichdatdvs;
    }

    public function daduyet()
    {
        $current_user = Auth::user();
        // Lấy shop_id của tài khoản hiện tại
        $shop_id = $current_user->shop_id;

        $lichdatdvs = DichVuDat::where('trangthai', 2)
            ->where('shop_id', $shop_id)->orderBy('ngay')
            ->paginate(10);
        return $lichdatdvs;
    }
    public function hoanthanh()
    {
        $current_user = Auth::user();
        // Lấy shop_id của tài khoản hiện tại
        $shop_id = $current_user->shop_id;
        $lichdatdvs = DichVuDat::where('trangthai', 3)
            ->where('shop_id', $shop_id)->orderBy('ngay')
            ->paginate(17);
        return $lichdatdvs;
    }
    public function tuchoi()
    {
        $current_user = Auth::user();
        // Lấy shop_id của tài khoản hiện tại
        $shop_id = $current_user->shop_id;
        $lichdatdvs =  DichVuDat::where('trangthai', 4)
            ->where('shop_id', $shop_id)->orderBy('ngay')
            ->paginate(10);
        return $lichdatdvs;
    }
    public function duyet($request, $lichdatdv)
    {
        $email = $request->email;
        $lichdatdv->nhanvien_id = $request->nhanvien_id;
        $lichdatdv->trangthai = $request->status;
        $lichdatdv->save();

        if ($lichdatdv->trangthai == 4) {

            dispatch((new TuChoi_LichDat($email, $lichdatdv))->delay(now()->addSeconds(5)));
        }

        if ($lichdatdv->trangthai == 2) {
            if (!$request->nhanvien_id) {
                Session::flash('error', 'Bạn chưa chọn nhân viên');
                return false;
            }

            dispatch((new Duyet_LichDat($email, $lichdatdv))->delay(now()->addSeconds(5)));
        }

        return $lichdatdv;
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

        Session::flash('success', 'Cập nhật thành công');
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
    public function destroy($request)
    {

        // DichVu_DichVuDat::where('dichvudat_id', $dichvudat->id)->delete();
        DichVuDat::where('id', $request->input('id'))->delete();

        Session::flash('success', 'Xóa thành công');
        return true;
    }
}
