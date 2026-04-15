@extends('layouts.public')

@section('content')
<!-- Tours Hero Section -->
<section class="relative h-96 overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('images/01.jpg') }}" alt="Tanzania Safaris" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/40 to-transparent"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-6 w-full h-full flex items-center">
        <div class="text-center text-white">
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-serif text-white mb-8 leading-[1.1] md:whitespace-nowrap">Discover Tanzania's</h1>
            <span class="text-[#E67A2E]">Safari Adventures</span>
        </h1>
            <p class="text-xl text-slate-200 mb-12 leading-relaxed max-w-3xl mx-auto">From the Serengeti plains to Mount Kilimanjaro, experience Tanzania's most spectacular wildlife and landscapes with Reputable Tours.</p>
            <div class="flex flex-col sm:flex-row items-center gap-4 mt-8">
                <a href="#" class="w-full sm:w-auto px-10 py-4 bg-[#1F5A3A] text-white font-bold rounded-full hover:bg-[#2E7A5A] shadow-xl shadow-[#1F5A3A]/30 transition-all text-center">
                    <i class="ph-bold ph-compass text-xl mr-2"></i>
                    Browse All Tours
                </a>
                <a href="#" class="w-full sm:w-auto px-10 py-4 bg-white/10 text-white font-bold rounded-full border border-white/20 hover:bg-white/20 transition-all text-center backdrop-blur-md flex items-center justify-center gap-2 group">
                    <i class="ph-fill ph-play-circle text-2xl group-hover:scale-110 transition-transform"></i>
                    Watch Film
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Tours Grid Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-serif font-bold text-gray-800 mb-4">Kilimanjaro Climbing Packages</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Conquer the Roof of Africa with our expert-guided Kilimanjaro trekking packages</p>
        </div>
        
        <!-- Kilimanjaro Packages Data -->
        @php
            $tours = [
                // Marangu Route Packages
                (object) [
                    'id' => 1,
                    'name' => '5 Day Kilimanjaro Marangu Trek',
                    'location' => 'Mount Kilimanjaro - Marangu Route',
                    'duration_days' => 5,
                    'base_price' => 1850,
                    'description' => 'Classic route with mountain huts, perfect for first-time climbers. Includes all park fees, experienced guides, and comfortable hut accommodation.',
                    'images' => ['images/03.jpg', 'images/DSC_2338-(1).jpg'],
                    'route' => 'Marangu',
                    'difficulty' => 'Moderate'
                ],
                (object) [
                    'id' => 2,
                    'name' => '6 Day Kilimanjaro Marangu Trek',
                    'location' => 'Mount Kilimanjaro - Marangu Route',
                    'duration_days' => 6,
                    'base_price' => 1950,
                    'description' => 'Extended acclimatization day for better summit success. Includes Mawenzi ridge acclimatization hike.',
                    'images' => ['images/03.jpg', 'images/DSC_2338-(1).jpg'],
                    'route' => 'Marangu',
                    'difficulty' => 'Moderate'
                ],
                (object) [
                    'id' => 3,
                    'name' => '7 Day Kilimanjaro Marangu Trek',
                    'location' => 'Mount Kilimanjaro - Marangu Route',
                    'duration_days' => 7,
                    'base_price' => 2100,
                    'description' => 'Maximum acclimatization with Zebra Rocks and Mawenzi Ridge hikes. Highest success rate on Marangu route.',
                    'images' => ['images/03.jpg', 'images/DSC_2338-(1).jpg'],
                    'route' => 'Marangu',
                    'difficulty' => 'Moderate'
                ],
                // Machame Route Packages
                (object) [
                    'id' => 4,
                    'name' => '6 Day Kilimanjaro Machame Trek',
                    'location' => 'Mount Kilimanjaro - Machame Route',
                    'duration_days' => 6,
                    'base_price' => 2200,
                    'description' => 'Scenic southern route with diverse landscapes. Cross Barranco Wall and summit via Stella Point.',
                    'images' => ['images/05.jpg', 'images/07.jpg'],
                    'route' => 'Machame',
                    'difficulty' => 'Challenging'
                ],
                (object) [
                    'id' => 5,
                    'name' => '7 Day Kilimanjaro Machame Trek',
                    'location' => 'Mount Kilimanjaro - Machame Route',
                    'duration_days' => 7,
                    'base_price' => 2350,
                    'description' => 'Extended acclimatization with Karanga Camp. Better summit success and more comfortable pace.',
                    'images' => ['images/05.jpg', 'images/07.jpg'],
                    'route' => 'Machame',
                    'difficulty' => 'Challenging'
                ],
                (object) [
                    'id' => 6,
                    'name' => '8 Day Kilimanjaro Machame Trek',
                    'location' => 'Mount Kilimanjaro - Machame Route',
                    'duration_days' => 8,
                    'base_price' => 2500,
                    'description' => 'Maximum acclimatization with Northern Circuit detour. Best for scenic views and summit success.',
                    'images' => ['images/05.jpg', 'images/07.jpg'],
                    'route' => 'Machame',
                    'difficulty' => 'Challenging'
                ],
                // Lemosho Route Packages
                (object) [
                    'id' => 7,
                    'name' => '8 Day Kilimanjaro Lemosho Trek',
                    'location' => 'Mount Kilimanjaro - Lemosho Route',
                    'duration_days' => 8,
                    'base_price' => 2600,
                    'description' => 'Remote western approach with excellent acclimatization. Beautiful Shira Plateau and diverse ecosystems.',
                    'images' => ['images/01.jpg', 'images/02.jpg'],
                    'route' => 'Lemosho',
                    'difficulty' => 'Challenging'
                ],
                (object) [
                    'id' => 8,
                    'name' => '9 Day Kilimanjaro Lemosho Trek',
                    'location' => 'Mount Kilimanjaro - Lemosho Route',
                    'duration_days' => 9,
                    'base_price' => 2750,
                    'description' => 'Ultimate acclimatization with Northern Circuit. Most scenic route with highest success rate.',
                    'images' => ['images/01.jpg', 'images/02.jpg'],
                    'route' => 'Lemosho',
                    'difficulty' => 'Challenging'
                ],
                // Northern Circuit Route
                (object) [
                    'id' => 9,
                    'name' => '8 Day Kilimanjaro Northern Circuit Trek',
                    'location' => 'Mount Kilimanjaro - Northern Circuit',
                    'duration_days' => 8,
                    'base_price' => 2800,
                    'description' => 'Complete circumnavigation of Kibo. Remote wilderness with unique northern perspectives.',
                    'images' => ['images/06.jpg', 'images/03.jpg'],
                    'route' => 'Northern Circuit',
                    'difficulty' => 'Very Challenging'
                ],
                (object) [
                    'id' => 10,
                    'name' => '9 Day Kilimanjaro Northern Circuit Trek',
                    'location' => 'Mount Kilimanjaro - Northern Circuit',
                    'duration_days' => 9,
                    'base_price' => 2950,
                    'description' => 'Extended Northern Circuit with Mawenzi Tarn. Ultimate Kilimanjaro wilderness experience.',
                    'images' => ['images/06.jpg', 'images/03.jpg'],
                    'route' => 'Northern Circuit',
                    'difficulty' => 'Very Challenging'
                ],
                (object) [
                    'id' => 11,
                    'name' => '11 Day Kilimanjaro Northern Circuit Trek',
                    'location' => 'Mount Kilimanjaro - Northern Circuit',
                    'duration_days' => 11,
                    'base_price' => 3200,
                    'description' => 'Complete Northern Circuit with Mawenzi Tarn acclimatization. Maximum summit success and wilderness experience.',
                    'images' => ['images/06.jpg', 'images/03.jpg'],
                    'route' => 'Northern Circuit',
                    'difficulty' => 'Very Challenging'
                ],
                // Umbwe Route
                (object) [
                    'id' => 12,
                    'name' => '6 Day Kilimanjaro Umbwe Trek',
                    'location' => 'Mount Kilimanjaro - Umbwe Route',
                    'duration_days' => 6,
                    'base_price' => 2400,
                    'description' => 'Steep and direct route for experienced climbers. Most challenging and least crowded path to summit.',
                    'images' => ['images/05.jpg', 'images/07.jpg'],
                    'route' => 'Umbwe',
                    'difficulty' => 'Very Challenging'
                ],
                (object) [
                    'id' => 13,
                    'name' => '7 Day Kilimanjaro Umbwe Trek',
                    'location' => 'Mount Kilimanjaro - Umbwe Route',
                    'duration_days' => 7,
                    'base_price' => 2550,
                    'description' => 'Extended Umbwe route with better acclimatization. Combines challenge with higher summit success.',
                    'images' => ['images/05.jpg', 'images/07.jpg'],
                    'route' => 'Umbwe',
                    'difficulty' => 'Very Challenging'
                ],
                // Rongai Route
                (object) [
                    'id' => 14,
                    'name' => '6 Day Kilimanjaro Rongai Trek',
                    'location' => 'Mount Kilimanjaro - Rongai Route',
                    'duration_days' => 6,
                    'base_price' => 2300,
                    'description' => 'Northern approach with dry climate. Less crowded with unique Kenyan views.',
                    'images' => ['images/01.jpg', 'images/02.jpg'],
                    'route' => 'Rongai',
                    'difficulty' => 'Moderate'
                ],
                (object) [
                    'id' => 15,
                    'name' => '7 Day Kilimanjaro Rongai Trek',
                    'location' => 'Mount Kilimanjaro - Rongai Route',
                    'duration_days' => 7,
                    'base_price' => 2450,
                    'description' => 'Extended Rongai route with acclimatization day. Better summit success on northern approach.',
                    'images' => ['images/01.jpg', 'images/02.jpg'],
                    'route' => 'Rongai',
                    'difficulty' => 'Moderate'
                ],
                // Safari Packages
                (object) [
                    'id' => 16,
                    'name' => 'Classic Serengeti Safari',
                    'location' => 'Serengeti National Park',
                    'duration_days' => 7,
                    'base_price' => 2500,
                    'description' => 'Experience the Great Migration and witness millions of wildebeest crossing the plains.',
                    'images' => ['images/01.jpg', 'images/02.jpg'],
                    'route' => 'Safari',
                    'difficulty' => 'Easy'
                ],
                (object) [
                    'id' => 17,
                    'name' => 'Luxury Camping Safari',
                    'location' => 'Ngorongoro Crater',
                    'duration_days' => 5,
                    'base_price' => 3200,
                    'description' => 'Premium camping under the stars with comfort and style.',
                    'images' => ['images/05.jpg', 'images/07.jpg'],
                    'route' => 'Safari',
                    'difficulty' => 'Easy'
                ],
                (object) [
                    'id' => 18,
                    'name' => 'Zanzibar Beach Experience',
                    'location' => 'Zanzibar',
                    'duration_days' => 4,
                    'base_price' => 1800,
                    'description' => 'Relax on pristine beaches and explore historic Stone Town.',
                    'images' => ['images/07.jpg', 'images/02.jpg'],
                    'route' => 'Beach',
                    'difficulty' => 'Easy'
                ]
            ];
        @endphp
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($tours as $tour)
                <div class="group bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-100">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset($tour->images[0]) }}" alt="{{ $tour->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-md p-2 rounded-full text-emerald-500 shadow-sm">
                            <i class="ph-bold ph-heart text-xl"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-emerald-600 transition-colors line-clamp-1">{{ $tour->name }}</h3>
                                @if ($tour->id == 1)
                                    <span class="bg-[#E67A2E] text-white text-xs px-3 py-1 rounded-full">Most Popular</span>
                                @endif
                            </div>
                            <p class="text-gray-500 text-sm leading-relaxed mb-8 line-clamp-2">{{ $tour->description }}</p>
                            <div class="space-y-2">
                                <div class="flex items-center gap-2 text-sm text-gray-700">
                                    <i class="ph-bold ph-map-pin text-[#1F5A3A]"></i>
                                    <span>{{ $tour->location }}</span>
                                </div>
                                <div class="flex items-center gap-2 text-sm text-gray-700">
                                    <i class="ph-bold ph-clock text-[#1F5A3A]"></i>
                                    <span>{{ $tour->duration_days }} Days</span>
                                </div>
                                @if(isset($tour->route))
                                    <div class="flex items-center gap-2 text-sm text-gray-700">
                                        <i class="ph-bold ph-signpost text-[#1F5A3A]"></i>
                                        <span>{{ $tour->route }} Route</span>
                                    </div>
                                @endif
                                @if(isset($tour->difficulty))
                                    <div class="flex items-center gap-2 text-sm text-gray-700">
                                        <i class="ph-bold ph-trend-up text-[#1F5A3A]"></i>
                                        <span>{{ $tour->difficulty }}</span>
                                    </div>
                                @endif
                                <div class="flex items-center gap-2 text-sm text-gray-700">
                                    <i class="ph-bold ph-users text-[#1F5A3A]"></i>
                                    <span>Per Person</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest block mb-1">From ${{ number_format($tour->base_price) }}</span>
                                </div>
                                <a href="#" class="inline-flex items-center gap-2 bg-slate-900 text-white px-6 py-3 rounded-2xl font-bold hover:bg-emerald-600 transition-colors">
                                    Details <i class="ph ph-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-[#1F5A3A]">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-serif font-bold text-white mb-4">Why Choose Reputable Tours?</h2>
        <p class="text-white/90 mb-8 max-w-2xl mx-auto">Experience Tanzania with confidence, comfort, and unforgettable memories.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Expert Guides -->
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 text-center">
                <i class="ph-bold ph-users text-4xl text-emerald-600 mb-4"></i>
                <h3 class="text-xl font-bold text-white mb-2">Expert Local Guides</h3>
                <p class="text-white/80">Knowledgeable, experienced, and passionate about Tanzania's wildlife and culture.</p>
            </div>
            
            <!-- Quality Equipment -->
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 text-center">
                <i class="ph-bold ph-backpack text-4xl text-emerald-600 mb-4"></i>
                <h3 class="text-xl font-bold text-white mb-2">Quality Equipment</h3>
                <p class="text-white/80">Modern gear and reliable equipment for safe and comfortable adventures.</p>
            </div>
            
            <!-- Best Value -->
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 text-center">
                <i class="ph-bold ph-tag text-4xl text-emerald-600 mb-4"></i>
                <h3 class="text-xl font-bold text-white mb-2">Best Value Guarantee</h3>
                <p class="text-white/80">Transparent pricing with no hidden fees. Exceptional service every time.</p>
            </div>
            
            <!-- 24/7 Support -->
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 text-center">
                <i class="ph-bold ph-headset text-4xl text-emerald-600 mb-4"></i>
                <h3 class="text-xl font-bold text-white mb-2">24/7 Support</h3>
                <p class="text-white/80">Dedicated assistance throughout your journey for peace of mind.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-serif font-bold text-gray-800 mb-4">What Our Travelers Say</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Real experiences from real adventurers who chose Reputable Tours.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <div class="flex items-start gap-6">
                    <img src="{{ asset('images/06.jpg') }}" alt="Happy Traveler" class="w-20 h-20 rounded-full object-cover">
                    <div class="flex-1">
                        <h4 class="text-xl font-bold text-gray-900 mb-2">Sarah Johnson</h4>
                        <p class="text-gray-600 mb-2">United Kingdom</p>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <i class="ph-bold ph-star text-[#E67A2E]"></i>
                            <i class="ph-bold ph-star text-[#E67A2E]"></i>
                            <i class="ph-bold ph-star text-[#E67A2E]"></i>
                            <i class="ph-bold ph-star text-[#E67A2E]"></i>
                            <i class="ph-bold ph-star text-[#E67A2E]"></i>
                            <i class="ph-bold ph-star text-[#E67A2E]"></i>
                        </div>
                        <p class="text-gray-500 italic">"The Kilimanjaro climb was absolutely incredible! Our guide was knowledgeable and supportive throughout. Reputable Tours made everything seamless."</p>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial 2 -->
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <div class="flex items-start gap-6">
                    <img src="{{ asset('images/03.jpg') }}" alt="Happy Traveler" class="w-20 h-20 rounded-full object-cover">
                    <div class="flex-1">
                        <h4 class="text-xl font-bold text-gray-900 mb-2">Michael Chen</h4>
                        <p class="text-gray-600 mb-2">Singapore</p>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <i class="ph-bold ph-star text-[#E67A2E]"></i>
                            <i class="ph-bold ph-star text-[#E67A2E]"></i>
                            <i class="ph-bold ph-star text-[#E67A2E]"></i>
                            <i class="ph-bold ph-star text-[#E67A2E]"></i>
                            <i class="ph-bold ph-star text-[#E67A2E]"></i>
                        </div>
                        <p class="text-gray-500 italic">"The Serengeti safari exceeded all expectations. Luxury camping, amazing wildlife sightings, and professional guides made this a trip of a lifetime."</p>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial 3 -->
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <div class="flex items-start gap-6">
                    <img src="{{ asset('images/05.jpg') }}" alt="Happy Traveler" class="w-20 h-20 rounded-full object-cover">
                    <div class="flex-1">
                        <h4 class="text-xl font-bold text-gray-900 mb-2">Emma Wilson</h4>
                        <p class="text-gray-600 mb-2">Australia</p>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <i class="ph-bold ph-star text-[#E67A2E]"></i>
                            <i class="ph-bold ph-star text-[#E67A2E]"></i>
                            <i class="ph-bold ph-star text-[#E67A2E]"></i>
                            <i class="ph-bold ph-star text-[#E67A2E]"></i>
                            <i class="ph-bold ph-star text-[#E67A2E]"></i>
                        </div>
                        <p class="text-gray-500 italic">"Zanzibar was paradise! The beach resort was stunning, and the cultural tour gave us real insight into local life. Highly recommend!"</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-[#1F5A3A]">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-serif font-bold text-white mb-4">Ready for Your Tanzanian Adventure?</h2>
        <p class="text-white/90 mb-8 max-w-2xl mx-auto">Let our expert team help you plan the perfect safari experience.</p>
        <div class="flex flex-col sm:flex-row items-center gap-4 justify-center">
            <a href="#" class="px-10 py-4 bg-white text-[#1F5A3A] font-bold rounded-full hover:bg-white/90 transition-all">
                <i class="ph-bold ph-map-trifold text-xl mr-2"></i>
                Browse All Tours
            </a>
            <a href="#" class="px-10 py-4 bg-[#E67A2E] text-white font-bold rounded-full hover:bg-[#E67A2E]/90 transition-all">
                <i class="ph-bold ph-chat-circle-dots text-xl mr-2"></i>
                Talk to Expert
            </a>
        </div>
    </div>
</section>
@endsection
