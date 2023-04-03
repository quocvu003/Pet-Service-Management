<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller

{
    public function register()
    {
        $data['title'] = 'Register';
        return view('register', $data);
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:filter',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ], [
            'email.required' => 'Bạn chưa nhập email',
            'name.required' => 'Bạn chưa nhập tên',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'confirm_password.required' => 'Mật khẩu không trùng khớp',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 3,
        ]);
        $user->save();

        return redirect()->route('login');
    }


    public function login()
    {
        $data['title'] = 'Login';
        return view('login', $data);
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required|email:filter',
            'password' => 'required',
        ], [
            'email.required' => 'Bạn chưa nhập email',
            'password.required' => 'Bạn chưa nhập mật khẩu',
        ]);
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $dataUser = User::where('email', $request->email)->first();
        if (!$dataUser) {
            return redirect('login')->with('error', 'Tài khoản không tồn tại');
        }
        if ($dataUser->trangthai != 1) {
            return redirect('login')->with('error', 'Tài khoản của bạn đang bị khóa');
        }
        if ($dataUser->role_id == 1) {
            if (Auth::attempt($arr)) {
                return redirect('admin');
            }
        }
        if ($dataUser->role_id == 2) {
            if (Auth::attempt($arr)) {
                return redirect('ChuShop');
            }
        }
        if ($dataUser->role_id == 3) {
            if (Auth::attempt($arr)) {
                return redirect('/');
            }
        }
        return redirect('login')->with('error', 'Sai tài khoản hoặc mật khẩu');
    }

    public function password()
    {
        $data['title'] = 'Change Password';
        return view('user/password', $data);
    }

    public function password_action(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return back()->with('success', 'Password changed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
