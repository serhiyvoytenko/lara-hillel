<?php

Route::prefix('public/products')->group(function () {
    Route::get('/', [App\Http\Controllers\Api\V1\ProductsController::class, 'index']);
    Route::get('{product}', [App\Http\Controllers\Api\V1\ProductsController::class, 'show']);
});

Route::prefix('public/orders')->group(function () {
    Route::get('/', [\App\Http\Controllers\Api\V1\OrdersController::class, 'index']);
    Route::get('{order}', [\App\Http\Controllers\Api\V1\OrdersController::class, 'show']);
});

