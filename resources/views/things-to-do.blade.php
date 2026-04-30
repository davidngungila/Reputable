@extends('layouts.public')

@section('title', 'Things to Do in Tanzania - Activities & Adventures')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-emerald-100">
    <!-- Enhanced Hero Section -->
    <div class="relative bg-gradient-to-r from-emerald-800 to-orange-600 text-white">
        <div class="absolute inset-0 bg-black/20"></div>
        <!-- Animated Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-10 w-32 h-32 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-48 h-48 bg-white/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
            <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-white/10 rounded-full blur-2xl animate-pulse delay-500"></div>
        </div>
        <div class="relative container mx-auto px-4 pt-24 pb-16">
            <div class="text-center max-w-4xl mx-auto">
                <!-- Premium Badge -->
                <div class="flex items-center justify-center gap-3 mb-6 flex-wrap">
                    <span class="px-4 py-2 bg-gradient-to-r from-emerald-800 to-orange-600 text-white rounded-full text-sm font-bold shadow-lg">
                        <i class="ph-bold ph-compass mr-2"></i>TANZANIA ADVENTURES
                    </span>
                    <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-sm font-medium">
                        Unlimited Experiences
                    </span>
                </div>
                
                <!-- Enhanced Title -->
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-white to-emerald-300 bg-clip-text text-transparent">
                        Things to Do in Tanzania
                    </span>
                </h1>
                
                <!-- Enhanced Description -->
                <p class="text-xl text-white/90 mb-8 max-w-3xl mx-auto leading-relaxed">
                    Discover endless adventures, from wildlife safaris and mountain trekking to beach relaxation 
                    and cultural experiences. Your Tanzanian dream awaits.
                </p>
                
                <!-- Enhanced CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#activities" class="px-8 py-4 bg-gradient-to-r from-emerald-800 to-orange-600 text-white rounded-xl font-bold text-lg hover:from-emerald-900 hover:to-orange-700 transition-all transform hover:scale-105 shadow-2xl">
                        <i class="ph-bold ph-compass mr-2"></i>Explore Activities
                    </a>
                    <a href="{{ route('tours.index') }}" class="px-8 py-4 bg-white/20 backdrop-blur-sm text-white rounded-xl font-bold text-lg hover:bg-white/30 transition-all border border-white/30">
                        <i class="ph-bold ph-suitcase-rolling mr-2"></i>Browse Tours
                    </a>
                </div>
            </div>
        </div>
    </div>

<!-- Activities Overview Section -->
<section id="activities" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-emerald-800 to-orange-600 text-white rounded-full text-sm font-bold mb-6">
                <i class="ph-bold ph-star mr-2"></i>Popular Activities
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Choose Your <span class="bg-gradient-to-r from-emerald-600 to-orange-600 bg-clip-text text-transparent">Adventure</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                From thrilling wildlife encounters to serene beach escapes, Tanzania offers something for every type of traveler.
            </p>
        </div>
        
        <!-- Activity Categories Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Game Drives -->
            <div class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105 border border-gray-100">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('images/01.jpg') }}" alt="Game Drives" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute top-4 right-4 bg-gradient-to-r from-emerald-800 to-orange-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                        <i class="ph-bold ph-star mr-1"></i>Most Popular
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-700 to-orange-500 rounded-xl flex items-center justify-center text-white">
                            <i class="ph-bold ph-car text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Game Drives</h3>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Experience the thrill of wildlife safaris in Tanzania's national parks. See the Big Five and witness the Great Migration.
                    </p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-xs font-medium">Serengeti</span>
                        <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-medium">Ngorongoro</span>
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Big Five</span>
                    </div>
                    <a href="/activity/game-drives" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-emerald-800 to-orange-600 text-white rounded-lg font-bold hover:from-emerald-900 hover:to-orange-700 transition-all">
                        Explore Game Drives <i class="ph-bold ph-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <!-- Beach Activities -->
            <div class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105 border border-gray-100">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('images/07.jpg') }}" alt="Beach Activities" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute top-4 right-4 bg-gradient-to-r from-orange-600 to-yellow-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                        <i class="ph-bold ph-umbrella mr-1"></i>Relaxation
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-600 to-yellow-500 rounded-xl flex items-center justify-center text-white">
                            <i class="ph-bold ph-umbrella text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Beach Activities</h3>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Relax on pristine white sand beaches, enjoy water sports, and explore the spice islands of Zanzibar and the Tanzanian coast.
                    </p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-medium">Zanzibar</span>
                        <span class="px-3 py-1 bg-cyan-100 text-cyan-700 rounded-full text-xs font-medium">Snorkeling</span>
                        <span class="px-3 py-1 bg-teal-100 text-teal-700 rounded-full text-xs font-medium">Dhow Cruises</span>
                    </div>
                    <a href="{{ route('activities.beach-activities') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-orange-600 to-yellow-600 text-white rounded-lg font-bold hover:from-orange-700 hover:to-yellow-700 transition-all">
                        Explore Beaches <i class="ph-bold ph-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <!-- Balloon Safari -->
            <div class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105 border border-gray-100">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('images/05.jpg') }}" alt="Balloon Safari" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute top-4 right-4 bg-gradient-to-r from-purple-600 to-pink-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                        <i class="ph-bold ph-crown mr-1"></i>Luxury
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-600 to-pink-500 rounded-xl flex items-center justify-center text-white">
                            <i class="ph-bold ph-airplane text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Balloon Safari</h3>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Float above the Serengeti plains at dawn for breathtaking aerial views of wildlife and landscapes from a unique perspective.
                    </p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">Sunrise</span>
                        <span class="px-3 py-1 bg-pink-100 text-pink-700 rounded-full text-xs font-medium">Aerial Views</span>
                        <span class="px-3 py-1 bg-rose-100 text-rose-700 rounded-full text-xs font-medium">Champagne</span>
                    </div>
                    <a href="{{ route('activities.balloon-safari') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg font-bold hover:from-purple-700 hover:to-pink-700 transition-all">
                        Explore Balloon Safaris <i class="ph-bold ph-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <!-- Cultural Visits -->
            <div class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105 border border-gray-100">
                <div class="relative h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?auto=format&fit=crop&w=800&q=80" alt="Cultural Visits" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute top-4 right-4 bg-gradient-to-r from-red-600 to-orange-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                        <i class="ph-bold ph-users-three mr-1"></i>Cultural
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-red-600 to-orange-500 rounded-xl flex items-center justify-center text-white">
                            <i class="ph-bold ph-users-three text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Cultural Visits</h3>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Immerse yourself in local Maasai culture, visit traditional villages, and experience authentic Tanzanian hospitality.
                    </p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-medium">Maasai</span>
                        <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-medium">Traditions</span>
                        <span class="px-3 py-1 bg-amber-100 text-amber-700 rounded-full text-xs font-medium">Local Life</span>
                    </div>
                    <a href="{{ route('activities.cultural-visits') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-red-600 to-orange-600 text-white rounded-lg font-bold hover:from-red-700 hover:to-orange-700 transition-all">
                        Explore Cultural Tours <i class="ph-bold ph-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <!-- Bird Watching -->
            <div class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105 border border-gray-100">
                <div class="relative h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1552728089-57bdde3a5eb1?auto=format&fit=crop&w=800&q=80" alt="Bird Watching" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute top-4 right-4 bg-gradient-to-r from-emerald-600 to-teal-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                        <i class="ph-bold ph-bird mr-1"></i>Nature
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-600 to-teal-500 rounded-xl flex items-center justify-center text-white">
                            <i class="ph-bold ph-bird text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Bird Watching</h3>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Discover over 1,100 bird species in Tanzania's diverse habitats, from endemic forest birds to migratory waterfowl.
                    </p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-xs font-medium">500+ Species</span>
                        <span class="px-3 py-1 bg-teal-100 text-teal-700 rounded-full text-xs font-medium">Endemics</span>
                        <span class="px-3 py-1 bg-cyan-100 text-cyan-700 rounded-full text-xs font-medium">Migration</span>
                    </div>
                    <a href="{{ route('tours.index', ['activity' => 'bird-watching']) }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white rounded-lg font-bold hover:from-emerald-700 hover:to-teal-700 transition-all">
                        Explore Bird Watching <i class="ph-bold ph-arrow-right"></i>
                    </a>
                </div>
            </div>
                        Explore Birding <i class="ph ph-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <!-- Walking Tours -->
            <div class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 border border-slate-100">
                <div class="relative h-56 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=800&q=80" alt="Walking Tours" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute top-4 right-4 bg-indigo-600 text-white px-3 py-1 rounded-full text-xs font-bold">
                        Active
                    </div>
                </div>
                <div class="p-8">
                    <div class="flex items-center gap-2 mb-4">
                        <i class="ph-bold ph-walking text-2xl text-indigo-600"></i>
                        <h3 class="text-2xl font-bold text-slate-900">Walking Tours</h3>
                    </div>
                    <p class="text-slate-600 mb-6 leading-relaxed">Explore Tanzania on foot with guided nature walks, hiking trails, and trekking adventures through diverse landscapes.</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-3 py-1 bg-indigo-50 text-indigo-700 rounded-full text-xs font-medium">Nature Walks</span>
                        <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-medium">Hiking</span>
                        <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-xs font-medium">Trekking</span>
                    </div>
                    <a href="/activity/walking" class="inline-flex items-center gap-2 text-indigo-600 font-bold hover:text-indigo-700 transition-colors">
                        Explore Walking Tours <i class="ph ph-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Experience Types Section -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-emerald-600 font-black text-xs uppercase tracking-[0.4em] mb-4 inline-block">Experience Types</span>
            <h2 class="text-4xl md:text-5xl font-serif text-slate-900 font-bold mb-6">Ways to Experience Tanzania</h2>
            <p class="text-slate-600 max-w-3xl mx-auto text-xl leading-relaxed">Choose from different travel styles and experience types to create your perfect Tanzanian adventure.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-2xl border border-slate-200 text-center hover:shadow-lg transition-all">
                <div class="w-16 h-16 bg-emerald-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="ph-bold ph-car text-emerald-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">Wildlife Safari</h3>
                <p class="text-slate-600 text-sm">Classic game drives and wildlife encounters</p>
            </div>
            
            <div class="bg-white p-6 rounded-2xl border border-slate-200 text-center hover:shadow-lg transition-all">
                <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="ph-bold ph-moon text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">Night Game Drives</h3>
                <p class="text-slate-600 text-sm">Nocturnal wildlife viewing under the stars</p>
            </div>
            
            <div class="bg-white p-6 rounded-2xl border border-slate-200 text-center hover:shadow-lg transition-all">
                <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="ph-bold ph-airplane text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">Aerial Adventures</h3>
                <p class="text-slate-600 text-sm">Balloon safaris and scenic flights</p>
            </div>
            
            <div class="bg-white p-6 rounded-2xl border border-slate-200 text-center hover:shadow-lg transition-all">
                <div class="w-16 h-16 bg-orange-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="ph-bold ph-users-three text-orange-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">Cultural Immersion</h3>
                <p class="text-slate-600 text-sm">Authentic local experiences and traditions</p>
            </div>
        </div>
    </div>
