<?php

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use App\Http\Services\DichVuDatService;
use Illuminate\Http\Request;

class DichVuDatController extends Controller
{
    protected $dichvudat;

    public function __construct(DichVuDatService $dichvudat)
    {

        $this->dichvudat = $dichvudat;
    }
    public function store(Request $request)
    {
        $this->dichvudat->create($request);
        return redirect()->back();
    }
}
