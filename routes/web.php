<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Ajax\RemoveImagesController;
use App\Http\Controllers\ProductsController;
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

Route::resource('products', ProductsController::class)->only(['show', 'index']);


Route::prefix("admin")->name('admin.')->middleware(['auth', 'isAdmin'])->group(static function () {
    Route::resource('product', ProductController::class)->except('show');
    Route::resource('category', CategoryController::class)->except('show');
});

