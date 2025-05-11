@extends('layouts.frontend')
@section('title', 'GoJordan')
@section('content')

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- Remix Icon -->
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
<!-- Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">

<!-- Floating Sidebar Toggle Button -->

   

<!-- Hero Section -->
<section class="hero-section" id="home">
    <img src="{{ asset('frontend/assets/img/waaderam.jpeg') }}" alt="Wadi Rum Desert" class="hero-bg">
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
        <a href="#partners" class="text-white">
            <i class="ri-arrow-down-line"></i>
        </a>
    </div>
</section>

<!-- Partners Section -->
<section class="partners-section" id="partners">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title mb-3">Strategic Partners</h2>
            <p class="section-subtitle text-muted">
                Collaborating with Jordan's premier travel and tourism providers
            </p>
        </div>
        
        <div class="row g-4 justify-content-center align-items-center">
            <div class="col-6 col-md-3 text-center">
                <img src="{{ asset('frontend/assets/img/royal-jordanian.png') }}" alt="Royal Jordanian" class="partner-logo img-fluid">
                <p class="partner-name">Royal Jordanian Airlines</p>
            </div>
            <div class="col-6 col-md-3 text-center">
                <img src="{{ asset('frontend/assets/img/visit-jordan.png') }}" alt="Visit Jordan" class="partner-logo img-fluid">
                <p class="partner-name">Visit Jordan - Tourism Portal</p>
            </div>
            <div class="col-6 col-md-3 text-center">
                <img src="{{ asset('frontend/assets/img/jett.png') }}" alt="Jett" class="partner-logo img-fluid">
                <p class="partner-name">Jett - Jordan Express Tourist Transport</p>
            </div>
            <div class="col-6 col-md-3 text-center">
                <img src="{{ asset('frontend/assets/img/jordan-tourism-board.png') }}" alt="Jordan Tourism Board" class="partner-logo img-fluid">
                <p class="partner-name">Jordan Tourism Board</p>
            </div>
        </div>
    </div>
</section>

<!-- Destinations Section -->
<section class="destinations-section" id="destinations">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-subtitle text-primary">Discover Jordan's Wonders</h2>
            <h1 class="section-title mb-4">Must-Visit Destinations</h1>
        </div>
        
        <div class="swiper destinations-swiper pb-5">
            <div class="swiper-wrapper">
                <!-- Petra -->
                <div class="swiper-slide">
                    <div class="card destination-card h-100">
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
                
                <!-- Dead Sea -->
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
                
                <!-- Wadi Rum -->
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
                
                <!-- Jerash -->
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
                
                <!-- Aqaba -->
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
                
                <!-- Madaba -->
                <div class="swiper-slide">
                    <div class="card destination-card h-100">
                        <img src="{{ asset(path: 'images/Madaba3.jpeg') }}" class="card-img-top destination-img" alt="Madaba">
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
                
                <!-- Dana Biosphere -->
                <div class="swiper-slide">
                    <div class="card destination-card h-100">
                        <img src="{{ asset(path: 'images/dana2.jpeg') }}" class="card-img-top destination-img" alt="Madaba">
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
            </div>
            
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>
<style>
    /* تثبيت حجم الكروت */
    .destination-card {
        height: 100%; /* تأكد من أن الكارد يأخذ كل الارتفاع المتاح */
        display: flex;
        flex-direction: column;
    }
    
    /* تثبيت ارتفاع الصورة */
    .destination-img {
        height: 200px; /* يمكنك تعديل الارتفاع حسب احتياجاتك */
        object-fit: cover; /* لتجنب تشويه الصورة */
        width: 100%;
    }
    
    /* تثبيت حجم جسم الكارد */
    .destination-body {
        flex: 1; /* يجعل الجسم يأخذ المساحة المتبقية */
        display: flex;
        flex-direction: column;
    }
    
    /* تثبيت حجم النص */
    .destination-text {
        flex: 1; /* يجعل النص يأخذ المساحة المتبقية */
        overflow: hidden; /* يخفي النص الزائد */
        display: -webkit-box;
        -webkit-line-clamp: 3; /* عدد الأسطر المراد عرضها */
        -webkit-box-orient: vertical;
    }
    
    /* تثبيت حجم العناوين */
    .destination-title {
        min-height: 50px; /* لمنع تغيير حجم الكارد عند اختلاف طول العنوان */
    }
    
    /* تثبيت حجم زر Explore More */
    .read-more {
        margin-top: auto; /* يدفع الزر للأسفل */
        align-self: flex-start; /* محاذاة إلى اليسار */
    }
    </style>
