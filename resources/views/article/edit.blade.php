<x-back-layout>
    <form action="{{ route('article.update', $article->id )}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Enter Title for Article" class="form-control" value="{{ old('title') ?? $article->title }}" />
        @error('title')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>
        <div class="form-group mt-3">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" placeholder="Enter Slug for Article" class="form-control" value="{{ old('slug') ?? $article->slug }}" />
            @error('slug')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="description">Content</label>
            <textarea name="content" id="Content" placeholder="Enter Content" class="form-control">{{ old('content') ?? $article->content }} </textarea>
            @error('content')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Article Image</label>
            <input type="file" id="image" name="image" class="form-control">
            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        

        <div class="form-group mt-3">
        <select class="form-select" aria-label="Status" name="status">
            <option value="" selected>Select Status</option>
            <option value="active" {{ old('status')=="active"?"selected":"" }}>Active</option>
            <option value="inactive"  {{ old('status')=="inactive"?"selected":"" }}>Inactive</option>
          
          </select>
          @error('status')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <select class="form-select" aria-label="Category" name="categoryid">
                <option value="" selected>Select Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ (old('categoryid')=="active"?"selected":"") ??($article->category_id== $category->id ? "selected":"")}}>{{ $category->slug}}</option>
                @endforeach
              </select>
              @error('categoryid')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-success">Add</button>
        </div>
    </form>
</x-back-layout>
