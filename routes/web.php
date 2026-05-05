<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProductController as SanphamController;
use App\Http\Controllers\frontend\ContactController as LienheController;
use App\Http\Controllers\frontend\AboutController;

use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\AuthController;


use App\Http\Controllers\frontend\RegisterController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\OrderDetailController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CheckoutController;

use App\Http\Controllers\frontend\ThanhVienController;




Route::get('/', [HomeController::class, 'index'])->name('site.home');
Route::get('san-pham', [SanphamController::class, 'index'])->name('site.product.index');
Route::get('san-pham/{slug}', [SanphamController::class, 'detail'])->name('site.product.detail');

Route::get('gioi-thieu', [AboutController::class, 'index'])->name('site.about.index');

Route::get('lien-he', [LienheController::class, 'index'])->name('site.contact.index');
Route::post('lien-he', [LienheController::class, 'store'])->name('site.contact.store');


Route::get('/gio-hang', [CartController::class, 'index'])->name('cart.index');
Route::get('/them-gio/{id}', [CartController::class, 'add']);
Route::post('/cap-nhat-gio/{id}', [CartController::class, 'update']);
Route::get('/xoa-gio/{id}', [CartController::class, 'remove']);

Route::get('/shopping-guide', function () {
    return view('frontend.shopping-guide');
});

Route::get('/payment-methods', function () {
    return view('frontend.payment-methods');
});

Route::get('/faq', function () {
    return view('frontend.faq');
});


//=========================TRANG THANH TOÁN=========================


Route::get('/thanh-toan', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/dat-hang', [CheckoutController::class, 'store'])->name('checkout.store');

Route::get('/dang-nhap', [ThanhVienController::class, 'login']);
Route::post('/dang-nhap', [ThanhVienController::class, 'dologin'])->name('site.login');
Route::get('/dang-ky', [ThanhVienController::class, 'register'])->name('site.register');
Route::post('/dang-ky', [ThanhVienController::class, 'doregister'])->name('site.doregister');
Route::post('/dang-xuat', [ThanhVienController::class, 'logout'])->name('site.logout');
Route::get('/thong-tin', [ThanhVienController::class, 'profile'])->name('site.profile');

// ==========================Admin===========================
Route::prefix('admin')->middleware('login.admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('product', ProductController::class);
    Route::prefix('products')->group(function () {
        Route::get('trash', [ProductController::class, 'trash'])->name('admin.product.trash');
        Route::get('restore/{product}', [ProductController::class, 'restore'])->name('admin.product.restore');
        Route::get('status/{product}', [ProductController::class, 'status'])->name('admin.product.edit');
        Route::delete('delete/{product}', [ProductController::class, 'destroy'])->name('product.delete');
    });

    // // ================== CATEGORY ==================
    Route::resource('category', CategoryController::class);
    Route::prefix('categorys')->group(function () {
        Route::get('trash', [CategoryController::class, 'trash'])->name('admin.category.trash');
        Route::get('restore/{category}', [CategoryController::class, 'restore'])->name('admin.category.restore');
        Route::get('status/{category}', [CategoryController::class, 'status'])->name('admin.category.status');
        Route::delete('delete/{category}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    });

    // ================== ORDER ==================
    Route::resource('order', OrderController::class);
    Route::prefix('orders')->group(function () {
        Route::get('trash', [OrderController::class, 'trash'])->name('admin.order.trash');
        Route::get('restore/{order}', [OrderController::class, 'restore'])->name('admin.order.restore');
        Route::put('status/{order}', [OrderController::class, 'status'])->name('admin.order.status');
        Route::delete('delete/{order}', [OrderController::class, 'delete'])->name('admin.order.delete');
    });

    // // ================== USER ==================
    Route::resource('user', UserController::class);
    Route::prefix('users')->group(function () {
        Route::get('trash', [UserController::class, 'trash'])->name('admin.user.trash');
        Route::post('restore/{user}', [UserController::class, 'restore'])->name('admin.user.restore');
        Route::get('status/{user}', [UserController::class, 'status'])->name('admin.user.status');
        Route::delete('delete/{user}', [UserController::class, 'delete'])->name('admin.user.delete');
    });

    // ================== BRAND ==================
    Route::resource('brand', BrandController::class);
    Route::prefix('brands')->group(function () {
        Route::get('trash', [BrandController::class, 'trash'])->name('admin.brand.trash');
        Route::get('restore/{brand}', [BrandController::class, 'restore'])->name('admin.brand.restore');
        Route::get('status/{brand}', [BrandController::class, 'status'])->name('admin.brand.status');
        Route::delete('delete/{brand}', [BrandController::class, 'delete'])->name('admin.brand.delete');
    });

    // ================== ORDER DETAIL ==================
    Route::resource('orderdetail', OrderDetailController::class);
    Route::prefix('orderdetails')->group(function () {
        Route::get('trash', [OrderDetailController::class, 'trash'])->name('admin.orderdetail.trash');
        Route::get('restore/{orderdetail}', [OrderDetailController::class, 'restore'])->name('admin.orderdetail.restore');
        Route::delete('delete/{orderdetail}', [OrderDetailController::class, 'destroy'])->name('admin.orderdetail.delete');
    });

    // ================== CONTACT==================
    Route::resource('contact', ContactController::class);
    Route::prefix('contacts')->group(function () {
        Route::get('trash', [ContactController::class, 'trash'])->name('admin.contact.trash');
        Route::get('restore/{contact}', [ContactController::class, 'restore'])->name('admin.contact.restore');
        Route::get('status/{contact}', [ContactController::class, 'status'])->name('admin.contact.status');
        Route::delete('delete/{contact}', [ContactController::class, 'delete'])->name('admin.contact.delete');
    });

    // ================== POST ==================
    Route::resource('post', PostController::class);
    Route::prefix('posts')->group(function () {
        Route::get('trash', [PostController::class, 'trash'])->name('admin.post.trash');
        Route::get('restore/{post}', [PostController::class, 'restore'])->name('admin.post.restore');
        Route::get('status/{post}', [PostController::class, 'status'])->name('admin.post.status');
        Route::delete('delete/{post}', [PostController::class, 'delete'])->name('admin.post.delete');
    });

    // ================== TOPIC ==================
    Route::resource('topic', TopicController::class);
    Route::prefix('topics')->group(function () {
        Route::get('trash', [TopicController::class, 'trash'])->name('admin.topic.trash');
        Route::get('restore/{topic}', [TopicController::class, 'restore'])->name('admin.topic.restore');
        Route::get('status/{topic}', [TopicController::class, 'status'])->name('admin.topic.status');
        Route::delete('delete/{topic}', [TopicController::class, 'delete'])->name('admin.topic.delete');
    });


    // ================== MENU ==================
    Route::resource('menu', MenuController::class);
    Route::prefix('menus')->group(function () {
        Route::get('trash', [MenuController::class, 'trash'])->name('admin.menu.trash');
        Route::get('restore/{menu}', [MenuController::class, 'restore'])->name('admin.menu.restore');
        Route::get('status/{menu}', [MenuController::class, 'status'])->name('admin.menu.status');
        Route::delete('delete/{menu}', [MenuController::class, 'delete'])->name('admin.menu.delete');
    });
});

// LOGIN KHÔNG CÓ MIDDLEWARE
Route::get('/admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'dologin'])->name('admin.login.dologin');

// LOGOUT
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// ADMIN (CÓ MIDDLEWARE)
// Route::prefix('/admin')->middleware('login.admin')->group(function () {
//     Route::get('/', function () {
//         return view('admin.dashboard');
//     });
// });
