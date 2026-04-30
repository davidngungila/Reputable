@extends('layouts.public')

@section('title', 'Game Drives - Wildlife Safari Adventures')

@section('content')
<div class="pt-24">
    <!-- Hero Section -->
    <section class="relative h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468778/Wildbeest_Migration_vnkbqc.jpg" 
                 class="w-full h-full object-cover" alt="Game Drives Safari">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900/80 to-slate-900/60"></div>
        </div>
        <div class="relative z-10 text-center px-6">
            <h1 class="text-5xl md:text-7xl font-serif font-black text-white mb-6 border-move">Game Drives</h1>
            <p class="text-xl text-emerald-50/90 max-w-2xl mx-auto">Experience the thrill of wildlife safaris in Tanzania's most spectacular national parks</p>
            <div class="mt-8">
                <a href="/contact" class="inline-flex items-center gap-3 px-8 py-4 bg-emerald-600 text-white font-bold rounded-full hover:bg-emerald-700 transition-colors">
                    Book Your Safari <i class="ph-bold ph-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Overview Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-4xl font-serif font-black text-slate-900 mb-6">Unforgettable Wildlife Encounters</h2>
                    <p class="text-lg text-slate-600 mb-8 leading-relaxed">
                        Embark on thrilling game drives through Tanzania's world-renowned national parks. Witness the Big Five in their natural habitat, experience the Great Migration, and create memories that will last a lifetime.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                                <i class="ph-bold ph-binoculars text-emerald-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">Expert Guides</h3>
                                <p class="text-sm text-slate-600">Professional safari guides with deep knowledge</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                                <i class="ph-bold ph-clock text-emerald-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">Flexible Duration</h3>
                                <p class="text-sm text-slate-600">Half-day to multi-day safari options</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                                <i class="ph-bold ph-camera text-emerald-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">Photography Paradise</h3>
                                <p class="text-sm text-slate-600">Perfect opportunities for wildlife photography</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468788/Zeebraaa_cpydg9.jpg" 
                         class="rounded-2xl shadow-2xl" alt="Safari Vehicle">
                    <div class="absolute -bottom-6 -right-6 bg-emerald-600 text-white p-6 rounded-2xl shadow-xl">
                        <p class="text-3xl font-black">95%</p>
                        <p class="text-sm font-bold">Wildlife Sightings Success Rate</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Parks Section -->
    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif font-black text-slate-900 mb-4">Premier Safari Destinations</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Explore Tanzania's most famous national parks and conservation areas</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Serengeti -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                    <div class="relative h-48">
                        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468787/Zebra_herd_snsutd.jpg" 
                             class="w-full h-full object-cover" alt="Serengeti">
                        <div class="absolute top-4 right-4 bg-emerald-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                            Most Popular
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">Serengeti National Park</h3>
                        <p class="text-slate-600 mb-4">Home to the Great Migration and abundant wildlife year-round.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-xs font-medium">Big Five</span>
                            <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-medium">Great Migration</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Year-round</span>
                        </div>
                        <a href="/tours?destination=serengeti" class="inline-flex items-center gap-2 text-emerald-600 font-bold hover:text-emerald-700 transition-colors">
                            Explore Serengeti <i class="ph ph-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Ngorongoro -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                    <div class="relative h-48">
                        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468784/wildebeest-migration-2322111_1920_zvehye.jpg" 
                             class="w-full h-full object-cover" alt="Ngorongoro">
                        <div class="absolute top-4 right-4 bg-orange-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                            UNESCO Site
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">Ngorongoro Crater</h3>
                        <p class="text-slate-600 mb-4">World's largest unbroken caldera with dense wildlife populations.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-xs font-medium">Big Five</span>
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">Crater</span>
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">Rhino Sanctuary</span>
                        </div>
                        <a href="/tours?destination=ngorongoro" class="inline-flex items-center gap-2 text-emerald-600 font-bold hover:text-emerald-700 transition-colors">
                            Explore Ngorongoro <i class="ph ph-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Tarangire -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                    <div class="relative h-48">
                        <img src="https://res.cloudinary.com/dqflffa1o/image/upload/v1777468777/warthog-6605830_1920_f8rvu8.jpg" 
                             class="w-full h-full object-cover" alt="Tarangire">
                        <div class="absolute top-4 right-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                            Elephant Paradise
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">Tarangire National Park</h3>
                        <p class="text-slate-600 mb-4">Famous for its large elephant herds and ancient baobab trees.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-xs font-medium">Elephants</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Baobabs</span>
                            <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-medium">Dry Season</span>
                        </div>
                        <a href="/tours?destination=tarangire" class="inline-flex items-center gap-2 text-emerald-600 font-bold hover:text-emerald-700 transition-colors">
                            Explore Tarangire <i class="ph ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Safari Options Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif font-black text-slate-900 mb-4">Safari Experience Options</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Choose the perfect safari adventure for your interests and schedule</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Morning Game Drive -->
                <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-2xl p-8 border border-orange-100">
                    <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mb-6">
                        <i class="ph-bold ph-sun text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Morning Game Drive</h3>
                    <p class="text-slate-600 mb-6">Start at dawn when predators are most active. Perfect for wildlife photography.</p>
                    <ul class="space-y-2 text-slate-600 mb-6">
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-orange-600"></i>
                            <span>6:00 AM - 10:00 AM</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-orange-600"></i>
                            <span>Best predator sightings</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-orange-600"></i>
                            <span>Golden hour photography</span>
                        </li>
                    </ul>
                    <div class="text-3xl font-black text-orange-600 mb-4">$150<span class="text-lg font-normal text-slate-600">/person</span></div>
                    <a href="/contact" class="w-full block text-center px-6 py-3 bg-orange-600 text-white font-bold rounded-xl hover:bg-orange-700 transition-colors">
                        Book Morning Drive
                    </a>
                </div>

                <!-- Full Day Safari -->
                <div class="bg-gradient-to-br from-emerald-50 to-green-50 rounded-2xl p-8 border border-emerald-100">
                    <div class="w-16 h-16 bg-emerald-600 rounded-full flex items-center justify-center mb-6">
                        <i class="ph-bold ph-sun-horizon text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Full Day Safari</h3>
                    <p class="text-slate-600 mb-6">Comprehensive safari experience with picnic lunch in the wilderness.</p>
                    <ul class="space-y-2 text-slate-600 mb-6">
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-emerald-600"></i>
                            <span>6:00 AM - 6:00 PM</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-emerald-600"></i>
                            <span>Picnic lunch included</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-emerald-600"></i>
                            <span>Maximum wildlife coverage</span>
                        </li>
                    </ul>
                    <div class="text-3xl font-black text-emerald-600 mb-4">$280<span class="text-lg font-normal text-slate-600">/person</span></div>
                    <a href="/contact" class="w-full block text-center px-6 py-3 bg-emerald-600 text-white font-bold rounded-xl hover:bg-emerald-700 transition-colors">
                        Book Full Day Safari
                    </a>
                </div>

                <!-- Night Game Drive -->
                <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-8 border border-indigo-100">
                    <div class="w-16 h-16 bg-indigo-600 rounded-full flex items-center justify-center mb-6">
                        <i class="ph-bold ph-moon text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Night Game Drive</h3>
                    <p class="text-slate-600 mb-6">Experience nocturnal wildlife activity with specialized spotlights.</p>
                    <ul class="space-y-2 text-slate-600 mb-6">
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-indigo-600"></i>
                            <span>7:00 PM - 10:00 PM</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-indigo-600"></i>
                            <span>Nocturnal predators</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-indigo-600"></i>
                            <span>Unique wildlife experience</span>
                        </li>
                    </ul>
                    <div class="text-3xl font-black text-indigo-600 mb-4">$180<span class="text-lg font-normal text-slate-600">/person</span></div>
                    <a href="/contact" class="w-full block text-center px-6 py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 transition-colors">
                        Book Night Drive
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-gradient-to-r from-emerald-600 to-teal-600">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-serif font-black text-white mb-6">Ready for Your Safari Adventure?</h2>
            <p class="text-xl text-emerald-50 mb-8">Let our expert guides create the perfect wildlife experience for you</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="px-8 py-4 bg-white text-emerald-600 font-bold rounded-full hover:bg-gray-100 transition-colors">
                    Plan Your Safari
                </a>
                <a href="/tours" class="px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-emerald-600 transition-colors">
                    View All Tours
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
