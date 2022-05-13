<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('login', App\Http\Controllers\Api\AuthController::class)->name('login');

Route::middleware(['auth:sanctum', 'api', 'api_version:v2'])->prefix('api/v2')->group(function () {
    require base_path('routes/api_v2.php');
});

Route::middleware(['auth:sanctum', 'api', 'api_version:v1'])->prefix('api/v1')->group(function () {
    require base_path('routes/api_v1.php');
});
