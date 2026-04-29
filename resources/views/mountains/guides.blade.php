@extends('layouts.public')

@section('title', $mountain->name . ' - Expert Guides')

@section('content')
<!-- Hero Section -->
<section class="relative h-64 bg-cover bg-center" style="background-image: url('{{ !empty($mountain->images) ? $mountain->images[0] : 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468773/tree-2600482_1920_c50vn6.jpg' }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative container mx-auto px-4 h-full flex items-center">
        <div class="text-white">
            <h1 class="text-4xl font-bold mb-2">{{ $mountain->name }} Expert Guides</h1>
            <p class="text-lg">Meet our experienced mountain guides</p>
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
            <span class="text-gray-900 font-medium">Expert Guides</span>
        </nav>
    </div>
</section>

<!-- Expert Guides Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Our Expert Mountain Guides</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Professional, experienced, and certified guides dedicated to your safety and success on {{ $mountain->name }}</p>
        </div>

        @if($mountain->expert_guides && count($mountain->expert_guides) > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($mountain->expert_guides as $guide)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-6 text-white">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mr-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">{{ $guide['name'] }}</h3>
                            <div class="flex items-center mt-1">
                                <div class="flex text-yellow-400">
                                    @for($i = 0; $i < floor($guide['rating']); $i++)
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    @endfor
                                </div>
                                <span class="ml-2 text-sm">{{ $guide['rating'] }}/5.0</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="p-6">
                    <div class="space-y-4">
                        <div>
                            <span class="text-sm text-gray-500">Experience</span>
                            <p class="font-semibold">{{ $guide['experience'] }}</p>
                        </div>
                        
                        @if(!empty($guide['specialties']))
                        <div>
                            <span class="text-sm text-gray-500">Specialties</span>
                            <div class="flex flex-wrap gap-2 mt-1">
                                @foreach($guide['specialties'] as $specialty)
                                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">{{ $specialty }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        
                        @if(!empty($guide['languages']))
                        <div>
                            <span class="text-sm text-gray-500">Languages</span>
                            <div class="flex flex-wrap gap-2 mt-1">
                                @foreach($guide['languages'] as $language)
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">{{ $language }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        
                        @if(!empty($guide['certifications']))
                        <div>
                            <span class="text-sm text-gray-500">Certifications</span>
                            <ul class="mt-1 space-y-1">
                                @foreach($guide['certifications'] as $certification)
                                <li class="flex items-start text-sm text-gray-600">
                                    <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $certification }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>

                    <div class="mt-6 flex gap-3">
                        <button class="flex-1 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition" onclick="showGuideProfile('{{ $guide['name'] }}')">
                            View Profile
                        </button>
                        <a href="/contact?guide={{ urlencode($guide['name']) }}" class="flex-1 border border-blue-600 text-blue-600 py-2 px-4 rounded hover:bg-blue-50 transition text-center">
                            Book Guide
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12">
            <div class="bg-gray-100 rounded-lg p-8 max-w-2xl mx-auto">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Guide Information Coming Soon</h3>
                <p class="text-gray-600">We're currently updating our guide profiles for {{ $mountain->name }}. Please contact us for information about our expert guides.</p>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Why Choose Our Guides -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold mb-8 text-center">Why Choose Our Expert Guides?</h2>
            
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold">Certified Professionals</h3>
                    </div>
                    <p class="text-gray-600">All our guides are certified by national park authorities and have extensive wilderness first aid training.</p>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold">Extensive Experience</h3>
                    </div>
                    <p class="text-gray-600">Years of experience leading successful climbs on {{ $mountain->name }} with deep knowledge of all routes.</p>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold">Safety First</h3>
                    </div>
                    <p class="text-gray-600">Your safety is our top priority. Our guides are trained in altitude sickness prevention and emergency response.</p>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold">Local Knowledge</h3>
                    </div>
                    <p class="text-gray-600">Deep understanding of local culture, flora, fauna, and mountain conditions passed down through generations.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Guide Profile Modal -->
<div id="guideModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-lg bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900" id="modalTitle"></h3>
                <button onclick="closeGuideProfile()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div id="modalContent"></div>
        </div>
    </div>
</div>

<script>
function showGuideProfile(guideName) {
    document.getElementById('modalTitle').textContent = guideName;
    document.getElementById('modalContent').innerHTML = `
        <p class="text-gray-600 mb-4">Detailed profile information for ${guideName} would appear here.</p>
        <div class="space-y-3">
            <div>
                <strong>Background:</strong> Expert mountain guide with extensive experience on ${guideName.includes('Kilimanjaro') ? 'Kilimanjaro' : 'Meru'}.
            </div>
            <div>
                <strong>Success Rate:</strong> 95%+ summit success with proper acclimatization.
            </div>
            <div>
                <strong>Specialties:</strong> High-altitude trekking, group leadership, emergency response.
            </div>
        </div>
        <div class="mt-6 flex gap-3">
            <a href="/contact?guide=${encodeURIComponent(guideName)}" class="flex-1 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition text-center">
                Book This Guide
            </a>
            <button onclick="closeGuideProfile()" class="flex-1 border border-gray-300 text-gray-700 py-2 px-4 rounded hover:bg-gray-50 transition">
                Close
            </button>
        </div>
    `;
    document.getElementById('guideModal').classList.remove('hidden');
}

function closeGuideProfile() {
    document.getElementById('guideModal').classList.add('hidden');
}
</script>
@endsection
