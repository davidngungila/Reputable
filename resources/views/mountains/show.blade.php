@extends('layouts.public')

@section('title', $mountain->name . ' - Mountain Trekking')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 bg-cover bg-center" style="background-image: url('{{ !empty($mountain->images) ? $mountain->images[0] : 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468773/tree-2600482_1920_c50vn6.jpg' }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative container mx-auto px-4 h-full flex items-center">
        <div class="text-white">
            <h1 class="text-5xl font-bold mb-4">{{ $mountain->name }}</h1>
            <p class="text-xl mb-2">{{ $mountain->height }} {{ $mountain->height_unit }}</p>
            <p class="text-lg">{{ $mountain->location }}</p>
        </div>
    </div>
</section>

<!-- Mountain Overview -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <h2 class="text-3xl font-bold mb-6">Overview</h2>
                <p class="text-gray-600 mb-8">{{ $mountain->description }}</p>

                <h3 class="text-2xl font-bold mb-4">Trekking Information</h3>
                <p class="text-gray-600 mb-8">{{ $mountain->trekking_info }}</p>

                @if($mountain->highlights)
                <h3 class="text-2xl font-bold mb-4">Highlights</h3>
                <ul class="space-y-2 mb-8">
                    @foreach($mountain->highlights as $highlight)
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-2 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ $highlight }}</span>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 sticky top-4">
                    <h3 class="text-xl font-bold mb-4">Quick Facts</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <span class="text-sm text-gray-500">Height</span>
                            <p class="font-semibold">{{ $mountain->height }} {{ $mountain->height_unit }}</p>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Difficulty</span>
                            <p class="font-semibold">{{ $mountain->difficulty_level }}</p>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Duration</span>
                            <p class="font-semibold">{{ $mountain->duration_days }} days</p>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Price From</span>
                            <p class="font-semibold text-2xl text-green-600">${{ number_format($mountain->price_from, 2) }}</p>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Best Season</span>
                            <p class="font-semibold">{{ $mountain->best_season }}</p>
                        </div>
                    </div>

                    <div class="mt-6 space-y-3">
                        <a href="{{ route('mountains.routes', $mountain->slug) }}" class="block w-full bg-blue-600 text-white text-center py-3 px-4 rounded hover:bg-blue-700 transition">
                            View Routes
                        </a>
                        <a href="{{ route('mountains.trekking-info', $mountain->slug) }}" class="block w-full border border-blue-600 text-blue-600 text-center py-3 px-4 rounded hover:bg-blue-50 transition">
                            Trekking Info
                        </a>
                        <a href="{{ route('mountains.equipment', $mountain->slug) }}" class="block w-full border border-gray-300 text-gray-700 text-center py-3 px-4 rounded hover:bg-gray-50 transition">
                            Equipment Guide
                        </a>
                        <a href="{{ route('mountains.guides', $mountain->slug) }}" class="block w-full border border-gray-300 text-gray-700 text-center py-3 px-4 rounded hover:bg-gray-50 transition">
                            Expert Guides
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Weather Information -->
@if($mountain->weather_info)
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold mb-6 text-center">Weather Information</h2>
            <div class="bg-white rounded-lg shadow-lg p-8">
                <p class="text-gray-600">{{ $mountain->weather_info }}</p>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Gallery -->
@if(!empty($mountain->images) && count($mountain->images) > 1)
<section class="py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-8 text-center">Gallery</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($mountain->images as $image)
            <div class="relative h-48 bg-cover bg-center rounded-lg overflow-hidden cursor-pointer hover:scale-105 transition-transform">
                <img src="{{ $image }}" alt="{{ $mountain->name }}" class="w-full h-full object-cover">
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-16 bg-blue-600">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Ready to Conquer {{ $mountain->name }}?</h2>
        <p class="text-blue-100 mb-8 max-w-2xl mx-auto">Join our expert guides for an unforgettable climbing experience. All routes available with professional support.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('mountains.routes', $mountain->slug) }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                Choose Your Route
            </a>
            <a href="/contact" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition">
                Contact Us
            </a>
        </div>
    </div>
</section>
@endsection
