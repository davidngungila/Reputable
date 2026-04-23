@extends('layouts.public')

@section('content')
<!-- Enhanced Hero Section -->
<section class="relative h-screen overflow-hidden" x-data="heroSlider">
    <!-- Interactive Background -->
    <div class="absolute inset-0 z-0">
        <div class="swiper heroSwiper h-full w-full">
            <div class="swiper-wrapper">
                <!-- Slide 1: Serengeti -->
                <div class="swiper-slide relative">
                    <img src="{{ asset('images/01.jpg') }}" alt="Serengeti" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/40 to-transparent"></div>
                </div>
                <!-- Slide 2: Kilimanjaro -->
                <div class="swiper-slide relative">
                    <img src="{{ asset('images/03.jpg') }}" alt="Kilimanjaro" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/40 to-transparent"></div>
                </div>
                <!-- Slide 3: Ngorongoro -->
                <div class="swiper-slide relative">
                    <img src="{{ asset('images/05.jpg') }}" alt="Ngorongoro" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/40 to-transparent"></div>
                </div>
                <!-- Slide 4: Zanzibar -->
                <div class="swiper-slide relative">
                    <img src="{{ asset('images/07.jpg') }}" alt="Zanzibar" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/40 to-transparent"></div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Floating Elements -->
    <div class="absolute top-20 left-10 z-10 hidden lg:block">
        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/20 animate-float">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-[#E67A2E] rounded-full flex items-center justify-center">
                    <i class="ph-bold ph-map-pin text-white text-xl"></i>
                </div>
                <div class="text-white">
                    <p class="text-sm font-semibold">Current Location</p>
                    <p class="text-xs opacity-80">Arusha, Tanzania</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="absolute top-40 right-10 z-10 hidden lg:block">
        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/20 animate-float-delay">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-emerald-500 rounded-full flex items-center justify-center">
                    <i class="ph-bold ph-users text-white text-xl"></i>
                </div>
                <div class="text-white">
                    <p class="text-sm font-semibold">24/7 Support</p>
                    <p class="text-xs opacity-80">Expert Guides Available</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="relative z-10 h-full flex items-center">
        <div class="max-w-7xl mx-auto px-6 w-full pt-20">
            <div class="max-w-3xl">
                <!-- Animated Badge -->
                <div class="inline-block mb-6">
                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-[#1F5A3A]/20 text-[#E67A2E] rounded-full text-xs font-bold tracking-widest uppercase border border-[#1F5A3A]/30 backdrop-blur-sm">
                        <span class="w-2 h-2 bg-[#E67A2E] rounded-full animate-pulse"></span>
                        Experience Excellence Since 2025
                    </span>
                </div>
                
                <!-- Dynamic Title -->
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-serif text-white mb-8 leading-[1.1]">
                    <span x-text="currentSlide === 0 ? 'Unveil the magic of' : currentSlide === 1 ? 'Conquer the' : currentSlide === 2 ? 'Visit the' : 'Discover'"></span>
                    <span class="text-[#E67A2E] block" x-text="currentSlide === 0 ? 'Wild Africa' : currentSlide === 1 ? 'Roof of Africa' : currentSlide === 2 ? 'Garden of Eden' : 'Paradise Islands'"></span>
                </h1>
                
                <!-- Dynamic Description -->
                <p class="text-xl text-slate-200 mb-12 leading-relaxed" x-text="currentSlide === 0 ? 'Embark on a journey of a lifetime with Tanzania\\'s most trusted tour operator. Authentic, professional, and unforgettable adventures await.' : currentSlide === 1 ? 'Experience breathtaking views from Africa\\'s highest peak with our expert mountain guides and comprehensive support.' : currentSlide === 2 ? 'Explore the world\\'s largest unbroken caldera, home to the highest density of big game in Africa.' : 'Relax on pristine beaches and explore the rich cultural heritage of Tanzania\\'s spice islands.'"></p>
                
                <!-- Interactive CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-center gap-4 mb-8">
                    <a href="/tours" class="group w-full sm:w-auto px-10 py-4 bg-[#1F5A3A] text-white font-bold rounded-full hover:bg-[#2E7A5A] shadow-xl shadow-[#1F5A3A]/30 transition-all transform hover:scale-105 flex items-center justify-center gap-2">
                        <i class="ph-bold ph-compass text-xl"></i>
                        Explore Our Packages
                        <i class="ph-bold ph-arrow-right text-xl group-hover:translate-x-1 transition-transform"></i>
                    </a>
                    <button @click="showVideoModal = true" class="group w-full sm:w-auto px-10 py-4 bg-white/10 text-white font-bold rounded-full border border-white/20 hover:bg-white/20 transition-all backdrop-blur-md flex items-center justify-center gap-2">
                        <i class="ph-fill ph-play-circle text-2xl group-hover:scale-110 transition-transform"></i>
                        Watch Our Story
                    </button>
                </div>
                
                <!-- Quick Stats -->
                <div class="grid grid-cols-3 gap-6 max-w-lg">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-white">1K+</div>
                        <div class="text-xs text-slate-300">Happy Clients</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-white">150+</div>
                        <div class="text-xs text-slate-300">Expert Guides</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-white">99%</div>
                        <div class="text-xs text-slate-300">Success Rate</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Enhanced Navigation -->
    <div class="absolute bottom-10 right-10 z-20 flex gap-4">
        <button class="swiper-prev w-14 h-14 rounded-full border border-white/20 bg-white/10 text-white flex items-center justify-center hover:bg-[#1F5A3A] hover:border-[#1F5A3A] transition-all backdrop-blur-md group">
            <i class="ph ph-caret-left text-2xl group-hover:-translate-x-1 transition-transform"></i>
        </button>
        <button class="swiper-next w-14 h-14 rounded-full border border-white/20 bg-white/10 text-white flex items-center justify-center hover:bg-[#1F5A3A] hover:border-[#1F5A3A] transition-all backdrop-blur-md group">
            <i class="ph ph-caret-right text-2xl group-hover:translate-x-1 transition-transform"></i>
        </button>
    </div>
    
    <!-- Enhanced Pagination -->
    <div class="swiper-pagination !bottom-10 !left-6 !text-left !w-auto"></div>
    
    <!-- Video Modal -->
    <div x-show="showVideoModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80" @click.self="showVideoModal = false">
        <div class="bg-white rounded-2xl p-8 max-w-4xl w-full mx-4" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="scale-95 opacity-0" x-transition:enter-end="scale-100 opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="scale-100 opacity-100" x-transition:leave-end="scale-95 opacity-0">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-900">Discover Tanzania with Reputable Tours</h3>
                <button @click="showVideoModal = false" class="text-gray-500 hover:text-gray-700">
                    <i class="ph-bold ph-x text-2xl"></i>
                </button>
            </div>
            <div class="aspect-video bg-gray-200 rounded-lg flex items-center justify-center">
                <div class="text-center">
                    <i class="ph-bold ph-play-circle text-6xl text-gray-400 mb-4"></i>
                    <p class="text-gray-600">Video content coming soon</p>
                    <p class="text-sm text-gray-500 mt-2">Experience the beauty of Tanzania</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Enhanced Styles and Scripts -->
<style>
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
    
    @keyframes float-delay {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-15px); }
    }
    
    .animate-float {
        animation: float 6s ease-in-out infinite;
    }
    
    .animate-float-delay {
        animation: float-delay 8s ease-in-out infinite;
    }
    
    .swiper-pagination-bullet { 
        width: 12px; 
        height: 12px; 
        background: rgba(255,255,255,0.3); 
        opacity: 1; 
    }
    
    .swiper-pagination-bullet-active { 
        background: #10b981; 
        width: 30px; 
        border-radius: 6px; 
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Swiper
        const swiper = new Swiper('.heroSwiper', {
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
        
        // Initialize Alpine.js data
        document.addEventListener('alpine:init', () => {
            Alpine.data('heroSlider', () => ({
                currentSlide: 0,
                showVideoModal: false,
                init() {
                    // Update current slide on slide change
                    swiper.on('slideChange', () => {
                        this.currentSlide = swiper.activeIndex;
                    });
                }
            }));
        });
    });
</script>

<!-- Featured Destinations Showcase -->
<section class="py-20 bg-gradient-to-br from-slate-50 to-emerald-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-emerald-100 text-emerald-700 rounded-full text-xs font-bold tracking-widest uppercase mb-4">PREMIUM DESTINATIONS</span>
            <h2 class="text-4xl md:text-5xl font-serif text-slate-900 font-bold mb-6">Discover Tanzania's Treasures</h2>
            <p class="text-slate-600 max-w-2xl mx-auto text-lg">From the Serengeti plains to Kilimanjaro's peak, experience the diversity of Africa's most spectacular landscapes</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Serengeti -->
            <div class="group cursor-pointer" x-data="{ hovered: false }" @mouseenter="hovered = true" @mouseleave="hovered = false">
                <div class="relative h-80 rounded-2xl overflow-hidden mb-6">
                    <img src="{{ asset('images/01.jpg') }}" alt="Serengeti" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                    <div class="absolute top-4 left-4">
                        <span class="bg-emerald-600 text-white px-3 py-1 rounded-full text-xs font-bold">UNESCO Site</span>
                    </div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <h3 class="text-white text-2xl font-bold mb-2">Serengeti</h3>
                        <div class="flex items-center gap-4 text-white/80 text-sm">
                            <span><i class="ph-bold ph-map-pin mr-1"></i>2.8M hectares</span>
                            <span><i class="ph-bold ph-users mr-1"></i>Year-round</span>
                        </div>
                    </div>
                </div>
                <div class="space-y-3">
                    <p class="text-slate-600 text-sm">Home to the Great Migration and Africa's Big Five. Experience endless plains teeming with wildlife.</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-1 text-yellow-400">
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                        </div>
                        <a href="{{ route('regions.serengeti') }}" class="text-emerald-600 font-bold text-sm hover:text-emerald-700 transition-colors">Explore →</a>
                    </div>
                </div>
            </div>
            
            <!-- Kilimanjaro -->
            <div class="group cursor-pointer" x-data="{ hovered: false }" @mouseenter="hovered = true" @mouseleave="hovered = false">
                <div class="relative h-80 rounded-2xl overflow-hidden mb-6">
                    <img src="{{ asset('images/03.jpg') }}" alt="Kilimanjaro" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                    <div class="absolute top-4 left-4">
                        <span class="bg-orange-600 text-white px-3 py-1 rounded-full text-xs font-bold">5,895m</span>
                    </div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <h3 class="text-white text-2xl font-bold mb-2">Mount Kilimanjaro</h3>
                        <div class="flex items-center gap-4 text-white/80 text-sm">
                            <span><i class="ph-bold ph-mountains mr-1"></i>7 routes</span>
                            <span><i class="ph-bold ph-trophy mr-1"></i>98% success</span>
                        </div>
                    </div>
                </div>
                <div class="space-y-3">
                    <p class="text-slate-600 text-sm">Africa's highest peak. Choose from 7 different routes with expert guides and comprehensive support.</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-1 text-yellow-400">
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                        </div>
                        <a href="{{ route('kilimanjaro') }}" class="text-emerald-600 font-bold text-sm hover:text-emerald-700 transition-colors">Explore →</a>
                    </div>
                </div>
            </div>
            
            <!-- Ngorongoro -->
            <div class="group cursor-pointer" x-data="{ hovered: false }" @mouseenter="hovered = true" @mouseleave="hovered = false">
                <div class="relative h-80 rounded-2xl overflow-hidden mb-6">
                    <img src="{{ asset('images/05.jpg') }}" alt="Ngorongoro" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                    <div class="absolute top-4 left-4">
                        <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-bold">2.5M years</span>
                    </div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <h3 class="text-white text-2xl font-bold mb-2">Ngorongoro Crater</h3>
                        <div class="flex items-center gap-4 text-white/80 text-sm">
                            <span><i class="ph-bold ph-volcano mr-1"></i>Caldera</span>
                            <span><i class="ph-bold ph-binoculars mr-1"></i>Big Five</span>
                        </div>
                    </div>
                </div>
                <div class="space-y-3">
                    <p class="text-slate-600 text-sm">World's largest unbroken caldera with highest density of big game. A natural wonder formed by volcanic collapse.</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-1 text-yellow-400">
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                        </div>
                        <a href="{{ route('regions.ngorongoro') }}" class="text-emerald-600 font-bold text-sm hover:text-emerald-700 transition-colors">Explore →</a>
                    </div>
                </div>
            </div>
            
            <!-- Zanzibar -->
            <div class="group cursor-pointer" x-data="{ hovered: false }" @mouseenter="hovered = true" @mouseleave="hovered = false">
                <div class="relative h-80 rounded-2xl overflow-hidden mb-6">
                    <img src="{{ asset('images/07.jpg') }}" alt="Zanzibar" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                    <div class="absolute top-4 left-4">
                        <span class="bg-purple-600 text-white px-3 py-1 rounded-full text-xs font-bold">Spice Islands</span>
                    </div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <h3 class="text-white text-2xl font-bold mb-2">Zanzibar</h3>
                        <div class="flex items-center gap-4 text-white/80 text-sm">
                            <span><i class="ph-bold ph-umbrella mr-1"></i>25 beaches</span>
                            <span><i class="ph-bold ph-sunset mr-1"></i>Stone Town</span>
                        </div>
                    </div>
                </div>
                <div class="space-y-3">
                    <p class="text-slate-600 text-sm">Tanzania's semi-autonomous archipelago. Pristine beaches, historic Stone Town, and spice plantations await.</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-1 text-yellow-400">
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                        </div>
                        <a href="{{ route('regions.zanzibar') }}" class="text-emerald-600 font-bold text-sm hover:text-emerald-700 transition-colors">Explore →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Interactive Tanzania Map Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-slate-100 text-slate-700 rounded-full text-xs font-bold tracking-widest uppercase mb-4">INTERACTIVE MAP</span>
            <h2 class="text-4xl md:text-5xl font-serif text-slate-900 font-bold mb-6">Explore Tanzania's Regions</h2>
            <p class="text-slate-600 max-w-2xl mx-auto text-lg">Click on any region to discover its unique attractions and start planning your adventure</p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Interactive Map -->
            <div class="relative" x-data="{ selectedRegion: null, hoveredRegion: null }">
                <div class="bg-gradient-to-br from-emerald-50 to-blue-50 rounded-3xl p-8 border border-emerald-100">
                    <div class="relative h-96 bg-white rounded-2xl shadow-inner overflow-hidden">
                        <!-- Tanzania Map Placeholder -->
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center">
                                <i class="ph-bold ph-map-trifold text-6xl text-emerald-600 mb-4"></i>
                                <p class="text-slate-600 font-semibold">Interactive Tanzania Map</p>
                                <p class="text-sm text-slate-500 mt-2">Click on regions below to explore</p>
                            </div>
                        </div>
                        
                        <!-- Region Markers -->
                        <div class="absolute top-1/4 left-1/3 cursor-pointer group" @mouseenter="hoveredRegion = 'serengeti'" @mouseleave="hoveredRegion = null" @click="selectedRegion = 'serengeti'">
                            <div class="relative">
                                <div class="w-4 h-4 bg-emerald-600 rounded-full group-hover:scale-150 transition-transform"></div>
                                <div x-show="hoveredRegion === 'serengeti'" class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 bg-slate-900 text-white px-3 py-2 rounded-lg text-xs whitespace-nowrap">
                                    Serengeti National Park
                                </div>
                            </div>
                        </div>
                        
                        <div class="absolute top-1/3 right-1/4 cursor-pointer group" @mouseenter="hoveredRegion = 'kilimanjaro'" @mouseleave="hoveredRegion = null" @click="selectedRegion = 'kilimanjaro'">
                            <div class="relative">
                                <div class="w-4 h-4 bg-orange-600 rounded-full group-hover:scale-150 transition-transform"></div>
                                <div x-show="hoveredRegion === 'kilimanjaro'" class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 bg-slate-900 text-white px-3 py-2 rounded-lg text-xs whitespace-nowrap">
                                    Mount Kilimanjaro
                                </div>
                            </div>
                        </div>
                        
                        <div class="absolute bottom-1/3 left-1/2 cursor-pointer group" @mouseenter="hoveredRegion = 'ngorongoro'" @mouseleave="hoveredRegion = null" @click="selectedRegion = 'ngorongoro'">
                            <div class="relative">
                                <div class="w-4 h-4 bg-blue-600 rounded-full group-hover:scale-150 transition-transform"></div>
                                <div x-show="hoveredRegion === 'ngorongoro'" class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 bg-slate-900 text-white px-3 py-2 rounded-lg text-xs whitespace-nowrap">
                                    Ngorongoro Crater
                                </div>
                            </div>
                        </div>
                        
                        <div class="absolute bottom-1/4 right-1/3 cursor-pointer group" @mouseenter="hoveredRegion = 'zanzibar'" @mouseleave="hoveredRegion = null" @click="selectedRegion = 'zanzibar'">
                            <div class="relative">
                                <div class="w-4 h-4 bg-purple-600 rounded-full group-hover:scale-150 transition-transform"></div>
                                <div x-show="hoveredRegion === 'zanzibar'" class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 bg-slate-900 text-white px-3 py-2 rounded-lg text-xs whitespace-nowrap">
                                    Zanzibar Islands
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Region Information Panel -->
            <div class="space-y-6">
                <div x-show="!selectedRegion" class="bg-slate-50 rounded-2xl p-8 text-center">
                    <i class="ph-bold ph-hand-pointing text-4xl text-slate-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Select a Region</h3>
                    <p class="text-slate-600">Click on any region marker to explore detailed information and available tours</p>
                </div>
                
                <!-- Serengeti Info -->
                <div x-show="selectedRegion === 'serengeti'" class="bg-emerald-50 rounded-2xl p-8 border border-emerald-200">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-emerald-600 rounded-full flex items-center justify-center">
                            <i class="ph-bold ph-compass text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-900">Serengeti National Park</h3>
                            <p class="text-emerald-600 font-semibold">UNESCO World Heritage Site</p>
                        </div>
                    </div>
                    <p class="text-slate-600 mb-6">Home to the Great Migration and Africa's Big Five. Experience endless plains teeming with wildlife throughout the year.</p>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-white rounded-lg p-3 text-center">
                            <div class="text-2xl font-bold text-emerald-600">2.8M</div>
                            <div class="text-xs text-slate-600">Hectares</div>
                        </div>
                        <div class="bg-white rounded-lg p-3 text-center">
                            <div class="text-2xl font-bold text-emerald-600">500+</div>
                            <div class="text-xs text-slate-600">Bird Species</div>
                        </div>
                    </div>
                    <a href="{{ route('regions.serengeti') }}" class="w-full bg-emerald-600 text-white font-bold py-3 rounded-lg hover:bg-emerald-700 transition-colors text-center">Explore Serengeti Tours</a>
                </div>
                
                <!-- Kilimanjaro Info -->
                <div x-show="selectedRegion === 'kilimanjaro'" class="bg-orange-50 rounded-2xl p-8 border border-orange-200">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-orange-600 rounded-full flex items-center justify-center">
                            <i class="ph-bold ph-mountains text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-900">Mount Kilimanjaro</h3>
                            <p class="text-orange-600 font-semibold">Africa's Highest Peak</p>
                        </div>
                    </div>
                    <p class="text-slate-600 mb-6">Africa's highest peak at 5,895m. Choose from 7 different routes with expert guides and comprehensive support.</p>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-white rounded-lg p-3 text-center">
                            <div class="text-2xl font-bold text-orange-600">5,895m</div>
                            <div class="text-xs text-slate-600">Summit Height</div>
                        </div>
                        <div class="bg-white rounded-lg p-3 text-center">
                            <div class="text-2xl font-bold text-orange-600">98%</div>
                            <div class="text-xs text-slate-600">Success Rate</div>
                        </div>
                    </div>
                    <a href="{{ route('kilimanjaro') }}" class="w-full bg-orange-600 text-white font-bold py-3 rounded-lg hover:bg-orange-700 transition-colors text-center">View Kilimanjaro Routes</a>
                </div>
                
                <!-- Ngorongoro Info -->
                <div x-show="selectedRegion === 'ngorongoro'" class="bg-blue-50 rounded-2xl p-8 border border-blue-200">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center">
                            <i class="ph-bold ph-volcano text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-900">Ngorongoro Crater</h3>
                            <p class="text-blue-600 font-semibold">Natural Wonder</p>
                        </div>
                    </div>
                    <p class="text-slate-600 mb-6">World's largest unbroken caldera with highest density of big game. A natural wonder formed by volcanic collapse.</p>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-white rounded-lg p-3 text-center">
                            <div class="text-2xl font-bold text-blue-600">2.5M</div>
                            <div class="text-xs text-slate-600">Years Old</div>
                        </div>
                        <div class="bg-white rounded-lg p-3 text-center">
                            <div class="text-2xl font-bold text-blue-600">25,000</div>
                            <div class="text-xs text-slate-600">Large Animals</div>
                        </div>
                    </div>
                    <a href="{{ route('regions.ngorongoro') }}" class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 transition-colors text-center">Discover Ngorongoro</a>
                </div>
                
                <!-- Zanzibar Info -->
                <div x-show="selectedRegion === 'zanzibar'" class="bg-purple-50 rounded-2xl p-8 border border-purple-200">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center">
                            <i class="ph-bold ph-umbrella text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-900">Zanzibar Islands</h3>
                            <p class="text-purple-600 font-semibold">Spice Islands</p>
                        </div>
                    </div>
                    <p class="text-slate-600 mb-6">Tanzania's semi-autonomous archipelago. Pristine beaches, historic Stone Town, and spice plantations await.</p>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-white rounded-lg p-3 text-center">
                            <div class="text-2xl font-bold text-purple-600">25</div>
                            <div class="text-xs text-slate-600">Beaches</div>
                        </div>
                        <div class="bg-white rounded-lg p-3 text-center">
                            <div class="text-2xl font-bold text-purple-600">50+</div>
                            <div class="text-xs text-slate-600">Spice Varieties</div>
                        </div>
                    </div>
                    <a href="{{ route('regions.zanzibar') }}" class="w-full bg-purple-600 text-white font-bold py-3 rounded-lg hover:bg-purple-700 transition-colors text-center">Explore Zanzibar</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Enhanced Stats Bar -->
<section class="relative z-20 -mt-10 max-w-5xl mx-auto px-6">
    <div class="grid grid-cols-2 md:grid-cols-4 bg-white rounded-2xl shadow-2xl p-8 border border-slate-100 divide-x divide-slate-100">
        <div class="text-center px-4">
            <h3 class="text-4xl font-bold text-slate-900">2025</h3>
            <p class="text-sm text-slate-500 mt-2">Founded Year</p>
        </div>
        <div class="text-center px-4">
            <h3 class="text-4xl font-bold text-slate-900">1k+</h3>
            <p class="text-sm text-slate-500 mt-2">Tours Completed</p>
        </div>
        <div class="text-center px-4">
            <h3 class="text-4xl font-bold text-slate-900">150+</h3>
            <p class="text-sm text-slate-500 mt-2">Expert Guides</p>
        </div>
        <div class="text-center px-4">
            <h3 class="text-4xl font-bold text-slate-900">99%</h3>
            <p class="text-sm text-slate-500 mt-2">Happy Clients</p>
        </div>
    </div>
</section>

<!-- Featured Tours -->
<section class="py-32 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row items-end justify-between mb-16 gap-6">
            <div class="max-w-2xl">
                <h2 class="text-4xl font-serif text-slate-900 mb-6 font-bold">Most Popular Safari Packages</h2>
                <p class="text-slate-500">Carefully curated adventures that capture the very essence of the African wild. Choose your path and let us handle the rest.</p>
            </div>
            <a href="/tours" class="text-[#E67A2E] font-bold flex items-center gap-2 hover:gap-3 transition-all">
                View All Tours <i class="ph ph-arrow-right"></i>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($featuredTours ?? [] as $tour)
            <!-- Tour Card -->
            <div class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-100">
                <div class="relative h-72 overflow-hidden">
                    @php $images = $tour->images ?? []; @endphp
                    <img src="{{ $images[0] ?? 'https://images.unsplash.com/photo-1547471080-7cc2caa01a7e' }}?auto=format&fit=crop&w=800&q=80" alt="{{ $tour->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-4 py-2 rounded-full text-xs font-bold text-slate-900 shadow-sm uppercase tracking-wider">
                        {{ $tour->duration_days }} Days
                    </div>
                </div>
                <div class="p-8">
                    <div class="flex items-center gap-2 text-[#E67A2E] text-sm font-bold mb-4">
                        <i class="ph-fill ph-star"></i>
                        <span class="text-[#E67A2E]">5.0</span>
                        <span class="text-slate-400 font-medium">(Verified)</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4 group-hover:text-[#E67A2E] transition-colors line-clamp-1">{{ $tour->name }}</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-2">{{ $tour->description }}</p>
                    <div class="pt-6 border-t border-slate-100 flex items-center justify-between">
                        <div>
                            <span class="text-[#E67A2E] text-xs font-medium uppercase block">Starting from</span>
                            <span class="text-2xl font-bold text-slate-900 leading-none">${{ number_format($tour->base_price) }}</span>
                        </div>
                        <a href="{{ route('tours.show', $tour->id) }}" class="p-4 bg-slate-900 text-white rounded-2xl hover:bg-[#E67A2E] transition-colors">
                            <i class="ph ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 py-12 text-center text-slate-400 italic">
                Our featured expeditions are being updated. Check back soon!
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Newsletter Signup Section -->
<section class="py-20 bg-gradient-to-br from-emerald-600 to-slate-900">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-white/20 text-white rounded-full text-xs font-bold tracking-widest uppercase mb-4 backdrop-blur-sm">STAY CONNECTED</span>
            <h2 class="text-4xl md:text-5xl font-serif text-white font-bold mb-6">Get Exclusive Safari Deals</h2>
            <p class="text-emerald-100 max-w-2xl mx-auto text-lg">Join our community and receive insider tips, special offers, and Tanzania travel inspiration directly to your inbox</p>
        </div>
        
        <div class="max-w-2xl mx-auto">
            <form class="bg-white/10 backdrop-blur-md rounded-2xl p-8 border border-white/20" x-data="{ email: '', subscribed: false }">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <input 
                        type="email" 
                        x-model="email"
                        placeholder="Enter your email address" 
                        class="md:col-span-2 px-6 py-4 bg-white/90 text-slate-900 rounded-lg placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-emerald-400 transition-all"
                        required
                    >
                    <button 
                        type="submit" 
                        @click.prevent="subscribed = true; email = ''"
                        class="px-8 py-4 bg-emerald-500 text-white font-bold rounded-lg hover:bg-emerald-400 transition-colors transform hover:scale-105"
                    >
                        Subscribe Now
                    </button>
                </div>
                
                <div x-show="!subscribed" class="flex items-center justify-center gap-6 text-white/80 text-sm">
                    <div class="flex items-center gap-2">
                        <i class="ph-bold ph-check-circle text-emerald-400"></i>
                        <span>No spam, ever</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="ph-bold ph-gift text-emerald-400"></i>
                        <span>Exclusive deals</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="ph-bold ph-bell text-emerald-400"></i>
                        <span>Travel tips</span>
                    </div>
                </div>
                
                <div x-show="subscribed" x-transition class="bg-emerald-500/20 border border-emerald-400 rounded-lg p-4 text-center">
                    <div class="flex items-center justify-center gap-2 text-emerald-100 mb-2">
                        <i class="ph-bold ph-check-circle text-xl"></i>
                        <span class="font-semibold">Successfully Subscribed!</span>
                    </div>
                    <p class="text-emerald-100 text-sm">Welcome to our community! Check your email for a welcome message.</p>
                </div>
            </form>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-16">
            <div class="text-center">
                <div class="text-3xl font-bold text-white mb-2">15K+</div>
                <div class="text-emerald-100 text-sm">Happy Subscribers</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-white mb-2">50+</div>
                <div class="text-emerald-100 text-sm">Exclusive Deals Monthly</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-white mb-2">98%</div>
                <div class="text-emerald-100 text-sm">Open Rate</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-white mb-2">4.9★</div>
                <div class="text-emerald-100 text-sm">Content Rating</div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-32 relative overflow-hidden bg-slate-900">
    <div class="absolute top-0 right-0 w-1/2 h-full hidden lg:block">
        <img src="https://images.unsplash.com/photo-1493612276216-ee3925520721?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Safari Experience" class="w-full h-full object-cover opacity-40">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/40 to-transparent"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="max-w-xl">
            <h2 class="text-4xl font-serif text-white mb-12 font-bold">Why choose Reputable Tours?</h2>
            
            <div class="space-y-12">
                <div class="flex gap-6">
                    <div class="w-16 h-16 rounded-2xl bg-[#1F5A3A]/20 text-[#E67A2E] flex-shrink-0 flex items-center justify-center text-3xl">
                        <i class="ph-bold ph-sketch-logo"></i>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-white mb-4">Tailored Experience</h4>
                        <p class="text-slate-400 leading-relaxed">No two journeys are the same. We customize every detail to match your rhythm and expectations.</p>
                    </div>
                </div>
                
                <div class="flex gap-6">
                    <div class="w-16 h-16 rounded-2xl bg-[#1F5A3A]/20 text-[#E67A2E] flex-shrink-0 flex items-center justify-center text-3xl">
                        <i class="ph-bold ph-shield-check"></i>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-white mb-4">Safety First</h4>
                        <p class="text-slate-400 leading-relaxed">Our vehicles are impeccably maintained and our guides are trained in wilderness first aid and safety protocols.</p>
                    </div>
                </div>
                
                <div class="flex gap-6">
                    <div class="w-16 h-16 rounded-2xl bg-[#1F5A3A]/20 text-[#E67A2E] flex-shrink-0 flex items-center justify-center text-3xl">
                        <i class="ph-bold ph-leaf"></i>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-white mb-4">Sustainable Tourism</h4>
                        <p class="text-slate-400 leading-relaxed">We support local communities and practice eco-friendly operations to preserve the wild for generations.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-24 bg-[#1F5A3A]">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-4xl md:text-5xl font-serif text-white mb-8 font-bold">Ready for the Adventure of a Lifetime?</h2>
        <p class="text-[#E67A2E]/100 text-xl max-w-2xl mx-auto mb-12">Contact our safari experts today and start planning your bespoke African experience.</p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
            <a href="/tours" class="px-12 py-5 bg-white text-[#E67A2E] font-bold rounded-full shadow-2xl hover:scale-105 transition-all">
                Book My Safari
            </a>
            <a href="https://wa.me/255683163219" class="flex items-center gap-3 text-white font-bold hover:scale-105 transition-all text-xl">
                <i class="ph-bold ph-whatsapp-logo text-3xl"></i> Chat on WhatsApp
            </a>
        </div>
    </div>
</section>
<!-- Testimonials -->
<section class="py-32 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-20">
            <span class="text-[#E67A2E] font-black text-xs uppercase tracking-[0.4em] mb-4 inline-block">Worldwide Recognition</span>
            <h2 class="text-4xl md:text-5xl font-serif text-slate-900 font-bold mb-6">Trusted by Adventurers</h2>
            <div class="flex items-center justify-center gap-10 opacity-60 grayscale hover:grayscale-0 transition-all duration-700">
                <img src="https://static.tacdn.com/img2/brand_refresh_2025/logos/wordmark.svg" alt="TripAdvisor" class="h-8">
                <img src="https://www.bluecorona.com/wp-content/uploads/2015/05/26-googleplusreviews.jpg" alt="Google Reviews" class="h-10 rounded-lg">
            </div>
        </div>

        <div class="swiper reviewsSwiper pb-16">
            <div class="swiper-wrapper">
                <!-- Review 1 -->
                <div class="swiper-slide">
                    <div class="bg-slate-50 rounded-[2.5rem] p-10 border border-slate-100 flex flex-col h-full">
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex gap-1 text-yellow-400">
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                            </div>
                            <img src="https://www.bluecorona.com/wp-content/uploads/2015/05/26-googleplusreviews.jpg" alt="Google Reviews" class="h-8 rounded-lg">
                        </div>
                        <p class="text-slate-600 text-lg leading-relaxed mb-10 italic">"Reputable Tours provided an exceptional 8-day Serengeti safari. Our guide was incredibly knowledgeable about wildlife. Every camp was perfectly chosen. 5 stars!"</p>
                        <div class="mt-auto flex items-center gap-4">
                            <div class="w-14 h-14 rounded-2xl bg-slate-200 overflow-hidden">
                                <img src="https://i.pravatar.cc/150?u=sarah" alt="Sarah Jenkins" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Sarah Jenkins</h4>
                                <p class="text-sm text-slate-500">United Kingdom</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="swiper-slide">
                    <div class="bg-slate-50 rounded-[2.5rem] p-10 border border-slate-100 flex flex-col h-full">
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex gap-1 text-emerald-500">
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                            </div>
                            <img src="https://static.tacdn.com/img2/brand_refresh_2025/logos/wordmark.svg" alt="TripAdvisor" class="h-6">
                        </div>
                        <p class="text-slate-600 text-lg leading-relaxed mb-10 italic">"The Kilimanjaro trek via Lemosho was challenging but perfectly organized by Reputable Tours. The equipment was top-notch and food on the mountain was surprisingly great!"</p>
                        <div class="mt-auto flex items-center gap-4">
                            <div class="w-14 h-14 rounded-2xl bg-slate-200 overflow-hidden">
                                <img src="https://i.pravatar.cc/150?u=marco" alt="Marco Rossi" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Marco Rossi</h4>
                                <p class="text-sm text-slate-500">Italy</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review 3 -->
                <div class="swiper-slide">
                    <div class="bg-slate-50 rounded-[2.5rem] p-10 border border-slate-100 flex flex-col h-full">
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex gap-1 text-yellow-400">
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                            </div>
                            <img src="https://www.bluecorona.com/wp-content/uploads/2015/05/26-googleplusreviews.jpg" alt="Google Reviews" class="h-8">
                        </div>
                        <p class="text-slate-600 text-lg leading-relaxed mb-10 italic">"Amazing cultural experience with Hadzabe tribe. It felt authentic and respectful. Reputable Tours really understands how to provide ethical tourism in Tanzania."</p>
                        <div class="mt-auto flex items-center gap-4">
                            <div class="w-14 h-14 rounded-2xl bg-slate-200 overflow-hidden">
                                <img src="https://i.pravatar.cc/150?u=elena" alt="Elena Petrova" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Elena Petrova</h4>
                                <p class="text-sm text-slate-500">Germany</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review 4 -->
                <div class="swiper-slide">
                    <div class="bg-slate-50 rounded-[2.5rem] p-10 border border-slate-100 flex flex-col h-full">
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex gap-1 text-emerald-500">
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                            </div>
                            <img src="https://static.tacdn.com/img2/brand_refresh_2025/logos/wordmark.svg" alt="TripAdvisor" class="h-6">
                        </div>
                        <p class="text-slate-600 text-lg leading-relaxed mb-10 italic">"The best safari operator in Tanzania. Their attention to detail and safety standards are unmatched. From pickup to drop-off, everything was professional."</p>
                        <div class="mt-auto flex items-center gap-4">
                            <div class="w-14 h-14 rounded-2xl bg-slate-200 overflow-hidden">
                                <img src="https://i.pravatar.cc/150?u=david" alt="David Thompson" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">David Thompson</h4>
                                <p class="text-sm text-slate-500">USA</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination-reviews !bottom-0"></div>
        </div>
    </div>
</section>

<style>
    .swiper-pagination-reviews .swiper-pagination-bullet { width: 10px; height: 10px; background: #e2e8f0; opacity: 1; margin: 0 6px !important; }
    .swiper-pagination-reviews .swiper-pagination-bullet-active { background: #10b981; width: 24px; border-radius: 5px; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const reviewsSwiper = new Swiper('.reviewsSwiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination-reviews',
                clickable: true,
            },
            breakpoints: {
                640: { slidesPerView: 1 },
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            }
        });
    });
</script>

@endsection