<!-- Why Jordan Section -->
<section class="why-jordan-section" id="why-jordan">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="value-img-container animate__animated animate__fadeInLeft">
                    <img src="{{ asset('frontend/assets/img/saltat.jpeg') }}" alt="Our Team in Jordan" class="value-img">
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="ps-lg-5">
                    <h2 class="section-subtitle text-primary">Why Jordan?</h2>
                    <h1 class="section-title mb-4">Discover the True Magic of Jordan with Us</h1>
                    <p class="lead mb-5">
                        Whether you're seeking ancient wonders, natural beauty, or warm hospitality – Jordan has it all. 
                        We're here to make your journey unforgettable with our expert guidance and personalized tours.
                    </p>
                    
                    <div class="accordion" id="whyJordanAccordion">
                        <!-- Petra & Historical Sites -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    <i class="ri-wallet-3-line accordion-icon"></i>
                                    Explore World Wonders
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#whyJordanAccordion">
                                <div class="accordion-body">
                                    From the ancient city of Petra to the Roman ruins of Jerash, Jordan is home to some of the world's most incredible historical sites that will transport you back in time.
                                </div>
                            </div>
                        </div>
                        
                        <!-- Affordable Travel -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                    <i class="ri-wallet-3-line accordion-icon"></i>
                                    Affordable Travel Packages
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#whyJordanAccordion">
                                <div class="accordion-body">
                                    We offer flexible pricing and customized packages to match every traveler's budget, making the wonders of Jordan accessible to all.
                                </div>
                            </div>
                        </div>
                        
                        <!-- Natural Beauty -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                    <i class="ri-sun-line accordion-icon"></i>
                                    Nature & Adventure
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#whyJordanAccordion">
                                <div class="accordion-body">
                                    Dive into the beauty of Wadi Rum, the Dead Sea, and Dana Reserve – adventure awaits at every corner with hiking, diving, and desert safaris.
                                </div>
                            </div>
                        </div>
                        
                        <!-- Safe & Welcoming -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                    <i class="ri-shield-check-line accordion-icon"></i>
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

<!-- Blog Section -->
<section class="blog-section" id="blog">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-subtitle text-primary">Jordan Travel Guide</h2>
            <h1 class="section-title mb-4">Articles & Tips to Explore Jordan</h1>
        </div>
        
        <div class="row g-4">
            @foreach($blogs as $blog)
            <div class="col-md-6 col-lg-4">
                <div class="card blog-card h-100">
                    <img src="{{ Storage::url($blog->image) }}" class="card-img-top blog-img" alt="{{ $blog->title }}">
                    <div class="card-body blog-body">
                        <h3 class="blog-title">{{ $blog->title }}</h3>
                        <p class="blog-excerpt">{{ $blog->excerpt }}</p>
                        <div class="blog-footer">
                            <span>{{ date('d M Y', strtotime($blog->created_at)) }}</span>
                            <span><i class="ri-eye-line me-1"></i> {{ $blog->reads }}</span>
                        </div>
                    </div>
                    <a href="{{ route('blogs.show', $blog->slug) }}" class="stretched-link"></a>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('blogs.index') }}" class="btn btn-outline-primary">
                View All Articles <i class="ri-arrow-right-line ms-2"></i>
            </a>
        </div>
    </div>
</section>
<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script>
    // Initialize Swiper
    const destinationsSwiper = new Swiper('.destinations-swiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            576: {
                slidesPerView: 2
            },
            992: {
                slidesPerView: 3
            }
        }
    });
    
    // Sidebar Toggle
   
</script>

@endsection