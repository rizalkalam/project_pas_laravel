<?php

use App\Models\Cart;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SofaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\Dashboard\DashboardProdukController;
use App\Http\Controllers\Dashboard\DashboardPenggunaController;

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

Route::delete('/beranda/delete/{testimoni}', [BarangController::class, 'destroy']);
Route::post('/beranda/update/{testimoni}', [BarangController::class, 'update']);

Route::get('/produk', function(Kategori $kategori){
    return view('produk_all',[
        'products'=>Barang::filter(request(['search','range']))->paginate(8),
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

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('no-footer');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('no-footer');
Route::post('/register', [RegisterController::class, 'store']);

// PROFILE
Route::group(["prefix"=>"profile"], function(){
    Route::get('/me',[ProfileController::class, 'index'])->middleware('auth');
    Route::get('/edit/{id}',[ProfileController::class, 'edit'])->name('no-footer')->middleware('auth');
    Route::post('/update/{id}',[ProfileController::class, 'update'])->middleware('auth');
    Route::post('/testi/add', [ProfileController::class, 'store']);
    Route::delete('/testi/delete/{testimoni}', [ProfileController::class, 'destroy']);
    Route::post('/testi/update/{testimoni}', [ProfileController::class, 'uptesti']);
    Route::post('/verif',[ProfileController::class,'verif']);
    Route::get('/pw',[ProfileController::class,'pwview'])->name('verif');
    Route::post('/reset',[ProfileController::class,'uppassword']);
});

// CART
Route::group(["prefix"=>"keranjang"], function(){
    Route::get('/', function(){
        return view('keranjang',[
            "active" =>'kategori',
            'kategoris' => Kategori::all(),
            'keranjang'=> Cart::all()
        ]);
    })->name('no-footer');
    Route::post('/tambah/{id}',[CartController::class, 'addCart']);
    Route::delete('/hapus/{cart}',[CartController::class, 'deleteCart']);
});

// ORDER
Route::group(["prefix"=>"order"], function(){
    Route::get('/',[OrderController::class,'index']);
    Route::get('/checkout', [OrderController::class, 'checkout']);
    Route::post('/payment', [OrderController::class, 'payment']);
});

// DASHBOARD
Route::group(["middleware" => "role:admin", "prefix"=>"dashboard"], function(){
    Route::get('/home', function(){
        return view('dashboard.home');
    })->name('dashboard')->middleware('auth');

    // dashboard produk
    Route::get('/produk', [DashboardProdukController::class, 'index'])->middleware('auth')->name('produk');
    Route::get('/produk/create', [DashboardProdukController::class, 'create'])->middleware('auth')->name('produk');
    Route::post('/produk/add', [DashboardProdukController::class, 'store'])->middleware('auth')->name('produk');
    Route::get('/produk/edit/{barang:slug}', [DashboardProdukController::class, 'edit'])->middleware('auth')->name('produk');
    Route::post('/produk/update/{barang:slug}', [DashboardProdukController::class, 'update'])->middleware('auth')->name('produk');
    Route::delete('/produk/delete/{barang:slug}', [DashboardProdukController::class, 'destroy'])->middleware('auth')->name('produk');

    // dashboard pengguna
    Route::get('/pengguna', [DashboardPenggunaController::class, 'index'])->name('pengguna');
});