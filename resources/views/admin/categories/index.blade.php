@extends('layouts.app')
@section('content')
    @if (session('deleted'))
        <div class="alert alert-danger" role="alert">
            {{ session('deleted') }} category successfully deleted.
        </div>
    @endif
    @if (session('created'))
        <div class="alert alert-success" role="alert">
            {{ session('created') }} category successfully created.
        </div>
    @endif
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">Name <a class="btn btn-primary ml-3"
                        href="{{ route('admin.categories.create') }}"><span>New
                            +</span></a></th>

                <th scope="col">Color</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>


                    <td><span style="background-color:{{ $category->color }}"
                            class="badge text-shadow">{{ $category->color }}</span></td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary mx-1">Edit</a>
                        <form class="d-inline" action="{{ route('admin.categories.destroy', $category->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mx-1">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <h2>There are no categories yet! Go make some!</h2>
                <a class="btn btn-primary " href="{{ route('admin.posts.create') }}"><span>New
                        Add Category</span></a>
            @endforelse
        </tbody>
    </table>
@endsection
