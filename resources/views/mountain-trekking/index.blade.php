@extends('layouts.public')

@section('title', 'Mountain Trekking - Kilimanjaro Climbing Packages')

@section('content')


<br>
<!-- Regions Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-serif font-bold text-gray-800 mb-4">Explore Tanzania's Regions</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Discover the unique landscapes and attractions of each region</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Serengeti Region -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden group cursor-pointer transition-all duration-300 hover:shadow-xl hover:scale-105">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ asset('images/01.jpg') }}" alt="Serengeti" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-emerald-900/80 via-transparent to-transparent"></div>
                    <div class="absolute top-4 left-4 right-4 flex justify-between">
                        <span class="bg-emerald-600 text-white text-xs px-3 py-1 rounded-full backdrop-blur-sm">Wildlife Safari</span>
                        <div class="bg-white/90 backdrop-blur-md p-2 rounded-full">
                            <i class="ph-bold ph-compass text-emerald-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Serengeti Region</h3>
                            <p class="text-sm text-gray-600">Great Migration & Big Five</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4 text-sm leading-relaxed">Home to the world-famous Great Migration and Africa's Big Five. Experience endless plains teeming with wildlife.</p>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <i class="ph-bold ph-map-pin text-emerald-600"></i>
                                <span>2.8M hectares</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <i class="ph-bold ph-users text-emerald-600"></i>
                                <span>Year-round access</span>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <i class="ph-bold ph-star text-emerald-600"></i>
                                <span>5-star rated</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <i class="ph-bold ph-tent text-emerald-600"></i>
                                <span>Luxury lodges</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-600">
                            <span class="font-semibold text-emerald-600">Highlights:</span> Great Migration, Big Five, Ndutu Plains
                        </div>
                        <a href="{{ route('regions.serengeti') }}" class="inline-flex items-center gap-2 bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-emerald-700 transition-colors">
                            Explore Serengeti <i class="ph ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Ngorongoro Region -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden group cursor-pointer transition-all duration-300 hover:shadow-xl hover:scale-105">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ asset('images/05.jpg') }}" alt="Ngorongoro" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/80 via-transparent to-transparent"></div>
                    <div class="absolute top-4 left-4 right-4 flex justify-between">
                        <span class="bg-blue-600 text-white text-xs px-3 py-1 rounded-full backdrop-blur-sm">UNESCO Site</span>
                        <div class="bg-white/90 backdrop-blur-md p-2 rounded-full">
                            <i class="ph-bold ph-volcano text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Ngorongoro Region</h3>
                            <p class="text-sm text-gray-600">Crater & Highlands</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4 text-sm leading-relaxed">World's largest unbroken caldera with highest density of big game. A natural wonder formed by volcanic collapse.</p>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <i class="ph-bold ph-volcano text-blue-600"></i>
                                <span>2.5M years old</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <i class="ph-bold ph-binoculars text-blue-600"></i>
                                <span>Big Five habitat</span>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <i class="ph-bold ph-tree text-blue-600"></i>
                                <span>Ancient forest</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <i class="ph-bold ph-camera text-blue-600"></i>
                                <span>Photography paradise</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-600">
                            <span class="font-semibold text-blue-600">Highlights:</span> Ngorongoro Crater, Empakaai, Highlands
                        </div>
                        <a href="{{ route('regions.ngorongoro') }}" class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition-colors">
                            Explore Ngorongoro <i class="ph ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Kilimanjaro Region -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden group cursor-pointer transition-all duration-300 hover:shadow-xl hover:scale-105">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ asset('images/03.jpg') }}" alt="Kilimanjaro" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-orange-900/80 via-transparent to-transparent"></div>
                    <div class="absolute top-4 left-4 right-4 flex justify-between">
                        <span class="bg-orange-600 text-white text-xs px-3 py-1 rounded-full backdrop-blur-sm">7 Routes</span>
                        <div class="bg-white/90 backdrop-blur-md p-2 rounded-full">
                            <i class="ph-bold ph-mountains text-orange-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Kilimanjaro Region</h3>
                            <p class="text-sm text-gray-600">Africa's Highest Peak</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4 text-sm leading-relaxed">Africa's highest peak at 5,895m. Choose from 7 different routes with expert guides and comprehensive support.</p>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <i class="ph-bold ph-mountains text-orange-600"></i>
                                <span>5,895m</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <i class="ph-bold ph-compass text-orange-600"></i>
                                <span>North Tanzania</span>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <i class="ph-bold ph-trekking text-orange-600"></i>
                                <span>7 climbing routes</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <i class="ph-bold ph-star text-orange-600"></i>
                                <span>World famous</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-600">
                            <span class="font-semibold text-orange-600">Highlights:</span> Marangu, Machame, Lemosho, Northern Circuit
                        </div>
                        <a href="{{ route('kilimanjaro') }}" class="inline-flex items-center gap-2 bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-orange-700 transition-colors">
                            Explore Kilimanjaro <i class="ph ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Zanzibar Region -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden group cursor-pointer transition-all duration-300 hover:shadow-xl hover:scale-105">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ asset('images/07.jpg') }}" alt="Zanzibar" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-purple-900/80 via-transparent to-transparent"></div>
                    <div class="absolute top-4 left-4 right-4 flex justify-between">
                        <span class="bg-purple-600 text-white text-xs px-3 py-1 rounded-full backdrop-blur-sm">Spice Islands</span>
                        <div class="bg-white/90 backdrop-blur-md p-2 rounded-full">
                            <i class="ph-bold ph-umbrella text-purple-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Zanzibar Region</h3>
                            <p class="text-sm text-gray-600">Beaches & Culture</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4 text-sm leading-relaxed">Tanzania's semi-autonomous archipelago. Pristine beaches, historic Stone Town, and spice plantations await.</p>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <i class="ph-bold ph-umbrella text-purple-600"></i>
                                <span>25 beaches</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <i class="ph-bold ph-buildings text-purple-600"></i>
                                <span>Stone Town</span>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <i class="ph-bold ph-plant text-purple-600"></i>
                                <span>Spice tours</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <i class="ph-bold ph-sunset text-purple-600"></i>
                                <span>Sunset views</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-600">
                            <span class="font-semibold text-purple-600">Highlights:</span> Stone Town, Spice Farms, Beaches
                        </div>
                        <a href="{{ route('regions.zanzibar') }}" class="inline-flex items-center gap-2 bg-purple-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-purple-700 transition-colors">
                            Explore Zanzibar <i class="ph ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-[#1F5A3A]">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-serif font-bold text-white mb-4">Why Choose Our Kilimanjaro Expeditions?</h2>
        <p class="text-white/90 mb-8 max-w-2xl mx-auto">Experience the adventure of a lifetime with our expert-guided climbing expeditions.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl mb-4">
                    <i class="ph-bold ph-shield-check text-4xl text-emerald-400 mb-4"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">100% Safety Record</h3>
                <p class="text-white/80 text-sm">Experienced guides with comprehensive safety protocols</p>
            </div>
            <div class="text-center">
                <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl mb-4">
                    <i class="ph-bold ph-trophy text-4xl text-emerald-400 mb-4"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">High Summit Success</h3>
                <p class="text-white/80 text-sm">98% summit success rate across all routes</p>
            </div>
            <div class="text-center">
                <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl mb-4">
                    <i class="ph-bold ph-users-three text-4xl text-emerald-400 mb-4"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Expert Guides</h3>
                <p class="text-white/80 text-sm">Certified mountain guides with extensive experience</p>
            </div>
            <div class="text-center">
                <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl mb-4">
                    <i class="ph-bold ph-campfire text-4xl text-emerald-400 mb-4"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Quality Equipment</h3>
                <p class="text-white/80 text-sm">Premium climbing and safety gear provided</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gray-900">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-serif font-bold text-white mb-4">Ready to Conquer Kilimanjaro?</h2>
        <p class="text-gray-300 mb-8 max-w-2xl mx-auto">Join hundreds of successful climbers who've reached the summit with our expert guidance.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-emerald-600 text-white px-8 py-4 rounded-full font-bold hover:bg-emerald-700 transition-colors">
                Get Expert Advice
            </a>
            <a href="{{ route('tours.index') }}" class="border-2 border-emerald-600 text-emerald-600 px-8 py-4 rounded-full font-bold hover:bg-emerald-600 hover:text-white transition-colors">
                View All Tours
            </a>
        </div>
    </div>
</section>
@endsection
