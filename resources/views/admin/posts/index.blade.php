@extends('admin.layouts.main', ['title' => $title])

@section('content')
<div class="col-12 mb-2">
    <a href="{{route('admin.posts.create')}}" class="btn btn-success">Create</a>
</div>
<div class="col-12">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">author</th>
                <th scope="col" colspan="3" class="text-center">edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit($post->description, 20, '...') }}</td>
                    <td>{{ $post->author->name }}</td>
                    <td><a href="{{route('admin.posts.show', $post)}}"><i class="far fa-eye"></i></a></td>
                    <td><a href="{{route('admin.posts.edit', $post)}}"><i class="fas fa-edit"></i></a></td>
                    <td>
                        <form class="form-delete" action="{{route('admin.posts.destroy', $post)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="fas fa-trash" style="color: #ff0000;"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    {{ $posts->links() }}
@endsection
