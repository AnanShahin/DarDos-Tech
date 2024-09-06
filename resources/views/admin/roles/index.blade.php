@extends('layouts.admin')

@section('title')
    Roles
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Roles</h1>
    </div>
    <div class="col-md-12">
        <div class="table-responsive">
            <div class="text-right p-2">
                <a href="{{ route('roles.create') }}" class="btn btn-primary">Create Role</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td scope="row">{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <div style="display: flex;">
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info mr-1">Edit</a>
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure to delete ({{$role->name}})?');">
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