@extends('layouts.public')

@section('title', 'Mountain Trekking Equipment - Kilimanjaro Climbing Gear')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-emerald-100">
    <!-- Enhanced Hero Section -->
    <div class="relative bg-gradient-to-r from-emerald-800 to-orange-600 text-white">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative container mx-auto px-4 pt-24 pb-16">
            <div class="text-center max-w-4xl mx-auto">
                <!-- Premium Badge -->
                <div class="flex items-center justify-center gap-3 mb-6 flex-wrap">
                    <span class="px-4 py-2 bg-gradient-to-r from-emerald-800 to-orange-600 text-white rounded-full text-sm font-bold shadow-lg">
                        <i class="ph-bold ph-backpack mr-2"></i>EQUIPMENT GUIDE
                    </span>
                    <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-sm font-medium">
                        Complete Gear List
                    </span>
                </div>
                
                <!-- Enhanced Title -->
                <h1 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-white to-emerald-300 bg-clip-text text-transparent">
                        Mountain Trekking Equipment
                    </span>
                </h1>
                
                <!-- Enhanced Description -->
                <p class="text-xl text-white/90 mb-8 max-w-3xl mx-auto leading-relaxed">
                    Comprehensive gear guide for your Kilimanjaro adventure. From essential equipment to optional items, 
                    everything you need for a safe and successful climb.
                </p>
            </div>
        </div>
    </div>

    <!-- Equipment Sections -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            @php
                $categories = $equipment->groupBy('category');
            @endphp

            @forelse($categories as $category => $items)
                <div class="mb-20 last:mb-0">
                    <div class="flex items-center mb-10">
                        <div class="w-16 h-16 bg-gradient-to-br from-emerald-700 to-orange-500 rounded-xl flex items-center justify-center text-white mr-4 shadow-lg">
                            @php
                                $icon = match(strtolower($category)) {
                                    'clothing' => 'ph-t-shirt',
                                    'footwear' => 'ph-boot',
                                    'camping', 'sleeping' => 'ph-tent',
                                    'technical', 'navigation' => 'ph-compass',
                                    'personal', 'hygiene' => 'ph-first-aid',
                                    default => 'ph-backpack'
                                };
                            @endphp
                            <i class="ph-bold {{ $icon }} text-2xl"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">{{ ucfirst($category) }}</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($items as $item)
                            <div class="bg-gradient-to-br from-emerald-50 to-orange-50 rounded-2xl p-6 border border-emerald-100 hover:shadow-xl transition-all group">
                                <div class="flex justify-between items-start mb-4">
                                    <h3 class="text-xl font-bold text-gray-900">{{ $item->name }}</h3>
                                    @if($item->is_essential)
                                        <span class="px-2 py-1 bg-orange-600 text-white text-[10px] font-bold rounded uppercase">Essential</span>
                                    @endif
                                </div>
                                <p class="text-gray-600 text-sm mb-6 leading-relaxed">
                                    {{ $item->description }}
                                </p>
                                
                                @if($item->specifications)
                                    <div class="space-y-2">
                                        <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest">Recommended</h4>
                                        <ul class="space-y-2">
                                            @php
                                                $specs = is_array($item->specifications) ? $item->specifications : explode(',', $item->specifications);
                                            @endphp
                                            @foreach($specs as $spec)
                                                <li class="flex items-center text-sm text-gray-700">
                                                    <i class="ph-bold ph-check-circle text-emerald-500 mr-2 flex-shrink-0"></i>
                                                    {{ trim($spec) }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <div class="text-center py-20">
                    <div class="w-20 h-20 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-backpack text-emerald-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Equipment List Coming Soon</h3>
                    <p class="text-gray-600">We are currently updating our gear guide. Please check back later.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Rental CTA Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-emerald-100 border-t border-emerald-100">
        <div class="container mx-auto px-4 text-center">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Need to Rent Gear?</h2>
                <p class="text-lg text-gray-600 mb-8">
                    Don't worry if you don't have all the equipment. We offer high-quality rental gear for most items on this list. 
                    Contact us for our current rental price list.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('inquiries.create') }}?type=mountain&subject=Gear+Rental" 
                       class="px-8 py-4 bg-emerald-600 text-white rounded-xl font-bold text-lg hover:bg-emerald-700 transition-all shadow-lg">
                        <i class="ph-bold ph-hand-coins mr-2"></i>Inquire About Rental
                    </a>
                    <a href="{{ route('mountain-trekking.guides') }}" 
                       class="px-8 py-4 bg-white text-emerald-800 rounded-xl font-bold text-lg hover:bg-gray-50 transition-all border border-emerald-200">
                        <i class="ph-bold ph-users-three mr-2"></i>Meet Our Guides
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
