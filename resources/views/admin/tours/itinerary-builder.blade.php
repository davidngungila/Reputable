@extends('layouts.admin')

@section('title', 'Itinerary Builder')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Itinerary Builder</h1>
            <p class="text-gray-600">Create detailed day-by-day itineraries for your tours</p>
        </div>
        <div class="flex flex-wrap gap-3 mt-4 lg:mt-0">
            <select id="tour-selector" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                <option value="">Select a tour...</option>
                @foreach(\App\Models\Tour::all() as $tour)
                <option value="{{ $tour->id }}">{{ $tour->name }} - {{ $tour->duration_days }} days</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Itinerary Builder Interface -->
    <div id="itinerary-builder" class="hidden">
        <!-- Tour Overview -->
        <div class="bg-white rounded-xl shadow-sm p-6 mb-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-gray-900" id="tour-name">Tour Name</h2>
                    <p class="text-gray-600" id="tour-description">Tour Description</p>
                </div>
                <div class="flex items-center gap-4">
                    <span class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-sm font-medium">
                        <span id="tour-duration">0</span> days
                    </span>
                    <button onclick="saveItinerary()" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                        <i class="fas fa-save mr-2"></i>Save Itinerary
                    </button>
                </div>
            </div>
        </div>

        <!-- Days Container -->
        <div id="days-container" class="space-y-6">
            <!-- Days will be dynamically added here -->
        </div>

        <!-- Add Day Button -->
        <div class="text-center mt-8">
            <button onclick="addDay()" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                <i class="fas fa-plus mr-2"></i>Add Day
            </button>
        </div>
    </div>

    <!-- Empty State -->
    <div id="empty-state" class="bg-white rounded-xl shadow-sm p-12 text-center border border-gray-100">
        <i class="fas fa-route text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">No Tour Selected</h3>
        <p class="text-gray-600 mb-6">Select a tour to start building its itinerary</p>
    </div>
</div>

<script>
let currentTourId = null;
let itineraryDays = [];

// Tour selector change handler
document.getElementById('tour-selector').addEventListener('change', function(e) {
    const tourId = e.target.value;
    if (!tourId) {
        document.getElementById('itinerary-builder').classList.add('hidden');
        document.getElementById('empty-state').classList.remove('hidden');
        return;
    }

    currentTourId = tourId;
    loadTourData(tourId);
});

