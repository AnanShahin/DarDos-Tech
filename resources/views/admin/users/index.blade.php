@extends('layouts.admin')

@section('title')
    Users
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1>Users</h1>
    </div>
    <div class="col-md-6">
        <a href="{{ route('users.create') }}" class="btn btn-primary float-right mb-3">Add User</a>
    </div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td scope="row">{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div style="display: flex;">
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-info mr-1">Roles</a>
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-info mr-1">Permissions</a>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info mr-1">Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure to delete ({{$user->name}})?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
