@extends('layouts.app')
@section('title', 'الملف الشخصي - لوحة التحكم')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><i class="fas fa-user-cog mr-2"></i>{{ __('الملف الشخصي') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">الملف الشخصي</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <div class="profile-image-container">
                                    @if(auth()->user()->avatar)
                                        <img class="profile-user-img img-fluid img-circle" 
                                             src="{{ asset('storage/' . auth()->user()->avatar) }}" 
                                             alt="صورة المستخدم">
                                    @else
                                        <div class="avatar-placeholder">
                                            <i class="fas fa-user-circle fa-5x text-primary"></i>
                                        </div>
                                    @endif
                                </div>
                                <h3 class="profile-username text-center mt-3">{{ auth()->user()->name }}</h3>
                                <p class="text-muted text-center">{{ auth()->user()->email }}</p>
                                
                                <!-- Upload Avatar Form -->
                                <form action="{{ route('admin.profile.avatar') }}" method="POST" 
                                      enctype="multipart/form-data" class="mt-3">
                                    @csrf
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="avatar" name="avatar">
                                            <label class="custom-file-label" for="avatar">اختر صورة</label>
                                        </div>
                                        @error('avatar')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm btn-block">
                                        <i class="fas fa-upload mr-1"></i> تغيير الصورة
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#settings" data-toggle="tab">
                                        <i class="fas fa-user-edit mr-1"></i> الإعدادات
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#password" data-toggle="tab">
                                        <i class="fas fa-lock mr-1"></i> تغيير كلمة المرور
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- Personal Info Tab -->
                                <div class="tab-pane active" id="settings">
                                    <form action="{{ route('admin.profile.update') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label">الاسم الكامل</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                                       id="name" value="{{ old('name', auth()->user()->name) }}">
                                                @error('name')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label">البريد الإلكتروني</label>
                                            <div class="col-sm-9">
                                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                                       id="email" value="{{ old('email', auth()->user()->email) }}">
                                                @error('email')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="phone" class="col-sm-3 col-form-label">رقم الهاتف</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" 
                                                       id="phone" value="{{ old('phone', auth()->user()->phone) }}">
                                                @error('phone')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="offset-sm-3 col-sm-9">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fas fa-save mr-1"></i> حفظ التغييرات
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                                <!-- Change Password Tab -->
                                <div class="tab-pane" id="password">
                                    <form action="{{ route('admin.profile.password') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        
                                        <div class="form-group row">
                                            <label for="current_password" class="col-sm-3 col-form-label">كلمة المرور الحالية</label>
                                            <div class="col-sm-9">
                                                <input type="password" name="current_password" 
                                                       class="form-control @error('current_password') is-invalid @enderror" 
                                                       id="current_password" placeholder="أدخل كلمة المرور الحالية">
                                                @error('current_password')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="new_password" class="col-sm-3 col-form-label">كلمة المرور الجديدة</label>
                                            <div class="col-sm-9">
                                                <input type="password" name="new_password" 
                                                       class="form-control @error('new_password') is-invalid @enderror" 
                                                       id="new_password" placeholder="أدخل كلمة المرور الجديدة">
                                                @error('new_password')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="new_password_confirmation" class="col-sm-3 col-form-label">تأكيد كلمة المرور</label>
                                            <div class="col-sm-9">
                                                <input type="password" name="new_password_confirmation" 
                                                       class="form-control" id="new_password_confirmation" 
                                                       placeholder="أعد إدخال كلمة المرور الجديدة">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="offset-sm-3 col-sm-9">
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-key mr-1"></i> تغيير كلمة المرور
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <style>
        .profile-image-container {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 0 auto;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid #007bff;
        }
        
        .profile-user-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .avatar-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }
        
        .custom-file-label::after {
            content: "استعراض";
        }
        
        .nav-pills .nav-link.active {
            background-color: #007bff;
        }
    </style>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    
    <script>
        $(document).ready(function () {
            // Initialize custom file input
            bsCustomFileInput.init();
            
            // Show toast notification if exists
            @if ($message = Session::get('success'))
                toastr.success('{{ $message }}', '', {
                    closeButton: true,
                    progressBar: true,
                    positionClass: 'toast-top-left',
                    timeOut: 5000
                });
            @endif
            
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error('{{ $error }}', '', {
                        closeButton: true,
                        progressBar: true,
                        positionClass: 'toast-top-left',
                        timeOut: 5000
                    });
                @endforeach
            @endif
        });
    </script>
@endsection