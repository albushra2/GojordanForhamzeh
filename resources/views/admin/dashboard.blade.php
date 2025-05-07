
@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">GO JORDAN Admin Panel</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <!-- Statistics Cards -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0">Bookings</h5>
                            <h2 class="mt-2">{{ $stats['bookings'] }}</h2>
                        </div>
                        <i class="fas fa-calendar fa-3x"></i>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('admin.bookings.index') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0">Travel Packages</h5>
                            <h2 class="mt-2">{{ $stats['travel_packages'] }}</h2>
                        </div>
                        <i class="fas fa-map-marked-alt fa-3x"></i>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('admin.travel_packages.index') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0">Blog Posts</h5>
                            <h2 class="mt-2">{{ $stats['blogs'] }}</h2>
                        </div>
                        <i class="fas fa-blog fa-3x"></i>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('admin.blogs.index') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0">Users</h5>
                            <h2 class="mt-2">{{ $stats['users'] }}</h2>
                        </div>
                        <i class="fas fa-users fa-3x"></i>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <!-- <a class="small text-white stretched-link" href="{{ route('admin.users.index') }}">View Details</a> -->
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Bookings Table -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Recent Bookings
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Package</th>
                            <th>User</th>
                            <th>Dates</th>
                            <th>Guests</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stats['recent_bookings'] as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->travelPackage->title }}</td>
                            <td>{{ $booking->user->name }}</td>
                            <td>
                                {{ $booking->start_date->format('M d, Y') }} - 
                                {{ $booking->end_date->format('M d, Y') }}
                            </td>
                            <td>{{ $booking->total_guests }}</td>
                            <td>
                                <span class="badge bg-{{ $booking->status == 'confirmed' ? 'success' : ($booking->status == 'cancelled' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.bookings.index', $booking->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <!-- <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" class="d-inline"> -->
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<style>
{{-- Add this to your dashboard.blade.php --}}
<style>
    /* Modern Gradient Background */
    .container-fluid.px-4 {
        background: linear-gradient(135deg, #f8f9fc 0%, #f1f3f9 100%);
        min-height: calc(100vh - 60px);
    }

    /* Enhanced Card Design */
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        overflow: hidden;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.12);
    }

    /* Gradient Card Headers */
    .card.bg-primary { background: linear-gradient(45deg, #667eea, #764ba2) !important; }
    .card.bg-success { background: linear-gradient(45deg, #11998e, #38ef7d) !important; }
    .card.bg-info { background: linear-gradient(45deg, #4facfe, #00f2fe) !important; }
    .card.bg-warning { background: linear-gradient(45deg, #ff9966, #ff5e62) !important; }

    /* Modern Table Design */
    .table {
        border-radius: 12px;
        overflow: hidden;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table thead th {
        background: linear-gradient(45deg, #2c3e50, #3498db);
        color: white;
        border-bottom: none;
        padding: 1.2rem;
        font-weight: 500;
    }

    .table tbody td {
        padding: 1rem;
        vertical-align: middle;
        background: white;
        border-bottom: 1px solid #f0f0f0;
    }

    .table tbody tr:hover td {
        background: #f8f9fa;
        transform: scale(1.02);
        box-shadow: 0 3px 15px rgba(0,0,0,0.05);
    }

    /* Status Badges */
    .badge {
        padding: 0.5em 0.8em;
        font-size: 0.85em;
        border-radius: 8px;
        font-weight: 600;
    }

    /* Hover Effects */
    a.stretched-link {
        transition: all 0.3s ease;
    }

    a.stretched-link:hover {
        letter-spacing: 0.5px;
    }

    /* Chart Container */
    #quickStatsChart {
        background: white;
        border-radius: 15px;
        padding: 1rem;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }

    /* Timeline Enhancement */
    .timeline::before {
        background: linear-gradient(to bottom, #667eea, #764ba2);
        width: 3px;
    }

    .timeline-badge {
        box-shadow: 0 3px 12px rgba(0,0,0,0.15);
        border: 2px solid white;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .card-body h2 {
            font-size: 1.75rem !important;
        }
        
        .table-responsive {
            border-radius: 12px;
            border: 1px solid #f0f0f0;
        }
    }
</style> 
    <!-- Recent Activity Timeline -->
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-history me-2"></i>Recent Activity</h5>
        <small class="text-muted">Last 7 days</small>
    </div>
    <div class="card-body">
        <div class="timeline">
            @foreach($stats['recent_activity'] as $activity)
            <div class="timeline-item">
                <div class="timeline-badge {{ $activity['type'] == 'booking' ? 'bg-primary' : ($activity['type'] == 'user' ? 'bg-success' : 'bg-info') }}"></div>
                <div class="timeline-content">
                    <div class="d-flex justify-content-between">
                        <h6>{{ $activity['title'] }}</h6>
                        <small class="text-muted">{{ $activity['time'] }}</small>
                    </div>
                    <p class="mb-0 text-muted">{{ $activity['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Quick Stats Chart -->
<div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-chart-line me-2"></i>Monthly Overview</h5>
    </div>
    <div class="card-body">
        <canvas id="quickStatsChart" height="120"></canvas>
    </div>
</div>

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