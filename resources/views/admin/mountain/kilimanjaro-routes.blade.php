@extends('layouts.admin')

@section('title', 'Kilimanjaro Routes')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Kilimanjaro Routes</h1>
            <p class="text-gray-600">Manage Mount Kilimanjaro climbing routes and expeditions</p>
        </div>
        <div class="flex flex-wrap gap-3 mt-4 lg:mt-0">
            <a href="{{ route('admin.tours.create') }}?tour_type=mountain" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                <i class="fas fa-plus mr-2"></i>Add New Route
            </a>
            <button onclick="exportRoutes()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                <i class="fas fa-download mr-2"></i>Export Routes
            </button>
        </div>
    </div>

    <!-- Route Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-blue-100 rounded-lg">
                    <i class="fas fa-mountain text-blue-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2 py-1 rounded-full">
                    {{ count($routes) }} Total
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ count($routes) }}</h3>
                <p class="text-sm text-gray-600">Active Routes</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-green-100 rounded-lg">
                    <i class="fas fa-users text-green-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">
                    +12% This Month
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ $routes->sum('bookings_count') ?? 0 }}</h3>
                <p class="text-sm text-gray-600">Total Climbers</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-orange-100 rounded-lg">
                    <i class="fas fa-chart-line text-orange-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-orange-600 bg-orange-50 px-2 py-1 rounded-full">
                    89% Success
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">89%</h3>
                <p class="text-sm text-gray-600">Success Rate</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-purple-100 rounded-lg">
                    <i class="fas fa-star text-purple-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-purple-600 bg-purple-50 px-2 py-1 rounded-full">
                    4.8 Rating
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">4.8</h3>
                <p class="text-sm text-gray-600">Average Rating</p>
            </div>
        </div>
    </div>

    <!-- Routes Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach($routes as $route)
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-shadow">
            <!-- Route Image/Preview -->
            <div class="h-48 bg-gradient-to-br from-gray-700 to-gray-900 rounded-t-xl relative">
                @if(!empty($route->images))
                    <img src="{{ asset($route->images[0] ?? '/images/default-mountain.jpg') }}" alt="{{ $route->name }}" 
                         class="w-full h-full object-cover rounded-t-xl">
                @else
                    <div class="absolute inset-0 flex items-center justify-center text-white">
                        <div class="text-center">
                            <i class="fas fa-mountain text-4xl mb-2"></i>
                            <p class="text-sm">Kilimanjaro Route</p>
                        </div>
                    </div>
                @endif
                
                <!-- Difficulty Badge -->
                <div class="absolute top-4 right-4">
                    <span class="px-3 py-1 text-xs font-medium rounded-full
                        {{ $route->difficulty_level === 'easy' ? 'bg-green-100 text-green-700' : '' }}
                        {{ $route->difficulty_level === 'moderate' ? 'bg-yellow-100 text-yellow-700' : '' }}
                        {{ $route->difficulty_level === 'challenging' ? 'bg-red-100 text-red-700' : '' }}">
                        {{ ucfirst($route->difficulty_level ?? 'moderate') }}
                    </span>
                </div>

                <!-- Duration Badge -->
                <div class="absolute top-4 left-4">
                    <span class="px-3 py-1 text-xs font-medium bg-blue-100 text-blue-700 rounded-full">
                        {{ $route->duration_days }} days
                    </span>
                </div>
            </div>

            <!-- Route Content -->
            <div class="p-6">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-lg font-semibold text-gray-900">{{ $route->name }}</h3>
                    @if($route->featured)
                        <span class="text-yellow-500">
                            <i class="fas fa-star"></i>
                        </span>
                    @endif
                </div>

                <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $route->description }}</p>

                <!-- Route Details -->
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-arrows-alt-v mr-2 text-gray-400"></i>
                        {{ $route->max_altitude ?? '5,895m' }}
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-users mr-2 text-gray-400"></i>
                        {{ $route->max_group_size ?? 12 }} max
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-signal mr-2 text-gray-400"></i>
                        {{ ucfirst($route->difficulty_level ?? 'moderate') }}
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-child mr-2 text-gray-400"></i>
                        {{ $route->min_age ?? 16 }}+ years
                    </div>
                </div>

                <!-- Route Highlights -->
                @if(!empty($route->highlights))
                <div class="mb-4">
                    <p class="text-sm font-medium text-gray-700 mb-2">Route Highlights:</p>
                    <div class="flex flex-wrap gap-1">
                        @foreach(array_slice($route->highlights, 0, 2) as $highlight)
                        <span class="px-2 py-1 bg-emerald-100 text-emerald-700 text-xs rounded-full">
                            {{ $highlight }}
                        </span>
                        @endforeach
                        @if(count($route->highlights) > 2)
                        <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full">
                            +{{ count($route->highlights) - 2 }} more
                        </span>
                        @endif
                    </div>
                </div>
                @endif

                <!-- Stats -->
                <div class="flex items-center justify-between mb-4">
                    <div class="text-sm text-gray-600">
                        <span class="font-medium text-gray-900">{{ $route->bookings_count ?? 0 }}</span> climbers
                    </div>
                    <div class="text-lg font-bold text-emerald-600">
                        ${{ number_format($route->base_price, 0) }}
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex gap-2">
                    <a href="{{ route('admin.tours.show', $route) }}" class="flex-1 px-3 py-2 bg-emerald-100 text-emerald-700 rounded-lg hover:bg-emerald-200 transition-colors text-sm font-medium text-center">
                        View
                    </a>
                    <a href="{{ route('admin.tours.edit', $route) }}" class="flex-1 px-3 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors text-sm font-medium text-center">
                        Edit
                    </a>
                    <button onclick="viewRouteDetails({{ $route->id }})" class="px-3 py-2 bg-purple-100 text-purple-700 rounded-lg hover:bg-purple-200 transition-colors text-sm font-medium">
                        <i class="fas fa-info-circle"></i>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($routes->isEmpty())
    <div class="bg-white rounded-xl shadow-sm p-12 text-center border border-gray-100">
        <i class="fas fa-mountain text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">No Kilimanjaro Routes Found</h3>
        <p class="text-gray-600 mb-6">Get started by adding your first Kilimanjaro climbing route</p>
        <a href="{{ route('admin.tours.create') }}?tour_type=mountain" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
            <i class="fas fa-plus mr-2"></i>Add Route
        </a>
    </div>
    @endif
