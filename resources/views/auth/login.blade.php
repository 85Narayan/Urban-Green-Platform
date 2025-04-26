@extends('layouts.app')

@section('title', 'Login - UrbanGreen')

@section('content')
    <!-- Login Section -->
    <section class="min-vh-100 d-flex align-items-center py-5" style="background: linear-gradient(rgba(46, 125, 50, 0.1), rgba(46, 125, 50, 0.05));">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <!-- Login Card -->
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        <!-- Card Header -->
                        <div class="card-header text-center border-0 bg-success text-white py-4">
                            <h4 class="mb-0 fw-bold">Welcome Back! 🌿</h4>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body p-4 p-md-5">
                            <!-- Logo -->
                            <div class="text-center mb-4">
                                <div class="d-flex justify-content-center align-items-center mb-4" style="height: 60px;">
                                    @if(file_exists(public_path('images/logo.png')))
                                        <img src="{{ asset('images/logo.png') }}" alt="UrbanGreen Logo" class="img-fluid" style="max-height: 60px;">
                                    @else
                                        <h2 class="text-success mb-0">UrbanGreen</h2>
                                    @endif
                                </div>
                                <p class="text-muted">Sign in to continue to UrbanGreen</p>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger border-0 rounded-3 bg-danger bg-opacity-10 text-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Login Form -->
                            <form action="{{ route('login') }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                <div class="mb-4">
                                    <label for="email" class="form-label fw-semibold">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-envelope text-success"></i>
                                        </span>
                                        <input type="email" 
                                               name="email" 
                                               id="email" 
                                               class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror" 
                                               value="{{ old('email') }}"
                                               placeholder="name@example.com"
                                               required 
                                               autofocus>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="password" class="form-label fw-semibold">Password</label>
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="text-success text-decoration-none small">
                                                Forgot Password?
                                            </a>
                                        @endif
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-lock text-success"></i>
                                        </span>
                                        <input type="password" 
                                               name="password" 
                                               id="password" 
                                               class="form-control border-start-0 ps-0 @error('password') is-invalid @enderror" 
                                               placeholder="Enter your password"
                                               required>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="form-check">
                                        <input type="checkbox" 
                                               name="remember" 
                                               id="remember" 
                                               class="form-check-input" 
                                               {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label text-muted" for="remember">
                                            Remember me
                                        </label>
                                    </div>
                                </div>

                                <div class="d-grid mb-4">
                                    <button type="submit" class="btn btn-success btn-lg hover-lift">
                                        <i class="fas fa-sign-in-alt me-2"></i>Sign In
                                    </button>
                                </div>

                                <div class="text-center">
                                    <p class="text-muted mb-0">
                                        Don't have an account? 
                                        <a href="{{ route('register') }}" class="text-success fw-semibold">
                                            Create Account
                                        </a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Additional Links -->
                    <div class="text-center mt-4">
                        <a href="{{ route('home') }}" class="text-muted text-decoration-none me-3">
                            <i class="fas fa-home me-1"></i>Back to Home
                        </a>
                        <a href="{{ route('contact') }}" class="text-muted text-decoration-none">
                            <i class="fas fa-question-circle me-1"></i>Need Help?
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .hover-lift {
            transition: transform 0.2s ease;
        }
        .hover-lift:hover {
            transform: translateY(-2px);
        }
        .input-group-text {
            border-right: none;
        }
        .form-control {
            border-left: none;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #ced4da;
        }
        .form-control:focus + .input-group-text {
            border-color: #ced4da;
        }
        .form-check-input:checked {
            background-color: #198754;
            border-color: #198754;
        }
        .form-check-input:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
        }
    </style>
@endsection
