@extends('layouts.admin')

@section('title')
    Permissions - Edit
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Permission</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Permission Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Permission Name" value="{{ $permission->name }}">
                        @error('name')
                            <span class="text-sm" style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-footer mt-6">
                        <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                    </div>
                </form>
                <div class="col-md-12 mt-2">
                    <label for="roles">Roles:</label>
                    @if ($permission->roles)
                            <div style="display: flex;">
                                @foreach ($permission->roles as $item)
                                    <form action="{{ route('permissions.roles.remove', [$permission->id, $item->id]) }}" method="POST"
                                        onsubmit="return confirm('Are you sure to remove ({{$item->name}}) role from this permission?');">
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
                <form action="{{ route('permissions.roles', $permission->id) }}" method="POST" class="mt-2">
                    @csrf
                    <div class="form-group">
                        <label for="assign_roles">Assign Roles</label>
                        <select name="role" id="role" class="form-control">
                            <option value="">Choose Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
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