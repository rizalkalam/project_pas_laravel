@extends('layouts.produk')
@section('content')
    <!-- tombol back -->
    <div class="d-grid back">
        <a href="javascript:history.back()">
          <svg class="icon-back" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
          </svg>
        </a>
      </div>
      <!-- akhir tombol back -->
  
      <div class="detail-barang">
        <img class="gambar-barang mt-5" src="../{{ $barang->gambar_detail_barang }}" alt="" />
        <div class="deskripsi-barang">
          <h2 class="ms-5 mt-5"><b>{{ $barang->nama_barang }}</b></h2>
          <p class="w-50 ms-5 mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit hic ex iste, obcaecati voluptates quis reprehenderit minima. Eaque, quas sapiente?</p>
          <p class="w-50 ms-5 pb-5">Bonus 2 bantal besar + 4 bantal kecil</p>
          <p class="lead pt-4 pb-5 fw-bold ms-5 mt-5">@currency($barang->harga)</p>
          <button type="button" class="btn tombol-order ms-5 w-auto" data-bs-dismiss="modal">Order Sekarang</button>
        </div>
      </div>
    </body>
@endsection