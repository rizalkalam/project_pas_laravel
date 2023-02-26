@extends('layouts.main')
@section('content')
  <div class="container-fluid ps-md-0">
    
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
                <h3 class="login-heading mb-3">Selamat Datang,<br> di Amanah Furniture</h3>
                <p class="text-secondary mb-5">Silahkan masukkan akun anda untuk masuk!</p>
  
                <!-- Sign In Form -->
                <form class="mb-3 mt-md-4" action="/login" method="post">
                  @csrf
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
                    <input type="password" name="password" id="password" class="form-control" id="password" placeholder="*******" required>
                    <label for="floatingPassword">Password</label>
                  </div>
  
                  <div class="d-grid">
                    <button class="btn btn-lg btn-login text-uppercase fw-bold mb-3 mt-3 w-100" type="submit">Login</button>
                    <div class="text-center">
                      <p class="small">Belum punya akun? <a href="/register">Register!</a></p>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div
@endsection