<nav class="navbar navbar-expand-lg bg-202020 py-3 border-bottom border-1">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">Game News</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link list-cst" aria-current="page" href="{{route('welcome')}}">Home</a>
        </li>
        @auth
        <li>
          <a class="nav-link list-cst" aria-current="page" href="{{route('article.create')}}">Insert Article</a>
        </li>
        {{-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-warning" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Actions
          </a>
          <ul class="dropdown-menu bg-202020 border border-1 border-warning">
            <li>
              <a class="dropdown-item list-cst" aria-current="page" href="{{route('article.create')}}">Insert Article</a>
            </li>
            @if (Auth::user()->isAdmin())
            <li>
              <a class="dropdown-item list-cst" aria-current="page" href="{{route('tag.create')}}">Insert Tag</a>
            </li>
            @endif
          </ul>
        </li> --}}
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle list-cst" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{Auth::user()->name}}@if (Auth::user()->isAdmin()) (admin) @endif
          </a>
          <ul class="dropdown-menu bg-202020 border border-1 border-warning">
            <li><a class="dropdown-item list-cst" href="{{route('logout')}}" onclick="event.preventDefault(); getElementById('form-logout').submit();">Logout</a>
              <form id="form-logout" action="{{route('logout')}}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
            <li>
              <a href="{{route('myprofile')}}" class="dropdown-item list-cst">My Profile</a>
            </li>
            @if (Auth::user()->isAdmin())
            <li>
              <a href="{{route('tag.index')}}" class="dropdown-item list-cst">Manage Tags</a>
            </li>
            @endif
          </ul>
        </li>       
        @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-warning" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Guest
          </a>
          <ul class="dropdown-menu bg-202020 border border-1 border-warning">
            <li><a class="dropdown-item list-cst" href="{{route('login')}}">Sign In</a></li>
            <li><a class="dropdown-item list-cst" href="{{route('register')}}">Sign Up</a></li>
          </ul>
        </li>            
        @endauth
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-warning" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>