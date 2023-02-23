<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SendNotifController;
use App\Http\Controllers\client\AuthController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\ProductController;
use App\Http\Controllers\API\UserDeviceAPIController;

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

    // route untuk keranjang
    Route::get('/keranjang',[CartController::class,'index']);
    Route::post('/keranjang/tambah/{id?}',[CartController::class,'addCart']);
    Route::delete('/keranjang/hapus/{id?}',[CartController::class,'deleteCart']);

    Route::post('user-device/register', [UserDeviceAPIController::class, 'registerDevice']);
    Route::get('user-device/{playerId}/update-status', [UserDeviceAPIController::class, 'updateNotificationStatus']);
    Route::post('test', [SendNotifController::class, 'test']);
});

Route::group(["prefix"=>"/produk"], function(){
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{id?}', [ProductController::class, 'detail']);
});  

// route untuk after payment midtrans
Route::post('/midtrans-callback', [OrderController::class, 'callback']);

// route untuk onesignal
Route::post('user-device/register', [UserDeviceAPIController::class, 'registerDevice']);
Route::get('user-device/{playerId}/update-status', [UserDeviceAPIController::class, 'updateNotificationStatus']);

Route::post('send',[SendNotifController::class,'send']);



// Route::post('testing', function(){
//     $client = Http::withHeaders([
//         'Authorization' => 'MWRkYWNjZGMtZDFkOS00MmExLWEwZTUtNmU2MWEyMjQwMDU0',
//         'accept' => 'application/json',
//         'content-type' => 'application/json',
//     ])
//     ->post( 'https://onesignal.com/api/v1/notifications')
//     // ->status();
//     // require_once('vendor/autoload.php');

//     // $client = new \GuzzleHttp\Client();

//     // $response = $client->request('POST', 'https://onesignal.com/api/v1/notifications', [
//     // 'body' => '{"included_segments":["Subscribed Users"],"contents":{"en":"English or Any Language Message","es":"Spanish Message"},"name":"INTERNAL_CAMPAIGN_NAME"}',
//     // 'headers' => [
//     //     'Authorization' => 'Basic YOUR_REST_API_KEY',
//     //     'accept' => 'application/json',
//     //     'content-type' => 'application/json',
//     // ],
//     // ]);

//     // echo $response->getBody();
// });

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::middleware('auth:sanctum')->group(function () {
//     Route::post('/logout', [\App\Http\Controllers\client\AuthController::class, 'logout']);
// });