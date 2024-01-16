<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nijigenma | Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
  </head>
  <body>

<header class="navbar sticky-top flex-md-nowrap p-0 shadow " style="background-color: #E5E4E2" data-bs-theme="dark">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="/">
    <img src="{{ asset('assets/nijigenmaLogo.png') }}" alt="Bootstrap" width="160" height="40">
  </a>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="nav-link px-3 border-0 text-black">Logout</button>
        </form>
    </div>
  </div>

</header>

<div class="container-fluid" style="height: 100vh;">
  <div class="row" style="height: 100%;">
    <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" aria-current="page" href="/dashboard">
                <span class="text-black" data-feather="user"></span>
                Profile
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 text-black active" href="/dashboard/posts">
                <span class="text-black" data-feather="file-text"></span>
                Commissions
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome Back, {{ auth()->user()->username }}</h1>
        <div class="bg-success rounded" style="padding: 0.5rem">
          <a href="/dashboard/posts/create" style="text-decoration: none">
            <div class="text-center text-white">Add new Post</div>
          </a>
        </div>
      </div>
        <div class="row row-cols-4">

            @foreach ($posts as $post)
                <div class="col">
                    <article class="mb-5">

                        <div class="card d-flex flex-column h-100">
                            <img src="/{{ $post->src }}" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">
                                <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a>
                            </h5>
                            <p><a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->username }}</a></p>
                            <p><a href="/categories/{{ $post->category->slug }}" class="text-decoration-none text-secondary">{{ $post ->category ->username }}</a></p>
                            <p class="card-text"><small class="text-body-secondary">{{$post->created_at->diffForHumans()}}</small></p>
                            </div>
                            <div class="container">
                              <div class="row">
                                <div class="col bg-warning" style="padding-top: 0.5rem; padding-bottom: 0.5rem">
                                  <a href="" style="text-decoration: none">
                                    <div class="text-center text-black">Edit</div>
                                  </a>
                                </div>
                                <div class="col bg-danger" style="padding-top: 0.5rem; padding-bottom: 0.5rem">
                                  <a href="" style="text-decoration: none">
                                    <div class="text-center text-black">Delete</div>
                                  </a>
                                </div>
                              </div>
                            </div>
                        </div>

                    </article>
                </div>
            @endforeach

        </div>
    </main>

  </div>
</div>
{{-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> --}}

    <script src="/js/dashboard.js"></script>
    <script>
      feather.replace();
    </script>
</body>
</html>