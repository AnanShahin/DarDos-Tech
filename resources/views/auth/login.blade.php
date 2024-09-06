@extends('layouts.design')

@section('Title')
    Login
@endsection

@section('content')
<x-auth-session-status class="mb-4" :status="session('status')" />

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center login-bg">
        <div class="row w-100">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="card login-card shadow-sm border-light rounded w-100" style="max-width: 700px;">
                    <div class="card-header login-card-header bg-dark-green text-white text-center py-4">
                        <h3 class="mb-0">Login</h3>
                    </div>
                    <div class="card-body p-4">
                        <p class="text-center text-muted mb-4">Welcome back! Sign in to your account.</p>
                        <form class="js-validate" novalidate="novalidate">
                            <div class="form-group mb-3">
                                <label for="signinEmail" class="form-label">Username or Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control login-input" id="signinEmail" name="email" placeholder="Username or Email address" required
                                    data-msg="Please enter a valid email address."
                                    data-error-class="u-has-error"
                                    data-success-class="u-has-success">
                            </div>
                            <div class="form-group mb-3">
                                <label for="signinPassword" class="form-label">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control login-input" id="signinPassword" name="password" placeholder="Password" required
                                    data-msg="Your password is invalid. Please try again."
                                    data-error-class="u-has-error"
                                    data-success-class="u-has-success">
                            </div>
                            <div class="form-group mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="rememberMe" name="remember_me">
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <a href="{{ route('register') }}" class="btn btn-link login-link text-dark-green">Don't have an account? Register</a>
                                <button type="submit" class="btn btn-primary login-btn">Log In</button>
                            </div>
                            <div class="text-center">
                                <a href="#" class="text-dark-green login-link">Forgot Password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<style>
.login-bg {
    background: rgb(255,255,255);
    background: radial-gradient(circle, rgba(255,255,255,1) 71%, rgba(0,104,55,1) 96%, rgba(0,104,55,1) 100%);
}

.login-card {
    background-color: #fff;
}

.login-card-header {
    background-color: #006837;
    color: #fff;
}

.login-input {
    border-radius: 25px;
}

.login-btn {
    background-color: #006837;
    color: #fff;
    border: none;
}

.login-btn:hover {
    background-color: #72AA48;
}

.login-link {
    color: #006837;
}

.login-link:hover {
    color: #72AA48;
}
</style>
@endsection
