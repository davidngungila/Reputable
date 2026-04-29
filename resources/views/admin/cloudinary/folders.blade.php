@extends('layouts.admin')

@section('title', 'Manage Folders')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Manage Folders</h1>
            <p class="text-gray-600">Organize your media files with folders</p>
        </div>
        <div class="flex gap-3 mt-4 lg:mt-0">
            <a href="{{ route('admin.cloudinary.analytics') }}" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors text-sm font-medium">
                <i class="fas fa-chart-bar mr-2"></i>Analytics
            </a>
            <a href="{{ route('admin.cloudinary.index') }}" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium">
                <i class="fas fa-arrow-left mr-2"></i>Back to Library
            </a>
        </div>
    </div>

    <!-- Create Folder Form -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Create New Folder</h2>
        <form action="{{ route('admin.cloudinary.create-folder') }}" method="POST" class="flex gap-3">
            @csrf
            <input type="text" name="folder_name" 
                   class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                   placeholder="e.g., reputable-tours/tours" required>
            <button type="submit" class="px-6 py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors font-medium">
                <i class="fas fa-folder-plus mr-2"></i>Create Folder
            </button>
        </form>
    </div>

    <!-- Folder Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-emerald-100 rounded-lg">
                    <i class="fas fa-folder text-emerald-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-gray-900">{{ isset($folders) ? count($folders) : 0 }}</h3>
                    <p class="text-sm text-gray-600">Total Folders</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-blue-100 rounded-lg">
                    <i class="fas fa-file text-blue-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $total_files ?? 0 }}</h3>
                    <p class="text-sm text-gray-600">Total Files</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-purple-100 rounded-lg">
                    <i class="fas fa-hdd text-purple-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $total_storage ?? '0 B' }}</h3>
                    <p class="text-sm text-gray-600">Storage Used</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Folders List -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-semibold text-gray-900">Existing Folders</h2>
            <div class="flex gap-2">
                <button id="grid-view-btn" onclick="setView('grid')" class="px-3 py-1 text-xs bg-emerald-100 text-emerald-700 rounded-lg font-medium">Grid View</button>
                <button id="list-view-btn" onclick="setView('list')" class="px-3 py-1 text-xs text-gray-600 hover:bg-gray-100 rounded-lg">List View</button>
            </div>
        </div>
        @if(isset($folders) && count($folders) > 0)
            <div id="folders-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($folders as $folder)
                <div class="group relative bg-gray-50 rounded-lg border border-gray-200 hover:border-emerald-500 hover:shadow-lg transition-all p-4">
                    <div class="flex items-center gap-3 mb-3">
                        <i class="fas fa-folder text-3xl text-emerald-600"></i>
                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-gray-900 truncate" title="{{ $folder['path'] ?? $folder['name'] ?? 'Unknown' }}">{{ $folder['path'] ?? $folder['name'] ?? 'Unknown' }}</p>
                            <p class="text-xs text-gray-500">{{ $folder['name'] ?? 'Unknown Folder' }}</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-xs text-gray-500">
                        <span><i class="fas fa-file mr-1"></i>{{ $folder['file_count'] ?? 0 }} files</span>
                        <span><i class="fas fa-hdd mr-1"></i>{{ $folder['storage_used'] ?? '0 B' }}</span>
                    </div>
                    <!-- Actions -->
                    <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2 rounded-lg">
                        <button class="p-2 bg-white rounded-full hover:bg-gray-100 transition-colors" title="View Contents">
                            <i class="fas fa-eye text-gray-700"></i>
                        </button>
                        <button class="p-2 bg-white rounded-full hover:bg-gray-100 transition-colors" title="Rename">
                            <i class="fas fa-edit text-gray-700"></i>
                        </button>
                        <button class="p-2 bg-red-500 rounded-full hover:bg-red-600 transition-colors" title="Delete">
                            <i class="fas fa-trash text-white"></i>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <i class="fas fa-folder-open text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No Folders</h3>
                <p class="text-gray-500 mb-4">Create your first folder to organize your media</p>
            </div>
        @endif
    </div>

    <!-- Folder Tips -->
    <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
        <h3 class="font-medium text-blue-900 mb-2">
            <i class="fas fa-info-circle mr-2"></i>Folder Tips
        </h3>
        <ul class="text-sm text-blue-800 space-y-1">
            <li>• Use forward slashes (/) to create nested folders</li>
            <li>• Example: reputable-tours/tours/serengeti</li>
            <li>• Folders help organize media by category or tour</li>
            <li>• Folder names are case-sensitive</li>
            <li>• Hover over folders to see quick actions</li>
        </ul>
    </div>
</div>

<script>
// View Toggle
function setView(view) {
    const container = document.getElementById('folders-container');
    const gridBtn = document.getElementById('grid-view-btn');
    const listBtn = document.getElementById('list-view-btn');
    
    if (view === 'grid') {
        container.className = 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4';
        gridBtn.className = 'px-3 py-1 text-xs bg-emerald-100 text-emerald-700 rounded-lg font-medium';
        listBtn.className = 'px-3 py-1 text-xs text-gray-600 hover:bg-gray-100 rounded-lg';
    } else {
        container.className = 'flex flex-col gap-2';
        gridBtn.className = 'px-3 py-1 text-xs text-gray-600 hover:bg-gray-100 rounded-lg';
        listBtn.className = 'px-3 py-1 text-xs bg-emerald-100 text-emerald-700 rounded-lg font-medium';
    }
}

// Folder Actions
function viewFolder(folderPath) {
    // Redirect to media library filtered by folder
    window.location.href = `/admin/cloudinary?folder=${encodeURIComponent(folderPath)}`;
}

function renameFolder(folderPath) {
    const newName = prompt('Enter new folder name:', folderPath);
    if (newName && newName !== folderPath) {
        // Implement folder rename functionality
        console.log('Rename folder from', folderPath, 'to', newName);
    }
}

function deleteFolder(folderPath) {
    if (confirm(`Are you sure you want to delete the folder "${folderPath}"? This will also delete all files in this folder.`)) {
        // Implement folder delete functionality
        console.log('Delete folder:', folderPath);
    }
}

// Add click handlers to folder action buttons
document.addEventListener('DOMContentLoaded', function() {
    const folderCards = document.querySelectorAll('.group');
    folderCards.forEach(card => {
        const folderPath = card.querySelector('.font-medium').textContent;
        
        // Add click handlers to action buttons
        const viewBtn = card.querySelector('.fa-eye')?.parentElement;
        const editBtn = card.querySelector('.fa-edit')?.parentElement;
        const deleteBtn = card.querySelector('.fa-trash')?.parentElement;
        
        if (viewBtn) viewBtn.onclick = () => viewFolder(folderPath);
        if (editBtn) editBtn.onclick = () => renameFolder(folderPath);
        if (deleteBtn) deleteBtn.onclick = () => deleteFolder(folderPath);
    });
});
</script>
@endsection
