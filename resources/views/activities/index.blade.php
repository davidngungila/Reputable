@extends('layouts.public')

@section('title', 'All Activities - Tanzania Adventure Experiences')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[60vh] sm:min-h-[70vh] md:min-h-[80vh] lg:min-h-[90vh] overflow-hidden bg-gradient-to-br from-emerald-600 to-teal-700">
    <div class="absolute inset-0 z-0">
        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468788/Zeebraaa_cpydg9.jpg" alt="Tanzania Activities" class="w-full h-full object-cover object-center opacity-30">
        <div class="absolute inset-0 bg-gradient-to-r from-emerald-900/50 to-teal-900/50"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 text-center h-full flex items-center justify-center py-12 sm:py-16 md:py-20">
        <div class="w-full">
            <span class="inline-block px-4 py-1.5 bg-emerald-600/20 text-emerald-400 rounded-full text-xs font-bold tracking-widest uppercase mb-4 sm:mb-6 border border-emerald-600/30">Adventure Awaits</span>
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-serif text-white mb-4 sm:mb-6 lg:mb-8 font-bold leading-tight">All Tanzania Activities</h1>
            <p class="text-base sm:text-lg md:text-xl text-emerald-100 max-w-3xl mx-auto mb-6 sm:mb-8 px-4">Discover our complete range of unforgettable experiences, from thrilling wildlife safaris to cultural immersions and adventure activities.</p>
        </div>
    </div>
</section>

<!-- Activities Filter Section -->
<section class="py-16 sm:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-12">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-serif text-slate-900 font-bold mb-4">Browse by Category</h2>
            <p class="text-slate-600 max-w-2xl mx-auto">Find the perfect experience for your Tanzania adventure</p>
        </div>
        
        <!-- Category Filters -->
        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <button class="category-filter active px-6 py-3 bg-emerald-600 text-white rounded-full font-bold transition-all" data-category="all">
                All Activities
            </button>
            <button class="category-filter px-6 py-3 bg-slate-100 text-slate-600 hover:bg-slate-200 rounded-full font-bold transition-all" data-category="wildlife">
                Wildlife
            </button>
            <button class="category-filter px-6 py-3 bg-slate-100 text-slate-600 hover:bg-slate-200 rounded-full font-bold transition-all" data-category="adventure">
                Adventure
            </button>
            <button class="category-filter px-6 py-3 bg-slate-100 text-slate-600 hover:bg-slate-200 rounded-full font-bold transition-all" data-category="cultural">
                Cultural
            </button>
            <button class="category-filter px-6 py-3 bg-slate-100 text-slate-600 hover:bg-slate-200 rounded-full font-bold transition-all" data-category="relaxation">
                Relaxation
            </button>
        </div>
    </div>
</section>

<!-- All Activities Grid -->
<section class="py-16 sm:py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 sm:gap-8">
            
            <!-- Wildlife Safari -->
            <div class="activity-card group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden" data-category="wildlife">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468772/tiger-5167034_1920_leu8nd.jpg" alt="Wildlife Safari" class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
                    <div class="absolute top-4 right-4 bg-emerald-600 text-white px-3 py-1 rounded-full text-sm font-bold">Popular</div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <h3 class="text-xl font-serif text-white font-bold">Wildlife Safari</h3>
                        <p class="text-slate-200 text-sm">Big Five & More</p>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 text-emerald-600 mb-3">
                        <i class="ph-bold ph-binoculars"></i>
                        <span class="font-bold text-sm">Wildlife Experience</span>
                    </div>
                    <p class="text-slate-600 text-sm mb-4">Experience Tanzania's incredible wildlife in their natural habitat, including the legendary Big Five.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-slate-500 text-sm">Full Day</span>
                        <a href="/activities/wildlife-safari" class="text-emerald-600 hover:text-emerald-700 font-bold text-sm flex items-center gap-1">
                            Explore <i class="ph-bold ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Game Drives -->
            <div class="activity-card group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden" data-category="wildlife">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468771/tanzania-2275107_1920_cmihwj.jpg" alt="Game Drives" class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <h3 class="text-xl font-serif text-white font-bold">Game Drives</h3>
                        <p class="text-slate-200 text-sm">4x4 Safari Adventure</p>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 text-orange-600 mb-3">
                        <i class="ph-bold ph-car"></i>
                        <span class="font-bold text-sm">Safari Drive</span>
                    </div>
                    <p class="text-slate-600 text-sm mb-4">Professional guided game drives in custom 4x4 vehicles for optimal wildlife viewing.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-slate-500 text-sm">Half/Full Day</span>
                        <a href="/activities/game-drives" class="text-emerald-600 hover:text-emerald-700 font-bold text-sm flex items-center gap-1">
                            Explore <i class="ph-bold ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Night Game Drives -->
            <div class="activity-card group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden" data-category="wildlife">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468772/Tarangire_ck2ohe.jpg" alt="Night Game Drives" class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
                    <div class="absolute top-4 right-4 bg-purple-600 text-white px-3 py-1 rounded-full text-sm font-bold">Exclusive</div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <h3 class="text-xl font-serif text-white font-bold">Night Game Drives</h3>
                        <p class="text-slate-200 text-sm">Nocturnal Wildlife</p>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 text-purple-600 mb-3">
                        <i class="ph-bold ph-moon"></i>
                        <span class="font-bold text-sm">Night Safari</span>
                    </div>
                    <p class="text-slate-600 text-sm mb-4">Experience the magic of African nights and spot nocturnal predators with specialized equipment.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-slate-500 text-sm">Evening</span>
                        <a href="/activities/night-game-drives" class="text-emerald-600 hover:text-emerald-700 font-bold text-sm flex items-center gap-1">
                            Explore <i class="ph-bold ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bird Watching -->
            <div class="activity-card group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden" data-category="wildlife">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468771/spphoto_skxxer.jpg" alt="Bird Watching" class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <h3 class="text-xl font-serif text-white font-bold">Bird Watching</h3>
                        <p class="text-slate-200 text-sm">500+ Species</p>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 text-blue-600 mb-3">
                        <i class="ph-bold ph-bird"></i>
                        <span class="font-bold text-sm">Ornithology</span>
                    </div>
                    <p class="text-slate-600 text-sm mb-4">Tanzania is a paradise for birders with over 1,100 species including many endemics.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-slate-500 text-sm">Half Day</span>
                        <a href="/activities/bird-watching" class="text-emerald-600 hover:text-emerald-700 font-bold text-sm flex items-center gap-1">
                            Explore <i class="ph-bold ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Walking Tours -->
            <div class="activity-card group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden" data-category="adventure">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468777/waterbuck_ggd5wl.jpg" alt="Walking Tours" class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <h3 class="text-xl font-serif text-white font-bold">Walking Tours</h3>
                        <p class="text-slate-200 text-sm">Nature Walks</p>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 text-green-600 mb-3">
                        <i class="ph-bold ph-walking"></i>
                        <span class="font-bold text-sm">Active</span>
                    </div>
                    <p class="text-slate-600 text-sm mb-4">Guided walking safaris for intimate wildlife encounters and immersive nature experiences.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-slate-500 text-sm">2-4 Hours</span>
                        <a href="/activities/walking-tours" class="text-emerald-600 hover:text-emerald-700 font-bold text-sm flex items-center gap-1">
                            Explore <i class="ph-bold ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Cultural Visits -->
            <div class="activity-card group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden" data-category="cultural">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468788/Zeebraaa_cpydg9.jpg" alt="Cultural Visits" class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <h3 class="text-xl font-serif text-white font-bold">Cultural Visits</h3>
                        <p class="text-slate-200 text-sm">Local Tribes</p>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 text-orange-600 mb-3">
                        <i class="ph-bold ph-users-three"></i>
                        <span class="font-bold text-sm">Culture</span>
                    </div>
                    <p class="text-slate-600 text-sm mb-4">Authentic visits to Maasai villages and other local communities for cultural immersion.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-slate-500 text-sm">Half Day</span>
                        <a href="/activities/cultural-visits" class="text-emerald-600 hover:text-emerald-700 font-bold text-sm flex items-center gap-1">
                            Explore <i class="ph-bold ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Balloon Safari -->
            <div class="activity-card group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden" data-category="adventure">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468772/tiger-5167034_1920_leu8nd.jpg" alt="Balloon Safari" class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
                    <div class="absolute top-4 right-4 bg-red-600 text-white px-3 py-1 rounded-full text-sm font-bold">Premium</div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <h3 class="text-xl font-serif text-white font-bold">Balloon Safari</h3>
                        <p class="text-slate-200 text-sm">Aerial Adventure</p>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 text-red-600 mb-3">
                        <i class="ph-bold ph-airplane-tilt"></i>
                        <span class="font-bold text-sm">Luxury</span>
                    </div>
                    <p class="text-slate-600 text-sm mb-4">Spectacular hot air balloon flights over the Serengeti with champagne breakfast.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-slate-500 text-sm">Early Morning</span>
                        <a href="/activities/balloon-safari" class="text-emerald-600 hover:text-emerald-700 font-bold text-sm flex items-center gap-1">
                            Explore <i class="ph-bold ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Beach Activities -->
            <div class="activity-card group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden" data-category="relaxation">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468771/spphoto_skxxer.jpg" alt="Beach Activities" class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <h3 class="text-xl font-serif text-white font-bold">Beach Activities</h3>
                        <p class="text-slate-200 text-sm">Coastal Paradise</p>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 text-cyan-600 mb-3">
                        <i class="ph-bold ph-umbrella"></i>
                        <span class="font-bold text-sm">Beach</span>
                    </div>
                    <p class="text-slate-600 text-sm mb-4">Snorkeling, diving, and water sports in the pristine waters of Zanzibar and coastal areas.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-slate-500 text-sm">Full Day</span>
                        <a href="/activities/beach-activities" class="text-emerald-600 hover:text-emerald-700 font-bold text-sm flex items-center gap-1">
                            Explore <i class="ph-bold ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 sm:py-20 bg-emerald-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-serif font-bold mb-4">Ready for Your Tanzania Adventure?</h2>
        <p class="text-emerald-100 text-lg mb-8 max-w-2xl mx-auto">Let us help you create the perfect itinerary with your chosen activities</p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="/contact" class="px-8 py-4 bg-white text-emerald-600 rounded-full font-bold hover:bg-emerald-50 transition-all">
                Plan Your Trip
            </a>
            <a href="/tours" class="px-8 py-4 bg-emerald-700 text-white rounded-full font-bold hover:bg-emerald-800 transition-all border border-emerald-500">
                Browse Tours
            </a>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const categoryFilters = document.querySelectorAll('.category-filter');
    const activityCards = document.querySelectorAll('.activity-card');
    
    categoryFilters.forEach(filter => {
        filter.addEventListener('click', function() {
            // Update active state
            categoryFilters.forEach(f => {
                f.classList.remove('active', 'bg-emerald-600', 'text-white');
                f.classList.add('bg-slate-100', 'text-slate-600');
            });
            
            this.classList.remove('bg-slate-100', 'text-slate-600');
            this.classList.add('active', 'bg-emerald-600', 'text-white');
            
            // Filter activities
            const category = this.dataset.category;
            
            activityCards.forEach(card => {
                if (category === 'all' || card.dataset.category === category) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>
@endsection
