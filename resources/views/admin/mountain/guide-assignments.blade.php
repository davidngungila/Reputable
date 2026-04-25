@extends('layouts.admin')

@section('title', 'Guide Assignments')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Guide Assignments</h1>
            <p class="text-gray-600">Manage guide assignments for mountain expeditions and tours</p>
        </div>
        <div class="flex flex-wrap gap-3 mt-4 lg:mt-0">
            <button onclick="showAssignGuideModal()" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                <i class="fas fa-user-plus mr-2"></i>Assign Guide
            </button>
            <button onclick="viewCalendar()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                <i class="fas fa-calendar mr-2"></i>Calendar View
            </button>
        </div>
    </div>

    <!-- Guide Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-blue-100 rounded-lg">
                    <i class="fas fa-users text-blue-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2 py-1 rounded-full">
                    {{ count($guides) }} Total
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ count($guides) }}</h3>
                <p class="text-sm text-gray-600">Active Guides</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-green-100 rounded-lg">
                    <i class="fas fa-calendar-check text-green-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">
                    This Week
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ $upcomingAssignments->count() ?? 0 }}</h3>
                <p class="text-sm text-gray-600">Upcoming Assignments</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-orange-100 rounded-lg">
                    <i class="fas fa-clock text-orange-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-orange-600 bg-orange-50 px-2 py-1 rounded-full">
                    Today
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">3</h3>
                <p class="text-sm text-gray-600">Active Today</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-purple-100 rounded-lg">
                    <i class="fas fa-star text-purple-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-purple-600 bg-purple-50 px-2 py-1 rounded-full">
                    Top Rated
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">4.8</h3>
                <p class="text-sm text-gray-600">Avg. Rating</p>
            </div>
        </div>
    </div>

    <!-- Search and Filters -->
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6 border border-gray-100">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <input type="text" id="search-guides" placeholder="Search guides..." 
                       onkeyup="filterGuides()"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
            </div>
            <div>
                <select id="specialization-filter" onchange="filterGuides()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">All Specializations</option>
                    <option value="kilimanjaro">Kilimanjaro</option>
                    <option value="meru">Meru</option>
                    <option value="safari">Safari</option>
                    <option value="cultural">Cultural</option>
                </select>
            </div>
            <div>
                <select id="availability-filter" onchange="filterGuides()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">All Availability</option>
                    <option value="available">Available</option>
                    <option value="busy">Busy</option>
                    <option value="off">Off Duty</option>
                </select>
            </div>
            <div>
                <select id="rating-filter" onchange="filterGuides()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">All Ratings</option>
                    <option value="5">5 Stars</option>
                    <option value="4">4+ Stars</option>
                    <option value="3">3+ Stars</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Guides Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6" id="guides-grid">
        @foreach($guides ?? [] as $guide)
        <div class="guide-card bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-shadow" 
             data-specialization="{{ $guide->specialization ?? 'general' }}"
             data-availability="{{ $guide->availability ?? 'available' }}"
             data-rating="{{ $guide->rating ?? 5 }}"
             data-name="{{ strtolower($guide->name) }}">
            
            <!-- Guide Profile -->
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 bg-emerald-500 rounded-full flex items-center justify-center text-white text-xl font-bold">
                            {{ substr($guide->name, 0, 1) }}
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ $guide->name }}</h3>
                            <p class="text-sm text-gray-600">{{ $guide->email }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="flex items-center text-yellow-500 mb-1">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= ($guide->rating ?? 5) ? '' : 'text-gray-300' }} text-sm"></i>
                            @endfor
                        </div>
                        <p class="text-xs text-gray-600">{{ $guide->rating ?? 5 }}.0</p>
                    </div>
                </div>

                <!-- Guide Info -->
                <div class="space-y-3 mb-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Specialization:</span>
                        <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs rounded-full">
                            {{ ucfirst($guide->specialization ?? 'General') }}
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Experience:</span>
                        <span class="text-sm font-medium">{{ $guide->experience ?? 5 }} years</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Languages:</span>
                        <span class="text-sm font-medium">{{ $guide->languages ?? 'English, Swahili' }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Certifications:</span>
                        <span class="text-sm font-medium">{{ $guide->certifications ?? 'Kilimanjaro Guide' }}</span>
                    </div>
                </div>

                <!-- Availability Status -->
                <div class="mb-4">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-medium text-gray-700">Current Status</span>
                        <span class="px-3 py-1 text-xs font-medium rounded-full
                            {{ $guide->availability === 'available' ? 'bg-green-100 text-green-700' : '' }}
                            {{ $guide->availability === 'busy' ? 'bg-orange-100 text-orange-700' : '' }}
                            {{ $guide->availability === 'off' ? 'bg-red-100 text-red-700' : '' }}">
                            {{ ucfirst($guide->availability ?? 'Available') }}
                        </span>
                    </div>
                    
                    <!-- Next Assignment -->
                    @if($guide->next_assignment)
                    <div class="p-3 bg-blue-50 rounded-lg">
                        <p class="text-xs text-blue-600 font-medium mb-1">Next Assignment</p>
                        <p class="text-sm text-blue-900">{{ $guide->next_assignment->tour->name ?? 'Tour' }}</p>
                        <p class="text-xs text-blue-700">{{ $guide->next_assignment->date->format('M d, Y') }}</p>
                    </div>
                    @endif
                </div>

                <!-- Recent Assignments -->
                @if(!empty($guide->assignments) && count($guide->assignments) > 0)
                <div class="mb-4">
                    <p class="text-sm font-medium text-gray-700 mb-2">Recent Assignments</p>
                    <div class="space-y-2">
                        @foreach(array_slice($guide->assignments, 0, 2) as $assignment)
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600">{{ $assignment->tour->name ?? 'Tour' }}</span>
                            <span class="text-gray-500">{{ $assignment->date->format('M d') }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Actions -->
                <div class="flex gap-2">
                    <button onclick="viewGuide({{ $guide->id }})" class="flex-1 px-3 py-2 bg-emerald-100 text-emerald-700 rounded-lg hover:bg-emerald-200 transition-colors text-sm font-medium">
                        <i class="fas fa-eye mr-1"></i>View
                    </button>
                    <button onclick="assignGuide({{ $guide->id }})" class="flex-1 px-3 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors text-sm font-medium">
                        <i class="fas fa-user-plus mr-1"></i>Assign
                    </button>
                    <button onclick="editGuide({{ $guide->id }})" class="px-3 py-2 bg-purple-100 text-purple-700 rounded-lg hover:bg-purple-200 transition-colors text-sm font-medium">
                        <i class="fas fa-edit"></i>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if(empty($guides ?? []))
    <div class="bg-white rounded-xl shadow-sm p-12 text-center border border-gray-100">
        <i class="fas fa-users text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">No Guides Found</h3>
        <p class="text-gray-600 mb-6">Add guides to start managing assignments</p>
        <button onclick="showAddGuideModal()" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
            <i class="fas fa-plus mr-2"></i>Add Guide
        </button>
    </div>
    @endif
</div>

<!-- Assign Guide Modal -->
<div id="assign-guide-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl p-6 max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-semibold text-gray-900">Assign Guide</h3>
            <button onclick="hideAssignGuideModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <form id="assign-guide-form" onsubmit="saveGuideAssignment(event)" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Guide *</label>
                    <select id="guide-id" name="guide_id" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">Select Guide</option>
                        @foreach($guides ?? [] as $guide)
                        <option value="{{ $guide->id }}">{{ $guide->name }} - {{ ucfirst($guide->specialization ?? 'General') }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tour *</label>
                    <select id="tour-id" name="tour_id" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">Select Tour</option>
                        @foreach(\App\Models\Tour::all() as $tour)
                        <option value="{{ $tour->id }}">{{ $tour->name }} - {{ $tour->duration_days }} days</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Assignment Date *</label>
                    <input type="date" id="assignment-date" name="assignment_date" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Booking (Optional)</label>
                    <select id="booking-id" name="booking_id"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">Select Booking</option>
                        @foreach(\App\Models\Booking::all() as $booking)
                        <option value="{{ $booking->id }}">{{ $booking->customer_name ?? 'Customer' }} - {{ $booking->tour->name ?? 'Tour' }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Assignment Notes</label>
                <textarea id="assignment-notes" name="notes" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                          placeholder="Special requirements, client preferences, etc..."></textarea>
            </div>

            <div class="flex justify-end gap-4">
                <button type="button" onclick="hideAssignGuideModal()" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                    Cancel
                </button>
                <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                    <i class="fas fa-user-plus mr-2"></i>Assign Guide
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Guide Details Modal -->
<div id="guide-details-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl p-6 max-w-4xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-semibold text-gray-900">Guide Details</h3>
            <button onclick="hideGuideDetailsModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <div id="guide-details-content">
            <!-- Guide details will be loaded here -->
        </div>
    </div>
</div>

<script>
function showAssignGuideModal() {
    document.getElementById('assign-guide-form').reset();
    document.getElementById('assign-guide-modal').classList.remove('hidden');
}

function hideAssignGuideModal() {
    document.getElementById('assign-guide-modal').classList.add('hidden');
}

function saveGuideAssignment(event) {
    event.preventDefault();
    
    const formData = new FormData(event.target);
    
    fetch('{{ route("admin.mountain.guide-assignments.assign") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            hideAssignGuideModal();
            location.reload();
        } else {
            alert('Error assigning guide: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error assigning guide');
    });
}

function viewGuide(id) {
    fetch(`/api/guides/${id}`)
        .then(response => response.json())
        .then(data => {
            const content = document.getElementById('guide-details-content');
            content.innerHTML = `
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="md:col-span-1">
                        <div class="text-center">
                            <div class="w-32 h-32 bg-emerald-500 rounded-full flex items-center justify-center text-white text-4xl font-bold mx-auto mb-4">
                                ${data.name.charAt(0)}
                            </div>
                            <h4 class="text-xl font-semibold text-gray-900 mb-2">${data.name}</h4>
                            <p class="text-gray-600 mb-4">${data.email}</p>
                            <div class="flex justify-center items-center text-yellow-500 mb-4">
                                ${Array(5).fill(0).map((_, i) => 
                                    `<i class="fas fa-star ${i < (data.rating || 5) ? '' : 'text-gray-300'}"></i>`
                                ).join('')}
                                <span class="ml-2 text-gray-600">${data.rating || 5}.0</span>
                            </div>
                            <div class="space-y-2 text-left">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Phone:</span>
                                    <span class="font-medium">${data.phone || 'N/A'}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Experience:</span>
                                    <span class="font-medium">${data.experience || 5} years</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Status:</span>
                                    <span class="px-2 py-1 text-xs font-medium rounded-full
                                        ${data.availability === 'available' ? 'bg-green-100 text-green-700' : ''}
                                        ${data.availability === 'busy' ? 'bg-orange-100 text-orange-700' : ''}
                                        ${data.availability === 'off' ? 'bg-red-100 text-red-700' : ''}">
                                        ${ucfirst(data.availability || 'Available')}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="md:col-span-2 space-y-6">
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-3">Professional Information</h4>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-600 mb-1">Specialization</p>
                                    <p class="font-medium">${ucfirst(data.specialization || 'General')}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600 mb-1">Languages</p>
                                    <p class="font-medium">${data.languages || 'English, Swahili'}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600 mb-1">Certifications</p>
                                    <p class="font-medium">${data.certifications || 'Kilimanjaro Guide'}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600 mb-1">Total Assignments</p>
                                    <p class="font-medium">${data.assignments_count || 0}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-3">Recent Assignments</h4>
                            <div class="space-y-2">
                                ${(data.assignments || []).slice(0, 5).map(assignment => `
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                        <div>
                                            <p class="font-medium text-gray-900">${assignment.tour?.name || 'Tour'}</p>
                                            <p class="text-sm text-gray-600">${assignment.date}</p>
                                        </div>
                                        <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs rounded-full">
                                            ${assignment.status || 'Completed'}
                                        </span>
                                    </div>
                                `).join('') || '<p class="text-gray-500">No recent assignments</p>'}
                            </div>
                        </div>
                        
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-3">Performance Metrics</h4>
                            <div class="grid grid-cols-3 gap-4">
                                <div class="text-center p-3 bg-emerald-50 rounded-lg">
                                    <p class="text-2xl font-bold text-emerald-600">98%</p>
                                    <p class="text-xs text-emerald-700">Success Rate</p>
                                </div>
                                <div class="text-center p-3 bg-blue-50 rounded-lg">
                                    <p class="text-2xl font-bold text-blue-600">4.9</p>
                                    <p class="text-xs text-blue-700">Client Rating</p>
                                </div>
                                <div class="text-center p-3 bg-purple-50 rounded-lg">
                                    <p class="text-2xl font-bold text-purple-600">100%</p>
                                    <p class="text-xs text-purple-700">On Time</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            document.getElementById('guide-details-modal').classList.remove('hidden');
        })
        .catch(error => console.error('Error loading guide details:', error));
}

function hideGuideDetailsModal() {
    document.getElementById('guide-details-modal').classList.add('hidden');
}

function assignGuide(id) {
    document.getElementById('guide-id').value = id;
    showAssignGuideModal();
}

function editGuide(id) {
    // Edit guide functionality
    console.log('Edit guide:', id);
}

function filterGuides() {
    const searchTerm = document.getElementById('search-guides').value.toLowerCase();
    const specializationFilter = document.getElementById('specialization-filter').value;
    const availabilityFilter = document.getElementById('availability-filter').value;
    const ratingFilter = document.getElementById('rating-filter').value;
    
    const cards = document.querySelectorAll('.guide-card');
    
    cards.forEach(card => {
        const name = card.dataset.name;
        const specialization = card.dataset.specialization;
        const availability = card.dataset.availability;
        const rating = parseInt(card.dataset.rating);
        
        const matchesSearch = !searchTerm || name.includes(searchTerm);
        const matchesSpecialization = !specializationFilter || specialization === specializationFilter;
        const matchesAvailability = !availabilityFilter || availability === availabilityFilter;
        const matchesRating = !ratingFilter || rating >= parseInt(ratingFilter);
        
        card.style.display = matchesSearch && matchesSpecialization && matchesAvailability && matchesRating ? 'block' : 'none';
    });
}

function viewCalendar() {
    // View calendar functionality
    console.log('View calendar');
}
</script>
@endsection
