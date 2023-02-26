@extends('layouts.main')
@section('content')
<div class="container-fluid ps-md-0">
  <div class="row g-0">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image">
      <div class="mt-5">
      
      </div>
    </div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <!-- <h3 class="login-heading mb-3">Selamat Datang,<br> di Amanah Furniture</h3> -->
              <p class="text-secondary mb-5 mt-5">Daftarkan akun anda untuk masuk!</p>

              <!-- Sign In Form -->
              <form class="mb-3" action="/register" method="post">
                @csrf
                <div class="form-floating mb-3">
                  <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" required value="{{ old('username') }}">
                  @error('username')    
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  <label for="floatingInput">Nama</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                  @error('email')    
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="*******" required name="password">
                  @error('password')    
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="ho_hp" placeholder="+62 " required>
                  @error('no_hp')    
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  <label for="floatingInput">Nomor HP</label>
                </div>
                <div class="form-floating mb-3">
                  <textarea class="form-control @error('no_hp') is-invalid @enderror" id="alamat" name="alamat" rows="3" required></textarea>
                  @error('alamat')    
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <label for="floatingInput">Alamat</label>
                </div>

                <div class="d-grid">
                  <button class="btn btn-lg btn-login text-uppercase fw-bold mb-3 mt-3 w-100" type="submit">Register</button>
                  <div class="text-center">
                    <p class="small">Sudah punya akun? <a href="/login">Masuk!</a></p>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection