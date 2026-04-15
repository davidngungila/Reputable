@extends('layouts.public')

@section('content')
<div class="pt-24">
    <!-- Hero Section -->
    <section class="relative h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://res.cloudinary.com/dmqdm8gfk/image/upload/v1766042771/8-Days-Tanzania-holiday-Wildebeest-migration-1536x1018_gyndkw.jpg" 
                 class="w-full h-full object-cover scale-105" alt="Serengeti Sunset">
            <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-[2px]"></div>
        </div>
        
        <div class="relative z-10 text-center px-6 max-w-4xl mx-auto">
            <span class="inline-block px-4 py-1.5 bg-emerald-500 text-white text-[10px] font-black uppercase tracking-[0.3em] rounded-full mb-6 shadow-xl shadow-emerald-500/20">Our Story</span>
            <h1 class="text-5xl md:text-7xl font-serif font-black text-white mb-6 leading-tight border-move">About <span class="text-emerald-400 italic">Reputable Tours</span></h1>
            <p class="text-lg md:text-xl text-emerald-50/80 font-medium leading-relaxed max-w-2xl mx-auto">
                A proudly Tanzanian, locally owned tour company dedicated to delivering authentic and unforgettable travel experiences.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-24 bg-white">
        <div class="max-w-4xl mx-auto px-6">
            <div class="prose prose-lg max-w-none">
                <h2 class="text-3xl font-serif font-black text-slate-900 mb-6">About Us</h2>
                
                <p class="text-slate-600 leading-relaxed mb-6">
                    Reputable Tours is a proudly Tanzanian, locally owned tour company dedicated to delivering authentic and unforgettable travel experiences. We specialize in wildlife safaris, mountain trekking and hiking, cultural tours, nature exploration, and relaxing beach holidays.
                </p>
                
                <p class="text-slate-600 leading-relaxed mb-6">
                    With a deep passion for our country and its natural beauty, we offer carefully curated journeys that showcase Tanzania in its most untouched and breathtaking form. Our commitment to professionalism, integrity, and attention to detail ensures every trip is seamless, enriching, and truly stress-free.
                </p>
                
                <p class="text-slate-600 leading-relaxed mb-8">
                    At Reputable Tours, we don't just plan trips—we create meaningful experiences built on trust, reliability, and genuine hospitality.
                </p>
                
                <hr class="border-slate-200 my-12">
                
                <h3 class="text-2xl font-serif font-black text-slate-900 mb-4">Mission</h3>
                <p class="text-slate-600 leading-relaxed mb-8">
                    Our mission is to provide exceptional and authentic travel experiences through a high standard of professionalism, honesty, and dedication. We are committed to delivering outstanding customer care to both local and international travellers, ensuring every journey is memorable, safe, and personalized. Professionalism is at the heart of everything we do.
                </p>
                
                <h3 class="text-2xl font-serif font-black text-slate-900 mb-4">Vision</h3>
                <p class="text-slate-600 leading-relaxed mb-8">
                    Our vision is to become a leading tour operator in Tanzania, recognized for our professionalism, customer loyalty, and excellence in service. We strive to promote sustainable tourism by preserving nature, enhancing customer satisfaction, and contributing positively to local communities.
                </p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 bg-emerald-950 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <img src="https://res.cloudinary.com/dmqdm8gfk/image/upload/v1766262401/beautiful-scenery-amazing-breathtaking-large-waterfalls-wild.jpg" class="w-full h-full object-cover">
        </div>
        <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
            <h2 class="text-4xl md:text-5xl font-serif font-bold text-white mb-8">Ready to Experience Tanzania?</h2>
            <p class="text-xl text-emerald-100/70 mb-12">Let us create your perfect Tanzanian adventure with professionalism and care.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                <a href="/contact" class="px-10 py-5 bg-emerald-500 text-white font-black text-xs uppercase tracking-[0.2em] rounded-full hover:bg-emerald-400 shadow-xl shadow-emerald-500/20 transition-all">Start Planning</a>
                <a href="/tours" class="px-10 py-5 bg-white/5 backdrop-blur-md border border-white/20 text-white font-black text-xs uppercase tracking-[0.2em] rounded-full hover:bg-white/10 transition-all">Explore Tours</a>
            </div>
        </div>
    </section>
</div>
@endsection
