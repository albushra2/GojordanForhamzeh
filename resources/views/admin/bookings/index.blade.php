@extends('layouts.app')
@section('title', 'Booking Management')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 justify-content-between d-flex">
                    <h1 class="m-0 text-dark">{{ __('Booking Management') }}</h1>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="filterDropdown" 
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                        <div class="dropdown-menu" aria-labelledby="filterDropdown">
                            <a class="dropdown-item" href="{{ route('admin.bookings.index') }}">All Bookings</a>
                            <a class="dropdown-item" href="{{ route('admin.bookings.index', ['status' => 'pending']) }}">Pending</a>
                            <a class="dropdown-item" href="{{ route('admin.bookings.index', ['status' => 'confirmed']) }}">Confirmed</a>
                            <a class="dropdown-item" href="{{ route('admin.bookings.index', ['status' => 'cancelled']) }}">Cancelled</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">All Bookings</h3>
                            <div class="card-tools">
                                <form action="{{ route('admin.bookings.index') }}" method="GET">
                                    <div class="input-group input-group-sm" style="width: 250px;">
                                        <input type="text" name="search" class="form-control float-right" 
                                               placeholder="Search..." value="{{ request('search') }}">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="bg-gradient-primary">
                                        <tr>
                                            <th>Booking ID</th>
                                            <th>Travel Package</th>
                                            <th>Customer</th>
                                            <th>Dates</th>
                                            <th>Guests</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($bookings as $booking)
                                        <tr>
                                            <td>#{{ $booking->id }}</td>
                                            <td>
                                                <a href="#" data-toggle="tooltip" title="{{ $booking->travelPackage->title }}">
                                                    {{ Str::limit($booking->travelPackage->title, 25) }}
                                                </a>
                                            </td>
                                            <td>{{ $booking->user->name }}</td>
                                            <td>
                                                {{ $booking->start_date->format('M d') }} - 
                                                {{ $booking->end_date->format('M d, Y') }}
                                            </td>
                                            <td>
                                                <span class="badge badge-pill badge-info">
                                                    {{ $booking->total_guests }} <i class="fas fa-users ml-1"></i>
                                                </span>
                                            </td>
                                            <td>
                                                @if($booking->status == 'confirmed')
                                                    <span class="badge badge-pill badge-success">
                                                        <i class="fas fa-check-circle"></i> Confirmed
                                                    </span>
                                                @elseif($booking->status == 'cancelled')
                                                    <span class="badge badge-pill badge-danger">
                                                        <i class="fas fa-times-circle"></i> Cancelled
                                                    </span>
                                                @else
                                                    <span class="badge badge-pill badge-warning">
                                                        <i class="fas fa-clock"></i> Pending
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.bookings.show', $booking) }}" 
                                                       class="btn btn-sm btn-info" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-danger delete-btn" 
                                                            title="Delete" data-id="{{ $booking->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    <form id="delete-form-{{ $booking->id }}" 
                                                          action="{{ route('admin.bookings.destroy', [$booking]) }}" 
                                                          method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-4">No bookings found.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                            {{ $bookings->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .card-primary.card-outline {
        border-top: 3px solid #007bff;
    }
    .bg-gradient-primary {
        background: linear-gradient(to right, #007bff, #00a2ff);
        color: white;
    }
    .badge-pill {
        padding: 0.5em 0.8em;
    }
    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.05);
    }
    .dropdown-item.active {
        background-color: #007bff;
        color: white;
    }
</style>
@endsection

@section('scripts')
<script>
    $(function () {
        // Enable tooltips
        $('[data-toggle="tooltip"]').tooltip();
        
        // Delete confirmation
        $('.delete-btn').click(function() {
            var bookingId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#007bff',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete-form-' + bookingId).submit();
                }
            });
        });
        
        // Show success message if exists
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    });
</script>
@endsection