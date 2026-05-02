@extends('layouts.admin')

@section('title', 'Tours & Packages Management')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header with Statistics -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Tours & Packages</h1>
            <p class="text-gray-600">Comprehensive tour management and package administration</p>
        </div>
        <div class="flex gap-3 mt-4 lg:mt-0">
            <a href="{{ route('admin.tours.create') }}" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-plus mr-2"></i>Add New Tour
            </a>
            <a href="{{ route('admin.tours.itinerary-builder') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-map-trifold mr-2"></i>Itinerary Builder
            </a>
            <a href="{{ route('admin.tours.destinations') }}" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-map-pin mr-2"></i>Destinations
            </a>
        </div>
    </div>

    <!-- Statistics Dashboard -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Tours</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ $tours->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-backpack text-emerald-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Active Tours</p>
                    <p class="text-2xl font-bold text-emerald-600 mt-1">
                        {{ $tours->where('status', 'active')->count() }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-check-circle text-green-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Bookings</p>
                    <p class="text-2xl font-bold text-blue-600 mt-1">
                        {{ $tours->sum(function($tour) { return $tour->bookings->count(); }) }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-calendar-check text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Avg. Price</p>
                    <p class="text-2xl font-bold text-purple-600 mt-1">
                        ${{ number_format($tours->avg('base_price'), 0) }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-currency-dollar text-purple-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Advanced Filters -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
        <div class="flex items-center mb-4">
            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                <i class="ph-bold ph-funnel text-purple-600 text-xl"></i>
            </div>
            <h2 class="text-lg font-bold text-gray-900">Advanced Filters</h2>
        </div>
        
        <form method="GET" action="{{ route('admin.tours.index') }}" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                <div>
                    <label for="search" class="block text-sm font-semibold text-gray-700 mb-2">Search Tours</label>
                    <input type="text" name="search" id="search" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           value="{{ request('search') }}" placeholder="Name, location, or description">
                </div>
                
                <div>
                    <label for="tour_type" class="block text-sm font-semibold text-gray-700 mb-2">Tour Type</label>
                    <select name="tour_type" id="tour_type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">All Types</option>
                        <option value="safari" {{ request('tour_type') == 'safari' ? 'selected' : '' }}>🦁 Safari</option>
                        <option value="mountain" {{ request('tour_type') == 'mountain' ? 'selected' : '' }}>🏔️ Mountain Trekking</option>
                        <option value="beach" {{ request('tour_type') == 'beach' ? 'selected' : '' }}>🏖️ Beach</option>
                        <option value="cultural" {{ request('tour_type') == 'cultural' ? 'selected' : '' }}>🏛️ Cultural</option>
                    </select>
                </div>
                
                <div>
                    <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                    <select name="status" id="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">All Status</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>✅ Active</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>⏸️ Inactive</option>
                        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>📝 Draft</option>
                    </select>
                </div>
                
                <div>
                    <label for="difficulty" class="block text-sm font-semibold text-gray-700 mb-2">Difficulty</label>
                    <select name="difficulty" id="difficulty" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">All Levels</option>
                        <option value="easy" {{ request('difficulty') == 'easy' ? 'selected' : '' }}>🟢 Easy</option>
                        <option value="moderate" {{ request('difficulty') == 'moderate' ? 'selected' : '' }}>🟡 Moderate</option>
                        <option value="challenging" {{ request('difficulty') == 'challenging' ? 'selected' : '' }}>🔴 Challenging</option>
                    </select>
                </div>
                
                <div>
                    <label for="price_range" class="block text-sm font-semibold text-gray-700 mb-2">Price Range</label>
                    <select name="price_range" id="price_range" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">All Prices</option>
                        <option value="0-500" {{ request('price_range') == '0-500' ? 'selected' : '' }}>$0 - $500</option>
                        <option value="500-1000" {{ request('price_range') == '500-1000' ? 'selected' : '' }}>$500 - $1,000</option>
                        <option value="1000-2000" {{ request('price_range') == '1000-2000' ? 'selected' : '' }}>$1,000 - $2,000</option>
                        <option value="2000+" {{ request('price_range') == '2000+' ? 'selected' : '' }}>$2,000+</option>
                    </select>
                </div>
            </div>
            
            <div class="flex flex-wrap gap-3">
                <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors font-medium">
                    <i class="ph-bold ph-funnel mr-2"></i>Apply Filters
                </button>
                <a href="{{ route('admin.tours.index') }}" class="px-6 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors font-medium">
                    <i class="ph-bold ph-x mr-2"></i>Reset
                </a>
            </div>
        </form>
    </div>

    <!-- View Toggle and Bulk Actions -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input type="checkbox" id="selectAll" class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                <label for="selectAll" class="ml-2 text-sm font-medium text-gray-700">Select All</label>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex gap-2">
                    <button onclick="setView('grid')" id="gridViewBtn" class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-lg transition-colors text-sm font-medium">
                        <i class="ph-bold ph-grid-four mr-1"></i>Grid
                    </button>
                    <button onclick="setView('list')" id="listViewBtn" class="px-3 py-1 bg-gray-100 text-gray-700 rounded-lg transition-colors text-sm font-medium">
                        <i class="ph-bold ph-list mr-1"></i>List
                    </button>
                </div>
                <div class="flex gap-3">
                    <button onclick="bulkAction('activate')" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors text-sm font-medium disabled:opacity-50" id="bulkActivate" disabled>
                        <i class="ph-bold ph-check-circle mr-2"></i>Activate
                    </button>
                    <button onclick="bulkAction('deactivate')" class="px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition-colors text-sm font-medium disabled:opacity-50" id="bulkDeactivate" disabled>
                        <i class="ph-bold ph-pause mr-2"></i>Deactivate
                    </button>
                    <button onclick="bulkDelete()" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors text-sm font-medium disabled:opacity-50" id="bulkDelete" disabled>
                        <i class="ph-bold ph-trash mr-2"></i>Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Tours Container -->
    <div id="toursContainer">
        <!-- Grid View -->
        <div id="gridView" class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
            @foreach($tours as $tour)
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 overflow-hidden group">
                <!-- Checkbox for bulk actions -->
                <div class="absolute top-4 left-4 z-10">
                    <input type="checkbox" class="tour-checkbox w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500" value="{{ $tour->id }}">
                </div>
                
                <!-- Tour Image -->
                <div class="relative h-48 overflow-hidden">
                    @if(!empty($tour->images))
                        <img src="{{ asset($tour->images[0] ?? '/images/default-tour.jpg') }}" alt="{{ $tour->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-emerald-400 to-blue-500 flex items-center justify-center">
                            <div class="text-white text-center">
                                <i class="ph-bold ph-image text-4xl mb-2"></i>
                                <p class="text-sm">No Image</p>
                            </div>
                        </div>
                    @endif
                    
                    <!-- Status Badge -->
                    <div class="absolute top-4 right-4">
                        @switch($tour->status)
                            @case('active')
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">
                                    ✅ Active
                                </span>
                                @break
                            @case('inactive')
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">
                                    ⏸️ Inactive
                                </span>
                                @break
                            @case('draft')
                                <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-medium">
                                    📝 Draft
                                </span>
                                @break
                        @endswitch
                    </div>
                    
                    <!-- Featured Badge -->
                    @if($tour->featured ?? false)
                    <div class="absolute top-4 left-4 ml-8">
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">
                            ⭐ Featured
                        </span>
                    </div>
                    @endif
                </div>

                <!-- Tour Content -->
                <div class="p-6">
                    <!-- Tour Type and Quick Actions -->
                    <div class="flex items-center justify-between mb-3">
                        <span class="px-3 py-1 text-xs font-medium bg-emerald-100 text-emerald-700 rounded-full">
                            @switch($tour->tour_type)
                                @case('safari')
                                    🦁 Safari
                                    @break
                                @case('mountain')
                                    🏔️ Mountain
                                    @break
                                @case('beach')
                                    🏖️ Beach
                                    @break
                                @case('cultural')
                                    🏛️ Cultural
                                    @break
                                @default
                                    📍 {{ ucfirst($tour->tour_type ?? 'safari') }}
                            @endswitch
                        </span>
                        <div class="flex gap-1">
                            <a href="{{ route('tours.show', $tour->slug) }}" target="_blank" class="p-1 text-gray-400 hover:text-gray-600 transition-colors" title="Preview">
                                <i class="ph-bold ph-eye"></i>
                            </a>
                            <button onclick="toggleFavorite({{ $tour->id }})" class="p-1 text-gray-400 hover:text-red-500 transition-colors" title="Toggle Favorite">
                                <i class="ph-bold ph-heart"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Tour Name and Description -->
                    <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-emerald-600 transition-colors">{{ $tour->name }}</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ Str::limit($tour->description, 120) }}</p>

                    <!-- Tour Details Grid -->
                    <div class="grid grid-cols-2 gap-3 mb-4">
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="ph-bold ph-calendar text-gray-400 mr-2"></i>
                            <span>{{ $tour->duration_days }} days</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="ph-bold ph-map-pin text-gray-400 mr-2"></i>
                            <span class="truncate">{{ $tour->location }}</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="ph-bold ph-users text-gray-400 mr-2"></i>
                            <span>{{ $tour->max_group_size ?? 20 }} max</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="ph-bold ph-signal text-gray-400 mr-2"></i>
                            <span>{{ ucfirst($tour->difficulty_level ?? 'easy') }}</span>
                        </div>
                    </div>

                    <!-- Additional Details -->
                    <div class="flex items-center justify-between mb-4 text-sm">
                        <div class="flex items-center text-gray-600">
                            <i class="ph-bold ph-backpack text-gray-400 mr-2"></i>
                            <span>{{ $tour->destinations->count() }} destinations</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <i class="ph-bold ph-map-trifold text-gray-400 mr-2"></i>
                            <span>{{ $tour->itineraries->count() }} days itinerary</span>
                        </div>
                    </div>

                    <!-- Stats and Price -->
                    <div class="flex items-center justify-between mb-4 pt-4 border-t border-gray-100">
                        <div class="text-sm">
                            <span class="font-medium text-gray-900">{{ $tour->bookings->count() }}</span>
                            <span class="text-gray-600"> bookings</span>
                        </div>
                        <div class="text-right">
                            <div class="text-lg font-bold text-emerald-600">${{ number_format($tour->base_price, 0) }}</div>
                            <div class="text-xs text-gray-500">per person</div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-2">
                        <a href="{{ route('admin.tours.show', $tour) }}" class="flex-1 px-3 py-2 bg-emerald-100 text-emerald-700 rounded-lg hover:bg-emerald-200 transition-colors text-sm font-medium text-center">
                            <i class="ph-bold ph-eye mr-1"></i>View
                        </a>
                        <a href="{{ route('admin.tours.edit', $tour) }}" class="flex-1 px-3 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors text-sm font-medium text-center">
                            <i class="ph-bold ph-pencil mr-1"></i>Edit
                        </a>
                        <button type="button" class="px-3 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors text-sm font-medium"
                                onclick="deleteTour({{ $tour->id }}, '{{ $tour->name }}')">
                            <i class="ph-bold ph-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- List View (Hidden by default) -->
        <div id="listView" class="hidden">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <input type="checkbox" class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tour</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duration</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bookings</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($tours as $tour)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="checkbox" class="tour-checkbox w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500" value="{{ $tour->id }}">
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center mr-3">
                                        <i class="ph-bold ph-backpack text-emerald-600"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $tour->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $tour->location }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-medium bg-emerald-100 text-emerald-700 rounded-full">
                                    {{ ucfirst($tour->tour_type ?? 'safari') }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $tour->duration_days }} days</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">${{ number_format($tour->base_price, 0) }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $tour->bookings->count() }}</td>
                            <td class="px-6 py-4">
                                @switch($tour->status)
                                    @case('active')
                                        <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Active</span>
                                        @break
                                    @case('inactive')
                                        <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">Inactive</span>
                                        @break
                                    @case('draft')
                                        <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-medium">Draft</span>
                                        @break
                                @endswitch
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('admin.tours.show', $tour) }}" class="p-2 bg-emerald-100 text-emerald-700 rounded-lg hover:bg-emerald-200 transition-colors">
                                        <i class="ph-bold ph-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.tours.edit', $tour) }}" class="p-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors">
                                        <i class="ph-bold ph-pencil"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if($tours->isEmpty())
    <div class="bg-white rounded-xl shadow-sm p-12 text-center border border-gray-100">
        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="ph-bold ph-backpack text-gray-400 text-3xl"></i>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">No tours found</h3>
        <p class="text-gray-600 mb-6">Get started by creating your first tour package</p>
        <a href="{{ route('admin.tours.create') }}" class="inline-flex items-center px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
            <i class="ph-bold ph-plus mr-2"></i>Create Tour
        </a>
    </div>
    @endif
