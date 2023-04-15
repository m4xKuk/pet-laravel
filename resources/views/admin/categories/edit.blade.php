@extends('admin.layouts.main', ['title' => $title])

@section('content')
    <div class="col-8">
        <form action="{{ route('admin.categories.update', $category) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="post_title">Title</label>
                <input type="text" name="title" class="form-control" id="post_title" placeholder="title"
                    value="{{ $category->title }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea id="summernote" name="description">{{ $category->description }}</textarea>
                @error('description')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Parent</label>
                <select name="parent_id" class="form-control" id="exampleFormControlSelect2">
                    @foreach ($categories as $categ)
                        <option value="{{$categ->id}}" {{$category->parent_id == $categ->id ? 'selected' : ''}}>{{$categ->title}}</option>
                    @endforeach
                </select>
                @error('parent_id')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
