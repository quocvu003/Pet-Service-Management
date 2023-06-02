<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\DanhMucService;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

class DanhmucController extends Controller
{
    protected $danhmucService;
    public function __construct(DanhMucService $danhmucService)
    {
        $this->danhmucService = $danhmucService;
    }

    public function create()
    {
        return view('admin.menu.add', [
            'title' => 'Thêm dịch vụ',

        ]);
    }
    public function store(Request $request)
    {
        $this->danhmucService->create($request);
        return redirect()->back();
    }

    public function index()
    {
        return view('admin.menu.list', [
            'title' => 'Danh sách Danh Mục',
            'danhmucs' => $this->danhmucService->getAll(),
        ]);
    }
    public function requestdv()
    {
        return view('admin.menu.request', [
            'title' => 'Danh mục được yêu cầu thêm từ các Shop',
            'danhmucs' => $this->danhmucService->requestdv(),
        ]);
    }
    public function indexshop()
    {
        return view('ChuShop.danhmuc.index', [
            'title' => 'Danh sách Danh Mục',
            'danhmucs' => $this->danhmucService->getAll(),
        ]);
    }
    public function storeshop(Request $request)
    {
        $this->danhmucService->createshop($request);
        return redirect()->back();
    }
    public function show(DanhMuc $danhmuc)
    {
        return view('admin.menu.edit', [
            'title' => 'Chỉnh sửa danh mục:' . $danhmuc->ten,
            'danhmuc' => $danhmuc,

        ]);;
    }
    public function show_requestdv(DanhMuc $danhmuc)
    {
        return view('admin.menu.edit_requestdv', [
            'title' => 'Xem yêu cầu: ' . $danhmuc->ten,
            'danhmuc' => $danhmuc,

        ]);;
    }
    public function update_requestdv(DanhMuc $danhmuc, Request $request)
    {
        $this->danhmucService->update_requestdv($request, $danhmuc);
        return redirect('/admin/danhmucs/list');
    }
    public function update(DanhMuc $danhmuc, Request $request)
    {
        $this->danhmucService->update($request, $danhmuc);
        return redirect('/admin/danhmucs/list');
    }
    public function destroy(Request $request)
    {
        $result = $this->danhmucService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công'
            ]);
        }
        return response()->json([
            'error' => true,

        ]);
    }
}
