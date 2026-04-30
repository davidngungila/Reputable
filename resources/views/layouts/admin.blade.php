<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ sidebarOpen: false }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Safari Admin') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('lau-adventuress-logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Manrope', sans-serif; }</style>
    
    <!-- Google Analytics -->
    @include('partials.google-analytics')
    
    @vite(['resources/css/admin.css', 'resources/js/app.js'])
    @stack('styles')
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50 flex h-screen overflow-hidden">
    <!-- Mobile Sidebar Backdrop -->
    <div x-show="sidebarOpen" 
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false"
         class="fixed inset-0 bg-slate-900/60 transition-opacity lg:hidden z-40"></div>

        <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
           class="fixed inset-y-0 left-0 w-72 bg-emerald-950 text-white flex-shrink-0 flex flex-col z-50 transition-transform duration-300 lg:translate-x-0 lg:static overflow-hidden shadow-2xl">
        
        <!-- Logo Area with Close Button for Mobile -->
        <div class="p-6 flex items-center justify-between border-b border-white/5 bg-emerald-950/50 sticky top-0 z-10">
            <div class="flex items-center gap-3">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="h-10 w-auto object-contain">
                <div class="flex flex-col">
                    <span class="text-xl font-black tracking-tighter text-white leading-none">REPUTABLE</span>
                    <span class="text-[9px] font-bold tracking-[0.2em] text-emerald-400 uppercase leading-none mt-1">TOURS - TANZANIAN</span>
                </div>
            </div>
            <!-- Close Sidebar (Mobile Only) -->
            <button @click="sidebarOpen = false" class="lg:hidden p-2 text-white/50 hover:text-white transition-colors">
                <i class="ph-bold ph-x text-2xl"></i>
            </button>
        </div>
        
        <!-- Navigation Area (Scrollable) -->
        <div class="flex-grow overflow-y-auto custom-scrollbar p-4 space-y-2">
            
            @php
                $user = auth()->user();
                // Check if role methods exist, fallback if not
                $hasRoleMethod = $user && method_exists($user, 'hasAnyRole');
                $hasRoles = $user && method_exists($user, 'roles') && $user->roles()->exists();
                $isAdmin = $hasRoleMethod && $hasRoles ? $user->hasAnyRole(['System Administrator']) : true; // Default true to show menu when roles not configured
                $navRoleView = session('nav_role_view');
                $canNavRoleView = $hasRoleMethod && $hasRoles && $user->hasAnyRole(['System Administrator']);
                
                // Always show all menu items for admin users when roles are not configured
                $showAllMenus = !$hasRoleMethod || !$hasRoles || $isAdmin;
            @endphp

            @if($canNavRoleView && $navRoleView)
                @includeIf('admin.nav.' . $navRoleView)
            @else

            {{-- 🟦 MAIN DASHBOARD --}}
            <a href="{{ route('admin.dashboard') }}" 
               class="flex items-center px-4 py-3 text-emerald-100/70 hover:bg-emerald-800 hover:text-white transition-all rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-800 text-white font-bold shadow-lg shadow-emerald-900/40' : '' }}">
                <i class="ph-bold ph-house-line mr-3 text-xl"></i>
                <span class="text-sm">Dashboard Overview</span>
            </a>

            {{-- Tours & Packages --}}
            @if($showAllMenus)
            <div x-data="{ open: window.innerWidth < 1024 || {{ request()->routeIs('admin.tours.*') ? 'true' : 'false' }} }">
                <button @click="open = !open" 
                        class="w-full flex items-center justify-between px-4 py-3 text-emerald-100/70 hover:bg-emerald-800 hover:text-white transition-all rounded-xl {{ request()->routeIs('admin.tours.*') ? 'text-white' : '' }}">
                    <div class="flex items-center">
                        <i class="ph-bold ph-compass mr-3 text-xl"></i>
                        <span class="text-sm">Tours & Packages</span>
                    </div>
                    <i class="ph ph-caret-down text-xs transition-transform" :class="open ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="open" x-collapse class="pl-12 pr-4 py-2 space-y-1">
                    <a href="{{ route('admin.tours.index') }}" class="block text-xs py-2 text-emerald-100/50 hover:text-white transition-colors {{ request()->routeIs('admin.tours.index') ? 'text-emerald-400 font-bold' : '' }}">Safari Packages</a>
                    <a href="{{ route('admin.tours.create') }}" class="block text-xs py-2 text-emerald-100/50 hover:text-white transition-colors {{ request()->routeIs('admin.tours.create') ? 'text-emerald-400 font-bold' : '' }}">Add New Tour</a>
                    <a href="{{ route('admin.tours.itinerary-builder') }}" class="block text-xs py-2 text-emerald-100/50 hover:text-white transition-colors {{ request()->routeIs('admin.tours.itinerary-builder') ? 'text-emerald-400 font-bold' : '' }}">Itinerary Builder</a>
                    <a href="{{ route('admin.tours.availability-pricing') }}" class="block text-xs py-2 text-emerald-100/50 hover:text-white transition-colors {{ request()->routeIs('admin.tours.availability-pricing') ? 'text-emerald-400 font-bold' : '' }}">Availability & Pricing</a>
                    <a href="{{ route('admin.tours.destinations') }}" class="block text-xs py-2 text-emerald-100/50 hover:text-white transition-colors {{ request()->routeIs('admin.tours.destinations') ? 'text-emerald-400 font-bold' : '' }}">Destinations</a>
                </div>
            </div>
            @endif

            {{-- Mountain Trekking --}}
            @if($showAllMenus)
            <div x-data="{ open: window.innerWidth < 1024 || {{ request()->routeIs('admin.mountain.*') ? 'true' : 'false' }} }">
                <button @click="open = !open" 
                        class="w-full flex items-center justify-between px-4 py-3 text-emerald-100/70 hover:bg-emerald-800 hover:text-white transition-all rounded-xl {{ request()->routeIs('admin.mountain.*') ? 'text-white' : '' }}">
                    <div class="flex items-center">
                        <i class="ph-bold ph-mountains mr-3 text-xl"></i>
                        <span class="text-sm">Mountain Trekking</span>
                    </div>
                    <i class="ph ph-caret-down text-xs transition-transform" :class="open ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="open" x-collapse class="pl-12 pr-4 py-2 space-y-1">
                    <a href="{{ route('admin.mountain.kilimanjaro-routes') }}" class="block text-xs py-2 text-emerald-100/50 hover:text-white transition-colors {{ request()->routeIs('admin.mountain.kilimanjaro-routes') ? 'text-emerald-400 font-bold' : '' }}">Kilimanjaro Routes</a>
                    <a href="{{ route('admin.mountain.meru-climbing') }}" class="block text-xs py-2 text-emerald-100/50 hover:text-white transition-colors {{ request()->routeIs('admin.mountain.meru-climbing') ? 'text-emerald-400 font-bold' : '' }}">Meru Climbing</a>
                </div>
            </div>
            @endif

            {{-- Hero Slide Management --}}
            @if($showAllMenus)
            <a href="{{ route('admin.hero-slides.index') }}" 
               class="flex items-center px-4 py-3 text-emerald-100/70 hover:bg-emerald-800 hover:text-white transition-all rounded-xl {{ request()->routeIs('admin.hero-slides.*') ? 'text-white bg-emerald-800' : '' }}">
                <i class="ph-bold ph-images mr-3 text-xl"></i>
                <span class="text-sm">Hero Slides</span>
            </a>
            @endif

            {{-- Things to Do --}}
            @if($showAllMenus)
            <div x-data="{ open: window.innerWidth < 1024 || {{ request()->routeIs('admin.activities.*') ? 'true' : 'false' }} }">
                <button @click="open = !open" 
                        class="w-full flex items-center justify-between px-4 py-3 text-emerald-100/70 hover:bg-emerald-800 hover:text-white transition-all rounded-xl {{ request()->routeIs('admin.activities.*') ? 'text-white' : '' }}">
                    <div class="flex items-center">
                        <i class="ph-bold ph-map-pin mr-3 text-xl"></i>
                        <span class="text-sm">Things to Do</span>
                    </div>
                    <i class="ph ph-caret-down text-xs transition-transform" :class="open ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="open" x-collapse class="pl-12 pr-4 py-2 space-y-1">
                    <a href="{{ route('admin.activities.view-all') }}" class="block text-xs py-2 text-emerald-100/50 hover:text-white transition-colors {{ request()->routeIs('admin.activities.view-all') ? 'text-emerald-400 font-bold' : '' }}">View All Activities</a>
                    <a href="{{ route('admin.activities.management') }}" class="block text-xs py-2 text-emerald-100/50 hover:text-white transition-colors {{ request()->routeIs('admin.activities.management') ? 'text-emerald-400 font-bold' : '' }}">Activities Management</a>
                    <a href="{{ route('admin.activities.cultural-tours') }}" class="block text-xs py-2 text-emerald-100/50 hover:text-white transition-colors {{ request()->routeIs('admin.activities.cultural-tours') ? 'text-emerald-400 font-bold' : '' }}">Cultural Tours</a>
                    <a href="{{ route('admin.activities.beach-activities') }}" class="block text-xs py-2 text-emerald-100/50 hover:text-white transition-colors {{ request()->routeIs('admin.activities.beach-activities') ? 'text-emerald-400 font-bold' : '' }}">Beach Activities</a>
                    <a href="{{ route('admin.activities.wildlife-experiences') }}" class="block text-xs py-2 text-emerald-100/50 hover:text-white transition-colors {{ request()->routeIs('admin.activities.wildlife-experiences') ? 'text-emerald-400 font-bold' : '' }}">Wildlife Experiences</a>
                </div>
            </div>
            @endif

            {{-- Inquiries Management --}}
            @if($showAllMenus)
            <div x-data="{ open: window.innerWidth < 1024 || {{ request()->routeIs('admin.inquiries.*') ? 'true' : 'false' }} }">
                <button @click="open = !open"
                        class="w-full flex items-center justify-between px-4 py-3 text-emerald-100/70 hover:bg-emerald-800 hover:text-white transition-all rounded-xl {{ request()->routeIs('admin.inquiries.*') ? 'text-white' : '' }}">
                    <div class="flex items-center">
                        <i class="ph-bold ph-envelope-simple mr-3 text-xl"></i>
                        <span class="text-sm">Inquiries</span>
                    </div>
                    <i class="ph ph-caret-down text-xs transition-transform" :class="open ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="open" x-collapse class="pl-12 pr-4 py-2 space-y-1">
                    <a href="{{ route('admin.inquiries.index') }}" class="block text-xs py-2 text-emerald-100/50 hover:text-white transition-colors {{ request()->routeIs('admin.inquiries.index') ? 'text-emerald-400 font-bold' : '' }}">All Inquiries</a>
                    <a href="{{ route('admin.inquiries.export') }}" class="block text-xs py-2 text-emerald-100/50 hover:text-white transition-colors {{ request()->routeIs('admin.inquiries.export') ? 'text-emerald-400 font-bold' : '' }}">Export Inquiries</a>
                </div>
            </div>
            @endif

            {{-- Media Management (Cloudinary) --}}
            @if($showAllMenus)
            <div x-data="{ open: window.innerWidth < 1024 || {{ request()->routeIs('admin.cloudinary.*') ? 'true' : 'false' }} }">
                <button @click="open = !open"
                        class="w-full flex items-center justify-between px-4 py-3 text-emerald-100/70 hover:bg-emerald-800 hover:text-white transition-all rounded-xl {{ request()->routeIs('admin.cloudinary.*') ? 'text-white' : '' }}">
                    <div class="flex items-center">
                        <i class="ph-bold ph-cloud-arrow-up mr-3 text-xl"></i>
                        <span class="text-sm">Media Management</span>
                    </div>
                    <i class="ph ph-caret-down text-xs transition-transform" :class="open ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="open" x-collapse class="pl-12 pr-4 py-2 space-y-1">
                    <a href="{{ route('admin.cloudinary.index') }}" class="block text-xs py-2 text-emerald-100/50 hover:text-white transition-colors {{ request()->routeIs('admin.cloudinary.index') ? 'text-emerald-400 font-bold' : '' }}">Media Library</a>
                    <a href="{{ route('admin.cloudinary.upload') }}" class="block text-xs py-2 text-emerald-100/50 hover:text-white transition-colors {{ request()->routeIs('admin.cloudinary.upload') ? 'text-emerald-400 font-bold' : '' }}">Upload Files</a>
                    <a href="{{ route('admin.cloudinary.folders') }}" class="block text-xs py-2 text-emerald-100/50 hover:text-white transition-colors {{ request()->routeIs('admin.cloudinary.folders') ? 'text-emerald-400 font-bold' : '' }}">Manage Folders</a>
                    <a href="{{ route('admin.cloudinary.analytics') }}" class="block text-xs py-2 text-emerald-100/50 hover:text-white transition-colors {{ request()->routeIs('admin.cloudinary.analytics') ? 'text-emerald-400 font-bold' : '' }}">Analytics</a>
                    <a href="{{ route('admin.cloudinary.test') }}" class="block text-xs py-2 text-emerald-100/50 hover:text-white transition-colors {{ request()->routeIs('admin.cloudinary.test') ? 'text-emerald-400 font-bold' : '' }}">API Test</a>
                </div>
            </div>
            @endif


            @endif
        </div>
        
    </aside>

    <!-- Main Content -->
    <main class="flex-grow flex flex-col overflow-hidden">
        <!-- Header -->
        <header class="h-20 bg-white border-b border-slate-100 flex items-center justify-between px-6 flex-shrink-0 z-30">
            <div class="flex items-center gap-4 flex-grow">
                <!-- Mobile Menu Button -->
                <button @click="sidebarOpen = true" class="lg:hidden p-2 text-slate-500 hover:bg-slate-100 rounded-xl transition-colors">
                    <i class="ph-bold ph-list text-2xl"></i>
                </button>

                <div class="relative w-full max-w-md hidden sm:block">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                        <i class="ph ph-magnifying-glass"></i>
                    </span>
                    <input type="text" class="block w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl bg-slate-50 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all duration-300" placeholder="Search data, bookings or customers...">
                </div>
            </div>
            
            <div class="flex items-center gap-2 sm:gap-4">
                <div class="hidden md:flex items-center gap-3 px-4 py-2 bg-emerald-50 text-emerald-700 rounded-xl border border-emerald-100">
                    <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                    <span class="text-[10px] font-black uppercase tracking-widest leading-none">Live System</span>
                </div>

                @php
                    $user = auth()->user();
                    $hasRoleMethod = $user && method_exists($user, 'hasAnyRole') && $user->roles()->exists();
                    $canNavRoleView = $hasRoleMethod && $user->hasAnyRole(['System Administrator']);
                    $navRoleView = session('nav_role_view');
                @endphp

                @if($canNavRoleView)
                    <form action="{{ route('admin.nav-role-view.set') }}" method="POST" class="hidden lg:flex items-center gap-2 px-4 py-2 bg-white border border-slate-200 rounded-xl shadow-sm">
                        @csrf
                        <span class="text-[10px] font-black uppercase tracking-widest text-slate-400">Role View</span>
                        <select name="role" class="text-xs font-bold text-slate-700 bg-transparent focus:outline-none" onchange="this.form.submit()">
                            <option value="super-admin" {{ $navRoleView === 'super-admin' ? 'selected' : '' }}>Super Admin</option>
                            <option value="admin-manager" {{ $navRoleView === 'admin-manager' ? 'selected' : '' }}>Admin / GM</option>
                            <option value="accountant" {{ $navRoleView === 'accountant' ? 'selected' : '' }}>Accountant</option>
                            <option value="marketing" {{ $navRoleView === 'marketing' ? 'selected' : '' }}>Marketing</option>
                            <option value="sales" {{ $navRoleView === 'sales' ? 'selected' : '' }}>Sales</option>
                            <option value="operations" {{ $navRoleView === 'operations' ? 'selected' : '' }}>Operations</option>
                            <option value="driver-guide" {{ $navRoleView === 'driver-guide' ? 'selected' : '' }}>Driver / Guide</option>
                            <option value="external-agent" {{ $navRoleView === 'external-agent' ? 'selected' : '' }}>External Agent</option>
                            <option value="client-portal" {{ $navRoleView === 'client-portal' ? 'selected' : '' }}>Client Portal</option>
                            <option value="branch-manager" {{ $navRoleView === 'branch-manager' ? 'selected' : '' }}>Branch Manager</option>
                            <option value="it-support" {{ $navRoleView === 'it-support' ? 'selected' : '' }}>IT Support</option>
                        </select>
                    </form>

                    @if($navRoleView)
                        <form action="{{ route('admin.nav-role-view.clear') }}" method="POST" class="hidden lg:block">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-white border border-slate-200 text-slate-600 font-bold rounded-xl hover:bg-slate-50 transition-all shadow-sm text-xs">Clear</button>
                        </form>
                    @endif
                @endif

                <div class="h-8 w-px bg-slate-100 mx-2 hidden sm:block"></div>

                <!-- Notifications -->
                <div class="relative group" x-data="{ open: false }">
                    <button @click="open = !open" @click.away="open = false" 
                            class="p-3 text-slate-500 hover:bg-emerald-50 hover:text-emerald-600 rounded-xl relative transition-all duration-300">
                        <i class="ph ph-bell text-2xl transition-transform group-hover:rotate-12"></i>
                        <span class="absolute top-3 right-3 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white shadow-sm"></span>
                    </button>
                    <!-- Notification Dropdown -->
                    <div x-show="open" x-transition class="absolute right-0 mt-4 w-80 bg-white rounded-2xl shadow-2xl border border-slate-100 p-4 z-50">
                        <div class="flex items-center justify-between mb-4 px-2">
                            <h4 class="font-black text-xs uppercase tracking-widest text-slate-900">Notifications</h4>
                            <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">3 New</span>
                        </div>
                        <div class="space-y-2">
                            <div class="p-3 rounded-xl bg-slate-50 hover:bg-emerald-50 transition-colors cursor-pointer border border-transparent hover:border-emerald-100">
                                <p class="text-sm font-bold text-slate-900">New Booking</p>
                                <p class="text-xs text-slate-500">John Doe booked Serengeti Safari</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Profile Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" @click.away="open = false" 
                            class="flex items-center gap-3 p-1.5 pr-4 rounded-xl hover:bg-slate-50 transition-all duration-300 group">
                        @php
                            $u = Auth::user();
                            $avatarUrl = $u && $u->profile_image
                                ? asset('storage/' . ltrim($u->profile_image, '/'))
                                : null;
                        @endphp
                        @if($avatarUrl)
                            <img src="{{ $avatarUrl }}" alt="Avatar" class="w-10 h-10 rounded-lg object-cover shadow-lg shadow-emerald-500/20 group-hover:scale-105 transition-transform" />
                        @else
                            <div class="w-10 h-10 rounded-lg bg-emerald-500 flex items-center justify-center text-white font-black shadow-lg shadow-emerald-500/20 group-hover:scale-105 transition-transform">
                                {{ Auth::user() ? substr(Auth::user()->name, 0, 1) : 'A' }}
                            </div>
                        @endif
                        <div class="text-left hidden sm:block">
                            <p class="text-xs font-black text-slate-900 leading-tight">{{ Auth::user() ? Auth::user()->name : 'Admin User' }}</p>
                            <p class="text-[10px] text-emerald-600 font-bold uppercase tracking-wider leading-tight mt-0.5">Administrator</p>
                        </div>
                        <i class="ph ph-caret-down text-xs text-slate-400 transition-transform hidden sm:block" :class="open ? 'rotate-180' : ''"></i>
                    </button>

                    <!-- User Dropdown Menu -->
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 scale-95 translate-y-2"
                         class="absolute right-0 mt-3 w-64 bg-white rounded-2xl shadow-2xl border border-slate-100 py-4 z-50">
                        
                        <div class="px-6 py-4 border-b border-slate-50 mb-2">
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Signed in as</p>
                            <p class="text-sm font-black text-slate-900 truncate">{{ Auth::user() ? Auth::user()->name : 'Admin User' }}</p>
                        </div>

                        <a href="{{ route('admin.admin.profile') }}" class="flex items-center gap-3 px-6 py-3 text-sm font-bold text-slate-600 hover:bg-slate-50 hover:text-emerald-600 transition-all">
                            <i class="ph ph-user-circle text-xl"></i>
                            View Profile
                        </a>
                        <a href="{{ route('admin.admin.settings.account') }}" class="flex items-center gap-3 px-6 py-3 text-sm font-bold text-slate-600 hover:bg-slate-50 hover:text-emerald-600 transition-all">
                            <i class="ph ph-sliders text-xl"></i>
                            Account Settings
                        </a>
                        
                        <div class="px-6 py-3 border-t border-slate-50 mt-2">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-3 text-sm font-bold text-red-500 hover:text-red-700 transition-colors">
                                    <i class="ph-bold ph-sign-out text-lg"></i>
                                    Logout System
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <div class="flex-grow overflow-y-auto p-4 lg:p-10 bg-slate-50/50">
            @yield('content')
        </div>
    </main>

    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.05); border-radius: 10px; }
        .custom-scrollbar:hover::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); }
    </style>
    @stack('scripts')
</body>
</html>
