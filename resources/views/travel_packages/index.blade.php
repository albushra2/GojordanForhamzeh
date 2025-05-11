@extends('layouts.frontend')

@section('title', 'Travel Packages')

@section('content')

<style>
    /* Modern Styling */
    .package-hero {
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset("frontend/assets/img/packages-hero.jpg") }}');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 5rem 0;
        margin-bottom: 3rem;
        text-align: center;
    }
    
    .package-card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .package-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    }
    
    .package-img {
        height: 200px;
        object-fit: cover;
        width: 100%;
    }
    
    .package-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #ce965c;
        color: white;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: bold;
    }
    
    .card-body {
        padding: 1.5rem;
    }
    
    .package-title {
        font-size: 1.25rem;
        font-weight: 600;
        /* margin-bottom: 0.5rem; */
        color: #333;
    }
    
    .package-meta {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }
    
    .package-price {
        font-size: 1.3rem;
        font-weight: bold;
        color: #ce965c;
        margin: 1rem 0;
    }
    
    .filter-section {
        background: white;
        padding: 1.5rem;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-bottom: 2rem;
    }
    
    .no-packages {
        text-align: center;
        padding: 3rem;
        background: #f9f9f9;
        border-radius: 10px;
    }
    
    .category-filter .form-check-label {
        cursor: pointer;
    }
    
    .category-filter .form-check-input:checked + .form-check-label {
        color: #ce965c;
        font-weight: 500;
    }
    .package-hero {
    background-image: url('{{ asset("frontend/assets/img/packages-hero.jpg") }}');
    background-size: cover;
    background-position: center;
    height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.package-hero h1,
.package-hero p {
    color: white;
}

.package-hero .btn-outline-light {
    border: 2px solid white;
    font-weight: 500;
    padding: 0.75rem 1.5rem;
    transition: all 0.3s ease-in-out;
}

.package-hero .btn-outline-light:hover {
    background-color: white;
    color: #000;
}


</style>

<!-- Hero Section -->
<section class="package-hero position-relative text-white" style="margin: 0px;">
    <div class="overlay position-absolute w-100 h-100" style="background: linear-gradient(to right, #df3462, #e66900); z-index:1;"></div>
    <div class="container position-relative z-2 text-center py-5">
        <h1 class="display-3 fw-bold mb-3 animate__animated animate__fadeInDown">Discover Jordan's Wonders</h1>
        <p class="lead animate__animated animate__fadeInUp">Explore our curated travel packages for unforgettable experiences</p>
  
        </a>
    </div>
</section>


<div class="container">
    <!-- Filter Section -->
    <div class="filter-section">
        <form action="{{ route('travel_package.index') }}" method="GET">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="search" class="form-label">Search Packages</label>
                    <input type="text" name="search" class="form-control" placeholder="Search by title or location..." value="{{ request('search') }}">
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="category" class="form-label">Filter by Category</label>
                    <select name="category" id="category" class="form-select">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                                {{ $category->name }} ({{ $category->travel_packages_count }})
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-4 mb-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary me-2">Apply Filters</button>
                    <a href="{{ route('travel_package.index') }}" class="btn btn-outline-secondary">Reset</a>
                </div>
            </div>
            
            <!-- Additional filters can be added here -->
            <div class="row mt-3">
                <div class="col-12">
                    <div class="category-filter">
                        <label class="form-label d-block">Quick Categories:</label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($categories as $category)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="category" id="cat-{{ $category->id }}" 
                                       value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'checked' : '' }}>
                                <label class="form-check-label" for="cat-{{ $category->id }}">
                                    {{ $category->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <!-- Packages Grid -->
    <div class="row">
        @forelse ($packages as $package)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="package-card">
                    @if ($package->galleries->count() > 0)
                        <img src="{{ Storage::url($package->galleries->first()->image) }}" class="package-img" alt="{{ $package->title }}">
                    @else
                        <div class="package-img bg-light d-flex align-items-center justify-content-center text-muted">
                            <span>No Image Available</span>
                        </div>
                    @endif
                    
                    @if($package->is_featured)
                        <span class="package-badge">Featured</span>
                    @endif
                    
                    <div class="card-body">
                        <h3 class="package-title">{{ $package->title }}</h3>
                        
                        <div class="package-meta">
                            <span><i class="bx bx-map"></i> {{ $package->location }}</span><br>
                            <span><i class="bx bx-time"></i> {{ $package->duration_days }} days</span> | 
                            <span><i class="bx bx-category"></i> {{ $package->type }}</span>
                        </div>
                        
                        <div class="package-price">
                            {{ number_format($package->price, 3) }} JOD
                            @if($package->discount)
                                <small class="text-danger text-decoration-line-through ms-2">{{ number_format($package->original_price, 3) }} JOD</small>
                            @endif
                        </div>
                        
                        <p class="card-text text-muted mb-3">
                            {{ Str::limit($package->excerpt, 100) }}
                        </p>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('travel_package.show', $package) }}" class="btn btn-outline-primary">View Details</a>
                            @if($package->tourGuide)
                                <small class="text-muted">Guide: {{ $package->tourGuide->name }}</small>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="no-packages">
                    <i class="bx bx-compass bx-lg mb-3 text-muted"></i>
                    <h4>No packages found</h4>
                    <p class="text-muted">We couldn't find any packages matching your criteria.</p>
                    <a href="{{ route('travel_package.index') }}" class="btn btn-primary">Reset Filters</a>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-5">
        {{ $packages->links() }}
    </div>
</div>

@endsection