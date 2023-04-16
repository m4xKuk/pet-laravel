@extends('admin.layouts.main')

@section('content')
    <div class="col-12 mb-2">
        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">Edit</a>
    </div>
    <div class="col-8">
        <table class="table table-bordered table-show">
            <tbody>
                <tr>
                    <th scope="col">ID</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th scope="col">Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th scope="col">Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th scope="col">Role</th>
                    @php
                        $roles = App\Models\User::getRole();
                    @endphp
                    <td>{{$roles[$user->role]}}</td>
                </tr>
                <tr>
                    <th scope="col">Create</th>
                    <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
