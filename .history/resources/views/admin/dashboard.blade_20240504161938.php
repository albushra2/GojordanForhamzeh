@extends('layouts.app')

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

    .dashboard-subtitle {
        font-size: 1.75rem; /* Slightly larger for better visibility */
        color: #f0f0f0;
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

        .dashboard-buttons a {
        margin: 10px;
        padding: 10px 20px;
        color: white;
        text-decoration: none;
    }

    .btn-primary { background-color: #007bff; }
    .btn-secondary { background-color: #6c757d; }
    .btn-success { background-color: #28a745; }

    .quick-stats {
        display: flex;
        justify-content: space-around;
        padding: 20px;
        background: #f8f9fa;
        margin-top: -20px; /* Adjust based on your layout needs */
    }

    .stat-item {
        text-align: center;
        margin: 10px;
    }

    .recent-activity {
        background: white;
        padding: 20px;
        margin: 20px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .recent-activity h3 {
        color: #333;
    }

    .recent-activity ul {
        list-style-type: none;
        padding: 0;
    }

    .recent-activity ul li {
        padding: 10px;
        border-bottom: 1px solid #eee;
    }

    .recent-activity ul li:last-child {
        border-bottom: none;
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
                    <h2 class="dashboard-subtitle">Admin Panel</h2>
                    <h1 class="dashboard-title">Overview</h1>
                    <p class="dashboard-description">
                        Manage your site’s content, users, and settings effectively.
                    </p>
                    <!-- Navigation Buttons -->
                    <div class="dashboard-buttons">
                        <a href="/manage-users" class="btn btn-primary">Manage Users</a>
                        <a href="/settings" class="btn btn-secondary">Settings</a>
                        <a href="/reports" class="btn btn-success">View Reports</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats Panel -->
    <div class="quick-stats">
        <div class="stat-item">
            <h4>Total Users</h4>
            <p>1,234</p>
        </div>
        <div class="stat-item">
            <h4>Active Bookings</h4>
            <p>567</p>
        </div>
        <div class="stat-item">
            <h4>Total Revenue</h4>
            <p>$89,000</p>
        </div>
    </div>

    <!-- Recent Activity Log -->
    <div class="recent-activity">
        <h3>Recent Activity</h3>
        <ul>
            <li>User JohnDoe updated profile.</li>
            <li>New booking by Alice123.</li>
            <li>Payment received from BobSmith.</li>
            <li>Travel package 'Summer Adventure' added.</li>
        </ul>
    </div>
</div>
@endsection