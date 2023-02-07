<?php

namespace App\Http\Controllers\client;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $data = array();
        $products = Barang::all();
        foreach ($products as $product) {
            $data[]=[
                'id'=>$product->id,
                'kategori_id'=>$product->kategori_id,
                'nama_barang'=>$product->nama_barang,
                'harga'=>$product->harga,
                'gambar_barang'=>$product->gambar_barang
            ];
        }
        return response()->json([
            "success" => true,
            "message" => "Product List",
            "data" => $data
        ]);
    }

    public function detail($id)
    {
        $product = Barang::whereId($id)->first();
        if ($product) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Produk!',
                'data'    => $product
            ], 200);
        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'Produk Tidak Ditemukan!',
                'data'    => ''
            ], 401);
        }
    }
}
