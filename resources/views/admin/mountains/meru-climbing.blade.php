@extends('layouts.admin')

@section('title', 'Meru Climbing - Admin')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Mount Meru Climbing Management</h1>
        <div>
            <a href="{{ route('mountains.admin.show', 'meru') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-2"></i>Back to Meru
            </a>
        </div>
    </div>

    <!-- Mountain Overview -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="card-title h4">{{ $meru->name }}</h2>
                            <p class="text-muted">{{ $meru->height }} {{ $meru->height_unit }} • {{ $meru->location }}</p>
                            <p class="mb-0">{{ Str::limit($meru->description, 200) }}</p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <div class="d-grid gap-2">
                                <div class="badge bg-warning fs-6">{{ $meru->difficulty_level }}</div>
                                <div class="badge bg-info fs-6">{{ $meru->duration_days }} days</div>
                                <div class="badge bg-primary fs-6">From ${{ number_format($meru->price_from, 2) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Climbing Information -->
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Climbing Information</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h6 class="text-muted mb-2">General Information</h6>
                        <p>{{ $meru->trekking_info }}</p>
                    </div>

                    <div class="mb-4">
                        <h6 class="text-muted mb-2">Weather Information</h6>
                        <p>{{ $meru->weather_info }}</p>
                    </div>

                    <div>
                        <h6 class="text-muted mb-2">Best Season</h6>
                        <div class="badge bg-success me-2">{{ $meru->best_season }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Quick Stats</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center mb-3">
                        <div class="col-6">
                            <div class="fw-bold text-primary">{{ $meru->height }}m</div>
                            <small class="text-muted">Height</small>
                        </div>
                        <div class="col-6">
                            <div class="fw-bold text-warning">{{ $meru->duration_days }}</div>
                            <small class="text-muted">Days</small>
                        </div>
                    </div>
                    <div class="row text-center mb-3">
                        <div class="col-6">
                            <div class="fw-bold text-success">{{ $meru->difficulty_level }}</div>
                            <small class="text-muted">Difficulty</small>
                        </div>
                        <div class="col-6">
                            <div class="fw-bold text-info">${{ number_format($meru->price_from, 2) }}</div>
                            <small class="text-muted">From</small>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-outline-primary" onclick="editClimbingInfo()">
                            <i class="fas fa-edit me-2"></i>Edit Info
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Routes Management -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Climbing Routes ({{ count($meru->routes) }})</h5>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRouteModal">
                        <i class="fas fa-plus me-2"></i>Add New Route
                    </button>
                </div>
                <div class="card-body">
                    @if($meru->routes && count($meru->routes) > 0)
                    <div class="row">
                        @foreach($meru->routes as $index => $route)
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-header bg-gradient text-white" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                                    <h6 class="card-title mb-1">{{ $route['name'] }}</h6>
                                    <small class="opacity-75">{{ $route['duration'] }} • {{ $route['difficulty'] }}</small>
                                </div>
                                <div class="card-body">
                                    <p class="card-text text-muted small">{{ Str::limit($route['description'], 120) }}</p>
                                    
                                    <div class="row text-center mb-3">
                                        <div class="col-4">
                                            <div class="fw-bold text-success">{{ $route['success_rate'] }}</div>
                                            <small class="text-muted">Success Rate</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="fw-bold text-primary">${{ number_format($route['price'], 2) }}</div>
                                            <small class="text-muted">Price</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="fw-bold text-info">{{ count($route['highlights'] ?? []) }}</div>
                                            <small class="text-muted">Highlights</small>
                                        </div>
                                    </div>

                                    @if(!empty($route['highlights']))
                                    <div class="mb-3">
                                        <small class="text-muted">Highlights:</small>
                                        <div class="mt-1">
                                            @foreach(array_slice($route['highlights'], 0, 2) as $highlight)
                                            <span class="badge bg-light text-dark me-1 mb-1">{{ $highlight }}</span>
                                            @endforeach
                                            @if(count($route['highlights']) > 2)
                                            <span class="badge bg-secondary">+{{ count($route['highlights']) - 2 }} more</span>
                                            @endif
                                        </div>
                                    </div>
                                    @endif

                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-outline-primary flex-fill" onclick="editRoute({{ $index }})">
                                            <i class="fas fa-edit me-1"></i>Edit
                                        </button>
                                        <button class="btn btn-sm btn-outline-success flex-fill" onclick="viewRouteDetails({{ $index }})">
                                            <i class="fas fa-eye me-1"></i>View
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" onclick="deleteRoute({{ $index }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-5">
                        <div class="text-muted">
                            <i class="fas fa-mountain fa-3x mb-3"></i>
                            <h5>No Climbing Routes Available</h5>
                            <p>Start by adding your first Mount Meru climbing route.</p>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRouteModal">
                                <i class="fas fa-plus me-2"></i>Add Your First Route
                            </button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Equipment Guide -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Equipment Guide</h5>
                    <button class="btn btn-outline-primary" onclick="editEquipmentGuide()">
                        <i class="fas fa-edit me-2"></i>Edit Equipment
                    </button>
                </div>
                <div class="card-body">
                    @if($meru->equipment_guide)
                    <div class="row">
                        @foreach(['clothing' => 'Clothing', 'gear' => 'Essential Gear', 'optional' => 'Optional Items'] as $key => $title)
                        @if(!empty($meru->equipment_guide[$key]))
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h6 class="mb-0">{{ $title }}</h6>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled mb-0">
                                        @foreach($meru->equipment_guide[$key] as $item)
                                        <li class="mb-2">
                                            <i class="fas fa-check text-success me-2"></i>
                                            <small>{{ $item }}</small>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-4">
                        <p class="text-muted">No equipment guide available. Click "Edit Equipment" to add equipment information.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Expert Guides -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Expert Guides ({{ count($meru->expert_guides) }})</h5>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGuideModal">
                        <i class="fas fa-user-plus me-2"></i>Add Guide
                    </button>
                </div>
                <div class="card-body">
                    @if($meru->expert_guides && count($meru->expert_guides) > 0)
                    <div class="row">
                        @foreach($meru->expert_guides as $index => $guide)
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-start mb-3">
                                        <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-center me-3" style="width: 50px; height: 50px;">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">{{ $guide['name'] }}</h6>
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="text-warning me-2">
                                                    @for($i = 0; $i < floor($guide['rating']); $i++)
                                                    <i class="fas fa-star"></i>
                                                    @endfor
                                                </div>
                                                <small class="text-muted">{{ $guide['rating'] }}/5.0</small>
                                            </div>
                                            <small class="text-muted">{{ $guide['experience'] }}</small>
                                        </div>
                                    </div>

                                    @if(!empty($guide['specialties']))
                                    <div class="mb-2">
                                        <small class="text-muted">Specialties:</small>
                                        <div>
                                            @foreach($guide['specialties'] as $specialty)
                                            <span class="badge bg-primary me-1 mb-1">{{ $specialty }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif

                                    @if(!empty($guide['languages']))
                                    <div class="mb-2">
                                        <small class="text-muted">Languages:</small>
                                        <div>
                                            @foreach($guide['languages'] as $language)
                                            <span class="badge bg-success me-1 mb-1">{{ $language }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif

                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-outline-primary flex-fill" onclick="editGuide({{ $index }})">
                                            <i class="fas fa-edit me-1"></i>Edit
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" onclick="deleteGuide({{ $index }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-5">
                        <div class="text-muted">
                            <i class="fas fa-users fa-3x mb-3"></i>
                            <h5>No Expert Guides Available</h5>
                            <p>Add expert guides for Mount Meru climbing expeditions.</p>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGuideModal">
                                <i class="fas fa-user-plus me-2"></i>Add Your First Guide
                            </button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add/Edit Route Modal -->
<div class="modal fade" id="routeModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="routeModalTitle">Add New Route</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="routeForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Route Name</label>
                                <input type="text" class="form-control" id="routeName" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Duration</label>
                                <input type="text" class="form-control" id="routeDuration" placeholder="e.g., 4 days" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Difficulty</label>
                                <select class="form-select" id="routeDifficulty" required>
                                    <option value="">Select Difficulty</option>
                                    <option value="Moderate">Moderate</option>
                                    <option value="Strenuous">Strenuous</option>
                                    <option value="Very Strenuous">Very Strenuous</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Success Rate</label>
                                <input type="text" class="form-control" id="routeSuccessRate" placeholder="e.g., 90%" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Price From ($)</label>
                                <input type="number" class="form-control" id="routePrice" step="0.01" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Number of Highlights</label>
                                <input type="number" class="form-control" id="highlightsCount" min="1" value="3" onchange="updateHighlightsFields()">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" id="routeDescription" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Highlights</label>
                        <div id="highlightsContainer">
                            <!-- Highlights will be dynamically added here -->
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveRoute()">Save Route</button>
            </div>
        </div>
    </div>
</div>

<!-- Add/Edit Guide Modal -->
<div class="modal fade" id="guideModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="guideModalTitle">Add New Guide</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="guideForm">
                    <div class="mb-3">
                        <label class="form-label">Guide Name</label>
                        <input type="text" class="form-control" id="guideName" required>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Experience</label>
                                <input type="text" class="form-control" id="guideExperience" placeholder="e.g., 10+ years" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Rating</label>
                                <input type="number" class="form-control" id="guideRating" step="0.1" min="1" max="5" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Specialties (comma-separated)</label>
                        <input type="text" class="form-control" id="guideSpecialties" placeholder="e.g., Mount Meru, Wildlife Guide">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Languages (comma-separated)</label>
                        <input type="text" class="form-control" id="guideLanguages" placeholder="e.g., English, Swahili">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Certifications (comma-separated)</label>
                        <input type="text" class="form-control" id="guideCertifications" placeholder="e.g., Mountain Guide, First Aid">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveGuide()">Save Guide</button>
            </div>
        </div>
    </div>
</div>

<script>
let routes = @json($meru->routes);
let guides = @json($meru->expert_guides);
let editingRouteIndex = -1;
let editingGuideIndex = -1;

function updateHighlightsFields() {
    const count = document.getElementById('highlightsCount').value;
    const container = document.getElementById('highlightsContainer');
    container.innerHTML = '';
    
    for (let i = 0; i < count; i++) {
        const div = document.createElement('div');
        div.className = 'mb-2';
        div.innerHTML = `
            <input type="text" class="form-control" placeholder="Highlight ${i + 1}" id="highlight${i}">
        `;
        container.appendChild(div);
    }
}

function editRoute(index) {
    editingRouteIndex = index;
    const route = routes[index];
    
    document.getElementById('routeModalTitle').textContent = 'Edit Route';
    document.getElementById('routeName').value = route.name;
    document.getElementById('routeDuration').value = route.duration;
    document.getElementById('routeDifficulty').value = route.difficulty;
    document.getElementById('routeSuccessRate').value = route.success_rate;
    document.getElementById('routePrice').value = route.price;
    document.getElementById('routeDescription').value = route.description;
    
    const highlightsCount = route.highlights ? route.highlights.length : 3;
    document.getElementById('highlightsCount').value = highlightsCount;
    updateHighlightsFields();
    
    if (route.highlights) {
        route.highlights.forEach((highlight, i) => {
            const input = document.getElementById(`highlight${i}`);
            if (input) input.value = highlight;
        });
    }
    
    new bootstrap.Modal(document.getElementById('routeModal')).show();
}

function editGuide(index) {
    editingGuideIndex = index;
    const guide = guides[index];
    
    document.getElementById('guideModalTitle').textContent = 'Edit Guide';
    document.getElementById('guideName').value = guide.name;
    document.getElementById('guideExperience').value = guide.experience;
    document.getElementById('guideRating').value = guide.rating;
    document.getElementById('guideSpecialties').value = (guide.specialties || []).join(', ');
    document.getElementById('guideLanguages').value = (guide.languages || []).join(', ');
    document.getElementById('guideCertifications').value = (guide.certifications || []).join(', ');
    
    new bootstrap.Modal(document.getElementById('guideModal')).show();
}

function viewRouteDetails(index) {
    const route = routes[index];
    
    let highlightsHtml = '';
    if (route.highlights) {
        highlightsHtml = route.highlights.map(h => `<span class="badge bg-primary me-1">${h}</span>`).join('');
    }
    
    document.getElementById('viewRouteModalTitle').textContent = route.name;
    document.getElementById('viewRouteModalBody').innerHTML = `
        <div class="row">
            <div class="col-md-6">
                <p><strong>Duration:</strong> ${route.duration}</p>
                <p><strong>Difficulty:</strong> ${route.difficulty}</p>
                <p><strong>Success Rate:</strong> ${route.success_rate}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Price:</strong> $${route.price}</p>
                <p><strong>Highlights:</strong></p>
                <div>${highlightsHtml}</div>
            </div>
        </div>
        <div class="mt-3">
            <p><strong>Description:</strong></p>
            <p>${route.description}</p>
        </div>
    `;
    
    new bootstrap.Modal(document.getElementById('viewRouteModal')).show();
}

function deleteRoute(index) {
    if (confirm('Are you sure you want to delete this route?')) {
        routes.splice(index, 1);
        location.reload();
    }
}

function deleteGuide(index) {
    if (confirm('Are you sure you want to delete this guide?')) {
        guides.splice(index, 1);
        location.reload();
    }
}

function saveRoute() {
    const highlights = [];
    const count = document.getElementById('highlightsCount').value;
    
    for (let i = 0; i < count; i++) {
        const input = document.getElementById(`highlight${i}`);
        if (input && input.value.trim()) {
            highlights.push(input.value.trim());
        }
    }
    
    const routeData = {
        name: document.getElementById('routeName').value,
        duration: document.getElementById('routeDuration').value,
        difficulty: document.getElementById('routeDifficulty').value,
        success_rate: document.getElementById('routeSuccessRate').value,
        price: parseFloat(document.getElementById('routePrice').value),
        description: document.getElementById('routeDescription').value,
        highlights: highlights
    };
    
    if (editingRouteIndex >= 0) {
        routes[editingRouteIndex] = routeData;
    } else {
        routes.push(routeData);
    }
    
    console.log('Saving route:', routeData);
    bootstrap.Modal.getInstance(document.getElementById('routeModal')).hide();
    location.reload();
}

function saveGuide() {
    const guideData = {
        name: document.getElementById('guideName').value,
        experience: document.getElementById('guideExperience').value,
        rating: parseFloat(document.getElementById('guideRating').value),
        specialties: document.getElementById('guideSpecialties').value.split(',').map(s => s.trim()).filter(s => s),
        languages: document.getElementById('guideLanguages').value.split(',').map(s => s.trim()).filter(s => s),
        certifications: document.getElementById('guideCertifications').value.split(',').map(s => s.trim()).filter(s => s)
    };
    
    if (editingGuideIndex >= 0) {
        guides[editingGuideIndex] = guideData;
    } else {
        guides.push(guideData);
    }
    
    console.log('Saving guide:', guideData);
    bootstrap.Modal.getInstance(document.getElementById('guideModal')).hide();
    location.reload();
}

function editClimbingInfo() {
    alert('In a real application, this would open an edit form for climbing information');
}

function editEquipmentGuide() {
    alert('In a real application, this would open an edit form for equipment guide');
}

// Initialize highlights fields on page load
document.addEventListener('DOMContentLoaded', function() {
    updateHighlightsFields();
});
</script>
@endsection
