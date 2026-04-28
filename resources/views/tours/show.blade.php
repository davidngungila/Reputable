@extends('layouts.public')

@section('content')
<!-- Enhanced Tour Header & Gallery -->
<section class="pt-32 pb-12 bg-gradient-to-b from-emerald-50 to-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-10">
            <!-- Breadcrumb -->
            <nav class="flex items-center gap-2 text-sm text-slate-500 mb-4">
                <a href="{{ route('tours.index') }}" class="hover:text-emerald-600 transition-colors">Tours</a>
                <i class="ph ph-caret-right"></i>
                <span class="text-emerald-600 font-medium">{{ $tour->name }}</span>
            </nav>
            
            <div class="flex flex-wrap items-center gap-4 text-emerald-600 font-bold text-sm uppercase mb-4 tracking-widest">
                <span class="flex items-center gap-2"><i class="ph ph-map-pin"></i> {{ $tour->location }}</span>
                @if(str_contains($tour->name, 'Kilimanjaro'))
                <span class="flex items-center gap-2"><i class="ph ph-mountains"></i> Mountain Trekking</span>
                @else
                <span class="flex items-center gap-2"><i class="ph ph-binoculars"></i> Safari</span>
                @endif
            </div>
            <h1 class="text-4xl md:text-5xl font-serif font-bold text-slate-900 mb-6">{{ $tour->name }}</h1>
            <div class="flex flex-wrap items-center gap-6 text-slate-500 font-medium">
                <span class="flex items-center gap-2 bg-emerald-50 px-3 py-1 rounded-full"><i class="ph ph-clock text-xl text-emerald-500"></i> {{ $tour->duration_days }} Days</span>
                <span class="flex items-center gap-2 bg-blue-50 px-3 py-1 rounded-full"><i class="ph ph-users text-xl text-blue-500"></i> Up to 6 People</span>
                <span class="flex items-center gap-2 bg-purple-50 px-3 py-1 rounded-full"><i class="ph ph-translate text-xl text-purple-500"></i> English, French</span>
                <div class="flex items-center gap-1 text-amber-500">
                    <i class="ph-fill ph-star"></i>
                    <i class="ph-fill ph-star"></i>
                    <i class="ph-fill ph-star"></i>
                    <i class="ph-fill ph-star"></i>
                    <i class="ph-fill ph-star"></i>
                    <span class="ml-1 text-slate-900 font-bold">5.0</span>
                    <span class="text-slate-400 text-sm">(127 Reviews)</span>
                </div>
            </div>
        </div>
        
        <!-- Enhanced Gallery Grid with Lightbox -->
        @php $images = $tour->images ?? []; @endphp
        <div x-data="{ 
            currentImage: 0,
            lightboxOpen: false,
            openLightbox(index) { this.currentImage = index; this.lightboxOpen = true; document.body.style.overflow = 'hidden'; },
            closeLightbox() { this.lightboxOpen = false; document.body.style.overflow = 'auto'; },
            nextImage() { this.currentImage = (this.currentImage + 1) % @json(count($images)); },
            prevImage() { this.currentImage = (this.currentImage - 1 + @json(count($images))) % @json(count($images)); }
        }" class="relative">
            <div class="grid grid-cols-1 md:grid-cols-4 grid-rows-2 gap-4 h-[600px] rounded-[2.5rem] overflow-hidden shadow-2xl">
                <div class="md:col-span-2 md:row-span-2 relative group cursor-pointer" @click="openLightbox(0)">
                    <img src="{{ $images[0] ?? 'https://images.unsplash.com/photo-1516426122078-c23e76319801' }}?auto=format&fit=crop&w=1200&q=80" alt="{{ $tour->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                        <div class="absolute bottom-4 left-4 text-white">
                            <span class="text-sm font-medium">Click to enlarge</span>
                        </div>
                    </div>
                </div>
                <div class="relative group cursor-pointer" @click="openLightbox(1)">
                    <img src="{{ $images[1] ?? 'https://images.unsplash.com/photo-1547471080-7cc2caa01a7e' }}?auto=format&fit=crop&w=600&q=80" alt="Tour Activity" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-black/30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <i class="ph ph-arrows-out text-white text-2xl"></i>
                    </div>
                </div>
                <div class="relative group cursor-pointer" @click="openLightbox(2)">
                    <img src="{{ $images[2] ?? 'https://images.unsplash.com/photo-1523805081730-614449379e70' }}?auto=format&fit=crop&w=600&q=80" alt="Tour Scenery" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-black/30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <i class="ph ph-arrows-out text-white text-2xl"></i>
                    </div>
                </div>
                <div class="md:col-span-2 relative group cursor-pointer" @click="openLightbox(3)">
                    <img src="{{ $images[0] ?? 'https://images.unsplash.com/photo-1493612276216-ee3925520721' }}?auto=format&fit=crop&w=800&q=80" alt="Tour Experience" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="text-white font-bold flex items-center gap-2"><i class="ph ph-images"></i> View All Photos ({{ count($images) }})</span>
                    </div>
                </div>
            </div>
            
            <!-- Lightbox -->
            <div x-show="lightboxOpen" x-transition.opacity.duration.300ms class="fixed inset-0 bg-black/90 z-50 flex items-center justify-center p-4" @click="closeLightbox()" @keydown.escape.window="closeLightbox()">
                <div class="relative max-w-6xl max-h-full" @click.stop>
                    <img :src="'{{ $images[0] ?? 'https://images.unsplash.com/photo-1516426122078-c23e76319801' }}?auto=format&fit=crop&w=1200&q=80'" alt="{{ $tour->name }}" class="max-w-full max-h-full object-contain rounded-lg">
                    <button @click="closeLightbox()" class="absolute top-4 right-4 bg-white/20 backdrop-blur-sm text-white p-2 rounded-full hover:bg-white/30 transition-colors">
                        <i class="ph ph-x text-xl"></i>
                    </button>
                    <button @click="prevImage()" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/20 backdrop-blur-sm text-white p-3 rounded-full hover:bg-white/30 transition-colors">
                        <i class="ph ph-caret-left text-xl"></i>
                    </button>
                    <button @click="nextImage()" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/20 backdrop-blur-sm text-white p-3 rounded-full hover:bg-white/30 transition-colors">
                        <i class="ph ph-caret-right text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content & Booking Form -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
            <!-- Left Column: Details -->
            <div class="lg:col-span-2">
                <div class="mb-12">
                    <h2 class="text-3xl font-serif font-bold text-slate-900 mb-6">Overview</h2>
                    <p class="text-slate-600 leading-relaxed mb-6">
                        {{ $tour->description }}
                    </p>
                </div>
                
                <hr class="border-slate-100 mb-12">
                
                <!-- Enhanced Itinerary with Accordion -->
                <div class="mb-12">
                    <div class="flex items-center justify-between mb-8">
                        <h2 class="text-3xl font-serif font-bold text-slate-900">Daily Itinerary</h2>
                        @if(str_contains($tour->name, 'Kilimanjaro'))
                        <button @click="showAltitudeChart = !showAltitudeChart" class="bg-emerald-50 text-emerald-700 px-4 py-2 rounded-xl font-medium hover:bg-emerald-100 transition-colors flex items-center gap-2">
                            <i class="ph ph-chart-line"></i> Altitude Profile
                        </button>
                        @endif
                    </div>
                    
                    <!-- Altitude Chart for Kilimanjaro Tours -->
                    @if(str_contains($tour->name, 'Kilimanjaro'))
                    <div x-show="showAltitudeChart" x-transition.opacity.duration.300ms class="mb-8 bg-gradient-to-r from-blue-50 to-emerald-50 rounded-2xl p-6 border border-emerald-100">
                        <h3 class="text-lg font-bold text-slate-900 mb-4">Altitude Profile</h3>
                        <div class="relative h-48 bg-white rounded-xl p-4">
                            <svg class="w-full h-full" viewBox="0 0 400 150">
                                <polyline points="20,120 60,100 100,80 140,60 180,40 220,30 260,50 300,70 340,90 380,110" 
                                          fill="none" stroke="#10b981" stroke-width="2"/>
                                <circle cx="220" cy="30" r="4" fill="#ef4444"/>
                                <text x="220" y="20" text-anchor="middle" class="text-xs font-bold fill="#ef4444">Uhuru Peak 5,895m</text>
                                <text x="20" y="140" class="text-xs fill="#64748b">Day 1</text>
                                <text x="380" y="140" class="text-xs fill="#64748b">Day {{ $tour->duration_days }}</text>
                            </svg>
                        </div>
                    </div>
                    @endif
                    
                    <div x-data="{ openDay: null }" class="space-y-4">
                        @forelse($tour->itineraries as $item)
                        <div class="bg-white border border-slate-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow">
                            <button @click="openDay = openDay === {{ $loop->index }} ? null : {{ $loop->index }}" 
                                    class="w-full px-6 py-4 flex items-center justify-between text-left hover:bg-slate-50 transition-colors">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold text-lg">{{ $item->day_number }}</div>
                                    <div>
                                        <h3 class="text-xl font-bold text-slate-900">{{ $item->title }}</h3>
                                        @if($item->accommodation)
                                        <p class="text-sm text-slate-500 flex items-center gap-1 mt-1">
                                            <i class="ph ph-bed"></i> {{ $item->accommodation }}
                                        </p>
                                        @endif
                                    </div>
                                </div>
                                <i class="ph ph-chevron-down text-emerald-600 transition-transform" :class="openDay === {{ $loop->index }} ? 'rotate-180' : ''"></i>
                            </button>
                            <div x-show="openDay === {{ $loop->index }}" x-transition.opacity.duration.300ms class="px-6 pb-4">
                                <p class="text-slate-600 leading-relaxed mb-4">{{ $item->description }}</p>
                                @if($item->meals)
                                <div class="flex items-center gap-2 bg-emerald-50 px-3 py-2 rounded-lg inline-block">
                                    <i class="ph ph-bowl-food text-emerald-600"></i>
                                    <span class="text-sm font-medium text-emerald-900">{{ $item->meals }}</span>
                                </div>
                                @endif
                            </div>
                        </div>
                        @empty
                        <div class="p-8 bg-slate-50 rounded-2xl border border-dashed border-slate-200 text-center">
                            <i class="ph ph-calendar-x text-4xl text-slate-300 mb-4"></i>
                            <p class="text-slate-400 font-medium italic">Detailed itinerary for {{ $tour->name }} will be available shortly.</p>
                        </div>
                        @endforelse
                    </div>
                </div>

                <hr class="border-slate-100 mb-12">

                <!-- Inclusions / Exclusions -->
                @php 
                    $inclusions = $tour->inclusions ?? [];
                    $exclusions = $tour->exclusions ?? [];
                @endphp
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
                    <div>
                        <h3 class="text-xl font-bold text-slate-900 mb-6 font-serif">What's Included</h3>
                        <ul class="space-y-4">
                            @foreach($inclusions as $inc)
                            <li class="flex items-center gap-3 text-slate-600 text-sm"><i class="ph-fill ph-check-circle text-emerald-500 text-lg"></i> {{ $inc }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-900 mb-6 font-serif">What's Excluded</h3>
                        <ul class="space-y-4">
                            @foreach($exclusions as $exc)
                            <li class="flex items-center gap-3 text-slate-600 text-sm"><i class="ph-fill ph-x-circle text-rose-400 text-lg"></i> {{ $exc }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                @php
                    $packageDestinations = $tour->package_destinations ?? [];
                    $targetMarkets = $tour->target_markets ?? [];
                    $interactiveFeatures = $tour->interactive_features ?? [];
                    $addons = $tour->addons ?? [];
                    $conversionTriggers = $tour->conversion_triggers ?? [];
                @endphp

                <div class="mb-16">
                    <h2 class="text-3xl font-serif font-bold text-slate-900 mb-8">Each package includes:</h2>
                    <div class="bg-slate-50 rounded-[3rem] p-10 md:p-14 border border-slate-100">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div>
                                <h3 class="text-lg font-bold text-slate-900 mb-4 font-serif">Destinations</h3>
                                <div class="flex flex-wrap gap-2">
                                    @forelse($packageDestinations as $dest)
                                        @php $label = is_array($dest) ? ($dest['label'] ?? null) : $dest; @endphp
                                        @if($label)
                                            <span class="bg-white px-4 py-2 rounded-2xl text-xs font-bold text-slate-600 border border-slate-100">{{ $label }}</span>
                                        @endif
                                    @empty
                                        <span class="text-slate-400 text-sm font-medium italic">Not specified</span>
                                    @endforelse
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="bg-white rounded-[2rem] p-6 border border-slate-100">
                                    <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Target market</div>
                                    <div class="text-sm font-bold text-slate-900">
                                        {{ empty($targetMarkets) ? 'Not specified' : implode(', ', $targetMarkets) }}
                                    </div>
                                </div>
                                <div class="bg-white rounded-[2rem] p-6 border border-slate-100">
                                    <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Duration</div>
                                    <div class="text-sm font-bold text-slate-900">{{ $tour->duration_days }} Days</div>
                                </div>
                                <div class="bg-white rounded-[2rem] p-6 border border-slate-100">
                                    <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Price range (International market)</div>
                                    <div class="text-sm font-bold text-slate-900">
                                        @if(!is_null($tour->international_price_min) && !is_null($tour->international_price_max))
                                            ${{ number_format($tour->international_price_min) }} – ${{ number_format($tour->international_price_max) }}
                                        @else
                                            Not specified
                                        @endif
                                    </div>
                                </div>
                                <div class="bg-white rounded-[2rem] p-6 border border-slate-100">
                                    <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Best season</div>
                                    <div class="text-sm font-bold text-slate-900">{{ $tour->best_season ?: 'Not specified' }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-12">
                            <div>
                                <h3 class="text-lg font-bold text-slate-900 mb-4 font-serif">Interactive Features</h3>
                                <div class="space-y-3">
                                    @forelse($interactiveFeatures as $feature => $enabled)
                                        <div class="flex items-center gap-3 p-3 rounded-xl @if($enabled) bg-emerald-50 border border-emerald-100 @else bg-slate-50 border border-slate-100 @endif">
                                            <div class="w-8 h-8 rounded-full @if($enabled) bg-emerald-600 @else bg-slate-300 @endif text-white flex items-center justify-center">
                                                <i class="ph ph-{{ $feature == 'hot_air_balloon' ? 'balloon' : ($feature == 'cultural_visits' ? 'users-three' : ($feature == 'walking_safari' ? 'footprints' : 'moon')) }} text-sm"></i>
                                            </div>
                                            <div class="flex-1">
                                                <p class="text-sm font-medium text-slate-900">{{ ucfirst(str_replace('_', ' ', $feature)) }}</p>
                                                <p class="text-xs text-slate-500">@if($enabled) Available @else Not available @endif</p>
                                            </div>
                                        </div>
                                    @empty
                                        <li class="text-slate-400 text-sm font-medium italic">No interactive features specified</li>
                                    @endforelse
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-slate-900 mb-4 font-serif">Available Add-ons</h3>
                                <div class="space-y-2">
                                    @forelse($addons as $name => $price)
                                        <div class="flex items-center justify-between p-3 bg-blue-50 border border-blue-100 rounded-xl hover:bg-blue-100 transition-colors cursor-pointer">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center">
                                                    <i class="ph ph-plus text-sm"></i>
                                                </div>
                                                <p class="text-sm font-medium text-slate-900">{{ $name }}</p>
                                            </div>
                                            <span class="text-sm font-bold text-blue-600">${{ number_format($price) }}</span>
                                        </div>
                                    @empty
                                        <li class="text-slate-400 text-sm font-medium italic">No add-ons available</li>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        @if(!empty($conversionTriggers))
                            <div class="mt-12">
                                <div class="p-8 bg-emerald-50 rounded-[2.5rem] border border-emerald-100">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="w-10 h-10 rounded-2xl bg-white text-emerald-600 flex items-center justify-center shadow-sm">
                                            <i class="ph ph-lightning"></i>
                                        </div>
                                        <h3 class="text-lg font-black text-slate-900 font-serif">Conversion triggers</h3>
                                    </div>
                                    <ul class="space-y-2">
                                        @foreach($conversionTriggers as $trigger)
                                            <li class="text-sm font-bold text-emerald-900">{{ $trigger }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Advanced Details Tabs/Sections -->
                <div class="space-y-16">
                    <!-- Accommodation Section -->
                    <div class="bg-slate-50 rounded-[3rem] p-10 md:p-14 border border-slate-100">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-2xl text-emerald-600 shadow-sm">
                                <i class="ph ph-bed"></i>
                            </div>
                            <h3 class="text-2xl font-serif font-black text-slate-900">Luxury Sanctuary</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <p class="text-slate-600 text-sm leading-relaxed">
                                Our selected lodges are more than just a place to sleep; they are an extension of the safari. We prioritize properties with sustainable operations and breathtaking views of the natural migration corridors.
                            </p>
                            <ul class="space-y-2">
                                <li class="text-xs font-black text-slate-400 uppercase tracking-widest flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span> 24/7 Solar Electricity
                                </li>
                                <li class="text-xs font-black text-slate-400 uppercase tracking-widest flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span> Ensuite Luxury Bathrooms
                                </li>
                                <li class="text-xs font-black text-slate-400 uppercase tracking-widest flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span> Gourmet Farm-to-Table Dining
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Safety & Prep -->
                    <div>
                        <h3 class="text-2xl font-serif font-black text-slate-900 mb-8">Preparation & Safety</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                            @foreach([
                                ['title' => 'Vaccinations', 'desc' => 'Yellow fever & Malaria prophylaxis recommended.', 'icon' => 'first-aid-kit'],
                                ['title' => 'Packing', 'desc' => 'Neutral colors, layers, and high-SPF protection.', 'icon' => 'backpack'],
                                ['title' => 'Communications', 'desc' => 'Satellite phones in all vehicles for peak safety.', 'icon' => 'satellite-signal']
                            ] as $info)
                            <div class="p-8 bg-white border border-slate-100 rounded-[2rem] hover:shadow-xl transition-all group">
                                <i class="ph ph-{{ $info['icon'] }} text-3xl text-emerald-600 mb-4 transition-transform group-hover:scale-110"></i>
                                <h5 class="font-black text-slate-900 mb-2">{{ $info['title'] }}</h5>
                                <p class="text-[11px] text-slate-400 leading-relaxed font-bold">{{ $info['desc'] }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Enhanced Booking Form -->
            <div x-data="{ 
                adults: 1, 
                children: 0, 
                basePrice: {{ $tour->base_price }},
                get total() { return (this.adults * this.basePrice) + (this.children * this.basePrice * 0.5); }
            }">
                <div class="sticky top-32 glass border border-white/40 p-10 rounded-[2.5rem] shadow-2xl">
                    <div class="mb-8">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-slate-500 text-sm font-bold uppercase tracking-widest">Price from</span>
                            @if(!is_null($tour->international_price_min) && !is_null($tour->international_price_max))
                            <span class="text-xs text-emerald-600 font-medium">International rates</span>
                            @endif
                        </div>
                        <div class="flex items-baseline gap-2">
                            <span class="text-4xl font-bold text-slate-900">${{ number_format($tour->base_price) }}</span>
                            <span class="text-slate-400 font-medium">/ person</span>
                        </div>
                        @if(!is_null($tour->international_price_min) && !is_null($tour->international_price_max))
                        <div class="text-xs text-slate-500 mt-1">International: ${{ number_format($tour->international_price_min) }} - ${{ number_format($tour->international_price_max) }}</div>
                        @endif
                    </div>
                    
                    <!-- Quick Stats -->
                    <div class="grid grid-cols-3 gap-2 mb-6">
                        <div class="text-center p-2 bg-emerald-50 rounded-lg">
                            <i class="ph ph-clock text-emerald-600 text-lg"></i>
                            <div class="text-xs font-bold text-slate-900 mt-1">{{ $tour->duration_days }} Days</div>
                        </div>
                        <div class="text-center p-2 bg-blue-50 rounded-lg">
                            <i class="ph ph-trophy text-blue-600 text-lg"></i>
                            <div class="text-xs font-bold text-slate-900 mt-1">98% Success</div>
                        </div>
                        <div class="text-center p-2 bg-purple-50 rounded-lg">
                            <i class="ph ph-users text-purple-600 text-lg"></i>
                            <div class="text-xs font-bold text-slate-900 mt-1">Small Group</div>
                        </div>
                    </div>
                    
                    <form action="{{ route('bookings.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                        <div>
                            <label class="block text-xs font-bold text-slate-900 uppercase tracking-widest mb-3">Your Name</label>
                            <input type="text" name="customer_name" required class="w-full bg-white/50 border border-slate-200 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all" placeholder="John Doe">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-900 uppercase tracking-widest mb-3">Email</label>
                                <input type="email" name="customer_email" required class="w-full bg-white/50 border border-slate-200 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all" placeholder="john@example.com">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-900 uppercase tracking-widest mb-3">Phone</label>
                                <input type="text" name="customer_phone" required class="w-full bg-white/50 border border-slate-200 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all" placeholder="+255...">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-900 uppercase tracking-widest mb-3">Preferred Date</label>
                            <input type="date" name="start_date" required class="w-full bg-white/50 border border-slate-200 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all">
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-900 uppercase tracking-widest mb-3">Adults</label>
                                <select name="adults" x-model="adults" class="w-full bg-white/50 border border-slate-200 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all">
                                    @for($i=1; $i<=10; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-900 uppercase tracking-widest mb-3">Children</label>
                                <select name="children" x-model="children" class="w-full bg-white/50 border border-slate-200 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all">
                                    @for($i=0; $i<=10; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-xs font-bold text-slate-900 uppercase tracking-widest mb-3">Special Requests</label>
                            <textarea name="special_requests" placeholder="Dietary needs, preferred lodge..." class="w-full bg-white/50 border border-slate-200 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all h-24"></textarea>
                        </div>
                        
                    <!-- Simple Price Display -->
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100 mb-6">
                        <h4 class="text-sm font-bold text-slate-900 uppercase tracking-widest mb-3">Price Summary</h4>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-slate-900">Total Price</span>
                            <span class="text-xl font-bold text-emerald-600" x-text="'$' + total.toLocaleString()">${{ number_format($tour->base_price) }}</span>
                        </div>
                        <p class="text-xs text-slate-500 mt-2">Price per person for {{ $tour->duration_days }} days</p>
                    </div>

                        <label class="flex items-start gap-4 bg-white/50 border border-slate-200 rounded-2xl p-5">
                            <input type="checkbox" name="agree_terms" value="1" required class="mt-1 w-5 h-5 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-sm font-bold text-slate-700 leading-relaxed">
                                I agree to the booking terms and conditions.
                            </span>
                        </label>
                        
                        <button type="submit" class="w-full py-5 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white font-bold rounded-2xl shadow-xl shadow-emerald-600/20 hover:shadow-emerald-700/30 transition-all flex items-center justify-center gap-3 group">
                            <i class="ph ph-lock text-xl group-hover:scale-110 transition-transform"></i> 
                            <span>Book Now - Secure Payment</span>
                        </button>
                    </form>
                    
                    <div class="mt-6 space-y-3">
                        <div class="flex items-center justify-center gap-4 text-xs text-slate-400">
                            <div class="flex items-center gap-1">
                                <i class="ph ph-shield-check text-emerald-500"></i>
                                <span>Secure Payment</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <i class="ph ph-check-circle text-emerald-500"></i>
                                <span>Instant Confirmation</span>
                            </div>
                        </div>
                        <p class="text-center text-xs text-slate-400 font-medium">Free cancellation up to 24 hours before departure</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Tours Section -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-slate-900 mb-4">You Might Also Like</h2>
            <p class="text-slate-600 max-w-2xl mx-auto">Explore similar adventures and discover more amazing experiences in Tanzania</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @php
                $relatedTours = App\Models\Tour::where('id', '!=', $tour->id)
                    ->where('status', 'active')
                    ->where(function($query) use ($tour) {
                        if(str_contains($tour->name, 'Kilimanjaro')) {
                            $query->where('name', 'like', '%Kilimanjaro%');
                        } else {
                            $query->where('name', 'not like', '%Kilimanjaro%');
                        }
                    })
                    ->inRandomOrder()
                    ->limit(3)
                    ->get();
            @endphp
            
            @forelse($relatedTours as $relatedTour)
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow overflow-hidden group">
                <div class="relative h-48 overflow-hidden">
                    @php $relatedImages = $relatedTour->images ?? []; @endphp
                    <img src="{{ $relatedImages[0] ?? 'https://images.unsplash.com/photo-1516426122078-c23e76319801' }}?auto=format&fit=crop&w=600&q=80" 
                         alt="{{ $relatedTour->name }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full">
                        <span class="text-sm font-bold text-emerald-600">{{ $relatedTour->duration_days }} Days</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-slate-900 mb-2">{{ Str::limit($relatedTour->name, 50) }}</h3>
                    <p class="text-slate-600 text-sm mb-4">{{ Str::limit($relatedTour->description, 100) }}</p>
                    <div class="flex items-center justify-between">
                        <div class="text-lg font-bold text-emerald-600">${{ number_format($relatedTour->base_price) }}</div>
                        <a href="{{ route('tours.show', $relatedTour->slug) }}" 
                           class="bg-emerald-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-emerald-700 transition-colors">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12">
                <i class="ph ph-magnifying-glass text-4xl text-slate-300 mb-4"></i>
                <p class="text-slate-400 font-medium">No related tours found at the moment.</p>
            </div>
            @endforelse
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('tours.index') }}" class="inline-flex items-center gap-2 bg-white text-emerald-600 px-6 py-3 rounded-2xl font-medium border border-emerald-200 hover:bg-emerald-50 transition-colors">
                <i class="ph ph-arrow-left"></i>
                <span>View All Tours</span>
            </a>
        </div>
    </div>
</section>

<!-- Reviews Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-slate-900 mb-4">What Our Travelers Say</h2>
            <div class="flex items-center justify-center gap-4 mb-6">
                <div class="flex items-center gap-1 text-amber-500">
                    <i class="ph-fill ph-star"></i>
                    <i class="ph-fill ph-star"></i>
                    <i class="ph-fill ph-star"></i>
                    <i class="ph-fill ph-star"></i>
                    <i class="ph-fill ph-star"></i>
                </div>
                <span class="text-slate-600 font-medium">5.0 out of 5 (127 reviews)</span>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-slate-50 p-6 rounded-2xl">
                <div class="flex items-center gap-1 mb-4">
                    @for($i=0; $i<5; $i++)
                    <i class="ph-fill ph-star text-amber-500"></i>
                    @endfor
                </div>
                <p class="text-slate-600 mb-4 italic">"Absolutely incredible experience! The guides were knowledgeable and the itinerary was perfectly planned. Would definitely recommend!"</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-emerald-600 rounded-full flex items-center justify-center text-white font-bold">JD</div>
                    <div>
                        <p class="font-medium text-slate-900">John Doe</p>
                        <p class="text-sm text-slate-500">Verified Traveler</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-slate-50 p-6 rounded-2xl">
                <div class="flex items-center gap-1 mb-4">
                    @for($i=0; $i<5; $i++)
                    <i class="ph-fill ph-star text-amber-500"></i>
                    @endfor
                </div>
                <p class="text-slate-600 mb-4 italic">"Life-changing adventure! The team took care of everything. The summit view was worth every step of the journey."</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold">SM</div>
                    <div>
                        <p class="font-medium text-slate-900">Sarah Miller</p>
                        <p class="text-sm text-slate-500">Verified Traveler</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-slate-50 p-6 rounded-2xl">
                <div class="flex items-center gap-1 mb-4">
                    @for($i=0; $i<5; $i++)
                    <i class="ph-fill ph-star text-amber-500"></i>
                    @endfor
                </div>
                <p class="text-slate-600 mb-4 italic">"Exceeded all expectations! Professional service, amazing wildlife sightings, and comfortable accommodations throughout."</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center text-white font-bold">MJ</div>
                    <div>
                        <p class="font-medium text-slate-900">Michael Johnson</p>
                        <p class="text-sm text-slate-500">Verified Traveler</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
