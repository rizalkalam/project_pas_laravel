<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\Order;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class OrderController extends Controller
{
    public function index()
    {
        return view('order',[
            'orders'=>Order::all(),
            'active' =>'kategori',
            'kategoris' => Kategori::all(),
        ]);
    }

    public function checkout(Request $request)
    {

    }

    public function payment(Request $request)
    {
        $data = Order::where('user_id', Auth::user()->id)->first();
        // $order = Order::create($request->all());

        $validateData = $request->validate([
            'user_id' => 'required',
            'barang_id'=> 'required|max:255',
            'username'=> 'required',  
            'alamat'=> 'required',
            'no_hp'=> 'required',
            'jumlah'=> 'required',
            'total_harga'=> 'required',
            'status'=> '',
        ]);

        Order::create($validateData);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-client-p8L9Y7J0dvcF4gE6';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_harga,
            ),
            // 'item_details' => array(
            //     [
            //         'id' => '1',
            //         'price' => '99000',
            //         'quantity' => '1',
            //         'name' => 'kursi'
            //     ],
            //     [
            //         'id' => '2',
            //         'price' => '22000',
            //         'quantity' => '1',
            //         'name' => 'meja'
            //     ],
            // ),
            'customer_details' => array(
                'first_name' => $request->username,
                // 'last_name' => '',
                // 'email' => $request->get('eml'),
                'phone' => $request->no_hp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        

        return view('order',[
            'snap_token'=>$snapToken,
        ]);
    }
}
