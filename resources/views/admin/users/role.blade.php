@extends('layouts.admin')

@section('title')
    User - Edit
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit User</h3>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <ul>
                        <li>
                            NAME : <h3>{{ $user->name }}</h3>
                        </li>
                        <li>
                            E-MAIL : <h3>{{ $user->email }}</h3>
                        </li>
                    </ul>
                </div>

                <div class="col-md-12">
                    <div class="col-md-12 mt-2">
                        <label for="roles">Roles:</label>
                        @if ($user->roles)
                                <div style="display: flex;">
                                    @foreach ($user->roles as $item)
                                        <form action="{{ route('users.roles.remove', [$user->id, $item->id]) }}" method="POST"
                                            onsubmit="return confirm('Are you sure to remove ({{$item->name}}) role from this user?');">
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
                    <form action="{{ route('users.roles', $user->id) }}" method="POST" class="mt-2">
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
                        </div>
                    </form>
                </div>

                <div class="col-md-12">
                    <div class="col-md-12 mt-2">
                        <label for="permissions">Permissions:</label>
                        @if ($user->permissions)
                                <div style="display: flex;">
                                    @foreach ($user->permissions as $item)
                                        <form action="{{ route('users.permissions.revoke', [$user->id, $item->id]) }}" method="POST"
                                            onsubmit="return confirm('Are you sure to revoke ({{$item->name}}) from this user?');">
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
                    <form action="{{ route('users.permissions', $user->id) }}" method="POST" class="mt-2">
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
</div>
@endsection
