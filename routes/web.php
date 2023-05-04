<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\AccController;
use App\Http\Controllers\Admin\DanhmucController;
use App\Http\Controllers\Admin\FeeController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\ChuShop\MainCSController;
use App\Http\Controllers\MainUserController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\NhanVien\MainNVController;
use App\Http\Controllers\ChuShop\NhanvienController;

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login_action', [AuthController::class, 'login_action']);

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register_action', [AuthController::class, 'register_action']);
#Upload
Route::post('upload/services', [UploadController::class, 'store']);


Route::get('register_seller', [AuthController::class, 'register_seller'])->name('register_seller');
Route::post('register_seller_action', [AuthController::class, 'register_seller_action']);

Route::get('verification', [AuthController::class, 'verification'])->name('verification');
Route::post('verification_action', [AuthController::class, 'verification_action']);

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', [MainController::class, 'index'])->name('admin');

        #Menu
        Route::prefix('danhmucs')->group(function () {
            Route::get('add', [DanhmucController::class, 'create']);
            Route::post('add', [DanhmucController::class, 'store']);
            Route::get('list', [DanhmucController::class, 'index']);
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
        // #Upload
        // Route::post('upload/services', [UploadController::class, 'store']);
        #Account
        Route::prefix('nhanviens')->group(function () {
            Route::get('list', [NhanvienController::class, 'index']);
            Route::post('list', [NhanvienController::class, 'store']);
        });
    });
    Route::prefix('NhanVien')->group(function () {
        Route::get('/', [MainNVController::class, 'index'])->name('NhanVien');
        Route::prefix('profiles')->group(function () {
            Route::get('/index', [NhanvienController::class, 'profile']);
            Route::get('/edit', [NhanVienController::class, 'show']);
            Route::post('/edit', [NhanVienController::class, 'updateshop']);
        });
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [MainUserController::class, 'index']);
    // // load more product
    // Route::post('/services/load-product', [MainUserController::class, 'loadProduct']);
    // // click danh muc
    // Route::get('/danh-muc/{id}-{slug}.html', [MenuUserController::class, 'index']);
    // // chi tiet san pham
    // Route::get('/san-pham/{id}-{slug}.html', [ProductUserController::class, 'index']);
    // // them san pham vo gio hang
    // Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index']);
    // Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
    // Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
    // Route::get('carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);
    // // dat hang
    // Route::post('carts', [App\Http\Controllers\CartController::class, 'addCart']);
});
