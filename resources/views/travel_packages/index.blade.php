@extends('layouts.frontend')

@section('title', 'Travel Packages')

@section('content')
    <div class="container">
        <h1>Explore Travel Packages</h1>

        {{-- Filtering and Search Form --}}
        <div class="mb-4">
            <form action="{{ route('travel_package.index') }}" method="GET" class="form-inline">
                {{-- Category Filter (using categories passed from controller) --}}
                <div class="form-group mr-3">
                    <label for="category" class="mr-2">Category:</label>
                    <select name="category" id="category" class="form-control form-control-sm">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                                {{ $category->name }} ({{ $category->travel_packages_count }})
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Type Filter (assuming 'type' is a distinct value on packages) --}}
                {{-- You might need to fetch distinct types in your controller or list them manually --}}
                {{-- <div class="form-group mr-3">
                    <label for="type" class="mr-2">Type:</label>
                    <select name="type" id="type" class="form-control form-control-sm">
                        <option value="">All Types</option>
                        <option value="religious" {{ request('type') == 'religious' ? 'selected' : '' }}>Religious</option>
                        <option value="cultural" {{ request('type') == 'cultural' ? 'selected' : '' }}>Cultural</option>
                        // Add other types
                    </select>
                </div> --}}

                {{-- Search Input --}}
                <div class="form-group mr-3">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Search..." value="{{ request('search') }}">
                </div>

                <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                {{-- Optional: Reset Filters Button --}}
                {{-- <a href="{{ route('travel_package.index') }}" class="btn btn-secondary btn-sm ml-2">Reset</a> --}}
            </form>
        </div>


        <div class="row">
            @forelse ($packages as $package)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        {{-- Display first gallery image as thumbnail --}}
                        @if ($package->galleries->count() > 0)
                            <img src="{{ Storage::url($package->galleries->first()->image) }}" class="card-img-top" alt="{{ $package->title }}" style="height: 200px; object-fit: cover;">
                        @else
                            {{-- Placeholder image or alt text --}}
                            <div class="bg-light text-center d-flex align-items-center justify-content-center" style="height: 200px;">
                                No Image
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $package->title }}</h5>
                            <p class="card-text">
                                Location: {{ $package->location }}<br>
                                Price: ${{ number_format($package->price) }}<br>
                                Type: {{ $package->type }}<br>
                                Duration: {{ $package->duration_days }} days
                            </p>
                            {{-- Link to the package details page --}}
                            <a href="{{ route('travel_package.show', $package) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>No travel packages found matching your criteria.</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination Links --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $packages->links() }}
        </div>
    </div>
@endsection