@extends('layouts.admin')

@section('title', 'Edit Tour - ' . $tour->name)

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Tour</h1>
            <p class="text-gray-600">Update tour information and manage relationships</p>
        </div>
        <div class="flex gap-3 mt-4 lg:mt-0">
            <a href="{{ route('admin.tours.show', $tour) }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-arrow-left mr-2"></i>Back to Tour
            </a>
            <a href="{{ route('admin.tours.itinerary-builder') }}?tour_id={{ $tour->id }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-map-trifold mr-2"></i>Itinerary
            </a>
        </div>
    </div>

    <!-- Tour Overview -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-emerald-50 rounded-lg p-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="ph-bold ph-backpack text-emerald-600"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Tour Name</p>
                        <p class="font-semibold text-gray-900">{{ $tour->name }}</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-blue-50 rounded-lg p-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="ph-bold ph-calendar text-blue-600"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Duration</p>
                        <p class="font-semibold text-gray-900">{{ $tour->duration_days }} days</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-purple-50 rounded-lg p-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="ph-bold ph-map-pin text-purple-600"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Location</p>
                        <p class="font-semibold text-gray-900">{{ $tour->location }}</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-orange-50 rounded-lg p-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="ph-bold ph-currency-dollar text-orange-600"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Base Price</p>
                        <p class="font-semibold text-gray-900">${{ number_format($tour->base_price, 0) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Form -->
    <form action="{{ route('admin.tours.update', $tour) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <!-- Basic Information -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
            <div class="flex items-center mb-6">
                <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center mr-3">
                    <i class="ph-bold ph-info text-emerald-600 text-xl"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-900">Basic Information</h2>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Tour Name</label>
                    <input type="text" id="name" name="name" value="{{ $tour->name }}" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           required>
                </div>
                
                <div>
                    <label for="location" class="block text-sm font-semibold text-gray-700 mb-2">Location</label>
                    <input type="text" id="location" name="location" value="{{ $tour->location }}" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           required>
                </div>
                
                <div>
                    <label for="tour_type" class="block text-sm font-semibold text-gray-700 mb-2">Tour Type</label>
                    <select id="tour_type" name="tour_type" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                            required>
                        <option value="safari" {{ $tour->tour_type === 'safari' ? 'selected' : '' }}>🦁 Safari</option>
                        <option value="mountain" {{ $tour->tour_type === 'mountain' ? 'selected' : '' }}>🏔️ Mountain Trekking</option>
                        <option value="beach" {{ $tour->tour_type === 'beach' ? 'selected' : '' }}>🏖️ Beach</option>
                        <option value="cultural" {{ $tour->tour_type === 'cultural' ? 'selected' : '' }}>🏛️ Cultural</option>
                    </select>
                </div>
                
                <div>
                    <label for="difficulty_level" class="block text-sm font-semibold text-gray-700 mb-2">Difficulty Level</label>
                    <select id="difficulty_level" name="difficulty_level" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="easy" {{ $tour->difficulty_level === 'easy' ? 'selected' : '' }}>🟢 Easy</option>
                        <option value="moderate" {{ $tour->difficulty_level === 'moderate' ? 'selected' : '' }}>🟡 Moderate</option>
                        <option value="challenging" {{ $tour->difficulty_level === 'challenging' ? 'selected' : '' }}>🔴 Challenging</option>
                    </select>
                </div>
                
                <div>
                    <label for="duration_days" class="block text-sm font-semibold text-gray-700 mb-2">Duration (Days)</label>
                    <input type="number" id="duration_days" name="duration_days" value="{{ $tour->duration_days }}" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           min="1" required>
                </div>
                
                <div>
                    <label for="base_price" class="block text-sm font-semibold text-gray-700 mb-2">Base Price ($)</label>
                    <input type="number" id="base_price" name="base_price" value="{{ $tour->base_price }}" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           min="0" step="0.01" required>
                </div>
                
                <div>
                    <label for="max_group_size" class="block text-sm font-semibold text-gray-700 mb-2">Max Group Size</label>
                    <input type="number" id="max_group_size" name="max_group_size" value="{{ $tour->max_group_size ?? 20 }}" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           min="1">
                </div>
                
                <div>
                    <label for="min_age" class="block text-sm font-semibold text-gray-700 mb-2">Minimum Age</label>
                    <input type="number" id="min_age" name="min_age" value="{{ $tour->min_age ?? 0 }}" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           min="0">
                </div>
                
                <div class="lg:col-span-2">
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea id="description" name="description" rows="4" 
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">{{ $tour->description }}</textarea>
                </div>
                
                <div class="lg:col-span-2">
                    <label for="highlights" class="block text-sm font-semibold text-gray-700 mb-2">Tour Highlights (one per line)</label>
                    <textarea id="highlights" name="highlights" rows="3" placeholder="Enter each highlight on a new line"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">{{ implode("\n", $tour->highlights ?? []) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Status and Featured -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
            <div class="flex items-center mb-6">
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                    <i class="ph-bold ph-flag text-purple-600 text-xl"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-900">Status & Visibility</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Tour Status</label>
                    <select id="status" name="status" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="active" {{ $tour->status === 'active' ? 'selected' : '' }}>✅ Active</option>
                        <option value="inactive" {{ $tour->status === 'inactive' ? 'selected' : '' }}>⏸️ Inactive</option>
                        <option value="draft" {{ $tour->status === 'draft' ? 'selected' : '' }}>📝 Draft</option>
                    </select>
                </div>
                
                <div class="flex items-center">
                    <input type="checkbox" id="featured" name="featured" value="1" {{ $tour->featured ? 'checked' : '' }}
                           class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                    <label for="featured" class="ml-2 text-sm font-medium text-gray-700">Featured Tour</label>
                </div>
            </div>
        </div>

        <!-- Destinations -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="ph-bold ph-map-pin text-blue-600 text-xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900">Destinations</h2>
                </div>
                <a href="{{ route('admin.tours.destinations') }}" class="text-sm text-blue-600 hover:text-blue-700 font-medium">
                    Manage Destinations
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($destinations as $destination)
                <label class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-emerald-50 cursor-pointer transition-colors">
                    <input type="checkbox" name="destinations[]" value="{{ $destination->id }}" 
                           {{ $tour->destinations->contains($destination->id) ? 'checked' : '' }}
                           class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                    <div class="ml-3">
                        <p class="font-medium text-gray-900">{{ $destination->name }}</p>
                        <p class="text-sm text-gray-500">{{ $destination->location }}</p>
                    </div>
                </label>
                @endforeach
            </div>
        </div>

        <!-- Equipment -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
                    <i class="ph-bold ph-backpack text-orange-600 text-xl"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-900">Required Equipment</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($equipment as $item)
                <label class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-emerald-50 cursor-pointer transition-colors">
                    <input type="checkbox" name="equipment[]" value="{{ $item->id }}" 
                           {{ $tour->equipment->contains($item->id) ? 'checked' : '' }}
                           class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                    <div class="ml-3">
                        <p class="font-medium text-gray-900">{{ $item->name }}</p>
                        <p class="text-sm text-gray-500">{{ $item->type }} • {{ $item->condition }}</p>
                    </div>
                </label>
                @endforeach
            </div>
        </div>

        <!-- Recommended Guides -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
            <div class="flex items-center mb-6">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="ph-bold ph-user-check text-purple-600 text-xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900">Recommended Guides</h2>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($guides as $guide)
                <label class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-emerald-50 cursor-pointer transition-colors">
                    <input type="checkbox" name="guides[]" value="{{ $guide->id }}" 
                           {{ $tour->recommendedGuides->contains($guide->id) ? 'checked' : '' }}
                           class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                    <div class="ml-3">
                        <p class="font-medium text-gray-900">{{ $guide->name }}</p>
                        <p class="text-sm text-gray-500">{{ $guide->email }}</p>
                    </div>
                </label>
                @endforeach
            </div>
        </div>

        <!-- Advanced Images Section -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="ph-bold ph-images text-green-600 text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Advanced Image Management</h2>
                        <p class="text-sm text-gray-500">Professional Cloudinary integration with drag-and-drop</p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <button type="button" onclick="openCloudinaryModal()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                        <i class="ph-bold ph-cloud-arrow-up mr-2"></i>Cloudinary Gallery
                    </button>
                    <button type="button" onclick="refreshCloudinaryImages()" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors text-sm font-medium">
                        <i class="ph-bold ph-arrow-clockwise mr-2"></i>Refresh
                    </button>
                </div>
            </div>
            
            <!-- Image Management Tabs -->
            <div class="border-b border-gray-200 mb-6">
                <nav class="flex space-x-8" aria-label="Tabs">
                    <button onclick="switchTab('current')" class="tab-button active py-2 px-1 border-b-2 border-emerald-500 font-medium text-sm text-emerald-600" data-tab="current">
                        <i class="ph-bold ph-images mr-2"></i>Current Images
                    </button>
                    <button onclick="switchTab('upload')" class="tab-button py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="upload">
                        <i class="ph-bold ph-cloud-arrow-up mr-2"></i>Upload New
                    </button>
                    <button onclick="switchTab('gallery')" class="tab-button py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="gallery">
                        <i class="ph-bold ph-photo-library mr-2"></i>Cloudinary Gallery
                    </button>
                    <button onclick="switchTab('settings')" class="tab-button py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="settings">
                        <i class="ph-bold ph-gear mr-2"></i>Settings
                    </button>
                </nav>
            </div>
            
            <!-- Current Images Tab -->
            <div id="current-tab" class="tab-content">
                @if(!empty($tour->images))
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Current Tour Images</h3>
                        <span class="text-sm text-gray-500">{{ count($tour->images) }} images • Drag to reorder</span>
                    </div>
                    <div id="sortable-images" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($tour->images as $index => $image)
                        <div class="image-card bg-gray-50 rounded-lg overflow-hidden border border-gray-200 hover:border-emerald-300 transition-colors" data-index="{{ $index }}">
                            <div class="relative group">
                                <img src="{{ $image }}" alt="Tour Image {{ $index + 1 }}" 
                                     class="w-full h-48 object-cover">
                                <div class="absolute top-2 left-2 bg-emerald-600 text-white px-2 py-1 rounded-full text-xs font-semibold">
                                    {{ $index + 1 }}
                                </div>
                                <div class="absolute top-2 right-2 flex gap-1">
                                    <button type="button" onclick="editImage({{ $index }})" 
                                            class="p-1.5 bg-white/90 backdrop-blur-sm rounded-full opacity-0 group-hover:opacity-100 transition-opacity hover:bg-white">
                                        <i class="ph-bold ph-pencil text-xs text-gray-700"></i>
                                    </button>
                                    <button type="button" onclick="removeImage({{ $index }})" 
                                            class="p-1.5 bg-red-600/90 backdrop-blur-sm rounded-full opacity-0 group-hover:opacity-100 transition-opacity hover:bg-red-600">
                                        <i class="ph-bold ph-x text-xs text-white"></i>
                                    </button>
                                </div>
                                <div class="absolute bottom-2 left-2 right-2 bg-black/60 backdrop-blur-sm text-white p-2 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                                    <p class="text-xs truncate">{{ basename(parse_url($image, PHP_URL_PATH)) }}</p>
                                </div>
                            </div>
                            <div class="p-3">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600">Image {{ $index + 1 }}</span>
                                    <div class="flex items-center gap-1">
                                        <button type="button" onclick="moveImageUp({{ $index }})" class="p-1 text-gray-400 hover:text-gray-600">
                                            <i class="ph-bold ph-caret-up"></i>
                                        </button>
                                        <button type="button" onclick="moveImageDown({{ $index }})" class="p-1 text-gray-400 hover:text-gray-600">
                                            <i class="ph-bold ph-caret-down"></i>
                                        </button>
                                    </div>
                                </div>
                                <input type="hidden" name="tour_images[{{ $index }}]" value="{{ $image }}">
                                <input type="url" name="image_url_{{ $index }}" value="{{ $image }}" 
                                       class="w-full mt-2 px-3 py-2 text-sm border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-emerald-500"
                                       placeholder="Image URL">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="text-center py-12 bg-gray-50 rounded-lg border-2 border-dashed border-gray-300">
                    <i class="ph-bold ph-images text-4xl text-gray-400 mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No Images Yet</h3>
                    <p class="text-gray-500 mb-4">Start by uploading images or selecting from Cloudinary gallery</p>
                    <button type="button" onclick="switchTab('upload')" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                        <i class="ph-bold ph-plus mr-2"></i>Add First Image
                    </button>
                </div>
                @endif
            </div>
            
            <!-- Upload New Tab -->
            <div id="upload-tab" class="tab-content hidden">
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Upload New Images</h3>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-emerald-400 transition-colors">
                        <i class="ph-bold ph-cloud-arrow-up text-4xl text-gray-400 mb-4"></i>
                        <p class="text-lg font-medium text-gray-900 mb-2">Drop images here or click to upload</p>
                        <p class="text-sm text-gray-500 mb-4">Support for JPG, PNG, WebP up to 10MB each</p>
                        <input type="file" id="file-upload" multiple accept="image/*" class="hidden">
                        <button type="button" onclick="document.getElementById('file-upload').click()" 
                                class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                            <i class="ph-bold ph-folder-open mr-2"></i>Choose Files
                        </button>
                    </div>
                    <div id="upload-preview" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4"></div>
                </div>
                
                <!-- URL Upload Section -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h4 class="text-md font-semibold text-gray-900 mb-4">Or Add Image URLs</h4>
                    <div class="space-y-3">
                        <div class="flex gap-2">
                            <input type="url" id="new-image-url" 
                                   placeholder="https://res.cloudinary.com/dqflffa1o/image/upload/..."
                                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                            <button type="button" onclick="addImageFromUrl()" 
                                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                <i class="ph-bold ph-plus mr-2"></i>Add
                            </button>
                        </div>
                        <p class="text-xs text-gray-500">Enter Cloudinary URLs or any image URLs</p>
                    </div>
                </div>
            </div>
            
            <!-- Cloudinary Gallery Tab -->
            <div id="gallery-tab" class="tab-content hidden">
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Cloudinary Image Gallery</h3>
                        <div class="flex items-center gap-2">
                            <input type="text" id="cloudinary-search" placeholder="Search images..." 
                                   class="px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                            <button type="button" onclick="searchCloudinaryImages()" 
                                    class="px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm">
                                <i class="ph-bold ph-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Filter Options -->
                    <div class="flex flex-wrap gap-2 mb-4">
                        <button type="button" onclick="filterImages('all')" class="filter-btn px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-sm font-medium">All</button>
                        <button type="button" onclick="filterImages('wildlife')" class="filter-btn px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm font-medium">Wildlife</button>
                        <button type="button" onclick="filterImages('landscape')" class="filter-btn px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm font-medium">Landscape</button>
                        <button type="button" onclick="filterImages('people')" class="filter-btn px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm font-medium">People</button>
                        <button type="button" onclick="filterImages('activities')" class="filter-btn px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm font-medium">Activities</button>
                    </div>
                    
                    <div id="cloudinary-gallery" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-3 max-h-96 overflow-y-auto p-2 bg-gray-50 rounded-lg">
                        <!-- Cloudinary images will be loaded here -->
                    </div>
                </div>
            </div>
            
            <!-- Settings Tab -->
            <div id="settings-tab" class="tab-content hidden">
                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Image Settings</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Default Image Quality</label>
                                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                                    <option>Auto (recommended)</option>
                                    <option>High</option>
                                    <option>Medium</option>
                                    <option>Low</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Image Format</label>
                                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                                    <option>Auto (recommended)</option>
                                    <option>JPEG</option>
                                    <option>PNG</option>
                                    <option>WebP</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Max Images per Tour</label>
                                <input type="number" value="10" min="1" max="20" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Auto-optimization</label>
                                <div class="flex items-center">
                                    <input type="checkbox" checked class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                                    <label class="ml-2 text-sm text-gray-700">Enable automatic image optimization</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Cloudinary Settings</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Cloud Name</label>
                                <input type="text" value="dqflffa1o" readonly 
                                       class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">API Status</label>
                                <div class="flex items-center">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                    <span class="text-sm text-green-700">Connected</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-500">
                    <i class="ph-bold ph-info mr-1"></i>
                    All changes will be saved immediately upon submission
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('admin.tours.show', $tour) }}" class="px-6 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors font-medium">
                        <i class="ph-bold ph-x mr-2"></i>Cancel
                    </a>
                    <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors font-medium">
                        <i class="ph-bold ph-check-circle mr-2"></i>Save Changes
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
// Advanced Image Management System
let cloudinaryImages = [];
let currentFilter = 'all';

// Tab switching functionality
function switchTab(tabName) {
    // Hide all tabs
    document.querySelectorAll('.tab-content').forEach(tab => {
        tab.classList.add('hidden');
    });
    
    // Remove active state from all buttons
    document.querySelectorAll('.tab-button').forEach(btn => {
        btn.classList.remove('border-emerald-500', 'text-emerald-600');
        btn.classList.add('border-transparent', 'text-gray-500');
    });
    
    // Show selected tab
    document.getElementById(tabName + '-tab').classList.remove('hidden');
    
    // Set active button
    const activeBtn = document.querySelector(`[data-tab="${tabName}"]`);
    activeBtn.classList.remove('border-transparent', 'text-gray-500');
    activeBtn.classList.add('border-emerald-500', 'text-emerald-600');
    
    // Load Cloudinary images when gallery tab is opened
    if (tabName === 'gallery') {
        loadCloudinaryGallery();
    }
}

// Load Cloudinary gallery
async function loadCloudinaryGallery() {
    try {
        const response = await fetch('/admin/cloudinary/api/resources');
        const data = await response.json();
        cloudinaryImages = data.resources || [];
        renderCloudinaryGallery();
    } catch (error) {
        console.error('Failed to load Cloudinary images:', error);
        // Fallback to sample images
        loadSampleImages();
    }
}

