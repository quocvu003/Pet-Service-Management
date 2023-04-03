<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Http\Services\AccService;
use Illuminate\Http\Request;

class AccController extends Controller
{
    protected $AccService;
    public function __construct(AccService $AccService)
    {
        $this->AccService = $AccService;
    }

    public function create()
    {
        return view('admin.acc.add', [
            'title' => 'Thêm Tài Khoản Mới',
        ]);
    }


    public function store(Request $request)
    {
        $this->AccService->create($request);
        return redirect()->back();
    }

    public function admin()
    {
        return view('admin.acc.chuShop', [
            'title' => 'Danh Sách Tài Khoản Chủ Shop',
            'accs' => $this->AccService->getadmin()
        ]);
    }
    public function chuShop()
    {
        return view('admin.acc.chuShop', [
            'title' => 'Danh Sách Tài Khoản Chủ Shop',
            'accs' => $this->AccService->getChuShop()
        ]);
    }
    public function khachhang()
    {
        return view('admin.acc.khachhang', [
            'title' => 'Danh Sách Tài Khoản Khách Hàng',
            'accs' => $this->AccService->getkhachhang()
        ]);
    }
    public function show(User $acc)
    {
        return view('admin.acc.edit', [
            'title' => 'Chỉnh sửa tài khoản:' . $acc->name,
            'acc' => $acc,

        ]);
    }
    public function update(Request $request, User $acc)
    {
        $result = $this->AccService->update($request, $acc);
        if ($result) {
            return redirect('/admin');
        }

        return redirect()->back();
    }
}
