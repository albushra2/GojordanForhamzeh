@extends('layouts.frontend')

@section('title', $travel_package->title)

@section('content')
<section class="package-header bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <nav class="flex mb-4" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 text-gray-600">
                <li><a href="{{ route('homepage') }}" class="hover:text-purple-800">Home</a></li>
                <li><span class="mx-2">/</span></li>
                <li><a href="{{ route('travel_package.index') }}" class="hover:text-purple-800">Packages</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="font-semibold">{{ $travel_package->title }}</li>
            </ol>
        </nav>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="relative">
                <div class="package-gallery swiper-container h-96">
                    <div class="swiper-wrapper">
                        @foreach($travel_package->galleries as $gallery)
                            <div class="swiper-slide">
                                <img src="{{ $gallery->image_url }}" 
                                     alt="Gallery image {{ $loop->iteration }}" 
                                     class="w-full h-full object-cover">
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                
                <div class="absolute bottom-4 right-4 bg-white px-4 py-2 rounded-full shadow-md">
                    <i class="fas fa-camera mr-2 text-purple-800"></i>
                    <span>{{ $travel_package->galleries->count() }} Photos</span>
                </div>
            </div>

            <div class="p-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                    <h1 class="text-3xl font-bold mb-4 md:mb-0">{{ $travel_package->title }}</h1>
                    <div class="flex items-center">
                        <x-star-rating :rating="$travel_package->average_rating" size="lg"/>
                        <span class="ml-2 text-gray-600">({{ $travel_package->reviews_count }} reviews)</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                    <div class="bg-purple-50 p-6 rounded-xl">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-purple-800 mb-2">${{ $travel_package->price }}</div>
                            <div class="text-gray-600">per person</div>
                        </div>
                    </div>
                    
                    <div class="bg-blue-50 p-6 rounded-xl">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-800 mb-2">{{ $travel_package->duration_days }}</div>
                            <div class="text-gray-600">days tour</div>
                        </div>
                    </div>
                    
                    <div class="bg-green-50 p-6 rounded-xl">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-800 mb-2">{{ $travel_package->type }}</div>
                            <div class="text-gray-600">tour type</div>
                        </div>
                    </div>
                </div>

                <div class="mb-8">
                    <h2 class="text-2xl font-bold mb-4">Tour Highlights</h2>
                    <div class="prose max-w-none">
                        {!! Str::markdown($travel_package->description) !!}
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="itinerary">
                        <h2 class="text-2xl font-bold mb-4">Detailed Itinerary</h2>
                        <div class="space-y-4">
                            @foreach(json_decode($travel_package->itinerary) as $day)
                                <div class="bg-white border-l-4 border-purple-800 shadow-sm p-4">
                                    <h3 class="font-semibold mb-2">Day {{ $loop->iteration }}: {{ $day->title }}</h3>
                                    <p class="text-gray-600">{{ $day->description }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="booking-form bg-gray-50 p-6 rounded-xl">
                        <h2 class="text-2xl font-bold mb-6">Book This Tour</h2>
                        @include('partials.booking-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if($relatedPackages->count())
<section class="related-packages py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-8">Related Packages</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($relatedPackages as $package)
                @include('partials.package-card', ['package' => $package])
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection

@push('scripts')
<script>
    const swiper = new Swiper('.package-gallery', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>
@endpush