function loadSampleImages() {
    cloudinaryImages = [
        { public_id: 'Zeebraaa_cpydg9', secure_url: 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468788/Zeebraaa_cpydg9.jpg', resource_type: 'image' },
        { public_id: 'tiger-5167034_1920_leu8nd', secure_url: 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468772/tiger-5167034_1920_leu8nd.jpg', resource_type: 'image' },
        { public_id: 'tanzania-2275107_1920_cmihwj', secure_url: 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468771/tanzania-2275107_1920_cmihwj.jpg', resource_type: 'image' },
        { public_id: 'Tarangire_ck2ohe', secure_url: 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468772/Tarangire_ck2ohe.jpg', resource_type: 'image' },
        { public_id: 'spphoto_skxxer', secure_url: 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468771/spphoto_skxxer.jpg', resource_type: 'image' },
        { public_id: 'waterbuck_ggd5wl', secure_url: 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468777/waterbuck_ggd5wl.jpg', resource_type: 'image' },
        { public_id: 'Wwwwwbeest_lnndaz', secure_url: 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468786/Wwwwwbeest_lnndaz.jpg', resource_type: 'image' },
        { public_id: 'Wwildbeest_xghpan', secure_url: 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468786/Wwildbeest_xghpan.jpg', resource_type: 'image' }
    ];
    renderCloudinaryGallery();
}

function renderCloudinaryGallery() {
    const gallery = document.getElementById('cloudinary-gallery');
    const filteredImages = filterImagesByType(cloudinaryImages, currentFilter);
    
    gallery.innerHTML = filteredImages.map((image, index) => `
        <div class="gallery-item cursor-pointer group relative" onclick="selectCloudinaryImage('${image.secure_url}')">
            <img src="${image.secure_url}" alt="${image.public_id}" 
                 class="w-full h-20 object-cover rounded-lg border-2 border-gray-200 group-hover:border-emerald-400 transition-colors">
            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors rounded-lg flex items-center justify-center">
                <i class="ph-bold ph-plus-circle text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity"></i>
            </div>
            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-1 rounded-b-lg">
                <p class="text-xs text-white truncate">${image.public_id}</p>
            </div>
        </div>
    `).join('');
}

function filterImagesByType(images, type) {
    if (type === 'all') return images;
    
    // Simple keyword-based filtering
    const keywords = {
        'wildlife': ['zebra', 'tiger', 'waterbuck', 'wildebeest', 'animal'],
        'landscape': ['tanzania', 'mountain', 'sunset', 'nature'],
        'people': ['guide', 'tourist', 'person', 'group'],
        'activities': ['trekking', 'safari', 'tour', 'activity']
    };
    
    return images.filter(image => {
        const filename = image.public_id.toLowerCase();
        return keywords[type]?.some(keyword => filename.includes(keyword)) || false;
    });
}

function filterImages(type) {
    currentFilter = type;
    
    // Update filter buttons
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.remove('bg-emerald-100', 'text-emerald-700');
        btn.classList.add('bg-gray-100', 'text-gray-700');
    });
    
    event.target.classList.remove('bg-gray-100', 'text-gray-700');
    event.target.classList.add('bg-emerald-100', 'text-emerald-700');
    
    renderCloudinaryGallery();
}

function selectCloudinaryImage(url) {
    // Find the first empty image slot or add to the end
    const imageInputs = document.querySelectorAll('input[name^="image_url_"]');
    let added = false;
    
    for (let input of imageInputs) {
        if (!input.value) {
            input.value = url;
            updateImagePreview(input);
            added = true;
            break;
        }
    }
    
    if (!added) {
        // Add new image field
        addNewImageField(url);
    }
    
    // Show success notification
    showNotification('Image added successfully!', 'success');
}

function addNewImageField(url) {
    const currentImages = document.getElementById('sortable-images');
    const newIndex = currentImages.children.length;
    
    const newCard = document.createElement('div');
    newCard.className = 'image-card bg-gray-50 rounded-lg overflow-hidden border border-gray-200 hover:border-emerald-300 transition-colors';
    newCard.dataset.index = newIndex;
    
    newCard.innerHTML = `
        <div class="relative group">
            <img src="${url}" alt="Tour Image ${newIndex + 1}" 
                 class="w-full h-48 object-cover">
            <div class="absolute top-2 left-2 bg-emerald-600 text-white px-2 py-1 rounded-full text-xs font-semibold">
                ${newIndex + 1}
            </div>
            <div class="absolute top-2 right-2 flex gap-1">
                <button type="button" onclick="editImage(${newIndex})" 
                        class="p-1.5 bg-white/90 backdrop-blur-sm rounded-full opacity-0 group-hover:opacity-100 transition-opacity hover:bg-white">
                    <i class="ph-bold ph-pencil text-xs text-gray-700"></i>
                </button>
                <button type="button" onclick="removeImage(${newIndex})" 
                        class="p-1.5 bg-red-600/90 backdrop-blur-sm rounded-full opacity-0 group-hover:opacity-100 transition-opacity hover:bg-red-600">
                    <i class="ph-bold ph-x text-xs text-white"></i>
                </button>
            </div>
        </div>
        <div class="p-3">
            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600">Image ${newIndex + 1}</span>
                <div class="flex items-center gap-1">
                    <button type="button" onclick="moveImageUp(${newIndex})" class="p-1 text-gray-400 hover:text-gray-600">
                        <i class="ph-bold ph-caret-up"></i>
                    </button>
                    <button type="button" onclick="moveImageDown(${newIndex})" class="p-1 text-gray-400 hover:text-gray-600">
                        <i class="ph-bold ph-caret-down"></i>
                    </button>
                </div>
            </div>
            <input type="hidden" name="tour_images[${newIndex}]" value="${url}">
            <input type="url" name="image_url_${newIndex}" value="${url}" 
                   class="w-full mt-2 px-3 py-2 text-sm border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-emerald-500"
                   placeholder="Image URL">
        </div>
    `;
    
    currentImages.appendChild(newCard);
}

function updateImagePreview(input) {
    const card = input.closest('.image-card');
    if (card) {
        const img = card.querySelector('img');
        if (img && input.value) {
            img.src = input.value;
        }
    }
}

function removeImage(index) {
    if (confirm('Are you sure you want to remove this image?')) {
        const card = document.querySelector(`[data-index="${index}"]`);
        if (card) {
            card.remove();
            // Reindex remaining images
            reindexImages();
            showNotification('Image removed', 'info');
        }
    }
}

function moveImageUp(index) {
    const cards = Array.from(document.querySelectorAll('.image-card'));
    const currentIndex = cards.findIndex(card => card.dataset.index == index);
    
    if (currentIndex > 0) {
        const currentCard = cards[currentIndex];
        const prevCard = cards[currentIndex - 1];
        
        // Swap in DOM
        currentCard.parentNode.insertBefore(prevCard, currentCard);
        reindexImages();
    }
}

function moveImageDown(index) {
    const cards = Array.from(document.querySelectorAll('.image-card'));
    const currentIndex = cards.findIndex(card => card.dataset.index == index);
    
    if (currentIndex < cards.length - 1) {
        const currentCard = cards[currentIndex];
        const nextCard = cards[currentIndex + 1];
        
        // Swap in DOM
        currentCard.parentNode.insertBefore(nextCard, currentCard.nextSibling);
        reindexImages();
    }
}

function reindexImages() {
    const cards = document.querySelectorAll('.image-card');
    cards.forEach((card, index) => {
        card.dataset.index = index;
        
        // Update index displays
        const badge = card.querySelector('.bg-emerald-600');
        if (badge) badge.textContent = index + 1;
        
        const label = card.querySelector('.text-gray-600');
        if (label) label.textContent = `Image ${index + 1}`;
        
        // Update input names and values
        const hiddenInput = card.querySelector('input[type="hidden"]');
        const urlInput = card.querySelector('input[type="url"]');
        
        if (hiddenInput) {
            hiddenInput.name = `tour_images[${index}]`;
        }
        if (urlInput) {
            urlInput.name = `image_url_${index}`;
        }
        
        // Update button onclick handlers
        const editBtn = card.querySelector('button[onclick*="editImage"]');
        const removeBtn = card.querySelector('button[onclick*="removeImage"]');
        const upBtn = card.querySelector('button[onclick*="moveImageUp"]');
        const downBtn = card.querySelector('button[onclick*="moveImageDown"]');
        
        if (editBtn) editBtn.setAttribute('onclick', `editImage(${index})`);
        if (removeBtn) removeBtn.setAttribute('onclick', `removeImage(${index})`);
        if (upBtn) upBtn.setAttribute('onclick', `moveImageUp(${index})`);
        if (downBtn) downBtn.setAttribute('onclick', `moveImageDown(${index})`);
    });
}

function addImageFromUrl() {
    const urlInput = document.getElementById('new-image-url');
    const url = urlInput.value.trim();
    
    if (url) {
        addNewImageField(url);
        urlInput.value = '';
        showNotification('Image added from URL!', 'success');
    }
}

function openCloudinaryModal() {
    switchTab('gallery');
}

function refreshCloudinaryImages() {
    loadCloudinaryGallery();
    showNotification('Cloudinary gallery refreshed!', 'info');
}

function searchCloudinaryImages() {
    const searchTerm = document.getElementById('cloudinary-search').value.toLowerCase();
    
    if (searchTerm) {
        const filtered = cloudinaryImages.filter(image => 
            image.public_id.toLowerCase().includes(searchTerm)
        );
        renderFilteredGallery(filtered);
    } else {
        renderCloudinaryGallery();
    }
}

function renderFilteredGallery(images) {
    const gallery = document.getElementById('cloudinary-gallery');
    
    gallery.innerHTML = images.map((image, index) => `
        <div class="gallery-item cursor-pointer group relative" onclick="selectCloudinaryImage('${image.secure_url}')">
            <img src="${image.secure_url}" alt="${image.public_id}" 
                 class="w-full h-20 object-cover rounded-lg border-2 border-gray-200 group-hover:border-emerald-400 transition-colors">
            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors rounded-lg flex items-center justify-center">
                <i class="ph-bold ph-plus-circle text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity"></i>
            </div>
        </div>
    `).join('');
}

function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `fixed bottom-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 flex items-center ${
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

// File upload handling
document.addEventListener('DOMContentLoaded', function() {
    const fileUpload = document.getElementById('file-upload');
    const dropZone = fileUpload?.parentElement;
    
    if (dropZone) {
        // Click to upload
        dropZone.addEventListener('click', () => fileUpload.click());
        
        // Drag and drop
        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('border-emerald-400', 'bg-emerald-50');
        });
        
        dropZone.addEventListener('dragleave', () => {
            dropZone.classList.remove('border-emerald-400', 'bg-emerald-50');
        });
        
        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-emerald-400', 'bg-emerald-50');
            handleFiles(e.dataTransfer.files);
        });
        
        // File selection
        fileUpload.addEventListener('change', (e) => {
            handleFiles(e.target.files);
        });
    }
    
    // Initialize drag and drop for sortable images
    initializeSortable();
});

function handleFiles(files) {
    const preview = document.getElementById('upload-preview');
    
    Array.from(files).forEach(file => {
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = (e) => {
                const previewItem = document.createElement('div');
                previewItem.className = 'relative group';
                previewItem.innerHTML = `
                    <img src="${e.target.result}" alt="${file.name}" 
                         class="w-full h-32 object-cover rounded-lg">
                    <button type="button" onclick="this.parentElement.remove()" 
                            class="absolute top-2 right-2 p-1 bg-red-600 text-white rounded-full opacity-0 group-hover:opacity-100 transition-opacity">
                        <i class="ph-bold ph-x text-xs"></i>
                    </button>
                    <div class="mt-2">
                        <p class="text-xs text-gray-600 truncate">${file.name}</p>
                        <p class="text-xs text-gray-400">${(file.size / 1024 / 1024).toFixed(2)} MB</p>
                    </div>
                `;
                preview.appendChild(previewItem);
            };
            reader.readAsDataURL(file);
        }
    });
}

function initializeSortable() {
    const sortableContainer = document.getElementById('sortable-images');
    if (sortableContainer) {
        let draggedElement = null;
        
        sortableContainer.addEventListener('dragstart', (e) => {
            if (e.target.classList.contains('image-card')) {
                draggedElement = e.target;
                e.target.style.opacity = '0.5';
            }
        });
        
        sortableContainer.addEventListener('dragend', (e) => {
            if (e.target.classList.contains('image-card')) {
                e.target.style.opacity = '';
            }
        });
        
        sortableContainer.addEventListener('dragover', (e) => {
            e.preventDefault();
            const afterElement = getDragAfterElement(sortableContainer, e.clientY);
            if (afterElement == null) {
                sortableContainer.appendChild(draggedElement);
            } else {
                sortableContainer.insertBefore(draggedElement, afterElement);
            }
        });
        
        // Make cards draggable
        document.querySelectorAll('.image-card').forEach(card => {
            card.draggable = true;
        });
    }
}

function getDragAfterElement(container, y) {
    const draggableElements = [...container.querySelectorAll('.image-card:not(.dragging)')];
    
    return draggableElements.reduce((closest, child) => {
        const box = child.getBoundingClientRect();
        const offset = y - box.top - box.height / 2;
        
        if (offset < 0 && offset > closest.offset) {
            return { offset: offset, element: child };
        } else {
            return closest;
        }
    }, { offset: Number.NEGATIVE_INFINITY }).element;
}

// Legacy functions for compatibility
function setImageUrl(imageField, url) {
    const input = document.getElementById(imageField);
    if (input) {
        input.value = url;
        updateImagePreview(input);
    }
}

// Form validation
document.querySelector('form').addEventListener('submit', function(e) {
    const name = document.getElementById('name').value.trim();
    const location = document.getElementById('location').value.trim();
    const duration = document.getElementById('duration_days').value;
    const price = document.getElementById('base_price').value;
    
    if (!name || !location || !duration || !price) {
        e.preventDefault();
        showNotification('Please fill in all required fields', 'error');
        return false;
    }
    
    if (duration < 1) {
        e.preventDefault();
        showNotification('Duration must be at least 1 day', 'error');
        return false;
    }
    
    if (price < 0) {
        e.preventDefault();
        showNotification('Price must be a positive number', 'error');
        return false;
    }
});

// Auto-save functionality (optional enhancement)
let autoSaveTimer;
const form = document.querySelector('form');

form.addEventListener('input', function() {
    clearTimeout(autoSaveTimer);
    autoSaveTimer = setTimeout(function() {
        console.log('Auto-save functionality can be implemented here');
    }, 30000); // Auto-save after 30 seconds of inactivity
});

// Form validation
form.addEventListener('submit', function(e) {
    const name = document.getElementById('name').value.trim();
    const location = document.getElementById('location').value.trim();
    const duration = document.getElementById('duration_days').value;
    const price = document.getElementById('base_price').value;
    
    if (!name || !location || !duration || !price) {
        e.preventDefault();
        alert('Please fill in all required fields');
        return false;
    }
    
    if (duration < 1) {
        e.preventDefault();
        alert('Duration must be at least 1 day');
        return false;
    }
    
    if (price < 0) {
        e.preventDefault();
        alert('Price must be a positive number');
        return false;
    }
});
</script>
@endsection
