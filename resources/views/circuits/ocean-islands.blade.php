@extends('layouts.public')

@section('content')
<!-- Page Header -->
<section class="py-4 bg-gray-50">
    <div class="container mx-auto px-4">
        <nav class="flex text-sm">
            <a href="{{ route('destinations') }}" class="text-gray-600 hover:text-gray-900">Destinations</a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-gray-900 font-medium">Ocean Islands</span>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-cyan-600 to-blue-700 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468771/spphoto_skxxer.jpg" alt="Ocean islands" class="w-full h-full object-cover opacity-30">
        <div class="absolute inset-0 bg-gradient-to-r from-cyan-900/50 to-blue-900/50"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        <h1 class="text-5xl md:text-6xl font-serif text-white mb-6 font-bold">Ocean Islands</h1>
        <p class="text-xl text-cyan-100 max-w-3xl mx-auto mb-8">Discover Tanzania's stunning island paradise, where pristine beaches, crystal-clear waters, and vibrant marine life create the perfect tropical escape.</p>
        <div class="flex flex-wrap gap-4 justify-center">
            <div class="bg-white/20 backdrop-blur-sm rounded-full px-6 py-3 text-white">
                <i class="ph ph-umbrella mr-2"></i> Beach Paradise
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-full px-6 py-3 text-white">
                <i class="ph ph-fish-simple mr-2"></i> Marine Life
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-full px-6 py-3 text-white">
                <i class="ph ph-sun mr-2"></i> Tropical Bliss
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl font-serif font-bold text-gray-900 mb-6">Island Paradise Awaits</h2>
                <p class="text-lg text-gray-600 mb-6">
                    Tanzania's Ocean Islands offer a perfect blend of tropical relaxation and adventure. From the world-famous beaches of Zanzibar to the pristine shores of Mafia and Pemba, these islands provide an idyllic escape with some of the best diving and snorkeling in the Indian Ocean.
                </p>
                <p class="text-lg text-gray-600 mb-8">
                    The islands boast rich cultural heritage, stunning coral reefs, and endless opportunities for water sports. Whether you're seeking romantic getaways, family vacations, or underwater adventures, Tanzania's Ocean Islands deliver unforgettable experiences.
                </p>
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex items-start space-x-3">
                        <i class="ph ph-check-circle text-cyan-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-semibold text-gray-900">Pristine Beaches</h4>
                            <p class="text-gray-600 text-sm">White sand beaches and turquoise waters</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <i class="ph ph-check-circle text-cyan-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-semibold text-gray-900">World-Class Diving</h4>
                            <p class="text-gray-600 text-sm">Coral reefs and marine biodiversity</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <i class="ph ph-check-circle text-cyan-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-semibold text-gray-900">Cultural Heritage</h4>
                            <p class="text-gray-600 text-sm">Rich Swahili culture and history</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <i class="ph ph-check-circle text-cyan-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-semibold text-gray-900">Island Hopping</h4>
                            <p class="text-gray-600 text-sm">Multiple islands to explore</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative">
                <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468771/spphoto_skxxer.jpg" alt="Ocean Islands Beach" class="rounded-3xl shadow-2xl">
                <div class="absolute -bottom-6 -left-6 bg-cyan-600 text-white p-6 rounded-2xl shadow-xl">
                    <div class="text-3xl font-bold">1,424</div>
                    <div class="text-cyan-100">Kilometers of Coastline</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Destinations Grid -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-serif font-bold text-gray-900 mb-4">Ocean Islands Destinations</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Explore the diverse destinations that make up Tanzania's Ocean Islands</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($destinations as $destination)
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group">
                <div class="relative h-64 overflow-hidden">
                    @if(!empty($destination->images) && count($destination->images) > 0)
                        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468769/stella-point-4032287_1280_bpmyyh.jpg" alt="Wildlife" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468769/springbok-8063883_1920_bcrj32.jpg" alt="Wildlife" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <h3 class="text-2xl font-bold text-white mb-2">{{ $destination->name }}</h3>
                        @if($destination->region)
                        <div class="flex items-center text-cyan-300 text-sm">
                            <i class="ph ph-map-pin mr-1"></i>
                            {{ $destination->region }}
                        </div>
                        @endif
                    </div>
                </div>
                
                <div class="p-6">
                    @if($destination->description)
                    <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit($destination->description, 150) }}</p>
                    @endif
                    
                    @if($destination->best_time_to_visit)
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <i class="ph ph-calendar mr-2"></i>
                        Best time: {{ $destination->best_time_to_visit }}
                    </div>
                    @endif
                    
                    <div class="flex items-center justify-between">
                        <a href="{{ route('destinations.show', $destination->id) }}" class="text-cyan-600 hover:text-cyan-700 font-semibold">
                            Explore Destination →
                        </a>
                        @if($destination->best_time_to_visit)
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="ph ph-clock mr-1"></i>
                            {{ $destination->best_time_to_visit }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Highlights Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-serif font-bold text-gray-900 mb-4">Ocean Islands Highlights</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">What makes the Ocean Islands truly special</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="bg-cyan-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="ph ph-fish-simple text-cyan-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Marine Paradise</h3>
                <p class="text-gray-600">World-class diving and snorkeling with vibrant coral reefs</p>
            </div>
            
            <div class="text-center">
                <div class="bg-cyan-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="ph ph-umbrella text-cyan-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Pristine Beaches</h3>
                <p class="text-gray-600">White sand beaches and crystal-clear turquoise waters</p>
            </div>
            
            <div class="text-center">
                <div class="bg-cyan-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="ph ph-compass text-cyan-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Island Culture</h3>
                <p class="text-gray-600">Rich Swahili heritage and spice island history</p>
            </div>
            
            <div class="text-center">
                <div class="bg-cyan-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="ph ph-sunset text-cyan-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Tropical Bliss</h3>
                <p class="text-gray-600">Perfect climate and stunning sunsets year-round</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-cyan-600 to-blue-700">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-4xl font-serif font-bold text-white mb-6">Ready to Explore the Ocean Islands?</h2>
        <p class="text-xl text-cyan-100 mb-8 max-w-3xl mx-auto">Let us help you plan an unforgettable island escape to Tanzania's tropical paradise.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-4 bg-white text-cyan-700 font-semibold rounded-full hover:bg-cyan-50 transition-colors">
                <i class="ph ph-envelope mr-2"></i>
                Contact Us
            </a>
            <a href="{{ route('tours.index') }}" class="inline-flex items-center px-8 py-4 bg-cyan-700 text-white font-semibold rounded-full hover:bg-cyan-800 transition-colors">
                <i class="ph ph-map-trifold mr-2"></i>
                View Tours
            </a>
        </div>
    </div>
</section>
@endsection
