@extends('layouts.guest')

@section('content')
<div class="login-container">
    <div class="login-wrapper">
        <!-- Header with Logo -->
        <div class="login-header">
            
            <h2 class="login-title">Admin Portal</h2>
            <p class="login-subtitle">Sign in to your administrator account</p>
        </div>

        <!-- Login Form -->
        <div class="login-form-container">
            <form action="{{ route('admin.login') }}" method="post" class="login-form">
                @csrf
                
                <!-- Email Field -->
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                        <input type="email" name="email" id="email" class="form-control" 
                               placeholder="admin@example.com" required autofocus>
                    </div>
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                        <input type="password" name="password" id="password" 
                               class="form-control" placeholder="••••••••" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary toggle-password" type="button">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="form-options">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                        <label class="custom-control-label" for="remember">Remember me</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="forgot-password">Forgot password?</a>                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary btn-login">
                    <i class="fas fa-sign-in-alt mr-2"></i> Sign In
                </button>

                <!-- Error Messages -->
                @if($errors->any())
                    <div class="alert alert-danger mt-3">
                        @foreach($errors->all() as $error)
                            <p class="mb-0">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </form>
        </div>

        <!-- Footer -->
        <div class="login-footer">
            <p class="copyright">&copy; {{ date('Y') }} GO JORDAN. All rights reserved.</p>
            <p class="version">v1.0.0</p>
        </div>
    </div>
</div>

<style>
    :root {
        --primary-color: #3490dc;
        --secondary-color: #6c757d;
        --dark-color: #343a40;
        --light-color: #f8f9fa;
        --danger-color: #dc3545;
    }

    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .login-container {
        width: 100%;
        max-width: 420px;
        padding: 20px;
    }

    .login-wrapper {
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .login-header {
        padding: 30px 20px;
        text-align: center;
        background: linear-gradient(135deg, var(--primary-color) 0%, #4f6fc8 100%);
        color: white;
    }

    .logo-container {
        margin-bottom: 15px;
    }

    .logo-img {
        height: 60px;
        width: auto;
    }

    .login-title {
        font-weight: 600;
        margin-bottom: 5px;
    }

    .login-subtitle {
        opacity: 0.9;
        font-size: 0.9rem;
    }

    .login-form-container {
        padding: 25px;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: var(--dark-color);
    }

    .input-group-text {
        background-color: var(--light-color);
        border-right: none;
    }

    .form-control {
        border-left: none;
        padding-left: 0;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #ced4da;
    }

    .form-control:focus + .input-group-prepend .input-group-text {
        border-color: #80bdff;
    }

    .toggle-password {
        border-left: none;
        background-color: var(--light-color);
    }

    .form-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .forgot-password {
        color: var(--secondary-color);
        font-size: 0.85rem;
    }

    .forgot-password:hover {
        color: var(--primary-color);
        text-decoration: none;
    }

    .btn-login {
        width: 100%;
        padding: 12px;
        font-weight: 500;
        letter-spacing: 0.5px;
        border-radius: 6px;
        background: linear-gradient(to right, var(--primary-color), #4f6fc8);
        border: none;
        transition: all 0.3s ease;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(52, 144, 220, 0.3);
    }

    .login-footer {
        padding: 15px;
        text-align: center;
        background-color: var(--light-color);
        font-size: 0.8rem;
        color: var(--secondary-color);
    }

    .copyright, .version {
        margin-bottom: 0;
    }

    /* Responsive adjustments */
    @media (max-width: 576px) {
        .login-container {
            padding: 15px;
        }
        
        .login-header {
            padding: 20px 15px;
        }
        
        .login-form-container {
            padding: 20px 15px;
        }
    }
</style>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle password visibility
        const togglePassword = document.querySelector('.toggle-password');
        const password = document.querySelector('#password');
        
        if (togglePassword && password) {
            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
        }
    });
</script>
@endsection