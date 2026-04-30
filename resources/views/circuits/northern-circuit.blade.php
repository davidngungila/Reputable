@extends('layouts.public')

@section('title', 'Northern Circuit - Tanzania\'s Premier Safari Destination')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 bg-cover bg-center" style="background-image: url('https://res.cloudinary.com/dqflffa1o/image/upload/v1777468771/tanzania-4149975_1920_j8h9ka.jpg');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative container mx-auto px-4 h-full flex items-center">
        <div class="text-white">
            <h1 class="text-5xl font-bold mb-4">Northern Circuit</h1>
            <p class="text-xl mb-6">Tanzania's Premier Safari Destination</p>
            <p class="max-w-2xl">Experience the world-famous wildlife destinations including Serengeti, Ngorongoro Crater, and Mount Kilimanjaro</p>
        </div>
    </div>
</section>

<!-- Breadcrumb -->
<section class="py-4 bg-gray-50">
    <div class="container mx-auto px-4">
        <nav class="flex text-sm">
            <a href="{{ route('destinations') }}" class="text-gray-600 hover:text-gray-900">Destinations</a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-gray-900 font-medium">Northern Circuit</span>
        </nav>
    </div>
</section>

<!-- Circuit Overview -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2">
                <h2 class="text-3xl font-bold mb-6">Explore Tanzania's Northern Circuit</h2>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    The Northern Circuit is Tanzania's most popular safari destination, home to some of Africa's most iconic wildlife reserves and natural wonders. This circuit offers unparalleled wildlife viewing opportunities, from the Great Migration in the Serengeti to the dense concentration of animals in the Ngorongoro Crater.
                </p>
                
                <div class="grid md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-emerald-50 p-6 rounded-lg">
                        <h3 class="font-bold text-emerald-800 mb-3">Best Time to Visit</h3>
                        <p class="text-emerald-700">June to October for dry season wildlife viewing, January to March for calving season</p>
                    </div>
                    <div class="bg-blue-50 p-6 rounded-lg">
                        <h3 class="font-bold text-blue-800 mb-3">Wildlife Highlights</h3>
                        <p class="text-blue-700">Big Five, Great Migration, tree-climbing lions, chimpanzees</p>
                    </div>
                </div>
            </div>
            
            <div>
                <div class="bg-gray-50 p-6 rounded-lg sticky top-6">
                    <h3 class="font-bold mb-4">Circuit Quick Facts</h3>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start">
                            <i class="ph ph-check-circle text-emerald-600 mr-2 mt-1"></i>
                            <span>Home to Mount Kilimanjaro - Africa's highest peak</span>
                        </li>
                        <li class="flex items-start">
                            <i class="ph ph-check-circle text-emerald-600 mr-2 mt-1"></i>
                            <span>Serengeti hosts the Great Migration</span>
                        </li>
                        <li class="flex items-start">
                            <i class="ph ph-check-circle text-emerald-600 mr-2 mt-1"></i>
                            <span>Ngorongoro Crater - World's largest volcanic caldera</span>
                        </li>
                        <li class="flex items-start">
                            <i class="ph ph-check-circle text-emerald-600 mr-2 mt-1"></i>
                            <span>Excellent infrastructure and accommodation options</span>
                        </li>
                        <li class="flex items-start">
                            <i class="ph ph-check-circle text-emerald-600 mr-2 mt-1"></i>
                            <span>Year-round wildlife viewing opportunities</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Destinations Grid -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4">Northern Circuit Destinations</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Explore the incredible destinations that make up Tanzania's Northern Circuit</p>
        </div>

        @if($destinations->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($destinations as $destination)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                @if(!empty($destination->images))
                <div class="h-64 bg-cover bg-center" style="background-image: url('{{ $destination->images[0] }}');">
                    <div class="h-full bg-gradient-to-t from-black/50 to-transparent flex items-end">
                        <div class="p-6 text-white">
                            <h3 class="text-2xl font-bold">{{ $destination->name }}</h3>
                        </div>
                    </div>
                </div>
                @else
                <div class="h-64 bg-gray-200 flex items-center justify-center">
                    <h3 class="text-2xl font-bold text-gray-700">{{ $destination->name }}</h3>
                </div>
                @endif
                
                <div class="p-6">
                    <p class="text-gray-600 mb-4">{{ Str::limit($destination->description, 120) }}</p>
                    
                    @if(!empty($destination->highlights))
                    <div class="mb-4">
                        <h4 class="font-semibold mb-2">Highlights:</h4>
                        <ul class="text-sm text-gray-600 space-y-1">
                            @foreach(array_slice($destination->highlights, 0, 3) as $highlight)
                            <li class="flex items-start">
                                <i class="ph ph-check text-emerald-600 mr-2 mt-0.5"></i>
                                {{ $highlight }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <div class="flex items-center justify-between">
                        <a href="{{ route('destinations.show', $destination->id) }}" class="text-emerald-600 hover:text-emerald-700 font-semibold">
                            Explore Destination →
                        </a>
                        @if($destination->best_time_to_visit)
                        <span class="text-xs text-gray-500">{{ $destination->best_time_to_visit }}</span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12">
            <div class="text-gray-400 text-6xl mb-4">
                <i class="ph ph-map-pin"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-700 mb-2">No destinations available yet</h3>
            <p class="text-gray-500">We're currently adding destinations to the Northern Circuit. Check back soon!</p>
        </div>
        @endif
    </div>
</section>

<!-- Related Tours -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Northern Circuit Tours</h2>
            <p class="text-gray-600">Discover our curated safari packages in the Northern Circuit</p>
        </div>
        
        <div class="text-center">
            <a href="/tours?destination=Northern+Circuit" class="inline-block px-8 py-4 bg-emerald-600 text-white font-bold rounded-full hover:bg-emerald-700 transition-colors">
                View Northern Circuit Tours
            </a>
        </div>
    </div>
</section>
@endsection
