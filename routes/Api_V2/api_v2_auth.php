<?php
Route::prefix('test')->group(function (){
    Route::get('/', [\App\Http\Controllers\Api\V2\TestControlller::class, 'test']);
});
