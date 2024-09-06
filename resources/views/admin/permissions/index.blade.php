@extends('layouts.admin')

@section('title')
    Permissions
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Permissions</h1>
    </div>
    <div class="col-md-12">
        <div class="table-responsive">
            <div class="text-right p-2">
                <a href="{{ route('permissions.create') }}" class="btn btn-primary">Create Permission</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Permission</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td scope="row">{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <div style="display: flex;">
                                    <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info mr-1">Edit</a>
                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure to delete ({{$permission->name}})?');">
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
