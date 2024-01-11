
@extends('layouts.main')

@section('container')
    {{-- <h1 class ="mb-1">Home</h1> --}}

    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner rounded-4">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="{{ asset('assets/NijigenmaRed.png') }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="{{ asset('assets/NijigenmaBlue.png') }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/NijigenmaPurple.png') }}" class="d-block w-100" alt="...">
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
    {{-- https://source.unsplash.com/1200x400?nature --}}
    <div class="row row-cols-4">

            @foreach ($posts as $post)
            <div class="col">
            <article class="mb-5">

                <div class="card d-flex">
                    {{-- <img src="https://source.unsplash.com/1200x800/?japan" class="card-img-top" alt="..."> --}}
                    <img src="{{ $post->src }}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">
                        <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a>
                    </h5>
                    <p><a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->username }}</a></p>
                    <p><a href="/categories/{{ $post->category->slug }}" class="text-decoration-none text-secondary">{{ $post ->category ->username }}</a></p>
                    {{-- <p class="card-text">{{ $post->excerpt }}</p> --}}
                    <p class="card-text"><small class="text-body-secondary">{{$post->created_at->diffForHumans()}}</small></p>
                    </div>
                </div>

            </article>
            </div>
            @endforeach

    </div>
@endsection

