@extends('admin.layouts.main')

@section('content')
    <div class="col-12 mb-2">
        <a href="{{route('admin.categories.edit', $category)}}" class="btn btn-primary">Edit</a>
    </div>
    <div class="col-8">
        <table class="table table-bordered table-show">
            <tbody>
                <tr>
                    <th scope="col">ID</th>
                    <td>{{ $category->id }}</td>
                </tr>
                <tr>
                    <th scope="col">Title</th>
                    <td>{{ $category->title }}</td>
                </tr>
                <tr>
                    <th scope="col">Description</th>
                    <td>{!! $category->description !!}</td>
                </tr>
                <tr>
                    <th scope="col">Parent</th>
                    <td>{{ $parent->title }} (ID: {{$category->parent_id}})</td>
                </tr>
                <tr>
                    <th scope="col">Create</th>
                    <td>{{ \Carbon\Carbon::parse($category->created_at)->format('d/m/Y') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
