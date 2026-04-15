@extends('layouts.public')

@section('title', 'Mountain Trekking - Kilimanjaro Climbing Packages')

@section('content')
<!-- Hero Section -->
<section class="relative h-[600px] bg-gradient-to-br from-emerald-900 via-emerald-800 to-emerald-900 overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('images/03.jpg') }}" alt="Mountain Trekking" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/40"></div>
    </div>
    <div class="relative z-10 h-full flex items-center justify-center text-center px-4">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-5xl md:text-6xl font-serif font-bold text-white mb-6">
                Conquer the Roof of Africa
            </h1>
            <p class="text-xl md:text-2xl text-white/90 max-w-3xl mx-auto leading-relaxed">
                Expert-guided Kilimanjaro climbing expeditions with proven safety records and summit success rates
            </p>
            <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#tours" class="bg-white text-emerald-900 px-8 py-4 rounded-full font-bold hover:bg-emerald-50 transition-colors">
                    View All Routes
                </a>
                <a href="{{ route('tours.index') }}" class="border-2 border-white text-white px-8 py-4 rounded-full font-bold hover:bg-white hover:text-emerald-900 transition-colors">
                    All Tours
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Mountain Trekking Tours Section -->
<section id="tours" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-serif font-bold text-gray-800 mb-4">Kilimanjaro Climbing Routes</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Choose your preferred route and duration. All packages include certified guides, porters, and comprehensive safety equipment.
            </p>
        </div>

        <!-- Filters -->
        <div class="mb-12 bg-white rounded-2xl shadow-sm p-6 border border-gray-200">
            <form method="GET" action="{{ route('mountain-trekking') }}" class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Route</label>
                    <select name="route" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="">All Routes</option>
                        <option value="Marangu" {{ request('route') == 'Marangu' ? 'selected' : '' }}>Marangu Route</option>
                        <option value="Machame" {{ request('route') == 'Machame' ? 'selected' : '' }}>Machame Route</option>
                        <option value="Lemosho" {{ request('route') == 'Lemosho' ? 'selected' : '' }}>Lemosho Route</option>
                        <option value="Northern Circuit" {{ request('route') == 'Northern Circuit' ? 'selected' : '' }}>Northern Circuit</option>
                        <option value="Rongai" {{ request('route') == 'Rongai' ? 'selected' : '' }}>Rongai Route</option>
                        <option value="Umbwe" {{ request('route') == 'Umbwe' ? 'selected' : '' }}>Umbwe Route</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Duration</label>
                    <select name="duration" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="">Any Duration</option>
                        <option value="1-3 Days" {{ request('duration') == '1-3 Days' ? 'selected' : '' }}>1-3 Days</option>
                        <option value="4-7 Days" {{ request('duration') == '4-7 Days' ? 'selected' : '' }}>4-7 Days</option>
                        <option value="8+ Days" {{ request('duration') == '8+ Days' ? 'selected' : '' }}>8+ Days</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                    <select name="sort" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="">Default</option>
                        <option value="Low to High" {{ request('sort') == 'Low to High' ? 'selected' : '' }}>Low to High</option>
                        <option value="High to Low" {{ request('sort') == 'High to Low' ? 'selected' : '' }}>High to Low</option>
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="bg-emerald-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-emerald-700 transition-colors">
                        Filter Tours
                    </button>
                </div>
            </form>
        </div>

        <!-- Tours Grid -->
        <div class="space-y-8">
            @forelse ($tours as $index => $tour)
                @if($index % 3 == 0)
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                @endif
                <div class="group bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-100">
                    <div class="relative h-64 overflow-hidden">
                        @if($tour->images && is_array($tour->images) && count($tour->images) > 0)
                            <img src="{{ asset($tour->images[0]) }}" alt="{{ $tour->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <img src="{{ asset('images/03.jpg') }}" alt="{{ $tour->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @endif
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-md p-2 rounded-full text-emerald-500 shadow-sm">
                            <i class="ph-bold ph-heart text-xl"></i>
                        </div>
                        @if($tour->featured)
                            <div class="absolute top-4 left-4 bg-[#E67A2E] text-white text-xs px-3 py-1 rounded-full">Featured</div>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-900 group-hover:text-emerald-600 transition-colors line-clamp-1">{{ $tour->name }}</h3>
                        </div>
                            <p class="text-gray-500 text-sm leading-relaxed mb-8 line-clamp-2">{{ $tour->description }}</p>
                            <div class="space-y-2">
                                <div class="flex items-center gap-2 text-sm text-gray-700">
                                    <i class="ph-bold ph-map-pin text-[#1F5A3A]"></i>
                                    <span>{{ $tour->location }}</span>
                                </div>
                                <div class="flex items-center gap-2 text-sm text-gray-700">
                                    <i class="ph-bold ph-clock text-[#1F5A3A]"></i>
                                    <span>{{ $tour->duration_days }} Days</span>
                                </div>
                                @if($tour->route_name)
                                    <div class="flex items-center gap-2 text-sm text-gray-700">
                                        <i class="ph-bold ph-signpost text-[#1F5A3A]"></i>
                                        <span>{{ $tour->route_name }}</span>
                                    </div>
                                @endif
                                @if($tour->difficulty)
                                    <div class="flex items-center gap-2 text-sm text-gray-700">
                                        <i class="ph-bold ph-trend-up text-[#1F5A3A]"></i>
                                        <span>{{ $tour->difficulty }}</span>
                                    </div>
                                @endif
                                @if($tour->max_altitude)
                                    <div class="flex items-center gap-2 text-sm text-gray-700">
                                        <i class="ph-bold ph-mountain text-[#1F5A3A]"></i>
                                        <span>{{ $tour->max_altitude }}m</span>
                                    </div>
                                @endif
                                @if($tour->package_type)
                                    <div class="flex items-center gap-2 text-sm text-gray-700">
                                        <i class="ph-bold ph-backpack text-[#1F5A3A]"></i>
                                        <span>{{ $tour->package_type }}</span>
                                    </div>
                                @endif
                                @if($tour->best_season)
                                    <div class="flex items-center gap-2 text-sm text-gray-700">
                                        <i class="ph-bold ph-sun text-[#1F5A3A]"></i>
                                        <span>{{ $tour->best_season }}</span>
                                    </div>
                                @endif
                                <div class="flex items-center gap-2 text-sm text-gray-700">
                                    <i class="ph-bold ph-users text-[#1F5A3A]"></i>
                                    <span>Per Person</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest block mb-1">From ${{ number_format($tour->base_price) }}</span>
                                </div>
                                <a href="{{ route('tours.show', $tour->id) }}" class="inline-flex items-center gap-2 bg-slate-900 text-white px-6 py-3 rounded-2xl font-bold hover:bg-emerald-600 transition-colors">
                                    Details <i class="ph ph-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @if($index % 3 == 2)
                    </div>
                @endif
            @empty
                <div class="col-span-full text-center py-12">
                    <i class="ph-bold ph-backpack text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-600 mb-2">No Mountain Trekking Tours Available</h3>
                    <p class="text-gray-500">Check back later for new climbing expeditions.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($tours->hasPages())
            <div class="mt-12 flex justify-center">
                {{ $tours->links() }}
            </div>
        @endif
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
