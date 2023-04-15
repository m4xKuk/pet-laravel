@extends('admin.layouts.main', ['title' => $title])

@section('content')
<div class="col-12 mb-2">
    <a href="{{route('admin.categories.create')}}" class="btn btn-success">Create</a>
</div>
<div class="col-12">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">parent</th>
                <th scope="col" colspan="3" class="text-center">edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->title }}</td>
                    <td>{{ Str::limit($category->description, 20, '...') }}</td>
                    <td>{{ $category->parent_id }}</td>
                    <td><a href="{{route('admin.categories.show', $category)}}"><i class="far fa-eye"></i></a></td>
                    <td><a href="{{route('admin.categories.edit', $category)}}"><i class="fas fa-edit"></i></a></td>
                    <td>
                        <form action="{{route('admin.categories.destroy', $category)}}" method="POST" class="form-delete">
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
    {{ $categories->links() }}
@endsection
