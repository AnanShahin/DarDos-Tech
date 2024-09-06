@extends('layouts.admin')

@section('title')
    Roles - Edit
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Role</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('roles.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Role Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Role Name" value="{{ $role->name }}">
                        @error('name')
                            <span class="text-sm" style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-footer mt-6">
                        <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                    </div>
                </form>
                <div class="col-md-12 mt-2">
                    <label for="permissions">Role Permissions:</label>
                    @if ($role->permissions)
                            <div style="display: flex;">
                                @foreach ($role->permissions as $item)
                                    <form action="{{ route('roles.permissions.revoke', [$role->id, $item->id]) }}" method="POST"
                                        onsubmit="return confirm('Are you sure to revoke ({{$item->name}}) from this role?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btm-sm mr-1">{{ $item->name }}</button>
                                    </form>
                                @endforeach
                            </div>
                        </ul>  
                    @else
                        No Permissions Assigned to this Role   
                    @endif
                </div>
                <form action="{{ route('roles.permissions', $role->id) }}" method="POST" class="mt-2">
                    @csrf
                    <div class="form-group">
                        <label for="assign_permissions">Assign Permissions</label>
                        <select name="permission" id="permission" class="form-control">
                            <option value="">Choose Permission</option>
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-footer mt-6">
                        <button type="submit" class="btn btn-primary btn-pill">Assign</button>
                        <a href="{{ route('roles.index') }}" class="btn btn-light btn-pill">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection