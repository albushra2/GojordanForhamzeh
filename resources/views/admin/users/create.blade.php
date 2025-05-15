@extends('layouts.app')

@section('title', 'Add New Administrator')

@section('styles')
<style>
    .create-user-card {
        max-width: 800px;
        margin: 0 auto;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    }

    .avatar-preview {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #e0e7ff;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .avatar-preview:hover {
        transform: scale(1.05);
        border-color: #4a6cf7;
    }

    .form-label {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }

    .form-control {
        border-radius: 8px;
        padding: 0.75rem 1rem;
        border: 1px solid #e0e7ff;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #4a6cf7;
        box-shadow: 0 0 0 3px rgba(74, 108, 247, 0.15);
    }

    .password-toggle {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #64748b;
    }

    @media (max-width: 768px) {
        .create-user-card {
            border-radius: 0;
            box-shadow: none;
        }
    }
</style>
@endsection

@section('content')

<div class="content-header bg-primary">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-center">
                <h1 class="m-0 text-white"><i class="fas fa-user-plus mr-2"></i>Add New Administrator</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('admin.users.index') }}" class="btn btn-light">
                    <i class="fas fa-arrow-left mr-1"></i>Back to Users
                </a>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card create-user-card">
            <div class="card-body p-5">
                <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <!-- Avatar Upload -->
                            <div class="form-group text-center mb-4">
                                <img src="{{ asset('images/default-avatar.png') }}" 
                                     class="avatar-preview" 
                                     id="avatarPreview"
                                     onclick="document.getElementById('avatarInput').click()">
                                <input type="file" 
                                       name="avatar" 
                                       id="avatarInput" 
                                       class="d-none"
                                       accept="image/*">
                                <small class="text-muted d-block mt-2">Click to upload profile picture</small>
                            </div>

                            <!-- Name -->
                            <div class="form-group mb-4">
                                <label class="form-label">Full Name</label>
                                <input type="text" 
                                       name="name" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       value="{{ old('name') }}"
                                       required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-group mb-4">
                                <label class="form-label">Email Address</label>
                                <input type="email" 
                                       name="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       value="{{ old('email') }}"
                                       required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <!-- Password -->
                            <div class="form-group mb-4">
                                <label class="form-label">Password</label>
                                <div class="position-relative">
                                    <input type="password" 
                                           name="password" 
                                           id="password"
                                           class="form-control @error('password') is-invalid @enderror" 
                                           required>
                                    <i class="fas fa-eye password-toggle" id="togglePassword"></i>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group mb-4">
                                <label class="form-label">Confirm Password</label>
                                <div class="position-relative">
                                    <input type="password" 
                                           name="password_confirmation" 
                                           id="passwordConfirm"
                                           class="form-control" 
                                           required>
                                    <i class="fas fa-eye password-toggle" id="togglePasswordConfirm"></i>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="form-group mb-4">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" 
                                       name="phone" 
                                       class="form-control @error('phone') is-invalid @enderror" 
                                       value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                          
                        </div>
                    </div>

                    <!-- Bio -->
                    <div class="form-group mb-4">
                        <label class="form-label">Bio</label>
                        <textarea name="bio" 
                                  class="form-control @error('bio') is-invalid @enderror" 
                                  rows="3">{{ old('bio') }}</textarea>
                        @error('bio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary btn-lg px-5">
                            <i class="fas fa-user-plus mr-2"></i>Create Administrator
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Avatar Preview
    const avatarInput = document.getElementById('avatarInput');
    const avatarPreview = document.getElementById('avatarPreview');

    avatarInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                avatarPreview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });

    // Password Toggle
    function setupPasswordToggle(inputId, toggleId) {
        const passwordInput = document.getElementById(inputId);
        const toggleButton = document.getElementById(toggleId);

        toggleButton.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    }

    setupPasswordToggle('password', 'togglePassword');
    setupPasswordToggle('passwordConfirm', 'togglePasswordConfirm');

    // Form Validation
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('passwordConfirm').value;

        if (password !== confirmPassword) {
            e.preventDefault();
            alert('Passwords do not match!');
        }
    });
});
</script>
@endsection