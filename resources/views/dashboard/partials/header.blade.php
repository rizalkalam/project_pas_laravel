    <nav>
        <h5 class="dashboard">Amanah Furniture Dashboard</h5>
        @if (Route::is('produk'))
          <form action="/dashboard/produk" class="d-flex" role="search">
            <select class="form-select form-select-sm" name="kategori" id="">
              <option name="kategori" value="0"> Kategori </option>
              @foreach ($kategori as $item)
              @if (request('kategori') == $item->id)
              {{-- <option name="category" value="{{ $item->id }}"> -- Pengarang --</option> --}}
              <option name="kategori" value="{{ $item->id }}" selected>{{ $item->nama_kategori }}</option>
              @else
              <option name="kategori" value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
              @endif
              @endforeach
          </select>

            <input class="form-control me-2 ml-1" type="text" name="search" placeholder="Search" value="{{ request('search') }}" aria-label="Search">
            <button class="btn btn-outline-success" id="search" type="submit" type="submit">Search</button>
          </form>
        @elseif(Route::is('pengguna'))
        <form action="/dashboard/pengguna" class="d-flex" role="search">
          <input class="form-control me-2" type="text" name="search" placeholder="Search" value="{{ request('search') }}" aria-label="Search">
          <button class="btn btn-outline-success" id="search" type="submit" type="submit">Search</button>
        </form>
        @endif 
         
    </nav>
