@extends('dashboard.layouts.main')
@section('content')
<br><br><br><br>
<div class="container">
    <h3 class="text-center mt-3">Edit produk</h3>
        <form method="post" action="/dashboard/produk/update/{{ $barang->slug }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label >Nama Produk</label>
                <input type="text" class="form-control" required id="name" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}">
            </div>
            <div class="mb-3">
                <label >Deskripsi Produk</label>
                <input type="text" class="form-control" required id="deskripsi_barang" name="deskripsi_barang" value="{{ old('deskripsi_barang', $barang->deskripsi_barang) }}">
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-select" name="kategori_id" id="">
                    @foreach ($kategori as $data)
                        @if (old('kategori_id', $barang->kategori_id == $data->id))
                            <option name="kategori_id" value="{{ $data->id }}" selected>{{ $data->nama_kategori }}</option>    
                        @else
                            <option name="kategori_id" value="{{ $data->id }}">{{ $data->nama_kategori }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="number" class="form-label">Harga</label>
                <input type="number" class="form-control" required id="harga" name="harga" value="{{ old('harga', $barang->harga) }}">
            </div>
            <div class="mb-3">
                <label for="gambar_barang" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar_barang" name="gambar_barang" value="{{ old('gambar_barang', $barang->gambar_barang) }}">
            </div>
            <div class="mb-3">
                <label for="gambar_detail_barang" class="form-label">Gambar Detail</label>
                <input type="file" class="form-control" id="gambar_detail_barang" name="gambar_detail_barang" value="{{ old('gambar_detail_barang', $barang->gambar_detail_barang) }}">
            </div>
            <div class="mb-3">
                <label class="mb-2">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" required value="{{ old('slug', $barang->slug)}}">
            </div>
        <a type="button" href="/dashboard/produk" class="btn btn-danger">Cancel</a>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
</div>
@endsection