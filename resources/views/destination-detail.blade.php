@extends('layouts.public')

@section('title', $destination->name ?? 'Destination Detail')

@section('content')
<div class="min-h-screen bg-slate-50">
    <!-- Hero Section -->
    @if(!empty($destination->images) && count($destination->images) > 0)
    <div class="relative h-96 overflow-hidden">
        <img src="{{ asset($destination->images[0]) }}" alt="{{ $destination->name }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-8">
            <div class="max-w-7xl mx-auto">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $destination->name }}</h1>
                <p class="text-slate-200 text-lg">{{ $destination->location }}</p>
            </div>
        </div>
    </div>
    @else
    <div class="relative h-96 overflow-hidden">
        <img src="{{ asset('images/01.jpg') }}" alt="{{ $destination->name }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-8">
            <div class="max-w-7xl mx-auto">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $destination->name }}</h1>
                <p class="text-slate-200 text-lg">{{ $destination->location }}</p>
            </div>
        </div>
    </div>
    @endif

    <!-- Content Section -->
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Description -->
                <div class="bg-white rounded-2xl shadow-sm p-8 mb-8">
                    <h2 class="text-2xl font-bold text-slate-900 mb-4">About This Destination</h2>
                    <p class="text-slate-600 leading-relaxed">{{ $destination->description }}</p>
                </div>

                <!-- Highlights -->
                @if(!empty($destination->highlights) && count($destination->highlights) > 0)
                <div class="bg-white rounded-2xl shadow-sm p-8 mb-8">
                    <h2 class="text-2xl font-bold text-slate-900 mb-4">Highlights</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($destination->highlights as $highlight)
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center">
                                <i class="ph-bold ph-check text-emerald-600"></i>
                            </div>
                            <span class="text-slate-700">{{ $highlight }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Best Time to Visit -->
                @if($destination->best_time_to_visit)
                <div class="bg-white rounded-2xl shadow-sm p-8 mb-8">
                    <h2 class="text-2xl font-bold text-slate-900 mb-4">Best Time to Visit</h2>
                    <p class="text-slate-600">{{ $destination->best_time_to_visit }}</p>
                </div>
                @endif

                <!-- Weather Info -->
                @if(!empty($destination->weather_info))
                <div class="bg-white rounded-2xl shadow-sm p-8 mb-8">
                    <h2 class="text-2xl font-bold text-slate-900 mb-4">Weather Information</h2>
                    <p class="text-slate-600">{{ $destination->weather_info }}</p>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Quick Info Card -->
                <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
                    <h3 class="text-lg font-bold text-slate-900 mb-4">Quick Info</h3>
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <i class="ph ph-map-pin text-emerald-600 text-xl"></i>
                            <div>
                                <p class="text-sm text-slate-500">Location</p>
                                <p class="font-semibold text-slate-900">{{ $destination->location }}</p>
                            </div>
                        </div>
                        @if($destination->best_time_to_visit)
                        <div class="flex items-center gap-3">
                            <i class="ph ph-calendar text-emerald-600 text-xl"></i>
                            <div>
                                <p class="text-sm text-slate-500">Best Time</p>
                                <p class="font-semibold text-slate-900">{{ Str::limit($destination->best_time_to_visit, 30) }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Gallery -->
                @if(!empty($destination->images) && count($destination->images) > 1)
                <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
                    <h3 class="text-lg font-bold text-slate-900 mb-4">Gallery</h3>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach(array_slice($destination->images, 1, 4) as $image)
                        <img src="{{ asset($image) }}" alt="{{ $destination->name }}" class="w-full h-24 object-cover rounded-lg">
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- CTA -->
                <div class="bg-emerald-600 rounded-2xl shadow-sm p-6 text-white">
                    <h3 class="text-lg font-bold mb-2">Ready to Explore?</h3>
                    <p class="text-emerald-100 text-sm mb-4">Book your tour to {{ $destination->name }} today</p>
                    <a href="/tours" class="inline-block bg-white text-emerald-600 px-6 py-3 rounded-xl font-bold hover:bg-emerald-50 transition-colors">
                        View Tours
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
