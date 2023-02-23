@extends('layouts.main')
@section('content') 
    {{-- <div class="kategori-sofa">
    
  </div> --}}

  <div class="container profil-sec">
    <div class="main-body">
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
                  <hr>
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
@endsection