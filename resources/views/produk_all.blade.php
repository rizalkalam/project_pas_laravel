@extends('layouts.main')
@section('content')    
{{-- <!-- diskon -->
<div class="diskon pb-5">
    <img class="img-promo" src="./assets/sofa_medium.png" alt="">
    <div class="jumbotron jumbotron-fluid promo">
    <div class="container">
        <p class="lead pt-5 fw-bold">Diskon Akhir Tahun, Diskon 20%</p>
        <h3 class="display-6 fw-bold"><b>Sofa Medium Premium</b></h3>
        <p class="lead pt-4 pb-5 fw-bold"><del style="color: grey;">Rp. 4.999.999</del><br>Rp. 3.999.999</p>
        <button type="button" class="btn mb-4 fw-bold">Order Sekarang</button>
    </div>
    </div>
</div>
<!-- akhir diskon --> --}}

<!-- produk -->
{{-- <h2 id="sec_produk" class="text-center m-5" style="color: #E0C28D;"><b>Produk</b></h2> --}}

<div class="diskon row gx-0 justify-content-center ">
    <div class="col-md-5">
        <form action="/produk" role="search">
            <div class="input-group">
                <select class="form-select form-select-sm" name="range" id="">    
                    @if (request('range') == 'low')
                        <option name="range" value=""> Range Harga </option>
                        <option name="range" value="low" selected> Harga Terendah </option>
                        <option name="range" value="high"> Harga Tertinggi </option>
                    @elseif(request('range') == 'high')
                        <option name="range" value=""> Range Harga </option>
                        <option name="range" value="low"> Harga Terendah </option>
                        <option name="range" value="high" selected> Harga Tertinggi </option>
                    @else
                        <option name="range" value="0" selected> Range Harga </option>
                        <option name="range" value="low"> Harga Terendah </option>
                        <option name="range" value="high"> Harga Tertinggi </option>
                    @endif
                </select>

  
            <input class="form-control" type="text" name="search" placeholder="Search" value="{{ request('search') }}" aria-label="Search">
            <button class="btn-lg" type="submit" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>

@if ($products->count()>0)
{{-- <div class="container mt-5 text-center">
    <div class="row row-cols-auto">
    <div class="col-md-3 mb-4">
        <div class="card produk">
        <a href="/barang/{{ $products[0]->slug }}" style="text-decoration: none; color:black">
            <img src="{{ asset('images/'.$products[0]->gambar_barang) }}" class="card-img-top">
        <div class="nama-produk">
            <p class="fw-bold">{{ $products[0]->nama_barang }}</p>
        </div>
        <div class="harga">
            <p>@currency($products[0]->harga)</p>
        </div>
        </a>
    </div>
    </div>
</div> --}}
@else
<div class="container mt-5 text-center">
    <p class="text-center fs-4">Not Found</p>
</div>
@endif
<div class="container mt-5 text-center">
    <div class="row row-cols-auto">
    @foreach ($products as $index => $product)        
        <div class="col-md-3 mb-4">
            <div class="card produk">
                <input type="hidden" value="{{ $index + $products->firstItem() }}">
            <a href="/barang/{{ $product->slug }}" style="text-decoration: none; color:black">
                <img src="{{ asset('images/'.$product->gambar_barang) }}" class="card-img-top">
            <div class="nama-produk">
                <p class="fw-bold">{{ $product->nama_barang }}</p>
            </div>
            <div class="harga">
                <p>@currency($product->harga)</p>
            </div>
            </a>
        </div>
    </div>
    @endforeach
</div>
</div>
<!-- akhir produk -->

{{-- @if (Route::is('filter')) 
@else
<div class="d-flex justify-content-center mt-4">
    {!! $products->links() !!}
</div>
@endif --}}

<div class="d-flex justify-content-center mt-4">
   {{ $products->links() }}
</div> 


@endsection