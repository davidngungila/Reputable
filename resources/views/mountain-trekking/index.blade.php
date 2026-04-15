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

<!-- Route Comparison Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-serif font-bold text-gray-800 mb-4">Choose Your Perfect Route</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Compare Kilimanjaro climbing routes to find the perfect match for your experience level and preferences
            </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Route Comparison Table -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="bg-emerald-600 text-white p-6">
                    <h3 class="text-xl font-bold">Route Comparison</h3>
                </div>
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b">
                                    <th class="text-left py-3 font-bold text-gray-700">Route</th>
                                    <th class="text-center py-3 font-bold text-gray-700">Difficulty</th>
                                    <th class="text-center py-3 font-bold text-gray-700">Success Rate</th>
                                    <th class="text-center py-3 font-bold text-gray-700">Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 font-medium">Marangu</td>
                                    <td class="text-center py-3"><span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Moderate</span></td>
                                    <td class="text-center py-3">99%</td>
                                    <td class="text-center py-3">5-7 days</td>
                                </tr>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 font-medium">Machame</td>
                                    <td class="text-center py-3"><span class="px-2 py-1 bg-orange-100 text-orange-800 rounded-full text-xs">Challenging</span></td>
                                    <td class="text-center py-3">95%</td>
                                    <td class="text-center py-3">6-8 days</td>
                                </tr>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 font-medium">Lemosho</td>
                                    <td class="text-center py-3"><span class="px-2 py-1 bg-orange-100 text-orange-800 rounded-full text-xs">Challenging</span></td>
                                    <td class="text-center py-3">98%</td>
                                    <td class="text-center py-3">7-9 days</td>
                                </tr>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 font-medium">Northern Circuit</td>
                                    <td class="text-center py-3"><span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">Very Challenging</span></td>
                                    <td class="text-center py-3">97%</td>
                                    <td class="text-center py-3">8-11 days</td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 font-medium">Rongai</td>
                                    <td class="text-center py-3"><span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Moderate</span></td>
                                    <td class="text-center py-3">96%</td>
                                    <td class="text-center py-3">6-7 days</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Climbing Statistics -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="bg-emerald-600 text-white p-6">
                    <h3 class="text-xl font-bold">Climbing Statistics</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-6">
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-gray-700 font-medium">Average Summit Success</span>
                                <span class="text-emerald-600 font-bold">97%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-emerald-600 h-3 rounded-full" style="width: 97%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-gray-700 font-medium">Average Climbing Time</span>
                                <span class="text-emerald-600 font-bold">6-8 days</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-emerald-600 h-3 rounded-full" style="width: 75%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-gray-700 font-medium">Climber Satisfaction</span>
                                <span class="text-emerald-600 font-bold">4.9/5</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-emerald-600 h-3 rounded-full" style="width: 98%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-gray-700 font-medium">Safety Record</span>
                                <span class="text-emerald-600 font-bold">100%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-emerald-600 h-3 rounded-full" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Preparation Guide Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-serif font-bold text-gray-800 mb-4">Climbing Preparation Guide</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Everything you need to know to prepare for your Kilimanjaro adventure
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center group">
                <div class="bg-emerald-50 group-hover:bg-emerald-100 p-6 rounded-2xl mb-4 transition-colors">
                    <i class="ph-bold ph-heart-rate text-4xl text-emerald-600 mb-4"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Physical Fitness</h3>
                <p class="text-gray-600 text-sm">Regular cardio and strength training for 3-6 months before your climb</p>
            </div>
            <div class="text-center group">
                <div class="bg-emerald-50 group-hover:bg-emerald-100 p-6 rounded-2xl mb-4 transition-colors">
                    <i class="ph-bold ph-backpack text-4xl text-emerald-600 mb-4"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Essential Gear</h3>
                <p class="text-gray-600 text-sm">Layered clothing system, proper footwear, and climbing equipment</p>
            </div>
            <div class="text-center group">
                <div class="bg-emerald-50 group-hover:bg-emerald-100 p-6 rounded-2xl mb-4 transition-colors">
                    <i class="ph-bold ph-first-aid-kit text-4xl text-emerald-600 mb-4"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Health & Safety</h3>
                <p class="text-gray-600 text-sm">Medical check-up, altitude sickness prevention, and travel insurance</p>
            </div>
            <div class="text-center group">
                <div class="bg-emerald-50 group-hover:bg-emerald-100 p-6 rounded-2xl mb-4 transition-colors">
                    <i class="ph-bold ph-calendar-check text-4xl text-emerald-600 mb-4"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Best Time to Climb</h3>
                <p class="text-gray-600 text-sm">Dry seasons: January-March and June-October for optimal conditions</p>
            </div>
        </div>
    </div>
</section>

<!-- Altitude Zones Section -->
<section class="py-20 bg-gradient-to-br from-emerald-900 to-emerald-700">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-serif font-bold text-white mb-4">Kilimanjaro Altitude Zones</h2>
            <p class="text-white/90 max-w-2xl mx-auto">
                Experience diverse ecosystems as you ascend from tropical forest to arctic summit
            </p>
        </div>
        
        <div class="space-y-6">
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 flex items-center gap-6">
                <div class="bg-white/20 p-4 rounded-xl">
                    <i class="ph-bold ph-tree text-3xl text-white"></i>
                </div>
                <div class="flex-1">
                    <h3 class="text-xl font-bold text-white mb-2">Forest Zone (800-1,800m)</h3>
                    <p class="text-white/80">Tropical rainforest with diverse wildlife, lush vegetation, and abundant birdlife</p>
                </div>
                <div class="text-white/60 font-mono">Day 1</div>
            </div>
            
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 flex items-center gap-6">
                <div class="bg-white/20 p-4 rounded-xl">
                    <i class="ph-bold ph-plant text-3xl text-white"></i>
                </div>
                <div class="flex-1">
                    <h3 class="text-xl font-bold text-white mb-2">Heath & Moorland (1,800-4,000m)</h3>
                    <p class="text-white/80">Open moorland with giant heathers, lobelias, and spectacular views</p>
                </div>
                <div class="text-white/60 font-mono">Days 2-3</div>
            </div>
            
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 flex items-center gap-6">
                <div class="bg-white/20 p-4 rounded-xl">
                    <i class="ph-bold ph-cloud text-3xl text-white"></i>
                </div>
                <div class="flex-1">
                    <h3 class="text-xl font-bold text-white mb-2">Alpine Desert (4,000-5,000m)</h3>
                    <p class="text-white/80">Rocky terrain with sparse vegetation, dramatic landscapes, and thin air</p>
                </div>
                <div class="text-white/60 font-mono">Days 4-5</div>
            </div>
            
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 flex items-center gap-6">
                <div class="bg-white/20 p-4 rounded-xl">
                    <i class="ph-bold ph-snowflake text-3xl text-white"></i>
                </div>
                <div class="flex-1">
                    <h3 class="text-xl font-bold text-white mb-2">Arctic Zone (5,000-5,895m)</h3>
                    <p class="text-white/80">Glacial ice fields, volcanic crater, and the ultimate summit experience</p>
                </div>
                <div class="text-white/60 font-mono">Summit Day</div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-serif font-bold text-gray-800 mb-4">Climber Success Stories</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Hear from adventurers who conquered Kilimanjaro with our expert guidance
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center">
                        <span class="text-emerald-600 font-bold">JD</span>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">John Davidson</h4>
                        <p class="text-sm text-gray-600">Marangu Route - 7 Days</p>
                    </div>
                </div>
                <div class="flex mb-4">
                    <i class="ph-bold ph-star-fill text-yellow-400"></i>
                    <i class="ph-bold ph-star-fill text-yellow-400"></i>
                    <i class="ph-bold ph-star-fill text-yellow-400"></i>
                    <i class="ph-bold ph-star-fill text-yellow-400"></i>
                    <i class="ph-bold ph-star-fill text-yellow-400"></i>
                </div>
                <p class="text-gray-600 italic">"The guides were exceptional! Their knowledge of the mountain and attention to safety made my first Kilimanjaro climb an unforgettable experience."</p>
            </div>
            
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center">
                        <span class="text-emerald-600 font-bold">SM</span>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">Sarah Mitchell</h4>
                        <p class="text-sm text-gray-600">Machame Route - 7 Days</p>
                    </div>
                </div>
                <div class="flex mb-4">
                    <i class="ph-bold ph-star-fill text-yellow-400"></i>
                    <i class="ph-bold ph-star-fill text-yellow-400"></i>
                    <i class="ph-bold ph-star-fill text-yellow-400"></i>
                    <i class="ph-bold ph-star-fill text-yellow-400"></i>
                    <i class="ph-bold ph-star-fill text-yellow-400"></i>
                </div>
                <p class="text-gray-600 italic">"Reaching Uhuru Peak was a dream come true! The team's support and the acclimatization schedule were perfect."</p>
            </div>
            
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center">
                        <span class="text-emerald-600 font-bold">MC</span>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">Michael Chen</h4>
                        <p class="text-sm text-gray-600">Lemosho Route - 8 Days</p>
                    </div>
                </div>
                <div class="flex mb-4">
                    <i class="ph-bold ph-star-fill text-yellow-400"></i>
                    <i class="ph-bold ph-star-fill text-yellow-400"></i>
                    <i class="ph-bold ph-star-fill text-yellow-400"></i>
                    <i class="ph-bold ph-star-fill text-yellow-400"></i>
                    <i class="ph-bold ph-star-fill text-yellow-400"></i>
                </div>
                <p class="text-gray-600 italic">"The Lemosho route offered stunning scenery and the perfect pace. The equipment provided was top-notch and the food was surprisingly good!"</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-serif font-bold text-gray-800 mb-4">Frequently Asked Questions</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Everything you need to know about climbing Mount Kilimanjaro
            </p>
        </div>
        
        <div class="space-y-6">
            <div class="bg-gray-50 rounded-2xl p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-3">How difficult is climbing Kilimanjaro?</h3>
                <p class="text-gray-600">Kilimanjaro is considered a challenging trek but doesn't require technical climbing skills. With proper preparation and our experienced guides, most people in good physical condition can successfully reach the summit.</p>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-3">What's the best time to climb?</h3>
                <p class="text-gray-600">The best climbing periods are January-March and June-October during the dry seasons. These months offer the best weather conditions and highest summit success rates.</p>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-3">How do I prevent altitude sickness?</h3>
                <p class="text-gray-600">We use proven acclimatization schedules, provide proper hydration, and our guides are trained to recognize and manage altitude symptoms. Taking it slow and staying hydrated are key factors.</p>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-3">What equipment do I need?</h3>
                <p class="text-gray-600">We provide all essential climbing equipment including tents, sleeping bags, and safety gear. You'll need proper hiking boots, layered clothing, and personal items. A detailed packing list is provided upon booking.</p>
            </div>
        </div>
    </div>
</section>
@endsection
