@extends('layouts.public')

@section('content')
<!-- Page Header -->
<section class="py-4 bg-gray-50">
    <div class="container mx-auto px-4">
        <nav class="flex text-sm">
            <a href="{{ route('destinations') }}" class="text-gray-600 hover:text-gray-900">Destinations</a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-gray-900 font-medium">Eastern Circuit</span>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="relative min-h-[60vh] sm:min-h-[70vh] md:min-h-[80vh] lg:min-h-[90vh] bg-gradient-to-br from-emerald-600 to-teal-700 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468771/tanzania-2275107_1920_cmihwj.jpg" alt="Eastern circuit" class="w-full h-full object-cover object-center opacity-30">
        <div class="absolute inset-0 bg-gradient-to-r from-emerald-900/50 to-teal-900/50"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 text-center h-full flex items-center justify-center py-12 sm:py-16 md:py-20">
        <div class="w-full">
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-serif text-white mb-4 sm:mb-6 font-bold leading-tight">Eastern Circuit</h1>
            <p class="text-base sm:text-lg md:text-xl text-emerald-100 max-w-3xl mx-auto mb-6 sm:mb-8 px-4">Discover Tanzania's hidden gems in the Eastern Circuit, featuring pristine wilderness, diverse wildlife, and off-the-beaten-path safari experiences.</p>
        <div class="flex flex-wrap gap-4 justify-center">
            <div class="bg-white/20 backdrop-blur-sm rounded-full px-6 py-3 text-white">
                <i class="ph ph-tree mr-2"></i> Remote Wilderness
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-full px-6 py-3 text-white">
                <i class="ph ph-binoculars mr-2"></i> Exclusive Safari
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-full px-6 py-3 text-white">
                <i class="ph ph-campfire mr-2"></i> Authentic Experience
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl font-serif font-bold text-gray-900 mb-6">Explore the Eastern Frontier</h2>
                <p class="text-lg text-gray-600 mb-6">
                    The Eastern Circuit offers a truly wild and untamed safari experience, far from the crowds of more popular routes. This region encompasses some of Tanzania's most remote and pristine wilderness areas, where wildlife roams freely across vast, untouched landscapes.
                </p>
                <p class="text-lg text-gray-600 mb-8">
                    From the rugged terrain of the Selous Game Reserve to the pristine beaches of the Swahili Coast, the Eastern Circuit provides an authentic African adventure that combines world-class wildlife viewing with cultural immersion and breathtaking natural beauty.
                </p>
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex items-start space-x-3">
                        <i class="ph ph-check-circle text-emerald-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-semibold text-gray-900">Untouched Wilderness</h4>
                            <p class="text-gray-600 text-sm">Pristine ecosystems and abundant wildlife</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <i class="ph ph-check-circle text-emerald-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-semibold text-gray-900">Exclusive Access</h4>
                            <p class="text-gray-600 text-sm">Limited visitors ensure intimate experiences</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <i class="ph ph-check-circle text-emerald-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-semibold text-gray-900">Diverse Habitats</h4>
                            <p class="text-gray-600 text-sm">From miombo woodlands to coastal forests</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <i class="ph ph-check-circle text-emerald-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-semibold text-gray-900">Cultural Richness</h4>
                            <p class="text-gray-600 text-sm">Authentic local communities and traditions</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative">
                <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468771/tanzania-2275107_1920_cmihwj.jpg" alt="Eastern Circuit Landscape" class="rounded-3xl shadow-2xl">
                <div class="absolute -bottom-6 -left-6 bg-emerald-600 text-white p-6 rounded-2xl shadow-xl">
                    <div class="text-3xl font-bold">50,000+</div>
                    <div class="text-emerald-100">Square Kilometers of Wilderness</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Destinations Grid -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-serif font-bold text-gray-900 mb-4">Eastern Circuit Destinations</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Explore the diverse destinations that make up Tanzania's Eastern Circuit</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($destinations as $destination)
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group">
                <div class="relative h-64 overflow-hidden">
                    @if(!empty($destination->images) && count($destination->images) > 0)
                        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468779/Wildb_eleph_uw1asl.jpg" alt="Wildlife" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468773/tree-2600482_1920_1_ruahvn.jpg" alt="Wildlife" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <h3 class="text-2xl font-bold text-white mb-2">{{ $destination->name }}</h3>
                        @if($destination->region)
                        <div class="flex items-center text-emerald-300 text-sm">
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
                        <a href="{{ route('destinations.show', $destination->id) }}" class="text-emerald-600 hover:text-emerald-700 font-semibold">
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
            <h2 class="text-4xl font-serif font-bold text-gray-900 mb-4">Eastern Circuit Highlights</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">What makes the Eastern Circuit truly special</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="bg-emerald-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="ph ph-elephant text-emerald-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Abundant Wildlife</h3>
                <p class="text-gray-600">Home to elephants, lions, leopards, and rare African wild dogs</p>
            </div>
            
            <div class="text-center">
                <div class="bg-emerald-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="ph ph-tree text-emerald-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Pristine Forests</h3>
                <p class="text-gray-600">Ancient miombo woodlands and coastal forests teeming with biodiversity</p>
            </div>
            
            <div class="text-center">
                <div class="bg-emerald-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="ph ph-users text-emerald-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Cultural Heritage</h3>
                <p class="text-gray-600">Authentic encounters with local communities and traditional lifestyles</p>
            </div>
            
            <div class="text-center">
                <div class="bg-emerald-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="ph ph-camera text-emerald-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Photography Paradise</h3>
                <p class="text-gray-600">Unspoiled landscapes and incredible wildlife photo opportunities</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-emerald-600 to-teal-700">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-4xl font-serif font-bold text-white mb-6">Ready to Explore the Eastern Circuit?</h2>
        <p class="text-xl text-emerald-100 mb-8 max-w-3xl mx-auto">Let us help you plan an unforgettable adventure to Tanzania's wild eastern frontier.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-4 bg-white text-emerald-700 font-semibold rounded-full hover:bg-emerald-50 transition-colors">
                <i class="ph ph-envelope mr-2"></i>
                Contact Us
            </a>
            <a href="{{ route('tours.index') }}" class="inline-flex items-center px-8 py-4 bg-emerald-700 text-white font-semibold rounded-full hover:bg-emerald-800 transition-colors">
                <i class="ph ph-map-trifold mr-2"></i>
                View Tours
            </a>
        </div>
    </div>
</section>
@endsection
