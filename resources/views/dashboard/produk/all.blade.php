@extends('dashboard.layouts.main')
@section('content')

<br><br>
<a href="/dashboard/produk/create" type="button" class="btn btn-primary ml-3 mt-5"><i class='bx bx-plus'></i>Tambah Produk</a>


@php
  $i = $barangs->firstItem();
@endphp

<table class="table table-light table-hover mt-2 text-center">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Harga</th>
        <th scope="col">Gambar</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($barangs as $barang)        
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{ $barang->nama_barang }}</td>
      <td>@currency($barang->harga)</td>
      <td><img src="{{ asset('images/'.$barang->gambar_barang) }}" alt="" class="img-thumbnail" width="50" height="50"></td>
      <td>
        <a type="button" class="btn btn-warning" href="/dashboard/produk/edit/{{ $barang->slug }}">Edit</a>
        {{-- <a type="button" class="btn btn-info" >Detail</a> --}}
          <form action="/dashboard/produk/delete/{{ $barang->slug }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger" onclick="return confirm('Are you sure ?')">Hapus</button>
          </form>
      </td>
    </tr>
    @endforeach
    </tbody>
  </table>
  <div class="mt-2">{!! $barangs->links() !!}</div>
  
@endsection