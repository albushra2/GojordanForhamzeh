@extends('layouts.frontend')

@section('title', 'Travel Packages')

@section('content')
    <div class="container">
        <h1>Featured Travel Packages</h1>

        <div class="row">
            @forelse ($featured as $package) {{-- Using $package for each item in the loop --}}
                <div class="col-md-3 mb-4"> {{-- Adjust column size as needed --}}
                    <div class="card">
                        {{-- Display first gallery image as thumbnail --}}
                        @if ($package->galleries->count() > 0)
                             <img src="{{ Storage::url($package->galleries->first()->image) }}" class="card-img-top" alt="{{ $package->title }}" style="height: 180px; object-fit: cover;">
                        @else
                            <div class="bg-light text-center d-flex align-items-center justify-content-center" style="height: 180px;">
                                No Image
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $package->title }}</h5>
                             <p class="card-text">
                                Location: {{ $package->location }}<br>
                                Price: ${{ number_format($package->price) }}
                            </p>
                            {{-- Link to the package details page --}}
                            <a href="{{ route('travel_packages.show', $package) }}" class="btn btn-primary btn-sm">Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>No featured travel packages available.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection