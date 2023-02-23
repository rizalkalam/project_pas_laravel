@extends('dashboard.layouts.main')
@section('content')
<br><br>
<div class="container">
    <h2 align="center" class="mt-5">Tambah Produk</h2>
    <form class="mt-3" method="post" action="/dashboard/produk/add" enctype="multipart/form-data">
        @csrf
      <div class="mb-3">
        <label class="mb-2">Nama Produk</label>
        <input type="text" class="form-control" id="nama_barang" name="nama_barang" required value="{{ old('nama_barang')}}">
      </div>
      <div class="mb-3">
          <label class="mb-2">Deskripsi Produk</label>
          <input type="text" class="form-control" id="deskripsi_barang" name="deskripsi_barang" required value="{{ old('deskripsi_barang')}}">
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" name="kategori_id" id="">
                @foreach ($kategori as $kategori)
                <option name="kategori_id" value="{{ $kategori->id}}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
          </div>
      <div class="mb-3">
        <label class="mb-2">Harga</label>
        <input type="number" class="form-control" id="harga" name="harga" required value="{{ old('harga')}}">
      </div>
      <div class="mb-3">
        <label for="gambar_barang" class="form-label">Gambar</label>
        <input type="file" class="form-control" required id="gambar_barang" name="gambar_barang">
      </div>
      <div class="mb-3">
        <label for="gambar_detail_barang" class="form-label">Gambar Detail</label>
        <input type="file" class="form-control" required id="gambar_detail_barang" name="gambar_detail_barang">
      </div>
      <div class="mb-3">
        <label class="mb-2">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" required value="{{ old('slug')}}">
      </div>
      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection