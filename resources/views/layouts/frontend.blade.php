<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    {{-- Consolidate Icon Libraries - Choose the ones you actually use --}}
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> {{-- Using FA6 --}}


    {{-- Include Swiper CSS if you don't use the CDN link in your main view --}}
    <!-- <link rel="stylesheet" href="{{ asset('frontend/assets/libraries/swiper-bundle.min.css') }}"/> -->

    {{-- Using Poppins for headings/nav and Roboto (implicitly via Bootstrap) for body --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">


    {{-- Your main style.css - Load after Bootstrap and fonts --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />

    {{-- Iconic Navbar Styling - Highly Recommended to move this to style.css or a dedicated file --}}
    <style>
        /* --- Define a Jordan-Inspired Color Palette --- */
        :root {
            --color-primary: #BC6C25; /* Burnt Orange/Brown (Stone/Sand) */
            --color-secondary: #2A9D8F; /* Teal/Blue-Green (Water/Oasis) */
            --color-accent: #E9C46A; /* Sandy Yellow/Gold (Ancient/Sunlight) */
            --color-dark: #212529; /* Dark Text */
            --color-light: #f8f9fa; /* Light Background/Text */
            --color-white: #fff; /* Pure White */

            --navbar-height: 90px; /* Taller navbar */
            --navbar-height-scrolled: 70px; /* Still substantial when scrolled */
            --navbar-transition-duration: 0.4s; /* Smoother transition */
        }

        /* --- Apply Custom Fonts --- */
        body {
            font-family: 'Roboto', sans-serif;
            color: var(--color-dark);
        }
        h1, h2, h3, h4, h5, h6,
        .nav__link, .nav__logo {
             font-family: 'Poppins', sans-serif;
        }


        /* --- Iconic Navbar Styling --- */
        .header {
            width: 100%;
            position: fixed; /* Makes the header stick to the top */
            top: 0;
            left: 0;
            z-index: 1030; /* Ensure it's above other content */
            transition: background-color var(--navbar-transition-duration), height var(--navbar-transition-duration), box-shadow var(--navbar-transition-duration);
            height: var(--navbar-height); /* Initial height */
            display: flex; /* Use flexbox for vertical centering */
            align-items: center; /* Vertically center content */
            background-color: transparent; /* Start transparent */
        }

        /* Style when scrolled */
        .header.scrolled {
            background-color: rgba(255, 255, 255, 0.95); /* Near-white background */
            height: var(--navbar-height-scrolled); /* Smaller height */
            box-shadow: rgba(0, 0, 0, 0.15) 0px 4px 15px; /* More noticeable shadow */
            backdrop-filter: blur(8px); /* Stronger blur effect */
            -webkit-backdrop-filter: blur(8px); /* Safari support */
        }

         .header.scrolled .nav__logo {
             color: var(--color-dark); /* Change logo color when scrolled */
         }
        .header.scrolled .nav__logo i {
            color: var(--color-primary); /* Keep icon color */
        }
         .header.scrolled .nav__link {
             color: var(--color-dark); /* Change link color when scrolled */
             font-weight: 500; /* Standard weight when not active */
         }
         .header.scrolled .nav__link.active-link {
             color: var(--color-primary); /* Active link color remains primary */
             font-weight: 600; /* Bolder when active */
         }
         .header.scrolled .nav__link::after {
              background-color: var(--color-primary); /* Underline color */
         }
         .header.scrolled .navbar-toggler-icon {
              background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(33, 37, 41, 0.8)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3csvg%3e"); /* Darker hamburger icon */
         }
          .header.scrolled .navbar-nav .btn {
               /* Adjust button styles if needed when scrolled */
          }


        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100%; /* Make nav take full header height */
            padding: 0 15px; /* Add some horizontal padding */
        }

        .nav__logo {
            color: var(--color-white); /* Initial color for logo */
            font-size: 2rem; /* Larger logo size */
            font-weight: 700;
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: color var(--navbar-transition-duration);
            letter-spacing: -1px; /* Tighten logo letter spacing */
        }

        .nav__logo i {
            font-size: 2.2rem; /* Adjust icon size relative to text */
            margin-right: 8px; /* More space */
            color: var(--color-primary); /* Primary color for the icon */
            transition: color var(--navbar-transition-duration);
        }
         .nav__logo:hover {
             text-decoration: none;
             color: var(--color-light); /* Maintain hover color */
         }


        .nav__menu {
            /* Bootstrap handles display toggle with collapse */
        }

        .nav__list {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            align-items: center;
        }

        .nav__item {
            margin: 0 20px; /* More space between items */
        }
         .nav__item:last-child {
             margin-right: 0; /* Remove margin from last item */
         }


        .nav__link {
            color: var(--color-white); /* Initial link color */
            font-size: 1.05rem; /* Slightly larger links */
            font-weight: 500;
            text-decoration: none;
            padding: 10px 0;
            position: relative;
            transition: color var(--navbar-transition-duration), transform 0.2s ease-out; /* Add subtle transform transition */
            display: inline-block; /* Needed for transform */
        }

        .nav__link i {
             margin-right: 6px; /* Space between icon and text */
             font-size: 1.1rem; /* Adjust icon size */
             position: relative; /* Align icons better */
             top: -1px;
        }

        .nav__link:hover {
            color: var(--color-primary); /* Change color on hover */
            text-decoration: none;
            transform: translateY(-2px); /* Subtle lift effect */
        }

        /* Iconic Active link indicator */
        .nav__link.active-link {
             color: var(--color-primary); /* Active link color */
             font-weight: 600; /* Bolder */
        }
         .nav__link.active-link::after {
             content: '';
             position: absolute;
             left: 0;
             bottom: 0;
             width: 100%;
             height: 4px; /* Thicker indicator */
             background-color: var(--color-accent); /* Use accent color for indicator */
             border-radius: 2px;
             opacity: 1;
             transform: scaleX(1); /* Ensure full width */
             transition: transform var(--navbar-transition-duration) ease-out; /* Animate underline */
         }
         .nav__link::after {
             content: '';
             position: absolute;
             left: 0;
             bottom: 0;
             width: 100%;
             height: 4px;
             background-color: transparent; /* Hidden when not active */
             border-radius: 2px;
             opacity: 0;
             transform: scaleX(0); /* Hidden initially */
             transition: transform var(--navbar-transition-duration) ease-out, background-color var(--navbar-transition-duration);
         }
         .nav__link:hover::after {
             background-color: var(--color-primary); /* Primary color on hover */
             transform: scaleX(0.5); /* Partial swipe effect on hover */
             opacity: 0.6;
         }


        /* --- Bootstrap Toggler Styling --- */
        .navbar-toggler {
            border: none;
            padding: 5px; /* Add some padding back */
            transition: transform 0.3s ease;
             /* Style for initial transparent header */
             filter: invert(1); /* Invert color for visibility on dark background */
        }
         .navbar-toggler:focus {
             box-shadow: none;
         }
         .navbar-toggler:hover {
             transform: scale(1.1);
         }
         .navbar-toggler-icon {
              /* Bootstrap 4 default is dark lines, filter: invert(1) makes them white */
              width: 28px;
              height: 28px;
         }


        /* --- Auth Buttons Styling --- */
        .navbar-nav .btn {
            padding: 8px 20px; /* Adjust button padding */
            border-radius: 50px; /* Pill shape */
            font-weight: 500;
            transition: all var(--navbar-transition-duration) ease;
            margin-left: 10px; /* Space between buttons and last link */
        }

        .navbar-nav .btn-outline-primary {
            color: var(--color-white); /* White text initially */
            border-color: var(--color-white); /* White border initially */
        }
         .navbar-nav .btn-outline-primary:hover {
             background-color: var(--color-primary);
             border-color: var(--color-primary);
             color: var(--color-white);
             transform: translateY(-2px);
         }

        .navbar-nav .btn-primary {
            background-color: var(--color-primary);
            border-color: var(--color-primary);
            color: var(--color-white);
        }
         .navbar-nav .btn-primary:hover {
             background-color: var(--color-secondary);
             border-color: var(--color-secondary);
             transform: translateY(-2px);
         }

        /* Style buttons when scrolled */
         .header.scrolled .navbar-nav .btn-outline-primary {
             color: var(--color-primary); /* Primary text when scrolled */
             border-color: var(--color-primary); /* Primary border when scrolled */
         }
         .header.scrolled .navbar-nav .btn-primary {
             background-color: var(--color-secondary); /* Secondary color when scrolled */
             border-color: var(--color-secondary); /* Secondary border when scrolled */
             color: var(--color-white);
         }


        /* --- Responsive Adjustments --- */
        @media (max-width: 991.98px) { /* Below large breakpoint */
            .header {
                 height: var(--navbar-height); /* Keep standard height on mobile */
                 background-color: var(--color-white); /* Solid background on mobile */
                 box-shadow: rgba(0, 0, 0, 0.1) 0px 2px 10px;
                 filter: none; /* Remove filter on mobile header */
                 backdrop-filter: none; /* Remove blur on mobile */
                 -webkit-backdrop-filter: none;
            }
             .header .nav__logo {
                 color: var(--color-dark); /* Dark logo on white background */
             }
             .header .nav__link {
                 color: var(--color-dark); /* Dark links on white background */
             }
              .header .nav__link.active-link {
                 color: var(--color-primary); /* Active link remains primary */
              }
             .header .navbar-toggler {
                 filter: none; /* Remove filter from toggler button */
             }
              .header .navbar-toggler-icon {
                 background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(33, 37, 41, 0.8)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3csvg%3e"); /* Darker hamburger icon */
              }


            .nav__menu {
                position: fixed; /* Make menu full screen or side panel */
                top: var(--navbar-height); /* Position below header */
                left: -100%; /* Hide off-screen initially */
                width: 100%; /* Full width */
                height: calc(100vh - var(--navbar-height)); /* Full viewport height minus header */
                background-color: var(--color-white); /* White background for mobile menu */
                box-shadow: rgba(0, 0, 0, 0.2) 0px 5px 15px;
                transition: left var(--navbar-transition-duration) ease;
                overflow-y: auto; /* Add scroll if menu is long */
            }

            .nav__menu.show { /* 'show' class is added by Bootstrap JS when toggled */
                left: 0; /* Slide in from left */
            }

            .nav__list {
                flex-direction: column; /* Stack items vertically */
                padding: 30px 20px; /* Add more padding */
                text-align: center; /* Center text */
            }

            .nav__item {
                margin: 12px 0; /* Space out vertical items */
            }

            .nav__link {
                font-size: 1.3rem; /* Larger links in mobile menu */
                 padding: 10px 0;
                 border-bottom: none;
                 transform: none; /* Remove lift effect */
            }
             .nav__link.active-link::after,
             .nav__link:hover::after,
             .nav__link::after {
                 content: none; /* Remove underline/indicator on mobile */
             }

             /* Add a different active indicator for mobile if desired */
             .nav__link.active-link {
                  color: var(--color-primary);
                  font-weight: 700; /* Extra bold for active */
                  /* You could add a left border or background color here */
                  /* border-left: 4px solid var(--color-primary); padding-left: 16px; */
             }

             /* Button styling in mobile menu */
             .navbar-nav .btn {
                  margin-left: 0; /* Remove left margin */
                  margin-top: 15px; /* Add space above buttons */
                  width: 80%; /* Make buttons wider */
                  max-width: 250px; /* Max width for buttons */
             }
              .navbar-nav .btn-outline-primary {
                  color: var(--color-primary);
                  border-color: var(--color-primary);
             }


        }

    </style>

    {{-- Allow specific pages to push custom styles --}}
    @stack('style-alt')

    <title>@yield('title')</title>
</head>
<body>
    {{-- Added 'navbar-expand-lg' for Bootstrap collapse --}}
    <header class="header" id="header">
        {{-- Using Bootstrap's 'navbar' structure with custom classes --}}
        {{-- Removed initial 'navbar-dark'/'navbar-light' as background is transparent --}}
        <nav class="navbar navbar-expand-lg nav container">
            <a href="{{ route('homepage') }}" class="nav__logo navbar-brand">
                G<i class='bx bxs-map'></i> JORDAN {{-- Used Boxicons --}}
            </a>

            {{-- Bootstrap 4 Toggler Button --}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Bootstrap 4 collapse wrapper --}}
            <div class="collapse navbar-collapse nav__menu" id="navbarNav">
                {{-- ml-auto pushes menu to the right --}}
                <ul class="nav__list navbar-nav ml-auto">
                    <li class="nav__item nav-item">
                        <a href="{{ route('homepage') }}" class="nav__link nav-link {{ request()->is('/') ? ' active-link' : '' }}">
                             <i class="ri-home-2-line"></i> {{-- Example using RemixIcon --}}
                             <span>Home</span>
                        </a>
                    </li>
                    <li class="nav__item nav-item">
                        <a href="{{ route('travel_package.index') }}" class="nav__link nav-link {{ request()->is('travel-packages') || request()->is('travel-packages/*') ? ' active-link' : '' }}">
                            <i class="ri-suitcase-line"></i> {{-- Example using RemixIcon --}}
                            <span>Package Travel</span>
                        </a>
                    </li>
                    <li class="nav__item nav-item">
                        <a href="{{ route('blogs.index') }}" class="nav__link nav-link {{ request()->is('blogs') || request()->is('blogs/*') ? ' active-link' : '' }}">
                            <i class="ri-article-line"></i> {{-- Example using RemixIcon --}}
                            <span>Blog</span>
                        </a>
                    </li>
                    <li class="nav__item nav-item">
                        <a href="{{ route('contact') }}" class="nav__link nav-link {{ request()->is('contact') ? ' active-link' : '' }}">
                            <i class="ri-mail-line"></i> {{-- Example using RemixIcon --}}
                            <span>Contact</span>
                        </a>
                    </li>
                     {{-- Login/Register/Profile based on auth status --}}
                     @guest('user') {{-- Specify the guard --}}
    <li class="nav__item nav-item">
        <a href="{{ route('tourist_user.login') }}" class="btn btn-outline-primary">Login</a>
    </li>
@else
    <li class="nav__item nav-item dropdown">
        <a class="nav__link nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fas fa-user me-1"></i> {{ Auth::guard('user')->user()->name }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('touristprofile') }}">Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('touristlogout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('touristlogout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
@endguest
                </ul>
            </div>
        </nav>
    </header>

    {{-- Added margin-top to main to prevent content from being hidden by fixed header --}}
    <main class="main" style="margin-top: var(--navbar-height);">
        @yield('content')
    </main>


    {{-- Footer code remains the same as provided --}}
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

    <a href="#" class="scrollup" id="scroll-up">
        <i class="bx bx-chevrons-up"></i>
    </a>

    {{-- jQuery and Bootstrap JS (Make sure these are correct for Bootstrap 4.5.2) --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="{{ asset('frontend/assets/libraries/scrollreveal.min.js') }}"></script>

    {{-- Include Swiper JS if you don't use the CDN link in your main view --}}
    <script src="{{ asset('frontend/assets/libraries/swiper-bundle.min.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

     {{-- Script to add 'scrolled' class to header on scroll --}}
     <script>
         window.addEventListener('scroll', function() {
             const header = document.getElementById('header');
             // Check if header element exists before adding/removing class
             if (header) {
                 if (window.scrollY > 60) { // Add 'scrolled' class after scrolling e.g., 60px
                     header.classList.add('scrolled');
                 } else {
                     header.classList.remove('scrolled');
                 }
             }
         });

          // Optional: Close mobile menu when a link is clicked
         document.querySelectorAll('.nav__menu .nav-link').forEach(link => { // Target links within the collapsible menu
             link.addEventListener('click', () => {
                 const navbarCollapse = document.getElementById('navbarNav');
                 // Check if the menu is currently expanded (Bootstrap adds 'show' class)
                 if (navbarCollapse && navbarCollapse.classList.contains('show')) { // Check if element exists
                     // Trigger Bootstrap's collapse functionality using jQuery
                     $('#navbarNav').collapse('hide');
                 }
             });
         });

         // Ensure Bootstrap dropdowns work (requires Bootstrap JS and Popper.js implicitly included in 4.5.2 bundle)
         // No extra JS needed here if using standard Bootstrap dropdowns.
     </script>

     {{-- Allow specific pages to push custom scripts --}}
     @stack('script-alt')

     {{-- Keep your modal HTML and the AJAX script if they are needed globally --}}


 {{-- AJAX scripts were already present, keeping them --}}
 <script>
         $(document).ready(function() {
             // Add basic client-side validation check before AJAX
             $('#loginForm, #registerForm').on('submit', function(e) {
                 const form = this;
                  // Clear previous validation states
                  $(form).find('.form-control').removeClass('is-invalid is-valid');
                  $(form).find('.invalid-feedback').text('');


                 if (!form.checkValidity()) {
                     e.preventDefault(); // Prevent default HTML5 validation popup
                     e.stopPropagation();
                      $(form).addClass('was-validated'); // Add Bootstrap validation classes

                      // Specific check for password confirmation in register form
                      if (form.id === 'registerForm') {
                          const password = $('#registerPassword').val();
                          const confirmPassword = $('#registerPasswordConfirm').val();
                          if (password !== confirmPassword) {
                              $('#registerPasswordConfirm').addClass('is-invalid').siblings('.invalid-feedback').text('Passwords do not match.');
                          } else {
                               $('#registerPasswordConfirm').removeClass('is-invalid');
                          }
                          // Re-check validity after password confirm check
                          if (!form.checkValidity() || password !== confirmPassword) {
                               return; // Stop if form is still invalid
                          }
                      } else {
                           return; // Stop if login form is invalid
                      }
                 }

                 // If reaches here, form is client-side valid, proceed with AJAX

                 const submitBtn = $(this).find('button[type="submit"]'); // Get submit button
                 const originalText = submitBtn.html();
                 const errorDiv = $(this).closest('.modal-body').find('.alert-danger'); // Get error div within modal body

                 submitBtn.prop('disabled', true).html(
                     `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="ms-2">` + (form.id === 'loginForm' ? 'Authenticating...' : 'Creating Account...') + `</span>`
                 );
                 errorDiv.addClass('d-none').text(''); // Hide previous errors

                 $.ajax({
                     type: 'POST',
                     url: $(form).attr('action'),
                     data: $(form).serialize(),
                     success: function(response) {
                         if (response.success) {
                             errorDiv.addClass('d-none');
                             submitBtn.removeClass('btn-primary').addClass('btn-success').html('<i class="bx bx-check-circle me-1"></i> Success!');
                             $(form).removeClass('was-validated'); // Reset validation styles on success

                             if (form.id === 'loginForm') {
                                 setTimeout(() => {
                                     window.location.href = response.redirect || '/';
                                 }, 1200);
                             } else { // Register form
                                 setTimeout(() => {
                                     $('#registerModal').modal('hide');
                                     // Clear register form fields after successful registration
                                     form.reset();
                                     // Show success message or redirect to login
                                     // For now, just showing login modal
                                     $('#loginModal').modal('show');
                                 }, 1500);
                             }
                         } else {
                              // Server-side validation errors or general message
                             if (response.errors) {
                                 // Loop through errors and display next to fields
                                 for (const field in response.errors) {
                                      if (response.errors.hasOwnProperty(field)) {
                                         const fieldInput = $(form).find('[name="' + field + '"]');
                                         fieldInput.addClass('is-invalid').siblings('.invalid-feedback').text(response.errors[field][0]);
                                         fieldErrorMessages.push(errors[field][0]); // Collect messages
                                      }
                                 }
                                  // Show combined field errors in the main error div or rely on inline
                                  errorMessage = fieldErrorMessages.join(' '); // Combine validation messages
                                  errorDiv.addClass('d-none'); // Hide main error if inline errors are sufficient
                                  $(form).addClass('was-validated'); // Keep validation state to show inline errors
                             } else {
                                 // General error message
                                 errorDiv.text(response.message || 'An error occurred. Please try again.').removeClass('d-none');
                             }

                             submitBtn.html(originalText).prop('disabled', false);
                              $(form).addClass('was-validated'); // Keep validation state on error
                         }
                     },
                     error: function(xhr) {
                           $(form).removeClass('was-validated'); // Remove client-side validation on server error
                           $(form).find('.form-control').removeClass('is-invalid is-valid'); // Clear all field validation states

                         let errorMessage = 'An error occurred. Please try again.';
                         if (xhr.responseJSON && xhr.responseJSON.message) {
                             errorMessage = xhr.responseJSON.message; // General error message from server
                         } else if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                             // Validation errors from Laravel
                             const errors = xhr.responseJSON.errors;
                             let fieldErrorMessages = [];
                              for (const field in errors) {
                                   if (errors.hasOwnProperty(field)) {
                                      const fieldInput = $(form).find('[name="' + field + '"]');
                                      fieldInput.addClass('is-invalid').siblings('.invalid-feedback').text(errors[field][0]);
                                      fieldErrorMessages.push(errors[field][0]); // Collect messages
                                   }
                              }
                              // Show combined field errors in the main error div or rely on inline
                              errorMessage = fieldErrorMessages.join(' '); // Combine validation messages
                              errorDiv.addClass('d-none'); // Hide main error if inline errors are sufficient
                              $(form).addClass('was-validated'); // Keep validation state to show inline errors
                         } else if (xhr.status === 419) {
                              errorMessage = 'Page expired. Please refresh.'; // CSRF token mismatch
                         }


                         if (errorDiv.hasClass('d-none')) { // Only show main error if no inline errors were set
                              errorDiv.text(errorMessage).removeClass('d-none');
                         }


                         submitBtn.html(originalText).prop('disabled', false);
                     }
                 });

                 return false; // Prevent default form submission
             });
         });
     </script>
</body>
</html>