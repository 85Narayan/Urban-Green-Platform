@extends('layouts.app')

@section('title', 'Contact Us - UrbanGreen')

@section('content')
    <!-- Hero Section with Background Image -->
    <section class="position-relative text-white mb-5" style="min-height: 300px;">
        <div class="position-absolute top-0 start-0 w-100 h-100" style="
            background: linear-gradient(rgba(46, 125, 50, 0.9), rgba(46, 125, 50, 0.7)), 
            url('https://images.unsplash.com/photo-1598970434795-0c54fe7c0642?auto=format&fit=crop&w=2070&q=80') center/cover no-repeat;
            z-index: -1;">
        </div>
        <div class="container position-relative py-5">
            <div class="text-center py-5">
                <h1 class="display-3 fw-bold mb-4">Contact UrbanGreen</h1>
                <p class="lead fs-3 mb-0 fw-light">Let's cultivate conversations! 🌱</p>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        <div class="row g-0">
                            <!-- Left: Image/Illustration -->
                            <div class="col-lg-5 d-none d-lg-block">
                                <div class="position-relative h-100">
                                    <div class="w-100 h-100" style="
                                        background: url('https://source.unsplash.com/random/800x1200/?garden') center/cover no-repeat;
                                        filter: brightness(0.9);">
                                    </div>
                                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-success" style="opacity: 0.1;"></div>
                                    <div class="position-absolute bottom-0 start-0 w-100 p-4 text-white">
                                        <h3 class="h2 fw-bold mb-3">Let's Grow Together 🌻</h3>
                                        <p class="mb-0">
                                            Whether you're a passionate gardener or just curious, we're here to help. 
                                            Reach out with questions, feedback, or just to say hi!
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Right: Form -->
                            <div class="col-lg-7">
                                <div class="p-4 p-md-5">
                                    <h2 class="h3 fw-bold mb-4">Send us a Message</h2>
                                    <form action="{{ route('contact.submit') }}" method="POST" class="needs-validation" novalidate>
                                        @csrf

                                        <div class="row g-4">
                                            <div class="col-md-6">
                                                <label for="name" class="form-label fw-semibold">Full Name</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light border-end-0">
                                                        <i class="fas fa-user text-success"></i>
                                                    </span>
                                                    <input type="text" name="name" id="name" 
                                                           class="form-control border-start-0 ps-0" 
                                                           placeholder="John Doe" required>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your name.
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="email" class="form-label fw-semibold">Email</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light border-end-0">
                                                        <i class="fas fa-envelope text-success"></i>
                                                    </span>
                                                    <input type="email" name="email" id="email" 
                                                           class="form-control border-start-0 ps-0" 
                                                           placeholder="you@example.com" required>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter a valid email address.
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="subject" class="form-label fw-semibold">Subject</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light border-end-0">
                                                        <i class="fas fa-tag text-success"></i>
                                                    </span>
                                                    <input type="text" name="subject" id="subject" 
                                                           class="form-control border-start-0 ps-0" 
                                                           placeholder="What's this about?">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="message" class="form-label fw-semibold">Message</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light border-end-0 align-items-start pt-2">
                                                        <i class="fas fa-comment text-success"></i>
                                                    </span>
                                                    <textarea name="message" id="message" rows="4" 
                                                              class="form-control border-start-0 ps-0" 
                                                              placeholder="Your message..." required></textarea>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your message.
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-success btn-lg w-100">
                                                    <i class="fas fa-paper-plane me-2"></i>Send Message
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Information -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <h6 class="text-success fw-bold mb-3 text-uppercase tracking-wider">Get in Touch</h6>
                    <h2 class="display-5 fw-bold mb-4">Other Ways to Reach Us</h2>
                    <p class="lead text-muted">
                        We're always here to help you with your gardening journey.
                    </p>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm hover-lift">
                        <div class="card-body text-center p-4">
                            <div class="text-success mb-3" style="font-size: 2rem;">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Email Us</h4>
                            <p class="text-muted mb-0">contact@urbangreen.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm hover-lift">
                        <div class="card-body text-center p-4">
                            <div class="text-success mb-3" style="font-size: 2rem;">
                                <i class="fas fa-phone"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Call Us</h4>
                            <p class="text-muted mb-0">+1 (555) 123-4567</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm hover-lift">
                        <div class="card-body text-center p-4">
                            <div class="text-success mb-3" style="font-size: 2rem;">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Visit Us</h4>
                            <p class="text-muted mb-0">123 Garden Street, Green City</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .tracking-wider {
            letter-spacing: 0.1em;
        }
        .hover-lift {
            transition: transform 0.2s ease;
        }
        .hover-lift:hover {
            transform: translateY(-5px);
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
    </style>

    @push('scripts')
    <script>
        // Form validation
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
    @endpush
@endsection 