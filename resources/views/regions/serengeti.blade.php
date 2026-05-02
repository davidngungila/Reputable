@extends('layouts.public')

@section('content')
@php
    // Hardcoded seeder images for Serengeti NP
    $serengetiImages = [
        'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468786/Wildbeest_Migration_vnkbqc.jpg',
        'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468785/wildlife-3128802_1920_skrfdw.jpg',
        'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468785/wildlife-3146790_1920_xstzi1.jpg',
        'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468785/wildmovement_enpccp.jpg',
        'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468785/wildebeests-7811819_1920_yihcmq.jpg',
        'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468785/Wildbeest_Migration_vnkbqc.jpg',
        'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468784/wildebeest-migration-2322111_1920_zvehye.jpg',
        'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468784/wildebeests-7559592_1920_ow1vds.jpg'
    ];
@endphp
<!-- Enhanced Hero Section -->
<section class="relative pt-48 pb-32 overflow-hidden bg-slate-900">
    <div class="absolute inset-0 z-0">
        <img src="{{ $serengetiImages[0] ?? 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468786/Wildbeest_Migration_vnkbqc.jpg' }}" alt="Serengeti National Park" class="w-full h-full object-cover blur-sm opacity-40">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900 to-slate-900"></div>
    </div>
    <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
        <span class="inline-block px-4 py-1.5 bg-emerald-600/20 text-emerald-400 rounded-full text-xs font-bold tracking-widest uppercase mb-6 border border-emerald-600/30">UNESCO World Heritage Site</span>
        <h1 class="text-5xl md:text-7xl font-serif text-white mb-8 font-bold">The Great Migration <br> <span class="text-emerald-500">Nature's Greatest Journey</span></h1>
        <p class="text-xl text-slate-300 max-w-3xl mx-auto leading-relaxed mb-8">Witness over 1.5 million wildebeest, zebras, and gazelles traverse the endless plains in Earth's most spectacular wildlife migration.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#migration-calendar" class="inline-flex items-center gap-2 px-8 py-4 bg-emerald-600 text-white rounded-full font-bold hover:bg-emerald-700 transition-all">
                <i class="ph-bold ph-calendar"></i> Migration Calendar
            </a>
            <a href="#wildlife" class="inline-flex items-center gap-2 px-8 py-4 bg-white/10 text-white rounded-full font-bold border border-white/20 hover:bg-white/20 transition-all">
                <i class="ph-bold ph-binoculars"></i> Wildlife Guide
            </a>
        </div>
    </div>
</section>

<!-- Quick Stats Section -->
<section class="py-16 bg-gradient-to-br from-emerald-50 to-blue-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl font-black text-emerald-600 mb-2">14,763</div>
                <p class="text-slate-700 font-medium">Square Kilometers</p>
            </div>
            <div class="text-center">
                <div class="text-4xl font-black text-blue-600 mb-2">1.5M+</div>
                <p class="text-slate-700 font-medium">Wildebeest Migration</p>
            </div>
            <div class="text-center">
                <div class="text-4xl font-black text-orange-600 mb-2">500+</div>
                <p class="text-slate-700 font-medium">Bird Species</p>
            </div>
            <div class="text-center">
                <div class="text-4xl font-black text-purple-600 mb-2">Big Five</div>
                <p class="text-slate-700 font-medium">All Present</p>
            </div>
        </div>
    </div>
</section>

