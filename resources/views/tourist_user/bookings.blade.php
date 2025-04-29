@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>My Bookings</h2>
                </div>

                <div class="card-body">
                    @if($bookings->isEmpty())
                        <p>You have no bookings yet.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>Destination</th>
                                        <th>Date</th>
                                        <th>Guests</th>
                                        <th>Children</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bookings as $booking)
                                    <tr>
                                        <td>#{{ $booking->id }}</td>
                                        <td>{{ ucfirst($booking->travelPackage->name) }}</td>
                                        <td>{{ $booking->date->format('d M Y') }}</td>
                                        <td>{{ $booking->total_guests }}</td>
                                        <td>{{ $booking->children_count }}</td>
                                        <td>
                                            <span class="badge bg-success">Confirmed</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-sm btn-info">
                                                View Details
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection