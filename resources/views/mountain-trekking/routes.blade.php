@extends('layouts.public')

@section('title', 'Mountain Trekking Routes - Kilimanjaro Climbing Paths')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-emerald-50">
    <!-- Enhanced Hero Section -->
    <div class="relative bg-gradient-to-r from-emerald-800 to-orange-600 text-white">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative container mx-auto px-4 pt-24 pb-16">
            <div class="text-center max-w-4xl mx-auto">
                <!-- Premium Badge -->
                <div class="flex items-center justify-center gap-3 mb-6 flex-wrap">
                    <span class="px-4 py-2 bg-gradient-to-r from-emerald-800 to-orange-600 text-white rounded-full text-sm font-bold shadow-lg">
                        <i class="ph-bold ph-map-trifold mr-2"></i>TREKKING ROUTES
                    </span>
                    <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-sm font-medium">
                        6 Classic Routes
                    </span>
                </div>
                
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
                @forelse($routes as $route)
                    <!-- Dynamic Route Card -->
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all transform hover:scale-105">
                        <div class="h-48 bg-gradient-to-br from-emerald-700 to-orange-500 relative">
                            @if($route->images && count($route->images) > 0)
                                <img src="{{ $route->images[0] }}" alt="{{ $route->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <i class="ph-bold ph-mountains text-white text-6xl"></i>
                                </div>
                            @endif
                            
                            @if($route->is_popular)
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1">
                                <span class="text-sm font-bold text-emerald-800">Most Popular</span>
                            </div>
                            @endif
                            
                            @if($route->success_rate)
                            <div class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm rounded-lg px-3 py-2">
                                <span class="text-xs font-bold text-gray-900">SUCCESS RATE: {{ $route->success_rate }}</span>
                            </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $route->name }}</h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                {{ $route->description }}
                            </p>
                            <div class="space-y-2 mb-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Duration</span>
                                    <span class="font-bold text-emerald-600">{{ $route->duration }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Difficulty</span>
                                    <span class="font-bold text-orange-600">{{ $route->difficulty }}</span>
                                </div>
                                @if($route->price_from)
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Price From</span>
                                    <span class="font-bold text-blue-600">${{ number_format($route->price_from, 0) }}</span>
                                </div>
                                @endif
                                @if($route->best_season)
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Best Season</span>
                                    <span class="font-bold text-purple-600">{{ $route->best_season }}</span>
                                </div>
                                @endif
                            </div>
                            
                            @if($route->highlights)
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach(array_slice($route->highlights, 0, 3) as $highlight)
                                    <span class="px-2 py-1 bg-emerald-100 text-emerald-700 rounded text-xs font-medium">{{ $highlight }}</span>
                                @endforeach
                            </div>
                            @endif
                            
                            <a href="{{ route('mountain-trekking.routes.show', $route->slug) }}" class="block w-full text-center px-4 py-3 bg-gradient-to-r from-emerald-800 to-orange-600 text-white rounded-lg font-semibold hover:from-emerald-900 hover:to-orange-700 transition-all">
                                <i class="ph-bold ph-info mr-2"></i>View Details
                            </a>
                        </div>
                    </div>
                @empty
                    <!-- Fallback if no routes found -->
                    <div class="col-span-full py-20 text-center">
                        <div class="w-20 h-20 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="ph-bold ph-mountains text-emerald-600 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">No Routes Available</h3>
                        <p class="text-gray-600">We are currently updating our trekking routes. Please check back soon.</p>
                    </div>
                @endforelse
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
                            @foreach($routes as $route)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 font-bold text-gray-900">{{ $route->name }}</td>
                                <td class="px-6 py-4 text-center">{{ $route->duration }}</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="px-2 py-1 rounded text-xs font-medium 
                                        {{ strtolower($route->difficulty) == 'moderate' ? 'bg-yellow-100 text-yellow-700' : 
                                           (strtolower($route->difficulty) == 'high' ? 'bg-orange-100 text-orange-700' : 'bg-red-100 text-red-700') }}">
                                        {{ $route->difficulty }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center font-bold text-emerald-600">{{ $route->success_rate }}</td>
                                <td class="px-6 py-4 text-center">{{ $route->accommodation ?? 'Camping' }}</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center">
                                        @php $stars = rand(3, 5); @endphp
                                        @for($i = 0; $i < 5; $i++)
                                            <i class="ph-bold ph-star{{ $i < $stars ? '-fill' : '' }} text-yellow-400"></i>
                                        @endfor
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">{{ $route->crowd_level ?? 'Low' }}</td>
                            </tr>
                            @endforeach
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
