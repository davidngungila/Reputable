@extends('layouts.admin')

@section('title', 'Destinations Management')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Destinations Management</h1>
            <p class="text-gray-600">Manage tour destinations and locations</p>
        </div>
        <div class="flex flex-wrap gap-3 mt-4 lg:mt-0">
            <button onclick="showAddDestinationModal()" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                <i class="fas fa-plus mr-2"></i>Add Destination
            </button>
            <button onclick="exportDestinations()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                <i class="fas fa-download mr-2"></i>Export
            </button>
        </div>
    </div>

    <!-- Search and Filters -->
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6 border border-gray-100">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <input type="text" id="search-destinations" placeholder="Search destinations..." 
                       onkeyup="filterDestinations()"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
            </div>
            <div>
                <select id="region-filter" onchange="filterDestinations()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">All Regions</option>
                    <option value="northern">Northern Tanzania</option>
                    <option value="southern">Southern Tanzania</option>
                    <option value="western">Western Tanzania</option>
                    <option value="coastal">Coastal Tanzania</option>
                    <option value="zanzibar">Zanzibar</option>
                </select>
            </div>
            <div>
                <select id="status-filter" onchange="filterDestinations()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Destinations Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6" id="destinations-grid">
        @foreach($destinations ?? [] as $destination)
        <div class="destination-card bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-shadow" 
             data-region="{{ $destination->region ?? 'northern' }}"
             data-status="{{ $destination->status ?? 'active' }}"
             data-name="{{ strtolower($destination->name) }}">
            
            <!-- Destination Image -->
            <div class="h-48 bg-gradient-to-br from-blue-400 to-emerald-500 rounded-t-xl relative">
                @if(!empty($destination->images) && count($destination->images) > 0)
                    <img src="{{ asset($destination->images[0]) }}" alt="{{ $destination->name }}" 
                         class="w-full h-full object-cover rounded-t-xl">
                @else
                    <div class="absolute inset-0 flex items-center justify-center text-white">
                        <div class="text-center">
                            <i class="fas fa-map-marked-alt text-4xl mb-2"></i>
                            <p class="text-sm">No Image</p>
                        </div>
                    </div>
                @endif
                
                <!-- Status Badge -->
                <div class="absolute top-4 right-4">
                    <span class="px-3 py-1 text-xs font-medium rounded-full
                        {{ $destination->status === 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                        {{ ucfirst($destination->status ?? 'Active') }}
                    </span>
                </div>
            </div>

            <!-- Destination Content -->
            <div class="p-6">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-lg font-semibold text-gray-900">{{ $destination->name }}</h3>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-route mr-1"></i>
                        {{ $destination->tours_count ?? 0 }} tours
                    </div>
                </div>

                <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $destination->description }}</p>

                <!-- Location Info -->
                <div class="space-y-2 mb-4">
                    @if($destination->location)
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-map-marker-alt mr-2 text-gray-400"></i>
                        {{ $destination->location }}
                    </div>
                    @endif
                    
                    @if($destination->coordinates && isset($destination->coordinates['lat']))
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-globe mr-2 text-gray-400"></i>
                        {{ $destination->coordinates['lat'] }}, {{ $destination->coordinates['lng'] }}
                    </div>
                    @endif
                    
                    @if($destination->best_time_to_visit)
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-calendar mr-2 text-gray-400"></i>
                        Best: {{ $destination->best_time_to_visit }}
                    </div>
                    @endif
                </div>

                <!-- Highlights -->
                @if(!empty($destination->highlights))
                <div class="mb-4">
                    <p class="text-sm font-medium text-gray-700 mb-2">Highlights:</p>
                    <div class="flex flex-wrap gap-1">
                        @foreach(array_slice($destination->highlights, 0, 3) as $highlight)
                        <span class="px-2 py-1 bg-emerald-100 text-emerald-700 text-xs rounded-full">
                            {{ $highlight }}
                        </span>
                        @endforeach
                        @if(count($destination->highlights) > 3)
                        <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full">
                            +{{ count($destination->highlights) - 3 }} more
                        </span>
                        @endif
                    </div>
                </div>
                @endif

                <!-- Actions -->
                <div class="flex gap-2">
                    <button onclick="viewDestination({{ $destination->id }})" class="flex-1 px-3 py-2 bg-emerald-100 text-emerald-700 rounded-lg hover:bg-emerald-200 transition-colors text-sm font-medium">
                        <i class="fas fa-eye mr-1"></i>View
                    </button>
                    <button onclick="editDestination({{ $destination->id }})" class="flex-1 px-3 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors text-sm font-medium">
                        <i class="fas fa-edit mr-1"></i>Edit
                    </button>
                    <button onclick="deleteDestination({{ $destination->id }})" class="px-3 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors text-sm font-medium">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if(empty($destinations ?? []))
    <div class="bg-white rounded-xl shadow-sm p-12 text-center border border-gray-100">
        <i class="fas fa-map-marked-alt text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">No Destinations Found</h3>
        <p class="text-gray-600 mb-6">Get started by adding your first destination</p>
        <button onclick="showAddDestinationModal()" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
            <i class="fas fa-plus mr-2"></i>Add Destination
        </button>
    </div>
    @endif
