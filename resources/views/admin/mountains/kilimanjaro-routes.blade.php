@extends('layouts.admin')

@section('title', 'Kilimanjaro Routes Management')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Kilimanjaro Routes</h1>
            <p class="text-gray-600">Manage climbing routes, success rates, and pricing for Mount Kilimanjaro</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.mountains.admin.show', 'kilimanjaro') }}" 
               class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 transition-all flex items-center shadow-sm">
                <i class="ph-bold ph-arrow-left mr-2"></i>Back to Mountain
            </a>
            <button onclick="openAddModal()" 
                    class="px-4 py-2 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 transition-all flex items-center shadow-md shadow-emerald-100">
                <i class="ph-bold ph-plus mr-2"></i>Add New Route
            </button>
        </div>
    </div>

    <!-- Quick Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Routes -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:scale-110 transition-transform">
                <i class="ph-bold ph-map-trifold text-6xl text-emerald-600"></i>
            </div>
            <p class="text-sm font-medium text-gray-500 mb-1">Total Routes</p>
            <h3 class="text-3xl font-bold text-gray-900">{{ count($kilimanjaro->routes ?? []) }}</h3>
            <div class="mt-2 flex items-center text-xs text-emerald-600 font-medium">
                <i class="ph-bold ph-trend-up mr-1"></i>
                <span>Active Climbing Paths</span>
            </div>
        </div>

        <!-- Avg Success Rate -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:scale-110 transition-transform">
                <i class="ph-bold ph-chart-line-up text-6xl text-blue-600"></i>
            </div>
            <p class="text-sm font-medium text-gray-500 mb-1">Avg Success Rate</p>
            <h3 class="text-3xl font-bold text-gray-900">
                @if($kilimanjaro->routes)
                    {{ round(collect($kilimanjaro->routes)->avg(fn($r) => (float) str_replace('%', '', $r['success_rate']))) }}%
                @else
                    0%
                @endif
            </h3>
            <div class="mt-2 flex items-center text-xs text-blue-600 font-medium">
                <i class="ph-bold ph-info mr-1"></i>
                <span>Summit Probability</span>
            </div>
        </div>

        <!-- Avg Price -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:scale-110 transition-transform">
                <i class="ph-bold ph-currency-circle-dollar text-6xl text-purple-600"></i>
            </div>
            <p class="text-sm font-medium text-gray-500 mb-1">Avg Price</p>
            <h3 class="text-3xl font-bold text-gray-900">
                @if($kilimanjaro->routes)
                    ${{ number_format(collect($kilimanjaro->routes)->avg('price'), 0) }}
                @else
                    $0
                @endif
            </h3>
            <div class="mt-2 flex items-center text-xs text-purple-600 font-medium">
                <i class="ph-bold ph-tag mr-1"></i>
                <span>Market Standard</span>
            </div>
        </div>

        <!-- Avg Duration -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:scale-110 transition-transform">
                <i class="ph-bold ph-clock text-6xl text-orange-600"></i>
            </div>
            <p class="text-sm font-medium text-gray-500 mb-1">Avg Duration</p>
            <h3 class="text-3xl font-bold text-gray-900">
                @if($kilimanjaro->routes)
                    {{ round(collect($kilimanjaro->routes)->avg(fn($r) => preg_replace('/[^0-9]/', '', $r['duration']))) }}d
                @else
                    0d
                @endif
            </h3>
            <div class="mt-2 flex items-center text-xs text-orange-600 font-medium">
                <i class="ph-bold ph-calendar mr-1"></i>
                <span>Acclimatization Time</span>
            </div>
        </div>
    </div>

    <!-- Routes Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
        @if($kilimanjaro->routes && count($kilimanjaro->routes) > 0)
            @foreach($kilimanjaro->routes as $index => $route)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-all group">
                    <!-- Card Header with Gradient -->
                    <div class="h-32 bg-gradient-to-br from-emerald-500 to-blue-600 p-6 relative">
                        <div class="absolute top-4 right-4 flex gap-2">
                            <button onclick="editRoute({{ $index }})" 
                                    class="p-2 bg-white/20 backdrop-blur-md text-white rounded-lg hover:bg-white/30 transition-colors" title="Edit">
                                <i class="ph-bold ph-pencil-simple"></i>
                            </button>
                            <button onclick="deleteRoute({{ $index }})" 
                                    class="p-2 bg-red-500/80 backdrop-blur-md text-white rounded-lg hover:bg-red-600 transition-colors" title="Delete">
                                <i class="ph-bold ph-trash"></i>
                            </button>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-1">{{ $route['name'] }}</h3>
                        <div class="flex items-center text-emerald-50 text-sm">
                            <i class="ph-bold ph-clock mr-1"></i>
                            {{ $route['duration'] }}
                            <span class="mx-2 opacity-50">•</span>
                            <i class="ph-bold ph-chart-line-up mr-1"></i>
                            {{ $route['difficulty'] }}
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6">
                        <p class="text-gray-600 text-sm mb-6 line-clamp-2 italic">
                            "{{ $route['description'] }}"
                        </p>

                        <!-- Key Metrics -->
                        <div class="grid grid-cols-3 gap-4 mb-6">
                            <div class="text-center p-3 bg-emerald-50 rounded-xl">
                                <p class="text-[10px] font-bold text-emerald-600 uppercase tracking-wider mb-1">Success</p>
                                <p class="text-lg font-bold text-emerald-700">{{ $route['success_rate'] }}</p>
                            </div>
                            <div class="text-center p-3 bg-blue-50 rounded-xl">
                                <p class="text-[10px] font-bold text-blue-600 uppercase tracking-wider mb-1">Price</p>
                                <p class="text-lg font-bold text-blue-700">${{ number_format($route['price'], 0) }}</p>
                            </div>
                            <div class="text-center p-3 bg-purple-50 rounded-xl">
                                <p class="text-[10px] font-bold text-purple-600 uppercase tracking-wider mb-1">Highlights</p>
                                <p class="text-lg font-bold text-purple-700">{{ count($route['highlights'] ?? []) }}</p>
                            </div>
                        </div>

                        <!-- Highlights Tags -->
                        @if(!empty($route['highlights']))
                            <div class="flex flex-wrap gap-2 mb-6">
                                @foreach(array_slice($route['highlights'], 0, 3) as $highlight)
                                    <span class="px-2.5 py-1 bg-gray-100 text-gray-600 text-[11px] font-semibold rounded-full border border-gray-200">
                                        {{ $highlight }}
                                    </span>
                                @endforeach
                                @if(count($route['highlights']) > 3)
                                    <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 text-[11px] font-bold rounded-full border border-emerald-100">
                                        +{{ count($route['highlights']) - 3 }} more
                                    </span>
                                @endif
                            </div>
                        @endif

                        <button onclick="viewRouteDetails({{ $index }})" 
                                class="w-full py-2.5 bg-gray-50 text-gray-700 rounded-xl font-bold text-sm hover:bg-emerald-600 hover:text-white transition-all flex items-center justify-center group">
                            Full Route Details
                            <i class="ph-bold ph-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-span-full py-20 bg-white rounded-3xl border-2 border-dashed border-gray-200 flex flex-col items-center justify-center text-center">
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-6">
                    <i class="ph-bold ph-mountains text-4xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">No Routes Configured</h3>
                <p class="text-gray-500 max-w-sm mb-8">Start by adding climbing routes for Mount Kilimanjaro to show them on the public website.</p>
                <button onclick="openAddModal()" 
                        class="px-6 py-3 bg-emerald-600 text-white rounded-xl font-bold hover:bg-emerald-700 transition-all shadow-lg shadow-emerald-100">
                    Create Your First Route
                </button>
            </div>
        @endif
    </div>
