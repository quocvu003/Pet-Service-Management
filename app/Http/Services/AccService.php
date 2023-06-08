<?php


namespace App\Http\Services;

use App\Jobs\Duyet_Shop;
use App\Jobs\TuChoi_Shop;
use App\Models\Shop;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AccService
{


    public function getadmin()
    {
        return User::where('quyen_id', 1)->paginate(10);
    }

    public function getappli()
    {

        return  User::with('shops')
            ->where('quyen_id', '=', 2)
            ->where('trangthai', '=', 2)

            ->paginate(10);
    }

    public function getUsersWithShops()
    {
        return  User::with('shops')
            ->where('quyen_id', '=', 2)
            ->where('trangthai', '<>', 2)
            ->paginate(9);
    }

    public function getkhachhang()
    {
        return User::where('quyen_id', 3)->paginate(9);
    }
    public function create($request)
    {
        $request->validate([
            'ten' => 'required',
            'email' => 'required|email:filter',
            'password' => 'required',
            'password_confirmation' => 'same:password',
        ], [
            'email.required' => 'Bạn chưa nhập email',
            'ten.required' => 'Bạn chưa nhập tên',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password_confirmation.same' => 'Mật khẩu không trùng khớp',
        ]);
        $quyen_id = $request->role_id;
        if ($quyen_id == 2) {
            try {
                $shop = new Shop([
                    'trangthai' => 1,
                ]);
                $shop->save();
                $user = new User([
                    'shop_id' => $shop->id,
                    'ten' => $request->ten,
                    'email' => $request->email,
                    'matkhau' => bcrypt($request->password),
                    'quyen_id' => 2,
                    'trangthai' => 1,
                ]);
                $user->save();

                Session::flash('success', 'Tạo tài khoản thành công');
            } catch (\Exception $err) {
                Session::flash('error', $err->getMessage());
                return false;
            }
            return true;
        }

        try {
            User::create([
                'ten' => (string) $request->input('ten'),
                'email' => (string) $request->input('email'),
                'matkhau' => bcrypt($request->password),
                'quyen_id' => (string) $request->input('role_id'),

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

        $acc->fill($request->input());
        $acc->save();


        Session::flash('success', 'Cập nhật tài khoản thành công');
        return true;
    }


    public function updateshop(Request $request, User $acc, Shop $shop)
    {
        // Cập nhật dữ liệu cho bảng users và shops
        $acc->ten = $request->ten;
        $acc->email = $request->email;
        $acc->trangthai = $request->trangthai;
        $acc->save();

        $shop->ten = $request->tenshop;
        $shop->sdt = $request->sdt;
        $shop->diachi = $request->diachi;
        $shop->hinhanh = $request->hinhanh;
        $shop->trangthai = $request->trangthai;
        $shop->save();
        Session::flash('success', 'Cập nhật tài khoản thành công');
        return true;
    }
    public function duyet(Request $request, User $acc, Shop $shop)
    {
        $email = $request->email;
        $acc->trangthai = $request->status;
        $acc->save();
        $shop->trangthai = $request->status;
        $shop->save();

        if ($acc->trangthai == 1) {

            Session::flash('success', 'Duyệt thành công!');
            dispatch((new Duyet_Shop($email, $acc))->delay(now()->addSeconds(5)));

            return response()->json([
                'error' => false,
                'message' => 'Duyet Thanh Cong'
            ]);
        }

        if ($acc->trangthai == 0) {

            Session::flash('success', ' Đã Từ Chối! ');
            dispatch((new TuChoi_Shop($email, $acc))->delay(now()->addSeconds(5)));
            return response()->json([
                'error' => false,
                'message' => 'Khong Duoc Duyet '
            ]);
        }

        return $acc;
    }
    public function destroy($request)
    {
        $acc = User::where('id', $request->input('id'))->first();
        if ($acc) {
            $path = str_replace('storage', 'public', $acc->hinhanh);
            Storage::delete($path);
            $acc->delete();
            return true;
        }

        return false;
    }
    // public function destroyshop($request)
    // {
    //     $shop = Shop::where('id', $request->input('id'))->first();
    //     if ($shop) {
    //         $path = str_replace('storage', 'public', $shop->hinhanh);
    //         Storage::delete($path);
    //         $shop->delete();
    //         return true;
    //     }

    //     return false;
    // }
}
