@extends('layouts.app')

@section('title', 'Edit User')

@section('styles')
<style>
    .edit-user-card {
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

    .avatar-actions {
        position: relative;
        display: inline-block;
    }

    .avatar-remove-btn {
        position: absolute;
        top: -10px;
        right: -10px;
        background: #fff;
        border-radius: 50%;
        padding: 5px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        display: {{ $user->avatar ? 'block' : 'none' }};
    }

    .form-label {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }

    .password-toggle {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #64748b;
    }

    .change-password-toggle {
        cursor: pointer;
        color: #4a6cf7;
        font-weight: 500;
    }
</style>
@endsection

@section('content')

<div class="content-header bg-primary">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-center">
                <h1 class="m-0 text-white"><i class="fas fa-user-edit mr-2"></i>Edit User</h1>
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
        <div class="card edit-user-card">
            <div class="card-body p-5">
                <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <!-- Avatar Upload -->
                            <div class="form-group text-center mb-4">
                                <div class="avatar-actions">
                                    <img src="{{ $user->avatar ? asset('storage/'.$user->avatar) : asset('images/default-avatar.png') }}" 
                                         class="avatar-preview" 
                                         id="avatarPreview"
                                         onclick="document.getElementById('avatarInput').click()">
                                    @if($user->avatar)
                                    <button type="button" 
                                            class="btn btn-danger btn-sm avatar-remove-btn"
                                            id="removeAvatar">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    @endif
                                </div>
                                <input type="file" 
                                       name="avatar" 
                                       id="avatarInput" 
                                       class="d-none"
                                       accept="image/*">
                                <small class="text-muted d-block mt-2">Click to change profile picture</small>
                                <input type="hidden" name="remove_avatar" id="removeAvatarField" value="0">
                            </div>

                            <!-- Name -->
                            <div class="form-group mb-4">
                                <label class="form-label">Full Name</label>
                                <input type="text" 
                                       name="name" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       value="{{ old('name', $user->name) }}"
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
                                       value="{{ old('email', $user->email) }}"
                                       required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <!-- Password Update Section -->
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <label class="form-label mb-0">Password</label>
                                    <a href="#" class="change-password-toggle" id="togglePasswordFields">
                                        Change Password
                                    </a>
                                </div>
                                
                                <div class="password-fields" style="display: none;">
                                    <div class="form-group mb-3">
                                        <div class="position-relative">
                                            <input type="password" 
                                                   name="password" 
                                                   id="password"
                                                   class="form-control @error('password') is-invalid @enderror" 
                                                   placeholder="New password">
                                            <i class="fas fa-eye password-toggle" id="togglePassword"></i>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="position-relative">
                                            <input type="password" 
                                                   name="password_confirmation" 
                                                   id="passwordConfirm"
                                                   class="form-control" 
                                                   placeholder="Confirm new password">
                                            <i class="fas fa-eye password-toggle" id="togglePasswordConfirm"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="form-group mb-4">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" 
                                       name="phone" 
                                       class="form-control @error('phone') is-invalid @enderror" 
                                       value="{{ old('phone', $user->phone) }}">
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
                                  rows="3">{{ old('bio', $user->bio) }}</textarea>
                        @error('bio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary btn-lg px-5">
                            <i class="fas fa-save mr-2"></i>Save Changes
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
    // Avatar Handling
    const avatarInput = document.getElementById('avatarInput');
    const avatarPreview = document.getElementById('avatarPreview');
    const removeAvatarBtn = document.getElementById('removeAvatar');
    const removeAvatarField = document.getElementById('removeAvatarField');

    avatarInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                avatarPreview.src = e.target.result;
                if(removeAvatarBtn) removeAvatarBtn.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });

    if(removeAvatarBtn) {
        removeAvatarBtn.addEventListener('click', function() {
            avatarPreview.src = "{{ asset('images/default-avatar.png') }}";
            removeAvatarField.value = '1';
            this.style.display = 'none';
            avatarInput.value = '';
        });
    }

    // Password Toggle
    function setupPasswordToggle(inputId, toggleId) {
        const passwordInput = document.getElementById(inputId);
        const toggleButton = document.getElementById(toggleId);

        if(passwordInput && toggleButton) {
            toggleButton.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.classList.toggle('fa-eye-slash');
            });
        }
    }

    setupPasswordToggle('password', 'togglePassword');
    setupPasswordToggle('passwordConfirm', 'togglePasswordConfirm');

    // Password Fields Toggle
    const passwordToggle = document.getElementById('togglePasswordFields');
    const passwordFields = document.querySelector('.password-fields');

    if(passwordToggle && passwordFields) {
        passwordToggle.addEventListener('click', function(e) {
            e.preventDefault();
            passwordFields.style.display = passwordFields.style.display === 'none' ? 'block' : 'none';
            this.textContent = passwordFields.style.display === 'none' ? 'Change Password' : 'Cancel';
        });
    }

    // Form Validation
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        const password = document.getElementById('password')?.value;
        const confirmPassword = document.getElementById('passwordConfirm')?.value;

        if (password && password !== confirmPassword) {
            e.preventDefault();
            alert('Passwords do not match!');
        }
    });
});
</script>
@endsection