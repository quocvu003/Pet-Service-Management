<?php


namespace App\Http\View\Composers;


use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\View\View;

class SideBarComposer
{
    protected $users;

    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $id = Auth::user()->id;
        $currentuser = User::find($id);
        // dd($currentuser);
        if (is_null($currentuser)) {
            $view->with('fullNameUser', 'Vui Lòng Đăng Nhập');
        }

        $view->with('fullNameUser', $currentuser->name);
    }
}
