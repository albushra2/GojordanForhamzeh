<!-- Sidebar -->
<!-- Sidebar -->
<div class="sidebar" style="
    background: linear-gradient(135deg, rgb(225, 135, 150) 0%, #3498db 100%);
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    z-index: 1000;
    overflow-y: auto;
    width: 250px; /* يمكن تعديل العرض حسب الحاجة */
">
    <!-- Sidebar Brand Logo/Text -->
    <div class="sidebar-brand text-center py-3">
        <div class="preloader-logo d-flex justify-content-center align-items-center">
            <span class="text-white font-weight-bold" style="font-size: 1.3rem; letter-spacing: 1px;">GO</span>
            <div class="map-icon mx-1" style="color: #df3462; font-size: 1.3rem;">
                <i class="bx bxs-map"></i>
            </div>
            <span class="text-white font-weight-bold" style="font-size: 1.3rem; letter-spacing: 1px;">JORDAN</span>
        </div>
    </div>
    

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item mb-2">
                <a href="{{ route('admin.dashboard') }}" class="nav-link d-flex align-items-center" 
                   style="border-radius: 10px; transition: all 0.3s;">
                    <div class="nav-icon-container bg-info rounded-circle p-2 mr-3">
                        <i class="fas fa-th text-white"></i>
                    </div>
                    <p class="mb-0 text-white font-weight-medium">
                        {{ __('Dashboard') }}
                    </p>
                    {{-- <span class="badge bg-success ml-auto">New</span> --}}
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="{{ route('admin.users.index') }}" class="nav-link d-flex align-items-center"
                   style="border-radius: 10px; transition: all 0.3s;">
                    <div class="nav-icon-container bg-warning rounded-circle p-2 mr-3">
                        <i class="fas fa-users text-white"></i>
                    </div>
                    <p class="mb-0 text-white font-weight-medium">
                        {{ __('Administrator') }}
                    </p>
                </a>
            </li>
            
            <li class="nav-item mb-2">
                <a href="{{ route('admin.bookings.index') }}" class="nav-link d-flex align-items-center"
                   style="border-radius: 10px; transition: all 0.3s;">
                    <div class="nav-icon-container bg-danger rounded-circle p-2 mr-3">
                        <i class="fas fa-book text-white"></i>
                    </div>
                    <p class="mb-0 text-white font-weight-medium">
                        {{ __('Booking') }}
                        {{-- <span class="badge bg-primary ml-2">5</span> --}}
                    </p>
                </a>
            </li>
            <!--  -->
            <li class="nav-item mb-2">
    {{-- <a href="{{ route('admin.galleries.index') }}" class="nav-link d-flex align-items-center"
       style="border-radius: 10px; transition: all 0.3s;">
        <div class="nav-icon-container bg-danger rounded-circle p-2 mr-3">
            <i class="fas fa-images text-white"></i>
        </div>
        <p class="mb-0 text-white font-weight-medium">
            {{ __('Galleries') }}
        </p>
    </a> --}}
</li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.travel_packages.index') }}" class="nav-link d-flex align-items-center"
                   style="border-radius: 10px; transition: all 0.3s;">
                    <div class="nav-icon-container bg-success rounded-circle p-2 mr-3">
                        <i class="fas fa-hotel text-white"></i>
                    </div>
                    <p class="mb-0 text-white font-weight-medium">
                        {{ __('Travel Package') }}
                    </p>
                </a>
            </li>

            <!-- Blog Section with Dropdown -->
            <li class="nav-item has-treeview menu-open mb-2">
                <a href="#" class="nav-link d-flex align-items-center"
                   style="border-radius: 10px; transition: all 0.3s;">
                    <div class="nav-icon-container bg-purple rounded-circle p-2 mr-3">
                        <i class="fas fa-blog text-white"></i>
                    </div>
                    <p class="mb-0 text-white font-weight-medium">
                        {{ __('Blog')}}
                        <i class="fas fa-angle-down right ml-auto"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview pl-5" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('admin.categories.index') }}" class="nav-link d-flex align-items-center py-2">
                            <div class="nav-icon-container bg-pink rounded-circle p-1 mr-2">
                                <i class="far fa-circle text-white" style="font-size: 0.6rem;"></i>
                            </div>
                            <p class="mb-0 text-white">
                                {{ __('Category')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.blogs.index') }}" class="nav-link d-flex align-items-center py-2">
                            <div class="nav-icon-container bg-teal rounded-circle p-1 mr-2">
                                <i class="far fa-circle text-white" style="font-size: 0.6rem;"></i>
                            </div>
                            <p class="mb-0 text-white">
                                {{ __('Add Blog')}}
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
            
            <!-- Additional Creative Elements -->
            
       

<!-- Add this CSS in your head or main stylesheet -->
{{-- <style>
    .sidebar {
        box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        transition: all 0.3s;
    }
    
    .nav-link:hover {
        transform: translateX(5px);
        background: rgba(255,255,255,0.1) !important;
    }
    
    .nav-icon-container {
        transition: all 0.3s;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .nav-item.has-treeview.menu-open > .nav-link {
        background: rgba(255,255,255,0.15);
    }
    
    .sidebar-brand {
        background: rgba(255,255,255,0.05);
        padding: 1.5rem;
        margin: 15px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    
    .sidebar-footer {
        border-top: 1px solid rgba(255,255,255,0.1);
    }
    
    .bg-purple {
        background-color: #6f42c1;
    }
    
    .bg-teal {
        background-color: #20c997;
    }
    
    .bg-pink {
        background-color: #d63384;
    }
    
    .bg-indigo {
        background-color: #6610f2;
    }
</style> --}}

<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Include AdminLTE -->
<script src="{{ asset('path/to/js/adminlte.min.js') }}"></script>

<script>
    $(document).ready(function() {
        // Add animation to dropdown arrows
        $('.nav-item.has-treeview > a').on('click', function() {
            $(this).find('.right').toggleClass('fa-angle-down fa-angle-left');
        });
        
        // Add active class highlighting
        $('.nav-link').filter(function() {
            return this.href == location.href;
        }).addClass('active').parents('.has-treeview').addClass('menu-open');
    });
</script>