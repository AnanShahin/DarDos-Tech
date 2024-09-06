@extends('layouts.admin')

@section('title')
    Roles - Create
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Create Role</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Role Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Role Name">
                        @error('name')
                            <span class="text-sm" style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-footer mt-6">
                        <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                        <a href="{{ route('roles.index') }}" class="btn btn-light btn-pill">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection