@extends('layouts.public')

@section('title', 'Trekking Information - Mountain Climbing Guide')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-emerald-50">
    <!-- Enhanced Hero Section -->
    <div class="relative bg-gradient-to-r from-emerald-600 to-blue-600 text-white">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative container mx-auto px-4 pt-24 pb-16">
            <div class="text-center max-w-4xl mx-auto">
                <!-- Premium Badge -->
                <div class="flex items-center justify-center gap-3 mb-6 flex-wrap">
                    <span class="px-4 py-2 bg-gradient-to-r from-emerald-500 to-blue-600 text-white rounded-full text-sm font-bold shadow-lg">
                        <i class="ph-bold ph-mountains mr-2"></i>TREKKING INFO
                    </span>
                    <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-sm font-medium">
                        Expert Mountain Guide
                    </span>
                </div>
                
                <!-- Enhanced Title -->
                <h1 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-white to-emerald-200 bg-clip-text text-transparent">
                        Trekking Information
                    </span>
                </h1>
                
                <!-- Enhanced Description -->
                <p class="text-xl text-white/90 mb-8 max-w-3xl mx-auto leading-relaxed">
                    Your comprehensive guide to mountain trekking in Tanzania. From route planning to equipment recommendations, 
                    everything you need for a successful climbing adventure.
                </p>
                
                            </div>
        </div>
    </div>

    <!-- Navigation Section -->
    <section class="py-16 bg-white sticky top-0 z-40 shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-center">
                <nav class="flex flex-wrap justify-center gap-4">
                    <a href="#routes" class="px-6 py-3 bg-emerald-600 text-white rounded-lg font-semibold hover:bg-emerald-700 transition-colors">
                        <i class="ph-bold ph-map-trifold mr-2"></i>Trekking Routes
                    </a>
                    <a href="#equipment" class="px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                        <i class="ph-bold ph-backpack mr-2"></i>Equipment Guide
                    </a>
                    <a href="#guides" class="px-6 py-3 bg-purple-600 text-white rounded-lg font-semibold hover:bg-purple-700 transition-colors">
                        <i class="ph-bold ph-user-check mr-2"></i>Expert Guides
                    </a>
                </nav>
            </div>
        </div>
    </section>

    <!-- Trekking Routes Section -->
    <section id="routes" class="py-20 bg-gradient-to-br from-gray-50 to-emerald-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Trekking Routes
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Choose from our selection of carefully curated mountain trekking routes, each offering unique challenges and breathtaking views.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Machame Route -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-shadow">
                    <div class="h-48 bg-gradient-to-br from-emerald-400 to-blue-500 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="ph-bold ph-mountains text-white text-6xl"></i>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1">
                            <span class="text-sm font-bold text-emerald-700">Most Popular</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Machame Route</h3>
                        <div class="space-y-3 mb-4">
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-clock mr-2 text-emerald-600"></i>
                                <span>6-7 Days</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-chart-line mr-2 text-emerald-600"></i>
                                <span>Difficulty: High</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-users mr-2 text-emerald-600"></i>
                                <span>Max Altitude: 4,643m</span>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">
                            The "Whiskey Route" offers stunning scenery and excellent acclimatization opportunities. 
                            Perfect for experienced trekkers seeking a challenging climb.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-emerald-600 font-bold">Success Rate: 85%</span>
                            <button class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Marangu Route -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-shadow">
                    <div class="h-48 bg-gradient-to-br from-blue-400 to-purple-500 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="ph-bold ph-tent text-white text-6xl"></i>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1">
                            <span class="text-sm font-bold text-blue-700">Classic Route</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Marangu Route</h3>
                        <div class="space-y-3 mb-4">
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-clock mr-2 text-blue-600"></i>
                                <span>5-6 Days</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-chart-line mr-2 text-blue-600"></i>
                                <span>Difficulty: Moderate</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-users mr-2 text-blue-600"></i>
                                <span>Max Altitude: 5,895m</span>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">
                            The "Coca-Cola Route" is the oldest and most established path with hut accommodations. 
                            Ideal for beginners seeking comfort during their climb.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-blue-600 font-bold">Success Rate: 75%</span>
                            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Lemosho Route -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-shadow">
                    <div class="h-48 bg-gradient-to-br from-purple-400 to-pink-500 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="ph-bold ph-compass text-white text-6xl"></i>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1">
                            <span class="text-sm font-bold text-purple-700">Scenic Route</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Lemosho Route</h3>
                        <div class="space-y-3 mb-4">
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-clock mr-2 text-purple-600"></i>
                                <span>7-8 Days</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-chart-line mr-2 text-purple-600"></i>
                                <span>Difficulty: High</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-users mr-2 text-purple-600"></i>
                                <span>Max Altitude: 5,895m</span>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">
                            The most scenic route with excellent acclimatization and diverse ecosystems. 
                            Perfect for photographers and nature enthusiasts.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-purple-600 font-bold">Success Rate: 90%</span>
                            <button class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Rongai Route -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-shadow">
                    <div class="h-48 bg-gradient-to-br from-orange-400 to-red-500 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="ph-bold ph-sun text-white text-6xl"></i>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1">
                            <span class="text-sm font-bold text-orange-700">Dry Route</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Rongai Route</h3>
                        <div class="space-y-3 mb-4">
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-clock mr-2 text-orange-600"></i>
                                <span>6-7 Days</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-chart-line mr-2 text-orange-600"></i>
                                <span>Difficulty: Moderate</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-users mr-2 text-orange-600"></i>
                                <span>Max Altitude: 5,895m</span>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">
                            The only route approaching from the north, offering drier conditions and unique perspectives. 
                            Less crowded with excellent wildlife viewing opportunities.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-orange-600 font-bold">Success Rate: 80%</span>
                            <button class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Umbwe Route -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-shadow">
                    <div class="h-48 bg-gradient-to-br from-red-400 to-gray-600 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="ph-bold ph-warning text-white text-6xl"></i>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1">
                            <span class="text-sm font-bold text-red-700">Expert Only</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Umbwe Route</h3>
                        <div class="space-y-3 mb-4">
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-clock mr-2 text-red-600"></i>
                                <span>6-7 Days</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-chart-line mr-2 text-red-600"></i>
                                <span>Difficulty: Extreme</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-users mr-2 text-red-600"></i>
                                <span>Max Altitude: 5,895m</span>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">
                            The most challenging route with steep ascents and technical sections. 
                            Recommended only for experienced mountaineers with excellent fitness.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-red-600 font-bold">Success Rate: 65%</span>
                            <button class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Northern Circuit -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-shadow">
                    <div class="h-48 bg-gradient-to-br from-teal-400 to-cyan-500 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="ph-bold ph-path text-white text-6xl"></i>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1">
                            <span class="text-sm font-bold text-teal-700">Longest Route</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Northern Circuit</h3>
                        <div class="space-y-3 mb-4">
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-clock mr-2 text-teal-600"></i>
                                <span>9-10 Days</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-chart-line mr-2 text-teal-600"></i>
                                <span>Difficulty: High</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-users mr-2 text-teal-600"></i>
                                <span>Max Altitude: 5,895m</span>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">
                            The newest and longest route offering complete circumnavigation of the mountain. 
                            Excellent acclimatization with the highest success rates.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-teal-600 font-bold">Success Rate: 95%</span>
                            <button class="px-4 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition-colors">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Equipment Guide Section -->
    <section id="equipment" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Equipment Guide
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Essential gear and equipment recommendations for a safe and successful mountain trekking experience.
                </p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Essential Equipment -->
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <div class="w-12 h-12 bg-emerald-600 rounded-lg flex items-center justify-center text-white mr-4">
                            <i class="ph-bold ph-backpack text-xl"></i>
                        </div>
                        Essential Equipment
                    </h3>
                    <div class="space-y-4">
                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                            <h4 class="font-bold text-gray-900 mb-3">Clothing</h4>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-center">
                                    <i class="ph-bold ph-check-circle text-emerald-600 mr-2"></i>
                                    Waterproof hiking boots (broken in)
                                </li>
                                <li class="flex items-center">
                                    <i class="ph-bold ph-check-circle text-emerald-600 mr-2"></i>
                                    Thermal underwear (top & bottom)
                                </li>
                                <li class="flex items-center">
                                    <i class="ph-bold ph-check-circle text-emerald-600 mr-2"></i>
                                    Fleece jacket and warm parka
                                </li>
                                <li class="flex items-center">
                                    <i class="ph-bold ph-check-circle text-emerald-600 mr-2"></i>
                                    Waterproof rain gear (jacket & pants)
                                </li>
                                <li class="flex items-center">
                                    <i class="ph-bold ph-check-circle text-emerald-600 mr-2"></i>
                                    Hiking pants and shorts
                                </li>
                            </ul>
                        </div>
                        
                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                            <h4 class="font-bold text-gray-900 mb-3">Gear & Equipment</h4>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-center">
                                    <i class="ph-bold ph-check-circle text-emerald-600 mr-2"></i>
                                    40-50L backpack with rain cover
                                </li>
                                <li class="flex items-center">
                                    <i class="ph-bold ph-check-circle text-emerald-600 mr-2"></i>
                                    Sleeping bag (-10°C rating)
                                </li>
                                <li class="flex items-center">
                                    <i class="ph-bold ph-check-circle text-emerald-600 mr-2"></i>
                                    Trekking poles (recommended)
                                </li>
                                <li class="flex items-center">
                                    <i class="ph-bold ph-check-circle text-emerald-600 mr-2"></i>
                                    Headlamp with extra batteries
                                </li>
                                <li class="flex items-center">
                                    <i class="ph-bold ph-check-circle text-emerald-600 mr-2"></i>
                                    Water bottles or hydration system (3L)
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Optional Equipment -->
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center text-white mr-4">
                            <i class="ph-bold ph-star text-xl"></i>
                        </div>
                        Optional Equipment
                    </h3>
                    <div class="space-y-4">
                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                            <h4 class="font-bold text-gray-900 mb-3">Comfort & Convenience</h4>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-center">
                                    <i class="ph-bold ph-check-circle text-blue-600 mr-2"></i>
                                    Portable camping chair
                                </li>
                                <li class="flex items-center">
                                    <i class="ph-bold ph-check-circle text-blue-600 mr-2"></i>
                                    Solar charger/power bank
                                </li>
                                <li class="flex items-center">
                                    <i class="ph-bold ph-check-circle text-blue-600 mr-2"></i>
                                    Camera with extra batteries
                                </li>
                                <li class="flex items-center">
                                    <i class="ph-bold ph-check-circle text-blue-600 mr-2"></i>
                                    Book or e-reader
                                </li>
                                <li class="flex items-center">
                                    <i class="ph-bold ph-check-circle text-blue-600 mr-2"></i>
                                    Snacks and energy bars
                                </li>
                            </ul>
                        </div>
                        
                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                            <h4 class="font-bold text-gray-900 mb-3">Health & Safety</h4>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-center">
                                    <i class="ph-bold ph-check-circle text-blue-600 mr-2"></i>
                                    Personal first aid kit
                                </li>
                                <li class="flex items-center">
                                    <i class="ph-bold ph-check-circle text-blue-600 mr-2"></i>
                                    Altitude medication (consult doctor)
                                </li>
                                <li class="flex items-center">
                                    <i class="ph-bold ph-check-circle text-blue-600 mr-2"></i>
                                    Water purification tablets
                                </li>
                                <li class="flex items-center">
                                    <i class="ph-bold ph-check-circle text-blue-600 mr-2"></i>
                                    Sunscreen and lip balm (SPF 30+)
                                </li>
                                <li class="flex items-center">
                                    <i class="ph-bold ph-check-circle text-blue-600 mr-2"></i>
                                    Insect repellent
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Equipment Tips -->
            <div class="mt-12 bg-gradient-to-r from-emerald-50 to-blue-50 rounded-2xl p-8 border border-emerald-200">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Equipment Tips & Recommendations</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-emerald-600 rounded-full flex items-center justify-center text-white mx-auto mb-4">
                            <i class="ph-bold ph-scales text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">Pack Light</h4>
                        <p class="text-gray-600 text-sm">Keep your backpack under 15kg for optimal comfort and mobility during the trek.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center text-white mx-auto mb-4">
                            <i class="ph-bold ph-test-tube text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">Test Your Gear</h4>
                        <p class="text-gray-600 text-sm">Test all equipment before your trek, especially boots and sleeping bag.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center text-white mx-auto mb-4">
                            <i class="ph-bold ph-cloud-rain text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">Weather Ready</h4>
                        <p class="text-gray-600 text-sm">Be prepared for all weather conditions - from tropical heat to arctic cold.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Expert Guides Section -->
    <section id="guides" class="py-20 bg-gradient-to-br from-gray-50 to-emerald-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Expert Guides
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Meet our certified mountain guides with years of experience and extensive knowledge of Kilimanjaro's trails.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Guide 1 -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-shadow">
                    <div class="h-64 bg-gradient-to-br from-emerald-400 to-blue-500 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center text-white">
                                <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-full mx-auto mb-4 flex items-center justify-center">
                                    <i class="ph-bold ph-user text-4xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold">Joseph Mwangi</h3>
                                <p class="text-white/90">Lead Guide</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400 mr-2">
                                <i class="ph-bold ph-star-fill"></i>
                                <i class="ph-bold ph-star-fill"></i>
                                <i class="ph-bold ph-star-fill"></i>
                                <i class="ph-bold ph-star-fill"></i>
                                <i class="ph-bold ph-star-fill"></i>
                            </div>
                            <span class="text-gray-600 text-sm">5.0 (127 reviews)</span>
                        </div>
                        <div class="space-y-3 mb-4">
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-briefcase mr-2 text-emerald-600"></i>
                                <span>12+ Years Experience</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-trophy mr-2 text-emerald-600"></i>
                                <span>500+ Summits</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-certificate mr-2 text-emerald-600"></i>
                                <span>Wilderness First Aid</span>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">
                            Joseph is our most experienced guide with exceptional knowledge of all routes and weather patterns. 
                            His calm demeanor and expertise ensure safe, successful climbs.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-emerald-100 text-emerald-700 rounded text-xs font-medium">English</span>
                            <span class="px-2 py-1 bg-emerald-100 text-emerald-700 rounded text-xs font-medium">Swahili</span>
                            <span class="px-2 py-1 bg-emerald-100 text-emerald-700 rounded text-xs font-medium">German</span>
                        </div>
                        <button class="w-full px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                            View Profile
                        </button>
                    </div>
                </div>

                <!-- Guide 2 -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-shadow">
                    <div class="h-64 bg-gradient-to-br from-blue-400 to-purple-500 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center text-white">
                                <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-full mx-auto mb-4 flex items-center justify-center">
                                    <i class="ph-bold ph-user text-4xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold">Sarah Kimani</h3>
                                <p class="text-white/90">Senior Guide</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400 mr-2">
                                <i class="ph-bold ph-star-fill"></i>
                                <i class="ph-bold ph-star-fill"></i>
                                <i class="ph-bold ph-star-fill"></i>
                                <i class="ph-bold ph-star-fill"></i>
                                <i class="ph-bold ph-star-fill"></i>
                            </div>
                            <span class="text-gray-600 text-sm">4.9 (89 reviews)</span>
                        </div>
                        <div class="space-y-3 mb-4">
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-briefcase mr-2 text-blue-600"></i>
                                <span>8+ Years Experience</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-trophy mr-2 text-blue-600"></i>
                                <span>300+ Summits</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-certificate mr-2 text-blue-600"></i>
                                <span>Altitude Medicine</span>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">
                            Sarah specializes in high-altitude physiology and acclimatization techniques. 
                            Her attention to detail and client care make her ideal for first-time climbers.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded text-xs font-medium">English</span>
                            <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded text-xs font-medium">Swahili</span>
                            <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded text-xs font-medium">French</span>
                        </div>
                        <button class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            View Profile
                        </button>
                    </div>
                </div>

                <!-- Guide 3 -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-shadow">
                    <div class="h-64 bg-gradient-to-br from-purple-400 to-pink-500 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center text-white">
                                <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-full mx-auto mb-4 flex items-center justify-center">
                                    <i class="ph-bold ph-user text-4xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold">Michael Moshi</h3>
                                <p class="text-white/90">Wildlife Expert</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400 mr-2">
                                <i class="ph-bold ph-star-fill"></i>
                                <i class="ph-bold ph-star-fill"></i>
                                <i class="ph-bold ph-star-fill"></i>
                                <i class="ph-bold ph-star-fill"></i>
                                <i class="ph-bold ph-star-fill"></i>
                            </div>
                            <span class="text-gray-600 text-sm">4.8 (156 reviews)</span>
                        </div>
                        <div class="space-y-3 mb-4">
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-briefcase mr-2 text-purple-600"></i>
                                <span>10+ Years Experience</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-trophy mr-2 text-purple-600"></i>
                                <span>400+ Summits</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-certificate mr-2 text-purple-600"></i>
                                <span>Wildlife Guide</span>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">
                            Michael combines mountain expertise with extensive wildlife knowledge. 
                            Perfect for climbers interested in the flora and fauna of Kilimanjaro.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-purple-100 text-purple-700 rounded text-xs font-medium">English</span>
                            <span class="px-2 py-1 bg-purple-100 text-purple-700 rounded text-xs font-medium">Swahili</span>
                            <span class="px-2 py-1 bg-purple-100 text-purple-700 rounded text-xs font-medium">Spanish</span>
                        </div>
                        <button class="w-full px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors">
                            View Profile
                        </button>
                    </div>
                </div>

                <!-- Guide 4 -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-shadow">
                    <div class="h-64 bg-gradient-to-br from-orange-400 to-red-500 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center text-white">
                                <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-full mx-auto mb-4 flex items-center justify-center">
                                    <i class="ph-bold ph-user text-4xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold">Grace Nyerere</h3>
                                <p class="text-white/90">Safety Specialist</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400 mr-2">
                                <i class="ph-bold ph-star-fill"></i>
                                <i class="ph-bold ph-star-fill"></i>
                                <i class="ph-bold ph-star-fill"></i>
                                <i class="ph-bold ph-star-fill"></i>
                                <i class="ph-bold ph-star-fill"></i>
                            </div>
                            <span class="text-gray-600 text-sm">5.0 (98 reviews)</span>
                        </div>
                        <div class="space-y-3 mb-4">
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-briefcase mr-2 text-orange-600"></i>
                                <span>7+ Years Experience</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-trophy mr-2 text-orange-600"></i>
                                <span>250+ Summits</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-certificate mr-2 text-orange-600"></i>
                                <span>Rescue Certified</span>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">
                            Grace is our safety specialist with advanced medical training and rescue certification. 
                            Her expertise ensures the highest safety standards on all climbs.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-orange-100 text-orange-700 rounded text-xs font-medium">English</span>
                            <span class="px-2 py-1 bg-orange-100 text-orange-700 rounded text-xs font-medium">Swahili</span>
                            <span class="px-2 py-1 bg-orange-100 text-orange-700 rounded text-xs font-medium">Italian</span>
                        </div>
                        <button class="w-full px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors">
                            View Profile
                        </button>
                    </div>
                </div>

                <!-- Guide 5 -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-shadow">
                    <div class="h-64 bg-gradient-to-br from-teal-400 to-cyan-500 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center text-white">
                                <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-full mx-auto mb-4 flex items-center justify-center">
                                    <i class="ph-bold ph-user text-4xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold">David Kikwete</h3>
                                <p class="text-white/90">Photography Guide</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400 mr-2">
                                <i class="ph-bold ph-star-fill"></i>
                                <i class="ph-bold ph-star-fill"></i>
                                <i class="ph-bold ph-star-fill"></i>
                                <i class="ph-bold ph-star-fill"></i>
                                <i class="ph-bold ph-star-fill"></i>
                            </div>
                            <span class="text-gray-600 text-sm">4.9 (112 reviews)</span>
                        </div>
                        <div class="space-y-3 mb-4">
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-briefcase mr-2 text-teal-600"></i>
                                <span>6+ Years Experience</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-trophy mr-2 text-teal-600"></i>
                                <span>200+ Summits</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-certificate mr-2 text-teal-600"></i>
                                <span>Photography Expert</span>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">
                            David specializes in mountain photography and knows the best spots for sunrise, 
                            sunset, and wildlife shots throughout the climb.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-teal-100 text-teal-700 rounded text-xs font-medium">English</span>
                            <span class="px-2 py-1 bg-teal-100 text-teal-700 rounded text-xs font-medium">Swahili</span>
                            <span class="px-2 py-1 bg-teal-100 text-teal-700 rounded text-xs font-medium">Japanese</span>
                        </div>
                        <button class="w-full px-4 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition-colors">
                            View Profile
                        </button>
                    </div>
                </div>

                <!-- Guide 6 -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-shadow">
                    <div class="h-64 bg-gradient-to-br from-gray-400 to-slate-600 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center text-white">
                                <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-full mx-auto mb-4 flex items-center justify-center">
                                    <i class="ph-bold ph-user text-4xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold">Anna Mwanga</h3>
                                <p class="text-white/90">Cultural Expert</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400 mr-2">
                                <i class="ph-bold ph-star-fill"></i>
                                <i class="ph-bold ph-star-fill"></i>
                                <i class="ph-bold ph-star-fill"></i>
                                <i class="ph-bold ph-star-fill"></i>
                                <i class="ph-bold ph-star-fill"></i>
                            </div>
                            <span class="text-gray-600 text-sm">4.7 (78 reviews)</span>
                        </div>
                        <div class="space-y-3 mb-4">
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-briefcase mr-2 text-gray-600"></i>
                                <span>5+ Years Experience</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-trophy mr-2 text-gray-600"></i>
                                <span>150+ Summits</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-certificate mr-2 text-gray-600"></i>
                                <span>Cultural Guide</span>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">
                            Anna shares rich cultural insights and local traditions throughout the journey. 
                            Perfect for climbers interested in learning about local Chagga culture.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-gray-100 text-gray-700 rounded text-xs font-medium">English</span>
                            <span class="px-2 py-1 bg-gray-100 text-gray-700 rounded text-xs font-medium">Swahili</span>
                            <span class="px-2 py-1 bg-gray-100 text-gray-700 rounded text-xs font-medium">Dutch</span>
                        </div>
                        <button class="w-full px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                            View Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-emerald-600 to-blue-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Ready for Your Mountain Adventure?
            </h2>
            <p class="text-xl text-white/90 mb-8 max-w-3xl mx-auto">
                Join our expert guides and conquer Africa's highest peak. With our comprehensive support 
                and experienced team, your dream summit awaits.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('mountain-trekking') }}" 
                   class="px-8 py-4 bg-white text-emerald-600 rounded-xl font-bold text-lg hover:bg-gray-100 transition-all transform hover:scale-105 shadow-2xl">
                    <i class="ph-bold ph-mountains mr-2"></i>View Mountain Treks
                </a>
                <a href="{{ route('inquiries.create') }}?tour_id=2" 
                   class="px-8 py-4 bg-white/20 backdrop-blur-sm text-white rounded-xl font-bold text-lg hover:bg-white/30 transition-all border border-white/30">
                    <i class="ph-bold ph-chat-dots mr-2"></i>Plan Custom Trek
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

// Highlight active section on scroll
window.addEventListener('scroll', function() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('nav a[href^="#"]');
    
    let current = '';
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        if (pageYOffset >= (sectionTop - 200)) {
            current = section.getAttribute('id');
        }
    });

    navLinks.forEach(link => {
        link.classList.remove('bg-emerald-700', 'bg-blue-700', 'bg-purple-700');
        if (link.getAttribute('href') === '#' + current) {
            link.classList.add('bg-opacity-80');
        }
    });
});
</script>
@endsection
