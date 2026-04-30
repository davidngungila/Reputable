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
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="ph-bold ph-user-check text-purple-600 text-xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900">Recommended Guides</h2>
                </div>
                <a href="{{ route('admin.mountain.guide-assignments') }}" class="text-sm text-blue-600 hover:text-blue-700 font-medium">
                    Manage Guides
                </a>
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

        <!-- Images -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
            <div class="flex items-center mb-6">
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                    <i class="ph-bold ph-images text-green-600 text-xl"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-900">Tour Images</h2>
            </div>
            
            <!-- Current Images -->
            @if(!empty($tour->images))
            <div class="mb-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-3">Current Images</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    @foreach($tour->images as $index => $image)
                    <div class="relative group">
                        <img src="{{ asset($image) }}" alt="Tour Image {{ $index + 1 }}" 
                             class="w-full h-24 object-cover rounded-lg">
                        <button type="button" onclick="removeImage({{ $index }})" 
                                class="absolute top-1 right-1 p-1 bg-red-600 text-white rounded-full opacity-0 group-hover:opacity-100 transition-opacity">
                            <i class="ph-bold ph-x text-xs"></i>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            <!-- Upload New Images -->
            <div>
                <label for="images" class="block text-sm font-semibold text-gray-700 mb-2">Upload New Images</label>
                <input type="file" id="images" name="images[]" multiple accept="image/*"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                <p class="text-sm text-gray-500 mt-1">You can upload multiple images at once</p>
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
function removeImage(index) {
    if (confirm('Are you sure you want to remove this image?')) {
        // Add to a hidden input to track removed images
        const removedImagesInput = document.getElementById('removed_images') || 
            (() => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'removed_images';
                input.id = 'removed_images';
                document.querySelector('form').appendChild(input);
                return input;
            })();
        
        const currentRemoved = removedImagesInput.value ? removedImagesInput.value.split(',') : [];
        currentRemoved.push(index);
        removedImagesInput.value = currentRemoved.join(',');
        
        // Remove the image from the display
        event.target.closest('.relative').remove();
    }
}

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
