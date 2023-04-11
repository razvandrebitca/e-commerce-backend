<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [LoginController::class,'register']);
Route::post('login', [LoginController::class,'login']);
Route::get('products/{id}', [UserController::class,'products']);

Route::apiResource('/products',ProductController::class);

Route::group(['prefix' => 'products'],function(){

  Route::apiResource('/{product}/reviews','ReviewController');

});