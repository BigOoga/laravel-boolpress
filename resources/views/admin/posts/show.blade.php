@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->content }}</p>
            <address>{{ $post->created_at }}</address>
        </div>
        <div class="row">
            <img src="{{ $post->image }}" alt="">

        </div>
    </div>
@endsection
