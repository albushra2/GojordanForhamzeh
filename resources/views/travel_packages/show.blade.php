@extends('layouts.frontend')

@section('title', $package->title)

{{-- Push custom CSS for this page --}}
@push('style-alt')
<style>
    /* Custom styles for the Travel Package Show page */

    .package-detail-section {
        padding: 40px 0;
        background-color: var(--color-light); /* Use light background */
    }

    .package-detail-title {
        font-family: 'Montserrat', sans-serif;
        color: var(--color-primary); /* Primary color for main title */
        font-weight: 700;
        margin-bottom: 15px;
        font-size: 2.2rem;
    }

    .location-text {
        color: #666; /* Subtle color for location */
        font-size: 1.1rem;
        margin-bottom: 30px;
    }

    /* Gallery Styling */
    #galleryCarousel {
        margin-bottom: 20px;
    }

    #galleryCarousel .carousel-inner img {
        border-radius: 10px;
        height: 500px;
        object-fit: cover;
        width: 100%;
        /* Optional: add a subtle border */
        /* border: 5px solid var(--color-white); */
    }

    .carousel-caption.bg-dark-alpha {
        background: rgba(var(--color-dark-rgb, 23, 23, 23), 0.7); /* Use dark color with transparency */
        border-radius: 8px;
        padding: 10px 20px;
        bottom: 20px; /* Position slightly up */
        color: var(--color-white);
        font-size: 1rem;
    }

     .carousel-caption.bg-dark-alpha h5 {
         color: var(--color-gold); /* Gold color for caption title */
         margin-bottom: 0;
         font-size: 1.2rem;
     }


    /* Thumbnail Grid Styling */
    .thumbnail-grid .col-3 {
        padding: 5px; /* Reduce padding between thumbnails */
    }
    .thumbnail-grid img.img-thumbnail {
        height: 90px; /* Adjust thumbnail size */
        object-fit: cover;
        width: 100%;
        cursor: pointer;
        border: 3px solid transparent; /* Initial transparent border */
        transition: border-color 0.3s ease;
        padding: 0; /* Remove default thumbnail padding */
        border-radius: 8px; /* Rounded corners for thumbnails */
    }

    .thumbnail-grid img.img-thumbnail.active,
    .thumbnail-grid img.img-thumbnail:hover {
        border-color: var(--color-primary); /* Highlight active/hovered thumbnail */
    }


    /* Info Card Styling */
    .info-card {
        border: none;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.08) 0px 4px 15px;
        background-color: var(--color-white);
    }

    .info-card .card-body {
        padding: 30px; /* More padding */
    }

    .info-card .card-title {
        font-family: 'Montserrat', sans-serif;
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--color-dark);
        margin-bottom: 10px;
    }

    .price-info h4 {
        color: var(--color-accent); /* Accent color for price */
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .duration-info {
        color: var(--color-secondary); /* Secondary color for duration */
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .duration-info i {
        margin-right: 8px;
    }

    .includes-section h5 {
        color: var(--color-dark);
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 10px;
        border-bottom: 2px solid var(--color-light); /* Subtle separator */
        padding-bottom: 5px;
    }

    .includes-content {
        color: #555;
        font-size: 1rem;
        line-height: 1.6;
    }
     .includes-content p { /* Style paragraphs created by nl2br */
         margin-bottom: 8px;
     }


    .book-now-btn {
        background-color: var(--color-primary); /* Primary color for button */
        border-color: var(--color-primary);
        color: var(--color-white);
        font-weight: 700;
        font-size: 1.4rem;
        padding: 15px 30px;
        border-radius: 30px; /* More rounded button */
        transition: background-color 0.3s ease, border-color 0.3s ease, transform 0.2s ease;
        margin-top: 20px;
    }

    .book-now-btn:hover {
        background-color: #0a3c47; /* Darker primary */
        border-color: #0a3c47;
        transform: translateY(-3px); /* Lift effect */
    }

     /* Tab Styling */
    .nav-tabs {
        border-bottom-color: var(--color-light); /* Light border below tabs */
        margin-bottom: 0; /* Remove space below tabs */
    }

    .nav-tabs .nav-item {
        margin-bottom: -1px; /* To align with border */
    }

    .nav-tabs .nav-link {
        font-family: 'Montserrat', sans-serif;
        font-size: 1rem;
        font-weight: 600;
        color: var(--color-dark); /* Dark text for inactive tabs */
        border: 1px solid transparent;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        padding: 12px 25px; /* Adjust padding */
        margin-right: 5px; /* Space between tabs */
        transition: color 0.3s ease, border-color 0.3s ease, background-color 0.3s ease;
    }

    .nav-tabs .nav-link:hover {
        border-color: transparent transparent var(--color-secondary) transparent; /* Secondary color underline on hover */
        color: var(--color-secondary);
         background-color: var(--color-white); /* White background on hover */
    }

    .nav-tabs .nav-link.active {
        color: var(--color-primary); /* Primary color for active tab */
        background-color: var(--color-white); /* White background for active tab */
        border-color: var(--color-light) var(--color-light) transparent var(--color-light); /* Border around active tab, no bottom border */
        border-top: 3px solid var(--color-primary); /* Primary color top border for active tab */
    }

    .tab-content {
        background-color: var(--color-white); /* White background for tab content */
        border: 1px solid var(--color-light); /* Light border around content */
        border-top: none; /* No top border, connects to active tab */
        padding: 30px; /* More padding */
        border-radius: 0 0 8px 8px; /* Rounded bottom corners */
        box-shadow: rgba(0, 0, 0, 0.05) 0px 4px 10px; /* Subtle shadow */
        color: #333; /* Darker text inside tabs */
        line-height: 1.7;
    }
     .tab-content p { /* Style paragraphs created by nl2br */
         margin-bottom: 15px;
     }


     /* Related Packages Styling (Add if you display related packages) */
     /* Assuming you have a section below the main content for related packages */
     .related-packages {
         margin-top: 60px;
     }
     .related-packages h3 {
         font-family: 'Montserrat', sans-serif;
         color: var(--color-primary);
         font-weight: 700;
         margin-bottom: 30px;
         text-align: center;
     }
      /* Use the same package-card styling for related items */


    /* Responsive adjustments */
    @media (max-width: 991.98px) { /* Below large breakpoint */
        .package-detail-title {
            font-size: 1.8rem;
        }
        #galleryCarousel .carousel-inner img {
            height: 350px; /* Reduce image height on smaller screens */
        }
         .thumbnail-grid img.img-thumbnail {
             height: 70px; /* Reduce thumbnail height */
         }
        .info-card .card-body {
            padding: 20px;
        }
        .info-card .card-title {
            font-size: 1.5rem;
        }
        .price-info h4 {
            font-size: 1.6rem;
        }
        .duration-info {
            font-size: 1rem;
        }
         .book-now-btn {
             font-size: 1.2rem;
             padding: 12px 25px;
         }
         .nav-tabs .nav-link {
             padding: 10px 15px;
             font-size: 0.9rem;
         }
         .tab-content {
             padding: 20px;
         }
    }

    @media (max-width: 767.98px) { /* Below medium breakpoint */
        .package-detail-section {
            padding: 30px 0;
        }
         #galleryCarousel .carousel-inner img {
             height: 250px; /* Further reduce image height */
              border-radius: 8px;
         }
        .thumbnail-grid {
            margin-top: 10px;
        }
         .thumbnail-grid .col-3 {
             padding: 3px; /* More reduced padding */
         }
         .thumbnail-grid img.img-thumbnail {
             height: 60px; /* Further reduce thumbnail height */
              border-radius: 5px;
         }
        .info-card {
             margin-top: 30px; /* Add space above info card */
        }
         .info-card .card-body {
             padding: 15px;
         }
        .book-now-btn {
             width: 100%; /* Full width button on mobile */
             text-align: center;
        }
         .nav-tabs {
             flex-wrap: wrap; /* Allow tabs to wrap */
             border-bottom: none; /* Remove border if tabs wrap */
         }
         .nav-tabs .nav-item {
             margin-bottom: 5px; /* Add space between wrapped tabs */
         }
         .nav-tabs .nav-link {
            width: auto; /* Auto width for wrapping */
             margin-right: 8px; /* Space out wrapped tabs */
             border-radius: 5px; /* Slightly smaller radius */
             border: 1px solid var(--color-light); /* Add subtle border back */
         }
          .nav-tabs .nav-link.active {
              border-color: var(--color-light); /* Keep light border */
              border-top: 3px solid var(--color-primary); /* Keep primary top border */
          }
         .tab-content {
              padding: 15px;
         }
    }

    /* Ensure variables for RGBA are defined if used */
    :root {
        --color-dark-rgb: 23, 23, 23; /* RGB values for --color-dark */
    }