</div>

<script>
// View toggle functionality
function setView(view) {
    const gridView = document.getElementById('gridView');
    const listView = document.getElementById('listView');
    const gridBtn = document.getElementById('gridViewBtn');
    const listBtn = document.getElementById('listViewBtn');
    
    if (view === 'grid') {
        gridView.classList.remove('hidden');
        listView.classList.add('hidden');
        gridBtn.className = 'px-3 py-1 bg-emerald-100 text-emerald-700 rounded-lg transition-colors text-sm font-medium';
        listBtn.className = 'px-3 py-1 bg-gray-100 text-gray-700 rounded-lg transition-colors text-sm font-medium';
    } else {
        gridView.classList.add('hidden');
        listView.classList.remove('hidden');
        gridBtn.className = 'px-3 py-1 bg-gray-100 text-gray-700 rounded-lg transition-colors text-sm font-medium';
        listBtn.className = 'px-3 py-1 bg-emerald-100 text-emerald-700 rounded-lg transition-colors text-sm font-medium';
    }
}

// Select all functionality
document.getElementById('selectAll').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.tour-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
    updateBulkButtons();
});

// Update bulk action buttons
function updateBulkButtons() {
    const checkedBoxes = document.querySelectorAll('.tour-checkbox:checked');
    const hasSelection = checkedBoxes.length > 0;
    
    document.getElementById('bulkActivate').disabled = !hasSelection;
    document.getElementById('bulkDeactivate').disabled = !hasSelection;
    document.getElementById('bulkDelete').disabled = !hasSelection;
}

