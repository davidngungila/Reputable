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
    <div class="max-w-4xl">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <form action="{{ route('admin.cloudinary.store') }}" method="POST" enctype="multipart/form-data" id="upload-form">
                @csrf

                <!-- Drag & Drop Upload Area -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Select Files</label>
                    <div id="drop-zone" class="border-2 border-dashed border-gray-300 rounded-lg p-12 text-center hover:border-emerald-500 transition-colors cursor-pointer bg-gray-50 hover:bg-emerald-50">
                        <input type="file" name="file" id="file" class="hidden" required accept="image/*,video/*" multiple>
                        <div id="upload-prompt">
                            <i class="fas fa-cloud-upload-alt text-6xl text-gray-400 mb-4"></i>
                            <p class="text-gray-600 mb-2 text-lg">Drag and drop files here</p>
                            <p class="text-gray-400 text-sm mb-4">or click to browse</p>
                            <p class="text-gray-400 text-xs">PNG, JPG, GIF, WebP, MP4, MOV up to 10MB each</p>
                        </div>
                        <div id="file-preview" class="hidden">
                            <div id="preview-list" class="space-y-2"></div>
                        </div>
                    </div>
                    @error('file')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Upload Options -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Folder Selection -->
                    <div>
                        <label for="folder" class="block text-sm font-medium text-gray-700 mb-2">Folder (Optional)</label>
                        <input type="text" name="folder" id="folder" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                               placeholder="e.g., reputable-tours/tours" value="reputable-tours">
                        <p class="text-gray-500 text-xs mt-2">Leave empty to upload to root folder</p>
                    </div>

                    <!-- Tags -->
                    <div>
                        <label for="tags" class="block text-sm font-medium text-gray-700 mb-2">Tags (Optional)</label>
                        <input type="text" name="tags" id="tags" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                               placeholder="e.g., safari, wildlife, serengeti">
                        <p class="text-gray-500 text-xs mt-2">Comma-separated tags for organization</p>
                    </div>
                </div>

                <!-- Image Transformation Options -->
                <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                    <h3 class="font-medium text-gray-900 mb-4">Image Transformation Options</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Auto Format</label>
                            <select name="auto_format" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                                <option value="true">Yes (WebP/AVIF)</option>
                                <option value="false">No (Original)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Quality</label>
                            <input type="number" name="quality" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500" value="80" min="1" max="100">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Resize</label>
                            <select name="resize" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                                <option value="none">No Resize</option>
                                <option value="limit">Limit to 2000px</option>
                                <option value="fit">Fit to 1200px</option>
                                <option value="thumb">Thumbnail 300px</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Progress Bar -->
                <div id="upload-progress" class="hidden mb-6">
                    <div class="flex justify-between text-sm mb-2">
                        <span class="text-gray-600">Uploading...</span>
                        <span id="progress-percent" class="text-emerald-600 font-medium">0%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div id="progress-bar" class="bg-emerald-600 h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex gap-3">
                    <button type="submit" id="submit-btn" class="flex-1 px-6 py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors font-medium">
                        <i class="fas fa-upload mr-2"></i>Upload Files
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
                <li>• Supported formats: JPG, PNG, GIF, WebP, MP4, MOV, PDF</li>
                <li>• Maximum file size: 10MB per file</li>
                <li>• Images are automatically optimized and compressed</li>
                <li>• Use folders to organize your media files by category</li>
                <li>• Tags help with search and organization</li>
                <li>• Cloudinary provides CDN delivery for fast loading</li>
            </ul>
        </div>

        <!-- Recent Uploads -->
        <div class="mt-6 bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="font-medium text-gray-900 mb-4">
                <i class="fas fa-history mr-2 text-emerald-600"></i>Recent Uploads
            </h3>
            <div id="recent-uploads" class="space-y-3">
                <p class="text-gray-500 text-sm">No recent uploads</p>
            </div>
        </div>
    </div>
</div>

<script>
const dropZone = document.getElementById('drop-zone');
const fileInput = document.getElementById('file');
const uploadPrompt = document.getElementById('upload-prompt');
const filePreview = document.getElementById('file-preview');
const previewList = document.getElementById('preview-list');
const uploadForm = document.getElementById('upload-form');
const uploadProgress = document.getElementById('upload-progress');
const progressBar = document.getElementById('progress-bar');
const progressPercent = document.getElementById('progress-percent');
const submitBtn = document.getElementById('submit-btn');

// Drag and drop handlers
dropZone.addEventListener('click', () => fileInput.click());

dropZone.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropZone.classList.add('border-emerald-500', 'bg-emerald-50');
});

dropZone.addEventListener('dragleave', () => {
    dropZone.classList.remove('border-emerald-500', 'bg-emerald-50');
});

dropZone.addEventListener('drop', (e) => {
    e.preventDefault();
    dropZone.classList.remove('border-emerald-500', 'bg-emerald-50');
    
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        fileInput.files = files;
        handleFiles(files);
    }
});

fileInput.addEventListener('change', (e) => {
    if (e.target.files.length > 0) {
        handleFiles(e.target.files);
    }
});

function handleFiles(files) {
    uploadPrompt.classList.add('hidden');
    filePreview.classList.remove('hidden');
    previewList.innerHTML = '';
    
    Array.from(files).forEach(file => {
        const fileItem = document.createElement('div');
        fileItem.className = 'flex items-center justify-between p-3 bg-white rounded-lg border border-gray-200';
        
        const fileSize = (file.size / 1024).toFixed(2) + ' KB';
        const fileType = file.type.split('/')[1].toUpperCase();
        
        fileItem.innerHTML = `
            <div class="flex items-center gap-3">
                <i class="fas fa-file text-2xl text-emerald-600"></i>
                <div>
                    <p class="font-medium text-gray-900 text-sm">${file.name}</p>
                    <p class="text-xs text-gray-500">${fileType} • ${fileSize}</p>
                </div>
            </div>
            <button type="button" onclick="removeFile(this)" class="text-red-500 hover:text-red-700">
                <i class="fas fa-times"></i>
            </button>
        `;
        
        previewList.appendChild(fileItem);
    });
}

function removeFile(button) {
    button.parentElement.remove();
    if (previewList.children.length === 0) {
        uploadPrompt.classList.remove('hidden');
        filePreview.classList.add('hidden');
        fileInput.value = '';
    }
}

// Form submission with progress
uploadForm.addEventListener('submit', (e) => {
    e.preventDefault();
    
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Uploading...';
    uploadProgress.classList.remove('hidden');
    
    // Simulate progress
    let progress = 0;
    const interval = setInterval(() => {
        progress += Math.random() * 15;
        if (progress >= 100) {
            progress = 100;
            clearInterval(interval);
        }
        progressBar.style.width = progress + '%';
        progressPercent.textContent = Math.round(progress) + '%';
    }, 200);
    
    // Submit form
    uploadForm.submit();
});
</script>
@endsection
