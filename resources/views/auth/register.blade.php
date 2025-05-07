@extends('layouts.guest')

@section('content')
    <div class="card-body login-card-body">
        <p class="login-box-msg">{{ __('Register') }}</p>

        <form method="POST" action="{{ route('admin.register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name Field -->
            <div class="input-group mb-3">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                       placeholder="{{ __('Name') }}" required autocomplete="name" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('name')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <!-- Email Field -->
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                       placeholder="{{ __('Email') }}" required autocomplete="email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <!-- Phone Field -->
            <div class="input-group mb-3">
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                       placeholder="{{ __('Phone') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                    </div>
                </div>
                @error('phone')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <!-- Bio Field -->
            <div class="input-group mb-3">
                <textarea name="bio" class="form-control @error('bio') is-invalid @enderror"
                          placeholder="{{ __('Bio') }}"></textarea>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-info-circle"></span>
                    </div>
                </div>
                @error('bio')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <!-- Avatar Field -->
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('avatar') is-invalid @enderror" 
                           id="avatar" name="avatar">
                    <label class="custom-file-label" for="avatar">{{ __('Choose Avatar') }}</label>
                </div>
                @error('avatar')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <!-- Password Fields -->
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                       placeholder="{{ __('Password') }}" required autocomplete="new-password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="password" name="password_confirmation"
                       class="form-control @error('password_confirmation') is-invalid @enderror"
                       placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
<script>
    // Update avatar file input label
    document.getElementById('avatar').addEventListener('change', function(e) {
        var fileName = e.target.files[0]?.name || '{{ __("Choose Avatar") }}';
        document.querySelector('.custom-file-label').textContent = fileName;
    });
</script>
@endsection