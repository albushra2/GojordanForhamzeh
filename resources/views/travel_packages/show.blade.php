@extends('layouts.frontend')

@section('title', $package->title)

@section('content')
<style>
    /* Modern Package Show Styles with Blog Elements */
    .package-hero {
        position: relative;
        height: 60vh;
        min-height: 500px;
        background: linear-gradient(135deg, rgba(223, 52, 98, 0.85), rgba(230, 105, 0, 0.85)), 
                    url('{{ optional($package->galleries->first())->image ? Storage::url($package->galleries->first()->image) : asset('frontend/assets/img/default-package.jpg') }}');
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        margin-bottom: 2rem;
        overflow: hidden;
        border-radius: 0 0 20px 20px;
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
        color: white;
        padding: 2rem;
        max-width: 900px;
        margin: 0 auto;
        text-align: center;
    }
    
    .package-title {
        font-size: 3rem;
        font-weight: 800;
        text-shadow: 2px 2px 8px rgba(0,0,0,0.6);
        margin-bottom: 1.2rem;
        animation: fadeInDown 0.8s ease;
        line-height: 1.2;
    }
    
    .package-subtitle {
        font-size: 1.4rem;
        font-weight: 300;
        margin-bottom: 2rem;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
    }
    
    .package-meta {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 1rem;
        margin: 2rem 0;
    }
    
    .package-meta-item {
        display: flex;
        align-items: center;
        background: rgba(255,255,255,0.2);
        backdrop-filter: blur(5px);
        padding: 0.7rem 1.5rem;
        border-radius: 50px;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    
    .package-meta-item:hover {
        background: rgba(255,255,255,0.3);
        transform: translateY(-3px);
    }
    
    .price-tag {
        background: linear-gradient(135deg, #df3462, #e66900);
        color: white;
        padding: 1.2rem 2.5rem;
        border-radius: 12px;
        font-size: 1.8rem;
        font-weight: 700;
        display: inline-block;
        margin: 1.5rem 0;
        box-shadow: 0 8px 25px rgba(223, 52, 98, 0.4);
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .price-tag:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(223, 52, 98, 0.5);
    }
    
    /* Blog-style content sections */
    .content-section {
        background: white;
        border-radius: 12px;
        padding: 2.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }
    
    .section-title {
        font-size: 1.8rem;
        color: #2c3e50;
        margin-bottom: 1.5rem;
        padding-bottom: 0.8rem;
        border-bottom: 2px solid #f0f0f0;
        position: relative;
    }
    
    .section-title:after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, #df3462, #e66900);
    }
    
    /* Blog-style gallery */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1.2rem;
        margin: 2rem 0;
    }
    
    .gallery-item {
        border-radius: 12px;
        overflow: hidden;
        height: 200px;
        position: relative;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: all 0.4s ease;
    }
    
    .gallery-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    }
    
    /* Blog-style itinerary */
    .itinerary-day {
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px dashed #eee;
    }
    
    .day-title {
        font-size: 1.4rem;
        color: #df3462;
        margin-bottom: 0.8rem;
        display: flex;
        align-items: center;
    }
    
    .day-title:before {
        content: '';
        display: inline-block;
        width: 25px;
        height: 25px;
        background: linear-gradient(135deg, #df3462, #e66900);
        border-radius: 50%;
        margin-right: 10px;
        color: white;
        text-align: center;
        line-height: 25px;
        font-size: 0.9rem;
    }
    
    /* Blog-style reviews */
    .review-card {
        background: #f9f9f9;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        border-left: 4px solid #df3462;
        transition: all 0.3s ease;
    }
    
    .review-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    /* Responsive adjustments */
    @media (max-width: 992px) {
        .package-title {
            font-size: 2.5rem;
        }
        .package-subtitle {
            font-size: 1.2rem;
        }
    }
    
    @media (max-width: 768px) {
        .package-hero {
            height: 50vh;
            min-height: 400px;
        }
        .package-title {
            font-size: 2rem;
        }
        .package-meta {
            gap: 0.8rem;
        }
        .package-meta-item {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }
        .content-section {
            padding: 1.5rem;
        }
    }
    
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<!-- Hero Section -->
<section class="package-hero">
    <div class="hero-content">
        <h1 class="package-title">{{ $package->title }}</h1>
        <p class="package-subtitle">{{ $package->short_description }}</p>
        
        <div class="package-meta">
            <div class="package-meta-item">
                <i class="fas fa-map-marker-alt me-2"></i> {{ $package->location }}
            </div>
            <div class="package-meta-item">
                <i class="fas fa-tag me-2"></i> {{ $package->type }}
            </div>
            <div class="package-meta-item">
                <i class="fas fa-calendar-alt me-2"></i> {{ $package->duration_days }} days
            </div>
            <div class="package-meta-item">
                <i class="fas fa-users me-2"></i> Max {{ $package->max_people }} people
            </div>
        </div>
        
        <div class="price-tag">
            {{ number_format($package->price * 0.71, 3) }} JOD
            @if($package->discount)
                <span class="original-price">{{ number_format($package->original_price * 0.71, 3) }} JOD</span>
            @endif
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <!-- Description -->
            <section class="content-section">
                <h2 class="section-title">Journey Overview</h2>
                <div class="package-content">
                    {!! $package->description !!}
                </div>
            </section>

            <!-- Itinerary -->
            @if($package->itinerary)
            <section class="content-section">
                <h2 class="section-title">Detailed Itinerary</h2>
                <div class="itinerary-content">
                    @foreach(explode("\n", $package->itinerary) as $day)
                        @if(trim($day))
                        <div class="itinerary-day">
                            <h3 class="day-title">Day {{ $loop->iteration }}</h3>
                            <p>{{ $day }}</p>
                        </div>
                        @endif
                    @endforeach
                </div>
            </section>
            @endif

            <!-- Gallery -->
            @if ($package->galleries->count() > 0)
            <section class="content-section">
                <h2 class="section-title">Photo Journal</h2>
                <p>Explore moments from this incredible journey through our travelers' photos</p>
                <div class="gallery-grid">
                    @foreach ($package->galleries as $gallery)
                    <a href="{{ Storage::url($gallery->image) }}" data-toggle="lightbox" class="gallery-item">
                        <img src="{{ Storage::url($gallery->image) }}" alt="Gallery Image" class="img-fluid">
                    </a>
                    @endforeach
                </div>
            </section>
            @endif

            <!-- Reviews -->
            <section class="content-section">
                <h2 class="section-title">Traveler Stories</h2>
                <p class="mb-4">What our adventurers say about this experience</p>
                
                @forelse ($package->reviews as $review)
                <div class="review-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h4 class="review-author mb-1">{{ $review->user->name ?? 'Anonymous Traveler' }}</h4>
                            <div class="rating-stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->rating)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                        </div>
                        <span class="review-date">{{ $review->created_at->format('M d, Y') }}</span>
                    </div>
                    <p class="mb-0">{{ $review->comment }}</p>
                </div>
                @empty
                <div class="text-center py-4">
                    <i class="fas fa-comments fa-3x text-muted mb-3"></i>
                    <h4>No reviews yet</h4>
                    <p>Be the first to share your experience!</p>
                </div>
                @endforelse
            </section>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Booking Card -->
            <div class="content-section sticky-top" style="top: 20px;">
                <h3 class="section-title">Ready to Explore?</h3>
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-3">
                        <span>Price per person:</span>
                        <strong>{{ number_format($package->price * 0.71, 3) }} JOD</strong>
                    </div>
                    @if($package->discount)
                    <div class="d-flex justify-content-between mb-3">
                        <span>Discount:</span>
                        <strong class="text-success">{{ $package->discount }}% OFF</strong>
                    </div>
                    @endif
                    <div class="d-flex justify-content-between mb-3">
                        <span>Duration:</span>
                        <strong>{{ $package->duration_days }} days</strong>
                    </div>
                    <hr class="my-3">
                    <div class="d-flex justify-content-between fw-bold fs-5">
                        <span>Total:</span>
                        <span class="text-primary">{{ number_format($package->price * 0.71, 3) }} JOD</span>
                    </div>
                </div>
                <button class="btn btn-primary btn-lg w-100 py-3">
                    <i class="fas fa-calendar-check me-2"></i> Book This Adventure
                </button>
                <p class="text-muted text-center mt-2 mb-0">You must login to make a booking</p>
            </div>

            <!-- Travel Tips (Blog-style sidebar) -->
            <div class="content-section">
                <h3 class="section-title">Travel Tips</h3>
                <div class="mb-3">
                    <h4><i class="fas fa-suitcase-rolling text-primary me-2"></i> What to Pack</h4>
                    <p>Comfortable walking shoes, light layers for changing temperatures, sunscreen, and your sense of adventure!</p>
                </div>
                <div class="mb-3">
                    <h4><i class="fas fa-utensils text-primary me-2"></i> Local Cuisine</h4>
                    <p>Don't miss trying Mansaf (Jordan's national dish) and fresh mint lemonade.</p>
                </div>
                <div>
                    <h4><i class="fas fa-camera text-primary me-2"></i> Photo Tips</h4>
                    <p>Golden hour provides the best lighting for Petra's rose-red cliffs.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Related Packages -->
