<div class="container">
    @if ($category->exists)
        <div class="row">
            <h1>Edit</h1>
        </div>
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @method('PATCH')
        @else
            <div class="row">
                <h1>New Category</h1>
            </div>
    @endif
    <form action="{{ route('admin.categories.store', $category->id) }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name', $category->name) }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Color Hex</label>
                    <input type="text" class="form-control @error('color') is-invalid @enderror" name="color"
                        value="{{ old('color', $category->color) }}">
                    @error('color')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
