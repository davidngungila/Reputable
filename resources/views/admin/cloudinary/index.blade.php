@extends('layouts.admin')

@section('title', 'Media Library')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Media Library</h1>
            <p class="text-gray-600">Manage all your media files stored in Cloudinary</p>
        </div>
        <div class="flex gap-3 mt-4 lg:mt-0">
            <a href="{{ route('admin.cloudinary.upload') }}" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                <i class="fas fa-upload mr-2"></i>Upload New
            </a>
            <a href="{{ route('admin.cloudinary.folders') }}" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium">
                <i class="fas fa-folder mr-2"></i>Manage Folders
            </a>
        </div>
    </div>

    <!-- Advanced Filters & Search -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
        <div class="flex flex-col lg:flex-row gap-4">
            <!-- Search -->
            <div class="flex-1">
                <div class="relative">
                    <input type="text" id="search-input" placeholder="Search files by name..." 
                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            
            <!-- Resource Type Filter -->
            <select id="resource-type-filter" class="px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                <option value="all">All Types</option>
                <option value="image">Images</option>
                <option value="video">Videos</option>
                <option value="raw">Raw Files</option>
            </select>
            
            <!-- Folder Filter -->
            <select id="folder-filter" class="px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                <option value="all">All Folders</option>
                <option value="reputable-tours">Reputable Tours</option>
                <option value="tours">Tours</option>
                <option value="destinations">Destinations</option>
            </select>
            
            <!-- Sort -->
            <select id="sort-filter" class="px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                <option value="newest">Newest First</option>
                <option value="oldest">Oldest First</option>
                <option value="name">Name A-Z</option>
                <option value="size">Size</option>
            </select>
            
            <!-- View Toggle -->
            <div class="flex border border-gray-300 rounded-lg overflow-hidden">
                <button id="grid-view-btn" class="px-4 py-3 bg-emerald-600 text-white" onclick="setView('grid')">
                    <i class="fas fa-th"></i>
                </button>
                <button id="list-view-btn" class="px-4 py-3 bg-white text-gray-600 hover:bg-gray-50" onclick="setView('list')">
                    <i class="fas fa-list"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Bulk Actions Bar -->
    <div id="bulk-actions-bar" class="hidden bg-emerald-600 text-white rounded-xl shadow-sm p-4 mb-6 flex items-center justify-between">
        <div class="flex items-center gap-4">
            <input type="checkbox" id="select-all" class="w-5 h-5 rounded" onchange="toggleSelectAll()">
            <span id="selected-count">0 selected</span>
        </div>
        <div class="flex gap-2">
            <button onclick="bulkDelete()" class="px-4 py-2 bg-red-500 hover:bg-red-600 rounded-lg text-sm font-medium">
                <i class="fas fa-trash mr-2"></i>Delete Selected
            </button>
            <button onclick="bulkDownload()" class="px-4 py-2 bg-white text-emerald-700 hover:bg-gray-100 rounded-lg text-sm font-medium">
                <i class="fas fa-download mr-2"></i>Download
            </button>
        </div>
    </div>

    <!-- Media Grid -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <!-- Results Count -->
        @if(isset($resources) && count($resources) > 0)
        <div class="mb-4 text-sm text-gray-600">
            Showing {{ count($resources) }} media files
        </div>
        @endif

        <div id="media-container" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @if(isset($resources) && count($resources) > 0)
                @foreach($resources as $resource)
                @php
                    $publicId = $resource['public_id'] ?? 'unknown';
                    $secureUrl = $resource['secure_url'] ?? '';
                    $resourceType = $resource['resource_type'] ?? 'unknown';
                    $bytes = $resource['bytes'] ?? 0;
                @endphp
                <div class="media-item group relative bg-gray-50 rounded-lg overflow-hidden border border-gray-200 hover:shadow-lg transition-all" 
                     data-type="{{ $resourceType }}" 
                     data-name="{{ basename($publicId) }}"
                     data-size="{{ $bytes }}"
                     data-date="{{ $resource['created_at'] ?? '' }}">
                    <input type="checkbox" class="media-checkbox absolute top-2 left-2 z-20 w-5 h-5 rounded hidden" 
                           value="{{ $publicId }}" onchange="updateSelectedCount()">
                    
                    @if($resourceType == 'image' && !empty($secureUrl))
                        <img src="{{ $secureUrl }}" alt="{{ $publicId }}" class="w-full h-40 object-cover" loading="lazy">
                    @elseif($resourceType == 'video')
                        <div class="w-full h-40 bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-video text-4xl text-gray-400"></i>
                        </div>
                    @else
                        <div class="w-full h-40 bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-file text-4xl text-gray-400"></i>
                        </div>
                    @endif
                    
                    <div class="p-3">
                        <p class="text-xs text-gray-500 truncate" title="{{ $publicId }}">
                            {{ basename($publicId) }}
                        </p>
                        <p class="text-[10px] text-gray-400 mt-1">
                            {{ $resourceType }} • {{ number_format($bytes / 1024, 2) }} KB
                        </p>
                    </div>

                    <!-- Actions -->
                    <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2 z-10">
                        <button onclick="showFileDetails('{{ $publicId }}', '{{ $secureUrl }}', '{{ $resourceType }}', {{ $bytes }})" class="p-2 bg-white rounded-full hover:bg-gray-100 transition-colors" title="Details">
                            <i class="fas fa-info-circle text-gray-700"></i>
                        </button>
                        @if(!empty($secureUrl))
                        <a href="{{ $secureUrl }}" target="_blank" class="p-2 bg-white rounded-full hover:bg-gray-100 transition-colors" title="View">
                            <i class="fas fa-eye text-gray-700"></i>
                        </a>
                        @endif
                        @if(!empty($secureUrl))
                        <button onclick="copyToClipboard('{{ $secureUrl }}')" class="p-2 bg-white rounded-full hover:bg-gray-100 transition-colors" title="Copy URL">
                            <i class="fas fa-copy text-gray-700"></i>
                        </button>
                        @endif
                        <button onclick="transformImage('{{ $publicId }}')" class="p-2 bg-blue-500 rounded-full hover:bg-blue-600 transition-colors" title="Transform">
                            <i class="fas fa-magic text-white"></i>
                        </button>
                        <form action="{{ route('admin.cloudinary.destroy', $publicId) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this file?')" class="p-2 bg-red-500 rounded-full hover:bg-red-600 transition-colors" title="Delete">
                                <i class="fas fa-trash text-white"></i>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-span-full text-center py-12">
                    <i class="fas fa-cloud-upload-alt text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No Media Files</h3>
                    <p class="text-gray-500 mb-4">Upload your first media file to get started</p>
                    <a href="{{ route('admin.cloudinary.upload') }}" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                        Upload Files
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- File Details Modal -->
<div id="file-details-modal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-2xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="p-6 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-xl font-bold text-gray-900">File Details</h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>
        <div class="p-6">
            <div id="modal-content"></div>
        </div>
    </div>
