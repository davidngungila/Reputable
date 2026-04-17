@extends('layouts.public')

@section('content')
<!-- Destinations Hero Section -->
<section class="relative h-[70vh] overflow-hidden" x-data="{ currentSlide: 0, slides: [
        { image: 'images/02.jpg', title: 'Serengeti Plains', subtitle: 'Home to the Great Migration' },
        { image: 'images/01.jpg', title: 'Mount Kilimanjaro', subtitle: 'Roof of Africa' },
        { image: 'images/03.jpg', title: 'Zanzibar Beaches', subtitle: 'Paradise Islands' }
    ] }">
    <div class="absolute inset-0">
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="currentSlide === index" 
                 x-transition:enter="transition ease-out duration-1000"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-1000"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="absolute inset-0">
                <img :src="asset(slide.image)" :alt="slide.title" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-slate-900/80 via-slate-900/40 to-transparent"></div>
            </div>
        </template>
    </div>
    
    <!-- Slide Indicators -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex gap-2 z-20">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="currentSlide = index" 
                    :class="currentSlide === index ? 'bg-white w-8' : 'bg-white/50 w-2'"
                    class="h-2 rounded-full transition-all duration-300"></button>
        </template>
    </div>
    
    <!-- Auto-play Controls -->
    <button @click="currentSlide = (currentSlide + 1) % slides.length" 
            class="absolute right-8 top-1/2 transform -translate-y-1/2 bg-white/20 backdrop-blur-md text-white p-3 rounded-full hover:bg-white/30 transition-all z-20">
        <i class="ph-bold ph-arrow-right text-xl"></i>
    </button>
    <button @click="currentSlide = (currentSlide - 1 + slides.length) % slides.length" 
            class="absolute left-8 top-1/2 transform -translate-y-1/2 bg-white/20 backdrop-blur-md text-white p-3 rounded-full hover:bg-white/30 transition-all z-20">
        <i class="ph-bold ph-arrow-left text-xl"></i>
    </button>
    
    <div class="relative z-10 max-w-7xl mx-auto px-6 w-full h-full flex items-center">
        <div class="text-center text-white">
            <template x-for="(slide, index) in slides" :key="index">
                <div x-show="currentSlide === index" 
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0 transform translate-y-4"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-transition:leave="transition ease-in duration-300"
                     x-transition:leave-start="opacity-100 transform translate-y-0"
                     x-transition:leave-end="opacity-0 transform -translate-y-4"
                     class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center">
                        <h1 class="text-5xl md:text-7xl font-serif font-black mb-4">
                            Discover <span class="text-emerald-400 italic" x-text="slide.title"></span>
                        </h1>
                        <p class="text-xl md:text-2xl text-slate-200 mb-8 max-w-3xl mx-auto" x-text="slide.subtitle"></p>
                    </div>
                </div>
            </template>
            
            <div class="relative z-30 mt-auto">
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="#destinations-grid" class="inline-flex items-center gap-3 px-8 py-4 bg-[#1F5A3A] text-white font-bold rounded-full hover:bg-[#2E7A5A] shadow-xl shadow-[#1F5A3A]/30 transition-all transform hover:scale-105">
                        <i class="ph-bold ph-compass text-xl mr-2"></i>
                        Explore Destinations
                    </a>
                    <a href="/tours" class="inline-flex items-center gap-3 px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-slate-900 transition-all transform hover:scale-105">
                        <i class="ph-bold ph-map-trifold text-xl mr-2"></i>
                        View Tours
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Auto-play script -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('slides', {
                currentSlide: 0,
                slides: [
                    { image: '{{ asset("images/02.jpg") }}', title: 'Serengeti Plains', subtitle: 'Home to the Great Migration' },
                    { image: '{{ asset("images/01.jpg") }}', title: 'Mount Kilimanjaro', subtitle: 'Roof of Africa' },
                    { image: '{{ asset("images/03.jpg") }}', title: 'Zanzibar Beaches', subtitle: 'Paradise Islands' }
                ],
                init() {
                    setInterval(() => {
                        this.currentSlide = (this.currentSlide + 1) % this.slides.length;
                    }, 5000);
                }
            });
        });
    </script>
</section>

