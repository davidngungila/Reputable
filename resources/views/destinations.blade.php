@extends('layouts.public')

@section('content')
<!-- Advanced Destinations Hero Section -->
<section class="relative min-h-screen overflow-hidden bg-slate-900" x-data="{ 
    currentSlide: 0, 
    isPlaying: true,
    slides: [
        { 
            image: 'images/02.jpg', 
            title: 'Serengeti Plains', 
            subtitle: 'Home to the Great Migration',
            description: 'Witness 2 million wildebeest on their annual journey across endless plains',
            highlights: ['Big Five Safari', 'Great Migration', 'Year-round Wildlife'],
            stats: { animals: '2M+', area: '14,763km²', bestTime: 'Year-round' }
        },
        { 
            image: 'images/01.jpg', 
            title: 'Mount Kilimanjaro', 
            subtitle: 'Roof of Africa',
            description: 'Stand at 5,895 meters on Africa\'s highest peak with 7 climbing routes',
            highlights: ['7 Routes Available', 'UNESCO Heritage', 'Expert Guides'],
            stats: { height: '5,895m', routes: '7', successRate: '95%' }
        },
        { 
            image: 'images/03.jpg', 
            title: 'Zanzibar Beaches', 
            subtitle: 'Paradise Islands',
            description: 'Discover pristine white sands, historic Stone Town, and spice plantations',
            highlights: ['25 Beaches', 'Stone Town', 'Spice Tours'],
            stats: { beaches: '25+', islands: '2', temperature: '28°C' }
        },
        { 
            image: 'images/05.jpg', 
            title: 'Ngorongoro Crater', 
            subtitle: 'World\'s Largest Caldera',
            description: 'Experience the highest density of wildlife in a natural volcanic paradise',
            highlights: ['Big Five Habitat', 'Black Rhino', '260km² Floor'],
            stats: { age: '2.5M years', wildlife: '25K+', depth: '610m' }
        }
    ] 
}">
    <!-- Enhanced Background Layers -->
    <div class="absolute inset-0 z-0">
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="currentSlide === index" 
                 x-transition:enter="transition ease-out duration-1500"
                 x-transition:enter-start="opacity-0 scale-110"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-1000"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-110"
                 class="absolute inset-0">
                <img :src="asset(slide.image)" :alt="slide.title" class="w-full h-full object-cover hero-parallax">
                <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/60 to-transparent"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent"></div>
            </div>
        </template>
    </div>
    
    <!-- Animated Particles -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-3 h-3 bg-emerald-400 rounded-full animate-pulse opacity-60"></div>
        <div class="absolute top-40 right-20 w-4 h-4 bg-blue-400 rounded-full animate-pulse opacity-60 delay-75"></div>
        <div class="absolute bottom-32 left-1/4 w-3 h-3 bg-purple-400 rounded-full animate-pulse opacity-60 delay-150"></div>
        <div class="absolute top-1/3 right-1/3 w-5 h-5 bg-orange-400 rounded-full animate-pulse opacity-60 delay-300"></div>
        <div class="absolute bottom-20 right-1/4 w-2 h-2 bg-yellow-400 rounded-full animate-pulse opacity-60 delay-500"></div>
    </div>
    
    <!-- Enhanced Slide Indicators -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex items-center gap-3 z-20">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="currentSlide = index" 
                    :class="currentSlide === index ? 'bg-white w-12 h-2' : 'bg-white/40 w-2 h-2 hover:bg-white/60'"
                    class="rounded-full transition-all duration-500 relative">
                <span x-show="currentSlide === index" 
                      x-transition:enter="transition ease-out duration-300"
                      x-transition:enter-start="opacity-0 scale-0"
                      x-transition:enter-end="opacity-100 scale-100"
                      class="absolute inset-0 bg-white rounded-full animate-pulse"></span>
            </button>
        </template>
    </div>
    
    <!-- Enhanced Navigation Controls -->
    <div class="absolute right-8 top-1/2 transform -translate-y-1/2 flex flex-col gap-4 z-20">
        <button @click="currentSlide = (currentSlide + 1) % slides.length" 
                class="bg-white/20 backdrop-blur-md text-white p-4 rounded-full hover:bg-white/30 transition-all hover:scale-110 group">
            <i class="ph-bold ph-arrow-right text-xl group-hover:translate-x-1 transition-transform"></i>
        </button>
        <button @click="isPlaying = !isPlaying" 
                class="bg-white/20 backdrop-blur-md text-white p-4 rounded-full hover:bg-white/30 transition-all hover:scale-110">
            <i class="ph-bold text-xl" :class="isPlaying ? 'ph-pause' : 'ph-play'"></i>
        </button>
    </div>
    <button @click="currentSlide = (currentSlide - 1 + slides.length) % slides.length" 
            class="absolute left-8 top-1/2 transform -translate-y-1/2 bg-white/20 backdrop-blur-md text-white p-4 rounded-full hover:bg-white/30 transition-all hover:scale-110 group z-20">
        <i class="ph-bold ph-arrow-left text-xl group-hover:-translate-x-1 transition-transform"></i>
    </button>
    
    <!-- Enhanced Hero Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-6 w-full h-full flex items-center">
        <div class="text-center text-white">
            <template x-for="(slide, index) in slides" :key="index">
                <div x-show="currentSlide === index" 
                     x-transition:enter="transition ease-out duration-800"
                     x-transition:enter-start="opacity-0 transform translate-y-8"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-transition:leave="transition ease-in duration-500"
                     x-transition:leave-start="opacity-100 transform translate-y-0"
                     x-transition:leave-end="opacity-0 transform -translate-y-8"
                     class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center max-w-5xl">
                        <!-- Animated Badge -->
                        <div class="inline-block mb-6">
                            <span class="inline-flex items-center gap-2 px-6 py-3 bg-emerald-600/20 text-emerald-400 rounded-full text-sm font-bold tracking-widest uppercase border border-emerald-600/30 backdrop-blur-md">
                                <i class="ph-bold ph-map-pin"></i>
                                <span x-text="slide.subtitle"></span>
                            </span>
                        </div>
                        
                        <!-- Main Title -->
                        <h1 class="text-5xl md:text-7xl lg:text-8xl font-serif text-white mb-6 font-bold leading-tight">
                            Discover <br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-blue-500" x-text="slide.title"></span>
                        </h1>
                        
                        <!-- Enhanced Description -->
                        <p class="text-xl md:text-2xl text-slate-300 mb-12 max-w-4xl mx-auto leading-relaxed" x-text="slide.description"></p>
                        
                        <!-- Interactive Stats -->
                        <div class="grid grid-cols-3 gap-6 max-w-2xl mx-auto mb-12">
                            <template x-for="(value, key) in slide.stats" :key="key">
                                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                                    <div class="text-2xl font-black text-white mb-1" x-text="value"></div>
                                    <p class="text-slate-300 text-xs font-medium capitalize" x-text="key.replace(/([A-Z])/g, ' $1').trim()"></p>
                                </div>
                            </template>
                        </div>
                        
                        <!-- Highlights -->
                        <div class="flex flex-wrap justify-center gap-3 mb-12">
                            <template x-for="highlight in slide.highlights" :key="highlight">
                                <span class="px-4 py-2 bg-white/10 backdrop-blur-md rounded-full text-sm font-medium border border-white/20" x-text="highlight"></span>
                            </template>
                        </div>
                    </div>
                </div>
            </template>
            
            <!-- Fixed CTA Section -->
            <div class="relative z-30 mt-auto">
                <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                    <a href="#destinations-grid" class="group px-12 py-5 bg-emerald-600 text-white font-bold rounded-full shadow-2xl shadow-emerald-600/30 hover:bg-emerald-700 transition-all transform hover:scale-105 flex items-center gap-3">
                        <i class="ph-bold ph-compass text-xl"></i>
                        Explore All Destinations
                        <i class="ph-bold ph-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </a>
                    <a href="/tours" class="group px-12 py-5 bg-white/10 text-white font-bold rounded-full border-2 border-white/20 hover:bg-white/20 transition-all backdrop-blur-md flex items-center gap-3">
                        <i class="ph-bold ph-map-trifold text-xl"></i>
                        Browse Tours
                        <i class="ph-bold ph-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Auto-play script -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('slides', {
                currentSlide: 0,
                slides: [
                    { image: '{{ asset("images/02.jpg") }}', title: 'Serengeti Plains', subtitle: 'Home to the Great Migration' },
                    { image: '{{ asset("images/01.jpg") }}', title: 'Mount Kilimanjaro', subtitle: 'Roof of Africa' },
                    { image: '{{ asset("images/03.jpg") }}', title: 'Zanzibar Beaches', subtitle: 'Paradise Islands' }
                ],
                init() {
                    setInterval(() => {
                        this.currentSlide = (this.currentSlide + 1) % this.slides.length;
                    }, 5000);
                }
            });
        });
    </script>
</section>

<!-- Enhanced Statistics Section -->
<section class="py-20 bg-gradient-to-br from-slate-900 to-slate-800 relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center mb-20">
            <span class="text-emerald-400 font-black text-xs uppercase tracking-[0.4em] mb-4 inline-block">Tanzania by Numbers</span>
            <h2 class="text-4xl md:text-6xl font-serif text-white font-bold mb-6">Incredible Statistics</h2>
            <p class="text-slate-300 max-w-3xl mx-auto text-xl leading-relaxed">Discover fascinating facts about Tanzania's incredible destinations and natural wonders</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
            <div class="text-center group">
                <div class="bg-gradient-to-br from-emerald-500/20 to-emerald-600/10 rounded-3xl p-8 mb-4 border border-emerald-500/20 group-hover:border-emerald-500/40 transition-all">
                    <div class="text-5xl font-black text-emerald-400 mb-2">5,895m</div>
                    <p class="text-slate-300 font-semibold">Mount Kilimanjaro</p>
                </div>
                <p class="text-slate-400 text-sm">Africa's highest peak</p>
            </div>
            
            <div class="text-center group">
                <div class="bg-gradient-to-br from-blue-500/20 to-blue-600/10 rounded-3xl p-8 mb-4 border border-blue-500/20 group-hover:border-blue-500/40 transition-all">
                    <div class="text-5xl font-black text-blue-400 mb-2">14,763</div>
                    <p class="text-slate-300 font-semibold">Serengeti km²</p>
                </div>
                <p class="text-slate-400 text-sm">World Heritage Site</p>
            </div>
            
            <div class="text-center group">
                <div class="bg-gradient-to-br from-orange-500/20 to-orange-600/10 rounded-3xl p-8 mb-4 border border-orange-500/20 group-hover:border-orange-500/40 transition-all">
                    <div class="text-5xl font-black text-orange-400 mb-2">2.5M</div>
                    <p class="text-slate-300 font-semibold">Ngorongoro Years</p>
                </div>
                <p class="text-slate-400 text-sm">Ancient caldera</p>
            </div>
            
            <div class="text-center group">
                <div class="bg-gradient-to-br from-purple-500/20 to-purple-600/10 rounded-3xl p-8 mb-4 border border-purple-500/20 group-hover:border-purple-500/40 transition-all">
                    <div class="text-5xl font-black text-purple-400 mb-2">25+</div>
                    <p class="text-slate-300 font-semibold">Zanzibar Beaches</p>
                </div>
                <p class="text-slate-400 text-sm">Paradise islands</p>
            </div>
        </div>
        
        <!-- Additional Stats -->
        <div class="bg-white/5 backdrop-blur-md rounded-3xl p-8 border border-white/10">
            <h3 class="text-2xl font-serif text-white mb-8 text-center">More Amazing Facts</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="text-3xl font-black text-white mb-2">120+</div>
                    <p class="text-slate-300 text-sm">Mammal Species</p>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-black text-white mb-2">1,000+</div>
                    <p class="text-slate-300 text-sm">Bird Species</p>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-black text-white mb-2">16</div>
                    <p class="text-slate-300 text-sm">National Parks</p>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-black text-white mb-2">60+</div>
                    <p class="text-slate-300 text-sm">Ethnic Groups</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Interactive Map Section -->
<section class="py-20 bg-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-20">
            <span class="text-blue-600 font-black text-xs uppercase tracking-[0.4em] mb-4 inline-block">Interactive Map</span>
            <h2 class="text-4xl md:text-6xl font-serif text-slate-900 font-bold mb-6">Explore Tanzania</h2>
            <p class="text-slate-600 max-w-3xl mx-auto text-xl leading-relaxed">Navigate through Tanzania's most spectacular destinations with our interactive map</p>
        </div>
        
        <!-- Map Container -->
        <div class="bg-gradient-to-br from-slate-100 to-slate-50 rounded-3xl p-8 border border-slate-200 relative overflow-hidden">
            <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
            
            <!-- Interactive Map Points -->
            <div class="relative h-96">
                <!-- Serengeti Point -->
                <div class="absolute top-1/4 left-1/3 group">
                    <div class="bg-emerald-600 text-white rounded-full p-4 shadow-lg hover:scale-110 transition-transform cursor-pointer">
                        <i class="ph-bold ph-map-pin text-xl"></i>
                    </div>
                    <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <div class="bg-slate-900 text-white p-3 rounded-lg shadow-xl whitespace-nowrap">
                            <h4 class="font-bold">Serengeti</h4>
                            <p class="text-xs">Great Migration</p>
                        </div>
                    </div>
                </div>
                
                <!-- Kilimanjaro Point -->
                <div class="absolute top-1/3 right-1/3 group">
                    <div class="bg-orange-600 text-white rounded-full p-4 shadow-lg hover:scale-110 transition-transform cursor-pointer">
                        <i class="ph-bold ph-map-pin text-xl"></i>
                    </div>
                    <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <div class="bg-slate-900 text-white p-3 rounded-lg shadow-xl whitespace-nowrap">
                            <h4 class="font-bold">Kilimanjaro</h4>
                            <p class="text-xs">5,895m Peak</p>
                        </div>
                    </div>
                </div>
                
                <!-- Ngorongoro Point -->
                <div class="absolute top-1/2 left-1/2 group">
                    <div class="bg-blue-600 text-white rounded-full p-4 shadow-lg hover:scale-110 transition-transform cursor-pointer">
                        <i class="ph-bold ph-map-pin text-xl"></i>
                    </div>
                    <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <div class="bg-slate-900 text-white p-3 rounded-lg shadow-xl whitespace-nowrap">
                            <h4 class="font-bold">Ngorongoro</h4>
                            <p class="text-xs">World's Largest Caldera</p>
                        </div>
                    </div>
                </div>
                
                <!-- Zanzibar Point -->
                <div class="absolute bottom-1/4 right-1/4 group">
                    <div class="bg-purple-600 text-white rounded-full p-4 shadow-lg hover:scale-110 transition-transform cursor-pointer">
                        <i class="ph-bold ph-map-pin text-xl"></i>
                    </div>
                    <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <div class="bg-slate-900 text-white p-3 rounded-lg shadow-xl whitespace-nowrap">
                            <h4 class="font-bold">Zanzibar</h4>
                            <p class="text-xs">Spice Islands</p>
                        </div>
                    </div>
                </div>
                
                <!-- Map Legend -->
                <div class="absolute bottom-4 left-4 bg-white rounded-xl p-4 shadow-lg">
                    <h4 class="font-bold text-slate-900 mb-3">Destinations</h4>
                    <div class="space-y-2">
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 bg-emerald-600 rounded-full"></div>
                            <span class="text-sm text-slate-700">Serengeti</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 bg-orange-600 rounded-full"></div>
                            <span class="text-sm text-slate-700">Kilimanjaro</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 bg-blue-600 rounded-full"></div>
                            <span class="text-sm text-slate-700">Ngorongoro</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 bg-purple-600 rounded-full"></div>
                            <span class="text-sm text-slate-700">Zanzibar</span>
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
        <h2 class="text-4xl md:text-5xl font-serif text-white font-bold mb-8">Ready to Explore Tanzania?</h2>
        <p class="text-emerald-100 text-xl max-w-3xl mx-auto mb-12">Let our expert guides help you discover the magic of Tanzania's most spectacular destinations. From wildlife safaris to mountain adventures and beach paradises.</p>
        
        <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
            <a href="/tours" class="group px-12 py-5 bg-white text-emerald-600 font-bold rounded-full shadow-2xl hover:scale-105 transition-all flex items-center gap-3">
                <i class="ph-bold ph-suitcase-rolling text-xl"></i>
                Browse All Tours
                <i class="ph-bold ph-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </a>
            <a href="https://wa.me/255683163219" class="group px-12 py-5 bg-emerald-700 text-white font-bold rounded-full border-2 border-emerald-400 hover:bg-emerald-800 transition-all flex items-center gap-3">
                <i class="ph-bold ph-whatsapp-logo text-xl"></i>
                Get Expert Advice
                <i class="ph-bold ph-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
        
        <!-- Quick Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-16">
            <div class="text-center">
                <div class="text-3xl font-black text-white mb-2">50+</div>
                <p class="text-emerald-100 text-sm">Tour Packages</p>
            </div>
            <div class="text-center">
                <div class="text-3xl font-black text-white mb-2">98%</div>
                <p class="text-emerald-100 text-sm">Client Satisfaction</p>
            </div>
            <div class="text-center">
                <div class="text-3xl font-black text-white mb-2">24/7</div>
                <p class="text-emerald-100 text-sm">Support Available</p>
            </div>
            <div class="text-center">
                <div class="text-3xl font-black text-white mb-2">15+</div>
                <p class="text-emerald-100 text-sm">Years Experience</p>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript for Interactive Features -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-play functionality
    document.addEventListener('alpine:init', () => {
        Alpine.store('slides', {
            currentSlide: 0,
            isPlaying: true,
            slides: [
                { 
                    image: '{{ asset("images/02.jpg") }}', 
                    title: 'Serengeti Plains', 
                    subtitle: 'Home to the Great Migration',
                    description: 'Witness 2 million wildebeest on their annual journey across endless plains',
                    highlights: ['Big Five Safari', 'Great Migration', 'Year-round Wildlife'],
                    stats: { animals: '2M+', area: '14,763km²', bestTime: 'Year-round' }
                },
                { 
                    image: '{{ asset("images/01.jpg") }}', 
                    title: 'Mount Kilimanjaro', 
                    subtitle: 'Roof of Africa',
                    description: 'Stand at 5,895 meters on Africa\'s highest peak with 7 climbing routes',
                    highlights: ['7 Routes Available', 'UNESCO Heritage', 'Expert Guides'],
                    stats: { height: '5,895m', routes: '7', successRate: '95%' }
                },
                { 
                    image: '{{ asset("images/03.jpg") }}', 
                    title: 'Zanzibar Beaches', 
                    subtitle: 'Paradise Islands',
                    description: 'Discover pristine white sands, historic Stone Town, and spice plantations',
                    highlights: ['25 Beaches', 'Stone Town', 'Spice Tours'],
                    stats: { beaches: '25+', islands: '2', temperature: '28°C' }
                },
                { 
                    image: '{{ asset("images/05.jpg") }}', 
                    title: 'Ngorongoro Crater', 
                    subtitle: 'World\'s Largest Caldera',
                    description: 'Experience the highest density of wildlife in a natural volcanic paradise',
                    highlights: ['Big Five Habitat', 'Black Rhino', '260km² Floor'],
                    stats: { age: '2.5M years', wildlife: '25K+', depth: '610m' }
                }
            ],
            init() {
                setInterval(() => {
                    if (this.isPlaying) {
                        this.currentSlide = (this.currentSlide + 1) % this.slides.length;
                    }
                }, 5000);
            }
        });
    });
    
    // Comparison functionality
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const comparisonSection = document.getElementById('comparison-section');
    const comparisonContent = document.getElementById('comparison-content');
    
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateComparison);
    });
    
    function updateComparison() {
        const selected = document.querySelectorAll('input[type="checkbox"]:checked');
        
        if (selected.length >= 2) {
            comparisonSection.classList.remove('hidden');
            // Generate comparison table
            let tableHTML = `
                <table class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left p-4">Feature</th>
            `;
            
            selected.forEach(checkbox => {
                const card = checkbox.closest('.group');
                const title = card.querySelector('h3').textContent;
                tableHTML += `<th class="text-center p-4">${title}</th>`;
            });
            
            tableHTML += `
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="p-4 font-semibold">Rating</td>
            `;
            
            selected.forEach(checkbox => {
                const card = checkbox.closest('.group');
                const rating = card.querySelector('.text-purple-900')?.textContent || 'N/A';
                tableHTML += `<td class="text-center p-4">${rating}</td>`;
            });
            
            tableHTML += `
                        </tr>
                        <tr class="border-b">
                            <td class="p-4 font-semibold">Best Time</td>
            `;
            
            selected.forEach(checkbox => {
                const card = checkbox.closest('.group');
                const bestTime = card.querySelector('.text-orange-900')?.textContent || 'Year-round';
                tableHTML += `<td class="text-center p-4">${bestTime}</td>`;
            });
            
            tableHTML += `
                        </tr>
                    </tbody>
                </table>
            `;
            
            comparisonContent.innerHTML = tableHTML;
        } else {
            comparisonSection.classList.add('hidden');
        }
    }
    
    window.closeComparison = function() {
        comparisonSection.classList.add('hidden');
        checkboxes.forEach(checkbox => checkbox.checked = false);
    };
    
    // Smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Parallax effect for hero images
    const heroImages = document.querySelectorAll('.hero-parallax');
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        heroImages.forEach(img => {
            const rect = img.getBoundingClientRect();
            if (rect.top < window.innerHeight && rect.bottom > 0) {
                const speed = 0.5;
                const yPos = -(scrolled * speed);
                img.style.transform = `translateY(${yPos}px)`;
            }
        });
    });
});

// Close comparison function
function closeComparison() {
    document.getElementById('comparison-section').classList.add('hidden');
    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => checkbox.checked = false);
}
</script>

<style>
    .bg-grid-pattern {
        background-image: 
            linear-gradient(rgba(255,255,255,0.1) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255,255,255,0.1) 1px, transparent 1px);
        background-size: 50px 50px;
    }
    
    .delay-75 { animation-delay: 75ms; }
    .delay-150 { animation-delay: 150ms; }
    .delay-300 { animation-delay: 300ms; }
    .delay-500 { animation-delay: 500ms; }
</style>

@endsection

<!-- Advanced Destinations Grid -->
<section id="destinations-grid" class="py-20 bg-gradient-to-br from-slate-50 to-emerald-50 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0 bg-grid-pattern"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <!-- Enhanced Section Header -->
        <div class="text-center mb-20">
            <span class="text-emerald-600 font-black text-xs uppercase tracking-[0.4em] mb-4 inline-block">Explore Tanzania</span>
            <h2 class="text-4xl md:text-6xl font-serif text-slate-900 font-bold mb-6">Iconic Destinations</h2>
            <p class="text-slate-600 max-w-3xl mx-auto text-xl leading-relaxed">From the endless plains of Serengeti to the pristine beaches of Zanzibar, discover Tanzania's diverse landscapes and unforgettable experiences</p>
        </div>
        
        <!-- Advanced Filtering System -->
        <div class="bg-white rounded-3xl shadow-xl p-8 mb-16 border border-emerald-100">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Interest Filter -->
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700 flex items-center gap-2">
                        <i class="ph-bold ph-compass text-emerald-600"></i>
                        Interest
                    </label>
                    <select class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-100 transition-all">
                        <option>All Interests</option>
                        <option>Wildlife & Safari</option>
                        <option>Mountain Trekking</option>
                        <option>Beach & Island</option>
                        <option>Cultural & Historical</option>
                    </select>
                </div>
                
                <!-- Season Filter -->
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700 flex items-center gap-2">
                        <i class="ph-bold ph-calendar text-emerald-600"></i>
                        Best Season
                    </label>
                    <select class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-100 transition-all">
                        <option>All Seasons</option>
                        <option>Dry Season (Jun-Oct)</option>
                        <option>Wet Season (Nov-May)</option>
                        <option>Year-round</option>
                    </select>
                </div>
                
                <!-- Difficulty Filter -->
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700 flex items-center gap-2">
                        <i class="ph-bold ph-trend-up text-emerald-600"></i>
                        Difficulty
                    </label>
                    <select class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-100 transition-all">
                        <option>All Levels</option>
                        <option>Easy & Relaxed</option>
                        <option>Moderate Adventure</option>
                        <option>Challenging Trek</option>
                    </select>
                </div>
                
                <!-- Search Filter -->
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700 flex items-center gap-2">
                        <i class="ph-bold ph-magnifying-glass text-emerald-600"></i>
                        Search
                    </label>
                    <input type="text" placeholder="Search destinations..." class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-100 transition-all">
                </div>
            </div>
            
            <!-- Quick Filter Tags -->
            <div class="flex flex-wrap gap-3 mt-6">
                <button class="px-4 py-2 bg-emerald-600 text-white rounded-full text-sm font-medium hover:bg-emerald-700 transition-all">
                    <i class="ph-bold ph-star mr-1"></i> Most Popular
                </button>
                <button class="px-4 py-2 bg-white border border-slate-200 text-slate-700 rounded-full text-sm font-medium hover:border-emerald-600 hover:text-emerald-600 transition-all">
                    <i class="ph-bold ph-trophy mr-1"></i> UNESCO Sites
                </button>
                <button class="px-4 py-2 bg-white border border-slate-200 text-slate-700 rounded-full text-sm font-medium hover:border-emerald-600 hover:text-emerald-600 transition-all">
                    <i class="ph-bold ph-users-three mr-1"></i> Family Friendly
                </button>
                <button class="px-4 py-2 bg-white border border-slate-200 text-slate-700 rounded-full text-sm font-medium hover:border-emerald-600 hover:text-emerald-600 transition-all">
                    <i class="ph-bold ph-camera mr-1"></i> Photography
                </button>
                <button class="px-4 py-2 bg-white border border-slate-200 text-slate-700 rounded-full text-sm font-medium hover:border-emerald-600 hover:text-emerald-600 transition-all">
                    <i class="ph-bold ph-heart mr-1"></i> Romantic
                </button>
            </div>
        </div>
        
        <!-- Enhanced Destinations Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Enhanced Serengeti Card -->
            <div class="group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 relative">
                <!-- Comparison Checkbox -->
                <div class="absolute top-4 left-4 z-20">
                    <label class="bg-white/90 backdrop-blur-md p-2 rounded-full cursor-pointer hover:bg-white transition-all">
                        <input type="checkbox" class="w-4 h-4 text-emerald-600 rounded focus:ring-emerald-500">
                    </label>
                </div>
                
                <!-- Favorite Button -->
                <div class="absolute top-4 right-4 z-20">
                    <button class="bg-white/90 backdrop-blur-md p-2 rounded-full hover:bg-white transition-all group/favorite">
                        <i class="ph-bold ph-heart text-slate-400 text-xl group-hover/favorite:text-red-500 transition-colors"></i>
                    </button>
                </div>
                
                <!-- Image Section -->
                <div class="relative h-72 overflow-hidden">
                    <img src="{{ asset('images/01.jpg') }}" alt="Serengeti" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
                    
                    <!-- Overlay Badges -->
                    <div class="absolute bottom-4 left-4 right-4">
                        <div class="flex flex-wrap gap-2 mb-3">
                            <span class="bg-orange-600 text-white px-3 py-1 rounded-full text-xs font-bold backdrop-blur-sm">Most Popular</span>
                            <span class="bg-emerald-600 text-white px-3 py-1 rounded-full text-xs font-bold backdrop-blur-sm">UNESCO Site</span>
                        </div>
                        <h3 class="text-2xl font-serif text-white font-bold">Serengeti National Park</h3>
                        <p class="text-slate-200 text-sm">World Heritage Site</p>
                    </div>
                </div>
                
                <!-- Content Section -->
                <div class="p-6">
                    <!-- Description -->
                    <p class="text-slate-600 mb-6 leading-relaxed">Home to the Great Migration and Africa's Big Five. Witness millions of wildebeest crossing the endless plains in nature's greatest spectacle.</p>
                    
                    <!-- Key Features Grid -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-emerald-50 rounded-xl p-3 border border-emerald-100">
                            <div class="flex items-center gap-2 text-emerald-700 mb-1">
                                <i class="ph-bold ph-map-pin"></i>
                                <span class="font-bold text-sm">Area</span>
                            </div>
                            <p class="text-emerald-900 font-black text-lg">14,763 km²</p>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-3 border border-blue-100">
                            <div class="flex items-center gap-2 text-blue-700 mb-1">
                                <i class="ph-bold ph-users"></i>
                                <span class="font-bold text-sm">Wildlife</span>
                            </div>
                            <p class="text-blue-900 font-black text-lg">2M+ Animals</p>
                        </div>
                        <div class="bg-orange-50 rounded-xl p-3 border border-orange-100">
                            <div class="flex items-center gap-2 text-orange-700 mb-1">
                                <i class="ph-bold ph-calendar"></i>
                                <span class="font-bold text-sm">Best Time</span>
                            </div>
                            <p class="text-orange-900 font-black text-lg">Year-round</p>
                        </div>
                        <div class="bg-purple-50 rounded-xl p-3 border border-purple-100">
                            <div class="flex items-center gap-2 text-purple-700 mb-1">
                                <i class="ph-bold ph-star"></i>
                                <span class="font-bold text-sm">Rating</span>
                            </div>
                            <p class="text-purple-900 font-black text-lg">5.0 Stars</p>
                        </div>
                    </div>
                    
                    <!-- Wildlife Highlight -->
                    <div class="bg-gradient-to-r from-slate-50 to-slate-100 rounded-xl p-4 mb-6 border border-slate-200">
                        <h4 class="font-bold text-slate-900 mb-3 flex items-center gap-2">
                            <i class="ph-bold ph-binoculars text-emerald-600"></i>
                            Big Five Safari
                        </h4>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-white rounded-lg text-xs font-medium text-slate-700 border border-slate-200">🦁 Lion</span>
                            <span class="px-3 py-1 bg-white rounded-lg text-xs font-medium text-slate-700 border border-slate-200">🐘 Elephant</span>
                            <span class="px-3 py-1 bg-white rounded-lg text-xs font-medium text-slate-700 border border-slate-200">🦏 Rhino</span>
                            <span class="px-3 py-1 bg-white rounded-lg text-xs font-medium text-slate-700 border border-slate-200">🐆 Leopard</span>
                            <span class="px-3 py-1 bg-white rounded-lg text-xs font-medium text-slate-700 border border-slate-200">🐃 Buffalo</span>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex gap-3">
                        <a href="{{ route('regions.serengeti') }}" class="flex-1 bg-emerald-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-emerald-700 transition-all flex items-center justify-center gap-2 group">
                            Explore Destination
                            <i class="ph-bold ph-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <button class="bg-slate-100 text-slate-700 px-4 py-3 rounded-xl font-bold hover:bg-slate-200 transition-all">
                            <i class="ph-bold ph-info"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Enhanced Ngorongoro Card -->
            <div class="group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 relative">
                <!-- Comparison Checkbox -->
                <div class="absolute top-4 left-4 z-20">
                    <label class="bg-white/90 backdrop-blur-md p-2 rounded-full cursor-pointer hover:bg-white transition-all">
                        <input type="checkbox" class="w-4 h-4 text-emerald-600 rounded focus:ring-emerald-500">
                    </label>
                </div>
                
                <!-- Favorite Button -->
                <div class="absolute top-4 right-4 z-20">
                    <button class="bg-white/90 backdrop-blur-md p-2 rounded-full hover:bg-white transition-all group/favorite">
                        <i class="ph-bold ph-heart text-slate-400 text-xl group-hover/favorite:text-red-500 transition-colors"></i>
                    </button>
                </div>
                
                <!-- Image Section -->
                <div class="relative h-72 overflow-hidden">
                    <img src="{{ asset('images/05.jpg') }}" alt="Ngorongoro" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
                    
                    <!-- Overlay Badges -->
                    <div class="absolute bottom-4 left-4 right-4">
                        <div class="flex flex-wrap gap-2 mb-3">
                            <span class="bg-emerald-600 text-white px-3 py-1 rounded-full text-xs font-bold backdrop-blur-sm">UNESCO Site</span>
                            <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-bold backdrop-blur-sm">Natural Wonder</span>
                        </div>
                        <h3 class="text-2xl font-serif text-white font-bold">Ngorongoro Crater</h3>
                        <p class="text-slate-200 text-sm">World's Largest Caldera</p>
                    </div>
                </div>
                
                <!-- Content Section -->
                <div class="p-6">
                    <!-- Description -->
                    <p class="text-slate-600 mb-6 leading-relaxed">The world's largest unbroken caldera with the highest density of big game. A natural wonder formed 2.5 million years ago by volcanic collapse.</p>
                    
                    <!-- Key Features Grid -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-emerald-50 rounded-xl p-3 border border-emerald-100">
                            <div class="flex items-center gap-2 text-emerald-700 mb-1">
                                <i class="ph-bold ph-volcano"></i>
                                <span class="font-bold text-sm">Age</span>
                            </div>
                            <p class="text-emerald-900 font-black text-lg">2.5M Years</p>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-3 border border-blue-100">
                            <div class="flex items-center gap-2 text-blue-700 mb-1">
                                <i class="ph-bold ph-users"></i>
                                <span class="font-bold text-sm">Wildlife</span>
                            </div>
                            <p class="text-blue-900 font-black text-lg">25K+ Animals</p>
                        </div>
                        <div class="bg-orange-50 rounded-xl p-3 border border-orange-100">
                            <div class="flex items-center gap-2 text-orange-700 mb-1">
                                <i class="ph-bold ph-ruler"></i>
                                <span class="font-bold text-sm">Depth</span>
                            </div>
                            <p class="text-orange-900 font-black text-lg">610m Deep</p>
                        </div>
                        <div class="bg-purple-50 rounded-xl p-3 border border-purple-100">
                            <div class="flex items-center gap-2 text-purple-700 mb-1">
                                <i class="ph-bold ph-star"></i>
                                <span class="font-bold text-sm">Rating</span>
                            </div>
                            <p class="text-purple-900 font-black text-lg">4.9 Stars</p>
                        </div>
                    </div>
                    
                    <!-- Wildlife Highlight -->
                    <div class="bg-gradient-to-r from-slate-50 to-slate-100 rounded-xl p-4 mb-6 border border-slate-200">
                        <h4 class="font-bold text-slate-900 mb-3 flex items-center gap-2">
                            <i class="ph-bold ph-binoculars text-emerald-600"></i>
                            Big Five Paradise
                        </h4>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-white rounded-lg text-xs font-medium text-slate-700 border border-slate-200">🦏 Black Rhino</span>
                            <span class="px-3 py-1 bg-white rounded-lg text-xs font-medium text-slate-700 border border-slate-200">🐘 Elephant</span>
                            <span class="px-3 py-1 bg-white rounded-lg text-xs font-medium text-slate-700 border border-slate-200">🦁 Lion</span>
                            <span class="px-3 py-1 bg-white rounded-lg text-xs font-medium text-slate-700 border border-slate-200">🐆 Leopard</span>
                            <span class="px-3 py-1 bg-white rounded-lg text-xs font-medium text-slate-700 border border-slate-200">🐃 Buffalo</span>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex gap-3">
                        <a href="{{ route('regions.ngorongoro') }}" class="flex-1 bg-emerald-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-emerald-700 transition-all flex items-center justify-center gap-2 group">
                            Explore Destination
                            <i class="ph-bold ph-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <button class="bg-slate-100 text-slate-700 px-4 py-3 rounded-xl font-bold hover:bg-slate-200 transition-all">
                            <i class="ph-bold ph-info"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Enhanced Kilimanjaro Card -->
            <div class="group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 relative">
                <!-- Comparison Checkbox -->
                <div class="absolute top-4 left-4 z-20">
                    <label class="bg-white/90 backdrop-blur-md p-2 rounded-full cursor-pointer hover:bg-white transition-all">
                        <input type="checkbox" class="w-4 h-4 text-emerald-600 rounded focus:ring-emerald-500">
                    </label>
                </div>
                
                <!-- Favorite Button -->
                <div class="absolute top-4 right-4 z-20">
                    <button class="bg-white/90 backdrop-blur-md p-2 rounded-full hover:bg-white transition-all group/favorite">
                        <i class="ph-bold ph-heart text-slate-400 text-xl group-hover/favorite:text-red-500 transition-colors"></i>
                    </button>
                </div>
                
                <!-- Image Section -->
                <div class="relative h-72 overflow-hidden">
                    <img src="{{ asset('images/03.jpg') }}" alt="Kilimanjaro" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
                    
                    <!-- Overlay Badges -->
                    <div class="absolute bottom-4 left-4 right-4">
                        <div class="flex flex-wrap gap-2 mb-3">
                            <span class="bg-orange-600 text-white px-3 py-1 rounded-full text-xs font-bold backdrop-blur-sm">Roof of Africa</span>
                            <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-bold backdrop-blur-sm">7 Routes</span>
                        </div>
                        <h3 class="text-2xl font-serif text-white font-bold">Mount Kilimanjaro</h3>
                        <p class="text-slate-200 text-sm">Africa's Highest Peak</p>
                    </div>
                </div>
                
                <!-- Content Section -->
                <div class="p-6">
                    <!-- Description -->
                    <p class="text-slate-600 mb-6 leading-relaxed">Africa's highest peak at 5,895 meters. Choose from 7 different climbing routes with expert guides and comprehensive support for your summit success.</p>
                    
                    <!-- Key Features Grid -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-emerald-50 rounded-xl p-3 border border-emerald-100">
                            <div class="flex items-center gap-2 text-emerald-700 mb-1">
                                <i class="ph-bold ph-mountains"></i>
                                <span class="font-bold text-sm">Height</span>
                            </div>
                            <p class="text-emerald-900 font-black text-lg">5,895m</p>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-3 border border-blue-100">
                            <div class="flex items-center gap-2 text-blue-700 mb-1">
                                <i class="ph-bold ph-signpost"></i>
                                <span class="font-bold text-sm">Routes</span>
                            </div>
                            <p class="text-blue-900 font-black text-lg">7 Available</p>
                        </div>
                        <div class="bg-orange-50 rounded-xl p-3 border border-orange-100">
                            <div class="flex items-center gap-2 text-orange-700 mb-1">
                                <i class="ph-bold ph-trophy"></i>
                                <span class="font-bold text-sm">Success</span>
                            </div>
                            <p class="text-orange-900 font-black text-lg">95% Rate</p>
                        </div>
                        <div class="bg-purple-50 rounded-xl p-3 border border-purple-100">
                            <div class="flex items-center gap-2 text-purple-700 mb-1">
                                <i class="ph-bold ph-star"></i>
                                <span class="font-bold text-sm">Rating</span>
                            </div>
                            <p class="text-purple-900 font-black text-lg">4.8 Stars</p>
                        </div>
                    </div>
                    
                    <!-- Routes Highlight -->
                    <div class="bg-gradient-to-r from-slate-50 to-slate-100 rounded-xl p-4 mb-6 border border-slate-200">
                        <h4 class="font-bold text-slate-900 mb-3 flex items-center gap-2">
                            <i class="ph-bold ph-map-trifold text-emerald-600"></i>
                            Popular Routes
                        </h4>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-white rounded-lg text-xs font-medium text-slate-700 border border-slate-200">🏔️ Marangu</span>
                            <span class="px-3 py-1 bg-white rounded-lg text-xs font-medium text-slate-700 border border-slate-200">🥃 Machame</span>
                            <span class="px-3 py-1 bg-white rounded-lg text-xs font-medium text-slate-700 border border-slate-200">🌿 Lemosho</span>
                            <span class="px-3 py-1 bg-white rounded-lg text-xs font-medium text-slate-700 border border-slate-200">🧭 Northern</span>
                            <span class="px-3 py-1 bg-white rounded-lg text-xs font-medium text-slate-700 border border-slate-200">+3 More</span>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex gap-3">
                        <a href="{{ route('kilimanjaro') }}" class="flex-1 bg-emerald-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-emerald-700 transition-all flex items-center justify-center gap-2 group">
                            Explore Routes
                            <i class="ph-bold ph-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <button class="bg-slate-100 text-slate-700 px-4 py-3 rounded-xl font-bold hover:bg-slate-200 transition-all">
                            <i class="ph-bold ph-info"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Enhanced Zanzibar Card -->
            <div class="group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 relative">
                <!-- Comparison Checkbox -->
                <div class="absolute top-4 left-4 z-20">
                    <label class="bg-white/90 backdrop-blur-md p-2 rounded-full cursor-pointer hover:bg-white transition-all">
                        <input type="checkbox" class="w-4 h-4 text-emerald-600 rounded focus:ring-emerald-500">
                    </label>
                </div>
                
                <!-- Favorite Button -->
                <div class="absolute top-4 right-4 z-20">
                    <button class="bg-white/90 backdrop-blur-md p-2 rounded-full hover:bg-white transition-all group/favorite">
                        <i class="ph-bold ph-heart text-slate-400 text-xl group-hover/favorite:text-red-500 transition-colors"></i>
                    </button>
                </div>
                
                <!-- Image Section -->
                <div class="relative h-72 overflow-hidden">
                    <img src="{{ asset('images/07.jpg') }}" alt="Zanzibar" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
                    
                    <!-- Overlay Badges -->
                    <div class="absolute bottom-4 left-4 right-4">
                        <div class="flex flex-wrap gap-2 mb-3">
                            <span class="bg-purple-600 text-white px-3 py-1 rounded-full text-xs font-bold backdrop-blur-sm">Spice Islands</span>
                            <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-bold backdrop-blur-sm">Beach Paradise</span>
                        </div>
                        <h3 class="text-2xl font-serif text-white font-bold">Zanzibar Archipelago</h3>
                        <p class="text-slate-200 text-sm">Tropical Paradise</p>
                    </div>
                </div>
                
                <!-- Content Section -->
                <div class="p-6">
                    <!-- Description -->
                    <p class="text-slate-600 mb-6 leading-relaxed">Tanzania's semi-autonomous archipelago with pristine white sand beaches, historic Stone Town, and aromatic spice plantations awaiting your discovery.</p>
                    
                    <!-- Key Features Grid -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-emerald-50 rounded-xl p-3 border border-emerald-100">
                            <div class="flex items-center gap-2 text-emerald-700 mb-1">
                                <i class="ph-bold ph-umbrella"></i>
                                <span class="font-bold text-sm">Beaches</span>
                            </div>
                            <p class="text-emerald-900 font-black text-lg">25+ Pristine</p>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-3 border border-blue-100">
                            <div class="flex items-center gap-2 text-blue-700 mb-1">
                                <i class="ph-bold ph-sun"></i>
                                <span class="font-bold text-sm">Temperature</span>
                            </div>
                            <p class="text-blue-900 font-black text-lg">28°C Avg</p>
                        </div>
                        <div class="bg-orange-50 rounded-xl p-3 border border-orange-100">
                            <div class="flex items-center gap-2 text-orange-700 mb-1">
                                <i class="ph-bold ph-plant"></i>
                                <span class="font-bold text-sm">Spices</span>
                            </div>
                            <p class="text-orange-900 font-black text-lg">50+ Types</p>
                        </div>
                        <div class="bg-purple-50 rounded-xl p-3 border border-purple-100">
                            <div class="flex items-center gap-2 text-purple-700 mb-1">
                                <i class="ph-bold ph-star"></i>
                                <span class="font-bold text-sm">Rating</span>
                            </div>
                            <p class="text-purple-900 font-black text-lg">4.7 Stars</p>
                        </div>
                    </div>
                    
                    <!-- Activities Highlight -->
                    <div class="bg-gradient-to-r from-slate-50 to-slate-100 rounded-xl p-4 mb-6 border border-slate-200">
                        <h4 class="font-bold text-slate-900 mb-3 flex items-center gap-2">
                            <i class="ph-bold ph-compass text-emerald-600"></i>
                            Top Activities
                        </h4>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-white rounded-lg text-xs font-medium text-slate-700 border border-slate-200">🏖️ Beach Relax</span>
                            <span class="px-3 py-1 bg-white rounded-lg text-xs font-medium text-slate-700 border border-slate-200">🏛️ Stone Town</span>
                            <span class="px-3 py-1 bg-white rounded-lg text-xs font-medium text-slate-700 border border-slate-200">🌶️ Spice Tours</span>
                            <span class="px-3 py-1 bg-white rounded-lg text-xs font-medium text-slate-700 border border-slate-200">🤿 Diving</span>
                            <span class="px-3 py-1 bg-white rounded-lg text-xs font-medium text-slate-700 border border-slate-200">🐢 Dolphins</span>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex gap-3">
                        <a href="{{ route('regions.zanzibar') }}" class="flex-1 bg-emerald-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-emerald-700 transition-all flex items-center justify-center gap-2 group">
                            Explore Islands
                            <i class="ph-bold ph-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <button class="bg-slate-100 text-slate-700 px-4 py-3 rounded-xl font-bold hover:bg-slate-200 transition-all">
                            <i class="ph-bold ph-info"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Interactive Comparison Section -->
        <div id="comparison-section" class="hidden mt-16 bg-white rounded-3xl shadow-xl p-8 border border-emerald-100">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-2xl font-serif text-slate-900 font-bold">Compare Destinations</h3>
                <button onclick="closeComparison()" class="text-slate-400 hover:text-slate-600 transition-colors">
                    <i class="ph-bold ph-x text-2xl"></i>
                </button>
            </div>
            <div id="comparison-content" class="overflow-x-auto">
                <!-- Comparison table will be dynamically generated -->
            </div>
        </div>
    </div>
</section>

<!-- Destination Statistics Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-serif font-bold text-gray-800 mb-4">Tanzania by Numbers</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Discover fascinating facts about Tanzania's incredible destinations</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 p-6 rounded-2xl mb-4">
                    <i class="ph-bold ph-mountains text-4xl text-emerald-600 mb-3"></i>
                    <div class="text-3xl font-black font-bold">5,895m</div>
                    <div class="text-sm text-gray-600">Mount Kilimanjaro</div>
                </div>
                <p class="text-sm text-gray-600">Africa's highest peak</p>
            </div>
            
            <div class="text-center">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-2xl mb-4">
                    <i class="ph-bold ph-binoculars text-4xl text-blue-600 mb-3"></i>
                    <div class="text-3xl font-black font-bold">2.8M</div>
                    <div class="text-sm text-gray-600">Hectares</div>
                </div>
                <p class="text-sm text-gray-600">Serengeti National Park</p>
            </div>
            
            <div class="text-center">
                <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-6 rounded-2xl mb-4">
                    <i class="ph-bold ph-volcano text-4xl text-orange-600 mb-3"></i>
                    <div class="text-3xl font-black font-bold">2.5M</div>
                    <div class="text-sm text-gray-600">Years Old</div>
                </div>
                <p class="text-sm text-gray-600">Ngorongoro Crater</p>
            </div>
            
            <div class="text-center">
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-6 rounded-2xl mb-4">
                    <i class="ph-bold ph-umbrella text-4xl text-purple-600 mb-3"></i>
                    <div class="text-3xl font-black font-bold">25</div>
                    <div class="text-sm text-gray-600">Beaches</div>
                </div>
                <p class="text-sm text-gray-600">Zanzibar Islands</p>
            </div>
        </div>
    </div>
</section>

<!-- Filter Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-serif font-bold text-gray-800 mb-4">Find Your Perfect Destination</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Filter destinations by your interests and travel preferences</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
                <div class="flex items-center gap-3 mb-4">
                    <div class="bg-emerald-100 p-3 rounded-full">
                        <i class="ph-bold ph-compass text-emerald-600 text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">By Interest</h4>
                        <p class="text-sm text-gray-600">Choose your preferred activity</p>
                    </div>
                </div>
                <div class="space-y-3">
                    <button class="w-full text-left px-4 py-3 rounded-lg border border-gray-200 hover:border-emerald-600 hover:bg-emerald-50 transition-colors">
                        <i class="ph-bold ph-camera text-gray-600 mr-3"></i>
                        Wildlife & Safari
                    </button>
                    <button class="w-full text-left px-4 py-3 rounded-lg border border-gray-200 hover:border-emerald-600 hover:bg-emerald-50 transition-colors">
                        <i class="ph-bold ph-mountains text-gray-600 mr-3"></i>
                        Mountain Trekking
                    </button>
                    <button class="w-full text-left px-4 py-3 rounded-lg border border-gray-200 hover:border-emerald-600 hover:bg-emerald-50 transition-colors">
                        <i class="ph-bold ph-umbrella text-gray-600 mr-3"></i>
                        Beach & Island
                    </button>
                    <button class="w-full text-left px-4 py-3 rounded-lg border border-gray-200 hover:border-emerald-600 hover:bg-emerald-50 transition-colors">
                        <i class="ph-bold ph-culture text-gray-600 mr-3"></i>
                        Cultural & Historical
                    </button>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
                <div class="flex items-center gap-3 mb-4">
                    <div class="bg-blue-100 p-3 rounded-full">
                        <i class="ph-bold ph-calendar text-blue-600 text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">By Season</h4>
                        <p class="text-sm text-gray-600">Best time to visit</p>
                    </div>
                </div>
                <div class="space-y-3">
                    <button class="w-full text-left px-4 py-3 rounded-lg border border-gray-200 hover:border-blue-600 hover:bg-blue-50 transition-colors">
                        <i class="ph-bold ph-sun text-gray-600 mr-3"></i>
                        Dry Season (Jun-Oct)
                    </button>
                    <button class="w-full text-left px-4 py-3 rounded-lg border border-gray-200 hover:border-blue-600 hover:bg-blue-50 transition-colors">
                        <i class="ph-bold ph-cloud-rain text-gray-600 mr-3"></i>
                        Wet Season (Nov-May)
                    </button>
                    <button class="w-full text-left px-4 py-3 rounded-lg border border-gray-200 hover:border-blue-600 hover:bg-blue-50 transition-colors">
                        <i class="ph-bold ph-leaf text-gray-600 mr-3"></i>
                        All Seasons
                    </button>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
                <div class="flex items-center gap-3 mb-4">
                    <div class="bg-orange-100 p-3 rounded-full">
                        <i class="ph-bold ph-users text-orange-600 text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">By Difficulty</h4>
                        <p class="text-sm text-gray-600">Match your fitness level</p>
                    </div>
                </div>
                <div class="space-y-3">
                    <button class="w-full text-left px-4 py-3 rounded-lg border border-gray-200 hover:border-orange-600 hover:bg-orange-50 transition-colors">
                        <i class="ph-bold ph-walking text-gray-600 mr-3"></i>
                        Easy & Relaxed
                    </button>
                    <button class="w-full text-left px-4 py-3 rounded-lg border border-gray-200 hover:border-orange-600 hover:bg-orange-50 transition-colors">
                        <i class="ph-bold ph-trekking text-gray-600 mr-3"></i>
                        Moderate Adventure
                    </button>
                    <button class="w-full text-left px-4 py-3 rounded-lg border border-gray-200 hover:border-orange-600 hover:bg-orange-50 transition-colors">
                        <i class="ph-bold ph-trend-up text-gray-600 mr-3"></i>
                        Challenging Trek
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kilimanjaro Packages Section -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-serif font-bold text-gray-800 mb-4">Kilimanjaro Climbing Packages</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">All-inclusive packages with expert guides, quality equipment, and comprehensive support</p>
        </div>
        
        <!-- Package Inclusions -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-12">
            <h3 class="text-xl font-bold text-gray-800 mb-6">All Kilimanjaro Packages Include:</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="flex items-start gap-3">
                    <i class="ph-bold ph-check-circle text-emerald-600 text-xl mt-1"></i>
                    <div>
                        <h4 class="font-semibold text-gray-800">All Fees & Taxes</h4>
                        <p class="text-sm text-gray-600">National Park fees, conservation fees, and all applicable taxes</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <i class="ph-bold ph-check-circle text-emerald-600 text-xl mt-1"></i>
                    <div>
                        <h4 class="font-semibold text-gray-800">Expert Guides</h4>
                        <p class="text-sm text-gray-600">Certified English-speaking mountain guides at KINAPA ratios</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <i class="ph-bold ph-check-circle text-emerald-600 text-xl mt-1"></i>
                    <div>
                        <h4 class="font-semibold text-gray-800">Porter Support</h4>
                        <p class="text-sm text-gray-600">Luggage porters (15kg Kili, 12kg Meru) and specialist tent crew</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <i class="ph-bold ph-check-circle text-emerald-600 text-xl mt-1"></i>
                    <div>
                        <h4 class="font-semibold text-gray-800">All Meals</h4>
                        <p class="text-sm text-gray-600">Complete meal service with utensils and dining equipment</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <i class="ph-bold ph-check-circle text-emerald-600 text-xl mt-1"></i>
                    <div>
                        <h4 class="font-semibold text-gray-800">Transfers</h4>
                        <p class="text-sm text-gray-600">Airport transfers and gate transfers included</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <i class="ph-bold ph-check-circle text-emerald-600 text-xl mt-1"></i>
                    <div>
                        <h4 class="font-semibold text-gray-800">Safety Equipment</h4>
                        <p class="text-sm text-gray-600">Emergency oxygen, first aid kit, and safety protocols</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Route Highlights -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            <!-- Marangu Route -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center">
                        <i class="ph-bold ph-signpost text-emerald-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Marangu Route</h3>
                </div>
                <p class="text-gray-600 mb-4">The "Coca-Cola Route" - Only route with mountain huts. Perfect for first-time climbers.</p>
                <div class="space-y-2">
                    <div class="flex items-center gap-2 text-sm">
                        <i class="ph-bold ph-clock text-gray-400"></i>
                        <span class="font-semibold">5-7 Days</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm">
                        <i class="ph-bold ph-trend-up text-gray-400"></i>
                        <span class="font-semibold">Moderate Difficulty</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm">
                        <i class="ph-bold ph-star text-gray-400"></i>
                        <span class="font-semibold">Highest Success Rate</span>
                    </div>
                </div>
            </div>
            
            <!-- Machame Route -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="ph-bold ph-mountains text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Machame Route</h3>
                </div>
                <p class="text-gray-600 mb-4">The "Whiskey Route" - Most popular scenic route with diverse landscapes.</p>
                <div class="space-y-2">
                    <div class="flex items-center gap-2 text-sm">
                        <i class="ph-bold ph-clock text-gray-400"></i>
                        <span class="font-semibold">6-8 Days</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm">
                        <i class="ph-bold ph-trend-up text-gray-400"></i>
                        <span class="font-semibold">Challenging Difficulty</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm">
                        <i class="ph-bold ph-camera text-gray-400"></i>
                        <span class="font-semibold">Scenic Views</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Optional Extras -->
        <div class="bg-amber-50 rounded-2xl p-6 mb-12">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Optional Extras Available:</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 text-sm">
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-plus-circle text-amber-600"></i>
                    <span>Pre/Post Climb Accommodation</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-plus-circle text-amber-600"></i>
                    <span>Private Toilets</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-plus-circle text-amber-600"></i>
                    <span>Flying Doctors Insurance</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-plus-circle text-amber-600"></i>
                    <span>Personal Equipment</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-plus-circle text-amber-600"></i>
                    <span>Additional Oxygen</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-plus-circle text-amber-600"></i>
                    <span>Celebration Items</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-plus-circle text-amber-600"></i>
                    <span>Extra Guides/Porters</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-plus-circle text-amber-600"></i>
                    <span>Acclimatization Days</span>
                </div>
            </div>
        </div>
        
        <!-- What's Not Included -->
        <div class="bg-red-50 rounded-2xl p-6 mb-12">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Not Included:</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-x-circle text-red-600"></i>
                    <span>Tips & Gratuities</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-x-circle text-red-600"></i>
                    <span>Alcoholic Beverages</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-x-circle text-red-600"></i>
                    <span>International Flights</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-x-circle text-red-600"></i>
                    <span>Travel Insurance</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-x-circle text-red-600"></i>
                    <span>Visas</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-x-circle text-red-600"></i>
                    <span>Personal Items</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph-bold ph-x-circle text-red-600"></i>
                    <span>Day 1 Water</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-[#1F5A3A]">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-serif font-bold text-white mb-4">Ready to Start Your Adventure?</h2>
        <p class="text-white/90 mb-8 max-w-2xl mx-auto">Let our expert guides help you plan the perfect Tanzanian safari experience.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/tours" class="px-10 py-4 bg-white text-[#1F5A3A] font-bold rounded-full hover:bg-white/90 transition-all">
                <i class="ph-bold ph-map-trifold text-xl mr-2"></i>
                Browse All Tours
            </a>
            <a href="/contact" class="px-10 py-4 bg-[#E67A2E] text-white font-bold rounded-full hover:bg-[#E67A2E]/90 transition-all">
                <i class="ph-bold ph-chat-circle-dots text-xl mr-2"></i>
                Talk to Expert
            </a>
        </div>
    </div>
</section>
@endsection
