<?php

namespace App\Http\Controllers\ChuShop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\NhanvienService;
use App\Models\Shop;
use App\Models\User;

class NhanvienController extends Controller
{
    protected $nhanvienService;

    public function __construct(NhanvienService $nhanvienService)
    {
        $this->nhanvienService = $nhanvienService;
    }
    public function index(User $acc)
    {

        $user = $acc;

        // Lấy danh sách shop của user
        $shops = $user->shops;
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
            'shops',
        ]);
    }
}
