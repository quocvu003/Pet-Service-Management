<?php


namespace App\Http\Services;


use Illuminate\Support\Facades\Session;
use App\Models\User;

use Illuminate\Support\Facades\Auth;


class NhanvienService
{
    public function getnhanvien()
    {
        $current_user = Auth::user();
        // Lấy shop_id của tài khoản hiện tại
        $shop_id = $current_user->shop_id;
        return User::where('quyen_id', 4)
            ->where('shop_id', $shop_id)
            ->get();
    }
    public function create($request)
    {
        $request->validate([
            'email' => 'required|email:filter',
            'password' => 'required',
            'password_confirmation' => 'same:password',
        ], [
            'email.required' => 'Bạn chưa nhập email',
            'ten.required' => 'Bạn chưa nhập tên',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'confirm_password.same' => 'Mật khẩu không trùng khớp',
        ]);
        // Lấy tài khoản hiện tại
        $current_user = Auth::user();
        // Lấy shop_id của tài khoản hiện tại
        $shop_id = $current_user->shop_id;
        try {
            User::create([
                'shop_id' =>  $shop_id,
                'ten' => $request->name,
                'email' => $request->email,
                'matkhau' => bcrypt($request->password),
                'quyen_id' => 4,
            ]);
            Session::flash('success', 'Tạo tài khoản thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    public function update($request, $acc)
    {

        $acc->ten = $request->ten;
        $acc->email = $request->email;
        $acc->sdt = $request->sdt;
        $acc->hinhanh = $request->hinhanh;
        $acc->diachi = $request->diachi;
        $acc->save();


        Session::flash('success', 'Cập nhật tài khoản thành công');
        return true;
    }
}
