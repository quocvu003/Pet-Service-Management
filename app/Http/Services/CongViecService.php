<?php


namespace App\Http\Services;

use App\Models\DichVu_DichVuDat;
use App\Models\DichVuDat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CongViecService
{
    public function list()
    {
        $id_user = Auth::user()->id;

        return DichVuDat::where('trangthai', 2)
            ->where('nhanvien_id', $id_user)->orderBy('ngay')
            ->paginate(10);
    }
    public function list_hoanthanh()
    {
        $id_user = Auth::user()->id;

        return DichVuDat::where('trangthai', 3)
            ->where('nhanvien_id', $id_user)->orderBy('ngay')
            ->paginate(10);
    }
    public function update_dichvudat($request, $dichvudats)
    {
        $dichvudat = $dichvudats;
        DichVu_DichVuDat::where('dichvudat_id', $dichvudat->id)->delete();
        $dichvudat->fill($request->input());
        $dichvudat->save();
        $dichvus = $request->input('dichvu');

        foreach ($dichvus as $dichvu_id) {
            $dichvudat_dv = new DichVu_DichVuDat([
                'dichvudat_id' => $dichvudat->id,
                'dichvu_id' =>  $dichvu_id,
            ]);
            $dichvudat_dv->save();
        }
        Session::flash('success', 'Công việc đã hoàn thành!');
        return true;
    }
}
