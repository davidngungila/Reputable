@extends('layouts.admin')

@section('title', 'Things to Do - View All Activities')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Things to Do</h1>
            <p class="text-gray-600">Explore all activities and experiences available</p>
        </div>
        <div class="flex flex-wrap gap-3 mt-4 lg:mt-0">
            <a href="{{ route('admin.activities.create') }}" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                <i class="fas fa-plus mr-2"></i>Add Activity
            </a>
            <a href="{{ route('admin.activities.management') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                <i class="fas fa-cog mr-2"></i>Management
            </a>
        </div>
    </div>

    <!-- Activity Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-emerald-100 rounded-lg">
                    <i class="fas fa-list text-emerald-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full">
                    {{ $activities->flatten()->count() }} Total
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ $activities->flatten()->count() }}</h3>
                <p class="text-sm text-gray-600">Total Activities</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-purple-100 rounded-lg">
                    <i class="fas fa-theater-masks text-purple-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-purple-600 bg-purple-50 px-2 py-1 rounded-full">
                    Cultural
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ $activities->get('cultural', collect())->count() }}</h3>
                <p class="text-sm text-gray-600">Cultural Tours</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-blue-100 rounded-lg">
                    <i class="fas fa-umbrella-beach text-blue-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2 py-1 rounded-full">
                    Beach
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ $activities->get('beach', collect())->count() }}</h3>
                <p class="text-sm text-gray-600">Beach Activities</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-orange-100 rounded-lg">
                    <i class="fas fa-paw text-orange-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-orange-600 bg-orange-50 px-2 py-1 rounded-full">
                    Wildlife
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ $activities->get('wildlife', collect())->count() }}</h3>
                <p class="text-sm text-gray-600">Wildlife Experiences</p>
            </div>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <a href="{{ route('admin.activities.cultural-tours') }}" class="bg-gradient-to-r from-purple-600 to-purple-700 rounded-xl p-6 text-white hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold mb-1">Cultural Tours</h3>
                    <p class="text-purple-100 text-sm">Traditional experiences</p>
                </div>
                <i class="fas fa-theater-masks text-3xl text-purple-200"></i>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span>{{ $activities->get('cultural', collect())->count() }} activities</span>
                <i class="fas fa-arrow-right ml-auto"></i>
            </div>
        </a>

        <a href="{{ route('admin.activities.beach-activities') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-xl p-6 text-white hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold mb-1">Beach Activities</h3>
                    <p class="text-blue-100 text-sm">Coastal adventures</p>
                </div>
                <i class="fas fa-umbrella-beach text-3xl text-blue-200"></i>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span>{{ $activities->get('beach', collect())->count() }} activities</span>
                <i class="fas fa-arrow-right ml-auto"></i>
            </div>
        </a>

        <a href="{{ route('admin.activities.wildlife-experiences') }}" class="bg-gradient-to-r from-orange-600 to-orange-700 rounded-xl p-6 text-white hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold mb-1">Wildlife Experiences</h3>
                    <p class="text-orange-100 text-sm">Safari adventures</p>
                </div>
                <i class="fas fa-paw text-3xl text-orange-200"></i>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span>{{ $activities->get('wildlife', collect())->count() }} activities</span>
                <i class="fas fa-arrow-right ml-auto"></i>
            </div>
        </a>

        <a href="{{ route('admin.activities.management') }}" class="bg-gradient-to-r from-gray-600 to-gray-700 rounded-xl p-6 text-white hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold mb-1">Management</h3>
                    <p class="text-gray-100 text-sm">Admin controls</p>
                </div>
                <i class="fas fa-cog text-3xl text-gray-200"></i>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span>Full control</span>
                <i class="fas fa-arrow-right ml-auto"></i>
            </div>
        </a>
    </div>

    <!-- Activities by Category -->
    @foreach($activities as $type => $typeActivities)
    @if($typeActivities->count() > 0)
    <div class="mb-8">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold text-gray-900 capitalize">{{ $type }} Activities</h2>
            <a href="{{ route('admin.activities.' . str_replace(' ', '-', $type)) }}" class="text-emerald-600 hover:text-emerald-700 text-sm font-medium">
                View All <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
            @foreach($typeActivities->take(6) as $activity)
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-shadow">
                <!-- Activity Image -->
                <div class="h-48 bg-gradient-to-br 
                    {{ $type === 'cultural' ? 'from-purple-400 to-purple-600' : '' }}
                    {{ $type === 'beach' ? 'from-blue-400 to-blue-600' : '' }}
                    {{ $type === 'wildlife' ? 'from-orange-400 to-orange-600' : '' }}
                    {{ $type === 'adventure' ? 'from-green-400 to-green-600' : '' }}
                    rounded-t-xl relative">
                    @if(!empty($activity->images) && count($activity->images) > 0)
                        <img src="{{ asset($activity->images[0]) }}" alt="{{ $activity->name }}" 
                             class="w-full h-full object-cover rounded-t-xl">
                    @else
                        <div class="absolute inset-0 flex items-center justify-center text-white">
                            <div class="text-center">
                                <i class="fas 
                                    {{ $type === 'cultural' ? 'fa-theater-masks' : '' }}
                                    {{ $type === 'beach' ? 'fa-umbrella-beach' : '' }}
                                    {{ $type === 'wildlife' ? 'fa-paw' : '' }}
                                    {{ $type === 'adventure' ? 'fa-hiking' : '' }}
                                    text-4xl mb-2"></i>
                                <p class="text-sm">{{ ucfirst($type) }} Activity</p>
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
                        <div class="text-lg font-bold text-emerald-600">
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
                            <i class="fas fa-signal mr-2 text-gray-400"></i>
                            {{ ucfirst($activity->difficulty_level ?? 'easy') }}
                        </div>
                    </div>

                    <!-- Highlights -->
                    @if(!empty($activity->highlights))
                    <div class="mb-4">
                        <div class="flex flex-wrap gap-1">
                            @foreach(array_slice($activity->highlights, 0, 2) as $highlight)
                            <span class="px-2 py-1 
                                {{ $type === 'cultural' ? 'bg-purple-100 text-purple-700' : '' }}
                                {{ $type === 'beach' ? 'bg-blue-100 text-blue-700' : '' }}
                                {{ $type === 'wildlife' ? 'bg-orange-100 text-orange-700' : '' }}
                                {{ $type === 'adventure' ? 'bg-green-100 text-green-700' : '' }}
                                text-xs rounded-full">
                                {{ $highlight }}
                            </span>
                            @endforeach
                            @if(count($activity->highlights) > 2)
                            <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full">
                                +{{ count($activity->highlights) - 2 }} more
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
                        <a href="{{ route('admin.activities.show', $activity) }}" class="flex-1 px-3 py-2 bg-emerald-100 text-emerald-700 rounded-lg hover:bg-emerald-200 transition-colors text-sm font-medium text-center">
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

        @if($typeActivities->count() > 6)
        <div class="text-center mt-6">
            <a href="{{ route('admin.activities.' . str_replace(' ', '-', $type)) }}" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                View All {{ ucfirst($type) }} Activities
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
        @endif
    </div>
    @endif
    @endforeach

    @if($activities->flatten()->isEmpty())
    <div class="bg-white rounded-xl shadow-sm p-12 text-center border border-gray-100">
        <i class="fas fa-list text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">No Activities Found</h3>
        <p class="text-gray-600 mb-6">Get started by adding your first activity</p>
        <a href="{{ route('admin.activities.create') }}" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
            <i class="fas fa-plus mr-2"></i>Add Activity
        </a>
    </div>
    @endif
</div>
@endsection
