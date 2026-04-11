@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-lg-5">
            <div class="card-modern animate-fade-in">
                <div class="card-header-modern text-center">
                    <i class="fas fa-sign-in-alt fa-2x mb-2"></i>
                    <h3 class="mb-0 fw-bold">Welcome Back</h3>
                    <p class="mt-2 mb-0" style="opacity: 0.9;">Sign in to continue</p>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="form-label-modern">
                                <i class="fas fa-envelope me-1" style="color: #9EB698;"></i> Email Address
                            </label>
                            <input type="email" name="email" class="form-control form-modern @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter your email" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label-modern">
                                <i class="fas fa-lock me-1" style="color: #9EB698;"></i> Password
                            </label>
                            <input type="password" name="password" class="form-control form-modern @error('password') is-invalid @enderror" placeholder="Enter your password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4 form-check">
                            <input type="checkbox" name="remember" id="remember" class="form-check-input" style="border-color: #9EB698;">
                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary-custom btn-modern w-100">
                            <i class="fas fa-sign-in-alt me-2"></i> Login
                        </button>

                        <div class="text-center mt-4">
                            <p class="mb-0">
                                Don't have an account? 
                                <a href="{{ route('show.register') }}" style="color: #9EB698; text-decoration: none; font-weight: 600;">
                                    Register here
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Decorative Elements -->
            <div class="text-center mt-4">
                <small class="text-muted">
                    <i class="fas fa-shield-alt me-1"></i> Secure Login System
                </small>
            </div>
        </div>
    </div>
</div>

<style>
    .min-vh-100 {
        min-height: 100vh;
    }
</style>
@endsection