<?php

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

Route::group(['prefix' => 'brands'], function () {
    Route::get('/', [App\Http\Controllers\Api\BrandController::class, 'index']);
    Route::post('/', [App\Http\Controllers\Api\BrandController::class, 'store']);
    Route::put('/{id}', [App\Http\Controllers\Api\BrandController::class, 'update']);
    Route::delete('/{id}', [App\Http\Controllers\Api\BrandController::class, 'delete']);
});

Route::group(['prefix' => 'orders'], function () {
    Route::post('/', [App\Http\Controllers\Api\OrderController::class, 'checkout']);
});
