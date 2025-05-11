@extends('layouts.frontend')


@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Featured Travel Packages</h1>
    
    <div class="row">
        @foreach($featured as $package)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    @if($package->galleries->isNotEmpty())
                        <img src="{{ asset($package->galleries->first()->image_path) }}" 
                             class="card-img-top" alt="{{ $package->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $package->title }}</h5>
                        <p class="text-muted small">{{ $package->category->name }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h5 text-primary">{{ $package->price }}</span>
                            <a href="{{ route('travel_packages.show', $package) }}" 
                               class="btn btn-sm btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection