@extends('layouts.admin')

@section('title', 'Edit Destination')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Destination</h1>
            <p class="text-gray-600">Update destination information and details</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.tours.destinations') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors text-sm font-medium">
                <i class="fas fa-arrow-left mr-2"></i>Back to Destinations
            </a>
        </div>
    </div>

    <!-- Edit Form -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
        <form action="{{ route('admin.tours.destinations.update', $destination) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Basic Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Destination Name *</label>
                    <input type="text" name="name" value="{{ old('name', $destination->name) }}" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Location *</label>
                    <input type="text" name="location" value="{{ old('location', $destination->location) }}" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           required>
                    @error('location')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" rows="4" 
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                          placeholder="Describe this destination...">{{ old('description', $destination->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Coordinates -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Latitude</label>
                    <input type="number" name="coordinates[lat]" value="{{ old('coordinates.lat', $destination->coordinates['lat'] ?? '') }}" 
                           step="any" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="-6.7924">
                    @error('coordinates.lat')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Longitude</label>
                    <input type="number" name="coordinates[lng]" value="{{ old('coordinates.lng', $destination->coordinates['lng'] ?? '') }}" 
                           step="any" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="37.0622">
                    @error('coordinates.lng')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Additional Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Best Time to Visit</label>
                    <input type="text" name="best_time_to_visit" value="{{ old('best_time_to_visit', $destination->best_time_to_visit) }}" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="June - October">
                    @error('best_time_to_visit')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="active" {{ old('status', $destination->status) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status', $destination->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Weather Information -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Weather Information</label>
                <textarea name="weather_info" rows="3" 
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                          placeholder="Weather conditions and climate information...">{{ old('weather_info', $destination->weather_info) }}</textarea>
                @error('weather_info')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Highlights -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Highlights</label>
                <div id="highlights-container" class="space-y-2">
                    @php
                        $highlights = old('highlights', $destination->highlights ?? []);
                        if (!is_array($highlights)) $highlights = [];
                    @endphp
                    @foreach($highlights as $index => $highlight)
                    <div class="flex gap-2">
                        <input type="text" name="highlights[]" value="{{ $highlight }}" 
                               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                               placeholder="Enter highlight...">
                        <button type="button" onclick="removeHighlight(this)" class="px-3 py-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition-colors">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    @endforeach
                </div>
                <button type="button" onclick="addHighlight()" class="mt-2 px-4 py-2 bg-emerald-100 text-emerald-700 rounded-lg hover:bg-emerald-200 transition-colors text-sm font-medium">
                    <i class="fas fa-plus mr-2"></i>Add Highlight
                </div>
                @error('highlights')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Images -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Images</label>
                <div id="images-container" class="space-y-2">
                    @php
                        $images = old('images', $destination->images ?? []);
                        if (!is_array($images)) $images = [];
                    @endphp
                    @foreach($images as $index => $image)
                    <div class="flex gap-2">
                        <input type="text" name="images[]" value="{{ $image }}" 
                               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                               placeholder="Enter image URL...">
                        <button type="button" onclick="removeImage(this)" class="px-3 py-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition-colors">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    @endforeach
                </div>
                <button type="button" onclick="addImage()" class="mt-2 px-4 py-2 bg-emerald-100 text-emerald-700 rounded-lg hover:bg-emerald-200 transition-colors text-sm font-medium">
                    <i class="fas fa-plus mr-2"></i>Add Image
                </button>
                @error('images')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Linked Tours -->
            <div class="bg-gray-50 rounded-lg p-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Linked Tours</h3>
                @if($destination->tours->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        @foreach($destination->tours as $tour)
                        <div class="flex items-center justify-between p-3 bg-white rounded-lg border border-gray-200">
                            <div>
                                <p class="font-medium text-gray-900">{{ $tour->name }}</p>
                                <p class="text-sm text-gray-600">{{ $tour->duration_days }} days • ${{ number_format($tour->price, 0) }}</p>
                            </div>
                            <a href="{{ route('admin.tours.show', $tour) }}" class="text-emerald-600 hover:text-emerald-800">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-600">No tours linked to this destination yet.</p>
                @endif
            </div>

            <!-- Actions -->
            <div class="flex justify-end gap-3 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.tours.destinations') }}" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                    Update Destination
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function addHighlight() {
    const container = document.getElementById('highlights-container');
    const div = document.createElement('div');
    div.className = 'flex gap-2';
    div.innerHTML = `
        <input type="text" name="highlights[]" 
               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
               placeholder="Enter highlight...">
        <button type="button" onclick="removeHighlight(this)" class="px-3 py-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition-colors">
            <i class="fas fa-times"></i>
        </button>
    `;
    container.appendChild(div);
}

function removeHighlight(button) {
    button.parentElement.remove();
}

function addImage() {
    const container = document.getElementById('images-container');
    const div = document.createElement('div');
    div.className = 'flex gap-2';
    div.innerHTML = `
        <input type="text" name="images[]" 
               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
               placeholder="Enter image URL...">
        <button type="button" onclick="removeImage(this)" class="px-3 py-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition-colors">
            <i class="fas fa-times"></i>
        </button>
    `;
    container.appendChild(div);
}

function removeImage(button) {
    button.parentElement.remove();
}
</script>
@endsection
