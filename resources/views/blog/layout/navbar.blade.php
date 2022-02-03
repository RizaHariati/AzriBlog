<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container col-12 col-md-10 ">

    <div class="d-flex">
      <img src="{{ asset('assets/images/lotus.png') }}" width="40px" height="40px"
        alt="logo">
      <a class="navbar-brand" href="/">
        <h2 class="display-3" style="letter-spacing: 2px"> Azri<span
            class="text-info">Blog</span></h2>
      </a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}"
            aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('posts') ? 'active' : '' }}"
            href="/posts">Posts</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
            role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Contributors
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($users as $user)
              <li><a class="dropdown-item"
                  href="/posts?user={{ $user->username }}">{{ $user->name }}</a>
              </li>
            @endforeach
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
            role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($categories as $category)
              <li><a class="dropdown-item"
                  href="/posts?category={{ $category->slug }}">{{ $category->name }}</a>
              </li>
            @endforeach

          </ul>
        </li>

      </ul>

      @auth()
        <di class="nav-item dropdown  ">
          <a class="nav-link dropdown-toggle text-white btn btn-outline-info" href="#"
            id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
            <li><a class="dropdown-item"
                href="/posts?user={{ auth()->user()->username }}">Your Posts</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item btn btn-primary" href="/logout">Logout</a></li>
          </ul>
        </di>
      @else
        <a href="/login" class="btn btn-outline-light">
          <i class="bi bi-box-arrow-in-right mr-1"></i> Dashboad Login</a>
      @endauth

    </div>

    {{-- </div> --}}
  </div>
</nav>
