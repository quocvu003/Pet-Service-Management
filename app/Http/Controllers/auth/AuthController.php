<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Jobs\DoiMatKhau;
use App\Mail\Matkhau;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

        return redirect()->route('login')->with('success', 'Tạo tài khoản thành công! Đăng nhập để khám phá tất cả dịch vụ của chúng tôi.');;
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
            if ($dataUser->quyen_id == 4) {
                if (Auth::attempt($arr)) {
                    return redirect('/NhanVien');
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
            'trangthai' => 2,
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

        return redirect('login')
            ->with('error', 'Đơn đăng ký trở thành chủ Shop của bạn đang chờ Quản trị viên duyệt.')
            ->with('success', 'Chúng tôi sẽ thông báo qua Email khi đơn của bạn được duyệt!');
    }
    public function reset_password()
    {
        $email = Auth::user()->email;
        return view('reset_password', [
            'title' => 'Đổi mật khẩu',
            'email' => $email,
        ]);
    }
    public function reset_password_action(Request $request, User $user)
    {
        // Lấy dữ liệu từ request
        $currentPassword = $request->input('current_password');
        $newPassword = $request->input('new_password');
        $confirmPassword = $request->input('confirm_password');

        // Kiểm tra mật khẩu hiện tại của người dùng
        if (!Hash::check($currentPassword, Auth::user()->matkhau)) {
            // Mật khẩu hiện tại không khớp, hiển thị thông báo lỗi
            return redirect()->back()->with('error', 'Mật khẩu hiện tại không đúng');
        }

        if ($newPassword == $currentPassword) {

            return redirect()->back()->with('error', 'Bạn đã nhập mật khẩu cũ');
        }

        if ($newPassword !== $confirmPassword) {

            return redirect()->back()->with('error', 'Xác nhận mật khẩu mới không khớp');
        }



        $user->matkhau = Hash::make($newPassword);
        $user->save();

        // Đã cập nhật mật khẩu thành công, hiển thị thông báo thành công
        return redirect('login')->with('success', 'Mật khẩu đã được cập nhật thành công');
    }

    public function forgot_password()
    {

        return view('forgot_password', [
            'title' => 'Quên mật khẩu',

        ]);
    }

    public function forgot_password_action(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect('login')->with('error', 'Email không tồn tại');
        }
        $randomString = Str::random(6);

        $user->matkhau = bcrypt($randomString);
        $user->save();

        dispatch((new DoiMatKhau($request->email, $randomString))->delay(now()->addSeconds(5)));

        return redirect('login')->with('success', 'Mật khẩu mới đã được gửi tới Email của bạn!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
