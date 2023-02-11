@extends('layouts.produk')
@section('content')
<section class="pt-5 pb-5">
    <div class="container">
      <div class="row w-100">
          <div class="col-lg-12 col-md-12 col-12">
            <h3 align="center">ini halaman checkout/order</h3>
            @foreach ($orders as $order)    
                <p>{{ $order->cart->nama_barang }}</p>
            @endforeach
          </div>
      </div>
    </div>
</section>

    
@endsection