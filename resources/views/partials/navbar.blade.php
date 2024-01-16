<nav class="navbar" style="background-color: #E5E4E2">
    <div class="container justify-content-between">
      <a class="navbar-brand" href="/">
        <img src="{{ asset('assets/nijigenmaLogo.png') }}" alt="Bootstrap" width="160" height="40">
      </a>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-info" type="submit">Search</button>
      </form>
      <div class="buttons d-flex gap-3"style="padding: 0.5rem">
        <a class="btn btn-danger" href="/categories/" role="button">Category</a>
      @auth
        <div class="nav-item dropdown" style="padding: 0.5rem">
            <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome back, {{ auth()->user()->username }}
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/dashboard/">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
      @else
        <a class="btn btn-success" href="/login/" role="button">Login</a>
        <a class="btn btn-success" href="/register/" role="button">Register</a>
      @endauth

        
      </div>
    </div>
  </nav>
