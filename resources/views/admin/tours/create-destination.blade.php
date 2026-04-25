@extends('layouts.admin')

@section('title', 'Add New Destination')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Add New Destination</h1>
            <p class="text-gray-600">Create a new tour destination with comprehensive details</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.tours.destinations') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors text-sm font-medium">
                <i class="ph-bold ph-arrow-left mr-2"></i>Back to Destinations
            </a>
        </div>
    </div>

    <!-- Progress Indicator -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Progress</h3>
            <span class="text-sm text-gray-600">Step <span id="current-step">1</span> of 4</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-2">
            <div id="progress-bar" class="bg-emerald-600 h-2 rounded-full transition-all duration-300" style="width: 25%"></div>
        </div>
        <div class="flex justify-between mt-4">
            <div class="text-center">
                <div class="w-8 h-8 bg-emerald-600 text-white rounded-full flex items-center justify-center text-sm font-medium">1</div>
                <p class="text-xs text-gray-600 mt-1">Basic Info</p>
            </div>
            <div class="text-center">
                <div class="w-8 h-8 bg-gray-300 text-white rounded-full flex items-center justify-center text-sm font-medium">2</div>
                <p class="text-xs text-gray-600 mt-1">Location</p>
            </div>
            <div class="text-center">
                <div class="w-8 h-8 bg-gray-300 text-white rounded-full flex items-center justify-center text-sm font-medium">3</div>
                <p class="text-xs text-gray-600 mt-1">Details</p>
            </div>
            <div class="text-center">
                <div class="w-8 h-8 bg-gray-300 text-white rounded-full flex items-center justify-center text-sm font-medium">4</div>
                <p class="text-xs text-gray-600 mt-1">Media</p>
            </div>
        </div>
    </div>

    <!-- Form Container -->
    <form action="{{ route('admin.tours.destinations.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <!-- Step 1: Basic Information -->
        <div id="step-1" class="form-step bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-6">Basic Information</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Destination Name *</label>
                    <input type="text" name="name" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="e.g., Serengeti National Park">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                    <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>

            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                <textarea name="description" rows="4" required
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                          placeholder="Describe the destination, its significance, and what makes it special..."></textarea>
            </div>

            <div class="flex justify-end gap-4 mt-6">
                <button type="button" onclick="nextStep(2)" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                    Next Step <i class="ph-bold ph-arrow-right ml-2"></i>
                </button>
            </div>
        </div>

        <!-- Step 2: Location Information -->
        <div id="step-2" class="form-step bg-white rounded-xl shadow-sm border border-gray-100 p-6 hidden">
            <h3 class="text-xl font-semibold text-gray-900 mb-6">Location Information</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Location *</label>
                    <input type="text" name="location" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="e.g., Northern Tanzania">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Region</label>
                    <select name="region" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">Select Region</option>
                        <option value="northern">Northern Tanzania</option>
                        <option value="southern">Southern Tanzania</option>
                        <option value="western">Western Tanzania</option>
                        <option value="coastal">Coastal Tanzania</option>
                        <option value="zanzibar">Zanzibar</option>
                    </select>
                </div>
            </div>

            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Coordinates</label>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs text-gray-600 mb-1">Latitude</label>
                        <input type="number" name="coordinates[lat]" step="0.000001"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                               placeholder="e.g., -2.333333">
                    </div>
                    <div>
                        <label class="block text-xs text-gray-600 mb-1">Longitude</label>
                        <input type="number" name="coordinates[lng]" step="0.000001"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                               placeholder="e.g., 34.833333">
                    </div>
                </div>
            </div>

            <div class="flex justify-between gap-4 mt-6">
                <button type="button" onclick="previousStep(1)" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors text-sm font-medium">
                    <i class="ph-bold ph-arrow-left mr-2"></i> Previous
                </button>
                <button type="button" onclick="nextStep(3)" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                    Next Step <i class="ph-bold ph-arrow-right ml-2"></i>
                </button>
            </div>
        </div>

        <!-- Step 3: Additional Details -->
        <div id="step-3" class="form-step bg-white rounded-xl shadow-sm border border-gray-100 p-6 hidden">
            <h3 class="text-xl font-semibold text-gray-900 mb-6">Additional Details</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Best Time to Visit</label>
                    <input type="text" name="best_time_to_visit"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="e.g., June to October">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Weather Information</label>
                    <input type="text" name="weather_info"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="e.g., Dry season, warm days">
                </div>
            </div>

            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Highlights</label>
                <div id="highlights-container" class="space-y-2">
                    <div class="flex gap-2">
                        <input type="text" name="highlights[]" placeholder="e.g., Great Migration, Big Five"
                               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <button type="button" onclick="addHighlight()" class="px-3 py-2 bg-emerald-100 text-emerald-700 rounded-lg hover:bg-emerald-200">
                            <i class="ph-bold ph-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex justify-between gap-4 mt-6">
                <button type="button" onclick="previousStep(2)" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors text-sm font-medium">
                    <i class="ph-bold ph-arrow-left mr-2"></i> Previous
                </button>
                <button type="button" onclick="nextStep(4)" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                    Next Step <i class="ph-bold ph-arrow-right ml-2"></i>
                </button>
            </div>
        </div>

        <!-- Step 4: Media -->
        <div id="step-4" class="form-step bg-white rounded-xl shadow-sm border border-gray-100 p-6 hidden">
            <h3 class="text-xl font-semibold text-gray-900 mb-6">Media & Images</h3>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Destination Images</label>
                <div id="images-container" class="space-y-2">
                    <div class="flex gap-2">
                        <input type="text" name="images[]" placeholder="Image path or URL"
                               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <button type="button" onclick="addImage()" class="px-3 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200">
                            <i class="ph-bold ph-plus"></i>
                        </button>
                    </div>
                </div>
                <p class="text-xs text-gray-600 mt-2">Add multiple images to showcase the destination</p>
            </div>

            <div class="flex justify-between gap-4 mt-6">
                <button type="button" onclick="previousStep(3)" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors text-sm font-medium">
                    <i class="ph-bold ph-arrow-left mr-2"></i> Previous
                </button>
                <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                    <i class="ph-bold ph-check-circle mr-2"></i> Create Destination
                </button>
            </div>
        </div>
    </form>
