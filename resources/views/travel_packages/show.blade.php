@extends('layouts.frontend')

@section('title', $package->title)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $package->title }}</h1>

                {{-- Package Details --}}
                <p class="text-muted">
                    Location: {{ $package->location }} | Type: {{ $package->type }} | Duration: {{ $package->duration_days }} days
                </p>
                <p class="lead">Price: ${{ number_format($package->price) }}</p>

                <div class="mb-4">
                    <h3>Description</h3>
                    <p>{{ $package->description }}</p>
                </div>

                {{-- Itinerary, Included, Excluded --}}
                 @if($package->itinerary)
                    <div class="mb-4">
                        <h3>Itinerary</h3>
                        <div>{!! nl2br(e($package->itinerary)) !!}</div> {{-- Display multiline text --}}
                    </div>
                @endif

                 @if($package->included)
                    <div class="mb-4">
                        <h3>What's Included</h3>
                        <div>{!! nl2br(e($package->included)) !!}</div> {{-- Display multiline text --}}
                    </div>
                @endif

                @if($package->excluded)
                    <div class="mb-4">
                        <h3>What's Excluded</h3>
                        <div>{!! nl2br(e($package->excluded)) !!}</div> {{-- Display multiline text --}}
                    </div>
                @endif

                {{-- Gallery Section --}}
                @if ($package->galleries->count() > 0)
                    <div class="mb-4">
                        <h3>Gallery</h3>
                        <div class="row">
                            @foreach ($package->galleries as $gallery)
                                <div class="col-md-3 col-sm-4 col-6 mb-4">
                                    <a href="{{ Storage::url($gallery->image) }}" data-toggle="lightbox" data-gallery="package-gallery">
                                         <img src="{{ Storage::url($gallery->image) }}" class="img-fluid rounded" alt="Gallery Image" style="height: 100px; object-fit: cover;">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                     {{-- You'll need to include Ekko Lightbox or similar library for the data-toggle="lightbox" to work --}}
                @endif

                {{-- Tour Guide Information --}}
                 @if ($package->tourGuide)
                    <div class="mb-4">
                        <h3>Tour Guide</h3>
                        <p>Guide Name: {{ $package->tourGuide->name }}</p>
                         {{-- Display other guide info if available --}}
                    </div>
                @endif

                {{-- Reviews Section --}}
                <div class="reviews-section mb-4">
                    <h3>Reviews ({{ $package->reviews->count() }})</h3>
                    @forelse ($package->reviews as $review)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-muted">
                                    {{ $review->user->name ?? 'Anonymous User' }} | Rating: {{ $review->rating }}/5
                                </h6>
                                <p class="card-text">{{ $review->comment }}</p>
                            </div>
                        </div>
                    @empty
                        <p>No reviews yet. Be the first to leave a review!</p>
                    @endforelse
                    {{-- Add a form to leave a review if users can submit reviews --}}
                </div>

            </div>

            {{-- Sidebar for Related Packages --}}
            @if ($related->count() > 0)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Related Packages</h5>
                            <ul>
                                @foreach ($related as $relatedPackage)
                                    <li>
                                        <a href="{{ route('travel_packages.show', $relatedPackage) }}">
                                            {{ $relatedPackage->title }}
                                        </a>
                                         ({{ $relatedPackage->location }})
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection