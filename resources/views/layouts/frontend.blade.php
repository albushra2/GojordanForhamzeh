<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'GoJordan | Explore the Jewel of Middle East')</title>

    <!-- Design Assets -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('frontend/assets/libraries/swiper-bundle.min.css') }}"/>

    <!-- Custom Styles -->
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --dark-gradient: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
            --glass-effect: rgba(255, 255, 255, 0.1);
        }

        .hero-nav {
            background: var(--primary-gradient);
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .nav__logo {
            font-family: 'Arial Rounded MT Bold', sans-serif;
            font-size: 1.8rem;
            letter-spacing: 1px;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav__link {
            position: relative;
            padding: 0.5rem 1rem !important;
            transition: all 0.3s ease;
        }

        .nav__link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--primary-gradient);
            transition: all 0.3s ease;
        }

        .nav__link:hover::after {
            width: 80%;
            left: 10%;
        }

        .active-link {
            background: var(--glass-effect);
            border-radius: 8px;
            backdrop-filter: blur(10px);
        }

        .theme-toggle {
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .theme-toggle:hover {
            transform: rotate(25deg);
        }

        .modal-content {
            border-radius: 20px;
            overflow: hidden;
            border: none;
            background: var(--primary-gradient);
        }

        .modal-header {
            background: rgba(255, 255, 255, 0.1);
            border-bottom: none;
        }

        .custom-modal-btn {
            background: var(--dark-gradient);
            border: none;
            transition: transform 0.3s ease;
        }

        .custom-modal-btn:hover {
            transform: translateY(-2px);
        }

        .footer {
            background: var(--dark-gradient);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: -50px;
            left: 0;
            width: 100%;
            height: 100px;
            background: var(--primary-gradient);
            transform: skewY(-3deg);
        }

        .scrollup {
            background: var(--primary-gradient);
            padding: 12px;
            border-radius: 50%;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        .floating-element {
            animation: float 3s ease-in-out infinite;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
    @stack('style-alt')
</head>
<body>
    <!-- Animated Background Elements -->
    <div class="position-fixed w-100 h-100" style="pointer-events: none; z-index: -1;">
        <div class="floating-element" style="top: 20%; left: 10%; width: 50px; height: 50px; background: rgba(118, 75, 162, 0.1); border-radius: 15px; position: absolute;"></div>
        <div class="floating-element" style="top: 70%; right: 15%; width: 30px; height: 30px; background: rgba(102, 126, 234, 0.1); border-radius: 50%; position: absolute; animation-delay: -1s;"></div>
    </div>

    <header class="header hero-nav" id="header">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a href="{{ route('homepage') }}" class="navbar-brand nav__logo" data-aos="zoom-in">
                    <i class='bx bxs-map'></i> GoJordan
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <!-- Navigation Items with Animation -->
                        <li class="nav-item" data-aos="fade-down" data-aos-delay="100">
                            <a href="{{ route('homepage') }}" class="nav-link nav__link {{ request()->is('/') ? 'active-link' : '' }}">
                                <i class="bx bx-home-alt"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="nav-item" data-aos="fade-down" data-aos-delay="100">
                            <a href="{{ route('travel_package.index') }}" class="nav-link nav__link {{ request()->is('/') ? 'active-link' : '' }}">
                                <i class="bx bx-home-alt"></i>
                                <span>Package Travel</span>
                            </a>
                        </li>
                        <li class="nav-item" data-aos="fade-down" data-aos-delay="100">
                            <a href="{{ route('blogs.index') }}" class="nav-link nav__link {{ request()->is('/') ? 'active-link' : '' }}">
                                <i class="bx bx-home-alt"></i>
                                <span>Blogs</span>
                            </a>
                        </li>
                        <li class="nav-item" data-aos="fade-down" data-aos-delay="100">
                            <a href="{{ route('contact') }}" class="nav-link nav__link {{ request()->is('/') ? 'active-link' : '' }}">
                                <i class="bx bx-home-alt"></i>
                                <span>Contact Us</span>
                            </a>
                        </li>
                    </ul>

                    <div class="navbar-nav ml-auto align-items-center">
                    <i class="bx bx-moon theme-toggle h4 text-white mr-3" id="theme-button"></i>

                        @if(Auth::guard('travel_user')->check())
                        <a href="{{ route('touristprofile') }}" class="btn btn-light rounded-pill px-4 shadow-sm" data-aos="zoom-in">
                                <i class="bx bx-user mr-2"></i>Profile</a>
                        @else
                            <button class="btn btn-light rounded-pill px-4 shadow-sm" data-toggle="modal" data-target="#loginModal" data-aos="zoom-in">
                                <i class="bx bx-log-in mr-2"></i>Login
                            </button>                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="main">
        {{-- Content from specific pages will be injected here --}}
        @yield('content')
    </main>


    <footer class="footer section"> {{-- Added 'section' class for padding --}}
        <div class="footer__container container grid"> {{-- Using Bootstrap container and grid --}}
            <div class="row w-100"> {{-- Use Bootstrap row --}}
                <div class="col-md-4 mb-4"> {{-- Adjust column size and add margin --}}
                    <a href="{{ route('homepage') }}" class="footer__logo">G<i class="bx bxs-map"></i>JORDAN</a>
                    <p class="footer__description">
                        Our vision is to help people discover <br />
                        the most beautiful destinations in Jordan <br />
                        with safety and ease.
                    </p>
                </div>

                <div class="col-md-8"> {{-- Adjust column size --}}
                    <div class="row">
                        <div class="col-md-4 col-sm-6 mb-4"> {{-- Adjust column size and add margin --}}
                            <h3 class="footer__title">About</h3>
                            <ul class="footer__links list-unstyled"> {{-- Use list-unstyled --}}
                                <li><a href="#" class="footer__link">About Us</a></li>
                                <li><a href="#" class="footer__link">Features</a></li>
                                <li><a href="#" class="footer__link">News & Blog</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-4"> {{-- Adjust column size and add margin --}}
                            <h3 class="footer__title">Company</h3>
                            <ul class="footer__links list-unstyled"> {{-- Use list-unstyled --}}
                                <li><a href="#" class="footer__link">How We Work</a></li>
                                <li><a href="#" class="footer__link">Partnerships</a></li>
                                <li><a href="#" class="footer__link">Travel Safety</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-4"> {{-- Adjust column size and add margin --}}
                            <h3 class="footer__title">Support</h3>
                            <ul class="footer__links list-unstyled"> {{-- Use list-unstyled --}}
                                <li><a href="#" class="footer__link">FAQs</a></li>
                                <li><a href="#" class="footer__link">Support Center</a></li>
                                <li><a href="#" class="footer__link">Contact Us</a></li>
                            </ul>
                        </div>
                        {{-- Removed the Follow Us column from the second row to place it better if desired --}}
                    </div>
                </div>
            </div>

             {{-- Separate row for follow us and social icons --}}
            <div class="row w-100 mt-4">
                 <div class="col-md-4 offset-md-4 mb-4"> {{-- Center the social icons slightly --}}
                     <h3 class="footer__title text-center">Follow Us</h3>
                     <ul class="footer__social d-flex justify-content-center list-unstyled"> {{-- Center social icons --}}
                         <li class="mx-2"><a href="#" class="footer__social-link"><i class="bx bxl-facebook-circle"></i></a></li>
                         <li class="mx-2"><a href="#" class="footer__social-link"><i class="bx bxl-instagram-alt"></i></a></li>
                         <li class="mx-2"><a href="#" class="footer__social-link"><i class="bx bxl-pinterest"></i></a></li>
                     </ul>
                 </div>
            </div>


        </div>

        <div class="footer__info container text-center mt-4"> {{-- Centered the info section --}}
            <span class="footer__copy">&#169; GoTravel Jordan. All rights reserved.</span>
            <div class="footer__privacy mt-2">
                <a href="#" class="mr-3">Terms & Conditions</a>
                <a href="#">Privacy Policy</a>
            </div>
        </div>
    </footer>

    <a href="#" class="scrollup" id="scroll-up">
        <i class="bx bx-chevrons-up"></i>
    </a>

    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login to Go<i class="bx bxs-map"></i>JORDAN</h5> {{-- Added logo to modal title --}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="loginError" class="alert alert-danger" style="display: none;"></div>
                    <form id="loginForm"> {{-- Removed action and method as using AJAX --}}
                        @csrf
                        <div class="form-group">
                            <label for="login-email">Email address</label> {{-- Changed ID to avoid conflict --}}
                            <input type="email" name="email" class="form-control" id="login-email" placeholder="name@example.com" required>
                        </div>
                        <div class="form-group">
                            <label for="login-password">Password</label> {{-- Changed ID to avoid conflict --}}
                            <input type="password" name="password" class="form-control" id="login-password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block custom-modal-btn">Login</button> {{-- Added btn-block and custom class --}}
                    </form>
                </div>
                <div class="modal-footer justify-content-center"> {{-- Center footer content --}}
                    <p class="mb-0">Don't have an account? <a href="#" data-toggle="modal" data-target="#registerModal" data-dismiss="modal">Register here</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Register with Go<i class="bx bxs-map"></i>JORDAN</h5> {{-- Added logo to modal title --}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="registerForm" action="{{ route('touristregister.post') }}" method="POST"> {{-- Added form ID --}}
                        @csrf
                        <div class="form-group">
                            <label for="register-name">Name</label> {{-- Changed ID to avoid conflict --}}
                            <input type="text" name="name" class="form-control" id="register-name" placeholder="Tourist name" required>
                        </div>
                        <div class="form-group">
                            <label for="register-email">Email address</label> {{-- Changed ID to avoid conflict --}}
                            <input type="email" name="email" class="form-control" id="register-email" placeholder="name@example.com" required>
                        </div>
                        <div class="form-group">
                            <label for="register-phone">Phone</label> {{-- Changed ID to avoid conflict --}}
                            <input type="text" name="phone" class="form-control" id="register-phone" placeholder="+880-1000-000000" required>
                        </div>
                        <div class="form-group">
                            <label for="register-password">Password</label> {{-- Changed ID to avoid conflict --}}
                            <input type="password" name="password" class="form-control" id="register-password" required>
                        </div>
                         <div class="form-group">
                             <label for="register-password-confirm">Confirm Password</label> {{-- Added password confirmation --}}
                             <input type="password" name="password_confirmation" class="form-control" id="register-password-confirm" required>
                         </div>
                        <button type="submit" class="btn btn-primary btn-block custom-modal-btn">Register</button> {{-- Added btn-block and custom class --}}
                    </form>
                </div>
                <div class="modal-footer justify-content-center"> {{-- Center footer content --}}
                    <p class="mb-0">Already have an account? <a href="#" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Login here</a></p>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script> {{-- Added Popper.js --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="{{ asset('frontend/assets/libraries/scrollreveal.min.js') }}"></script>

    <script src="{{ asset('frontend/assets/libraries/swiper-bundle.min.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

     {{-- Allow specific pages to push custom scripts --}}
    @stack('script-alt')

    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '{{ route("touristlogin.post") }}',
                    data: $(this).serialize(),
                    success: function(response) {
                        if(response.success) {
                            window.location.href = response.redirect;
                        } else {
                            $('#loginError').text(response.message).show();
                        }
                    },
                    error: function(response) {
                        // Handle validation errors or other errors
                        if (response.status === 422) {
                             var errors = response.responseJSON.errors;
                             var errorMessage = '';
                             $.each(errors, function(key, value) {
                                 errorMessage += value[0] + '<br>';
                             });
                             $('#loginError').html(errorMessage).show();
                         } else {
                             $('#loginError').text('An error occurred. Please try again.').show();
                         }
                    }
                });
            });

            // Optional: Handle Register form submission with AJAX similarly if needed
            // $('#registerForm').on('submit', function(e) { ... });
        });
    </script>

</body>
</html>