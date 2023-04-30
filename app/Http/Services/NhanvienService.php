<?php


namespace App\Http\Services;


use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NhanvienService
{
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
                'quyen_id' => 2,
                'trangthai' => 3,
            ]);
            Session::flash('success', 'Tạo tài khoản thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    public function getnhanvien()

    {
        $current_user = Auth::user();
        // Lấy shop_id của tài khoản hiện tại
        $shop_id = $current_user->shop_id;
        return User::where('trangthai', 3)
            ->where('shop_id', $shop_id)
            ->get();
    }
}
