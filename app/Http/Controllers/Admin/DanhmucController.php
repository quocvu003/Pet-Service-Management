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
            'title' => 'Thêm danh mục',
            'danhmucs' => $this->danhmucService->getParent()
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
            'title' => 'Danh sách Danh mục mới nhất',
            'danhmucs' => $this->danhmucService->getAll()
        ]);
    }

    public function show(DanhMuc $danhmuc)
    {
        return view('admin.menu.edit', [
            'title' => 'Chỉnh sửa danh mục:' . $danhmuc->ten,
            'danhmuc' => $danhmuc,
            'danhmucs' => $this->danhmucService->getParent()
        ]);;
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
                'masager' => 'Xóa thành công'
            ]);
        }
        return response()->json([
            'error' => true,
        ]);
    }
}
