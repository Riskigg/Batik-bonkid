<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/products', [HomeController::class, 'index'])->name('products');

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
        Route::prefix('admin/')->name('admin.')->group(function() {
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
            Route::prefix('category/')->name('category.')->group(function () {
                Route::get('/', [CategoryController::class, 'index'])->name('index');
                Route::get('/create', [CategoryController::class, 'create'])->name('create');
                Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
                Route::post('/store', [CategoryController::class, 'store'])->name('store');
                Route::put('update/{id}', [CategoryController::class, 'update'])->name('update');
                Route::delete('/news/destroy/{new}', [CategoryController::class, 'destroy'])->name('destroy');
            });
            Route::prefix('product/')->name('product.')->group(function () {
                Route::get('/', [ProductController::class, 'index'])->name('index');
                Route::get('/create', [ProductController::class, 'create'])->name('create');
                Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
                Route::post('/store', [ProductController::class, 'store'])->name('store');
                Route::put('update/{id}', [ProductController::class, 'update'])->name('update');
                Route::delete('/news/destroy/{new}', [ProductController::class, 'destroy'])->name('destroy');
            });
        });
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
