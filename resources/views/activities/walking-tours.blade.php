@extends('layouts.public')

@section('title', 'Walking Tours - Explore Tanzania on Foot')

@section('content')
<div class="pt-24">
    <!-- Hero Section -->
    <section class="relative h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468732/tree-222836_1920_bt1bf3.jpg" 
                 class="w-full h-full object-cover" alt="Walking Tours">
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-900/80 to-blue-900/60"></div>
        </div>
        <div class="relative z-10 text-center px-6">
            <h1 class="text-5xl md:text-7xl font-serif font-black text-white mb-6 border-move">Walking Tours</h1>
            <p class="text-xl text-indigo-50/90 max-w-2xl mx-auto">Experience Tanzania's beauty up close with guided walking adventures through diverse landscapes</p>
            <div class="mt-8">
                <a href="/contact" class="inline-flex items-center gap-3 px-8 py-4 bg-indigo-600 text-white font-bold rounded-full hover:bg-indigo-700 transition-colors">
                    Start Walking <i class="ph-bold ph-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Overview Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-4xl font-serif font-black text-slate-900 mb-6">Discover on Foot</h2>
                    <p class="text-lg text-slate-600 mb-8 leading-relaxed">
                        Walking tours offer intimate encounters with Tanzania's landscapes, wildlife, and cultures. From gentle nature walks to challenging mountain treks, experience the country at a human pace.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                                <i class="ph-bold ph-walking text-indigo-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">All Fitness Levels</h3>
                                <p class="text-sm text-slate-600">From easy walks to challenging treks</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                                <i class="ph-bold ph-tree text-indigo-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">Nature Immersion</h3>
                                <p class="text-sm text-slate-600">Close encounters with flora and fauna</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                                <i class="ph-bold ph-camera text-indigo-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">Photography</h3>
                                <p class="text-sm text-slate-600">Perfect opportunities for nature photography</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468732/tree-2600482_1920_c50vn6.jpg" 
                         class="rounded-2xl shadow-2xl" alt="Mountain Trail">
                    <div class="absolute -bottom-6 -right-6 bg-indigo-600 text-white p-6 rounded-2xl shadow-xl">
                        <p class="text-3xl font-black">15+</p>
                        <p class="text-sm font-bold">Walking Routes</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Walking Tour Types -->
    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif font-black text-slate-900 mb-4">Walking Tour Experiences</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Choose from our diverse range of walking adventures</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Nature Walks -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                    <div class="relative h-48">
                        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468733/tree-2600482_1920_1_ruahvn.jpg" 
                             class="w-full h-full object-cover" alt="Nature Walk">
                        <div class="absolute top-4 right-4 bg-green-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                            Easy
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">Nature Walks</h3>
                        <p class="text-slate-600 mb-4">Gentle walks through forests and nature reserves.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">2-3 hours</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Easy terrain</span>
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">All ages</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="text-2xl font-black text-indigo-600">$45</div>
                            <a href="/contact" class="inline-flex items-center gap-2 text-indigo-600 font-bold hover:text-indigo-700 transition-colors">
                                Book Walk <i class="ph ph-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Cultural Walks -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                    <div class="relative h-48">
                        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468733/trekkin_crg3w9.jpg" 
                             class="w-full h-full object-cover" alt="Cultural Walk">
                        <div class="absolute top-4 right-4 bg-purple-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                            Cultural
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">Cultural Walks</h3>
                        <p class="text-slate-600 mb-4">Walk through villages and learn about local traditions.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">3-4 hours</span>
                            <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-medium">Village visits</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Cultural sites</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="text-2xl font-black text-indigo-600">$55</div>
                            <a href="/contact" class="inline-flex items-center gap-2 text-indigo-600 font-bold hover:text-indigo-700 transition-colors">
                                Book Walk <i class="ph ph-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Hiking Trails -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                    <div class="relative h-48">
                        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468733/umbwee_biardh.jpg" 
                             class="w-full h-full object-cover" alt="Hiking Trail">
                        <div class="absolute top-4 right-4 bg-orange-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                            Moderate
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">Hiking Trails</h3>
                        <p class="text-slate-600 mb-4">Challenging trails with rewarding views and wildlife.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-medium">4-6 hours</span>
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Mountain views</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Wildlife</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="text-2xl font-black text-indigo-600">$75</div>
                            <a href="/contact" class="inline-flex items-center gap-2 text-indigo-600 font-bold hover:text-indigo-700 transition-colors">
                                Book Hike <i class="ph ph-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Walking Destinations -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif font-black text-slate-900 mb-4">Featured Walking Destinations</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Explore Tanzania's most beautiful walking destinations</p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Mount Meru -->
                <div class="bg-gradient-to-br from-indigo-50 to-blue-50 rounded-3xl p-8 border border-indigo-100">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-indigo-600 rounded-full flex items-center justify-center">
                            <i class="ph-bold ph-map-pin text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-900">Mount Meru Nature Walks</h3>
                            <p class="text-indigo-600 font-medium">Arusha National Park</p>
                        </div>
                    </div>
                    
                    <p class="text-slate-600 mb-6">Explore the slopes of Mount Meru through pristine forests, waterfalls, and diverse wildlife habitats. Perfect for acclimatization and nature photography.</p>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-indigo-600"></i>
                            <span class="text-slate-700">Montane forest trails</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-indigo-600"></i>
                            <span class="text-slate-700">Waterfall visits</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-indigo-600"></i>
                            <span class="text-slate-700">Colobus monkey sightings</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-3xl font-black text-indigo-600">$65<span class="text-lg font-normal text-slate-600">/person</span></p>
                            <p class="text-sm text-slate-600">Half day guided walk</p>
                        </div>
                        <a href="/contact" class="px-6 py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 transition-colors">
                            Book Now
                        </a>
                    </div>
                </div>

                <!-- Ngorongoro Highlands -->
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-3xl p-8 border border-green-100">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center">
                            <i class="ph-bold ph-map-pin text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-900">Ngorongoro Highlands</h3>
                            <p class="text-green-600 font-medium">Empakaai & Olmoti Craters</p>
                        </div>
                    </div>
                    
                    <p class="text-slate-600 mb-6">Walk through the highlands surrounding Ngorongoro Crater, visiting remote crater lakes and experiencing traditional Maasai life.</p>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-green-600"></i>
                            <span class="text-slate-700">Crater rim walks</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-green-600"></i>
                            <span class="text-slate-700">Maasai village visits</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-green-600"></i>
                            <span class="text-slate-700">Empakaai Crater lake</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-3xl font-black text-green-600">$85<span class="text-lg font-normal text-slate-600">/person</span></p>
                            <p class="text-sm text-slate-600">Full day trek</p>
                        </div>
                        <a href="/contact" class="px-6 py-3 bg-green-600 text-white font-bold rounded-xl hover:bg-green-700 transition-colors">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Walking Tour Options -->
    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif font-black text-slate-900 mb-4">Walking Tour Options</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Choose the perfect walking experience for your interests and fitness level</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Guided Nature Walk -->
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-leaf text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Guided Nature Walk</h3>
                    <p class="text-slate-600 text-sm mb-4">Expert naturalist guides lead the way</p>
                    <div class="text-2xl font-black text-green-600">$50</div>
                </div>

                <!-- Bird Watching Walk -->
                <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-6 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-bird text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Bird Watching Walk</h3>
                    <p class="text-slate-600 text-sm mb-4">Focus on avian species identification</p>
                    <div class="text-2xl font-black text-blue-600">$60</div>
                </div>

                <!-- Photography Walk -->
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-6 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-camera text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Photography Walk</h3>
                    <p class="text-slate-600 text-sm mb-4">Perfect lighting and composition tips</p>
                    <div class="text-2xl font-black text-purple-600">$70</div>
                </div>

                <!-- Cultural Heritage Walk -->
                <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-2xl p-6 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-users-three text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Cultural Heritage</h3>
                    <p class="text-slate-600 text-sm mb-4">Traditional sites and village visits</p>
                    <div class="text-2xl font-black text-orange-600">$55</div>
                </div>
            </div>
        </div>
    </section>

    <!-- What to Bring -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif font-black text-slate-900 mb-4">What to Bring</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Essential items for your walking adventure</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-indigo-100">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="ph-bold ph-backpack text-indigo-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Essential Gear</h3>
                    <ul class="space-y-2 text-slate-600 text-sm">
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-indigo-600 mt-0.5"></i>
                            <span>Comfortable walking shoes</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-indigo-600 mt-0.5"></i>
                            <span>Lightweight backpack</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-indigo-600 mt-0.5"></i>
                            <span>Water bottle (2L minimum)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-indigo-600 mt-0.5"></i>
                            <span>Sun protection (hat, sunscreen)</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg border border-green-100">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="ph-bold ph-camera text-green-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Optional Items</h3>
                    <ul class="space-y-2 text-slate-600 text-sm">
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-green-600 mt-0.5"></i>
                            <span>Camera and binoculars</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-green-600 mt-0.5"></i>
                            <span>Walking poles</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-green-600 mt-0.5"></i>
                            <span>Light rain jacket</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-green-600 mt-0.5"></i>
                            <span>Snacks and energy bars</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg border border-orange-100">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="ph-bold ph-first-aid text-orange-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Safety Items</h3>
                    <ul class="space-y-2 text-slate-600 text-sm">
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-orange-600 mt-0.5"></i>
                            <span>Personal first aid kit</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-orange-600 mt-0.5"></i>
                            <span>Insect repellent</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-orange-600 mt-0.5"></i>
                            <span>Personal medications</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-orange-600 mt-0.5"></i>
                            <span>Emergency contact info</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-gradient-to-r from-indigo-600 to-blue-600">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-serif font-black text-white mb-6">Step Into Adventure</h2>
            <p class="text-xl text-indigo-50 mb-8">Join us for unforgettable walking experiences in Tanzania's wilderness</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="px-8 py-4 bg-white text-indigo-600 font-bold rounded-full hover:bg-gray-100 transition-colors">
                    Plan Walking Tour
                </a>
                <a href="/tours" class="px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-indigo-600 transition-colors">
                    View All Tours
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
