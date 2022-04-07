<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CategoriesController as CustomerCategoryController;
use App\Http\Controllers\Ajax\RemoveImagesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserAccountController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/error', [App\Http\Controllers\HomeController::class, 'error'])->name('error');

Route::delete('ajax/images/{image_id}', RemoveImagesController::class)
    ->middleware(['auth', 'isAdmin'])
    ->name('ajax.images.remove');

Route::resource('categories', CustomerCategoryController::class)->only(['show', 'index']);
Route::resource('products', ProductsController::class)->only(['show', 'index']);
Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('cart/{product}', [CartController::class, 'add'])->name('cart.add');
Route::delete('cart', [CartController::class, 'remove'])->name('cart.remove');
Route::post('cart/{product}/count', [CartController::class, 'countUpdate'])->name('cart.count.update');

Route::prefix("admin")->name('admin.')->middleware(['auth', 'isAdmin'])->group(static function () {
    Route::resource('product', ProductController::class)->except('show');
    Route::resource('category', CategoryController::class)->except('show');
});

//Route::resource('account', UserAccountController::class)->only(['show', 'edit', 'update']);
//    ->middleware('auth')
//    ->only(['show', 'edit', 'update']);

Route::prefix('account')->name('account.')->middleware('auth')->group(static function() {
    Route::get('{user}', [UserAccountController::class, 'show'])->name('show');
    Route::get('{user}/edit', [UserAccountController::class, 'edit'])->name('edit');
    Route::put('{user}', [UserAccountController::class, 'update'])->name('update');
});
