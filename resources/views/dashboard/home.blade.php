@extends('dashboard.layouts.main')
@section('content')

  <div class="home-content">
    <div class="overview-boxes">
        <h1 class="mx-auto">Welcome! {{ auth()->user()->username }}</h1>
      </div>
    </div>
  </div>
  
@endsection