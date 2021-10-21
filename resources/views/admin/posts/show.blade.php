@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>{{ $post->title }}</h1>
        </div>
        <div class="row">
            <p>{{ $post->content }}</p>
        </div>
        <div class="row">
            <address>Posted on: {{ $post->created_at }}</address>
        </div>
        <div class="row">
            <address>Category: {{ $post->category->name }}</address>
        </div>
        <div class="row">
            <img src="{{ $post->image }}" alt="">

        </div>
    </div>
    </div>
@endsection
