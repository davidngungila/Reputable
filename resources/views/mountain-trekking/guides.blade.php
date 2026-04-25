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
                
                <!-- Enhanced Description -->
                <p class="text-xl text-white/90 mb-8 max-w-3xl mx-auto leading-relaxed">
                    Meet our certified mountain guides with years of experience and extensive knowledge of Kilimanjaro's trails. 
                    Your safety and success are our top priorities.
                </p>
            </div>
        </div>
    </div>

    <!-- Lead Guides Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Lead Guides
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Our most experienced guides with exceptional track records and specialized expertise.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Guide 1 -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all transform hover:scale-105">
                    <div class="h-64 bg-gradient-to-br from-emerald-700 to-orange-500 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center text-white">
                                <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-full mx-auto mb-4 flex items-center justify-center">
                                    <i class="ph-bold ph-user text-4xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold">Joseph Mwangi</h3>
                                <p class="text-white/90">Lead Guide</p>
                            </div>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1">
                            <span class="text-sm font-bold text-emerald-800">Top Rated</span>
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
                        <button class="w-full px-4 py-3 bg-gradient-to-r from-emerald-800 to-orange-600 text-white rounded-lg font-semibold hover:from-emerald-900 hover:to-orange-700 transition-all">
                            <i class="ph-bold ph-info mr-2"></i>View Full Profile
                        </button>
                    </div>
                </div>

                <!-- Guide 2 -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all transform hover:scale-105">
                    <div class="h-64 bg-gradient-to-br from-orange-600 to-red-500 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center text-white">
                                <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-full mx-auto mb-4 flex items-center justify-center">
                                    <i class="ph-bold ph-user text-4xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold">Sarah Kimani</h3>
                                <p class="text-white/90">Senior Guide</p>
                            </div>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1">
                            <span class="text-sm font-bold text-orange-800">Altitude Expert</span>
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
                                <i class="ph-bold ph-briefcase mr-2 text-orange-600"></i>
                                <span>8+ Years Experience</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-trophy mr-2 text-orange-600"></i>
                                <span>300+ Summits</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-certificate mr-2 text-orange-600"></i>
                                <span>Altitude Medicine</span>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">
                            Sarah specializes in high-altitude physiology and acclimatization techniques. 
                            Her attention to detail and client care make her ideal for first-time climbers.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-orange-100 text-orange-700 rounded text-xs font-medium">English</span>
                            <span class="px-2 py-1 bg-orange-100 text-orange-700 rounded text-xs font-medium">Swahili</span>
                            <span class="px-2 py-1 bg-orange-100 text-orange-700 rounded text-xs font-medium">French</span>
                        </div>
                        <button class="w-full px-4 py-3 bg-gradient-to-r from-orange-600 to-red-600 text-white rounded-lg font-semibold hover:from-orange-700 hover:to-red-700 transition-all">
                            <i class="ph-bold ph-info mr-2"></i>View Full Profile
                        </button>
                    </div>
                </div>

                <!-- Guide 3 -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all transform hover:scale-105">
                    <div class="h-64 bg-gradient-to-br from-emerald-600 to-orange-400 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center text-white">
                                <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-full mx-auto mb-4 flex items-center justify-center">
                                    <i class="ph-bold ph-user text-4xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold">Michael Moshi</h3>
                                <p class="text-white/90">Wildlife Expert</p>
                            </div>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1">
                            <span class="text-sm font-bold text-emerald-800">Naturalist</span>
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
                                <i class="ph-bold ph-briefcase mr-2 text-emerald-600"></i>
                                <span>10+ Years Experience</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-trophy mr-2 text-emerald-600"></i>
                                <span>400+ Summits</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-certificate mr-2 text-emerald-600"></i>
                                <span>Wildlife Guide</span>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">
                            Michael combines mountain expertise with extensive wildlife knowledge. 
                            Perfect for climbers interested in the flora and fauna of Kilimanjaro.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-emerald-100 text-emerald-700 rounded text-xs font-medium">English</span>
                            <span class="px-2 py-1 bg-emerald-100 text-emerald-700 rounded text-xs font-medium">Swahili</span>
                            <span class="px-2 py-1 bg-emerald-100 text-emerald-700 rounded text-xs font-medium">Spanish</span>
                        </div>
                        <button class="w-full px-4 py-3 bg-gradient-to-r from-emerald-800 to-orange-600 text-white rounded-lg font-semibold hover:from-emerald-900 hover:to-orange-700 transition-all">
                            <i class="ph-bold ph-info mr-2"></i>View Full Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Assistant Guides Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-emerald-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Assistant Guides
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Our supporting team of qualified guides ensuring personalized attention and group safety.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Guide 4 -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all transform hover:scale-105">
                    <div class="h-64 bg-gradient-to-br from-orange-500 to-yellow-500 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center text-white">
                                <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-full mx-auto mb-4 flex items-center justify-center">
                                    <i class="ph-bold ph-user text-4xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold">Grace Nyerere</h3>
                                <p class="text-white/90">Safety Specialist</p>
                            </div>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1">
                            <span class="text-sm font-bold text-orange-800">Safety Expert</span>
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
                        <button class="w-full px-4 py-3 bg-gradient-to-r from-orange-600 to-yellow-600 text-white rounded-lg font-semibold hover:from-orange-700 hover:to-yellow-700 transition-all">
                            <i class="ph-bold ph-info mr-2"></i>View Full Profile
                        </button>
                    </div>
                </div>

                <!-- Guide 5 -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all transform hover:scale-105">
                    <div class="h-64 bg-gradient-to-br from-emerald-700 to-orange-500 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center text-white">
                                <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-full mx-auto mb-4 flex items-center justify-center">
                                    <i class="ph-bold ph-user text-4xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold">David Kikwete</h3>
                                <p class="text-white/90">Photography Guide</p>
                            </div>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1">
                            <span class="text-sm font-bold text-emerald-800">Photographer</span>
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
                                <i class="ph-bold ph-briefcase mr-2 text-emerald-600"></i>
                                <span>6+ Years Experience</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-trophy mr-2 text-emerald-600"></i>
                                <span>200+ Summits</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-certificate mr-2 text-emerald-600"></i>
                                <span>Photography Expert</span>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">
                            David specializes in mountain photography and knows the best spots for sunrise, 
                            sunset, and wildlife shots throughout the climb.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-emerald-100 text-emerald-700 rounded text-xs font-medium">English</span>
                            <span class="px-2 py-1 bg-emerald-100 text-emerald-700 rounded text-xs font-medium">Swahili</span>
                            <span class="px-2 py-1 bg-emerald-100 text-emerald-700 rounded text-xs font-medium">Japanese</span>
                        </div>
                        <button class="w-full px-4 py-3 bg-gradient-to-r from-emerald-800 to-orange-600 text-white rounded-lg font-semibold hover:from-emerald-900 hover:to-orange-700 transition-all">
                            <i class="ph-bold ph-info mr-2"></i>View Full Profile
                        </button>
                    </div>
                </div>

                <!-- Guide 6 -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all transform hover:scale-105">
                    <div class="h-64 bg-gradient-to-br from-gray-600 to-emerald-600 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center text-white">
                                <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-full mx-auto mb-4 flex items-center justify-center">
                                    <i class="ph-bold ph-user text-4xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold">Anna Mwanga</h3>
                                <p class="text-white/90">Cultural Expert</p>
                            </div>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1">
                            <span class="text-sm font-bold text-gray-800">Cultural Guide</span>
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
                        <button class="w-full px-4 py-3 bg-gradient-to-r from-gray-600 to-emerald-600 text-white rounded-lg font-semibold hover:from-gray-700 hover:to-emerald-700 transition-all">
                            <i class="ph-bold ph-info mr-2"></i>View Full Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Guide Qualifications Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Guide Qualifications
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    All our guides are certified professionals with extensive training and experience.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Certification -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-emerald-700 to-orange-500 rounded-full flex items-center justify-center text-white mx-auto mb-6">
                        <i class="ph-bold ph-certificate text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Certified</h3>
                    <p class="text-gray-600">
                        Kilimanjaro National Park certified guides with wilderness first aid training
                    </p>
                </div>
                
                <!-- Experience -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-orange-600 to-red-500 rounded-full flex items-center justify-center text-white mx-auto mb-6">
                        <i class="ph-bold ph-briefcase text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Experienced</h3>
                    <p class="text-gray-600">
                        Minimum 5 years experience with 100+ successful summits each
                    </p>
                </div>
                
                <!-- Safety -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-emerald-600 to-orange-400 rounded-full flex items-center justify-center text-white mx-auto mb-6">
                        <i class="ph-bold ph-heart text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Safety Focused</h3>
                    <p class="text-gray-600">
                        Advanced medical training and emergency response certification
                    </p>
                </div>
                
                <!-- Local Knowledge -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-gray-600 to-emerald-600 rounded-full flex items-center justify-center text-white mx-auto mb-6">
                        <i class="ph-bold ph-map-trifold text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Local Experts</h3>
                    <p class="text-gray-600">
                        Deep knowledge of mountain ecology, weather patterns, and local culture
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Guide Team Benefits Section -->
    <section class="py-20 bg-gradient-to-br from-emerald-800 to-orange-600 text-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    Why Choose Our Guide Team?
                </h2>
                <p class="text-xl text-white/90 max-w-3xl mx-auto">
                    Our expert team ensures your safety, comfort, and success on Kilimanjaro.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center text-white mx-auto mb-6">
                        <i class="ph-bold ph-shield-check text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">100% Safety Record</h3>
                    <p class="text-white/80 leading-relaxed">
                        Perfect safety record with comprehensive emergency protocols and medical support
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center text-white mx-auto mb-6">
                        <i class="ph-bold ph-users-three text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Personal Attention</h3>
                    <p class="text-white/80 leading-relaxed">
                        Small group ratios ensure personalized care and attention for every climber
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center text-white mx-auto mb-6">
                        <i class="ph-bold ph-trophy text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">95% Success Rate</h3>
                    <p class="text-white/80 leading-relaxed">
                        Industry-leading summit success rate through proper acclimatization and expertise
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Meet Your Dream Team
            </h2>
            <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                Our expert guides are ready to lead you to the summit. Book your climb today 
                and experience the difference professional guidance makes.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('mountain-trekking') }}" 
                   class="px-8 py-4 bg-gradient-to-r from-emerald-800 to-orange-600 text-white rounded-xl font-bold text-lg hover:from-emerald-900 hover:to-orange-700 transition-all transform hover:scale-105 shadow-2xl">
                    <i class="ph-bold ph-mountains mr-2"></i>View All Treks
                </a>
                <a href="{{ route('inquiries.create') }}?tour_id=2" 
                   class="px-8 py-4 bg-orange-600 text-white rounded-xl font-bold text-lg hover:bg-orange-700 transition-all transform hover:scale-105 shadow-2xl">
                    <i class="ph-bold ph-chat-dots mr-2"></i>Meet Your Guide
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
