@extends('layouts.admin')

@section('title', 'Edit Hero Slide - ' . $slide->title)

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Hero Slide</h1>
            <p class="text-gray-600">Modify and update hero slide content and settings</p>
        </div>
        <div class="flex gap-3 mt-4 lg:mt-0">
            <a href="{{ route('admin.hero-slides.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-arrow-left mr-2"></i>Back to Slides
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Form -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Slide Information Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-purple-500 to-indigo-600 px-6 py-4">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                                <i class="ph-bold ph-images text-white text-xl"></i>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-white">{{ $slide->title }}</h2>
                                <p class="text-purple-100 text-sm">{{ ucfirst($slide->position) }} Page Hero</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            @if($slide->is_active)
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">
                                    <i class="ph-bold ph-check-circle mr-1"></i>Active
                                </span>
                            @else
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">
                                    <i class="ph-bold ph-pause-circle mr-1"></i>Inactive
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="p-6">
                    <form action="{{ route('admin.hero-slides.update', $slide->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <!-- Basic Information -->
                        <div class="space-y-6 mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <i class="ph-bold ph-info text-purple-600 mr-2"></i>
                                Basic Information
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Slide Title <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 @error('title') border-red-500 @enderror" 
                                           id="title" 
                                           name="title" 
                                           value="{{ old('title', $slide->title) }}" 
                                           placeholder="Enter slide title"
                                           required>
                                    @error('title')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="position" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Position <span class="text-red-500">*</span>
                                    </label>
                                    <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 @error('position') border-red-500 @enderror" 
                                            id="position" 
                                            name="position" 
                                            required>
                                        <option value="">Select Position</option>
                                        @foreach($positions as $position)
                                        <option value="{{ $position }}" {{ old('position', $slide->position) == $position ? 'selected' : '' }}>
                                            {{ ucfirst($position) }} Page
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('position')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div>
                                <label for="subtitle" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Subtitle
                                </label>
                                <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 @error('subtitle') border-red-500 @enderror" 
                                          id="subtitle" 
                                          name="subtitle" 
                                          rows="3"
                                          placeholder="Enter subtitle text">{{ old('subtitle', $slide->subtitle) }}</textarea>
                                @error('subtitle')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>

                        <!-- Media -->
                        <div class="space-y-6 mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <i class="ph-bold ph-image text-purple-600 mr-2"></i>
                                Media Settings
                            </h3>
                            
                            <div>
                                <label for="image_url" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Image URL <span class="text-red-500">*</span>
                                </label>
                                <input type="url" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 @error('image_url') border-red-500 @enderror" 
                                       id="image_url" 
                                       name="image_url" 
                                       value="{{ old('image_url', $slide->image_url) }}" 
                                       placeholder="https://res.cloudinary.com/your-account/image/upload/..."
                                       required>
                                @error('image_url')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                <p class="mt-2 text-sm text-gray-500">Enter the full URL to the hero image (Cloudinary URL recommended)</p>
                            </div>
                        </div>

                        <!-- Button Settings -->
                        <div class="space-y-6 mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <i class="ph-bold ph-cursor-pointer text-purple-600 mr-2"></i>
                                Button Settings
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="button_text" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Button Text
                                    </label>
                                    <input type="text" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 @error('button_text') border-red-500 @enderror" 
                                           id="button_text" 
                                           name="button_text" 
                                           value="{{ old('button_text', $slide->button_text) }}" 
                                           placeholder="Learn More">
                                    @error('button_text')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                </div>
                                
                                <div>
                                    <label for="button_url" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Button URL
                                    </label>
                                    <input type="url" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 @error('button_url') border-red-500 @enderror" 
                                           id="button_url" 
                                           name="button_url" 
                                           value="{{ old('button_url', $slide->button_url) }}" 
                                           placeholder="/tours">
                                    @error('button_url')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Settings -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <i class="ph-bold ph-gear text-purple-600 mr-2"></i>
                                Settings
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="sort_order" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Sort Order
                                    </label>
                                    <input type="number" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 @error('sort_order') border-red-500 @enderror" 
                                           id="sort_order" 
                                           name="sort_order" 
                                           value="{{ old('sort_order', $slide->sort_order) }}" 
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
                                               class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500" 
                                               id="is_active" 
                                               name="is_active" 
                                               value="1"
                                               {{ old('is_active', $slide->is_active) ? 'checked' : '' }}>
                                        <label for="is_active" class="ml-2 text-sm text-gray-700">
                                            Active (show on website)
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex flex-col sm:flex-row gap-4 mt-8 pt-6 border-t border-gray-200">
                            <button type="submit" class="px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors font-medium">
                                <i class="ph-bold ph-check mr-2"></i>Update Slide
                            </button>
                            <a href="{{ route('admin.hero-slides.index') }}" class="px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors font-medium text-center">
                                <i class="ph-bold ph-x mr-2"></i>Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1 space-y-6">
            <!-- Live Preview -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="ph-bold ph-eye text-purple-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Live Preview</h3>
                </div>
                
                <div id="slide-preview" class="relative h-48 rounded-lg overflow-hidden mb-4" style="background: url('{{ $slide->image_url }}') center/cover;">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex flex-col justify-end p-4">
                        <h4 id="preview-title" class="text-white font-bold text-lg mb-1">{{ $slide->title }}</h4>
                        <p id="preview-subtitle" class="text-white/90 text-sm mb-3">{{ $slide->subtitle ?: 'Slide subtitle appears here' }}</p>
                        <button id="preview-button" class="px-4 py-2 bg-purple-600 text-white text-sm rounded-lg hover:bg-purple-700 transition-colors {{ $slide->button_text ?: 'hidden' }}">
                            {{ $slide->button_text ?: 'Button Text' }}
                        </button>
                    </div>
                </div>
                
                <p class="text-xs text-gray-500 text-center">Preview updates in real-time as you type</p>
            </div>

            <!-- Slide Details -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="ph-bold ph-info text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Slide Details</h3>
                </div>
                
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">ID:</span>
                        <span class="text-sm font-medium text-gray-900">#{{ $slide->id }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Position:</span>
                        <span class="text-sm font-medium text-gray-900">{{ ucfirst($slide->position) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Status:</span>
                        <span class="px-2 py-1 text-xs font-medium rounded-full {{ $slide->is_active ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ $slide->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Sort Order:</span>
                        <span class="text-sm font-medium text-gray-900">{{ $slide->sort_order }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Created:</span>
                        <span class="text-sm font-medium text-gray-900">{{ $slide->created_at->format('M d, Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Updated:</span>
                        <span class="text-sm font-medium text-gray-900">{{ $slide->updated_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>

            <!-- Guidelines -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="ph-bold ph-lightbulb text-orange-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Guidelines</h3>
                </div>
                
                <div class="space-y-3 text-sm text-gray-600">
                    <div class="flex items-start">
                        <i class="ph-bold ph-check-circle text-purple-600 mr-2 mt-0.5"></i>
                        <span>Use high-quality images (minimum 1920x1080)</span>
                    </div>
                    <div class="flex items-start">
                        <i class="ph-bold ph-check-circle text-purple-600 mr-2 mt-0.5"></i>
                        <span>Keep titles concise and impactful</span>
                    </div>
                    <div class="flex items-start">
                        <i class="ph-bold ph-check-circle text-purple-600 mr-2 mt-0.5"></i>
                        <span>Subtitles should complement the title</span>
                    </div>
                    <div class="flex items-start">
                        <i class="ph-bold ph-check-circle text-purple-600 mr-2 mt-0.5"></i>
                        <span>Button text should be action-oriented</span>
                    </div>
                    <div class="flex items-start">
                        <i class="ph-bold ph-check-circle text-purple-600 mr-2 mt-0.5"></i>
                        <span>Use Cloudinary URLs for best performance</span>
                    </div>
                    <div class="flex items-start">
                        <i class="ph-bold ph-check-circle text-purple-600 mr-2 mt-0.5"></i>
                        <span>Test slides on different screen sizes</span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="ph-bold ph-bolt text-red-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Quick Actions</h3>
                </div>
                
                <div class="space-y-3">
                    <button type="button" onclick="toggleStatus()" class="w-full px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition-colors font-medium">
                        <i class="ph-bold ph-pause-circle mr-2"></i>Toggle Status
                    </button>
                    
                    <a href="{{ route('admin.hero-slides.index') }}" class="w-full flex items-center justify-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors font-medium">
                        <i class="ph-bold ph-arrow-left mr-2"></i>Back to Slides
                    </a>
                    
                    <form action="{{ route('admin.hero-slides.destroy', $slide) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this slide? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors font-medium">
                            <i class="ph-bold ph-trash mr-2"></i>Delete Slide
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Live Preview -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Live preview functionality
    const titleInput = document.getElementById('title');
    const subtitleInput = document.getElementById('subtitle');
    const imageInput = document.getElementById('image_url');
    const buttonTextInput = document.getElementById('button_text');
    
    const previewTitle = document.getElementById('preview-title');
    const previewSubtitle = document.getElementById('preview-subtitle');
    const previewImage = document.getElementById('slide-preview');
    const previewButton = document.getElementById('preview-button');
    
    // Update title preview
    titleInput?.addEventListener('input', function(e) {
        previewTitle.textContent = e.target.value || 'Slide Title';
    });
    
    // Update subtitle preview
    subtitleInput?.addEventListener('input', function(e) {
        previewSubtitle.textContent = e.target.value || 'Slide subtitle appears here';
    });
    
    // Update image preview
    imageInput?.addEventListener('input', function(e) {
        if (e.target.value) {
            previewImage.style.backgroundImage = `url('${e.target.value}')`;
        } else {
            previewImage.style.backgroundImage = `url('{{ $slide->image_url }}')`;
        }
    });
    
    // Update button preview
    buttonTextInput?.addEventListener('input', function(e) {
        if (e.target.value) {
            previewButton.textContent = e.target.value;
            previewButton.classList.remove('hidden');
        } else {
            previewButton.classList.add('hidden');
        }
    });
});

function toggleStatus() {
    fetch(`/admin/hero-slides/{{ $slide->id }}/toggle-status`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>
@endsection
