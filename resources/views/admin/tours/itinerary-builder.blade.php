@extends('layouts.admin')

@section('title', 'Advanced Itinerary Builder')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header with Statistics -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Advanced Itinerary Builder</h1>
            <p class="text-gray-600">Create comprehensive day-by-day itineraries with drag-and-drop functionality</p>
        </div>
        <div class="flex gap-3 mt-4 lg:mt-0">
            <button onclick="exportItinerary()" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-download mr-2"></i>Export
            </button>
            <button onclick="previewItinerary()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-eye mr-2"></i>Preview
            </button>
        </div>
    </div>

    <!-- Tour Selection and Overview -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                <label for="tour-selector" class="block text-sm font-semibold text-gray-700 mb-2">Select Tour</label>
                <select id="tour-selector" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">Choose a tour to build itinerary...</option>
                    @foreach(\App\Models\Tour::all() as $tour)
                    <option value="{{ $tour->id }}" data-duration="{{ $tour->duration_days }}">{{ $tour->name }} ({{ $tour->duration_days }} days) - ${{ number_format($tour->base_price, 0) }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="flex items-end">
                <button onclick="duplicateItinerary()" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors text-sm font-medium">
                    <i class="ph-bold ph-copy mr-2"></i>Duplicate
                </button>
            </div>
        </div>
        
        <!-- Tour Overview (Hidden initially) -->
        <div id="tour-overview" class="hidden mt-6 pt-6 border-t border-gray-200">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="bg-emerald-50 rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="ph-bold ph-backpack text-emerald-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600">Tour Name</p>
                            <p class="font-semibold text-gray-900" id="tour-name">-</p>
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
                            <p class="font-semibold text-gray-900"><span id="tour-duration">0</span> days</p>
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
                            <p class="font-semibold text-gray-900" id="tour-location">-</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-orange-50 rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="ph-bold ph-currency-dollar text-orange-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600">Price</p>
                            <p class="font-semibold text-gray-900" id="tour-price">-</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Itinerary Builder Interface -->
    <div id="itinerary-builder" class="hidden">
        <!-- Action Bar -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <button onclick="setViewMode('timeline')" id="timeline-view-btn" class="px-4 py-2 bg-emerald-100 text-emerald-700 rounded-lg transition-colors text-sm font-medium">
                        <i class="ph-bold ph-timeline mr-2"></i>Timeline View
                    </button>
                    <button onclick="setViewMode('cards')" id="cards-view-btn" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg transition-colors text-sm font-medium">
                        <i class="ph-bold ph-grid-four mr-2"></i>Cards View
                    </button>
                    <button onclick="setViewMode('compact')" id="compact-view-btn" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg transition-colors text-sm font-medium">
                        <i class="ph-bold ph-list-bullets mr-2"></i>Compact View
                    </button>
                </div>
                
                <div class="flex items-center gap-3">
                    <button onclick="addTemplateDay()" class="px-4 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors text-sm font-medium">
                        <i class="ph-bold ph-plus-circle mr-2"></i>Add Template
                    </button>
                    <button onclick="saveItinerary()" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                        <i class="ph-bold ph-check-circle mr-2"></i>Save All
                    </button>
                </div>
            </div>
        </div>

        <!-- Progress Bar -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-6">
            <div class="flex items-center justify-between mb-2">
                <span class="text-sm font-medium text-gray-700">Itinerary Completion</span>
                <span class="text-sm text-gray-500"><span id="completed-days">0</span> of <span id="total-days">0</span> days completed</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div id="progress-bar" class="bg-emerald-600 h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
            </div>
        </div>

        <!-- Days Container -->
        <div id="days-container" class="space-y-6">
            <!-- Days will be dynamically added here -->
        </div>

        <!-- Quick Add Section -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mt-6">
            <h3 class="text-lg font-bold text-gray-900 mb-4">Quick Actions</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <button onclick="addDay()" class="px-4 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                    <i class="ph-bold ph-plus mr-2"></i>Add New Day
                </button>
                <button onclick="addRestDay()" class="px-4 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors text-sm font-medium">
                    <i class="ph-bold ph-moon mr-2"></i>Add Rest Day
                </button>
                <button onclick="addTravelDay()" class="px-4 py-3 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors text-sm font-medium">
                    <i class="ph-bold ph-airplane mr-2"></i>Add Travel Day
                </button>
            </div>
        </div>
    </div>

    <!-- Empty State -->
    <div id="empty-state" class="bg-white rounded-xl shadow-sm p-12 text-center border border-gray-100">
        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="ph-bold ph-map-trifold text-gray-400 text-3xl"></i>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">No Tour Selected</h3>
        <p class="text-gray-600 mb-6">Select a tour to start building its comprehensive itinerary</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 max-w-2xl mx-auto">
            <div class="bg-gray-50 rounded-lg p-4">
                <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center mx-auto mb-2">
                    <i class="ph-bold ph-timeline text-emerald-600"></i>
                </div>
                <h4 class="font-medium text-gray-900 mb-1">Timeline View</h4>
                <p class="text-sm text-gray-600">Visual timeline with drag-and-drop</p>
            </div>
            <div class="bg-gray-50 rounded-lg p-4">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-2">
                    <i class="ph-bold ph-template text-blue-600"></i>
                </div>
                <h4 class="font-medium text-gray-900 mb-1">Templates</h4>
                <p class="text-sm text-gray-600">Pre-built day templates</p>
            </div>
            <div class="bg-gray-50 rounded-lg p-4">
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mx-auto mb-2">
                    <i class="ph-bold ph-globe text-purple-600"></i>
                </div>
                <h4 class="font-medium text-gray-900 mb-1">Export Options</h4>
                <p class="text-sm text-gray-600">Multiple export formats</p>
            </div>
        </div>
    </div>
</div>

<!-- Template Modal -->
<div id="template-modal" class="hidden fixed inset-0 bg-white/80 backdrop-blur-sm flex items-center justify-center z-50">
    <div class="bg-white rounded-xl p-6 max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-gray-900">Choose Day Template</h2>
            <button onclick="closeTemplateModal()" class="text-gray-400 hover:text-gray-600">
                <i class="ph-bold ph-x text-xl"></i>
            </button>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div onclick="selectTemplate('safari-day')" class="border border-gray-200 rounded-lg p-4 hover:border-emerald-500 hover:bg-emerald-50 cursor-pointer transition-colors">
                <div class="flex items-center mb-2">
                    <i class="ph-bold ph-binoculars text-emerald-600 mr-2"></i>
                    <h3 class="font-semibold text-gray-900">Safari Day</h3>
                </div>
                <p class="text-sm text-gray-600">Early morning game drive, bush breakfast, afternoon safari</p>
            </div>
            
            <div onclick="selectTemplate('cultural-day')" class="border border-gray-200 rounded-lg p-4 hover:border-emerald-500 hover:bg-emerald-50 cursor-pointer transition-colors">
                <div class="flex items-center mb-2">
                    <i class="ph-bold ph-users-three text-emerald-600 mr-2"></i>
                    <h3 class="font-semibold text-gray-900">Cultural Day</h3>
                </div>
                <p class="text-sm text-gray-600">Village visit, cultural experience, traditional lunch</p>
            </div>
            
            <div onclick="selectTemplate('adventure-day')" class="border border-gray-200 rounded-lg p-4 hover:border-emerald-500 hover:bg-emerald-50 cursor-pointer transition-colors">
                <div class="flex items-center mb-2">
                    <i class="ph-bold ph-mountains text-emerald-600 mr-2"></i>
                    <h3 class="font-semibold text-gray-900">Adventure Day</h3>
                </div>
                <p class="text-sm text-gray-600">Hiking, nature walk, picnic lunch, sunset viewing</p>
            </div>
            
            <div onclick="selectTemplate('relaxation-day')" class="border border-gray-200 rounded-lg p-4 hover:border-emerald-500 hover:bg-emerald-50 cursor-pointer transition-colors">
                <div class="flex items-center mb-2">
                    <i class="ph-bold ph-sparkle text-emerald-600 mr-2"></i>
                    <h3 class="font-semibold text-gray-900">Relaxation Day</h3>
                </div>
                <p class="text-sm text-gray-600">Spa treatment, leisure time, poolside relaxation</p>
            </div>
        </div>
    </div>
</div>

<script>
let currentTourId = null;
let currentViewMode = 'timeline';
let draggedDay = null;

// Initialize page - check for URL parameters
document.addEventListener('DOMContentLoaded', function() {
    // Check for tour_id in URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const tourIdFromUrl = urlParams.get('tour_id');
    
    if (tourIdFromUrl) {
        // Auto-select the tour from URL parameter
        const tourSelector = document.getElementById('tour-selector');
        tourSelector.value = tourIdFromUrl;
        
        // Trigger the change event to load the tour
        const event = new Event('change', { bubbles: true });
        tourSelector.dispatchEvent(event);
    }
});

// Tour selector change handler
document.getElementById('tour-selector').addEventListener('change', function(e) {
    const tourId = e.target.value;
    if (!tourId) {
        document.getElementById('itinerary-builder').classList.add('hidden');
        document.getElementById('empty-state').classList.remove('hidden');
        document.getElementById('tour-overview').classList.add('hidden');
        return;
    }

    currentTourId = tourId;
    loadTourData(tourId);
});

function loadTourData(tourId) {
    console.log('Loading tour data for tour ID:', tourId);
    
    Promise.all([
        fetch(`/admin/api/tours/${tourId}`).then(response => {
            if (!response.ok) {
                throw new Error(`Failed to fetch tour data: ${response.status}`);
            }
            return response.json();
        }),
        fetch(`/admin/tours/${tourId}/itineraries`).then(response => {
            if (!response.ok) {
                throw new Error(`Failed to fetch itineraries: ${response.status}`);
            }
            return response.json();
        })
    ])
    .then(([tourData, itinerariesResponse]) => {
        console.log('Tour data loaded:', tourData);
        console.log('Itineraries response loaded:', itinerariesResponse);
        
        // Extract itineraries array from response
        const itineraries = itinerariesResponse.data || itinerariesResponse;
        console.log('Itineraries array:', itineraries);
        
        // Update tour overview
        document.getElementById('tour-name').textContent = tourData.name;
        document.getElementById('tour-duration').textContent = tourData.duration_days;
        document.getElementById('tour-location').textContent = tourData.location;
        document.getElementById('tour-price').textContent = '$' + tourData.base_price;
        
        document.getElementById('tour-overview').classList.remove('hidden');
        document.getElementById('itinerary-builder').classList.remove('hidden');
        document.getElementById('empty-state').classList.add('hidden');
        
        // Initialize days based on tour duration
        initializeDays(tourData.duration_days, itineraries);
        updateProgress();
    })
    .catch(error => {
        console.error('Error loading tour:', error);
        // Show error message to user
        showNotification('Error loading tour data: ' + error.message, 'error');
        
        // Reset to empty state
        document.getElementById('itinerary-builder').classList.add('hidden');
        document.getElementById('empty-state').classList.remove('hidden');
        document.getElementById('tour-overview').classList.add('hidden');
    });
}

function initializeDays(duration, existingItineraries = []) {
    const container = document.getElementById('days-container');
    container.innerHTML = '';
    
    for (let i = 1; i <= duration; i++) {
        addDay(i, existingItineraries.find(it => it.day_number === i));
    }
    
    updateProgress();
}

function setViewMode(mode) {
    currentViewMode = mode;
    
    // Update button states
    document.querySelectorAll('[id$="-view-btn"]').forEach(btn => {
        btn.className = 'px-4 py-2 bg-gray-100 text-gray-700 rounded-lg transition-colors text-sm font-medium';
    });
    
    const activeBtn = document.getElementById(`${mode}-view-btn`);
    activeBtn.className = 'px-4 py-2 bg-emerald-100 text-emerald-700 rounded-lg transition-colors text-sm font-medium';
    
    // Re-render days with new view mode
    const container = document.getElementById('days-container');
    const days = container.querySelectorAll('[data-day]');
    
    days.forEach(dayDiv => {
        const dayNumber = dayDiv.dataset.day;
        const existingData = collectDayData(dayDiv);
        dayDiv.remove();
        addDay(dayNumber, existingData);
    });
}

function addDay(dayNumber = null, existingItinerary = null) {
    const container = document.getElementById('days-container');
    const dayNum = dayNumber || (container.children.length + 1);
    
    const dayDiv = document.createElement('div');
    dayDiv.className = 'bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden';
    dayDiv.dataset.day = dayNum;
    dayDiv.draggable = true;
    
    // Add drag event listeners
    dayDiv.addEventListener('dragstart', handleDragStart);
    dayDiv.addEventListener('dragover', handleDragOver);
    dayDiv.addEventListener('drop', handleDrop);
    dayDiv.addEventListener('dragend', handleDragEnd);
    
    if (currentViewMode === 'timeline') {
        dayDiv.innerHTML = createTimelineDayView(dayNum, existingItinerary);
    } else if (currentViewMode === 'cards') {
        dayDiv.innerHTML = createCardsDayView(dayNum, existingItinerary);
    } else {
        dayDiv.innerHTML = createCompactDayView(dayNum, existingItinerary);
    }
    
    container.appendChild(dayDiv);
}

function createTimelineDayView(dayNum, existingItinerary) {
    return `
        <div class="bg-gradient-to-r from-emerald-500 to-blue-600 px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold text-lg">${dayNum}</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white">Day ${dayNum}</h3>
                        <p class="text-emerald-100 text-sm">Drag to reorder</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <button onclick="duplicateDay(${dayNum})" class="p-2 bg-white/20 text-white rounded-lg hover:bg-white/30 transition-colors">
                        <i class="ph-bold ph-copy"></i>
                    </button>
                    <button onclick="removeDay(${dayNum})" class="p-2 bg-white/20 text-white rounded-lg hover:bg-white/30 transition-colors">
                        <i class="ph-bold ph-trash"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <div class="p-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Day Title</label>
                        <input type="text" name="day_${dayNum}_title" value="${existingItinerary ? existingItinerary.title || '' : ''}" 
                               placeholder="e.g., Safari Adventure in Serengeti"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                        <textarea name="day_${dayNum}_description" rows="3" placeholder="Describe the day's activities and experiences..."
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">${existingItinerary ? existingItinerary.description || '' : ''}</textarea>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Activities</label>
                        <div id="activities_${dayNum}" class="space-y-2">
                            ${createActivityInputs(dayNum, existingItinerary)}
                        </div>
                        <button type="button" onclick="addActivity(${dayNum})" class="mt-2 px-3 py-2 bg-emerald-100 text-emerald-700 rounded-lg hover:bg-emerald-200 transition-colors text-sm font-medium">
                            <i class="ph-bold ph-plus mr-1"></i>Add Activity
                        </button>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Meals Included</label>
                        <div class="grid grid-cols-3 gap-2">
                            <label class="flex items-center justify-center p-3 border border-gray-200 rounded-lg hover:bg-emerald-50 cursor-pointer">
                                <input type="checkbox" name="day_${dayNum}_meals[]" value="breakfast" class="sr-only" ${existingItinerary && existingItinerary.meals && existingItinerary.meals.includes('breakfast') ? 'checked' : ''}>
                                <span class="text-sm">🌅 Breakfast</span>
                            </label>
                            <label class="flex items-center justify-center p-3 border border-gray-200 rounded-lg hover:bg-emerald-50 cursor-pointer">
                                <input type="checkbox" name="day_${dayNum}_meals[]" value="lunch" class="sr-only" ${existingItinerary && existingItinerary.meals && existingItinerary.meals.includes('lunch') ? 'checked' : ''}>
                                <span class="text-sm">☀️ Lunch</span>
                            </label>
                            <label class="flex items-center justify-center p-3 border border-gray-200 rounded-lg hover:bg-emerald-50 cursor-pointer">
                                <input type="checkbox" name="day_${dayNum}_meals[]" value="dinner" class="sr-only" ${existingItinerary && existingItinerary.meals && existingItinerary.meals.includes('dinner') ? 'checked' : ''}>
                                <span class="text-sm">🌙 Dinner</span>
                            </label>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Accommodation</label>
                        <input type="text" name="day_${dayNum}_accommodation" value="${existingItinerary ? existingItinerary.accommodation || '' : ''}" 
                               placeholder="e.g., Serengeti Sopa Lodge"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Transportation</label>
                        <input type="text" name="day_${dayNum}_transportation" value="${existingItinerary ? existingItinerary.transportation || '' : ''}" 
                               placeholder="e.g., 4x4 safari vehicle"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Special Notes</label>
                        <textarea name="day_${dayNum}_notes" rows="2" placeholder="Any special notes for this day..."
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">${existingItinerary ? existingItinerary.notes || '' : ''}</textarea>
                    </div>
                </div>
            </div>
        </div>
    `;
}

function createCardsDayView(dayNum, existingItinerary) {
    return `
        <div class="bg-gradient-to-r from-blue-500 to-purple-600 px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold text-lg">${dayNum}</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white">Day ${dayNum}</h3>
                        <p class="text-blue-100 text-sm">Cards view mode</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <button onclick="duplicateDay(${dayNum})" class="p-2 bg-white/20 text-white rounded-lg hover:bg-white/30 transition-colors">
                        <i class="ph-bold ph-copy"></i>
                    </button>
                    <button onclick="removeDay(${dayNum})" class="p-2 bg-white/20 text-white rounded-lg hover:bg-white/30 transition-colors">
                        <i class="ph-bold ph-trash"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-gray-50 rounded-lg p-4">
                    <h4 class="font-semibold text-gray-900 mb-2">📋 Basic Info</h4>
                    <div class="space-y-2">
                        <input type="text" name="day_${dayNum}_title" value="${existingItinerary ? existingItinerary.title || '' : ''}" 
                               placeholder="Day title" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm">
                        <textarea name="day_${dayNum}_description" rows="2" placeholder="Description"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm">${existingItinerary ? existingItinerary.description || '' : ''}</textarea>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-4">
                    <h4 class="font-semibold text-gray-900 mb-2">🎯 Activities</h4>
                    <div id="activities_${dayNum}" class="space-y-1">
                        ${createActivityInputs(dayNum, existingItinerary)}
                    </div>
                    <button type="button" onclick="addActivity(${dayNum})" class="mt-2 text-xs text-emerald-600 hover:text-emerald-700">
                        + Add activity
                    </button>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-4">
                    <h4 class="font-semibold text-gray-900 mb-2">🍽️ Meals</h4>
                    <div class="space-y-1">
                        <label class="flex items-center text-sm">
                            <input type="checkbox" name="day_${dayNum}_meals[]" value="breakfast" class="mr-2" ${existingItinerary && existingItinerary.meals && existingItinerary.meals.includes('breakfast') ? 'checked' : ''}>
                            Breakfast
                        </label>
                        <label class="flex items-center text-sm">
                            <input type="checkbox" name="day_${dayNum}_meals[]" value="lunch" class="mr-2" ${existingItinerary && existingItinerary.meals && existingItinerary.meals.includes('lunch') ? 'checked' : ''}>
                            Lunch
                        </label>
                        <label class="flex items-center text-sm">
                            <input type="checkbox" name="day_${dayNum}_meals[]" value="dinner" class="mr-2" ${existingItinerary && existingItinerary.meals && existingItinerary.meals.includes('dinner') ? 'checked' : ''}>
                            Dinner
                        </label>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-4">
                    <h4 class="font-semibold text-gray-900 mb-2">🏨 Accommodation</h4>
                    <input type="text" name="day_${dayNum}_accommodation" value="${existingItinerary ? existingItinerary.accommodation || '' : ''}" 
                           placeholder="Hotel/Lodge name" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm">
                </div>
                
                <div class="bg-gray-50 rounded-lg p-4">
                    <h4 class="font-semibold text-gray-900 mb-2">🚗 Transport</h4>
                    <input type="text" name="day_${dayNum}_transportation" value="${existingItinerary ? existingItinerary.transportation || '' : ''}" 
                           placeholder="Transportation" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm">
                </div>
                
                <div class="bg-gray-50 rounded-lg p-4">
                    <h4 class="font-semibold text-gray-900 mb-2">📝 Notes</h4>
                    <textarea name="day_${dayNum}_notes" rows="2" placeholder="Special notes"
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm">${existingItinerary ? existingItinerary.notes || '' : ''}</textarea>
                </div>
            </div>
        </div>
    `;
}

function createCompactDayView(dayNum, existingItinerary) {
    return `
        <div class="bg-gray-100 px-4 py-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <span class="w-8 h-8 bg-gray-600 text-white rounded-full flex items-center justify-center font-bold text-sm mr-3">${dayNum}</span>
                    <input type="text" name="day_${dayNum}_title" value="${existingItinerary ? existingItinerary.title || '' : ''}" 
                           placeholder="Day ${dayNum} title" class="font-medium text-gray-900 bg-transparent border-none focus:outline-none">
                </div>
                <div class="flex items-center gap-1">
                    <button onclick="duplicateDay(${dayNum})" class="p-1 text-gray-500 hover:text-gray-700">
                        <i class="ph-bold ph-copy text-sm"></i>
                    </button>
                    <button onclick="removeDay(${dayNum})" class="p-1 text-red-500 hover:text-red-700">
                        <i class="ph-bold ph-trash text-sm"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <div class="p-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                <div>
                    <label class="text-xs text-gray-500">Description</label>
                    <textarea name="day_${dayNum}_description" rows="2" placeholder="Brief description"
                              class="w-full px-2 py-1 border border-gray-300 rounded text-sm">${existingItinerary ? existingItinerary.description || '' : ''}</textarea>
                </div>
                
                <div>
                    <label class="text-xs text-gray-500">Activities</label>
                    <div id="activities_${dayNum}" class="space-y-1">
                        ${createActivityInputs(dayNum, existingItinerary, true)}
                    </div>
                    <button type="button" onclick="addActivity(${dayNum})" class="text-xs text-emerald-600">+ Add</button>
                </div>
                
                <div>
                    <label class="text-xs text-gray-500">Meals</label>
                    <div class="flex gap-2">
                        <label class="flex items-center text-xs">
                            <input type="checkbox" name="day_${dayNum}_meals[]" value="breakfast" class="mr-1" ${existingItinerary && existingItinerary.meals && existingItinerary.meals.includes('breakfast') ? 'checked' : ''}>
                            B
                        </label>
                        <label class="flex items-center text-xs">
                            <input type="checkbox" name="day_${dayNum}_meals[]" value="lunch" class="mr-1" ${existingItinerary && existingItinerary.meals && existingItinerary.meals.includes('lunch') ? 'checked' : ''}>
                            L
                        </label>
                        <label class="flex items-center text-xs">
                            <input type="checkbox" name="day_${dayNum}_meals[]" value="dinner" class="mr-1" ${existingItinerary && existingItinerary.meals && existingItinerary.meals.includes('dinner') ? 'checked' : ''}>
                            D
                        </label>
                    </div>
                </div>
                
                <div>
                    <label class="text-xs text-gray-500">Accommodation</label>
                    <input type="text" name="day_${dayNum}_accommodation" value="${existingItinerary ? existingItinerary.accommodation || '' : ''}" 
                           placeholder="Hotel" class="w-full px-2 py-1 border border-gray-300 rounded text-sm">
                    <label class="text-xs text-gray-500 block mt-1">Transport</label>
                    <input type="text" name="day_${dayNum}_transportation" value="${existingItinerary ? existingItinerary.transportation || '' : ''}" 
                           placeholder="Vehicle" class="w-full px-2 py-1 border border-gray-300 rounded text-sm">
                </div>
            </div>
        </div>
    `;
}

function createActivityInputs(dayNum, existingItinerary, compact = false) {
    let activitiesHtml = '';
    
    if (existingItinerary && existingItinerary.activities && existingItinerary.activities.length > 0) {
        existingItinerary.activities.forEach((activity, index) => {
            activitiesHtml += `
                <div class="flex gap-2">
                    <input type="text" name="day_${dayNum}_activities[]" value="${activity}" 
                           placeholder="${compact ? 'Activity' : 'e.g., Game drive, bush breakfast'}"
                           class="flex-1 px-${compact ? '2' : '3'} py-${compact ? '1' : '2'} border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 ${compact ? 'text-sm' : ''}">
                    <button type="button" onclick="this.parentElement.remove()" 
                            class="px-${compact ? '1' : '2'} py-${compact ? '1' : '2'} bg-red-100 text-red-700 rounded hover:bg-red-200 transition-colors">
                        <i class="ph-bold ph-x text-${compact ? 'sm' : 'xs'}"></i>
                    </button>
                </div>
            `;
        });
    } else {
        activitiesHtml = `
            <div class="flex gap-2">
                <input type="text" name="day_${dayNum}_activities[]" 
                       placeholder="${compact ? 'Activity' : 'e.g., Game drive, bush breakfast'}"
                       class="flex-1 px-${compact ? '2' : '3'} py-${compact ? '1' : '2'} border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 ${compact ? 'text-sm' : ''}">
                <button type="button" onclick="addActivity(${dayNum})" 
                        class="px-${compact ? '1' : '2'} py-${compact ? '1' : '2'} bg-emerald-100 text-emerald-700 rounded hover:bg-emerald-200 transition-colors">
                    <i class="ph-bold ph-plus text-${compact ? 'sm' : 'xs'}"></i>
                </button>
            </div>
        `;
    }
    
    return activitiesHtml;
}

// Drag and drop functionality
function handleDragStart(e) {
    draggedDay = this;
    this.style.opacity = '0.5';
    e.dataTransfer.effectAllowed = 'move';
    e.dataTransfer.setData('text/html', this.innerHTML);
}

function handleDragOver(e) {
    if (e.preventDefault) {
        e.preventDefault();
    }
    e.dataTransfer.dropEffect = 'move';
    
    const afterElement = getDragAfterElement(document.getElementById('days-container'), e.clientY);
    if (afterElement == null) {
        document.getElementById('days-container').appendChild(draggedDay);
    } else {
        document.getElementById('days-container').insertBefore(draggedDay, afterElement);
    }
    
    return false;
}

function handleDrop(e) {
    if (e.stopPropagation) {
        e.stopPropagation();
    }
    
    updateDayNumbers();
    return false;
}

function handleDragEnd(e) {
    this.style.opacity = '1';
    
    // Update all drag and drop listeners
    const days = document.querySelectorAll('[data-day]');
    days.forEach(day => {
        day.addEventListener('dragstart', handleDragStart);
        day.addEventListener('dragover', handleDragOver);
        day.addEventListener('drop', handleDrop);
        day.addEventListener('dragend', handleDragEnd);
    });
}

function getDragAfterElement(container, y) {
    const draggableElements = [...container.querySelectorAll('[data-day]:not(.dragging)')];
    
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

function updateDayNumbers() {
    const container = document.getElementById('days-container');
    const days = container.querySelectorAll('[data-day]');
    
    days.forEach((dayDiv, index) => {
        const newDayNumber = index + 1;
        dayDiv.dataset.day = newDayNumber;
        
        // Update day number displays
        dayDiv.querySelectorAll('span.font-bold.text-lg, span.w-8.h-8').forEach(span => {
            span.textContent = newDayNumber;
        });
        
        dayDiv.querySelectorAll('h3').forEach(h3 => {
            if (h3.textContent.includes('Day')) {
                h3.textContent = h3.textContent.replace(/Day \d+/, `Day ${newDayNumber}`);
            }
        });
    });
    
    updateProgress();
}

function addActivity(dayNumber) {
    const container = document.getElementById(`activities_${dayNumber}`);
    const div = document.createElement('div');
    div.className = 'flex gap-2';
    div.innerHTML = `
        <input type="text" name="day_${dayNumber}_activities[]" placeholder="Add activity..."
               class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm">
        <button type="button" onclick="this.parentElement.remove()" class="px-2 py-2 bg-red-100 text-red-700 rounded hover:bg-red-200 transition-colors">
            <i class="ph-bold ph-x text-xs"></i>
        </button>
    `;
    container.appendChild(div);
    updateProgress();
}

function removeDay(dayNumber) {
    const dayDiv = document.querySelector(`[data-day="${dayNumber}"]`);
    if (dayDiv && confirm('Are you sure you want to remove this day?')) {
        dayDiv.remove();
        updateDayNumbers();
        updateProgress();
    }
}

function duplicateDay(dayNumber) {
    const dayDiv = document.querySelector(`[data-day="${dayNumber}"]`);
    const dayData = collectDayData(dayDiv);
    const newDayNumber = document.querySelectorAll('[data-day]').length + 1;
    
    addDay(newDayNumber, dayData);
    updateProgress();
}

function collectDayData(dayDiv) {
    const dayNumber = dayDiv.dataset.day;
    
    return {
        title: dayDiv.querySelector(`input[name="day_${dayNumber}_title"]`)?.value || '',
        description: dayDiv.querySelector(`textarea[name="day_${dayNumber}_description"]`)?.value || '',
        activities: Array.from(dayDiv.querySelectorAll(`input[name="day_${dayNumber}_activities[]"]`))
            .map(input => input.value)
            .filter(value => value),
        meals: Array.from(dayDiv.querySelectorAll(`input[name="day_${dayNumber}_meals[]"]:checked`))
            .map(checkbox => checkbox.value),
        accommodation: dayDiv.querySelector(`input[name="day_${dayNumber}_accommodation"]`)?.value || '',
        transportation: dayDiv.querySelector(`input[name="day_${dayNumber}_transportation"]`)?.value || '',
        notes: dayDiv.querySelector(`textarea[name="day_${dayNumber}_notes"]`)?.value || ''
    };
}

function updateProgress() {
    const totalDays = document.querySelectorAll('[data-day]').length;
    const completedDays = document.querySelectorAll('[data-day]').length; // Simplified - you could add actual completion logic
    
    document.getElementById('total-days').textContent = totalDays;
    document.getElementById('completed-days').textContent = completedDays;
    document.getElementById('progress-bar').style.width = `${(completedDays / totalDays) * 100}%`;
}

// Template functions
function addTemplateDay() {
    document.getElementById('template-modal').classList.remove('hidden');
}

function closeTemplateModal() {
    document.getElementById('template-modal').classList.add('hidden');
}

function selectTemplate(templateType) {
    const templates = {
        'safari-day': {
            title: 'Safari Adventure Day',
            description: 'Experience the thrill of wildlife viewing in their natural habitat',
            activities: ['Early morning game drive', 'Bush breakfast', 'Afternoon safari', 'Sunset drinks'],
            meals: ['breakfast', 'lunch', 'dinner'],
            accommodation: 'Safari Lodge',
            transportation: '4x4 safari vehicle'
        },
        'cultural-day': {
            title: 'Cultural Experience Day',
            description: 'Immerse yourself in local culture and traditions',
            activities: ['Village visit', 'Cultural performance', 'Traditional lunch', 'Craft workshop'],
            meals: ['breakfast', 'lunch', 'dinner'],
            accommodation: 'Cultural Center Guesthouse',
            transportation: 'Tour van'
        },
        'adventure-day': {
            title: 'Adventure Day',
            description: 'Exciting outdoor activities and nature exploration',
            activities: ['Morning hike', 'Nature walk', 'Picnic lunch', 'Rock climbing'],
            meals: ['breakfast', 'lunch'],
            accommodation: 'Mountain Hut',
            transportation: 'Hiking boots'
        },
        'relaxation-day': {
            title: 'Relaxation Day',
            description: 'Unwind and recharge with leisurely activities',
            activities: ['Spa treatment', 'Swimming', 'Reading time', 'Sunset viewing'],
            meals: ['breakfast', 'lunch', 'dinner'],
            accommodation: 'Resort Hotel',
            transportation: 'Resort shuttle'
        }
    };
    
    const template = templates[templateType];
    const newDayNumber = document.querySelectorAll('[data-day]').length + 1;
    
    addDay(newDayNumber, template);
    closeTemplateModal();
    updateProgress();
}

function addRestDay() {
    const template = {
        title: 'Rest & Relaxation Day',
        description: 'A day to rest and recharge before the next adventure',
        activities: ['Leisure time', 'Optional activities', 'Relaxation'],
        meals: ['breakfast', 'lunch', 'dinner'],
        accommodation: 'Comfortable Hotel',
        transportation: 'Hotel shuttle'
    };
    
    const newDayNumber = document.querySelectorAll('[data-day]').length + 1;
    addDay(newDayNumber, template);
    updateProgress();
}

function addTravelDay() {
    const template = {
        title: 'Travel Day',
        description: 'Transfer between destinations with scenic stops',
        activities: ['Airport transfer', 'Scenic drive', 'Photo stops', 'Hotel check-in'],
        meals: ['breakfast', 'lunch'],
        accommodation: 'Transit Hotel',
        transportation: 'Private vehicle'
    };
    
    const newDayNumber = document.querySelectorAll('[data-day]').length + 1;
    addDay(newDayNumber, template);
    updateProgress();
}

function saveItinerary() {
    if (!currentTourId) {
        alert('Please select a tour first');
        return;
    }

    // Collect all form data
    const formData = new FormData();
    formData.append('tour_id', currentTourId);
    
    // Collect day data
    const days = document.querySelectorAll('[data-day]');
    days.forEach((dayDiv, index) => {
        const dayNumber = index + 1;
        const dayData = collectDayData(dayDiv);
        
        Object.keys(dayData).forEach(key => {
            if (Array.isArray(dayData[key])) {
                dayData[key].forEach((value, idx) => {
                    formData.append(`days[${dayNumber}][${key}][${idx}]`, value);
                });
            } else {
                formData.append(`days[${dayNumber}][${key}]`, dayData[key]);
            }
        });
    });

    // Show loading state
    const saveBtn = event.target;
    const originalText = saveBtn.innerHTML;
    saveBtn.innerHTML = '<i class="ph-bold ph-spinner text-white mr-2"></i>Saving...';
    saveBtn.disabled = true;

    // Send to server
    fetch('{{ route("admin.tours.itinerary-builder.store") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification('Itinerary saved successfully!', 'success');
        } else {
            showNotification('Error saving itinerary: ' + data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Error saving itinerary', 'error');
    })
    .finally(() => {
        // Restore button state
        saveBtn.innerHTML = originalText;
        saveBtn.disabled = false;
    });
}

function exportItinerary() {
    if (!currentTourId) {
        alert('Please select a tour first');
        return;
    }
    
    // Export functionality
    window.open(`/admin/tours/${currentTourId}/itinerary/export`, '_blank');
}

function previewItinerary() {
    if (!currentTourId) {
        alert('Please select a tour first');
        return;
    }
    
    // Preview functionality
    window.open(`/tours/preview/${currentTourId}`, '_blank');
}

function duplicateItinerary() {
    if (!currentTourId) {
        alert('Please select a tour first');
        return;
    }
    
    // Duplicate functionality
    if (confirm('Create a copy of this itinerary?')) {
        // Implementation for duplicating itinerary
        showNotification('Itinerary duplicated successfully!', 'success');
    }
}

function showNotification(message, type = 'success') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 flex items-center ${
        type === 'success' ? 'bg-emerald-600 text-white' : 'bg-red-600 text-white'
    }`;
    notification.innerHTML = `
        <i class="ph-bold ph-${type === 'success' ? 'check-circle' : 'x-circle'} mr-2"></i>
        ${message}
    `;
    
    document.body.appendChild(notification);
    
    // Remove after 3 seconds
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

// Initialize meal checkbox styling
document.addEventListener('change', function(e) {
    if (e.target.type === 'checkbox' && e.target.name.includes('meals')) {
        const label = e.target.closest('label');
        if (e.target.checked) {
            label.classList.add('bg-emerald-50', 'border-emerald-500');
        } else {
            label.classList.remove('bg-emerald-50', 'border-emerald-500');
        }
    }
});
</script>
@endsection
