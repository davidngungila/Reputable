@extends('layouts.public')

@section('title', $mountain->name . ' - Trekking Routes')

@section('content')
<!-- Hero Section -->
<section class="relative h-64 bg-cover bg-center" style="background-image: url('{{ !empty($mountain->images) ? $mountain->images[0] : 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468773/tree-2600482_1920_c50vn6.jpg' }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative container mx-auto px-4 h-full flex items-center">
        <div class="text-white">
            <h1 class="text-4xl font-bold mb-2">{{ $mountain->name }} Routes</h1>
            <p class="text-lg">Choose your perfect climbing route</p>
        </div>
    </div>
</section>

<!-- Breadcrumb -->
<section class="py-4 bg-gray-50">
    <div class="container mx-auto px-4">
        <nav class="flex text-sm">
            <a href="{{ route('mountains.index') }}" class="text-gray-600 hover:text-gray-900">Mountains</a>
            <span class="mx-2 text-gray-400">/</span>
            <a href="{{ route('mountains.show', $mountain->slug) }}" class="text-gray-600 hover:text-gray-900">{{ $mountain->name }}</a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-gray-900 font-medium">Routes</span>
        </nav>
    </div>
</section>

<!-- Routes Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Available Routes</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Each route offers a unique experience with different difficulty levels, durations, and success rates</p>
        </div>

        @if($mountain->routes && count($mountain->routes) > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($mountain->routes as $route)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-6 text-white">
                    <h3 class="text-2xl font-bold mb-2">{{ $route['name'] }}</h3>
                    <div class="flex items-center justify-between">
                        <span class="text-sm">{{ $route['duration'] }}</span>
                        <span class="bg-white/20 px-2 py-1 rounded text-xs">{{ $route['difficulty'] }}</span>
                    </div>
                </div>
                
                <div class="p-6">
                    <p class="text-gray-600 mb-6">{{ $route['description'] }}</p>
                    
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-600">{{ $route['success_rate'] }}</div>
                            <div class="text-sm text-gray-500">Success Rate</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-600">${{ number_format($route['price'], 2) }}</div>
                            <div class="text-sm text-gray-500">From</div>
                        </div>
                    </div>

                    @if(!empty($route['highlights']))
                    <div class="mb-6">
                        <h4 class="font-semibold mb-2">Route Highlights</h4>
                        <ul class="space-y-1">
                            @foreach($route['highlights'] as $highlight)
                            <li class="flex items-start text-sm text-gray-600">
                                <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $highlight }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="flex gap-3">
                        <button class="flex-1 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition" onclick="showRouteDetails('{{ $route['name'] }}')">
                            View Details
                        </button>
                        <a href="/contact?route={{ urlencode($route['name']) }}&mountain={{ urlencode($mountain->name) }}" class="flex-1 border border-blue-600 text-blue-600 py-2 px-4 rounded hover:bg-blue-50 transition text-center">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12">
            <div class="bg-gray-100 rounded-lg p-8 max-w-2xl mx-auto">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                </svg>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Routes Coming Soon</h3>
                <p class="text-gray-600">We're currently updating our route information for {{ $mountain->name }}. Please check back soon or contact us for current route availability.</p>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Route Comparison -->
@if($mountain->routes && count($mountain->routes) > 2)
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-8 text-center">Route Comparison</h2>
        <div class="bg-white rounded-lg shadow-lg overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Route</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duration</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Difficulty</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Success Rate</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price From</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($mountain->routes as $route)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $route['name'] }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $route['duration'] }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                @if($route['difficulty'] === 'Moderate') bg-green-100 text-green-800
                                @elseif($route['difficulty'] === 'Strenuous') bg-yellow-100 text-yellow-800
                                @elseif($route['difficulty'] === 'Very Strenuous') bg-red-100 text-red-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ $route['difficulty'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $route['success_rate'] }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">${{ number_format($route['price'], 2) }}</div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-16 bg-blue-600">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Need Help Choosing a Route?</h2>
        <p class="text-blue-100 mb-8 max-w-2xl mx-auto">Our expert team can help you select the perfect route based on your experience, fitness level, and preferences.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/contact" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                Get Expert Advice
            </a>
            <a href="{{ route('mountains.guides', $mountain->slug) }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition">
                Meet Our Guides
            </a>
        </div>
    </div>
</section>

<!-- Route Details Modal -->
<div id="routeModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-lg bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900" id="modalTitle"></h3>
                <button onclick="closeRouteDetails()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div id="modalContent"></div>
        </div>
    </div>
</div>

<script>
function showRouteDetails(routeName) {
    // This would typically fetch detailed route information
    document.getElementById('modalTitle').textContent = routeName;
    document.getElementById('modalContent').innerHTML = `
        <p class="text-gray-600 mb-4">Detailed information about ${routeName} would appear here.</p>
        <div class="space-y-3">
            <div>
                <strong>Day 1:</strong> Start point to first camp
            </div>
            <div>
                <strong>Day 2:</strong> Continue ascent to higher altitude
            </div>
            <div>
                <strong>Day 3:</strong> Summit attempt and descent
            </div>
        </div>
        <div class="mt-6 flex gap-3">
            <a href="/contact?route=${encodeURIComponent(routeName)}" class="flex-1 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition text-center">
                Book This Route
            </a>
            <button onclick="closeRouteDetails()" class="flex-1 border border-gray-300 text-gray-700 py-2 px-4 rounded hover:bg-gray-50 transition">
                Close
            </button>
        </div>
    `;
    document.getElementById('routeModal').classList.remove('hidden');
}

function closeRouteDetails() {
    document.getElementById('routeModal').classList.add('hidden');
}
</script>
@endsection
