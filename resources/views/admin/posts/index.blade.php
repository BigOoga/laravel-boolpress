@extends('layouts.app')

@section('content')
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>


                    <td>{{ $post->title }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">Details</a>
                        {{-- <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary">Edit</a> --}}
                        {{-- <a href="{{ route('admin.posts.destroy', $post->id) }}" class="btn btn-primary">Delete</a> --}}


                    </td>

                </tr>
            @empty
                <h2>There are no posts available!</h2>
            @endforelse
        </tbody>
    </table>
@endsection
