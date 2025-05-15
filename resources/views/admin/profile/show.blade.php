@extends('layouts.app')
@section('title', 'Admin Profile')

@section('content')
<div class="container-fluid px-4">
    <div class="card shadow-lg">
        <div class="card-header bg-gradient-primary text-white">
            <h3 class="mb-0">
                <i class="fas fa-user-shield"></i> Administrator Profile
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Profile Information -->
                <div class="col-md-8">
                    <div class="d-flex align-items-center mb-4">
                        <div class="icon-circle bg-primary me-3">
                            <i class="fas fa-user fa-2x text-white"></i>
                        </div>
                        <div>
                            <h2 class="mb-0">{{ $admin->name }}</h2>
                            <p class="text-muted mb-0">Administrator Account</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-card mb-4">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">
                                            <i class="fas fa-id-card me-2"></i>Basic Information
                                        </h5>
                                        <dl class="mb-0">
                                            <dt>Full Name</dt>
                                            <dd>{{ $admin->name }}</dd>
                                            
                                            <dt class="mt-3">Email Address</dt>
                                            <dd>{{ $admin->email }}</dd>
                                            
                                            <dt class="mt-3">Account Created</dt>
                                            <dd>{{ $admin->created_at->format('M d, Y') }}</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-card mb-4">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">
                                            <i class="fas fa-shield-alt me-2"></i>Security
                                        </h5>
                                        <dl class="mb-0">
                                            <dt>Password Last Updated</dt>
                                            <dd>{{ $admin->updated_at->diffForHumans() }}</dd>
                                            
                                            <dt class="mt-3">Two-Factor Authentication</dt>
                                            <dd class="text-danger">Not Enabled</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Summary -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="avatar-wrapper mb-3">
                                <div class="avatar-initials bg-primary text-white rounded-circle">
                                    {{ strtoupper(substr($admin->name, 0, 1)) }}
                                </div>
                            </div>
                            <h5 class="mb-1">{{ $admin->name }}</h5>
                            <p class="text-muted mb-3">System Administrator</p>
                            
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Total Logins</span>
                                    <span class="badge bg-primary">1,234</span>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Active Sessions</span>
                                    <span class="badge bg-success">2</span>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Account Status</span>
                                    <span class="badge bg-success">Active</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .icon-circle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .avatar-initials {
        width: 120px;
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 48px;
        font-weight: 600;
        margin: 0 auto;
    }

    .info-card .card {
        border-radius: 15px;
        transition: transform 0.3s ease;
    }

    .info-card .card:hover {
        transform: translateY(-5px);
    }

    dt {
        font-weight: 500;
        color: #6c757d;
        font-size: 0.9rem;
    }

    dd {
        font-weight: 600;
        color: #2c3e50;
        font-size: 1rem;
    }
</style>
@endsection