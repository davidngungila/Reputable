@extends('layouts.public')

@section('title', $route->name . ' - Mountain Trekking Route')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <div class="relative h-[60vh] min-h-[400px]">
        @if($route->images && !empty($route->images[0]))
            <img src="{{ $route->images[0] }}" alt="{{ $route->name }}" class="w-full h-full object-cover">
        @else
            <div class="w-full h-full bg-gradient-to-br from-emerald-600 to-blue-700 flex items-center justify-center">
                <i class="ph-bold ph-mountains text-white text-9xl opacity-20"></i>
            </div>
        @endif
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="absolute inset-0 flex items-center justify-center text-white text-center">
            <div class="container mx-auto px-4">
                <span class="px-4 py-2 bg-emerald-600 rounded-full text-sm font-bold mb-4 inline-block">
                    {{ $route->mountain_name ?? 'Mountain Trekking' }}
                </span>
                <h1 class="text-4xl md:text-6xl font-bold mb-4">{{ $route->name }}</h1>
                <div class="flex flex-wrap justify-center gap-6 text-lg">
                    <div class="flex items-center">
                        <i class="ph-bold ph-clock mr-2"></i>
                        {{ $route->duration }}
                    </div>
                    <div class="flex items-center">
                        <i class="ph-bold ph-chart-line mr-2"></i>
                        {{ $route->difficulty }}
                    </div>
                    @if($route->success_rate)
                    <div class="flex items-center">
                        <i class="ph-bold ph-trend-up mr-2"></i>
                        {{ $route->success_rate }} Success Rate
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-12">
                <!-- Overview -->
                <section>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Route Overview</h2>
                    <div class="prose prose-lg max-w-none text-gray-600">
                        {!! nl2br(e($route->description)) !!}
                    </div>
                </section>

                <!-- Itinerary -->
                @if($route->itinerary && count($route->itinerary) > 0)
                <section>
                    <h2 class="text-3xl font-bold text-gray-900 mb-8">Detailed Itinerary</h2>
                    <div class="space-y-8">
                        @foreach($route->itinerary as $day)
                        <div class="flex gap-6">
                            <div class="flex-none">
                                <div class="w-12 h-12 bg-emerald-600 text-white rounded-full flex items-center justify-center font-bold text-lg">
                                    {{ $day['day'] ?? $loop->iteration }}
                                </div>
                                @if(!$loop->last)
                                <div class="w-px h-full bg-emerald-200 mx-auto mt-2"></div>
                                @endif
                            </div>
                            <div class="pb-8">
                                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $day['title'] ?? 'Day ' . ($day['day'] ?? $loop->iteration) }}</h3>
                                <p class="text-gray-600 leading-relaxed">{{ $day['description'] ?? '' }}</p>
                                @if(isset($day['accommodation']))
                                <div class="mt-4 flex items-center text-sm text-gray-500">
                                    <i class="ph-bold ph-bed mr-2 text-emerald-600"></i>
                                    Accommodation: {{ $day['accommodation'] }}
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>
                @endif

                <!-- Highlights -->
                @if($route->highlights && count($route->highlights) > 0)
                <section class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Route Highlights</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($route->highlights as $highlight)
                        <div class="flex items-start">
                            <i class="ph-bold ph-check-circle text-emerald-600 mt-1 mr-3 flex-none"></i>
                            <span class="text-gray-700">{{ $highlight }}</span>
                        </div>
                        @endforeach
                    </div>
                </section>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-8">
                <!-- Quick Info Card -->
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 sticky top-24">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Trek Summary</h3>
                    
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between items-center py-3 border-b border-gray-100">
                            <span class="text-gray-500">Duration</span>
                            <span class="font-bold text-gray-900">{{ $route->duration }}</span>
                        </div>
                        <div class="flex justify-between items-center py-3 border-b border-gray-100">
                            <span class="text-gray-500">Difficulty</span>
                            <span class="font-bold text-emerald-600">{{ $route->difficulty }}</span>
                        </div>
                        @if($route->price_from)
                        <div class="flex justify-between items-center py-3 border-b border-gray-100">
                            <span class="text-gray-500">Price From</span>
                            <span class="font-bold text-gray-900">{{ $route->formatted_price }}</span>
                        </div>
                        @endif
                        @if($route->best_season)
                        <div class="flex justify-between items-center py-3 border-b border-gray-100">
                            <span class="text-gray-500">Best Season</span>
                            <span class="font-bold text-gray-900">{{ $route->best_season }}</span>
                        </div>
                        @endif
                    </div>

                    <a href="{{ route('inquiries.create') }}?tour_id={{ $route->id }}&type=mountain" 
                       class="block w-full py-4 bg-emerald-600 text-white text-center rounded-xl font-bold hover:bg-emerald-700 transition-colors shadow-lg shadow-emerald-200 mb-4">
                        Book This Route
                    </a>
                    
                    <p class="text-center text-sm text-gray-500">
                        <i class="ph-bold ph-info mr-1"></i>
                        Prices are per person and subject to change.
                    </p>
                </div>

                <!-- Included/Excluded -->
                @if($route->included || $route->excluded)
                <div class="bg-gray-100 rounded-2xl p-6">
                    @if($route->included)
                    <div class="mb-6">
                        <h4 class="font-bold text-gray-900 mb-4">What's Included</h4>
                        <ul class="space-y-2">
                            @foreach($route->included as $item)
                            <li class="flex items-start text-sm text-gray-600">
                                <i class="ph-bold ph-plus-circle text-emerald-600 mt-0.5 mr-2 flex-none"></i>
                                {{ $item }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if($route->excluded)
                    <div>
                        <h4 class="font-bold text-gray-900 mb-4">What's Excluded</h4>
                        <ul class="space-y-2">
                            @foreach($route->excluded as $item)
                            <li class="flex items-start text-sm text-gray-600">
                                <i class="ph-bold ph-minus-circle text-red-500 mt-0.5 mr-2 flex-none"></i>
                                {{ $item }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
