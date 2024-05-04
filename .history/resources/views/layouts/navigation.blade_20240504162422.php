<!-- Sidebar -->
<div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Administrator') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.bookings.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        {{ __('Booking') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.travel_packages.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-hotel"></i>
                    <p>
                        {{ __('Travel Package') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle nav-icon"></i>
                    <p>
                        {{ __('Blog')}}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('admin.categories.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                {{ __('Category')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.blogs.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                {{ __('Add Blog')}}
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Include AdminLTE -->
<script src="{{ asset('path/to/js/adminlte.min.js') }}"></script>
