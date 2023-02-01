<?php

namespace App\Http\Controllers\client;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Barang::all();
        return response()->json([
            "success" => true,
            "message" => "Product List",
            "data" => $products
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
