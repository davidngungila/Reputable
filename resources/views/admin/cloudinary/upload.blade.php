@extends('layouts.admin')

@section('title', 'Upload Files')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Upload Files</h1>
            <p class="text-gray-600">Upload new media files to Cloudinary</p>
        </div>
        <div class="flex gap-3 mt-4 lg:mt-0">
            <a href="{{ route('admin.cloudinary.index') }}" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium">
                <i class="fas fa-arrow-left mr-2"></i>Back to Library
            </a>
        </div>
    </div>

    <!-- Upload Form -->
    <div class="max-w-2xl">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <form action="{{ route('admin.cloudinary.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- File Upload -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Select File</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-emerald-500 transition-colors">
                        <input type="file" name="file" id="file" class="hidden" required accept="image/*,video/*">
                        <label for="file" class="cursor-pointer">
                            <i class="fas fa-cloud-upload-alt text-5xl text-gray-400 mb-4"></i>
                            <p class="text-gray-600 mb-2">Click to upload or drag and drop</p>
                            <p class="text-gray-400 text-sm">PNG, JPG, GIF, MP4 up to 10MB</p>
                        </label>
                        <p id="file-name" class="mt-4 text-emerald-600 font-medium hidden"></p>
                    </div>
                    @error('file')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Folder Selection -->
                <div class="mb-6">
                    <label for="folder" class="block text-sm font-medium text-gray-700 mb-2">Folder (Optional)</label>
                    <input type="text" name="folder" id="folder" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                           placeholder="e.g., reputable-tours/tours" value="reputable-tours">
                    <p class="text-gray-500 text-xs mt-2">Leave empty to upload to root folder</p>
                </div>

                <!-- Submit Button -->
                <div class="flex gap-3">
                    <button type="submit" class="flex-1 px-6 py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors font-medium">
                        <i class="fas fa-upload mr-2"></i>Upload File
                    </button>
                    <a href="{{ route('admin.cloudinary.index') }}" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors font-medium">
                        Cancel
                    </a>
                </div>
            </form>
        </div>

        <!-- Upload Tips -->
        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
            <h3 class="font-medium text-blue-900 mb-2">
                <i class="fas fa-info-circle mr-2"></i>Upload Tips
            </h3>
            <ul class="text-sm text-blue-800 space-y-1">
                <li>• Supported formats: JPG, PNG, GIF, WebP, MP4, MOV</li>
                <li>• Maximum file size: 10MB</li>
                <li>• Images are automatically optimized</li>
                <li>• Use folders to organize your media files</li>
            </ul>
        </div>
    </div>
</div>

<script>
document.getElementById('file').addEventListener('change', function(e) {
    const fileName = e.target.files[0]?.name;
    const fileNameDisplay = document.getElementById('file-name');
    if (fileName) {
        fileNameDisplay.textContent = 'Selected: ' + fileName;
        fileNameDisplay.classList.remove('hidden');
    }
});
</script>
@endsection
