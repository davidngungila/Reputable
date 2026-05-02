@extends('layouts.public')

@section('content')
<!-- Hero Slider -->
<section class="relative h-screen overflow-hidden">
    <!-- Swiper -->
    <div class="swiper heroSwiper h-full w-full">
        <div class="swiper-wrapper">
            @if($heroSlides->count() > 0)
                @foreach($heroSlides as $slide)
                <div class="swiper-slide relative flex items-center">
                    <div class="absolute inset-0 z-0">
                        <img src="{{ $slide->image_url }}" alt="{{ $slide->title }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/40 to-transparent"></div>
                    </div>
                    <div class="relative z-10 max-w-7xl mx-auto px-6 w-full pt-20">
                        <div class="max-w-2xl translate-y-10 opacity-0 transition-all duration-1000 slide-content">
                            <span class="inline-block px-4 py-1.5 bg-[#1F5A3A]/20 text-[#E67A2E] rounded-full text-xs font-bold tracking-widest uppercase mb-6 border border-[#1F5A3A]/30">Experience Excellence</span>
                            <h1 class="text-4xl md:text-6xl lg:text-7xl font-serif text-white mb-8 leading-[1.1] md:whitespace-nowrap">{!! $slide->title !!}</h1>
                            @if($slide->subtitle)
                            <p class="text-xl text-slate-200 mb-12 leading-relaxed">{{ $slide->subtitle }}</p>
                            @endif
                            @if($slide->button_text && $slide->button_url)
                            <div class="flex flex-col sm:flex-row items-center gap-4">
                                <a href="{{ $slide->button_url }}" class="w-full sm:w-auto px-10 py-4 bg-[#1F5A3A] text-white font-bold rounded-full hover:bg-[#1F5A3A]/90 shadow-xl shadow-[#1F5A3A]/30 transition-all text-center">
                                    {{ $slide->button_text }}
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <!-- Fallback slides if no database slides exist -->
                <div class="swiper-slide relative flex items-center">
                    <div class="absolute inset-0 z-0">
                        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468788/Zeebraaa_cpydg9.jpg" alt="Tanzania" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/40 to-transparent"></div>
                    </div>
                    <div class="relative z-10 max-w-7xl mx-auto px-6 w-full pt-20">
                        <div class="max-w-2xl translate-y-10 opacity-0 transition-all duration-1000 slide-content">
                            <span class="inline-block px-4 py-1.5 bg-[#1F5A3A]/20 text-[#E67A2E] rounded-full text-xs font-bold tracking-widest uppercase mb-6 border border-[#1F5A3A]/30">Experience Excellence</span>
                            <h1 class="text-4xl md:text-6xl lg:text-7xl font-serif text-white mb-8 leading-[1.1] md:whitespace-nowrap">Discover <span class="text-[#E67A2E]">Tanzania</span></h1>
                            <p class="text-xl text-slate-200 mb-12 leading-relaxed">Embark on a journey of a lifetime with Tanzania's most trusted tour operator.</p>
                            <div class="flex flex-col sm:flex-row items-center gap-4">
                                <a href="/tours" class="w-full sm:w-auto px-10 py-4 bg-[#1F5A3A] text-white font-bold rounded-full hover:bg-[#1F5A3A]/90 shadow-xl shadow-[#1F5A3A]/30 transition-all text-center">
                                    Explore Tours
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Navigation -->
        <div class="absolute bottom-10 right-10 z-20 flex gap-4">
            <button class="swiper-prev w-14 h-14 rounded-full border border-white/20 bg-white/10 text-white flex items-center justify-center hover:bg-[#1F5A3A] hover:border-[#1F5A3A] transition-all backdrop-blur-md">
                <i class="ph ph-caret-left text-2xl"></i>
            </button>
            <button class="swiper-next w-14 h-14 rounded-full border border-white/20 bg-white/10 text-white flex items-center justify-center hover:bg-[#1F5A3A] hover:border-[#1F5A3A] transition-all backdrop-blur-md">
                <i class="ph ph-caret-right text-2xl"></i>
            </button>
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination !bottom-10 !left-6 !text-left !w-auto"></div>
    </div>
</section>

<style>
    .swiper-pagination-bullet { width: 12px; height: 12px; background: rgba(255,255,255,0.3); opacity: 1; }
    .swiper-pagination-bullet-active { background: #10b981; width: 30px; border-radius: 6px; }
    .swiper-slide-active .slide-content { transform: translateY(0); opacity: 1; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const swiper = new Swiper('.heroSwiper', {
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-next',
                prevEl: '.swiper-prev',
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            }
        });
    });
</script>

<!-- Stats Bar -->
<section class="relative z-20 -mt-10 max-w-5xl mx-auto px-6">
    <div class="grid grid-cols-2 md:grid-cols-4 bg-white rounded-2xl shadow-2xl p-8 border border-slate-100 divide-x divide-slate-100">
        <div class="text-center px-4">
            <h3 class="text-4xl font-bold text-slate-900">2025</h3>
            <p class="text-sm text-slate-500 mt-2">Founded Year</p>
        </div>
        <div class="text-center px-4">
            <h3 class="text-4xl font-bold text-slate-900">1k+</h3>
            <p class="text-sm text-slate-500 mt-2">Tours Completed</p>
        </div>
        <div class="text-center px-4">
            <h3 class="text-4xl font-bold text-slate-900">150+</h3>
            <p class="text-sm text-slate-500 mt-2">Expert Guides</p>
        </div>
        <div class="text-center px-4">
            <h3 class="text-4xl font-bold text-slate-900">99%</h3>
            <p class="text-sm text-slate-500 mt-2">Happy Clients</p>
        </div>
    </div>
</section>

<!-- Interactive Booking Widget -->
<section class="py-20 bg-gradient-to-br from-emerald-50 to-emerald-100">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-serif text-slate-900 mb-6 font-bold">Plan Your Perfect Safari</h2>
            <p class="text-slate-600 max-w-2xl mx-auto">Get instant pricing and availability for your dream African adventure</p>
        </div>
        
        <div class="bg-white rounded-3xl shadow-2xl p-8 border border-emerald-100">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Destination -->
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-slate-700 flex items-center gap-2">
                        <i class="ph-bold ph-map-pin text-emerald-600"></i>
                        Destination
                    </label>
                    <select class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-100 transition-all">
                        <option>All Destinations</option>
                        <option>Serengeti National Park</option>
                        <option>Ngorongoro Crater</option>
                        <option>Mount Kilimanjaro</option>
                        <option>Zanzibar</option>
                        <option>Tarangire</option>
                        <option>Lake Manyara</option>
                    </select>
                </div>
                
                <!-- Duration -->
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-slate-700 flex items-center gap-2">
                        <i class="ph-bold ph-calendar text-emerald-600"></i>
                        Duration
                    </label>
                    <select class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-100 transition-all">
                        <option>Any Duration</option>
                        <option>1-3 Days</option>
                        <option>4-7 Days</option>
                        <option>8-14 Days</option>
                        <option>15+ Days</option>
                    </select>
                </div>
                
                <!-- Travel Date -->
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-slate-700 flex items-center gap-2">
                        <i class="ph-bold ph-calendar-check text-emerald-600"></i>
                        Travel Date
                    </label>
                    <input type="date" class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-100 transition-all">
                </div>
                
                <!-- Travelers -->
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-slate-700 flex items-center gap-2">
                        <i class="ph-bold ph-users text-emerald-600"></i>
                        Travelers
                    </label>
                    <select class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-100 transition-all">
                        <option>1 Person</option>
                        <option>2 People</option>
                        <option>3-4 People</option>
                        <option>5-8 People</option>
                        <option>9+ People</option>
                    </select>
                </div>
            </div>
            
            <!-- Quick Search Results -->
            <div class="bg-emerald-50 rounded-2xl p-6 mb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="font-bold text-slate-900 mb-2">Popular Safari Packages</h4>
                        <div class="flex flex-wrap gap-3">
                            <span class="px-3 py-1 bg-emerald-600 text-white rounded-full text-sm">5-Day Serengeti - From $1,850</span>
                            <span class="px-3 py-1 bg-emerald-600 text-white rounded-full text-sm">7-Day Kilimanjaro - From $2,100</span>
                            <span class="px-3 py-1 bg-emerald-600 text-white rounded-full text-sm">3-Day Zanzibar - From $650</span>
                        </div>
                    </div>
                    <button class="px-8 py-3 bg-emerald-600 text-white font-bold rounded-full hover:bg-emerald-700 transition-all transform hover:scale-105">
                        Search Tours
                    </button>
                </div>
            </div>
            
            <!-- Special Offers -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-gradient-to-r from-orange-50 to-orange-100 rounded-xl p-4 border border-orange-200">
                    <div class="flex items-center gap-3 mb-2">
                        <i class="ph-bold ph-fire text-orange-600 text-xl"></i>
                        <span class="font-bold text-orange-800">Early Bird Special</span>
                    </div>
                    <p class="text-sm text-orange-700">Book 60 days ahead and save 15%</p>
                </div>
                <div class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl p-4 border border-blue-200">
                    <div class="flex items-center gap-3 mb-2">
                        <i class="ph-bold ph-users-three text-blue-600 text-xl"></i>
                        <span class="font-bold text-blue-800">Group Discount</span>
                    </div>
                    <p class="text-sm text-blue-700">Groups of 4+ get 10% off</p>
                </div>
                <div class="bg-gradient-to-r from-purple-50 to-purple-100 rounded-xl p-4 border border-purple-200">
                    <div class="flex items-center gap-3 mb-2">
                        <i class="ph-bold ph-gift text-purple-600 text-xl"></i>
                        <span class="font-bold text-purple-800">Free Upgrade</span>
                    </div>
                    <p class="text-sm text-purple-700">Free airport transfer on all packages</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Tours -->
<section class="py-32 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row items-end justify-between mb-16 gap-6">
            <div class="max-w-2xl">
                <h2 class="text-4xl font-serif text-slate-900 mb-6 font-bold">Most Popular Safari Packages</h2>
                <p class="text-slate-500">Carefully curated adventures that capture the very essence of the African wild. Choose your path and let us handle the rest.</p>
            </div>
            <a href="/tours" class="text-[#E67A2E] font-bold flex items-center gap-2 hover:gap-3 transition-all">
                View All Tours <i class="ph ph-arrow-right"></i>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($featuredTours ?? [] as $tour)
            <!-- Tour Card -->
            <div class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-100">
                <div class="relative h-72 overflow-hidden">
                    @php $images = $tour->images ?? []; @endphp
                    <img src="{{ $images[0] ?? 'https://images.unsplash.com/photo-1547471080-7cc2caa01a7e' }}?auto=format&fit=crop&w=800&q=80" alt="{{ $tour->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-4 py-2 rounded-full text-xs font-bold text-slate-900 shadow-sm uppercase tracking-wider">
                        {{ $tour->duration_days }} Days
                    </div>
                </div>
                <div class="p-8">
                    <div class="flex items-center gap-2 text-[#E67A2E] text-sm font-bold mb-4">
                        <i class="ph-fill ph-star"></i>
                        <span class="text-[#E67A2E]">5.0</span>
                        <span class="text-slate-400 font-medium">(Verified)</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4 group-hover:text-[#E67A2E] transition-colors line-clamp-1">{{ $tour->name }}</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-2">{{ $tour->description }}</p>
                    <div class="pt-6 border-t border-slate-100 flex items-center justify-between">
                        <div>
                            <span class="text-[#E67A2E] text-xs font-medium uppercase block">Starting from</span>
                            <span class="text-2xl font-bold text-slate-900 leading-none">${{ number_format($tour->base_price) }}</span>
                        </div>
                        <a href="/tours/preview/{{ $tour->id }}" class="p-4 bg-slate-900 text-white rounded-2xl hover:bg-[#E67A2E] transition-colors">
                            <i class="ph ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 py-12 text-center text-slate-400 italic">
                Our featured expeditions are being updated. Check back soon!
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Featured Destinations Showcase -->
<section class="py-32 bg-gradient-to-br from-emerald-50 to-blue-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-20">
            <span class="text-emerald-600 font-black text-xs uppercase tracking-[0.4em] mb-4 inline-block">Discover Tanzania</span>
            <h2 class="text-4xl md:text-5xl font-serif text-slate-900 font-bold mb-6">Iconic Destinations</h2>
            <p class="text-slate-600 max-w-2xl mx-auto text-lg">From the endless plains of Serengeti to the pristine beaches of Zanzibar, experience Tanzania's diverse landscapes</p>
        </div>
        
        <!-- Featured Destinations Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-20">
            @php
                $featuredDestinations = $destinations->take(4);
            @endphp
            @foreach($featuredDestinations as $index => $destination)
                @php
                    // Database-first approach: Use images from database
                    $imageUrl = '';
                    
                    // Check if destination has images in database
                    if (!empty($destination->images) && count($destination->images) > 0) {
                        $firstImage = $destination->images[0];
                        // Handle both Cloudinary URLs and local paths
                        if (str_starts_with($firstImage, 'http') || str_starts_with($firstImage, 'https')) {
                            $imageUrl = $firstImage;
                        } else {
                            $imageUrl = asset($firstImage);
                        }
                    } else {
                        // Only use fallback if absolutely no images in database
                        $fallbackImages = [
                            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468771/tanzania-2275107_1920_cmihwj.jpg',
                            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468777/waterbuck_ggd5wl.jpg',
                            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468788/Zeebraaa_cpydg9.jpg',
                            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468772/tiger-5167034_1920_leu8nd.jpg'
                        ];
                        $imageUrl = $fallbackImages[$index % count($fallbackImages)];
                    }
                @endphp
                
                <div class="group relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ $imageUrl }}" alt="{{ $destination->name }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                             onerror="this.src='https://res.cloudinary.com/dqflffa1o/image/upload/v1777468788/Zeebraaa_cpydg9.jpg'; this.onerror=null;">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute top-4 left-4">
                            <span class="bg-emerald-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                Featured
                            </span>
                        </div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h3 class="text-white font-bold text-lg mb-1">{{ $destination->name }}</h3>
                            <p class="text-white/90 text-sm">{{ $destination->location ?? 'Tanzania' }}</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 text-emerald-600 text-sm font-semibold mb-3">
                            <i class="ph-bold ph-star"></i>
                            <span>{{ $destination->highlights[0] ?? 'Must Visit' }}</span>
                        </div>
                        <p class="text-slate-600 text-sm mb-4">{{ Str::limit($destination->description, 100) }}</p>
                        <a href="{{ route('destinations.show', $destination->id) }}" 
                           class="inline-flex items-center gap-2 text-emerald-600 font-semibold text-sm hover:text-emerald-700 transition-colors">
                            Explore {{ $destination->name }}
                            <i class="ph-bold ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Additional Destinations -->
        <div class="text-center mb-12">
            <h3 class="text-3xl font-bold text-slate-900 mb-4">More Amazing Destinations</h3>
            <p class="text-slate-600 max-w-2xl mx-auto">Discover even more incredible places to visit in Tanzania</p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            @php
                $additionalDestinations = $destinations->skip(4)->take(4);
            @endphp
            @foreach($additionalDestinations as $destination)
            <div class="group relative overflow-hidden rounded-3xl shadow-2xl hover:shadow-3xl transition-all duration-700">
                <div class="relative h-96">
                    @php
                        $additionalImages = [
                            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468772/Tarangire_ck2ohe.jpg',
                            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468770/stella-point-4032287_1280_bpmyyh.jpg',
                            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468771/spphoto_skxxer.jpg',
                            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468786/Wwwwwbeest_lnndaz.jpg'
                        ];
                        $additionalImage = $additionalImages[$index] ?? $additionalImages[0];
                    @endphp
                    <img src="{{ $additionalImage }}" alt="{{ $destination->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                         onerror="this.src='https://res.cloudinary.com/dqflffa1o/image/upload/v1777468788/Zeebraaa_cpydg9.jpg'; this.onerror=null;">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/40 to-transparent"></div>
                    <div class="absolute top-6 left-6">
                        @if(!empty($destination->highlights) && count($destination->highlights) > 0)
                            <span class="bg-emerald-600 text-white px-4 py-2 rounded-full text-sm font-bold">{{ Str::limit($destination->highlights[0], 30) }}</span>
                        @else
                            <span class="bg-emerald-600 text-white px-4 py-2 rounded-full text-sm font-bold">Tanzania</span>
                        @endif
                    </div>
                </div>
                <div class="absolute bottom-0 left-0 right-0 p-8">
                    <h3 class="text-3xl font-serif text-white mb-4">{{ $destination->name }}</h3>
                    <p class="text-slate-200 mb-6">{{ Str::limit($destination->description, 120) }}</p>
                    <div class="flex flex-wrap gap-4 mb-6">
                        @if(!empty($destination->highlights) && count($destination->highlights) > 1)
                        <div class="flex items-center gap-2 text-white/80 text-sm">
                            <i class="ph-bold ph-star"></i>
                            <span>{{ Str::limit($destination->highlights[1], 20) }}</span>
                        </div>
                        @endif
                        @if($destination->best_time_to_visit)
                        <div class="flex items-center gap-2 text-white/80 text-sm">
                            <i class="ph-bold ph-calendar"></i>
                            <span>{{ Str::limit($destination->best_time_to_visit, 20) }}</span>
                        </div>
                        @endif
                        @if($destination->location)
                        <div class="flex items-center gap-2 text-white/80 text-sm">
                            <i class="ph-bold ph-map-pin"></i>
                            <span>{{ Str::limit($destination->location, 15) }}</span>
                        </div>
                        @endif
                    </div>
                    <a href="/destinations" class="inline-flex items-center gap-2 bg-emerald-600 text-white px-6 py-3 rounded-full font-bold hover:bg-emerald-700 transition-all">
                        Explore {{ Str::limit($destination->name, 15) }} <i class="ph ph-arrow-right"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Quick Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-16">
            <div class="text-center">
                <div class="text-4xl font-black text-emerald-600 mb-2">{{ count($destinations) }}</div>
                <p class="text-sm text-slate-600">Destinations</p>
            </div>
            <div class="text-center">
                <div class="text-4xl font-black text-orange-600 mb-2">{{ collect($destinations)->where('name', 'like', '%Kilimanjaro%')->count() > 0 ? '7' : '7' }}</div>
                <p class="text-sm text-slate-600">Kilimanjaro Routes</p>
            </div>
            <div class="text-center">
                <div class="text-4xl font-black text-blue-600 mb-2">{{ collect($destinations)->filter(function($d) { return str_contains(strtolower($d->name), 'zanzibar') || str_contains(strtolower($d->name), 'mafia') || str_contains(strtolower($d->name), 'pemba'); })->count() > 0 ? '25+' : '25+' }}</div>
                <p class="text-sm text-slate-600">Pristine Beaches</p>
            </div>
            <div class="text-center">
                <div class="text-4xl font-black text-purple-600 mb-2">{{ collect($destinations)->filter(function($d) { return str_contains(strtolower($d->name), 'park') || str_contains(strtolower($d->name), 'reserve'); })->count() }}</div>
                <p class="text-sm text-slate-600">Parks & Reserves</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-32 relative overflow-hidden bg-slate-900">
    <div class="absolute top-0 right-0 w-1/2 h-full hidden lg:block">
        <img src="https://images.unsplash.com/photo-1493612276216-ee3925520721?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Safari Experience" class="w-full h-full object-cover opacity-40">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/40 to-transparent"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="max-w-xl">
            <h2 class="text-4xl font-serif text-white mb-12 font-bold">Why choose Reputable Tours?</h2>
            
            <div class="space-y-12">
                <div class="flex gap-6">
                    <div class="w-16 h-16 rounded-2xl bg-[#1F5A3A]/20 text-[#E67A2E] flex-shrink-0 flex items-center justify-center text-3xl">
                        <i class="ph-bold ph-sketch-logo"></i>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-white mb-4">Tailored Experience</h4>
                        <p class="text-slate-400 leading-relaxed">No two journeys are the same. We customize every detail to match your rhythm and expectations.</p>
                    </div>
                </div>
                
                <div class="flex gap-6">
                    <div class="w-16 h-16 rounded-2xl bg-[#1F5A3A]/20 text-[#E67A2E] flex-shrink-0 flex items-center justify-center text-3xl">
                        <i class="ph-bold ph-shield-check"></i>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-white mb-4">Safety First</h4>
                        <p class="text-slate-400 leading-relaxed">Our vehicles are impeccably maintained and our guides are trained in wilderness first aid and safety protocols.</p>
                    </div>
                </div>
                
                <div class="flex gap-6">
                    <div class="w-16 h-16 rounded-2xl bg-[#1F5A3A]/20 text-[#E67A2E] flex-shrink-0 flex items-center justify-center text-3xl">
                        <i class="ph-bold ph-leaf"></i>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-white mb-4">Sustainable Tourism</h4>
                        <p class="text-slate-400 leading-relaxed">We support local communities and practice eco-friendly operations to preserve the wild for generations.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Enhanced Statistics & Achievements -->
<section class="py-20 bg-gradient-to-br from-slate-900 to-slate-800 relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center mb-16">
            <span class="text-emerald-400 font-black text-xs uppercase tracking-[0.4em] mb-4 inline-block">Our Impact</span>
            <h2 class="text-4xl md:text-5xl font-serif text-white font-bold mb-6">Numbers That Speak</h2>
            <p class="text-slate-300 max-w-2xl mx-auto text-lg">Years of excellence in creating unforgettable African adventures</p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-16">
            <div class="text-center group">
                <div class="bg-gradient-to-br from-emerald-500/20 to-emerald-600/10 rounded-2xl p-8 mb-4 border border-emerald-500/20 group-hover:border-emerald-500/40 transition-all">
                    <div class="text-5xl font-black text-emerald-400 mb-2 counter" data-target="2025">0</div>
                    <p class="text-slate-300 font-semibold">Founded Year</p>
                </div>
                <div class="flex items-center justify-center gap-2 text-slate-400 text-sm">
                    <i class="ph-bold ph-calendar"></i>
                    <span>Years of Excellence</span>
                </div>
            </div>
            
            <div class="text-center group">
                <div class="bg-gradient-to-br from-orange-500/20 to-orange-600/10 rounded-2xl p-8 mb-4 border border-orange-500/20 group-hover:border-orange-500/40 transition-all">
                    <div class="text-5xl font-black text-orange-400 mb-2 counter" data-target="1500">0</div>
                    <p class="text-slate-300 font-semibold">Tours Completed</p>
                </div>
                <div class="flex items-center justify-center gap-2 text-slate-400 text-sm">
                    <i class="ph-bold ph-map-trifold"></i>
                    <span>Successful Journeys</span>
                </div>
            </div>
            
            <div class="text-center group">
                <div class="bg-gradient-to-br from-blue-500/20 to-blue-600/10 rounded-2xl p-8 mb-4 border border-blue-500/20 group-hover:border-blue-500/40 transition-all">
                    <div class="text-5xl font-black text-blue-400 mb-2 counter" data-target="180">0</div>
                    <p class="text-slate-300 font-semibold">Expert Guides</p>
                </div>
                <div class="flex items-center justify-center gap-2 text-slate-400 text-sm">
                    <i class="ph-bold ph-users"></i>
                    <span>Certified Professionals</span>
                </div>
            </div>
            
            <div class="text-center group">
                <div class="bg-gradient-to-br from-purple-500/20 to-purple-600/10 rounded-2xl p-8 mb-4 border border-purple-500/20 group-hover:border-purple-500/40 transition-all">
                    <div class="text-5xl font-black text-purple-400 mb-2 counter" data-target="99">0</div>
                    <p class="text-slate-300 font-semibold">Happy Clients (%)</p>
                </div>
                <div class="flex items-center justify-center gap-2 text-slate-400 text-sm">
                    <i class="ph-bold ph-star"></i>
                    <span>5-Star Reviews</span>
                </div>
            </div>
        </div>
        
        <!-- Achievement Badges -->
        <div class="bg-white/5 backdrop-blur-md rounded-3xl p-8 border border-white/10">
            <h3 class="text-2xl font-serif text-white mb-8 text-center">Awards & Recognition</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="bg-gradient-to-br from-yellow-400/20 to-yellow-500/10 rounded-2xl p-6 mb-3 border border-yellow-400/20">
                        <i class="ph-bold ph-trophy text-yellow-400 text-3xl mb-2"></i>
                        <h4 class="text-white font-bold">Best Safari Operator</h4>
                        <p class="text-slate-400 text-sm">Tanzania Tourism Awards</p>
                    </div>
                </div>
                <div class="text-center">
                    <div class="bg-gradient-to-br from-emerald-400/20 to-emerald-500/10 rounded-2xl p-6 mb-3 border border-emerald-400/20">
                        <i class="ph-bold ph-leaf text-emerald-400 text-3xl mb-2"></i>
                        <h4 class="text-white font-bold">Eco Tourism Leader</h4>
                        <p class="text-slate-400 text-sm">Sustainable Travel Award</p>
                    </div>
                </div>
                <div class="text-center">
                    <div class="bg-gradient-to-br from-blue-400/20 to-blue-500/10 rounded-2xl p-6 mb-3 border border-blue-400/20">
                        <i class="ph-bold ph-shield-check text-blue-400 text-3xl mb-2"></i>
                        <h4 class="text-white font-bold">Safety Excellence</h4>
                        <p class="text-slate-400 text-sm">International Safety Standard</p>
                    </div>
                </div>
                <div class="text-center">
                    <div class="bg-gradient-to-br from-purple-400/20 to-purple-500/10 rounded-2xl p-6 mb-3 border border-purple-400/20">
                        <i class="ph-bold ph-heart text-purple-400 text-3xl mb-2"></i>
                        <h4 class="text-white font-bold">Customer Choice</h4>
                        <p class="text-slate-400 text-sm">TripAdvisor Excellence</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-24 bg-[#1F5A3A]">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-4xl md:text-5xl font-serif text-white mb-8 font-bold">Ready for the Adventure of a Lifetime?</h2>
        <p class="text-[#E67A2E]/100 text-xl max-w-2xl mx-auto mb-12">Contact our safari experts today and start planning your bespoke African experience.</p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
            <a href="/tours" class="px-12 py-5 bg-white text-[#E67A2E] font-bold rounded-full shadow-2xl hover:scale-105 transition-all">
                Book My Safari
            </a>
            <a href="https://wa.me/255683163219" class="flex items-center gap-3 text-white font-bold hover:scale-105 transition-all text-xl">
                <i class="ph-bold ph-whatsapp-logo text-3xl"></i> Chat on WhatsApp
            </a>
        </div>
    </div>
</section>
<!-- Testimonials -->
<section class="py-32 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-20">
            <span class="text-[#E67A2E] font-black text-xs uppercase tracking-[0.4em] mb-4 inline-block">Worldwide Recognition</span>
            <h2 class="text-4xl md:text-5xl font-serif text-slate-900 font-bold mb-6">Trusted by Adventurers</h2>
            <div class="flex items-center justify-center gap-10 opacity-60 grayscale hover:grayscale-0 transition-all duration-700">
                <img src="https://static.tacdn.com/img2/brand_refresh_2025/logos/wordmark.svg" alt="TripAdvisor" class="h-8">
                <img src="https://www.bluecorona.com/wp-content/uploads/2015/05/26-googleplusreviews.jpg" alt="Google Reviews" class="h-10 rounded-lg">
            </div>
        </div>

        <div class="swiper reviewsSwiper pb-16">
            <div class="swiper-wrapper">
                <!-- Review 1 -->
                <div class="swiper-slide">
                    <div class="bg-slate-50 rounded-[2.5rem] p-10 border border-slate-100 flex flex-col h-full">
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex gap-1 text-yellow-400">
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                            </div>
                            <img src="https://www.bluecorona.com/wp-content/uploads/2015/05/26-googleplusreviews.jpg" alt="Google Reviews" class="h-8 rounded-lg">
                        </div>
                        <p class="text-slate-600 text-lg leading-relaxed mb-10 italic">"Reputable Tours provided an exceptional 8-day Serengeti safari. Our guide was incredibly knowledgeable about wildlife. Every camp was perfectly chosen. 5 stars!"</p>
                        <div class="mt-auto flex items-center gap-4">
                            <div class="w-14 h-14 rounded-2xl bg-slate-200 overflow-hidden">
                                <img src="https://i.pravatar.cc/150?u=sarah" alt="Sarah Jenkins" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Sarah Jenkins</h4>
                                <p class="text-sm text-slate-500">United Kingdom</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="swiper-slide">
                    <div class="bg-slate-50 rounded-[2.5rem] p-10 border border-slate-100 flex flex-col h-full">
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex gap-1 text-emerald-500">
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                            </div>
                            <img src="https://static.tacdn.com/img2/brand_refresh_2025/logos/wordmark.svg" alt="TripAdvisor" class="h-6">
                        </div>
                        <p class="text-slate-600 text-lg leading-relaxed mb-10 italic">"The Kilimanjaro trek via Lemosho was challenging but perfectly organized by Reputable Tours. The equipment was top-notch and food on the mountain was surprisingly great!"</p>
                        <div class="mt-auto flex items-center gap-4">
                            <div class="w-14 h-14 rounded-2xl bg-slate-200 overflow-hidden">
                                <img src="https://i.pravatar.cc/150?u=marco" alt="Marco Rossi" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Marco Rossi</h4>
                                <p class="text-sm text-slate-500">Italy</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review 3 -->
                <div class="swiper-slide">
                    <div class="bg-slate-50 rounded-[2.5rem] p-10 border border-slate-100 flex flex-col h-full">
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex gap-1 text-yellow-400">
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                            </div>
                            <img src="https://www.bluecorona.com/wp-content/uploads/2015/05/26-googleplusreviews.jpg" alt="Google Reviews" class="h-8">
                        </div>
                        <p class="text-slate-600 text-lg leading-relaxed mb-10 italic">"Amazing cultural experience with Hadzabe tribe. It felt authentic and respectful. Reputable Tours really understands how to provide ethical tourism in Tanzania."</p>
                        <div class="mt-auto flex items-center gap-4">
                            <div class="w-14 h-14 rounded-2xl bg-slate-200 overflow-hidden">
                                <img src="https://i.pravatar.cc/150?u=elena" alt="Elena Petrova" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Elena Petrova</h4>
                                <p class="text-sm text-slate-500">Germany</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review 4 -->
                <div class="swiper-slide">
                    <div class="bg-slate-50 rounded-[2.5rem] p-10 border border-slate-100 flex flex-col h-full">
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex gap-1 text-emerald-500">
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                                <i class="ph-fill ph-star"></i>
                            </div>
                            <img src="https://static.tacdn.com/img2/brand_refresh_2025/logos/wordmark.svg" alt="TripAdvisor" class="h-6">
                        </div>
                        <p class="text-slate-600 text-lg leading-relaxed mb-10 italic">"The best safari operator in Tanzania. Their attention to detail and safety standards are unmatched. From pickup to drop-off, everything was professional."</p>
                        <div class="mt-auto flex items-center gap-4">
                            <div class="w-14 h-14 rounded-2xl bg-slate-200 overflow-hidden">
                                <img src="https://i.pravatar.cc/150?u=david" alt="David Thompson" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">David Thompson</h4>
                                <p class="text-sm text-slate-500">USA</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination-reviews !bottom-0"></div>
        </div>
    </div>
</section>

<style>
    .swiper-pagination-reviews .swiper-pagination-bullet { width: 10px; height: 10px; background: #e2e8f0; opacity: 1; margin: 0 6px !important; }
    .swiper-pagination-reviews .swiper-pagination-bullet-active { background: #10b981; width: 24px; border-radius: 5px; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Reviews Swiper
        const reviewsSwiper = new Swiper('.reviewsSwiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination-reviews',
                clickable: true,
            },
            breakpoints: {
                640: { slidesPerView: 1 },
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            }
        });

        // Animated Counter Function
        function animateCounter(element, target, duration = 2000) {
            const start = 0;
            const increment = target / (duration / 16);
            let current = start;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current).toLocaleString();
            }, 16);
        }

        // Intersection Observer for Counter Animation
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.classList.contains('animated')) {
                    const target = parseInt(entry.target.dataset.target);
                    animateCounter(entry.target, target);
                    entry.target.classList.add('animated');
                }
            });
        }, { threshold: 0.5 });

        // Observe all counter elements
        document.querySelectorAll('.counter').forEach(counter => {
            counterObserver.observe(counter);
        });

        // Interactive Booking Widget
        const bookingForm = document.querySelector('.bg-white.rounded-3xl');
        if (bookingForm) {
            // Add interactive search functionality
            const searchBtn = bookingForm.querySelector('button');
            const selects = bookingForm.querySelectorAll('select');
            const dateInput = bookingForm.querySelector('input[type="date"]');
            
            searchBtn.addEventListener('click', function(e) {
                e.preventDefault();
                // Simulate search animation
                this.innerHTML = '<i class="ph-bold ph-spinner-gap animate-spin"></i> Searching...';
                this.disabled = true;
                
                setTimeout(() => {
                    this.innerHTML = 'Search Tours';
                    this.disabled = false;
                    // Redirect to tours page with filters
                    window.location.href = '/tours';
                }, 1500);
            });

            // Add interactive hover effects to selects
            selects.forEach(select => {
                select.addEventListener('change', function() {
                    this.classList.add('ring-2', 'ring-emerald-500', 'ring-offset-2');
                    setTimeout(() => {
                        this.classList.remove('ring-2', 'ring-emerald-500', 'ring-offset-2');
                    }, 300);
                });
            });
        }

        // Smooth scroll for anchor links
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
        const heroSlides = document.querySelectorAll('.swiper-slide img');
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            heroSlides.forEach(img => {
                const rect = img.getBoundingClientRect();
                if (rect.top < window.innerHeight && rect.bottom > 0) {
                    const speed = 0.5;
                    const yPos = -(scrolled * speed);
                    img.style.transform = `translateY(${yPos}px)`;
                }
            });
        });

        // Add hover effect to destination cards
        const destinationCards = document.querySelectorAll('.group.relative.overflow-hidden');
        destinationCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.querySelector('img').style.filter = 'brightness(1.1)';
            });
            card.addEventListener('mouseleave', function() {
                this.querySelector('img').style.filter = 'brightness(1)';
            });
        });

        // Interactive stats bar animation
        const statsBar = document.querySelector('.bg-white.rounded-2xl');
        if (statsBar) {
            const statsObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !entry.target.classList.contains('stats-animated')) {
                        entry.target.classList.add('stats-animated');
                        entry.target.style.animation = 'slideInUp 0.6s ease-out';
                    }
                });
            }, { threshold: 0.3 });
            statsObserver.observe(statsBar);
        }
    });
</script>

<style>
    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .bg-grid-pattern {
        background-image: 
            linear-gradient(rgba(255,255,255,0.05) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255,255,255,0.05) 1px, transparent 1px);
        background-size: 50px 50px;
    }
    
    .animate-spin {
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
</style>

<script>
    // Show success popup if booking was just confirmed
    @if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Booking Submitted!',
        text: '{{ session('success') }}',
        confirmButtonColor: '#10b981',
        confirmButtonText: 'OK'
    });
    @endif
</script>

@endsection
