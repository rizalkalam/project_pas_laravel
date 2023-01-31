<?php

use App\Models\Cart;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SofaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TestimoniController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [BarangController::class,'index']);

Route::get('/beranda', [BarangController::class, 'index']);

Route::post('/add', [BarangController::class, 'store']);
Route::delete('/beranda/delete/{testimoni}', [BarangController::class, 'destroy']);
Route::post('/beranda/update/{testimoni}', [BarangController::class, 'update']);

Route::get('/produk', function(Kategori $kategori){
    return view('produk_all',[
        // 'barangs'=>Barang::all()
        "active" =>'kategori',
        'kategoris' => Kategori::all(),
    ]);
});

Route::get('/kategori/{kategori:slug}', function(Kategori $kategori){
    return view('produk', [
        'judul'=>$kategori->nama_kategori,
        'barangs'=>$kategori->barangs,
        'promos'=>$kategori->promos,
        "active" =>'kategori',
        'kategoris' => Kategori::all(),
    ]);
});

Route::get('/barang/{barang:slug}', [BarangController::class, 'show']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/',[TestimoniController::class, 'index']);
// Route::get('/beranda',[TestimoniController::class, 'index']);


// CART
Route::group(["prefix"=>"keranjang"], function(){
    Route::get('/', function(){
        return view('keranjang',[
            "active" =>'kategori',
            'kategoris' => Kategori::all(),
            'keranjang'=> Cart::all()
        ]);
    })->name('keranjang');
    Route::post('/tambah',[CartController::class, 'addCart']);
    Route::delete('/hapus/{cart}',[CartController::class, 'deleteCart']);
});

// DASHBOARD
Route::group(["prefix"=>"dashboard"], function(){
    Route::middleware('role:admin')->get('/home', function(){
        return view('dashboard.home');
    })->name('dashboard');
});