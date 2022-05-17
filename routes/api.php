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

Route::middleware(['auth:sanctum', 'api', 'api_version:v2'])->prefix('v2')->group(function () {
    require base_path('routes/Api_V2/api_v2_auth.php');
});

Route::middleware(['auth:sanctum', 'api', 'api_version:v1'])->prefix('v1')->group(function () {
    require base_path('routes/Api_V1/api_v1_auth.php');
});

Route::middleware(['auth:sanctum', 'isAdmin', 'api', 'api_version:v2'])->prefix('v2')->group(function () {
    require base_path('routes/Api_V2/api_v2_admin.php');
});

Route::middleware(['auth:sanctum', 'isAdmin', 'api', 'api_version:v1'])->prefix('v1')->group(function () {
    require base_path('routes/Api_V1/api_v1_admin.php');
});

Route::middleware(['api', 'api_version:v2'])->prefix('v2')->group(function () {
    require base_path('routes/Api_V2/api_v2_public.php');
});

Route::middleware(['api', 'api_version:v1'])->prefix('v1')->group(function () {
    require base_path('routes/Api_V1/api_v1_public.php');
});
