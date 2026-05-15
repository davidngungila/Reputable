@extends('layouts.admin')

@section('title', $mountain->name . ' - Details')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $mountain->name }}</h1>
            <p class="text-gray-600">Comprehensive mountain details and trekking management</p>
        </div>
        <div class="flex gap-3 mt-4 lg:mt-0">
            <a href="{{ route('admin.mountains.admin.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-arrow-left mr-2"></i>Back to Mountains
            </a>
            <a href="{{ route('admin.mountains.edit', $mountain->id) }}" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-pencil mr-2"></i>Edit Mountain
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Stats & Info -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="text-center p-4 bg-emerald-50 rounded-xl">
                        <p class="text-xs font-bold text-emerald-600 uppercase tracking-wider mb-1">Height</p>
                        <p class="text-xl font-bold text-emerald-700">{{ $mountain->height }} {{ $mountain->height_unit }}</p>
                    </div>
                    <div class="text-center p-4 bg-blue-50 rounded-xl">
                        <p class="text-xs font-bold text-blue-600 uppercase tracking-wider mb-1">Difficulty</p>
                        <p class="text-xl font-bold text-blue-700">{{ $mountain->difficulty_level ?? 'Moderate' }}</p>
                    </div>
                    <div class="text-center p-4 bg-purple-50 rounded-xl">
                        <p class="text-xs font-bold text-purple-600 uppercase tracking-wider mb-1">Duration</p>
                        <p class="text-xl font-bold text-purple-700">{{ $mountain->duration_days ?? '0' }} Days</p>
                    </div>
                    <div class="text-center p-4 bg-orange-50 rounded-xl">
                        <p class="text-xs font-bold text-orange-600 uppercase tracking-wider mb-1">Price From</p>
                        <p class="text-xl font-bold text-orange-700">${{ number_format($mountain->price_from, 0) }}</p>
                    </div>
                </div>

                <div class="mt-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Description</h3>
                    <div class="prose prose-sm max-w-none text-gray-600">
                        {!! nl2br(e($mountain->description)) !!}
                    </div>
                </div>

                @if($mountain->highlights)
                <div class="mt-8 pt-8 border-t border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Mountain Highlights</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        @foreach($mountain->highlights as $highlight)
                        <div class="flex items-center p-3 bg-gray-50 rounded-xl">
                            <i class="ph-bold ph-check-circle text-emerald-500 mr-2"></i>
                            <span class="text-sm text-gray-700">{{ $highlight }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Trekking Routes Link -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="ph-bold ph-map-trifold text-emerald-600 text-xl"></i>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">Trekking Routes</h2>
                    </div>
                    @if($mountain->slug == 'kilimanjaro')
                    <a href="{{ route('admin.mountain.kilimanjaro-routes') }}" class="px-4 py-2 bg-emerald-50 text-emerald-700 rounded-lg font-bold text-sm hover:bg-emerald-100 transition-colors">
                        Manage Routes
                    </a>
                    @elseif($mountain->slug == 'meru')
                    <a href="{{ route('admin.mountain.meru-climbing') }}" class="px-4 py-2 bg-emerald-50 text-emerald-700 rounded-lg font-bold text-sm hover:bg-emerald-100 transition-colors">
                        Manage Routes
                    </a>
                    @endif
                </div>
                <p class="text-gray-600 text-sm">Configure individual climbing routes, success rates, and pricing for this mountain.</p>
            </div>
        </div>

        <!-- Sidebar Details -->
        <div class="space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Location & Weather</h3>
                <div class="space-y-4">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Region</p>
                        <p class="text-sm text-gray-900 font-medium">{{ $mountain->location }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Best Season</p>
                        <p class="text-sm text-gray-900 font-medium">{{ $mountain->best_season ?? 'June - October' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Weather Info</p>
                        <p class="text-sm text-gray-600 italic">"{{ $mountain->weather_info ?? 'Varies by altitude' }}"</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Media</h3>
                @if($mountain->images && count($mountain->images) > 0)
                <div class="grid grid-cols-2 gap-2">
                    @foreach(array_slice($mountain->images, 0, 4) as $image)
                    <img src="{{ $image }}" class="w-full h-24 object-cover rounded-lg">
                    @endforeach
                </div>
                @else
                <div class="text-center py-8 bg-gray-50 rounded-xl border-2 border-dashed border-gray-200">
                    <i class="ph-bold ph-images text-gray-400 text-2xl"></i>
                    <p class="text-xs text-gray-500 mt-2">No images uploaded</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
