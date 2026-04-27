@extends('layouts.public')

@section('content')
<!-- Page Header -->
<section class="relative pt-40 pb-20 bg-slate-900 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1516426122078-c23e76319801?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" alt="Destinations" class="w-full h-full object-cover opacity-30">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/40 to-slate-900"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        <h1 class="text-5xl md:text-6xl font-serif text-white mb-6 font-bold">Discover Tanzania's Destinations</h1>
        <p class="text-slate-300 max-w-2xl mx-auto">Explore Tanzania's most spectacular destinations, from the endless plains of Serengeti to the pristine beaches of Zanzibar.</p>
    </div>
</section>

<!-- Destinations Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Filters -->
        <div class="flex flex-col lg:flex-row items-center justify-between mb-16 gap-8 bg-slate-50 p-6 rounded-3xl border border-slate-100">
            <div class="flex flex-wrap items-center gap-4">
                <div class="relative">
                    <select id="filter-region" class="appearance-none bg-white border border-slate-200 rounded-2xl px-6 py-3 pr-12 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all">
                        <option value="All">Region: All</option>
                        <option value="Northern">Northern Circuit</option>
                        <option value="Southern">Southern Circuit</option>
                        <option value="Western">Western Circuit</option>
                        <option value="Coastal">Coastal & Islands</option>
                    </select>
                    <i class="ph ph-caret-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                </div>
                
                <div class="relative">
                    <select id="filter-activity" class="appearance-none bg-white border border-slate-200 rounded-2xl px-6 py-3 pr-12 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all">
                        <option value="All">Activity: All</option>
                        <option value="Wildlife">Wildlife Safari</option>
                        <option value="Mountain">Mountain Trekking</option>
                        <option value="Beach">Beach & Relaxation</option>
                        <option value="Cultural">Cultural Tours</option>
                    </select>
                    <i class="ph ph-caret-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                </div>
                
                <div class="relative">
                    <select id="filter-difficulty" class="appearance-none bg-white border border-slate-200 rounded-2xl px-6 py-3 pr-12 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all">
                        <option value="Any">Difficulty: Any</option>
                        <option value="Easy">Easy</option>
                        <option value="Moderate">Moderate</option>
                        <option value="Challenging">Challenging</option>
                    </select>
                    <i class="ph ph-caret-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                </div>
                
                <div id="filter-loader" class="hidden">
                    <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-emerald-600"></div>
                </div>
            </div>
        </div>
        
        <div id="destination-grid-wrapper">
            <div id="destination-grid-container">
    <!-- Destinations Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        @foreach($destinations as $destination)
        <div class="group bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-100">
            <div class="relative h-64 overflow-hidden">
                @if(!empty($destination->images) && count($destination->images) > 0)
                    <img src="{{ asset($destination->images[0]) }}" alt="{{ $destination->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                @else
                    <img src="{{ asset('images/01.jpg') }}" alt="{{ $destination->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                @endif
                <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-md p-2 rounded-full text-emerald-500 shadow-sm">
                    <i class="ph-bold ph-heart text-xl"></i>
                </div>
            </div>
            <div class="p-8">
                <div class="flex items-center gap-3 text-xs font-bold text-emerald-600 uppercase tracking-widest mb-4">
                    <span class="flex items-center gap-1"><i class="ph ph-map-pin"></i> {{ $destination->location }}</span>
                    @if(!empty($destination->highlights) && count($destination->highlights) > 0)
                    <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
                    <span class="flex items-center gap-1"><i class="ph ph-star"></i> {{ $destination->highlights[0] }}</span>
                    @endif
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-4 group-hover:text-emerald-600 transition-colors">{{ $destination->name }}</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-8">{{ Str::limit($destination->description, 150) }}</p>
                
                <div class="grid grid-cols-2 gap-4 mb-6">
                    @if(!empty($destination->highlights) && count($destination->highlights) > 1)
                    <div class="bg-emerald-50 rounded-xl p-3 border border-emerald-100">
                        <div class="flex items-center gap-2 text-emerald-700 mb-1">
                            <i class="ph-bold ph-star"></i>
                            <span class="font-bold text-sm">Highlight</span>
                        </div>
                        <p class="text-emerald-900 font-black text-sm">{{ Str::limit($destination->highlights[1], 20) }}</p>
                    </div>
                    @endif
                    @if(!empty($destination->highlights) && count($destination->highlights) > 2)
                    <div class="bg-blue-50 rounded-xl p-3 border border-blue-100">
                        <div class="flex items-center gap-2 text-blue-700 mb-1">
                            <i class="ph-bold ph-map-pin"></i>
                            <span class="font-bold text-sm">Feature</span>
                        </div>
                        <p class="text-blue-900 font-black text-sm">{{ Str::limit($destination->highlights[2], 20) }}</p>
                    </div>
                    @endif
                </div>
                
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest block mb-1">Best Time</span>
                        <span class="text-lg font-bold text-slate-900">{{ Str::limit($destination->best_time_to_visit ?? 'Year-round', 15) }}</span>
                    </div>
                    <a href="/tours" class="inline-flex items-center gap-2 bg-slate-900 text-white px-6 py-3 rounded-2xl font-bold hover:bg-emerald-600 transition-colors">
                        Explore <i class="ph ph-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
            </div>
    
    <!-- Results Count -->
    <div class="mt-8 text-center text-slate-500 text-sm">
        Showing <span class="text-slate-900 font-bold font-serif">{{ count($destinations) }}</span> incredible destinations
    </div>
</div>
        </div>
    </div>
</section>

<style>
    #destination-grid-wrapper.loading {
        opacity: 0.5;
        pointer-events: none;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const regionFilter = document.getElementById('filter-region');
    const activityFilter = document.getElementById('filter-activity');
    const difficultyFilter = document.getElementById('filter-difficulty');
    const gridWrapper = document.getElementById('destination-grid-wrapper');
    const loader = document.getElementById('filter-loader');

    function filterDestinations() {
        gridWrapper.classList.add('loading');
        loader.classList.remove('hidden');

        // Simulate filtering (in real app, this would be an AJAX call)
        setTimeout(() => {
            gridWrapper.classList.remove('loading');
            loader.classList.add('hidden');
        }, 500);
    }

    [regionFilter, activityFilter, difficultyFilter].forEach(filter => {
        filter.addEventListener('change', filterDestinations);
    });
});
</script>

<!-- CTA Section -->
<section class="py-20 bg-[#1F5A3A]">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-serif font-bold text-white mb-4">Ready to Explore Tanzania?</h2>
        <p class="text-white/90 mb-8 max-w-2xl mx-auto">Let our expert guides help you discover the perfect destinations for your Tanzanian adventure.</p>
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
