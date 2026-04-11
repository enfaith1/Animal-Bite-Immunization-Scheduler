@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-lg-6">
            <div class="card-modern animate-fade-in">
                <div class="card-header-modern text-center">
                    <i class="fas fa-user-plus fa-2x mb-2"></i>
                    <h3 class="mb-0 fw-bold">Create Account</h3>
                    <p class="mt-2 mb-0" style="opacity: 0.9;">Join the Animal Bite Immunization Scheduler</p>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label-modern">
                                    <i class="fas fa-user me-1" style="color: #9EB698;"></i> Full Name
                                </label>
                                <input type="text" name="name" class="form-control form-modern @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter your full name" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-4">
                                <label class="form-label-modern">
                                    <i class="fas fa-envelope me-1" style="color: #9EB698;"></i> Email Address
                                </label>
                                <input type="email" name="email" class="form-control form-modern @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter your email" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label-modern">
                                    <i class="fas fa-lock me-1" style="color: #9EB698;"></i> Password
                                </label>
                                <input type="password" name="password" class="form-control form-modern @error('password') is-invalid @enderror" placeholder="Create a password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Minimum 6 characters</small>
                            </div>
                            
                            <div class="col-md-6 mb-4">
                                <label class="form-label-modern">
                                    <i class="fas fa-lock me-1" style="color: #9EB698;"></i> Confirm Password
                                </label>
                                <input type="password" name="password_confirmation" class="form-control form-modern" placeholder="Confirm your password" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input type="checkbox" id="terms" class="form-check-input" style="border-color: #9EB698;" required>
                                <label class="form-check-label" for="terms">
                                    I agree to the <a href="#" style="color: #9EB698; text-decoration: none;">Terms and Conditions</a>
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success-custom btn-modern w-100">
                            <i class="fas fa-user-plus me-2"></i> Register
                        </button>

                        <div class="text-center mt-4">
                            <p class="mb-0">
                                Already have an account? 
                                <a href="{{ route('show.login') }}" style="color: #9EB698; text-decoration: none; font-weight: 600;">
                                    Login here
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Decorative Elements -->
            <div class="text-center mt-4">
                <small class="text-muted">
                    <i class="fas fa-shield-alt me-1"></i> Secure Registration | 
                    <i class="fas fa-lock me-1"></i> Data Protected
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