
@extends('layouts.main')

@section('container')

    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner rounded-4">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="{{ asset('assets/nijigenma.png') }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="{{ asset('assets/oc.png') }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/Mixue.png') }}" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="row row-cols-4">

            @foreach ($posts as $post)
            <div class="col">
            <article class="mb-5">

                <div class="card d-flex">
                    <img src="{{ $post->src }}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">
                        <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a>
                    </h5>
                    <p><a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->username }}</a></p>
                    <p><a href="/categories/{{ $post->category->slug }}" class="text-decoration-none text-secondary">{{ $post ->category ->username }}</a></p>
                    <p class="card-text"><small class="text-body-secondary">{{$post->created_at->diffForHumans()}}</small></p>
                    </div>
                </div>

            </article>
            </div>
            @endforeach

    </div>
@endsection

