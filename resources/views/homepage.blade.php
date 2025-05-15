@extends('layouts.frontend')
@section('title', 'GoJordan')
@section('content')

{{--
|--------------------------------------------------------------------------
| Frontend Assets
|--------------------------------------------------------------------------
|
| It's highly recommended to include these core CSS and JS files in your
| layouts.frontend Blade file for better performance and organization.
| Uncomment them here ONLY if your layout file does NOT include them.
| Ensure Bootstrap JS bundle includes Popper.js for accordions.
|
--}}
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> --}}
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

{{-- Swiper CSS - Include this if not in your layout --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />


<section class="hero-section" id="home">
    {{-- Use frontend asset path for hero background --}}
    <img src="{{ asset('frontend/assets/img/waaderam.jpeg') }}" alt="Wadi Rum Desert Landscape" class="hero-bg">
    <div class="hero-overlay"></div>

    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-lg-8">
                <div class="hero-content animate__animated animate__fadeInUp">
                    <h2 class="hero-subtitle">Discover</h2>
                    <h1 class="hero-title">The Magic of Jordan</h1>
                    <p class="hero-description">
                        It's the perfect time to explore Jordan's rich history, breathtaking nature,
                        and unforgettable adventures. From the ancient city of Petra to the
                        mesmerizing Wadi Rum desert.
                    </p>
                    <div class="hero-cta">
                        <a href="#destinations" class="btn btn-explore">Explore Destinations</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="scroll-down">
        <a href="#partners" class="text-white animate__animated animate__bounce infinite">
            <i class="ri-arrow-down-line"></i>
        </a>
    </div>
</section>

<section class="partners-section section-padding" id="partners">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-subtitle text-primary">Trusted Collaborations</h2>
            <h1 class="section-title mb-3">Strategic Partners</h1>
        </div>

        <div class="row g-4 justify-content-center align-items-center">
            <div class="col-6 col-md-3 text-center">
                <img src="{{ asset('frontend/assets/img/royal-jordanian.png') }}" alt="Royal Jordanian Logo" class="partner-logo img-fluid">
                <p class="partner-name mt-2">Royal Jordanian Airlines</p>
            </div>
            <div class="col-6 col-md-3 text-center">
                <img src="{{ asset('frontend/assets/img/visit-jordan.png') }}" alt="Visit Jordan Logo" class="partner-logo img-fluid">
                <p class="partner-name mt-2">Visit Jordan - Tourism Portal</p>
            </div>
            <div class="col-6 col-md-3 text-center">
                <img src="{{ asset('frontend/assets/img/jett.png') }}" alt="Jett Bus Logo" class="partner-logo img-fluid">
                <p class="partner-name mt-2">Jett - Jordan Express Tourist Transport</p>
            </div>
            <div class="col-6 col-md-3 text-center">
                <img src="{{ asset('frontend/assets/img/jordan-tourism-board.png') }}" alt="Jordan Tourism Board Logo" class="partner-logo img-fluid">
                <p class="partner-name mt-2">Jordan Tourism Board</p>
            </div>
        </div>
    </div>
</section>

<section class="destinations-section section-padding" id="destinations">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-subtitle text-primary">Explore Wonders</h2>
            <h1 class="section-title mb-4">Must-Visit Destinations</h1>
        </div>

        {{-- Swiper container --}}
        <div class="swiper destinations-swiper pb-5">
            {{-- Swiper wrapper --}}
            <div class="swiper-wrapper">
                {{-- Swiper slides --}}
                <div class="swiper-slide">
                    <div class="card destination-card h-100">
                        {{-- Ensure asset path is correct --}}
                        <img src="{{ asset('images/petra.jpeg') }}" class="card-img-top destination-img" alt="Petra">
                        <div class="card-body destination-body">
                            <h3 class="destination-title">Petra</h3>
                            <p class="destination-text">
                                The legendary "Rose City" carved into pink sandstone cliffs, Petra is Jordan's most famous
                                archaeological site and one of the New7Wonders of the World.
                            </p>
                            <a href="#" class="read-more">
                                Explore More <i class="ri-arrow-right-line ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="card destination-card h-100">
                        <img src="{{ asset('images/deadsea.jpeg') }}" class="card-img-top destination-img" alt="Dead Sea">
                        <div class="card-body destination-body">
                            <h3 class="destination-title">Dead Sea</h3>
                            <p class="destination-text">
                                Float effortlessly in the hypersaline waters of Earth's lowest point. The Dead Sea's
                                mineral-rich mud and waters have therapeutic properties.
                            </p>
                            <a href="#" class="read-more">
                                Explore More <i class="ri-arrow-right-line ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="card destination-card h-100">
                        <img src="{{ asset('images/waaderam.jpeg') }}" class="card-img-top destination-img" alt="Wadi Rum">
                        <div class="card-body destination-body">
                            <h3 class="destination-title">Wadi Rum</h3>
                            <p class="destination-text">
                                Known as the "Valley of the Moon", this stunning desert landscape features dramatic
                                sandstone mountains, ancient rock carvings, and Bedouin culture.
                            </p>
                            <a href="#" class="read-more">
                                Explore More <i class="ri-arrow-right-line ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="card destination-card h-100">
                        <img src="{{ asset('images/Jerash.jpeg') }}" class="card-img-top destination-img" alt="Jerash">
                        <div class="card-body destination-body">
                            <h3 class="destination-title">Jerash</h3>
                            <p class="destination-text">
                                One of the best-preserved Roman provincial cities in the world, Jerash boasts
                                impressive colonnaded streets, grand temples, and well-preserved theaters.
                            </p>
                            <a href="#" class="read-more">
                                Explore More <i class="ri-arrow-right-line ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="card destination-card h-100">
                        <img src="{{ asset('images/aqaba.jpeg') }}" class="card-img-top destination-img" alt="Aqaba">
                        <div class="card-body destination-body">
                            <h3 class="destination-title">Aqaba</h3>
                            <p class="destination-text">
                                Jordan's only coastal city offers pristine Red Sea coral reefs perfect for diving
                                and snorkeling. Enjoy year-round sunshine and luxury resorts.
                            </p>
                            <a href="#" class="read-more">
                                Explore More <i class="ri-arrow-right-line ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="card destination-card h-100">
                        {{-- Corrected asset path syntax --}}
                        <img src="{{ asset('images/Madaba3.jpeg') }}" class="card-img-top destination-img" alt="Madaba">
                        <div class="card-body destination-body">
                            <h3 class="destination-title">Madaba</h3>
                            <p class="destination-text">
                                Known as the "City of Mosaics", Madaba is famous for its Byzantine-era map of
                                the Holy Land in St. George's Church.
                            </p>
                            <a href="#" class="read-more">
                                Explore More <i class="ri-arrow-right-line ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="card destination-card h-100">
                         {{-- Corrected asset path syntax --}}
                        <img src="{{ asset('images/dana2.jpeg') }}" class="card-img-top destination-img" alt="Dana Biosphere Reserve">
                        <div class="card-body destination-body">
                            <h3 class="destination-title">Dana Biosphere</h3>
                            <p class="destination-text">
                                Jordan's largest nature reserve encompasses four different bio-geographical zones.
                                Hike through spectacular scenery and spot rare wildlife.
                            </p>
                            <a href="#" class="read-more">
                                Explore More <i class="ri-arrow-right-line ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- End Swiper slides --}}
            </div>

            {{-- Add pagination and navigation if needed --}}
            {{-- <div class="swiper-pagination"></div> --}}
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        {{-- End Swiper container --}}
    </div>
</section>

<section class="why-jordan-section section-padding bg-light" id="why-jordan">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="why-jordan-img-container animate__animated animate__fadeInLeft">
                    <img src="{{ asset('frontend/assets/img/saltat.jpeg') }}" alt="Scenic view of Salt, Jordan" class="why-jordan-img">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="ps-lg-5">
                    <h2 class="section-subtitle text-primary">Why Choose Us?</h2>
                    <h1 class="section-title mb-4">Discover the True Magic of Jordan with GoJordan</h1>
                    <p class="lead mb-5 text-muted">
                        Whether you're seeking ancient wonders, natural beauty, or warm hospitality – Jordan has it all.
                        We're here to make your journey unforgettable with our expert guidance and personalized tours.
                    </p>

                    <div class="accordion" id="whyJordanAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <i class="ri-compass-3-line accordion-icon me-2"></i>
                                    Explore World Wonders
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#whyJordanAccordion">
                                <div class="accordion-body">
                                    From the ancient city of Petra to the Roman ruins of Jerash, Jordan is home to some of the world's most incredible historical sites that will transport you back in time.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="ri-wallet-3-line accordion-icon me-2"></i>
                                    Affordable Travel Packages
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#whyJordanAccordion">
                                <div class="accordion-body">
                                    We offer flexible pricing and customized packages to match every traveler's budget, making the wonders of Jordan accessible to all.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="ri-sun-line accordion-icon me-2"></i>
                                    Nature & Adventure
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#whyJordanAccordion">
                                <div class="accordion-body">
                                    Dive into the beauty of Wadi Rum, the Dead Sea, and Dana Reserve – adventure awaits at every corner with hiking, diving, and desert safaris.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <i class="ri-shield-check-line accordion-icon me-2"></i>
                                    Safe & Welcoming Country
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#whyJordanAccordion">
                                <div class="accordion-body">
                                    Jordan is known for its safety and the warm hospitality of its people – feel right at home as you explore this beautiful country.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-section section-padding" id="blog">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-subtitle text-primary">Insights & Guides</h2>
            <h1 class="section-title mb-4">Articles & Tips to Explore Jordan</h1>
        </div>

        <div class="row g-4">
            @foreach($blogs as $blog)
            <div class="col-md-6 col-lg-4">
                <div class="card blog-card h-100">
                    {{-- Ensure Storage::url works, might need 'public' prefix depending on config --}}
                    <img src="{{ Storage::url($blog->image) }}" class="card-img-top blog-img" alt="{{ $blog->title }}">
                    <div class="card-body blog-body">
                        <h3 class="blog-title">{{ $blog->title }}</h3>
                        <p class="blog-excerpt">{{ $blog->excerpt }}</p>
                        <div class="blog-footer mt-auto">
                            <span><i class="ri-calendar-line me-1"></i> {{ date('d M Y', strtotime($blog->created_at)) }}</span>
                            <span><i class="ri-eye-line me-1"></i> {{ $blog->reads }}</span>
                        </div>
                    </div>
                    {{-- Stretched link covers the entire card --}}
                    <a href="{{ route('blogs.show', $blog->slug) }}" class="stretched-link" aria-label="Read more about {{ $blog->title }}"></a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('blogs.index') }}" class="btn btn-outline-primary-alt">
                View All Articles <i class="ri-arrow-right-line ms-2"></i>
            </a>
        </div>
    </div>
