@extends('layouts.public')

@section('title', 'Lake Manyara National Park - Tree-Climbing Lions & Rift Valley Views')

@section('content')
<div class="min-h-screen">
    <!-- Enhanced Hero Section -->
    <div class="relative h-screen max-h-[900px] overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1474511320723-9a56873867b5?auto=format&fit=crop&w=2000&q=80" 
                 alt="Lake Manyara National Park" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/70 to-black/90"></div>
        </div>
        
        <!-- Animated Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-10 w-32 h-32 bg-emerald-400/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-48 h-48 bg-blue-400/20 rounded-full blur-3xl animate-pulse delay-1000"></div>
            <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-white/10 rounded-full blur-2xl animate-pulse delay-500"></div>
        </div>
        
        <div class="relative container mx-auto px-4 h-full flex items-center justify-center">
            <div class="text-white max-w-5xl text-center">
                <!-- Premium Badge -->
                <div class="flex items-center justify-center gap-3 mb-6 flex-wrap">
                    <span class="px-4 py-2 bg-gradient-to-r from-emerald-500 to-blue-600 text-white rounded-full text-sm font-bold shadow-lg">
                        <i class="ph-bold ph-tree-evergreen mr-2"></i>LAKE MANYARA
                    </span>
                    <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-sm font-medium">
                        Northern Circuit Gem
                    </span>
                    <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-sm font-medium">
                        UNESCO Biosphere Reserve
                    </span>
                </div>
                
                <!-- Enhanced Title -->
                <h1 class="text-3xl md:text-4xl font-bold mb-6 leading-tight">
                    <span class="bg-gradient-to-r from-white to-emerald-200 bg-clip-text text-transparent">
                        Tree‑Climbing Lions & Rift Valley Views
                    </span>
                </h1>
                
                <!-- Enhanced Description -->
                <p class="text-xl text-white/90 mb-8 max-w-4xl mx-auto leading-relaxed">
                    Discover one of Tanzania's most scenic treasures - a smaller but incredibly diverse park 
                    famous for its unique tree-climbing lions, spectacular birdlife, and breathtaking 
                    Great Rift Valley escarpment views.
                </p>
                
                                
                <!-- Enhanced CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('tours.index', ['destination' => 'Manyara']) }}" 
                       class="px-8 py-4 bg-gradient-to-r from-emerald-500 to-blue-600 text-white rounded-xl font-bold text-lg hover:from-emerald-600 hover:to-blue-700 transition-all transform hover:scale-105 shadow-2xl">
                        <i class="ph-bold ph-binoculars mr-2"></i>Explore Tours
                    </a>
                    <button onclick="scrollToSection('highlights')" 
                            class="px-8 py-4 bg-white/20 backdrop-blur-sm text-white rounded-xl font-bold text-lg hover:bg-white/30 transition-all border border-white/30">
                        <i class="ph-bold ph-sparkle mr-2"></i>Discover Highlights
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white/60 animate-bounce">
            <i class="ph-bold ph-caret-double-down text-2xl"></i>
        </div>
    </div>

    <!-- Quick Info Section -->
    <section id="highlights" class="py-20 bg-gradient-to-br from-gray-50 to-emerald-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Why Visit Lake Manyara?
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Experience the unique blend of forest, lake, and savanna ecosystems that make this park 
                    a photographer's paradise and wildlife enthusiast's dream.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 hover:shadow-2xl transition-shadow">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-xl flex items-center justify-center text-white mb-6">
                        <i class="ph-bold ph-tree-evergreen text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Tree-Climbing Lions</h3>
                    <p class="text-gray-600 mb-4">
                        Witness the famous tree-climbing lions of Lake Manyara - a rare behavior found in 
                        only a few places in Africa. These magnificent predators often rest in acacia trees 
                        during the heat of the day.
                    </p>
                    <div class="flex items-center text-emerald-600 font-semibold">
                        <i class="ph-bold ph-star mr-2"></i>
                        Signature Experience
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 hover:shadow-2xl transition-shadow">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center text-white mb-6">
                        <i class="ph-bold ph-bird text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Bird Paradise</h3>
                    <p class="text-gray-600 mb-4">
                        Home to over 400 bird species including thousands of flamingos that create a 
                        spectacular pink carpet on the lake. Perfect for bird watching with species ranging 
                        from pelicans to kingfishers.
                    </p>
                    <div class="flex items-center text-blue-600 font-semibold">
                        <i class="ph-bold ph-camera mr-2"></i>
                        Photographer's Dream
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 hover:shadow-2xl transition-shadow">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-600 rounded-xl flex items-center justify-center text-white mb-6">
                        <i class="ph-bold ph-mountain text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Rift Valley Views</h3>
                    <p class="text-gray-600 mb-4">
                        Spectacular views of the Great Rift Valley escarpment rising dramatically from the 
                        lake shore. The contrasting landscapes of forest, lake, and mountain create 
                        breathtaking scenery.
                    </p>
                    <div class="flex items-center text-purple-600 font-semibold">
                        <i class="ph-bold ph-compass mr-2"></i>
                        Scenic Wonder
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Gallery Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Gallery & Experiences
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Immerse yourself in the beauty and diversity of Lake Manyara National Park
                </p>
            </div>
            
            @php
                $gallery = [
                    [
                        'url' => 'https://images.unsplash.com/photo-1474511320723-9a56873867b5?auto=format&fit=crop&w=1600&q=80',
                        'title' => 'Tree-Climbing Lions',
                        'description' => 'The famous lions resting in acacia trees'
                    ],
                    [
                        'url' => 'https://images.unsplash.com/photo-1528277342758-f1d7613953a2?auto=format&fit=crop&w=1600&q=80',
                        'title' => 'Flamingo Paradise',
                        'description' => 'Thousands of flamingos creating a pink spectacle'
                    ],
                    [
                        'url' => 'https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=1600&q=80',
                        'title' => 'Rift Valley Escarpment',
                        'description' => 'Dramatic views of the Great Rift Valley'
                    ],
                    [
                        'url' => 'https://images.unsplash.com/photo-1547471080-7cc2caa01a7e?auto=format&fit=crop&w=1600&q=80',
                        'title' => 'Forest Wildlife',
                        'description' => 'Diverse forest ecosystems and wildlife'
                    ],
                ];
            @endphp
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($gallery as $index => $image)
                <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all cursor-pointer" 
                     onclick="openGallery({{ $index }})">
                    <div class="aspect-w-16 aspect-h-12">
                        <img src="{{ $image['url'] }}" alt="{{ $image['title'] }}" 
                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                        <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                            <h4 class="font-bold text-lg">{{ $image['title'] }}</h4>
                            <p class="text-sm text-white/90">{{ $image['description'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Detailed Information Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-emerald-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <!-- Park Information -->
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-8">About Lake Manyara</h3>
                    <div class="space-y-6 text-gray-600">
                        <p class="text-lg leading-relaxed">
                            Lake Manyara National Park, though covering only 325 square kilometers, offers an 
                            incredible diversity of landscapes and wildlife. The park is nestled between the 
                            Great Rift Valley escarpment to the west and Lake Manyara to the east, creating 
                            a stunning natural amphitheater.
                        </p>
                        <p class="text-lg leading-relaxed">
                            The park's groundwater forest is fed by springs emerging from the base of the 
                            escarpment, creating a lush oasis that contrasts dramatically with the surrounding 
                            savanna. This unique ecosystem supports an extraordinary variety of wildlife and 
                            birdlife.
                        </p>
                        <p class="text-lg leading-relaxed">
                            What makes Lake Manyara truly special is its accessibility and the concentration 
                            of wildlife in a relatively small area. Visitors can expect to see elephants, 
                            buffalo, wildebeest, zebra, and of course, the famous tree-climbing lions all 
                            in a single day.
                        </p>
                    </div>
                </div>
                
                <!-- Key Features -->
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-8">Key Features</h3>
                    <div class="space-y-6">
                        <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="ph-bold ph-tree-evergreen text-emerald-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 mb-2">Groundwater Forest</h4>
                                    <p class="text-gray-600">Lush evergreen forest fed by natural springs, home to diverse wildlife including elephants and baboons.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="ph-bold ph-drop text-blue-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 mb-2">Alkaline Lake</h4>
                                    <p class="text-gray-600">The shallow alkaline lake supports vast flocks of flamingos and other water birds throughout the year.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="ph-bold ph-mountain text-purple-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 mb-2">Rift Valley Escarpment</h4>
                                    <p class="text-gray-600">Dramatic 600-meter high escarpment providing breathtaking views and diverse habitats.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="ph-bold ph-binoculars text-orange-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 mb-2">Hippo Pools</h4>
                                    <p class="text-gray-600">Several hippo pools where you can observe these magnificent creatures in their natural habitat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Practical Information -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Plan Your Visit
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Everything you need to know for an unforgettable Lake Manyara experience
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-2xl p-8 border border-emerald-200">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-emerald-600 rounded-lg flex items-center justify-center text-white mr-4">
                            <i class="ph-bold ph-calendar-check text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Best Time to Visit</h3>
                    </div>
                    <div class="space-y-4 text-gray-700">
                        <div>
                            <h4 class="font-semibold text-emerald-800 mb-2">Dry Season (June - October)</h4>
                            <p class="text-sm">Peak wildlife viewing, animals congregate at water sources, clear skies for photography.</p>
                        </div>
                        <div>
                            <h4 class="font-semibold text-emerald-800 mb-2">Wet Season (November - May)</h4>
                            <p class="text-sm">Lush landscapes, excellent birding, fewer crowds, dramatic scenery.</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8 border border-blue-200">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center text-white mr-4">
                            <i class="ph-bold ph-activity text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Top Activities</h3>
                    </div>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-center">
                            <i class="ph-bold ph-check-circle text-blue-600 mr-3"></i>
                            Game drives through diverse habitats
                        </li>
                        <li class="flex items-center">
                            <i class="ph-bold ph-check-circle text-blue-600 mr-3"></i>
                            Bird watching at the lake shores
                        </li>
                        <li class="flex items-center">
                            <i class="ph-bold ph-check-circle text-blue-600 mr-3"></i>
                            Hippo pool viewing
                        </li>
                        <li class="flex items-center">
                            <i class="ph-bold ph-check-circle text-blue-600 mr-3"></i>
                            Canoeing on the lake (seasonal)
                        </li>
                        <li class="flex items-center">
                            <i class="ph-bold ph-check-circle text-blue-600 mr-3"></i>
                            Cultural village visits
                        </li>
                    </ul>
                </div>
                
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-8 border border-purple-200">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center text-white mr-4">
                            <i class="ph-bold ph-road-horizon text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Getting There</h3>
                    </div>
                    <div class="space-y-4 text-gray-700">
                        <div>
                            <h4 class="font-semibold text-purple-800 mb-2">By Road</h4>
                            <p class="text-sm">2-hour drive from Arusha (126km). Easy day trip or overnight stay.</p>
                        </div>
                        <div>
                            <h4 class="font-semibold text-purple-800 mb-2">By Air</h4>
                            <p class="text-sm">Charter flights to Lake Manyara airstrip available from Arusha or Kilimanjaro.</p>
                        </div>
                        <div>
                            <h4 class="font-semibold text-purple-800 mb-2">Park Gates</h4>
                            <p class="text-sm">Main gate open daily 6:00 AM - 6:00 PM. Entrance fees apply.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-emerald-600 to-blue-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Ready for Your Lake Manyara Adventure?
            </h2>
            <p class="text-xl text-white/90 mb-8 max-w-3xl mx-auto">
                Discover our carefully crafted tours that showcase the best of Lake Manyara National Park, 
                from tree-climbing lions to spectacular birdlife and breathtaking Rift Valley views.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('tours.index', ['destination' => 'Manyara']) }}" 
                   class="px-8 py-4 bg-white text-emerald-600 rounded-xl font-bold text-lg hover:bg-gray-100 transition-all transform hover:scale-105 shadow-2xl">
                    <i class="ph-bold ph-binoculars mr-2"></i>View Lake Manyara Tours
                </a>
                <a href="{{ route('inquiries.create') }}?tour_id=2" 
                   class="px-8 py-4 bg-white/20 backdrop-blur-sm text-white rounded-xl font-bold text-lg hover:bg-white/30 transition-all border border-white/30">
                    <i class="ph-bold ph-chat-dots mr-2"></i>Plan Custom Safari
                </a>
            </div>
        </div>
    </section>
</div>

<!-- Gallery Modal -->
<div id="galleryModal" class="fixed inset-0 bg-black/90 z-50 hidden flex items-center justify-center p-4">
    <div class="relative max-w-6xl w-full">
        <button onclick="closeGallery()" class="absolute top-4 right-4 text-white text-3xl hover:text-gray-300 z-10">
            <i class="ph-bold ph-x"></i>
        </button>
        <img id="modalImage" src="" alt="" class="w-full h-auto rounded-lg">
        <div class="text-center mt-4 text-white">
            <h3 id="modalTitle" class="text-2xl font-bold mb-2"></h3>
            <p id="modalDescription" class="text-lg text-white/80"></p>
        </div>
    </div>
</div>

<script>
// Gallery functionality
const galleryImages = @json($gallery);

function openGallery(index) {
    const modal = document.getElementById('galleryModal');
    const image = document.getElementById('modalImage');
    const title = document.getElementById('modalTitle');
    const description = document.getElementById('modalDescription');
    
    image.src = galleryImages[index].url;
    title.textContent = galleryImages[index].title;
    description.textContent = galleryImages[index].description;
    
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeGallery() {
    const modal = document.getElementById('galleryModal');
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Smooth scroll
function scrollToSection(sectionId) {
    const section = document.getElementById(sectionId);
    if (section) {
        section.scrollIntoView({ behavior: 'smooth' });
    }
}

// Close modal on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeGallery();
    }
});

// Close modal on background click
document.getElementById('galleryModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeGallery();
    }
});
</script>
@endsection
