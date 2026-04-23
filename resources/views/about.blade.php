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

                <hr class="border-slate-200 my-12">

                <h2 class="text-3xl font-serif font-black text-slate-900 mb-6">TANZANIA SAFARI HEALTH TIPS</h2>
                <p class="text-slate-600 leading-relaxed mb-4">
                    <strong>Vaccinations & Health Tips for an East Africa Safari (Complete 2026 Guide)</strong>
                </p>
                <p class="text-slate-600 leading-relaxed mb-6">
                    Planning a safari in East Africa is an unforgettable experience filled with breathtaking landscapes, incredible wildlife, and rich cultural encounters. However, before you begin your journey, it is essential to prepare properly—especially when it comes to your health.
                </p>
                <p class="text-slate-600 leading-relaxed mb-6">
                    Travelling to countries such as Tanzania, Kenya, Uganda, and Rwanda may require certain vaccinations depending on your travel history, transit routes, and specific destinations.
                </p>
                <p class="text-slate-600 leading-relaxed mb-8">
                    Proper preparation not only protects your health but also ensures that your safari experience is smooth, stress-free, and truly enjoyable. Visiting a travel clinic at least 6–8 weeks before departure gives you enough time to receive vaccinations, understand health risks, and get personalized advice tailored to your itinerary.
                </p>

                <h3 class="text-2xl font-serif font-black text-slate-900 mb-4">Important Disclaimer</h3>
                <p class="text-slate-600 leading-relaxed mb-8">
                    At Reputable Tours, your safety and well-being are our priority. However, we are not licensed medical professionals, and the information provided here is intended as general guidance only.
                </p>

                <h3 class="text-2xl font-serif font-black text-slate-900 mb-4">Are Vaccinations Required for East Africa?</h3>
                <p class="text-slate-600 leading-relaxed mb-4">
                    Understanding vaccination requirements is a key part of planning your safari. Many travellers are unsure which vaccines are mandatory and which are simply recommended.
                </p>
                <ul class="list-disc pl-6 text-slate-600 leading-relaxed mb-8">
                    <li class="mb-2">Required vaccinations are enforced by immigration authorities. Without proof, you may not be allowed to enter the country.</li>
                    <li class="mb-2">Recommended vaccinations are not checked at the border but are strongly advised to protect your health during travel.</li>
                </ul>

                <h3 class="text-2xl font-serif font-black text-slate-900 mb-4">Why Yellow Fever Matters</h3>
                <p class="text-slate-600 leading-relaxed mb-4">
                    Yellow Fever is the only vaccine that may be legally required when travelling within East Africa. This is because the region lies within or near areas where the disease can occur.
                </p>
                <ul class="list-disc pl-6 text-slate-600 leading-relaxed mb-8">
                    <li class="mb-2">Uganda requires all travellers to show proof of vaccination</li>
                    <li class="mb-2">Tanzania, Kenya, and Rwanda require it depending on your travel route</li>
                </ul>

                <h3 class="text-2xl font-serif font-black text-slate-900 mb-4">Recommended Vaccinations for Safari Travellers</h3>
                <ul class="list-disc pl-6 text-slate-600 leading-relaxed mb-8">
                    <li class="mb-2"><strong>Hepatitis A & B:</strong> These vaccines protect against infections that can be transmitted through contaminated food, water, or bodily fluids.</li>
                    <li class="mb-2"><strong>Typhoid:</strong> Typhoid fever is linked to unsafe food and water. While luxury safari lodges maintain high hygiene standards, travellers exploring local markets may face increased risk.</li>
                    <li class="mb-2"><strong>Tetanus (Tdap):</strong> Tetanus is caused by bacteria entering the body through cuts or wounds. Since safaris often involve outdoor activities, keeping your tetanus vaccination up to date is important.</li>
                    <li class="mb-2"><strong>Rabies:</strong> Rabies is rare but serious. It is recommended for travellers spending extended time outdoors, gorilla trekkers, and children.</li>
                </ul>

                <h3 class="text-2xl font-serif font-black text-slate-900 mb-4">Malaria Prevention: What You Need to Know</h3>
                <p class="text-slate-600 leading-relaxed mb-6">
                    Malaria is one of the most important health considerations for safari travellers. It is present in many parts of Tanzania, Kenya, Uganda, and Rwanda.
                </p>
                <p class="text-slate-600 leading-relaxed mb-8">
                    Medication should always be combined with regular use of insect repellent, wearing long clothing in the evenings, and sleeping in protected or screened accommodation.
                </p>

                <h3 class="text-2xl font-serif font-black text-slate-900 mb-4">When Should You Get Vaccinated?</h3>
                <p class="text-slate-600 leading-relaxed mb-8">
                    Timing is very important when preparing for travel. Ideally, visit a clinic 6–8 weeks before departure. Some vaccines require multiple doses over time, and the Yellow Fever vaccine must be taken at least 10 days before travel.
                </p>

                <h3 class="text-2xl font-serif font-black text-slate-900 mb-4">FREQUENTLY ASKED QUESTIONS ABOUT SAFARI VACCINATIONS</h3>
                <p class="text-slate-600 leading-relaxed font-semibold mb-4">Is it safe to go on safari without malaria tablets?</p>
                <p class="text-slate-600 leading-relaxed mb-8">
                    In general, it is not recommended to travel without malaria prevention medication. Malaria is present throughout the year in most safari regions across East Africa.
                </p>

                <p class="text-slate-600 leading-relaxed font-semibold mb-4">What happens if I forget my Yellow Fever card at immigration?</p>
                <p class="text-slate-600 leading-relaxed mb-8">
                    Forgetting your Yellow Fever certificate can lead to serious travel disruptions, including being required to receive the vaccine at the airport, being placed under quarantine, or being denied entry.
                </p>

                <hr class="border-slate-200 my-12">

                <h2 class="text-3xl font-serif font-black text-slate-900 mb-6">TIPPING ON SAFARI</h2>
                <p class="text-slate-600 leading-relaxed mb-6">
                    When planning your safari in East Africa, understanding the tipping culture is an important part of preparing for your journey. While tipping may vary around the world, in countries like Tanzania, Kenya, Uganda, and Rwanda, it plays a significant role in supporting the people who make your experience memorable.
                </p>

                <h3 class="text-2xl font-serif font-black text-slate-900 mb-4">Why is tipping important on safari?</h3>
                <p class="text-slate-600 leading-relaxed mb-8">
                    Tipping is an essential part of the tourism industry in East Africa. While safari guides, drivers, and camp staff are paid salaries, tips help them maintain a reasonable standard of living and support their families.
                </p>

                <h3 class="text-2xl font-serif font-black text-slate-900 mb-4">When should I give tips during my safari?</h3>
                <p class="text-slate-600 leading-relaxed mb-8">
                    Tipping is usually done at the end of your safari, often on the last day when you say goodbye to your guide and driver. For lodge or camp staff, many accommodations provide a shared tip box at reception.
                </p>

                <h3 class="text-2xl font-serif font-black text-slate-900 mb-4">How should I give tips?</h3>
                <ul class="list-disc pl-6 text-slate-600 leading-relaxed mb-8">
                    <li class="mb-2">Tips are typically given in cash (USD or local currency)</li>
                    <li class="mb-2">Place general staff tips in the camp or lodge tip box</li>
                    <li class="mb-2">Hand personal tips (such as for your guide) directly to the individual</li>
                </ul>

                <hr class="border-slate-200 my-12">

                <h2 class="text-3xl font-serif font-black text-slate-900 mb-6">PRIVACY POLICY</h2>
                <p class="text-slate-600 leading-relaxed mb-6">
                    At Reputable Tours, we understand that your privacy is important, and we are fully committed to protecting your personal information. When you interact with us—whether through our website, email, or during your travel planning—we want you to feel confident that your data is handled with care, respect, and transparency.
                </p>
                <p class="text-slate-600 leading-relaxed mb-6">
                    When you contact us, make an inquiry, or book a tour, we may collect certain personal details such as your name, email address, phone number, and travel preferences. In some cases, we may also collect additional information necessary to organize your trip, such as passport details or payment information.
                </p>
                <p class="text-slate-600 leading-relaxed mb-8">
                    The information we collect is primarily used to deliver and improve our services. This includes organizing your safari or travel experience, communicating with you about your booking, responding to your questions, and providing important updates related to your trip.
                </p>

                <hr class="border-slate-200 my-12">

                <h2 class="text-3xl font-serif font-black text-slate-900 mb-6">BOOKING TERMS AND CONDITIONS</h2>
                
                <h3 class="text-xl font-serif font-bold text-slate-900 mb-3">1. Our Contract</h3>
                <p class="text-slate-600 leading-relaxed mb-6">
                    All bookings are made with licensed operators in Tanzania, Kenya, or Uganda, trading as Reputable Tours. By confirming a booking with us, you acknowledge that you have read, understood, and agreed to these Booking Terms and Conditions.
                </p>

                <h3 class="text-xl font-serif font-bold text-slate-900 mb-3">2. Validity</h3>
                <p class="text-slate-600 leading-relaxed mb-6">
                    A booking is only considered valid once we have issued an official booking confirmation. Payment alone does not confirm your reservation.
                </p>

                <h3 class="text-xl font-serif font-bold text-slate-900 mb-3">3. Deposit Requirement</h3>
                <p class="text-slate-600 leading-relaxed mb-6">
                    To secure your reservation, a deposit is required. Please note that deposit amounts may vary depending on the specific tour or travel package selected.
                </p>

                <h3 class="text-xl font-serif font-bold text-slate-900 mb-3">4. Acceptance of Booking and Final Payments</h3>
                <p class="text-slate-600 leading-relaxed mb-6">
                    Once we accept your booking, we will send a confirmation via email, at which point a contract between you and us is established. The remaining balance must be paid before your departure date.
                </p>

                <h3 class="text-xl font-serif font-bold text-slate-900 mb-3">5. Prices and Surcharges</h3>
                <p class="text-slate-600 leading-relaxed mb-6">
                    Our tour prices are subject to seasonal and market-based variations. Once a quote is issued, the price will be secured only if the required deposit is paid before the quote expires.
                </p>

                <h3 class="text-xl font-serif font-bold text-slate-900 mb-3">6. Your Details</h3>
                <p class="text-slate-600 leading-relaxed mb-6">
                    To complete your booking, you must provide accurate personal information, including your full name as shown on your passport, date of birth, nationality, passport details, and any relevant medical conditions.
                </p>

                <h3 class="text-xl font-serif font-bold text-slate-900 mb-3">7. Health Requirements</h3>
                <p class="text-slate-600 leading-relaxed mb-6">
                    We are not medical professionals, and it is your responsibility to ensure that you are physically fit to participate in the trip. You should seek professional medical advice regarding vaccinations, health precautions, and travel requirements.
                </p>

                <h3 class="text-xl font-serif font-bold text-slate-900 mb-3">8. Travel Insurance</h3>
                <p class="text-slate-600 leading-relaxed mb-8">
                    We strongly recommend that all travellers obtain comprehensive travel insurance at the time of booking. Your policy should include coverage for medical expenses, personal accidents, emergency evacuation, and repatriation, with a recommended minimum coverage of USD 200,000.
                </p>

                <hr class="border-slate-200 my-12">

                <h2 class="text-3xl font-serif font-black text-slate-900 mb-6">PASSPORTS AND VISAS FOR TANZANIA</h2>
                <p class="text-slate-600 leading-relaxed mb-6">
                    All travellers visiting Tanzania are required to have a valid passport and, in most cases, a visa. Your passport must be valid for at least six months beyond your planned date of departure from Tanzania.
                </p>
                <p class="text-slate-600 leading-relaxed mb-6">
                    While Tanzania is a Commonwealth country, citizens of the United Kingdom, Australia, New Zealand, the United States, Canada, India, and most European Union countries require a tourist visa. Visa fees generally range around $50 USD, although US citizens may pay up to $100 USD.
                </p>

                <h3 class="text-xl font-serif font-bold text-slate-900 mb-3">Visas may be obtained in three ways:</h3>
                <ol class="list-decimal pl-6 text-slate-600 leading-relaxed mb-8">
                    <li class="mb-2"><strong>Online Application:</strong> You can apply for your Tanzanian visa in advance via the official Tanzania Immigration Services website</li>
                    <li class="mb-2"><strong>On Arrival at Kilimanjaro International Airport (JRO):</strong> While possible, this can involve long queues and delays</li>
                    <li class="mb-2"><strong>Tanzanian Embassies or High Commissions Abroad:</strong> Travellers can obtain their visa from Tanzanian diplomatic missions prior to travel</li>
                </ol>

                <p class="text-slate-600 leading-relaxed mb-8">
                    While we make every effort to provide accurate and current information, visa and passport requirements can change without notice. We strongly recommend that you verify the latest requirements with the nearest Tanzanian embassy before travel.
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
