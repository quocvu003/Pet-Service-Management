<?php


namespace App\Http\Services;

use App\Models\DichVuDat;
use Illuminate\Support\Facades\Auth;

class CongViecService
{
    public function list()
    {
        $id_user = Auth::user()->id;

        return DichVuDat::where('trangthai', 2)
            ->where('nhanvien', $id_user)->orderBy('ngay')
            ->paginate(10);
    }
}
