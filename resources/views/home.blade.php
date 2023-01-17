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
        @foreach ($items as $preview)    
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
      <div class="d-grid gap-3 mb-3 d-md-flex justify-content-center">
        {{-- <button class="btn w-auto btn-primary" type="button" data-bs-target="#modalDetail" data-bs-toggle="modal">Edit</button> --}}
        <button type="button" class="btn mt-2 w-auto bg-info" data-bs-toggle="modal" data-bs-target="#modalDetail">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
          </svg>
        </button>
        <form action="/beranda/delete/{{ $item->id }}" method="post">
          @method('delete')
          @csrf
          {{-- <button class="btn btn-sm btn-primary w-auto">Delete</button> --}}
          <button type="submit" class="btn mt-2 w-auto bg-danger"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
          </svg></button>
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
          <div >
            <input type="hidden" required id="useri_id" name="user_id" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{ auth()->user()->id }}" readonly>
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
          <div >
            <input type="hidden" required id="useri_id" name="user_id" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{ auth()->user()->id }}" readonly>
          </div>
          <div class="mb-3">
            <label for="komentar" class="form-label">Deskripsi</label>
            {{-- @foreach ($testimoni as $testi)       --}}
            <textarea required id="komentar" name="komentar" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{ old('komentar', $item->komentar) }}</textarea>
            {{-- @endforeach --}}
          </div>
          <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" required id="tanggal" name="tanggal" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{ old('tanggal', $item->tanggal) }}">
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
