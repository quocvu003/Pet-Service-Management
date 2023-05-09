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
        } else {
            $username = 'Đăng nhập';
            $link = '/login';
            $display = 'none';
            $avatar = '/template/avatar.jpg	';
        }
        $view->with('username', $username);
        $view->with('avatar', $avatar);
        $view->with('link', $link);
        $view->with('display', $display);

        $view->with('danhmucs', $this->danhmucService->getAll());
    }
}