// Listen for checkbox changes
document.addEventListener('change', function(e) {
    if (e.target.classList.contains('tour-checkbox')) {
        updateBulkButtons();
    }
});

// Bulk action functions
function bulkAction(action) {
    const checkedBoxes = document.querySelectorAll('.tour-checkbox:checked');
    const ids = Array.from(checkedBoxes).map(cb => cb.value);
    
    if (ids.length === 0) return;
    
    if (confirm(`Are you sure you want to ${action} ${ids.length} tour(s)?`)) {
        // Submit bulk action form
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/admin/tours/bulk-update';
        
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        form.innerHTML = `
            <input type="hidden" name="_token" value="${csrfToken}">
            <input type="hidden" name="ids" value="${ids.join(',')}">
            <input type="hidden" name="action" value="${action}">
        `;
        
        document.body.appendChild(form);
        form.submit();
    }
}

function deleteTour(tourId, tourName) {
    if (confirm(`Are you sure you want to delete "${tourName}"? This action cannot be undone.`)) {
        // Create form for deletion
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/tours/${tourId}`;
        
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        form.innerHTML = `
            <input type="hidden" name="_token" value="${csrfToken}">
            <input type="hidden" name="_method" value="DELETE">
        `;
        
        document.body.appendChild(form);
        form.submit();
    }
}

function bulkDelete() {
    const checkedBoxes = document.querySelectorAll('.tour-checkbox:checked');
    const ids = Array.from(checkedBoxes).map(cb => cb.value);
    
    if (ids.length === 0) return;
    
    if (confirm(`Are you sure you want to delete ${ids.length} tour(s)? This action cannot be undone.`)) {
        // Submit bulk delete form
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/admin/tours/bulk-delete';
        
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        form.innerHTML = `
            <input type="hidden" name="_token" value="${csrfToken}">
            <input type="hidden" name="ids" value="${ids.join(',')}">
        `;
        
        document.body.appendChild(form);
        form.submit();
    }
}

function bulkAction(action) {
    const checkedBoxes = document.querySelectorAll('.tour-checkbox:checked');
    const ids = Array.from(checkedBoxes).map(cb => cb.value);
    
    if (ids.length === 0) return;
    
    let confirmMessage = '';
    let route = '';
    
    switch(action) {
        case 'activate':
            confirmMessage = `Are you sure you want to activate ${ids.length} tour(s)?`;
            route = '/admin/tours/bulk-activate';
            break;
        case 'deactivate':
            confirmMessage = `Are you sure you want to deactivate ${ids.length} tour(s)?`;
            route = '/admin/tours/bulk-deactivate';
            break;
        default:
            return;
    }
    
    if (confirm(confirmMessage)) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = route;
        
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        form.innerHTML = `
            <input type="hidden" name="_token" value="${csrfToken}">
            <input type="hidden" name="ids" value="${ids.join(',')}">
        `;
        
        document.body.appendChild(form);
        form.submit();
    }
}

function toggleFavorite(tourId) {
    // Toggle favorite functionality
    console.log('Toggle favorite for tour:', tourId);
}
</script>
@endsection
