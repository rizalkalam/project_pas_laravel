@extends('layouts.produk')
@section('content')
 <!-- sofa -->
 <h2 class="text-center m-5" style="color: #E0C28D;"><b>Produk {{ $judul }}</b></h2>

 <div class="container mt-5 text-center">
 <div class="row row-cols-auto">
    @foreach ($barangs as $barang)    
    <div class="col-md-3">
    <div class="card produk">
        <img src="../{{ $barang->gambar_barang }}" class="card-img-top">
        <div class="nama-produk">
            <p>{{ $barang->nama_barang }}</p>
        </div>
    </div>
    </div>   
    @endforeach
 </div>
 </div>
<!-- akhir sofa -->

 <!-- promo -->
 <div class="diskon pb-5">
    <img class="img-promo" src="./assets/sofa_medium.png" alt="">
    <div class="jumbotron jumbotron-fluid promo">
    <div class="container">
        <p class="lead pt-5 fw-bold">Promo Akhir Tahun, Diskon 20%</p>
        <h3 class="display-6 fw-bold"><b>Sofa Medium Premium</b></h3>
        <p class="lead pt-4 pb-5 fw-bold"><del style="color: grey;">Rp. 4.999.999</del><br>Rp. 3.999.999</p>
        <button type="button" class="btn mb-4 fw-bold">Order Sekarang</button>
    </div>
    </div>
</div>
<!-- akhir promo -->
@endsection