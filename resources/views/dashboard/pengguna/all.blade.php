@extends('dashboard.layouts.main')
@section('content')
<br><br><br>

<table class="table table-light table-hover mt-2 text-center">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Foto</th>
      <th scope="col">Nama</th>
      <th scope="col">Akun</th>
      <th scope="col">Nomor HP</th>
      <th scope="col">Alamat</th>
    </tr>
  </thead>
  <tbody>

    @php
      $no = 1;
    @endphp

    @foreach ( $users as $user )
    <tr>
      <th scope="row">{{ $no++ }}</th>
      <td><img class="foto-profil rounded-circle" src="{{ asset('images/'.$user->photo_profiles) }}" alt="foto-profil"></td>
      <td>{{ $user->username }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->username }}</td>
      <td>{{ $user->no_hp }}</td>
      <td>{{ $user->alamat }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="mt-3">{!! $users->links() !!}</div>
  
@endsection