@extends('layouts.frontend')
@section('title', 'Contact')
@section('content')

<style>
    /* Modern Contact Page Styles */
    .contact-hero {
        position: relative;
        height: 70vh;
        min-height: 500px;
        overflow: hidden;
    }
    
    .contact-hero-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 1;
    }
    
    .contact-hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to right, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 100%);
        z-index: 2;
    }
    
    .contact-hero-content {
        position: relative;
        z-index: 3;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: white;
        padding-left: 10%;
    }
    
    .contact-hero-subtitle {
        font-size: 1.5rem;
        letter-spacing: 3px;
        margin-bottom: 1rem;
        color: #ce965c;
        font-weight: 300;
    }
    
    .contact-hero-title {
        font-size: 4rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        text-shadow: 2px 2px 5px rgba(0,0,0,0.5);
    }
    
    /* Contact Section */
    .contact-section {
        padding: 5rem 0;
        background: #f9f9f9;
    }
    
    .contact-container {
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .contact-image-container {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        height: 100%;
    }
    
    .contact-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .contact-content {
        padding-left: 3rem;
    }
    
    .contact-subtitle {
        display: block;
        color: #ce965c;
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
    }
    
    .contact-title {
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 1.5rem;
        font-weight: 700;
    }
    
    .contact-description {
        color: #666;
        line-height: 1.6;
        margin-bottom: 2rem;
    }
    
    /* Contact Cards */
    .contact-card {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .contact-card-info {
        display: flex;
        align-items: center;
    }
    
    .contact-card-icon {
        font-size: 1.8rem;
        color: #ce965c;
        margin-right: 1.5rem;
    }
    
    .contact-card-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 0.2rem;
    }
    
    .contact-card-description {
        color: #666;
        font-size: 0.9rem;
    }
    
    .contact-card-button {
        background: #ce965c;
        color: white;
        border: none;
        padding: 0.6rem 1.5rem;
        border-radius: 30px;
        font-weight: 600;
        transition: all 0.3s ease;
        white-space: nowrap;
    }
    
    .contact-card-button:hover {
        background: #b5824f;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(206, 150, 92, 0.3);
    }
    
    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .contact-hero-title {
            font-size: 3rem;
        }
        
        .contact-content {
            padding-left: 0;
            padding-top: 3rem;
        }
    }
    
    @media (max-width: 768px) {
        .contact-hero {
            height: 60vh;
        }
        
        .contact-hero-title {
            font-size: 2.5rem;
        }
        
        .contact-hero-subtitle {
            font-size: 1.2rem;
        }
    }
</style>

<!-- Modern Hero Section -->
<section class="contact-hero">
    <img src="{{ asset('frontend/assets/img/ContactUs2.webp') }}" alt="Contact Us" class="contact-hero-bg">
    <div class="contact-hero-overlay"></div>
    
    <div class="contact-hero-content">
        <h2 class="contact-hero-subtitle">Need Travel</h2>
        <h1 class="contact-hero-title">Contact Us</h1>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section">
    <div class="contact-container container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-image-container">
                    <img src="{{ asset('frontend/assets/img/awasal.webp') }}" alt="Contact Illustration" class="contact-image">
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="contact-content">
                    <span class="contact-subtitle">Need Help</span>
                    <h2 class="contact-title">Don't hesitate to contact us</h2>
                    <p class="contact-description">
                        Is there a problem finding places for your next trip? Need a
                        guide in your first trip or need a consultation about traveling? Just
                        contact us.
                    </p>
                    
                    <!-- Contact Cards -->
                    <div class="contact-card">
                        <div class="contact-card-info">
                            <i class="bx bxs-phone-call contact-card-icon"></i>
                            <div>
                                <h3 class="contact-card-title">Call</h3>
                                <p class="contact-card-description">+962790123456</p>
                            </div>
                        </div>
                        <a href="tel:+962790123456" class="contact-card-button">Call Now</a>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-card-info">
                            <i class="bx bxs-message-rounded-dots contact-card-icon"></i>
                            <div>
                                <h3 class="contact-card-title">WhatsApp</h3>
                                <p class="contact-card-description">+962790123456</p>
                            </div>
                        </div>
                        <a href="https://wa.me/962790123456" target="_blank" class="contact-card-button">Chat Now</a>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-card-info">
                            <i class="bx bxs-video contact-card-icon"></i>
                            <div>
                                <h3 class="contact-card-title">Video Call</h3>
                                <p class="contact-card-description">+962781248160</p>
                            </div>
                        </div>
                        <a href="https://zoom.us/j/962790123456" target="_blank" class="contact-card-button">Video Call Now</a>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-card-info">
                            <i class="bx bxs-envelope contact-card-icon"></i>
                            <div>
                                <h3 class="contact-card-title">Email</h3>
                                <p class="contact-card-description">info@gojordan.com</p>
                            </div>
                        </div>
                        <a href="mailto:info@gojordan.com" class="contact-card-button">Email Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Floating Contact Button -->
<div class="fab-container" id="fab-container">
    <div class="fab-options" id="fab-options">
        <a href="https://wa.me/962790123456" target="_blank" class="fab-option" data-tooltip="WhatsApp Chat">
            <i class="bx bxl-whatsapp"></i>
        </a>
        <a href="tel:+962790123456" class="fab-option" data-tooltip="Call Us">
            <i class="bx bx-phone"></i>
        </a>
        <a href="mailto:info@gojordan.com" class="fab-option" data-tooltip="Email Us">
            <i class="bx bx-envelope"></i>
        </a>
    </div>
    <div class="fab fab-main" id="fab-main" title="Quick Contact">
        <i class="bx bx-message-dots"></i>
    </div>
</div>

<style>
    /* Floating Action Button Styles */
    .fab-container {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 999;
    }
    
    .fab-options {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 15px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(20px);
        transition: all 0.3s ease;
    }
    
    .fab-container.active .fab-options {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
    
    .fab-option {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #ce965c;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
        font-size: 1.5rem;
    }
    
    .fab-option:hover {
        transform: scale(1.1);
        background: #b5824f;
    }
    
    .fab-main {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #ce965c;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 1.8rem;
    }
    
    .fab-main:hover {
        transform: scale(1.1);
        background: #b5824f;
    }
    
    .fab-option[data-tooltip]::after {
        content: attr(data-tooltip);
        position: absolute;
        right: 70px;
        background: #333;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 0.8rem;
        white-space: nowrap;
        opacity: 0;
        transition: opacity 0.3s;
    }
    
    .fab-option[data-tooltip]:hover::after {
        opacity: 1;
    }
</style>

<script>
    // Floating Action Button Functionality
    document.addEventListener('DOMContentLoaded', function() {
        const fabContainer = document.getElementById('fab-container');
        const fabMain = document.getElementById('fab-main');
        
        fabMain.addEventListener('click', function() {
            fabContainer.classList.toggle('active');
        });
        
        // Close FAB when clicking outside
        document.addEventListener('click', function(e) {
            if (!fabContainer.contains(e.target)) {
                fabContainer.classList.remove('active');
            }
        });
    });
    
</script>

@endsection