<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
   public function index()

   {
      $id = Auth::user()->id;
      $currentuser = User::find($id);
      // dd($currentuser);
      return view('admin.home', [
         'title' => 'Trang quản trị Admin',
         'name' => $currentuser->name,

      ]);
   }
}
