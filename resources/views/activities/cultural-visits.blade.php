@extends('layouts.public')

@section('title', 'Cultural Visits - Experience Tanzanian Culture')

@section('content')
<div class="pt-24">
    <!-- Hero Section -->
    <section class="relative h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468761/SaveClip.App_495336161_1271336174992569_888406727135887740_n_h53er8.jpg" 
                 class="w-full h-full object-cover" alt="Cultural Visits">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-900/80 to-pink-900/60"></div>
        </div>
        <div class="relative z-10 text-center px-6">
            <h1 class="text-5xl md:text-7xl font-serif font-black text-white mb-6 border-move">Cultural Visits</h1>
            <p class="text-xl text-purple-50/90 max-w-2xl mx-auto">Immerse yourself in Tanzania's rich cultural heritage and traditional ways of life</p>
            <div class="mt-8">
                <a href="/contact" class="inline-flex items-center gap-3 px-8 py-4 bg-purple-600 text-white font-bold rounded-full hover:bg-purple-700 transition-colors">
                    Experience Culture <i class="ph-bold ph-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Overview Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-4xl font-serif font-black text-slate-900 mb-6">Authentic Cultural Experiences</h2>
                    <p class="text-lg text-slate-600 mb-8 leading-relaxed">
                        Connect with Tanzania's diverse cultures through authentic village visits, traditional ceremonies, and meaningful interactions with local communities. Experience the warmth and hospitality of Tanzanian people.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="ph-bold ph-users-three text-purple-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">Local Communities</h3>
                                <p class="text-sm text-slate-600">Visit authentic villages and meet local families</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="ph-bold ph-palette text-purple-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">Traditional Arts</h3>
                                <p class="text-sm text-slate-600">Learn traditional crafts and artistic expressions</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="ph-bold ph-music-notes text-purple-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">Music & Dance</h3>
                                <p class="text-sm text-slate-600">Experience traditional performances and ceremonies</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468760/SaveClip.App_482833394_18364095781193410_736119818360136868_n_yrlfa0.jpg" 
                         class="rounded-2xl shadow-2xl" alt="Cultural Dance">
                    <div class="absolute -bottom-6 -right-6 bg-purple-600 text-white p-6 rounded-2xl shadow-xl">
                        <p class="text-3xl font-black">120+</p>
                        <p class="text-sm font-bold">Tribal Groups to Meet</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cultural Experiences Section -->
    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif font-black text-slate-900 mb-4">Cultural Experiences</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Discover Tanzania's diverse cultural heritage through these immersive experiences</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Maasai Village Visit -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                    <div class="relative h-48">
                        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468760/SaveClip.App_484879131_18468442597071245_5334714707917688478_n_ibqwmd.jpg" 
                             class="w-full h-full object-cover" alt="Maasai Village">
                        <div class="absolute top-4 right-4 bg-red-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                            Popular
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">Maasai Village Visit</h3>
                        <p class="text-slate-600 mb-4">Experience the traditional lifestyle of the iconic Maasai people.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-medium">Warriors</span>
                            <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-medium">Jumping Dance</span>
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">Manyattas</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="text-2xl font-black text-purple-600">$65</div>
                            <a href="/contact" class="inline-flex items-center gap-2 text-purple-600 font-bold hover:text-purple-700 transition-colors">
                                Book Visit <i class="ph ph-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Hadzabe Bushmen -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                    <div class="relative h-48">
                        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468760/SaveClip.App_482662731_17992698152786280_407615177477452527_n_bed64p.jpg" 
                             class="w-full h-full object-cover" alt="Hadzabe">
                        <div class="absolute top-4 right-4 bg-green-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                            Ancient
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">Hadzabe Bushmen</h3>
                        <p class="text-slate-600 mb-4">Meet one of the last hunter-gatherer tribes in Africa.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Hunter-Gatherers</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Ancient</span>
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">Lake Eyasi</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="text-2xl font-black text-purple-600">$85</div>
                            <a href="/contact" class="inline-flex items-center gap-2 text-purple-600 font-bold hover:text-purple-700 transition-colors">
                                Book Visit <i class="ph ph-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Datoga Tribe -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                    <div class="relative h-48">
                        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468760/SaveClip.App_482500806_17992698158786280_8577131224283353136_n_i1gvkg.jpg" 
                             class="w-full h-full object-cover" alt="Datoga">
                        <div class="absolute top-4 right-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                            Artisans
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">Datoga Blacksmiths</h3>
                        <p class="text-slate-600 mb-4">Learn traditional blacksmithing techniques from skilled artisans.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Blacksmiths</span>
                            <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-medium">Metalwork</span>
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">Crafts</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="text-2xl font-black text-purple-600">$55</div>
                            <a href="/contact" class="inline-flex items-center gap-2 text-purple-600 font-bold hover:text-purple-700 transition-colors">
                                Book Visit <i class="ph ph-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cultural Activities Grid -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif font-black text-slate-900 mb-4">Cultural Activities</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Participate in traditional activities and learn ancient skills</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Traditional Cooking -->
                <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-2xl p-6 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-pot text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Traditional Cooking</h3>
                    <p class="text-slate-600 text-sm mb-4">Learn to prepare authentic Tanzanian dishes</p>
                    <div class="text-2xl font-black text-orange-600">$35</div>
                </div>

                <!-- Beadwork -->
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-6 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-diamond text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Beadwork Workshop</h3>
                    <p class="text-slate-600 text-sm mb-4">Create traditional Maasai bead jewelry</p>
                    <div class="text-2xl font-black text-purple-600">$25</div>
                </div>

                <!-- Traditional Dance -->
                <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-6 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-music-notes text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Dance Lessons</h3>
                    <p class="text-slate-600 text-sm mb-4">Learn traditional dances and rhythms</p>
                    <div class="text-2xl font-black text-blue-600">$30</div>
                </div>

                <!-- Storytelling -->
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-book text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Storytelling</h3>
                    <p class="text-slate-600 text-sm mb-4">Listen to ancient folk tales and legends</p>
                    <div class="text-2xl font-black text-green-600">$20</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cultural Markets -->
    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif font-black text-slate-900 mb-4">Cultural Markets & Crafts</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Explore vibrant markets and purchase authentic local crafts</p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Stone Town Market -->
                <div class="bg-white rounded-3xl p-8 shadow-lg">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center">
                            <i class="ph-bold ph-storefront text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-900">Stone Town Market</h3>
                            <p class="text-purple-600 font-medium">Zanzibar's Cultural Heart</p>
                        </div>
                    </div>
                    
                    <p class="text-slate-600 mb-6">Explore the bustling markets of Stone Town, filled with spices, textiles, and handcrafted goods. Perfect for souvenir shopping and cultural immersion.</p>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-purple-600"></i>
                            <span class="text-slate-700">Spice tours and shopping</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-purple-600"></i>
                            <span class="text-slate-700">Local crafts and textiles</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-purple-600"></i>
                            <span class="text-slate-700">Historic architecture tour</span>
                        </div>
                    </div>
                    
                    <a href="/tours?destination=zanzibar" class="inline-flex items-center gap-2 px-6 py-3 bg-purple-600 text-white font-bold rounded-xl hover:bg-purple-700 transition-colors">
                        Explore Market <i class="ph ph-arrow-right"></i>
                    </a>
                </div>

                <!-- Maasai Craft Markets -->
                <div class="bg-white rounded-3xl p-8 shadow-lg">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center">
                            <i class="ph-bold ph-shopping-bag text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-900">Maasai Craft Markets</h3>
                            <p class="text-red-600 font-medium">Authentic Handicrafts</p>
                        </div>
                    </div>
                    
                    <p class="text-slate-600 mb-6">Visit local markets where Maasai artisans sell their traditional crafts, including beadwork, spears, and shields. Support local communities directly.</p>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-red-600"></i>
                            <span class="text-slate-700">Direct artisan purchases</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-red-600"></i>
                            <span class="text-slate-700">Traditional beadwork</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="ph-bold ph-check-circle text-red-600"></i>
                            <span class="text-slate-700">Cultural exchange opportunities</span>
                        </div>
                    </div>
                    
                    <a href="/tours?activity=cultural" class="inline-flex items-center gap-2 px-6 py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition-colors">
                        Visit Markets <i class="ph ph-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-gradient-to-r from-purple-600 to-pink-600">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-serif font-black text-white mb-6">Connect with Tanzanian Culture</h2>
            <p class="text-xl text-purple-50 mb-8">Create meaningful connections and lasting memories through authentic cultural experiences</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="px-8 py-4 bg-white text-purple-600 font-bold rounded-full hover:bg-gray-100 transition-colors">
                    Plan Cultural Tour
                </a>
                <a href="/tours" class="px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-purple-600 transition-colors">
                    View Cultural Tours
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
