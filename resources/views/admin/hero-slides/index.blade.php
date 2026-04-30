@extends('layouts.admin')

@section('title', 'Hero Slides Management')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header with Statistics -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Hero Slides Management</h1>
            <p class="text-gray-600">Manage and organize hero slides across different page positions</p>
        </div>
        <div class="flex gap-3 mt-4 lg:mt-0">
            <a href="{{ route('admin.hero-slides.create') }}" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-plus mr-2"></i>Add New Slide
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Slides</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ $slides->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-images text-emerald-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Active Slides</p>
                    <p class="text-2xl font-bold text-green-600 mt-1">
                        {{ $slides->where('is_active', true)->count() }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-eye text-green-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Inactive Slides</p>
                    <p class="text-2xl font-bold text-gray-600 mt-1">
                        {{ $slides->where('is_active', false)->count() }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-eye-slash text-gray-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Positions</p>
                    <p class="text-2xl font-bold text-purple-600 mt-1">
                        {{ $slides->pluck('position')->unique()->count() }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-layout text-purple-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Advanced Filters -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
        <div class="flex items-center mb-4">
            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                <i class="ph-bold ph-funnel text-purple-600 text-xl"></i>
            </div>
            <h2 class="text-lg font-bold text-gray-900">Advanced Filters</h2>
        </div>
        
        <form method="GET" action="{{ route('admin.hero-slides.index') }}" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <label for="position" class="block text-sm font-semibold text-gray-700 mb-2">Position</label>
                    <select name="position" id="position" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">All Positions</option>
                        @foreach(['home' => 'Home Page', 'mountains' => 'Mountain Pages', 'about' => 'About Page', 'contact' => 'Contact Page', 'tours' => 'Tours Page', 'destinations' => 'Destinations Page'] as $position => $label)
                            <option value="{{ $position }}" {{ request('position') == $position ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                    <select name="status" id="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">All Status</option>
                        <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>👁️ Active</option>
                        <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>🙈 Inactive</option>
                    </select>
                </div>
                
                <div>
                    <label for="search" class="block text-sm font-semibold text-gray-700 mb-2">Search</label>
                    <input type="text" name="search" id="search" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           value="{{ request('search') }}" placeholder="Title or subtitle">
                </div>
                
                <div>
                    <label for="sort" class="block text-sm font-semibold text-gray-700 mb-2">Sort By</label>
                    <select name="sort" id="sort" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="sort_order">Sort Order</option>
                        <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Created Date</option>
                        <option value="updated_at" {{ request('sort') == 'updated_at' ? 'selected' : '' }}>Updated Date</option>
                        <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>Title</option>
                    </select>
                </div>
            </div>
            
            <div class="flex flex-wrap gap-3">
                <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors font-medium">
                    <i class="ph-bold ph-funnel mr-2"></i>Apply Filters
                </button>
                <a href="{{ route('admin.hero-slides.index') }}" class="px-6 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors font-medium">
                    <i class="ph-bold ph-x mr-2"></i>Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Bulk Actions -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input type="checkbox" id="selectAll" class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                <label for="selectAll" class="ml-2 text-sm font-medium text-gray-700">Select All</label>
            </div>
            <div class="flex gap-3">
                <button onclick="bulkActivate()" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors text-sm font-medium disabled:opacity-50" id="bulkActivate" disabled>
                    <i class="ph-bold ph-eye mr-2"></i>Activate Selected
                </button>
                <button onclick="bulkDeactivate()" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors text-sm font-medium disabled:opacity-50" id="bulkDeactivate" disabled>
                    <i class="ph-bold ph-eye-slash mr-2"></i>Deactivate Selected
                </button>
                <button onclick="bulkDelete()" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors text-sm font-medium disabled:opacity-50" id="bulkDelete" disabled>
                    <i class="ph-bold ph-trash mr-2"></i>Delete Selected
                </button>
            </div>
        </div>
    </div>

    <!-- Slides by Position -->
    @foreach(['home' => 'Home Page', 'mountains' => 'Mountain Pages', 'about' => 'About Page', 'contact' => 'Contact Page', 'tours' => 'Tours Page', 'destinations' => 'Destinations Page'] as $position => $positionLabel)
    @php
        $positionSlides = $slides->where('position', $position);
        if(request('position')) {
            $positionSlides = $positionSlides->where('position', request('position'));
        }
        if(request('status') !== null) {
            $positionSlides = $positionSlides->where('is_active', request('status'));
        }
        if(request('search')) {
            $positionSlides = $positionSlides->filter(function($slide) {
                return str_contains(strtolower($slide->title), strtolower(request('search'))) ||
                       str_contains(strtolower($slide->subtitle ?? ''), strtolower(request('search')));
            });
        }
    @endphp
    @if($positionSlides->count() > 0)
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-6">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-bold text-gray-900">
                    {{ $positionLabel }} 
                    <span class="text-sm font-normal text-gray-500 ml-2">
                        ({{ $positionSlides->count() }} slides)
                    </span>
                </h2>
                <div class="flex items-center gap-4">
                    <button onclick="toggleView('{{ $position }}')" class="px-3 py-1 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm font-medium">
                        <i class="ph-bold ph-layout mr-2"></i>Toggle View
                    </button>
                    <button onclick="reorderSlides('{{ $position }}')" class="px-3 py-1 bg-purple-100 text-purple-700 rounded-lg hover:bg-purple-200 transition-colors text-sm font-medium">
                        <i class="ph-bold ph-arrows-outward-corner mr-2"></i>Reorder
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Grid View -->
        <div class="p-6" id="grid-view-{{ $position }}">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="slides-{{ $position }}">
                @foreach($positionSlides->sortBy('sort_order') as $slide)
                <div class="bg-gray-50 rounded-lg overflow-hidden border border-gray-200 hover:shadow-lg transition-shadow slide-item" data-slide-id="{{ $slide->id }}">
                    <div class="relative">
                        <div class="h-48 bg-cover bg-center" style="background-image: url('{{ $slide->image_url }}');">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                            <div class="absolute top-3 right-3">
                                <input type="checkbox" class="slide-checkbox w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500" value="{{ $slide->id }}">
                            </div>
                            <div class="absolute top-3 left-3">
                                <span class="px-2 py-1 {{ $slide->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }} rounded-full text-xs font-medium">
                                    {{ $slide->is_active ? '👁️ Active' : '🙈 Inactive' }}
                                </span>
                            </div>
                            <div class="absolute bottom-3 left-3 right-3">
                                <div class="text-white">
                                    <h3 class="font-bold text-lg mb-1 line-clamp-2">{{ $slide->title }}</h3>
                                    @if($slide->subtitle)
                                    <p class="text-sm opacity-90 line-clamp-2">{{ $slide->subtitle }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-2">
                                <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">Order: {{ $slide->sort_order }}</span>
                                <span class="text-xs text-gray-500 bg-purple-100 px-2 py-1 rounded">{{ $positionLabel }}</span>
                            </div>
                            <div class="flex gap-1">
                                <button onclick="moveUp({{ $slide->id }}, '{{ $position }}')" class="p-1 text-gray-400 hover:text-emerald-600 transition-colors" title="Move Up">
                                    <i class="ph-bold ph-arrow-up"></i>
                                </button>
                                <button onclick="moveDown({{ $slide->id }}, '{{ $position }}')" class="p-1 text-gray-400 hover:text-emerald-600 transition-colors" title="Move Down">
                                    <i class="ph-bold ph-arrow-down"></i>
                                </button>
                            </div>
                        </div>
                        
                        @if($slide->button_text && $slide->button_url)
                        <div class="mb-3">
                            <div class="text-xs text-gray-500 mb-1">Button:</div>
                            <div class="text-sm text-emerald-600 truncate">{{ $slide->button_text }}</div>
                        </div>
                        @endif
                        
                        <div class="flex gap-2">
                            <a href="{{ route('admin.hero-slides.edit', $slide->id) }}" class="flex-1 px-3 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium text-center">
                                <i class="ph-bold ph-pencil mr-1"></i>Edit
                            </a>
                            <button onclick="toggleStatus({{ $slide->id }})" class="flex-1 px-3 py-2 {{ $slide->is_active ? 'bg-gray-600' : 'bg-green-600' }} text-white rounded-lg hover:opacity-90 transition-opacity text-sm font-medium">
                                <i class="ph-bold {{ $slide->is_active ? 'ph-eye-slash' : 'ph-eye' }} mr-1"></i>{{ $slide->is_active ? 'Hide' : 'Show' }}
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        <!-- Table View (Hidden by default) -->
        <div class="hidden" id="table-view-{{ $position }}">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <input type="checkbox" class="position-select-all w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500" data-position="{{ $position }}">
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preview</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Position</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($positionSlides->sortBy('sort_order') as $slide)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="checkbox" class="slide-checkbox w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500" value="{{ $slide->id }}">
                            </td>
                            <td class="px-6 py-4">
                                <div class="w-20 h-12 bg-cover bg-center rounded" style="background-image: url('{{ $slide->image_url }}');"></div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ Str::limit($slide->title, 40) }}</div>
                                @if($slide->subtitle)
                                <div class="text-xs text-gray-500">{{ Str::limit($slide->subtitle, 30) }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-xs text-gray-500 bg-purple-100 px-2 py-1 rounded">{{ $positionLabel }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-gray-900">{{ $slide->sort_order }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 {{ $slide->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }} rounded-full text-xs font-medium">
                                    {{ $slide->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.hero-slides.edit', $slide->id) }}" class="text-emerald-600 hover:text-emerald-700">
                                        <i class="ph-bold ph-pencil"></i>
                                    </a>
                                    <button onclick="toggleStatus({{ $slide->id }})" class="text-gray-600 hover:text-gray-700">
                                        <i class="ph-bold {{ $slide->is_active ? 'ph-eye-slash' : 'ph-eye' }}"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    
    @if($slides->count() === 0)
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-12 text-center">
        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="ph-bold ph-images text-gray-400 text-3xl"></i>
        </div>
        <h3 class="text-xl font-semibold text-gray-700 mb-2">No Hero Slides Found</h3>
        <p class="text-gray-500 mb-6">Get started by creating your first hero slide</p>
        <a href="{{ route('admin.hero-slides.create') }}" class="px-6 py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors font-medium">
            <i class="ph-bold ph-plus mr-2"></i>Create First Slide
        </a>
    </div>
    @endif
</div>

<!-- Advanced JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Select all functionality
    const selectAllCheckbox = document.getElementById('selectAll');
    const slideCheckboxes = document.querySelectorAll('.slide-checkbox');
    
    selectAllCheckbox?.addEventListener('change', function() {
        slideCheckboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        updateBulkActions();
    });
    
    slideCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateBulkActions);
    });
    
    // Position select all
    document.querySelectorAll('.position-select-all').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const position = this.dataset.position;
            const positionCheckboxes = document.querySelectorAll(`#slides-${position} .slide-checkbox`);
            positionCheckboxes.forEach(cb => {
                cb.checked = this.checked;
            });
            updateBulkActions();
        });
    });
});

