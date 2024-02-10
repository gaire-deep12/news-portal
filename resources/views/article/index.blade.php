<x-back-layout>
   
    <a href="{{ route('article.create') }}" class="btn btn-primary">Add Article</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Status</th>
            <th scope="col">Category Id</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <th scope="row">
                    {{ $loop->iteration }}
                </th>
                <td>
                    {{ $article->title }}
                </td>
                <td>
                    {{ $article->slug }}
                </td>
                <td>
                    {{ $article->content }}
                </td>
                <td>
                    <img src="{{ asset('storage/images/'.$article->image) }}" alt="{{ $article->title }}" width="150">
                </td>
               
                <td>
                    <span class="badge {{ $article->status=="inactive"?"text-bg-warning":"text-bg-success" }}">{{ $article->status }}</span>
                </td>
                <td>
                    {{ $article->category_id }}
                </td>
                <td>

                    <a href="{{ route('article.edit', $article->id ) }}" class="btn btn-warning">Edit</a>
                </td>
                <td>
                    <form action="{{ route('article.destroy', $article->id ) }}" method="POST">
                        @csrf
                 @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-back-layout>
