@extends('layouts.admin')

@section('title', 'Kilimanjaro Routes - Admin')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Kilimanjaro Routes Management</h1>
        <div>
            <a href="{{ route('mountains.admin.show', 'kilimanjaro') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-2"></i>Back to Kilimanjaro
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
                            <h2 class="card-title h4">{{ $kilimanjaro->name }}</h2>
                            <p class="text-muted">{{ $kilimanjaro->height }} {{ $kilimanjaro->height_unit }} • {{ $kilimanjaro->location }}</p>
                            <p class="mb-0">{{ Str::limit($kilimanjaro->description, 200) }}</p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <div class="d-grid gap-2">
                                <div class="badge bg-success fs-6">{{ $kilimanjaro->difficulty_level }}</div>
                                <div class="badge bg-info fs-6">{{ $kilimanjaro->duration_days }} days</div>
                                <div class="badge bg-primary fs-6">From ${{ number_format($kilimanjaro->price_from, 2) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Routes Management -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Available Routes ({{ count($kilimanjaro->routes) }})</h5>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRouteModal">
                        <i class="fas fa-plus me-2"></i>Add New Route
                    </button>
                </div>
                <div class="card-body">
                    @if($kilimanjaro->routes && count($kilimanjaro->routes) > 0)
                    <div class="row">
                        @foreach($kilimanjaro->routes as $index => $route)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100">
                                <div class="card-header bg-gradient text-white" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                    <h6 class="card-title mb-1">{{ $route['name'] }}</h6>
                                    <small class="opacity-75">{{ $route['duration'] }} • {{ $route['difficulty'] }}</small>
                                </div>
                                <div class="card-body">
                                    <p class="card-text text-muted small">{{ Str::limit($route['description'], 100) }}</p>
                                    
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
                            <h5>No Routes Available</h5>
                            <p>Start by adding your first Kilimanjaro climbing route.</p>
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

    <!-- Route Statistics -->
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title">{{ count($kilimanjaro->routes) }}</h4>
                            <p class="card-text">Total Routes</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-route fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title">
                                @if($kilimanjaro->routes)
                                    {{ collect($kilimanjaro->routes)->avg(fn($r) => (float) str_replace('%', '', $r['success_rate'])) }}%
                                @else
                                    0%
                                @endif
                            </h4>
                            <p class="card-text">Avg Success Rate</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-chart-line fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title">
                                @if($kilimanjaro->routes)
                                    ${{ number_format(collect($kilimanjaro->routes)->avg('price'), 2) }}
                                @else
                                    $0
                                @endif
                            </h4>
                            <p class="card-text">Avg Price</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-dollar-sign fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title">
                                @if($kilimanjaro->routes)
                                    {{ collect($kilimanjaro->routes)->avg(fn($r) => preg_replace('/[^0-9]/', '', $r['duration'])) }} days
                                @else
                                    0 days
                                @endif
                            </h4>
                            <p class="card-text">Avg Duration</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-clock fa-2x opacity-75"></i>
                        </div>
                    </div>
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
                                <input type="text" class="form-control" id="routeDuration" placeholder="e.g., 6-7 days" required>
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

<!-- View Route Details Modal -->
<div class="modal fade" id="viewRouteModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewRouteModalTitle">Route Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="viewRouteModalBody">
                <!-- Route details will be displayed here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
let routes = @json($kilimanjaro->routes);
let editingIndex = -1;

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
    editingIndex = index;
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
        // In a real application, you would send this to the server
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
    
    if (editingIndex >= 0) {
        routes[editingIndex] = routeData;
    } else {
        routes.push(routeData);
    }
    
    // In a real application, you would send this to the server
    console.log('Saving route:', routeData);
    
    bootstrap.Modal.getInstance(document.getElementById('routeModal')).hide();
    location.reload();
}

// Initialize highlights fields on page load
document.addEventListener('DOMContentLoaded', function() {
    updateHighlightsFields();
});
</script>
@endsection
