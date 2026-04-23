@extends('layouts.public')

@section('content')
<!-- Advanced Hero Section -->
<section class="relative min-h-screen overflow-hidden bg-slate-900">
    <!-- Hero Background with Parallax Layers -->
    <div class="absolute inset-0 z-0">
        <!-- Main Background -->
        <img src="https://images.unsplash.com/photo-1547471080-7cc2caa01a7e?auto=format&fit=crop&w=2000&q=80" alt="Ngorongoro Conservation Area" class="w-full h-full object-cover opacity-40 hero-bg">
        
        <!-- Gradient Overlays -->
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/80 via-slate-900/60 to-slate-900"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-emerald-900/20 to-transparent"></div>
        
        <!-- Animated Particles -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-20 left-10 w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></div>
            <div class="absolute top-40 right-20 w-3 h-3 bg-blue-400 rounded-full animate-pulse delay-75"></div>
            <div class="absolute bottom-32 left-1/4 w-2 h-2 bg-purple-400 rounded-full animate-pulse delay-150"></div>
            <div class="absolute top-1/3 right-1/3 w-4 h-4 bg-orange-400 rounded-full animate-pulse delay-300"></div>
        </div>
    </div>
    
    <!-- Hero Content -->
    <div class="relative z-10 min-h-screen flex items-center">
        <div class="max-w-7xl mx-auto px-6 w-full">
            <div class="text-center">
                <!-- Animated Badge -->
                <div class="inline-block mb-8">
                    <span class="inline-flex items-center gap-2 px-6 py-3 bg-emerald-600/20 text-emerald-400 rounded-full text-sm font-bold tracking-widest uppercase border border-emerald-600/30 backdrop-blur-md animate-fade-in-up">
                        <i class="ph-bold ph-globe-hemisphere-west"></i>
                        UNESCO World Heritage Site
                    </span>
                </div>
                
                <!-- Main Title with Animation -->
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-serif text-white mb-8 font-bold leading-tight animate-fade-in-up-delay-1">
                    Ngorongoro Crater<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-blue-500">Africa's Wildlife Eden</span>
                </h1>
                
                <!-- Enhanced Description -->
                <p class="text-xl md:text-2xl text-slate-300 max-w-4xl mx-auto leading-relaxed mb-12 animate-fade-in-up-delay-2">
                    Experience the world's largest intact volcanic caldera, where over <span class="text-emerald-400 font-bold">25,000 animals</span> roam freely in a natural paradise. Witness the legendary <span class="text-orange-400 font-bold">Big Five</span> in a single day.
                </p>
                
                <!-- Interactive Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-3xl mx-auto mb-12 animate-fade-in-up-delay-3">
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                        <div class="text-3xl font-black text-emerald-400 mb-2">2.5M</div>
                        <p class="text-slate-300 text-sm font-medium">Years Old</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                        <div class="text-3xl font-black text-blue-400 mb-2">610m</div>
                        <p class="text-slate-300 text-sm font-medium">Crater Depth</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                        <div class="text-3xl font-black text-orange-400 mb-2">260km²</div>
                        <p class="text-slate-300 text-sm font-medium">Crater Floor</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                        <div class="text-3xl font-black text-purple-400 mb-2">25K+</div>
                        <p class="text-slate-300 text-sm font-medium">Wildlife</p>
                    </div>
                </div>
                
                <!-- Enhanced CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-6 animate-fade-in-up-delay-4">
                    <a href="#explore" class="group px-12 py-5 bg-emerald-600 text-white font-bold rounded-full shadow-2xl shadow-emerald-600/30 hover:bg-emerald-700 transition-all transform hover:scale-105 flex items-center gap-3">
                        <i class="ph-bold ph-compass"></i>
                        Explore the Crater
                        <i class="ph-bold ph-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </a>
                    <a href="#wildlife" class="group px-12 py-5 bg-white/10 text-white font-bold rounded-full border border-white/20 hover:bg-white/20 transition-all backdrop-blur-md flex items-center gap-3">
                        <i class="ph-bold ph-binoculars"></i>
                        Discover Wildlife
                        <i class="ph-bold ph-arrow-down group-hover:translate-y-1 transition-transform"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <div class="w-6 h-10 border-2 border-emerald-400 rounded-full flex justify-center">
            <div class="w-1 h-3 bg-emerald-400 rounded-full mt-2 animate-pulse"></div>
        </div>
    </div>
</section>

<style>
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fade-in-up {
        animation: fade-in-up 1s ease-out forwards;
    }
    
    .animate-fade-in-up-delay-1 {
        animation: fade-in-up 1s ease-out 0.2s forwards;
        opacity: 0;
    }
    
    .animate-fade-in-up-delay-2 {
        animation: fade-in-up 1s ease-out 0.4s forwards;
        opacity: 0;
    }
    
    .animate-fade-in-up-delay-3 {
        animation: fade-in-up 1s ease-out 0.6s forwards;
        opacity: 0;
    }
    
    .animate-fade-in-up-delay-4 {
        animation: fade-in-up 1s ease-out 0.8s forwards;
        opacity: 0;
    }
    
    .delay-75 { animation-delay: 75ms; }
    .delay-150 { animation-delay: 150ms; }
    .delay-300 { animation-delay: 300ms; }
    
    .hero-bg {
        transform: scale(1.1);
        transition: transform 10s ease-out;
    }
    
    .hero-bg:hover {
        transform: scale(1);
    }
</style>

<!-- Wildlife Paradise Section -->
<section id="wildlife" class="py-32 bg-gradient-to-br from-emerald-50 to-blue-50 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0 bg-grid-pattern"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-20">
            <span class="text-emerald-600 font-black text-xs uppercase tracking-[0.4em] mb-4 inline-block">Wildlife Paradise</span>
            <h2 class="text-4xl md:text-6xl font-serif text-slate-900 font-bold mb-6">The Legendary Big Five</h2>
            <p class="text-slate-600 max-w-3xl mx-auto text-xl leading-relaxed">Ngorongoro Crater offers one of the best opportunities in Africa to see all five iconic species in a single day</p>
        </div>
        
        <!-- Big Five Showcase -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 mb-16">
            <!-- Lion -->
            <div class="group relative">
                <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-emerald-100">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1605566899347-378fd0c4a2c6?auto=format&fit=crop&w=800&q=80" alt="Lion" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
                        <div class="absolute top-4 right-4 bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-bold">King</div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h3 class="text-2xl font-serif text-white font-bold mb-1">Lion</h3>
                            <p class="text-slate-200 text-sm">Pride of 60+ lions</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 text-orange-500 mb-3">
                            <i class="ph-bold ph-crown"></i>
                            <span class="font-bold text-sm">Apex Predator</span>
                        </div>
                        <p class="text-slate-600 text-sm leading-relaxed">Ngorongoro hosts one of Tanzania's densest lion populations, with multiple prides regularly sighted.</p>
                    </div>
                </div>
            </div>
            
            <!-- Leopard -->
            <div class="group relative">
                <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-emerald-100">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1559805693-e91c12d30d70?auto=format&fit=crop&w=800&q=80" alt="Leopard" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
                        <div class="absolute top-4 right-4 bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-bold">Solitary</div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h3 class="text-2xl font-serif text-white font-bold mb-1">Leopard</h3>
                            <p class="text-slate-200 text-sm">Elusive hunter</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 text-yellow-600 mb-3">
                            <i class="ph-bold ph-eye"></i>
                            <span class="font-bold text-sm">Master of Stealth</span>
                        </div>
                        <p class="text-slate-600 text-sm leading-relaxed">Often spotted in trees along the crater rim or rocky outcrops within the crater floor.</p>
                    </div>
                </div>
            </div>
            
            <!-- Elephant -->
            <div class="group relative">
                <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-emerald-100">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1578632292335-df3abbb0d586?auto=format&fit=crop&w=800&q=80" alt="Elephant" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
                        <div class="absolute top-4 right-4 bg-gray-600 text-white px-3 py-1 rounded-full text-sm font-bold">Gentle Giant</div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h3 class="text-2xl font-serif text-white font-bold mb-1">Elephant</h3>
                            <p class="text-slate-200 text-sm">200+ residents</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 text-gray-600 mb-3">
                            <i class="ph-bold ph-scales"></i>
                            <span class="font-bold text-sm">Matriarch Society</span>
                        </div>
                        <p class="text-slate-600 text-sm leading-relaxed">Large herds frequently seen near the Lerai Forest and Gorigor Swamp areas.</p>
                    </div>
                </div>
            </div>
            
            <!-- Rhino -->
            <div class="group relative">
                <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-emerald-100">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1518676590629-3dcbd9c5a5c9?auto=format&fit=crop&w=800&q=80" alt="Rhino" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
                        <div class="absolute top-4 right-4 bg-purple-500 text-white px-3 py-1 rounded-full text-sm font-bold">Rare</div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h3 class="text-2xl font-serif text-white font-bold mb-1">Black Rhino</h3>
                            <p class="text-slate-200 text-sm">Critically endangered</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 text-purple-600 mb-3">
                            <i class="ph-bold ph-shield-check"></i>
                            <span class="font-bold text-sm">Protected Species</span>
                        </div>
                        <p class="text-slate-600 text-sm leading-relaxed">Ngorongoro is one of few places where black rhinos can be seen in the wild.</p>
                    </div>
                </div>
            </div>
            
            <!-- Buffalo -->
            <div class="group relative">
                <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-emerald-100">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1565348811341-3c2b5b099c5d?auto=format&fit=crop&w=800&q=80" alt="Buffalo" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
                        <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold">Powerful</div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h3 class="text-2xl font-serif text-white font-bold mb-1">Buffalo</h3>
                            <p class="text-slate-200 text-sm">Massive herds</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 text-red-600 mb-3">
                            <i class="ph-bold ph-battery-warning"></i>
                            <span class="font-bold text-sm">Formidable</span>
                        </div>
                        <p class="text-slate-600 text-sm leading-relaxed">Large herds of thousands often graze on the crater floor's grasslands.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Wildlife Statistics -->
        <div class="bg-white rounded-3xl shadow-xl p-10 border border-emerald-100">
            <h3 class="text-2xl font-serif text-slate-900 font-bold mb-8 text-center">Crater Wildlife Population</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl font-black text-emerald-600 mb-2">25,000+</div>
                    <p class="text-slate-600 font-medium">Large Mammals</p>
                    <p class="text-slate-400 text-sm mt-1">Within crater floor</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-black text-orange-600 mb-2">500+</div>
                    <p class="text-slate-600 font-medium">Bird Species</p>
                    <p class="text-slate-400 text-sm mt-1">Including flamingos</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-black text-blue-600 mb-2">7,000+</div>
                    <p class="text-slate-600 font-medium">Wildebeest</p>
                    <p class="text-slate-400 text-sm mt-1">Year-round residents</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-black text-purple-600 mb-2">4,000+</div>
                    <p class="text-slate-600 font-medium">Zebras</p>
                    <p class="text-slate-400 text-sm mt-1">Mixed with wildebeest</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Interactive Crater Exploration Section -->
<section id="explore" class="py-32 bg-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Section Header -->
        <div class="text-center mb-20">
            <span class="text-blue-600 font-black text-xs uppercase tracking-[0.4em] mb-4 inline-block">Explore the Crater</span>
            <h2 class="text-4xl md:text-6xl font-serif text-slate-900 font-bold mb-6">Journey to the Floor</h2>
            <p class="text-slate-600 max-w-3xl mx-auto text-xl leading-relaxed">Experience the dramatic descent from the crater rim through diverse ecosystems to the wildlife-rich floor below</p>
        </div>
        
        <!-- Crater Journey Visualization -->
        <div class="relative">
            <!-- Crater Cross-Section -->
            <div class="bg-gradient-to-b from-blue-100 to-green-100 rounded-3xl p-12 relative overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-32 bg-gradient-to-b from-blue-200 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 h-48 bg-gradient-to-t from-green-200 to-transparent"></div>
                
                <!-- Journey Points -->
                <div class="relative z-10">
                    <!-- Rim Point -->
                    <div class="flex items-center mb-16">
                        <div class="bg-blue-600 text-white rounded-full p-4 mr-6 shadow-lg">
                            <i class="ph-bold ph-mountains text-2xl"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-xl font-bold text-slate-900 mb-2">Crater Rim (2,286m)</h4>
                            <p class="text-slate-600">Starting point with panoramic views, cool temperatures, and montane forest. Multiple viewpoints offer spectacular photography opportunities.</p>
                        </div>
                    </div>
                    
                    <!-- Descent Point -->
                    <div class="flex items-center mb-16 ml-8">
                        <div class="bg-orange-600 text-white rounded-full p-4 mr-6 shadow-lg">
                            <i class="ph-bold ph-arrow-down text-2xl"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-xl font-bold text-slate-900 mb-2">Steep Descent</h4>
                            <p class="text-slate-600">600-meter dramatic descent through winding roads, changing vegetation zones, and stunning geological formations.</p>
                        </div>
                    </div>
                    
                    <!-- Forest Point -->
                    <div class="flex items-center mb-16 ml-16">
                        <div class="bg-green-600 text-white rounded-full p-4 mr-6 shadow-lg">
                            <i class="ph-bold ph-tree text-2xl"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-xl font-bold text-slate-900 mb-2">Lerai Forest (1,800m)</h4>
                            <p class="text-slate-600">Yellowwood acacia forest providing shade and water. Home to elephants, leopards, and countless bird species.</p>
                        </div>
                    </div>
                    
                    <!-- Floor Point -->
                    <div class="flex items-center ml-24">
                        <div class="bg-emerald-600 text-white rounded-full p-4 mr-6 shadow-lg">
                            <i class="ph-bold ph-binoculars text-2xl"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-xl font-bold text-slate-900 mb-2">Crater Floor (1,676m)</h4>
                            <p class="text-slate-600">260km² wildlife paradise with open grasslands, swamps, and lakes. Prime location for Big Five sightings and photography.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Key Features -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                <div class="bg-blue-50 rounded-2xl p-8 border border-blue-100">
                    <div class="bg-blue-600 text-white rounded-full p-3 w-12 h-12 flex items-center justify-center mb-4">
                        <i class="ph-bold ph-camera text-xl"></i>
                    </div>
                    <h4 class="text-lg font-bold text-slate-900 mb-3">Photography Hotspots</h4>
                    <ul class="space-y-2 text-slate-600 text-sm">
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-blue-500"></i>
                            <span>Crater Viewpoint at sunrise</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-blue-500"></i>
                            <span>Lerai Forest lighting</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-blue-500"></i>
                            <span>Open plains for wildlife</span>
                        </li>
                    </ul>
                </div>
                
                <div class="bg-orange-50 rounded-2xl p-8 border border-orange-100">
                    <div class="bg-orange-600 text-white rounded-full p-3 w-12 h-12 flex items-center justify-center mb-4">
                        <i class="ph-bold ph-map-pin text-xl"></i>
                    </div>
                    <h4 class="text-lg font-bold text-slate-900 mb-3">Key Locations</h4>
                    <ul class="space-y-2 text-slate-600 text-sm">
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-orange-500"></i>
                            <span>Gorigor Swamp</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-orange-500"></i>
                            <span>Munge Stream</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-orange-500"></i>
                            <span>Lake Magadi</span>
                        </li>
                    </ul>
                </div>
                
                <div class="bg-emerald-50 rounded-2xl p-8 border border-emerald-100">
                    <div class="bg-emerald-600 text-white rounded-full p-3 w-12 h-12 flex items-center justify-center mb-4">
                        <i class="ph-bold ph-clock text-xl"></i>
                    </div>
                    <h4 class="text-lg font-bold text-slate-900 mb-3">Best Times</h4>
                    <ul class="space-y-2 text-slate-600 text-sm">
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-emerald-500"></i>
                            <span>Early morning wildlife</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-emerald-500"></i>
                            <span>Golden hour photography</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-emerald-500"></i>
                            <span>6-hour game drives</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-32 bg-white">
    @php
        $gallery = [
            'https://images.unsplash.com/photo-1547471080-7cc2caa01a7e?auto=format&fit=crop&w=1600&q=80',
            'https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=1600&q=80',
            'https://images.unsplash.com/photo-1516632664305-eda5d8b9b525?auto=format&fit=crop&w=1600&q=80',
            'https://images.unsplash.com/photo-1474511320723-9a56873867b5?auto=format&fit=crop&w=1600&q=80',
        ];
    @endphp
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
            <div class="lg:col-span-7">
                <h2 class="text-4xl md:text-5xl font-serif text-slate-900 font-bold mb-8 italic">Ngorongoro Conservation Area</h2>
                <div class="prose prose-lg max-w-none text-slate-600">
                    <p class="text-xl leading-relaxed">The Ngorongoro Conservation Area is a unique natural wonder and a UNESCO World Heritage Site. It is home to the Ngorongoro Crater — the world’s largest intact volcanic caldera.</p>
                    <p class="text-xl leading-relaxed">Inside the crater, visitors can see an extraordinary concentration of wildlife in a relatively small area, including endangered black rhinos.</p>
                    <p class="text-xl leading-relaxed">It is one of the best places in Africa for guaranteed wildlife sightings in a single day.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-14">
                    <div class="bg-emerald-50 p-8 rounded-3xl border border-emerald-100">
                        <h4 class="text-emerald-700 font-bold mb-4 flex items-center gap-2 italic"><i class="ph ph-shield-check text-2xl"></i> Why it’s special</h4>
                        <ul class="space-y-3 text-emerald-800 font-medium">
                            <li>High wildlife density</li>
                            <li>Excellent for one-day safaris</li>
                            <li>Chance to spot black rhino</li>
                        </ul>
                    </div>
                    <div class="bg-slate-50 p-8 rounded-3xl border border-slate-100">
                        <h4 class="text-slate-800 font-bold mb-4 flex items-center gap-2 italic"><i class="ph ph-camera text-2xl"></i> Ideal for</h4>
                        <ul class="space-y-3 text-slate-600 font-medium">
                            <li>First-time safari travelers</li>
                            <li>Family-friendly trips</li>
                            <li>Photography & landscape lovers</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-5">
                @include('regions.partials.gallery-slider', ['gallery' => $gallery, 'title' => 'Ngorongoro Gallery', 'eyebrow' => 'View more images'])
                <div class="h-10"></div>
                <div class="bg-slate-950 text-white rounded-[3.5rem] overflow-hidden p-12 relative">
                    <div class="absolute inset-0 opacity-30">
                        <img src="https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=1200&q=80" alt="Ngorongoro" class="w-full h-full object-cover">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
                    <div class="relative z-10">
                        <span class="text-emerald-500 font-black text-xs uppercase tracking-[0.4em] mb-6 block">Plan your safari</span>
                        <h3 class="text-3xl font-serif font-bold mb-6 italic">Explore Ngorongoro packages</h3>
                        <p class="text-slate-300 mb-10 leading-relaxed font-medium">Browse tours that include Ngorongoro Crater and match your schedule and comfort level.</p>
                        <a href="{{ route('tours.index', ['destination' => 'Ngorongoro']) }}" class="inline-flex items-center gap-3 px-10 py-4 bg-emerald-600 rounded-full font-bold shadow-xl shadow-emerald-600/30 hover:bg-emerald-700 transition-all">View Tours <i class="ph-bold ph-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Activities Section -->
        <div class="mt-24">
            <div class="text-center mb-16">
                <span class="text-orange-600 font-black text-xs uppercase tracking-[0.4em] mb-4 inline-block">Experiences</span>
                <h3 class="text-3xl md:text-4xl font-serif text-slate-900 font-bold mb-6">Unforgettable Activities</h3>
                <p class="text-slate-600 max-w-2xl mx-auto">From game drives to cultural encounters, discover the diverse experiences Ngorongoro offers</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Game Drive -->
                <div class="group bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-3xl p-8 border border-emerald-200 hover:shadow-xl transition-all">
                    <div class="bg-emerald-600 text-white rounded-full p-4 w-16 h-16 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="ph-bold ph-car text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-4">Crater Game Drive</h4>
                    <p class="text-slate-600 mb-4">6-hour comprehensive safari covering all crater habitats with expert guide</p>
                    <div class="space-y-2 text-sm text-emerald-700">
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-clock"></i>
                            <span>6 hours duration</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-users"></i>
                            <span>Max 6 people per vehicle</span>
                        </div>
                    </div>
                </div>
                
                <!-- Rhino Tracking -->
                <div class="group bg-gradient-to-br from-purple-50 to-purple-100 rounded-3xl p-8 border border-purple-200 hover:shadow-xl transition-all">
                    <div class="bg-purple-600 text-white rounded-full p-4 w-16 h-16 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="ph-bold ph-eye text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-4">Rhino Tracking</h4>
                    <p class="text-slate-600 mb-4">Exclusive opportunity to spot endangered black rhinos in their natural habitat</p>
                    <div class="space-y-2 text-sm text-purple-700">
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-star"></i>
                            <span>90% success rate</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-camera"></i>
                            <span>Photography permitted</span>
                        </div>
                    </div>
                </div>
                
                <!-- Cultural Visit -->
                <div class="group bg-gradient-to-br from-orange-50 to-orange-100 rounded-3xl p-8 border border-orange-200 hover:shadow-xl transition-all">
                    <div class="bg-orange-600 text-white rounded-full p-4 w-16 h-16 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="ph-bold ph-users-three text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-4">Maasai Village</h4>
                    <p class="text-slate-600 mb-4">Authentic cultural experience with traditional Maasai communities</p>
                    <div class="space-y-2 text-sm text-orange-700">
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-music-notes"></i>
                            <span>Traditional dances</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-hand-heart"></i>
                            <span>Handcraft demonstrations</span>
                        </div>
                    </div>
                </div>
                
                <!-- Crater Rim Walk -->
                <div class="group bg-gradient-to-br from-blue-50 to-blue-100 rounded-3xl p-8 border border-blue-200 hover:shadow-xl transition-all">
                    <div class="bg-blue-600 text-white rounded-full p-4 w-16 h-16 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="ph-bold ph-walking text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-4">Rim Walking Safari</h4>
                    <p class="text-slate-600 mb-4">Guided nature walks along crater rim with spectacular views</p>
                    <div class="space-y-2 text-sm text-blue-700">
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-tree"></i>
                            <span>Montane forest trails</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-binoculars"></i>
                            <span>Bird watching</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Enhanced Practical Information -->
        <div class="mt-24 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-gradient-to-br from-slate-50 to-slate-100 p-10 rounded-[2.5rem] border border-slate-200 hover:shadow-lg transition-all">
                <div class="flex items-center gap-3 mb-4">
                    <div class="bg-blue-600 text-white rounded-full p-3">
                        <i class="ph-bold ph-calendar-check text-xl"></i>
                    </div>
                    <h4 class="text-slate-900 font-black text-lg">Best Time to Visit</h4>
                </div>
                <div class="space-y-4">
                    <div class="bg-white rounded-xl p-4">
                        <h5 class="font-bold text-slate-800 mb-2">Dry Season (Jun-Oct)</h5>
                        <p class="text-slate-600 text-sm">Clear skies, excellent wildlife viewing, cooler temperatures (15-25°C)</p>
                    </div>
                    <div class="bg-white rounded-xl p-4">
                        <h5 class="font-bold text-slate-800 mb-2">Wet Season (Nov-May)</h5>
                        <p class="text-slate-600 text-sm">Lush landscapes, newborn animals, bird migration, fewer crowds</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 p-10 rounded-[2.5rem] border border-emerald-200 hover:shadow-lg transition-all">
                <div class="flex items-center gap-3 mb-4">
                    <div class="bg-emerald-600 text-white rounded-full p-3">
                        <i class="ph-bold ph-binoculars text-xl"></i>
                    </div>
                    <h4 class="text-slate-900 font-black text-lg">Top Experiences</h4>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center gap-2 text-emerald-800">
                        <i class="ph-bold ph-check-circle"></i>
                        <span class="font-medium">Full crater game drive</span>
                    </div>
                    <div class="flex items-center gap-2 text-emerald-800">
                        <i class="ph-bold ph-check-circle"></i>
                        <span class="font-medium">Black rhino tracking</span>
                    </div>
                    <div class="flex items-center gap-2 text-emerald-800">
                        <i class="ph-bold ph-check-circle"></i>
                        <span class="font-medium">Sunset viewpoints</span>
                    </div>
                    <div class="flex items-center gap-2 text-emerald-800">
                        <i class="ph-bold ph-check-circle"></i>
                        <span class="font-medium">Maasai cultural visits</span>
                    </div>
                    <div class="flex items-center gap-2 text-emerald-800">
                        <i class="ph-bold ph-check-circle"></i>
                        <span class="font-medium">Bird watching at Lake Magadi</span>
                    </div>
                </div>
            </div>
            
            <div class="bg-gradient-to-br from-slate-900 to-slate-800 p-10 rounded-[2.5rem] border border-slate-700 text-white hover:shadow-lg transition-all">
                <div class="flex items-center gap-3 mb-4">
                    <div class="bg-orange-600 text-white rounded-full p-3">
                        <i class="ph-bold ph-road-horizon text-xl"></i>
                    </div>
                    <h4 class="text-white font-black text-lg">Getting There</h4>
                </div>
                <div class="space-y-4">
                    <div class="bg-white/10 backdrop-blur rounded-xl p-4">
                        <h5 class="font-bold text-white mb-2">From Arusha</h5>
                        <p class="text-slate-300 text-sm">3-hour drive (180km) via Lake Manyara National Park</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur rounded-xl p-4">
                        <h5 class="font-bold text-white mb-2">Northern Circuit</h5>
                        <p class="text-slate-300 text-sm">Perfect between Tarangire/Manyara and Serengeti</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur rounded-xl p-4">
                        <h5 class="font-bold text-white mb-2">By Air</h5>
                        <p class="text-slate-300 text-sm">Lake Manyara Airport (45min drive to crater)</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Accommodations Preview -->
        <div class="mt-24">
            <div class="text-center mb-16">
                <span class="text-purple-600 font-black text-xs uppercase tracking-[0.4em] mb-4 inline-block">Stay Options</span>
                <h3 class="text-3xl md:text-4xl font-serif text-slate-900 font-bold mb-6">Crater Rim Accommodations</h3>
                <p class="text-slate-600 max-w-2xl mx-auto">Luxury lodges and camps offering spectacular crater views and world-class hospitality</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="group relative overflow-hidden rounded-3xl shadow-lg hover:shadow-2xl transition-all">
                    <div class="relative h-64">
                        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=800&q=80" alt="Luxury Lodge" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h4 class="text-2xl font-serif text-white font-bold">Ngorongoro Serena Lodge</h4>
                            <p class="text-slate-200">5-Star Luxury</p>
                        </div>
                    </div>
                    <div class="p-6 bg-white">
                        <p class="text-slate-600 mb-4">Perched on crater rim with spectacular views, spa, and fine dining</p>
                        <div class="flex items-center justify-between">
                            <span class="text-orange-600 font-bold">From $450/night</span>
                            <div class="flex gap-1">
                                <i class="ph-bold ph-star text-yellow-400"></i>
                                <i class="ph-bold ph-star text-yellow-400"></i>
                                <i class="ph-bold ph-star text-yellow-400"></i>
                                <i class="ph-bold ph-star text-yellow-400"></i>
                                <i class="ph-bold ph-star text-yellow-400"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="group relative overflow-hidden rounded-3xl shadow-lg hover:shadow-2xl transition-all">
                    <div class="relative h-64">
                        <img src="https://images.unsplash.com/photo-1611892440507-42c82b397b0b?auto=format&fit=crop&w=800&q=80" alt="Tented Camp" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h4 class="text-2xl font-serif text-white font-bold">Crater Forest Tented Lodge</h4>
                            <p class="text-slate-200">Eco-Luxury Camp</p>
                        </div>
                    </div>
                    <div class="p-6 bg-white">
                        <p class="text-slate-600 mb-4">Sustainable luxury tents in ancient forest with intimate wildlife encounters</p>
                        <div class="flex items-center justify-between">
                            <span class="text-orange-600 font-bold">From $380/night</span>
                            <div class="flex gap-1">
                                <i class="ph-bold ph-star text-yellow-400"></i>
                                <i class="ph-bold ph-star text-yellow-400"></i>
                                <i class="ph-bold ph-star text-yellow-400"></i>
                                <i class="ph-bold ph-star text-yellow-400"></i>
                                <i class="ph-bold ph-star text-yellow-400"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="group relative overflow-hidden rounded-3xl shadow-lg hover:shadow-2xl transition-all">
                    <div class="relative h-64">
                        <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?auto=format&fit=crop&w=800&q=80" alt="Mid-range Lodge" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h4 class="text-2xl font-serif text-white font-bold">Lodge at Ngorongoro</h4>
                            <p class="text-slate-200">Mid-Range Comfort</p>
                        </div>
                    </div>
                    <div class="p-6 bg-white">
                        <p class="text-slate-600 mb-4">Comfortable rooms with crater views, swimming pool, and local cuisine</p>
                        <div class="flex items-center justify-between">
                            <span class="text-orange-600 font-bold">From $220/night</span>
                            <div class="flex gap-1">
                                <i class="ph-bold ph-star text-yellow-400"></i>
                                <i class="ph-bold ph-star text-yellow-400"></i>
                                <i class="ph-bold ph-star text-yellow-400"></i>
                                <i class="ph-bold ph-star text-yellow-400"></i>
                                <i class="ph ph-star text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Enhanced CTA Section -->
