@extends('admin.layouts.main', ['title' => $title])

@section('content')
    <div class="col-12 mb-2">
        <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-primary">Edit</a>
    </div>
    <div class="col-8">
        <table class="table table-bordered table-show">
            <tbody>
                <tr>
                    <th scope="col">ID</th>
                    <td>{{ $post->id }}</td>
                </tr>
                <tr>
                    <th scope="col">Title</th>
                    <td>{{ $post->title }}</td>
                </tr>
                <tr>
                    <th scope="col">Description</th>
                    <td>{!! $post->description !!}</td>
                </tr>
                <tr>
                    <th scope="col">Image</th>
                    @if (!empty($post->preview_image))
                    <td><img src="{{ Storage::disk('public')->exists($post->preview_image) ? asset('storage/' . $post->preview_image) : $post->preview_image }}" width="200" alt="..." class="img-thumbnail"></td>
                    @endif
                </tr>
                <tr>
                    <th scope="col">Autor</th>
                    <td>{{ $post->author->name }}</td>
                </tr>
                <tr>
                    <th scope="col">Create</th>
                    <td>{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
