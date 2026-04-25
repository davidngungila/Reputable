@extends('layouts.public')

@section('title', 'Mountain Trekking Routes - Kilimanjaro Climbing Paths')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-emerald-50">
    <!-- Enhanced Hero Section -->
    <div class="relative bg-gradient-to-r from-emerald-800 to-orange-600 text-white">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative container mx-auto px-4 pt-24 pb-16">
            <div class="text-center max-w-4xl mx-auto">
                                
                <!-- Enhanced Title -->
                <h1 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-white to-emerald-300 bg-clip-text text-transparent">
                        Mountain Trekking Routes
                    </span>
                </h1>
                
                <!-- Enhanced Description -->
                <p class="text-xl text-white/90 mb-8 max-w-3xl mx-auto leading-relaxed">
                    Explore the six main routes to the summit of Mount Kilimanjaro. Each path offers unique challenges, 
                    scenery, and experiences tailored to different skill levels and preferences.
                </p>
                
                <!-- Quick Navigation -->
                <div class="flex justify-center gap-4 flex-wrap">
                    <a href="#popular-routes" class="px-6 py-3 bg-emerald-800 text-white rounded-lg font-semibold hover:bg-emerald-900 transition-colors">
                        <i class="ph-bold ph-star mr-2"></i>Popular Routes
                    </a>
                    <a href="#route-comparison" class="px-6 py-3 bg-orange-600 text-white rounded-lg font-semibold hover:bg-orange-700 transition-colors">
                        <i class="ph-bold ph-scales mr-2"></i>Compare Routes
                    </a>
                    <a href="#difficulty-guide" class="px-6 py-3 bg-white/20 backdrop-blur-sm text-white rounded-lg font-semibold hover:bg-white/30 transition-all border border-white/30">
                        <i class="ph-bold ph-chart-line mr-2"></i>Difficulty Guide
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Popular Routes Section -->
    <section id="popular-routes" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Choose Your Route
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Select the perfect path based on your experience, fitness level, and adventure preferences.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Machame Route -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all transform hover:scale-105">
                    <div class="h-48 bg-gradient-to-br from-emerald-700 to-orange-500 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="ph-bold ph-mountains text-white text-6xl"></i>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1">
                            <span class="text-sm font-bold text-emerald-800">Most Popular</span>
                        </div>
                        <div class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm rounded-lg px-3 py-2">
                            <span class="text-xs font-bold text-gray-900">SUCCESS RATE: 85%</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Machame Route</h3>
                        <p class="text-gray-600 mb-4">
                            The "Whiskey Route" offers stunning scenery and excellent acclimatization opportunities. 
                            Perfect for experienced trekkers seeking a challenging climb.
                        </p>
                        <div class="space-y-2 mb-4">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Duration</span>
                                <span class="font-bold text-emerald-600">6-7 Days</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Difficulty</span>
                                <span class="font-bold text-orange-600">High</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Max Altitude</span>
                                <span class="font-bold text-blue-600">4,643m</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Accommodation</span>
                                <span class="font-bold text-purple-600">Camping</span>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-emerald-100 text-emerald-700 rounded text-xs font-medium">Scenic</span>
                            <span class="px-2 py-1 bg-emerald-100 text-emerald-700 rounded text-xs font-medium">Good Acclimatization</span>
                            <span class="px-2 py-1 bg-emerald-100 text-emerald-700 rounded text-xs font-medium">Challenging</span>
                        </div>
                        <button class="w-full px-4 py-3 bg-gradient-to-r from-emerald-800 to-orange-600 text-white rounded-lg font-semibold hover:from-emerald-900 hover:to-orange-700 transition-all">
                            <i class="ph-bold ph-info mr-2"></i>View Details
                        </button>
                    </div>
                </div>

                <!-- Marangu Route -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all transform hover:scale-105">
                    <div class="h-48 bg-gradient-to-br from-orange-500 to-red-500 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="ph-bold ph-tent text-white text-6xl"></i>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1">
                            <span class="text-sm font-bold text-orange-800">Classic Route</span>
                        </div>
                        <div class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm rounded-lg px-3 py-2">
                            <span class="text-xs font-bold text-gray-900">SUCCESS RATE: 75%</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Marangu Route</h3>
                        <p class="text-gray-600 mb-4">
                            The "Coca-Cola Route" is the oldest and most established path with hut accommodations. 
                            Ideal for beginners seeking comfort during their climb.
                        </p>
                        <div class="space-y-2 mb-4">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Duration</span>
                                <span class="font-bold text-emerald-600">5-6 Days</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Difficulty</span>
                                <span class="font-bold text-yellow-600">Moderate</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Max Altitude</span>
                                <span class="font-bold text-blue-600">5,895m</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Accommodation</span>
                                <span class="font-bold text-purple-600">Huts</span>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded text-xs font-medium">Comfortable</span>
                            <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded text-xs font-medium">Beginner Friendly</span>
                            <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded text-xs font-medium">Established</span>
                        </div>
                        <button class="w-full px-4 py-3 bg-gradient-to-r from-orange-600 to-red-600 text-white rounded-lg font-semibold hover:from-orange-700 hover:to-red-700 transition-all">
                            <i class="ph-bold ph-info mr-2"></i>View Details
                        </button>
                    </div>
                </div>

                <!-- Lemosho Route -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all transform hover:scale-105">
                    <div class="h-48 bg-gradient-to-br from-emerald-600 to-orange-400 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="ph-bold ph-compass text-white text-6xl"></i>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1">
                            <span class="text-sm font-bold text-emerald-800">Most Scenic</span>
                        </div>
                        <div class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm rounded-lg px-3 py-2">
                            <span class="text-xs font-bold text-gray-900">SUCCESS RATE: 90%</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Lemosho Route</h3>
                        <p class="text-gray-600 mb-4">
                            The most scenic route with excellent acclimatization and diverse ecosystems. 
                            Perfect for photographers and nature enthusiasts.
                        </p>
                        <div class="space-y-2 mb-4">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Duration</span>
                                <span class="font-bold text-emerald-600">7-8 Days</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Difficulty</span>
                                <span class="font-bold text-orange-600">High</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Max Altitude</span>
                                <span class="font-bold text-blue-600">5,895m</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Accommodation</span>
                                <span class="font-bold text-purple-600">Camping</span>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-purple-100 text-purple-700 rounded text-xs font-medium">Beautiful</span>
                            <span class="px-2 py-1 bg-purple-100 text-purple-700 rounded text-xs font-medium">Remote</span>
                            <span class="px-2 py-1 bg-purple-100 text-purple-700 rounded text-xs font-medium">Wildlife</span>
                        </div>
                        <button class="w-full px-4 py-3 bg-gradient-to-r from-emerald-800 to-orange-600 text-white rounded-lg font-semibold hover:from-emerald-900 hover:to-orange-700 transition-all">
                            <i class="ph-bold ph-info mr-2"></i>View Details
                        </button>
                    </div>
                </div>

                <!-- Rongai Route -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all transform hover:scale-105">
                    <div class="h-48 bg-gradient-to-br from-orange-600 to-yellow-500 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="ph-bold ph-sun text-white text-6xl"></i>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1">
                            <span class="text-sm font-bold text-orange-800">Dry Route</span>
                        </div>
                        <div class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm rounded-lg px-3 py-2">
                            <span class="text-xs font-bold text-gray-900">SUCCESS RATE: 80%</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Rongai Route</h3>
                        <p class="text-gray-600 mb-4">
                            The only route approaching from the north, offering drier conditions and unique perspectives. 
                            Less crowded with excellent wildlife viewing opportunities.
                        </p>
                        <div class="space-y-2 mb-4">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Duration</span>
                                <span class="font-bold text-emerald-600">6-7 Days</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Difficulty</span>
                                <span class="font-bold text-yellow-600">Moderate</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Max Altitude</span>
                                <span class="font-bold text-blue-600">5,895m</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Accommodation</span>
                                <span class="font-bold text-purple-600">Camping</span>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-orange-100 text-orange-700 rounded text-xs font-medium">Less Crowded</span>
                            <span class="px-2 py-1 bg-orange-100 text-orange-700 rounded text-xs font-medium">Dry Climate</span>
                            <span class="px-2 py-1 bg-orange-100 text-orange-700 rounded text-xs font-medium">Wildlife</span>
                        </div>
                        <button class="w-full px-4 py-3 bg-gradient-to-r from-orange-600 to-red-600 text-white rounded-lg font-semibold hover:from-orange-700 hover:to-red-700 transition-all">
                            <i class="ph-bold ph-info mr-2"></i>View Details
                        </button>
                    </div>
                </div>

                <!-- Umbwe Route -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all transform hover:scale-105">
                    <div class="h-48 bg-gradient-to-br from-red-400 to-gray-600 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="ph-bold ph-warning text-white text-6xl"></i>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1">
                            <span class="text-sm font-bold text-red-700">Expert Only</span>
                        </div>
                        <div class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm rounded-lg px-3 py-2">
                            <span class="text-xs font-bold text-gray-900">SUCCESS RATE: 65%</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Umbwe Route</h3>
                        <p class="text-gray-600 mb-4">
                            The most challenging route with steep ascents and technical sections. 
                            Recommended only for experienced mountaineers with excellent fitness.
                        </p>
                        <div class="space-y-2 mb-4">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Duration</span>
                                <span class="font-bold text-emerald-600">6-7 Days</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Difficulty</span>
                                <span class="font-bold text-red-600">Extreme</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Max Altitude</span>
                                <span class="font-bold text-blue-600">5,895m</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Accommodation</span>
                                <span class="font-bold text-purple-600">Camping</span>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-red-100 text-red-700 rounded text-xs font-medium">Steep</span>
                            <span class="px-2 py-1 bg-red-100 text-red-700 rounded text-xs font-medium">Technical</span>
                            <span class="px-2 py-1 bg-red-100 text-red-700 rounded text-xs font-medium">Experts Only</span>
                        </div>
                        <button class="w-full px-4 py-3 bg-gradient-to-r from-red-600 to-gray-600 text-white rounded-lg font-semibold hover:from-red-700 hover:to-gray-700 transition-all">
                            <i class="ph-bold ph-info mr-2"></i>View Details
                        </button>
                    </div>
                </div>

                <!-- Northern Circuit -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all transform hover:scale-105">
                    <div class="h-48 bg-gradient-to-br from-teal-400 to-cyan-500 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="ph-bold ph-path text-white text-6xl"></i>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1">
                            <span class="text-sm font-bold text-teal-700">Longest Route</span>
                        </div>
                        <div class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm rounded-lg px-3 py-2">
                            <span class="text-xs font-bold text-gray-900">SUCCESS RATE: 95%</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Northern Circuit</h3>
                        <p class="text-gray-600 mb-4">
                            The newest and longest route offering complete circumnavigation of the mountain. 
                            Excellent acclimatization with the highest success rates.
                        </p>
                        <div class="space-y-2 mb-4">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Duration</span>
                                <span class="font-bold text-emerald-600">9-10 Days</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Difficulty</span>
                                <span class="font-bold text-orange-600">High</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Max Altitude</span>
                                <span class="font-bold text-blue-600">5,895m</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Accommodation</span>
                                <span class="font-bold text-purple-600">Camping</span>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-teal-100 text-teal-700 rounded text-xs font-medium">Best Success</span>
                            <span class="px-2 py-1 bg-teal-100 text-teal-700 rounded text-xs font-medium">Complete Circle</span>
                            <span class="px-2 py-1 bg-teal-100 text-teal-700 rounded text-xs font-medium">Remote</span>
                        </div>
                        <button class="w-full px-4 py-3 bg-gradient-to-r from-teal-600 to-cyan-600 text-white rounded-lg font-semibold hover:from-teal-700 hover:to-cyan-700 transition-all">
                            <i class="ph-bold ph-info mr-2"></i>View Details
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Route Comparison Section -->
    <section id="route-comparison" class="py-20 bg-gradient-to-br from-gray-50 to-emerald-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Route Comparison
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Compare all routes side by side to find the perfect match for your climbing adventure.
                </p>
            </div>
            
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gradient-to-r from-emerald-800 to-orange-600 text-white">
                            <tr>
                                <th class="px-6 py-4 text-left font-semibold">Route</th>
                                <th class="px-6 py-4 text-center font-semibold">Duration</th>
                                <th class="px-6 py-4 text-center font-semibold">Difficulty</th>
                                <th class="px-6 py-4 text-center font-semibold">Success Rate</th>
                                <th class="px-6 py-4 text-center font-semibold">Accommodation</th>
                                <th class="px-6 py-4 text-center font-semibold">Scenery</th>
                                <th class="px-6 py-4 text-center font-semibold">Crowds</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 font-bold text-gray-900">Machame</td>
                                <td class="px-6 py-4 text-center">6-7 Days</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="px-2 py-1 bg-orange-100 text-orange-700 rounded text-xs font-medium">High</span>
                                </td>
                                <td class="px-6 py-4 text-center font-bold text-emerald-600">85%</td>
                                <td class="px-6 py-4 text-center">Camping</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center">
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">Moderate</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 font-bold text-gray-900">Marangu</td>
                                <td class="px-6 py-4 text-center">5-6 Days</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded text-xs font-medium">Moderate</span>
                                </td>
                                <td class="px-6 py-4 text-center font-bold text-blue-600">75%</td>
                                <td class="px-6 py-4 text-center">Huts</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center">
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                        <i class="ph-bold ph-star text-yellow-400"></i>
                                        <i class="ph-bold ph-star text-yellow-400"></i>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">High</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 font-bold text-gray-900">Lemosho</td>
                                <td class="px-6 py-4 text-center">7-8 Days</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="px-2 py-1 bg-orange-100 text-orange-700 rounded text-xs font-medium">High</span>
                                </td>
                                <td class="px-6 py-4 text-center font-bold text-teal-600">90%</td>
                                <td class="px-6 py-4 text-center">Camping</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center">
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">Low</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 font-bold text-gray-900">Rongai</td>
                                <td class="px-6 py-4 text-center">6-7 Days</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded text-xs font-medium">Moderate</span>
                                </td>
                                <td class="px-6 py-4 text-center font-bold text-purple-600">80%</td>
                                <td class="px-6 py-4 text-center">Camping</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center">
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                        <i class="ph-bold ph-star text-yellow-400"></i>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">Low</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 font-bold text-gray-900">Umbwe</td>
                                <td class="px-6 py-4 text-center">6-7 Days</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="px-2 py-1 bg-red-100 text-red-700 rounded text-xs font-medium">Extreme</span>
                                </td>
                                <td class="px-6 py-4 text-center font-bold text-red-600">65%</td>
                                <td class="px-6 py-4 text-center">Camping</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center">
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                        <i class="ph-bold ph-star text-yellow-400"></i>
                                        <i class="ph-bold ph-star text-yellow-400"></i>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">Very Low</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 font-bold text-gray-900">Northern Circuit</td>
                                <td class="px-6 py-4 text-center">9-10 Days</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="px-2 py-1 bg-orange-100 text-orange-700 rounded text-xs font-medium">High</span>
                                </td>
                                <td class="px-6 py-4 text-center font-bold text-emerald-600">95%</td>
                                <td class="px-6 py-4 text-center">Camping</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center">
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                        <i class="ph-bold ph-star-fill text-yellow-400"></i>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">Very Low</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Difficulty Guide Section -->
    <section id="difficulty-guide" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Difficulty Guide
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Understand the difficulty levels and choose the route that matches your experience and fitness.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Moderate -->
                <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-2xl p-8 border border-yellow-200">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 bg-gradient-to-br from-emerald-700 to-orange-500 rounded-full flex items-center justify-center text-white mx-auto mb-4">
                            <i class="ph-bold ph-walking text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Moderate</h3>
                        <div class="flex justify-center mb-4">
                            <i class="ph-bold ph-chart-line text-orange-500"></i>
                            <i class="ph-bold ph-chart-line text-gray-300"></i>
                            <i class="ph-bold ph-chart-line text-gray-300"></i>
                            <i class="ph-bold ph-chart-line text-gray-300"></i>
                            <i class="ph-bold ph-chart-line text-gray-300"></i>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">Best For</h4>
                            <p class="text-gray-600 text-sm">Beginners, families, and those seeking comfort</p>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">Fitness Level</h4>
                            <p class="text-gray-600 text-sm">Basic hiking fitness required</p>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">Recommended Routes</h4>
                            <p class="text-gray-600 text-sm">Marangu, Rongai</p>
                        </div>
                    </div>
                </div>

                <!-- High -->
                <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-2xl p-8 border border-orange-200">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 bg-gradient-to-br from-orange-600 to-red-500 rounded-full flex items-center justify-center text-white mx-auto mb-4">
                            <i class="ph-bold ph-hiking text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">High</h3>
                        <div class="flex justify-center mb-4">
                            <i class="ph-bold ph-chart-line text-orange-500"></i>
                            <i class="ph-bold ph-chart-line text-orange-500"></i>
                            <i class="ph-bold ph-chart-line text-orange-500"></i>
                            <i class="ph-bold ph-chart-line text-gray-300"></i>
                            <i class="ph-bold ph-chart-line text-gray-300"></i>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">Best For</h4>
                            <p class="text-gray-600 text-sm">Experienced hikers, adventure seekers</p>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">Fitness Level</h4>
                            <p class="text-gray-600 text-sm">Good to excellent hiking fitness</p>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">Recommended Routes</h4>
                            <p class="text-gray-600 text-sm">Machame, Lemosho, Northern Circuit</p>
                        </div>
                    </div>
                </div>

                <!-- Extreme -->
                <div class="bg-gradient-to-br from-red-50 to-gray-50 rounded-2xl p-8 border border-red-200">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 bg-gradient-to-br from-red-400 to-gray-600 rounded-full flex items-center justify-center text-white mx-auto mb-4">
                            <i class="ph-bold ph-warning text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Extreme</h3>
                        <div class="flex justify-center mb-4">
                            <i class="ph-bold ph-chart-line text-red-500"></i>
                            <i class="ph-bold ph-chart-line text-red-500"></i>
                            <i class="ph-bold ph-chart-line text-red-500"></i>
                            <i class="ph-bold ph-chart-line text-red-500"></i>
                            <i class="ph-bold ph-chart-line text-red-500"></i>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">Best For</h4>
                            <p class="text-gray-600 text-sm">Expert mountaineers only</p>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">Fitness Level</h4>
                            <p class="text-gray-600 text-sm">Exceptional fitness and experience</p>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">Recommended Routes</h4>
                            <p class="text-gray-600 text-sm">Umbwe only</p>
                        </div>
                    </div>
                </div>

                <!-- Success Factors -->
                <div class="bg-gradient-to-br from-emerald-50 to-blue-50 rounded-2xl p-8 border border-emerald-200">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 bg-gradient-to-br from-emerald-400 to-blue-500 rounded-full flex items-center justify-center text-white mx-auto mb-4">
                            <i class="ph-bold ph-trophy text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Success Factors</h3>
                        <div class="flex justify-center mb-4">
                            <i class="ph-bold ph-star-fill text-yellow-400"></i>
                            <i class="ph-bold ph-star-fill text-yellow-400"></i>
                            <i class="ph-bold ph-star-fill text-yellow-400"></i>
                            <i class="ph-bold ph-star-fill text-yellow-400"></i>
                            <i class="ph-bold ph-star-fill text-yellow-400"></i>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">Key Elements</h4>
                            <p class="text-gray-600 text-sm">Acclimatization, fitness, mental preparation</p>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">Training Tips</h4>
                            <p class="text-gray-600 text-sm">Cardio, strength, altitude training</p>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">Best Time</h4>
                            <p class="text-gray-600 text-sm">Jan-Mar, Jun-Oct for optimal conditions</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-emerald-800 to-orange-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Ready to Choose Your Route?
            </h2>
            <p class="text-xl text-white/90 mb-8 max-w-3xl mx-auto">
                Our expert team will help you select the perfect route based on your experience, 
                fitness level, and adventure goals. Start your Kilimanjaro journey today!
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('mountain-trekking') }}" 
                   class="px-8 py-4 bg-white text-emerald-800 rounded-xl font-bold text-lg hover:bg-gray-100 transition-all transform hover:scale-105 shadow-2xl">
                    <i class="ph-bold ph-mountains mr-2"></i>View All Treks
                </a>
                <a href="{{ route('inquiries.create') }}?tour_id=2" 
                   class="px-8 py-4 bg-white/20 backdrop-blur-sm text-white rounded-xl font-bold text-lg hover:bg-white/30 transition-all border border-white/30">
                    <i class="ph-bold ph-chat-dots mr-2"></i>Get Expert Advice
                </a>
            </div>
        </div>
    </section>
</div>

<script>
// Smooth scroll for navigation
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Interactive route cards
document.querySelectorAll('button').forEach(button => {
    if (button.textContent.includes('View Details')) {
        button.addEventListener('click', function() {
            // In a real implementation, this would open a modal or navigate to route details
            console.log('View route details');
        });
    }
});

// Table hover effects
document.querySelectorAll('tbody tr').forEach(row => {
    row.addEventListener('mouseenter', function() {
        this.style.transform = 'scale(1.02)';
        this.style.transition = 'all 0.3s ease';
    });
    
    row.addEventListener('mouseleave', function() {
        this.style.transform = 'scale(1)';
    });
});
</script>
@endsection
