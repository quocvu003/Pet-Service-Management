<?php

namespace App\Http\Services;

use App\Models\DichVu;
use App\Models\DichVu_DichVuDat;
use App\Models\DichVuDat;
use Illuminate\Support\Facades\Session;

class DichVuDatService
{

    public function create($request)
    {
        $dichVuDat = new DichVuDat([
            'shop_id' => $request->input('shop_id'),
            'ten' =>  $request->input('ten'),
            'email' =>  $request->input('email'),
            'sdt' =>  $request->input('sdt'),
            'ngay' =>  $request->input('ngay'),
            'gio' =>  $request->input('gio'),
            'loaithucung' =>  $request->input('loaithucung'),
            'taikhoan_id' =>  $request->input('taikhoan_id'),
            'tongtien' =>  $request->input('tongtien'),
            "trangthai" => 1


        ]);
        $dichVuDat->save();

        $dichvus = $request->input('dichvu');


        foreach ($dichvus as $dichvu_id) {
            $dichVuDat_dv = new DichVu_DichVuDat([
                'dichvudat_id' => $dichVuDat->id,
                'dichvu_id' =>  $dichvu_id,

            ]);
            $dichVuDat_dv->save();
        }
    }
}