<!-- Destinations Grid -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-serif font-bold text-gray-800 mb-4">Popular Destinations</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Choose from our handpicked selection of Tanzania's most visited destinations</p>
        </div>
        
        <div id="destinations-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Serengeti -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden group cursor-pointer transition-all duration-300 hover:shadow-xl hover:scale-105">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('images/01.jpg') }}" alt="Serengeti" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    <div class="absolute top-4 left-4 right-4 flex justify-between">
                        <span class="bg-[#E67A2E] text-white text-xs px-3 py-1 rounded-full backdrop-blur-sm">Most Popular</span>
                        <div class="bg-white/90 backdrop-blur-md p-2 rounded-full">
                            <i class="ph-bold ph-heart text-emerald-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Serengeti National Park</h3>
                            <p class="text-sm text-gray-600">World Heritage Site</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4 text-sm leading-relaxed">Home to the Great Migration and Africa's Big Five. Witness millions of wildebeest crossing the plains.</p>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <i class="ph-bold ph-map-pin text-[#1F5A3A]"></i>
                                <span>2.8M hectares</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <i class="ph-bold ph-compass text-[#1F5A3A]"></i>
                                <span>North Tanzania</span>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <i class="ph-bold ph-calendar text-[#1F5A3A]"></i>
                                <span>Year-round</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <i class="ph-bold ph-star text-[#1F5A3A]"></i>
                                <span>5-star rated</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-600">
                            <span class="font-semibold text-[#1F5A3A]">Big Five:</span> Lion, Leopard, Elephant, Rhino, Buffalo
                        </div>
                        <a href="{{ route('regions.serengeti') }}" class="inline-flex items-center gap-2 bg-[#1F5A3A] text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-[#2E7A5A] transition-colors">
                            Explore <i class="ph ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Ngorongoro -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden group cursor-pointer transition-all duration-300 hover:shadow-xl hover:scale-105">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('images/05.jpg') }}" alt="Ngorongoro" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    <div class="absolute top-4 left-4 right-4 flex justify-between">
                        <span class="bg-[#1F5A3A] text-white text-xs px-3 py-1 rounded-full backdrop-blur-sm">UNESCO Site</span>
                        <div class="bg-white/90 backdrop-blur-md p-2 rounded-full">
                            <i class="ph-bold ph-heart text-emerald-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Ngorongoro Crater</h3>
                            <p class="text-sm text-gray-600">World Heritage Site</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4 text-sm leading-relaxed">The world's largest unbroken caldera and highest density of big game. A natural wonder formed by volcanic collapse.</p>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <i class="ph-bold ph-volcano text-[#1F5A3A]"></i>
                                <span>2.5M years old</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <i class="ph-bold ph-compass text-[#1F5A3A]"></i>
                                <span>North Tanzania</span>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <i class="ph-bold ph-binoculars text-[#1F5A3A]"></i>
                                <span>Big Five habitat</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <i class="ph-bold ph-tree text-[#1F5A3A]"></i>
                                <span>Ancient forest</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-600">
                            <span class="font-semibold text-[#1F5A3A]">Wildlife:</span> Rhino, Elephant, Buffalo, Leopard
                        </div>
                        <a href="{{ route('regions.ngorongoro') }}" class="inline-flex items-center gap-2 bg-[#1F5A3A] text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-[#2E7A5A] transition-colors">
                            Explore <i class="ph ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Kilimanjaro -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden group cursor-pointer transition-all duration-300 hover:shadow-xl hover:scale-105">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('images/03.jpg') }}" alt="Kilimanjaro" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800">Mount Kilimanjaro</h3>
                        <span class="bg-[#E67A2E] text-white text-xs px-3 py-1 rounded-full">Roof of Africa</span>
                    </div>
                    <p class="text-gray-600 mb-4">Africa's highest peak at 5,895m. Choose from 7 different routes with expert guides and comprehensive support.</p>
                    <div class="space-y-2">
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <i class="ph-bold ph-mountains text-[#1F5A3A]"></i>
                            <span>5,895 meters</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <i class="ph-bold ph-signpost text-[#1F5A3A]"></i>
                            <span>7 Routes Available</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <i class="ph-bold ph-users text-[#1F5A3A]"></i>
                            <span>Expert Guides & Porters</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <i class="ph-bold ph-shield-check text-[#1F5A3A]"></i>
                            <span>All-Inclusive Packages</span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h4 class="font-semibold text-gray-800 mb-2">Available Routes:</h4>
                        <div class="grid grid-cols-2 gap-2 text-sm">
                            <div class="flex items-center gap-1">
                                <span class="w-2 h-2 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center text-xs font-semibold">M</span>
                                <span class="text-gray-600">Marangu (Coca-Cola Route)</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="w-2 h-2 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-xs font-semibold">M</span>
                                <span class="text-gray-600">Machame (Whiskey Route)</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="w-2 h-2 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center text-xs font-semibold">L</span>
                                <span class="text-gray-600">Lemosho Route</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="w-2 h-2 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center text-xs font-semibold">N</span>
                                <span class="text-gray-600">Northern Circuit</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="w-2 h-2 bg-red-100 text-red-600 rounded-full flex items-center justify-center text-xs font-semibold">U</span>
                                <span class="text-gray-600">Umbwe Route</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="w-2 h-2 bg-teal-100 text-teal-600 rounded-full flex items-center justify-center text-xs font-semibold">R</span>
                                <span class="text-gray-600">Rongai Route</span>
                            </div>
                        </div>
                    </div>
                    <a href="/tours" class="inline-flex items-center gap-2 text-[#1F5A3A] font-semibold hover:text-[#E67A2E] transition-colors">
                        Explore Kilimanjaro Routes
                </div>
            </div>
            
            <!-- Zanzibar -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden group cursor-pointer transition-all duration-300 hover:shadow-xl hover:scale-105">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('images/07.jpg') }}" alt="Zanzibar" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800">Zanzibar</h3>
                        <span class="bg-[#E67A2E] text-white text-xs px-3 py-1 rounded-full">Spice Island</span>
                    </div>
                    <p class="text-gray-600 mb-4">Tanzania's semi-autonomous archipelago. Pristine beaches, historic Stone Town, and spice plantations await.</p>
                    <div class="space-y-2">
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <i class="ph-bold ph-umbrella text-[#1F5A3A]"></i>
                            <span>25 beaches</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <i class="ph-bold ph-buildings text-[#1F5A3A]"></i>
                            <span>Stone Town</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <i class="ph-bold ph-plant text-[#1F5A3A]"></i>
                            <span>Spice tours</span>
                        </div>
                    </div>
                    <a href="/tours" class="inline-flex items-center gap-2 text-[#1F5A3A] font-semibold hover:text-[#E67A2E] transition-colors">
                        Explore Zanzibar
                        <i class="ph ph-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Destination Statistics Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-serif font-bold text-gray-800 mb-4">Tanzania by Numbers</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Discover fascinating facts about Tanzania's incredible destinations</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 p-6 rounded-2xl mb-4">
                    <i class="ph-bold ph-mountains text-4xl text-emerald-600 mb-3"></i>
                    <div class="text-3xl font-black font-bold">5,895m</div>
                    <div class="text-sm text-gray-600">Mount Kilimanjaro</div>
                </div>
                <p class="text-sm text-gray-600">Africa's highest peak</p>
            </div>
            
            <div class="text-center">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-2xl mb-4">
                    <i class="ph-bold ph-binoculars text-4xl text-blue-600 mb-3"></i>
                    <div class="text-3xl font-black font-bold">2.8M</div>
                    <div class="text-sm text-gray-600">Hectares</div>
                </div>
                <p class="text-sm text-gray-600">Serengeti National Park</p>
            </div>
            
            <div class="text-center">
                <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-6 rounded-2xl mb-4">
                    <i class="ph-bold ph-volcano text-4xl text-orange-600 mb-3"></i>
                    <div class="text-3xl font-black font-bold">2.5M</div>
                    <div class="text-sm text-gray-600">Years Old</div>
                </div>
                <p class="text-sm text-gray-600">Ngorongoro Crater</p>
            </div>
            
            <div class="text-center">
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-6 rounded-2xl mb-4">
                    <i class="ph-bold ph-umbrella text-4xl text-purple-600 mb-3"></i>
                    <div class="text-3xl font-black font-bold">25</div>
                    <div class="text-sm text-gray-600">Beaches</div>
                </div>
                <p class="text-sm text-gray-600">Zanzibar Islands</p>
            </div>
        </div>
    </div>
