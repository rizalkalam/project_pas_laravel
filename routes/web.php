<?php

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SofaController;
use App\Http\Controllers\BarangController;

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


    Route::get('/kategori/{kategori:slug}', function(Kategori $kategori){
        return view('produk', [
            'judul'=>$kategori->nama_kategori,
            'barangs'=>$kategori->barangs,
            "active" =>'kategori',
            'kategoris' => Kategori::all(),
        ]);
    });

