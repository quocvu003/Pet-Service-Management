<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller

{

    public function register()
    {
        $data['title'] = 'Đăng ký tài khoản';
        return view('register', $data);
    }


    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:filter',
            'password' => 'required',
            'confirm_password' => 'same:password',
        ], [
            'email.required' => 'Bạn chưa nhập email',
            'name.required' => 'Bạn chưa nhập tên',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'confirm_password.same' => 'Mật khẩu không trùng khớp',
        ]);

        $user = new User([
            'ten' => $request->name,
            'email' => $request->email,
            'matkhau' => bcrypt($request->password),
            'quyen_id' => 3,
        ]);
        $user->save();

        return redirect()->route('login');
    }


    public function login()
    {
        $data['title'] = 'Đăng nhập Petcare';
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

        if ($dataUser->trangthai == 0) {
            return redirect('login')->with('error', 'Tài khoản của bạn đang bị khóa');
        }
        if ($dataUser->trangthai == 1) {
            if ($dataUser->quyen_id == 1) {
                if (Auth::attempt($arr)) {
                    return redirect('admin');
                }
            }
            if ($dataUser->quyen_id == 2) {
                if (Auth::attempt($arr)) {
                    return redirect('ChuShop');
                }
            }
            if ($dataUser->quyen_id == 3) {
                if (Auth::attempt($arr)) {
                    return redirect('/');
                }
            }
        }
        if ($dataUser->trangthai == 2) {
            return redirect('login')
                ->with('error', 'Đơn đăng ký trở thành chủ Shop của bạn đang chờ Quản trị viên duyệt.')
                ->with('success', 'Chúng tôi sẽ thông báo qua Email khi đơn của bạn được duyệt!');
        }
        return redirect('login')->with('error', 'Sai tài khoản hoặc mật khẩu');
    }

    public function register_seller()
    {
        $data['title'] = 'Đăng ký trở thành chủ Shop';
        return view('register_seller', $data);
    }
    public function register_seller_action(Request $request)
    {
        $request->validate([
            'email' => 'required|email:filter',
            'password' => 'required',
            'confirm_password' => 'same:password',
        ], [
            'email.required' => 'Bạn chưa nhập email',
            'name.required' => 'Bạn chưa nhập tên',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'confirm_password.same' => 'Mật khẩu không trùng khớp',
        ]);

        $shop = new Shop([
            'ten' => $request->nameshop,
            'diachi' => $request->diachishop,
            'sdt' => $request->sdtshop,
            'hinhanh' => $request->hinhanh,
        ]);
        $shop->save();
        $user = new User([
            'shop_id' => $shop->id,
            'ten' => $request->name,
            'email' => $request->email,
            'matkhau' => bcrypt($request->password),
            'quyen_id' => 2,
            'trangthai' => 2,
        ]);
        $user->save();

        return redirect()->route('login');
    }



    public function verification()
    {
        return view('verification', [
            'title' => 'Đăng ký trở thành chủ Shop',

        ]);
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
        $user->password = bcrypt($request->new_password);
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
