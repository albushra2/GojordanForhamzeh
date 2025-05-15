@extends('layouts.frontend')

@section('title', 'Travel Packages')

{{-- Push custom CSS for this page --}}
@push('style-alt')
<style>
    /* Custom styles for the Travel Packages Index page */

    .page-heading {
        text-align: center;
        margin-bottom: 40px;
        color: var(--color-primary); /* Use primary color for heading */
        font-weight: 700;
        font-size: 2.5rem;
    }

    /* Styling for the Filter/Search form */
    .filter-search-form {
        background-color: var(--color-white); /* Light background */
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 40px;
        box-shadow: rgba(0, 0, 0, 0.08) 0px 4px 12px;
        display: flex; /* Use flexbox for better alignment */
        flex-wrap: wrap; /* Allow wrapping on smaller screens */
        justify-content: center; /* Center items */
        gap: 15px; /* Space between form groups */
    }

    .filter-search-form .form-group {
        margin-bottom: 0; /* Remove default bottom margin */
        flex-grow: 1; /* Allow form groups to grow */
        min-width: 180px; /* Minimum width for input/select */
    }

    .filter-search-form label {
        font-weight: 600;
        color: var(--color-dark);
        margin-bottom: 5px; /* Space below label */
    }

    .filter-search-form .form-control,
    .filter-search-form .btn {
        font-family: 'Open Sans', sans-serif; /* Use body font for form elements */
        font-size: 0.95rem;
    }

    .filter-search-form .form-control {
         border-color: #ccc; /* Subtle border */
    }
     .filter-search-form .form-control:focus {
         border-color: var(--color-secondary);
         box-shadow: 0 0 0 0.2rem rgba(88, 164, 176, 0.25); /* Match secondary color */
     }


    .filter-search-form .btn-primary {
        background-color: var(--color-primary); /* Primary color */
        border-color: var(--color-primary);
        color: var(--color-white);
        font-weight: 600;
        padding: .375rem 1.5rem; /* Adjust padding */
        transition: background-color 0.3s ease, border-color 0.3s ease;
        align-self: flex-end; /* Align button to the bottom of the row */
    }

    .filter-search-form .btn-primary:hover {
        background-color: #0a3c47; /* Darker shade of primary */
        border-color: #0a3c47;
    }

     .filter-search-form .btn-sm {
         padding: .375rem 1.5rem; /* Ensure consistent button size */
     }


    /* Styling for the Package Cards */
    .package-card {
        border: none; /* Remove default Bootstrap card border */
        border-radius: 10px;
        overflow: hidden; /* Ensure rounded corners clip image */
        box-shadow: rgba(0, 0, 0, 0.05) 0px 3px 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background-color: var(--color-white); /* Card background */
        height: 100%; /* Make cards equal height in a row */
        display: flex; /* Use flex to organize card content vertically */
        flex-direction: column;
    }

    .package-card:hover {
        transform: translateY(-8px); /* Lift effect on hover */
        box-shadow: rgba(0, 0, 0, 0.1) 0px 8px 20px; /* More prominent shadow */
    }

    .package-card img.card-img-top {
        height: 220px; /* Slightly taller images */
        object-fit: cover;
        width: 100%; /* Ensure image covers card width */
    }

    .package-card .card-body {
        padding: 20px; /* Adjust padding */
        flex-grow: 1; /* Allow body to take remaining space */
        display: flex;
        flex-direction: column;
        justify-content: space-between; /* Push button to bottom */
    }

    .package-card .card-title {
        font-family: 'Montserrat', sans-serif;
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--color-dark); /* Dark title */
        margin-bottom: 15px;
    }

    .package-details {
        font-size: 0.95rem;
        color: #555; /* Slightly lighter text for details */
        margin-bottom: 15px;
    }

     .package-details p {
         margin-bottom: 6px; /* Space between detail lines */
     }

    .package-details i {
        margin-right: 5px;
        color: var(--color-secondary); /* Use secondary color for icons */
        font-size: 1.1rem;
        width: 20px; /* Fixed width for icons for alignment */
        text-align: center;
    }

     /* Style for the rating */
     .package-details .rating {
         color: var(--color-gold); /* Gold color for stars */
         font-weight: 600;
     }

    .package-details .price {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--color-accent); /* Accent color for price */
        margin-top: 10px;
    }


    .package-card .btn-primary {
        background-color: var(--color-accent); /* Accent color for button */
        border-color: var(--color-accent);
        color: var(--color-white);
        font-weight: 600;
        border-radius: 25px; /* Rounded button */
        padding: 10px 25px;
        align-self: flex-start; /* Align button to the left */
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .package-card .btn-primary:hover {
        background-color: #c0634d; /* Darker accent */
        border-color: #c0634d;
    }

    /* Empty state styling */
    .empty-packages {
        text-align: center;
        padding: 50px 20px;
        background-color: var(--color-white);
        border-radius: 8px;
        box-shadow: rgba(0, 0, 0, 0.05) 0px 3px 10px;
        color: var(--color-dark);
        font-size: 1.1rem;
    }

    /* Pagination styling */
    .pagination .page-link {
        color: var(--color-primary); /* Primary color for links */
        border-color: #ccc; /* Subtle border */
    }
    .pagination .page-item.active .page-link {
        background-color: var(--color-primary); /* Primary background for active */
        border-color: var(--color-primary);
        color: var(--color-white);
    }
     .pagination .page-link:hover {
         color: var(--color-dark);
         background-color: var(--color-light);
         border-color: var(--color-secondary);
     }

    /* Responsive adjustments */
    @media (max-width: 767.98px) { /* Below medium breakpoint */
        .filter-search-form {
            flex-direction: column; /* Stack form items vertically */
            gap: 20px; /* Increase gap */
            padding: 20px;
        }
        .filter-search-form .form-group {
            width: 100%; /* Full width for inputs */
             min-width: unset;
        }
         .filter-search-form .btn {
             width: 100%; /* Full width button */
             align-self: stretch; /* Stretch button */
         }
         .page-heading {
             font-size: 2rem;
         }
          .package-card .card-body {
              padding: 15px;
          }
         .package-card .card-title {
             font-size: 1.2rem;
             margin-bottom: 10px;
         }
         .package-details {
             font-size: 0.9rem;
         }
          .package-card .btn-primary {
              width: 100%; /* Full width button on mobile */
              text-align: center;
              padding: 8px 20px;
         }

    }
</style>
@endpush

@section('content')
    <div class="container">
        <h1 class="page-heading">Explore Travel Packages</h1>

        {{-- Filtering and Search Form --}}
        {{-- Using flex utility classes from Bootstrap can also help with layout --}}
        <div class="filter-search-form">
            <form action="{{ route('travel_package.index') }}" method="GET" class="form-inline w-100 justify-content-md-center">
                {{-- Category Filter (using categories passed from controller) --}}
                <div class="form-group mr-md-3 mb-md-0 mb-3"> {{-- Added responsive margin --}}
                    <label for="category" class="mr-2 d-block d-md-inline-block">Category:</label> {{-- Display block on mobile --}}
                    <select name="category" id="category" class="form-control form-control-sm w-100 w-md-auto"> {{-- Full width on mobile --}}
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                                {{ $category->name }} ({{ $category->travel_packages_count }})
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Type Filter - Uncomment and implement in controller if needed --}}
                 <div class="form-group mr-md-3 mb-md-0 mb-3">
                     <label for="type" class="mr-2 d-block d-md-inline-block">Type:</label>
                     <select name="type" id="type" class="form-control form-control-sm w-100 w-md-auto">
                         <option value="">All Types</option>
                         {{-- You need to get these types from your data or define them --}}
                         <option value="religious" {{ request('type') == 'religious' ? 'selected' : '' }}>Religious</option>
                         <option value="cultural" {{ request('type') == 'cultural' ? 'selected' : '' }}>Cultural</option>
                         <option value="adventure" {{ request('type') == 'adventure' ? 'selected' : '' }}>Adventure</option>
                         <option value="historical" {{ request('type') == 'historical' ? 'selected' : '' }}>Historical</option>
                         {{-- Add other types relevant to your packages --}}
                     </select>
                 </div>


                {{-- Search Input --}}
                <div class="form-group mr-md-3 mb-md-0 mb-3">
                    <label for="search" class="mr-2 d-block d-md-inline-block">Search:</label>
                    <input type="text" name="search" id="search" class="form-control form-control-sm w-100 w-md-auto" placeholder="Search..." value="{{ request('search') }}">
                </div>

                <button type="submit" class="btn btn-primary btn-sm">Filter / Search</button>
                {{-- Optional: Reset Filters Button --}}
                 @if(request('category') || request('type') || request('search'))
                    <a href="{{ route('travel_package.index') }}" class="btn btn-secondary btn-sm ml-md-2">Reset</a>
                 @endif
            </form>
        </div>


        <div class="row">
            @forelse ($packages as $package)
                <div class="col-md-6 col-lg-4 mb-4"> {{-- Use col-md-6 and col-lg-4 for better responsiveness --}}
                    <div class="card package-card">
                        {{-- Display first gallery image or featured_image --}}
                        @php
                            $imageUrl = null;
                            if ($package->featured_image) {
                                $imageUrl = Storage::url($package->featured_image);
                            } elseif ($package->galleries->count() > 0) {
                                $imageUrl = Storage::url($package->galleries->first()->image);
                            }
                        @endphp

                        @if ($imageUrl)
                            <img src="{{ $imageUrl }}" class="card-img-top" alt="{{ $package->title }}">
                            
                        @else
                            {{-- Placeholder image or alt text --}}
                            <div class="bg-light text-center d-flex align-items-center justify-content-center" style="height: 220px; color: #6c757d;">
                                No Image Available
                            </div>
                        @endif

                        <div class="card-body">
                            <div> {{-- Wrapper for title and details --}}
                                <h5 class="card-title">{{ $package->title }}</h5>
                                <div class="package-details">
                                    <p><i class="fas fa-map-marker-alt"></i> Location: {{ $package->location }}</p>
                                    <p><i class="far fa-clock"></i> Duration: {{ $package->duration_days }} days</p>
                                     {{-- Display Type if available --}}
                                     @if($package->type)
                                        <p><i class="fas fa-tag"></i> Type: {{ ucfirst($package->type) }}</p>
                                     @endif
                                     {{-- Display Rating and Reviews if available --}}
                                     @if($package->average_rating > 0)
                                        <p>
                                             <span class="rating">
                                                 {{-- Display star icons based on rating --}}
                                                 @for ($i = 0; $i < 5; $i++)
                                                     @if ($package->average_rating > $i)
                                                         @if ($package->average_rating > $i && $package->average_rating < $i + 1)
                                                            <i class="fas fa-star-half-alt"></i> {{-- Half star --}}
                                                         @else
                                                            <i class="fas fa-star"></i> {{-- Full star --}}
                                                         @endif
                                                     @else
                                                         <i class="far fa-star"></i> {{-- Empty star --}}
                                                     @endif
                                                 @endfor
                                                 ({{ number_format($package->average_rating, 1) }})
                                             </span>
                                             ({{ $package->reviews_count }} Reviews)
                                        </p>
                                     @else
                                        <p><i class="far fa-star"></i> No reviews yet</p>
                                     @endif

                                    <p class="price"><i class="fas fa-dollar-sign"></i> Price: ${{ number_format($package->price) }}</p>
                                </div>
                            </div>
                            {{-- Link to the package details page --}}
                            <a href="{{ route('travel_package.show', $package) }}" class="btn btn-primary mt-3">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="empty-packages">
                         <p>No travel packages found matching your criteria.</p>
                         @if(request('category') || request('type') || request('search'))
                              <a href="{{ route('travel_package.index') }}" class="btn btn-secondary mt-3">Clear Filters</a>
                         @endif
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Pagination Links --}}
        @if($packages->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $packages->links() }}
            </div>
        @endif
    </div>
@endsection

{{-- Optional: Push custom scripts if needed --}}
{{-- @push('script-alt')
<script>
    // Any specific scripts for this page
</script>
@endpush --}}