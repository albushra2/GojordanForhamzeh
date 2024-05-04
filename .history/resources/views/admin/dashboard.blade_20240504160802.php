@extends('layouts.app')

@section('content')


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
