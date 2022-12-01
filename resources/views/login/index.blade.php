@extends('layouts.form')
@section('content')
<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="container">

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

      <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
          <div class="card bg-white shadow-lg">
            <div class="card-body p-5">
              <form class="mb-3 mt-md-4" action="/login" method="post">
                @csrf
                <h2 class="fw-bold mb-5 text-uppercase text-center">Amanah Furniture</h2>
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
                  <input type="password" name="password" id="password" class="form-control" id="password" placeholder="*******" required>
                </div>
                <div class="d-grid">
                  <button class="btn mt-3 w-100" type="submit">Login</button>
                  <p class="small text-end mt-3"><a class="text-primary" href="/register">Belum punya akun?</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection