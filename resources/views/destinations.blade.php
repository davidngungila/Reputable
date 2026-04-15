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
