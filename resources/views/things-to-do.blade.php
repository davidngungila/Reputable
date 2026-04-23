@extends('layouts.public')

@section('content')
<!-- Hero Section -->
<section class="relative pt-48 pb-32 overflow-hidden bg-slate-900">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=2000&q=80" alt="Things to Do in Tanzania" class="w-full h-full object-cover blur-sm opacity-40">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900 to-slate-900"></div>
    </div>
    <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
        <span class="inline-block px-4 py-1.5 bg-emerald-600/20 text-emerald-400 rounded-full text-xs font-bold tracking-widest uppercase mb-6 border border-emerald-600/30">Tanzania Adventures</span>
        <h1 class="text-5xl md:text-7xl font-serif text-white mb-8 font-bold">Things to Do in <span class="text-emerald-500">Tanzania</span></h1>
        <p class="text-xl text-slate-300 max-w-3xl mx-auto leading-relaxed mb-8">Discover endless adventures, from wildlife safaris and mountain trekking to beach relaxation and cultural experiences.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#activities" class="inline-flex items-center gap-2 px-8 py-4 bg-emerald-600 text-white rounded-full font-bold hover:bg-emerald-700 transition-all">
                <i class="ph-bold ph-compass"></i> Explore Activities
            </a>
            <a href="/tours" class="inline-flex items-center gap-2 px-8 py-4 bg-white/10 text-white rounded-full font-bold border border-white/20 hover:bg-white/20 transition-all">
                <i class="ph-bold ph-suitcase-rolling"></i> Browse Tours
            </a>
        </div>
    </div>
</section>

<!-- Activities Overview Section -->
<section id="activities" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-emerald-600 font-black text-xs uppercase tracking-[0.4em] mb-4 inline-block">Popular Activities</span>
            <h2 class="text-4xl md:text-5xl font-serif text-slate-900 font-bold mb-6">Choose Your Adventure</h2>
            <p class="text-slate-600 max-w-3xl mx-auto text-xl leading-relaxed">From thrilling wildlife encounters to serene beach escapes, Tanzania offers something for every type of traveler.</p>
        </div>
        
        <!-- Activity Categories Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Game Drives -->
            <div class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 border border-slate-100">
                <div class="relative h-56 overflow-hidden">
                    <img src="{{ asset('images/01.jpg') }}" alt="Game Drives" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute top-4 right-4 bg-emerald-600 text-white px-3 py-1 rounded-full text-xs font-bold">
                        Most Popular
                    </div>
                </div>
                <div class="p-8">
                    <div class="flex items-center gap-2 mb-4">
                        <i class="ph-bold ph-car text-2xl text-emerald-600"></i>
                        <h3 class="text-2xl font-bold text-slate-900">Game Drives</h3>
                    </div>
                    <p class="text-slate-600 mb-6 leading-relaxed">Experience the thrill of wildlife safaris in Tanzania's national parks. See the Big Five and witness the Great Migration.</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-medium">Serengeti</span>
                        <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-medium">Ngorongoro</span>
                        <span class="px-3 py-1 bg-orange-50 text-orange-700 rounded-full text-xs font-medium">Big Five</span>
                    </div>
                    <a href="/tours?activity=game-drives" class="inline-flex items-center gap-2 text-emerald-600 font-bold hover:text-emerald-700 transition-colors">
                        Explore Game Drives <i class="ph ph-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <!-- Beach Activities -->
            <div class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 border border-slate-100">
                <div class="relative h-56 overflow-hidden">
                    <img src="{{ asset('images/07.jpg') }}" alt="Beach Activities" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute top-4 right-4 bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-bold">
                        Relaxation
                    </div>
                </div>
                <div class="p-8">
                    <div class="flex items-center gap-2 mb-4">
                        <i class="ph-bold ph-umbrella text-2xl text-blue-600"></i>
                        <h3 class="text-2xl font-bold text-slate-900">Beach Activities</h3>
                    </div>
                    <p class="text-slate-600 mb-6 leading-relaxed">Relax on pristine white sand beaches, enjoy water sports, and explore the spice islands of Zanzibar and the Tanzanian coast.</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-3 py-1 bg-cyan-50 text-cyan-700 rounded-full text-xs font-medium">Zanzibar</span>
                        <span class="px-3 py-1 bg-teal-50 text-teal-700 rounded-full text-xs font-medium">Snorkeling</span>
                        <span class="px-3 py-1 bg-indigo-50 text-indigo-700 rounded-full text-xs font-medium">Dhow Cruises</span>
                    </div>
                    <a href="/tours?activity=beach" class="inline-flex items-center gap-2 text-blue-600 font-bold hover:text-blue-700 transition-colors">
                        Explore Beaches <i class="ph ph-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <!-- Balloon Safari -->
            <div class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 border border-slate-100">
                <div class="relative h-56 overflow-hidden">
                    <img src="{{ asset('images/05.jpg') }}" alt="Balloon Safari" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute top-4 right-4 bg-purple-600 text-white px-3 py-1 rounded-full text-xs font-bold">
                        Luxury
                    </div>
                </div>
                <div class="p-8">
                    <div class="flex items-center gap-2 mb-4">
                        <i class="ph-bold ph-airplane text-2xl text-purple-600"></i>
                        <h3 class="text-2xl font-bold text-slate-900">Balloon Safari</h3>
                    </div>
                    <p class="text-slate-600 mb-6 leading-relaxed">Float above the Serengeti plains at dawn for breathtaking aerial views of wildlife and landscapes from a unique perspective.</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-xs font-medium">Sunrise</span>
                        <span class="px-3 py-1 bg-pink-50 text-pink-700 rounded-full text-xs font-medium">Aerial Views</span>
                        <span class="px-3 py-1 bg-rose-50 text-rose-700 rounded-full text-xs font-medium">Champagne</span>
                    </div>
                    <a href="/tours?activity=balloon" class="inline-flex items-center gap-2 text-purple-600 font-bold hover:text-purple-700 transition-colors">
                        Explore Balloon Safaris <i class="ph ph-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <!-- Cultural Visits -->
            <div class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 border border-slate-100">
                <div class="relative h-56 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?auto=format&fit=crop&w=800&q=80" alt="Cultural Visits" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute top-4 right-4 bg-red-600 text-white px-3 py-1 rounded-full text-xs font-bold">
                        Cultural
                    </div>
                </div>
                <div class="p-8">
                    <div class="flex items-center gap-2 mb-4">
                        <i class="ph-bold ph-users-three text-2xl text-red-600"></i>
                        <h3 class="text-2xl font-bold text-slate-900">Cultural Visits</h3>
                    </div>
                    <p class="text-slate-600 mb-6 leading-relaxed">Immerse yourself in local Maasai culture, visit traditional villages, and experience authentic Tanzanian hospitality.</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-3 py-1 bg-red-50 text-red-700 rounded-full text-xs font-medium">Maasai</span>
                        <span class="px-3 py-1 bg-orange-50 text-orange-700 rounded-full text-xs font-medium">Traditions</span>
                        <span class="px-3 py-1 bg-amber-50 text-amber-700 rounded-full text-xs font-medium">Local Life</span>
                    </div>
                    <a href="/tours?activity=cultural" class="inline-flex items-center gap-2 text-red-600 font-bold hover:text-red-700 transition-colors">
                        Explore Cultural Tours <i class="ph ph-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <!-- Bird Watching -->
            <div class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 border border-slate-100">
                <div class="relative h-56 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1552728089-57bdde3a5eb1?auto=format&fit=crop&w=800&q=80" alt="Bird Watching" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute top-4 right-4 bg-green-600 text-white px-3 py-1 rounded-full text-xs font-bold">
                        Nature
                    </div>
                </div>
                <div class="p-8">
                    <div class="flex items-center gap-2 mb-4">
                        <i class="ph-bold ph-bird text-2xl text-green-600"></i>
                        <h3 class="text-2xl font-bold text-slate-900">Bird Watching</h3>
                    </div>
                    <p class="text-slate-600 mb-6 leading-relaxed">Discover over 1,100 bird species in Tanzania's diverse habitats, from endemic forest birds to migratory waterfowl.</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-3 py-1 bg-green-50 text-green-700 rounded-full text-xs font-medium">500+ Species</span>
                        <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-medium">Endemics</span>
                        <span class="px-3 py-1 bg-teal-50 text-teal-700 rounded-full text-xs font-medium">Migration</span>
                    </div>
                    <a href="/tours?activity=bird-watching" class="inline-flex items-center gap-2 text-green-600 font-bold hover:text-green-700 transition-colors">
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
                    <a href="/tours?activity=walking" class="inline-flex items-center gap-2 text-indigo-600 font-bold hover:text-indigo-700 transition-colors">
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
</section>
@endsection