@if ($related->count() > 0)
<section class="container mt-5">
    <div class="text-center mb-5">
        <h2 class="section-title">More Adventures in Jordan</h2>
        <p class="lead">Discover other incredible journeys you might enjoy</p>
    </div>
    
    <div class="row g-4">
        @foreach ($related as $relatedPackage)
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100 overflow-hidden">
                <img src="{{ optional($relatedPackage->galleries->first())->image ? Storage::url($relatedPackage->galleries->first()->image) : asset('frontend/assets/img/default-package.jpg') }}" 
                     class="card-img-top" alt="{{ $relatedPackage->title }}" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-primary">{{ $relatedPackage->type }}</span>
                        <small class="text-muted">
                            <i class="fas fa-calendar-alt me-1"></i>
                            {{ $relatedPackage->duration_days }} days
                        </small>
                    </div>
                    <h4 class="card-title">{{ Str::limit($relatedPackage->title, 40) }}</h4>
                    <p class="text-muted">
                        <i class="fas fa-map-marker-alt me-1"></i> {{ $relatedPackage->location }}
                    </p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <h5 class="mb-0 text-primary">
                            {{ number_format($relatedPackage->price * 0.71, 3) }} JOD
                        </h5>
                        <a href="{{ route('travel_packages.show', $relatedPackage) }}" class="btn btn-sm btn-outline-primary">
                            Details <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif

@endsection