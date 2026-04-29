@extends('layouts.admin')

@section('title', 'Media Analytics')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Media Analytics</h1>
            <p class="text-gray-600">Track your media usage and performance</p>
        </div>
        <div class="flex gap-3 mt-4 lg:mt-0">
            <a href="{{ route('admin.cloudinary.index') }}" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium">
                <i class="fas fa-arrow-left mr-2"></i>Back to Library
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
        <!-- Total Files -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-emerald-100 rounded-lg">
                    <i class="fas fa-images text-emerald-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full">
                    +12.5%
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ $stats['total_files'] ?? 0 }}</h3>
                <p class="text-sm text-gray-600">Total Files</p>
            </div>
        </div>

        <!-- Storage Used -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-blue-100 rounded-lg">
                    <i class="fas fa-database text-blue-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2 py-1 rounded-full">
                    +8.2%
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ number_format(($stats['total_bytes'] ?? 0) / 1024 / 1024, 2) }} MB</h3>
                <p class="text-sm text-gray-600">Storage Used</p>
            </div>
        </div>

        <!-- Images -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-purple-100 rounded-lg">
                    <i class="fas fa-image text-purple-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-purple-600 bg-purple-50 px-2 py-1 rounded-full">
                    +15.3%
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ $stats['image_count'] ?? 0 }}</h3>
                <p class="text-sm text-gray-600">Images</p>
            </div>
        </div>

        <!-- Videos -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-orange-100 rounded-lg">
                    <i class="fas fa-video text-orange-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-orange-600 bg-orange-50 px-2 py-1 rounded-full">
                    +5.7%
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ $stats['video_count'] ?? 0 }}</h3>
                <p class="text-sm text-gray-600">Videos</p>
            </div>
        </div>

        <!-- Raw Files -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-red-100 rounded-lg">
                    <i class="fas fa-file text-red-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-red-600 bg-red-50 px-2 py-1 rounded-full">
                    +2.1%
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ $stats['raw_count'] ?? 0 }}</h3>
                <p class="text-sm text-gray-600">Raw Files</p>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Upload Trend -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-semibold text-gray-900">Upload Trend</h2>
                <div class="flex gap-2">
                    <button class="px-3 py-1 text-xs bg-emerald-100 text-emerald-700 rounded-lg font-medium">Monthly</button>
                    <button class="px-3 py-1 text-xs text-gray-600 hover:bg-gray-100 rounded-lg">Weekly</button>
                </div>
            </div>
            <div class="h-64 flex items-center justify-center bg-gray-50 rounded-lg">
                <canvas id="uploadChart" class="w-full h-full"></canvas>
            </div>
        </div>

        <!-- File Type Distribution -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-semibold text-gray-900">File Type Distribution</h2>
                <button class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-ellipsis-h"></i>
                </button>
            </div>
            <div class="h-64 flex items-center justify-center bg-gray-50 rounded-lg">
                <canvas id="typeChart" class="w-full h-full"></canvas>
            </div>
        </div>
    </div>

    <!-- Storage by Folder -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 mb-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-semibold text-gray-900">Storage by Folder</h2>
            <a href="{{ route('admin.cloudinary.folders') }}" class="text-emerald-600 hover:text-emerald-700 text-sm font-medium">View All</a>
        </div>
        <div class="space-y-4">
            @if(isset($stats['folder_stats']) && count($stats['folder_stats']) > 0)
                @php
                    $maxStorage = max(array_column($stats['folder_stats'], 'storage_bytes'));
                @endphp
                @foreach($stats['folder_stats'] as $index => $folder)
                    @php
                        $percentage = $maxStorage > 0 ? ($folder['storage_bytes'] / $maxStorage) * 100 : 0;
                        $colors = ['emerald', 'blue', 'purple', 'orange', 'red'];
                        $color = $colors[$index % count($colors)];
                    @endphp
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-{{ $color }}-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-folder text-{{ $color }}-600"></i>
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between mb-1">
                                <span class="font-medium text-gray-900">{{ $folder['name'] ?? 'Unknown' }}</span>
                                <span class="text-sm text-gray-600">{{ $folder['storage_used'] ?? '0 B' }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-{{ $color }}-500 h-2 rounded-full" style="width: {{ $percentage }}%"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center py-8">
                    <i class="fas fa-folder-open text-4xl text-gray-300 mb-3"></i>
                    <p class="text-gray-500">No folder data available</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-semibold text-gray-900">Recent Activity</h2>
            <a href="{{ route('admin.cloudinary.index') }}" class="text-emerald-600 hover:text-emerald-700 text-sm font-medium">View All Files</a>
        </div>
        <div class="space-y-4">
            @if(isset($stats['recent_files']) && count($stats['recent_files']) > 0)
                @foreach($stats['recent_files'] as $file)
                    @php
                        $timeAgo = \Carbon\Carbon::parse($file['created_at'])->diffForHumans();
                        $fileSize = number_format($file['bytes'] / 1024 / 1024, 2) . ' MB';
                        $icon = $file['resource_type'] == 'image' ? 'fa-image' : 
                               ($file['resource_type'] == 'video' ? 'fa-video' : 'fa-file');
                        $color = $file['resource_type'] == 'image' ? 'emerald' : 
                                ($file['resource_type'] == 'video' ? 'blue' : 'gray');
                    @endphp
                    <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                        <div class="w-10 h-10 bg-{{ $color }}-100 rounded-full flex items-center justify-center">
                            <i class="fas {{ $icon }} text-{{ $color }}-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-medium text-gray-900 text-sm">{{ basename($file['public_id']) }}</p>
                            <p class="text-xs text-gray-500">{{ $timeAgo }}</p>
                        </div>
                        <span class="text-xs text-{{ $color }}-600 font-medium">{{ $fileSize }}</span>
                    </div>
                @endforeach
            @else
                <div class="text-center py-8">
                    <i class="fas fa-clock text-4xl text-gray-300 mb-3"></i>
                    <p class="text-gray-500">No recent activity</p>
                </div>
            @endif
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Upload Trend Chart
    const uploadCtx = document.getElementById('uploadChart').getContext('2d');
    new Chart(uploadCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Uploads',
                data: [12, 19, 15, 25, 22, 30],
                borderColor: 'rgb(16, 185, 129)',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // File Type Distribution Chart
    const typeCtx = document.getElementById('typeChart').getContext('2d');
    const distributionData = @json($stats['file_type_distribution'] ?? ['images' => 0, 'videos' => 0, 'raw' => 0]);
    
    new Chart(typeCtx, {
        type: 'doughnut',
        data: {
            labels: ['Images', 'Videos', 'Raw Files'],
            datasets: [{
                data: [distributionData.images, distributionData.videos, distributionData.raw],
                backgroundColor: [
                    'rgb(16, 185, 129)',
                    'rgb(59, 130, 246)',
                    'rgb(251, 146, 60)'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
});
</script>
@endsection
