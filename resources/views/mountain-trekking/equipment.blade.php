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

    <!-- Essential Equipment Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Essential Equipment
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Must-have gear for your mountain trekking adventure. These items are essential for safety and comfort.
                </p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Clothing -->
                <div>
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-emerald-700 to-orange-500 rounded-xl flex items-center justify-center text-white mr-4">
                            <i class="ph-bold ph-t-shirt text-2xl"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900">Clothing</h3>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="bg-gradient-to-br from-emerald-50 to-orange-50 rounded-xl p-6 border border-emerald-200">
                            <h4 class="font-bold text-gray-900 mb-4 text-lg">Base Layer</h4>
                            <ul class="space-y-3">
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-emerald-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Thermal Underwear</span>
                                        <p class="text-gray-600 text-sm">Moisture-wicking thermal top and bottom (merino wool recommended)</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-emerald-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Hiking Shirts</span>
                                        <p class="text-gray-600 text-sm">2-3 quick-drying long-sleeve shirts</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-emerald-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Hiking Pants</span>
                                        <p class="text-gray-600 text-sm">2 pairs of convertible hiking pants</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="bg-gradient-to-br from-emerald-50 to-orange-50 rounded-xl p-6 border border-emerald-200">
                            <h4 class="font-bold text-gray-900 mb-4 text-lg">Mid Layer</h4>
                            <ul class="space-y-3">
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-emerald-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Fleece Jacket</span>
                                        <p class="text-gray-600 text-sm">Warm fleece jacket for insulation</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-emerald-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Softshell Jacket</span>
                                        <p class="text-gray-600 text-sm">Lightweight, water-resistant jacket</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="bg-gradient-to-br from-emerald-50 to-orange-50 rounded-xl p-6 border border-emerald-200">
                            <h4 class="font-bold text-gray-900 mb-4 text-lg">Outer Layer</h4>
                            <ul class="space-y-3">
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-emerald-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Waterproof Jacket</span>
                                        <p class="text-gray-600 text-sm">Gore-Tex or similar waterproof breathable jacket</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-emerald-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Waterproof Pants</span>
                                        <p class="text-gray-600 text-sm">Gore-Tex or similar waterproof breathable pants</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-emerald-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Down Parka</span>
                                        <p class="text-gray-600 text-sm">Warm down jacket for summit night (-10°C rating)</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Footwear & Accessories -->
                <div>
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-600 to-red-500 rounded-xl flex items-center justify-center text-white mr-4">
                            <i class="ph-bold ph-boot text-2xl"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900">Footwear & Accessories</h3>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-xl p-6 border border-orange-200">
                            <h4 class="font-bold text-gray-900 mb-4 text-lg">Footwear</h4>
                            <ul class="space-y-3">
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-orange-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Hiking Boots</span>
                                        <p class="text-gray-600 text-sm">Waterproof, broken-in hiking boots with ankle support</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-orange-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Camp Shoes</span>
                                        <p class="text-gray-600 text-sm">Lightweight sandals or sneakers for camp</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-orange-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Gaiters</span>
                                        <p class="text-gray-600 text-sm">Waterproof gaiters for dust and mud protection</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-xl p-6 border border-orange-200">
                            <h4 class="font-bold text-gray-900 mb-4 text-lg">Headwear</h4>
                            <ul class="space-y-3">
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-orange-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Warm Hat</span>
                                        <p class="text-gray-600 text-sm">Fleece or wool beanie for cold weather</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-orange-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Sun Hat</span>
                                        <p class="text-gray-600 text-sm">Wide-brimmed hat for sun protection</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-orange-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Balaclava/Neck Gaiter</span>
                                        <p class="text-gray-600 text-sm">For summit night protection</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-xl p-6 border border-orange-200">
                            <h4 class="font-bold text-gray-900 mb-4 text-lg">Gloves</h4>
                            <ul class="space-y-3">
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-orange-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Liner Gloves</span>
                                        <p class="text-gray-600 text-sm">Lightweight gloves for dexterity</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-orange-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Insulated Gloves</span>
                                        <p class="text-gray-600 text-sm">Warm gloves for cold conditions</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-orange-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Mittens</span>
                                        <p class="text-gray-600 text-sm">Waterproof mittens for summit night</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Camping & Technical Gear Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-emerald-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Camping & Technical Gear
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Technical equipment and camping gear for your mountain adventure.
                </p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Camping Equipment -->
                <div>
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-emerald-700 to-orange-500 rounded-xl flex items-center justify-center text-white mr-4">
                            <i class="ph-bold ph-tent text-2xl"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900">Camping Equipment</h3>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-lg">
                            <h4 class="font-bold text-gray-900 mb-4 text-lg">Sleeping System</h4>
                            <ul class="space-y-3">
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-emerald-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Sleeping Bag</span>
                                        <p class="text-gray-600 text-sm">4-season sleeping bag (-10°C to -20°C rating)</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-emerald-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Sleeping Pad</span>
                                        <p class="text-gray-600 text-sm">Insulated sleeping pad for warmth and comfort</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-emerald-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Pillow</span>
                                        <p class="text-gray-600 text-sm">Inflatable or compressible pillow</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-lg">
                            <h4 class="font-bold text-gray-900 mb-4 text-lg">Backpack & Storage</h4>
                            <ul class="space-y-3">
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-emerald-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Backpack</span>
                                        <p class="text-gray-600 text-sm">40-50L backpack with rain cover</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-emerald-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Duffel Bag</span>
                                        <p class="text-gray-600 text-sm">Large duffel bag for porters to carry (90L)</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-emerald-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Dry Bags</span>
                                        <p class="text-gray-600 text-sm">Waterproof bags for electronics and clothes</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Technical Equipment -->
                <div>
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-600 to-red-500 rounded-xl flex items-center justify-center text-white mr-4">
                            <i class="ph-bold ph-compass text-2xl"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900">Technical Equipment</h3>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-lg">
                            <h4 class="font-bold text-gray-900 mb-4 text-lg">Navigation & Safety</h4>
                            <ul class="space-y-3">
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-orange-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Trekking Poles</span>
                                        <p class="text-gray-600 text-sm">Adjustable trekking poles for stability</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-orange-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Headlamp</span>
                                        <p class="text-gray-600 text-sm">Bright headlamp with extra batteries</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-orange-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">First Aid Kit</span>
                                        <p class="text-gray-600 text-sm">Personal first aid kit with blister treatment</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-lg">
                            <h4 class="font-bold text-gray-900 mb-4 text-lg">Hydration & Nutrition</h4>
                            <ul class="space-y-3">
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-orange-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Water Bottles</span>
                                        <p class="text-gray-600 text-sm">2-3 water bottles or hydration system (3L total)</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-orange-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Water Purification</span>
                                        <p class="text-gray-600 text-sm">Water purification tablets or filter</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <i class="ph-bold ph-check-circle text-orange-600 mr-3 mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-semibold text-gray-900">Energy Snacks</span>
                                        <p class="text-gray-600 text-sm">High-energy snacks and electrolytes</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional Equipment Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Optional Equipment
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Items that can enhance your comfort and experience on the mountain.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Comfort Items -->
                <div class="bg-gradient-to-br from-emerald-50 to-orange-50 rounded-2xl p-8 border border-emerald-200">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-emerald-700 to-orange-500 rounded-full flex items-center justify-center text-white mx-auto mb-4">
                            <i class="ph-bold ph-couch text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Comfort Items</h3>
                    </div>
                    <ul class="space-y-3">
                        <li class="flex items-center">
                            <i class="ph-bold ph-check-circle text-emerald-600 mr-2"></i>
                            <span class="text-gray-700">Portable camping chair</span>
                        </li>
                        <li class="flex items-center">
                            <i class="ph-bold ph-check-circle text-emerald-600 mr-2"></i>
                            <span class="text-gray-700">Solar charger/power bank</span>
                        </li>
                        <li class="flex items-center">
                            <i class="ph-bold ph-check-circle text-emerald-600 mr-2"></i>
                            <span class="text-gray-700">Book or e-reader</span>
                        </li>
                        <li class="flex items-center">
                            <i class="ph-bold ph-check-circle text-emerald-600 mr-2"></i>
                            <span class="text-gray-700">Earplugs for sleeping</span>
                        </li>
                        <li class="flex items-center">
                            <i class="ph-bold ph-check-circle text-emerald-600 mr-2"></i>
                            <span class="text-gray-700">Eye mask for sleeping</span>
                        </li>
                    </ul>
                </div>

                <!-- Electronics -->
                <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-2xl p-8 border border-orange-200">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-600 to-red-500 rounded-full flex items-center justify-center text-white mx-auto mb-4">
                            <i class="ph-bold ph-camera text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Electronics</h3>
                    </div>
                    <ul class="space-y-3">
                        <li class="flex items-center">
                            <i class="ph-bold ph-check-circle text-orange-600 mr-2"></i>
                            <span class="text-gray-700">Camera with extra batteries</span>
                        </li>
                        <li class="flex items-center">
                            <i class="ph-bold ph-check-circle text-orange-600 mr-2"></i>
                            <span class="text-gray-700">Smartphone with offline maps</span>
                        </li>
                        <li class="flex items-center">
                            <i class="ph-bold ph-check-circle text-orange-600 mr-2"></i>
                            <span class="text-gray-700">GPS device (optional)</span>
                        </li>
                        <li class="flex items-center">
                            <i class="ph-bold ph-check-circle text-orange-600 mr-2"></i>
                            <span class="text-gray-700">Portable speaker</span>
                        </li>
                        <li class="flex items-center">
                            <i class="ph-bold ph-check-circle text-orange-600 mr-2"></i>
                            <span class="text-gray-700">Satellite communicator</span>
                        </li>
                    </ul>
                </div>

                <!-- Health & Personal -->
                <div class="bg-gradient-to-br from-gray-50 to-emerald-50 rounded-2xl p-8 border border-gray-200">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-gray-600 to-emerald-600 rounded-full flex items-center justify-center text-white mx-auto mb-4">
                            <i class="ph-bold ph-heart text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Health & Personal</h3>
                    </div>
                    <ul class="space-y-3">
                        <li class="flex items-center">
                            <i class="ph-bold ph-check-circle text-gray-600 mr-2"></i>
                            <span class="text-gray-700">Personal medications</span>
                        </li>
                        <li class="flex items-center">
                            <i class="ph-bold ph-check-circle text-gray-600 mr-2"></i>
                            <span class="text-gray-700">Altitude medication (consult doctor)</span>
                        </li>
                        <li class="flex items-center">
                            <i class="ph-bold ph-check-circle text-gray-600 mr-2"></i>
                            <span class="text-gray-700">Sunscreen (SPF 30+)</span>
                        </li>
                        <li class="flex items-center">
                            <i class="ph-bold ph-check-circle text-gray-600 mr-2"></i>
                            <span class="text-gray-700">Lip balm with SPF</span>
                        </li>
                        <li class="flex items-center">
                            <i class="ph-bold ph-check-circle text-gray-600 mr-2"></i>
                            <span class="text-gray-700">Toilet paper and hand sanitizer</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Equipment Tips Section -->
    <section class="py-20 bg-gradient-to-br from-emerald-800 to-orange-600 text-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    Equipment Tips & Recommendations
                </h2>
                <p class="text-xl text-white/90 max-w-3xl mx-auto">
                    Expert advice to help you prepare and pack for your mountain adventure.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center text-white mx-auto mb-6">
                        <i class="ph-bold ph-scales text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Pack Light</h3>
                    <p class="text-white/80 leading-relaxed">
                        Keep your backpack under 15kg for optimal comfort and mobility. 
                        Porters carry the main duffel bag, so only carry essentials in your daypack.
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center text-white mx-auto mb-6">
                        <i class="ph-bold ph-test-tube text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Test Your Gear</h3>
                    <p class="text-white/80 leading-relaxed">
                        Test all equipment before your trek, especially boots and sleeping bag. 
                        Break in your hiking boots with at least 50km of walking.
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center text-white mx-auto mb-6">
                        <i class="ph-bold ph-cloud-rain text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Weather Ready</h3>
                    <p class="text-white/80 leading-relaxed">
                        Be prepared for all weather conditions - from tropical heat at base camp 
                        to arctic conditions at summit. Layer your clothing for versatility.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Ready for Your Adventure?
            </h2>
            <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                Our team can help you prepare with equipment rentals and expert advice. 
                Get everything you need for a successful Kilimanjaro climb.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('mountain-trekking') }}" 
                   class="px-8 py-4 bg-gradient-to-r from-emerald-800 to-orange-600 text-white rounded-xl font-bold text-lg hover:from-emerald-900 hover:to-orange-700 transition-all transform hover:scale-105 shadow-2xl">
                    <i class="ph-bold ph-mountains mr-2"></i>View All Treks
                </a>
                <a href="{{ route('inquiries.create') }}?tour_id=2" 
                   class="px-8 py-4 bg-orange-600 text-white rounded-xl font-bold text-lg hover:bg-orange-700 transition-all transform hover:scale-105 shadow-2xl">
                    <i class="ph-bold ph-chat-dots mr-2"></i>Get Equipment Advice
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
