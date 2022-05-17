<?php

Route::prefix('admin/products')
    ->name('admin.products.')
    ->group(function () {
        Route::get('/', [App\Http\Controllers\Api\V1\ProductsController::class, 'index'])
            ->name('index');
        Route::get('{product}', [App\Http\Controllers\Api\V1\ProductsController::class, 'show'])
            ->name('show');
    });

Route::prefix('admin/orders')
    ->name('admin.orders.')
    ->group(function () {
        Route::get('/', [\App\Http\Controllers\Api\V1\OrdersController::class, 'index'])
            ->name('index');
        Route::get('{order}', [\App\Http\Controllers\Api\V1\OrdersController::class, 'show'])
            ->name('show');
    });
