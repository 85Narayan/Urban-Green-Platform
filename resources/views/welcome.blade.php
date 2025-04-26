<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome - UrbanGreen</title>
        
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
                <a class="navbar-brand fw-bold" href="/">
                    <i class="fas fa-leaf me-2"></i>UrbanGreen
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="/">
                                <i class="fas fa-home me-1"></i>Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">
                                <i class="fas fa-sign-in-alt me-1"></i>Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">
                                <i class="fas fa-user-plus me-1"></i>Signup
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">
                                <i class="fas fa-info-circle me-1"></i>About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">
                                <i class="fas fa-envelope me-1"></i>Contact
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- HERO SECTION -->
        <div class="container my-5">
            <div class="row hero-section">
                <div class="col-md-6 hero-text d-flex flex-column justify-content-center">
                    <h1 class="section-title mb-4">🌿 Grow Together with UrbanGreen</h1>
                    <p class="lead">Join a vibrant community of gardeners and mentors. Learn, share, and grow your own urban paradise with like-minded green lovers.</p>
                    <div class="d-flex gap-3 mt-4">
                        <a href="/register" class="btn btn-success btn-lg">
                            <i class="fas fa-user-plus me-2"></i>Join Now
                        </a>
                        <a href="#features" class="btn btn-outline-success btn-lg">
                            <i class="fas fa-info-circle me-2"></i>Learn More
                        </a>
                    </div>
                </div>
                <div class="col-md-6 hero-image">
                    <img src="{{ asset('garden_images/park_imgaes.jpg') }}" alt="Urban Gardening">
                </div>
            </div>
        </div>

        <!-- FEATURES SECTION -->
        <div id="features" class="container my-5 text-center">
            <h2 class="section-title mb-4">What We Offer</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card p-4 h-100">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4 class="text-success">Connect</h4>
                        <p>Find and join like-minded garden communities near you. Share experiences and learn from others.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 h-100">
                        <div class="feature-icon">
                            <i class="fas fa-seedling"></i>
                        </div>
                        <h4 class="text-success">Cultivate</h4>
                        <p>Access tips, tutorials, and expert guides on urban gardening. Learn sustainable practices.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 h-100">
                        <div class="feature-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h4 class="text-success">Grow</h4>
                        <p>Watch your green space bloom with community support. Track your progress and achievements.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- STATS SECTION -->
        <div class="container my-5">
            <div class="row text-center">
                <div class="col-md-3">
                    <h3 class="text-success">500+</h3>
                    <p>Active Gardens</p>
                </div>
                <div class="col-md-3">
                    <h3 class="text-success">2K+</h3>
                    <p>Community Members</p>
                </div>
                <div class="col-md-3">
                    <h3 class="text-success">100+</h3>
                    <p>Expert Mentors</p>
                </div>
                <div class="col-md-3">
                    <h3 class="text-success">50+</h3>
                    <p>Cities Covered</p>
                </div>
            </div>
        </div>

        <!-- TESTIMONIALS -->
        <div class="container my-5">
            <h2 class="section-title text-center mb-4">What Our Members Say</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card p-4 testimonial-card">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" class="rounded-circle me-3" width="50" alt="Priya Sharma">
                            <div>
                                <h5 class="mb-0">Priya Sharma</h5>
                                <small class="text-muted">Urban Gardener</small>
                            </div>
                        </div>
                        <p class="mb-0">"UrbanGreen helped me transform my apartment balcony into a small jungle. It's more than a platform—it's a movement!"</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-4 testimonial-card">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" class="rounded-circle me-3" width="50" alt="Aman Verma">
                            <div>
                                <h5 class="mb-0">Aman Verma</h5>
                                <small class="text-muted">Community Leader</small>
                            </div>
                        </div>
                        <p class="mb-0">"The mentor feature is amazing! I got help from an expert who guided me in composting. Love this community!"</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CALL TO ACTION -->
        <div class="container text-center my-5">
            <div class="p-5 bg-light rounded shadow">
                <h2 class="mb-3 text-success">Ready to get your hands dirty?</h2>
                <p class="lead mb-4">Join our community and start growing your own garden today!</p>
                <a href="/register" class="btn btn-success btn-lg">
                    <i class="fas fa-user-plus me-2"></i>Get Started
                </a>
            </div>
        </div>

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
                            <li><a href="/" class="text-white">Home</a></li>
                            <li><a href="/about" class="text-white">About</a></li>
                            <li><a href="/contact" class="text-white">Contact</a></li>
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