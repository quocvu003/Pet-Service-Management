<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\FeeService;

class FeeController extends Controller
{
    protected $FeeService;
    public function __construct(FeeService $FeeService)
    {
        $this->FeeService = $FeeService;
    }
    public function create()
    {
        return view('admin.fee.add', [
            'title' => 'Thêm Phí Thu Mới',
            'fees' => $this->FeeService->getShop()
        ]);
    }

    public function store(Request $request)
    {
        $this->FeeService->insert($request);
        return redirect()->back();
    }
    public function list()
    {
        // dd($this->FeeService->getphithu());
        return view('admin.fee.list', [
            'title' => 'Danh Sách Phí Thu',
            'shops' => $this->FeeService->getphithu()
        ]);
    }
}
