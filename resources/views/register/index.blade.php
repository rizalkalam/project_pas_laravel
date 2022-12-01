@extends('layouts.form')
@section('content')
<div class="vh-100 d-flex justify-content-center align-items-center m-5">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
          <div class="card bg-white shadow-lg">
            <div class="card-body p-5">
              <form class="mb-3" action="/register" method="post">
                @csrf
                <h2 class="fw-bold mb-2 text-uppercase text-center">Amanah Furniture</h2>
                <h4 class="text-center mb-3">Register</h4>
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" required value="{{ old('username') }}">
                  @error('username')    
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label ">Email</label>
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                  @error('email')    
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label ">Password</label>
                  <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="*******" required name="password">
                  @error('password')    
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="no_hp" class="form-label ">Nomor HP</label>
                  <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="ho_hp" placeholder="+62 " required>
                  @error('no_hp')    
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control @error('no_hp') is-invalid @enderror" id="alamat" name="alamat" rows="3" required></textarea>
                    @error('alamat')    
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                <div class="d-grid">
                  <button class="btn mt-3 w-auto" type="submit">Daftar</button>
                  <p class="small text-end mt-3"><a class="text-primary" href="/login">Sudah punya akun?</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection