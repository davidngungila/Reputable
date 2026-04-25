@extends('layouts.admin')

@section('title', 'Equipment Management')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Equipment Management</h1>
            <p class="text-gray-600">Manage climbing equipment, gear, and safety supplies</p>
        </div>
        <div class="flex flex-wrap gap-3 mt-4 lg:mt-0">
            <button onclick="showAddEquipmentModal()" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                <i class="fas fa-plus mr-2"></i>Add Equipment
            </button>
            <button onclick="exportEquipment()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                <i class="fas fa-download mr-2"></i>Export
            </button>
        </div>
    </div>

    <!-- Equipment Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-blue-100 rounded-lg">
                    <i class="fas fa-tools text-blue-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2 py-1 rounded-full">
                    {{ count($equipment) }} Total
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ count($equipment) }}</h3>
                <p class="text-sm text-gray-600">Total Items</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-green-100 rounded-lg">
                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">
                    Available
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ $equipment->where('status', 'available')->sum('quantity') }}</h3>
                <p class="text-sm text-gray-600">Available Items</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-orange-100 rounded-lg">
                    <i class="fas fa-wrench text-orange-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-orange-600 bg-orange-50 px-2 py-1 rounded-full">
                    Maintenance
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ $equipment->where('status', 'maintenance')->sum('quantity') }}</h3>
                <p class="text-sm text-gray-600">In Maintenance</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-red-100 rounded-lg">
                    <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-red-600 bg-red-50 px-2 py-1 rounded-full">
                    Alert
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ $equipment->where('condition', 'poor')->count() }}</h3>
                <p class="text-sm text-gray-600">Poor Condition</p>
            </div>
        </div>
    </div>

    <!-- Search and Filters -->
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6 border border-gray-100">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <input type="text" id="search-equipment" placeholder="Search equipment..." 
                       onkeyup="filterEquipment()"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
            </div>
            <div>
                <select id="type-filter" onchange="filterEquipment()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">All Types</option>
                    <option value="climbing">Climbing</option>
                    <option value="camping">Camping</option>
                    <option value="safety">Safety</option>
                    <option value="general">General</option>
                </select>
            </div>
            <div>
                <select id="condition-filter" onchange="filterEquipment()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">All Conditions</option>
                    <option value="excellent">Excellent</option>
                    <option value="good">Good</option>
                    <option value="fair">Fair</option>
                    <option value="poor">Poor</option>
                </select>
            </div>
            <div>
                <select id="status-filter" onchange="filterEquipment()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">All Status</option>
                    <option value="available">Available</option>
                    <option value="maintenance">Maintenance</option>
                    <option value="retired">Retired</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Equipment Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6" id="equipment-grid">
        @foreach($equipment ?? [] as $item)
        <div class="equipment-card bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-shadow" 
             data-type="{{ $item->type }}"
             data-condition="{{ $item->condition }}"
             data-status="{{ $item->status }}"
             data-name="{{ strtolower($item->name) }}">
            
            <!-- Equipment Image/Preview -->
            <div class="h-48 bg-gradient-to-br from-gray-600 to-gray-800 rounded-t-xl relative">
                @if(!empty($item->images) && count($item->images) > 0)
                    <img src="{{ asset($item->images[0]) }}" alt="{{ $item->name }}" 
                         class="w-full h-full object-cover rounded-t-xl">
                @else
                    <div class="absolute inset-0 flex items-center justify-center text-white">
                        <div class="text-center">
                            <i class="fas fa-tools text-4xl mb-2"></i>
                            <p class="text-sm">{{ ucfirst($item->type) }} Equipment</p>
                        </div>
                    </div>
                @endif
                
                <!-- Status Badge -->
                <div class="absolute top-4 right-4">
                    <span class="px-3 py-1 text-xs font-medium rounded-full
                        {{ $item->status === 'available' ? 'bg-green-100 text-green-700' : '' }}
                        {{ $item->status === 'maintenance' ? 'bg-orange-100 text-orange-700' : '' }}
                        {{ $item->status === 'retired' ? 'bg-red-100 text-red-700' : '' }}">
                        {{ ucfirst($item->status) }}
                    </span>
                </div>

                <!-- Quantity Badge -->
                <div class="absolute top-4 left-4">
                    <span class="px-3 py-1 text-xs font-medium bg-blue-100 text-blue-700 rounded-full">
                        Qty: {{ $item->quantity }}
                    </span>
                </div>
            </div>

            <!-- Equipment Content -->
            <div class="p-6">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-lg font-semibold text-gray-900">{{ $item->name }}</h3>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-route mr-1"></i>
                        {{ $item->tours_count ?? 0 }} tours
                    </div>
                </div>

                <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $item->description }}</p>

                <!-- Equipment Details -->
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-tag mr-2 text-gray-400"></i>
                        {{ ucfirst($item->type) }}
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-heartbeat mr-2 text-gray-400"></i>
                        {{ ucfirst($item->condition) }}
                    </div>
                    @if($item->purchase_date)
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-calendar mr-2 text-gray-400"></i>
                        {{ $item->purchase_date->format('M Y') }}
                    </div>
                    @endif
                    @if($item->next_maintenance)
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-wrench mr-2 text-gray-400"></i>
                        {{ $item->next_maintenance->format('M d') }}
                    </div>
                    @endif
                </div>

                <!-- Maintenance Alert -->
                @if($item->next_maintenance && $item->next_maintenance->isPast())
                <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-triangle text-red-600 mr-2"></i>
                        <span class="text-sm text-red-700">Maintenance overdue</span>
                    </div>
                </div>
                @elseif($item->next_maintenance && $item->next_maintenance->diffInDays(now()) <= 7)
                <div class="mb-4 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-clock text-yellow-600 mr-2"></i>
                        <span class="text-sm text-yellow-700">Maintenance due soon</span>
                    </div>
                </div>
                @endif

                <!-- Actions -->
                <div class="flex gap-2">
                    <button onclick="viewEquipment({{ $item->id }})" class="flex-1 px-3 py-2 bg-emerald-100 text-emerald-700 rounded-lg hover:bg-emerald-200 transition-colors text-sm font-medium">
                        <i class="fas fa-eye mr-1"></i>View
                    </button>
                    <button onclick="editEquipment({{ $item->id }})" class="flex-1 px-3 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors text-sm font-medium">
                        <i class="fas fa-edit mr-1"></i>Edit
                    </button>
                    <button onclick="scheduleMaintenance({{ $item->id }})" class="px-3 py-2 bg-orange-100 text-orange-700 rounded-lg hover:bg-orange-200 transition-colors text-sm font-medium">
                        <i class="fas fa-wrench"></i>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if(empty($equipment ?? []))
    <div class="bg-white rounded-xl shadow-sm p-12 text-center border border-gray-100">
        <i class="fas fa-tools text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">No Equipment Found</h3>
        <p class="text-gray-600 mb-6">Get started by adding your first equipment item</p>
        <button onclick="showAddEquipmentModal()" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
            <i class="fas fa-plus mr-2"></i>Add Equipment
        </button>
    </div>
    @endif
</div>

<!-- Add/Edit Equipment Modal -->
<div id="equipment-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl p-6 max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-semibold text-gray-900" id="modal-title">Add Equipment</h3>
            <button onclick="hideEquipmentModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <form id="equipment-form" onsubmit="saveEquipment(event)" class="space-y-6">
            @csrf
            <input type="hidden" id="equipment-id" name="id">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Equipment Name *</label>
                    <input type="text" id="equipment-name" name="name" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="e.g., Climbing Harness">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Type *</label>
                    <select id="equipment-type" name="type" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">Select Type</option>
                        <option value="climbing">Climbing</option>
                        <option value="camping">Camping</option>
                        <option value="safety">Safety</option>
                        <option value="general">General</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Quantity *</label>
                    <input type="number" id="equipment-quantity" name="quantity" required min="0"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="10">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Condition *</label>
                    <select id="equipment-condition" name="condition" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">Select Condition</option>
                        <option value="excellent">Excellent</option>
                        <option value="good">Good</option>
                        <option value="fair">Fair</option>
                        <option value="poor">Poor</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Purchase Date</label>
                    <input type="date" id="equipment-purchase-date" name="purchase_date"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select id="equipment-status" name="status"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="available">Available</option>
                        <option value="maintenance">Maintenance</option>
                        <option value="retired">Retired</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea id="equipment-description" name="description" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                          placeholder="Describe the equipment, its use, and specifications..."></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Last Maintenance</label>
                    <input type="date" id="equipment-last-maintenance" name="last_maintenance"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Next Maintenance</label>
                    <input type="date" id="equipment-next-maintenance" name="next_maintenance"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
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
                <button type="button" onclick="hideEquipmentModal()" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                    Cancel
                </button>
                <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                    <i class="fas fa-save mr-2"></i>Save Equipment
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Maintenance Modal -->
<div id="maintenance-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl p-6 max-w-md w-full mx-4">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-semibold text-gray-900">Schedule Maintenance</h3>
            <button onclick="hideMaintenanceModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <form id="maintenance-form" onsubmit="saveMaintenance(event)" class="space-y-4">
            @csrf
            <input type="hidden" id="maintenance-equipment-id">
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Maintenance Date</label>
                <input type="date" id="maintenance-date" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Notes</label>
                <textarea id="maintenance-notes" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                          placeholder="Maintenance details and requirements..."></textarea>
            </div>

            <div class="flex justify-end gap-4">
                <button type="button" onclick="hideMaintenanceModal()" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                    Cancel
                </button>
                <button type="submit" class="px-6 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors">
                    <i class="fas fa-wrench mr-2"></i>Schedule
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function showAddEquipmentModal() {
    document.getElementById('modal-title').textContent = 'Add Equipment';
    document.getElementById('equipment-form').reset();
    document.getElementById('equipment-id').value = '';
    document.getElementById('equipment-modal').classList.remove('hidden');
}

function editEquipment(id) {
    fetch(`/api/equipment/${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('modal-title').textContent = 'Edit Equipment';
            document.getElementById('equipment-id').value = data.id;
            document.getElementById('equipment-name').value = data.name;
            document.getElementById('equipment-type').value = data.type;
            document.getElementById('equipment-quantity').value = data.quantity;
            document.getElementById('equipment-condition').value = data.condition;
            document.getElementById('equipment-description').value = data.description || '';
            document.getElementById('equipment-purchase-date').value = data.purchase_date || '';
            document.getElementById('equipment-last-maintenance').value = data.last_maintenance || '';
            document.getElementById('equipment-next-maintenance').value = data.next_maintenance || '';
            document.getElementById('equipment-status').value = data.status || 'available';
            
            loadImages(data.images || []);
            
            document.getElementById('equipment-modal').classList.remove('hidden');
        })
        .catch(error => console.error('Error loading equipment:', error));
}

function hideEquipmentModal() {
    document.getElementById('equipment-modal').classList.add('hidden');
}

function saveEquipment(event) {
    event.preventDefault();
    
    const formData = new FormData(event.target);
    const equipmentId = formData.get('id');
    const url = equipmentId ? `/admin/mountain/equipment-management/${equipmentId}` : '/admin/mountain/equipment-management';
    const method = equipmentId ? 'PUT' : 'POST';
    
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
            hideEquipmentModal();
            location.reload();
        } else {
            alert('Error saving equipment: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error saving equipment');
    });
}

function scheduleMaintenance(id) {
    document.getElementById('maintenance-equipment-id').value = id;
    document.getElementById('maintenance-form').reset();
    document.getElementById('maintenance-modal').classList.remove('hidden');
}

function hideMaintenanceModal() {
    document.getElementById('maintenance-modal').classList.add('hidden');
}

function saveMaintenance(event) {
    event.preventDefault();
    
    const formData = new FormData(event.target);
    const equipmentId = formData.get('equipment_id');
    
    fetch(`/admin/mountain/equipment-management/${equipmentId}/maintenance`, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            hideMaintenanceModal();
            location.reload();
        } else {
            alert('Error scheduling maintenance: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error scheduling maintenance');
    });
}

function viewEquipment(id) {
    // View equipment details
    console.log('View equipment:', id);
}

function filterEquipment() {
    const searchTerm = document.getElementById('search-equipment').value.toLowerCase();
    const typeFilter = document.getElementById('type-filter').value;
    const conditionFilter = document.getElementById('condition-filter').value;
    const statusFilter = document.getElementById('status-filter').value;
    
    const cards = document.querySelectorAll('.equipment-card');
    
    cards.forEach(card => {
        const name = card.dataset.name;
        const type = card.dataset.type;
        const condition = card.dataset.condition;
        const status = card.dataset.status;
        
        const matchesSearch = !searchTerm || name.includes(searchTerm);
        const matchesType = !typeFilter || type === typeFilter;
        const matchesCondition = !conditionFilter || condition === conditionFilter;
        const matchesStatus = !statusFilter || status === statusFilter;
        
        card.style.display = matchesSearch && matchesType && matchesCondition && matchesStatus ? 'block' : 'none';
    });
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

function exportEquipment() {
    // Export equipment data
    console.log('Exporting equipment');
}
</script>
@endsection
