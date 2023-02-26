<nav class="navbar navbar-expand-lg navbar-light bg-white p-3 shadow">
  <div class="container">
    <a class="navbar-brand" href="/"><b>Amanah Furniture</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link {{ ($active === "beranda")? 'active' : '' }} aria-current='page'" href="/beranda">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === "produk")? 'active' : '' }} aria-current='page'" href="/produk">Produk</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kategori
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            @foreach ($kategoris as $kategori)    
            <li><a class="dropdown-item" href="/kategori/{{ $kategori->slug }}">{{ $kategori->nama_kategori }}</a></li>
            @endforeach
            {{-- <li><a class="dropdown-item" href="/meja/all">Meja</a></li>
            <li><a class="dropdown-item" href="/kursi/all">Kursi</a></li> --}}
          </ul>
        </li>

        
        
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome {{ auth()->user()->username }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

           @if (Auth::user()->hasRole('admin'))
           <li>
            <a class="dropdown-item" href="dashboard/home"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data" viewBox="0 0 16 16">
              <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z"/>
              <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
              <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
            </svg> Dashboard</a>
           </li>
           @else
           
           @endif
           
           
           
            
            <li><form action="/logout" method="POST">
              @csrf
              <button type="submit" class="dropdown-item nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
                <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
              </svg> Log Out</button>
            </form></li>    
            @else
            <li><a class="dropdown-item nav-link {{ ($active === "login")? 'active' : '' }}" href="/login">Log In</a></li>
            @endauth
          </ul>
        </li>
         
        @auth
          @if (Auth::user()->hasRole('admin'))

          @else
            <li class="nav-item">
              <a href="/keranjang" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg></a>
            </li>
            <li class="nav-item">
              <a href="/profile/me" class="nav-link">
                <img class="rounded-circle navigasi-profil" src="{{ asset('images/'.auth()->user()->photo_profiles) }}" alt="">
              </a>
            </li>
          @endif
        @endauth
      </ul>
    </div>
  </div>
</nav>
