@extends('layouts.main')
@section('content') 
  <div class="container profil-sec">
    <div class="main-body">
      @if (session()->has('success'))    
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session()->has('loginError'))    
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ session('loginError') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    {{-- <img src="/assets/patrickstar.jfif" alt="Admin" class="rounded-circle mt-3" width="200" height="200"> --}}
                    <img src="{{ asset('images/'.auth()->user()->photo_profiles) }}" class="rounded-circle mt-3" width="200" height="200">
                    <div class="mt-3 w-75">
                      <h4 class="mt-2">{{ auth()->user()->username }}</h4>
                      <p class="text-secondary pt-1">{{ auth()->user()->email }}</p>
                      <button type="button" class="btn btn-sm mt-3 mb-1 w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                          <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                        <a href="/profile/edit/{{ auth()->user()->id }}" style="text-decoration: none; color:white;"><span class="ps-2">Edit Profil</span></a> 
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body mt-3">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nama</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ auth()->user()->username }}
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ auth()->user()->email }}
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nomor Hp</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ auth()->user()->no_hp }}
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ auth()->user()->alamat }}
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#pwModal">Mau ganti password kah manis?</a>
                    </div>
                  </div>
                  <hr>
                  <a type="button" class="btn btn-sm mt-3 w-25" data-bs-toggle="modal" data-bs-target="#profileModal">Tambah Testimoni</a>
                  <p class="text-secondary mt-3">Testimoni Anda</p>
                  <div class="row">
                    <section class="home-testimonial-bottom">
                      <div class="container testimonial-inner">
                          <div class="row">
                            @auth
                            @foreach ($testimoni as $item)    
                            @if ($item->user->id == auth()->user()->id)
                            <div class="col-md-7 style-3 border-1">
                                <div class="tour-item">
                                    <div class="tour-desc bg-white shadow rounded-5">
                                        <div class="tour-text color-grey-2 text-center">{{ $item->komentar }}</div>
                                        <div class="link-name d-flex justify-content-center mt-2">{{ $item->tanggal }}</div>
                                        <div class="d-grid gap-3 mt-3 mb-3 d-md-flex justify-content-center">
                                          <button type="button" class="btn mt-2 w-auto bg-info" data-bs-toggle="modal" data-bs-target="#modalDetail">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                              <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                            </svg>
                                          </button>
                                          <form action="/profile/testi/delete/{{ $item->id }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn mt-2 w-auto bg-danger"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                              <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                            </svg></button>
                                          </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            @endif 
                            
                            @endforeach   
                            @endauth
                          </div>
                  </section>
                  </div>
                  <div class="row">
                    <!-- <div class="col-sm-12">
                      <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

{{-- testi-testi --}}
<!-- Modal -->
@auth

{{-- Modal PW --}}
<div class="modal fade" id="pwModal" tabindex="-1" aria-labelledby="pwModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="profileModalLabel">Ubah Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        @if (session()->has('success'))    
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('loginError'))    
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('loginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form class="mb-3 mt-md-4" action="/profile/verif" method="post">
          @csrf
          <div class="form-floating mb-3">
            <input type="password" name="password" id="password" class="form-control" id="password" placeholder="*******" required>
            <label for="floatingPassword">Masukkan password lama</label>
          </div>
          <button type="submit" class="btn mt-3 w-auto">Submit</button>
        </form>


      </div>
    </div>
  </div>
</div>

{{-- Modal PW --}}
<div class="modal fade" id="pwModal2" tabindex="-1" aria-labelledby="pwModal2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="profileModalLabel">Ubah Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form action="/profile/update" method="POST" enctype="multipart/form-data">
              @csrf
                  <input type="hidden" class="form-control" name="photo_profiles" id="photo_profiles" value="{{ old('photo_profiles', auth()->user()->photo_profiles) }}">
                  <input type="hidden" class="form-control" name="email" id="email" value="{{ old('email', auth()->user()->email) }}">
                  <input type="hidden" class="form-control" name="username" id="username" value="{{ old('username', auth()->user()->username) }}">
                  <input type="hidden" class="form-control" name="no_hp" id="no_hp" value="{{ old('no_hp', auth()->user()->no_hp) }}">
                  <input type="hidden" class="form-control" name="alamat" id="alamat" value="{{ old('alamat', auth()->user()->alamat) }}">
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                  </div>
                <div class="modal-footer">
                  <button type="button" class="btn mt-3 w-auto" data-bs-dismiss="modal">Close</button>
                  <button type="hidden" class="btn mt-3 w-auto">Submit</button>
                </div>
          </form>
      </div>
    </div>
  </div>
</div>
    
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="profileModalLabel">Tambah Ulasan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/profile/testi/add">
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
        
        <form method="POST" action="/profile/testi/update/{{ $item->id }}">
          @csrf
          <div >
            <input type="hidden" required id="useri_id" name="user_id" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{ auth()->user()->id }}" readonly>
          </div>
          <div class="mb-3">
            <label for="komentar" class="form-label">Deskripsi</label>
            {{-- @foreach ($testimoni as $testi) --}}
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

@endsection