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
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit($post->description, 20, '...') }}</td>
                    <td>{{ $post->author->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    {{ $posts->links() }}
@endsection
