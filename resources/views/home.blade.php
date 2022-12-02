@extends('layouts.main')
@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h3 class="display-6 text-center pt-5 fw-bold"><b>Amanah Furniture</b></h3>
        <p class="lead text-center p-5">Furniture kualitas impor dengan harga ekonomi. <br>
        Berkualitas produknya, terjangkau harganya.</p>
    </div>
</div>

<div class="container mt-5 text-center">
    <div class="row row-cols-auto">
        @foreach ($previews as $preview)    
        <div class="col-md-3">
            <div class="card gambar">
                <img src="{{ $preview->gambar_barang }}" class="card-img-top">
            </div>
        </div>
        @endforeach
    </div>
</div>


<!-- produk -->
<h2 class="text-center m-5" style="color: #E0C28D;"><b>Produk</b></h2>

<div class="container mt-5 text-center">
  <div class="row row-cols-auto">
    @foreach ($barangs as $barang)    
    <div class="col-md-3">
      <a href="/barang/{{ $barang->slug }}" style="text-decoration: none; color:black">
        <div class="card produk mb-4">
          <img src="{{ $barang->gambar_barang }}" class="card-img-top">
          <div class="nama-produk">
            <p>{{ $barang->nama_barang }}</p>
          </a>    
            </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
<!-- akhir produk -->



@auth
<h2 class="text-center m-5" style="color: #E0C28D;"><b>Testimoni</b></h2>
   
<div class="container">


<div class="row row-cols-auto">
  @foreach ($testimonis as $item)
  <div class="col-md-2">
    <div class="card" style="width: 12rem;">
      <img src="/assets/testi-cewek.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{ $item->user->username }}</h5>
        <p class="card-text">{{ $item->komentar }}</p>
        <p class="card-text">{{ $item->tanggal }}</p>
      </div>
      @if ($item->user->id == auth()->user()->id)
      <div class="d-grid gap-1 mt-4 d-md-flex justify-content-center">
        <button class="btn w-auto btn-primary" type="button" data-bs-target="#modalDetail" data-bs-toggle="modal">Edit</button>
        <form action="/beranda/delete/{{ $item->id }}" method="post">
          @method('delete')
          @csrf
          <button class="btn btn-sm btn-primary w-auto">Delete</button>
        </form>
      </div>
      @else
          
      @endif
    </div>
  </div> 
  @endforeach
</div>


  <!-- Button trigger modal -->
<a type="button" class="btn mt-2 w-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah Ulasan
</a>
@else
<!-- testi -->
<h2 class="text-center m-5" style="color: #E0C28D;"><b>Testimoni</b></h2>

<div class="container">
  
  <div class="row row-cols-auto">
    @foreach ($testimonis as $item)
    <div class="col-md-2">
      <div class="card" style="width: 12rem;">
        <img src="/assets/testi-cewek.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $item->user->username }}</h5>
          <p class="card-text">{{ $item->komentar }}</p>
          <p class="card-text">{{ $item->tanggal }}</p>
        </div>
      </div>
    </div> 
    @endforeach
  </div>
</div>
  
  
  
  

@endauth


  
<!-- Modal -->
@auth
    
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Ulasan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/add">
          @csrf
          <div class="mb-3">
            <label for="user_id" class="form-label">Id User</label>
            <input required id="useri_id" name="user_id" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{ auth()->user()->id }}" readonly>
          </div>
          <div class="mb-3">
            <label for="komentar" class="form-label">Deskripsi</label>
            <textarea required id="komentar" name="komentar" class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea>
          </div>
          <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" required id="tanggal" name="tanggal" class="form-control" id="exampleFormControlTextarea1" rows="3">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn mt-3 w-auto" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn mt-3 w-auto">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Ulasan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <form method="POST" action="/beranda/update/{{ $item->id }}">
          @csrf
          <div class="mb-3">
            <label for="user_id" class="form-label">Id User</label>
            <input required id="useri_id" name="user_id" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{ auth()->user()->id }}" readonly>
          </div>
          <div class="mb-3">
            <label for="komentar" class="form-label">Deskripsi</label>
            <textarea required id="komentar" name="komentar" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn mt-3 w-auto">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

@else

@endauth
</div>
<!-- akhir testi -->
@endsection