</section>

{{-- Custom CSS for Modern Enhancements --}}
<style>
    :root {
        --primary-color: #007bff; /* A modern blue, often used for tech/travel */
        --secondary-color: #28a745; /* A complementary green */
        --text-color: #495057; /* Slightly darker text */
        --heading-color: #212529; /* Darker headings */
        --bg-light: #f8f9fa; /* Bootstrap light gray */
        --spacing-section: 90px; /* Increased padding for sections */
        --card-border-radius: 12px; /* More pronounced rounded corners */
        --box-shadow-subtle: rgba(0, 0, 0, 0.08) 0px 4px 15px; /* Softer, wider shadow */
        --box-shadow-hover: rgba(0, 0, 0, 0.12) 0px 8px 25px; /* More pronounced hover shadow */
    }

    body {
        font-family: 'Roboto', sans-serif; /* Common modern font */
        line-height: 1.7; /* Slightly increased line height */
        color: var(--text-color);
        background-color: #fff;
    }

    h1, h2, h3, h4, h5, h6 {
        color: var(--heading-color);
        font-weight: 700;
        line-height: 1.3;
    }

    p {
        color: var(--text-color);
        margin-bottom: 1rem; /* Default paragraph spacing */
    }

    .section-padding {
        padding: var(--spacing-section) 0;
    }

    .section-title {
        font-size: 2.8rem; /* Larger title */
        margin-bottom: 1.5rem; /* More space below title */
        position: relative;
        display: inline-block;
    }

     .section-title::after {
        content: '';
        display: block;
        width: 100px; /* Wider underline */
        height: 5px; /* Thicker underline */
        background: var(--primary-color);
        margin: 15px auto 0; /* Center and space the underline */
        border-radius: 3px;
        opacity: 0.8; /* Slight transparency */
    }


    .section-subtitle {
        font-size: 1.1rem; /* Slightly smaller subtitle */
        color: var(--primary-color) !important;
        font-weight: 600;
        margin-bottom: 0.75rem; /* More space below subtitle */
        text-transform: uppercase;
        letter-spacing: 1px; /* Slight letter spacing */
    }

    /* Hero Section */
    .hero-section {
        position: relative;
        height: 90vh; /* Slightly less than full height */
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: left;
        color: #fff;
        overflow: hidden;
    }

    .hero-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -2;
        filter: brightness(0.8); /* Slightly dim the background */
    }

     .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /* Use a subtle gradient */
        background: linear-gradient(to right, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.3));
        z-index: -1;
    }


    .hero-content {
        max-width: 800px; /* Increased max width */
        padding: 30px; /* More padding */
    }

    .hero-subtitle {
        font-size: 1.3rem; /* Adjusted size */
        font-weight: 500;
        margin-bottom: 0.75rem;
        color: rgba(255, 255, 255, 0.9); /* Whiter subtitle */
    }

    .hero-title {
        font-size: 4.5rem; /* Larger title */
        margin-bottom: 1.5rem;
        line-height: 1.1;
        color: #fff;
        text-shadow: 1px 1px 4px rgba(0,0,0,0.2); /* Subtle text shadow */
    }

    .hero-description {
        font-size: 1.2rem; /* Larger description */
        margin-bottom: 2.5rem; /* More space below description */
        color: rgba(255, 255, 255, 0.95);
    }

    .btn-explore {
        background-color: var(--primary-color);
        color: #fff;
        padding: 14px 35px; /* More padding */
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.3s ease, transform 0.2s ease; /* Add transform transition */
        border: 1px solid var(--primary-color);
        box-shadow: rgba(0, 123, 255, 0.3) 0px 4px 12px; /* Subtle button shadow */
    }

    .btn-explore:hover {
        background-color: #0056b3; /* Darker blue on hover */
        color: #fff;
        transform: translateY(-3px); /* Lift button slightly on hover */
        box-shadow: rgba(0, 123, 255, 0.5) 0px 6px 15px; /* Stronger shadow on hover */
    }

    .scroll-down {
        position: absolute;
        bottom: 40px; /* Adjust position */
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
    }

    .scroll-down a {
        display: block;
        width: 45px; /* Larger icon */
        height: 45px; /* Larger icon */
        border: 2px solid #fff;
        border-radius: 50%;
        text-align: center;
        line-height: 43px; /* Adjust line height */
        font-size: 1.8rem; /* Larger icon */
        color: #fff;
        transition: transform 0.3s ease;
    }
     .scroll-down a:hover {
         transform: scale(1.1); /* Slight zoom on hover */
     }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-15px); /* Increased bounce height */
        }
        60% {
            transform: translateY(-8px); /* Increased bounce height */
        }
    }

    /* Partners Section */
    .partner-logo {
        height: 70px; /* Slightly larger logos */
        filter: grayscale(100%);
        opacity: 0.7; /* Slightly more subtle */
        transition: all 0.4s ease; /* Smoother transition */
    }

    .partner-logo:hover {
        filter: grayscale(0%);
        opacity: 1;
        transform: scale(1.1); /* More pronounced zoom */
    }

    .partner-name {
        font-size: 0.95rem; /* Slightly larger text */
        color: #555;
        font-weight: 500;
        margin-top: 10px; /* More space below logo */
    }


    /* Destinations Section */
    .destinations-swiper {
        padding-bottom: 60px; /* More space for arrows/pagination */
    }

    .destination-card {
        border: none;
        border-radius: var(--card-border-radius);
        overflow: hidden;
        box-shadow: var(--box-shadow-subtle);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
        background-color: #fff; /* Ensure white background */
    }

    .destination-card:hover {
        transform: translateY(-15px); /* More lift on hover */
        box-shadow: var(--box-shadow-hover); /* Stronger shadow */
    }

    .destination-img {
        height: 250px; /* Taller image */
        object-fit: cover;
        width: 100%;
    }

    .destination-body {
        padding: 1.8rem; /* More padding */
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .destination-title {
        font-size: 1.5rem; /* Larger title */
        margin-bottom: 0.8rem;
        min-height: 50px;
        font-weight: 600;
    }

    .destination-text {
        font-size: 1.05rem; /* Slightly larger text */
        color: #666;
        flex: 1;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 4; /* Allow more lines */
        -webkit-box-orient: vertical;
        margin-bottom: 1.5rem; /* More space above link */
    }

    .read-more {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
        margin-top: auto; /* Push to the bottom */
        align-self: flex-start;
        transition: color 0.3s ease, transform 0.2s ease; /* Add transform transition */
        display: inline-flex; /* Align icon and text */
        align-items: center;
    }

    .read-more:hover {
        color: var(--secondary-color);
        transform: translateX(5px); /* Slight slide effect on hover */
    }

    .swiper-button-next,
    .swiper-button-prev {
       color: var(--primary-color) !important;
       top: 50%;
       transform: translateY(-50%);
       /* Add a background for better visibility on complex images */
       background-color: rgba(255, 255, 255, 0.8);
       border-radius: 50%;
       width: 40px; /* Size adjustment */
       height: 40px; /* Size adjustment */
       display: flex;
       justify-content: center;
       align-items: center;
       box-shadow: rgba(0, 0, 0, 0.1) 0px 2px 8px;
       transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .swiper-button-next:hover,
    .swiper-button-prev:hover {
        background-color: rgba(255, 255, 255, 1);
        box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 12px;
    }

    .swiper-button-next:after,
    .swiper-button-prev:after {
        font-size: 1.2rem !important; /* Adjust arrow size */
    }

    .swiper-button-prev {
        left: 10px; /* Adjust position */
    }

     .swiper-button-next {
        right: 10px; /* Adjust position */
    }


    /* Why Jordan Section */
    .why-jordan-img-container {
        border-radius: var(--card-border-radius);
        overflow: hidden;
        box-shadow: var(--box-shadow-subtle);
        transition: transform 0.4s ease, box-shadow 0.4s ease; /* Add transition */
    }

     .why-jordan-img-container:hover {
         transform: translateY(-10px); /* Lift image container */
         box-shadow: var(--box-shadow-hover); /* Stronger shadow */
     }

    .why-jordan-img {
        display: block;
        width: 100%;
        height: auto;
    }

    .accordion-item {
        border: none; /* Remove default border */
        margin-bottom: 12px; /* More space between items */
        border-radius: var(--card-border-radius);
        overflow: hidden;
        box-shadow: rgba(0, 0, 0, 0.05) 0px 3px 10px; /* Softer shadow */
        transition: box-shadow 0.3s ease;
    }

     .accordion-item:hover {
         box-shadow: rgba(0, 0, 0, 0.1) 0px 5px 15px; /* Slight shadow increase on hover */
     }


    .accordion-header {
        margin-bottom: 0; /* Remove header margin */
    }

    .accordion-button {
        background-color: #fff;
        color: var(--heading-color);
        font-weight: 600;
        padding: 1.2rem 1.5rem; /* More padding */
        border: none;
        border-radius: var(--card-border-radius);
        transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
        font-size: 1.1rem; /* Slightly larger text */
        border-bottom: 1px solid #eee; /* Add bottom border */
    }

    .accordion-button:not(.collapsed) {
        color: #fff;
        background-color: var(--primary-color);
        box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .125); /* Subtle inner shadow */
        border-bottom-color: transparent; /* Remove bottom border when active */
    }

     .accordion-button:focus {
         box-shadow: rgba(0, 123, 255, 0.25) 0 0 0 0.25rem; /* Focus ring using primary color */
         outline: 0; /* Remove default outline */
     }


    .accordion-icon {
        font-size: 1.3rem; /* Larger icon */
        margin-right: 15px; /* More space */
        color: var(--primary-color);
        transition: color 0.3s ease;
    }

     .accordion-button:not(.collapsed) .accordion-icon {
        color: #fff;
    }

    .accordion-body {
        padding: 1.5rem; /* More padding */
        border-top: none; /* Remove default top border */
        background-color: var(--bg-light);
        color: var(--text-color);
        font-size: 1rem;
        line-height: 1.6;
    }

    /* Blog Section */
    .blog-card {
        border: none;
        border-radius: var(--card-border-radius);
        overflow: hidden;
        box-shadow: var(--box-shadow-subtle);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
        position: relative;
        background-color: #fff;
    }

    .blog-card:hover {
        transform: translateY(-15px); /* More lift */
        box-shadow: var(--box-shadow-hover); /* Stronger shadow */
    }

    .blog-img {
        height: 250px; /* Consistent image height with destinations */
        object-fit: cover;
        width: 100%;
    }

    .blog-body {
        padding: 1.8rem; /* Consistent padding */
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .blog-title {
        font-size: 1.4rem; /* Adjusted size */
        margin-bottom: 0.8rem;
        font-weight: 600;
        line-height: 1.3;
    }

    .blog-excerpt {
        font-size: 1.05rem; /* Consistent text size */
        color: #666;
        flex: 1;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 4; /* Adjust lines */
        -webkit-box-orient: vertical;
        margin-bottom: 1.5rem;
    }

    .blog-footer {
        font-size: 0.9rem;
        color: #888;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 1.5rem; /* More padding */
        border-top: 1px solid #eee;
    }

    .blog-footer i {
        margin-right: 5px;
        color: var(--primary-color); /* Icon color */
    }

    .btn-outline-primary-alt {
        color: var(--primary-color);
        border-color: var(--primary-color);
        padding: 12px 30px; /* More padding */
        border-radius: 50px;
        font-weight: 600;
        transition: background-color 0.3s ease, color 0.3s ease, transform 0.2s ease;
    }

    .btn-outline-primary-alt:hover {
        background-color: var(--primary-color);
        color: #fff;
         transform: translateY(-3px); /* Lift button */
         box-shadow: rgba(0, 123, 255, 0.3) 0px 4px 12px; /* Add shadow */
    }

     .blog-card .stretched-link {
         z-index: 1; /* Position above other content but below hover effects */
     }

     .blog-card .blog-body,
     .destination-card .destination-body {
         z-index: 2; /* Ensure text and links are clickable */
         position: relative;
     }

</style>

{{--
|--------------------------------------------------------------------------
| Frontend Scripts
|--------------------------------------------------------------------------
|
| Include these core JS files here ONLY if your layout file does NOT include them.
| Place them just before the closing </body> tag in your layout for best practice.
|
--}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script> --}}

{{-- Custom Script for Swiper Initialization --}}
<script>
    // Wait for the DOM to be fully loaded before initializing Swiper
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Swiper
        const destinationsSwiper = new Swiper('.destinations-swiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true, // Add looping
            autoplay: { // Optional: Auto play
                delay: 4000, // Adjusted delay
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
             pagination: { // Add pagination dots
                 el: '.swiper-pagination',
                 clickable: true,
             },
            breakpoints: {
                576: {
                    slidesPerView: 1.5, // Show 1.5 slides on small screens
                    spaceBetween: 20
                },
                768: { // Added medium breakpoint
                     slidesPerView: 2,
                     spaceBetween: 25
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 30
                }
            }
        });
    });
</script>

@endsection