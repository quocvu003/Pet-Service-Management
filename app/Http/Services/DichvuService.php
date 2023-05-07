<?php


namespace App\Http\Services;

use App\Models\DanhMuc;
use App\Models\DichVu;
use Illuminate\Support\Facades\Session;


use Illuminate\Support\Facades\Auth;


class DichvuService
{
    public function getdichvu()
    {
        $current_user = Auth::user();
        // Lấy shop_id của tài khoản hiện tại
        $shop_id = $current_user->shop_id;
        return DichVu::with('danhmucs')
            ->where('shop_id', $shop_id)
            ->get();
    }
    public function getdanhmuc()
    {
        return DanhMuc::where('danhmuccha', '<>', 0)
            ->where('trangthai', 1)
            ->get();
    }
    public function create($request)
    {
        $request->validate([
            'ten' => 'required',
            'hinhanh' => 'required',
            'gia' => 'required',
        ], [
            'ten.required' => 'Bạn chưa nhập tên',
            'hinhanh.required' => 'Bạn chưa nhập hình ảnh',
            'gia.required' => 'Bạn chưa nhập giá',

        ]);
        // Lấy tài khoản hiện tại
        $current_user = Auth::user();
        // Lấy shop_id của tài khoản hiện tại
        $shop_id = $current_user->shop_id;

        try {
            DichVu::create([
                'shop_id' =>  $shop_id,
                'danhmuc_id' =>  $request->danhmuc_id,
                'ten' => $request->ten,
                'gia' => $request->gia,
                'hinhanh' =>  $request->hinhanh,
                'mota' =>  $request->mota,
            ]);
            Session::flash('success', 'Tạo dịch vụ thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    //admin
    public function get()
    {
        return DichVu::orderBy('id')
            ->get();
    }
    public function dvshop($danhmuc)
    {

        return $danhmuc->dichvus()

            ->where('trangthai', 1)
            ->orderBy('id')
            ->get();
    }
}
