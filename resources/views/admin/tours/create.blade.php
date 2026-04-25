@extends('layouts.admin')

@section('title', 'Add New Tour')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Add New Tour</h1>
        <p class="text-gray-600">Create a new safari package or tour experience</p>
    </div>

    <form action="{{ route('admin.tours.store') }}" method="POST" class="space-y-8">
        @csrf

        <!-- Basic Information -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <h2 class="text-xl font-semibold text-gray-900 mb-6">Basic Information</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tour Name *</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="e.g., 7-Day Serengeti Safari">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Location *</label>
                    <input type="text" name="location" value="{{ old('location') }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="e.g., Serengeti National Park">
                    @error('location')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Duration (Days) *</label>
                    <input type="number" name="duration_days" value="{{ old('duration_days') }}" required min="1" max="30"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="7">
                    @error('duration_days')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Base Price ($) *</label>
                    <input type="number" name="base_price" value="{{ old('base_price') }}" required min="0" step="0.01"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="2500">
                    @error('base_price')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tour Type *</label>
                    <select name="tour_type" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">Select Tour Type</option>
                        <option value="safari" {{ old('tour_type') == 'safari' ? 'selected' : '' }}>Safari</option>
                        <option value="mountain" {{ old('tour_type') == 'mountain' ? 'selected' : '' }}>Mountain Trekking</option>
                        <option value="beach" {{ old('tour_type') == 'beach' ? 'selected' : '' }}>Beach</option>
                        <option value="cultural" {{ old('tour_type') == 'cultural' ? 'selected' : '' }}>Cultural</option>
                    </select>
                    @error('tour_type')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Difficulty Level</label>
                    <select name="difficulty_level"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">Select Difficulty</option>
                        <option value="easy" {{ old('difficulty_level') == 'easy' ? 'selected' : '' }}>Easy</option>
                        <option value="moderate" {{ old('difficulty_level') == 'moderate' ? 'selected' : '' }}>Moderate</option>
                        <option value="challenging" {{ old('difficulty_level') == 'challenging' ? 'selected' : '' }}>Challenging</option>
                    </select>
                    @error('difficulty_level')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Max Group Size</label>
                    <input type="number" name="max_group_size" value="{{ old('max_group_size', 20) }}" min="1" max="50"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="20">
                    @error('max_group_size')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Minimum Age</label>
                    <input type="number" name="min_age" value="{{ old('min_age', 0) }}" min="0" max="100"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="0">
                    @error('min_age')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" rows="4"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                          placeholder="Describe the tour experience, highlights, and what makes it special...">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Tour Details -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <h2 class="text-xl font-semibold text-gray-900 mb-6">Tour Details</h2>

            <div class="space-y-6">
                <!-- Inclusions -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Inclusions</label>
                    <div id="inclusions-container" class="space-y-2">
                        <div class="flex gap-2">
                            <input type="text" name="inclusions[]" placeholder="e.g., All meals, accommodation, transport"
                                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                            <button type="button" onclick="addInclusion()" class="px-3 py-2 bg-emerald-100 text-emerald-700 rounded-lg hover:bg-emerald-200">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Exclusions -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Exclusions</label>
                    <div id="exclusions-container" class="space-y-2">
                        <div class="flex gap-2">
                            <input type="text" name="exclusions[]" placeholder="e.g., International flights, travel insurance"
                                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                            <button type="button" onclick="addExclusion()" class="px-3 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- What to Bring -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">What to Bring</label>
                    <div id="whattobring-container" class="space-y-2">
                        <div class="flex gap-2">
                            <input type="text" name="what_to_bring[]" placeholder="e.g., Comfortable walking shoes, sunscreen, camera"
                                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                            <button type="button" onclick="addWhatToBring()" class="px-3 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Highlights -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tour Highlights</label>
                    <div id="highlights-container" class="space-y-2">
                        <div class="flex gap-2">
                            <input type="text" name="highlights[]" placeholder="e.g., Big Five wildlife viewing, sunset game drives"
                                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                            <button type="button" onclick="addHighlight()" class="px-3 py-2 bg-yellow-100 text-yellow-700 rounded-lg hover:bg-yellow-200">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Destinations & Equipment -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <h2 class="text-xl font-semibold text-gray-900 mb-6">Destinations & Equipment</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Destinations -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Destinations</label>
                    <div class="space-y-2 max-h-40 overflow-y-auto border border-gray-200 rounded-lg p-3">
                        @foreach($destinations ?? [] as $destination)
                        <label class="flex items-center">
                            <input type="checkbox" name="destinations[]" value="{{ $destination->id }}"
                                   class="mr-2 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-sm text-gray-700">{{ $destination->name }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <!-- Equipment -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Required Equipment</label>
                    <div class="space-y-2 max-h-40 overflow-y-auto border border-gray-200 rounded-lg p-3">
                        @foreach($equipment ?? [] as $item)
                        <label class="flex items-center">
                            <input type="checkbox" name="equipment_required[]" value="{{ $item->id }}"
                                   class="mr-2 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-sm text-gray-700">{{ $item->name }} ({{ $item->type }})</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <!-- Recommended Guides -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Recommended Guides</label>
                    <div class="space-y-2 max-h-40 overflow-y-auto border border-gray-200 rounded-lg p-3">
                        @foreach($guides ?? [] as $guide)
                        <label class="flex items-center">
                            <input type="checkbox" name="recommended_guides[]" value="{{ $guide->id }}"
                                   class="mr-2 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-sm text-gray-700">{{ $guide->name }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Submit Actions -->
        <div class="flex justify-end gap-4">
            <a href="{{ route('admin.tours.index') }}" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                <i class="fas fa-save mr-2"></i>Create Tour
            </button>
        </div>
    </form>
</div>

<script>
function addInclusion() {
    const container = document.getElementById('inclusions-container');
    const div = document.createElement('div');
    div.className = 'flex gap-2';
    div.innerHTML = `
        <input type="text" name="inclusions[]" placeholder="Add inclusion..."
               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
        <button type="button" onclick="this.parentElement.remove()" class="px-3 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200">
            <i class="fas fa-times"></i>
        </button>
    `;
    container.appendChild(div);
}

function addExclusion() {
    const container = document.getElementById('exclusions-container');
    const div = document.createElement('div');
    div.className = 'flex gap-2';
    div.innerHTML = `
        <input type="text" name="exclusions[]" placeholder="Add exclusion..."
               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
        <button type="button" onclick="this.parentElement.remove()" class="px-3 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200">
            <i class="fas fa-times"></i>
        </button>
    `;
    container.appendChild(div);
}

function addWhatToBring() {
    const container = document.getElementById('whattobring-container');
    const div = document.createElement('div');
    div.className = 'flex gap-2';
    div.innerHTML = `
        <input type="text" name="what_to_bring[]" placeholder="Add item..."
               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
        <button type="button" onclick="this.parentElement.remove()" class="px-3 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200">
            <i class="fas fa-times"></i>
        </button>
    `;
    container.appendChild(div);
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
</script>
@endsection
