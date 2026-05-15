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
                    Your comprehensive guide to mountain trekking in Tanzania. Explore our available routes captured from our database, each offering unique challenges and breathtaking views.
                </p>
            </div>
        </div>
    </div>

    <!-- Trekking Routes Section -->
    <section id="routes" class="py-20 bg-gradient-to-br from-gray-50 to-emerald-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Trekking Routes
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Explore our available mountain trekking routes captured from our database, each offering unique challenges and breathtaking views.
                </p>
            </div>
            
            @if($routes->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($routes as $route)
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-shadow">
                    <div class="h-48 bg-gradient-to-br from-emerald-400 to-blue-500 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            @if($route->images && !empty($route->images[0]))
                                <img src="{{ $route->images[0] }}" alt="{{ $route->name }}" class="w-full h-full object-cover">
                            @else
                                <i class="ph-bold ph-mountains text-white text-6xl"></i>
                            @endif
                        </div>
                        @if($route->difficulty)
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1">
                            <span class="text-sm font-bold text-emerald-700">{{ $route->difficulty }}</span>
                        </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $route->name }}</h3>
                        <div class="space-y-3 mb-4">
                            @if($route->duration)
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-clock mr-2 text-emerald-600"></i>
                                <span>{{ $route->duration }}</span>
                            </div>
                            @endif
                            @if($route->difficulty)
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-chart-line mr-2 text-emerald-600"></i>
                                <span>Difficulty: {{ $route->difficulty }}</span>
                            </div>
                            @endif
                            @if($route->duration_days)
                            <div class="flex items-center text-gray-600">
                                <i class="ph-bold ph-users mr-2 text-emerald-600"></i>
                                <span>{{ $route->duration_days }} Days</span>
                            </div>
                            @endif
                        </div>
                        @if($route->description)
                        <p class="text-gray-600 mb-4">
                            {{ Str::limit($route->description, 150) }}
                        </p>
                        @endif
                        <div class="flex items-center justify-between">
                            @if($route->success_rate)
                            <span class="text-emerald-600 font-bold">Success Rate: {{ $route->success_rate }}</span>
                            @else
                            <span class="text-emerald-600 font-bold">Available</span>
                            @endif
                            <a href="{{ route('mountain-trekking.routes.show', $route->slug) }}" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12">
                <i class="ph-bold ph-map-trifold text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-400 font-medium">No trekking routes available at the moment.</p>
                <p class="text-gray-500 text-sm mt-2">Please check back soon for updated route information.</p>
            </div>
            @endif
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
