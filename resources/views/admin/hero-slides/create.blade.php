@extends('layouts.admin')

@section('title', 'Create Hero Slide')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Create Hero Slide</h1>
            <p class="text-gray-600">Add a new hero slide to showcase on your website</p>
        </div>
        <div class="flex gap-3 mt-4 lg:mt-0">
            <a href="{{ route('admin.hero-slides.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-arrow-left mr-2"></i>Back to Slides
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
                            <i class="ph-bold ph-images text-emerald-600 text-xl"></i>
                        </div>
                        <h2 class="text-lg font-bold text-gray-900">Slide Information</h2>
                    </div>
                </div>
                
                <div class="p-6">
                    <form action="{{ route('admin.hero-slides.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Basic Information -->
                        <div class="space-y-6 mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <i class="ph-bold ph-info text-emerald-600 mr-2"></i>
                                Basic Information
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Title <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('title') border-red-500 @enderror" 
                                           id="title" 
                                           name="title" 
                                           value="{{ old('title') }}" 
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
                                    <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('position') border-red-500 @enderror" 
                                            id="position" 
                                            name="position" 
                                            required>
                                        <option value="">Select Position</option>
                                        @foreach(['home' => 'Home Page', 'mountains' => 'Mountain Pages', 'about' => 'About Page', 'contact' => 'Contact Page', 'tours' => 'Tours Page', 'destinations' => 'Destinations Page'] as $position => $label)
                                        <option value="{{ $position }}" {{ old('position') == $position ? 'selected' : '' }}>
                                            {{ $label }}
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
                                <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('subtitle') border-red-500 @enderror" 
                                          id="subtitle" 
                                          name="subtitle" 
                                          rows="3"
                                          placeholder="Enter subtitle (optional)">{{ old('subtitle') }}</textarea>
                                @error('subtitle')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Media -->
                        <div class="space-y-6 mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <i class="ph-bold ph-image text-emerald-600 mr-2"></i>
                                Media
                            </h3>
                            
                            <div>
                                <label for="image_url" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Image URL <span class="text-red-500">*</span>
                                </label>
                                <input type="url" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('image_url') border-red-500 @enderror" 
                                       id="image_url" 
                                       name="image_url" 
                                       value="{{ old('image_url') }}" 
                                       placeholder="https://example.com/image.jpg"
                                       required>
                                @error('image_url')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-2 text-sm text-gray-500">Enter the URL of the hero slide image. Recommended size: 1920x1080px</p>
                            </div>
                            
                            <!-- Image Preview -->
                            <div id="imagePreview" class="hidden">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Image Preview
                                </label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4">
                                    <img id="previewImg" src="" alt="Preview" class="w-full h-64 object-cover rounded-lg">
                                </div>
                            </div>
                        </div>

                        <!-- Call to Action -->
                        <div class="space-y-6 mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <i class="ph-bold ph-link text-emerald-600 mr-2"></i>
                                Call to Action (Optional)
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="button_text" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Button Text
                                    </label>
                                    <input type="text" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('button_text') border-red-500 @enderror" 
                                           id="button_text" 
                                           name="button_text" 
                                           value="{{ old('button_text') }}" 
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
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('button_url') border-red-500 @enderror" 
                                           id="button_url" 
                                           name="button_url" 
                                           value="{{ old('button_url') }}" 
                                           placeholder="https://example.com">
                                    @error('button_url')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
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
                                           value="{{ old('sort_order', 1) }}" 
                                           min="1"
                                           placeholder="1">
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
                                <i class="ph-bold ph-check mr-2"></i>Create Slide
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
                        <span>Use high-quality images (1920x1080px recommended)</span>
                    </div>
                    <div class="flex items-start">
                        <i class="ph-bold ph-check-circle text-emerald-600 mr-2 mt-0.5"></i>
                        <span>Keep titles short and impactful</span>
                    </div>
                    <div class="flex items-start">
                        <i class="ph-bold ph-check-circle text-emerald-600 mr-2 mt-0.5"></i>
                        <span>Use contrasting colors for text visibility</span>
                    </div>
                    <div class="flex items-start">
                        <i class="ph-bold ph-check-circle text-emerald-600 mr-2 mt-0.5"></i>
                        <span>Test buttons on different screen sizes</span>
                    </div>
                </div>
            </div>

            <!-- Preview Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="ph-bold ph-eye text-purple-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Live Preview</h3>
                </div>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4">
                    <div id="livePreview" class="text-center text-gray-500">
                        <i class="ph-bold ph-image text-4xl mb-2"></i>
                        <p class="text-sm">Preview will appear here as you type</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Image Preview and Live Preview -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Image Preview
    const imageUrlInput = document.getElementById('image_url');
    const imagePreview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');
    
    imageUrlInput?.addEventListener('input', function() {
        const url = this.value.trim();
        if (url) {
            previewImg.src = url;
            imagePreview.classList.remove('hidden');
            
            previewImg.onerror = function() {
                imagePreview.classList.add('hidden');
            };
        } else {
            imagePreview.classList.add('hidden');
        }
    });
    
    // Live Preview
    const titleInput = document.getElementById('title');
    const subtitleInput = document.getElementById('subtitle');
    const buttonTextInput = document.getElementById('button_text');
    const buttonUrlInput = document.getElementById('button_url');
    const livePreview = document.getElementById('livePreview');
    
    function updateLivePreview() {
        const title = titleInput?.value || 'Your Title Here';
        const subtitle = subtitleInput?.value || '';
        const buttonText = buttonTextInput?.value || '';
        const buttonUrl = buttonUrlInput?.value || '#';
        
        if (imageUrlInput?.value) {
            livePreview.innerHTML = `
                <div class="relative h-48 bg-cover bg-center rounded-lg overflow-hidden" style="background-image: url('${imageUrlInput.value}');">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4 text-white">
                        <h4 class="font-bold text-lg mb-1">${title}</h4>
                        ${subtitle ? `<p class="text-sm opacity-90">${subtitle}</p>` : ''}
                        ${buttonText ? `<div class="mt-2"><a href="${buttonUrl}" class="inline-block px-3 py-1 bg-emerald-600 text-white rounded text-xs">${buttonText}</a></div>` : ''}
                    </div>
                </div>
            `;
        } else {
            livePreview.innerHTML = `
                <div class="text-center text-gray-500">
                    <i class="ph-bold ph-image text-4xl mb-2"></i>
                    <p class="text-sm">Add an image URL to see preview</p>
                </div>
            `;
        }
    }
    
    titleInput?.addEventListener('input', updateLivePreview);
    subtitleInput?.addEventListener('input', updateLivePreview);
    buttonTextInput?.addEventListener('input', updateLivePreview);
    buttonUrlInput?.addEventListener('input', updateLivePreview);
});
</script>
@endsection
