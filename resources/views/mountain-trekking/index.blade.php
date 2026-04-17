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
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            @forelse ($tours as $tour)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200">
                    <div class="relative h-48 overflow-hidden">
                        @if($tour->images && is_array($tour->images) && count($tour->images) > 0)
                            <img src="{{ asset($tour->images[0]) }}" alt="{{ $tour->name }}" class="w-full h-full object-cover">
                        @else
                            <img src="{{ asset('images/03.jpg') }}" alt="{{ $tour->name }}" class="w-full h-full object-cover">
                        @endif
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-md p-2 rounded-full text-emerald-500 shadow-sm">
                            <i class="ph-bold ph-heart text-xl"></i>
                        </div>
                        @if($tour->featured)
                            <div class="absolute top-4 left-4 bg-[#E67A2E] text-white text-xs px-3 py-1 rounded-full">Featured</div>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="bg-emerald-100 p-3 rounded-full">
                                <i class="ph-bold ph-mountain text-emerald-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">{{ $tour->name }}</h4>
                                <p class="text-sm text-gray-600">{{ $tour->route_name ?? 'Kilimanjaro Climb' }}</p>
                            </div>
                        </div>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-clock text-gray-400"></i>
                            <span>{{ $tour->duration_days }} days</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-trend-up text-gray-400"></i>
                            <span>{{ $tour->difficulty ?? 'Moderate' }} difficulty</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-map-pin text-gray-400"></i>
                            <span>{{ $tour->location }}</span>
                        </div>
                        @if($tour->max_altitude)
                            <div class="flex items-center gap-2">
                                <i class="ph-bold ph-mountain text-gray-400"></i>
                                <span>{{ $tour->max_altitude }}m</span>
                            </div>
                        @endif
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-trophy text-gray-400"></i>
                            <span>From ${{ number_format($tour->base_price) }}</span>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <p class="text-xs text-gray-600 mb-4">{{ Str::limit($tour->description, 100) }}</p>
                        <a href="{{ route('tours.show', $tour->id) }}" class="inline-flex items-center gap-2 bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-emerald-700 transition-colors">
                            View Details <i class="ph ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
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

        <!-- Route Comparison Section -->
        <div class="mt-20 bg-white rounded-2xl shadow-lg p-8 border border-gray-200">
            <h3 class="text-2xl font-serif font-bold text-gray-900 mb-8 text-center">Kilimanjaro Routes Comparison</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-3 px-4 font-semibold text-gray-900">Route</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-900">Duration</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-900">Difficulty</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-900">Success Rate</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-900">Max Altitude</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-900">Best For</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="py-3 px-4">
                                <div class="flex items-center gap-2">
                                    <i class="ph-bold ph-mountain text-emerald-600"></i>
                                    <span class="font-medium">Marangu</span>
                                </div>
                            </td>
                            <td class="py-3 px-4">5-7 days</td>
                            <td class="py-3 px-4">
                                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">Moderate</span>
                            </td>
                            <td class="py-3 px-4">99%</td>
                            <td class="py-3 px-4">5,895m</td>
                            <td class="py-3 px-4">First-time climbers</td>
                        </tr>
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="py-3 px-4">
                                <div class="flex items-center gap-2">
                                    <i class="ph-bold ph-mountain text-emerald-600"></i>
                                    <span class="font-medium">Machame</span>
                                </div>
                            </td>
                            <td class="py-3 px-4">6-8 days</td>
                            <td class="py-3 px-4">
                                <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded-full text-xs">Challenging</span>
                            </td>
                            <td class="py-3 px-4">95%</td>
                            <td class="py-3 px-4">Scenic views</td>
                        </tr>
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="py-3 px-4">
                                <div class="flex items-center gap-2">
                                    <i class="ph-bold ph-mountain text-emerald-600"></i>
                                    <span class="font-medium">Lemosho</span>
                                </div>
                            </td>
                            <td class="py-3 px-4">7-9 days</td>
                            <td class="py-3 px-4">
                                <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded-full text-xs">Challenging</span>
                            </td>
                            <td class="py-3 px-4">97%</td>
                            <td class="py-3 px-4">Acclimatization</td>
                        </tr>
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="py-3 px-4">
                                <div class="flex items-center gap-2">
                                    <i class="ph-bold ph-mountain text-emerald-600"></i>
                                    <span class="font-medium">Northern Circuit</span>
                                </div>
                            </td>
                            <td class="py-3 px-4">8-11 days</td>
                            <td class="py-3 px-4">
                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs">Very Challenging</span>
                            </td>
                            <td class="py-3 px-4">98%</td>
                            <td class="py-3 px-4">Wilderness</td>
                        </tr>
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="py-3 px-4">
                                <div class="flex items-center gap-2">
                                    <i class="ph-bold ph-mountain text-emerald-600"></i>
                                    <span class="font-medium">Rongai</span>
                                </div>
                            </td>
                            <td class="py-3 px-4">5-7 days</td>
                            <td class="py-3 px-4">
                                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">Moderate</span>
                            </td>
                            <td class="py-3 px-4">96%</td>
                            <td class="py-3 px-4">Dry season</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4">
                                <div class="flex items-center gap-2">
                                    <i class="ph-bold ph-mountain text-emerald-600"></i>
                                    <span class="font-medium">Umbwe</span>
                                </div>
                            </td>
                            <td class="py-3 px-4">6-7 days</td>
                            <td class="py-3 px-4">
                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs">Very Challenging</span>
                            </td>
                            <td class="py-3 px-4">94%</td>
                            <td class="py-3 px-4">Experienced climbers</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Detailed Route Information -->
        <div class="mt-16">
            <h3 class="text-2xl font-serif font-bold text-gray-900 mb-8 text-center">Route Details & Itinerary Highlights</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Marangu Route -->
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="bg-emerald-100 p-3 rounded-full">
                            <i class="ph-bold ph-mountain text-emerald-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Marangu Route</h4>
                            <p class="text-sm text-gray-600">Coca-Cola Route</p>
                        </div>
                    </div>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-clock text-gray-400"></i>
                            <span>5-7 days</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-trend-up text-gray-400"></i>
                            <span>Moderate difficulty</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-home text-gray-400"></i>
                            <span>Mountain huts</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-trophy text-gray-400"></i>
                            <span>99% success rate</span>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <p class="text-xs text-gray-600">Perfect for first-time climbers with comfortable mountain hut accommodation.</p>
                    </div>
                </div>

                <!-- Machame Route -->
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="bg-emerald-100 p-3 rounded-full">
                            <i class="ph-bold ph-mountain text-emerald-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Machame Route</h4>
                            <p class="text-sm text-gray-600">Whiskey Route</p>
                        </div>
                    </div>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-clock text-gray-400"></i>
                            <span>6-8 days</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-trend-up text-gray-400"></i>
                            <span>Challenging</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-tent text-gray-400"></i>
                            <span>Tented camping</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-trophy text-gray-400"></i>
                            <span>95% success rate</span>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <p class="text-xs text-gray-600">Beautiful southern approach with diverse landscapes and Barranco Wall crossing.</p>
                    </div>
                </div>

                <!-- Lemosho Route -->
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="bg-emerald-100 p-3 rounded-full">
                            <i class="ph-bold ph-mountain text-emerald-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Lemosho Route</h4>
                            <p class="text-sm text-gray-600">Remote Wilderness</p>
                        </div>
                    </div>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-clock text-gray-400"></i>
                            <span>7-9 days</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-trend-up text-gray-400"></i>
                            <span>Challenging</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-tent text-gray-400"></i>
                            <span>Tented camping</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-trophy text-gray-400"></i>
                            <span>97% success rate</span>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <p class="text-xs text-gray-600">Remote western approach with excellent acclimatization and diverse ecosystems.</p>
                    </div>
                </div>

                <!-- Northern Circuit -->
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="bg-emerald-100 p-3 rounded-full">
                            <i class="ph-bold ph-mountain text-emerald-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Northern Circuit</h4>
                            <p class="text-sm text-gray-600">Ultimate Wilderness</p>
                        </div>
                    </div>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-clock text-gray-400"></i>
                            <span>8-11 days</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-trend-up text-gray-400"></i>
                            <span>Very Challenging</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-tent text-gray-400"></i>
                            <span>Tented camping</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-trophy text-gray-400"></i>
                            <span>98% success rate</span>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <p class="text-xs text-gray-600">Complete circumnavigation of Kibo with remote wilderness experience.</p>
                    </div>
                </div>

                <!-- Rongai Route -->
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="bg-emerald-100 p-3 rounded-full">
                            <i class="ph-bold ph-mountain text-emerald-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Rongai Route</h4>
                            <p class="text-sm text-gray-600">Northern Approach</p>
                        </div>
                    </div>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-clock text-gray-400"></i>
                            <span>5-7 days</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-trend-up text-gray-400"></i>
                            <span>Moderate</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-tent text-gray-400"></i>
                            <span>Tented camping</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-trophy text-gray-400"></i>
                            <span>96% success rate</span>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <p class="text-xs text-gray-600">Less crowded northern approach with dry climate and Kenyan views.</p>
                    </div>
                </div>

                <!-- Umbwe Route -->
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="bg-emerald-100 p-3 rounded-full">
                            <i class="ph-bold ph-mountain text-emerald-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Umbwe Route</h4>
                            <p class="text-sm text-gray-600">Direct Challenge</p>
                        </div>
                    </div>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-clock text-gray-400"></i>
                            <span>6-7 days</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-trend-up text-gray-400"></i>
                            <span>Very Challenging</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-tent text-gray-400"></i>
                            <span>Tented camping</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-trophy text-gray-400"></i>
                            <span>94% success rate</span>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <p class="text-xs text-gray-600">Steep and direct route for experienced climbers seeking ultimate challenge.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comprehensive Inclusions Section -->
        <div class="mt-16 bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-2xl p-8">
            <h3 class="text-2xl font-serif font-bold text-gray-900 mb-8 text-center">What's Included in Every Kilimanjaro Expedition</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="bg-emerald-100 p-2 rounded-full">
                            <i class="ph-bold ph-shield-check text-emerald-600 text-lg"></i>
                        </div>
                        <h4 class="font-bold text-gray-900">Safety & Support</h4>
                    </div>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check-circle text-emerald-500 mt-0.5"></i>
                            <span>English-speaking mountain guides (1:2 ratio)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check-circle text-emerald-500 mt-0.5"></i>
                            <span>Luggage porters (15kg per person)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check-circle text-emerald-500 mt-0.5"></i>
                            <span>Emergency oxygen cylinder & first aid kit</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check-circle text-emerald-500 mt-0.5"></i>
                            <span>Pre-climb briefing & equipment check</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="bg-emerald-100 p-2 rounded-full">
                            <i class="ph-bold ph-utensils text-emerald-600 text-lg"></i>
                        </div>
                        <h4 class="font-bold text-gray-900">Meals & Accommodation</h4>
                    </div>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check-circle text-emerald-500 mt-0.5"></i>
                            <span>All meals on mountain & eating utensils</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check-circle text-emerald-500 mt-0.5"></i>
                            <span>Boiled drinking water</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check-circle text-emerald-500 mt-0.5"></i>
                            <span>Hand washing station & sleeping mattress</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check-circle text-emerald-500 mt-0.5"></i>
                            <span>Celebration lunch after summit</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="bg-emerald-100 p-2 rounded-full">
                            <i class="ph-bold ph-briefcase text-emerald-600 text-lg"></i>
                        </div>
                        <h4 class="font-bold text-gray-900">Logistics & Fees</h4>
                    </div>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check-circle text-emerald-500 mt-0.5"></i>
                            <span>All taxes and VAT</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check-circle text-emerald-500 mt-0.5"></i>
                            <span>Park conservation, entry, camping/hut fees</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check-circle text-emerald-500 mt-0.5"></i>
                            <span>Rescue fees & transfers (lodge to park gates)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check-circle text-emerald-500 mt-0.5"></i>
                            <span>Tent crew, cook, waiter</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        @if($tours->hasPages())
            <div class="mt-12 flex justify-center">
                {{ $tours->links() }}
            </div>
        @endif
    </div>
</section>

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
