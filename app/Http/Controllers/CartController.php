<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function cartList()
    {
        // $cartItems = \Cart::getContent();
        // return response()->json(['Cart'=>$cartItems]);


    }

    public function addCart(Request $request, Cart $cart, Barang $barang)
    {
        // \Cart::add([
        //     'id'=>$request->id,

        // ]);

        // $barang = Barang::where('id', $id)->first();

        //simpan ke database

        
            $validateData = $request->validate([
                'user_id' => 'required',
                'barang_id'=> 'required|max:255',
                'username'=> 'required',
                'nama_barang'=> 'required',
                'harga'=> 'required',
                'jumlah'=> 'required',
                'total_harga'=> 'required'
            ]);
    
            Cart::create($validateData);
            return redirect('/keranjang/')->with('success', 'Book has been addes !');
    }

    public function deleteCart(Cart $cart){
        Cart::destroy($cart->id);
        return redirect('/keranjang')->with('success', 'data has been deleted !');
    }
}
