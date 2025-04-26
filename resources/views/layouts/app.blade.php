<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'UrbanGreen - Connect, Cultivate, Grow')</title>
        
        <!-- Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
        <!-- Custom CSS -->
        <style>
            body {
                background-color: #e8f5e9;
                font-family: 'Segoe UI', sans-serif;
            }
            .hero-section {
                background-color: #ffffff;
                border-radius: 15px;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }
            .hero-text {
                padding: 40px;
            }
            .hero-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            .section-title {
                font-weight: bold;
                color: #2e7d32;
            }
            .card {
                transition: transform 0.2s;
                border: none;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            .card:hover {
                transform: translateY(-5px);
            }
            .navbar {
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            .btn-success {
                background-color: #2e7d32;
                border-color: #2e7d32;
            }
            .btn-success:hover {
                background-color: #1b5e20;
                border-color: #1b5e20;
            }
            footer {
                background-color: #2e7d32;
                color: white;
                padding: 30px 0;
                text-align: center;
            }
            .feature-icon {
                font-size: 2.5rem;
                margin-bottom: 1rem;
                color: #2e7d32;
            }
            .testimonial-card {
                background-color: #f8f9fa;
                border-left: 4px solid #2e7d32;
            }
        </style>
    </head>
    <body>
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <div class="container px-4">
                <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                    <i class="fas fa-leaf me-2"></i>UrbanGreen
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                                <i class="fas fa-home me-1"></i>Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i>Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fas fa-user-plus me-1"></i>Signup
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">
                                <i class="fas fa-info-circle me-1"></i>About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">
                                <i class="fas fa-envelope me-1"></i>Contact
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>

        <!-- FOOTER -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <h5>About UrbanGreen</h5>
                        <p>Connecting urban gardeners and creating sustainable communities through shared knowledge and resources.</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h5>Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('home') }}" class="text-white">Home</a></li>
                            <li><a href="{{ route('about') }}" class="text-white">About</a></li>
                            <li><a href="{{ route('contact') }}" class="text-white">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h5>Connect With Us</h5>
                        <div class="social-links">
                            <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <hr class="my-4 bg-light">
                <div class="text-center">
                    <p class="mb-0">&copy; {{ date('Y') }} UrbanGreen. All rights reserved.</p>
                </div>
            </div>
        </footer>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