</div>

<!-- Image Transformation Modal -->
<div id="transform-modal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-2xl max-w-lg w-full mx-4">
        <div class="p-6 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-xl font-bold text-gray-900">Transform Image</h3>
            <button onclick="closeTransformModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>
        <div class="p-6">
            <form id="transform-form">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Width (px)</label>
                    <input type="number" name="width" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="e.g., 800">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Height (px)</label>
                    <input type="number" name="height" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="e.g., 600">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Quality (1-100)</label>
                    <input type="number" name="quality" class="w-full px-4 py-2 border border-gray-300 rounded-lg" value="80" min="1" max="100">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Format</label>
                    <select name="format" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                        <option value="auto">Auto</option>
                        <option value="jpg">JPG</option>
                        <option value="png">PNG</option>
                        <option value="webp">WebP</option>
                    </select>
                </div>
                <button type="submit" class="w-full px-4 py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 font-medium">
                    Generate Transformation
                </button>
            </form>
        </div>
    </div>
</div>

<script>
let selectedFiles = [];
let currentView = 'grid';

// View Toggle
function setView(view) {
    currentView = view;
    const container = document.getElementById('media-container');
    const gridBtn = document.getElementById('grid-view-btn');
    const listBtn = document.getElementById('list-view-btn');
    
    if (view === 'grid') {
        container.className = 'grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4';
        gridBtn.className = 'px-4 py-3 bg-emerald-600 text-white';
        listBtn.className = 'px-4 py-3 bg-white text-gray-600 hover:bg-gray-50';
    } else {
        container.className = 'flex flex-col gap-2';
        gridBtn.className = 'px-4 py-3 bg-white text-gray-600 hover:bg-gray-50';
        listBtn.className = 'px-4 py-3 bg-emerald-600 text-white';
    }
}

// Search and Filter
document.getElementById('search-input').addEventListener('input', filterMedia);
document.getElementById('resource-type-filter').addEventListener('change', filterMedia);
document.getElementById('folder-filter').addEventListener('change', filterMedia);
document.getElementById('sort-filter').addEventListener('change', filterMedia);

