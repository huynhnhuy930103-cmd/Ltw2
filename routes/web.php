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

Route::get('/', [HomeController::class, 'index'])->name('site.home');
Route::get('san-pham', [SanphamController::class, 'index'])->name('site.product.index');
Route::get('san-pham/{slug}', [SanphamController::class, 'detail'])->name('site.product.detail');

Route::get('gioi-thieu', [AboutController::class, 'index'])->name('site.about.index');

Route::get('lien-he', [LienheController::class, 'index'])->name('site.contact.index');
Route::post('lien-he', [LienheController::class, 'store'])->name('site.contact.store');
Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('store', [ProductController::class, 'store'])->name('admin.product.store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::put('update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
        Route::delete('delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');
    });
});

// Route::get('/', function () {
//     return view('welcome');
// });

