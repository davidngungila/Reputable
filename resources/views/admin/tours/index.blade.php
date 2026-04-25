@extends('layouts.admin')

@section('title', 'Safari Packages')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Safari Packages</h1>
            <p class="text-gray-600">Manage your tour packages and safari experiences</p>
        </div>
        <div class="flex flex-wrap gap-3 mt-4 lg:mt-0">
            <a href="{{ route('admin.tours.create') }}" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                <i class="fas fa-plus mr-2"></i>Add New Tour
            </a>
            <a href="{{ route('admin.tours.itinerary-builder') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                <i class="fas fa-route mr-2"></i>Itinerary Builder
            </a>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6 border border-gray-100">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <input type="text" placeholder="Search tours..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
            </div>
            <div>
                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">All Types</option>
                    <option value="safari">Safari</option>
                    <option value="mountain">Mountain Trekking</option>
                    <option value="beach">Beach</option>
                    <option value="cultural">Cultural</option>
                </select>
            </div>
            <div>
                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
            <div>
                <button class="w-full px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                    <i class="fas fa-filter mr-2"></i>Apply Filters
                </button>
            </div>
        </div>
    </div>

    <!-- Tours Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach($tours as $tour)
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-shadow">
            <!-- Tour Image -->
            <div class="h-48 bg-gradient-to-br from-emerald-400 to-blue-500 rounded-t-xl flex items-center justify-center">
                @if(!empty($tour->images))
                    <img src="{{ asset($tour->images[0] ?? '/images/default-tour.jpg') }}" alt="{{ $tour->name }}" class="w-full h-full object-cover rounded-t-xl">
                @else
                    <div class="text-white text-center">
                        <i class="fas fa-image text-4xl mb-2"></i>
                        <p class="text-sm">No Image</p>
                    </div>
                @endif
            </div>

            <!-- Tour Content -->
            <div class="p-6">
                <div class="flex items-center justify-between mb-3">
                    <span class="px-3 py-1 text-xs font-medium bg-emerald-100 text-emerald-700 rounded-full">
                        {{ ucfirst($tour->tour_type ?? 'safari') }}
                    </span>
                    @if($tour->featured)
                        <span class="text-yellow-500">
                            <i class="fas fa-star"></i>
                        </span>
                    @endif
                </div>

                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $tour->name }}</h3>
                <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $tour->description }}</p>

                <!-- Tour Details -->
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-clock mr-2 text-gray-400"></i>
                        {{ $tour->duration_days }} days
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-map-marker-alt mr-2 text-gray-400"></i>
                        {{ $tour->location }}
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-users mr-2 text-gray-400"></i>
                        {{ $tour->max_group_size ?? 20 }} max
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-signal mr-2 text-gray-400"></i>
                        {{ ucfirst($tour->difficulty_level ?? 'easy') }}
                    </div>
                </div>

                <!-- Stats -->
                <div class="flex items-center justify-between mb-4">
                    <div class="text-sm text-gray-600">
                        <span class="font-medium text-gray-900">{{ $tour->bookings_count ?? 0 }}</span> bookings
                    </div>
                    <div class="text-lg font-bold text-emerald-600">
                        ${{ number_format($tour->base_price, 0) }}
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex gap-2">
                    <a href="{{ route('admin.tours.show', $tour) }}" class="flex-1 px-3 py-2 bg-emerald-100 text-emerald-700 rounded-lg hover:bg-emerald-200 transition-colors text-sm font-medium text-center">
                        View
                    </a>
                    <a href="{{ route('admin.tours.edit', $tour) }}" class="flex-1 px-3 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors text-sm font-medium text-center">
                        Edit
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($tours->isEmpty())
    <div class="bg-white rounded-xl shadow-sm p-12 text-center border border-gray-100">
        <i class="fas fa-route text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">No tours found</h3>
        <p class="text-gray-600 mb-6">Get started by creating your first safari package</p>
        <a href="{{ route('admin.tours.create') }}" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
            <i class="fas fa-plus mr-2"></i>Create Tour
        </a>
    </div>
    @endif
</div>
@endsection
