@extends('layouts.admin')

@section('title', 'Availability & Pricing')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Availability & Pricing</h1>
            <p class="text-gray-600">Manage tour availability and pricing schedules</p>
        </div>
        <div class="flex flex-wrap gap-3 mt-4 lg:mt-0">
            <button onclick="exportPricing()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                <i class="fas fa-download mr-2"></i>Export Pricing
            </button>
        </div>
    </div>

    <!-- Tour Selection -->
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6 border border-gray-100">
        <div class="flex items-center gap-4">
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 mb-2">Select Tour</label>
                <select id="tour-selector" onchange="loadTourAvailability()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">Choose a tour to manage...</option>
                    @foreach($tours ?? [] as $tour)
                    <option value="{{ $tour->id }}">{{ $tour->name }} - ${{ number_format($tour->base_price, 0) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex gap-2">
                <button onclick="showBulkUpdate()" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors text-sm font-medium">
                    <i class="fas fa-edit mr-2"></i>Bulk Update
                </button>
            </div>
        </div>
    </div>

    <!-- Tour Details Panel -->
    <div id="tour-details" class="hidden">
        <div class="bg-white rounded-xl shadow-sm p-6 mb-6 border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-xl font-semibold text-gray-900" id="selected-tour-name">Tour Name</h2>
                    <p class="text-gray-600" id="selected-tour-info">Duration • Location</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <p class="text-sm text-gray-600">Base Price</p>
                        <p class="text-2xl font-bold text-emerald-600" id="selected-tour-price">$0</p>
                    </div>
                </div>
            </div>

            <!-- Pricing Controls -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Seasonal Multiplier</label>
                    <select id="seasonal-multiplier" onchange="updateSeasonalPricing()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="1.0">Standard (1.0x)</option>
                        <option value="1.2">Peak Season (1.2x)</option>
                        <option value="1.5">High Season (1.5x)</option>
                        <option value="0.8">Low Season (0.8x)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Group Discount</label>
                    <input type="number" id="group-discount" min="0" max="50" step="5" value="0" onchange="updateGroupPricing()"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           placeholder="0%">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Max Group Size</label>
                    <input type="number" id="max-group-size" min="1" max="50" value="20" onchange="updateAvailability()"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                </div>
            </div>

            <!-- Calendar View -->
            <div class="mb-8">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Availability Calendar</h3>
                    <div class="flex items-center gap-2">
                        <button onclick="previousMonth()" class="p-2 text-gray-600 hover:text-gray-900">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <span id="current-month" class="text-sm font-medium text-gray-700">Month Year</span>
                        <button onclick="nextMonth()" class="p-2 text-gray-600 hover:text-gray-900">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Calendar Grid -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="grid grid-cols-7 gap-2 mb-2">
                        <div class="text-center text-xs font-medium text-gray-600">Sun</div>
                        <div class="text-center text-xs font-medium text-gray-600">Mon</div>
                        <div class="text-center text-xs font-medium text-gray-600">Tue</div>
                        <div class="text-center text-xs font-medium text-gray-600">Wed</div>
                        <div class="text-center text-xs font-medium text-gray-600">Thu</div>
                        <div class="text-center text-xs font-medium text-gray-600">Fri</div>
                        <div class="text-center text-xs font-medium text-gray-600">Sat</div>
                    </div>
                    <div id="calendar-grid" class="grid grid-cols-7 gap-2">
                        <!-- Calendar days will be generated here -->
                    </div>
                </div>
            </div>

            <!-- Availability List -->
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Availability Schedule</h3>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Date</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Available Slots</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Price</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Status</th>
                                <th class="text-center py-3 px-4 text-sm font-medium text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="availability-list">
                            <!-- Availability rows will be generated here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Empty State -->
    <div id="empty-state" class="bg-white rounded-xl shadow-sm p-12 text-center border border-gray-100">
        <i class="fas fa-calendar-alt text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">No Tour Selected</h3>
        <p class="text-gray-600 mb-6">Select a tour to manage its availability and pricing</p>
    </div>
</div>

<!-- Bulk Update Modal -->
<div id="bulk-update-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl p-6 max-w-md w-full mx-4">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Bulk Update Availability</h3>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Date Range</label>
                <div class="grid grid-cols-2 gap-2">
                    <input type="date" id="bulk-start-date" class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <input type="date" id="bulk-end-date" class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Available Slots</label>
                <input type="number" id="bulk-slots" min="0" max="50" value="20" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Price Adjustment</label>
                <select id="bulk-price-adjustment" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="0">No Change</option>
                    <option value="increase">Increase by %</option>
                    <option value="decrease">Decrease by %</option>
                    <option value="set">Set specific price</option>
                </select>
            </div>
            <div id="price-amount-container" class="hidden">
                <input type="number" id="bulk-price-amount" min="0" step="0.01" placeholder="Amount" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
            </div>
        </div>
        <div class="flex justify-end gap-3 mt-6">
            <button onclick="hideBulkUpdate()" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">Cancel</button>
            <button onclick="applyBulkUpdate()" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">Apply</button>
        </div>
    </div>
</div>

<script>
let currentTourId = null;
let currentMonth = new Date();
let availabilityData = {};

function loadTourAvailability() {
    const selector = document.getElementById('tour-selector');
    currentTourId = selector.value;
    
    if (!currentTourId) {
        document.getElementById('tour-details').classList.add('hidden');
        document.getElementById('empty-state').classList.remove('hidden');
        return;
    }

    // Load tour data
    fetch(`/api/tours/${currentTourId}/availability`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('selected-tour-name').textContent = data.name;
            document.getElementById('selected-tour-info').textContent = `${data.duration_days} days • ${data.location}`;
            document.getElementById('selected-tour-price').textContent = `$${number_format(data.base_price, 0)}`;
            document.getElementById('max-group-size').value = data.max_group_size || 20;
            
            document.getElementById('tour-details').classList.remove('hidden');
            document.getElementById('empty-state').classList.add('hidden');
            
            availabilityData = data.availability || {};
            generateCalendar();
            generateAvailabilityList();
        })
        .catch(error => console.error('Error loading availability:', error));
}

function generateCalendar() {
    const year = currentMonth.getFullYear();
    const month = currentMonth.getMonth();
    const firstDay = new Date(year, month, 1);
    const lastDay = new Date(year, month + 1, 0);
    const daysInMonth = lastDay.getDate();
    const startingDayOfWeek = firstDay.getDay();
    
    // Update month display
    document.getElementById('current-month').textContent = 
        firstDay.toLocaleDateString('en-US', { month: 'long', year: 'numeric' });
    
    const grid = document.getElementById('calendar-grid');
    grid.innerHTML = '';
    
    // Add empty cells for days before month starts
    for (let i = 0; i < startingDayOfWeek; i++) {
        const emptyCell = document.createElement('div');
        grid.appendChild(emptyCell);
    }
    
    // Add days of the month
    for (let day = 1; day <= daysInMonth; day++) {
        const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
        const availability = availabilityData[dateStr] || { available_slots: 20, price: 0, status: 'available' };
        
        const dayCell = document.createElement('div');
        dayCell.className = 'bg-white border border-gray-200 rounded-lg p-2 hover:bg-emerald-50 cursor-pointer transition-colors';
        dayCell.onclick = () => editDateAvailability(dateStr);
        
        let statusColor = 'bg-green-100 text-green-800';
        if (availability.status === 'full') statusColor = 'bg-red-100 text-red-800';
        else if (availability.status === 'limited') statusColor = 'bg-yellow-100 text-yellow-800';
        else if (availability.status === 'unavailable') statusColor = 'bg-gray-100 text-gray-800';
        
        dayCell.innerHTML = `
            <div class="text-center">
                <div class="text-sm font-medium text-gray-900">${day}</div>
                <div class="text-xs text-gray-600">${availability.available_slots || 0}</div>
                <div class="text-xs font-medium ${statusColor} rounded px-1 mt-1">${availability.status || 'available'}</div>
            </div>
        `;
        
        grid.appendChild(dayCell);
    }
}

function generateAvailabilityList() {
    const tbody = document.getElementById('availability-list');
    tbody.innerHTML = '';
    
    // Generate next 30 days of availability
    const today = new Date();
    for (let i = 0; i < 30; i++) {
        const date = new Date(today);
        date.setDate(today.getDate() + i);
        const dateStr = date.toISOString().split('T')[0];
        const availability = availabilityData[dateStr] || { available_slots: 20, price: 0, status: 'available' };
        
        const row = document.createElement('tr');
        row.className = 'border-b border-gray-100 hover:bg-gray-50';
        row.innerHTML = `
            <td class="py-3 px-4">
                <div class="text-sm font-medium text-gray-900">${date.toLocaleDateString()}</div>
                <div class="text-xs text-gray-600">${date.toLocaleDateString('en-US', { weekday: 'short' })}</div>
            </td>
            <td class="py-3 px-4">
                <input type="number" min="0" max="50" value="${availability.available_slots || 20}" 
                       onchange="updateAvailabilitySlot('${dateStr}', this.value)"
                       class="w-20 px-2 py-1 border border-gray-300 rounded text-sm">
            </td>
            <td class="py-3 px-4">
                <div class="text-sm font-medium text-gray-900">$${number_format(availability.price || 0, 0)}</div>
            </td>
            <td class="py-3 px-4">
                <span class="px-2 py-1 text-xs font-medium rounded-full
                    ${availability.status === 'available' ? 'bg-green-100 text-green-800' : ''}
                    ${availability.status === 'limited' ? 'bg-yellow-100 text-yellow-800' : ''}
                    ${availability.status === 'full' ? 'bg-red-100 text-red-800' : ''}
                    ${availability.status === 'unavailable' ? 'bg-gray-100 text-gray-800' : ''}">
                    ${availability.status || 'available'}
                </span>
            </td>
            <td class="py-3 px-4 text-center">
                <button onclick="editDateAvailability('${dateStr}')" class="text-emerald-600 hover:text-emerald-800 text-sm">
                    <i class="fas fa-edit"></i>
                </button>
            </td>
        `;
        tbody.appendChild(row);
    }
}

function updateAvailabilitySlot(dateStr, slots) {
    if (!availabilityData[dateStr]) {
        availabilityData[dateStr] = {};
    }
    availabilityData[dateStr].available_slots = parseInt(slots);
    
    // Update status based on availability
    if (slots == 0) {
        availabilityData[dateStr].status = 'unavailable';
    } else if (slots < 5) {
        availabilityData[dateStr].status = 'limited';
    } else {
        availabilityData[dateStr].status = 'available';
    }
    
    generateCalendar();
}

function editDateAvailability(dateStr) {
    const availability = availabilityData[dateStr] || { available_slots: 20, price: 0, status: 'available' };
    
    // This would open a modal for detailed editing
    console.log('Edit availability for:', dateStr, availability);
}

function previousMonth() {
    currentMonth.setMonth(currentMonth.getMonth() - 1);
    generateCalendar();
}

function nextMonth() {
    currentMonth.setMonth(currentMonth.getMonth() + 1);
    generateCalendar();
}

function updateSeasonalPricing() {
    const multiplier = parseFloat(document.getElementById('seasonal-multiplier').value);
    // Update pricing based on seasonal multiplier
    console.log('Seasonal multiplier:', multiplier);
}

function updateGroupPricing() {
    const discount = parseInt(document.getElementById('group-discount').value);
    // Update pricing based on group discount
    console.log('Group discount:', discount);
}

function showBulkUpdate() {
    document.getElementById('bulk-update-modal').classList.remove('hidden');
}

function hideBulkUpdate() {
    document.getElementById('bulk-update-modal').classList.add('hidden');
}

function applyBulkUpdate() {
    // Apply bulk update logic
    console.log('Applying bulk update');
    hideBulkUpdate();
}

function exportPricing() {
    // Export pricing data
    console.log('Exporting pricing data');
}

// Helper function for number formatting
function number_format(number, decimals) {
    return number.toLocaleString('en-US', { minimumFractionDigits: decimals, maximumFractionDigits: decimals });
}
</script>
@endsection
