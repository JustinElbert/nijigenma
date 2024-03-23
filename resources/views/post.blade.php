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
                <div class="h2">Rp. {{ $post->price }}</div>
                <div class="description fw-bold">Product Description</div>
                <div class="body">{{ $post->body }}</div>
                <div class="artistIcon">
                    <img src="{{ $post->author->src }}" alt="...">
                    <a href="/authors/{{ $post->author->username }}" class="text-decoration-none text-secondary fw-bold"
                        style="padding-top: 0.9rem; padding-left:0.5rem;">{{ $post->author->username }}</a>
                </div>
            </div>
            <div class="col align-self-center">
                {{-- <div class="border col-2"> --}}
                    @auth 
                        <form action="{{ route('addToCart', $post['id']) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success" style="width: 15rem">Add to Cart</button>
                        </form>
                    @else
                        <button class="btn btn-success" style="border: none; width: 15rem;">
                            <a href="{{ route('login') }}" style="text-decoration: none; color: inherit;">
                                Please login to add to cart
                            </a>
                        </button>
                    @endauth
                {{-- </div> --}}
            </div>
        </div>
    </div>

    <div class="bg-success rounded" style="max-width: 7.5rem; padding: 0.5rem;">
        <a href="/" style="text-decoration: none">
            <div class="text-center text-white">Back to Home</div>
        </a>
    </div>
@endsection
