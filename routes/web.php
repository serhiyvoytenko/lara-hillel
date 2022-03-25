<?php

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

Route::prefix("admin")->name('admin.')->middleware(['auth', 'isAdmin'])->group(static function () {
    Route::resource('/product', \App\Http\Controllers\Admin\ProductController::class)->except('show');
});