</div>

<!-- Route Details Modal -->
<div id="route-details-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl p-6 max-w-4xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-semibold text-gray-900">Route Details</h3>
            <button onclick="hideRouteDetails()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <div id="route-details-content">
            <!-- Route details will be loaded here -->
        </div>
    </div>
</div>

<script>
function viewRouteDetails(routeId) {
    fetch(`/api/tours/${routeId}`)
        .then(response => response.json())
        .then(data => {
            const content = document.getElementById('route-details-content');
            content.innerHTML = `
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-4">Route Information</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Route Name:</span>
                                <span class="font-medium">${data.name}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Duration:</span>
                                <span class="font-medium">${data.duration_days} days</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Difficulty:</span>
                                <span class="font-medium">${data.difficulty_level}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Max Altitude:</span>
                                <span class="font-medium">${data.max_altitude || '5,895m'}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Max Group Size:</span>
                                <span class="font-medium">${data.max_group_size || 12}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Minimum Age:</span>
                                <span class="font-medium">${data.min_age || 16}+ years</span>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-4">Pricing & Booking</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Base Price:</span>
                                <span class="font-medium text-emerald-600">$${number_format(data.base_price, 0)}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Total Bookings:</span>
                                <span class="font-medium">${data.bookings_count || 0}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Success Rate:</span>
                                <span class="font-medium">89%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Best Season:</span>
                                <span class="font-medium">Jan-Mar, Jun-Oct</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6">
                    <h4 class="font-semibold text-gray-900 mb-4">Description</h4>
                    <p class="text-gray-600">${data.description || 'No description available.'}</p>
                </div>
                
                ${data.highlights && data.highlights.length > 0 ? `
                <div class="mt-6">
                    <h4 class="font-semibold text-gray-900 mb-4">Route Highlights</h4>
                    <div class="flex flex-wrap gap-2">
                        ${data.highlights.map(highlight => 
                            `<span class="px-3 py-1 bg-emerald-100 text-emerald-700 text-sm rounded-full">${highlight}</span>`
                        ).join('')}
                    </div>
                </div>
                ` : ''}
                
                ${data.what_to_bring && data.what_to_bring.length > 0 ? `
                <div class="mt-6">
                    <h4 class="font-semibold text-gray-900 mb-4">What to Bring</h4>
                    <div class="grid grid-cols-2 gap-2">
                        ${data.what_to_bring.map(item => 
                            `<div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-check text-emerald-500 mr-2"></i>${item}
                            </div>`
                        ).join('')}
                    </div>
                </div>
                ` : ''}
            `;
            
            document.getElementById('route-details-modal').classList.remove('hidden');
        })
        .catch(error => console.error('Error loading route details:', error));
}

function hideRouteDetails() {
    document.getElementById('route-details-modal').classList.add('hidden');
}

function exportRoutes() {
    // Export routes data
    console.log('Exporting Kilimanjaro routes');
}

function number_format(number, decimals) {
    return number.toLocaleString('en-US', { minimumFractionDigits: decimals, maximumFractionDigits: decimals });
}
</script>
@endsection
