<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartList()
    {
        // $cartItems = \Cart::getContent();
        // return response()->json(['Cart'=>$cartItems]);


    }

    public function addCart(Request $request, $id)
    {
        // \Cart::add([
        //     'id'=>$request->id,

        // ]);

        // $barang = Barang::where('id', $id)->first();

        //simpan ke database
        // $pesanan = Barang::whereId('id')->get();
        // if ($pesanan = '1') {
            
        //     //  $validateData = $request->validate([
        //     //     'user_id' => 'required',
        //     //     'barang_id'=> 'required|max:255',
        //     //     'username'=> 'required',
        //     //     'nama_barang'=> 'required',
        //     //     'harga'=> 'required',
        //     //     'jumlah'=> 'required',
        //     //     'total_harga'=> 'required'
        //     // ]);
    
        //     // Barang::where('id', $barang->id)->Chart::update($validateData);
        //     // return redirect('/keranjang/')->with('success', 'Book has been addes !');
           
        // } else {
           
        // }

        $data = Cart::where('user_id', Auth::user()->id)->where('barang_id', $id)->first();

        if ($data) {
            return redirect()->back()->with('error', 'barang sudah di keranjang');       
        }
        else {
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

        
        
            

        // $cart = session("cart");
        // $
        // $cart["id_barang"] = [
        //     "nama_barang" => $nama_barang,
        //     "harga" => $harga,
        //     "jumlah" => $jumlah
        // ];
    }

    public function deleteCart(Cart $cart){
        Cart::destroy($cart->id);
        return redirect('/keranjang')->with('success', 'data has been deleted !');
    }
}
