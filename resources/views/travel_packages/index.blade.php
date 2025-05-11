@extends('layouts.frontend')

@section('title', 'Travel Packages')

@section('content')

<div class="container py-5">
    <h1 class="mb-4">Travel Packages</h1>
    
    <div class="row">
        <!-- Filters Sidebar -->
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-header">Filter Packages</div>
                <div class="card-body">
                    <form method="GET" action="{{ route('travel_package.index') }}">
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select name="category" id="category" class="form-select">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }} ({{ $category->travel_packages_count }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="type" class="form-label">Package Type</label>
                            <select name="type" id="type" class="form-select">
                                <option value="">All Types</option>
                                <option value="group" {{ request('type') == 'group' ? 'selected' : '' }}>Group Tour</option>
                                <option value="private" {{ request('type') == 'private' ? 'selected' : '' }}>Private Tour</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="search" class="form-label">Search</label>
                            <input type="text" name="search" id="search" class="form-control" 
                                   value="{{ request('search') }}" placeholder="Search packages...">
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Packages List -->
        <div class="col-md-9">
            <div class="row">
                @forelse($packages as $package)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            @if($package->galleries->isNotEmpty())
                                <img src="{{ asset($package->galleries->first()->image_path) }}" 
                                     class="card-img-top" alt="{{ $package->title }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $package->title }}</h5>
                                <p class="text-muted small mb-2">
                                    {{ $package->category->name }} • 
                                    {{ $package->type === 'group' ? 'Group Tour' : 'Private Tour' }}
                                </p>
                                <p class="card-text">{{ Str::limit($package->description, 100) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="h5 text-primary">{{ $package->price }} $</span>
                                    <a href="{{ route('travel_package.show', $package) }}" class="btn btn-sm btn-outline-primary">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info">No packages found matching your criteria.</div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $packages->links() }}
            </div>
        </div>
    </div>
</div>
@endsection