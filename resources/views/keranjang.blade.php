@extends('layouts.main')
@section('content')
<section class="pt-5 pb-5">
    <div class="container">
      <div class="row w-100">
          <div class="col-lg-12 col-md-12 col-12">
             
            {{-- @if ($item->user->id == auth()->user()->id)
                <h5 class="font-weight-bold mt-3 mb-4"><b>{{ count($keranjang) }}</b> <span class="text-secondary">Barang di keranjangmu</span></h5>
            @else
                <h5 class="font-weight-bold mt-3 mb-4"><b>0</b> <span class="text-secondary">Barang di keranjangmu</span></h5>
            @endif --}}
           
              <table id="shoppingCart" class="table table-condensed table-responsive">
                  <thead>
                      <tr>
                          <th style="width:8%">No</th>
                          <th style="width:55%">Produk</th>
                          <th style="width:12%">Harga</th>
                          <th style="width:10%">Jumlah</th>
                          <th style="width:14%"></th>
                      </tr>
                  </thead>
                  <tbody>

                    @php
                        $no = 1;
                        $grandtotal = 0;
                    @endphp
                    @foreach ($keranjang as $item)
                    @if ($item->user->id == auth()->user()->id)    
                    {{-- <h5 class="font-weight-bold mt-3 mb-4"><b>{{ count($keranjang) }}</b> <span class="text-secondary">Barang di keranjangmu</span></h5> --}}

                    @php
                        $subtotal= $item["harga"] * $item["jumlah"]
                    @endphp
    
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td data-th="Product">
                            <div class="row">

                                    <div class="col-md-3">
                                        <img src="{{ asset('images/'.$item->barang->gambar_barang) }}" alt="" class="img-fluid d-none d-md-block rounded mb-2 ">
                                    </div>
                                    <div class="col-md-9 text-left mt-sm-2">
                                        <h4>{{ $item->nama_barang }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price"><h5>@currency($item->harga)</h5></td>
                            <td data-th="Quantity">
                                <input type="number" class="form-control form-control-lg text-center" value="{{ $item->jumlah }}">
                            </td>
                            <td class="actions" data-th="">
                                <div class="text-right">
                                    <form action="/keranjang/hapus/{{ $item->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn w-50 btn-md align-content-md-end tombol-hapus mb-2 mt-1 ms-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @php
                            $grandtotal+= $subtotal;
                        @endphp
                        @else
              
                        @endif
    
    
                        @endforeach
                      </tbody>
                    </table>
                    <div class="text-right align-content-md-end total mt-2">
                        <h4 class="text-secondary">Total:</h4>
                        <h2>@currency($grandtotal)</h2>
                    </div>
                </div>
            </div>
            <form action="/order/payment" method="post">
                @csrf
                <input type="hidden" class="form-control form-control-lg text-center" name="barang_id" id="barang_id" value="{{ $item->barang->id }}">
                <input type="hidden" class="form-control form-control-lg text-center" name="user_id" id="user_id" value="{{ auth()->user()->username }}">
                <input type="hidden" class="form-control form-control-lg text-center" name="alamat" id="alamat" value="{{ auth()->user()->alamat }}">
                <input type="hidden" class="form-control form-control-lg text-center" name="no_hp" id="no_hp" value="{{ auth()->user()->no_hp }}">
                <input type="hidden" class="form-control form-control-lg text-center" name="jumlah" id="jumlah" value="{{ $item->jumlah }}">
                <input type="hidden" class="form-control form-control-lg text-center" name="total_harga" id="total_harga" value="{{ $item->harga }}">
            <div class="row mt-5 d-flex align-items-center">
                <div class="order-md-2 text-right mt-3">
                    <button type="submit" class="btn mb-5 btn-lg pl-5 pr-5 tombol-checkout">Checkout</button>
                </div>
            </div>
        </form>
        </div>
  </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  
@endsection