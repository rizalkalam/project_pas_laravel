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
}
