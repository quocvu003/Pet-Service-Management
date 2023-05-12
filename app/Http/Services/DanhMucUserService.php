<?php

namespace App\Http\Services;

use App\Models\DanhMuc;
use App\Models\DichVu;
use App\Models\Shop;
use Illuminate\Support\Facades\Session;

class DanhMucUserService
{
    public function show()
    {
        return DanhMuc::orderBy('id')
            ->where('trangthai', 1)
            ->get();
    }
    public function getdichvu($id)
    {
        return DichVu::where('danhmuc_id', $id)
            ->get();
    }
}