</section>

<!-- Seasonal Activities Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-emerald-600 font-black text-xs uppercase tracking-[0.4em] mb-4 inline-block">Best Time to Visit</span>
            <h2 class="text-4xl md:text-5xl font-serif text-slate-900 font-bold mb-6">Seasonal Activities</h2>
            <p class="text-slate-600 max-w-3xl mx-auto text-xl leading-relaxed">Tanzania offers incredible experiences year-round. Here's what to expect in each season.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Dry Season (Jun-Oct) -->
            <div class="bg-gradient-to-br from-yellow-50 to-orange-50 p-8 rounded-3xl border border-orange-200">
                <div class="flex items-center gap-3 mb-4">
                    <i class="ph-bold ph-sun text-3xl text-orange-600"></i>
                    <h3 class="text-2xl font-bold text-slate-900">Dry Season</h3>
                </div>
                <p class="text-orange-700 font-semibold mb-3">June - October</p>
                <p class="text-slate-600 mb-6">Prime wildlife viewing season. Animals gather around water sources, making them easier to spot. Great for the Great Migration river crossings.</p>
                <ul class="space-y-2 text-slate-700">
                    <li class="flex items-center gap-2">
                        <i class="ph ph-check-circle text-orange-600"></i>
                        Great Migration crossings
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="ph ph-check-circle text-orange-600"></i>
                        Peak wildlife viewing
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="ph ph-check-circle text-orange-600"></i>
                    Kilimanjaro climbing
                    </li>
                </ul>
            </div>
            
            <!-- Short Rains (Nov-Dec) -->
            <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-8 rounded-3xl border border-emerald-200">
                <div class="flex items-center gap-3 mb-4">
                    <i class="ph-bold ph-cloud-rain text-3xl text-emerald-600"></i>
                    <h3 class="text-2xl font-bold text-slate-900">Short Rains</h3>
                </div>
                <p class="text-emerald-700 font-semibold mb-3">November - December</p>
                <p class="text-slate-600 mb-6">Lush landscapes return, fewer crowds, and excellent bird watching. Perfect for photography and green scenery.</p>
                <ul class="space-y-2 text-slate-700">
                    <li class="flex items-center gap-2">
                        <i class="ph ph-check-circle text-emerald-600"></i>
                        Bird migration season
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="ph ph-check-circle text-emerald-600"></i>
                        Lush green landscapes
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="ph ph-check-circle text-emerald-600"></i>
                        Fewer tourists
                    </li>
                </ul>
            </div>
            
            <!-- Long Rains (Mar-May) -->
            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-8 rounded-3xl border border-indigo-200">
                <div class="flex items-center gap-3 mb-4">
                    <i class="ph-bold ph-cloud-rain text-3xl text-blue-600"></i>
                    <h3 class="text-2xl font-bold text-slate-900">Long Rains</h3>
                </div>
                <p class="text-blue-700 font-semibold mb-3">March - May</p>
                <p class="text-slate-600 mb-6">Calving season in the southern Serengeti. Excellent for predator-prey interactions. Lower prices and fewer visitors.</p>
                <ul class="space-y-2 text-slate-700">
                    <li class="flex items-center gap-2">
                        <i class="ph ph-check-circle text-blue-600"></i>
                        Wildebeest calving
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="ph ph-check-circle text-blue-600"></i>
                        Predator action
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="ph ph-check-circle text-blue-600"></i>
                        Best prices
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-br from-emerald-600 to-blue-600">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-4xl md:text-5xl font-serif text-white font-bold mb-6">Ready for Your Tanzanian Adventure?</h2>
        <p class="text-emerald-100 text-xl max-w-3xl mx-auto mb-12">Let our expert guides help you create the perfect itinerary with the best activities and experiences Tanzania has to offer.</p>
        
        <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
            <a href="/tours" class="group px-12 py-5 bg-white text-emerald-600 font-bold rounded-full shadow-2xl hover:scale-105 transition-all flex items-center gap-3">
                <i class="ph-bold ph-suitcase-rolling text-xl"></i>
                Browse All Tours
                <i class="ph-bold ph-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </a>
            <a href="/contact" class="group px-12 py-5 bg-emerald-700 text-white font-bold rounded-full border-2 border-emerald-400 hover:bg-emerald-800 transition-all flex items-center gap-3">
                <i class="ph-bold ph-chat-circle-dots text-xl"></i>
                Talk to Expert
                <i class="ph-bold ph-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </div>

    <!-- Why Choose Tanzania Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-emerald-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-emerald-800 to-orange-600 text-white rounded-full text-sm font-bold mb-6">
                    <i class="ph-bold ph-star mr-2"></i>Why Choose Tanzania
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Unforgettable <span class="bg-gradient-to-r from-emerald-600 to-orange-600 bg-clip-text text-transparent">Adventures</span> Await
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Tanzania offers unparalleled diversity, from Africa's highest peak to pristine beaches and rich cultural heritage.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-emerald-700 to-orange-500 rounded-full flex items-center justify-center text-white mx-auto mb-6">
                        <i class="ph-bold ph-map-trifold text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Diverse Landscapes</h3>
                    <p class="text-gray-600">
                        From savannas to mountains, beaches to forests - Tanzania has it all
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-orange-600 to-red-500 rounded-full flex items-center justify-center text-white mx-auto mb-6">
                        <i class="ph-bold ph-paw-print text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Wildlife Paradise</h3>
                    <p class="text-gray-600">
                        Home to the Big Five and over 1,100 bird species
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-600 to-pink-500 rounded-full flex items-center justify-center text-white mx-auto mb-6">
                        <i class="ph-bold ph-crown text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">World Heritage</h3>
                    <p class="text-gray-600">
                        UNESCO World Heritage Sites including Serengeti and Ngorongoro
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-emerald-600 to-teal-500 rounded-full flex items-center justify-center text-white mx-auto mb-6">
                        <i class="ph-bold ph-users-three text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Rich Culture</h3>
                    <p class="text-gray-600">
                        Over 120 ethnic groups with vibrant traditions and hospitality
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-emerald-800 to-orange-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-bold mb-6">
                <i class="ph-bold ph-rocket mr-2"></i>Start Your Adventure
            </div>
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Ready for Your Tanzanian Dream?
            </h2>
            <p class="text-xl text-white/90 mb-8 max-w-3xl mx-auto leading-relaxed">
                Let our expert guides help you create the perfect Tanzanian adventure. 
                From wildlife safaris to beach relaxation, we'll make your dreams come true.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('tours.index') }}" 
                   class="px-8 py-4 bg-white text-emerald-800 rounded-xl font-bold text-lg hover:bg-gray-100 transition-all transform hover:scale-105 shadow-2xl">
                    <i class="ph-bold ph-suitcase-rolling mr-2"></i>Browse All Tours
                </a>
                <a href="{{ route('inquiries.create') }}" 
                   class="px-8 py-4 bg-white/20 backdrop-blur-sm text-white rounded-xl font-bold text-lg hover:bg-white/30 transition-all border border-white/30">
                    <i class="ph-bold ph-chat-dots mr-2"></i>Custom Adventure
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
