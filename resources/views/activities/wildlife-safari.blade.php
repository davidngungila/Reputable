@extends('layouts.public')

@section('title', 'Wildlife Safari - Tanzania Safari Experience')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 bg-cover bg-center" style="background-image: url('https://res.cloudinary.com/dqflffa1o/image/upload/v1777468788/Zeebraaa_cpydg9.jpg');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative container mx-auto px-4 h-full flex items-center">
        <div class="text-white">
            <h1 class="text-5xl font-bold mb-4">Wildlife Safari</h1>
            <p class="text-xl mb-6">Experience Tanzania's Incredible Wildlife</p>
            <p class="max-w-2xl">Embark on unforgettable wildlife adventures in Tanzania's world-renowned national parks and game reserves</p>
        </div>
    </div>
</section>

<!-- Breadcrumb -->
<section class="py-4 bg-gray-50">
    <div class="container mx-auto px-4">
        <nav class="flex text-sm">
            <a href="{{ route('things-to-do') }}" class="text-gray-600 hover:text-gray-900">Things to Do</a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-gray-900 font-medium">Wildlife Safari</span>
        </nav>
    </div>
</section>

<!-- Activity Overview -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2">
                <h2 class="text-3xl font-bold mb-6">Wildlife Safari Adventures</h2>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    Tanzania is home to some of Africa's most spectacular wildlife destinations. From the endless plains of the Serengeti to the dense concentration of animals in the Ngorongoro Crater, wildlife safaris in Tanzania offer unparalleled opportunities to see the Big Five and witness the Great Migration.
                </p>
                
                <div class="grid md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-emerald-50 p-6 rounded-lg">
                        <h3 class="font-bold text-emerald-800 mb-3">Best Time to Visit</h3>
                        <p class="text-emerald-700">June to October for dry season game viewing, January to March for Great Migration calving season</p>
                    </div>
                    <div class="bg-blue-50 p-6 rounded-lg">
                        <h3 class="font-bold text-blue-800 mb-3">Wildlife Highlights</h3>
                        <p class="text-blue-700">Big Five, Great Migration, tree-climbing lions, cheetahs, elephants, diverse birdlife</p>
                    </div>
                </div>
            </div>
            
            <div>
                <div class="bg-gray-50 p-6 rounded-lg sticky top-6">
                    <h3 class="font-bold mb-4">Safari Quick Facts</h3>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start">
                            <i class="ph ph-check-circle text-emerald-600 mr-2 mt-1"></i>
                            <span>Home to the Great Migration</span>
                        </li>
                        <li class="flex items-start">
                            <i class="ph ph-check-circle text-emerald-600 mr-2 mt-1"></i>
                            <span>Big Five wildlife viewing</span>
                        </li>
                        <li class="flex items-start">
                            <i class="ph ph-check-circle text-emerald-600 mr-2 mt-1"></i>
                            <span>World-class game reserves</span>
                        </li>
                        <li class="flex items-start">
                            <i class="ph ph-check-circle text-emerald-600 mr-2 mt-1"></i>
                            <span>Expert safari guides</span>
                        </li>
                        <li class="flex items-start">
                            <i class="ph ph-check-circle text-emerald-600 mr-2 mt-1"></i>
                            <span>Year-round wildlife viewing</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Safari Experiences -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4">Safari Experiences</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Discover the different types of wildlife safaris available in Tanzania</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <div class="h-48 bg-cover bg-center" style="background-image: url('https://res.cloudinary.com/dqflffa1o/image/upload/v1777468776/Wildbeest_Migration_vnkbqc.jpg');">
                    <div class="h-full bg-gradient-to-t from-black/50 to-transparent flex items-end">
                        <div class="p-6 text-white">
                            <h3 class="text-xl font-bold">Game Drives</h3>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">Classic 4x4 game drives through Tanzania's premier national parks with expert guides.</p>
                    <ul class="text-sm text-gray-600 space-y-2 mb-4">
                        <li>• Morning and evening drives</li>
                        <li>• Expert wildlife guides</li>
                        <li>• Comfortable 4x4 vehicles</li>
                    </ul>
                    <div class="flex items-center justify-between">
                        <span class="text-emerald-600 font-semibold">Daily Available</span>
                        <span class="text-sm text-gray-500">All Parks</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <div class="h-48 bg-cover bg-center" style="background-image: url('https://res.cloudinary.com/dqflffa1o/image/upload/v1777468774/Untitled-1_cyaxx1.jpg');">
                    <div class="h-full bg-gradient-to-t from-black/50 to-transparent flex items-end">
                        <div class="p-6 text-white">
                            <h3 class="text-xl font-bold">Walking Safaris</h3>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">Experience the African bush on foot with armed guides for intimate wildlife encounters.</p>
                    <ul class="text-sm text-gray-600 space-y-2 mb-4">
                        <li>• Professional armed guides</li>
                        <li>• Close wildlife encounters</li>
                        <li>• Learn about flora and fauna</li>
                    </ul>
                    <div class="flex items-center justify-between">
                        <span class="text-emerald-600 font-semibold">Half/Full Day</span>
                        <span class="text-sm text-gray-500">Selected Areas</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <div class="h-48 bg-cover bg-center" style="background-image: url('https://res.cloudinary.com/dqflffa1o/image/upload/v1777468775/Wildbeest_Migration_vnkbqc.jpg');">
                    <div class="h-full bg-gradient-to-t from-black/50 to-transparent flex items-end">
                        <div class="p-6 text-white">
                            <h3 class="text-xl font-bold">Night Safaris</h3>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">Discover nocturnal wildlife and predators on exciting night game drives.</p>
                    <ul class="text-sm text-gray-600 space-y-2 mb-4">
                        <li>• Spotlight wildlife viewing</li>
                        <li>• Nocturnal animal encounters</li>
                        <li>• Professional night guides</li>
                    </ul>
                    <div class="flex items-center justify-between">
                        <span class="text-emerald-600 font-semibold">Evening</span>
                        <span class="text-sm text-gray-500">Selected Parks</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Top Safari Destinations -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Top Safari Destinations</h2>
            <p class="text-gray-600">Explore Tanzania's premier wildlife destinations</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="text-center">
                <div class="bg-emerald-100 rounded-lg p-6 mb-4">
                    <i class="ph ph-tree text-4xl text-emerald-600"></i>
                </div>
                <h3 class="font-bold mb-2">Serengeti</h3>
                <p class="text-sm text-gray-600">Great Migration & Big Five</p>
            </div>
            <div class="text-center">
                <div class="bg-blue-100 rounded-lg p-6 mb-4">
                    <i class="ph ph-mountain text-4xl text-blue-600"></i>
                </div>
                <h3 class="font-bold mb-2">Ngorongoro</h3>
                <p class="text-sm text-gray-600">Crater & Black Rhinos</p>
            </div>
            <div class="text-center">
                <div class="bg-orange-100 rounded-lg p-6 mb-4">
                    <i class="ph ph-tree text-4xl text-orange-600"></i>
                </div>
                <h3 class="font-bold mb-2">Tarangire</h3>
                <p class="text-sm text-gray-600">Elephants & Baobabs</p>
            </div>
            <div class="text-center">
                <div class="bg-purple-100 rounded-lg p-6 mb-4">
                    <i class="ph ph-bird text-4xl text-purple-600"></i>
                </div>
                <h3 class="font-bold mb-2">Lake Manyara</h3>
                <p class="text-sm text-gray-600">Tree Lions & Flamingos</p>
            </div>
        </div>
    </div>
</section>

<!-- Related Tours -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Wildlife Safari Tours</h2>
            <p class="text-gray-600">Discover our curated safari packages for wildlife viewing</p>
        </div>
        
        <div class="text-center">
            <a href="/activity/wildlife-safari" class="inline-block px-8 py-4 bg-emerald-600 text-white font-bold rounded-full hover:bg-emerald-700 transition-colors">
                View Wildlife Safari Tours
            </a>
        </div>
    </div>
</section>
@endsection
