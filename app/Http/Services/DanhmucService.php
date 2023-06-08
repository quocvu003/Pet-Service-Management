<?php

namespace App\Http\Services;

use App\Models\DanhMuc;
use App\Models\DichVu;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DanhMucService
{
    public function getdichvu()
    {
        return DanhMuc::where('trangthai', 1)
            ->get();
    }
    public function getbanner()
    {
        return DichVu::where('trangthai', 1)
            ->get();
    }

    public function getdanhmuc()
    {
        $dichvus = DichVu::where('trangthai', '=', 1)->pluck('danhmuc_id')->toArray();
        return DanhMuc::where('trangthai', '=', 1)
            ->whereIn('id', $dichvus)
            ->get();
    }
    public function getdanhmucshop()
    {

        return DanhMuc::where('trangthai', 1)->paginate(10);
    }
    public function getAll()
    {

        return DanhMuc::where('trangthai', 1)->paginate(10);
    }
    public function requestdv()
    {
        return DanhMuc::where('trangthai', 2)
            ->paginate(10);
    }

    public function show()
    {
        return DanhMuc::select('ten', 'id')

            ->where('trangthai', 1)
            ->orderbyDesc('id')
            ->get();
    }


    public function create($request)
    {
        $request->validate([
            'name' => 'required',
            'tieude' => 'required',
            'content' => 'required',
            'hinhanh' => 'required',

        ], [
            'name.required' => 'Bạn chưa nhập tên',
            'tieude.required' => 'Bạn chưa nhập tiêu đề',
            'content.required' => 'Bạn chưa nhập mô tả',
            'hinhanh.required' => 'Bạn chưa nhập hình ảnh',
        ]);
        try {
            DanhMuc::create([
                'ten' =>  $request->input('name'),
                'tieude' =>  $request->input('tieude'),
                'mota' =>  $request->input('content'),
                'hinhanh' =>  $request->input('hinhanh'),
                'trangthai' => 1,

            ]);

            Session::flash('success', 'Tạo Danh mục thành công');
        } catch (\Exception) {
            Session::flash('error', 'Tạo Danh mục lỗi');
            return false;
        }
        return true;
    }
    public function createyeucau($request)
    {
        $shop_id = Auth::user()->shop_id;
        $tenshop = Shop::where('id', $shop_id)->first()->ten;

        $request->validate([
            'ten' => 'required',
            'tieude' => 'required',
            'mota' => 'required',
        ], [
            'ten.required' => 'Bạn chưa nhập tên',
            'tieude.required' => 'Bạn chưa nhập tiêu đề',
            'mota.required' => 'Bạn chưa nhập mô tả',
        ]);
        try {
            DanhMuc::create([
                'ten' =>  $request->input('ten'),
                'tieude' =>  $request->input('tieude'),
                'mota' =>  $request->input('mota'),
                'tenshop' =>  $tenshop,
                'trangthai' => 2,
            ]);

            Session::flash('success', 'Gửi yêu cầu thành công');
        } catch (\Exception $error) {
            // dd($error);
            Session::flash('error', 'Gửi yêu cầu lỗi');
            return false;
        }
        return true;
    }
    public function update($request, $danhmuc): bool
    {
        $danhmuc->ten = $request->input('name');
        $danhmuc->tieude =  $request->input('tieude');
        $danhmuc->mota =  $request->input('content');
        $danhmuc->trangthai = $request->input('trangthai');
        $danhmuc->hinhanh = $request->input('hinhanh');
        $danhmuc->save();
        Session::flash('success', 'Cập nhật danh mục thành công');
        return true;
    }
    public function update_requestdv($request, $danhmuc): bool
    {
        // dd($request->trangthai);
        $danhmuc->ten = $request->input('name');
        $danhmuc->tieude =  $request->input('tieude');
        $danhmuc->mota =  $request->input('content');
        $danhmuc->trangthai = $request->input('trangthai');
        $danhmuc->hinhanh = $request->input('hinhanh');
        $danhmuc->save();
        Session::flash('success', 'Cập nhật danh mục thành công');
        return true;
    }
    public function destroy($request)
    {
        $id = (int) $request->input('id');
        $DanhMuc = DanhMuc::where('id', $id)->first();

        if ($DanhMuc) {
            return DanhMuc::where('id', $DanhMuc->id)->delete();
        }
        return false;
    }




    // admin
    public function getId($id)
    {
        return DanhMuc::where('id', $id)->where('trangthai', 1)->firstOrFail();
    }
}
