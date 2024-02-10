<x-back-layout>
    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Enter Title for Category" class="form-control" value="{{ old('title') }}" />
        @error('title')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>
        <div class="form-group mt-3">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" placeholder="Enter Slug for Category" class="form-control" value="{{ old('title') }}" />
            @error('slug')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" placeholder="Enter Description" class="form-control">{{ old('title') }} </textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Category Image</label>
            <input type="file" id="image" name="image" class="form-control">
            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-success">Add</button>
        </div>
    </form>
</x-back-layout>
