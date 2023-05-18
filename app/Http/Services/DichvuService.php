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
        return DanhMuc::where('trangthai', 1)
            ->get();
    }
    public function create($request)
    {
        $request->validate([
            'ten' => 'required',

            'gia' => 'required',
        ], [
            'ten.required' => 'Bạn chưa nhập tên',

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


            ]);
            Session::flash('success', 'Tạo dịch vụ thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }


    public function dvshop($danhmuc)
    {
        return $danhmuc->dichvus()
            ->where('trangthai', 1)
            ->orderBy('id')
            ->get();
    }
    public function show($id)
    {
        return DichVu::where('id', $id)
            ->where('trangthai', 1)
            ->with('danhmucs')
            ->firstOrFail();
    }

    public function update($request, $acc)
    {
        $request->validate([
            'ten' => 'required',

            'gia' => 'required',
        ], [
            'ten.required' => 'Bạn chưa nhập tên',

            'gia.required' => 'Bạn chưa nhập giá',

        ]);

        $acc->fill($request->input());
        $acc->save();
        Session::flash('success', 'Cập nhật dịch vụ thành công');
        return true;
    }
}
