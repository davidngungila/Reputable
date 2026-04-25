@extends('layouts.admin')

@section('title', 'Cultural Tours')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Cultural Tours</h1>
            <p class="text-gray-600">Manage traditional experiences and cultural activities</p>
        </div>
        <div class="flex flex-wrap gap-3 mt-4 lg:mt-0">
            <a href="{{ route('admin.activities.create') }}?activity_type=cultural" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors text-sm font-medium">
                <i class="fas fa-plus mr-2"></i>Add Cultural Tour
            </a>
            <a href="{{ route('admin.activities.view-all') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors text-sm font-medium">
                <i class="fas fa-list mr-2"></i>All Activities
            </a>
        </div>
    </div>

    <!-- Cultural Tours Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-purple-100 rounded-lg">
                    <i class="fas fa-theater-masks text-purple-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-purple-600 bg-purple-50 px-2 py-1 rounded-full">
                    {{ count($activities) }} Total
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ count($activities) }}</h3>
                <p class="text-sm text-gray-600">Cultural Tours</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-green-100 rounded-lg">
                    <i class="fas fa-users text-green-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">
                    +15% This Month
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
                    4.9 Rating
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">4.9</h3>
                <p class="text-sm text-gray-600">Avg. Rating</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-blue-100 rounded-lg">
                    <i class="fas fa-globe text-blue-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2 py-1 rounded-full">
                    Authentic
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">100%</h3>
                <p class="text-sm text-gray-600">Authentic</p>
            </div>
        </div>
    </div>

    <!-- Cultural Experience Categories -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-gradient-to-r from-purple-600 to-purple-700 rounded-xl p-6 text-white">
            <div class="flex items-center justify-between mb-4">
                <i class="fas fa-village text-3xl text-purple-200"></i>
                <span class="px-3 py-1 bg-purple-500 text-white text-xs rounded-full">
                    {{ $activities->where('location', 'like', '%village%')->count() }} Tours
                </span>
            </div>
            <h3 class="text-xl font-semibold mb-2">Village Visits</h3>
            <p class="text-purple-100 text-sm mb-4">Experience authentic local village life and traditions</p>
            <div class="flex items-center text-sm text-purple-200">
                <i class="fas fa-info-circle mr-2"></i>
                <span>Traditional lifestyle immersion</span>
            </div>
        </div>

        <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 rounded-xl p-6 text-white">
            <div class="flex items-center justify-between mb-4">
                <i class="fas fa-drum text-3xl text-indigo-200"></i>
                <span class="px-3 py-1 bg-indigo-500 text-white text-xs rounded-full">
                    {{ $activities->where('location', 'like', '%dance%')->count() }} Tours
                </span>
            </div>
            <h3 class="text-xl font-semibold mb-2">Traditional Dance</h3>
            <p class="text-indigo-100 text-sm mb-4">Witness and participate in traditional dance performances</p>
            <div class="flex items-center text-sm text-indigo-200">
                <i class="fas fa-info-circle mr-2"></i>
                <span>Cultural performances</span>
            </div>
        </div>

        <div class="bg-gradient-to-r from-pink-600 to-pink-700 rounded-xl p-6 text-white">
            <div class="flex items-center justify-between mb-4">
                <i class="fas fa-utensils text-3xl text-pink-200"></i>
                <span class="px-3 py-1 bg-pink-500 text-white text-xs rounded-full">
                    {{ $activities->where('location', 'like', '%food%')->count() }} Tours
                </span>
            </div>
            <h3 class="text-xl font-semibold mb-2">Cultural Cuisine</h3>
            <p class="text-pink-100 text-sm mb-4">Taste authentic local dishes and cooking experiences</p>
            <div class="flex items-center text-sm text-pink-200">
                <i class="fas fa-info-circle mr-2"></i>
                <span>Traditional food experiences</span>
            </div>
        </div>
    </div>

    <!-- Cultural Tours Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach($activities as $activity)
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-shadow">
            <!-- Activity Image -->
            <div class="h-48 bg-gradient-to-br from-purple-400 to-purple-600 rounded-t-xl relative">
                @if(!empty($activity->images) && count($activity->images) > 0)
                    <img src="{{ asset($activity->images[0]) }}" alt="{{ $activity->name }}" 
                         class="w-full h-full object-cover rounded-t-xl">
                @else
                    <div class="absolute inset-0 flex items-center justify-center text-white">
                        <div class="text-center">
                            <i class="fas fa-theater-masks text-4xl mb-2"></i>
                            <p class="text-sm">Cultural Experience</p>
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
                    <div class="text-lg font-bold text-purple-600">
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
                        {{ $activity->group_size ?? 20 }} max
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-child mr-2 text-gray-400"></i>
                        {{ $activity->age_requirement ?? 'All' }} ages
                    </div>
                </div>

                <!-- Cultural Highlights -->
                @if(!empty($activity->highlights))
                <div class="mb-4">
                    <p class="text-sm font-medium text-gray-700 mb-2">Cultural Highlights:</p>
                    <div class="flex flex-wrap gap-1">
                        @foreach(array_slice($activity->highlights, 0, 3) as $highlight)
                        <span class="px-2 py-1 bg-purple-100 text-purple-700 text-xs rounded-full">
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
                    <a href="{{ route('admin.activities.show', $activity) }}" class="flex-1 px-3 py-2 bg-purple-100 text-purple-700 rounded-lg hover:bg-purple-200 transition-colors text-sm font-medium text-center">
                        View
                    </a>
                    <a href="{{ route('admin.activities.edit', $activity) }}" class="flex-1 px-3 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors text-sm font-medium text-center">
                        Edit
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($activities->isEmpty())
    <div class="bg-white rounded-xl shadow-sm p-12 text-center border border-gray-100">
        <i class="fas fa-theater-masks text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">No Cultural Tours Found</h3>
        <p class="text-gray-600 mb-6">Get started by adding your first cultural tour experience</p>
        <a href="{{ route('admin.activities.create') }}?activity_type=cultural" class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors">
            <i class="fas fa-plus mr-2"></i>Add Cultural Tour
        </a>
    </div>
    @endif
</div>
@endsection