<!-- Migration Calendar Section -->
<section id="migration-calendar" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-emerald-600 font-black text-xs uppercase tracking-[0.4em] mb-4 inline-block">Migration Patterns</span>
            <h2 class="text-4xl md:text-5xl font-serif text-slate-900 font-bold mb-6">The Great Migration Journey</h2>
            <p class="text-slate-600 max-w-3xl mx-auto text-xl leading-relaxed">Follow the annual migration cycle as millions of animals move across the Serengeti ecosystem in search of fresh grazing and water.</p>
        </div>
        
        <div class="relative">
            <!-- Migration Timeline -->
            <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-gradient-to-b from-emerald-200 via-emerald-400 to-emerald-200"></div>
            
            <!-- Migration Months -->
            <div class="space-y-12">
                <!-- December - March -->
                <div class="relative flex items-center">
                    <div class="flex-1 text-right pr-8">
                        <div class="bg-gradient-to-r from-emerald-50 to-emerald-100 p-6 rounded-2xl border border-emerald-200">
                            <h3 class="text-xl font-bold text-emerald-800 mb-2">December - March</h3>
                            <h4 class="text-lg font-semibold text-slate-700 mb-3">Southern Serengeti - Calving Season</h4>
                            <p class="text-slate-600 mb-4">The herds gather in the southern plains for the calving season. Over 8,000 calves are born daily during February, attracting predators and offering incredible wildlife action.</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-emerald-600 text-white rounded-full text-xs font-medium">Calving Season</span>
                                <span class="px-3 py-1 bg-orange-600 text-white rounded-full text-xs font-medium">Predator Action</span>
                                <span class="px-3 py-1 bg-blue-600 text-white rounded-full text-xs font-medium">Ndutu Region</span>
                            </div>
                        </div>
                    </div>
                    <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-emerald-600 rounded-full border-4 border-white shadow-lg"></div>
                    <div class="flex-1 pl-8">
                        <div class="text-slate-500 text-sm font-medium">Short Rains</div>
                    </div>
                </div>
                
                <!-- April - May -->
                <div class="relative flex items-center">
                    <div class="flex-1 text-right pr-8">
                        <div class="text-slate-500 text-sm font-medium">Long Rains</div>
                    </div>
                    <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-emerald-600 rounded-full border-4 border-white shadow-lg"></div>
                    <div class="flex-1 pl-8">
                        <div class="bg-gradient-to-l from-blue-50 to-blue-100 p-6 rounded-2xl border border-blue-200">
                            <h3 class="text-xl font-bold text-blue-800 mb-2">April - May</h3>
                            <h4 class="text-lg font-semibold text-slate-700 mb-3">Central Serengeti - Migration North</h4>
                            <p class="text-slate-600 mb-4">As the rains begin, the herds start moving northward through the central Serengeti. This is a quieter season with fewer tourists, offering intimate wildlife experiences.</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-blue-600 text-white rounded-full text-xs font-medium">Rainy Season</span>
                                <span class="px-3 py-1 bg-green-600 text-white rounded-full text-xs font-medium">Fewer Crowds</span>
                                <span class="px-3 py-1 bg-purple-600 text-white rounded-full text-xs font-medium">Central Plains</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- June - July -->
                <div class="relative flex items-center">
                    <div class="flex-1 text-right pr-8">
                        <div class="bg-gradient-to-r from-orange-50 to-orange-100 p-6 rounded-2xl border border-orange-200">
                            <h3 class="text-xl font-bold text-orange-800 mb-2">June - July</h3>
                            <h4 class="text-lg font-semibold text-slate-700 mb-3">Western Corridor - River Crossings Begin</h4>
                            <p class="text-slate-600 mb-4">The migration reaches the Grumeti River where dramatic river crossings occur. This is peak season with incredible action as herds brave crocodile-infested waters.</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-orange-600 text-white rounded-full text-xs font-medium">River Crossings</span>
                                <span class="px-3 py-1 bg-red-600 text-white rounded-full text-xs font-medium">Peak Season</span>
                                <span class="px-3 py-1 bg-yellow-600 text-white rounded-full text-xs font-medium">Grumeti River</span>
                            </div>
                        </div>
                    </div>
                    <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-emerald-600 rounded-full border-4 border-white shadow-lg"></div>
                    <div class="flex-1 pl-8">
                        <div class="text-slate-500 text-sm font-medium">Dry Season</div>
                    </div>
                </div>
                
                <!-- August - September -->
                <div class="relative flex items-center">
                    <div class="flex-1 text-right pr-8">
                        <div class="text-slate-500 text-sm font-medium">Peak Dry Season</div>
                    </div>
                    <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-emerald-600 rounded-full border-4 border-white shadow-lg"></div>
                    <div class="flex-1 pl-8">
                        <div class="bg-gradient-to-l from-purple-50 to-purple-100 p-6 rounded-2xl border border-purple-200">
                            <h3 class="text-xl font-bold text-purple-800 mb-2">August - September</h3>
                            <h4 class="text-lg font-semibold text-slate-700 mb-3">Northern Serengeti - Mara River Crossings</h4>
                            <p class="text-slate-600 mb-4">The most dramatic river crossings occur at the Mara River. Thousands of wildebeest plunge into the waters, facing massive crocodiles in nature's most spectacular display.</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-purple-600 text-white rounded-full text-xs font-medium">Mara River</span>
                                <span class="px-3 py-1 bg-red-600 text-white rounded-full text-xs font-medium">Drama Peak</span>
                                <span class="px-3 py-1 bg-indigo-600 text-white rounded-full text-xs font-medium">Kogatende</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- October - November -->
                <div class="relative flex items-center">
                    <div class="flex-1 text-right pr-8">
                        <div class="bg-gradient-to-r from-green-50 to-green-100 p-6 rounded-2xl border border-green-200">
                            <h3 class="text-xl font-bold text-green-800 mb-2">October - November</h3>
                            <h4 class="text-lg font-semibold text-slate-700 mb-3">Return Journey - Southward</h4>
                            <p class="text-slate-600 mb-4">The herds begin their journey back south through the eastern and central Serengeti, following the short rains to reach the southern calving grounds once again.</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-green-600 text-white rounded-full text-xs font-medium">Return Migration</span>
                                <span class="px-3 py-1 bg-teal-600 text-white rounded-full text-xs font-medium">Short Rains</span>
                                <span class="px-3 py-1 bg-cyan-600 text-white rounded-full text-xs font-medium">Lobo Area</span>
                            </div>
                        </div>
                    </div>
                    <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-emerald-600 rounded-full border-4 border-white shadow-lg"></div>
                    <div class="flex-1 pl-8">
                        <div class="text-slate-500 text-sm font-medium">Transition Period</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Wildlife Guide Section -->
