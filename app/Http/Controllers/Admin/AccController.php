<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Http\Services\AccService;

use Illuminate\Http\Request;

class AccController extends Controller
{
    protected $AccService;
    public function __construct(AccService $AccService)
    {
        $this->AccService = $AccService;
    }

    public function create()
    {
        return view('admin.acc.add', [
            'title' => 'Thêm Tài Khoản Mới',
        ]);
    }

    public function store(Request $request)
    {
        $this->AccService->create($request);
        return redirect()->back();
    }

    public function application()
    {
        return view('admin.acc.application', [
            'title' => 'Danh Sách Các Shop Đang Chờ Duyệt',
            'accs' => $this->AccService->getappli()
        ]);
    }
    public function admin()
    {
        return view('admin.acc.admin', [
            'title' => 'Danh Sách Tài Khoản Admin',
            'accs' => $this->AccService->getadmin()
        ]);
    }
    public function chuShop()
    {
        return view('admin.acc.chuShop', [
            'title' => 'Danh Sách Tài Khoản Chủ Shop',
            'accs' => $this->AccService->getUsersWithShops(),

        ]);
    }
    public function khachhang()
    {
        return view('admin.acc.khachhang', [
            'title' => 'Danh Sách Tài Khoản Khách Hàng',
            'accs' => $this->AccService->getkhachhang()
        ]);
    }
    public function show(User $acc)
    {
        $user = $acc;
        return view('admin.acc.edit', [
            'title' => 'Chỉnh sửa tài khoản:' . $user->ten,
            'acc' => $user,
        ]);
    }

    public function update(Request $request, User $acc)
    {
        $result = $this->AccService->update($request, $acc);
        if ($result) {
            return redirect()->back();
        }
    }
    public function showappli(User $acc)
    {
        // Lấy thông tin về user
        $user = $acc;

        // Lấy danh sách shop của user
        $shops = $user->shops;

        return view('admin.acc.showappli', [
            'title' => 'Duyệt tài khoản: ' . $user->ten,
            'acc' => $user,
            'shops' => $shops
        ]);
    }

    public function showshop(User $acc)
    {
        // Lấy thông tin về user
        $user = $acc;

        // Lấy danh sách shop của user
        $shops = $user->shops;

        return view('admin.acc.editshop', [
            'title' => 'Chỉnh sửa tài khoản: ' . $acc->ten,
            'acc' => $acc,
            'shops' => $shops
        ]);
    }


    public function updateshop(Request $request, $id)
    {

        $user = User::findOrFail($id); // Lấy bản ghi của bảng users dựa trên $id truyền vào

        // Lấy đối tượng của bảng shops mà có khóa ngoại là user_id
        $shop = $user->shops()->first();

        // Gọi hàm cập nhật dữ liệu từ AccService
        $result = $this->AccService->updateshop($request, $user, $shop);

        if ($result) {
            return redirect('/admin/accs/chuShop');
        }
    }

    public function destroy(Request $request)
    {
        $result = $this->AccService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công '
            ]);
        }

        return response()->json(['error' => true]);
    }
    public function duyet(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $shop = $user->shops()->first();
        $result = $this->AccService->duyet($request, $user, $shop);

        if ($result->trangthai == 1) {
            return response()->json([
                'error' => false,
                'message' => 'Duyet Thanh Cong'
            ]);
        }
        if ($result->trangthai == 0) {
            return response()->json([
                'error' => false,
                'message' => 'Khong Duoc Duyet '
            ]);
        }
        return response()->json(['error' => true]);
    }
    // public function destroyshow(Request $request)
    // {
    //     $result = $this->AccService->destroyshop($request);
    //     if ($result) {
    //         return response()->json([
    //             'error' => false,
    //             'message' => 'Xóa thành công '
    //         ]);
    //     }

    //     return response()->json(['error' => true]);
    // }
}
