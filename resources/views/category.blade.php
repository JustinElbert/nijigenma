@extends('layouts.main')

@section('container')
    <h1 class ="mb-1">Category: {{ $category }}</h1>

    <div class="row row-cols-4">
        @foreach ($posts as $post)
            <div class="col">
                <article class="mb-5">
                    <div class="card d-flex">
                        <img src="{{ $post->src }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="/posts/{{ $post->slug }}"
                                    class="text-decoration-none text-dark">{{ $post->title }}</a>
                            </h5>
                            <p><a href="/authors/{{ $post->author->username }}"
                                    class="text-decoration-none">{{ $post->author->username }}</a></p>
                            <p><a href="/categories/{{ $post->category->slug }}"
                                    class="text-decoration-none text-secondary">{{ $post->category->name }}</a></p>
                            <p class="card-text"><small
                                    class="text-body-secondary">{{ $post->created_at->diffForHumans() }}</small></p>
                        </div>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
@endsection
