@extends('layouts.app')

@section('title', 'About Us - UrbanGreen')

@section('content')
    <!-- Header Section with Background Image -->
    <section class="position-relative text-white mb-5" style="min-height: 400px;">
        <div class="position-absolute top-0 start-0 w-100 h-100" style="
            background: linear-gradient(rgba(46, 125, 50, 0.9), rgba(46, 125, 50, 0.7)), 
            url('https://images.unsplash.com/photo-1523348837708-15d4a09cfac2?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover no-repeat;
            z-index: -1;">
        </div>
        <div class="container position-relative py-5">
            <div class="text-center py-5">
                <h1 class="display-3 fw-bold mb-4">About UrbanGreen 🌱</h1>
                <p class="lead fs-3 mb-0 fw-light">
                    Cultivating a Greener Tomorrow — One Garden at a Time.
                </p>
            </div>
        </div>
    </section>

    <!-- Vision Section -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center gy-5">
                <div class="col-lg-6">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1501004318641-b39e6451bec6" 
                             class="img-fluid rounded-4 shadow-lg" 
                             alt="Greenery"
                             style="transform: rotate(-2deg);">
                        <div class="position-absolute top-0 start-0 w-100 h-100 bg-success rounded-4" 
                             style="transform: rotate(2deg); z-index: -1; opacity: 0.1;"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ps-lg-5">
                        <h6 class="text-success fw-bold mb-3 text-uppercase tracking-wider">Our Vision</h6>
                        <h2 class="display-5 fw-bold mb-4">Creating Sustainable Urban Spaces</h2>
                        <p class="lead text-muted">
                            UrbanGreen envisions a future where every neighborhood is empowered with community gardens, 
                            promoting sustainable living and healthy communities.
                        </p>
                        <div class="d-flex gap-4 mt-5">
                            <div>
                                <h3 class="h2 fw-bold text-success mb-2">500+</h3>
                                <p class="text-muted mb-0">Active Gardens</p>
                            </div>
                            <div class="vr text-muted"></div>
                            <div>
                                <h3 class="h2 fw-bold text-success mb-2">2K+</h3>
                                <p class="text-muted mb-0">Community Members</p>
                            </div>
                            <div class="vr text-muted"></div>
                            <div>
                                <h3 class="h2 fw-bold text-success mb-2">50+</h3>
                                <p class="text-muted mb-0">Cities</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h6 class="text-success fw-bold mb-3 text-uppercase tracking-wider">Our Mission</h6>
                    <h2 class="display-5 fw-bold mb-4">What Drives Us Forward</h2>
                    <p class="lead text-muted">
                        We believe gardening is not just about growing plants — it's about growing people, 
                        relationships, and resilience.
                    </p>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm hover-lift">
                        <div class="card-body text-center p-4">
                            <div class="text-success mb-3" style="font-size: 2.5rem;">🌿</div>
                            <h4 class="fw-bold mb-3">Educate</h4>
                            <p class="text-muted mb-0">Spread knowledge about eco-friendly gardening practices</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm hover-lift">
                        <div class="card-body text-center p-4">
                            <div class="text-success mb-3" style="font-size: 2.5rem;">🌱</div>
                            <h4 class="fw-bold mb-3">Collaborate</h4>
                            <p class="text-muted mb-0">Foster community through shared gardening spaces</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm hover-lift">
                        <div class="card-body text-center p-4">
                            <div class="text-success mb-3" style="font-size: 2.5rem;">🌼</div>
                            <h4 class="fw-bold mb-3">Nurture</h4>
                            <p class="text-muted mb-0">Promote mental well-being and healthy lifestyles</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm hover-lift">
                        <div class="card-body text-center p-4">
                            <div class="text-success mb-3" style="font-size: 2.5rem;">🌍</div>
                            <h4 class="fw-bold mb-3">Sustain</h4>
                            <p class="text-muted mb-0">Make cities greener and more livable for everyone</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Join Us Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 bg-success text-white shadow-lg rounded-4 overflow-hidden">
                        <div class="position-absolute top-0 end-0 mt-n3 me-n3">
                            <svg width="180" height="180" viewBox="0 0 180 180" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M180 0L0 180V0H180Z" fill="rgba(255,255,255,0.1)"/>
                            </svg>
                        </div>
                        <div class="card-body p-5 text-center position-relative">
                            <h2 class="display-4 fw-bold mb-4">Join the Green Revolution 🌎</h2>
                            <p class="lead mb-5 fw-light">
                                Whether you're a seasoned gardener or a curious beginner, UrbanGreen welcomes you! 
                                Together, let's build a sustainable, green community.
                            </p>
                            <div class="d-flex gap-3 justify-content-center">
                                <a href="{{ route('register') }}" class="btn btn-light btn-lg px-5">
                                    Join Now
                                </a>
                                <a href="{{ route('home') }}" class="btn btn-outline-light btn-lg px-5">
                                    Learn More
                                </a>
                            </div>
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
    </style>
@endsection 