<?php


namespace App\Http\Services;

use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AccService
{
    public function getadmin()
    {
        return User::where('role_id', 1)->get();
    }
    public function getChuShop()
    {
        return User::where('role_id', 2)->get();
    }
    public function getkhachhang()
    {
        return User::where('role_id', 3)->get();
    }
    public function create($request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:filter',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        try {
            User::create([
                'name' => (string) $request->input('name'),
                'email' => (string) $request->input('email'),
                'password' => Hash::make($request->password),
                'role_id' => (string) $request->input('role_id'),

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
        $oldPasswordHash = $acc->password;

        // Giả sử đây là mật khẩu mới nhập từ input
        $newPassword = $request->password;

        if (Hash::check($newPassword, $oldPasswordHash)) {
        } else {
            $acc->password = Hash::make($request->password);
        }
        $acc->name = (string) $request->input('name');
        $acc->email = (string) $request->input('email');

        $acc->trangthai = (string) $request->input('active');
        $acc->role_id = (string) $request->input('role_id');
        $acc->save();

        Session::flash('success', 'Cập nhật tài khoản thành công');
        return true;
    }
}