</section>

<!-- Filter Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-serif font-bold text-gray-800 mb-4">Find Your Perfect Destination</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Filter destinations by your interests and travel preferences</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
                <div class="flex items-center gap-3 mb-4">
                    <div class="bg-emerald-100 p-3 rounded-full">
                        <i class="ph-bold ph-compass text-emerald-600 text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">By Interest</h4>
                        <p class="text-sm text-gray-600">Choose your preferred activity</p>
                    </div>
                </div>
                <div class="space-y-3">
                    <button class="w-full text-left px-4 py-3 rounded-lg border border-gray-200 hover:border-emerald-600 hover:bg-emerald-50 transition-colors">
                        <i class="ph-bold ph-camera text-gray-600 mr-3"></i>
                        Wildlife & Safari
                    </button>
                    <button class="w-full text-left px-4 py-3 rounded-lg border border-gray-200 hover:border-emerald-600 hover:bg-emerald-50 transition-colors">
                        <i class="ph-bold ph-mountains text-gray-600 mr-3"></i>
                        Mountain Trekking
                    </button>
                    <button class="w-full text-left px-4 py-3 rounded-lg border border-gray-200 hover:border-emerald-600 hover:bg-emerald-50 transition-colors">
                        <i class="ph-bold ph-umbrella text-gray-600 mr-3"></i>
                        Beach & Island
                    </button>
                    <button class="w-full text-left px-4 py-3 rounded-lg border border-gray-200 hover:border-emerald-600 hover:bg-emerald-50 transition-colors">
                        <i class="ph-bold ph-culture text-gray-600 mr-3"></i>
                        Cultural & Historical
                    </button>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
                <div class="flex items-center gap-3 mb-4">
                    <div class="bg-blue-100 p-3 rounded-full">
                        <i class="ph-bold ph-calendar text-blue-600 text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">By Season</h4>
                        <p class="text-sm text-gray-600">Best time to visit</p>
                    </div>
                </div>
                <div class="space-y-3">
                    <button class="w-full text-left px-4 py-3 rounded-lg border border-gray-200 hover:border-blue-600 hover:bg-blue-50 transition-colors">
                        <i class="ph-bold ph-sun text-gray-600 mr-3"></i>
                        Dry Season (Jun-Oct)
                    </button>
                    <button class="w-full text-left px-4 py-3 rounded-lg border border-gray-200 hover:border-blue-600 hover:bg-blue-50 transition-colors">
                        <i class="ph-bold ph-cloud-rain text-gray-600 mr-3"></i>
                        Wet Season (Nov-May)
                    </button>
                    <button class="w-full text-left px-4 py-3 rounded-lg border border-gray-200 hover:border-blue-600 hover:bg-blue-50 transition-colors">
                        <i class="ph-bold ph-leaf text-gray-600 mr-3"></i>
                        All Seasons
                    </button>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
                <div class="flex items-center gap-3 mb-4">
                    <div class="bg-orange-100 p-3 rounded-full">
                        <i class="ph-bold ph-users text-orange-600 text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">By Difficulty</h4>
                        <p class="text-sm text-gray-600">Match your fitness level</p>
                    </div>
                </div>
                <div class="space-y-3">
                    <button class="w-full text-left px-4 py-3 rounded-lg border border-gray-200 hover:border-orange-600 hover:bg-orange-50 transition-colors">
                        <i class="ph-bold ph-walking text-gray-600 mr-3"></i>
                        Easy & Relaxed
                    </button>
                    <button class="w-full text-left px-4 py-3 rounded-lg border border-gray-200 hover:border-orange-600 hover:bg-orange-50 transition-colors">
                        <i class="ph-bold ph-trekking text-gray-600 mr-3"></i>
                        Moderate Adventure
                    </button>
                    <button class="w-full text-left px-4 py-3 rounded-lg border border-gray-200 hover:border-orange-600 hover:bg-orange-50 transition-colors">
                        <i class="ph-bold ph-trend-up text-gray-600 mr-3"></i>
                        Challenging Trek
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kilimanjaro Packages Section -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-serif font-bold text-gray-800 mb-4">Kilimanjaro Climbing Packages</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">All-inclusive packages with expert guides, quality equipment, and comprehensive support</p>
        </div>
        
        <!-- Package Inclusions -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-12">
            <h3 class="text-xl font-bold text-gray-800 mb-6">All Kilimanjaro Packages Include:</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="flex items-start gap-3">
                    <i class="ph-bold ph-check-circle text-emerald-600 text-xl mt-1"></i>
                    <div>
                        <h4 class="font-semibold text-gray-800">All Fees & Taxes</h4>
                        <p class="text-sm text-gray-600">National Park fees, conservation fees, and all applicable taxes</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <i class="ph-bold ph-check-circle text-emerald-600 text-xl mt-1"></i>
                    <div>
                        <h4 class="font-semibold text-gray-800">Expert Guides</h4>
                        <p class="text-sm text-gray-600">Certified English-speaking mountain guides at KINAPA ratios</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <i class="ph-bold ph-check-circle text-emerald-600 text-xl mt-1"></i>
                    <div>
                        <h4 class="font-semibold text-gray-800">Porter Support</h4>
                        <p class="text-sm text-gray-600">Luggage porters (15kg Kili, 12kg Meru) and specialist tent crew</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <i class="ph-bold ph-check-circle text-emerald-600 text-xl mt-1"></i>
                    <div>
                        <h4 class="font-semibold text-gray-800">All Meals</h4>
                        <p class="text-sm text-gray-600">Complete meal service with utensils and dining equipment</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <i class="ph-bold ph-check-circle text-emerald-600 text-xl mt-1"></i>
                    <div>
                        <h4 class="font-semibold text-gray-800">Transfers</h4>
                        <p class="text-sm text-gray-600">Airport transfers and gate transfers included</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <i class="ph-bold ph-check-circle text-emerald-600 text-xl mt-1"></i>
                    <div>
                        <h4 class="font-semibold text-gray-800">Safety Equipment</h4>
                        <p class="text-sm text-gray-600">Emergency oxygen, first aid kit, and safety protocols</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Route Highlights -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            <!-- Marangu Route -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center">
                        <i class="ph-bold ph-signpost text-emerald-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Marangu Route</h3>
                </div>
                <p class="text-gray-600 mb-4">The "Coca-Cola Route" - Only route with mountain huts. Perfect for first-time climbers.</p>
                <div class="space-y-2">
                    <div class="flex items-center gap-2 text-sm">
                        <i class="ph-bold ph-clock text-gray-400"></i>
                        <span class="font-semibold">5-7 Days</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm">
                        <i class="ph-bold ph-trend-up text-gray-400"></i>
                        <span class="font-semibold">Moderate Difficulty</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm">
                        <i class="ph-bold ph-star text-gray-400"></i>
                        <span class="font-semibold">Highest Success Rate</span>
                    </div>
                </div>
            </div>
            
            <!-- Machame Route -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="ph-bold ph-mountains text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Machame Route</h3>
                </div>
                <p class="text-gray-600 mb-4">The "Whiskey Route" - Most popular scenic route with diverse landscapes.</p>
                <div class="space-y-2">
                    <div class="flex items-center gap-2 text-sm">
                        <i class="ph-bold ph-clock text-gray-400"></i>
                        <span class="font-semibold">6-8 Days</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm">
                        <i class="ph-bold ph-trend-up text-gray-400"></i>
                        <span class="font-semibold">Challenging Difficulty</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm">
                        <i class="ph-bold ph-camera text-gray-400"></i>
                        <span class="font-semibold">Scenic Views</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Optional Extras -->
        <div class="bg-amber-50 rounded-2xl p-6 mb-12">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Optional Extras Available:</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 text-sm">
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-plus-circle text-amber-600"></i>
                    <span>Pre/Post Climb Accommodation</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-plus-circle text-amber-600"></i>
                    <span>Private Toilets</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-plus-circle text-amber-600"></i>
                    <span>Flying Doctors Insurance</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-plus-circle text-amber-600"></i>
                    <span>Personal Equipment</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-plus-circle text-amber-600"></i>
                    <span>Additional Oxygen</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-plus-circle text-amber-600"></i>
                    <span>Celebration Items</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-plus-circle text-amber-600"></i>
                    <span>Extra Guides/Porters</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-plus-circle text-amber-600"></i>
                    <span>Acclimatization Days</span>
                </div>
            </div>
        </div>
        
        <!-- What's Not Included -->
        <div class="bg-red-50 rounded-2xl p-6 mb-12">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Not Included:</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-x-circle text-red-600"></i>
                    <span>Tips & Gratuities</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-x-circle text-red-600"></i>
                    <span>Alcoholic Beverages</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-x-circle text-red-600"></i>
                    <span>International Flights</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-x-circle text-red-600"></i>
                    <span>Travel Insurance</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-x-circle text-red-600"></i>
                    <span>Visas</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-x-circle text-red-600"></i>
                    <span>Personal Items</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-x-circle text-red-600"></i>
                    <span>Day 1 Water</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-[#1F5A3A]">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-serif font-bold text-white mb-4">Ready to Start Your Adventure?</h2>
        <p class="text-white/90 mb-8 max-w-2xl mx-auto">Let our expert guides help you plan the perfect Tanzanian safari experience.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/tours" class="px-10 py-4 bg-white text-[#1F5A3A] font-bold rounded-full hover:bg-white/90 transition-all">
                <i class="ph-bold ph-map-trifold text-xl mr-2"></i>
                Browse All Tours
            </a>
            <a href="/contact" class="px-10 py-4 bg-[#E67A2E] text-white font-bold rounded-full hover:bg-[#E67A2E]/90 transition-all">
                <i class="ph-bold ph-chat-circle-dots text-xl mr-2"></i>
                Talk to Expert
            </a>
        </div>
    </div>
</section>
@endsection
