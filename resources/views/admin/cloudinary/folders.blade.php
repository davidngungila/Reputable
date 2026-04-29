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

    <!-- Folders List -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Existing Folders</h2>
        @if(isset($folders) && count($folders) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($folders as $folder)
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-200 hover:border-emerald-500 transition-colors">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-folder text-2xl text-emerald-600"></i>
                        <div>
                            <p class="font-medium text-gray-900">{{ $folder['path'] }}</p>
                            <p class="text-xs text-gray-500">{{ $folder['name'] }}</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button class="p-2 text-gray-400 hover:text-emerald-600 transition-colors" title="View Contents">
                            <i class="fas fa-eye"></i>
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
        </ul>
    </div>
</div>
@endsection
