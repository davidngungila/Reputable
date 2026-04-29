@extends('layouts.public')

@section('title', $mountain->name . ' - Equipment Guide')

@section('content')
<!-- Hero Section -->
<section class="relative h-64 bg-cover bg-center" style="background-image: url('{{ !empty($mountain->images) ? $mountain->images[0] : 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468773/tree-2600482_1920_c50vn6.jpg' }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative container mx-auto px-4 h-full flex items-center">
        <div class="text-white">
            <h1 class="text-4xl font-bold mb-2">{{ $mountain->name }} Equipment Guide</h1>
            <p class="text-lg">Essential gear for your climb</p>
        </div>
    </div>
</section>

<!-- Breadcrumb -->
<section class="py-4 bg-gray-50">
    <div class="container mx-auto px-4">
        <nav class="flex text-sm">
            <a href="{{ route('mountains.index') }}" class="text-gray-600 hover:text-gray-900">Mountains</a>
            <span class="mx-2 text-gray-400">/</span>
            <a href="{{ route('mountains.show', $mountain->slug) }}" class="text-gray-600 hover:text-gray-900">{{ $mountain->name }}</a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-gray-900 font-medium">Equipment</span>
        </nav>
    </div>
</section>

<!-- Equipment Guide Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Complete Equipment Checklist</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Everything you need for a successful and safe {{ $mountain->name }} climb</p>
        </div>

        @if($mountain->equipment_guide)
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Clothing -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-blue-600 p-6 text-white">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        <h3 class="text-xl font-bold">Clothing</h3>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">Essential clothing items for all weather conditions and altitudes.</p>
                    @if(!empty($mountain->equipment_guide['clothing']))
                    <ul class="space-y-3">
                        @foreach($mountain->equipment_guide['clothing'] as $item)
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700">{{ $item }}</span>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>

            <!-- Gear -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-green-600 p-6 text-white">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                        <h3 class="text-xl font-bold">Essential Gear</h3>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">Technical equipment and climbing essentials.</p>
                    @if(!empty($mountain->equipment_guide['gear']))
                    <ul class="space-y-3">
                        @foreach($mountain->equipment_guide['gear'] as $item)
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700">{{ $item }}</span>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>

            <!-- Optional Items -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-purple-600 p-6 text-white">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-xl font-bold">Optional Items</h3>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">Additional items to enhance your climbing experience.</p>
                    @if(!empty($mountain->equipment_guide['optional']))
                    <ul class="space-y-3">
                        @foreach($mountain->equipment_guide['optional'] as $item)
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-purple-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700">{{ $item }}</span>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
        @else
        <div class="text-center py-12">
            <div class="bg-gray-100 rounded-lg p-8 max-w-2xl mx-auto">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                </svg>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Equipment Guide Coming Soon</h3>
                <p class="text-gray-600">We're preparing a comprehensive equipment guide for {{ $mountain->name }}. Please contact us for current equipment recommendations.</p>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Packing Tips -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold mb-8 text-center">Packing Tips & Guidelines</h2>
            
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold">Layering System</h3>
                    </div>
                    <p class="text-gray-600">Dress in layers to adapt to changing weather conditions. Base layer wicks moisture, mid layer insulates, outer layer protects from elements.</p>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold">Weight Distribution</h3>
                    </div>
                    <p class="text-gray-600">Pack heavier items close to your back and centered. Keep frequently used items accessible for convenience on the trail.</p>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold">Weather Protection</h3>
                    </div>
                    <p class="text-gray-600">Always pack rain gear regardless of forecast. Mountain weather can change rapidly and unexpectedly.</p>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold">Test Your Gear</h3>
                    </div>
                    <p class="text-gray-600">Test all equipment before your climb, especially boots and clothing. Break in new hiking boots to prevent blisters.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Equipment Rental -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="bg-blue-600 rounded-lg p-8 text-center text-white">
            <h2 class="text-3xl font-bold mb-4">Need Equipment?</h2>
            <p class="text-blue-100 mb-6 max-w-2xl mx-auto">We offer high-quality equipment rental for all your climbing needs. Save on luggage costs and ensure you have the right gear.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact?service=equipment-rental" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    Rent Equipment
                </a>
                <a href="{{ route('mountains.show', $mountain->slug) }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition">
                    Back to {{ $mountain->name }}
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
