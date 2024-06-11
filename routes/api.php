<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BrandController;

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

Route::group(['prefix' => 'brands'], function () {

    Route::get('/', [BrandController::class, 'index']);
    Route::get('/{id}', [BrandController::class, 'detail']);
    Route::post('/store', [BrandController::class, 'store']);
//    Route::post('/store', function () {
//        return response()->json(['message' => 'Brand created successfully'], 200);
//    });
});
