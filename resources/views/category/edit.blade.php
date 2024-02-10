
<x-back-layout>
    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Enter Title for Category" class="form-control" value={{ old('title') ?? $category->title}} />
            @error('title')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" placeholder="Enter Slug for Category" class="form-control" value={{ old('slug') ?? $category->slug}}  />
            @error('slug')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" placeholder="Enter Description" class="form-control">{{old('description') ??  $category->description}} </textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Category Image</label>
            <input type="file" id="image" name="image" class="form-control">
            <img src="{{ asset('storage/images/'.$category->image) }}" alt="{{  $category->title }}" width="150">
            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-success">Edit</button>
        </div>
    </form>
</x-back-layout>
