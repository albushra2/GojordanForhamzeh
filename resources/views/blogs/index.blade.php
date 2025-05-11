@extends('layouts.frontend')

@section('title', 'Travel Blog - Discover Jordan')

@section('content')
<style>
    .package-hero {
        height: 80vh;
        min-height: 600px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }
    
    .hero-bg {
        background-image: url('{{ asset("frontend/assets/img/packages-hero.jpg") }}');
        background-size: cover;
        background-position: center;
        z-index: 0;
    }
    
    .package-hero h1 {
        text-shadow: 2px 2px 8px rgba(0,0,0,0.3);
        font-weight: 800;
        letter-spacing: 1px;
    }
    
    .package-hero .lead {
        font-size: 1.5rem;
        text-shadow: 1px 1px 4px rgba(0,0,0,0.3);
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .package-hero .btn-outline-light {
        border: 2px solid white;
        font-weight: 600;
        padding: 0.75rem 2rem;
        font-size: 1.1rem;
        letter-spacing: 0.5px;
        transition: all 0.4s ease;
        border-radius: 50px;
        margin-top: 1rem;
    }
    
    .package-hero .btn-outline-light:hover {
        background-color: white;
        color: #df3462;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
    
    @media (max-width: 768px) {
        .package-hero {
            height: 70vh;
            min-height: 500px;
        }
        
        .package-hero h1 {
            font-size: 2.5rem;
        }
        
        .package-hero .lead {
            font-size: 1.2rem;
        }
    }
    .blog-card {
        transition: all 0.3s ease;
        border-radius: 10px !important;
    }
    
    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
    }
    
    .blog-img-container {
        overflow: hidden;
    }
    
    .blog-card img {
        transition: transform 0.5s ease;
    }
    
    .blog-card:hover img {
        transform: scale(1.05);
    }
    
    .blog-badge {
        border-top-right-radius: 5px;
        font-size: 0.8rem;
    }
    
    .card-title {
        font-weight: 600;
        color: #333;
    }
    
    .btn-outline-primary {
        border-width: 2px;
        font-weight: 500;
    }
    section {
    padding: 4rem 0;
    margin: 2rem 0;
}

/* Or for specific section classes */
.content-section {
    padding: 5rem 0;
}

.hero-section {
    margin-bottom: 3rem;
}
</style>

<section class="package-hero position-relative text-white">
    <!-- Background Image -->
    <div class="hero-bg position-absolute w-100 h-100"></div>
    
    <!-- Gradient Overlay -->
    <div class="overlay position-absolute w-100 h-100" style="background: linear-gradient(to right, rgba(223, 52, 98, 0.8), rgba(230, 105, 0, 0.8)); z-index:1;"></div>
    
    <!-- Content -->
    <div class="container position-relative z-2 text-center py-5">
        <h1 class="display-3 fw-bold mb-3 animate__animated animate__fadeInDown">Discover Jordan's Wonders</h1>
        <p class="lead mb-4 animate__animated animate__fadeInUp animate__delay-1s">Explore our curated travel packages for unforgettable experiences</p>
        <a href="#packages" class="btn btn-outline-light btn-lg animate__animated animate__fadeInUp animate__delay-2s">
            Explore Packages <i class="fas fa-arrow-right ms-2"></i>
        </a>
    </div>
</section>

<div class="row g-4">
    @forelse ($blogs as $blog)
        <div class="col-lg-4 col-md-6">
            <div class="blog-card card h-100 border-0 shadow-sm overflow-hidden">
                <!-- Blog Image -->
                @if($blog->image)
                <div class="blog-img-container position-relative">
                    <img src="{{ Storage::url($blog->image) }}" class="card-img-top" alt="{{ $blog->title }}" style="height: 220px; object-fit: cover;">
                    <div class="blog-badge position-absolute bottom-0 start-0 bg-primary text-white px-3 py-1">
                        {{ $blog->category->name ?? 'Uncategorized' }}
                    </div>
                </div>
                @else
                <div class="blog-img-placeholder bg-light d-flex align-items-center justify-content-center" style="height: 220px;">
                    <i class="fas fa-camera fa-3x text-muted"></i>
                </div>
                @endif

                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <small class="text-muted">
                            <i class="far fa-calendar-alt me-1"></i>
                            {{ $blog->created_at->format('M d, Y') }}
                        </small>
                        <small class="text-muted">
                            <i class="far fa-eye me-1"></i>
                            {{ $blog->reads }} views
                        </small>
                    </div>
                    
                    <h5 class="card-title mb-3">{{ $blog->title }}</h5>
                    
                    <p class="card-text text-muted mb-3">
                        {{ Str::limit($blog->excerpt ?? $blog->body, 120) }}
                    </p>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('blogs.show', $blog) }}" class="btn btn-outline-primary btn-sm">
                            Read More <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                        <small class="text-muted">
                            <i class="far fa-user me-1"></i>
                            {{ $blog->user->name ?? 'Admin' }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="text-center py-5">
                <i class="fas fa-newspaper fa-4x text-muted mb-3"></i>
                <h4>No blog posts found</h4>
                <p class="text-muted">Check back later for new articles</p>
            </div>
        </div>
    @endforelse
</div>

<!-- Pagination -->
@if($blogs->hasPages())
<div class="d-flex justify-content-center mt-5">
    <nav aria-label="Blog pagination">
        {{ $blogs->links() }}
    </nav>
</div>
@endif
