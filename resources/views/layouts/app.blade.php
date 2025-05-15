<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | GoJordan Admin</title> {{-- Added app name to title --}}

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}"> {{-- Assuming you have Font Awesome CSS --}}
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}"> {{-- Assuming you have AdminLTE CSS --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        /* --- Global Styles and Variables --- */
        :root {
            /* Core Palette */
            --primary: #4a6cf7; /* A vibrant blue */
            --secondary: #667eea; /* A slightly lighter blue/purple */
            --success: #10b981; /* A strong green */
            --info: #3b82f6; /* A bright blue */
            --warning: #f59e0b; /* A warm orange */
            --danger: #ef4444; /* A red for errors/danger */
            --dark: #2c3e50; /* Dark text/elements */
            --light: #f8f9fa; /* Light backgrounds */
            --white: #ffffff; /* White */

            /* Theme Specific */
            --sidebar-bg-start: #2A2F4F; /* Dark start for sidebar gradient */
            --sidebar-bg-end: #917FB3; /* Purple end for sidebar gradient */
            --navbar-bg-start: var(--primary); /* Navbar gradient start */
            --navbar-bg-end: var(--secondary); /* Navbar gradient end */

            /* Sidebar Menu Colors (Mapping to main palette or new) */
            --sidebar-menu-cyan: #5CDB95; /* Keeping distinct sidebar colors for vibrancy */
            --sidebar-menu-purple: #8A4FFF;
            --sidebar-menu-pink: #FF6B6B;
            --sidebar-menu-orange: #FF9F43;
            --sidebar-menu-teal: #2EC4B6;

            --sidebar-text-color: rgba(255, 255, 255, 0.9);
            --sidebar-hover-bg: rgba(255, 255, 255, 0.1);
            --sidebar-active-bg: rgba(255, 255, 255, 0.15); /* Slightly more prominent active state */
            --sidebar-indicator-color: var(--white);
            --sidebar-submenu-link-color: rgba(255, 255, 255, 0.8);
            --sidebar-dot-indicator-color: var(--white); /* Dot color can match menu item color */
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--light); /* Use light variable */
            color: var(--dark); /* Set default text color */
        }

        /* --- AdminLTE Overrides and Layout Enhancements --- */

        /* Ensure fixed sidebar has correct positioning and width */
        .layout-fixed .main-sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1037; /* AdminLTE default z-index for sidebar */
            overflow-y: auto;
            width: 280px; /* Match navigation width */
            box-shadow: 5px 0 15px rgba(0,0,0,0.1);
            background: linear-gradient(135deg, var(--sidebar-bg-start) 0%, var(--sidebar-bg-end) 100%); /* Use variables */
        }

        /* Navbar Styling */
        .main-header.navbar {
            background: linear-gradient(45deg, var(--navbar-bg-start), var(--navbar-bg-end)); /* Use variables */
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            border: none;
            color: var(--white); /* Set navbar text color */
            /* AdminLTE adds margin-left, we'll handle transitions below */
        }

        .main-header .nav-link {
             color: rgba(255,255,255,0.9) !important; /* Use sidebar text color variable */
             font-weight: 500;
             transition: color 0.3s ease;
        }

        .main-header .nav-link:hover {
            color: var(--white) !important; /* White on hover */
        }

         /* Specific selector for navbar links to ensure color */
        .main-header .navbar-nav .nav-item .nav-link {
            color: rgba(255,255,255,0.9) !important;
        }

        .main-header .navbar-nav .nav-item .nav-link:hover {
            color: white !important;
        }


        /* Brand Link (Logo Area) Styling */
        .brand-link {
            border-bottom: 1px solid rgba(255,255,255,0.1);
            background: transparent; /* Remove background here, gradient is on the sidebar */
            color: var(--white);
            display: flex; /* Ensure flex for alignment */
            align-items: center;
            padding: 1rem; /* Add padding */
        }

        .brand-text {
            font-weight: bold;
            letter-spacing: 1px;
        }

        /* Content Wrapper Styling */
        .content-wrapper {
            background: var(--light); /* Use light variable */
            padding: 1.5rem; /* Keep existing padding */
            min-height: calc(100vh - (3.5rem + 4rem)); /* Adjust min-height if needed, 3.5rem is approx navbar height, 4rem is approx footer height */
            margin-left: 280px; /* Match sidebar width */
            transition: margin-left 0.3s ease-in-out; /* Smooth transition for sidebar collapse */
        }

        /* Main Footer Styling */
        .main-footer {
            background: var(--white); /* Use white variable */
            border-top: 1px solid #e2e8f0; /* Keep border color */
            padding: 1rem 1.5rem;
            color: var(--dark); /* Use dark text color */
            margin-left: 280px; /* Match sidebar width */
            transition: margin-left 0.3s ease-in-out; /* Smooth transition for sidebar collapse */
        }

        /* Dropdown Menu Styling */
        .dropdown-menu {
            border-radius: 0.75rem;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            border: 1px solid #e2e8f0;
            padding: 0.5rem 0; /* Adjusted padding */
        }

        .dropdown-item {
            padding: 0.75rem 1.5rem; /* Increased padding */
            font-size: 0.95rem; /* Slightly larger font */
            border-radius: 0.5rem; /* Rounded corners */
            transition: all 0.2s;
            color: var(--dark); /* Ensure dark text color */
        }

        .dropdown-item:hover {
            background: var(--light); /* Use light variable */
            color: var(--dark); /* Ensure dark text color on hover */
        }

        .dropdown-divider {
            margin: 0.5rem 0; /* Adjusted margin */
        }


        /* Alert/Message Styling */
        .alert {
            border-radius: 0.75rem;
            border: none;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            margin-bottom: 1.5rem; /* Add some bottom margin */
            padding: 1rem 1.5rem; /* Adjust padding */
            opacity: 1; /* Ensure visibility */
            transition: opacity 0.3s ease;
        }

        .alert-dismissible .close {
            font-size: 1.2rem; /* Adjust close button size */
            padding: 1rem 1.5rem; /* Match alert padding */
        }

        .alert ul {
            margin-bottom: 0; /* Remove default list margin */
            padding-left: 1rem; /* Add some left padding for list items */
        }

        /* Button Styling (from dashboard, moved to base layout for consistency) */
        .btn-primary {
            background: var(--primary) !important; /* Use variable and !important to override AdminLTE */
            border: none !important; /* Remove border and !important */
            padding: 0.6rem 1.5rem; /* Adjusted padding */
            border-radius: 0.75rem;
            transition: all 0.3s ease-in-out; /* Smooth transition */
            color: var(--white) !important; /* Ensure white text */
            font-weight: 500; /* Semi-bold font */
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(74,108,247,0.3); /* Keep original shadow */
            opacity: 0.9; /* Slight opacity change on hover */
        }

         .btn-outline-primary {
            color: var(--primary) !important;
            border-color: var(--primary) !important;
            transition: all 0.3s ease-in-out;
            border-radius: 0.75rem;
            padding: 0.6rem 1.5rem;
            font-weight: 500;
         }

         .btn-outline-primary:hover {
             background-color: var(--primary) !important;
             color: var(--white) !important;
             box-shadow: 0 3px 10px rgba(74,108,247,0.2);
             transform: translateY(-1px);
         }


        /* Specific AdminLTE adjustments for collapsed sidebar */
        .sidebar-collapse .content-wrapper,
        .sidebar-collapse .main-footer {
            margin-left: 4.6rem !important; /* Adjust margin for collapsed sidebar */
        }

        .sidebar-collapse .main-header .navbar {
             margin-left: 4.6rem !important; /* Adjust navbar margin for collapsed sidebar */
        }

        /* Custom gradient text for brand logo (defined here for access to variables) */
        .brand-logo .text-gradient {
            background: linear-gradient(45deg, var(--sidebar-bg-start), var(--sidebar-bg-end)); /* Use sidebar gradient colors */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            /* Fallback */
            color: var(--white);
        }

         /* Ensure text colors use defined variables consistently */
        .text-primary { color: var(--primary) !important; }
        .text-success { color: var(--success) !important; }
        .text-info { color: var(--info) !important; }
        .text-warning { color: var(--warning) !important; }
        .text-danger { color: var(--danger) !important; }
        .text-muted { color: rgba(44, 62, 80, 0.7) !important; } /* Slightly darker muted text */
        .text-dark { color: var(--dark) !important; }


    </style>
    @yield('styles') {{-- Allow child views to add custom styles --}}
