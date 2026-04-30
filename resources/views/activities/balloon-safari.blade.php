@extends('layouts.public')

@section('title', 'Balloon Safari - Aerial Adventure Over Tanzania')

@section('content')
<div class="pt-24">
    <!-- Hero Section -->
    <section class="relative h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://res.cloudinary.com/dqflffa1o/video/upload/v1777468764/SaveClip.App_AQOTILD4rjPC4d-jkyKhlFB8w5jzgwwHNZy2ZBVB__5f9d8QZ3fFfwO_WEBwTKs_0ynC-FS0pr0KVrGm-HCmK0TXrJweOZ40Mn02NhE_gaddev.mp4" 
                 class="w-full h-full object-cover" alt="Balloon Safari">
            <div class="absolute inset-0 bg-gradient-to-r from-orange-900/80 to-red-900/60"></div>
        </div>
        <div class="relative z-10 text-center px-6">
            <h1 class="text-5xl md:text-7xl font-serif font-black text-white mb-6 border-move">Balloon Safari</h1>
            <p class="text-xl text-orange-50/90 max-w-2xl mx-auto">Experience the magic of floating over Tanzania's wilderness at sunrise</p>
            <div class="mt-8">
                <a href="/contact" class="inline-flex items-center gap-3 px-8 py-4 bg-orange-600 text-white font-bold rounded-full hover:bg-orange-700 transition-colors">
                    Book Balloon Flight <i class="ph-bold ph-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Overview Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-4xl font-serif font-black text-slate-900 mb-6">Spectacular Aerial Adventure</h2>
                    <p class="text-lg text-slate-600 mb-8 leading-relaxed">
                        Float silently above the Serengeti plains in a hot air balloon, witnessing wildlife and landscapes from a breathtaking perspective. This once-in-a-lifetime experience offers unparalleled photo opportunities and unforgettable memories.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                                <i class="ph-bold ph-sun text-orange-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">Sunrise Flights</h3>
                                <p class="text-sm text-slate-600">Early morning departures for perfect lighting</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                                <i class="ph-bold ph-camera text-orange-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">Photography Paradise</h3>
                                <p class="text-sm text-slate-600">Capture stunning aerial wildlife photos</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                                <i class="ph-bold ph-champagne text-orange-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">Champagne Breakfast</h3>
                                <p class="text-sm text-slate-600">Celebratory breakfast in the bush</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative h-48">
                    <img src="https://res.cloudinary.com/dqflffa1o/video/upload/v1777468763/SaveClip.App_AQPzVHLZw1D-ZQxCqez8VJhY0Wj_gPRHIUb7_rg-Ue-w9tvUw3tI75QPVL2NBB1j7c7DY1_kDcf1u9TdJIyygwIxo4VuSos0cfkIQEg_p6x1pk.mp4" 
                         class="w-full h-full object-cover" alt="Serengeti Air Balloon">
                    <div class="absolute -bottom-6 -right-6 bg-orange-600 text-white p-6 rounded-2xl shadow-xl">
                        <p class="text-3xl font-black">1 Hour</p>
                        <p class="text-sm font-bold">Flight Duration</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience Details Section -->
    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif font-black text-slate-900 mb-4">What to Expect</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Your balloon safari experience from start to finish</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Pre-Dawn Pickup -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-car text-orange-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Pre-Dawn Pickup</h3>
                    <p class="text-slate-600 text-sm">4:00 AM collection from your lodge with refreshments</p>
                </div>

                <!-- Launch Site -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-map-pin text-orange-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Launch Site</h3>
                    <p class="text-slate-600 text-sm">Watch the balloon inflation as the sun rises</p>
                </div>

                <!-- The Flight -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-airplane text-orange-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">The Flight</h3>
                    <p class="text-slate-600 text-sm">Silent float over wildlife and stunning landscapes</p>
                </div>

                <!-- Celebration -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-champagne text-orange-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Celebration</h3>
                    <p class="text-slate-600 text-sm">Champagne breakfast and flight certificate</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Balloon Safari Locations -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif font-black text-slate-900 mb-4">Balloon Safari Locations</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Choose from Tanzania's most spectacular balloon safari destinations</p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Serengeti Balloon Safari -->
                <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-3xl p-8 border border-orange-100">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center">
                            <i class="ph-bold ph-map-pin text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-900">Serengeti Balloon Safari</h3>
                            <p class="text-orange-600 font-medium">The Original & Most Famous</p>
                        </div>
                    </div>
                    
                    <p class="text-slate-600 mb-6">Float over the Serengeti plains during the Great Migration season. Witness thousands of wildebeest and zebras from above.</p>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-orange-600"></i>
                            <span class="text-slate-700">Great Migration viewing</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-orange-600"></i>
                            <span class="text-slate-700">Big Five photography opportunities</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-orange-600"></i>
                            <span class="text-slate-700">Year-round availability</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-3xl font-black text-orange-600">$550<span class="text-lg font-normal text-slate-600">/person</span></p>
                            <p class="text-sm text-slate-600">Including champagne breakfast</p>
                        </div>
                        <a href="/contact" class="px-6 py-3 bg-orange-600 text-white font-bold rounded-xl hover:bg-orange-700 transition-colors">
                            Book Now
                        </a>
                    </div>
                </div>

                <!-- Tarangire Balloon Safari -->
                <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-3xl p-8 border border-cyan-100">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-cyan-600 rounded-full flex items-center justify-center">
                            <i class="ph-bold ph-map-pin text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-900">Tarangire Balloon Safari</h3>
                            <p class="text-cyan-600 font-medium">Elephant Paradise from Above</p>
                        </div>
                    </div>
                    
                    <p class="text-slate-600 mb-6">Soar over Tarangire's ancient baobab trees and large elephant herds. Less crowded than Serengeti with equally spectacular views.</p>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-cyan-600"></i>
                            <span class="text-slate-700">Large elephant herds</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-cyan-600"></i>
                            <span class="text-slate-700">Ancient baobab trees</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-cyan-600"></i>
                            <span class="text-slate-700">Dry season special</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-3xl font-black text-cyan-600">$450<span class="text-lg font-normal text-slate-600">/person</span></p>
                            <p class="text-sm text-slate-600">Including bush breakfast</p>
                        </div>
                        <a href="/contact" class="px-6 py-3 bg-cyan-600 text-white font-bold rounded-xl hover:bg-cyan-700 transition-colors">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Safety & Requirements -->
    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif font-black text-slate-900 mb-4">Safety & Requirements</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Everything you need to know about your balloon safari adventure</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-6 shadow-lg">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="ph-bold ph-shield-check text-green-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Safety First</h3>
                    <ul class="space-y-2 text-slate-600 text-sm">
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-green-600 mt-0.5"></i>
                            <span>Internationally certified pilots</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-green-600 mt-0.5"></i>
                            <span>Regular equipment maintenance</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-green-600 mt-0.5"></i>
                            <span>Comprehensive insurance coverage</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="ph-bold ph-info text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">What's Included</h3>
                    <ul class="space-y-2 text-slate-600 text-sm">
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-blue-600 mt-0.5"></i>
                            <span>Round-trip transportation</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-blue-600 mt-0.5"></i>
                            <span>Champagne breakfast</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-blue-600 mt-0.5"></i>
                            <span>Flight certificate</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="ph-bold ph-warning text-orange-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Requirements</h3>
                    <ul class="space-y-2 text-slate-600 text-sm">
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-orange-600 mt-0.5"></i>
                            <span>Minimum age: 7 years</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-orange-600 mt-0.5"></i>
                            <span>No serious medical conditions</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-orange-600 mt-0.5"></i>
                            <span>Weather permitting</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-gradient-to-r from-orange-600 to-red-600">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-serif font-black text-white mb-6">Experience Tanzania from Above</h2>
            <p class="text-xl text-orange-50 mb-8">Book your unforgettable balloon safari adventure today</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="px-8 py-4 bg-white text-orange-600 font-bold rounded-full hover:bg-gray-100 transition-colors">
                    Book Balloon Safari
                </a>
                <a href="/tours" class="px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-orange-600 transition-colors">
                    View All Tours
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
