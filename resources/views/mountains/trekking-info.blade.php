@extends('layouts.public')

@section('title', $mountain->name . ' - Trekking Information')

@section('content')
<!-- Hero Section -->
<section class="relative h-64 bg-cover bg-center" style="background-image: url('{{ !empty($mountain->images) ? $mountain->images[0] : 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468773/tree-2600482_1920_c50vn6.jpg' }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative container mx-auto px-4 h-full flex items-center">
        <div class="text-white">
            <h1 class="text-4xl font-bold mb-2">{{ $mountain->name }} Trekking Info</h1>
            <p class="text-lg">Essential information for your climb</p>
        </div>
    </div>
</section>

<!-- Breadcrumb -->
<section class="py-4 bg-gray-50">
    <div class="container mx-auto px-4">
        <nav class="flex text-sm">
            <a href="{{ route('mountains.index') }}" class="text-gray-600 hover:text-gray-900">Mountains</a>
            <span class="mx-2 text-gray-400">/</span>
            <a href="{{ route('mountains.show', $mountain->slug) }}" class="text-gray-600 hover:text-gray-900">{{ $mountain->name }}</a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-gray-900 font-medium">Trekking Info</span>
        </nav>
    </div>
</section>

<!-- Trekking Information Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Complete Trekking Guide</h2>
                <p class="text-gray-600">Everything you need to know for a successful {{ $mountain->name }} expedition</p>
            </div>

            @if($mountain->trekking_info)
            <div class="bg-white rounded-lg shadow-lg p-8 mb-12">
                <h3 class="text-2xl font-bold mb-6">Overview</h3>
                <p class="text-gray-600 leading-relaxed">{{ $mountain->trekking_info }}</p>
            </div>
            @endif

            <!-- Altitude Zones -->
            <div class="bg-white rounded-lg shadow-lg p-8 mb-12">
                <h3 class="text-2xl font-bold mb-6">Altitude Zones</h3>
                <div class="space-y-6">
                    @if($mountain->name === 'Mount Kilimanjaro')
                    <div class="border-l-4 border-green-500 pl-6">
                        <h4 class="font-bold text-lg mb-2">Cultivation Zone (800m - 1,800m)</h4>
                        <p class="text-gray-600">Lush farmland with villages and coffee plantations. Temperature: 20-30°C.</p>
                    </div>
                    <div class="border-l-4 border-blue-500 pl-6">
                        <h4 class="font-bold text-lg mb-2">Forest Zone (1,800m - 2,800m)</h4>
                        <p class="text-gray-600">Dense montane forest with wildlife including monkeys and birds. Temperature: 15-20°C.</p>
                    </div>
                    <div class="border-l-4 border-yellow-500 pl-6">
                        <h4 class="font-bold text-lg mb-2">Heath/Moorland Zone (2,800m - 4,000m)</h4>
                        <p class="text-gray-600">Open moorland with giant heathers and lobelias. Temperature: 10-15°C.</p>
                    </div>
                    <div class="border-l-4 border-orange-500 pl-6">
                        <h4 class="font-bold text-lg mb-2">Alpine Desert Zone (4,000m - 5,000m)</h4>
                        <p class="text-gray-600">Sparse vegetation with rocky terrain. Temperature: 5-10°C.</p>
                    </div>
                    <div class="border-l-4 border-red-500 pl-6">
                        <h4 class="font-bold text-lg mb-2">Arctic Zone (5,000m - 5,895m)</h4>
                        <p class="text-gray-600">Ice and rock formations near the summit. Temperature: -20°C to -25°C.</p>
                    </div>
                    @else
                    <div class="border-l-4 border-green-500 pl-6">
                        <h4 class="font-bold text-lg mb-2">Lower Slopes (1,500m - 2,500m)</h4>
                        <p class="text-gray-600">Montane forest with diverse wildlife. Temperature: 15-25°C.</p>
                    </div>
                    <div class="border-l-4 border-blue-500 pl-6">
                        <h4 class="font-bold text-lg mb-2">Middle Slopes (2,500m - 3,500m)</h4>
                        <p class="text-gray-600">Moorland and heath zone with unique flora. Temperature: 10-15°C.</p>
                    </div>
                    <div class="border-l-4 border-red-500 pl-6">
                        <h4 class="font-bold text-lg mb-2">Summit Zone (3,500m - 4,566m)</h4>
                        <p class="text-gray-600">Alpine desert with rocky terrain. Temperature: -10°C to -15°C.</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Health & Safety -->
            <div class="bg-white rounded-lg shadow-lg p-8 mb-12">
                <h3 class="text-2xl font-bold mb-6">Health & Safety</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="font-bold text-lg mb-3 text-red-600">Altitude Sickness</h4>
                        <ul class="space-y-2 text-gray-600">
                            <li>• Drink 3-4 liters of water daily</li>
                            <li>• Ascend slowly ("pole pole")</li>
                            <li>• Recognize symptoms: headache, nausea, dizziness</li>
                            <li>• Descend if symptoms worsen</li>
                            <li>• Consider Diamox for prevention</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg mb-3 text-blue-600">General Safety</h4>
                        <ul class="space-y-2 text-gray-600">
                            <li>• Follow your guide's instructions</li>
                            <li>• Stay on marked trails</li>
                            <li>• Keep your distance from wildlife</li>
                            <li>• Protect yourself from sun exposure</li>
                            <li>• Inform guide of any health issues</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Physical Preparation -->
            <div class="bg-white rounded-lg shadow-lg p-8 mb-12">
                <h3 class="text-2xl font-bold mb-6">Physical Preparation</h3>
                <div class="space-y-6">
                    <div>
                        <h4 class="font-bold text-lg mb-3">Fitness Requirements</h4>
                        <p class="text-gray-600 mb-4">Good cardiovascular fitness and stamina are essential. Start training at least 3-4 months before your climb.</p>
                        <div class="grid md:grid-cols-3 gap-4">
                            <div class="bg-gray-50 p-4 rounded">
                                <h5 class="font-semibold mb-2">Cardio Training</h5>
                                <ul class="text-sm text-gray-600">
                                    <li>• Running/jogging</li>
                                    <li>• Cycling</li>
                                    <li>• Swimming</li>
                                    <li>• 3-4 times per week</li>
                                </ul>
                            </div>
                            <div class="bg-gray-50 p-4 rounded">
                                <h5 class="font-semibold mb-2">Strength Training</h5>
                                <ul class="text-sm text-gray-600">
                                    <li>• Squats and lunges</li>
                                    <li>• Core exercises</li>
                                    <li>• Upper body strength</li>
                                    <li>• 2-3 times per week</li>
                                </ul>
                            </div>
                            <div class="bg-gray-50 p-4 rounded">
                                <h5 class="font-semibold mb-2">Endurance</h5>
                                <ul class="text-sm text-gray-600">
                                    <li>• Long hikes</li>
                                    <li>• Stair climbing</li>
                                    <li>• Hill training</li>
                                    <li>• Weekend treks</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Best Time to Climb -->
            @if($mountain->best_season)
            <div class="bg-white rounded-lg shadow-lg p-8 mb-12">
                <h3 class="text-2xl font-bold mb-6">Best Time to Climb</h3>
                <div class="bg-blue-50 border-l-4 border-blue-500 p-6">
                    <p class="text-gray-700 font-medium mb-2">Optimal Season: {{ $mountain->best_season }}</p>
                    @if($mountain->weather_info)
                    <p class="text-gray-600">{{ $mountain->weather_info }}</p>
                    @endif
                </div>
                
                <div class="grid md:grid-cols-2 gap-6 mt-6">
                    <div class="bg-green-50 p-4 rounded">
                        <h4 class="font-semibold text-green-800 mb-2">Dry Season (Recommended)</h4>
                        <ul class="text-sm text-gray-600">
                            <li>• Clear skies and good visibility</li>
                            <li>• Lower precipitation</li>
                            <li>• Better trail conditions</li>
                            <li>• Higher success rates</li>
                        </ul>
                    </div>
                    <div class="bg-yellow-50 p-4 rounded">
                        <h4 class="font-semibold text-yellow-800 mb-2">Wet Season (Challenging)</h4>
                        <ul class="text-sm text-gray-600">
                            <li>• Heavy rainfall</li>
                            <li>• Slippery trails</li>
                            <li>• Poor visibility</li>
                            <li>• Lower success rates</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            <!-- What to Expect -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h3 class="text-2xl font-bold mb-6">What to Expect</h3>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <span class="text-blue-600 font-bold">1</span>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-1">Daily Routine</h4>
                            <p class="text-gray-600">Early start (6-7 AM), 4-8 hours hiking, arrival at camp by afternoon, rest and acclimatization.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <span class="text-blue-600 font-bold">2</span>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-1">Meals</h4>
                            <p class="text-gray-600">Three meals daily plus snacks. High-carbohydrate diet for energy. Vegetarian options available.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <span class="text-blue-600 font-bold">3</span>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-1">Accommodation</h4>
                            <p class="text-gray-600">Tents on most routes, huts available on Marangu route. Basic but comfortable camping equipment provided.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <span class="text-blue-600 font-bold">4</span>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-1">Support Team</h4>
                            <p class="text-gray-600">Professional guide, cook, and porters to carry equipment and supplies.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-blue-600">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Ready for Your {{ $mountain->name }} Adventure?</h2>
        <p class="text-blue-100 mb-8 max-w-2xl mx-auto">Our expert guides are here to ensure you have a safe, successful, and unforgettable climbing experience.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('mountains.routes', $mountain->slug) }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                Choose Your Route
            </a>
            <a href="/contact" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition">
                Get Expert Advice
            </a>
        </div>
    </div>
</section>
@endsection