function updateBulkActions() {
    const checkedBoxes = document.querySelectorAll('.slide-checkbox:checked');
    const bulkActivate = document.getElementById('bulkActivate');
    const bulkDeactivate = document.getElementById('bulkDeactivate');
    const bulkDelete = document.getElementById('bulkDelete');
    
    const hasChecked = checkedBoxes.length > 0;
    
    bulkActivate.disabled = !hasChecked;
    bulkDeactivate.disabled = !hasChecked;
    bulkDelete.disabled = !hasChecked;
}

function toggleView(position) {
    const gridView = document.getElementById(`grid-view-${position}`);
    const tableView = document.getElementById(`table-view-${position}`);
    
    if (gridView.classList.contains('hidden')) {
        gridView.classList.remove('hidden');
        tableView.classList.add('hidden');
    } else {
        gridView.classList.add('hidden');
        tableView.classList.remove('hidden');
    }
}

function toggleStatus(slideId) {
    if (confirm('Are you sure you want to toggle the status of this slide?')) {
        fetch(`/admin/hero-slides/${slideId}/toggle`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while toggling the slide status.');
        });
    }
}

function moveUp(slideId, position) {
    const container = document.getElementById(`slides-${position}`);
    const slides = Array.from(container.children);
    const currentIndex = slides.findIndex(slide => slide.dataset.slideId == slideId);
    
    if (currentIndex > 0) {
        const slideElement = slides[currentIndex];
        const prevSlide = slides[currentIndex - 1];
        
        container.insertBefore(slideElement, prevSlide);
        updateSortOrders(position);
    }
}

