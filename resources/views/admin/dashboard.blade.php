
@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-center mt-4">
        <h1 class="text-center" style="font-weight: 600; color: #2c3e50;">
            <i class="fas fa-crown mr-2 text-warning"></i>
            GO JORDAN Admin Panel
        </h1>
    </div>    <ol class="breadcrumb mb-4" style="background-color: pink">
        {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
    </ol>

   <!-- Statistics Cards -->
<div class="row">
    <!-- Booking Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase text-muted mb-2 small">Bookings</h6>
                        <h2 class="mb-0">{{ $stats['bookings'] }}</h2>
                    </div>
                    <div class="icon-shape bg-primary text-white rounded-circle p-3">
                        <i class="fas fa-calendar fa-2x"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-top-0 pt-0">
                <a href="{{ route('admin.bookings.index') }}" class="text-decoration-none d-flex align-items-center">
                    <span class="small text-primary">View Details</span>
                    <i class="fas fa-chevron-right ms-2 small text-primary"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Travel Packages Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase text-muted mb-2 small">Travel Packages</h6>
                        <h2 class="mb-0">{{ $stats['travel_packages'] }}</h2>
                    </div>
                    <div class="icon-shape bg-success text-white rounded-circle p-3">
                        <i class="fas fa-map-marked-alt fa-2x"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-top-0 pt-0">
                <a href="{{ route('admin.travel_packages.index') }}" class="text-decoration-none d-flex align-items-center">
                    <span class="small text-success">View Details</span>
                    <i class="fas fa-chevron-right ms-2 small text-success"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Blog Posts Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase text-muted mb-2 small">Blog Posts</h6>
                        <h2 class="mb-0">{{ $stats['blogs'] }}</h2>
                    </div>
                    <div class="icon-shape bg-info text-white rounded-circle p-3">
                        <i class="fas fa-blog fa-2x"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-top-0 pt-0">
                <a href="{{ route('admin.blogs.index') }}" class="text-decoration-none d-flex align-items-center">
                    <span class="small text-info">View Details</span>
                    <i class="fas fa-chevron-right ms-2 small text-info"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Users Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase text-muted mb-2 small">Users</h6>
                        <h2 class="mb-0">{{ $stats['users'] }}</h2>
                    </div>
                    <div class="icon-shape bg-warning text-white rounded-circle p-3">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-top-0 pt-0">
                <a href="{{ route('admin.users.index') }}" class="text-decoration-none d-flex align-items-center">
                    <span class="small text-warning">View Details</span>
                    <i class="fas fa-chevron-right ms-2 small text-warning"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<style>
    .icon-shape {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .card {
        transition: all 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .bg-primary { background-color: #4e73df !important; }
    .bg-success { background-color: #1cc88a !important; }
    .bg-info { background-color: #36b9cc !important; }
    .bg-warning { background-color: #f6c23e !important; }
    
    .text-primary { color: #4e73df !important; }
    .text-success { color: #1cc88a !important; }
    .text-info { color: #36b9cc !important; }
    .text-warning { color: #f6c23e !important; }
</style>
  
   <!-- Recent Activity Timeline -->
<div class="card mb-4">
    <div class="card-header bg-white border-bottom-0 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 text-primary">
            <i class="fas fa-history me-2"></i>Recent Activity
        </h5>
        <small class="badge bg-light text-dark">
            <i class="fas fa-clock me-1"></i> Last 7 days
        </small>
    </div>
    
    <div class="card-body pt-0">
        <div class="timeline">
            @foreach($stats['recent_activity'] as $activity)
            <div class="timeline-item mb-3 p-3 rounded {{ $activity['type'] == 'booking' ? 'border-start-primary' : ($activity['type'] == 'user' ? 'border-start-success' : 'border-start-info') }}"
                 style="border-left: 4px solid; background: rgba(255,255,255,0.8);">
                
                <div class="d-flex align-items-start">
                    <div class="timeline-badge me-3 mt-1 flex-shrink-0">
                        <i class="fas {{ $activity['type'] == 'booking' ? 'fa-calendar-check' : ($activity['type'] == 'user' ? 'fa-user-plus' : 'fa-blog') }} 
                           fa-lg text-{{ $activity['type'] == 'booking' ? 'primary' : ($activity['type'] == 'user' ? 'success' : 'info') }}"></i>
                    </div>
                    
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h6 class="mb-0 fw-bold">{{ $activity['title'] }}</h6>
                            <small class="text-muted">
                                <i class="far fa-clock me-1"></i>{{ $activity['time'] }}
                            </small>
                        </div>
                        <p class="mb-0 text-muted small">{{ $activity['description'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<style>
    .timeline {
        position: relative;
        padding-left: 1rem;
    }
    
    .timeline-item {
        position: relative;
        margin-bottom: 1.5rem;
        transition: all 0.3s ease;
    }
    
    .timeline-item:hover {
        transform: translateX(5px);
    }
    
    .timeline-badge {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: white;
    }
    
    .border-start-primary { border-left-color: #667eea !important; }
    .border-start-success { border-left-color: #38ef7d !important; }
    .border-start-info { border-left-color: #4facfe !important; }
</style>


@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Quick Stats Chart
        const ctx = document.getElementById('quickStatsChart').getContext('2d');
        const quickStatsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Bookings',
                    data: [12, 19, 15, 27, 34, 25, 38],
                    backgroundColor: 'rgba(102, 126, 234, 0.1)',
                    borderColor: '#667eea',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true
                }, {
                    label: 'Revenue',
                    data: [2100, 3200, 2800, 4500, 5200, 4100, 6200],
                    backgroundColor: 'rgba(17, 153, 142, 0.1)',
                    borderColor: '#11998e',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    });
</script>
@endsection