<nav class="navbar navbar-expand-lg bg-danger navbar-dark ">
    <div class="container">
      <a class="navbar-brand" href="#">Belajar Daffah</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link @if($active === 'Home') active @endif" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "Profile") ? 'active' : '' }}" href="/profile">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "Postingan") ? 'active' : '' }}" href="/postingan">Posting</a>
          </li>
          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle {{ ($active === "Kategori") ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Kategori
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/kategori/Makanan">Makanan</a></li>
              <li><a class="dropdown-item" href="/kategori/Minuman">Minuman</a></li>
              <li><a class="dropdown-item" href="/kategori/teknologi">Teknologi</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/kategori">Pilihan Kategori</a></li>
            </ul>
          </li>
        </ul>

        @auth

          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->name }}
              </button>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                  <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">Log Out</button>
                  </form>
                </li>
              </ul>
            </li>
          </ul>


        @else
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a href="/login" class="nav-link {{ ($active === "Login") ? 'active' : ''}} ">Login</a>
            </li>
          </ul>
        @endauth


       </div>
    </div>
</nav>