@extends('layouts.admin')

@section('title', 'Wildlife Experiences')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Wildlife Experiences</h1>
            <p class="text-gray-600">Manage safari adventures and wildlife encounters</p>
        </div>
        <div class="flex flex-wrap gap-3 mt-4 lg:mt-0">
            <a href="{{ route('admin.activities.create') }}?activity_type=wildlife" class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors text-sm font-medium">
                <i class="fas fa-plus mr-2"></i>Add Wildlife Experience
            </a>
            <a href="{{ route('admin.activities.view-all') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors text-sm font-medium">
                <i class="fas fa-list mr-2"></i>All Activities
            </a>
        </div>
    </div>

    <!-- Wildlife Experiences Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-orange-100 rounded-lg">
                    <i class="fas fa-paw text-orange-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-orange-600 bg-orange-50 px-2 py-1 rounded-full">
                    {{ count($activities) }} Total
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ count($activities) }}</h3>
                <p class="text-sm text-gray-600">Wildlife Experiences</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-green-100 rounded-lg">
                    <i class="fas fa-users text-green-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">
                    +18% This Month
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ $activities->sum('bookings_count') ?? 0 }}</h3>
                <p class="text-sm text-gray-600">Total Bookings</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-yellow-100 rounded-lg">
                    <i class="fas fa-star text-yellow-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-yellow-600 bg-yellow-50 px-2 py-1 rounded-full">
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
                <div class="p-3 bg-emerald-100 rounded-lg">
                    <i class="fas fa-binoculars text-emerald-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full">
                    Big Five
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">5/5</h3>
                <p class="text-sm text-gray-600">Big Five Coverage</p>
            </div>
        </div>
    </div>

    <!-- Wildlife Experience Categories -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-gradient-to-r from-orange-600 to-orange-700 rounded-xl p-6 text-white">
            <div class="flex items-center justify-between mb-4">
                <i class="fas fa-binoculars text-3xl text-orange-200"></i>
                <span class="px-3 py-1 bg-orange-500 text-white text-xs rounded-full">
                    {{ $activities->where('name', 'like', '%game%')->count() }} Tours
                </span>
            </div>
            <h3 class="text-xl font-semibold mb-2">Game Drives</h3>
            <p class="text-orange-100 text-sm mb-4">Classic safari game drives and wildlife viewing</p>
            <div class="flex items-center text-sm text-orange-200">
                <i class="fas fa-info-circle mr-2"></i>
                <span>Big Five tracking, photography</span>
            </div>
        </div>

        <div class="bg-gradient-to-r from-yellow-600 to-yellow-700 rounded-xl p-6 text-white">
            <div class="flex items-center justify-between mb-4">
                <i class="fas fa-walking text-3xl text-yellow-200"></i>
                <span class="px-3 py-1 bg-yellow-500 text-white text-xs rounded-full">
                    {{ $activities->where('name', 'like', '%walk%')->count() }} Tours
                </span>
            </div>
            <h3 class="text-xl font-semibold mb-2">Walking Safaris</h3>
            <p class="text-yellow-100 text-sm mb-4">Guided walking tours through wildlife areas</p>
            <div class="flex items-center text-sm text-yellow-200">
                <i class="fas fa-info-circle mr-2"></i>
                <span>Nature walks, tracking experiences</span>
            </div>
        </div>

        <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 rounded-xl p-6 text-white">
            <div class="flex items-center justify-between mb-4">
                <i class="fas fa-camera text-3xl text-emerald-200"></i>
                <span class="px-3 py-1 bg-emerald-500 text-white text-xs rounded-full">
                    {{ $activities->where('name', 'like', '%photo%')->count() }} Tours
                </span>
            </div>
            <h3 class="text-xl font-semibold mb-2">Photography Tours</h3>
            <p class="text-emerald-100 text-sm mb-4">Specialized wildlife photography experiences</p>
            <div class="flex items-center text-sm text-emerald-200">
                <i class="fas fa-info-circle mr-2"></i>
                <span>Professional photography guidance</span>
            </div>
        </div>
    </div>

    <!-- Wildlife Experiences Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach($activities as $activity)
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-shadow">
            <!-- Activity Image -->
            <div class="h-48 bg-gradient-to-br from-orange-400 to-yellow-600 rounded-t-xl relative">
                @if(!empty($activity->images) && count($activity->images) > 0)
                    <img src="{{ asset($activity->images[0]) }}" alt="{{ $activity->name }}" 
                         class="w-full h-full object-cover rounded-t-xl">
                @else
                    <div class="absolute inset-0 flex items-center justify-center text-white">
                        <div class="text-center">
                            <i class="fas fa-paw text-4xl mb-2"></i>
                            <p class="text-sm">Wildlife Experience</p>
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
                    <div class="text-lg font-bold text-orange-600">
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
                        {{ $activity->group_size ?? 12 }} max
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-child mr-2 text-gray-400"></i>
                        {{ $activity->age_requirement ?? 'All' }} ages
                    </div>
                </div>

                <!-- Wildlife Highlights -->
                @if(!empty($activity->highlights))
                <div class="mb-4">
                    <p class="text-sm font-medium text-gray-700 mb-2">Wildlife Highlights:</p>
                    <div class="flex flex-wrap gap-1">
                        @foreach(array_slice($activity->highlights, 0, 3) as $highlight)
                        <span class="px-2 py-1 bg-orange-100 text-orange-700 text-xs rounded-full">
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
                    <a href="{{ route('admin.activities.show', $activity) }}" class="flex-1 px-3 py-2 bg-orange-100 text-orange-700 rounded-lg hover:bg-orange-200 transition-colors text-sm font-medium text-center">
                        View
                    </a>
                    <a href="{{ route('admin.activities.edit', $activity) }}" class="flex-1 px-3 py-2 bg-yellow-100 text-yellow-700 rounded-lg hover:bg-yellow-200 transition-colors text-sm font-medium text-center">
                        Edit
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($activities->isEmpty())
    <div class="bg-white rounded-xl shadow-sm p-12 text-center border border-gray-100">
        <i class="fas fa-paw text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">No Wildlife Experiences Found</h3>
        <p class="text-gray-600 mb-6">Get started by adding your first wildlife experience</p>
        <a href="{{ route('admin.activities.create') }}?activity_type=wildlife" class="px-6 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors">
            <i class="fas fa-plus mr-2"></i>Add Wildlife Experience
        </a>
    </div>
    @endif
</div>
@endsection
