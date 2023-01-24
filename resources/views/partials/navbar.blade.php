    <nav class="navbar navbar-expand-lg navbar-light bg-white p-3">
      <div class="container">
        <a class="navbar-brand" href="#" style="color: #E0C28D;"><b>Amanah Furniture</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active fw-bold" style="color: #E0C28D;" aria-current="page" href="/beranda">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="/produk.html">Produk</a>
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
                <a class="dropdown-item nav-link" href="dashboard"> Dashboard</a>
               </li>
               @else
               <li>
                <a class="dropdown-item nav-link" href="dashboard"> My Profile</a>
               </li>
               @endif

               
                
                <li><form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item nav-link">Logout</button>
                </form></li>    
                @else
                <li><a class="dropdown-item nav-link {{ ($active === "login")? 'active' : '' }}" href="/login">Log In</a></li>
              </ul>
            </li>
            @endauth
          </ul>
        </div>
      </div>
    </nav>
