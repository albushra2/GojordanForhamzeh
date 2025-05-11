<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- jQuery and Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    

    <!--=============== BOXICONS ===============-->
    <link
        href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
        rel="stylesheet"
    />

    <!--=============== SWIPER CSS ===============-->
    <link
        rel="stylesheet"
        href="{{ asset('frontend/assets/libraries/swiper-bundle.min.css') }}"
    />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
    @stack('style-alt')
    <title>@yield('title')</title>
</head>
<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="{{ route('homepage') }}" class="nav__logo">G<i class="bx bxs-map"></i> JORDAN</a>

            <div class="nav__menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="{{ route('homepage') }}" class="nav__link {{ request()->is('/') ? ' active-link' : '' }}">
                            <i class="bx bx-home-alt"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('travel_package.index') }}" class="nav__link {{ request()->is('travel-packages') || request()->is('travel-packages/*') ? ' active-link' : '' }}">
                            <i class="bx bx-building-house"></i>
                            <span>Package Travel</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('blogs.index') }}" class="nav__link {{ request()->is('blogs') || request()->is('blogs/*') ? ' active-link' : '' }}">
                            <i class="bx bx-award"></i>
                            <span>Blog</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('contact') }}" class="nav__link {{ request()->is('contact') ? ' active-link' : '' }}">
                            <i class="bx bx-phone"></i>
                            <span>Contact</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!--==================== MAIN ====================-->
    <main class="main">
        @yield('content')
    </main>


    <!--==================== FOOTER ====================-->
<footer class="footer section">
    <div class="footer__container container grid">
        <div>
            <a href="{{ route('homepage') }}" class="footer__logo">G<i class="bx bxs-map"></i>JORDAN</a>
            <p class="footer__description">
                Our vision is to help people discover <br />
                the most beautiful destinations in Jordan <br />
                with safety and ease.
            </p>
        </div>

        <div class="footer__content">
            <div>
                <h3 class="footer__title">About</h3>
                <ul class="footer__links">
                    <li><a href="#" class="footer__link">About Us</a></li>
                    <li><a href="#" class="footer__link">Features</a></li>
                    <li><a href="#" class="footer__link">News & Blog</a></li>
                </ul>
            </div>
            <div>
                <h3 class="footer__title">Company</h3>
                <ul class="footer__links">
                    <li><a href="#" class="footer__link">How We Work</a></li>
                    <li><a href="#" class="footer__link">Partnerships</a></li>
                    <li><a href="#" class="footer__link">Travel Safety</a></li>
                </ul>
            </div>
            <div>
                <h3 class="footer__title">Support</h3>
                <ul class="footer__links">
                    <li><a href="#" class="footer__link">FAQs</a></li>
                    <li><a href="#" class="footer__link">Support Center</a></li>
                    <li><a href="#" class="footer__link">Contact Us</a></li>
                </ul>
            </div>
            <div>
                <h3 class="footer__title">Follow Us</h3>
                <ul class="footer__social">
                    <a href="#" class="footer__social-link"><i class="bx bxl-facebook-circle"></i></a>
                    <a href="#" class="footer__social-link"><i class="bx bxl-instagram-alt"></i></a>
                    <a href="#" class="footer__social-link"><i class="bx bxl-pinterest"></i></a>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer__info container">
        <span class="footer__copy">&#169; GoTravel Jordan. All rights reserved.</span>
        <div class="footer__privacy">
            <a href="#">Terms & Conditions</a>
            <a href="#">Privacy Policy</a>
        </div>
    </div>
</footer>

    <!--========== SCROLL UP ==========-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="bx bx-chevrons-up"></i>
    </a>

    <!--=============== SCROLLREVEAL ===============-->
    <script src="{{ asset('frontend/assets/libraries/scrollreveal.min.js') }}"></script>

    <!--=============== SWIPER JS ===============-->
    <script src="{{ asset('frontend/assets/libraries/swiper-bundle.min.js') }}"></script>

    <!--=============== MAIN JS ===============-->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

     {{-- Allow specific pages to push custom scripts --}}
    @stack('script-alt')
<!--=============== AJAX LOGIN ===============-->
<script>
        $(document).ready(function() {
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
                    error: function(response) {
                        $('#loginError').text('An error occurred. Please try again.').show();
                    }
                });
            });
        });
    </script>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="loginError" class="alert alert-danger" style="display: none;"></div>
                    <form id="loginForm" action="{{ route('touristlogin.post') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <p>Don't have an account? <a href="#" data-toggle="modal" data-target="#registerModal" data-dismiss="modal">Register here</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('touristregister.post') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Tourist name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="+880-1000-000000" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
            <div class="modal-footer">
                <p>Already have an account? <a href="#" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Login here</a></p>
            </div>
        </div>
    </div>
</div>

</body>
</html>