</div>

<!-- Modern Route Modal (Add/Edit) -->
<div id="routeModal" class="hidden fixed inset-0 z-50 overflow-y-auto">
    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity"></div>
    <div class="relative min-h-screen flex items-center justify-center p-4">
        <div class="relative bg-white rounded-3xl shadow-2xl max-w-2xl w-full overflow-hidden">
            <!-- Modal Header -->
            <div class="px-8 py-6 border-b border-gray-100 flex items-center justify-between bg-gray-50">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900" id="routeModalTitle">Add New Route</h2>
                    <p class="text-sm text-gray-500">Enter details for the climbing route</p>
                </div>
                <button onclick="closeModal('routeModal')" class="p-2 hover:bg-white rounded-full transition-colors">
                    <i class="ph-bold ph-x text-xl text-gray-400"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="px-8 py-8">
                <form id="routeForm" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700">Route Name</label>
                            <input type="text" id="routeName" required 
                                   class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all outline-none"
                                   placeholder="e.g., Lemosho Route">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700">Duration</label>
                            <input type="text" id="routeDuration" required 
                                   class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all outline-none"
                                   placeholder="e.g., 7-8 Days">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700">Difficulty</label>
                            <select id="routeDifficulty" required 
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all outline-none appearance-none">
                                <option value="">Select Level</option>
                                <option value="Moderate">Moderate</option>
                                <option value="Strenuous">Strenuous</option>
                                <option value="Very Strenuous">Very Strenuous</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700">Success Rate (%)</label>
                            <input type="text" id="routeSuccessRate" required 
                                   class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all outline-none"
                                   placeholder="e.g., 95%">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700">Price From ($)</label>
                            <input type="number" id="routePrice" required 
                                   class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all outline-none"
                                   placeholder="2400">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700">Number of Highlights</label>
                            <input type="number" id="highlightsCount" min="1" value="3" onchange="updateHighlightsFields()"
                                   class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all outline-none">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700">Description</label>
                        <textarea id="routeDescription" required rows="3" 
                                  class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all outline-none"
                                  placeholder="Describe the unique features of this route..."></textarea>
                    </div>

                    <div class="space-y-3">
                        <label class="text-sm font-bold text-gray-700">Route Highlights</label>
                        <div id="highlightsContainer" class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <!-- Dynamically added -->
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="px-8 py-6 bg-gray-50 border-t border-gray-100 flex justify-end gap-3">
                <button onclick="closeModal('routeModal')" 
                        class="px-6 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl font-bold hover:bg-gray-100 transition-all">
                    Cancel
                </button>
                <button onclick="saveRoute()" 
                        class="px-8 py-2.5 bg-emerald-600 text-white rounded-xl font-bold hover:bg-emerald-700 transition-all shadow-lg shadow-emerald-100">
                    Save Route
                </button>
            </div>
        </div>
    </div>
</div>

<!-- View Details Modal -->
<div id="viewRouteModal" class="hidden fixed inset-0 z-50 overflow-y-auto">
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity"></div>
    <div class="relative min-h-screen flex items-center justify-center p-4">
        <div class="relative bg-white rounded-3xl shadow-2xl max-w-2xl w-full overflow-hidden">
            <div class="h-32 bg-emerald-600 p-8 flex items-end">
                <h2 class="text-3xl font-bold text-white" id="viewRouteTitle">Route Name</h2>
            </div>
            <div class="p-8" id="viewRouteContent">
                <!-- Dynamically populated -->
            </div>
            <div class="px-8 py-6 bg-gray-50 border-t border-gray-100 flex justify-end">
                <button onclick="closeModal('viewRouteModal')" 
                        class="px-8 py-2.5 bg-emerald-600 text-white rounded-xl font-bold hover:bg-emerald-700 transition-all">
                    Close Details
                </button>
            </div>
        </div>
    </div>
</div>

<script>
let routes = @json($kilimanjaro->routes ?? []);
let editingIndex = -1;

function openAddModal() {
    editingIndex = -1;
    document.getElementById('routeForm').reset();
    document.getElementById('routeModalTitle').textContent = 'Add New Route';
    updateHighlightsFields();
    document.getElementById('routeModal').classList.remove('hidden');
}

function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
}

