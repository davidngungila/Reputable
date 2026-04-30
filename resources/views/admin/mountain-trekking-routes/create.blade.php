@extends('layouts.admin')

@section('title', 'Create Mountain Trekking Route')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Create Mountain Trekking Route</h1>
            <p class="text-gray-600">Add a new trekking route for mountain adventures</p>
        </div>
        <div class="flex gap-3 mt-4 lg:mt-0">
            <a href="{{ route('admin.mountain-trekking-routes.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-arrow-left mr-2"></i>Back to Routes
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="ph-bold ph-map-trifold text-emerald-600 text-xl"></i>
                        </div>
                        <h2 class="text-lg font-bold text-gray-900">Route Information</h2>
                    </div>
                </div>
                
                <div class="p-6">
                    <form action="{{ route('admin.mountain-trekking-routes.store') }}" method="POST">
                        @csrf
                        
                        <!-- Basic Information -->
                        <div class="space-y-6 mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <i class="ph-bold ph-info text-emerald-600 mr-2"></i>
                                Basic Information
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Route Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('name') border-red-500 @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name') }}" 
                                           placeholder="e.g., Marangu Route - Coca Cola Route"
                                           required>
                                    @error('name')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="slug" class="block text-sm font-semibold text-gray-700 mb-2">
                                        URL Slug
                                    </label>
                                    <input type="text" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('slug') border-red-500 @enderror" 
                                           id="slug" 
                                           name="slug" 
                                           value="{{ old('slug') }}" 
                                           placeholder="auto-generated">
                                    @error('slug')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-2 text-sm text-gray-500">Leave blank to auto-generate from name</p>
                                </div>
                            </div>
                            
                            <div>
                                <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Description <span class="text-red-500">*</span>
                                </label>
                                <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('description') border-red-500 @enderror" 
                                          id="description" 
                                          name="description" 
                                          rows="4"
                                          placeholder="Describe the route, its features, and what makes it special"
                                          required>{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="mountain_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Mountain <span class="text-red-500">*</span>
                                    </label>
                                    <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('mountain_name') border-red-500 @enderror" 
                                            id="mountain_name" 
                                            name="mountain_name" 
                                            required>
                                        <option value="">Select Mountain</option>
                                        @foreach($mountains as $mountain)
                                        <option value="{{ $mountain }}" {{ old('mountain_name') == $mountain ? 'selected' : '' }}>
                                            {{ $mountain }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('mountain_name')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="difficulty" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Difficulty <span class="text-red-500">*</span>
                                    </label>
                                    <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('difficulty') border-red-500 @enderror" 
                                            id="difficulty" 
                                            name="difficulty" 
                                            required>
                                        <option value="">Select Difficulty</option>
                                        @foreach($difficulties as $difficulty)
                                        <option value="{{ $difficulty }}" {{ old('difficulty') == $difficulty ? 'selected' : '' }}>
                                            {{ $difficulty }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('difficulty')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label for="duration" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Duration <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('duration') border-red-500 @enderror" 
                                           id="duration" 
                                           name="duration" 
                                           value="{{ old('duration') }}" 
                                           placeholder="e.g., 6 Days"
                                           required>
                                    @error('duration')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="duration_days" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Duration in Days <span class="text-red-500">*</span>
                                    </label>
                                    <input type="number" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('duration_days') border-red-500 @enderror" 
                                           id="duration_days" 
                                           name="duration_days" 
                                           value="{{ old('duration_days') }}" 
                                           min="1"
                                           placeholder="6"
                                           required>
                                    @error('duration_days')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="success_rate" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Success Rate <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('success_rate') border-red-500 @enderror" 
                                           id="success_rate" 
                                           name="success_rate" 
                                           value="{{ old('success_rate') }}" 
                                           placeholder="e.g., 85%"
                                           required>
                                    @error('success_rate')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Pricing -->
                        <div class="space-y-6 mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <i class="ph-bold ph-currency-dollar text-emerald-600 mr-2"></i>
                                Pricing
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="price_from" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Price From <span class="text-red-500">*</span>
                                    </label>
                                    <input type="number" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('price_from') border-red-500 @enderror" 
                                           id="price_from" 
                                           name="price_from" 
                                           value="{{ old('price_from') }}" 
                                           min="0"
                                           step="0.01"
                                           placeholder="1850.00"
                                           required>
                                    @error('price_from')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="price_to" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Price To
                                    </label>
                                    <input type="number" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('price_to') border-red-500 @enderror" 
                                           id="price_to" 
                                           name="price_to" 
                                           value="{{ old('price_to') }}" 
                                           min="0"
                                           step="0.01"
                                           placeholder="2200.00">
                                    @error('price_to')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-2 text-sm text-gray-500">Optional - for price ranges</p>
                                </div>
                            </div>
                        </div>

                        <!-- Media -->
                        <div class="space-y-6 mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <i class="ph-bold ph-images text-emerald-600 mr-2"></i>
                                Media
                            </h3>
                            
                            <div>
                                <label for="images" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Images
                                </label>
                                <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('images') border-red-500 @enderror" 
                                          id="images" 
                                          name="images" 
                                          rows="3"
                                          placeholder="Enter image URLs, one per line">{{ old('images') }}</textarea>
                                @error('images')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-2 text-sm text-gray-500">Enter image URLs, one per line (JSON format)</p>
                            </div>
                        </div>

                        <!-- Details -->
                        <div class="space-y-6 mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <i class="ph-bold ph-list-bullets text-emerald-600 mr-2"></i>
                                Route Details
                            </h3>
                            
                            <div>
                                <label for="highlights" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Highlights
                                </label>
                                <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('highlights') border-red-500 @enderror" 
                                          id="highlights" 
                                          name="highlights" 
                                          rows="3"
                                          placeholder="Enter highlights, one per line">{{ old('highlights') }}</textarea>
                                @error('highlights')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                <p class="mt-2 text-sm text-gray-500">Enter highlights, one per line (JSON format)</p>
                            </div>
                            
                            <div>
                                <label for="itinerary" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Itinerary
                                </label>
                                <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('itinerary') border-red-500 @enderror" 
                                          id="itinerary" 
                                          name="itinerary" 
                                          rows="4"
                                          placeholder="Enter itinerary items, one per line">{{ old('itinerary') }}</textarea>
                                @error('itinerary')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                <p class="mt-2 text-sm text-gray-500">Enter itinerary items, one per line (JSON format)</p>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="included" class="block text-sm font-semibold text-gray-700 mb-2">
                                        What's Included
                                    </label>
                                    <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('included') border-red-500 @enderror" 
                                              id="included" 
                                              name="included" 
                                              rows="3"
                                              placeholder="Enter included items, one per line">{{ old('included') }}</textarea>
                                    @error('included')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                </div>
                                
                                <div>
                                    <label for="excluded" class="block text-sm font-semibold text-gray-700 mb-2">
                                        What's Not Included
                                    </label>
                                    <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('excluded') border-red-500 @enderror" 
                                              id="excluded" 
                                              name="excluded" 
                                              rows="3"
                                              placeholder="Enter excluded items, one per line">{{ old('excluded') }}</textarea>
                                    @error('excluded')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                            
                            <div>
                                <label for="best_season" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Best Season <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('best_season') border-red-500 @enderror" 
                                       id="best_season" 
                                       name="best_season" 
                                       value="{{ old('best_season') }}" 
                                       placeholder="e.g., January-March, June-October"
                                       required>
                                @error('best_season')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Settings -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <i class="ph-bold ph-gear text-emerald-600 mr-2"></i>
                                Settings
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="sort_order" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Sort Order
                                    </label>
                                    <input type="number" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('sort_order') border-red-500 @enderror" 
                                           id="sort_order" 
                                           name="sort_order" 
                                           value="{{ old('sort_order', 0) }}" 
                                           min="0"
                                           placeholder="0">
                                    @error('sort_order')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-2 text-sm text-gray-500">Lower numbers appear first</p>
                                </div>
                                
                                <div>
                                    <label for="is_active" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Status
                                    </label>
                                    <div class="flex items-center">
                                        <input type="checkbox" 
                                               class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500" 
                                               id="is_active" 
                                               name="is_active" 
                                               value="1"
                                               {{ old('is_active', '1') ? 'checked' : '' }}>
                                        <label for="is_active" class="ml-2 text-sm text-gray-700">
                                            Active (show on website)
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex flex-col sm:flex-row gap-4 mt-8 pt-6 border-t border-gray-200">
                            <button type="submit" class="px-6 py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors font-medium">
                                <i class="ph-bold ph-check mr-2"></i>Create Route
                            </button>
                            <a href="{{ route('admin.mountain-trekking-routes.index') }}" class="px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors font-medium text-center">
                                <i class="ph-bold ph-x mr-2"></i>Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Tips Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="ph-bold ph-lightbulb text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Tips</h3>
                </div>
                <div class="space-y-3 text-sm text-gray-600">
                    <div class="flex items-start">
                        <i class="ph-bold ph-check-circle text-emerald-600 mr-2 mt-0.5"></i>
                        <span>Use descriptive route names that include the route type</span>
                    </div>
                    <div class="flex items-start">
                        <i class="ph-bold ph-check-circle text-emerald-600 mr-2 mt-0.5"></i>
                        <span>Include key highlights that make the route unique</span>
                    </div>
                    <div class="flex items-start">
                        <i class="ph-bold ph-check-circle text-emerald-600 mr-2 mt-0.5"></i>
                        <span>Be specific about difficulty level and duration</span>
                    </div>
                    <div class="flex items-start">
                        <i class="ph-bold ph-check-circle text-emerald-600 mr-2 mt-0.5"></i>
                        <span>Use high-quality images that showcase the route</span>
                    </div>
                </div>
            </div>

            <!-- Guidelines Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="ph-bold ph-info text-purple-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Guidelines</h3>
                </div>
                <div class="space-y-3 text-sm text-gray-600">
                    <div class="flex items-start">
                        <i class="ph-bold ph-arrow-right text-purple-600 mr-2 mt-0.5"></i>
                        <span>JSON arrays should be entered as one item per line</span>
                    </div>
                    <div class="flex items-start">
                        <i class="ph-bold ph-arrow-right text-purple-600 mr-2 mt-0.5"></i>
                        <span>Success rates should be realistic and accurate</span>
                    </div>
                    <div class="flex items-start">
                        <i class="ph-bold ph-arrow-right text-purple-600 mr-2 mt-0.5"></i>
                        <span>Season information helps customers plan trips</span>
                    </div>
                    <div class="flex items-start">
                        <i class="ph-bold ph-arrow-right text-purple-600 mr-2 mt-0.5"></i>
                        <span>Sort order controls display sequence</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Auto-Slug Generation -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');
    
    nameInput?.addEventListener('input', function() {
        if (!slugInput.value) {
            // Simple slug generation
            const slug = this.value.toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim('-');
            slugInput.value = slug;
        }
    });
    
    // Prevent slug from being modified if it was auto-generated
    slugInput?.addEventListener('focus', function() {
        if (!this.dataset.userModified) {
            this.dataset.userModified = 'false';
        }
    });
    
    slugInput?.addEventListener('input', function() {
        this.dataset.userModified = 'true';
    });
});
</script>
@endsection
