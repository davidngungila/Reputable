@extends('layouts.public')

@section('title', $mountain->name . ' - Mountain Trekking')

@section('content')
@if($heroSlides->count() > 0)
<!-- Hero Slider -->
<section class="relative h-96 overflow-hidden">
    <!-- Swiper -->
    <div class="swiper mountainHeroSwiper h-full w-full">
        <div class="swiper-wrapper">
            @foreach($heroSlides as $slide)
            <div class="swiper-slide relative flex items-center">
                <div class="absolute inset-0 z-0">
                    <img src="{{ $slide->image_url }}" alt="{{ $slide->title }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/40 to-transparent"></div>
                </div>
                <div class="relative z-10 max-w-7xl mx-auto px-6 w-full pt-12">
                    <div class="max-w-2xl translate-y-10 opacity-0 transition-all duration-1000 slide-content">
                        <span class="inline-block px-4 py-1.5 bg-[#1F5A3A]/20 text-[#E67A2E] rounded-full text-xs font-bold tracking-widest uppercase mb-4 border border-[#1F5A3A]/30">Mountain Adventure</span>
                        <h1 class="text-3xl md:text-5xl font-serif text-white mb-6 leading-[1.1]">{!! $slide->title !!}</h1>
                        @if($slide->subtitle)
                        <p class="text-lg text-slate-200 mb-8 leading-relaxed">{{ $slide->subtitle }}</p>
                        @endif
                        @if($slide->button_text && $slide->button_url)
                        <div class="flex flex-col sm:flex-row items-center gap-4">
                            <a href="{{ $slide->button_url }}" class="w-full sm:w-auto px-8 py-3 bg-[#1F5A3A] text-white font-bold rounded-full hover:bg-[#1F5A3A]/90 shadow-xl shadow-[#1F5A3A]/30 transition-all text-center">
                                {{ $slide->button_text }}
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Navigation -->
        <div class="absolute bottom-6 right-6 z-20 flex gap-3">
            <button class="swiper-prev w-12 h-12 rounded-full border border-white/20 bg-white/10 text-white flex items-center justify-center hover:bg-[#1F5A3A] hover:border-[#1F5A3A] transition-all backdrop-blur-md">
                <i class="ph ph-caret-left text-xl"></i>
            </button>
            <button class="swiper-next w-12 h-12 rounded-full border border-white/20 bg-white/10 text-white flex items-center justify-center hover:bg-[#1F5A3A] hover:border-[#1F5A3A] transition-all backdrop-blur-md">
                <i class="ph ph-caret-right text-xl"></i>
            </button>
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination !bottom-6 !left-6 !text-left !w-auto"></div>
    </div>
</section>
@endif

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

@if($heroSlides->count() > 0)
<style>
    .swiper-pagination-bullet { width: 10px; height: 10px; background: rgba(255,255,255,0.3); opacity: 1; }
    .swiper-pagination-bullet-active { background: #10b981; width: 24px; border-radius: 5px; }
    .swiper-slide-active .slide-content { transform: translateY(0); opacity: 1; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mountainSwiper = new Swiper('.mountainHeroSwiper', {
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-next',
                prevEl: '.swiper-prev',
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            }
        });

        // Animate slide content on slide change
        mountainSwiper.on('slideChange', function () {
            const activeSlide = mountainSwiper.slides[mountainSwiper.activeIndex];
            const content = activeSlide.querySelector('.slide-content');
            if (content) {
                content.style.transform = 'translateY(10px)';
                content.style.opacity = '0';
                setTimeout(() => {
                    content.style.transform = 'translateY(0)';
                    content.style.opacity = '1';
                }, 100);
            }
        });

        // Initial animation for first slide
        const firstSlide = mountainSwiper.slides[mountainSwiper.activeIndex];
        const firstContent = firstSlide.querySelector('.slide-content');
        if (firstContent) {
            setTimeout(() => {
                firstContent.style.transform = 'translateY(0)';
                firstContent.style.opacity = '1';
            }, 500);
        }
    });
</script>
@endif
@endsection