function moveDown(slideId, position) {
    const container = document.getElementById(`slides-${position}`);
    const slides = Array.from(container.children);
    const currentIndex = slides.findIndex(slide => slide.dataset.slideId == slideId);
    
    if (currentIndex < slides.length - 1) {
        const slideElement = slides[currentIndex];
        const nextSlide = slides[currentIndex + 1];
        
        container.insertBefore(nextSlide, slideElement);
        updateSortOrders(position);
    }
}

function updateSortOrders(position) {
    const container = document.getElementById(`slides-${position}`);
    const slides = container.querySelectorAll('.slide-item');
    
    const sortOrders = [];
    slides.forEach((slide, index) => {
        const slideId = slide.dataset.slideId;
        sortOrders.push({ id: slideId, sort_order: index + 1 });
    });
    
    fetch('/admin/hero-slides/reorder', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ slides: sortOrders })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update order numbers in UI
            slides.forEach((slide, index) => {
                const orderElement = slide.querySelector('.text-xs.text-gray-500.bg-gray-100');
                if (orderElement) {
                    orderElement.textContent = `Order: ${index + 1}`;
                }
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function bulkActivate() {
    const checkedBoxes = document.querySelectorAll('.slide-checkbox:checked');
    const slideIds = Array.from(checkedBoxes).map(cb => cb.value);
    
    if (confirm(`Are you sure you want to activate ${slideIds.length} slide(s)?`)) {
        fetch('/admin/hero-slides/bulk-activate', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ slide_ids: slideIds })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while activating slides.');
        });
    }
}

function bulkDeactivate() {
    const checkedBoxes = document.querySelectorAll('.slide-checkbox:checked');
    const slideIds = Array.from(checkedBoxes).map(cb => cb.value);
    
    if (confirm(`Are you sure you want to deactivate ${slideIds.length} slide(s)?`)) {
        fetch('/admin/hero-slides/bulk-deactivate', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ slide_ids: slideIds })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while deactivating slides.');
        });
    }
}

function bulkDelete() {
    const checkedBoxes = document.querySelectorAll('.slide-checkbox:checked');
    const slideIds = Array.from(checkedBoxes).map(cb => cb.value);
    
    if (confirm(`Are you sure you want to delete ${slideIds.length} slide(s)? This action cannot be undone.`)) {
        fetch('/admin/hero-slides/bulk-delete', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ slide_ids: slideIds })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while deleting slides.');
        });
    }
}

function reorderSlides(position) {
    // This would open a modal or interface for reordering
    alert('Reorder functionality coming soon! You can use the up/down arrows for now.');
}
</script>

<style>
.line-clamp-1 {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.slide-item {
    transition: all 0.3s ease;
}

.slide-item:hover {
    transform: translateY(-2px);
}
</style>
@endsection
