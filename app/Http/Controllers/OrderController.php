<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\Order;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function payment(Request $request, $id)
    {
        $person = Order::where('user_id', Auth::user()->id)->where('barang_id', $id)->first();;
        $data = Order::create($request->all());

        // $data = Order::create($request->validate([
        //     'id'=>'required|hash',
        //     'user_id' => 'required',
        //     'barang_id'=> 'required|max:255',
        //     'username'=> 'required',  
        //     'alamat'=> 'required',
        //     'no_hp'=> 'required',
        //     'jumlah'=> 'required',
        //     'total_harga'=> 'required',
        //     'status'=> '',
        // ]));

        // Order::create($data);


        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-qcwSPi9JWa2q1rbWKW_cu_m4';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $data->id,
                'gross_amount' => $data->total_harga*$data->jumlah,
                'payment_amounts' => $data->total_harga*$data->jumlah,
            ),
           
            'customer_details' => array(
                'first_name' => $request->username,
                // 'last_name' => '',
                // 'email' => $request->email,
                'alamat'=> $request->alamat,
                'phone' => $request->no_hp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        

        return view('order',[
            'snapToken'=>$snapToken,
            'active' =>'kategori',
            'kategoris' => Kategori::all(),
            'data'=>$data->id = Str::random(9)
        ]);
    }

    public function callback(Request $request)
    {
        $serverKey = 'SB-Mid-server-qcwSPi9JWa2q1rbWKW_cu_m4';
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $data = Order::find($request->order_id);
                $data->update(['status' => 'Paid']);
            }
        }
    }
}
