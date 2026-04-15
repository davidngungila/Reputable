@extends('layouts.public')

@section('content')
<!-- Destinations Hero Section -->
<section class="relative h-96 overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('images/02.jpg') }}" alt="Tanzania Destinations" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/40 to-transparent"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-6 w-full h-full flex items-center">
        <div class="text-center text-white">
            <h1 class="text-5xl md:text-6xl font-serif font-bold mb-6">Discover Tanzania's</h1>
            <span class="text-[#E67A2E]">Amazing Destinations</span>
        </h1>
            <p class="text-xl text-slate-200 mb-8 max-w-4xl mx-auto">From the Serengeti plains to Mount Kilimanjaro, experience Tanzania's most spectacular landscapes and wildlife.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mt-8">
                <a href="/tours" class="inline-flex items-center gap-3 px-8 py-4 bg-[#1F5A3A] text-white font-bold rounded-full hover:bg-[#2E7A5A] shadow-xl shadow-[#1F5A3A]/30 transition-all">
                    <i class="ph-bold ph-compass text-xl mr-2"></i>
                    Explore All Destinations
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Destinations Grid -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-serif font-bold text-gray-800 mb-4">Popular Destinations</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Choose from our handpicked selection of Tanzania's most visited destinations</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Serengeti -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden group cursor-pointer transition-all duration-300 hover:shadow-xl hover:scale-105">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('images/01.jpg') }}" alt="Serengeti" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800">Serengeti National Park</h3>
                        <span class="bg-[#E67A2E] text-white text-xs px-3 py-1 rounded-full">Most Popular</span>
                    </div>
                    <p class="text-gray-600 mb-4">Home to the Great Migration and Africa's Big Five. Witness millions of wildebeest crossing the plains.</p>
                    <div class="space-y-2">
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <i class="ph-bold ph-map-pin text-[#1F5A3A]"></i>
                            <span>2.8 million hectares</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <i class="ph-bold ph-users text-[#1F5A3A]"></i>
                            <span>Year-round access</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <i class="ph-bold ph-camera text-[#1F5A3A]"></i>
                            <span>Photography paradise</span>
                        </div>
                    </div>
                    <a href="/tours" class="inline-flex items-center gap-2 text-[#1F5A3A] font-semibold hover:text-[#E67A2E] transition-colors">
                        Explore Serengeti
                        <i class="ph ph-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <!-- Ngorongoro -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden group cursor-pointer transition-all duration-300 hover:shadow-xl hover:scale-105">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('images/05.jpg') }}" alt="Ngorongoro" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800">Ngorongoro Crater</h3>
                        <span class="bg-[#1F5A3A] text-white text-xs px-3 py-1 rounded-full">UNESCO Site</span>
                    </div>
                    <p class="text-gray-600 mb-4">The world's largest unbroken caldera and highest density of big game. A natural wonder formed by volcanic collapse.</p>
                    <div class="space-y-2">
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <i class="ph-bold ph-volcano text-[#1F5A3A]"></i>
                            <span>2.5 million years old</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <i class="ph-bold ph-binoculars text-[#1F5A3A]"></i>
                            <span>Big Five habitat</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <i class="ph-bold ph-tree text-[#1F5A3A]"></i>
                            <span>Ancient forest</span>
                        </div>
                    </div>
                    <a href="/tours" class="inline-flex items-center gap-2 text-[#1F5A3A] font-semibold hover:text-[#E67A2E] transition-colors">
                        Explore Ngorongoro
                        <i class="ph ph-arrow-right"></i>
                    </a>
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
                    <p class="text-gray-600 mb-4">Africa's highest peak at 5,895m. Conquer the summit with expert guides and proper acclimatization.</p>
                    <div class="space-y-2">
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <i class="ph-bold ph-mountains text-[#1F5A3A]"></i>
                            <span>5,895 meters</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <i class="ph-bold ph-users text-[#1F5A3A]"></i>
                            <span>7 routes</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <i class="ph-bold ph-backpack text-[#1F5A3A]"></i>
                            <span>Expert guides</span>
                        </div>
                    </div>
                    <a href="/tours" class="inline-flex items-center gap-2 text-[#1F5A3A] font-semibold hover:text-[#E67A2E] transition-colors">
                        Explore Kilimanjaro
                        <i class="ph ph-arrow-right"></i>
                    </a>
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
