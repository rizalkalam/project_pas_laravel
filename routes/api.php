<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\client\AuthController;
use App\Http\Controllers\client\ProductController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', function () {
    return response()->json([
        'error' => '401',
        'message' => 'authentication required'
    ], 401);
})->name('login');

// daftar dan masuk
Route::post('/register', [\App\Http\Controllers\client\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\client\AuthController::class, 'login']);

// setelah daftar dan masuk bisa akses ini
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', function (Request $request){
        return $request->user();
    });
});

Route::group(["prefix"=>"/produk"], function(){
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{id?}', [ProductController::class, 'detail']);
});  

// route untuk after payment midtrans
Route::post('/midtrans-callback', [OrderController::class, 'callback']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::middleware('auth:sanctum')->group(function () {
//     Route::post('/logout', [\App\Http\Controllers\client\AuthController::class, 'logout']);
// });