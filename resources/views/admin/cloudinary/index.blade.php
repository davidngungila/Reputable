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

    <!-- Media Grid -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        @if(isset($resources) && count($resources) > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                @foreach($resources as $resource)
                <div class="group relative bg-gray-50 rounded-lg overflow-hidden border border-gray-200 hover:shadow-lg transition-all">
                    @if($resource['resource_type'] == 'image')
                        <img src="{{ $resource['secure_url'] }}" alt="{{ $resource['public_id'] }}" class="w-full h-40 object-cover">
                    @elseif($resource['resource_type'] == 'video')
                        <div class="w-full h-40 bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-video text-4xl text-gray-400"></i>
                        </div>
                    @else
                        <div class="w-full h-40 bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-file text-4xl text-gray-400"></i>
                        </div>
                    @endif
                    
                    <div class="p-3">
                        <p class="text-xs text-gray-500 truncate" title="{{ $resource['public_id'] }}">
                            {{ basename($resource['public_id']) }}
                        </p>
                        <p class="text-[10px] text-gray-400 mt-1">
                            {{ $resource['resource_type'] }} • {{ number_format($resource['bytes'] / 1024, 2) }} KB
                        </p>
                    </div>

                    <!-- Actions -->
                    <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="{{ $resource['secure_url'] }}" target="_blank" class="p-2 bg-white rounded-full hover:bg-gray-100 transition-colors" title="View">
                            <i class="fas fa-eye text-gray-700"></i>
                        </a>
                        <button onclick="copyToClipboard('{{ $resource['secure_url'] }}')" class="p-2 bg-white rounded-full hover:bg-gray-100 transition-colors" title="Copy URL">
                            <i class="fas fa-copy text-gray-700"></i>
                        </button>
                        <form action="{{ route('admin.cloudinary.destroy', $resource['public_id']) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this file?')" class="p-2 bg-red-500 rounded-full hover:bg-red-600 transition-colors" title="Delete">
                                <i class="fas fa-trash text-white"></i>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
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

<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        alert('URL copied to clipboard!');
    }, function(err) {
        console.error('Failed to copy: ', err);
    });
}
</script>
@endsection
