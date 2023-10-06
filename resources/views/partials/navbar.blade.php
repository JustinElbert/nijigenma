<nav class="navbar" style="background-color: #566680">
    <div class="container justify-content-between">
      <a class="navbar-brand" href="/">
        <img src="{{ asset('assets/nijigenmaLogo.png') }}" alt="Bootstrap" width="160" height="40">
      </a>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-info" type="submit">Search</button>
      </form>
      <div class="buttons d-flex gap-3">
        <button type="button" class="btn btn-success">Login</button>
        <button type="button" class="btn btn-success">Register</button>
        <a class="btn btn-danger" href="/categories/" role="button">Category</a>
      </div>
    </div>
  </nav>
