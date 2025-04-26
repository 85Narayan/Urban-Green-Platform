@extends('layouts.app')

@section('title', 'Register - UrbanGreen')

@section('content')
    <!-- Register Section -->
    <section class="min-vh-100 d-flex align-items-center py-5" style="background: linear-gradient(rgba(46, 125, 50, 0.1), rgba(46, 125, 50, 0.05));">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <!-- Register Card -->
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        <!-- Card Header -->
                        <div class="card-header text-center border-0 bg-success text-white py-4">
                            <h4 class="mb-0 fw-bold">Join UrbanGreen 🌱</h4>
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
                                <p class="text-muted">Create your account to get started</p>
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

                            <!-- Register Form -->
                            <form action="{{ route('register') }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                <div class="row g-3">
                                    <!-- Name -->
                                    <div class="col-md-6">
                                        <label for="name" class="form-label fw-semibold">Full Name</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0">
                                                <i class="fas fa-user text-success"></i>
                                            </span>
                                            <input type="text" 
                                                   name="name" 
                                                   id="name" 
                                                   class="form-control border-start-0 ps-0 @error('name') is-invalid @enderror" 
                                                   value="{{ old('name') }}"
                                                   placeholder="John Doe"
                                                   required 
                                                   autofocus>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6">
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
                                                   required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Location -->
                                    <div class="col-md-6">
                                        <label for="location" class="form-label fw-semibold">Location</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0">
                                                <i class="fas fa-map-marker-alt text-success"></i>
                                            </span>
                                            <input type="text" 
                                                   name="location" 
                                                   id="location" 
                                                   class="form-control border-start-0 ps-0 @error('location') is-invalid @enderror" 
                                                   value="{{ old('location') }}"
                                                   placeholder="Your city"
                                                   required>
                                            @error('location')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Experience Level -->
                                    <div class="col-md-6">
                                        <label for="experience_level" class="form-label fw-semibold">Experience Level</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0">
                                                <i class="fas fa-seedling text-success"></i>
                                            </span>
                                            <select name="experience_level" 
                                                    id="experience_level" 
                                                    class="form-select border-start-0 ps-0 @error('experience_level') is-invalid @enderror" 
                                                    required>
                                                <option value="" selected disabled>Select your level</option>
                                                <option value="beginner" {{ old('experience_level') == 'beginner' ? 'selected' : '' }}>Beginner</option>
                                                <option value="intermediate" {{ old('experience_level') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                                                <option value="advanced" {{ old('experience_level') == 'advanced' ? 'selected' : '' }}>Advanced</option>
                                            </select>
                                            @error('experience_level')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Bio -->
                                    <div class="col-12">
                                        <label for="bio" class="form-label fw-semibold">Bio</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0 align-items-start pt-2">
                                                <i class="fas fa-info-circle text-success"></i>
                                            </span>
                                            <textarea name="bio" 
                                                      id="bio" 
                                                      class="form-control border-start-0 ps-0 @error('bio') is-invalid @enderror" 
                                                      rows="2"
                                                      placeholder="Tell us about your gardening interests..."
                                                      required>{{ old('bio') }}</textarea>
                                            @error('bio')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Skills -->
                                    <div class="col-12">
                                        <label for="skills" class="form-label fw-semibold">Skills</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0">
                                                <i class="fas fa-tools text-success"></i>
                                            </span>
                                            <input type="text" 
                                                   name="skills" 
                                                   id="skills" 
                                                   class="form-control border-start-0 ps-0 @error('skills') is-invalid @enderror" 
                                                   value="{{ old('skills') }}"
                                                   placeholder="e.g., composting, organic gardening"
                                                   required>
                                            @error('skills')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <small class="text-muted">Separate skills with commas</small>
                                    </div>

                                    <!-- Password -->
                                    <div class="col-md-6">
                                        <label for="password" class="form-label fw-semibold">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0">
                                                <i class="fas fa-lock text-success"></i>
                                            </span>
                                            <input type="password" 
                                                   name="password" 
                                                   id="password" 
                                                   class="form-control border-start-0 ps-0 @error('password') is-invalid @enderror" 
                                                   placeholder="Create password"
                                                   required>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="col-md-6">
                                        <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0">
                                                <i class="fas fa-lock text-success"></i>
                                            </span>
                                            <input type="password" 
                                                   name="password_confirmation" 
                                                   id="password_confirmation" 
                                                   class="form-control border-start-0 ps-0" 
                                                   placeholder="Confirm password"
                                                   required>
                                        </div>
                                    </div>

                                    <!-- Terms and Conditions -->
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input type="checkbox" 
                                                   name="terms" 
                                                   id="terms" 
                                                   class="form-check-input @error('terms') is-invalid @enderror" 
                                                   required>
                                            <label class="form-check-label text-muted" for="terms">
                                                I agree to the <a href="#" class="text-success">Terms of Service</a> and 
                                                <a href="#" class="text-success">Privacy Policy</a>
                                            </label>
                                            @error('terms')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-success btn-lg hover-lift">
                                                <i class="fas fa-user-plus me-2"></i>Create Account
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="text-center mt-4">
                                <p class="text-muted mb-0">
                                    Already have an account? 
                                    <a href="{{ route('login') }}" class="text-success fw-semibold">
                                        Sign In
                                    </a>
                                </p>
                            </div>
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
        .form-control, .form-select {
            border-left: none;
        }
        .form-control:focus, .form-select:focus {
            box-shadow: none;
            border-color: #ced4da;
        }
        .form-control:focus + .input-group-text, .form-select:focus + .input-group-text {
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
