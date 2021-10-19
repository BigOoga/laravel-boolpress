<div class="container">
    @if ($post->exists)
        <div class="row">
            <h1>Edit</h1>
        </div>
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
            @method('PATCH')
        @else
            <div class="row">
                <h1>New Post</h1>
            </div>
    @endif
    <form action="{{ route('admin.posts.store', $post->id) }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="image" class="form-label">Image URL</label>
                    <input type="text" class="form-control" name="image" value="{{ $post->image }}">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" rows="4" name="content"> {{ $post->content }}</textarea>
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
