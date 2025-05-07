@extends('layouts.frontend')

@section('title', 'Travel Packages')

@section('content')
<section class="package-hero bg-gradient-to-r from-blue-800 to-purple-900 text-white py-20">
    <div class="container mx-auto text-center px-4">
        <h1 class="text-4xl md:text-6xl font-bold mb-6">Discover Jordan's Wonders</h1>
        <p class="text-xl mb-8">Choose from our carefully curated travel experiences</p>
        @include('partials.search-form')
    </div>
</section>

<section class="package-filters bg-gray-100 py-8">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row gap-6 items-center justify-between">
            <div class="w-full md:w-auto">
                <filter-dropdown title="Category" :items="{{ $categories }}" param="category"/>
            </div>
            <div class="w-full md:w-auto">
                <price-filter :min="{{ $priceRange->min }}" :max="{{ $priceRange->max }}"/>
            </div>
            <div class="w-full md:w-auto">
                <sort-selector/>
            </div>
        </div>
    </div>
</section>

<section class="package-grid py-16">
    <div class="container mx-auto px-4">
        @if($travel_packages->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($travel_packages as $package)
                    <div class="package-card bg-white rounded-xl shadow-lg overflow-hidden transform transition hover:-translate-y-2">
                        <a href="{{ route('travel_package.show', $package->slug) }}">
                            <div class="relative h-48">
                                <img class="w-full h-full object-cover" 
                                     src="{{ $package->galleries->first()->image_url }}" 
                                     alt="{{ $package->title }}">
                                <div class="package-badge absolute top-4 left-4 bg-white text-purple-800 px-4 py-2 rounded-full text-sm font-semibold">
                                    {{ $package->type }}
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ $package->title }}</h3>
                                <div class="flex items-center mb-4">
                                    <x-star-rating :rating="$package->average_rating"/>
                                    <span class="text-sm text-gray-600 ml-2">
                                        ({{ $package->reviews_count }} reviews)
                                    </span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="text-2xl font-bold text-purple-800">${{ $package->price }}</span>
                                        <span class="text-gray-600">/ person</span>
                                    </div>
                                    <span class="text-gray-600">
                                        <i class="fas fa-clock"></i> {{ $package->duration_days }} days
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-8">
                {{ $travel_packages->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <h2 class="text-2xl text-gray-600">No packages found matching your criteria</h2>
            </div>
        @endif
    </div>
</section>
@endsection