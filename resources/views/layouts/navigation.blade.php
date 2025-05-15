{{-- The <aside> tag is in app.blade.php, this file provides its content --}}

    {{-- Moved from app.blade.php to be part of the sidebar content --}}
    <a href="{{ route('admin.dashboard') }}" class="brand-link text-center"> {{-- Link to dashboard --}}
        <div class="brand-logo animate__animated animate__fadeIn">
            <div class="logo-inner bg-white p-2 rounded-circle shadow-lg" style="width: 60px; height: 60px; margin: 0 auto 10px;">
                {{-- Using Boxicon for the map icon --}}
                <i class="bx bxs-map text-gradient" style="font-size: 2rem;"></i>
            </div>
            <h3 class="mb-0 text-white font-weight-bold" style="letter-spacing: 1.5px; text-shadow: 0 2px 4px rgba(0,0,0,0.2);">
                GO JORDAN
                <small class="d-block mt-1" style="font-size: 0.7em; color: rgba(255, 255, 255, 0.7);">Admin Portal</small>
            </h3>
        </div>
    </a>

    <div class="sidebar">
        {{-- You can add a user panel here if desired --}}
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Auth::user()->avatar ? asset('storage/'.Auth::user()->avatar) : asset('images/default-avatar.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div> --}}

        <nav class="mt-3 px-3"> {{-- Added horizontal padding --}}
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- Add icons to the links using the .nav-icon class --}}

                <li class="nav-item mb-2">
                    {{-- Use {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} for active state --}}
                    <a href="{{ route('admin.dashboard') }}" class="nav-link menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <div class="icon-wrapper bg-cyan"> {{-- Use specific color class --}}
                            <i class="nav-icon fas fa-th"></i> {{-- Added nav-icon class --}}
                        </div>
                        <p class="menu-text ms-3">Dashboard</p> {{-- Added margin-start --}}
                        <div class="hover-indicator"></div>
                        {{-- <span class="badge pulse-badge">New</span> --}} {{-- Keep if needed --}}
                    </a>
                </li>

                <li class="nav-item mb-2">
                     {{-- Use {{ request()->routeIs('admin.users.*') ? 'active' : '' }} for active state --}}
                    <a href="{{ route('admin.users.index') }}" class="nav-link menu-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <div class="icon-wrapper bg-purple"> {{-- Use specific color class --}}
                            <i class="nav-icon fas fa-users-cog"></i> {{-- Added nav-icon class --}}
                        </div>
                         <p class="menu-text ms-3">Users Management</p> {{-- Added margin-start --}}
                        <div class="hover-indicator"></div>
                    </a>
                </li>

                <li class="nav-item mb-2">
                     {{-- Use {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }} for active state --}}
                    <a href="{{ route('admin.bookings.index') }}" class="nav-link menu-item {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">
                        <div class="icon-wrapper bg-pink"> {{-- Use specific color class --}}
                            <i class="nav-icon fas fa-calendar-check"></i> {{-- Added nav-icon class --}}
                        </div>
                         <p class="menu-text ms-3">Bookings</p> {{-- Added margin-start --}}
                        <div class="hover-indicator"></div>
                    </a>
                </li>

                <li class="nav-item mb-2">
                     {{-- Use {{ request()->routeIs('admin.travel_packages.*') ? 'active' : '' }} for active state --}}
                    <a href="{{ route('admin.travel_packages.index') }}" class="nav-link menu-item {{ request()->routeIs('admin.travel_packages.*') ? 'active' : '' }}">
                        <div class="icon-wrapper bg-orange"> {{-- Use specific color class --}}
                            <i class="nav-icon fas fa-suitcase-rolling"></i> {{-- Added nav-icon class --}}
                        </div>
                         <p class="menu-text ms-3">Travel Packages</p> {{-- Added margin-start --}}
                        <div class="hover-indicator"></div>
                    </a>
                </li>

                {{-- Use {{ request()->routeIs(['admin.categories.*', 'admin.blogs.*']) ? 'menu-open' : '' }} for open state --}}
                <li class="nav-item has-treeview mb-2 {{ request()->routeIs(['admin.categories.*', 'admin.blogs.*']) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link menu-item">
                        <div class="icon-wrapper bg-teal"> {{-- Use specific color class --}}
                            <i class="nav-icon fas fa-blog"></i> {{-- Added nav-icon class --}}
                        </div>
                         <p class="menu-text ms-3">
                             Content Management
                             <i class="right fas fa-angle-left dropdown-arrow"></i> {{-- AdminLTE default arrow --}}
                         </p>
                        <div class="hover-indicator"></div>
                    </a>
                    <ul class="nav nav-treeview sub-menu"> {{-- AdminLTE sub-menu class --}}
                        <li class="nav-item">
                             {{-- Use {{ request()->routeIs('admin.categories.*') ? 'active' : '' }} for active state --}}
                            <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                                <div class="dot-indicator bg-pink"></div> {{-- Use specific color class --}}
                                <p>Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                             {{-- Use {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }} for active state --}}
                            <a href="{{ route('admin.blogs.index') }}" class="nav-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                                <div class="dot-indicator bg-cyan"></div> {{-- Use specific color class --}}
                                <p>Blog Posts</p>
                            </a>
                        </li>
                    </ul>
                </li>

                 {{-- Add other menu items here --}}

                 {{-- <li class="nav-item mt-auto"> --}} {{-- Use mt-auto to push to bottom --}}
                 {{--    <a href="{{ route('admin.profile.show') }}" class="nav-link menu-item"> --}}
                 {{--        <div class="icon-wrapper bg-secondary"> --}}
                 {{--            <i class="nav-icon fas fa-user"></i> --}}
                 {{--        </div> --}}
                 {{--        <p class="menu-text ms-3">My Profile</p> --}}
                 {{--        <div class="hover-indicator"></div> --}}
                 {{--    </a> --}}
                 {{-- </li> --}}

            </ul>
        </nav>
      

    </div>
    <style>
    /* --- Styles specific to the sidebar navigation --- */

    /* The .sidebar class itself gets the gradient background from layout.app */

    /* Brand Section Styling */
    .sidebar-brand {
        padding: 1.5rem 1rem; /* Adjusted padding */
        border-bottom: 1px solid rgba(255, 255, 255, 0.1); /* Add a subtle separator */
        display: block; /* Ensure it takes full width */
    }

    .brand-logo .logo-inner {
        width: 60px;
        height: 60px;
        margin: 0 auto 10px;
        background: var(--white);
        padding: 10px; /* Adjusted padding */
        border-radius: 50%;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2); /* More prominent shadow */
        display: flex; /* Center the icon */
        align-items: center;
        justify-content: center;
    }

    .brand-logo .logo-inner i {
        font-size: 2rem;
        /* Text gradient handled in layout.app */
    }

    .sidebar-brand h3 {
        margin-bottom: 0.25rem !important; /* Adjusted margin */
        color: var(--white);
        font-weight: 700; /* Bolder font weight */
        letter-spacing: 1.5px; /* Slightly less aggressive spacing */
        text-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    .sidebar-brand small {
        font-size: 0.7em; /* Slightly larger small text */
        color: rgba(255, 255, 255, 0.7); /* Slightly more visible */
    }


    /* Sidebar Menu Styling */
    .nav-sidebar > .nav-item {
        margin-bottom: 0.5rem; /* Adjusted margin between main menu items */
    }

    .nav-sidebar .nav-link.menu-item {
        position: relative;
        display: flex;
        align-items: center;
        padding: 12px 20px;
        border-radius: 12px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: rgba(255,255,255,0.05); /* Subtle background */
        overflow: hidden; /* Needed for ripple effect */
        color: var(--sidebar-text-color); /* Use variable */
    }

    .nav-sidebar .nav-link.menu-item:hover {
        background: var(--sidebar-hover-bg); /* Use variable */
        transform: translateX(8px);
        color: var(--white); /* White text on hover */
    }

    /* Style for active menu item */
    .nav-sidebar .nav-link.active.menu-item {
        background: var(--sidebar-active-bg); /* Use variable */
        color: var(--white);
        font-weight: 600;
    }

    .nav-sidebar .nav-link.active.menu-item .hover-indicator {
         opacity: 1;
         left: 0;
         background: var(--primary); /* Highlight active item with primary color */
    }


    .nav-sidebar .menu-item .icon-wrapper {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        transition: transform 0.3s;
        color: var(--white);
        font-size: 1.2rem; /* Adjusted icon size */
        flex-shrink: 0; /* Prevent icon from shrinking */
    }

    .nav-sidebar .menu-item:hover .icon-wrapper {
        transform: scale(1.1);
    }

    .nav-sidebar .menu-text {
        color: var(--sidebar-text-color); /* Use variable */
        font-weight: 500;
        letter-spacing: 0.5px;
        transition: color 0.3s; /* Transition color */
        flex-grow: 1; /* Allow text to take available space */
    }

    .nav-sidebar .menu-item:hover .menu-text {
         color: var(--white); /* White text on hover */
    }


    .nav-sidebar .hover-indicator {
        position: absolute;
        left: -10px;
        height: 100%;
        width: 3px;
        background: var(--sidebar-indicator-color); /* Use variable */
        opacity: 0;
        transition: all 0.3s;
    }


    /* Sub-menu (nav-treeview) Styling */
    .nav-sidebar .nav-treeview {
        list-style: none;
        padding-left: 20px; /* Adjusted padding */
        margin-top: 5px;
        margin-bottom: 5px; /* Add margin bottom */
        background: rgba(0,0,0,0.1); /* Slightly darker background for sub-menu */
        border-radius: 8px; /* Rounded corners for sub-menu block */
        overflow: hidden; /* Hide overflow for rounded corners */
    }

    .nav-sidebar .nav-treeview > .nav-item {
        margin: 0; /* Remove margin from sub-menu items */
    }

    .nav-sidebar .nav-treeview > .nav-item > .nav-link {
        padding: 8px 20px;
        display: flex;
        align-items: center;
        color: var(--sidebar-submenu-link-color); /* Use variable */
        transition: all 0.2s ease-in-out;
        font-size: 0.95rem; /* Slightly larger font size */
    }

    .nav-sidebar .nav-treeview > .nav-item > .nav-link:hover {
        opacity: 1;
        transform: translateX(5px);
        color: var(--white); /* White text on hover */
        background: rgba(255,255,255,0.05); /* Subtle background on hover */
    }

    .nav-sidebar .nav-treeview > .nav-item > .nav-link.active {
        color: var(--white);
        font-weight: 600;
    }


    .nav-sidebar .dot-indicator {
        width: 6px; /* Slightly smaller dot */
        height: 6px; /* Slightly smaller dot */
        border-radius: 50%;
        margin-right: 10px; /* Adjusted margin */
        flex-shrink: 0; /* Prevent dot from shrinking */
    }

    /* Specific colors for icon wrappers and dot indicators */
    .nav-sidebar .icon-wrapper.bg-cyan, .nav-sidebar .dot-indicator.bg-cyan { background: var(--sidebar-menu-cyan) !important; }
    .nav-sidebar .icon-wrapper.bg-purple, .nav-sidebar .dot-indicator.bg-purple { background: var(--sidebar-menu-purple) !important; }
    .nav-sidebar .icon-wrapper.bg-pink, .nav-sidebar .dot-indicator.bg-pink { background: var(--sidebar-menu-pink) !important; }
    .nav-sidebar .icon-wrapper.bg-orange, .nav-sidebar .dot-indicator.bg-orange { background: var(--sidebar-menu-orange) !important; }
    .nav-sidebar .icon-wrapper.bg-teal, .nav-sidebar .dot-indicator.bg-teal { background: var(--sidebar-menu-teal) !important; }


    /* Pulse Badge Styling */
    .nav-sidebar .pulse-badge {
        background: var(--danger); /* Use danger color variable */
        animation: pulse 2s infinite;
        margin-left: auto;
        font-size: 0.7em; /* Adjusted font size */
        padding: 0.25em 0.6em; /* Adjusted padding */
        border-radius: 1em; /* More rounded badge */
    }

    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.4); } /* Use danger color in rgba */
        70% { box-shadow: 0 0 0 10px rgba(239, 68, 68, 0); } /* Use danger color in rgba */
        100% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); } /* Use danger color in rgba */
    }

    /* AdminLTE Dropdown arrow for treeview */
    .nav-sidebar .has-treeview > .nav-link .right {
        margin-left: auto; /* Push arrow to the right */
        transition: transform 0.3s ease;
    }

    .nav-sidebar .has-treeview.menu-open > .nav-link .right {
        transform: rotate(90deg); /* Rotate arrow when menu is open */
    }


    /* Sidebar Footer (User Info) Styling */
    .sidebar-footer {
        padding: 1.5rem 1rem; /* Adjusted padding */
        border-top: 1px solid rgba(255, 255, 255, 0.1); /* Add a separator */
         /* Use flexbox to push to bottom if wrapper is display: flex and flex-direction: column */
        margin-top: auto;
    }

    .sidebar-footer .user-info .avatar i {
        font-size: 2.5rem; /* Slightly larger icon */
        color: rgba(255, 255, 255, 0.8); /* Slightly transparent white */
    }

     .sidebar-footer .user-info .avatar img {
         display: block; /* Ensure image is block for centering */
         margin: 0 auto; /* Center the image */
         border: 2px solid rgba(255, 255, 255, 0.5); /* Add a subtle white border */
     }


    .sidebar-footer .user-info .text-white {
        color: var(--white) !important;
        font-weight: 600;
    }

    .sidebar-footer .user-info .text-muted {
        color: rgba(255, 255, 255, 0.6) !important; /* Lighter muted text */
    }

    /* Ripple Effect Styling (Defined in layout.app for reusability) */
     .ripple-effect {
        position: absolute;
        border-radius: 50%;
        transform: scale(0);
        animation: ripple 1s linear;
        background-color: rgba(255, 255, 255, 0.4); /* White ripple */
        pointer-events: none; /* Ensure ripple doesn't interfere with clicks */
        z-index: 1; /* Ensure ripple is above the background */
    }

    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }


    /* --- AdminLTE Specific Overrides for Sidebar --- */

    /* Override AdminLTE's default active state background and color */
    .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link.active {
        background-color: transparent !important; /* Remove default background */
        color: var(--white); /* Ensure text is white */
    }

    .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link.active p {
         color: var(--white); /* Ensure text is white */
         font-weight: 600;
    }

    /* Override AdminLTE's default sub-menu active state */
    .sidebar-dark-primary .nav-sidebar .nav-treeview > .nav-item > .nav-link.active {
         background-color: transparent !important; /* Remove default background */
         color: var(--white); /* Ensure text is white */
    }

     .sidebar-dark-primary .nav-sidebar .nav-treeview > .nav-item > .nav-link.active p {
         color: var(--white); /* Ensure text is white */
         font-weight: 600;
     }

    /* Ensure sub-menu link color uses the variable */
    .sidebar-dark-primary .nav-sidebar .nav-treeview > .nav-item > .nav-link {
        color: var(--sidebar-submenu-link-color); /* Use variable */
    }

    /* Adjust padding for nav-icon to align with text */
    .nav-sidebar .nav-link > .nav-icon {
        margin-left: 0;
        margin-right: 0.5rem; /* Add some space after the icon */
        width: auto; /* Allow icon width to be determined by font size */
    }

    /* Adjust spacing for menu text when icon wrapper is used */
    .nav-sidebar .nav-link.menu-item p.menu-text {
         margin-left: 0 !important; /* Reset default AdminLTE margin */
    }


</style>

<script>
    $(document).ready(function() {
        // AdminLTE handles treeview toggle, we just need to manage the arrow and active state
        // The 'active' class should be added by Laravel based on the current route (handled in the HTML)
        // The 'menu-open' class is added/removed by AdminLTE's treeview data-widget

        // Handle dropdown arrow rotation based on AdminLTE's menu-open class
        $('.nav-sidebar .has-treeview').on('expanded.lte.treeview collapsed.lte.treeview', function() {
            const link = $(this).children('.nav-link');
            const arrow = link.find('.dropdown-arrow');
            if ($(this).hasClass('menu-open')) {
                arrow.removeClass('fa-angle-left').addClass('fa-angle-down');
            } else {
                arrow.removeClass('fa-angle-down').addClass('fa-angle-left');
            }
        });

        // Initial arrow state on page load if a sub-menu is already open
        $('.nav-sidebar .has-treeview.menu-open').each(function() {
             $(this).children('.nav-link').find('.dropdown-arrow').removeClass('fa-angle-left').addClass('fa-angle-down');
        });


        // Add ripple effect to menu items
        $('.nav-link.menu-item').on('click', function(e) {
            // Only add ripple if it's not a treeview parent link that opens a submenu
            if (!$(this).closest('.has-treeview').length || $(this).attr('href') !== '#') {
                 let ripple = $('<div class="ripple-effect"></div>');
                 let posX = e.pageX - $(this).offset().left;
                 let posY = e.pageY - $(this).offset().top;

                 ripple.css({
                     left: posX,
                     top: posY
                 }).appendTo($(this));

                 setTimeout(() => ripple.remove(), 1000);
            }
        });

        // Add 'active' class based on current route on page load
        const currentUrl = window.location.href;
        $('.nav-sidebar .nav-link').each(function() {
            if (this.href === currentUrl) {
                $(this).addClass('active');
                // For sub-menu items, also open the parent treeview
                $(this).parents('.has-treeview').addClass('menu-open');
            }
        });

    });
</script>