<section id="wildlife" class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-emerald-600 font-black text-xs uppercase tracking-[0.4em] mb-4 inline-block">Wildlife Encounters</span>
            <h2 class="text-4xl md:text-5xl font-serif text-slate-900 font-bold mb-6">Serengeti's Magnificent Wildlife</h2>
            <p class="text-slate-600 max-w-3xl mx-auto text-xl leading-relaxed">Home to Africa's most iconic wildlife, the Serengeti offers unparalleled opportunities to witness the Big Five and countless other species in their natural habitat.</p>
        </div>
        
        <!-- Big Five Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-16">
            <div class="bg-white rounded-2xl p-6 text-center border border-slate-200 hover:shadow-lg transition-all">
                <div class="text-4xl mb-3">🦁</div>
                <h3 class="font-bold text-slate-900 mb-2">Lions</h3>
                <p class="text-slate-600 text-sm">Over 3,000 lions roam the plains, including the famous Serengeti lion prides</p>
            </div>
            <div class="bg-white rounded-2xl p-6 text-center border border-slate-200 hover:shadow-lg transition-all">
                <div class="text-4xl mb-3">🐘</div>
                <h3 class="font-bold text-slate-900 mb-2">Elephants</h3>
                <p class="text-slate-600 text-sm">Large herds of elephants migrate through the park, especially during dry seasons</p>
            </div>
            <div class="bg-white rounded-2xl p-6 text-center border border-slate-200 hover:shadow-lg transition-all">
                <div class="text-4xl mb-3">🦏</div>
                <h3 class="font-bold text-slate-900 mb-2">Rhinos</h3>
                <p class="text-slate-600 text-sm">Rare black rhinos in protected areas, a conservation success story</p>
            </div>
            <div class="bg-white rounded-2xl p-6 text-center border border-slate-200 hover:shadow-lg transition-all">
                <div class="text-4xl mb-3">🐆</div>
                <h3 class="font-bold text-slate-900 mb-2">Leopards</h3>
                <p class="text-slate-600 text-sm">Elusive leopards often spotted in trees along the Seronera River</p>
            </div>
            <div class="bg-white rounded-2xl p-6 text-center border border-slate-200 hover:shadow-lg transition-all">
                <div class="text-4xl mb-3">🐃</div>
                <h3 class="font-bold text-slate-900 mb-2">Buffalo</h3>
                <p class="text-slate-600 text-sm">Massive buffalo herds, often seen wallowing in mud during hot days</p>
            </div>
        </div>
        
        <!-- Other Wildlife -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 p-8 rounded-3xl border border-emerald-200">
                <h3 class="text-2xl font-bold text-emerald-800 mb-4 flex items-center gap-2">
                    <i class="ph-bold ph-horse"></i> Grazing Herds
                </h3>
                <ul class="space-y-3 text-emerald-700">
                    <li class="flex items-center gap-2">
                        <span class="w-2 h-2 bg-emerald-600 rounded-full"></span>
                        1.5+ Million Wildebeest
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-2 h-2 bg-emerald-600 rounded-full"></span>
                        250,000 Zebras
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-2 h-2 bg-emerald-600 rounded-full"></span>
                        500,000 Gazelles
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-2 h-2 bg-emerald-600 rounded-full"></span>
                        Elands, Topis, Impalas
                    </li>
                </ul>
            </div>
            
            <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-8 rounded-3xl border border-orange-200">
                <h3 class="text-2xl font-bold text-orange-800 mb-4 flex items-center gap-2">
                    <i class="ph-bold ph-crown"></i> Predators
                </h3>
                <ul class="space-y-3 text-orange-700">
                    <li class="flex items-center gap-2">
                        <span class="w-2 h-2 bg-orange-600 rounded-full"></span>
                        Cheetahs - Fastest Land Animals
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-2 h-2 bg-orange-600 rounded-full"></span>
                        Hyenas - Skilled Hunters
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-2 h-2 bg-orange-600 rounded-full"></span>
                        Jackals - Cunning Scavengers
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-2 h-2 bg-orange-600 rounded-full"></span>
                        Wild Dogs - Rare Pack Hunters
                    </li>
                </ul>
            </div>
            
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-3xl border border-blue-200">
                <h3 class="text-2xl font-bold text-blue-800 mb-4 flex items-center gap-2">
                    <i class="ph-bold ph-bird"></i> Birdlife
                </h3>
                <ul class="space-y-3 text-blue-700">
                    <li class="flex items-center gap-2">
                        <span class="w-2 h-2 bg-blue-600 rounded-full"></span>
                        500+ Bird Species
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-2 h-2 bg-blue-600 rounded-full"></span>
                        Ostriches - World's Largest Birds
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-2 h-2 bg-blue-600 rounded-full"></span>
                        Secretary Birds - Snake Hunters
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-2 h-2 bg-blue-600 rounded-full"></span>
                        Flamingos & Waterbirds
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Main Content Section -->
<section class="py-32 bg-white">
    @php
        $gallery = [
            'https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=1600&q=80',
            'https://images.unsplash.com/photo-1547471080-7cc2caa01a7e?auto=format&fit=crop&w=1600&q=80',
            'https://images.unsplash.com/photo-1517849845537-4d257902454a?auto=format&fit=crop&w=1600&q=80',
            'https://images.unsplash.com/photo-1516632664305-eda5d8b9b525?auto=format&fit=crop&w=1600&q=80',
        ];
    @endphp
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
            <div class="lg:col-span-7">
                <h2 class="text-4xl md:text-5xl font-serif text-slate-900 font-bold mb-8 italic">Home of The Great Migration</h2>
                <div class="prose prose-lg max-w-none text-slate-600">
                    <p class="text-xl leading-relaxed">Serengeti National Park is one of the most famous wildlife destinations in the world. It is best known for the Great Wildebeest Migration, where over 1.5 million wildebeest and thousands of zebras move across the plains in search of fresh grazing.</p>
                    <p class="text-xl leading-relaxed">The park offers classic African safari landscapes — endless golden plains, dramatic sunsets, and exceptional wildlife viewing including lions, cheetahs, elephants, leopards, and buffalo.</p>
                    <p class="text-xl leading-relaxed">It is ideal for travelers seeking a true "National Geographic" safari experience.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-14">
                    <div class="bg-emerald-50 p-8 rounded-3xl border border-emerald-100">
                        <h4 class="text-emerald-700 font-bold mb-4 flex items-center gap-2 italic"><i class="ph ph-binoculars text-2xl"></i> Signature wildlife</h4>
                        <ul class="space-y-3 text-emerald-800 font-medium">
                            <li>Lions, cheetahs, leopards</li>
                            <li>Elephants & buffalo</li>
                            <li>Massive wildebeest & zebra herds</li>
                        </ul>
                    </div>
                    <div class="bg-slate-50 p-8 rounded-3xl border border-slate-100">
                        <h4 class="text-slate-800 font-bold mb-4 flex items-center gap-2 italic"><i class="ph ph-map-trifold text-2xl"></i> Best for</h4>
                        <ul class="space-y-3 text-slate-600 font-medium">
                            <li>First-time safari travelers</li>
                            <li>Great Migration seekers</li>
                            <li>Photography-focused trips</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-5">
                @include('regions.partials.gallery-slider', ['gallery' => $gallery, 'title' => 'Serengeti Gallery', 'eyebrow' => 'View more images'])
                <div class="h-10"></div>
                <div class="bg-slate-950 text-white rounded-[3.5rem] overflow-hidden p-12 relative">
                    <div class="absolute inset-0 opacity-30">
                        <img src="https://images.unsplash.com/photo-1547471080-7cc2caa01a7e?auto=format&fit=crop&w=1200&q=80" alt="Serengeti" class="w-full h-full object-cover">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
                    <div class="relative z-10">
                        <span class="text-emerald-500 font-black text-xs uppercase tracking-[0.4em] mb-6 block">Plan your safari</span>
                        <h3 class="text-3xl font-serif font-bold mb-6 italic">Explore Serengeti packages</h3>
                        <p class="text-slate-300 mb-10 leading-relaxed font-medium">Browse safari itineraries that include Serengeti National Park and match your ideal budget, comfort level, and travel season.</p>
                        <a href="{{ route('tours.index', ['destination' => 'Serengeti']) }}" class="inline-flex items-center gap-3 px-10 py-4 bg-emerald-600 rounded-full font-bold shadow-xl shadow-emerald-600/30 hover:bg-emerald-700 transition-all">View Tours <i class="ph-bold ph-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-24 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-slate-50 p-10 rounded-[2.5rem] border border-slate-100">
                <h4 class="text-slate-900 font-black mb-3 flex items-center gap-2 italic"><i class="ph ph-calendar-check text-2xl"></i> Best time to visit</h4>
                <p class="text-slate-600 font-medium leading-relaxed">June–October for dry-season game drives and river crossings. December–March is great for calving and predator action.</p>
            </div>
            <div class="bg-emerald-50 p-10 rounded-[2.5rem] border border-emerald-100">
                <h4 class="text-emerald-900 font-black mb-3 flex items-center gap-2 italic"><i class="ph ph-jeep text-2xl"></i> Top activities</h4>
                <p class="text-emerald-900/80 font-medium leading-relaxed">Game drives, hot-air balloon safari, sunrise photography sessions, and private bush picnics with your guide.</p>
            </div>
            <div class="bg-slate-900 p-10 rounded-[2.5rem] border border-slate-800 text-white">
                <h4 class="text-white font-black mb-3 flex items-center gap-2 italic"><i class="ph ph-airplane-tilt text-2xl"></i> Getting there</h4>
                <p class="text-slate-300 font-medium leading-relaxed">Fly to Seronera or Kogatende airstrips, or drive via the Northern Circuit from Arusha with stops at Ngorongoro & Lake Manyara.</p>
            </div>
        </div>
    </div>
