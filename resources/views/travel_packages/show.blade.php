@extends('layouts.frontend')
@section('content')
<div class="container py-5">
    <!-- Main Package Info -->
    <div class="row mb-5">
        <!-- Gallery -->
        <div class="col-md-8">
            @if($package->galleries->isNotEmpty())
                <div class="gallery-main mb-3">
                    <img src="{{ asset($package->galleries->first()->image_path) }}" 
                         class="img-fluid rounded" alt="{{ $package->title }}">
                </div>
                <div class="gallery-thumbnails row">
                    @foreach($package->galleries as $gallery)
                        <div class="col-3">
                            <img src="{{ asset($gallery->image_path) }}" 
                                 class="img-thumbnail" 
                                 alt="Gallery image {{ $loop->iteration }}">
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Package Details -->
        <div class="col-md-4">
            <h1>{{ $package->title }}</h1>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge bg-primary">{{ $package->category->name }}</span>
                <span class="h4 text-primary">{{ $package->price }}</span>
            </div>
            
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Package Details</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Duration:</span>
                            <span>{{ $package->duration }} days</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Tour Type:</span>
                            <span>{{ ucfirst($package->type) }}</span>
                        </li>
                        @if($package->tourGuide)
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Tour Guide:</span>
                                <span>{{ $package->tourGuide->name }}</span>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-primary btn-lg">Book Now</button>
            </div>
        </div>
    </div>

    <!-- Reviews -->
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="mb-4">Reviews</h2>
            @forelse($package->reviews as $review)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="card-title">{{ $review->user->name }}</h5>
                            <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="card-text">{{ $review->comment }}</p>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">No reviews yet. Be the first to review this package!</div>
            @endforelse
        </div>
    </div>

    <!-- Related Packages -->
    <div class="row">
        <h2 class="mb-4">Related Packages</h2>
        @foreach($related as $package)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    @if($package->galleries->isNotEmpty())
                        <img src="{{ asset($package->galleries->first()->image_path) }}" 
                             class="card-img-top" alt="{{ $package->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $package->title }}</h5>
                        <p class="text-muted small">{{ $package->category->name }}</p>
                        <a href="{{ route('travel_packages.show', $package) }}" 
                           class="btn btn-sm btn-outline-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection