<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tourist Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .form-control.is-invalid {
            border-color: #dc3545;
            padding-right: calc(1.5em + 0.75rem);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }
        .password-strength {
            height: 5px;
            margin-top: 5px;
            background-color: #e9ecef;
            border-radius: 3px;
            overflow: hidden;
        }
        .password-strength-bar {
            height: 100%;
            width: 0%;
            transition: width 0.3s, background-color 0.3s;
        }
        .password-requirements {
            font-size: 0.85rem;
            margin-top: 5px;
        }
        .requirement {
            display: flex;
            align-items: center;
            margin-bottom: 3px;
            color: #6c757d;
        }
        .requirement i {
            margin-right: 5px;
            font-size: 0.7rem;
        }
        .requirement.valid {
            color: #28a745;
        }
        .loading-spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
            margin-left: 10px;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0 text-center">Create Tourist Account</h3>
                </div>
                
                <div class="card-body p-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    @if($errors->any()))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    <form id="registerForm" method="POST" action="{{ route('touristregister.post') }}" novalidate>
                        @csrf
                        
                        <!-- Name Field -->
                        <div class="mb-4">
                            <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}" 
                                   placeholder="Enter your full name (first and last name)" required autofocus>
                            @error('name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Email Field -->
                        <div class="mb-4">
                            <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" 
                                   placeholder="example@domain.com" required>
                            @error('email')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Phone Field -->
                        <div class="mb-4">
                            <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                   id="phone" name="phone" value="{{ old('phone') }}" 
                                   placeholder="Enter your phone number with country code" required>
                            @error('phone')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Password Field -->
                        <div class="mb-4">
                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                       id="password" name="password" 
                                       placeholder="At least 8 characters" required>
                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                            <div class="password-strength mt-2">
                                <div class="password-strength-bar" id="password-strength-bar"></div>
                            </div>
                            <div class="password-requirements">
                                <div class="requirement" id="length-req">
                                    <i class="far fa-circle"></i> At least 8 characters
                                </div>
                                <div class="requirement" id="uppercase-req">
                                    <i class="far fa-circle"></i> At least one uppercase letter
                                </div>
                                <div class="requirement" id="lowercase-req">
                                    <i class="far fa-circle"></i> At least one lowercase letter
                                </div>
                                <div class="requirement" id="number-req">
                                    <i class="far fa-circle"></i> At least one number
                                </div>
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Confirm Password Field -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" class="form-control" 
                                       id="password_confirmation" name="password_confirmation" 
                                       placeholder="Confirm your password" required>
                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                            <div id="password-match-feedback" class="text-danger small mt-1" style="display: none;">
                                Passwords do not match
                            </div>
                        </div>
                        
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg py-2" id="registerBtn">
                                <i class="fas fa-user-plus me-2"></i> Register Now
                                <span class="loading-spinner" id="registerSpinner"></span>
                            </button>
                        </div>
                        
                        <div class="text-center">
                            <p class="mb-0">Already have an account? 
                                <a href="{{ route('tourist_user.login') }}" class="text-primary fw-bold">Login here</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="mt-4 text-center text-muted">
                <small>By registering, you agree to our <a href="#" class="text-decoration-none">Terms of Service</a> 
                and <a href="#" class="text-decoration-none">Privacy Policy</a>.</small>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('registerForm');
    const registerBtn = document.getElementById('registerBtn');
    const registerSpinner = document.getElementById('registerSpinner');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password_confirmation');
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');
    const strengthBar = document.getElementById('password-strength-bar');
    const passwordMatchFeedback = document.getElementById('password-match-feedback');
    const togglePasswordBtns = document.querySelectorAll('.toggle-password');
    
    // Toggle password visibility
    togglePasswordBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const passwordInput = this.previousElementSibling;
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    });
    
    // Password strength and requirements check
    passwordInput.addEventListener('input', function () {
        const password = this.value;
        
        // Check requirements
        const hasLength = password.length >= 8;
        const hasUpper = /[A-Z]/.test(password);
        const hasLower = /[a-z]/.test(password);
        const hasNumber = /\d/.test(password);
        
        // Update requirement indicators
        updateRequirement('length-req', hasLength);
        updateRequirement('uppercase-req', hasUpper);
        updateRequirement('lowercase-req', hasLower);
        updateRequirement('number-req', hasNumber);
        
        // Calculate strength (0-4)
        let strength = 0;
        if (hasLength) strength++;
        if (hasUpper) strength++;
        if (hasLower) strength++;
        if (hasNumber) strength++;
        
        // Update strength bar
        const width = (strength / 4) * 100;
        strengthBar.style.width = width + '%';
        
        // Update color based on strength
        if (strength <= 1) {
            strengthBar.style.backgroundColor = '#dc3545';
        } else if (strength <= 2) {
            strengthBar.style.backgroundColor = '#fd7e14';
        } else if (strength <= 3) {
            strengthBar.style.backgroundColor = '#ffc107';
        } else {
            strengthBar.style.backgroundColor = '#28a745';
        }
        
        // Check password match if confirm password has value
        if (confirmPasswordInput.value) {
            checkPasswordMatch();
        }
    });
    
    // Confirm password match check
    confirmPasswordInput.addEventListener('input', checkPasswordMatch);
    
    function checkPasswordMatch() {
        if (passwordInput.value !== confirmPasswordInput.value) {
            passwordMatchFeedback.style.display = 'block';
            confirmPasswordInput.classList.add('is-invalid');
            return false;
        } else {
            passwordMatchFeedback.style.display = 'none';
            confirmPasswordInput.classList.remove('is-invalid');
            return true;
        }
    }
    
    function updateRequirement(id, isValid) {
        const element = document.getElementById(id);
        const icon = element.querySelector('i');
        
        if (isValid) {
            element.classList.add('valid');
            icon.classList.remove('fa-circle');
            icon.classList.add('fa-check-circle');
        } else {
            element.classList.remove('valid');
            icon.classList.remove('fa-check-circle');
            icon.classList.add('fa-circle');
        }
    }
    
    // Form validation
    form.addEventListener('submit', function (e) {
        let isValid = true;
        
        // Clear previous errors
        document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        document.querySelectorAll('.invalid-feedback').forEach(el => el.style.display = 'none');
        
        // Validate name (at least 2 words)
        const name = nameInput.value.trim();
        const nameParts = name.split(/\s+/);
        if (!name) {
            showError('name', 'Full name is required.');
            isValid = false;
        } else if (nameParts.length < 2) {
            showError('name', 'Please enter your full name (at least first and last name).');
            isValid = false;
        }
        
        // Validate email
        const email = emailInput.value.trim();
        if (!email) {
            showError('email', 'Email address is required.');
            isValid = false;
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            showError('email', 'Please enter a valid email address.');
            isValid = false;
        }
        
        // Validate phone (basic international format)
        const phone = phoneInput.value.trim();
        if (!phone) {
            showError('phone', 'Phone number is required.');
            isValid = false;
        } else if (!/^\+?[\d\s\-\(\)]{8,}$/.test(phone)) {
            showError('phone', 'Please enter a valid phone number with country code.');
            isValid = false;
        }
        
        // Validate password
        const password = passwordInput.value;
        if (!password) {
            showError('password', 'Password is required.');
            isValid = false;
        } else if (password.length < 8) {
            showError('password', 'Password must be at least 8 characters.');
            isValid = false;
        } else if (!/[A-Z]/.test(password)) {
            showError('password', 'Password must contain at least one uppercase letter.');
            isValid = false;
        } else if (!/[a-z]/.test(password)) {
            showError('password', 'Password must contain at least one lowercase letter.');
            isValid = false;
        } else if (!/\d/.test(password)) {
            showError('password', 'Password must contain at least one number.');
            isValid = false;
        }
        
        // Validate password match
        if (!checkPasswordMatch()) {
            isValid = false;
        }
        
        if (!isValid) {
            e.preventDefault();
        } else {
            // Show loading spinner
            registerBtn.disabled = true;
            registerSpinner.style.display = 'inline-block';
        }
    });
    
    function showError(fieldId, message) {
        const input = document.getElementById(fieldId);
        input.classList.add('is-invalid');
        
        let errorDiv = input.nextElementSibling;
        if (!errorDiv || !errorDiv.classList.contains('invalid-feedback')) {
            errorDiv = document.createElement('div');
            errorDiv.className = 'invalid-feedback d-block';
            input.parentNode.insertBefore(errorDiv, input.nextSibling);
        }
        
        errorDiv.textContent = message;
        errorDiv.style.display = 'block';
    }
});
</script>
</body>
</html> --}}