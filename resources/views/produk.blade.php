@extends('layouts.produk')
@section('content')
 <!-- sofa -->
 <h2 class="text-center m-5" style="color: #E0C28D;"><b>Produk {{ $judul }}</b></h2>

 <div class="container mt-5 text-center">
 <div class="row row-cols-auto">
    @foreach ($barangs as $barang)    
    <div class="col-md-3">
    <a href="/barang/{{ $barang->slug }}" style="text-decoration: none; color:black">
    <div class="card produk">
        <img src="{{ asset('images/'.$barang->gambar_barang) }}" class="card-img-top">
        <div class="nama-produk">
            <p>{{ $barang->nama_barang }}</p>
        </a>
        </div>
    </div>
    </div>   
    @endforeach
 </div>
 </div>
<!-- akhir sofa -->
<!-- promo -->
@foreach ($promos as $promo)    
@if (($promo->keterangan=='promo'))
<div class="diskon pb-5">
    <img class="img-promo" src="../{{ $promo->gambar_barang }}" alt="">
    <div class="jumbotron jumbotron-fluid promo">
      <div class="container">
          <p class="lead pt-5 fw-bold">{{ $promo->judul_promo }}</p>
          <h3 class="display-6 fw-bold"><b>{{ $promo->nama_barang }}</b></h3>
          <p class="lead pt-4 pb-5 fw-bold"><del style="color: grey;">Rp. {{ $promo->harga }}</del><br>Rp. {{ $promo->diskon }}</p>
          <button type="button" class="btn mb-4 fw-bold">Order Sekarang</button>
        </div>
    </div>
</div>
<!-- akhir promo -->
  @else
  
  @endif
@endforeach

@endsection