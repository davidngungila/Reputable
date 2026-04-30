@extends('layouts.public')

@section('title', 'Night Game Drives - Nocturnal Safari Adventures')

@section('content')
<div class="pt-24">
    <!-- Hero Section -->
    <section class="relative h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468746/pexels-pixabay-62325_c935vf.jpg" 
                 class="w-full h-full object-cover" alt="Night Game Drive">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-900/80 to-indigo-900/60"></div>
        </div>
        <div class="relative z-10 text-center px-6">
            <h1 class="text-5xl md:text-7xl font-serif font-black text-white mb-6 border-move">Night Game Drives</h1>
            <p class="text-xl text-purple-50/90 max-w-2xl mx-auto">Experience the magic of Africa's nocturnal wildlife under the stars</p>
            <div class="mt-8">
                <a href="/contact" class="inline-flex items-center gap-3 px-8 py-4 bg-purple-600 text-white font-bold rounded-full hover:bg-purple-700 transition-colors">
                    Night Safari <i class="ph-bold ph-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Overview Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-4xl font-serif font-black text-slate-900 mb-6">Africa After Dark</h2>
                    <p class="text-lg text-slate-600 mb-8 leading-relaxed">
                        As darkness falls, a different world awakens. Night game drives offer exclusive access to Tanzania's nocturnal wildlife - from leopards on the hunt to aardvarks foraging. Experience the wilderness under starlit African skies.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="ph-bold ph-moon text-purple-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">Nocturnal Wildlife</h3>
                                <p class="text-sm text-slate-600">See animals active only at night</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="ph-bold ph-spotlight text-purple-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">Spotlight Safaris</h3>
                                <p class="text-sm text-slate-600">Professional spotlights for wildlife viewing</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="ph-bold ph-star text-purple-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">Stargazing</h3>
                                <p class="text-sm text-slate-600">Incredible African night skies</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative h-48">
                    <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468746/pexels-pixabay-73811_ia2xnd.jpg" 
                         class="w-full h-full object-cover" alt="Serengeti Safari">
                    <div class="absolute -bottom-6 -right-6 bg-purple-600 text-white p-6 rounded-2xl shadow-xl">
                        <p class="text-3xl font-black">7PM-10PM</p>
                        <p class="text-sm font-bold">Optimal Viewing Time</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Nocturnal Wildlife Section -->
    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif font-black text-slate-900 mb-4">Nocturnal Wildlife Encounters</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Discover the fascinating creatures of the African night</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Leopards -->
                <div class="bg-white rounded-2xl p-6 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-cat text-orange-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Leopards</h3>
                    <p class="text-slate-600 text-sm mb-4">Elusive hunters on the prowl</p>
                    <div class="flex flex-wrap gap-1 justify-center">
                        <span class="px-2 py-1 bg-orange-100 text-orange-700 rounded-full text-xs">Hunting</span>
                        <span class="px-2 py-1 bg-orange-100 text-orange-700 rounded-full text-xs">Trees</span>
                    </div>
                </div>

                <!-- Lions -->
                <div class="bg-white rounded-2xl p-6 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-paw-print text-yellow-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Lions</h3>
                    <p class="text-slate-600 text-sm mb-4">Night hunting and pride dynamics</p>
                    <div class="flex flex-wrap gap-1 justify-center">
                        <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs">Prides</span>
                        <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs">Hunting</span>
                    </div>
                </div>

                <!-- Hyenas -->
                <div class="bg-white rounded-2xl p-6 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-bone text-gray-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Hyenas</h3>
                    <p class="text-slate-600 text-sm mb-4">Social clans and scavenging</p>
                    <div class="flex flex-wrap gap-1 justify-center">
                        <span class="px-2 py-1 bg-gray-100 text-gray-700 rounded-full text-xs">Clans</span>
                        <span class="px-2 py-1 bg-gray-100 text-gray-700 rounded-full text-xs">Calls</span>
                    </div>
                </div>

                <!-- Aardvarks -->
                <div class="bg-white rounded-2xl p-6 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-bug text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Aardvarks</h3>
                    <p class="text-slate-600 text-sm mb-4">Rare nocturnal insectivores</p>
                    <div class="flex flex-wrap gap-1 justify-center">
                        <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs">Rare</span>
                        <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs">Ants</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Night Safari Destinations -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif font-black text-slate-900 mb-4">Night Safari Destinations</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Experience night drives in Tanzania's best wildlife locations</p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Serengeti Night Drive -->
                <div class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-3xl p-8 border border-purple-100">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center">
                            <i class="ph-bold ph-map-pin text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-900">Serengeti Night Drive</h3>
                            <p class="text-purple-600 font-medium">Big Cat Territory</p>
                        </div>
                    </div>
                    
                    <p class="text-slate-600 mb-6">Explore the Serengeti plains after dark. Excellent chances of seeing leopards, lions, and hyenas on the hunt.</p>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-purple-600"></i>
                            <span class="text-slate-700">Big cat hunting opportunities</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-purple-600"></i>
                            <span class="text-slate-700">Open plains visibility</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-purple-600"></i>
                            <span class="text-slate-700">Experienced night guides</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-3xl font-black text-purple-600">$180<span class="text-lg font-normal text-slate-600">/person</span></p>
                            <p class="text-sm text-slate-600">3-hour night drive</p>
                        </div>
                        <a href="/contact" class="px-6 py-3 bg-purple-600 text-white font-bold rounded-xl hover:bg-purple-700 transition-colors">
                            Book Now
                        </a>
                    </div>
                </div>

                <!-- Ngorongoro Night Drive -->
                <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-3xl p-8 border border-blue-100">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center">
                            <i class="ph-bold ph-map-pin text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-900">Ngorongoro Night Drive</h3>
                            <p class="text-blue-600 font-medium">Crater Floor Adventure</p>
                        </div>
                    </div>
                    
                    <p class="text-slate-600 mb-6">Descend into the crater floor after sunset. Unique opportunity to see nocturnal wildlife in this enclosed ecosystem.</p>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-blue-600"></i>
                            <span class="text-slate-700">Black rhino nocturnal activity</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-blue-600"></i>
                            <span class="text-slate-700">Crater wall scenery</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-blue-600"></i>
                            <span class="text-slate-700">Dense predator populations</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-3xl font-black text-blue-600">$220<span class="text-lg font-normal text-slate-600">/person</span></p>
                            <p class="text-sm text-slate-600">Exclusive crater access</p>
                        </div>
                        <a href="/contact" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 transition-colors">
                            Book Now
                        </a>
                    </div>
                </div>

                <!-- Tarangire Night Drive -->
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-3xl p-8 border border-green-100">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center">
                            <i class="ph-bold ph-map-pin text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-900">Tarangire Night Drive</h3>
                            <p class="text-green-600 font-medium">Elephant Paradise</p>
                        </div>
                    </div>
                    
                    <p class="text-slate-600 mb-6">Experience Tarangire's famous elephant herds and ancient baobabs under moonlight. Excellent for photography.</p>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-green-600"></i>
                            <span class="text-slate-700">Large elephant herds</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-green-600"></i>
                            <span class="text-slate-700">Ancient baobab trees</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-green-600"></i>
                            <span class="text-slate-700">Less crowded experience</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-3xl font-black text-green-600">$160<span class="text-lg font-normal text-slate-600">/person</span></p>
                            <p class="text-sm text-slate-600">3-hour night drive</p>
                        </div>
                        <a href="/contact" class="px-6 py-3 bg-green-600 text-white font-bold rounded-xl hover:bg-green-700 transition-colors">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Night Drive Experience -->
    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif font-black text-slate-900 mb-4">The Night Drive Experience</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">What to expect on your nocturnal safari adventure</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Sunset Start -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-sun-horizon text-orange-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Sunset Start</h3>
                    <p class="text-slate-600 text-sm">Begin with sundowners as you watch the African sunset</p>
                </div>

                <!-- Spotlight Safari -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-spotlight text-purple-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Spotlight Safari</h3>
                    <p class="text-slate-600 text-sm">Professional spotlights reveal nocturnal wildlife</p>
                </div>

                <!-- Expert Guide -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-user text-blue-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Expert Guide</h3>
                    <p class="text-slate-600 text-sm">Knowledgeable guides with night safari expertise</p>
                </div>

                <!-- Stargazing -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-star text-indigo-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Stargazing</h3>
                    <p class="text-slate-600 text-sm">Incredible views of the southern hemisphere stars</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Safety & Guidelines -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif font-black text-slate-900 mb-4">Safety & Guidelines</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Important information for your night safari experience</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-purple-100">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="ph-bold ph-shield-check text-purple-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Safety First</h3>
                    <ul class="space-y-2 text-slate-600 text-sm">
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-purple-600 mt-0.5"></i>
                            <span>Armed ranger guides</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-purple-600 mt-0.5"></i>
                            <span>Communication equipment</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-purple-600 mt-0.5"></i>
                            <span>First aid trained staff</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-purple-600 mt-0.5"></i>
                            <span>Vehicle safety features</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg border border-blue-100">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="ph-bold ph-info text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">What's Included</h3>
                    <ul class="space-y-2 text-slate-600 text-sm">
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-blue-600 mt-0.5"></i>
                            <span>Professional guide</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-blue-600 mt-0.5"></i>
                            <span>Spotlight equipment</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-blue-600 mt-0.5"></i>
                            <span>Warm blankets</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-blue-600 mt-0.5"></i>
                            <span>Hot beverages</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg border border-orange-100">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="ph-bold ph-warning text-orange-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Important Notes</h3>
                    <ul class="space-y-2 text-slate-600 text-sm">
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-orange-600 mt-0.5"></i>
                            <span>Weather dependent</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-orange-600 mt-0.5"></i>
                            <span>Minimum age: 12 years</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-orange-600 mt-0.5"></i>
                            <span>Limited availability</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph-bold ph-check text-orange-600 mt-0.5"></i>
                            <span>Book in advance</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-gradient-to-r from-purple-600 to-indigo-600">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-serif font-black text-white mb-6">Experience Africa's Night Magic</h2>
            <p class="text-xl text-purple-50 mb-8">Book your unforgettable nocturnal safari adventure today</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="px-8 py-4 bg-white text-purple-600 font-bold rounded-full hover:bg-gray-100 transition-colors">
                    Book Night Safari
                </a>
                <a href="/tours" class="px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-purple-600 transition-colors">
                    View All Tours
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
