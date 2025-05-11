<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Discover Jordan's ancient wonders with our exclusive travel experiences">

    <link rel="icon" type="image/png" href="{{ asset('frontend/assets/images/favicon.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend/assets/libraries/swiper-bundle.min.css') }}">

    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Remix Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    @stack('style-alt')
    <title>@yield('title', 'Welcome') | Jordan Travel Experts</title>

    <style>
        
        :root {
             /* Define a darker shade of your primary color for hover effects. Adjust to your actual primary color's darker shade. */
            --bs-primary-dark: #0056b3; /* Example: Darker blue if primary is Bootstrap blue. Change if your primary is different! */
            --pure-white: #ffffff; /* Defining pure white for clarity */
        }

        /* Enhanced Preloader Styles */
        .preloader {
            background-color: var(--pure-white); /* Changed from var(--bs-body-bg) for explicit white */
        }
        /* ... (rest of preloader styles remain the same) ... */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* background-color: var(--bs-body-bg); Now set above */
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 1;
            transition: opacity 0.75s ease-in-out, visibility 0.75s ease-in-out;
        }
        .preloader.loaded {
            opacity: 0;
            visibility: hidden;
        }
        .preloader-inner {
            text-align: center;
        }
        .preloader-logo {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--bs-primary);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .preloader-logo .map-icon {
            font-size: 2rem;
            margin: 0 0.5rem;
            color: var(--bs-secondary);
        }
        .loading-bar {
            width: 150px;
            height: 8px;
            background-color: #e0e0e0;
            border-radius: 4px;
            overflow: hidden;
            margin: 0 auto;
        }
        .loading-progress {
            width: 0;
            height: 100%;
            background-color: var(--bs-primary);
            border-radius: 4px;
            animation: loadingAnimation 2s infinite linear;
        }
        @keyframes loadingAnimation {
            0% { width: 0%; }
            50% { width: 100%; }
            100% { width: 0%; }
        }


        /* Custom Nav Styling to blend with Bootstrap */
        .navbar { /* Navbar is already bg-white via class, this is for transitions etc. */
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
        /* ... (rest of navbar styles remain the same) ... */
        .navbar-brand .logo-main {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.5rem;
        }
        .navbar-brand .logo-icon {
            font-size: 1.3rem;
            margin: 0 0.25rem;
        }
        .nav-link {
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.9rem;
            padding: 0.5rem 1rem !important;
        }
        .nav-link .nav__number {
            font-size: 0.7rem;
            color: var(--bs-primary);
            margin-right: 0.3rem;
            font-weight: 700;
        }
        .nav-link .nav__icon { margin-right: 0.5rem; }
        .nav-link.active-link, .nav-link:hover {
            color: var(--bs-primary) !important;
        }
        .nav-link .nav__highlight {
            display: block;
            width: 0;
            height: 2px;
            background-color: var(--bs-primary);
            transition: width 0.3s ease;
            margin-top: 2px;
        }
        .nav-link.active-link .nav__highlight, .nav-link:hover .nav__highlight {
            width: 100%;
        }

        /* User Avatar Dropdown */
        .user-avatar-wrapper .dropdown-menu {
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
        }
        .user-avatar { cursor: pointer; display: flex; align-items: center; }
        .user-avatar .bx-user-circle { font-size: 1.5rem; margin-right: 0.5rem; }
        .user-avatar .user-name { font-weight: 500; }


        /* Footer Enhancements */
        .hover-effect {
        transition: all 0.3s ease;
        display: inline-block;
    }
    .hover-effect:hover {
        opacity: 1 !important;
        transform: translateY(-2px);
        text-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }
    .footer a.hover-effect:hover {
        text-decoration: underline !important;
    }
    .footer i.hover-effect:hover {
        transform: scale(1.2);
    }
        /* Modal Enhancements */
        .modal-content {
            border-radius: 0.75rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0,0,0,0.1);
        }
        .modal-header {
            background-color: var(--pure-white); /* CHANGED from var(--bs-light) */
            border-bottom: 1px solid #dee2e6;
            padding: 1rem 1.5rem;
        }
        .modal-footer.bg-light { /* Targeting the specific class if it was used */
            background-color: var(--pure-white) !important; /* CHANGED and ensuring override */
             border-top: 1px solid #dee2e6;
        }
        /* ... (rest of modal styles remain the same) ... */
        .modal-header-icon {
            font-size: 1.8rem;
            color: var(--bs-primary);
            margin-right: 0.75rem;
        }
        .modal-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }
        .modal-body { padding: 1.5rem; background-color: var(--pure-white); /* Ensuring modal body is white */ }
        .social-login .social-btn {
            border-radius: 50%; width: 40px; height: 40px;
            display: inline-flex; align-items: center; justify-content: center;
            margin: 0 0.3rem; border: 1px solid #eee;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .social-login .social-btn:hover { background-color: var(--bs-primary); color: white; border-color: var(--bs-primary); }


        /* Scroll Up Button */
        /* ... (Scroll up styles remain the same) ... */
        .scrollup {
            position: fixed;
            right: 1rem;
            bottom: -30%;
            background-color: var(--bs-primary);
            color: white;
            padding: 0.6rem 0.8rem;
            border-radius: 0.5rem;
            z-index: 1000;
            transition: bottom 0.4s, transform 0.4s, box-shadow 0.3s ease;
            display: flex;
            align-items: center;
            text-decoration: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        .scrollup:hover {
            background-color: var(--bs-primary-dark);
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.2);
        }
        .scrollup.show-scroll { bottom: 2rem; }
        .scrollup .bx { font-size: 1.2rem; margin-right: 0.3rem; }
        .scrollup-text { font-size: 0.8rem; font-weight: 500; }


        /* FAB Container & Options */
        /* ... (FAB styles remain the same) ... */
        .fab-container {
            position: fixed;
            bottom: 1.5rem;
            right: 1.5rem;
            z-index: 1050;
            display: flex;
            flex-direction: column-reverse;
            align-items: center;
        }
        .fab {
            background-color: var(--bs-primary);
            color: white;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            cursor: pointer;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }
        .fab:hover {
            background-color: var(--bs-primary-dark);
            transform: scale(1.1);
        }
        .fab i { font-size: 24px; }
        .fab-options {
            display: flex;
            flex-direction: column;
            margin-bottom: 1rem;
            transform: scaleY(0);
            transform-origin: bottom;
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .fab-container.active .fab-options {
            transform: scaleY(1);
        }
        .fab-option {
            background-color: var(--bs-white);
            color: var(--bs-primary);
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            margin-top: 0.75rem;
            text-decoration: none;
            transition: transform 0.2s ease, background-color 0.2s ease, color 0.2s ease;
            position: relative;
        }
        .fab-option:hover {
            transform: scale(1.15);
            background-color: var(--bs-light); /* This can remain light gray for hover */
        }
        .fab-option i { font-size: 20px; }
        .fab-option[data-tooltip]::after {
            content: attr(data-tooltip);
            position: absolute;
            right: 120%;
            top: 50%;
            transform: translateY(-50%);
            background-color: #333;
            color: white;
            padding: 0.3rem 0.6rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.2s ease, visibility 0.2s ease;
        }
        .fab-option:hover[data-tooltip]::after {
            opacity: 1;
            visibility: visible;
        }
        section {
    padding: 4rem 0;
    margin: 2rem 0;
}

/* Or for specific section classes */
.content-section {
    padding: 5rem 0;
}

.hero-section {
    margin-bottom: 3rem;
}
    </style>
</head>
<body> 
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-logo">
                <span>G</span>
                <div class="map-icon" style="color: #df3462">
                    <i class="bx bxs-map"></i>
                </div>
                <span>JORDAN</span>
            </div>
            <div class="loading-bar">
                <div class="loading-progress"></div>
            </div>
        </div>
    </div>

    <header class="header" id="header">
        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('homepage') }}">
                    <span class="logo-main text-primary">G</span>
                    <span class="logo-icon text-secondary mx-1"><i class="bx bxs-map bx-sm" style="color: #df3462"></i></span>
                    <span class="logo-main text-primary">JORDAN</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bx bx-menu"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active-link' : '' }}" href="{{ route('homepage') }}">
                                <span class="nav__number d-none d-lg-inline"></span>
                                <i class="bx bx-home-alt nav__icon"></i>
                                <span class="nav__text">Home</span>
                                <span class="nav__highlight"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('travel-packages') || request()->is('travel-packages/*') ? 'active-link' : '' }}" href="{{ route('travel_package.index') }}">
                                <span class="nav__number d-none d-lg-inline"></span>
                                <i class="bx bx-compass nav__icon"></i>
                                <span class="nav__text">Tours</span>
                                <span class="nav__highlight"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('blogs') || request()->is('blogs/*') ? 'active-link' : '' }}" href="{{ route('blogs.index') }}">
                                <span class="nav__number d-none d-lg-inline"></span>
                                <i class="bx bx-news nav__icon"></i>
                                <span class="nav__text">Stories</span>
                                <span class="nav__highlight"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('contact') ? 'active-link' : '' }}" href="{{ route('contact') }}">
                                <span class="nav__number d-none d-lg-inline"></span>
                                <i class="bx bx-envelope nav__icon"></i>
                                <span class="nav__text">Contact</span>
                                <span class="nav__highlight"></span>
                            </a>
                        </li>
                    </ul>

                    <div class="nav__actions d-flex align-items-center">
                        @if(Auth::guard('travel_user')->check())
                            <div class="dropdown user-avatar-wrapper">
                                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-user-circle fs-3 me-1"></i>
                                    <span class="user-name d-none d-sm-inline">{{ Auth::guard('travel_user')->user()->name }}</span>
                                    <i class="bx bx-chevron-down ms-1"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end animate slideIn" aria-labelledby="userDropdown">
                                    <li><a class="dropdown-item" href="{{ route('touristprofile') }}"><i class="bx bx-user me-2"></i> Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bx bx-bookmark me-2"></i> My Bookings</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item text-danger" href="{{ route('touristlogout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="bx bx-log-out me-2"></i> Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('touristlogout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <button class="btn btn-outline-primary btn-sm px-3 py-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                                <i class="bx bx-log-in me-1"></i> Login
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="main pt-5 mt-5"> @yield('content')
    </main>

    <footer class="footer py-5" style="background-color: #26a4dd;">
        <div class="container">
            <div class="row text-white">
                <!-- Brand Column -->
                <div class="col-lg-4 mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <span class="h4 fw-bold">G</span>
                        <i class="bx bxs-map mx-1 fs-4" style="color: orange"></i>
                        <span class="h4 fw-bold">JORDAN</span>
                    </div>
                    <p class="mb-4 opacity-75">
                        Unveiling the majesty of Jordan - where ancient history meets breathtaking landscapes.
                    </p>
                    <div class="social-links">
                        <a href="#" class="text-white me-3 hover-effect"><i class="bx bxl-facebook fs-5"></i></a>
                        <a href="#" class="text-white me-3 hover-effect"><i class="bx bxl-instagram fs-5"></i></a>
                        <a href="#" class="text-white me-3 hover-effect"><i class="bx bxl-twitter fs-5"></i></a>
                        <a href="#" class="text-white hover-effect"><i class="bx bxl-youtube fs-5"></i></a>
                    </div>
                </div>
    
                <!-- Links Columns -->
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <h5 class="fw-bold mb-3">Explore</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="#" class="text-white text-decoration-none opacity-75 hover-effect">Petra Tours</a></li>
                                <li class="mb-2"><a href="#" class="text-white text-decoration-none opacity-75 hover-effect">Wadi Rum</a></li>
                                <li class="mb-2"><a href="#" class="text-white text-decoration-none opacity-75 hover-effect">Dead Sea</a></li>
                                <li><a href="#" class="text-white text-decoration-none opacity-75 hover-effect">Amman City</a></li>
                            </ul>
                        </div>
                        
                        <div class="col-md-4 mb-4">
                            <h5 class="fw-bold mb-3">Company</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="#" class="text-white text-decoration-none opacity-75 hover-effect">About Us</a></li>
                                <li class="mb-2"><a href="#" class="text-white text-decoration-none opacity-75 hover-effect">Our Team</a></li>
                                <li class="mb-2"><a href="#" class="text-white text-decoration-none opacity-75 hover-effect">Blog</a></li>
                                <li><a href="#" class="text-white text-decoration-none opacity-75 hover-effect">Careers</a></li>
                            </ul>
                        </div>
                        
                        <div class="col-md-4 mb-4">
                            <h5 class="fw-bold mb-3">Support</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="#" class="text-white text-decoration-none opacity-75 hover-effect">FAQs</a></li>
                                <li class="mb-2"><a href="#" class="text-white text-decoration-none opacity-75 hover-effect">Contact</a></li>
                                <li><a href="#" class="text-white text-decoration-none opacity-75 hover-effect">Terms</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    
            <hr class="my-4" style="border-color: rgba(255,255,255,0.1);">
    
            <div class="text-center text-white opacity-75">
                <small>&copy; 2025 GoJordan. All rights reserved.</small>
            </div>
        </div>
    </footer>
    
  

    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content"> <div class="modal-header"> <div class="modal-header-icon"><i class="bx bx-lock-open-alt"></i></div>
                    <h5 class="modal-title" id="loginModalLabel">Welcome Back to Jordan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> <div id="loginError" class="alert alert-danger d-none" role="alert"></div>
                <form id="loginForm" class="needs-validation" novalidate action="{{ route('touristregister.post') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="loginEmail" 
                               placeholder="name@example.com" required
                               pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                        <label for="loginEmail"><i class="bx bx-envelope me-1"></i> Email address</label>
                        <div class="invalid-feedback email-feedback">
                            Please enter a valid email address (e.g. example@domain.com).
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="loginPassword" 
                               placeholder="Password" required minlength="8">
                        <label for="loginPassword"><i class="bx bx-key me-1"></i> Password</label>
                        <div class="invalid-feedback password-feedback">
                            Password must be at least 8 characters long.
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <a href="#" class="text-decoration-none small">Forgot password?</a>
                    </div>
                    <button type="submit" id="loginSubmitBtn" class="btn btn-primary w-100 py-2">
                        <i class="bx bx-log-in me-1"></i> Sign In
                    </button>
                </form>
                
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const loginForm = document.getElementById('loginForm');
                    const emailInput = document.getElementById('loginEmail');
                    const passwordInput = document.getElementById('loginPassword');
                    
                    // Real-time validation for email
                    emailInput.addEventListener('input', function() {
                        if (this.validity.valid) {
                            this.classList.remove('is-invalid');
                            this.classList.add('is-valid');
                        } else {
                            this.classList.remove('is-valid');
                        }
                    });
                    
                    // Real-time validation for password
                    passwordInput.addEventListener('input', function() {
                        if (this.validity.valid) {
                            this.classList.remove('is-invalid');
                            this.classList.add('is-valid');
                        } else {
                            this.classList.remove('is-valid');
                        }
                    });
                    
                    // Form submission validation
                    loginForm.addEventListener('submit', function(e) {
                        // Prevent default if form is invalid
                        if (!loginForm.checkValidity()) {
                            e.preventDefault();
                            e.stopPropagation();
                            
                            // Validate email
                            if (emailInput.validity.valueMissing) {
                                emailInput.classList.add('is-invalid');
                                document.querySelector('.email-feedback').textContent = 'Email address is required.';
                            } else if (emailInput.validity.patternMismatch) {
                                emailInput.classList.add('is-invalid');
                                document.querySelector('.email-feedback').textContent = 'Please enter a valid email address (e.g. example@domain.com).';
                            }
                            
                            // Validate password
                            if (passwordInput.validity.valueMissing) {
                                passwordInput.classList.add('is-invalid');
                                document.querySelector('.password-feedback').textContent = 'Password is required.';
                            } else if (passwordInput.validity.tooShort) {
                                passwordInput.classList.add('is-invalid');
                                document.querySelector('.password-feedback').textContent = 'Password must be at least 8 characters long.';
                            }
                        }
                        
                        loginForm.classList.add('was-validated');
                    }, false);
                    
                    // Add Bootstrap validation styles
                    (function() {
                        'use strict';
                        
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.querySelectorAll('.needs-validation');
                        
                        // Loop over them and prevent submission
                        Array.prototype.slice.call(forms)
                            .forEach(function(form) {
                                form.addEventListener('submit', function(event) {
                                    if (!form.checkValidity()) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }
                                    
                                    form.classList.add('was-validated');
                                }, false);
                            });
                    })();
                });
                </script>
                    
                </div>
                <div class="modal-footer justify-content-center"> <p class="mb-0 small">New to Jordan Travel? <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" class="text-decoration-none fw-bold">Create an account</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header"> <div class="modal-header-icon"><i class="bx bx-user-plus"></i></div>
                    <h5 class="modal-title" id="registerModalLabel">Begin Your Journey</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> <div id="registerError" class="alert alert-danger d-none" role="alert"></div>
                <form id="registerForm" action="{{ route('touristlogin.post') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="registerName" 
                               placeholder="Your full name" required pattern="^[a-zA-Z ]{3,}(?: [a-zA-Z ]+){1,}$">
                        <label for="registerName"><i class="bx bx-user me-1"></i> Full Name</label>
                        <div class="invalid-feedback name-feedback">
                            Please enter your full name (at least first and last name).
                        </div>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="registerEmail" 
                               placeholder="name@example.com" required
                               pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                        <label for="registerEmail"><i class="bx bx-envelope me-1"></i> Email address</label>
                        <div class="invalid-feedback email-feedback">
                            Please enter a valid email address (e.g. example@domain.com).
                        </div>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="tel" name="phone" class="form-control" id="registerPhone" 
                               placeholder="+962 7X XXX XXXX" required
                               pattern="^\+962[ -]?7[789]\d{7}$">
                        <label for="registerPhone"><i class="bx bx-phone me-1"></i> Phone Number</label>
                        <div class="invalid-feedback phone-feedback">
                            Please enter a valid Jordanian phone number (e.g. +9627X XXX XXXX).
                        </div>
                    </div>
                    
                    <div class="form-floating mb-3 position-relative">
                        <input type="password" name="password" class="form-control" id="registerPassword" 
                               placeholder="Create a password" required minlength="8"
                               pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$">
                        <label for="registerPassword"><i class="bx bx-lock-alt me-1"></i> Password</label>
                        <button type="button" class="btn btn-link position-absolute end-0 top-0 mt-2 me-2 toggle-password">
                            <i class="bx bx-show"></i>
                        </button>
                        <div class="invalid-feedback password-feedback">
                            Password must be at least 8 characters with uppercase, lowercase and number.
                        </div>
                        <div class="password-requirements mt-2 small">
                            <div class="requirement" id="length-req">
                                <i class="bx bx-circle"></i> At least 8 characters
                            </div>
                            <div class="requirement" id="uppercase-req">
                                <i class="bx bx-circle"></i> At least one uppercase letter
                            </div>
                            <div class="requirement" id="lowercase-req">
                                <i class="bx bx-circle"></i> At least one lowercase letter
                            </div>
                            <div class="requirement" id="number-req">
                                <i class="bx bx-circle"></i> At least one number
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-floating mb-3 position-relative">
                        <input type="password" name="password_confirmation" class="form-control" 
                               id="registerPasswordConfirm" placeholder="Confirm your password" required>
                        <label for="registerPasswordConfirm"><i class="bx bx-lock-check me-1"></i> Confirm Password</label>
                        <button type="button" class="btn btn-link position-absolute end-0 top-0 mt-2 me-2 toggle-password">
                            <i class="bx bx-show"></i>
                        </button>
                        <div class="invalid-feedback confirm-password-feedback">
                            Passwords do not match.
                        </div>
                    </div>
                    
                    <div class="form-check mb-4">
                        <input type="checkbox" class="form-check-input" id="termsCheck" name="terms" required>
                        <label class="form-check-label small" for="termsCheck">
                            I agree to the <a href="#" class="text-decoration-none">Terms & Conditions</a> and 
                            <a href="#" class="text-decoration-none">Privacy Policy</a>.
                        </label>
                        <div class="invalid-feedback terms-feedback">
                            You must agree to the terms and conditions.
                        </div>
                    </div>
                    
                    <button type="submit" id="registerSubmitBtn" class="btn btn-primary w-100 py-2">
                        <i class="bx bx-user-plus me-1"></i> Register Now
                    </button>
                </form>
                
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const form = document.getElementById('registerForm');
                    const nameInput = document.getElementById('registerName');
                    const emailInput = document.getElementById('registerEmail');
                    const phoneInput = document.getElementById('registerPhone');
                    const passwordInput = document.getElementById('registerPassword');
                    const confirmPasswordInput = document.getElementById('registerPasswordConfirm');
                    const termsCheck = document.getElementById('termsCheck');
                    const togglePasswordBtns = document.querySelectorAll('.toggle-password');
                    
                    // Toggle password visibility
                    togglePasswordBtns.forEach(btn => {
                        btn.addEventListener('click', function() {
                            const input = this.closest('.form-floating').querySelector('input');
                            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                            input.setAttribute('type', type);
                            this.querySelector('i').classList.toggle('bx-show');
                            this.querySelector('i').classList.toggle('bx-hide');
                        });
                    });
                    
                    // Password strength validation
                    passwordInput.addEventListener('input', function() {
                        const password = this.value;
                        
                        // Check requirements
                        const hasLength = password.length >= 8;
                        const hasUpper = /[A-Z]/.test(password);
                        const hasLower = /[a-z]/.test(password);
                        const hasNumber = /\d/.test(password);
                        
                        // Update requirement indicators
                        updateRequirement('length-req', hasLength);
                        updateRequirement('uppercase-req', hasUpper);
                        updateRequirement('lowercase-req', hasLower);
                        updateRequirement('number-req', hasNumber);
                        
                        // Validate password match if confirm password has value
                        if (confirmPasswordInput.value) {
                            validatePasswordMatch();
                        }
                    });
                    
                    // Confirm password validation
                    confirmPasswordInput.addEventListener('input', validatePasswordMatch);
                    
                    function validatePasswordMatch() {
                        if (passwordInput.value !== confirmPasswordInput.value) {
                            confirmPasswordInput.classList.add('is-invalid');
                            confirmPasswordInput.classList.remove('is-valid');
                            document.querySelector('.confirm-password-feedback').style.display = 'block';
                            return false;
                        } else {
                            confirmPasswordInput.classList.remove('is-invalid');
                            confirmPasswordInput.classList.add('is-valid');
                            document.querySelector('.confirm-password-feedback').style.display = 'none';
                            return true;
                        }
                    }
                    
                    function updateRequirement(id, isValid) {
                        const element = document.getElementById(id);
                        const icon = element.querySelector('i');
                        
                        if (isValid) {
                            element.classList.add('text-success');
                            icon.classList.remove('bx-circle');
                            icon.classList.add('bx-check-circle');
                        } else {
                            element.classList.remove('text-success');
                            icon.classList.remove('bx-check-circle');
                            icon.classList.add('bx-circle');
                        }
                    }
                    
                    // Real-time validation for all fields
                    [nameInput, emailInput, phoneInput, passwordInput, termsCheck].forEach(input => {
                        input.addEventListener('input', function() {
                            if (this.validity.valid) {
                                this.classList.remove('is-invalid');
                                this.classList.add('is-valid');
                            } else {
                                this.classList.remove('is-valid');
                            }
                        });
                    });
                    
                    // Form submission validation
                    form.addEventListener('submit', function(e) {
                        // Prevent default if form is invalid
                        if (!form.checkValidity()) {
                            e.preventDefault();
                            e.stopPropagation();
                            
                            // Validate name
                            if (nameInput.validity.valueMissing) {
                                nameInput.classList.add('is-invalid');
                                document.querySelector('.name-feedback').textContent = 'Full name is required.';
                            } else if (nameInput.validity.patternMismatch) {
                                nameInput.classList.add('is-invalid');
                                document.querySelector('.name-feedback').textContent = 'Please enter your full name (at least first and last name).';
                            }
                            
                            // Validate email
                            if (emailInput.validity.valueMissing) {
                                emailInput.classList.add('is-invalid');
                                document.querySelector('.email-feedback').textContent = 'Email address is required.';
                            } else if (emailInput.validity.patternMismatch) {
                                emailInput.classList.add('is-invalid');
                                document.querySelector('.email-feedback').textContent = 'Please enter a valid email address (e.g. example@domain.com).';
                            }
                            
                            // Validate phone
                            if (phoneInput.validity.valueMissing) {
                                phoneInput.classList.add('is-invalid');
                                document.querySelector('.phone-feedback').textContent = 'Phone number is required.';
                            } else if (phoneInput.validity.patternMismatch) {
                                phoneInput.classList.add('is-invalid');
                                document.querySelector('.phone-feedback').textContent = 'Please enter a valid Jordanian phone number (e.g. +9627X XXX XXXX).';
                            }
                            
                            // Validate password
                            if (passwordInput.validity.valueMissing) {
                                passwordInput.classList.add('is-invalid');
                                document.querySelector('.password-feedback').textContent = 'Password is required.';
                            } else if (passwordInput.validity.tooShort) {
                                passwordInput.classList.add('is-invalid');
                                document.querySelector('.password-feedback').textContent = 'Password must be at least 8 characters.';
                            } else if (passwordInput.validity.patternMismatch) {
                                passwordInput.classList.add('is-invalid');
                                document.querySelector('.password-feedback').textContent = 'Password must contain uppercase, lowercase and number.';
                            }
                            
                            // Validate terms
                            if (termsCheck.validity.valueMissing) {
                                termsCheck.classList.add('is-invalid');
                            }
                            
                            // Validate password match
                            validatePasswordMatch();
                        }
                        
                        form.classList.add('was-validated');
                    }, false);
                    
                    // Add Bootstrap validation styles
                    (function() {
                        'use strict';
                        var forms = document.querySelectorAll('.needs-validation');
                        Array.prototype.slice.call(forms)
                            .forEach(function(form) {
                                form.addEventListener('submit', function(event) {
                                    if (!form.checkValidity()) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }
                                    form.classList.add('was-validated');
                                }, false);
                            });
                    })();
                });
                </script>
                
                <style>
                .password-requirements {
                    color: #6c757d;
                }
                .requirement {
                    display: flex;
                    align-items: center;
                    margin-bottom: 3px;
                }
                .requirement i {
                    margin-right: 5px;
                    font-size: 0.8rem;
                }
                .requirement.text-success {
                    color: #28a745;
                }
                .form-control.is-valid {
                    border-color: #28a745;
                    background-image: none;
                    padding-right: 12px;
                }
                .form-control.is-valid:focus {
                    border-color: #28a745;
                    box-shadow: 0 0 0 0.25rem rgba(40, 167, 69, 0.25);
                }
                .toggle-password {
                    z-index: 5;
                    color: #6c757d;
                }
                .toggle-password:hover {
                    color: #0d6efd;
                }
                </style>
                </div>
                <div class="modal-footer justify-content-center"> <p class="mb-0 small">Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" class="text-decoration-none fw-bold">Sign in here</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="fab-container" id="fab-container">
        <div class="fab-options" id="fab-options">
            <a href="https://wa.me/962XXXXXXXXX" target="_blank" class="fab-option" data-tooltip="WhatsApp Chat">
                <i class="bx bxl-whatsapp"></i>
            </a>
            <a href="tel:+962XXXXXXXXX" class="fab-option" data-tooltip="Call Us">
                <i class="bx bx-phone"></i>
            </a>
            <a href="{{ route('contact') }}" class="fab-option" data-tooltip="Contact Form">
                <i class="bx bx-envelope"></i>
            </a>
        </div>
        <div class="fab fab-main" id="fab-main" title="Quick Contact">
            <i class="bx bx-plus open-icon"></i>
            <i class="bx bx-x close-icon" style="display: none;"></i>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend/assets/libraries/swiper-bundle.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    @stack('script-alt')

    <script>
        // ... (all JavaScript logic remains the same as the previous "dark mode removed" version) ...
        window.addEventListener('load', function() {
            const preloader = document.querySelector('.preloader');
            if (preloader) {
                let progress = 0;
                const progressBar = document.querySelector('.loading-progress');
                if (progressBar) {
                    const interval = setInterval(() => {
                        progress += 25;
                        progressBar.style.width = progress + '%';
                        if (progress >= 100) {
                            clearInterval(interval);
                            setTimeout(() => {
                                preloader.classList.add('loaded');
                                setTimeout(() => {
                                    preloader.style.display = 'none';
                                }, 750);
                            }, 200);
                        }
                    }, 300);
                } else {
                     preloader.classList.add('loaded');
                        setTimeout(() => {
                            preloader.style.display = 'none';
                        }, 750);
                }
            }
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                offset: 50,
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const currentYearEl = document.getElementById('current-year');
            if (currentYearEl) {
                currentYearEl.textContent = new Date().getFullYear();
            }

            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });

            const navbar = document.querySelector('.navbar');
            if (navbar) {
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 50) {
                        navbar.classList.add('navbar-scrolled');
                    } else {
                        navbar.classList.remove('navbar-scrolled');
                    }
                });
            }
            // Add corresponding CSS for .navbar-scrolled if you use this:
            // .navbar-scrolled { padding-top: 0.3rem; padding-bottom: 0.3rem; box-shadow: var(--bs-box-shadow) !important; }


            const scrollUp = document.getElementById('scroll-up');
            if (scrollUp) {
                window.addEventListener('scroll', function() {
                    if (this.scrollY >= 350) {
                        scrollUp.classList.add('show-scroll');
                    } else {
                        scrollUp.classList.remove('show-scroll');
                    }
                });
                scrollUp.addEventListener('click', function(e) {
                    e.preventDefault();
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
            }

            const fabMain = document.getElementById('fab-main');
            const fabContainer = document.getElementById('fab-container');
            const openIcon = fabMain ? fabMain.querySelector('.open-icon') : null;
            const closeIcon = fabMain ? fabMain.querySelector('.close-icon') : null;

            if (fabMain && fabContainer && openIcon && closeIcon) {
                fabMain.addEventListener('click', () => {
                    fabContainer.classList.toggle('active');
                    openIcon.style.display = fabContainer.classList.contains('active') ? 'none' : 'inline-block';
                    closeIcon.style.display = fabContainer.classList.contains('active') ? 'inline-block' : 'none';
                });
            }

            $('#loginForm').on('submit', function(e) {
                e.preventDefault();
                if (!this.checkValidity()) {
                    $(this).addClass('was-validated');
                    return;
                }
                const submitBtn = $('#loginSubmitBtn');
                const originalText = submitBtn.html();
                const errorDiv = $('#loginError');
                submitBtn.prop('disabled', true).html(
                    `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="ms-2">Authenticating...</span>`
                );
                errorDiv.addClass('d-none').text('');
                $.ajax({
                    type: 'POST',
                    url: '{{ route("touristlogin.post") }}',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            errorDiv.addClass('d-none');
                            submitBtn.removeClass('btn-primary').addClass('btn-success').html('<i class="bx bx-check-circle me-1"></i> Success!');
                            setTimeout(() => {
                                window.location.href = response.redirect || '/';
                            }, 1200);
                        } else {
                            errorDiv.text(response.message || 'Login failed. Please check your credentials.').removeClass('d-none');
                            submitBtn.html(originalText).prop('disabled', false);
                            if(response.errors) {
                                if(response.errors.email) $('#loginEmail').addClass('is-invalid').next('.invalid-feedback').text(response.errors.email[0]);
                                if(response.errors.password) $('#loginPassword').addClass('is-invalid').next('.invalid-feedback').text(response.errors.password[0]);
                            }
                        }
                    },
                    error: function(xhr) {
                        let errorMessage = 'An error occurred. Please try again.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        } else if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                            const errors = xhr.responseJSON.errors;
                            errorMessage = Object.values(errors).flat().join(' ');
                             if(errors.email) $('#loginEmail').addClass('is-invalid').siblings('.invalid-feedback').text(errors.email[0]);
                             if(errors.password) $('#loginPassword').addClass('is-invalid').siblings('.invalid-feedback').text(errors.password[0]);
                        }
                        errorDiv.text(errorMessage).removeClass('d-none');
                        submitBtn.html(originalText).prop('disabled', false);
                    }
                });
            });

            $('#registerForm').on('submit', function(e) {
                e.preventDefault();
                const form = this;
                if (!form.checkValidity()) {
                    $(form).addClass('was-validated');
                    const password = $('#registerPassword').val();
                    const confirmPassword = $('#registerPasswordConfirm').val();
                    if (password !== confirmPassword) {
                        $('#registerPasswordConfirm').addClass('is-invalid').siblings('.invalid-feedback').text('Passwords do not match.');
                        e.stopPropagation();
                        return;
                    } else {
                         $('#registerPasswordConfirm').removeClass('is-invalid');
                    }
                    return;
                }
                const submitBtn = $('#registerSubmitBtn');
                const originalText = submitBtn.html();
                const errorDiv = $('#registerError');
                submitBtn.prop('disabled', true).html(
                    `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="ms-2">Creating Account...</span>`
                );
                errorDiv.addClass('d-none').text('');
                $.ajax({
                    type: 'POST',
                    url: $(form).attr('action'),
                    data: $(form).serialize(),
                    success: function(response) {
                        if (response.success) {
                            errorDiv.addClass('d-none');
                            submitBtn.removeClass('btn-primary').addClass('btn-success').html('<i class="bx bx-check-circle me-1"></i> Registered!');
                            setTimeout(() => {
                                 $('#registerModal').modal('hide');
                                 $('#loginModal').modal('show');
                            }, 1500);
                        } else {
                            errorDiv.text(response.message || 'Registration failed. Please try again.').removeClass('d-none');
                            submitBtn.html(originalText).prop('disabled', false);
                        }
                    },
                    error: function(xhr) {
                        let errorMessage = 'An error occurred. Please try again.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                            const errors = xhr.responseJSON.errors;
                            let messages = [];
                            for (const key in errors) {
                                messages.push(errors[key][0]);
                                $(`#register${key.charAt(0).toUpperCase() + key.slice(1)}`).addClass('is-invalid').siblings('.invalid-feedback').text(errors[key][0]);
                            }
                            errorMessage = messages.join(' ');
                        }
                        errorDiv.text(errorMessage).removeClass('d-none');
                        submitBtn.html(originalText).prop('disabled', false);
                    }
                });
            });

            const loginModalEl = document.getElementById('loginModal');
            const registerModalEl = document.getElementById('registerModal');
            const loginModal = bootstrap.Modal.getOrCreateInstance(loginModalEl);
            const registerModal = bootstrap.Modal.getOrCreateInstance(registerModalEl);
            document.querySelectorAll('[data-bs-target="#registerModal"]').forEach(trigger => {
                trigger.addEventListener('click', (e) => {
                    if (e.target.closest('.modal-footer')) {
                        loginModal.hide();
                    }
                });
            });
             loginModalEl.addEventListener('hidden.bs.modal', event => {
                if (document.activeElement && document.activeElement.dataset.bsTarget === '#registerModal') {
                    registerModal.show();
                }
            });
            document.querySelectorAll('[data-bs-target="#loginModal"]').forEach(trigger => {
                trigger.addEventListener('click', (e) => {
                     if (e.target.closest('.modal-footer')) {
                        registerModal.hide();
                     }
                });
            });
            registerModalEl.addEventListener('hidden.bs.modal', event => {
                if (document.activeElement && document.activeElement.dataset.bsTarget === '#loginModal') {
                    loginModal.show();
                }
            });

            [loginModalEl, registerModalEl].forEach(modalEl => {
                if(modalEl){
                    modalEl.addEventListener('hidden.bs.modal', function () {
                        const form = this.querySelector('form');
                        if (form) {
                            form.classList.remove('was-validated');
                            form.reset();
                            form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
                        }
                        const errorAlert = this.querySelector('.alert-danger');
                        if (errorAlert) {
                            errorAlert.classList.add('d-none');
                            errorAlert.textContent = '';
                        }
                        const submitBtn = this.querySelector('button[type="submit"]');
                        if (submitBtn && submitBtn.dataset.originalHtml) {
                            submitBtn.innerHTML = submitBtn.dataset.originalHtml;
                            submitBtn.removeAttribute('disabled');
                        } else if (submitBtn) {
                             if (submitBtn.id === 'loginSubmitBtn') submitBtn.innerHTML = '<i class="bx bx-log-in me-1"></i> Sign In';
                             if (submitBtn.id === 'registerSubmitBtn') submitBtn.innerHTML = '<i class="bx bx-user-plus me-1"></i> Register Now';
                             submitBtn.removeAttribute('disabled');
                             submitBtn.classList.remove('btn-success');
                             submitBtn.classList.add('btn-primary');
                        }
                    });
                }
            });

            const registerPassword = document.getElementById('registerPassword');
            const registerPasswordConfirm = document.getElementById('registerPasswordConfirm');
            if(registerPassword && registerPasswordConfirm){
                const validatePasswords = () => {
                    if (registerPassword.value !== registerPasswordConfirm.value) {
                        registerPasswordConfirm.setCustomValidity("Passwords do not match.");
                    } else {
                        registerPasswordConfirm.setCustomValidity("");
                    }
                };
                registerPassword.addEventListener('change', validatePasswords);
                registerPasswordConfirm.addEventListener('keyup', validatePasswords);
            }
        });
    </script>
</body>
</html>