<?php

use App\Http\Controllers\Account\Socials\TelegramCallbackController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CategoriesController as CustomerCategoryController;
use App\Http\Controllers\Ajax\RemoveImagesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\Payments\PaypalPaymentController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\WishListController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\OrdersController as AdminOrdersController;
use \App\Http\Controllers\Account\OrdersController as AccountOrdersController;

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

//
//Route::get('/', static function () {
//    return view('welcome');
//});

Route::get('language/{locale}', static function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
})->name('language.switcher');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
    Route::get('orders', [AdminOrdersController::class, 'index'])
        ->name('orders.index');
    Route::get('orders/{order}/show', [AdminOrdersController::class, 'show'])
        ->name('orders.show');
    Route::put('orders/{order}/update', [AdminOrdersController::class, 'update'])
        ->name('orders.update');
    Route::resource('users', UserController::class);
});

Route::prefix('account')->name('account.')->middleware('auth')->group(static function () {
    Route::get('{user}', [UserAccountController::class, 'show'])
        ->can('view', 'user')->name('show');
    Route::get('{user}/edit', [UserAccountController::class, 'edit'])
        ->can('update', 'user')->name('edit');
    Route::put('{user}', [UserAccountController::class, 'update'])
        ->can('update', 'user')->name('update');
    Route::get('orders/index', [AccountOrdersController::class, 'index'])
        ->name('orders.index');
    Route::get('orders/{order}/show', [AccountOrdersController::class, 'show'])
        ->name('order.show');
    Route::put('orders/{order}/cancel', [AccountOrdersController::class, 'cancel'])
        ->name('order.cancel');
    Route::get('telegram/callback', TelegramCallbackController::class)
        ->name('telegram.callback');
    Route::get('invoice/{order}/download', [AccountOrdersController::class, 'downloadInvoice'])
        ->name('invoice.download');
    Route::get('invoice/{order}/inline', [AccountOrdersController::class, 'viewInlineInvoice'])
        ->name('invoice.viewInline');
});

Route::prefix('rating')->name('rating.')->middleware('auth')->group(static function () {
    Route::post('{product}/add', [RatingController::class, 'add'])->name('add');
});

Route::prefix('wishlist')->name('wishlist.')->middleware('auth')->group(static function () {
    Route::post('{product}/add', [WishListController::class, 'add'])->name('add');
    Route::delete('{product}/delete', [WishListController::class, 'delete'])->name('delete');
    Route::get('/', [WishListController::class, 'index'])->name('index');
});

Route::prefix('comment')->name('comment.')->middleware('auth')->group(static function () {
    Route::post('add', [CommentsController::class, 'add'])->name('add');
    Route::post('reply', [CommentsController::class, 'reply'])->name('reply');
    Route::delete('delete', [CommentsController::class, 'delete'])->name('delete');
    Route::put('update', [CommentsController::class, 'update'])->name('update');
});

Route::get('checkout', CheckoutController::class)->middleware('auth')->name('checkout');
Route::post('order', OrdersController::class)->middleware('auth')->name('order');

Route::prefix('paypal')->name('paypal.')->group(static function () {
    Route::post('order/create', [PaypalPaymentController::class, 'create'])
        ->name('create');
    Route::get('test', static function () {
        return view('checkout.payments.test');
    });
    Route::post('order/{order}/capture', [PaypalPaymentController::class, 'capture'])
        ->name('capture');
    Route::get('order/{order}/thankYou', [PaypalPaymentController::class, 'thankYou'])
        ->middleware('auth')->name('thankYou');
//->can('view', 'order')
});