</div>

<!-- Add/Edit Destination Modal -->
<div id="destination-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl p-6 max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-semibold text-gray-900" id="modal-title">Add Destination</h3>
            <button onclick="hideDestinationModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <form id="destination-form" onsubmit="saveDestination(event)" class="space-y-6">
            @csrf
            <input type="hidden" id="destination-id" name="id">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Destination Name *</label>
                    <input type="text" id="destination-name" name="name" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="e.g., Serengeti National Park">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Location *</label>
                    <input type="text" id="destination-location" name="location" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="e.g., Northern Tanzania">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Region</label>
                    <select id="destination-region" name="region"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">Select Region</option>
                        <option value="northern">Northern Tanzania</option>
                        <option value="southern">Southern Tanzania</option>
                        <option value="western">Western Tanzania</option>
                        <option value="coastal">Coastal Tanzania</option>
                        <option value="zanzibar">Zanzibar</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select id="destination-status" name="status"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea id="destination-description" name="description" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                          placeholder="Describe the destination, its significance, and what makes it special..."></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Best Time to Visit</label>
                    <input type="text" id="destination-best-time" name="best_time_to_visit"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="e.g., June to October">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Weather Info</label>
                    <input type="text" id="destination-weather" name="weather_info"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="e.g., Dry season, warm days">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Coordinates</label>
                <div class="grid grid-cols-2 gap-4">
                    <input type="number" id="destination-lat" name="coordinates[lat]" step="0.000001"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="Latitude">
                    <input type="number" id="destination-lng" name="coordinates[lng]" step="0.000001"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="Longitude">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Highlights</label>
                <div id="highlights-container" class="space-y-2">
                    <div class="flex gap-2">
                        <input type="text" name="highlights[]" placeholder="e.g., Great Migration, Big Five"
                               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <button type="button" onclick="addHighlight()" class="px-3 py-2 bg-emerald-100 text-emerald-700 rounded-lg hover:bg-emerald-200">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Images</label>
                <div id="images-container" class="space-y-2">
                    <div class="flex gap-2">
                        <input type="text" name="images[]" placeholder="Image path or URL"
                               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <button type="button" onclick="addImage()" class="px-3 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-4">
                <button type="button" onclick="hideDestinationModal()" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                    Cancel
                </button>
                <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                    <i class="fas fa-save mr-2"></i>Save Destination
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function showAddDestinationModal() {
    document.getElementById('modal-title').textContent = 'Add Destination';
    document.getElementById('destination-form').reset();
    document.getElementById('destination-id').value = '';
    document.getElementById('destination-modal').classList.remove('hidden');
}

