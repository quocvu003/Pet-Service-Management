<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\AccController;
use App\Http\Controllers\Admin\DanhmucController;
use App\Http\Controllers\Admin\FeeController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\ChuShop\MainCSController;
use App\Http\Controllers\KhachHang\MainUserController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\ChuShop\DichvuController;
use App\Http\Controllers\ChuShop\LichhenController;
use App\Http\Controllers\NhanVien\MainNVController;
use App\Http\Controllers\ChuShop\NhanvienController;
use App\Http\Controllers\KhachHang\DichVuDatController;
use App\Http\Controllers\KhachHang\DichVuUserController;


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login_action', [AuthController::class, 'login_action']);

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register_action', [AuthController::class, 'register_action']);
#Upload
Route::post('upload/services', [UploadController::class, 'store']);

Route::get('register_seller', [AuthController::class, 'register_seller'])->name('register_seller');
Route::post('register_seller_action', [AuthController::class, 'register_seller_action']);

Route::get('reset_password/{user}', [AuthController::class, 'reset_password'])->name('reset_password');
Route::post('reset_password/{user}', [AuthController::class, 'reset_password_action']);

Route::get('forgot_password', [AuthController::class, 'forgot_password'])->name('forgot_password');
Route::post('forgot_password', [AuthController::class, 'forgot_password_action']);

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', [MainController::class, 'index'])->name('admin');

        #Menu
        Route::prefix('danhmucs')->group(function () {
            Route::get('add', [DanhmucController::class, 'create']);
            Route::post('add', [DanhmucController::class, 'store']);
            Route::get('list', [DanhmucController::class, 'index']);
            Route::get('requestdv', [DanhmucController::class, 'requestdv']);
            Route::get('edit_requestdv/{danhmuc}', [DanhmucController::class, 'show_requestdv']);
            Route::post('edit_requestdv/{danhmuc}', [DanhmucController::class, 'update_requestdv']);
            Route::get('edit/{danhmuc}', [DanhmucController::class, 'show']);
            Route::post('edit/{danhmuc}', [DanhmucController::class, 'update']);
            Route::DELETE('destroy', [DanhmucController::class, 'destroy']);
        });

        #Slider
        Route::prefix('sliders')->group(function () {
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
        });
        #Upload
        Route::post('upload/services', [UploadController::class, 'store']);

        #Cart
        Route::get('customers', [CartController::class, 'index']);
        Route::get('customers/view/{customer}', [CartController::class, 'show']);

        #Account
        Route::prefix('accs')->group(function () {
            Route::get('add', [AccController::class, 'create']);
            Route::post('add', [AccController::class, 'store']);
            // show
            Route::get('chuShop', [AccController::class, 'chuShop']);
            Route::get('application', [AccController::class, 'application']);
            Route::get('khachhang', [AccController::class, 'khachhang']);
            Route::get('admin', [AccController::class, 'admin']);
            // đơn đăng ký
            Route::get('showappli/{acc}', [AccController::class, 'showappli']);
            Route::post('showappli/{acc}', [AccController::class, 'duyet']);
            //
            Route::get('edit/{acc}', [AccController::class, 'show']);
            Route::post('edit/{acc}', [AccController::class, 'update']);
            Route::DELETE('destroy', [AccController::class, 'destroy']);
            // chủ Shop
            Route::get('editshop/{acc}', [AccController::class, 'showshop']);
            Route::post('editshop/{acc}', [AccController::class, 'updateshop']);
        });
        #Phí thu
        Route::prefix('fees')->group(function () {
            Route::get('add', [FeeController::class, 'create']);
            Route::post('add', [FeeController::class, 'store']);
            Route::get('list', [FeeController::class, 'list']);
        });
    });
});

