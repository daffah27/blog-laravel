<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ ($active === "Dashboard") ? 'text-danger' : 'text-dark' }} text-decoration-none" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-decoration-none {{ Request::is('dashboard/posts*') ? 'text-danger' : 'text-dark' }}" href="/dashboard/posts">
            <span data-feather="file" class="align-text-bottom"></span>
            Postingan Saya
          </a>
        </li>
      </ul>

      @can('admin')
      <h6 class="d-flex sidebar-heading justify-content-start align-items-start text-muted px-3 mt-4 mb-1 ">Administrator</h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/kategori*') ? 'text-danger' : 'text-dark' }} text-decoration-none" aria-current="page" href="/dashboard/kategori">
            <span data-feather="home" class="align-text-bottom"></span>
            Kategori
          </a>
        </li>
      </ul>

      @endcan

  
    </div>
  </nav>