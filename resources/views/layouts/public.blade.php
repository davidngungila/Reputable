<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reputable Tours | Discover Tanzania</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <!-- Google Analytics -->
    @include('partials.google-analytics')
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body { font-family: 'Manrope', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .glass { background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(15px); }
        .nav-link { font-size: 1.05rem; position: relative; }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 1.5rem;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #1F5A3A 0%, #2E7A5A 100%);
            transition: width 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }
        .nav-link:hover::after {
            width: 100%;
            animation: borderSlide 1s infinite linear;
            background: linear-gradient(90deg, #1F5A3A 25%, #2E7A5A 25%, #2E7A5A 50%, #1F5A3A 50%, #1F5A3A 75%, #2E7A5A 75%);
            background-size: 200% 100%;
        }
        @keyframes borderSlide {
            0% { background-position: 100% 0; }
            100% { background-position: -100% 0; }
        }
        .border-move {
            position: relative;
            padding-bottom: 1rem;
            display: inline-block;
        }
        .border-move::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #1F5A3A 25%, #2E7A5A 25%, #2E7A5A 50%, #1F5A3A 50%, #1F5A3A 75%, #2E7A5A 75%);
            background-size: 200% 100%;
            animation: borderSlide 2s infinite linear;
            border-radius: 4px;
        }
        .group:hover .mega-menu { opacity: 1; visibility: visible; transform: translateY(0); }
        .mega-menu { 
            opacity: 0; 
            visibility: hidden; 
            transform: translateY(10px); 
            transition: all 0.3s ease;
        }
        .nav-border-animate {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, #1F5A3A 25%, #2E7A5A 25%, #2E7A5A 50%, #1F5A3A 50%, #1F5A3A 75%, #2E7A5A 75%);
            background-size: 200% 100%;
            animation: borderSlide 3s infinite linear;
        }
        
        /* Mobile Menu - Force display on mobile screens */
        @media (max-width: 1023px) {
            .mobile-menu-button {
                display: flex !important;
                position: relative !important;
                z-index: 9999 !important;
                opacity: 1 !important;
                visibility: visible !important;
                width: 3rem !important;
                height: 3rem !important;
            }
        }
        
        /* Hide mobile menu on desktop screens */
        @media (min-width: 1024px) {
            .mobile-menu-button {
                display: none !important;
            }
        }
        
        /* Extra small screens optimization */
        @media (max-width: 640px) {
            .mobile-menu-button {
                width: 2.5rem !important;
                height: 2.5rem !important;
            }
            .mobile-menu-button svg {
                width: 1.25rem !important;
                height: 1.25rem !important;
            }
        }
        
        /* Force mobile menu to be visible - highest specificity */
        @media screen and (max-width: 1023px) {
            button.mobile-menu-button {
                display: flex !important;
                visibility: visible !important;
                opacity: 1 !important;
            }
            button.emergency-mobile-menu {
                display: flex !important;
                visibility: visible !important;
                opacity: 1 !important;
            }
        }
        
        /* Emergency mobile menu - always show on small screens */
        @media screen and (max-width: 768px) {
            .emergency-mobile-menu {
                display: flex !important;
                position: fixed !important;
                top: 1rem !important;
                right: 1rem !important;
                z-index: 99999 !important;
            }
        }
    </style>
</head>
<body class="bg-white text-slate-900 antialiased font-medium" x-data="{ mobileMenuOpen: false }">
    <!-- Navbar -->
    <nav class="fixed top-0 w-full z-50 glass border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-6 h-24 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3 group/logo">
                <img src="{{ asset('logo.png') }}" alt="Reputable Tours - Tanzanian" class="h-20 w-auto object-contain transition-transform group-hover/logo:scale-105">
            </a>
            
            <!-- Desktop Layout -->
            <div class="hidden lg:flex items-center gap-10">
                <a href="/" class="nav-link font-bold text-emerald-600 transition-colors py-8">Home</a>
               
                    <!-- Destinations Mega Menu -->
                <div class="relative group py-8">
                    <a href="{{ route('destinations') }}" class="nav-link font-bold text-emerald-600 transition-colors flex items-center gap-1">
                        Destinations <i class="ph ph-caret-down text-xs transition-transform group-hover:rotate-180"></i>
                    </a>
                    <div class="mega-menu absolute top-full -left-20 w-[700px] bg-white rounded-[2rem] shadow-2xl border border-slate-100 p-8 z-50">
                        <div class="grid grid-cols-3 gap-8">
                            <div>
                                <h4 class="text-xs font-black uppercase tracking-widest text-emerald-600 mb-6">Mainland Circuits</h4>
                                <div class="space-y-3">
                                    <a href="/destinations/Northern-Circuit" class="flex items-center gap-3 group/item p-3 rounded-xl text-emerald-600 hover:bg-emerald-50 transition-all">
                                        <i class="ph ph-compass text-xl opacity-50 text-emerald-600"></i>
                                        <div>
                                            <p class="font-bold text-slate-900">Northern Circuit</p>
                                            <p class="text-xs text-slate-500">Serengeti, Ngorongoro, Kilimanjaro</p>
                                        </div>
                                    </a>
                                    <a href="/destinations/Southern-Circuit" class="flex items-center gap-3 group/item p-3 rounded-xl text-emerald-600 hover:bg-emerald-50 transition-all">
                                        <i class="ph ph-compass text-xl opacity-50 text-emerald-600"></i>
                                        <div>
                                            <p class="font-bold text-slate-900">Southern Circuit</p>
                                            <p class="text-xs text-slate-500">Selous, Ruaha, Mikumi</p>
                                        </div>
                                    </a>
                                    <a href="/destinations/Eastern-Circuit" class="flex items-center gap-3 group/item p-3 rounded-xl text-emerald-600 hover:bg-emerald-50 transition-all">
                                        <i class="ph ph-compass text-xl opacity-50 text-emerald-600"></i>
                                        <div>
                                            <p class="font-bold text-slate-900">Eastern Circuit</p>
                                            <p class="text-xs text-slate-500">Udzungwa, Uluguru Mountains</p>
                                        </div>
                                    </a>
                                    <a href="/destinations/Western-Circuit" class="flex items-center gap-3 group/item p-3 rounded-xl text-emerald-600 hover:bg-emerald-50 transition-all">
                                        <i class="ph ph-compass text-xl opacity-50 text-emerald-600"></i>
                                        <div>
                                            <p class="font-bold text-slate-900">Western Circuit</p>
                                            <p class="text-xs text-slate-500">Gombe, Mahale Mountains</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-xs font-black uppercase tracking-widest text-emerald-600 mb-6">Ocean Islands</h4>
                                <div class="space-y-3">
                                    <a href="/destinations/Ocean-Islands" class="flex items-center gap-3 group/item p-3 rounded-xl text-emerald-600 hover:bg-emerald-50 transition-all">
                                        <i class="ph ph-island text-xl opacity-50 text-emerald-600"></i>
                                        <div>
                                            <p class="font-bold text-slate-900">Ocean Islands</p>
                                            <p class="text-xs text-slate-500">Pemba, Mafia, Other Islands</p>
                                        </div>
                                    </a>
                                    <a href="/destinations/Mafia-Island" class="flex items-center gap-3 group/item p-3 rounded-xl text-emerald-600 hover:bg-emerald-50 transition-all">
                                        <i class="ph ph-island text-xl opacity-50 text-emerald-600"></i>
                                        <div>
                                            <p class="font-bold text-slate-900">Mafia Island</p>
                                            <p class="text-xs text-slate-500">Marine Parks & Diving</p>
                                        </div>
                                    </a>
                                    <a href="/destinations/Zanzibar-Island" class="flex items-center gap-3 group/item p-3 rounded-xl text-emerald-600 hover:bg-emerald-50 transition-all">
                                        <i class="ph ph-island text-xl opacity-50 text-emerald-600"></i>
                                        <div>
                                            <p class="font-bold text-slate-900">Zanzibar Island</p>
                                            <p class="text-xs text-slate-500">Stone Town & Beaches</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-xs font-black uppercase tracking-widest text-emerald-600 mb-6">Browse Options</h4>
                                <div class="space-y-3">
                                    <a href="{{ route('destinations') }}" class="flex items-center gap-3 text-slate-700 text-emerald-600 font-bold group/sub transition-colors">
                                        <i class="ph ph-map-pin text-xl opacity-50 text-emerald-600"></i> All Destinations
                                    </a>
                                    <a href="{{ route('destinations') }}?sort=region" class="flex items-center gap-3 text-slate-700 text-emerald-600 font-bold group/sub transition-colors">
                                        <i class="ph ph-funnel text-xl opacity-50 text-emerald-600"></i> Sort by Region
                                    </a>
                                    <a href="{{ route('mountains.index') }}" class="flex items-center gap-3 text-slate-700 text-emerald-600 font-bold group/sub transition-colors">
                                        <i class="ph ph-mountain text-xl opacity-50 text-emerald-600"></i> Mountain Trekking
                                    </a>
                                </div>
                                <div class="mt-8 pt-6 border-t border-slate-50">
                                    <a href="/tours" class="text-sm font-black text-emerald-600 flex items-center gap-2 hover:gap-3 transition-all">
                                        View All Tours <i class="ph ph-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
               
               
                <!-- Safaris Packages Dropdown -->
                <div class="relative group py-8">
                    <a href="/tours" class="nav-link font-bold text-emerald-600 transition-colors flex items-center gap-1">
                        Safari Packages <i class="ph ph-caret-down text-xs transition-transform group-hover:rotate-180"></i>
                    </a>
                    <div class="mega-menu absolute top-full left-0 w-[600px] bg-white rounded-[2rem] shadow-2xl border border-slate-100 p-8 z-50">
                        <div class="grid grid-cols-2 gap-8">
                            <div>
                                <h4 class="text-xs font-black uppercase tracking-widest text-emerald-600 mb-6">Safari Packages</h4>
                                <div class="space-y-4">
                                    <a href="/tours" class="flex items-center gap-4 group/item p-3 rounded-2xl text-emerald-600 transition-all">
                                        <div class="w-12 h-12 rounded-xl overflow-hidden">
                                            <img src="{{ asset('images/01.jpg') }}" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <p class="font-bold text-slate-900 text-emerald-600">Classic Serengeti</p>
                                            <p class="text-xs text-slate-500">Best Seller Experience</p>
                                        </div>
                                    </a>
                                    <a href="/tours" class="flex items-center gap-4 group/item p-3 rounded-2xl text-emerald-600 transition-all">
                                        <div class="w-12 h-12 rounded-xl overflow-hidden">
                                            <img src="{{ asset('images/02.jpg') }}" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <p class="font-bold text-slate-900 text-emerald-600">Luxury Camping</p>
                                            <p class="text-xs text-slate-500">Wild & Comfortable</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-xs font-black uppercase tracking-widest text-emerald-600 mb-6">Experience Styles</h4>
                                <div class="space-y-4">
                                    <a href="/tours" class="flex items-center gap-3 text-slate-700 text-emerald-600 font-bold group/sub transition-colors">
                                        <i class="ph ph-users-four text-xl opacity-50 text-emerald-600"></i> Private Safaris
                                    </a>
                                    <a href="/tours" class="flex items-center gap-3 text-slate-700 text-emerald-600 font-bold group/sub transition-colors">
                                        <i class="ph ph-camera text-xl opacity-50 text-emerald-600"></i> Photographic Safaris
                                    </a>
                                    <a href="{{ route('group-departures') }}" class="flex items-center gap-3 text-emerald-600 text-emerald-600 font-bold group/sub transition-colors">
                                        <i class="ph-bold ph-calendar-plus text-xl"></i> Group Departures
                                    </a>
                                </div>
                                <div class="mt-8 pt-6 border-t border-slate-50">
                                    <a href="/tours" class="text-sm font-black text-emerald-600 flex items-center gap-2 hover:gap-3 transition-all">
                                        Explore All Safaris <i class="ph ph-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Mountain Trekking -->
                <div class="relative group py-8">
                    <a href="/mountain-trekking" class="nav-link font-bold text-emerald-600 transition-colors flex items-center gap-1">
                        Mountain Trekking <i class="ph ph-caret-down text-xs transition-transform group-hover:rotate-180"></i>
                    </a>
                    <div class="mega-menu absolute top-full -left-20 w-[600px] bg-white rounded-[2rem] shadow-2xl border border-slate-100 p-8 z-50">
                        <div class="grid grid-cols-2 gap-8">
                            <div>
                                <h4 class="text-xs font-black uppercase tracking-widest text-emerald-600 mb-6">Mountain Treks</h4>
                                <div class="space-y-4">
                                    <a href="/kilimanjaro" class="flex items-center gap-4 group/item p-3 rounded-2xl text-emerald-600 transition-all">
                                        <div class="w-12 h-12 rounded-xl overflow-hidden">
                                            <img src="{{ asset('images/03.jpg') }}" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <p class="font-bold text-slate-900 text-emerald-600">Kilimanjaro</p>
                                            <p class="text-xs text-slate-500">Roof of Africa</p>
                                        </div>
                                    </a>
                                    <a href="/regions/ngorongoro" class="flex items-center gap-4 group/item p-3 rounded-2xl text-emerald-600 transition-all">
                                        <div class="w-12 h-12 rounded-xl overflow-hidden">
                                            <img src="{{ asset('images/05.jpg') }}" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <p class="font-bold text-slate-900 text-emerald-600">Mount Meru</p>
                                            <p class="text-xs text-slate-500">Hidden Gem</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-xs font-black uppercase tracking-widest text-emerald-600 mb-6">Trekking Info</h4>
                                <div class="space-y-4">
                                    <a href="/mountain-trekking/trekking-info" class="flex items-center gap-3 text-slate-700 text-emerald-600 font-bold group/sub transition-colors">
                                        <i class="ph ph-info text-xl opacity-50 text-emerald-600"></i> Trekking Info
                                    </a>
                                    <a href="/mountain-trekking/routes" class="flex items-center gap-3 text-slate-700 text-emerald-600 font-bold group/sub transition-colors">
                                        <i class="ph ph-map-pin text-xl opacity-50 text-emerald-600"></i> Trekking Routes
                                    </a>
                                    <a href="/mountain-trekking/equipment" class="flex items-center gap-3 text-slate-700 text-emerald-600 font-bold group/sub transition-colors">
                                        <i class="ph ph-backpack text-xl opacity-50 text-emerald-600"></i> Equipment Guide
                                    </a>
                                    <a href="/mountain-trekking/guides" class="flex items-center gap-3 text-slate-700 text-emerald-600 font-bold group/sub transition-colors">
                                        <i class="ph ph-user text-xl opacity-50 text-emerald-600"></i> Expert Guides
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Things to Do - Essential Activities -->
                <div class="relative group py-8">
                    <a href="/things-to-do" class="nav-link font-bold text-emerald-600 transition-colors flex items-center gap-1">
                        Things to Do <i class="ph ph-caret-down text-xs transition-transform group-hover:rotate-180"></i>
                    </a>
                    <div class="mega-menu absolute top-full left-1/2 transform -translate-x-1/2 w-[600px] bg-white rounded-[2rem] shadow-2xl border border-slate-100 p-8 z-50">
                        <div class="grid grid-cols-2 gap-8">
                            <div>
                                <h4 class="text-xs font-black uppercase tracking-widest text-emerald-600 mb-6">Popular Activities</h4>
                                <div class="space-y-4">
                                    <a href="/activity/game-drives" class="flex items-center gap-4 group/item p-3 rounded-2xl text-emerald-600 transition-all">
                                        <div class="w-12 h-12 rounded-xl overflow-hidden">
                                            <img src="{{ asset('images/01.jpg') }}" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <p class="font-bold text-slate-900 text-emerald-600">Game Drives</p>
                                            <p class="text-xs text-slate-500">Wildlife Safari</p>
                                        </div>
                                    </a>
                                    <a href="/activity/beach" class="flex items-center gap-4 group/item p-3 rounded-2xl text-emerald-600 transition-all">
                                        <div class="w-12 h-12 rounded-xl overflow-hidden">
                                            <img src="{{ asset('images/07.jpg') }}" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <p class="font-bold text-slate-900 text-emerald-600">Beach Activities</p>
                                            <p class="text-xs text-slate-500">Zanzibar & Coast</p>
                                        </div>
                                    </a>
                                    <a href="/activity/balloon" class="flex items-center gap-4 group/item p-3 rounded-2xl text-emerald-600 transition-all">
                                        <div class="w-12 h-12 rounded-xl overflow-hidden">
                                            <img src="{{ asset('images/05.jpg') }}" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <p class="font-bold text-slate-900 text-emerald-600">Balloon Safari</p>
                                            <p class="text-xs text-slate-500">Aerial Adventure</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-xs font-black uppercase tracking-widest text-emerald-600 mb-6">Experience Types</h4>
                                <div class="space-y-4">
                                    <a href="/activity/cultural" class="flex items-center gap-3 text-slate-700 text-emerald-600 font-bold group/sub transition-colors">
                                        <i class="ph ph-users-three text-xl opacity-50 text-emerald-600"></i> Cultural Visits
                                    </a>
                                    <a href="/activity/bird-watching" class="flex items-center gap-3 text-slate-700 text-emerald-600 font-bold group/sub transition-colors">
                                        <i class="ph ph-bird text-xl opacity-50 text-emerald-600"></i> Bird Watching
                                    </a>
                                    <a href="/activity/walking" class="flex items-center gap-3 text-slate-700 text-emerald-600 font-bold group/sub transition-colors">
                                        <i class="ph ph-walking text-xl opacity-50 text-emerald-600"></i> Walking Tours
                                    </a>
                                    <a href="/activity/night-game" class="flex items-center gap-3 text-slate-700 text-emerald-600 font-bold group/sub transition-colors">
                                        <i class="ph ph-moon text-xl opacity-50 text-emerald-600"></i> Night Game Drives
                                    </a>
                                </div>
                                <div class="mt-8 pt-6 border-t border-slate-50">
                                    <a href="/tours" class="text-sm font-black text-emerald-600 flex items-center gap-2 hover:gap-3 transition-all">
                                        View All Activities <i class="ph ph-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            <div class="flex items-center gap-4">
                <!-- Mobile Toggle -->
                <button @click="mobileMenuOpen = true" class="mobile-menu-button flex items-center justify-center w-12 h-12 bg-emerald-600 text-white rounded-2xl hover:bg-emerald-700 transition-all shadow-lg shadow-emerald-600/20" style="display: none;">
                    <!-- Fallback SVG Hamburger Icon -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <!-- Phosphor Icon as backup -->
                    <i class="ph ph-list text-2xl hidden"></i>
                </button>
                
                <!-- Emergency Mobile Menu Button - Always visible on mobile -->
                <button @click="mobileMenuOpen = true" class="emergency-mobile-menu flex items-center justify-center w-12 h-12 bg-red-600 text-white rounded-2xl hover:bg-red-700 transition-all shadow-lg shadow-red-600/20 lg:hidden" style="display: none;">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
              
                <a href="/tours" class="hidden md:inline-flex items-center gap-2 text-sm font-semibold text-white bg-emerald-600 px-6 py-2.5 rounded-full hover:bg-emerald-700 shadow-lg shadow-emerald-600/20 transition-all">
                    Book Now
                </a>
            </div>
        </div>
        <div class="nav-border-animate"></div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-x-full"
         x-transition:enter-end="opacity-100 translate-x-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-x-0"
         x-transition:leave-end="opacity-0 translate-x-full"
         class="fixed inset-0 z-[100] lg:hidden">
        
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-slate-950/60 backdrop-blur-md" @click="mobileMenuOpen = false"></div>
        
        <!-- Sidebar -->
        <div class="absolute right-0 top-0 bottom-0 w-[85%] max-w-sm bg-white shadow-2xl overflow-y-auto">
            <div class="p-8">
                <div class="flex items-center justify-between mb-12">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('logo.png') }}" class="h-10 w-auto" alt="Logo">
                        <span class="font-black text-slate-900">REPUTABLE TOURS</span>
                    </div>
                    <button @click="mobileMenuOpen = false" class="w-10 h-10 bg-slate-100 text-slate-400 rounded-xl flex items-center justify-center hover:bg-rose-50 hover:text-rose-500 transition-all">
                        <i class="ph ph-x text-2xl"></i>
                    </button>
                </div>

                <div class="space-y-6">
                    <a href="/" class="block text-2xl font-serif font-black text-slate-900 text-emerald-600">Home</a>
                    
                    <div x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center justify-between w-full text-2xl font-serif font-black text-slate-900">
                            Safaris <i class="ph ph-caret-down text-lg transition-transform" :class="open ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="open" x-collapse class="pl-4 mt-4 space-y-4">
                            <a href="/tours" class="block text-sm font-bold text-slate-500 text-emerald-600">Classic Serengeti</a>
                            <a href="/tours" class="block text-sm font-bold text-slate-500 text-emerald-600">Private Safaris</a>
                            <a href="/tours" class="block text-sm font-bold text-slate-500 text-emerald-600">Luxury Camping</a>
                            <a href="{{ route('kilimanjaro') }}" class="block text-sm font-bold text-slate-500 text-emerald-600">Kilimanjaro Climbing</a>
                            <a href="{{ route('group-departures') }}" class="block text-sm font-bold text-emerald-600 italic">Group Departures</a>
                        </div>
                    </div>

                    <div x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center justify-between w-full text-2xl font-serif font-black text-slate-900">
                            Destinations <i class="ph ph-caret-down text-lg transition-transform" :class="open ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="open" x-collapse class="pl-4 mt-4 space-y-4">
                            <a href="{{ route('destinations') }}" class="block text-sm font-bold text-emerald-600">All Destinations</a>
                            <div class="pl-4 mt-2 space-y-2">
                                <a href="/destinations/Northern-Circuit" class="block text-sm font-bold text-slate-500 hover:text-emerald-600">Northern Circuit</a>
                                <a href="/destinations/Southern-Circuit" class="block text-sm font-bold text-slate-500 hover:text-emerald-600">Southern Circuit</a>
                                <a href="/destinations/Eastern-Circuit" class="block text-sm font-bold text-slate-500 hover:text-emerald-600">Eastern Circuit</a>
                                <a href="/destinations/Western-Circuit" class="block text-sm font-bold text-slate-500 hover:text-emerald-600">Western Circuit</a>
                                <a href="/destinations/Ocean-Islands" class="block text-sm font-bold text-slate-500 hover:text-emerald-600">Ocean Islands</a>
                                <a href="/destinations/Mafia-Island" class="block text-sm font-bold text-slate-500 hover:text-emerald-600">Mafia Island</a>
                                <a href="/destinations/Zanzibar-Island" class="block text-sm font-bold text-slate-500 hover:text-emerald-600">Zanzibar Island</a>
                            </div>
                        </div>
                    </div>

                    <a href="/about" class="block text-2xl font-serif font-black text-slate-900 text-emerald-600">About Us</a>
                    <a href="/contact" class="block text-2xl font-serif font-black text-slate-900 text-emerald-600">Contact</a>
                </div>

                <div class="mt-20 pt-10 border-t border-slate-100">
                    <div class="bg-emerald-950 p-8 rounded-[2.5rem] text-white">
                        <h4 class="text-lg font-serif font-black mb-2">Ready to Start?</h4>
                        <p class="text-sm text-emerald-100/60 mb-8 leading-relaxed">Let's build your dream itinerary together.</p>
                        <a href="/tours" class="w-full inline-block py-4 bg-emerald-500 text-white font-black text-xs uppercase tracking-widest text-center rounded-2xl shadow-xl shadow-emerald-500/20">Book Adventure</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    <!-- Footer -->
    <footer class="bg-slate-900 text-white pt-20 pb-10">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-20">
            <div class="col-span-1 md:col-span-1 lg:col-span-1">
                <a href="/" class="flex items-center gap-3 mb-6">
                    <img src="{{ asset('logo.png') }}" alt="Reputable Tours Logo" class="h-10 w-auto object-contain">
                    <div class="flex flex-col">
                        <span class="text-lg font-black tracking-tighter text-white leading-none">REPUTABLE</span>
                        <span class="text-[9px] font-bold tracking-[0.2em] text-emerald-400 uppercase leading-none">TOURS</span>
                    </div>
                </a>
                <p class="text-slate-400 leading-relaxed text-sm italic">
                    Authentic Tanzanian safari experiences with professional guides and unforgettable adventures.
                </p>
            </div>
            <div>
                <h4 class="font-bold mb-6 text-emerald-500">Quick Links</h4>
                <ul class="space-y-4 text-sm text-slate-400">
                    <li><a href="/" class="hover:text-white transition-colors">Home</a></li>
                    <li><a href="{{ route('group-departures') }}" class="hover:text-white transition-colors">Group Departures</a></li>
                    <li><a href="{{ route('kilimanjaro') }}" class="hover:text-white transition-colors">Kilimanjaro</a></li>
                    <li><a href="{{ route('tours.index') }}" class="hover:text-white transition-colors">Our Tours</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">About Us</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact Us</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-6 text-emerald-500">Popular Regions</h4>
                <ul class="space-y-4 text-sm text-slate-400">
                    <li><a href="{{ route('regions.serengeti') }}" class="hover:text-white transition-colors">Serengeti NP</a></li>
                    <li><a href="{{ route('regions.ngorongoro') }}" class="hover:text-white transition-colors">Ngorongoro</a></li>
                    <li><a href="{{ route('kilimanjaro') }}" class="hover:text-white transition-colors">Mount Kilimanjaro</a></li>
                    <li><a href="{{ route('regions.zanzibar') }}" class="hover:text-white transition-colors">Zanzibar Island</a></li>
                    <li><a href="{{ route('regions.tarangire') }}" class="hover:text-white transition-colors">Tarangire NP</a></li>
                    <li><a href="{{ route('regions.lake-manyara') }}" class="hover:text-white transition-colors">Lake Manyara NP</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-6 text-emerald-500">Contact Info</h4>
                <ul class="space-y-4 text-sm text-slate-400">
                    <li class="flex items-center gap-3">
                        <i class="ph ph-whatsapp-logo text-emerald-500"></i> 
                        <a href="https://wa.me/255675255523" target="_blank" class="hover:text-white transition-colors">+255 675 255 523</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="ph ph-envelope text-emerald-500"></i> 
                        <a href="mailto:info@reputabletours.com" class="hover:text-white transition-colors">info@reputabletours.com</a>
                    </li>
                    <li class="flex items-center gap-3 font-bold">
                        <i class="ph ph-map-pin text-emerald-500"></i> NSSF Commercial Complex, Moshi
                    </li>
                    <li class="flex items-center gap-3 text-xs">
                        <i class="ph ph-envelope text-emerald-500"></i> P.O Box 25212, Tanzania
                    </li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 pt-10 border-t border-slate-800">
            <div class="flex flex-col items-center text-center gap-8">
                <div class="flex flex-col items-center gap-4">
                    <p class="text-sm text-slate-500">© 2026 REPUTABLE TOURS. All rights reserved.</p>
                </div>
                <div class="flex items-center gap-6">
                    <a href="#" class="text-slate-500 hover:text-white transition-colors"><i class="ph ph-facebook-logo text-xl"></i></a>
                    <a href="#" class="text-slate-500 hover:text-white transition-colors"><i class="ph ph-instagram-logo text-xl"></i></a>
                    <a href="#" class="text-slate-500 hover:text-white transition-colors"><i class="ph ph-twitter-logo text-xl"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/255675255523" target="_blank" class="fixed bottom-8 right-8 z-50 w-16 h-16 bg-green-500 text-white rounded-full flex items-center justify-center shadow-2xl hover:scale-110 hover:bg-green-600 transition-all">
        <i class="ph ph-whatsapp-logo text-3xl"></i>
    </a>

    <script>
    (function () {
        function uuidv4() {
            if (window.crypto && window.crypto.randomUUID) return window.crypto.randomUUID();
            return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
                var r = Math.random() * 16 | 0, v = c === 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
        }

        function getOrSet(key, store) {
            try {
                var v = store.getItem(key);
                if (v) return v;
                v = uuidv4().replace(/-/g, '');
                store.setItem(key, v);
                return v;
            } catch (e) {
                return uuidv4().replace(/-/g, '');
            }
        }

        function deviceType() {
            var w = window.innerWidth || 0;
            if (w <= 768) return 'mobile';
            if (w <= 1024) return 'tablet';
            return 'desktop';
        }

        function parseUA() {
            var ua = navigator.userAgent || '';
            var browser = 'unknown';
            if (ua.includes('Edg/')) browser = 'edge';
            else if (ua.includes('Chrome/')) browser = 'chrome';
            else if (ua.includes('Firefox/')) browser = 'firefox';
            else if (ua.includes('Safari/') && !ua.includes('Chrome/')) browser = 'safari';

            var os = 'unknown';
            if (ua.includes('Windows')) os = 'windows';
            else if (ua.includes('Android')) os = 'android';
            else if (ua.includes('iPhone') || ua.includes('iPad')) os = 'ios';
            else if (ua.includes('Mac OS X')) os = 'macos';
            else if (ua.includes('Linux')) os = 'linux';

            return { browser: browser, os: os };
        }

        var visitorId = getOrSet('lau_vid', localStorage);
        var sessionUuid = getOrSet('lau_sess', sessionStorage);
        var ua = parseUA();

        var ref = document.referrer || '';
        var refHost = '';
        try { refHost = ref ? (new URL(ref)).host : ''; } catch (e) { refHost = ''; }

        var params = new URLSearchParams(window.location.search || '');

        var payload = {
            visitor_id: visitorId,
            session_uuid: sessionUuid,
            path: window.location.pathname || '/',
            full_url: window.location.href || null,
            title: document.title || null,
            referrer: ref || null,
            referrer_host: refHost || null,
            device_type: deviceType(),
            browser: ua.browser,
            os: ua.os,
            screen_w: window.screen ? window.screen.width : null,
            screen_h: window.screen ? window.screen.height : null,
            language: navigator.language || null,
            timezone: (Intl && Intl.DateTimeFormat ? Intl.DateTimeFormat().resolvedOptions().timeZone : null),
            utm_source: params.get('utm_source'),
            utm_medium: params.get('utm_medium'),
            utm_campaign: params.get('utm_campaign')
        };

        fetch(@json(route('analytics.track')), {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
            body: JSON.stringify(payload),
            keepalive: true
        }).then(function (res) {
            return res.json().catch(function () { return null; });
        }).then(function (data) {
            if (data && data.session_uuid) {
                try { sessionStorage.setItem('lau_sess', data.session_uuid); } catch (e) {}
            }
        }).catch(function () {});
    })();
    </script>
</body>
</html>