<section class="py-20 bg-gradient-to-br from-emerald-600 to-blue-600 relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
    <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
        <h2 class="text-4xl md:text-5xl font-serif text-white font-bold mb-8">Ready to Explore Ngorongoro?</h2>
        <p class="text-emerald-100 text-xl max-w-3xl mx-auto mb-12">Join us for an unforgettable journey into Africa's wildlife paradise. Expert guides, luxury accommodations, and guaranteed Big Five sightings await.</p>
        
        <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
            <a href="{{ route('tours.index', ['destination' => 'Ngorongoro']) }}" class="group px-12 py-5 bg-white text-emerald-600 font-bold rounded-full shadow-2xl hover:scale-105 transition-all flex items-center gap-3">
                <i class="ph-bold ph-suitcase-rolling"></i>
                View Ngorongoro Tours
                <i class="ph-bold ph-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </a>
            <a href="https://wa.me/255683163219" class="group px-12 py-5 bg-emerald-700 text-white font-bold rounded-full border-2 border-emerald-400 hover:bg-emerald-800 transition-all flex items-center gap-3">
                <i class="ph-bold ph-whatsapp-logo text-xl"></i>
                Plan Your Safari
                <i class="ph-bold ph-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
        
        <!-- Quick Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-16">
            <div class="text-center">
                <div class="text-3xl font-black text-white mb-2">98%</div>
                <p class="text-emerald-100 text-sm">Big Five Sightings</p>
            </div>
            <div class="text-center">
                <div class="text-3xl font-black text-white mb-2">6hrs</div>
                <p class="text-emerald-100 text-sm">Average Game Drive</p>
            </div>
            <div class="text-center">
                <div class="text-3xl font-black text-white mb-2">365</div>
                <p class="text-emerald-100 text-sm">Days Accessible</p>
            </div>
            <div class="text-center">
                <div class="text-3xl font-black text-white mb-2">24/7</div>
                <p class="text-emerald-100 text-sm">Expert Support</p>
            </div>
        </div>
    </div>
</section>

<style>
    .bg-grid-pattern {
        background-image: 
            linear-gradient(rgba(255,255,255,0.1) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255,255,255,0.1) 1px, transparent 1px);
        background-size: 50px 50px;
    }
</style>

@endsection
