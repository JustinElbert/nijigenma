
@extends('layouts.main')

@section('container')

    <article>
        <h2> {{ $post ->title }} </h2>
        <img src="{{ $post->src }}" style="width: 18rem" alt="...">
        <p><a href="/categories/{{$post->category->slug}}" class="text-decoration-none text-secondary">{{ $post ->category ->username}}</a></p>
        <h5><a href="/authors/{{ $post->author->username }}" class="text-decoration-none text-secondary">{{$post->author->username}}</a></h5>
        <div class="body">{{ $post ->body }}</div>
        <div class="price">{{ $post ->price }}</div>
    </article>

    <a href="/"> Back </a>
@endsection
