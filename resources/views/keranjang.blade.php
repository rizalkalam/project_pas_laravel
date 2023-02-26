@extends('layouts.main')
@section('content')

             
            {{-- @if ($item->user->id == auth()->user()->id)
                <h5 class="font-weight-bold mt-3 mb-4"><b>{{ count($keranjang) }}</b> <span class="text-secondary">Barang di keranjangmu</span></h5>
            @else
                <h5 class="font-weight-bold mt-3 mb-4"><b>0</b> <span class="text-secondary">Barang di keranjangmu</span></h5>
            @endif --}}

            <div class="cart_section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="cart_container">
                              {{-- <h5 class="font-weight-bold mt-3 mb-3"><b>3</b> <span class="text-secondary">Barang di keranjangmu</span></h5> --}}
                                <div class="cart_items">
                                    <ul class="cart_list">

                                        @php
                                            $no = 1;
                                            $grandtotal = 0;
                                        @endphp

                                        @foreach ($keranjang as $item)
                                        @if ($item->user->id == auth()->user()->id)    
                                        @php
                                            $subtotal= $item["harga"] * $item["jumlah"]
                                        @endphp
                                        <li class="cart_item clearfix">
                                            <div class="cart_item_image"><img src="{{ asset('images/'.$item->barang->gambar_barang) }}" alt=""></div>
                                            <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between ">
                                                <div class="cart_item_name cart_info_col text-center nama-barang">
                                                    {{-- <div class="cart_item_title">Nama Barang</div> --}}
                                                    <div class="cart_item_text">{{ $item->nama_barang }}</div>
                                                </div>
                                                <div class="cart_item_quantity cart_info_col align-content-center jumlah">
                                                  {{-- <div class="cart_item_title">Jumlah</div> --}}
                                                  <input type="number" class="form-control form-control-lg text-center w-25 mt-3" value="{{ $item->jumlah }}">
                                                </div>
                                                <div class="cart_item_total cart_info_col text-center cart-harga">
                                                    {{-- <div class="cart_item_title">Harga</div> --}}
                                                    <div class="cart_item_text">@currency($item->harga)</div>
                                                </div>
                                                <div class="cart_item_total cart_info_col text-center">
                                                    <form action="/keranjang/hapus/{{ $item->id }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn w-75 btn-md align-content-md-end tombol-hapus mb-2 mt-3 ms-3 tombol-remove">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle pe-1" viewBox="0 0 16 16">
                                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                        @php
                                            $grandtotal+= $subtotal;
                                        @endphp
                                        @else
                            
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                                {{-- <form action="/order/payment" method="post">
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
                            </form> --}}
                                <div class="order_total">
                                    <div class="order_total_content text-md-right">
                                        <div class="order_total_title ps-4">Total:</div>
                                        <div class="order_total_amount">@currency($grandtotal)</div>
                                        <div class="order-md-2 text-right tombol-checkout">
                                            <form action="/order/payment" method="post">
                                            @csrf
                                                <input type="hidden" class="form-control form-control-lg text-center" name="barang_id" id="barang_id" value="{{ $item->barang->id }}">
                                                <input type="hidden" class="form-control form-control-lg text-center" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                                                <input type="hidden" class="form-control form-control-lg text-center" name="username" id="username" value="{{ auth()->user()->username }}">
                                                <input type="hidden" class="form-control form-control-lg text-center" name="alamat" id="alamat" value="{{ auth()->user()->alamat }}">
                                                <input type="hidden" class="form-control form-control-lg text-center" name="no_hp" id="no_hp" value="{{ auth()->user()->no_hp }}">
                                                <input type="hidden" class="form-control form-control-lg text-center" name="jumlah" id="jumlah" value="{{ $item->jumlah }}">
                                                <input type="hidden" class="form-control form-control-lg text-center" name="total_harga" id="total_harga" value="{{ $item->harga }}">
                                                <button type="submit" class="btn mb-5 btn-lg pl-5 pr-5">Checkout</button>
                                            </form>
                                          {{-- <a href="/order/payment/" class="btn mb-5 btn-lg pl-5 pr-5">Checkout</a> --}}
                                      </div>
                                    </div>
                                    <!-- <div class="cart_buttons">
                                      <button type="button" class="btn fw-bold float-end">Checkout</button>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
              {{-- <table id="shoppingCart" class="table table-condensed table-responsive">
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
            </div> --}}
            

            {{-- @foreach ($keranjang as $produk)
            <form action="/order/payment/{{ $produk->id }}" method="post">
                @csrf
                <input type="hidden" class="form-control form-control-lg text-center" name="barang_id" id="barang_id" value="{{ $produk->barang_id }}">
                <input type="hidden" class="form-control form-control-lg text-center" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" class="form-control form-control-lg text-center" name="username" id="username" value="{{ auth()->user()->username }}">
                <input type="hidden" class="form-control form-control-lg text-center" name="alamat" id="alamat" value="{{ auth()->user()->alamat }}">
                <input type="hidden" class="form-control form-control-lg text-center" name="no_hp" id="no_hp" value="{{ auth()->user()->no_hp }}">
                <input type="hidden" class="form-control form-control-lg text-center" name="jumlah" id="jumlah" value="{{ $produk->jumlah }}">
                <input type="hidden" class="form-control form-control-lg text-center" name="total_harga" id="total_harga" value="{{ $grandtotal }}">
            @endforeach
            <div class="row mt-5 d-flex align-items-center">
                <div class="order-md-2 text-right mt-3">
                    <button type="submit" class="btn mb-5 btn-lg pl-5 pr-5 tombol-checkout">Checkout</button>
                </div>
            </div>
        </form>
        
        </div> --}}
  </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  
@endsection