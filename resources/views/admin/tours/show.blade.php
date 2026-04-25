@extends('layouts.admin')

@section('title', $tour->name . ' - Tour Details')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $tour->name }}</h1>
            <p class="text-gray-600">Comprehensive tour management and details</p>
        </div>
        <div class="flex gap-3 mt-4 lg:mt-0">
            <a href="{{ route('admin.tours.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-arrow-left mr-2"></i>Back to Tours
            </a>
            <a href="{{ route('admin.tours.edit', $tour) }}" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-pencil mr-2"></i>Edit Tour
            </a>
        </div>
    </div>

    <!-- Tour Overview Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Status</p>
                    <p class="text-lg font-bold mt-1">
                        @switch($tour->status)
                            @case('active')
                                <span class="text-emerald-600">Active</span>
                                @break
                            @case('inactive')
                                <span class="text-gray-600">Inactive</span>
                                @break
                            @case('draft')
                                <span class="text-yellow-600">Draft</span>
                                @break
                            @default
                                <span class="text-gray-600">Unknown</span>
                        @endswitch
                    </p>
                </div>
                <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-flag text-emerald-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Duration</p>
                    <p class="text-lg font-bold text-gray-900 mt-1">{{ $tour->duration_days }} days</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-calendar text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Base Price</p>
                    <p class="text-lg font-bold text-gray-900 mt-1">${{ number_format($tour->base_price, 2) }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-currency-dollar text-purple-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Bookings</p>
                    <p class="text-lg font-bold text-gray-900 mt-1">{{ $tour->bookings->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-users text-orange-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content (2/3 width) -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Tour Description -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="ph-bold ph-info text-emerald-600 text-xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900">Tour Description</h2>
                </div>
                <div class="prose max-w-none">
                    <p class="text-gray-700 leading-relaxed">{{ $tour->description }}</p>
                </div>
                
                @if($tour->highlights)
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Tour Highlights</h3>
                    <ul class="space-y-2">
                        @foreach($tour->highlights as $highlight)
                        <li class="flex items-start">
                            <i class="ph-bold ph-check-circle text-emerald-600 mt-0.5 mr-2 flex-shrink-0"></i>
                            <span class="text-gray-700">{{ $highlight }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <!-- Itinerary -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="ph-bold ph-map-trifold text-blue-600 text-xl"></i>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">Tour Itinerary</h2>
                    </div>
                    <a href="{{ route('admin.tours.itinerary-builder') }}" class="text-sm text-emerald-600 hover:text-emerald-700 font-medium">
                        <i class="ph-bold ph-plus mr-1"></i>Manage Itinerary
                    </a>
                </div>
                
                @if($tour->itineraries->count() > 0)
                    <div class="space-y-4">
                        @foreach($tour->itineraries->sortBy('day_number') as $itinerary)
                        <div class="border-l-4 border-emerald-500 pl-4 pb-4">
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-900">Day {{ $itinerary->day_number }}: {{ $itinerary->title }}</h3>
                                    <p class="text-gray-700 mt-1">{{ $itinerary->description }}</p>
                                    
                                    @if($itinerary->activities || $itinerary->meals || $itinerary->accommodation || $itinerary->transportation)
                                    <div class="mt-3 space-y-2">
                                        @if($itinerary->activities)
                                        <div class="flex items-center text-sm text-gray-600">
                                            <i class="ph-bold ph-activity mr-2"></i>
                                            <span>Activities: {{ implode(', ', $itinerary->activities) }}</span>
                                        </div>
                                        @endif
                                        
                                        @if($itinerary->meals)
                                        <div class="flex items-center text-sm text-gray-600">
                                            <i class="ph-bold ph-pizza mr-2"></i>
                                            <span>Meals: {{ implode(', ', $itinerary->meals) }}</span>
                                        </div>
                                        @endif
                                        
                                        @if($itinerary->accommodation)
                                        <div class="flex items-center text-sm text-gray-600">
                                            <i class="ph-bold ph-bed mr-2"></i>
                                            <span>Accommodation: {{ $itinerary->accommodation }}</span>
                                        </div>
                                        @endif
                                        
                                        @if($itinerary->transportation)
                                        <div class="flex items-center text-sm text-gray-600">
                                            <i class="ph-bold ph-car mr-2"></i>
                                            <span>Transport: {{ $itinerary->transportation }}</span>
                                        </div>
                                        @endif
                                    </div>
                                    @endif
                                </div>
                                <div class="flex gap-2 ml-4">
                                    <a href="{{ route('admin.tours.itinerary-builder') }}" class="p-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                                        <i class="ph-bold ph-pencil"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="ph-bold ph-map-trifold text-gray-400 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No Itinerary Yet</h3>
                        <p class="text-gray-500 mb-4">This tour doesn't have an itinerary defined yet.</p>
                        <a href="{{ route('admin.tours.itinerary-builder') }}" class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                            <i class="ph-bold ph-plus mr-2"></i>Create Itinerary
                        </a>
                    </div>
                @endif
            </div>

            <!-- Recent Bookings -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="ph-bold ph-calendar-check text-orange-600 text-xl"></i>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">Recent Bookings</h2>
                    </div>
                    <a href="{{ route('admin.bookings.index') }}?tour_id={{ $tour->id }}" class="text-sm text-emerald-600 hover:text-emerald-700 font-medium">
                        View All
                    </a>
                </div>
                
                @if($tour->bookings->count() > 0)
                    <div class="space-y-3">
                        @foreach($tour->bookings->take(5) as $booking)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="ph-bold ph-user text-emerald-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">{{ $booking->customer_name }}</p>
                                    <p class="text-sm text-gray-500">{{ $booking->customer_email }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-medium text-gray-900">${{ number_format($booking->total_price, 2) }}</p>
                                <p class="text-sm text-gray-500">{{ $booking->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="ph-bold ph-calendar-x text-gray-400 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No Bookings Yet</h3>
                        <p class="text-gray-500">This tour hasn't received any bookings yet.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Sidebar (1/3 width) -->
        <div class="space-y-6">
            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="ph-bold ph-bolt text-purple-600 text-xl"></i>
                    </div>
                    <h2 class="text-lg font-bold text-gray-900">Quick Actions</h2>
                </div>
                
                <div class="space-y-3">
                    <a href="{{ route('admin.tours.edit', $tour) }}" class="w-full flex items-center justify-center px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors font-medium">
                        <i class="ph-bold ph-pencil mr-2"></i>Edit Tour
                    </a>
                    
                    <a href="{{ route('admin.tours.itinerary-builder') }}?tour_id={{ $tour->id }}" class="w-full flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                        <i class="ph-bold ph-map-trifold mr-2"></i>Manage Itinerary
                    </a>
                    
                    <a href="{{ route('admin.tours.availability-pricing') }}?tour_id={{ $tour->id }}" class="w-full flex items-center justify-center px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors font-medium">
                        <i class="ph-bold ph-calendar-check mr-2"></i>Availability
                    </a>
                    
                    <a href="{{ route('tours.show', $tour->slug) }}" class="w-full flex items-center justify-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors font-medium" target="_blank">
                        <i class="ph-bold ph-eye mr-2"></i>Preview Tour
                    </a>
                </div>
            </div>

            <!-- Tour Details -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="ph-bold ph-info text-blue-600 text-xl"></i>
                    </div>
                    <h2 class="text-lg font-bold text-gray-900">Tour Details</h2>
                </div>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Tour Type</label>
                        <p class="text-gray-900 capitalize">{{ $tour->tour_type ?? 'safari' }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Location</label>
                        <p class="text-gray-900">{{ $tour->location }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Difficulty</label>
                        <p class="text-gray-900 capitalize">{{ $tour->difficulty_level ?? 'easy' }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Max Group Size</label>
                        <p class="text-gray-900">{{ $tour->max_group_size ?? 20 }} people</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Min Age</label>
                        <p class="text-gray-900">{{ $tour->min_age ?? 0 }} years</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Created</label>
                        <p class="text-gray-900">{{ $tour->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>

            <!-- Linked Destinations -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="ph-bold ph-map-pin text-emerald-600 text-xl"></i>
                        </div>
                        <h2 class="text-lg font-bold text-gray-900">Destinations</h2>
                    </div>
                    <a href="{{ route('admin.tours.destinations') }}" class="text-sm text-emerald-600 hover:text-emerald-700 font-medium">
                        Manage
                    </a>
                </div>
                
                @if($tour->destinations->count() > 0)
                    <div class="space-y-3">
                        @foreach($tour->destinations as $destination)
                        <div class="p-3 bg-gray-50 rounded-lg">
                            <p class="font-medium text-gray-900">{{ $destination->name }}</p>
                            <p class="text-sm text-gray-600">{{ $destination->location }}</p>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-4">
                        <p class="text-gray-500 text-sm">No destinations linked</p>
                    </div>
                @endif
            </div>

            <!-- Equipment -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="ph-bold ph-backpack text-orange-600 text-xl"></i>
                        </div>
                        <h2 class="text-lg font-bold text-gray-900">Equipment</h2>
                    </div>
                    <a href="{{ route('admin.mountain.equipment-management') }}" class="text-sm text-emerald-600 hover:text-emerald-700 font-medium">
                        Manage
                    </a>
                </div>
                
                @if($tour->equipment->count() > 0)
                    <div class="space-y-3">
                        @foreach($tour->equipment as $equipment)
                        <div class="p-3 bg-gray-50 rounded-lg">
                            <p class="font-medium text-gray-900">{{ $equipment->name }}</p>
                            <p class="text-sm text-gray-600">{{ $equipment->type }} • {{ $equipment->condition }}</p>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-4">
                        <p class="text-gray-500 text-sm">No equipment required</p>
                    </div>
                @endif
            </div>

            <!-- Recommended Guides -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="ph-bold ph-user-check text-blue-600 text-xl"></i>
                        </div>
                        <h2 class="text-lg font-bold text-gray-900">Recommended Guides</h2>
                    </div>
                    <a href="{{ route('admin.mountain.guide-assignments') }}" class="text-sm text-emerald-600 hover:text-emerald-700 font-medium">
                        Manage
                    </a>
                </div>
                
                @if($tour->recommendedGuides->count() > 0)
                    <div class="space-y-3">
                        @foreach($tour->recommendedGuides as $guide)
                        <div class="p-3 bg-gray-50 rounded-lg">
                            <p class="font-medium text-gray-900">{{ $guide->name }}</p>
                            <p class="text-sm text-gray-600">{{ $guide->email }}</p>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-4">
                        <p class="text-gray-500 text-sm">No guides recommended</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
