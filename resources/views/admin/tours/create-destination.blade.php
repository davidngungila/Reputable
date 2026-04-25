@extends('layouts.admin')

@section('title', 'Add New Destination')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Add New Destination</h1>
            <p class="text-gray-600">Create a comprehensive tour destination with all details and linked tours</p>
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
            <span class="text-sm text-gray-600">Step <span id="current-step">1</span> of 5</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-2">
            <div id="progress-bar" class="bg-emerald-600 h-2 rounded-full transition-all duration-300" style="width: 20%"></div>
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
                <p class="text-xs text-gray-600 mt-1">Tours</p>
            </div>
            <div class="text-center">
                <div class="w-8 h-8 bg-gray-300 text-white rounded-full flex items-center justify-center text-sm font-medium">5</div>
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

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Destination Type</label>
                    <select name="destination_type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="national_park">National Park</option>
                        <option value="game_reserve">Game Reserve</option>
                        <option value="conservation_area">Conservation Area</option>
                        <option value="mountain">Mountain</option>
                        <option value="beach">Beach</option>
                        <option value="cultural_site">Cultural Site</option>
                        <option value="city">City</option>
                        <option value="island">Island</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Famous For</label>
                    <input type="text" name="famous_for" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="e.g., Great Migration, Big Five, Mount Kilimanjaro">
                </div>
            </div>

            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Description *</label>
                <textarea name="description" rows="4" required
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                          placeholder="Describe the destination, its significance, and what makes it special..."></textarea>
            </div>

            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Short Description (for cards)</label>
                <textarea name="short_description" rows="2"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                          placeholder="Brief description for destination cards (max 150 characters)..."></textarea>
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

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nearest City/Town</label>
                    <input type="text" name="nearest_city" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="e.g., Arusha, Dar es Salaam">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Distance from City</label>
                    <input type="text" name="distance_from_city" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="e.g., 320 km from Arusha">
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

            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Access Information</label>
                <textarea name="access_info" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                          placeholder="How to reach this destination (road, air, etc)..."></textarea>
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

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Altitude (if applicable)</label>
                    <input type="text" name="altitude"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="e.g., 5,895 meters above sea level">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Area Size</label>
                    <input type="text" name="area_size"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="e.g., 14,763 km²">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Established Year</label>
                    <input type="number" name="established_year"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="e.g., 1951">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">UNESCO Status</label>
                    <select name="unesco_status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">Not applicable</option>
                        <option value="world_heritage">World Heritage Site</option>
                        <option value="biosphere_reserve">Biosphere Reserve</option>
                        <option value="tentative">Tentative List</option>
                    </select>
                </div>
            </div>

            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Wildlife & Nature</label>
                <textarea name="wildlife_nature" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                          placeholder="Describe the wildlife, flora, and natural features..."></textarea>
            </div>

            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Cultural Significance</label>
                <textarea name="cultural_significance" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                          placeholder="Describe the cultural importance and local communities..."></textarea>
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

        <!-- Step 4: Tour Linking -->
        <div id="step-4" class="form-step bg-white rounded-xl shadow-sm border border-gray-100 p-6 hidden">
            <h3 class="text-xl font-semibold text-gray-900 mb-6">Link Tours to Destination</h3>
            
            <div class="mb-6">
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <div class="flex items-start">
                        <i class="ph-bold ph-info text-blue-600 text-xl mr-3 mt-0.5"></i>
                        <div>
                            <h4 class="font-semibold text-blue-900 mb-1">Tour Linking</h4>
                            <p class="text-sm text-blue-700">Select tours that include this destination. This will help users find tours that visit this location.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Search Tours</label>
                <div class="relative">
                    <input type="text" id="tour-search" placeholder="Search tours by name or location..." 
                           onkeyup="filterTours()"
                           class="w-full px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <i class="ph-bold ph-magnifying-glass absolute left-3 top-3 text-gray-400"></i>
                </div>
            </div>

            <div class="mb-6">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="font-semibold text-gray-900">Available Tours</h4>
                    <div class="flex gap-2">
                        <button type="button" onclick="selectAllTours()" class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-lg text-sm font-medium">
                            Select All
                        </button>
                        <button type="button" onclick="deselectAllTours()" class="px-3 py-1 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium">
                            Deselect All
                        </button>
                    </div>
                </div>
                
                <div id="tours-container" class="grid grid-cols-1 md:grid-cols-2 gap-4 max-h-96 overflow-y-auto border border-gray-200 rounded-lg p-4">
                    @php
                        $allTours = \App\Models\Tour::where('status', 'active')->get();
                    @endphp
                    @foreach($allTours as $tour)
                    <div class="tour-item border border-gray-200 rounded-lg p-4 hover:border-emerald-500 transition-colors">
                        <label class="flex items-start cursor-pointer">
                            <input type="checkbox" name="linked_tours[]" value="{{ $tour->id }}" 
                                   class="mt-1 mr-3 text-emerald-600 focus:ring-emerald-500">
                            <div class="flex-1">
                                <h5 class="font-semibold text-gray-900">{{ $tour->name }}</h5>
                                <p class="text-sm text-gray-600 mb-2">{{ $tour->location }}</p>
                                <div class="flex items-center gap-4 text-xs text-gray-500">
                                    <span><i class="ph-bold ph-clock mr-1"></i>{{ $tour->duration_days }} days</span>
                                    <span><i class="ph-bold ph-currency-dollar mr-1"></i>${{ number_format($tour->base_price, 0) }}</span>
                                    <span><i class="ph-bold ph-users mr-1"></i>{{ $tour->max_group_size ?? 12 }} max</span>
                                </div>
                            </div>
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-between gap-4 mt-6">
                <button type="button" onclick="previousStep(3)" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors text-sm font-medium">
                    <i class="ph-bold ph-arrow-left mr-2"></i> Previous
                </button>
                <button type="button" onclick="nextStep(5)" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                    Next Step <i class="ph-bold ph-arrow-right ml-2"></i>
                </button>
            </div>
        </div>

        <!-- Step 5: Media -->
        <div id="step-5" class="form-step bg-white rounded-xl shadow-sm border border-gray-100 p-6 hidden">
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
                <p class="text-xs text-gray-600 mt-2">Add multiple images to showcase the destination (recommended: 3-5 images)</p>
            </div>

            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Video URL (Optional)</label>
                <input type="url" name="video_url" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                       placeholder="https://youtube.com/watch?v=...">
            </div>

            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Virtual Tour URL (Optional)</label>
                <input type="url" name="virtual_tour_url" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                       placeholder="https://360pano.com/tour/...">
            </div>

            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Additional Resources</label>
                <div id="resources-container" class="space-y-2">
                    <div class="flex gap-2">
                        <input type="text" name="additional_resources[]" placeholder="PDF, brochure, or map URL"
                               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <button type="button" onclick="addResource()" class="px-3 py-2 bg-purple-100 text-purple-700 rounded-lg hover:bg-purple-200">
                            <i class="ph-bold ph-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex justify-between gap-4 mt-6">
                <button type="button" onclick="previousStep(4)" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors text-sm font-medium">
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
    const progressPercentage = (currentStep / 5) * 100;
    progressBar.style.width = `${progressPercentage}%`;
    
    // Update step number
    currentStepSpan.textContent = currentStep;
    
    // Update step indicators
    for (let i = 1; i <= 5; i++) {
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

function addResource() {
    const container = document.getElementById('resources-container');
    const div = document.createElement('div');
    div.className = 'flex gap-2';
    div.innerHTML = `
        <input type="text" name="additional_resources[]" placeholder="Add resource URL..."
               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
        <button type="button" onclick="this.parentElement.remove()" class="px-3 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200">
            <i class="ph-bold ph-x"></i>
        </button>
    `;
    container.appendChild(div);
}

function filterTours() {
    const searchTerm = document.getElementById('tour-search').value.toLowerCase();
    const tourItems = document.querySelectorAll('.tour-item');
    
    tourItems.forEach(item => {
        const tourName = item.querySelector('h5').textContent.toLowerCase();
        const tourLocation = item.querySelector('p').textContent.toLowerCase();
        
        const matchesSearch = tourName.includes(searchTerm) || tourLocation.includes(searchTerm);
        item.style.display = matchesSearch ? 'block' : 'none';
    });
}

function selectAllTours() {
    const checkboxes = document.querySelectorAll('input[name="linked_tours[]"]');
    checkboxes.forEach(checkbox => checkbox.checked = true);
}

function deselectAllTours() {
    const checkboxes = document.querySelectorAll('input[name="linked_tours[]"]');
    checkboxes.forEach(checkbox => checkbox.checked = false);
}
</script>
@endsection
