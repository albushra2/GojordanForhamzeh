@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<style>
    .dashboard-container {
        width: 100%;
        height: 85vh; /* Set to full viewport height */
        position: relative;
        overflow: hidden;
    }

    .dashboard-bg__img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensure the image covers the full section */
        position: absolute; /* Added to ensure the image stays in place */
    }

    .bg__overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5); /* Dark overlay for better readability */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .dashboard-content {
        text-align: center;
        color: white;
        padding: 20px; /* Added padding for better spacing */
    }

    .dashboard-title {
        font-size: 3rem; /* Increased size for impact */
        margin-top: 0.25rem;
    }

    .dashboard-description {
        font-size: 1.4rem; /* Larger text for better readability */
        margin-top: 1rem;
        max-width: 800px; /* Max width for optimal reading */
        margin-left: auto;
        margin-right: auto;
    }

    @media (max-width: 768px) {
        .dashboard-subtitle, .dashboard-title, .dashboard-description {
            font-size: 90%; /* Smaller text on smaller devices */
        }
    }
</style>

<div class="dashboard-container">
    <div class="dashboard-bg">
        <img src="{{ asset('frontend/assets/img/hero.jpg') }}" alt="Dashboard Background" class="dashboard-bg__img">
        <div class="bg__overlay">
            <div class="dashboard-content container">
                <div class="dashboard-data">
                    <h1 class="dashboard-title">Admin Panel</h1>
                    <p class="dashboard-description">
                        Manage your site’s content, users, and settings effectively.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
