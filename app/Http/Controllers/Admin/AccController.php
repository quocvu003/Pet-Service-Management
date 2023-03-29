<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Services\AccService;

class AccController extends Controller
{
    protected $acc;
    public function __construct(AccService $acc)
    {
        $this->acc = $acc;
    }

    public function chuShop()
    {
        return view('admin.users.chuShop', [
            'title' => 'Danh Sách Tài Khoản Chủ Shop',
            'accs' => $this->acc->getChuShop()
        ]);
    }
    public function khachhang()
    {
        return view('admin.users.khachhang', [
            'title' => 'Danh Sách Tài Khoản Khách Hàng',
            'accs' => $this->acc->getkhachhang()
        ]);
    }
}
