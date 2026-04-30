@extends('layouts.admin')

@section('title', 'Mountain Trekking Routes')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Mountain Trekking Routes</h1>
            <p class="text-gray-600">Manage trekking routes for Kilimanjaro, Meru, and other mountains</p>
        </div>
        <div class="flex gap-3 mt-4 lg:mt-0">
            <a href="{{ route('admin.mountain-trekking-routes.create') }}" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-plus mr-2"></i>Add Route
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h4 class="text-2xl font-bold text-gray-900">{{ $routes->total() }}</h4>
                    <p class="text-gray-600 text-sm">Total Routes</p>
                </div>
                <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-map-trifold text-emerald-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h4 class="text-2xl font-bold text-gray-900">{{ $routes->where('is_active', true)->count() }}</h4>
                    <p class="text-gray-600 text-sm">Active Routes</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-check-circle text-green-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h4 class="text-2xl font-bold text-gray-900">{{ $routes->where('is_active', false)->count() }}</h4>
                    <p class="text-gray-600 text-sm">Inactive Routes</p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-pause-circle text-yellow-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h4 class="text-2xl font-bold text-gray-900">{{ $mountains->count() }}</h4>
                    <p class="text-gray-600 text-sm">Mountains</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-mountains text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8">
        <form method="GET" action="{{ route('admin.mountain-trekking-routes.index') }}" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Search</label>
                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="Search routes..." 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Mountain</label>
                    <select name="mountain" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">All Mountains</option>
                        @foreach($mountains as $mountain)
                        <option value="{{ $mountain }}" {{ request('mountain') == $mountain ? 'selected' : '' }}>
                            {{ $mountain }}
                        </option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Difficulty</label>
                    <select name="difficulty" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">All Difficulties</option>
                        @foreach($difficulties as $difficulty)
                        <option value="{{ $difficulty }}" {{ request('difficulty') == $difficulty ? 'selected' : '' }}>
                            {{ $difficulty }}
                        </option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">All Status</option>
                        <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                
                <div class="flex items-end gap-2">
                    <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                        <i class="ph-bold ph-funnel mr-2"></i>Filter
                    </button>
                    <a href="{{ route('admin.mountain-trekking-routes.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors text-sm font-medium">
                        <i class="ph-bold ph-x mr-2"></i>Reset
                    </a>
                </div>
            </div>
        </form>
    </div>

    <!-- Bulk Actions -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="flex items-center gap-3">
                <input type="checkbox" id="selectAll" class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                <label for="selectAll" class="text-sm font-medium text-gray-700">Select All</label>
                
                <div class="flex gap-2">
                    <button type="button" onclick="bulkAction('activate')" class="px-3 py-1 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors text-sm font-medium disabled:opacity-50" id="bulkActivate" disabled>
                        <i class="ph-bold ph-check-circle mr-1"></i>Activate
                    </button>
                    <button type="button" onclick="bulkAction('deactivate')" class="px-3 py-1 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition-colors text-sm font-medium disabled:opacity-50" id="bulkDeactivate" disabled>
                        <i class="ph-bold ph-pause-circle mr-1"></i>Deactivate
                    </button>
                    <button type="button" onclick="bulkAction('delete')" class="px-3 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors text-sm font-medium disabled:opacity-50" id="bulkDelete" disabled>
                        <i class="ph-bold ph-trash mr-1"></i>Delete
                    </button>
                </div>
            </div>
            
            <div class="text-sm text-gray-600">
                Showing {{ $routes->firstItem() }} to {{ $routes->lastItem() }} of {{ $routes->total() }} routes
            </div>
        </div>
    </div>

    <!-- Routes Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <input type="checkbox" class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Route</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mountain</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duration</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Difficulty</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Success Rate</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($routes as $route)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="checkbox" class="route-checkbox w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500" value="{{ $route->id }}">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-lg object-cover" src="{{ $route->main_image }}" alt="{{ $route->name }}">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $route->name }}</div>
                                    <div class="text-sm text-gray-500">{{ Str::limit($route->description, 50) }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $route->mountain_name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $route->duration }}</div>
                            <div class="text-sm text-gray-500">{{ $route->duration_days }} days</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-medium rounded-full
                                @if($route->difficulty == 'Easy to Moderate') bg-green-100 text-green-800
                                @elseif($route->difficulty == 'Moderate') bg-yellow-100 text-yellow-800
                                @elseif($route->difficulty == 'Challenging') bg-orange-100 text-orange-800
                                @else bg-red-100 text-red-800
                                @endif">
                                {{ $route->difficulty }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $route->formatted_price }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $route->success_rate }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button type="button" onclick="toggleStatus({{ $route->id }})" class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 {{ $route->is_active ? 'bg-emerald-600' : 'bg-gray-200' }}">
                                <span class="translate-x-0 inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 {{ $route->is_active ? 'translate-x-5' : 'translate-x-0' }}"></span>
                            </button>
                            <span class="ml-2 text-sm text-gray-600">{{ $route->is_active ? 'Active' : 'Inactive' }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.mountain-trekking-routes.show', $route) }}" class="text-emerald-600 hover:text-emerald-900">
                                    <i class="ph-bold ph-eye"></i>
                                </a>
                                <a href="{{ route('admin.mountain-trekking-routes.edit', $route) }}" class="text-blue-600 hover:text-blue-900">
                                    <i class="ph-bold ph-pencil"></i>
                                </a>
                                <button type="button" onclick="deleteRoute({{ $route->id }})" class="text-red-600 hover:text-red-900">
                                    <i class="ph-bold ph-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="px-6 py-12 text-center">
                            <div class="text-gray-500">
                                <i class="ph-bold ph-map-trifold text-4xl mb-4"></i>
                                <h3 class="text-lg font-medium mb-2">No routes found</h3>
                                <p class="text-sm">Get started by creating your first mountain trekking route.</p>
                                <a href="{{ route('admin.mountain-trekking-routes.create') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                                    <i class="ph-bold ph-plus mr-2"></i>Add Route
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($routes->hasPages())
        <div class="bg-gray-50 px-6 py-3 border-t border-gray-200">
            {{ $routes->links() }}
        </div>
        @endif
    </div>
</div>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Select all functionality
    const selectAllCheckbox = document.getElementById('selectAll');
    const routeCheckboxes = document.querySelectorAll('.route-checkbox');
    const bulkButtons = ['bulkActivate', 'bulkDeactivate', 'bulkDelete'];
    
    selectAllCheckbox?.addEventListener('change', function() {
        routeCheckboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        updateBulkButtons();
    });
    
    routeCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateBulkButtons);
    });
    
    function updateBulkButtons() {
        const checkedBoxes = document.querySelectorAll('.route-checkbox:checked');
        const hasSelection = checkedBoxes.length > 0;
        
        bulkButtons.forEach(buttonId => {
            const button = document.getElementById(buttonId);
            if (button) {
                button.disabled = !hasSelection;
            }
        });
    }
});

function toggleStatus(routeId) {
    fetch(`/admin/mountain-trekking-routes/${routeId}/toggle-status`, {
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

function deleteRoute(routeId) {
    if (confirm('Are you sure you want to delete this route?')) {
        fetch(`/admin/mountain-trekking-routes/${routeId}`, {
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

function bulkAction(action) {
    const checkedBoxes = document.querySelectorAll('.route-checkbox:checked');
    const ids = Array.from(checkedBoxes).map(cb => cb.value);
    
    if (ids.length === 0) {
        alert('Please select at least one route');
        return;
    }
    
    const confirmMessages = {
        'activate': 'Are you sure you want to activate the selected routes?',
        'deactivate': 'Are you sure you want to deactivate the selected routes?',
        'delete': 'Are you sure you want to delete the selected routes? This action cannot be undone.'
    };
    
    if (confirm(confirmMessages[action])) {
        fetch('/admin/mountain-trekking-routes/bulk-action', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                action: action,
                ids: ids
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert(data.message || 'An error occurred');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred');
        });
    }
}
</script>
@endsection