</style>
@endpush

@section('content')
<div class="package-detail-section">
    <div class="container py-4"> {{-- Adjusted padding --}}
         <h1 class="package-detail-title text-center">{{ $package->title }}</h1>
         <p class="location-text text-center"><i class="fas fa-map-marker-alt"></i> {{ $package->location }}</p>

        <div class="row justify-content-center"> {{-- Center the content --}}
            <div class="col-lg-8">
                {{-- Added thumbnail-nav class for JS targeting if needed --}}
                <div id="galleryCarousel" class="carousel slide shadow-lg thumbnail-nav" data-ride="carousel">
                    <div class="carousel-inner">
                        @forelse($package->galleries as $key => $gallery)
                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                            <img src="{{ Storage::url($gallery->image) }}"
                                 class="d-block w-100 rounded-lg"
                                 alt="{{ $gallery->name }}"
                                 > {{-- Style moved to CSS --}}
                            <div class="carousel-caption d-none d-md-block bg-dark-alpha">
                                <h5>{{ $gallery->name }}</h5>
                            </div>
                        </div>
                        @empty
                         {{-- Placeholder if no galleries --}}
                         <div class="carousel-item active">
                             <div class="bg-light text-center d-flex align-items-center justify-content-center text-muted rounded-lg" style="height: 500px;">
                                 No Images Available
                             </div>
                         </div>
                        @endforelse
                    </div>
                    {{-- Carousel Controls (Hidden if less than 2 images) --}}
                    @if ($package->galleries->count() > 1)
                        <a class="carousel-control-prev" href="#galleryCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#galleryCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                     @endif
                </div>

                {{-- Added thumbnail-grid class for styling --}}
                 @if ($package->galleries->count() > 0)
                    <div class="row mt-3 thumbnail-grid no-gutters"> {{-- Use no-gutters to control spacing with col padding --}}
                        @foreach($package->galleries as $key => $gallery)
                        <div class="col-3 mb-3">
                            <img src="{{ Storage::url($gallery->image) }}"
                                 class="img-thumbnail cursor-pointer {{ $key === 0 ? 'active' : '' }}" {{-- Add active class to first thumbnail --}}
                                 alt="Thumbnail {{ $key+1 }}"
                                 data-target="#galleryCarousel"
                                 data-slide-to="{{ $key }}"> {{-- Style moved to CSS --}}
                        </div>
                        @endforeach
                    </div>
                 @endif
            </div>

            <div class="col-lg-4">
                <div class="card info-card">
                    <div class="card-body">
                        {{-- Title moved up outside this card --}}

                        <div class="price-info mb-3">
                            <h4>${{ number_format($package->price) }}</h4>
                        </div>

                        <div class="duration-info mb-4">
                            <i class="far fa-clock"></i> {{ $package->duration_days }} Days
                        </div>

                         {{-- Rating and Reviews --}}
                          @if($package->average_rating > 0)
                            <div class="mb-4">
                                 <h5 class="includes-section">Rating</h5>
                                 <p class="includes-content">
                                     <span class="rating" style="color: var(--color-gold);">
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
                            </div>
                         @else
                             <div class="mb-4">
                                <h5 class="includes-section">Rating</h5>
                                <p class="includes-content"><i class="far fa-star"></i> No reviews yet</p>
                            </div>
                         @endif


                        @if($package->included)
                            <div class="mb-4">
                                <h5>Package Includes:</h5> {{-- Styled with includes-section --}}
                                <div class="includes-content">
                                    {!! nl2br(e($package->included)) !!}
                                </div>
                            </div>
                        @endif

                        @if($package->excluded)
                            <div class="mb-4">
                                <h5>Package Excludes:</h5> {{-- Styled with includes-section --}}
                                <div class="includes-content">
                                     {!! nl2br(e($package->excluded)) !!}
                                </div>
                            </div>
                        @endif


                        {{-- Updated link to point to the new route bookings.create --}}
                        <a href="{{ route('bookings.create', $package) }}"
                           class="btn btn-primary btn-block book-now-btn">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 justify-content-center"> {{-- Center tabs --}}
            <div class="col-lg-8"> {{-- Align tabs with the main content column --}}
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-description-tab" data-toggle="tab" href="#nav-description" role="tab" aria-controls="nav-description" aria-selected="true">
                            Description
                        </a>
                        @if($package->itinerary) {{-- Only show if itinerary exists --}}
                            <a class="nav-item nav-link" id="nav-itinerary-tab" data-toggle="tab" href="#nav-itinerary" role="tab" aria-controls="nav-itinerary" aria-selected="false">
                                Itinerary
                            </a>
                        @endif
                        <a class="nav-item nav-link" id="nav-reviews-tab" data-toggle="tab" href="#nav-reviews" role="tab" aria-controls="nav-reviews" aria-selected="false">
                            Reviews ({{ $package->reviews_count }})
                        </a>
                    </div>
                </nav>

                <div class="tab-content py-4" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab">
                        {!! nl2br(e($package->description)) !!}
                    </div>

                    @if($package->itinerary) {{-- Corresponding tab pane --}}
                        <div class="tab-pane fade" id="nav-itinerary" role="tabpanel" aria-labelledby="nav-itinerary-tab">
                            {!! nl2br(e($package->itinerary)) !!} {{-- Itinerary content --}}
                        </div>
                    @endif

                    <div class="tab-pane fade" id="nav-reviews" role="tabpanel" aria-labelledby="nav-reviews-tab">
                         {{-- Assuming this partial handles review display and adding a review form --}}
                        @include('travel_packages.partials.reviews', ['reviews' => $package->reviews])
                    </div>
                </div>
            </div>
        </div>

        {{-- Related Packages Section (Optional - Implement based on your controller logic) --}}
         @if($related && $related->count() > 0)
             <div class="related-packages">
                 <h3>Related Packages</h3>
                 <div class="row justify-content-center">
                     @foreach($related as $relatedPackage)
                         <div class="col-md-6 col-lg-4 mb-4">
                              {{-- You can reuse the package-card structure from the index page here --}}
                             <div class="card package-card">
                                  @php
                                      $relatedImageUrl = null;
                                      if ($relatedPackage->featured_image) {
                                          $relatedImageUrl = Storage::url($relatedPackage->featured_image);
                                      } elseif ($relatedPackage->galleries->count() > 0) {
                                          $relatedImageUrl = Storage::url($relatedPackage->galleries->first()->image);
                                      }
                                  @endphp

                                 @if ($relatedImageUrl)
                                     <img src="{{ $relatedImageUrl }}" class="card-img-top" alt="{{ $relatedPackage->title }}" style="height: 200px; object-fit: cover;">
                                 @else
                                     <div class="bg-light text-center d-flex align-items-center justify-content-center text-muted" style="height: 200px;">
                                         No Image
                                     </div>
                                 @endif

                                 <div class="card-body">
                                     <h5 class="card-title" style="font-size: 1.1rem;">{{ $relatedPackage->title }}</h5>
                                     <p class="card-text" style="font-size: 0.9rem; color: #666;">
                                         <i class="fas fa-map-marker-alt" style="color: var(--color-secondary);"></i> {{ $relatedPackage->location }}<br>
                                         <i class="far fa-clock" style="color: var(--color-secondary);"></i> {{ $relatedPackage->duration_days }} days<br>
                                         <span style="font-weight: 700; color: var(--color-accent);"><i class="fas fa-dollar-sign"></i> ${{ number_format($relatedPackage->price) }}</span>
                                     </p>
                                     <a href="{{ route('travel_package.show', $relatedPackage) }}" class="btn btn-outline-primary btn-sm mt-2">View Details</a> {{-- Use outline button for related --}}
                                 </div>
                             </div>
                         </div>
                     @endforeach
                 </div>
             </div>
         @endif


    </div>
</div>

{{-- Add a simple script to handle thumbnail clicks for the carousel --}}
@push('script-alt')
<script>
    $(document).ready(function() {
        // Handle thumbnail clicks to update the carousel
        $('.thumbnail-grid img.img-thumbnail').on('click', function() {
            const targetCarousel = $(this).data('target');
            const slideTo = $(this).data('slide-to');

            $(targetCarousel).carousel(slideTo);

            // Update active state on thumbnails
            $('.thumbnail-grid img.img-thumbnail').removeClass('active');
            $(this).addClass('active');
        });

        // Listen for carousel slide events to update active thumbnail
        $('#galleryCarousel').on('slid.bs.carousel', function () {
             const activeIndex = $(this).find('.carousel-item.active').index();
             $('.thumbnail-grid img.img-thumbnail').removeClass('active');
             $('.thumbnail-grid img.img-thumbnail[data-slide-to="' + activeIndex + '"]').addClass('active');
        });
    });
</script>
@endpush
@endsection