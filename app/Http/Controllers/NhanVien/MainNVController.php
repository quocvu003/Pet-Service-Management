<?php

namespace App\Http\Controllers\NhanVien;

use App\Http\Controllers\Controller;
use App\Http\Services\CongViecService;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class MainNVController extends Controller
{
    protected $congviec;

    public function __construct(CongViecService $congviec)
    {

        $this->congviec = $congviec;
    }
    public function index()
    {
        $id = Auth::user()->id;
        $nhanvien = User::find($id);

        // dd($currentuser);
        return view('NhanVien.home', [
            'title' => 'Nhân viên :' . $nhanvien->ten,
            'nhanvien' => $nhanvien,


        ]);
    }
    public function list()
    {
        return view('nhanvien.congviec.index', [
            'title' => 'Công việc',
            'congviecs' => $this->congviec->list(),
        ]);
    }
}
