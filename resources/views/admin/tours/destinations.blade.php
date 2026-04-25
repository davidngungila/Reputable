@extends('layouts.admin')

@section('title', 'Advanced Destinations Management')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header with Statistics -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Advanced Destinations</h1>
            <p class="text-gray-600">Comprehensive destination management with advanced features</p>
        </div>
        <div class="flex gap-3 mt-4 lg:mt-0">
            <button onclick="showMapView()" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-map-trifold mr-2"></i>Map View
            </button>
            <button onclick="importDestinations()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-upload mr-2"></i>Import
            </button>
            <button onclick="exportDestinations()" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-download mr-2"></i>Export
            </button>
            <a href="{{ route('admin.tours.destinations.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-plus mr-2"></i>Add Destination
            </a>
        </div>
    </div>

    <!-- Statistics Dashboard -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Destinations</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ count($destinations ?? []) }}</p>
                </div>
                <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-map-pin text-emerald-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Active Destinations</p>
                    <p class="text-2xl font-bold text-emerald-600 mt-1">{{ collect($destinations ?? [])->where('status', 'active')->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-check-circle text-green-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Tours</p>
                    <p class="text-2xl font-bold text-blue-600 mt-1">{{ collect($destinations ?? [])->sum('tours_count') ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-backpack text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Regions Covered</p>
                    <p class="text-2xl font-bold text-purple-600 mt-1">{{ collect($destinations ?? [])->pluck('region')->unique()->filter()->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-globe text-purple-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Advanced Search and Filters -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Search & Filters</h3>
            <div class="flex gap-2">
                <button onclick="setViewMode('grid')" id="grid-view-btn" class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-lg transition-colors text-sm font-medium">
                    <i class="ph-bold ph-grid-four mr-1"></i>Grid
                </button>
                <button onclick="setViewMode('list')" id="list-view-btn" class="px-3 py-1 bg-gray-100 text-gray-700 rounded-lg transition-colors text-sm font-medium">
                    <i class="ph-bold ph-list-bullets mr-1"></i>List
                </button>
                <button onclick="setViewMode('map')" id="map-view-btn" class="px-3 py-1 bg-gray-100 text-gray-700 rounded-lg transition-colors text-sm font-medium">
                    <i class="ph-bold ph-map-trifold mr-1"></i>Map
                </button>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Search Destinations</label>
                <div class="relative">
                    <input type="text" id="search-destinations" placeholder="Search by name, location..." 
                           onkeyup="filterDestinations()"
                           class="w-full px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <i class="ph-bold ph-magnifying-glass absolute left-3 top-3 text-gray-400"></i>
                </div>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Region</label>
                <select id="region-filter" onchange="filterDestinations()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">🌍 All Regions</option>
                    <option value="northern">🦁 Northern Tanzania</option>
                    <option value="southern">🐘 Southern Tanzania</option>
                    <option value="western">🦛 Western Tanzania</option>
                    <option value="coastal">🏖️ Coastal Tanzania</option>
                    <option value="zanzibar">🏝️ Zanzibar</option>
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                <select id="status-filter" onchange="filterDestinations()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">📊 All Status</option>
                    <option value="active">✅ Active</option>
                    <option value="inactive">⏸️ Inactive</option>
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Tour Count</label>
                <select id="tours-filter" onchange="filterDestinations()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">🎒 All Tours</option>
                    <option value="0">No Tours</option>
                    <option value="1-5">1-5 Tours</option>
                    <option value="6-10">6-10 Tours</option>
                    <option value="10+">10+ Tours</option>
                </select>
            </div>
        </div>
        
        <!-- Advanced Filters Toggle -->
        <div class="mt-4 pt-4 border-t border-gray-200">
            <button onclick="toggleAdvancedFilters()" class="text-sm text-blue-600 hover:text-blue-700 font-medium">
                <i class="ph-bold ph-caret-down" id="advanced-filters-icon"></i>
                <span id="advanced-filters-text">Show Advanced Filters</span>
            </button>
            
            <div id="advanced-filters" class="hidden mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Best Time to Visit</label>
                    <select id="season-filter" onchange="filterDestinations()" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm">
                        <option value="">All Seasons</option>
                        <option value="jan-mar">Jan - Mar</option>
                        <option value="apr-jun">Apr - Jun</option>
                        <option value="jul-sep">Jul - Sep</option>
                        <option value="oct-dec">Oct - Dec</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Sort By</label>
                    <select id="sort-filter" onchange="sortDestinations()" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm">
                        <option value="name">Name A-Z</option>
                        <option value="tours-desc">Most Tours</option>
                        <option value="recent">Recently Added</option>
                        <option value="status">Status</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Featured Only</label>
                    <label class="flex items-center">
                        <input type="checkbox" id="featured-filter" onchange="filterDestinations()" class="mr-2">
                        <span class="text-sm">Show featured destinations only</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Destinations Container -->
    <div id="destinations-container">
        <!-- Grid View -->
        <div id="grid-view" class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
            @foreach($destinations ?? [] as $destination)
            <div class="destination-card bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1" 
                 data-region="{{ $destination->region ?? 'northern' }}"
                 data-status="{{ $destination->status ?? 'active' }}"
                 data-name="{{ strtolower($destination->name) }}"
                 data-tours="{{ $destination->tours_count ?? 0 }}">
                
                <!-- Destination Header with Image -->
                <div class="relative h-56 bg-gradient-to-br from-blue-400 to-emerald-500 rounded-t-xl overflow-hidden group">
                    @if(!empty($destination->images) && count($destination->images) > 0)
                        <img src="{{ asset($destination->images[0]) }}" alt="{{ $destination->name }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                        <div class="absolute inset-0 flex items-center justify-center text-white">
                            <div class="text-center">
                                <i class="ph-bold ph-map-pin text-5xl mb-2"></i>
                                <p class="text-sm">No Image</p>
                            </div>
                        </div>
                    @endif
                    
                    <!-- Overlay with Status and Actions -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 text-xs font-medium rounded-full backdrop-blur-sm
                                {{ $destination->status === 'active' ? 'bg-green-500/80 text-white' : 'bg-gray-500/80 text-white' }}">
                                {{ ucfirst($destination->status ?? 'Active') }}
                            </span>
                        </div>
                        
                        <!-- Quick Actions on Hover -->
                        <div class="absolute bottom-4 left-4 right-4 flex gap-2">
                            <button onclick="viewDestination({{ $destination->id }})" class="flex-1 px-3 py-2 bg-white/90 text-gray-800 rounded-lg hover:bg-white transition-colors text-sm font-medium backdrop-blur-sm">
                                <i class="ph-bold ph-eye mr-1"></i>View
                            </button>
                            <button onclick="editDestination({{ $destination->id }})" class="flex-1 px-3 py-2 bg-white/90 text-gray-800 rounded-lg hover:bg-white transition-colors text-sm font-medium backdrop-blur-sm">
                                <i class="ph-bold ph-pencil mr-1"></i>Edit
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Destination Content -->
                <div class="p-6">
                    <!-- Header with Tour Count -->
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $destination->name }}</h3>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="ph-bold ph-map-pin mr-1 text-gray-400"></i>
                                {{ $destination->location }}
                            </div>
                        </div>
                        <div class="text-center ml-4">
                            <div class="text-2xl font-bold text-emerald-600">{{ $destination->tours_count ?? 0 }}</div>
                            <div class="text-xs text-gray-600">Tours</div>
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $destination->description }}</p>

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-2 gap-3 mb-4">
                        @if($destination->best_time_to_visit)
                        <div class="bg-emerald-50 rounded-lg p-3 text-center">
                            <i class="ph-bold ph-calendar text-emerald-600 text-lg mb-1"></i>
                            <p class="text-xs text-gray-600">Best Time</p>
                            <p class="text-xs font-medium text-gray-900">{{ $destination->best_time_to_visit }}</p>
                        </div>
                        @endif
                        
                        @if($destination->region)
                        <div class="bg-blue-50 rounded-lg p-3 text-center">
                            <i class="ph-bold ph-globe text-blue-600 text-lg mb-1"></i>
                            <p class="text-xs text-gray-600">Region</p>
                            <p class="text-xs font-medium text-gray-900">{{ ucfirst($destination->region) }}</p>
                        </div>
                        @endif
                    </div>

                    <!-- Highlights -->
                    @if(!empty($destination->highlights))
                    <div class="mb-4">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-sm font-medium text-gray-700">Highlights</p>
                            @if(count($destination->highlights) > 3)
                            <span class="text-xs text-gray-500">+{{ count($destination->highlights) - 3 }} more</span>
                            @endif
                        </div>
                        <div class="flex flex-wrap gap-1">
                            @foreach(array_slice($destination->highlights, 0, 3) as $highlight)
                            <span class="px-2 py-1 bg-purple-100 text-purple-700 text-xs rounded-full">
                                {{ $highlight }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="flex gap-2 pt-3 border-t border-gray-100">
                        <button onclick="viewDestination({{ $destination->id }})" class="flex-1 px-3 py-2 bg-emerald-100 text-emerald-700 rounded-lg hover:bg-emerald-200 transition-colors text-sm font-medium">
                            <i class="ph-bold ph-eye mr-1"></i>View
                        </button>
                        <button onclick="editDestination({{ $destination->id }})" class="flex-1 px-3 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors text-sm font-medium">
                            <i class="ph-bold ph-pencil mr-1"></i>Edit
                        </button>
                        <button onclick="deleteDestination({{ $destination->id }})" class="px-3 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors text-sm font-medium">
                            <i class="ph-bold ph-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- List View (Hidden by default) -->
        <div id="list-view" class="hidden">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Destination</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Location</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Region</th>
                                <th class="text-center py-3 px-4 text-sm font-semibold text-gray-700">Tours</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Best Time</th>
                                <th class="text-center py-3 px-4 text-sm font-semibold text-gray-700">Status</th>
                                <th class="text-center py-3 px-4 text-sm font-semibold text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($destinations ?? [] as $destination)
                            <tr class="border-b border-gray-100 hover:bg-gray-50 destination-row"
                                data-region="{{ $destination->region ?? 'northern' }}"
                                data-status="{{ $destination->status ?? 'active' }}"
                                data-name="{{ strtolower($destination->name) }}"
                                data-tours="{{ $destination->tours_count ?? 0 }}">
                                <td class="py-4 px-4">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-emerald-500 rounded-lg mr-3 flex items-center justify-center text-white">
                                            @if(!empty($destination->images) && count($destination->images) > 0)
                                                <img src="{{ asset($destination->images[0]) }}" alt="{{ $destination->name }}" class="w-full h-full object-cover rounded-lg">
                                            @else
                                                <i class="ph-bold ph-map-pin"></i>
                                            @endif
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-900">{{ $destination->name }}</h4>
                                            <p class="text-sm text-gray-600 line-clamp-1">{{ $destination->description }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-sm text-gray-600">{{ $destination->location }}</td>
                                <td class="py-4 px-4 text-sm text-gray-600">{{ ucfirst($destination->region ?? 'N/A') }}</td>
                                <td class="py-4 px-4 text-center">
                                    <span class="px-2 py-1 bg-emerald-100 text-emerald-700 text-xs rounded-full font-medium">
                                        {{ $destination->tours_count ?? 0 }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-sm text-gray-600">{{ $destination->best_time_to_visit ?? 'N/A' }}</td>
                                <td class="py-4 px-4 text-center">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full
                                        {{ $destination->status === 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                        {{ ucfirst($destination->status ?? 'Active') }}
                                    </span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <button onclick="viewDestination({{ $destination->id }})" class="p-1 text-emerald-600 hover:text-emerald-800">
                                            <i class="ph-bold ph-eye"></i>
                                        </button>
                                        <button onclick="editDestination({{ $destination->id }})" class="p-1 text-blue-600 hover:text-blue-800">
                                            <i class="ph-bold ph-pencil"></i>
                                        </button>
                                        <button onclick="deleteDestination({{ $destination->id }})" class="p-1 text-red-600 hover:text-red-800">
                                            <i class="ph-bold ph-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Map View (Hidden by default) -->
        <div id="map-view" class="hidden">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="bg-gray-50 rounded-lg h-96 flex items-center justify-center">
                    <div class="text-center">
                        <i class="ph-bold ph-map-trifold text-6xl text-gray-300 mb-4"></i>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Interactive Map View</h3>
                        <p class="text-gray-600 mb-4">View all destinations on an interactive map</p>
                        <button onclick="initializeMap()" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                            <i class="ph-bold ph-map-pin mr-2"></i>Load Map
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(empty($destinations ?? []))
    <div class="bg-white rounded-xl shadow-sm p-12 text-center border border-gray-100">
        <i class="fas fa-map-marked-alt text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">No Destinations Found</h3>
        <p class="text-gray-600 mb-6">Get started by adding your first destination</p>
        <a href="{{ route('admin.tours.destinations.create') }}" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors inline-block">
            <i class="ph-bold ph-plus mr-2"></i>Add Destination
        </a>
    </div>
    @endif
</div>

<!-- Add/Edit Destination Modal -->
<div id="destination-modal" class="hidden fixed inset-0 bg-white/80 backdrop-blur-sm flex items-center justify-center z-50">
    <div class="bg-white rounded-xl p-6 max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-semibold text-gray-900" id="modal-title">Add Destination</h3>
            <button onclick="hideDestinationModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <form id="destination-form" onsubmit="saveDestination(event)" class="space-y-6">
            @csrf
            <input type="hidden" id="destination-id" name="id">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Destination Name *</label>
                    <input type="text" id="destination-name" name="name" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="e.g., Serengeti National Park">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Location *</label>
                    <input type="text" id="destination-location" name="location" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="e.g., Northern Tanzania">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Region</label>
                    <select id="destination-region" name="region"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">Select Region</option>
                        <option value="northern">Northern Tanzania</option>
                        <option value="southern">Southern Tanzania</option>
                        <option value="western">Western Tanzania</option>
                        <option value="coastal">Coastal Tanzania</option>
                        <option value="zanzibar">Zanzibar</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select id="destination-status" name="status"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea id="destination-description" name="description" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                          placeholder="Describe the destination, its significance, and what makes it special..."></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Best Time to Visit</label>
                    <input type="text" id="destination-best-time" name="best_time_to_visit"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="e.g., June to October">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Weather Info</label>
                    <input type="text" id="destination-weather" name="weather_info"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="e.g., Dry season, warm days">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Coordinates</label>
                <div class="grid grid-cols-2 gap-4">
                    <input type="number" id="destination-lat" name="coordinates[lat]" step="0.000001"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="Latitude">
                    <input type="number" id="destination-lng" name="coordinates[lng]" step="0.000001"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="Longitude">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Highlights</label>
                <div id="highlights-container" class="space-y-2">
                    <div class="flex gap-2">
                        <input type="text" name="highlights[]" placeholder="e.g., Great Migration, Big Five"
                               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <button type="button" onclick="addHighlight()" class="px-3 py-2 bg-emerald-100 text-emerald-700 rounded-lg hover:bg-emerald-200">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Images</label>
                <div id="images-container" class="space-y-2">
                    <div class="flex gap-2">
                        <input type="text" name="images[]" placeholder="Image path or URL"
                               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <button type="button" onclick="addImage()" class="px-3 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-4">
                <button type="button" onclick="hideDestinationModal()" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                    Cancel
                </button>
                <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                    <i class="fas fa-save mr-2"></i>Save Destination
                </button>
            </div>
        </form>
    </div>
</div>

<script>
let currentViewMode = 'grid';

function setViewMode(mode) {
    currentViewMode = mode;
    
    // Update button states
    document.querySelectorAll('[id$="-view-btn"]').forEach(btn => {
        btn.className = 'px-3 py-1 bg-gray-100 text-gray-700 rounded-lg transition-colors text-sm font-medium';
    });
    
    const activeBtn = document.getElementById(`${mode}-view-btn`);
    activeBtn.className = 'px-3 py-1 bg-emerald-100 text-emerald-700 rounded-lg transition-colors text-sm font-medium';
    
    // Show/hide views
    document.getElementById('grid-view').classList.toggle('hidden', mode !== 'grid');
    document.getElementById('list-view').classList.toggle('hidden', mode !== 'list');
    document.getElementById('map-view').classList.toggle('hidden', mode !== 'map');
    
    // Apply filters to current view
    filterDestinations();
}

function toggleAdvancedFilters() {
    const filters = document.getElementById('advanced-filters');
    const icon = document.getElementById('advanced-filters-icon');
    const text = document.getElementById('advanced-filters-text');
    
    filters.classList.toggle('hidden');
    
    if (filters.classList.contains('hidden')) {
        icon.className = 'ph-bold ph-caret-down';
        text.textContent = 'Show Advanced Filters';
    } else {
        icon.className = 'ph-bold ph-caret-up';
        text.textContent = 'Hide Advanced Filters';
    }
}

function showAddDestinationModal() {
    document.getElementById('modal-title').textContent = 'Add Destination';
    document.getElementById('destination-form').reset();
    document.getElementById('destination-id').value = '';
    document.getElementById('destination-modal').classList.remove('hidden');
}

function editDestination(id) {
    // Load destination data and show modal
    fetch(`/admin/api/destinations/${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('modal-title').textContent = 'Edit Destination';
            document.getElementById('destination-id').value = data.id;
            document.getElementById('destination-name').value = data.name;
            document.getElementById('destination-location').value = data.location;
            document.getElementById('destination-region').value = data.region || '';
            document.getElementById('destination-status').value = data.status || 'active';
            document.getElementById('destination-description').value = data.description || '';
            document.getElementById('destination-best-time').value = data.best_time_to_visit || '';
            document.getElementById('destination-weather').value = data.weather_info || '';
            document.getElementById('destination-lat').value = data.coordinates?.lat || '';
            document.getElementById('destination-lng').value = data.coordinates?.lng || '';
            
            // Load highlights and images
            loadHighlights(data.highlights || []);
            loadImages(data.images || []);
            
            document.getElementById('destination-modal').classList.remove('hidden');
        })
        .catch(error => {
            console.error('Error loading destination:', error);
            showNotification('Error loading destination data', 'error');
        });
}

function hideDestinationModal() {
    document.getElementById('destination-modal').classList.add('hidden');
}

function saveDestination(event) {
    event.preventDefault();
    
    const formData = new FormData(event.target);
    const destinationId = formData.get('id');
    const url = destinationId ? `/admin/tours/destinations/${destinationId}` : '/admin/tours/destinations';
    const method = destinationId ? 'PUT' : 'POST';
    
    // Show loading state
    const submitBtn = event.target.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="ph-bold ph-spinner text-white mr-2"></i>Saving...';
    submitBtn.disabled = true;
    
    fetch(url, {
        method: method,
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            hideDestinationModal();
            showNotification('Destination saved successfully!', 'success');
            setTimeout(() => location.reload(), 1500);
        } else {
            showNotification('Error saving destination: ' + data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Error saving destination', 'error');
    })
    .finally(() => {
        // Restore button state
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    });
}

function deleteDestination(id) {
    if (confirm('Are you sure you want to delete this destination? This action cannot be undone.')) {
        fetch(`/admin/tours/destinations/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('Destination deleted successfully!', 'success');
                setTimeout(() => location.reload(), 1500);
            } else {
                showNotification('Error deleting destination: ' + data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Error deleting destination', 'error');
        });
    }
}

function filterDestinations() {
    const searchTerm = document.getElementById('search-destinations').value.toLowerCase();
    const regionFilter = document.getElementById('region-filter').value;
    const statusFilter = document.getElementById('status-filter').value;
    const toursFilter = document.getElementById('tours-filter').value;
    const seasonFilter = document.getElementById('season-filter')?.value || '';
    const featuredFilter = document.getElementById('featured-filter')?.checked || false;
    
    // Filter grid view
    const cards = document.querySelectorAll('.destination-card');
    cards.forEach(card => {
        const name = card.dataset.name;
        const region = card.dataset.region;
        const status = card.dataset.status;
        const tours = parseInt(card.dataset.tours);
        
        const matchesSearch = !searchTerm || name.includes(searchTerm);
        const matchesRegion = !regionFilter || region === regionFilter;
        const matchesStatus = !statusFilter || status === statusFilter;
        const matchesTours = !toursFilter || checkToursFilter(tours, toursFilter);
        const matchesFeatured = !featuredFilter || card.classList.contains('featured');
        
        card.style.display = matchesSearch && matchesRegion && matchesStatus && matchesTours && matchesFeatured ? 'block' : 'none';
    });
    
    // Filter list view
    const rows = document.querySelectorAll('.destination-row');
    rows.forEach(row => {
        const name = row.dataset.name;
        const region = row.dataset.region;
        const status = row.dataset.status;
        const tours = parseInt(row.dataset.tours);
        
        const matchesSearch = !searchTerm || name.includes(searchTerm);
        const matchesRegion = !regionFilter || region === regionFilter;
        const matchesStatus = !statusFilter || status === statusFilter;
        const matchesTours = !toursFilter || checkToursFilter(tours, toursFilter);
        const matchesFeatured = !featuredFilter || row.classList.contains('featured');
        
        row.style.display = matchesSearch && matchesRegion && matchesStatus && matchesTours && matchesFeatured ? '' : 'none';
    });
    
    updateResultsCount();
}

function checkToursFilter(tours, filter) {
    switch(filter) {
        case '0': return tours === 0;
        case '1-5': return tours >= 1 && tours <= 5;
        case '6-10': return tours >= 6 && tours <= 10;
        case '10+': return tours > 10;
        default: return true;
    }
}

function sortDestinations() {
    const sortBy = document.getElementById('sort-filter')?.value || 'name';
    
    // Get all destination elements
    const gridContainer = document.getElementById('grid-view');
    const listContainer = document.querySelector('#list-view tbody');
    
    // Sort grid view
    const gridCards = Array.from(gridContainer.querySelectorAll('.destination-card'));
    gridCards.sort((a, b) => compareDestinations(a, b, sortBy));
    
    gridCards.forEach(card => gridContainer.appendChild(card));
    
    // Sort list view
    const listRows = Array.from(listContainer.querySelectorAll('.destination-row'));
    listRows.sort((a, b) => compareDestinations(a, b, sortBy));
    
    listRows.forEach(row => listContainer.appendChild(row));
}

function compareDestinations(a, b, sortBy) {
    const aName = a.dataset.name;
    const bName = b.dataset.name;
    const aTours = parseInt(a.dataset.tours);
    const bTours = parseInt(b.dataset.tours);
    const aStatus = a.dataset.status;
    const bStatus = b.dataset.status;
    
    switch(sortBy) {
        case 'name':
            return aName.localeCompare(bName);
        case 'tours-desc':
            return bTours - aTours;
        case 'status':
            return aStatus.localeCompare(bStatus);
        case 'recent':
            // This would need a created_at field
            return 0;
        default:
            return 0;
    }
}

function updateResultsCount() {
    const visibleCards = document.querySelectorAll('.destination-card:not([style*="display: none"])').length;
    const visibleRows = document.querySelectorAll('.destination-row:not([style*="display: none"])').length;
    const totalVisible = currentViewMode === 'list' ? visibleRows : visibleCards;
    
    // Update results count if element exists
    const resultsElement = document.getElementById('results-count');
    if (resultsElement) {
        resultsElement.textContent = `Showing ${totalVisible} destinations`;
    }
}

function showMapView() {
    setViewMode('map');
    initializeMap();
}

function initializeMap() {
    const mapContainer = document.getElementById('map-view');
    mapContainer.innerHTML = `
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Interactive Destinations Map</h3>
                <div class="flex gap-2">
                    <button onclick="resetMapView()" class="px-3 py-1 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium">
                        <i class="ph-bold ph-arrow-counter-clockwise mr-1"></i>Reset
                    </button>
                    <button onclick="toggleMapFullscreen()" class="px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-sm font-medium">
                        <i class="ph-bold ph-arrows-out mr-1"></i>Fullscreen
                    </button>
                </div>
            </div>
            <div id="map-container" class="bg-gray-50 rounded-lg h-96 relative overflow-hidden">
                <!-- Simple Interactive Map -->
                <div class="absolute inset-0 bg-gradient-to-br from-blue-100 to-emerald-100">
                    <!-- Map Grid -->
                    <div class="absolute inset-0 opacity-30">
                        <div class="h-full w-full" style="background-image: repeating-linear-gradient(0deg, #e5e7eb 0px, transparent 1px, transparent 40px, #e5e7eb 41px), repeating-linear-gradient(90deg, #e5e7eb 0px, transparent 1px, transparent 40px, #e5e7eb 41px);"></div>
                    </div>
                    
                    <!-- Tanzania Map Outline (Simplified) -->
                    <svg class="absolute inset-0 w-full h-full" viewBox="0 0 400 500">
                        <path d="M 200 50 L 250 80 L 280 120 L 300 180 L 320 250 L 310 320 L 280 380 L 220 420 L 180 430 L 140 400 L 100 350 L 80 280 L 90 200 L 120 140 L 160 90 Z" 
                              fill="rgba(16, 185, 129, 0.1)" stroke="#10b981" stroke-width="2"/>
                    </svg>
                    
                    <!-- Destination Markers -->
                    <div id="map-markers" class="absolute inset-0">
                        <!-- Markers will be added dynamically -->
                    </div>
                </div>
                
                <!-- Map Controls -->
                <div class="absolute top-4 right-4 bg-white rounded-lg shadow-lg p-2 space-y-2">
                    <button onclick="zoomIn()" class="w-8 h-8 bg-gray-100 hover:bg-gray-200 rounded flex items-center justify-center">
                        <i class="ph-bold ph-plus text-gray-700"></i>
                    </button>
                    <button onclick="zoomOut()" class="w-8 h-8 bg-gray-100 hover:bg-gray-200 rounded flex items-center justify-center">
                        <i class="ph-bold ph-minus text-gray-700"></i>
                    </button>
                </div>
                
                <!-- Map Legend -->
                <div class="absolute bottom-4 left-4 bg-white rounded-lg shadow-lg p-3">
                    <h4 class="text-sm font-semibold text-gray-900 mb-2">Destinations</h4>
                    <div class="space-y-1">
                        <div class="flex items-center text-xs">
                            <div class="w-3 h-3 bg-emerald-500 rounded-full mr-2"></i>
                            <span>Northern Tanzania</span>
                        </div>
                        <div class="flex items-center text-xs">
                            <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></i>
                            <span>Southern Tanzania</span>
                        </div>
                        <div class="flex items-center text-xs">
                            <div class="w-3 h-3 bg-purple-500 rounded-full mr-2"></i>
                            <span>Western Tanzania</span>
                        </div>
                        <div class="flex items-center text-xs">
                            <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></i>
                            <span>Coastal Tanzania</span>
                        </div>
                        <div class="flex items-center text-xs">
                            <div class="w-3 h-3 bg-pink-500 rounded-full mr-2"></i>
                            <span>Zanzibar</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Destination Info Panel -->
            <div id="destination-info" class="hidden mt-4 bg-gray-50 rounded-lg p-4">
                <h4 class="font-semibold text-gray-900 mb-2" id="info-title">Destination Name</h4>
                <p class="text-sm text-gray-600 mb-3" id="info-description">Description</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4 text-xs text-gray-500">
                        <span id="info-tours">0 tours</span>
                        <span id="info-status">Status</span>
                    </div>
                    <button onclick="viewDestinationDetails()" class="px-3 py-1 bg-emerald-600 text-white rounded text-sm">
                        View Details
                    </button>
                </div>
            </div>
        </div>
    `;
    
    // Load destination markers
    loadDestinationMarkers();
}

function loadDestinationMarkers() {
    const markersContainer = document.getElementById('map-markers');
    if (!markersContainer) return;
    
    // Get all destination data from the page
    const destinationCards = document.querySelectorAll('.destination-card');
    const markers = [];
    
    destinationCards.forEach(card => {
        const name = card.querySelector('h3')?.textContent;
        const location = card.querySelector('.text-gray-600')?.textContent;
        const tours = card.dataset.tours || '0';
        const status = card.dataset.status || 'active';
        const region = card.dataset.region || 'northern';
        
        if (name && location) {
            markers.push({ name, location, tours, status, region });
        }
    });
    
    // Clear existing markers
    markersContainer.innerHTML = '';
    
    // Add markers to map (simplified positioning)
    markers.forEach((destination, index) => {
        const marker = document.createElement('div');
        marker.className = 'absolute w-6 h-6 rounded-full cursor-pointer transform -translate-x-1/2 -translate-y-1/2 hover:scale-110 transition-transform';
        
        // Color based on region
        const colors = {
            'northern': 'bg-emerald-500',
            'southern': 'bg-blue-500',
            'western': 'bg-purple-500',
            'coastal': 'bg-yellow-500',
            'zanzibar': 'bg-pink-500'
        };
        
        marker.className += ` ${colors[destination.region] || 'bg-gray-500'}`;
        
        // Position markers (simplified - in real app would use actual coordinates)
        const positions = [
            { top: '30%', left: '60%' }, // Serengeti area
            { top: '40%', left: '55%' }, // Ngorongoro area
            { top: '25%', left: '65%' }, // Kilimanjaro area
            { top: '50%', left: '40%' }, // Central Tanzania
            { top: '70%', left: '30%' }, // Southern Tanzania
            { top: '60%', left: '70%' }, // Coastal area
            { top: '80%', left: '75%' }, // Zanzibar
        ];
        
        const pos = positions[index % positions.length];
        marker.style.top = pos.top;
        marker.style.left = pos.left;
        
        // Add click event
        marker.onclick = () => showDestinationInfo(destination);
        
        // Add tooltip
        marker.title = destination.name;
        
        markersContainer.appendChild(marker);
    });
}

function showDestinationInfo(destination) {
    const infoPanel = document.getElementById('destination-info');
    const title = document.getElementById('info-title');
    const description = document.getElementById('info-description');
    const tours = document.getElementById('info-tours');
    const status = document.getElementById('info-status');
    
    if (infoPanel && title && description && tours && status) {
        title.textContent = destination.name;
        description.textContent = destination.location;
        tours.textContent = `${destination.tours} tours`;
        status.textContent = destination.status;
        
        infoPanel.classList.remove('hidden');
    }
}

function zoomIn() {
    showNotification('Zoom in - Feature coming soon!', 'info');
}

function zoomOut() {
    showNotification('Zoom out - Feature coming soon!', 'info');
}

function resetMapView() {
    loadDestinationMarkers();
    showNotification('Map view reset', 'success');
}

function toggleMapFullscreen() {
    const mapContainer = document.getElementById('map-container');
    if (mapContainer) {
        mapContainer.classList.toggle('fixed');
        mapContainer.classList.toggle('inset-0');
        mapContainer.classList.toggle('z-50');
        mapContainer.classList.toggle('h-screen');
        
        if (mapContainer.classList.contains('fixed')) {
            // Add fullscreen styles
            mapContainer.innerHTML += `
                <button onclick="toggleMapFullscreen()" class="absolute top-4 right-4 z-10 w-10 h-10 bg-white rounded-full shadow-lg flex items-center justify-center">
                    <i class="ph-bold ph-x text-gray-700"></i>
                </button>
            `;
        }
    }
}

function viewDestinationDetails() {
    showNotification('View destination details - Feature coming soon!', 'info');
}

function importDestinations() {
    showNotification('Import functionality coming soon!', 'info');
}

function exportDestinations() {
    showNotification('Exporting destinations...', 'info');
    // Implement export functionality
    setTimeout(() => {
        showNotification('Destinations exported successfully!', 'success');
    }, 2000);
}

function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 flex items-center ${
        type === 'success' ? 'bg-emerald-600 text-white' : 
        type === 'error' ? 'bg-red-600 text-white' : 
        'bg-blue-600 text-white'
    }`;
    notification.innerHTML = `
        <i class="ph-bold ph-${type === 'success' ? 'check-circle' : type === 'error' ? 'x-circle' : 'info'} mr-2"></i>
        ${message}
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

function addHighlight() {
    const container = document.getElementById('highlights-container');
    const div = document.createElement('div');
    div.className = 'flex gap-2';
    div.innerHTML = `
        <input type="text" name="highlights[]" placeholder="Add highlight..."
               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
        <button type="button" onclick="this.parentElement.remove()" class="px-3 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200">
            <i class="fas fa-times"></i>
        </button>
    `;
    container.appendChild(div);
}

function addImage() {
    const container = document.getElementById('images-container');
    const div = document.createElement('div');
    div.className = 'flex gap-2';
    div.innerHTML = `
        <input type="text" name="images[]" placeholder="Add image..."
               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
        <button type="button" onclick="this.parentElement.remove()" class="px-3 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200">
            <i class="fas fa-times"></i>
        </button>
    `;
    container.appendChild(div);
}

function loadHighlights(highlights) {
    const container = document.getElementById('highlights-container');
    container.innerHTML = '';
    
    highlights.forEach(highlight => {
        const div = document.createElement('div');
        div.className = 'flex gap-2';
        div.innerHTML = `
            <input type="text" name="highlights[]" value="${highlight}"
                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
            <button type="button" onclick="this.parentElement.remove()" class="px-3 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(div);
    });
    
    // Add empty input for new highlights
    addHighlight();
}

function loadImages(images) {
    const container = document.getElementById('images-container');
    container.innerHTML = '';
    
    images.forEach(image => {
        const div = document.createElement('div');
        div.className = 'flex gap-2';
        div.innerHTML = `
            <input type="text" name="images[]" value="${image}"
                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
            <button type="button" onclick="this.parentElement.remove()" class="px-3 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(div);
    });
    
    // Add empty input for new images
    addImage();
}

function viewDestination(id) {
    // View destination details
    window.open(`/destinations/${id}`, '_blank');
}

function exportDestinations() {
    // Export destinations data
    console.log('Exporting destinations');
}
</script>
@endsection
