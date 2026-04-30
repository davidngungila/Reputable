@extends('layouts.public')

@section('title', 'Bird Watching - Tanzania's Avian Paradise')

@section('content')
<div class="pt-24">
    <!-- Hero Section -->
    <section class="relative h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468737/pexels-vishvapatel-5306198_w38g9t.jpg" 
                 class="w-full h-full object-cover" alt="Bird Watching">
            <div class="absolute inset-0 bg-gradient-to-r from-green-900/80 to-emerald-900/60"></div>
        </div>
        <div class="relative z-10 text-center px-6">
            <h1 class="text-5xl md:text-7xl font-serif font-black text-white mb-6 border-move">Bird Watching</h1>
            <p class="text-xl text-green-50/90 max-w-2xl mx-auto">Discover over 1,100 bird species in Tanzania's diverse habitats and ecosystems</p>
            <div class="mt-8">
                <a href="/contact" class="inline-flex items-center gap-3 px-8 py-4 bg-green-600 text-white font-bold rounded-full hover:bg-green-700 transition-colors">
                    Birding Safari <i class="ph-bold ph-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Overview Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-4xl font-serif font-black text-slate-900 mb-6">Birdwatcher's Paradise</h2>
                    <p class="text-lg text-slate-600 mb-8 leading-relaxed">
                        Tanzania is one of Africa's premier birding destinations, with over 1,100 recorded species including many endemics and migrants. From the highland forests to the alkaline lakes, discover incredible avian diversity.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="ph-bold ph-bird text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">1,100+ Species</h3>
                                <p class="text-sm text-slate-600">Including endemic and migratory birds</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="ph-bold ph-tree text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">Diverse Habitats</h3>
                                <p class="text-sm text-slate-600">From forests to wetlands and savannas</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="ph-bold ph-camera text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">Photography</h3>
                                <p class="text-sm text-slate-600">Excellent opportunities for bird photography</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468737/pexels-vishvapatel-5306140_neaoqu.jpg" 
                         class="rounded-2xl shadow-2xl" alt="Colorful Birds">
                    <div class="absolute -bottom-6 -right-6 bg-green-600 text-white p-6 rounded-2xl shadow-xl">
                        <p class="text-3xl font-black">40+</p>
                        <p class="text-sm font-bold">Endemic Species</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Premier Birding Destinations -->
    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif font-black text-slate-900 mb-4">Premier Birding Destinations</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Tanzania's top locations for exceptional bird watching experiences</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Lake Manyara -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                    <div class="relative h-48">
                        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468737/pexels-vishvapatel-5306199_ngi7qd.jpg" 
                             class="w-full h-full object-cover" alt="Lake Manyara">
                        <div class="absolute top-4 right-4 bg-pink-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                            Flamingo Paradise
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">Lake Manyara</h3>
                        <p class="text-slate-600 mb-4">Famous for tree-climbing lions and thousands of flamingos.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-pink-100 text-pink-700 rounded-full text-xs font-medium">Flamingos</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Pelicans</span>
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">350+ Species</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="text-2xl font-black text-green-600">$180</div>
                            <a href="/contact" class="inline-flex items-center gap-2 text-green-600 font-bold hover:text-green-700 transition-colors">
                                Book Tour <i class="ph ph-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Ngorongoro Crater -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                    <div class="relative h-48">
                        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468737/pexels-vishvapatel-5306200_daeuad.jpg" 
                             class="w-full h-full object-cover" alt="Ngorongoro">
                        <div class="absolute top-4 right-4 bg-orange-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                            UNESCO Heritage
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">Ngorongoro Crater</h3>
                        <p class="text-slate-600 mb-4">Unique ecosystem with highland forest and grassland birds.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-medium">Raptors</span>
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">Endemics</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Forest Birds</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="text-2xl font-black text-green-600">$220</div>
                            <a href="/contact" class="inline-flex items-center gap-2 text-green-600 font-bold hover:text-green-700 transition-colors">
                                Book Tour <i class="ph ph-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Selous Game Reserve -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                    <div class="relative h-48">
                        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468737/pexels-vishnudeep-dixit-497799-1260803_f0rh7j.jpg" 
                             class="w-full h-full object-cover" alt="Selous">
                        <div class="absolute top-4 right-4 bg-emerald-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                            Untouched Wilderness
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">Selous Game Reserve</h3>
                        <p class="text-slate-600 mb-4">Vast wilderness with rivers and diverse bird habitats.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-xs font-medium">Water Birds</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Kingfishers</span>
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">500+ Species</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="text-2xl font-black text-green-600">$280</div>
                            <a href="/contact" class="inline-flex items-center gap-2 text-green-600 font-bold hover:text-green-700 transition-colors">
                                Book Tour <i class="ph ph-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bird Species Highlights -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif font-black text-slate-900 mb-4">Featured Bird Species</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Discover Tanzania's most spectacular and sought-after bird species</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Flamingos -->
                <div class="bg-gradient-to-br from-pink-50 to-rose-50 rounded-2xl p-6 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-pink-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-bird text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Flamingos</h3>
                    <p class="text-slate-600 text-sm mb-4">Lesser and Greater Flamingos in alkaline lakes</p>
                    <div class="flex flex-wrap gap-1 justify-center">
                        <span class="px-2 py-1 bg-pink-100 text-pink-700 rounded-full text-xs">Lake Manyara</span>
                        <span class="px-2 py-1 bg-pink-100 text-pink-700 rounded-full text-xs">Lake Natron</span>
                    </div>
                </div>

                <!-- Eagles -->
                <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-2xl p-6 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-bird text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Raptors</h3>
                    <p class="text-slate-600 text-sm mb-4">Martial Eagles, Fish Eagles, and Bateleurs</p>
                    <div class="flex flex-wrap gap-1 justify-center">
                        <span class="px-2 py-1 bg-orange-100 text-orange-700 rounded-full text-xs">Serengeti</span>
                        <span class="px-2 py-1 bg-orange-100 text-orange-700 rounded-full text-xs">Ngorongoro</span>
                    </div>
                </div>

                <!-- Turacos -->
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-bird text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Turacos</h3>
                    <p class="text-slate-600 text-sm mb-4">Livingstone's and Ross's Turacos in forests</p>
                    <div class="flex flex-wrap gap-1 justify-center">
                        <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">Highlands</span>
                        <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">Forest</span>
                    </div>
                </div>

                <!-- Sunbirds -->
                <div class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-2xl p-6 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ph-bold ph-bird text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Sunbirds</h3>
                    <p class="text-slate-600 text-sm mb-4">Collared, Bronze, and Scarlet-chested Sunbirds</p>
                    <div class="flex flex-wrap gap-1 justify-center">
                        <span class="px-2 py-1 bg-purple-100 text-purple-700 rounded-full text-xs">Gardens</span>
                        <span class="px-2 py-1 bg-purple-100 text-purple-700 rounded-full text-xs">Flowers</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Birding Tours Section -->
    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif font-black text-slate-900 mb-4">Specialized Birding Tours</h2>
                <p class="text-lg text-serengeti-600 max-w-2xl mx-auto">Expert-guided bird watching tours for enthusiasts of all levels</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Half Day Birding -->
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-green-100">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6">
                        <i class="ph-bold ph-clock text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Half Day Birding</h3>
                    <p class="text-slate-600 mb-6">Perfect introduction to Tanzanian birdlife with expert guides.</p>
                    <ul class="space-y-2 text-slate-600 mb-6">
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-green-600"></i>
                            <span>6:00 AM - 12:00 PM</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-green-600"></i>
                            <span>50-80 species typical</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-green-600"></i>
                            <span>Local park visit</span>
                        </li>
                    </ul>
                    <div class="text-3xl font-black text-green-600 mb-4">$120<span class="text-lg font-normal text-slate-600">/person</span></div>
                    <a href="/contact" class="w-full block text-center px-6 py-3 bg-green-600 text-white font-bold rounded-xl hover:bg-green-700 transition-colors">
                        Book Half Day
                    </a>
                </div>

                <!-- Full Day Birding -->
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-emerald-100">
                    <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mb-6">
                        <i class="ph-bold ph-sun-horizon text-emerald-600 text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Full Day Birding</h3>
                    <p class="text-slate-600 mb-6">Comprehensive birding experience covering multiple habitats.</p>
                    <ul class="space-y-2 text-slate-600 mb-6">
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-emerald-600"></i>
                            <span>6:00 AM - 6:00 PM</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-emerald-600"></i>
                            <span>100-150 species typical</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-emerald-600"></i>
                            <span>Multiple habitats</span>
                        </li>
                    </ul>
                    <div class="text-3xl font-black text-emerald-600 mb-4">$200<span class="text-lg font-normal text-slate-600">/person</span></div>
                    <a href="/contact" class="w-full block text-center px-6 py-3 bg-emerald-600 text-white font-bold rounded-xl hover:bg-emerald-700 transition-colors">
                        Book Full Day
                    </a>
                </div>

                <!-- Birding Photography -->
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-cyan-100">
                    <div class="w-16 h-16 bg-cyan-100 rounded-full flex items-center justify-center mb-6">
                        <i class="ph-bold ph-camera text-cyan-600 text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Photography Tour</h3>
                    <p class="text-slate-600 mb-6">Specialized tour focusing on bird photography opportunities.</p>
                    <ul class="space-y-2 text-slate-600 mb-6">
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-cyan-600"></i>
                            <span>Golden hours focus</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-cyan-600"></i>
                            <span>Hide/blind access</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-cyan-600"></i>
                            <span>Photography guidance</span>
                        </li>
                    </ul>
                    <div class="text-3xl font-black text-cyan-600 mb-4">$280<span class="text-lg font-normal text-slate-600">/person</span></div>
                    <a href="/contact" class="w-full block text-center px-6 py-3 bg-cyan-600 text-white font-bold rounded-xl hover:bg-cyan-700 transition-colors">
                        Book Photo Tour
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-gradient-to-r from-green-600 to-emerald-600">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-serif font-black text-white mb-6">Your Birding Adventure Awaits</h2>
            <p class="text-xl text-green-50 mb-8">Join expert guides to discover Tanzania's incredible avian diversity</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="px-8 py-4 bg-white text-green-600 font-bold rounded-full hover:bg-gray-100 transition-colors">
                    Plan Birding Safari
                </a>
                <a href="/tours" class="px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-green-600 transition-colors">
                    View Birding Tours
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
