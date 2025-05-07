@extends('layouts.app')
@section('title', 'Booking Details')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 justify-content-between d-flex">
                    <h1 class="m-0 text-dark">Booking #{{ $booking->id }}</h1>
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Booking Information</h3>
                            <div class="card-tools">
                                <span class="badge badge-{{ $booking->status == 'confirmed' ? 'success' : ($booking->status == 'cancelled' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4><i class="fas fa-user text-primary mr-2"></i> Customer Details</h4>
                                    <hr>
                                    <div class="pl-4">
                                        <p><strong>Name:</strong> {{ $booking->user->name }}</p>
                                        <p><strong>Phone:</strong> {{ $booking->phone }}</p>
                                        <p><strong>Group Type:</strong> {{ ucfirst($booking->group_type) }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4><i class="fas fa-suitcase text-primary mr-2"></i> Travel Package</h4>
                                    <hr>
                                    <div class="pl-4">
                                        <p><strong>Package:</strong> {{ $booking->travelPackage->title }}</p>
                                        <p><strong>Dates:</strong> 
                                            {{ $booking->start_date->format('M d, Y') }} to 
                                            {{ $booking->end_date->format('M d, Y') }}
                                        </p>
                                        <p><strong>Duration:</strong> 
                                            {{ $booking->start_date->diffInDays($booking->end_date) }} days
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <h4><i class="fas fa-users text-primary mr-2"></i> Guest Information</h4>
                                    <hr>
                                    <div class="pl-4">
                                        <p><strong>Total Guests:</strong> {{ $booking->total_guests }}</p>
                                        <p><strong>Children:</strong> {{ $booking->children_count }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4><i class="fas fa-sticky-note text-primary mr-2"></i> Special Requests</h4>
                                    <hr>
                                    <div class="pl-4">
                                        <p>{{ $booking->special_requests ?: 'No special requests' }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <h4><i class="fas fa-cog text-primary mr-2"></i> Manage Booking</h4>
                                    <hr>
                                    <form action="{{ route('admin.bookings.updateStatus', $booking) }}" method="POST" class="form-inline">
                                        @csrf
                                        <div class="form-group mr-3">
                                            <label for="status" class="mr-2">Update Status:</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                                <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Update
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .card-primary {
        border-top: 3px solid #007bff;
    }
    hr {
        border-top: 1px solid rgba(0, 123, 255, 0.2);
    }
    h4 {
        color: #007bff;
    }
    .badge {
        font-size: 1rem;
        padding: 0.5em 1em;
    }
</style>
@endsection