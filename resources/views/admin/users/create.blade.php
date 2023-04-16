@extends('admin.layouts.main', ['title' => $title])

@section('content')
    <div class="col-8">
        <form action="{{ route('admin.users.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group">
                <label for="post_title">Name</label>
                <input type="text" name="name" class="form-control" id="post_title" placeholder="name"
                    value="{{ old('name') }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" id="post_title" placeholder="name"
                    value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="post_title">Password</label>
                <input type="text" name="password" class="form-control" id="post_title" placeholder="title"
                    value="{{ old('password') ? old('password') : $password_generate }}">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Role</label>
                <select name="role" class="form-control" id="exampleFormControlSelect2">
                    @foreach ($roles as $role_id => $role_name)
                        <option value="{{ $role_id }}">{{ $role_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