function updateHighlightsFields() {
    const count = document.getElementById('highlightsCount').value;
    const container = document.getElementById('highlightsContainer');
    container.innerHTML = '';
    
    for (let i = 0; i < count; i++) {
        const div = document.createElement('div');
        div.innerHTML = `
            <div class="relative">
                <i class="ph-bold ph-check-circle absolute left-3 top-3.5 text-emerald-500"></i>
                <input type="text" class="w-full pl-10 pr-4 py-3 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 transition-all outline-none text-sm" 
                       placeholder="Highlight ${i + 1}" id="highlight${i}">
            </div>
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
    
    document.getElementById('routeModal').classList.remove('hidden');
}

function viewRouteDetails(index) {
    const route = routes[index];
    
    let highlightsHtml = '';
    if (route.highlights) {
        highlightsHtml = route.highlights.map(h => `
            <div class="flex items-center p-3 bg-emerald-50 text-emerald-700 rounded-xl border border-emerald-100">
                <i class="ph-bold ph-check-circle mr-2"></i>
                <span class="text-sm font-medium">${h}</span>
            </div>
        `).join('');
    }
    
    document.getElementById('viewRouteTitle').textContent = route.name;
    document.getElementById('viewRouteContent').innerHTML = `
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <div class="p-4 bg-gray-50 rounded-2xl border border-gray-100">
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Duration</p>
                <p class="font-bold text-gray-900">${route.duration}</p>
            </div>
            <div class="p-4 bg-gray-50 rounded-2xl border border-gray-100">
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Difficulty</p>
                <p class="font-bold text-emerald-600">${route.difficulty}</p>
            </div>
            <div class="p-4 bg-gray-50 rounded-2xl border border-gray-100">
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Success</p>
                <p class="font-bold text-blue-600">${route.success_rate}</p>
            </div>
            <div class="p-4 bg-gray-50 rounded-2xl border border-gray-100">
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">From</p>
                <p class="font-bold text-gray-900">$${numberFormat(route.price)}</p>
            </div>
        </div>

        <div class="mb-8">
            <h4 class="text-sm font-bold text-gray-900 uppercase tracking-widest mb-3">About the Route</h4>
            <p class="text-gray-600 leading-relaxed italic border-l-4 border-emerald-500 pl-4 bg-emerald-50 py-4 rounded-r-2xl">
                "${route.description}"
            </p>
        </div>

        <div>
            <h4 class="text-sm font-bold text-gray-900 uppercase tracking-widest mb-3">Key Highlights</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                ${highlightsHtml}
            </div>
        </div>
    `;
    
    document.getElementById('viewRouteModal').classList.remove('hidden');
}

function numberFormat(num) {
    return new Intl.NumberFormat('en-US').format(num);
}

function deleteRoute(index) {
    if (confirm('Are you sure you want to permanently delete this route? This will affect the public website.')) {
        // In a real application, you would send this to the server
        showNotification('Route deleted successfully', 'success');
        setTimeout(() => location.reload(), 1000);
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

    if (!routeData.name || !routeData.duration || !routeData.price) {
        showNotification('Please fill in all required fields', 'error');
        return;
    }
    
    // In a real application, you would send this to the server
    console.log('Saving route:', routeData);
    showNotification('Route saved successfully!', 'success');
    
    closeModal('routeModal');
    setTimeout(() => location.reload(), 1000);
}

function showNotification(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `fixed bottom-8 right-8 px-6 py-4 rounded-2xl shadow-2xl z-[100] flex items-center transform transition-all animate-bounce ${
        type === 'success' ? 'bg-emerald-600 text-white' : 'bg-red-600 text-white'
    }`;
    toast.innerHTML = `
        <i class="ph-bold ph-${type === 'success' ? 'check-circle' : 'warning-circle'} mr-3 text-xl"></i>
        <span class="font-bold">${message}</span>
    `;
    document.body.appendChild(toast);
    setTimeout(() => toast.remove(), 3000);
}

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    updateHighlightsFields();
});
</script>

<style>
@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}
.animate-bounce {
    animation: bounce 2s infinite;
}
</style>
@endsection
