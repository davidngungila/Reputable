@extends('layouts.admin')

@section('title', 'Beach Activities')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Beach Activities</h1>
            <p class="text-gray-600">Manage coastal adventures and water activities</p>
        </div>
        <div class="flex flex-wrap gap-3 mt-4 lg:mt-0">
            <a href="{{ route('admin.activities.create') }}?activity_type=beach" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                <i class="fas fa-plus mr-2"></i>Add Beach Activity
            </a>
            <a href="{{ route('admin.activities.view-all') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors text-sm font-medium">
                <i class="fas fa-list mr-2"></i>All Activities
            </a>
        </div>
    </div>

    <!-- Beach Activities Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-blue-100 rounded-lg">
                    <i class="fas fa-umbrella-beach text-blue-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2 py-1 rounded-full">
                    {{ count($activities) }} Total
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ count($activities) }}</h3>
                <p class="text-sm text-gray-600">Beach Activities</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-green-100 rounded-lg">
                    <i class="fas fa-users text-green-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">
                    +22% This Month
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ $activities->sum('bookings_count') ?? 0 }}</h3>
                <p class="text-sm text-gray-600">Total Bookings</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-orange-100 rounded-lg">
                    <i class="fas fa-star text-orange-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-orange-600 bg-orange-50 px-2 py-1 rounded-full">
                    4.8 Rating
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">4.8</h3>
                <p class="text-sm text-gray-600">Avg. Rating</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-cyan-100 rounded-lg">
                    <i class="fas fa-water text-cyan-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-cyan-600 bg-cyan-50 px-2 py-1 rounded-full">
                    Water Sports
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">15+</h3>
                <p class="text-sm text-gray-600">Water Activities</p>
            </div>
        </div>
    </div>

    <!-- Beach Experience Categories -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-xl p-6 text-white">
            <div class="flex items-center justify-between mb-4">
                <i class="fas fa-swimming-pool text-3xl text-blue-200"></i>
                <span class="px-3 py-1 bg-blue-500 text-white text-xs rounded-full">
                    {{ $activities->where('name', 'like', '%swim%')->count() }} Tours
                </span>
            </div>
            <h3 class="text-xl font-semibold mb-2">Water Sports</h3>
            <p class="text-blue-100 text-sm mb-4">Exciting water activities and adventures</p>
            <div class="flex items-center text-sm text-blue-200">
                <i class="fas fa-info-circle mr-2"></i>
                <span>Snorkeling, diving, kayaking</span>
            </div>
        </div>

        <div class="bg-gradient-to-r from-cyan-600 to-cyan-700 rounded-xl p-6 text-white">
            <div class="flex items-center justify-between mb-4">
                <i class="fas fa-ship text-3xl text-cyan-200"></i>
                <span class="px-3 py-1 bg-cyan-500 text-white text-xs rounded-full">
                    {{ $activities->where('name', 'like', '%boat%')->count() }} Tours
                </span>
            </div>
            <h3 class="text-xl font-semibold mb-2">Boat Tours</h3>
            <p class="text-cyan-100 text-sm mb-4">Coastal boat excursions and sailing</p>
            <div class="flex items-center text-sm text-cyan-200">
                <i class="fas fa-info-circle mr-2"></i>
                <span>Dhow cruises, island hopping</span>
            </div>
        </div>

        <div class="bg-gradient-to-r from-teal-600 to-teal-700 rounded-xl p-6 text-white">
            <div class="flex items-center justify-between mb-4">
                <i class="fas fa-sun text-3xl text-teal-200"></i>
                <span class="px-3 py-1 bg-teal-500 text-white text-xs rounded-full">
                    {{ $activities->where('name', 'like', '%relax%')->count() }} Tours
                </span>
            </div>
            <h3 class="text-xl font-semibold mb-2">Beach Relaxation</h3>
            <p class="text-teal-100 text-sm mb-4">Peaceful beach experiences and wellness</p>
            <div class="flex items-center text-sm text-teal-200">
                <i class="fas fa-info-circle mr-2"></i>
                <span>Beach yoga, sunset viewing</span>
            </div>
        </div>
    </div>

    <!-- Beach Activities Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach($activities as $activity)
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-shadow">
            <!-- Activity Image -->
            <div class="h-48 bg-gradient-to-br from-blue-400 to-cyan-600 rounded-t-xl relative">
                @if(!empty($activity->images) && count($activity->images) > 0)
                    <img src="{{ asset($activity->images[0]) }}" alt="{{ $activity->name }}" 
                         class="w-full h-full object-cover rounded-t-xl">
                @else
                    <div class="absolute inset-0 flex items-center justify-center text-white">
                        <div class="text-center">
                            <i class="fas fa-umbrella-beach text-4xl mb-2"></i>
                            <p class="text-sm">Beach Activity</p>
                        </div>
                    </div>
                @endif
                
                <!-- Status Badge -->
                <div class="absolute top-4 right-4">
                    <span class="px-3 py-1 text-xs font-medium rounded-full
                        {{ $activity->status === 'active' ? 'bg-green-100 text-green-700' : '' }}
                        {{ $activity->status === 'inactive' ? 'bg-gray-100 text-gray-700' : '' }}
                        {{ $activity->status === 'draft' ? 'bg-yellow-100 text-yellow-700' : '' }}">
                        {{ ucfirst($activity->status) }}
                    </span>
                </div>

                <!-- Featured Badge -->
                @if($activity->featured)
                <div class="absolute top-4 left-4">
                    <span class="px-3 py-1 text-xs font-medium bg-yellow-100 text-yellow-700 rounded-full">
                        <i class="fas fa-star mr-1"></i>Featured
                    </span>
                </div>
                @endif
            </div>

            <!-- Activity Content -->
            <div class="p-6">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-lg font-semibold text-gray-900">{{ $activity->name }}</h3>
                    <div class="text-lg font-bold text-blue-600">
                        ${{ number_format($activity->price, 0) }}
                    </div>
                </div>

                <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $activity->description }}</p>

                <!-- Activity Details -->
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-clock mr-2 text-gray-400"></i>
                        {{ $activity->duration }}
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-map-marker-alt mr-2 text-gray-400"></i>
                        {{ $activity->location }}
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-users mr-2 text-gray-400"></i>
                        {{ $activity->group_size ?? 15 }} max
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-child mr-2 text-gray-400"></i>
                        {{ $activity->age_requirement ?? 'All' }} ages
                    </div>
                </div>

                <!-- Beach Highlights -->
                @if(!empty($activity->highlights))
                <div class="mb-4">
                    <p class="text-sm font-medium text-gray-700 mb-2">Beach Highlights:</p>
                    <div class="flex flex-wrap gap-1">
                        @foreach(array_slice($activity->highlights, 0, 3) as $highlight)
                        <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs rounded-full">
                            {{ $highlight }}
                        </span>
                        @endforeach
                        @if(count($activity->highlights) > 3)
                        <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full">
                            +{{ count($activity->highlights) - 3 }} more
                        </span>
                        @endif
                    </div>
                </div>
                @endif

                <!-- Stats -->
                <div class="flex items-center justify-between mb-4">
                    <div class="text-sm text-gray-600">
                        <span class="font-medium text-gray-900">{{ $activity->tours_count ?? 0 }}</span> tours
                    </div>
                    <div class="text-sm text-gray-600">
                        <span class="font-medium text-gray-900">{{ $activity->bookings_count ?? 0 }}</span> bookings
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex gap-2">
                    <a href="{{ route('admin.activities.show', $activity) }}" class="flex-1 px-3 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors text-sm font-medium text-center">
                        View
                    </a>
                    <a href="{{ route('admin.activities.edit', $activity) }}" class="flex-1 px-3 py-2 bg-cyan-100 text-cyan-700 rounded-lg hover:bg-cyan-200 transition-colors text-sm font-medium text-center">
                        Edit
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($activities->isEmpty())
    <div class="bg-white rounded-xl shadow-sm p-12 text-center border border-gray-100">
        <i class="fas fa-umbrella-beach text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">No Beach Activities Found</h3>
        <p class="text-gray-600 mb-6">Get started by adding your first beach activity experience</p>
        <a href="{{ route('admin.activities.create') }}?activity_type=beach" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
            <i class="fas fa-plus mr-2"></i>Add Beach Activity
        </a>
    </div>
    @endif
</div>
@endsection
