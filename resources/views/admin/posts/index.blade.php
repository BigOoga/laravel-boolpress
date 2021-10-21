@extends('layouts.app')
@section('content')
    @if (session('deleted'))
        <div class="alert alert-danger" role="alert">
            {{ session('deleted') }}
        </div>
    @endif
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">Title <a class="btn btn-primary ml-3" href="{{ route('admin.posts.create') }}"><span>New
                            Post+</span></a></th>
                <th scope="col">Category</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>

                    @if ($post->category)

                        <td> <span class="badge badge-primary">{{ $post->category->name }}</span></td>

                    @else
                        <td> <span class="badge badge-secondary">None</span></td>

                    @endif
                    <td>{{ $post->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary mx-1">Details</a>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary mx-1">Edit</a>
                        <form class="d-inline" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mx-1">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <h2>There are no posts available!</h2>
            @endforelse
        </tbody>
    </table>
@endsection
