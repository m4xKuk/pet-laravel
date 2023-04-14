@extends('admin.layouts.main')

@section('content')
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
                    <td><i class="fas fa-edit"></i></td>
                    <td><i class="fas fa-trash" style="color: #ff0000;"></i></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    {{ $posts->links() }}
@endsection