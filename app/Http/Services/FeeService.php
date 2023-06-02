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
        $request->validate([
            'tien' => 'required|numeric',
        ], [
            'tien.required' => 'Bạn chưa nhập tiền',
            'tien.numeric' => 'Tiền phải là một số',
        ]);

        $shopId = $request->input('shop_id');
        $tien = $request->input('tien');

        $phithu = PhiThu::firstOrNew(['shop_id' => $shopId]);
        $phithu->tien += $tien;
        $phithu->save();

        Session::flash('success', 'Thêm phí thu thành công');
        return true;
    }


    public function getphithu()
    {

        return Shop::where('id', '<>', 0)->with('users')->with('phithus')->paginate(10);
    }
}
