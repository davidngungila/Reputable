@extends('layouts.admin')

@section('title', 'Activities Management')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Activities Management</h1>
            <p class="text-gray-600">Complete management dashboard for all activities</p>
        </div>
        <div class="flex flex-wrap gap-3 mt-4 lg:mt-0">
            <a href="{{ route('admin.activities.create') }}" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                <i class="fas fa-plus mr-2"></i>Add Activity
            </a>
            <a href="{{ route('admin.activities.view-all') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                <i class="fas fa-list mr-2"></i>View All
            </a>
        </div>
    </div>

    <!-- Management Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-emerald-100 rounded-lg">
                    <i class="fas fa-list text-emerald-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full">
                    {{ $stats['total'] }} Total
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ $stats['total'] }}</h3>
                <p class="text-sm text-gray-600">Total Activities</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-green-100 rounded-lg">
                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">
                    Active
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ $stats['active'] }}</h3>
                <p class="text-sm text-gray-600">Active Activities</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-yellow-100 rounded-lg">
                    <i class="fas fa-star text-yellow-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-yellow-600 bg-yellow-50 px-2 py-1 rounded-full">
                    Featured
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ $stats['featured'] }}</h3>
                <p class="text-sm text-gray-600">Featured Activities</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-purple-100 rounded-lg">
                    <i class="fas fa-chart-line text-purple-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-purple-600 bg-purple-50 px-2 py-1 rounded-full">
                    Growth
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">+24%</h3>
                <p class="text-sm text-gray-600">Monthly Growth</p>
            </div>
        </div>
    </div>

    <!-- Activity Type Distribution -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Activity Types</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-purple-500 rounded-full mr-3"></div>
                        <span class="text-sm font-medium text-gray-700">Cultural Tours</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-24 bg-gray-200 rounded-full h-2">
                            <div class="bg-purple-500 h-2 rounded-full" style="width: {{ $stats['cultural'] / max($stats['total'], 1) * 100 }}%"></div>
                        </div>
                        <span class="text-sm font-medium text-gray-900">{{ $stats['cultural'] }}</span>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-blue-500 rounded-full mr-3"></div>
                        <span class="text-sm font-medium text-gray-700">Beach Activities</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-24 bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-500 h-2 rounded-full" style="width: {{ $stats['beach'] / max($stats['total'], 1) * 100 }}%"></div>
                        </div>
                        <span class="text-sm font-medium text-gray-900">{{ $stats['beach'] }}</span>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-orange-500 rounded-full mr-3"></div>
                        <span class="text-sm font-medium text-gray-700">Wildlife Experiences</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-24 bg-gray-200 rounded-full h-2">
                            <div class="bg-orange-500 h-2 rounded-full" style="width: {{ $stats['wildlife'] / max($stats['total'], 1) * 100 }}%"></div>
                        </div>
                        <span class="text-sm font-medium text-gray-900">{{ $stats['wildlife'] }}</span>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                        <span class="text-sm font-medium text-gray-700">Adventure Activities</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-24 bg-gray-200 rounded-full h-2">
                            <div class="bg-green-500 h-2 rounded-full" style="width: {{ $stats['adventure'] / max($stats['total'], 1) * 100 }}%"></div>
                        </div>
                        <span class="text-sm font-medium text-gray-900">{{ $stats['adventure'] }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('admin.activities.cultural-tours') }}" class="p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors text-center">
                    <i class="fas fa-theater-masks text-purple-600 text-2xl mb-2"></i>
                    <p class="text-sm font-medium text-purple-900">Cultural Tours</p>
                    <p class="text-xs text-purple-600">{{ $stats['cultural'] }} activities</p>
                </a>
                <a href="{{ route('admin.activities.beach-activities') }}" class="p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors text-center">
                    <i class="fas fa-umbrella-beach text-blue-600 text-2xl mb-2"></i>
                    <p class="text-sm font-medium text-blue-900">Beach Activities</p>
                    <p class="text-xs text-blue-600">{{ $stats['beach'] }} activities</p>
                </a>
                <a href="{{ route('admin.activities.wildlife-experiences') }}" class="p-4 bg-orange-50 rounded-lg hover:bg-orange-100 transition-colors text-center">
                    <i class="fas fa-paw text-orange-600 text-2xl mb-2"></i>
                    <p class="text-sm font-medium text-orange-900">Wildlife</p>
                    <p class="text-xs text-orange-600">{{ $stats['wildlife'] }} activities</p>
                </a>
                <a href="{{ route('admin.activities.create') }}" class="p-4 bg-emerald-50 rounded-lg hover:bg-emerald-100 transition-colors text-center">
                    <i class="fas fa-plus text-emerald-600 text-2xl mb-2"></i>
                    <p class="text-sm font-medium text-emerald-900">Add New</p>
                    <p class="text-xs text-emerald-600">Create activity</p>
                </a>
            </div>
        </div>
    </div>

    <!-- Search and Filters -->
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6 border border-gray-100">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <input type="text" id="search-activities" placeholder="Search activities..." 
                       onkeyup="filterActivities()"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
            </div>
            <div>
                <select id="type-filter" onchange="filterActivities()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">All Types</option>
                    <option value="cultural">Cultural</option>
                    <option value="beach">Beach</option>
                    <option value="wildlife">Wildlife</option>
                    <option value="adventure">Adventure</option>
                </select>
            </div>
            <div>
                <select id="status-filter" onchange="filterActivities()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
            <div>
                <select id="featured-filter" onchange="filterActivities()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">All Activities</option>
                    <option value="featured">Featured Only</option>
                    <option value="not-featured">Not Featured</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Activities Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">All Activities</h3>
                <div class="flex items-center gap-2 text-sm text-gray-600">
                    <span>{{ $activities->count() }} activities</span>
                    <span>•</span>
                    <span>Page {{ $activities->currentPage() }} of {{ $activities->lastPage() }}</span>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Activity</th>
                        <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Type</th>
                        <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Location</th>
                        <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Price</th>
                        <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Status</th>
                        <th class="text-center py-3 px-4 text-sm font-medium text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody id="activities-table">
                    @foreach($activities as $activity)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 activity-row" 
                        data-type="{{ $activity->activity_type }}"
                        data-status="{{ $activity->status }}"
                        data-featured="{{ $activity->featured ? 'featured' : 'not-featured' }}"
                        data-name="{{ strtolower($activity->name) }}">
                        <td class="py-3 px-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-br 
                                    {{ $activity->activity_type === 'cultural' ? 'from-purple-400 to-purple-600' : '' }}
                                    {{ $activity->activity_type === 'beach' ? 'from-blue-400 to-blue-600' : '' }}
                                    {{ $activity->activity_type === 'wildlife' ? 'from-orange-400 to-orange-600' : '' }}
                                    {{ $activity->activity_type === 'adventure' ? 'from-green-400 to-green-600' : '' }}
                                    rounded-lg flex items-center justify-center text-white">
                                    <i class="fas 
                                        {{ $activity->activity_type === 'cultural' ? 'fa-theater-masks' : '' }}
                                        {{ $activity->activity_type === 'beach' ? 'fa-umbrella-beach' : '' }}
                                        {{ $activity->activity_type === 'wildlife' ? 'fa-paw' : '' }}
                                        {{ $activity->activity_type === 'adventure' ? 'fa-hiking' : '' }}
                                        text-sm"></i>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <p class="text-sm font-medium text-gray-900">{{ $activity->name }}</p>
                                        @if($activity->featured)
                                        <i class="fas fa-star text-yellow-500 text-xs"></i>
                                        @endif
                                    </div>
                                    <p class="text-xs text-gray-500">{{ $activity->duration }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-1 text-xs font-medium rounded-full capitalize
                                {{ $activity->activity_type === 'cultural' ? 'bg-purple-100 text-purple-700' : '' }}
                                {{ $activity->activity_type === 'beach' ? 'bg-blue-100 text-blue-700' : '' }}
                                {{ $activity->activity_type === 'wildlife' ? 'bg-orange-100 text-orange-700' : '' }}
                                {{ $activity->activity_type === 'adventure' ? 'bg-green-100 text-green-700' : '' }}">
                                {{ $activity->activity_type }}
                            </span>
                        </td>
                        <td class="py-3 px-4">
                            <p class="text-sm text-gray-900">{{ $activity->location }}</p>
                        </td>
                        <td class="py-3 px-4">
                            <p class="text-sm font-medium text-gray-900">${{ number_format($activity->price, 0) }}</p>
                        </td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-1 text-xs font-medium rounded-full
                                {{ $activity->status === 'active' ? 'bg-green-100 text-green-700' : '' }}
                                {{ $activity->status === 'inactive' ? 'bg-gray-100 text-gray-700' : '' }}
                                {{ $activity->status === 'draft' ? 'bg-yellow-100 text-yellow-700' : '' }}">
                                {{ ucfirst($activity->status) }}
                            </span>
                        </td>
                        <td class="py-3 px-4">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.activities.show', $activity) }}" class="text-emerald-600 hover:text-emerald-800 text-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.activities.edit', $activity) }}" class="text-blue-600 hover:text-blue-800 text-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="deleteActivity({{ $activity->id }})" class="text-red-600 hover:text-red-800 text-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($activities->hasPages())
        <div class="p-4 border-t border-gray-200">
            {{ $activities->links() }}
        </div>
        @endif
    </div>
</div>

<script>
function filterActivities() {
    const searchTerm = document.getElementById('search-activities').value.toLowerCase();
    const typeFilter = document.getElementById('type-filter').value;
    const statusFilter = document.getElementById('status-filter').value;
    const featuredFilter = document.getElementById('featured-filter').value;
    
    const rows = document.querySelectorAll('.activity-row');
    
    rows.forEach(row => {
        const name = row.dataset.name;
        const type = row.dataset.type;
        const status = row.dataset.status;
        const featured = row.dataset.featured;
        
        const matchesSearch = !searchTerm || name.includes(searchTerm);
        const matchesType = !typeFilter || type === typeFilter;
        const matchesStatus = !statusFilter || status === statusFilter;
        const matchesFeatured = !featuredFilter || featured === featuredFilter;
        
        row.style.display = matchesSearch && matchesType && matchesStatus && matchesFeatured ? '' : 'none';
    });
}

function deleteActivity(id) {
    if (confirm('Are you sure you want to delete this activity?')) {
        fetch(`/admin/activities/${id}`, {
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
                alert('Error deleting activity: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error deleting activity');
        });
    }
}
</script>
@endsection
