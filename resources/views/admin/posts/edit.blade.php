@extends('admin.layouts.main', ['title' => $title])

@section('content')
    <div class="col-8">
        <form action="{{ route('admin.posts.update', $post) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="post_title">Title</label>
                <input type="text" name="title" class="form-control" id="post_title" placeholder="title"
                    value="{{ $post->title }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea id="summernote" name="description">{{ $post->description }}</textarea>
                @error('description')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                @if (!empty($post->preview_image))
                <div>
                    <img id="preview_image" src="{{ Storage::disk('public')->exists($post->preview_image) ? asset('storage/' . $post->preview_image) : $post->preview_image }}" alt="preview_image"
                        class="w-25">
                </div>
                @endif
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" value="{{ $post->preview_image }}"
                            name="preview_image" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        @error('preview_image')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Autor</label>
                <select name="user_id" class="form-control" id="exampleFormControlSelect2">
                    @foreach ($users as $user)
                        <option value="{{$user->id}}" {{$post->user_id == $user->id ? 'selected' : ''}}>{{$user->name}}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#exampleInputFile').on("change", function() {
                let new_img = $(this).val();
                var input = this;
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            });
        });
    </script>
@endsection
