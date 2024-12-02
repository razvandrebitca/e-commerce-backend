<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
// use App\Http\Controllers\ReviewController;
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
Route::patch('update-user', [UserController::class,'update_user']);
Route::delete('delete-review/{id}', [UserController::class,'delete_review']);
Route::patch('update-review', [UserController::class,'update_review']);
Route::patch('update-user-password',[UserController::class,'update_user_password'])->name('update-user-password');
Route::apiResource('/products',ProductController::class);
Route::apiResource('/reviews/{id?}',App\Http\Controllers\ReviewController::class);
Route::post('send-order',[App\Http\Controllers\OrderController::class,'sendOrderEmail']);