function filterMedia() {
    const searchTerm = document.getElementById('search-input').value.toLowerCase();
    const resourceType = document.getElementById('resource-type-filter').value;
    const folder = document.getElementById('folder-filter').value;
    const sort = document.getElementById('sort-filter').value;
    
    const items = document.querySelectorAll('.media-item');
    items.forEach(item => {
        const name = item.dataset.name.toLowerCase();
        const type = item.dataset.type;
        
        let show = true;
        
        if (searchTerm && !name.includes(searchTerm)) show = false;
        if (resourceType !== 'all' && type !== resourceType) show = false;
        
        item.style.display = show ? 'block' : 'none';
    });
}

// Bulk Selection
function toggleSelectAll() {
    const selectAll = document.getElementById('select-all');
    const checkboxes = document.querySelectorAll('.media-checkbox');
    
    checkboxes.forEach(cb => {
        cb.checked = selectAll.checked;
        cb.classList.toggle('hidden', !selectAll.checked);
    });
    
    updateSelectedCount();
}

function updateSelectedCount() {
    const checkboxes = document.querySelectorAll('.media-checkbox:checked');
    selectedFiles = Array.from(checkboxes).map(cb => cb.value);
    
    document.getElementById('selected-count').textContent = selectedFiles.length + ' selected';
    document.getElementById('bulk-actions-bar').classList.toggle('hidden', selectedFiles.length === 0);
    
    checkboxes.forEach(cb => {
        cb.classList.toggle('hidden', !cb.checked);
    });
}

// Show checkboxes on hover
document.querySelectorAll('.media-item').forEach(item => {
    item.addEventListener('mouseenter', () => {
        item.querySelector('.media-checkbox').classList.remove('hidden');
    });
    item.addEventListener('mouseleave', () => {
        const checkbox = item.querySelector('.media-checkbox');
        if (!checkbox.checked) checkbox.classList.add('hidden');
    });
});

// Bulk Actions
function bulkDelete() {
    if (confirm(`Are you sure you want to delete ${selectedFiles.length} files?`)) {
        selectedFiles.forEach(publicId => {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/admin/cloudinary/${publicId}`;
            form.innerHTML = '<input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}">';
            document.body.appendChild(form);
            form.submit();
        });
    }
}

function bulkDownload() {
    selectedFiles.forEach(publicId => {
        window.open(`https://res.cloudinary.com/image/upload/${publicId}`, '_blank');
    });
}

// File Details Modal
function showFileDetails(publicId, url, type, size) {
    const modal = document.getElementById('file-details-modal');
    const content = document.getElementById('modal-content');
    
    content.innerHTML = `
        <div class="space-y-4">
            <div>
                <label class="text-sm font-medium text-gray-500">Public ID</label>
                <p class="text-gray-900 font-mono text-sm break-all">${publicId}</p>
            </div>
            <div>
                <label class="text-sm font-medium text-gray-500">URL</label>
                <p class="text-gray-900 font-mono text-sm break-all">${url}</p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-sm font-medium text-gray-500">Type</label>
                    <p class="text-gray-900">${type}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-500">Size</label>
                    <p class="text-gray-900">${(size / 1024).toFixed(2)} KB</p>
                </div>
            </div>
            <div class="flex gap-2 mt-4">
                <button onclick="copyToClipboard('${url}')" class="flex-1 px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700">
                    <i class="fas fa-copy mr-2"></i>Copy URL
                </button>
                <a href="${url}" target="_blank" class="flex-1 px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 text-center">
                    <i class="fas fa-external-link-alt mr-2"></i>Open
                </a>
            </div>
        </div>
    `;
    
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeModal() {
    const modal = document.getElementById('file-details-modal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// Image Transformation
function transformImage(publicId) {
    const modal = document.getElementById('transform-modal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    
    document.getElementById('transform-form').onsubmit = function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const width = formData.get('width');
        const height = formData.get('height');
        const quality = formData.get('quality');
        const format = formData.get('format');
        
        let transformation = '';
        if (width) transformation += `w_${width},`;
        if (height) transformation += `h_${height},`;
        if (quality) transformation += `q_${quality},`;
        if (format && format !== 'auto') transformation += `f_${format}`;
        
        transformation = transformation.replace(/,$/, '');
        const transformedUrl = `https://res.cloudinary.com/image/upload/${transformation}/${publicId}`;
        
        window.open(transformedUrl, '_blank');
        closeTransformModal();
    };
}

function closeTransformModal() {
    const modal = document.getElementById('transform-modal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// Copy to Clipboard
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        alert('URL copied to clipboard!');
    }, function(err) {
        console.error('Failed to copy: ', err);
    });
}
</script>
@endsection
