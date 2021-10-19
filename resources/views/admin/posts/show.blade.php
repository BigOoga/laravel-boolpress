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
            <address>{{ $post->created_at }}</address>
        </div>
    </div>
    <div class="row">
        <img src="{{ $post->image }}" alt="">

    </div>
    </div>
@endsection
