@extends('layouts.public')

@section('title', 'Beach Activities - Zanzibar & Coastal Adventures')

@section('content')
<div class="pt-24">
    <!-- Hero Section -->
    <section class="relative h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468777/waterbuck_ggd5wl.jpg" 
                 class="w-full h-full object-cover" alt="Beach Activities">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-cyan-900/60"></div>
        </div>
        <div class="relative z-10 text-center px-6">
            <h1 class="text-5xl md:text-7xl font-serif font-black text-white mb-6 border-move">Beach Activities</h1>
            <p class="text-xl text-blue-50/90 max-w-2xl mx-auto">Discover paradise along Tanzania's pristine coastline and the exotic islands of Zanzibar</p>
            <div class="mt-8">
                <a href="/contact" class="inline-flex items-center gap-3 px-8 py-4 bg-blue-600 text-white font-bold rounded-full hover:bg-blue-700 transition-colors">
                    Plan Beach Escape <i class="ph-bold ph-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Overview Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-4xl font-serif font-black text-slate-900 mb-6">Tropical Paradise Awaits</h2>
                    <p class="text-lg text-slate-600 mb-8 leading-relaxed">
                        From the pristine beaches of Zanzibar to the hidden coves along the mainland coast, Tanzania offers some of Africa's most stunning coastal destinations. Enjoy water sports, relaxation, and island adventures.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="ph-bold ph-umbrella text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">Pristine Beaches</h3>
                                <p class="text-sm text-slate-600">White sand beaches and crystal clear waters</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="ph-bold ph-fish text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">Water Sports</h3>
                                <p class="text-sm text-slate-600">Snorkeling, diving, and sailing adventures</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="ph-bold ph-sun-horizon text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">Island Hopping</h3>
                                <p class="text-sm text-slate-600">Explore the Spice Islands of Zanzibar</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468777/water-3093341_1280_1_qa4393.jpg" 
                         class="rounded-2xl shadow-2xl" alt="Tropical Beach">
                    <div class="absolute -bottom-6 -right-6 bg-blue-600 text-white p-6 rounded-2xl shadow-xl">
                        <p class="text-3xl font-black">28°C</p>
                        <p class="text-sm font-bold">Average Water Temperature</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Destinations Section -->
    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif font-black text-slate-900 mb-4">Coastal Destinations</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Explore Tanzania's most beautiful beach destinations and island paradises</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Zanzibar Stone Town -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                    <div class="relative h-48">
                        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468778/website_xe4izn.jpg" 
                             class="w-full h-full object-cover" alt="Stone Town">
                        <div class="absolute top-4 right-4 bg-purple-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                            Historic
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">Stone Town</h3>
                        <p class="text-slate-600 mb-4">UNESCO World Heritage site with rich history and culture.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">UNESCO</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Cultural</span>
                            <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-medium">Shopping</span>
                        </div>
                        <a href="/tours?destination=zanzibar" class="inline-flex items-center gap-2 text-blue-600 font-bold hover:text-blue-700 transition-colors">
                            Explore Stone Town <i class="ph ph-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Nungwi -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                    <div class="relative h-48">
                        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468777/Waterbuckk_p4mtpz.jpg" 
                             class="w-full h-full object-cover" alt="Nungwi">
                        <div class="absolute top-4 right-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                            Beach Paradise
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">Nungwi Beach</h3>
                        <p class="text-slate-600 mb-4">Pristine white sand beach with excellent swimming and snorkeling.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Swimming</span>
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Snorkeling</span>
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">Sunset</span>
                        </div>
                        <a href="/tours?destination=nungwi" class="inline-flex items-center gap-2 text-blue-600 font-bold hover:text-blue-700 transition-colors">
                            Explore Nungwi <i class="ph ph-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Pemba Island -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                    <div class="relative h-48">
                        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468776/Warthog_oxpecker_iw61nj.jpg" 
                             class="w-full h-full object-cover" alt="Pemba">
                        <div class="absolute top-4 right-4 bg-green-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                            Untouched
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">Pemba Island</h3>
                        <p class="text-slate-600 mb-4">Lesser-known island with pristine beaches and spice plantations.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Spice Tours</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Diving</span>
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">Secluded</span>
                        </div>
                        <a href="/tours?destination=pemba" class="inline-flex items-center gap-2 text-blue-600 font-bold hover:text-blue-700 transition-colors">
                            Explore Pemba <i class="ph ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Beach Activities Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif font-black text-slate-900 mb-4">Beach Activities & Water Sports</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Exciting water activities and relaxation options for every type of traveler</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Snorkeling -->
                <div class="bg-gradient-to-br from-cyan-50 to-blue-50 rounded-2xl p-6 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-cyan-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-fish text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Snorkeling</h3>
                    <p class="text-slate-600 text-sm mb-4">Explore vibrant coral reefs and tropical fish</p>
                    <div class="text-2xl font-black text-cyan-600">$45</div>
                </div>

                <!-- Diving -->
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-swimmer text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Scuba Diving</h3>
                    <p class="text-slate-600 text-sm mb-4">Discover underwater world with certified guides</p>
                    <div class="text-2xl font-black text-blue-600">$120</div>
                </div>

                <!-- Sailing -->
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-6 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-sailboat text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Sailing</h3>
                    <p class="text-slate-600 text-sm mb-4">Sunset cruises and island hopping adventures</p>
                    <div class="text-2xl font-black text-purple-600">$85</div>
                </div>

                <!-- Beach Relaxation -->
                <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-2xl p-6 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-palm-tree text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Beach Relaxation</h3>
                    <p class="text-slate-600 text-sm mb-4">Perfect spots for sunbathing and swimming</p>
                    <div class="text-2xl font-black text-orange-600">Free</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-cyan-600">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-serif font-black text-white mb-6">Your Beach Paradise Awaits</h2>
            <p class="text-xl text-blue-50 mb-8">Let us create the perfect coastal getaway for you</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="px-8 py-4 bg-white text-blue-600 font-bold rounded-full hover:bg-gray-100 transition-colors">
                    Plan Beach Holiday
                </a>
                <a href="/tours" class="px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-blue-600 transition-colors">
                    View Beach Tours
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