</div>

<script>
let currentStep = 1;

function nextStep(step) {
    // Hide current step
    document.getElementById(`step-${currentStep}`).classList.add('hidden');
    
    // Show next step
    document.getElementById(`step-${step}`).classList.remove('hidden');
    
    // Update progress
    currentStep = step;
    updateProgress();
}

function previousStep(step) {
    // Hide current step
    document.getElementById(`step-${currentStep}`).classList.add('hidden');
    
    // Show previous step
    document.getElementById(`step-${step}`).classList.remove('hidden');
    
    // Update progress
    currentStep = step;
    updateProgress();
}

function updateProgress() {
    const progressBar = document.getElementById('progress-bar');
    const currentStepSpan = document.getElementById('current-step');
    
    // Update progress bar
    const progressPercentage = (currentStep / 4) * 100;
    progressBar.style.width = `${progressPercentage}%`;
    
    // Update step number
    currentStepSpan.textContent = currentStep;
    
    // Update step indicators
    for (let i = 1; i <= 4; i++) {
        const stepIndicator = document.querySelector(`.flex.justify-between.mt-4 > div:nth-child(${i}) > div`);
        if (i <= currentStep) {
            stepIndicator.className = 'w-8 h-8 bg-emerald-600 text-white rounded-full flex items-center justify-center text-sm font-medium';
        } else {
            stepIndicator.className = 'w-8 h-8 bg-gray-300 text-white rounded-full flex items-center justify-center text-sm font-medium';
        }
    }
}

function addHighlight() {
    const container = document.getElementById('highlights-container');
    const div = document.createElement('div');
    div.className = 'flex gap-2';
    div.innerHTML = `
        <input type="text" name="highlights[]" placeholder="Add highlight..."
               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
        <button type="button" onclick="this.parentElement.remove()" class="px-3 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200">
            <i class="ph-bold ph-x"></i>
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
            <i class="ph-bold ph-x"></i>
        </button>
    `;
    container.appendChild(div);
}
</script>
@endsection
