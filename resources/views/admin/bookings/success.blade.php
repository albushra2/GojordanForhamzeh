<!-- resources/views/booking/success.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Booking Confirmed!</h2>
                </div>

                <div class="card-body">
                    <div class="alert alert-success">
                        <h4>Thank you for your booking!</h4>
                        <p>Your booking reference: #{{ $booking->id }}</p>
                    </div>

                    <div class="booking-details">
                        <h4>Booking Details</h4>
                        <p><strong>Destination:</strong> {{ ucfirst(str_replace('-', ' ', $booking->destination)) }}</p>
                        <p><strong>Date:</strong> {{ $booking->date->format('d M Y') }}</p>
                        <p><strong>Number of Visitors:</strong> {{ $booking->visitors }}</p>
                        <p><strong>Total Price:</strong> JOD {{ $booking->total_price }}</p>
                    </div>

                    <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection