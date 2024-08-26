<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductCategoryController;
use App\Http\Controllers\Api\ProductController;
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

Route::middleware('auth:api')->get('/users', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');

Route::group(['prefix' => 'brands'], function () {

    Route::get('/', [BrandController::class, 'index']);
    Route::get('/{id}', [BrandController::class, 'detail']);
    Route::post('/store', [BrandController::class, 'store']);
});

Route::group(['prefix' => 'product-categories'], function () {

    Route::get('/', [ProductCategoryController::class, 'index']);
    Route::get('/{id}', [ProductCategoryController::class, 'detail']);
    Route::post('/store', [ProductCategoryController::class, 'store']);
});

Route::group(['prefix' => 'products'], function () {

    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class, 'detail']);
    Route::post('/store', [ProductController::class, 'store']);
});

Route::group(['prefix' => 'orders'], function () {

    Route::get('/', [OrderController::class, 'index']);
    Route::post('/store', [OrderController::class, 'store']);
});

// Route::group(['middleware' => 'auth:api'], function () {
//     Route::get('/user', function (Request $request) {
//         return $request->user();
//     });
// });
