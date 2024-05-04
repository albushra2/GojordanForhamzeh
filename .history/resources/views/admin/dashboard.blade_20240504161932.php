@extends('layouts.app')

@section('content')

<style>
    .dashboard-container {
    width: 100%;
    height: 300px; /* You can adjust the height as needed */
    position: relative;
    overflow: hidden;
}

.dashboard-bg__img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensure the image covers the full section */
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
}

.dashboard-subtitle {
    font-size: 1.5rem;
    color: #f0f0f0;
}

.dashboard-title {
    font-size: 2.5rem;
    margin-top: 0.5rem;
}

.dashboard-description {
    font-size: 1.2rem;
    margin-top: 1rem;
}

</style>
<div class="dashboard-container">
    <div class="dashboard-bg">
        <img src="{{ asset('frontend/assets/img/dashboard-bg.jpg') }}" alt="Dashboard Background" class="dashboard-bg__img">
        <div class="bg__overlay">
            <div class="dashboard-content container">
                <div class="dashboard-data" style="position: relative; z-index: 99;">
                    <h2 class="dashboard-subtitle">Admin Panel</h2>
                    <h1 class="dashboard-title">Overview</h1>
                    <p class="dashboard-description">
                        Manage your site’s content, users, and settings effectively.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
