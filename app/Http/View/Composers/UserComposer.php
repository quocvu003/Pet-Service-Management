<?php


namespace App\Http\View\Composers;


use App\Http\Services\DanhMucService;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserComposer
{
    protected $danhmucService;

    public function __construct(DanhMucService $danhmucService)
    {
        $this->danhmucService = $danhmucService;
    }

    public function compose(View $view)
    {
        if (Auth::check()) {
            $currentuser = Auth::user();
            $username = $currentuser->ten;
            $display = 'block';
            $avatar = $currentuser->hinhanh;
            $link = '#';
            $link2 = '#';
            $link3 = '#';
            $id = $currentuser->id;
            $hidden = '';
            $hidden2 = '';
        } else {
            $username = 'Đăng nhập';
            $link = '/login';
            $link2 = '/register';
            $link3 = '/register_seller';
            $display = 'none';
            $avatar = '/template/avatar.jpg	';
            $id = '#';
            $hidden = 'Đăng ký thành viên';
            $hidden2 = 'Đăng ký chủ Shop';
        }

        $view->with('hidden', $hidden);
        $view->with('hidden2', $hidden2);
        $view->with('username', $username);
        $view->with('avatar', $avatar);
        $view->with('link', $link);
        $view->with('link2', $link2);
        $view->with('link3', $link3);
        $view->with('display', $display);
        $view->with('id', $id);
        $view->with('danhmucs', $this->danhmucService->getdanhmuc());
    }
}