function loadTourData(tourId) {
    fetch(`/api/tours/${tourId}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('tour-name').textContent = data.name;
            document.getElementById('tour-description').textContent = data.description;
            document.getElementById('tour-duration').textContent = data.duration_days;
            
            document.getElementById('itinerary-builder').classList.remove('hidden');
            document.getElementById('empty-state').classList.add('hidden');
            
            // Initialize days based on tour duration
            initializeDays(data.duration_days);
        })
        .catch(error => console.error('Error loading tour:', error));
}

function initializeDays(duration) {
    const container = document.getElementById('days-container');
    container.innerHTML = '';
    itineraryDays = [];

    for (let i = 1; i <= duration; i++) {
        addDay(i);
    }
}

function addDay(dayNumber = null) {
    const container = document.getElementById('days-container');
    const dayNum = dayNumber || (container.children.length + 1);
    
    const dayDiv = document.createElement('div');
    dayDiv.className = 'bg-white rounded-xl shadow-sm border border-gray-100';
    dayDiv.dataset.day = dayNum;
    
    dayDiv.innerHTML = `
        <div class="p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Day ${dayNum}</h3>
                <button type="button" onclick="removeDay(${dayNum})" class="text-red-500 hover:text-red-700">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Day Title</label>
                    <input type="text" name="day_${dayNum}_title" placeholder="e.g., Arrival & Serengeti Transfer"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="day_${dayNum}_description" rows="3" placeholder="Describe the activities and experiences for this day..."
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"></textarea>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Main Activities</label>
                        <div id="activities_${dayNum}" class="space-y-2">
                            <div class="flex gap-2">
                                <input type="text" name="day_${dayNum}_activities[]" placeholder="e.g., Game drive, bush breakfast"
                                       class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm">
                                <button type="button" onclick="addActivity(${dayNum})" class="px-2 py-2 bg-emerald-100 text-emerald-700 rounded hover:bg-emerald-200">
                                    <i class="fas fa-plus text-xs"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Meals</label>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="checkbox" name="day_${dayNum}_meals[]" value="breakfast" class="mr-2">
                                <span class="text-sm">Breakfast</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="day_${dayNum}_meals[]" value="lunch" class="mr-2">
                                <span class="text-sm">Lunch</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="day_${dayNum}_meals[]" value="dinner" class="mr-2">
                                <span class="text-sm">Dinner</span>
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Accommodation</label>
                        <input type="text" name="day_${dayNum}_accommodation" placeholder="e.g., Serengeti Sopa Lodge"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Transportation</label>
                        <input type="text" name="day_${dayNum}_transportation" placeholder="e.g., 4x4 safari vehicle"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    </div>
                </div>
            </div>
        </div>
    `;
    
    if (dayNumber) {
        container.appendChild(dayDiv);
    } else {
        container.appendChild(dayDiv);
    }
}

function removeDay(dayNumber) {
    const dayDiv = document.querySelector(`[data-day="${dayNumber}"]`);
    if (dayDiv) {
        dayDiv.remove();
        updateDayNumbers();
    }
}

function updateDayNumbers() {
    const container = document.getElementById('days-container');
    const days = container.querySelectorAll('[data-day]');
    
    days.forEach((dayDiv, index) => {
        const newDayNumber = index + 1;
        dayDiv.dataset.day = newDayNumber;
        
        // Update all input names and labels
        dayDiv.querySelectorAll('h3').forEach(h3 => {
            h3.textContent = `Day ${newDayNumber}`;
        });
        
        // Update input names (this would need more complex logic for production)
        // For now, we'll just update the visual day number
    });
}

function addActivity(dayNumber) {
    const container = document.getElementById(`activities_${dayNumber}`);
    const div = document.createElement('div');
    div.className = 'flex gap-2';
    div.innerHTML = `
        <input type="text" name="day_${dayNumber}_activities[]" placeholder="Add activity..."
               class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm">
        <button type="button" onclick="this.parentElement.remove()" class="px-2 py-2 bg-red-100 text-red-700 rounded hover:bg-red-200">
            <i class="fas fa-times text-xs"></i>
        </button>
    `;
    container.appendChild(div);
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
        
        // Get title
        const title = dayDiv.querySelector(`input[name="day_${dayNumber}_title"]`)?.value || '';
        formData.append(`days[${dayNumber}][title]`, title);
        
        // Get description
        const description = dayDiv.querySelector(`textarea[name="day_${dayNumber}_description"]`)?.value || '';
        formData.append(`days[${dayNumber}][description]`, description);
        
        // Get activities
        const activities = dayDiv.querySelectorAll(`input[name="day_${dayNumber}_activities[]"]`);
        activities.forEach((input, actIndex) => {
            if (input.value) {
                formData.append(`days[${dayNumber}][activities][${actIndex}]`, input.value);
            }
        });
        
        // Get meals
        const meals = dayDiv.querySelectorAll(`input[name="day_${dayNumber}_meals[]"]:checked`);
        meals.forEach((checkbox) => {
            formData.append(`days[${dayNumber}][meals][]`, checkbox.value);
        });
        
        // Get accommodation
        const accommodation = dayDiv.querySelector(`input[name="day_${dayNumber}_accommodation"]`)?.value || '';
        formData.append(`days[${dayNumber}][accommodation]`, accommodation);
        
        // Get transportation
        const transportation = dayDiv.querySelector(`input[name="day_${dayNumber}_transportation"]`)?.value || '';
        formData.append(`days[${dayNumber}][transportation]`, transportation);
    });

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
            alert('Itinerary saved successfully!');
        } else {
            alert('Error saving itinerary: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error saving itinerary');
    });
}
</script>
@endsection