</section>

<!-- Accommodation Section -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-emerald-600 font-black text-xs uppercase tracking-[0.4em] mb-4 inline-block">Where to Stay</span>
            <h2 class="text-4xl md:text-5xl font-serif text-slate-900 font-bold mb-6">Serengeti Accommodation</h2>
            <p class="text-slate-600 max-w-3xl mx-auto text-xl leading-relaxed">From luxury lodges to mobile tented camps, find the perfect base for your Serengeti safari adventure.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-xl transition-all">
                <div class="h-48 bg-gradient-to-br from-emerald-100 to-emerald-200 flex items-center justify-center">
                    <i class="ph ph-crown text-4xl text-emerald-600"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Luxury Lodges</h3>
                    <p class="text-slate-600 mb-4">Premium accommodations with spa facilities, gourmet dining, and panoramic views of the plains.</p>
                    <ul class="space-y-2 text-slate-600 text-sm mb-4">
                        <li>• Four Seasons Serengeti</li>
                        <li>• Singita Sasakwa Lodge</li>
                        <li>• &Beyond Grumeti</li>
                    </ul>
                    <div class="text-emerald-600 font-bold">$500-1500/night</div>
                </div>
            </div>
            
            <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-xl transition-all">
                <div class="h-48 bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                    <i class="ph ph-tent text-4xl text-blue-600"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Tented Camps</h3>
                    <p class="text-slate-600 mb-4">Authentic safari experience with comfortable tented accommodations close to wildlife action.</p>
                    <ul class="space-y-2 text-slate-600 text-sm mb-4">
                        <li>• Serengeti Serena Lodge</li>
                        <li>• Moyo Camp</li>
                        <li>• Kub Kub Lodge</li>
                    </ul>
                    <div class="text-blue-600 font-bold">$200-500/night</div>
                </div>
            </div>
            
            <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-xl transition-all">
                <div class="h-48 bg-gradient-to-br from-orange-100 to-orange-200 flex items-center justify-center">
                    <i class="ph ph-campfire text-4xl text-orange-600"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Mobile Camps</h3>
                    <p class="text-slate-600 mb-4">Follow the migration with seasonal mobile camps that move to the best wildlife locations.</p>
                    <ul class="space-y-2 text-slate-600 text-sm mb-4">
                        <li>• Nomad Serengeti Camp</li>
                        <li>• &Beyond Serengeti Under Canvas</li>
                        <li>• Alex Walker's Serian</li>
                    </ul>
                    <div class="text-orange-600 font-bold">$300-800/night</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Activities Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-emerald-600 font-black text-xs uppercase tracking-[0.4em] mb-4 inline-block">Safari Experiences</span>
            <h2 class="text-4xl md:text-5xl font-serif text-slate-900 font-bold mb-6">Unforgettable Activities</h2>
            <p class="text-slate-600 max-w-3xl mx-auto text-xl leading-relaxed">From sunrise game drives to sunset balloon safaris, experience the Serengeti in every way possible.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-6 rounded-2xl border border-orange-200 text-center">
                <div class="text-3xl mb-3">🌅</div>
                <h3 class="font-bold text-orange-800 mb-2">Sunrise Game Drives</h3>
                <p class="text-orange-700 text-sm">Early morning drives when predators are most active</p>
            </div>
            
            <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-6 rounded-2xl border border-purple-200 text-center">
                <div class="text-3xl mb-3">🎈</div>
                <h3 class="font-bold text-purple-800 mb-2">Balloon Safaris</h3>
                <p class="text-purple-700 text-sm">Aerial views of the migration and plains at dawn</p>
            </div>
            
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-2xl border border-blue-200 text-center">
                <div class="text-3xl mb-3">📸</div>
                <h3 class="font-bold text-blue-800 mb-2">Photography Tours</h3>
                <p class="text-blue-700 text-sm">Specialized tours for wildlife photography enthusiasts</p>
            </div>
            
            <div class="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-2xl border border-green-200 text-center">
                <div class="text-3xl mb-3">🍽️</div>
                <h3 class="font-bold text-green-800 mb-2">Bush Dinners</h3>
                <p class="text-green-700 text-sm">Romantic dinners under the African stars</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-br from-emerald-600 to-blue-600">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-4xl md:text-5xl font-serif text-white font-bold mb-6">Ready for Your Serengeti Adventure?</h2>
        <p class="text-emerald-100 text-xl max-w-3xl mx-auto mb-12">Let our expert guides help you witness the Great Migration and create memories that will last a lifetime.</p>
        
        <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
            <a href="{{ route('tours.index', ['destination' => 'Serengeti']) }}" class="group px-12 py-5 bg-white text-emerald-600 font-bold rounded-full shadow-2xl hover:scale-105 transition-all flex items-center gap-3">
                <i class="ph-bold ph-suitcase-rolling text-xl"></i>
                Browse Serengeti Tours
                <i class="ph-bold ph-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </a>
            <a href="/contact" class="group px-12 py-5 bg-emerald-700 text-white font-bold rounded-full border-2 border-emerald-400 hover:bg-emerald-800 transition-all flex items-center gap-3">
                <i class="ph-bold ph-chat-circle-dots text-xl"></i>
                Talk to Safari Expert
                <i class="ph-bold ph-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </div>
</section>
@endsection