function editDestination(id) {
    // Load destination data and show modal
    fetch(`/api/destinations/${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('modal-title').textContent = 'Edit Destination';
            document.getElementById('destination-id').value = data.id;
            document.getElementById('destination-name').value = data.name;
            document.getElementById('destination-location').value = data.location;
            document.getElementById('destination-region').value = data.region || '';
            document.getElementById('destination-status').value = data.status || 'active';
            document.getElementById('destination-description').value = data.description || '';
            document.getElementById('destination-best-time').value = data.best_time_to_visit || '';
            document.getElementById('destination-weather').value = data.weather_info || '';
            document.getElementById('destination-lat').value = data.coordinates?.lat || '';
            document.getElementById('destination-lng').value = data.coordinates?.lng || '';
            
            // Load highlights and images
            loadHighlights(data.highlights || []);
            loadImages(data.images || []);
            
            document.getElementById('destination-modal').classList.remove('hidden');
        })
        .catch(error => console.error('Error loading destination:', error));
}

function hideDestinationModal() {
    document.getElementById('destination-modal').classList.add('hidden');
}

function saveDestination(event) {
    event.preventDefault();
    
    const formData = new FormData(event.target);
    const destinationId = formData.get('id');
    const url = destinationId ? `/admin/tours/destinations/${destinationId}` : '/admin/tours/destinations';
    const method = destinationId ? 'PUT' : 'POST';
    
    fetch(url, {
        method: method,
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            hideDestinationModal();
            location.reload();
        } else {
            alert('Error saving destination: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error saving destination');
    });
}

function deleteDestination(id) {
    if (confirm('Are you sure you want to delete this destination?')) {
        fetch(`/admin/tours/destinations/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error deleting destination: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error deleting destination');
        });
    }
}

function filterDestinations() {
    const searchTerm = document.getElementById('search-destinations').value.toLowerCase();
    const regionFilter = document.getElementById('region-filter').value;
    const statusFilter = document.getElementById('status-filter').value;
    
    const cards = document.querySelectorAll('.destination-card');
    
    cards.forEach(card => {
        const name = card.dataset.name;
        const region = card.dataset.region;
        const status = card.dataset.status;
        
        const matchesSearch = !searchTerm || name.includes(searchTerm);
        const matchesRegion = !regionFilter || region === regionFilter;
        const matchesStatus = !statusFilter || status === statusFilter;
        
        card.style.display = matchesSearch && matchesRegion && matchesStatus ? 'block' : 'none';
    });
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

function addImage() {
    const container = document.getElementById('images-container');
    const div = document.createElement('div');
    div.className = 'flex gap-2';
    div.innerHTML = `
        <input type="text" name="images[]" placeholder="Add image..."
               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
        <button type="button" onclick="this.parentElement.remove()" class="px-3 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200">
            <i class="fas fa-times"></i>
        </button>
    `;
    container.appendChild(div);
}

function loadHighlights(highlights) {
    const container = document.getElementById('highlights-container');
    container.innerHTML = '';
    
    highlights.forEach(highlight => {
        const div = document.createElement('div');
        div.className = 'flex gap-2';
        div.innerHTML = `
            <input type="text" name="highlights[]" value="${highlight}"
                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
            <button type="button" onclick="this.parentElement.remove()" class="px-3 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(div);
    });
    
    // Add empty input for new highlights
    addHighlight();
}

function loadImages(images) {
    const container = document.getElementById('images-container');
    container.innerHTML = '';
    
    images.forEach(image => {
        const div = document.createElement('div');
        div.className = 'flex gap-2';
        div.innerHTML = `
            <input type="text" name="images[]" value="${image}"
                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
            <button type="button" onclick="this.parentElement.remove()" class="px-3 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(div);
    });
    
    // Add empty input for new images
    addImage();
}

function viewDestination(id) {
    // View destination details
    window.open(`/destinations/${id}`, '_blank');
}

function exportDestinations() {
    // Export destinations data
    console.log('Exporting destinations');
}
</script>
@endsection
