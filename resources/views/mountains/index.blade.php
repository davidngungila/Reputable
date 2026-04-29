@extends('layouts.public')

@section('title', 'Mountain Trekking - Tanzania\'s Premier Peaks')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 bg-cover bg-center" style="background-image: url('https://res.cloudinary.com/dqflffa1o/image/upload/v1777468773/tree-2600482_1920_c50vn6.jpg');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative container mx-auto px-4 h-full flex items-center">
        <div class="text-white">
            <h1 class="text-5xl font-bold mb-4">Mountain Trekking</h1>
            <p class="text-xl mb-6">Conquer Africa's most spectacular peaks</p>
            <p class="max-w-2xl">Experience the thrill of climbing Mount Kilimanjaro and Mount Meru with expert guides and comprehensive support</p>
        </div>
    </div>
</section>

<!-- Mountains Grid -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4">Choose Your Adventure</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Select from Tanzania's most iconic mountains for your trekking adventure</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            @foreach($mountains as $mountain)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                @if(!empty($mountain->images))
                <div class="h-64 bg-cover bg-center" style="background-image: url('{{ $mountain->images[0] }}');">
                    <div class="h-full bg-gradient-to-t from-black/50 to-transparent flex items-end">
                        <div class="p-6 text-white">
                            <h3 class="text-3xl font-bold">{{ $mountain->name }}</h3>
                            <p class="text-lg">{{ $mountain->height }} {{ $mountain->height_unit }}</p>
                        </div>
                    </div>
                </div>
                @else
                <div class="h-64 bg-gray-200 flex items-center justify-center">
                    <div class="text-center">
                        <h3 class="text-3xl font-bold text-gray-700">{{ $mountain->name }}</h3>
                        <p class="text-lg text-gray-600">{{ $mountain->height }} {{ $mountain->height_unit }}</p>
                    </div>
                </div>
                @endif
                
                <div class="p-6">
                    <p class="text-gray-600 mb-4">{{ Str::limit($mountain->description, 150) }}</p>
                    
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <span class="text-sm text-gray-500">Difficulty</span>
                            <p class="font-semibold">{{ $mountain->difficulty_level }}</p>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Duration</span>
                            <p class="font-semibold">{{ $mountain->duration_days }} days</p>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">From</span>
                            <p class="font-semibold">${{ number_format($mountain->price_from, 2) }}</p>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Best Season</span>
                            <p class="font-semibold">{{ $mountain->best_season }}</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-2 mb-6">
                        @if($mountain->highlights)
                            @foreach(array_slice($mountain->highlights, 0, 3) as $highlight)
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">{{ $highlight }}</span>
                            @endforeach
                        @endif
                    </div>

                    <div class="flex gap-3">
                        <a href="{{ route('mountains.show', $mountain->slug) }}" class="flex-1 bg-blue-600 text-white text-center py-2 px-4 rounded hover:bg-blue-700 transition">
                            View Details
                        </a>
                        <a href="{{ route('mountains.routes', $mountain->slug) }}" class="flex-1 border border-blue-600 text-blue-600 text-center py-2 px-4 rounded hover:bg-blue-50 transition">
                            View Routes
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Quick Links Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Trekking Resources</h2>
            <p class="text-gray-600">Everything you need to know for your mountain adventure</p>
        </div>

        <div class="grid md:grid-cols-4 gap-6">
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="font-semibold mb-2">Trekking Info</h3>
                <p class="text-gray-600 text-sm mb-4">Comprehensive guides for each mountain</p>
                <a href="{{ route('mountain-trekking.info') }}" class="text-blue-600 hover:underline text-sm">Learn More →</a>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                    </svg>
                </div>
                <h3 class="font-semibold mb-2">Trekking Routes</h3>
                <p class="text-gray-600 text-sm mb-4">All available climbing routes</p>
                <a href="{{ route('mountain-trekking.routes') }}" class="text-green-600 hover:underline text-sm">View Routes →</a>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                    </svg>
                </div>
                <h3 class="font-semibold mb-2">Equipment Guide</h3>
                <p class="text-gray-600 text-sm mb-4">Essential gear for your climb</p>
                <a href="#" class="text-purple-600 hover:underline text-sm">Equipment List →</a>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="font-semibold mb-2">Expert Guides</h3>
                <p class="text-gray-600 text-sm mb-4">Meet our experienced mountain guides</p>
                <a href="#" class="text-orange-600 hover:underline text-sm">Our Guides →</a>
            </div>
        </div>
    </div>
</section>
@endsection
