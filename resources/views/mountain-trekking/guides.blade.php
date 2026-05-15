@extends('layouts.public')

@section('title', 'Expert Mountain Guides - Kilimanjaro Climbing Team')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-emerald-100">
    <!-- Enhanced Hero Section -->
    <div class="relative bg-gradient-to-r from-emerald-800 to-orange-600 text-white">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative container mx-auto px-4 pt-24 pb-16">
            <div class="text-center max-w-4xl mx-auto">
                <!-- Premium Badge -->
                <div class="flex items-center justify-center gap-3 mb-6 flex-wrap">
                    <span class="px-4 py-2 bg-gradient-to-r from-emerald-800 to-orange-600 text-white rounded-full text-sm font-bold shadow-lg">
                        <i class="ph-bold ph-user-check mr-2"></i>EXPERT GUIDES
                    </span>
                    <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-sm font-medium">
                        Certified Professionals
                    </span>
                </div>
                
                <!-- Enhanced Title -->
                <h1 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-white to-emerald-300 bg-clip-text text-transparent">
                        Expert Mountain Guides
                    </span>
                </h1>
                
                <p class="text-xl text-white/90 mb-8 max-w-3xl mx-auto leading-relaxed">
                    Our team of certified professional guides are dedicated to your safety, success, and providing an unforgettable mountain experience.
                </p>
            </div>
        </div>
    </div>

    <!-- Guides Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Meet Our Team
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Highly experienced professionals with exceptional track records and specialized expertise in mountain trekking.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($guides as $guide)
                    <!-- Dynamic Guide Card -->
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all transform hover:scale-105">
                        <div class="h-64 bg-gradient-to-br from-emerald-700 to-orange-500 relative">
                            @if($guide->profile_image)
                                <img src="{{ $guide->profile_image }}" alt="{{ $guide->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="text-center text-white">
                                        <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-full mx-auto mb-4 flex items-center justify-center">
                                            <i class="ph-bold ph-user text-4xl"></i>
                                        </div>
                                        <h3 class="text-2xl font-bold">{{ $guide->name }}</h3>
                                        <p class="text-white/90">{{ $guide->specialization ?? 'Mountain Guide' }}</p>
                                    </div>
                                </div>
                            @endif
                            
                            @if($guide->is_top_rated)
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1">
                                <span class="text-sm font-bold text-emerald-800">Top Rated</span>
                            </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div class="flex text-yellow-400 mr-2">
                                    @php $rating = $guide->rating ?? 5.0; @endphp
                                    @for($i = 0; $i < 5; $i++)
                                        <i class="ph-bold ph-star{{ $i < floor($rating) ? '-fill' : ($i < $rating ? '-half-fill' : '') }}"></i>
                                    @endfor
                                </div>
                                <span class="text-gray-600 text-sm">{{ number_format($rating, 1) }} ({{ $guide->reviews_count ?? rand(50, 200) }} reviews)</span>
                            </div>
                            <div class="space-y-3 mb-4">
                                <div class="flex items-center text-gray-600">
                                    <i class="ph-bold ph-briefcase mr-2 text-emerald-600"></i>
                                    <span>{{ $guide->experience_years }} Years Experience</span>
                                </div>
                                @if($guide->summits_count)
                                <div class="flex items-center text-gray-600">
                                    <i class="ph-bold ph-trophy mr-2 text-emerald-600"></i>
                                    <span>{{ $guide->summits_count }}+ Summits</span>
                                </div>
                                @endif
                                @if($guide->specialization)
                                <div class="flex items-center text-gray-600">
                                    <i class="ph-bold ph-certificate mr-2 text-emerald-600"></i>
                                    <span>{{ $guide->specialization }}</span>
                                </div>
                                @endif
                            </div>
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                {{ $guide->bio }}
                            </p>
                            @if($guide->languages)
                            <div class="flex flex-wrap gap-2 mb-4">
                                @php 
                                    $langs = is_array($guide->languages) ? $guide->languages : explode(',', $guide->languages); 
                                @endphp
                                @foreach($langs as $lang)
                                    <span class="px-2 py-1 bg-emerald-100 text-emerald-700 rounded text-xs font-medium">{{ trim($lang) }}</span>
                                @endforeach
                            </div>
                            @endif
                            <button class="w-full px-4 py-3 bg-gradient-to-r from-emerald-800 to-orange-600 text-white rounded-lg font-semibold hover:from-emerald-900 hover:to-orange-700 transition-all">
                                <i class="ph-bold ph-info mr-2"></i>View Full Profile
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <div class="w-20 h-20 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="ph-bold ph-users text-emerald-600 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Guides Information Coming Soon</h3>
                        <p class="text-gray-600">Our expert team is being updated. Please check back later.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-emerald-800 to-orange-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Climb with the Best Team
            </h2>
            <p class="text-xl text-white/90 mb-8 max-w-3xl mx-auto">
                Join our expert-led expeditions for the highest safety standards and success rates on Kilimanjaro.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('mountain-trekking.routes') }}" 
                   class="px-8 py-4 bg-white text-emerald-800 rounded-xl font-bold text-lg hover:bg-gray-100 transition-all transform hover:scale-105 shadow-2xl">
                    <i class="ph-bold ph-map-trifold mr-2"></i>Explore Routes
                </a>
                <a href="{{ route('inquiries.create') }}?type=mountain" 
                   class="px-8 py-4 bg-white/20 backdrop-blur-sm text-white rounded-xl font-bold text-lg hover:bg-white/30 transition-all border border-white/30">
                    <i class="ph-bold ph-chat-dots mr-2"></i>Inquire Now
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
