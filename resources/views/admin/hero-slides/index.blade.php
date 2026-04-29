@extends('layouts.admin')

@section('title', 'Hero Slides Management')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Hero Slides Management</h1>
        <div>
            <a href="{{ route('admin.hero-slides.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add New Slide
            </a>
        </div>
    </div>

    <!-- Slides by Position -->
    @foreach(['home' => 'Home Page', 'mountains' => 'Mountain Pages', 'about' => 'About Page', 'contact' => 'Contact Page', 'tours' => 'Tours Page', 'destinations' => 'Destinations Page'] as $position => $positionLabel)
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ $positionLabel }} Slides</h5>
                    <span class="badge bg-primary">{{ $slides->where('position', $position)->count() }} slides</span>
                </div>
                <div class="card-body">
                    @if($slides->where('position', $position)->count() > 0)
                    <div class="row" id="slides-{{ $position }}">
                        @foreach($slides->where('position', $position)->sortBy('sort_order') as $slide)
                        <div class="col-md-6 col-lg-4 mb-4" data-slide-id="{{ $slide->id }}">
                            <div class="card h-100 {{ !$slide->is_active ? 'opacity-50' : '' }}">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <span class="badge {{ $slide->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $slide->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('admin.hero-slides.edit', $slide->id) }}">
                                                    <i class="fas fa-edit me-2"></i>Edit
                                                </a>
                                            </li>
                                            <li>
                                                <button class="dropdown-item" onclick="toggleStatus({{ $slide->id }})">
                                                    <i class="fas fa-power-off me-2"></i>{{ $slide->is_active ? 'Deactivate' : 'Activate' }}
                                                </button>
                                            </li>
                                            <li>
                                                <button class="dropdown-item text-danger" onclick="deleteSlide({{ $slide->id }})">
                                                    <i class="fas fa-trash me-2"></i>Delete
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <img src="{{ $slide->image_url }}" alt="{{ $slide->title }}" class="img-fluid rounded" style="height: 150px; object-fit: cover; width: 100%;">
                                    </div>
                                    <h6 class="card-title">{{ $slide->title }}</h6>
                                    @if($slide->subtitle)
                                    <p class="card-text text-muted small">{{ Str::limit($slide->subtitle, 80) }}</p>
                                    @endif
                                    
                                    <div class="mb-2">
                                        @if($slide->button_text && $slide->button_url)
                                        <span class="badge bg-info me-2">{{ $slide->button_text }}</span>
                                        @endif
                                        <span class="badge bg-secondary">Order: {{ $slide->sort_order }}</span>
                                    </div>
                                </div>
                                <div class="card-footer bg-light">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">Sort Order: {{ $slide->sort_order }}</small>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-secondary" onclick="moveSlide({{ $slide->id }}, 'up')">
                                                <i class="fas fa-arrow-up"></i>
                                            </button>
                                            <button class="btn btn-outline-secondary" onclick="moveSlide({{ $slide->id }}, 'down')">
                                                <i class="fas fa-arrow-down"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-4">
                        <div class="text-muted">
                            <i class="fas fa-image fa-3x mb-3"></i>
                            <h6>No slides for {{ $positionLabel }}</h6>
                            <p class="small">Add your first slide for this position.</p>
                            <a href="{{ route('admin.hero-slides.create') }}?position={{ $position }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-plus me-2"></i>Add Slide
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Statistics -->
    <div class="row">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title">{{ $slides->count() }}</h4>
                            <p class="card-text">Total Slides</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-images fa-2x opacity-75"></i>
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
                            <h4 class="card-title">{{ $slides->where('is_active', true)->count() }}</h4>
                            <p class="card-text">Active Slides</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-eye fa-2x opacity-75"></i>
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
                            <h4 class="card-title">{{ $slides->where('is_active', false)->count() }}</h4>
                            <p class="card-text">Inactive Slides</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-eye-slash fa-2x opacity-75"></i>
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
                            <h4 class="card-title">{{ $slides->groupBy('position')->count() }}</h4>
                            <p class="card-text">Positions Used</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-layer-group fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function toggleStatus(slideId) {
    fetch(`/admin/hero-slides/${slideId}/toggle-status`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    })
    .catch(error => console.error('Error:', error));
}

function deleteSlide(slideId) {
    if (confirm('Are you sure you want to delete this hero slide?')) {
        fetch(`/admin/hero-slides/${slideId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {
            if (response.ok) {
                location.reload();
            }
        })
        .catch(error => console.error('Error:', error));
    }
}

function moveSlide(slideId, direction) {
    const slideElement = document.querySelector(`[data-slide-id="${slideId}"]`);
    const container = slideElement.parentElement;
    const slides = Array.from(container.children);
    const currentIndex = slides.findIndex(el => el.dataset.slideId == slideId);
    
    let newIndex;
    if (direction === 'up' && currentIndex > 0) {
        newIndex = currentIndex - 1;
    } else if (direction === 'down' && currentIndex < slides.length - 1) {
        newIndex = currentIndex + 1;
    } else {
        return;
    }
    
    // Swap elements
    const temp = slides[currentIndex];
    slides[currentIndex] = slides[newIndex];
    slides[newIndex] = temp;
    
    // Reorder DOM
    slides.forEach((slide, index) => {
        container.appendChild(slide);
    });
    
    // Update sort order
    const order = slides.map(slide => slide.dataset.slideId);
    updateSlideOrder(order);
}

function updateSlideOrder(order) {
    fetch('/admin/hero-slides/reorder', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ order: order })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update sort order numbers in the UI
            data.order.forEach((slideId, index) => {
                const slideElement = document.querySelector(`[data-slide-id="${slideId}"]`);
                if (slideElement) {
                    const orderElement = slideElement.querySelector('.card-footer small');
                    if (orderElement) {
                        orderElement.textContent = `Sort Order: ${index}`;
                    }
                }
            });
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>
@endsection
