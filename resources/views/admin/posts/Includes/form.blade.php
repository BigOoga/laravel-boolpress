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
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        value="{{ old('title', $post->title) }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="image" class="form-label">Image URL</label>
                    <input type="text" class="form-control  @error('image') is-invalid @enderror" name="image"
                        value="{{ old('image', $post->image) }}">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control  @error('content') is-invalid @enderror" rows="4"
                        name="content"> {{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Category</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="category_id">
                            <option value="null">None</option>
                            @foreach ($categories as $category)
                                <option @if (old('category_id') == $category->id || $post->category_id == $category->id)
                                    selected
                                    @endif value="{{ $category->id }}">{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