Route::middleware(['auth'])->group(function () {

    Route::prefix('ChuShop')->group(function () {

        Route::get('/', [MainCSController::class, 'index'])->name('ChuShop');
        Route::prefix('profiles')->group(function () {
            Route::get('/index', [MainCSController::class, 'profile']);
            Route::get('/edit', [MainCSController::class, 'show']);
            Route::post('/edit', [MainCSController::class, 'updateshop']);
        });

        Route::prefix('nhanviens')->group(function () {
            Route::get('list', [NhanvienController::class, 'index']);
            Route::post('list', [NhanvienController::class, 'store']);
            Route::get('edit/{nhanvien}', [NhanvienController::class, 'edit']);
            Route::post('edit/{nhanvien}', [NhanvienController::class, 'change']);
        });
        Route::prefix('dichvus')->group(function () {
            Route::get('list', [DichvuController::class, 'index']);
            Route::post('list', [DichvuController::class, 'store']);
            Route::post('list', [DichvuController::class, 'store']);
            Route::get('edit/{dichvu}', [DichvuController::class, 'show']);
            Route::post('edit/{dichvu}', [DichvuController::class, 'update']);
        });
        Route::prefix('lichdatdvs')->group(function () {
            Route::get('list', [LichhenController::class, 'index']);
            Route::get('list_daduyet', [LichhenController::class, 'index_daduyet']);
            Route::get('list_hoanthanh', [LichhenController::class, 'index_hoanthanh']);
            Route::get('list_tuchoi', [LichhenController::class, 'index_tuchoi']);
            Route::get('edit/{lichdatdv}', [LichhenController::class, 'show']);
            Route::post('edit/{lichdatdv}', [LichhenController::class, 'duyet']);
            Route::get('edit_daduyet/{lichdatdv}', [LichhenController::class, 'show_daduyet']);
            Route::post('edit_daduyet/{lichdatdv}', [LichhenController::class, 'update_daduyet']);
            Route::get('edit_hoanthanh/{lichdatdv}', [LichhenController::class, 'show_hoanthanh']);
            Route::get('edit_tuchoi/{lichdatdv}', [LichhenController::class, 'show_tuchoi']);
        });
        Route::prefix('danhmucs')->group(function () {
            Route::get('list', [DanhmucController::class, 'indexshop']);
            Route::post('list', [DanhmucController::class, 'storeshop']);
        });
    });
});
Route::middleware(['auth'])->group(function () {
    Route::prefix('NhanVien')->group(function () {
        Route::get('/', [MainNVController::class, 'index'])->name('NhanVien');
        Route::prefix('profiles')->group(function () {
            Route::get('/index', [NhanvienController::class, 'profile']);
            Route::get('/edit', [NhanVienController::class, 'show']);
            Route::post('/edit', [NhanVienController::class, 'update']);
        });
        Route::prefix('congviecs')->group(function () {
            Route::get('/index', [MainNVController::class, 'list']);
            Route::get('/edit/{dichvudat}', [MainNVController::class, 'show']);
            Route::post('/edit/{dichvudat}', [MainNVController::class, 'update_dichvudat']);
            Route::get('/index_hoanthanh', [MainNVController::class, 'list_hoanthanh']);
        });
    });
});

Route::get('/', [MainUserController::class, 'index']);
Route::get('/dichvu/{danhmuc}', [DichVuUserController::class, 'index']);
Route::get('/shop', [MainUserController::class, 'show']);

Route::middleware(['auth'])->group(function () {
    Route::get('/datlich/{shop}-{dichvu}', [DichVuDatController::class, 'create']);
    Route::post('/datlich/{shop}-{dichvu}', [DichVuDatController::class, 'store']);
    Route::prefix('datlichs')->group(function () {
        Route::get('/index', [DichVuDatController::class, 'index']);
        Route::get('/show/{dichvudat}', [DichVuDatController::class, 'show']);
        Route::get('/edit/{dichvudat}', [DichVuDatController::class, 'edit']);
        Route::post('/edit/{dichvudat}', [DichVuDatController::class, 'update_dichvudat']);
        Route::DELETE('destroy', [DichVuDatController::class, 'destroy']);
    });
    Route::prefix('profiles')->group(function () {
        Route::get('/index', [MainUserController::class, 'profile']);
        Route::get('/edit', [MainUserController::class, 'showp']);
        Route::post('/edit', [MainUserController::class, 'update']);
    });
});
