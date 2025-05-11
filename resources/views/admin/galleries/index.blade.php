{{-- @extends('layouts.app')
@section('title', 'Gallery Management')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 justify-content-between d-flex">
                <h1 class="m-0">{{ __('Gallery Management') }}</h1>
                <a href="{{ route('admin.travel_packages.galleries.create', $package->id) }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Back to Packages
                </a>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            @foreach($travelPackages as $package)
            <div class="col-md-4">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">{{ $package->title }}</h3>
                        <span class="badge bg-primary float-right">
                            {{ $package->galleries_count }} images
                        </span>
                    </div>
                    <div class="card-body">
                        @if($package->galleries_count > 0)
                            <img src="{{ Storage::url($package->galleries->first()->image) }}" 
                                 class="img-fluid mb-3" alt="{{ $package->title }}">
                        @endif
                        <a href="{{ route('admin.galleries.create', $package) }}" 
                           class="btn btn-primary btn-block">
                            <i class="fas fa-images"></i> Manage Gallery
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection --}}