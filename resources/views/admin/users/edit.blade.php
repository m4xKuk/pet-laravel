@extends('admin.layouts.main', ['title' => $title])

@section('content')
    <div class="col-8">
        <form action="{{ route('admin.users.update', $user) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="post_title">Name</label>
                <input type="text" name="name" class="form-control" id="post_title" placeholder="title"
                    value="{{ $user->name }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" id="post_title" placeholder="name"
                    value="{{ $user->email }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <input type="hidden" name="user_id" value="{{$user->id}}">
            <div class="form-group">
                <label for="exampleFormControlSelect2">Role</label>
                <select name="role" class="form-control" id="exampleFormControlSelect2">
                    @foreach ($roles as $role_id => $role)
                        <option value="{{ $role_id }}" {{ $user->role == $role_id ? 'selected' : '' }}>
                            {{ $role }}</option>
                    @endforeach
                </select>
                @error('parent_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
