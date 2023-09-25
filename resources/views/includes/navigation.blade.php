<header class="navigation fixed-top">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-white">
        <a class="navbar-brand order-1" href="{{ url('/') }}">
          <img class="img-fluid" width="100px" src="{{ asset('frontend') }}/images/blog.png"
            alt="Reader | Hugo Personal Blog Template">
        </a>
        <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item dropdown">
              <a class="nav-link" href="{{ url('/') }}" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                homepage <i class="ti-angle-down ml-1"></i>
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="index-full.html">Homepage Full Width</a>

                <a class="dropdown-item" href="index-full-left.html">Homepage Full With Left Sidebar</a>
              </div>
            </li>
            @auth
            @if (Route::has('front.contact'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('front.contact') }}">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">{{ Auth::user()->name }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('frontLogout').submit();">Logout</a>
              <form action="{{ route('logout') }}" method="post" id="frontLogout">
                @csrf
              </form>
            </li>
            @endif
                @else
                @if (Route::has('login'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                @endif
                @if (Route::has('register'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route("register") }}">Register</a>
                </li>
                @endif
            @endauth
          </ul>
        </div>

        <div class="order-2 order-lg-3 d-flex align-items-center">
          <select class="m-2 border-0 bg-transparent" id="select-language">
            <option id="en" value="" selected>En</option>
            <option id="fr" value="">Fr</option>
          </select>

          <!-- search -->
          <form class="search-bar">
            <input id="search-query" name="s" type="search" placeholder="Type &amp; Hit Enter...">
          </form>

          <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse" data-target="#navigation">
            <i class="ti-menu"></i>
          </button>
        </div>

      </nav>
    </div>
  </header>
