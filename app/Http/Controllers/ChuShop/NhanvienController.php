<?php

namespace App\Http\Controllers\ChuShop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\NhanvienService;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NhanvienController extends Controller
{
    protected $nhanvienService;

    public function __construct(NhanvienService $nhanvienService)
    {
        $this->nhanvienService = $nhanvienService;
    }
    public function index()
    {
        return view('ChuShop.nhanvien.index', [
            'title' => 'Quản lý tài khoản nhân viên',
            'accs' => $this->nhanvienService->getnhanvien()
        ]);
    }
    public function store(Request $request)
    {
        $this->nhanvienService->create($request);
        return view('ChuShop.nhanvien.index', [
            'title' => 'Quản lý tài khoản nhân viên',
            'accs' => $this->nhanvienService->getnhanvien()
        ]);
    }
    public function profile()
    {
        $user = Auth::user();


        return view('NhanVien.profile.index', [
            'title' => 'Trang Cá Nhân',
            'user' => $user,


        ]);
    }
    public function show()
    {
        $user = Auth::user();
        return view('NhanVien.profile.edit', [
            'title' => 'Chỉnh Sửa Trang Cá Nhân',
            'user' => $user,

        ]);
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        $result = $this->nhanvienService->update($request, $user);
        if ($result) {
            return redirect('/NhanVien/profiles/index');
        }
    }
}
