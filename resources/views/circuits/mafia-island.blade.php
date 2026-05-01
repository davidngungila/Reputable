@extends('layouts.public')

@section('content')
<!-- Page Header -->
<section class="py-4 bg-gray-50">
    <div class="container mx-auto px-4">
        <nav class="flex text-sm">
            <a href="{{ route('destinations') }}" class="text-gray-600 hover:text-gray-900">Destinations</a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-gray-900 font-medium">Mafia Island</span>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="relative min-h-[60vh] sm:min-h-[70vh] md:min-h-[80vh] lg:min-h-[90vh] bg-gradient-to-br from-teal-600 to-green-700 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468777/waterbuck_ggd5wl.jpg" alt="Mafia island" class="w-full h-full object-cover object-center opacity-30">
        <div class="absolute inset-0 bg-gradient-to-r from-teal-900/50 to-green-900/50"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 text-center h-full flex items-center justify-center py-12 sm:py-16 md:py-20">
        <div class="w-full">
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-serif text-white mb-4 sm:mb-6 font-bold leading-tight">Mafia Island</h1>
            <p class="text-base sm:text-lg md:text-xl text-teal-100 max-w-3xl mx-auto mb-6 sm:mb-8 px-4">Experience Tanzania's best-kept secret, where pristine marine parks, whale shark encounters, and untouched beaches create an exclusive island paradise.</p>
        <div class="flex flex-wrap gap-4 justify-center">
            <div class="bg-white/20 backdrop-blur-sm rounded-full px-6 py-3 text-white">
                <i class="ph ph-fish-simple mr-2"></i> Marine Park
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-full px-6 py-3 text-white">
                <i class="ph ph-whale mr-2"></i> Whale Sharks
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-full px-6 py-3 text-white">
                <i class="ph ph-leaf mr-2"></i> Eco Paradise
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl font-serif font-bold text-gray-900 mb-6">Tanzania's Marine Sanctuary</h2>
                <p class="text-lg text-gray-600 mb-6">
                    Mafia Island is Tanzania's hidden gem, a pristine marine paradise that remains largely untouched by mass tourism. Home to the Mafia Island Marine Park, this destination offers some of the best diving and snorkeling in the Indian Ocean, with vibrant coral reefs and abundant marine life.
                </p>
                <p class="text-lg text-gray-600 mb-8">
                    The island is famous for its year-round whale shark encounters, making it one of the few places in the world where you can swim with these gentle giants. Combine this with pristine beaches, excellent fishing, and a laid-back atmosphere, and you have the perfect island escape.
                </p>
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex items-start space-x-3">
                        <i class="ph ph-check-circle text-teal-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-semibold text-gray-900">Whale Shark Paradise</h4>
                            <p class="text-gray-600 text-sm">Year-round whale shark encounters</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <i class="ph ph-check-circle text-teal-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-semibold text-gray-900">Marine Protected Area</h4>
                            <p class="text-gray-600 text-sm">Tanzania's largest marine park</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <i class="ph ph-check-circle text-teal-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-semibold text-gray-900">World-Class Diving</h4>
                            <p class="text-gray-600 text-sm">Pristine coral reefs and marine life</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <i class="ph ph-check-circle text-teal-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-semibold text-gray-900">Exclusive Escape</h4>
                            <p class="text-gray-600 text-sm">Uncrowded and authentic experience</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative">
                <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468777/waterbuck_ggd5wl.jpg" alt="Mafia Island Marine Life" class="rounded-3xl shadow-2xl">
                <div class="absolute -bottom-6 -right-6 bg-teal-600 text-white p-6 rounded-2xl shadow-xl">
                    <div class="text-3xl font-bold">822</div>
                    <div class="text-teal-100">Square Kilometers Marine Park</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Destinations Grid -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-serif font-bold text-gray-900 mb-4">Mafia Island Destinations</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Explore the diverse destinations that make up Mafia Island</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($destinations as $destination)
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group">
                <div class="relative h-64 overflow-hidden">
                    @if(!empty($destination->images) && count($destination->images) > 0)
                        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468771/spphoto_skxxer.jpg" alt="Wildlife" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468770/strauss-4642855_1280_i5umy2.jpg" alt="Wildlife" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <h3 class="text-2xl font-bold text-white mb-2">{{ $destination->name }}</h3>
                        @if($destination->region)
                        <div class="flex items-center text-teal-300 text-sm">
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
                        <a href="{{ route('destinations.show', $destination->id) }}" class="text-teal-600 hover:text-teal-700 font-semibold">
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
            <h2 class="text-4xl font-serif font-bold text-gray-900 mb-4">Mafia Island Highlights</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">What makes Mafia Island truly special</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="bg-teal-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="ph ph-whale text-teal-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Whale Shark Capital</h3>
                <p class="text-gray-600">Year-round encounters with gentle whale sharks</p>
            </div>
            
            <div class="text-center">
                <div class="bg-teal-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="ph ph-fish-simple text-teal-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Marine Park</h3>
                <p class="text-gray-600">Protected coral reefs and abundant marine life</p>
            </div>
            
            <div class="text-center">
                <div class="bg-teal-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="ph ph-umbrella text-teal-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Pristine Beaches</h3>
                <p class="text-gray-600">Uncrowded white sand beaches and clear waters</p>
            </div>
            
            <div class="text-center">
                <div class="bg-teal-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="ph ph-leaf text-teal-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Eco Paradise</h3>
                <p class="text-gray-600">Sustainable tourism and conservation focus</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-teal-600 to-green-700">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-4xl font-serif font-bold text-white mb-6">Ready to Explore Mafia Island?</h2>
        <p class="text-xl text-teal-100 mb-8 max-w-3xl mx-auto">Let us help you plan an unforgettable adventure to Tanzania's marine paradise.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-4 bg-white text-teal-700 font-semibold rounded-full hover:bg-teal-50 transition-colors">
                <i class="ph ph-envelope mr-2"></i>
                Contact Us
            </a>
            <a href="{{ route('tours.index') }}" class="inline-flex items-center px-8 py-4 bg-teal-700 text-white font-semibold rounded-full hover:bg-teal-800 transition-colors">
                <i class="ph ph-map-trifold mr-2"></i>
                View Tours
            </a>
        </div>
    </div>
</section>
@endsection
