@extends('layouts.main')
@section('content') 
  <div class="container edit-profil">
    <div class="card">
        <div class="card-body">
            <form action="/profile/update/{{ auth()->user()->id }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="mb-3">
                  <label for="photo_profiles" class="form-label">Foto Profil</label>
                  <input type="file" class="form-control" name="photo_profiles" id="photo_profiles" value="{{ old('photo_profiles', auth()->user()->photo_profiles) }}">
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="email" value="{{ old('email', auth()->user()->email) }}">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" id="password" value="{{ old('email', auth()->user()->password) }}">
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" name="username" id="username" value="{{ old('username', auth()->user()->username) }}">
                </div>
                <div class="mb-3">
                  <label for="no_hp" class="form-label">Nomor Hp</label>
                  <input type="number" class="form-control" name="no_hp" id="no_hp" value="{{ old('no_hp', auth()->user()->no_hp) }}">
                </div>
                <div class="mb-3">
                  <label for="exampleInputNumber" class="form-label">Alamat</label>
                  <input type="text" class="form-control" name="alamat" id="alamat" value="{{ old('alamat', auth()->user()->alamat) }}">
                </div>
                <button type="submit" class="btn bg-primary w-auto mt-3">Simpan Perubahaan</button>
            </form>
        </div>
    </div>
  </div>
@endsection