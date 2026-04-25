@extends('layouts.admin')

@section('title', 'Manage Inquiries')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header with Statistics -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Inquiries Management</h1>
            <p class="text-gray-600">Manage and respond to customer inquiries efficiently</p>
        </div>
        <div class="flex gap-3 mt-4 lg:mt-0">
            <a href="{{ route('admin.inquiries.export') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-download mr-2"></i>Export Data
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Inquiries</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ $inquiries->total() }}</p>
                </div>
                <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-envelope text-emerald-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Pending</p>
                    <p class="text-2xl font-bold text-yellow-600 mt-1">
                        {{ App\Models\Inquiry::where('status', 'pending')->count() }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-clock text-yellow-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Responded</p>
                    <p class="text-2xl font-bold text-blue-600 mt-1">
                        {{ App\Models\Inquiry::where('status', 'responded')->count() }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-chat-dots text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Closed</p>
                    <p class="text-2xl font-bold text-green-600 mt-1">
                        {{ App\Models\Inquiry::where('status', 'closed')->count() }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-check-circle text-green-600 text-xl"></i>
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
        
        <form method="GET" action="{{ route('admin.inquiries.index') }}" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                    <select name="status" id="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">All Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                        <option value="responded" {{ request('status') == 'responded' ? 'selected' : '' }}>💬 Responded</option>
                        <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>✅ Closed</option>
                    </select>
                </div>
                
                <div>
                    <label for="tour_id" class="block text-sm font-semibold text-gray-700 mb-2">Tour</label>
                    <select name="tour_id" id="tour_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">All Tours</option>
                        @foreach(App\Models\Tour::all() as $tour)
                            <option value="{{ $tour->id }}" {{ request('tour_id') == $tour->id ? 'selected' : '' }}>
                                {{ $tour->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label for="search" class="block text-sm font-semibold text-gray-700 mb-2">Search</label>
                    <input type="text" name="search" id="search" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                           value="{{ request('search') }}" placeholder="Name, Email, or Message">
                </div>
                
                <div>
                    <label for="date_range" class="block text-sm font-semibold text-gray-700 mb-2">Date Range</label>
                    <select name="date_range" id="date_range" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">All Time</option>
                        <option value="today" {{ request('date_range') == 'today' ? 'selected' : '' }}>Today</option>
                        <option value="week" {{ request('date_range') == 'week' ? 'selected' : '' }}>This Week</option>
                        <option value="month" {{ request('date_range') == 'month' ? 'selected' : '' }}>This Month</option>
                    </select>
                </div>
            </div>
            
            <div class="flex flex-wrap gap-3">
                <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors font-medium">
                    <i class="ph-bold ph-funnel mr-2"></i>Apply Filters
                </button>
                <a href="{{ route('admin.inquiries.index') }}" class="px-6 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors font-medium">
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
                <button onclick="bulkAction('responded')" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium disabled:opacity-50" id="bulkRespond" disabled>
                    <i class="ph-bold ph-reply mr-2"></i>Mark as Responded
                </button>
                <button onclick="bulkAction('closed')" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors text-sm font-medium disabled:opacity-50" id="bulkClose" disabled>
                    <i class="ph-bold ph-check-circle mr-2"></i>Mark as Closed
                </button>
                <button onclick="bulkDelete()" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors text-sm font-medium disabled:opacity-50" id="bulkDelete" disabled>
                    <i class="ph-bold ph-trash mr-2"></i>Delete Selected
                </button>
            </div>
        </div>
    </div>

    <!-- Inquiries Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-bold text-gray-900">
                    Inquiries List 
                    <span class="text-sm font-normal text-gray-500 ml-2">
                        ({{ $inquiries->total() }} total)
                    </span>
                </h2>
                <div class="flex items-center gap-4">
                    <button onclick="toggleView()" class="px-3 py-1 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm font-medium">
                        <i class="ph-bold ph-layout mr-2"></i>Toggle View
                    </button>
                </div>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            @if($inquiries->count() > 0)
                <table class="w-full" id="inquiriesTable">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <input type="checkbox" class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tour</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($inquiries as $inquiry)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input type="checkbox" class="inquiry-checkbox w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500" value="{{ $inquiry->id }}">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center mr-3">
                                            <i class="ph-bold ph-user text-emerald-600"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $inquiry->name }}</div>
                                            <div class="text-sm text-gray-500">ID: #{{ str_pad($inquiry->id, 4, '0', STR_PAD_LEFT) }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm">
                                        <div class="text-gray-900">{{ $inquiry->email }}</div>
                                        <div class="text-gray-500">{{ $inquiry->phone ?? 'No phone' }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    @if($inquiry->tour)
                                        <a href="{{ route('admin.tours.show', $inquiry->tour) }}" 
                                           class="text-sm text-emerald-600 hover:text-emerald-700 font-medium">
                                            {{ $inquiry->tour->name }}
                                        </a>
                                        <div class="text-xs text-gray-500 mt-1">
                                            {{ $inquiry->tour->duration_days }} days • ${{ number_format($inquiry->tour->base_price, 0) }}
                                        </div>
                                    @else
                                        <span class="text-sm text-gray-500">No tour selected</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 max-w-xs truncate" title="{{ $inquiry->message }}">
                                        {{ Str::limit($inquiry->message, 80) }}
                                    </div>
                                    <button onclick="toggleMessage({{ $inquiry->id }})" class="text-xs text-emerald-600 hover:text-emerald-700 mt-1">
                                        View full message
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $inquiry->created_at->format('M d, Y') }}</div>
                                    <div class="text-xs text-gray-500">{{ $inquiry->created_at->format('g:i A') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @switch($inquiry->status)
                                        @case('pending')
                                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">
                                                ⏳ Pending
                                            </span>
                                            @break
                                        @case('responded')
                                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">
                                                💬 Responded
                                            </span>
                                            @break
                                        @case('closed')
                                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">
                                                ✅ Closed
                                            </span>
                                            @break
                                    @endswitch
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('admin.inquiries.show', $inquiry) }}" 
                                           class="p-2 bg-emerald-100 text-emerald-700 rounded-lg hover:bg-emerald-200 transition-colors"
                                           title="View Details">
                                            <i class="ph-bold ph-eye"></i>
                                        </a>
                                        
                                        @if($inquiry->status === 'pending')
                                            <form action="{{ route('admin.inquiries.respond', $inquiry) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="p-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors"
                                                        title="Mark as Responded">
                                                    <i class="ph-bold ph-reply"></i>
                                                </button>
                                            </form>
                                        @endif
                                        
                                        @if($inquiry->status !== 'closed')
                                            <form action="{{ route('admin.inquiries.close', $inquiry) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="p-2 bg-green-100 text-green-700 rounded-lg hover:bg-green-200 transition-colors"
                                                        title="Mark as Closed">
                                                    <i class="ph-bold ph-check-circle"></i>
                                                </button>
                                            </form>
                                        @endif
                                        
                                        <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors"
                                                    title="Delete Inquiry"
                                                    onclick="return confirm('Are you sure you want to delete this inquiry?')">
                                                <i class="ph-bold ph-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Expanded Row for Full Message -->
                            <tr id="message-{{ $inquiry->id }}" class="hidden bg-gray-50">
                                <td colspan="8" class="px-6 py-4">
                                    <div class="bg-white rounded-lg p-4 border border-gray-200">
                                        <h4 class="font-semibold text-gray-900 mb-2">Full Message:</h4>
                                        <p class="text-gray-700 whitespace-pre-wrap">{{ $inquiry->message }}</p>
                                        
                                        @if($inquiry->admin_notes)
                                            <div class="mt-4 pt-4 border-t border-gray-200">
                                                <h4 class="font-semibold text-gray-900 mb-2">Admin Notes:</h4>
                                                <p class="text-gray-600">{{ $inquiry->admin_notes }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <!-- Enhanced Pagination -->
                <div class="px-6 py-4 border-t border-gray-200">
                    <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                        <div class="text-sm text-gray-700">
                            Showing 
                            <span class="font-medium">{{ $inquiries->firstItem() }}</span> 
                            to 
                            <span class="font-medium">{{ $inquiries->lastItem() }}</span> 
                            of 
                            <span class="font-medium">{{ $inquiries->total() }}</span> 
                            results
                        </div>
                        <div>
                            {{ $inquiries->links() }}
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-12">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-envelope text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No inquiries found</h3>
                    <p class="text-gray-500">There are no inquiries matching your current filters.</p>
                    <a href="{{ route('admin.inquiries.index') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                        <i class="ph-bold ph-arrow-counter-clockwise mr-2"></i>Clear Filters
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
// Toggle message expansion
function toggleMessage(id) {
    const messageRow = document.getElementById('message-' + id);
    messageRow.classList.toggle('hidden');
}

// Select all functionality
document.getElementById('selectAll').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.inquiry-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
    updateBulkButtons();
});

// Update bulk action buttons
function updateBulkButtons() {
    const checkedBoxes = document.querySelectorAll('.inquiry-checkbox:checked');
    const hasSelection = checkedBoxes.length > 0;
    
    document.getElementById('bulkRespond').disabled = !hasSelection;
    document.getElementById('bulkClose').disabled = !hasSelection;
    document.getElementById('bulkDelete').disabled = !hasSelection;
}

// Listen for checkbox changes
document.addEventListener('change', function(e) {
    if (e.target.classList.contains('inquiry-checkbox')) {
        updateBulkButtons();
    }
});

// Bulk action functions
function bulkAction(status) {
    const checkedBoxes = document.querySelectorAll('.inquiry-checkbox:checked');
    const ids = Array.from(checkedBoxes).map(cb => cb.value);
    
    if (ids.length === 0) return;
    
    if (confirm(`Are you sure you want to mark ${ids.length} inquiry(ies) as ${status}?`)) {
        // Submit bulk action form
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/admin/inquiries/bulk-update';
        
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        form.innerHTML = `
            <input type="hidden" name="_token" value="${csrfToken}">
            <input type="hidden" name="ids" value="${ids.join(',')}">
            <input type="hidden" name="status" value="${status}">
        `;
        
        document.body.appendChild(form);
        form.submit();
    }
}

function bulkDelete() {
    const checkedBoxes = document.querySelectorAll('.inquiry-checkbox:checked');
    const ids = Array.from(checkedBoxes).map(cb => cb.value);
    
    if (ids.length === 0) return;
    
    if (confirm(`Are you sure you want to delete ${ids.length} inquiry(ies)? This action cannot be undone.`)) {
        // Submit bulk delete form
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/admin/inquiries/bulk-delete';
        
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        form.innerHTML = `
            <input type="hidden" name="_token" value="${csrfToken}">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="ids" value="${ids.join(',')}">
        `;
        
        document.body.appendChild(form);
        form.submit();
    }
}

// Toggle view (simple/detailed)
function toggleView() {
    // This could toggle between card view and table view
    alert('View toggle functionality - could switch between table and card layouts');
}
</script>
@endsection
