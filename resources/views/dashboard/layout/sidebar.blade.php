<div class="row">
  <nav id="sidebarMenu"
    class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}"
            aria-current="page" href="/dashboard">
            <span data-feather="home"></span> Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/posts') ? 'active' : '' }}"
            href="/dashboard/posts">
            <span data-feather="file"></span> Posts
          </a>
        </li>

      </ul>

      <h6
        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Category Administrator</span>
      </h6>

      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/categories') ? 'active' : '' }}"" href="
            /dashboard/categories">
            <span data-feather="file-text"></span>Categories
          </a>
        </li>
        <li class="nav-item">
          <a class="btn btn-primary w-25 mt-4 d-block d-md-none" href="#">
            <span data-feather="log-out"></span> logout
          </a>
        </li>
      </ul>
    </div>
  </nav>
