<?php

namespace App\Http\Controllers\ChuShop;

use App\Http\Controllers\Controller;
use App\Http\Services\DichvuService;
use App\Models\DichVu;
use Illuminate\Http\Request;

class DichvuController extends Controller
{
    protected $dicvuService;

    public function __construct(DichvuService $dicvuService)
    {
        $this->dicvuService = $dicvuService;
    }
    public function index()
    {
        return view('ChuShop.dichvu.index', [
            'title' => 'Quản lý dịch vụ thú cưng',
            'dichvus' => $this->dicvuService->getdichvu(),
            'menus' => $this->dicvuService->getdanhmuc()
        ]);
    }
    public function store(Request $request)
    {
        $this->dicvuService->create($request);
        return view('ChuShop.dichvu.index', [
            'title' => 'Quản lý dịch vụ thú cưng',
            'dichvus' => $this->dicvuService->getdichvu(),
            'menus' => $this->dicvuService->getdanhmuc()
        ]);
    }
    public function show(DichVu $dichvu)
    {
        $dv = $dichvu;
        return view('ChuShop.dichvu.index', [
            'title' => 'Quản lý dịch vụ thú cưng',
            'dichvus' => $this->dicvuService->getdichvu(),
            'menus' => $this->dicvuService->getdanhmuc(),

        ]);
    }
}
