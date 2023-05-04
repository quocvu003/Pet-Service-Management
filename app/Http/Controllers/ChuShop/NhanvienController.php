<?php

namespace App\Http\Controllers\ChuShop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\NhanvienService;
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
    // public function updateshop(Request $request)
    // {
    //     $user = Auth::user(); // Lấy bản ghi của bảng users dựa trên $id truyền vào

    //     // Lấy đối tượng của bảng shops mà có khóa ngoại là user_id
    //     $shop = $user->shops;

    //     // Gọi hàm cập nhật dữ liệu từ AccService
    //     $result = $this->nhanvienService->updateshop($request, $user, $shop);

    //     if ($result) {
    //         return redirect()->back();
    //     }
    // }
}
