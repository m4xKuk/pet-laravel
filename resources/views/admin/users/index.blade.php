@extends('admin.layouts.main', ['title' => $title])

@section('content')
<div class="col-12 mb-2">
    <a href="{{route('admin.users.create')}}" class="btn btn-success">Create</a>
</div>
<div class="col-12">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">role</th>
                <th scope="col" colspan="3" class="text-center">edit</th>
            </tr>
        </thead>
        <tbody>
            @php
                $roles = App\Models\User::getRole()
            @endphp
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $roles[$user->role] }}</td>
                    <td><a href="{{route('admin.users.show', $user)}}"><i class="far fa-eye"></i></a></td>
                    <td><a href="{{route('admin.users.edit', $user)}}"><i class="fas fa-edit"></i></a></td>
                    <td>
                        <form action="{{route('admin.users.destroy', $user)}}" method="POST" class="form-delete">
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
    {{ $users->links() }}
@endsection