</head>
<body class="hold-transition sidebar-mini layout-fixed"> {{-- Added layout-fixed class --}}
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            {{-- Add other left navbar items if needed --}}
         </ul>

        <ul class="navbar-nav ml-auto">
            {{-- Add other right navbar items if needed --}}
            <li class="nav-item dropdown">
                <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fas fa-user-circle mr-2"></i>
                    <span class="mr-1">{{ Auth::user()->name }}</span>
                    <i class="fas fa-chevron-down" style="font-size: 0.8rem;"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    {{-- Ensure this route exists: Route::get('/admin/profile', [Admin\ProfileController::class, 'show'])->name('admin.profile.show'); --}}
                    <a href="{{ route('admin.profile.show') }}" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i>
                        My Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="dropdown-item"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        {{-- The brand link content is now part of navigation.blade.php --}}
        @include('layouts.navigation')
    </aside>
    <div class="content-wrapper">
        {{-- Display Validation Errors --}}
        @if(count($errors) > 0 )
        <div class="content-header mb-0 pb-0"> {{-- Use content-header for consistent spacing --}}
            <div class="container-fluid">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="alert-heading">Validation Errors:</h5> {{-- Added heading --}}
                    <ul class="p-0 m-0" style="list-style: none;">
                        @foreach($errors->all() as $error)
                        <li><i class="fas fa-exclamation-circle mr-2"></i>{{$error}}</li> {{-- Added icon --}}
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif
        {{-- Display Session Messages --}}
        @if(session()->has('message'))
            <div class="content-header mb-0 pb-0"> {{-- Use content-header for consistent spacing --}}
                <div class="container-fluid">
                    {{-- Use alert-type from session, default to info if not set --}}
                    <div class="mb-0 alert alert-{{ session()->get('alert-type', 'info') }} alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('message') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        {{-- Main Content Section --}}
        <section class="content"> {{-- Wrap content in a section.content --}}
            @yield('content')
        </section>
        </div>
    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
            v1.0.0
        </div>
        <strong>Copyright &copy; {{ date('Y') }} <a href="#" class="text-primary">GoJordan</a>.</strong> All rights reserved.
    </footer>
    </div>
{{-- AdminLTE requires jQuery, Bootstrap, and AdminLTE JS in this order --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script> {{-- Bootstrap 4 Bundle --}}
<script src="{{ asset('js/adminlte.min.js') }}"></script> {{-- Assuming you have AdminLTE JS --}}
{{-- @vite('resources/js/app.js') --}} {{-- Keep if you need Vite for other JS --}}

@yield('scripts') {{-- Allow child views to add custom scripts --}}
</body>
</html>
