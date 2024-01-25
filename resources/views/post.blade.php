@extends('layouts.main')

@section('container')
    <article>
        <h2> {{ $post->title }} </h2>
        <p><a href="/categories/{{ $post->category->slug }}"
                class="text-decoration-none text-secondary">{{ $post->category->name }}</a></p>
    </article>

    <div class="container text-center">
        <div class="row">
            <div class="col">
                <img src="{{ $post->src }}" style="width: 30rem" alt="...">
            </div>
            <div class="col-4">
                <div class="h2">{{ $post->price }}</div>
                <div class="description fw-bold">Product Description</div>
                <div class="body">{{ $post->body }}</div>
                <div class="artistIcon">
                    <img src="{{ $post->author->src }}" alt="...">
                    <a href="/authors/{{ $post->author->username }}" class="text-decoration-none text-secondary fw-bold"
                        style="padding-top: 0.9rem; padding-left:0.5rem;">{{ $post->author->username }}</a>
                </div>
            </div>
            <div class="col">
                <div class="border col-2">
                    <form action="{{ route('addToCart', $post['id']) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-success rounded" style="max-width: 7.5rem; padding: 0.5rem;">
        <a href="/" style="text-decoration: none">
            <div class="text-center text-white">Back to Home</div>
        </a>
    </div>

    
@endsection
