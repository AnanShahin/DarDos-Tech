@extends('layouts.design')

@section('Title')
    Register
@endsection

@section('content')
<div class="container-fluid registration-bg min-vh-100 d-flex align-items-center justify-content-center">
    <div class="card registration-card shadow-sm border-light w-100" style="max-width: 700px;">
        <div class="card-header registration-card-header text-white text-center py-4">
            <h3 class="mb-0">Create an Account</h3>
        </div>
        <div class="card-body p-4">
            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group mb-3">
                    <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                    <input id="name" class="form-control registration-input" type="text" name="name" placeholder="Full Name" required>
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                    <input id="email" class="form-control registration-input" type="email" name="email" placeholder="Email address" required>
                </div>

                <div class="form-group mb-3">
                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                    <input id="password" class="form-control registration-input" type="password" name="password" placeholder="Password" required>
                </div>

                <div class="form-group mb-4">
                    <label for="password_confirmation" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                    <input id="password_confirmation" class="form-control registration-input" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                </div>

                <div class="d-flex justify-content-between mb-4">
                    <button type="submit" class="btn btn-primary registration-btn px-5">Register</button>
                    <a href="{{ route('login') }}" class="btn btn-link registration-link">Already have an account? Login</a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.registration-bg {
    background: rgb(255,255,255);
    background: radial-gradient(circle, rgba(255,255,255,1) 71%, rgba(0,104,55,1) 96%, rgba(0,104,55,1) 100%);
}

.registration-card {
    background-color: #fff;
}

.registration-card-header {
    background-color: #006837;
    color: #fff;
}

.registration-input {
    border-radius: 25px;
    border: 1px solid #d3d3d3;
}

.registration-btn {
    background-color: #006837;
    color: #fff;
    border: none;
}

.registration-btn:hover {
    background-color: #72AA48;
}

.registration-link {
    color: #006837;
}

.registration-link:hover {
    color: #72AA48;
}
</style>
@endsection
