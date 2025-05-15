@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="container-fluid px-4 py-5"> {{-- Added padding to the container --}}
    <div class="text-center mb-5"> {{-- Centered and added margin-bottom --}}
        <h1 class="display-4 fw-bold text-gradient-dark-blue"> {{-- Changed gradient class --}}
            <i class="fas fa-crown me-3 text-warning"></i>
            GO JORDAN Admin Panel
        </h1>
        <p class="lead text-muted">Overview of your application's key metrics.</p> {{-- Added a subtitle --}}
    </div>

    <div class="row g-4"> {{-- Increased gutter size --}}
        <div class="col-xl-3 col-md-6">
            <div class="card card-hover border-0 shadow-sm overflow-hidden"> {{-- Added shadow --}}
                <div class="card-body p-4"> {{-- Added padding --}}
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted mb-1 small d-block">Total Bookings</span> {{-- Added d-block for spacing --}}
                            <h2 class="mb-0 display-6 fw-bold text-primary">{{ $stats['bookings'] }}</h2> {{-- Added text color class --}}
                        </div>
                        <div class="icon-wrapper bg-primary-gradient shadow-sm"> {{-- Added shadow to icon --}}
                            <i class="fas fa-calendar-alt fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-3 border-top"> {{-- Added border top and padding --}}
                        <a href="{{ route('admin.bookings.index') }}" class="text-decoration-none link-primary small fw-semibold"> {{-- Added fw-semibold --}}
                            View Details <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card card-hover border-0 shadow-sm overflow-hidden"> {{-- Added shadow --}}
                <div class="card-body p-4"> {{-- Added padding --}}
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted mb-1 small d-block">Travel Packages</span> {{-- Added d-block for spacing --}}
                            <h2 class="mb-0 display-6 fw-bold text-success">{{ $stats['travel_packages'] }}</h2> {{-- Added text color class --}}
                        </div>
                        <div class="icon-wrapper bg-success-gradient shadow-sm"> {{-- Added shadow to icon --}}
                            <i class="fas fa-map-marked-alt fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-3 border-top"> {{-- Added border top and padding --}}
                        <a href="{{ route('admin.travel_packages.index') }}" class="text-decoration-none link-success small fw-semibold"> {{-- Added fw-semibold --}}
                            View Details <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card card-hover border-0 shadow-sm overflow-hidden"> {{-- Added shadow --}}
                <div class="card-body p-4"> {{-- Added padding --}}
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted mb-1 small d-block">Blog Posts</span> {{-- Added d-block for spacing --}}
                            <h2 class="mb-0 display-6 fw-bold text-info">{{ $stats['blogs'] }}</h2> {{-- Added text color class --}}
                        </div>
                        <div class="icon-wrapper bg-info-gradient shadow-sm"> {{-- Added shadow to icon --}}
                            <i class="fas fa-blog fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-3 border-top"> {{-- Added border top and padding --}}
                        <a href="{{ route('admin.blogs.index') }}" class="text-decoration-none link-info small fw-semibold"> {{-- Added fw-semibold --}}
                            View Details <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card card-hover border-0 shadow-sm overflow-hidden"> {{-- Added shadow --}}
                <div class="card-body p-4"> {{-- Added padding --}}
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted mb-1 small d-block">Registered Users</span> {{-- Added d-block for spacing --}}
                            <h2 class="mb-0 display-6 fw-bold text-warning">{{ $stats['users'] }}</h2> {{-- Added text color class --}}
                        </div>
                        <div class="icon-wrapper bg-warning-gradient shadow-sm"> {{-- Added shadow to icon --}}
                            <i class="fas fa-users fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-3 border-top"> {{-- Added border top and padding --}}
                        <a href="{{ route('admin.users.index') }}" class="text-decoration-none link-warning small fw-semibold"> {{-- Added fw-semibold --}}
                            View Details <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-5 border-0 shadow-lg"> {{-- Increased top margin and added larger shadow --}}
        <div class="card-header bg-gradient-primary text-white py-3 px-4"> {{-- Added horizontal padding --}}
            <h5 class="mb-0 d-flex align-items-center">
                <i class="fas fa-stream me-3"></i>Live Activity Stream
                <span class="badge bg-white text-primary ms-auto rounded-pill px-3 py-1"> {{-- Added rounded-pill and more padding --}}
                    {{ count($stats['recent_activity']) }} Events
                </span>
            </h5>
        </div>
        <div class="card-body p-4"> {{-- Added padding --}}
            <div class="activity-list">
                @forelse($stats['recent_activity'] as $activity)
                <div class="activity-item bg-light-hover p-3 mb-3 rounded-3"> {{-- Added padding, margin-bottom, rounded corners --}}
                    <div class="activity-icon bg-{{ $activity['color'] }} flex-shrink-0"> {{-- Added flex-shrink-0 --}}
                        <i class="fas {{ $activity['icon'] }}"></i>
                    </div>
                    <div class="activity-content ms-3 w-100"> {{-- Added margin-start and width --}}
                        <div class="d-flex justify-content-between align-items-center mb-1"> {{-- Added align-items-center --}}
                            <h6 class="fw-bold mb-0 text-dark">{{ $activity['title'] }}</h6> {{-- Added text-dark --}}
                            <small class="text-muted text-end">{{ $activity['time'] }}</small> {{-- Added text-end --}}
                        </div>
                        <p class="text-muted mb-0 small">{{ $activity['description'] }}</p>
                    </div>
                </div>
                @empty
                <div class="text-center py-5"> {{-- Increased vertical padding --}}
                    <i class="fas fa-wind fa-3x text-muted mb-3"></i> {{-- Increased icon size --}}
                    <p class="text-muted mb-0 lead">No recent activity to show.</p> {{-- Changed text size --}}
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom CSS for Enhanced Dashboard Design */

    :root {
        --primary: #4a6cf7;
        --secondary: #667eea;
        --success: #10b981;
        --info: #3b82f6;
        --warning: #f59e0b;
        --danger: #ef4444;
        --dark: #2c3e50;
        --light: #f8f9fa;
        --white: #ffffff;
        --radius-lg: 1.2rem;
        --radius-sm: 0.75rem;
    }

    /* Text Gradient for the main title */
    .text-gradient-dark-blue {
        background: linear-gradient(45deg, var(--dark), var(--primary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        /* Fallback for browsers that don't support gradients */
        color: var(--dark);
    }

    /* Card Styling */
    .card {
        backdrop-filter: blur(16px) saturate(180%);
        -webkit-backdrop-filter: blur(16px) saturate(180%);
        background-color: rgba(255, 255, 255, 0.85);
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        background-color: rgba(255, 255, 255, 0.95);
    }

    /* Icon Wrapper Styling */
    .icon-wrapper {
        width: 60px; /* Slightly larger icon wrapper */
        height: 60px; /* Slightly larger icon wrapper */
        border-radius: 15px; /* More rounded corners */
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-size: 1.8rem; /* Larger icon size */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow for icons */
    }
    .text-gradient-dark-blue {
        background: linear-gradient(135deg, #667eea 0%, #4a6cf7 100%);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    /* Gradient Backgrounds for Icon Wrappers and Card Header */
    .bg-primary-gradient { background: linear-gradient(45deg, var(--primary), var(--secondary)); }
    .bg-success-gradient { background: linear-gradient(45deg, var(--success), #34d399); } /* Keep original success gradient */
    .bg-info-gradient { background: linear-gradient(45deg, var(--info), #60a5fa); } /* Keep original info gradient */
    .bg-warning-gradient { background: linear-gradient(45deg, var(--warning), #fbbf24); } /* Keep original warning gradient */

    .bg-gradient-primary {
        background: linear-gradient(45deg, var(--primary), var(--secondary));
        border-radius: 1rem 1rem 0 0; /* Match card border radius */
    }

    /* Activity Stream Styling */
    .activity-list {
        /* Add any general list styling here if needed */
    }

    .activity-item {
        display: flex;
        align-items: flex-start; /* Align items to the top */
        padding: 1.2rem; /* More padding */
        margin-bottom: 1.2rem; /* More margin */
        background: var(--light); /* Light background */
        border-radius: 0.75rem; /* Rounded corners */
        transition: all 0.2s ease-in-out; /* Smooth transition */
        border: 1px solid transparent; /* Add a transparent border for hover effect */
    }

    .activity-item:last-child {
        margin-bottom: 0; /* Remove bottom margin for the last item */
    }

    .activity-item:hover {
        background: var(--white); /* White background on hover */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); /* Subtle shadow on hover */
        border-color: var(--primary); /* Highlight border on hover */
        transform: translateX(8px); /* Slight movement on hover */
    }

    .activity-icon {
        width: 45px; /* Slightly larger icon */
        height: 45px; /* Slightly larger icon */
        border-radius: 10px; /* Rounded corners */
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1.2rem; /* More margin */
        color: var(--white);
        font-size: 1.5rem; /* Larger icon size */
        flex-shrink: 0; /* Prevent icon from shrinking */
    }

    /* Background colors for activity icons */
    .activity-icon.bg-primary { background-color: var(--primary) !important; }
    .activity-icon.bg-success { background-color: var(--success) !important; }
    .activity-icon.bg-info { background-color: var(--info) !important; }
    .activity-icon.bg-warning { background-color: var(--warning) !important; }
    .activity-icon.bg-danger { background-color: var(--danger) !important; } /* Added danger color */

    .activity-content {
        flex-grow: 1; /* Allow content to take available space */
    }

    .activity-content h6 {
        margin-bottom: 0.4rem !important; /* Adjust spacing below title */
    }

    .activity-content small {
        white-space: nowrap; /* Prevent time from wrapping */
        flex-shrink: 0; /* Prevent time from shrinking */
        margin-left: 1rem; /* Add space between title and time */
    }

    /* Badge styling in card header */
    .card-header .badge {
        font-size: 0.85em; /* Slightly smaller badge font size */
        font-weight: 600; /* Semi-bold font weight */
        padding: 0.35em 0.9em; /* Adjusted padding */
    }

    /* Link colors */
    .link-primary { color: var(--primary) !important; }
    .link-success { color: var(--success) !important; }
    .link-info { color: var(--info) !important; }
    .link-warning { color: var(--warning) !important; }
    .link-danger { color: var(--danger) !important; }

    /* Ensure text colors use defined variables */
    .text-primary { color: var(--primary) !important; }
    .text-success { color: var(--success) !important; }
    .text-info { color: var(--info) !important; }
    .text-warning { color: var(--warning) !important; }
    .text-danger { color: var(--danger) !important; }
    .text-muted { color: rgba(44, 62, 80, 0.7) !important; } /* Slightly darker muted text */
    .text-dark { color: var(--dark) !important; }

    /* Responsive adjustments */
    @media (max-width: 767.98px) {
        .activity-item {
            flex-direction: column; /* Stack icon and content on small screens */
            align-items: center;
            text-align: center;
        }
        .activity-icon {
            margin-right: 0;
            margin-bottom: 0.8rem;
        }
        .activity-content {
            margin-left: 0;
        }
        .activity-content .d-flex {
            flex-direction: column;
            align-items: center;
        }
         .activity-content small {
            margin-left: 0;
            margin-top: 0.4rem;
         }
    }

</style>
<script>
    // Add intersection observer for scroll animations
    const cards = document.querySelectorAll('.card');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = 1;
                entry.target.style.transform = 'translateY(0)';
            }
        });
    });

    cards.forEach(card => {
        card.style.opacity = 0;
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
        observer.observe(card);
    });

    // Live activity stream hover effect
    document.querySelectorAll('.activity-item').forEach(item => {
        item.addEventListener('mouseenter', () => {
            item.style.transform = 'translateX(10px)';
        });
        item.addEventListener('mouseleave', () => {
            item.style.transform = 'translateX(0)';
        });
    });
</script>
@endsection
