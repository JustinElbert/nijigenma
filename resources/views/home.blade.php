
@extends('layouts.main')

@section('container')
    <h1 class ="mb-1">Home</h1>
    <div class="row row-cols-4">

            @foreach ($posts as $post)
            <div class="col">
            <article class="mb-5">

                <div class="card d-flex p-2" style="width: 18rem;">
                    <img src="/{{ $post->src }}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">
                        <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-secondary">{{ $post->title }}</a>
                    </h5>
                    {{-- <h6 class="card-subtitle mb-2 text-body-secondary">{{ $post->artist }}</h6> --}}
                    <p><a href="/authors/{{ $post->author->username }}" class="text-decoration-none text-secondary">{{ $post->author->name }}</a></p>
                    <p><a href="/categories/{{ $post->category->slug }}" class="text-decoration-none text-secondary">{{ $post ->category ->name }}</a></p>
                    <p class="card-text">{{ $post->excerpt }}</p>
                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                    </div>
                </div>

            </article>
            </div>
            @endforeach

    </div>
@endsection


