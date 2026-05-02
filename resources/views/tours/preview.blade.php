@extends('layouts.public')

@section('title', $tour->name . ' - Preview')

@section('content')
<div class="min-h-screen bg-slate-50">
    <!-- Enhanced Hero Section -->
    <div class="relative h-[60vh] md:h-[70vh] lg:h-[80vh] max-h-[700px] bg-gradient-to-br from-[#1F5A3A] via-[#2E7A5A] to-[#1F5A3A] overflow-hidden">
        @if(!empty($tour->images) && count($tour->images) > 0)
            <div class="absolute inset-0">
                <img src="{{ asset($tour->images[0]) }}" alt="{{ $tour->name }}" 
                     class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
            </div>
        @else
            <div class="absolute inset-0 bg-gradient-to-br from-[#1F5A3A] via-[#2E7A5A] to-[#1F5A3A]">
                <div class="absolute inset-0 bg-black/20"></div>
            </div>
        @endif
        
        <!-- Animated Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-10 w-32 h-32 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-48 h-48 bg-[#E67A2E]/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
            <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-[#E67A2E]/10 rounded-full blur-2xl animate-pulse delay-500"></div>
        </div>
        
        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center justify-center">
            <div class="text-white max-w-4xl text-center px-4">
                <!-- Premium Badge -->
                <div class="flex items-center justify-center gap-2 md:gap-3 mb-4 md:mb-6 flex-wrap">
                    <span class="px-3 py-1.5 md:px-4 md:py-2 bg-gradient-to-r from-[#E67A2E] to-[#E67A2E]/80 text-white rounded-full text-xs md:text-sm font-bold shadow-lg">
                        <i class="ph-bold ph-crown mr-1 md:mr-2"></i>PREMIUM TOUR
                    </span>
                    <span class="px-2 py-1 md:px-3 md:py-1.5 bg-white/20 backdrop-blur-sm rounded-full text-xs md:text-sm font-medium">
                        {{ ucfirst($tour->package_type ?? 'Safari Adventure') }}
                    </span>
                    <span class="px-2 py-1 md:px-3 md:py-1.5 bg-white/20 backdrop-blur-sm rounded-full text-xs md:text-sm font-medium">
                        {{ $tour->duration_days }} Days
                    </span>
                    <span class="px-2 py-1 md:px-3 md:py-1.5 bg-gradient-to-r from-[#1F5A3A] to-[#2E7A5A] rounded-full text-xs md:text-sm font-medium shadow-lg">
                        <i class="ph-bold ph-sparkle mr-1"></i>Preview Mode
                    </span>
                </div>
                
                <!-- Enhanced Title -->
                <h1 class="text-xl md:text-2xl lg:text-3xl xl:text-4xl font-bold mb-3 md:mb-4 leading-tight">
                    <span class="bg-gradient-to-r from-white to-[#E67A2E]/50 bg-clip-text text-transparent">
                        {{ $tour->name }}
                    </span>
                </h1>
                
                <!-- Location with Icon -->
                <div class="flex items-center justify-center text-lg text-white/90 mb-6">
                    <i class="ph-bold ph-map-pin text-emerald-400 mr-2 text-xl"></i>
                    <span>{{ $tour->location }}</span>
                </div>
                
                <!-- Enhanced CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 md:gap-4 justify-center">
                    <button onclick="proceedToBooking()" class="px-6 py-3 md:px-8 md:py-4 bg-gradient-to-r from-[#1F5A3A] to-[#2E7A5A] text-white rounded-xl font-bold text-base md:text-lg hover:from-[#2E7A5A] hover:to-[#1F5A3A] transition-all transform hover:scale-105 shadow-2xl">
                        <i class="ph-bold ph-calendar-check mr-2"></i>Book This Adventure
                    </button>
                    <button onclick="scrollToSection('itinerary')" class="px-6 py-3 md:px-8 md:py-4 bg-white/20 backdrop-blur-sm text-white rounded-xl font-bold text-base md:text-lg hover:bg-white/30 transition-all border border-white/30">
                        <i class="ph-bold ph-map-trifold mr-2"></i>View Itinerary
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Enhanced Floating Action Buttons -->
        <div class="absolute bottom-8 right-8 flex flex-col gap-3">
            <button onclick="shareTour()" class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center text-white hover:bg-white/30 transition-all transform hover:scale-110 shadow-lg">
                <i class="ph-bold ph-share-network text-xl"></i>
            </button>
            <button onclick="favoriteTour()" class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center text-white hover:bg-white/30 transition-all transform hover:scale-110 shadow-lg">
                <i class="ph-bold ph-heart text-xl"></i>
            </button>
            <button onclick="downloadBrochure()" class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center text-white hover:bg-white/30 transition-all transform hover:scale-110 shadow-lg">
                <i class="ph-bold ph-download text-xl"></i>
            </button>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white/60 animate-bounce">
            <i class="ph-bold ph-caret-double-down text-2xl"></i>
        </div>
    </div>

    <!-- Quick Info Bar -->
    <div class="bg-white border-b border-slate-200 sticky top-24 z-30 shadow-sm">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row items-center justify-between py-3 sm:py-4 gap-4">
                <div class="flex flex-wrap items-center gap-4 sm:gap-6 md:gap-8">
                    <div class="text-center">
                        <div class="text-xl md:text-2xl font-bold text-[#1F5A3A]">${{ number_format($tour->base_price, 0) }}</div>
                        <div class="text-xs text-slate-600">per person</div>
                    </div>
                    <div class="text-center">
                        <div class="text-lg font-semibold text-gray-900">{{ $tour->duration_days }}</div>
                        <div class="text-xs text-gray-600">days</div>
                    </div>
                    <div class="text-center">
                        <div class="text-lg font-semibold text-gray-900">{{ $tour->itineraries->count() ?? 0 }}</div>
                        <div class="text-xs text-gray-600">activities</div>
                    </div>
                    <div class="text-center">
                        <div class="text-lg font-semibold text-gray-900">{{ $tour->destinations->count() ?? 0 }}</div>
                        <div class="text-xs text-gray-600">destinations</div>
                    </div>
                </div>
                <div class="flex gap-3">
                    <button onclick="scrollToSection('booking')" class="px-6 py-2 bg-[#1F5A3A] text-white rounded-lg hover:bg-[#2E7A5A] transition-colors font-medium">
                        Book Now
                    </button>
                    <button onclick="scrollToSection('itinerary')" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium">
                        View Itinerary
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Overview -->
                <section class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 md:p-8 scroll-mt-24">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Overview</h2>
                    <div class="prose prose-gray max-w-none">
                        <p class="text-gray-600 leading-relaxed text-base md:text-lg">{{ $tour->description }}</p>
                    </div>
                    
                    <!-- Highlights -->
                    @if(!empty($tour->highlights))
                    <div class="mt-8 pt-8 border-t border-slate-200">
                        <h3 class="text-xl md:text-2xl font-semibold text-gray-900 mb-6">Tour Highlights</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($tour->highlights as $highlight)
                            <div class="flex items-center p-3 bg-slate-50 rounded-lg">
                                <i class="ph-bold ph-check-circle text-[#1F5A3A] mr-3 text-xl"></i>
                                <span class="text-gray-700 font-medium">{{ $highlight }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </section>

                <!-- Itinerary -->
                <section id="itinerary" class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 md:p-8 scroll-mt-24">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 sm:mb-8 gap-4">
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Detailed Itinerary</h2>
                        <div class="flex gap-2">
                            <button onclick="toggleItineraryView('expanded')" id="expanded-view-btn" class="px-3 py-1.5 md:px-4 md:py-2 bg-[#1F5A3A]/10 text-[#1F5A3A] rounded-lg text-sm font-medium">
                                <i class="ph-bold ph-list-bullets mr-1"></i>Expanded
                            </button>
                            <button onclick="toggleItineraryView('compact')" id="compact-view-btn" class="px-3 py-1.5 md:px-4 md:py-2 bg-slate-100 text-slate-700 rounded-lg text-sm font-medium">
                                <i class="ph-bold ph-list mr-1"></i>Compact
                            </button>
                        </div>
                    </div>
                    
                    <div id="itinerary-expanded" class="space-y-8">
                        @foreach($tour->itineraries ?? [] as $day)
                        <div class="border-l-4 border-[#1F5A3A] pl-6 relative bg-slate-50 rounded-r-xl p-6">
                            <div class="absolute -left-2 top-6 w-4 h-4 bg-[#1F5A3A] rounded-full"></div>
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4 gap-2">
                                <h3 class="text-lg md:text-xl font-semibold text-gray-900">Day {{ $day->day_number }}: {{ $day->title }}</h3>
                                <span class="text-sm text-slate-600 bg-white px-3 py-1 rounded-full">{{ $day->meals ?? 'All meals included' }}</span>
                            </div>
                            <p class="text-gray-700 mb-6 text-base leading-relaxed">{{ $day->description }}</p>
                            
                            @if(!empty($day->activities))
                            <div class="mb-6">
                                <h4 class="text-sm font-semibold text-gray-700 mb-3">Activities:</h4>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($day->activities as $activity)
                                    <span class="px-3 py-1.5 bg-[#E67A2E]/10 text-[#E67A2E] rounded-full text-sm font-medium">{{ $activity }}</span>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            
                            @if(!empty($day->accommodation))
                            <div class="bg-white rounded-lg p-4 border border-slate-200">
                                <h4 class="text-sm font-semibold text-gray-700 mb-2">Accommodation:</h4>
                                <p class="text-gray-600">{{ $day->accommodation }}</p>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    
                    <div id="itinerary-compact" class="hidden space-y-3">
                        @foreach($tour->itineraries ?? [] as $day)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors cursor-pointer" onclick="toggleDayDetail({{ $day->day_number }})">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-emerald-600 text-white rounded-full flex items-center justify-center text-sm font-semibold mr-3">
                                    {{ $day->day_number }}
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">{{ $day->title }}</h4>
                                    <p class="text-sm text-gray-600">{{ Str::limit($day->description, 80) }}</p>
                                </div>
                            </div>
                            <i class="ph-bold ph-caret-right text-gray-400"></i>
                        </div>
                        @endforeach
                    </div>
                </section>

                <!-- Destinations -->
                @if($tour->destinations && $tour->destinations->count() > 0)
                <section class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 scroll-mt-24">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Destinations</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($tour->destinations as $destination)
                        <div class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-emerald-500 rounded-lg mr-4 flex items-center justify-center text-white">
                                @if(!empty($destination->images) && count($destination->images) > 0)
                                    <img src="{{ asset($destination->images[0]) }}" alt="{{ $destination->name }}" class="w-full h-full object-cover rounded-lg">
                                @else
                                    <i class="ph-bold ph-map-pin text-2xl"></i>
                                @endif
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">{{ $destination->name }}</h3>
                                <p class="text-sm text-gray-600">{{ $destination->location }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>
                @endif

                <!-- Equipment & Guides -->
                <section class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 scroll-mt-24">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Equipment -->
                        @if($tour->equipment && $tour->equipment->count() > 0)
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Included Equipment</h3>
                            <div class="space-y-2">
                                @foreach($tour->equipment as $item)
                                <div class="flex items-center">
                                    <i class="ph-bold ph-backpack text-emerald-600 mr-3"></i>
                                    <span class="text-gray-700">{{ $item->name }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        
                        <!-- Guides -->
                        @if($tour->guides && $tour->guides->count() > 0)
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Professional Guides</h3>
                            <div class="space-y-3">
                                @foreach($tour->guides as $guide)
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-pink-400 rounded-full mr-3 flex items-center justify-center text-white font-semibold">
                                        {{ substr($guide->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-900">{{ $guide->name }}</div>
                                        <div class="text-sm text-gray-600">{{ $guide->specialization ?? 'Professional Guide' }}</div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </section>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Booking Card -->
                <section id="booking" class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 sticky top-24 z-20">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Book This Tour</h3>
                    
                    <div class="mb-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-gray-600">Price per person</span>
                            <span class="text-2xl font-bold text-emerald-600">${{ number_format($tour->base_price, 0) }}</span>
                        </div>
                        <div class="text-sm text-gray-600">
                            <i class="ph-bold ph-info mr-1"></i>
                            All-inclusive package
                        </div>
                    </div>
                    
                    <form class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Travel Date</label>
                            <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Number of Travelers</label>
                            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                                <option>1 Person</option>
                                <option>2 People</option>
                                <option>3 People</option>
                                <option>4 People</option>
                                <option>5+ People</option>
                            </select>
                        </div>
                        
                        <div class="pt-4 border-t border-gray-200">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-semibold">${{ number_format($tour->base_price, 0) }}</span>
                            </div>
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-gray-600">Service Fee</span>
                                <span class="font-semibold">$50</span>
                            </div>
                            <div class="flex items-center justify-between text-lg font-bold">
                                <span>Total</span>
                                <span class="text-emerald-600">${{ number_format($tour->base_price + 50, 0) }}</span>
                            </div>
                        </div>
                        
                        <button type="button" onclick="proceedToBooking()" class="w-full px-6 py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors font-semibold">
                            Proceed to Booking
                        </button>
                        
                        <button type="button" onclick="inquireTour()" class="w-full px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium">
                            Make Inquiry
                        </button>
                    </form>
                </section>

                <!-- Tour Info -->
                <section class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Tour Information</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Duration</span>
                            <span class="font-medium">{{ $tour->duration_days }} Days</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Difficulty</span>
                            <span class="font-medium">{{ ucfirst($tour->difficulty ?? 'moderate') }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Group Size</span>
                            <span class="font-medium">{{ $tour->max_group_size ?? 12 }} Max</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Min Age</span>
                            <span class="font-medium">{{ $tour->min_age ?? 12 }} Years</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Languages</span>
                            <span class="font-medium">English, Swahili</span>
                        </div>
                    </div>
                </section>

                <!-- What's Included -->
                <section class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">What's Included</h3>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <i class="ph-bold ph-check-circle text-emerald-600 mr-3"></i>
                            <span class="text-gray-700">All accommodation</span>
                        </div>
                        <div class="flex items-center">
                            <i class="ph-bold ph-check-circle text-emerald-600 mr-3"></i>
                            <span class="text-gray-700">All meals as specified</span>
                        </div>
                        <div class="flex items-center">
                            <i class="ph-bold ph-check-circle text-emerald-600 mr-3"></i>
                            <span class="text-gray-700">Professional guides</span>
                        </div>
                        <div class="flex items-center">
                            <i class="ph-bold ph-check-circle text-emerald-600 mr-3"></i>
                            <span class="text-gray-700">Transportation</span>
                        </div>
                        <div class="flex items-center">
                            <i class="ph-bold ph-check-circle text-emerald-600 mr-3"></i>
                            <span class="text-gray-700">Park entrance fees</span>
                        </div>
                    </div>
                </section>

                <!-- Contact Support -->
                <section class="bg-gradient-to-br from-emerald-50 to-blue-50 rounded-xl p-6 border border-emerald-200">
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Need Help?</h3>
                    <p class="text-gray-600 mb-4">Our travel experts are here to help you plan your perfect adventure.</p>
                    <div class="space-y-2">
                        <a href="mailto:info@reputabletours.com" class="flex items-center text-emerald-600 hover:text-emerald-700 font-medium">
                            <i class="ph-bold ph-envelope mr-2"></i>
                            info@reputabletours.com
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<script>
function scrollToSection(sectionId) {
    const element = document.getElementById(sectionId);
    if (element) {
        element.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}

function toggleItineraryView(view) {
    const expandedView = document.getElementById('itinerary-expanded');
    const compactView = document.getElementById('itinerary-compact');
    const expandedBtn = document.getElementById('expanded-view-btn');
    const compactBtn = document.getElementById('compact-view-btn');
    
    if (view === 'expanded') {
        expandedView.classList.remove('hidden');
        compactView.classList.add('hidden');
        expandedBtn.className = 'px-3 py-1 bg-emerald-100 text-emerald-700 rounded-lg text-sm font-medium';
        compactBtn.className = 'px-3 py-1 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium';
    } else {
        expandedView.classList.add('hidden');
        compactView.classList.remove('hidden');
        expandedBtn.className = 'px-3 py-1 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium';
        compactBtn.className = 'px-3 py-1 bg-emerald-100 text-emerald-700 rounded-lg text-sm font-medium';
    }
}

function toggleDayDetail(dayNumber) {
    // This would expand the day detail in compact view
    console.log('Toggle day detail for day:', dayNumber);
}

function shareTour() {
    if (navigator.share) {
        navigator.share({
            title: '{{ $tour->name }}',
            text: 'Check out this amazing tour!',
            url: window.location.href
        });
    } else {
        // Fallback - copy to clipboard
        navigator.clipboard.writeText(window.location.href);
        showNotification('Tour link copied to clipboard!', 'success');
    }
}

function favoriteTour() {
    // Toggle favorite status
    const button = event.currentTarget;
    const icon = button.querySelector('i');
    
    if (icon.classList.contains('ph-heart')) {
        icon.className = 'ph-bold ph-heart-fill text-xl';
        showNotification('Added to favorites!', 'success');
    } else {
        icon.className = 'ph-bold ph-heart text-xl';
        showNotification('Removed from favorites', 'info');
    }
}

function downloadBrochure() {
    // Create a simple brochure download
    const tourData = {
        name: '{{ $tour->name }}',
        duration: '{{ $tour->duration_days }} days',
        price: '${{ number_format($tour->base_price ?? 0, 0) }}',
        location: '{{ $tour->location }}',
        description: '{{ Str::limit($tour->description, 200) }}'
    };
    
    const brochureContent = `
TOUR BROCHURE
================

${tourData.name}
${tourData.location}
${tourData.duration} • Starting from ${tourData.price}

${tourData.description}

Book now at: ${window.location.href}

© Reputable Tours - ${new Date().getFullYear()}
    `;
    
    const blob = new Blob([brochureContent], { type: 'text/plain' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `${tourData.name.replace(/\s+/g, '_')}_Brochure.txt`;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    window.URL.revokeObjectURL(url);
    
    showNotification('Brochure downloaded successfully!', 'success');
}

function proceedToBooking() {
    // Redirect to booking page
    window.location.href = `/bookings/create?tour_id={{ $tour->id }}`;
}

function inquireTour() {
    // Redirect to inquiry page
    window.location.href = `/contact/inquiry?tour_id={{ $tour->id }}`;
}

function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `fixed bottom-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 flex items-center ${
        type === 'success' ? 'bg-emerald-600 text-white' : 
        type === 'error' ? 'bg-red-600 text-white' : 
        'bg-blue-600 text-white'
    }`;
    notification.innerHTML = `
        <i class="ph-bold ph-${type === 'success' ? 'check-circle' : type === 'error' ? 'x-circle' : 'info'} mr-2"></i>
        ${message}
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 3000);
}
</script>
@endsection
