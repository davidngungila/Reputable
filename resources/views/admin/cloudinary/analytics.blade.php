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
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
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
            <button class="text-emerald-600 hover:text-emerald-700 text-sm font-medium">View All</button>
        </div>
        <div class="space-y-4">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-folder text-emerald-600"></i>
                </div>
                <div class="flex-1">
                    <div class="flex justify-between mb-1">
                        <span class="font-medium text-gray-900">reputable-tours</span>
                        <span class="text-sm text-gray-600">45.2 MB</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-emerald-500 h-2 rounded-full" style="width: 65%"></div>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-folder text-blue-600"></i>
                </div>
                <div class="flex-1">
                    <div class="flex justify-between mb-1">
                        <span class="font-medium text-gray-900">tours</span>
                        <span class="text-sm text-gray-600">28.5 MB</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: 40%"></div>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-folder text-purple-600"></i>
                </div>
                <div class="flex-1">
                    <div class="flex justify-between mb-1">
                        <span class="font-medium text-gray-900">destinations</span>
                        <span class="text-sm text-gray-600">15.8 MB</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-purple-500 h-2 rounded-full" style="width: 25%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-semibold text-gray-900">Recent Activity</h2>
            <a href="{{ route('admin.cloudinary.index') }}" class="text-emerald-600 hover:text-emerald-700 text-sm font-medium">View All Files</a>
        </div>
        <div class="space-y-4">
            <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-upload text-emerald-600"></i>
                </div>
                <div class="flex-1">
                    <p class="font-medium text-gray-900 text-sm">Uploaded serengeti-lion.jpg</p>
                    <p class="text-xs text-gray-500">2 hours ago</p>
                </div>
                <span class="text-xs text-emerald-600 font-medium">2.4 MB</span>
            </div>
            <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-edit text-blue-600"></i>
                </div>
                <div class="flex-1">
                    <p class="font-medium text-gray-900 text-sm">Transformed ngorongoro-crater.jpg</p>
                    <p class="text-xs text-gray-500">5 hours ago</p>
                </div>
                <span class="text-xs text-blue-600 font-medium">Optimized</span>
            </div>
            <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-trash text-red-600"></i>
                </div>
                <div class="flex-1">
                    <p class="font-medium text-gray-900 text-sm">Deleted old-banner.png</p>
                    <p class="text-xs text-gray-500">1 day ago</p>
                </div>
                <span class="text-xs text-red-600 font-medium">Deleted</span>
            </div>
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
    new Chart(typeCtx, {
        type: 'doughnut',
        data: {
            labels: ['Images', 'Videos', 'Raw Files'],
            datasets: [{
                data: [65, 25, 10],
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
