<?php

namespace App\Http\Services;

use App\Models\phithu;
use App\Models\Shop;

use Illuminate\Support\Facades\Session;

class FeeService
{
    public function getShop()
    {
        return Shop::select('id', 'ten')
            ->where('id', '<>', 0)

            ->orderByDesc('id')
            ->get();
    }
    public function insert($request)
    {
        $phithu = new PhiThu;
        $phithu->shop_id = $request->input('shop_id');

        $phithu->tien = $request->input('tien');
        $phithu->save();

        Session::flash('success', 'Thêm phí thu thành công');
        return  true;
    }
    public function getphithu()
    {

        return PhiThu::get();
    }
}
