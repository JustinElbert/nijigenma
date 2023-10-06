
@extends('layouts.main')

@section('container')

    <article>
        <h2> {{ $post ->title }} </h2>
        <img src="/{{ $post->src }}" style="width: 18rem; alt="...">
        <p><a href="/categories/{{$post->category->slug}}" class="text-decoration-none text-secondary">{{ $post ->category ->name}}</a></p>
        <h5><a href="/authors/{{ $post->author->id }}" class="text-decoration-none text-secondary">{{$post->author->name}}</h5>
        <p>{{ $post ->body }}</p>
    </article>

    <a href="/"> Back </a>
@endsection
