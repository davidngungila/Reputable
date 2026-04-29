@extends('layouts.admin')

@section('title', 'Cloudinary API Test')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Cloudinary API Test</h1>
            <p class="text-gray-600">Diagnose Cloudinary API connection and data retrieval</p>
        </div>
        <div class="flex gap-3 mt-4 lg:mt-0">
            <button onclick="runTest()" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                <i class="fas fa-sync-alt mr-2"></i>Run Test
            </button>
            <a href="{{ route('admin.cloudinary.index') }}" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium">
                <i class="fas fa-arrow-left mr-2"></i>Back to Library
            </a>
        </div>
    </div>

    <!-- Test Results -->
    <div id="test-results" class="space-y-6">
        <!-- Loading State -->
        <div id="loading" class="bg-white rounded-xl shadow-sm border border-gray-100 p-12 text-center">
            <i class="fas fa-spinner fa-spin text-4xl text-emerald-600 mb-4"></i>
            <p class="text-gray-600">Running Cloudinary API tests...</p>
        </div>

        <!-- Results will be loaded here -->
    </div>
</div>

<script>
function runTest() {
    const resultsDiv = document.getElementById('test-results');
    const loadingDiv = document.getElementById('loading');
    
    loadingDiv.style.display = 'block';
    resultsDiv.innerHTML = '';
    resultsDiv.appendChild(loadingDiv);

    fetch('{{ route('admin.cloudinary.test') }}')
        .then(response => response.json())
        .then(data => {
            loadingDiv.style.display = 'none';
            displayResults(data);
        })
        .catch(error => {
            loadingDiv.style.display = 'none';
            resultsDiv.innerHTML = `
                <div class="bg-red-50 border border-red-200 rounded-xl p-6">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-exclamation-circle text-red-600 text-2xl"></i>
                        <div>
                            <h3 class="font-semibold text-red-900">Test Failed</h3>
                            <p class="text-red-700">${error.message}</p>
                        </div>
                    </div>
                </div>
            `;
        });
}

function displayResults(data) {
    const resultsDiv = document.getElementById('test-results');
    let html = '';

    // Config Test
    html += createTestCard('Configuration', data.config, 'fas fa-cog');

    // Search API Test
    html += createTestCard('Search API', data.search_api, 'fas fa-search');

    // Admin API Test
    html += createTestCard('Admin Assets API', data.admin_api, 'fas fa-server');

    // Folders API Test
    html += createTestCard('Folders API', data.folders_api, 'fas fa-folder');

    // Actual Resources Test
    html += createTestCard('Actual Resources', data.actual_resources, 'fas fa-images');

    resultsDiv.innerHTML = html;
}

function createTestCard(title, data, icon) {
    const isSuccess = data.status === 'success';
    const statusColor = isSuccess ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700';
    const borderColor = isSuccess ? 'border-emerald-200' : 'border-red-200';
    const iconColor = isSuccess ? 'text-emerald-600' : 'text-red-600';

    let content = '';
    if (isSuccess) {
        if (data.data) {
            content = `<pre class="mt-4 bg-gray-50 p-4 rounded-lg text-xs overflow-auto">${JSON.stringify(data.data, null, 2)}</pre>`;
        } else if (data.sample) {
            content = `<pre class="mt-4 bg-gray-50 p-4 rounded-lg text-xs overflow-auto">${JSON.stringify(data.sample, null, 2)}</pre>`;
        } else if (data.count !== undefined) {
            content = `<p class="mt-4 text-sm text-gray-600">Count: ${data.count}</p>`;
        }
    } else {
        content = `<p class="mt-4 text-sm text-red-600">${data.message}</p>`;
    }

    return `
        <div class="bg-white rounded-xl shadow-sm border ${borderColor} p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="p-3 ${isSuccess ? 'bg-emerald-100' : 'bg-red-100'} rounded-lg">
                        <i class="fas ${icon} ${iconColor} text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">${title}</h3>
                </div>
                <span class="px-3 py-1 rounded-full text-xs font-medium ${statusColor}">
                    ${isSuccess ? 'Success' : 'Failed'}
                </span>
            </div>
            ${content}
        </div>
    `;
}

// Run test on page load
document.addEventListener('DOMContentLoaded', function() {
    runTest();
});
</script>
@endsection
