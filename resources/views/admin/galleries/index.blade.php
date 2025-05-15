@extends('layouts.app')
@section('title', 'Manage Gallery - ' . $travelPackage->title)

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-0">
                            {{ $travelPackage->title }} Gallery
                        </h3>
                        <small class="d-block mt-1">
                            <i class="fas fa-map-marker-alt"></i> {{ $travelPackage->location }}
                        </small>
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('admin.travel_packages.index') }}" 
                           class="btn btn-light">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                        <a href="{{ route('admin.travel_packages.galleries.create', $travelPackage) }}" 
                           class="btn btn-success">
                            <i class="fas fa-plus"></i> Add Image
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse($galleries as $gallery)
                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="card gallery-card h-100">
                                <div class="card-img-top position-relative">
                                    @if(Storage::disk('public')->exists($gallery->image))
                                    <img src="{{ asset('storage/' . $gallery->image) }}" 
                                         alt="{{ $gallery->name }}" 
                                         class="img-fluid"
                                         style="height: 200px; object-fit: cover;">
                                    @else
                                    <div class="missing-image bg-secondary d-flex flex-column align-items-center justify-content-center" 
                                         style="height: 200px;">
                                        <i class="fas fa-image fa-3x text-white-50 mb-2"></i>
                                        <span class="text-white-50">Image missing</span>
                                    </div>
                                    @endif
                                    <span class="position-absolute top-0 end-0 m-2 badge {{ $gallery->trashed() ? 'bg-danger' : 'bg-success' }}">
                                        {{ $gallery->trashed() ? 'Archived' : 'Active' }}
                                    </span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title mb-1">{{ $gallery->name }}</h5>
                                    <small class="text-muted">
                                        Added {{ $gallery->created_at->diffForHumans() }}
                                    </small>
                                </div>
                                <div class="card-footer bg-white">
                                    <div class="d-flex justify-content-between align-items-center">
                                        @if($gallery->trashed())
                                            <form action="{{ route('admin.travel_packages.galleries.restore', [$travelPackage, $gallery]) }}" 
                                                  method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" 
                                                        class="btn btn-sm btn-success"
                                                        title="Restore">
                                                    <i class="fas fa-trash-restore"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.travel_packages.galleries.destroy', [$travelPackage, $gallery]) }}" 
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-sm btn-danger"
                                                        title="Archive"
                                                        onclick="return confirm('Are you sure?')">
                                                    <i class="fas fa-archive"></i>
                                                </button>
                                            </form>
                                        @endif
                                        <div class="text-muted small">
                                            {{ $gallery->created_at->format('M d, Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center py-5">
                            <div class="empty-state">
                                <i class="fas fa-image fa-3x text-muted mb-3"></i>
                                <h4 class="h5">No images found!</h4>
                                <p class="text-muted">Start by adding images to this package</p>
                            </div>
                        </div>
                        @endforelse
                    </div>
                    
                    @if($galleries->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $galleries->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .gallery-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 8px;
        overflow: hidden;
    }
    
    .gallery-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.15);
    }
    
    .missing-image {
        opacity: 0.7;
        transition: opacity 0.3s ease;
    }
    
    .missing-image:hover {
        opacity: 1;
    }
    
    .empty-state {
        opacity: 0.7;
        transition: opacity 0.3s ease;
    }
    
    .empty-state:hover {
        opacity: 1;
    }
    
    .card-title {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>
@endsection