<?php

namespace App\Http\Controllers\client;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        $data = array();
        $carts = Cart::all();
        foreach ($carts as $cart) {
            if ($cart->user->id == auth()->user()->id) {
                $data[]=[
                    'id'=>$cart->id,
                    'user_id'=>$cart->user_id,
                    'barang_id'=>$cart->barang_id,
                    'username'=>$cart->username,
                    'nama_barang'=>$cart->nama_barang,
                    'gambar_barang'=>$cart->barang->gambar_barang,
                    'harga'=>$cart->harga,
                    'jumlah'=>$cart->jumlah,
                    'total_harga'=>$cart->total_harga
                ];
            }
        }
        return response()->json([
            "success" => true,
            "message" => "Cart List",
            "data" => $data
        ]);
    }

    public function addCart(Request $request, $id)
    {
        $data = Cart::where('user_id', Auth::user()->id)->where('barang_id', $id)->first();

        if ($data) {
            return response()->json([
                'message'=> 'Confilct',
                'erorr'=> 'Barang sudah ada di keranjang'
            ],409);
        }
        else {

            $validator = Validator::make($request->all(),[
                'user_id' => 'required',
                'barang_id'=> 'required|max:255',
                'username'=> 'required',  
                'nama_barang'=> 'required',
                'gambar_barang'=> 'required',
                'harga'=> 'required',
                'jumlah'=> 'required',
                'total_harga'=> 'required'
            ]);

            $cart = Cart::create([
                'user_id' => auth()->user()->id,
                'barang_id'=> $request->barang_id,
                'username'=> auth()->user()->username,  
                'nama_barang'=> $request->nama_barang,
                'gambar_barang'=> $request->gambar_barang,
                'harga'=> $request->harga,
                'jumlah'=> $request->jumlah,
                'total_harga'=> $request->total_harga
            ]);

            return response()->json([
                'message' => 'Barang berhasil masuk keranjang',
                'data' => $cart,
            ]);
        }
    }

    public function deleteCart(Cart $cart, $id){
        $data = Cart::where('user_id', Auth::user()->id)->whereId($id)->first();
        
        if ($data) {
            $data->delete();
        // $cart = Cart::destroy($cart->id);
        return response()->json([
            'message' => 'Barang berhasil dihapus dari keranjang',
            'data' => ['nama_barang'=>$data->nama_barang]
            // 'data' => $cart
        ]);

        }else {
            return response()->json([
                'message'=> 'Error',
                'erorr'=> 'barang tidak ada di keranjang'
            ],409);
        }
        
    }
}
