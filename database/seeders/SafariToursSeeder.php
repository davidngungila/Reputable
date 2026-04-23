<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tour;
use App\Models\Itinerary;
use Illuminate\Support\Str;

class SafariToursSeeder extends Seeder
{
    public function run(): void
    {
        // Create 6 Days Safari Tour
        $sixDaysSafari = Tour::create([
            'name' => '6 DAYS SAFARI (TARANGIRE, NGORONGORO & SERENGETI)',
            'slug' => '6-days-safari-tarangire-ngorongoro-serengeti',
            'description' => 'Experience the best of Tanzania\'s northern circuit in 6 days. This comprehensive safari takes you through Tarangire National Park, Ngorongoro Crater, and the vast Serengeti plains with optional hot air balloon safari.',
            'location' => 'Tarangire, Ngorongoro, Serengeti',
            'duration_days' => 6,
            'base_price' => 2850,
            'international_price_min' => 2850,
            'international_price_max' => 3500,
            'best_season' => 'June to October, December to March',
            'images' => [
                'https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1547471080-7cc2caa01a7e?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1517849845537-4d257902454a?auto=format&fit=crop&w=800&q=80'
            ],
            'inclusions' => [
                'Airport transfers',
                'Accommodation as specified',
                'All meals as indicated (B=Breakfast, L=Lunch, D=Dinner)',
                'Game drives as specified',
                'Park fees',
                'Professional English-speaking safari guide',
                '4x4 safari vehicle with pop-up roof',
                'Hot air balloon safari (Day 3)',
                'Drinking water during game drives'
            ],
            'exclusions' => [
                'International flights',
                'Travel insurance',
                'Visa fees',
                'Personal expenses',
                'Tips and gratuities',
                'Alcoholic beverages',
                'Cultural walks and walking safaris',
                'Night game drives',
                'Maasai village visits',
                'Olduvai Gorge Museum visits'
            ],
            'package_destinations' => ['Tarangire', 'Ngorongoro', 'Serengeti'],
            'target_markets' => ['International', 'Adventure', 'Wildlife', 'Photography'],
            'interactive_features' => [
                'hot_air_balloon' => true,
                'cultural_visits' => false,
                'walking_safari' => false,
                'night_game_drives' => false
            ],
            'addons' => [
                'Cultural walks' => 50,
                'Walking safari' => 75,
                'Traditional lunch' => 35,
                'Night game drive' => 85,
                'Treetop walkway' => 45,
                'Canoeing safari' => 40
            ],
            'conversion_triggers' => [
                'hot_air_balloon_included',
                'big_five_guaranteed',
                'experienced_guides',
                'mid_range_accommodation'
            ],
            'featured' => true,
            'status' => 'active'
        ]);

        // Create itineraries for 6 Days Safari
        $this->createSixDaysSafariItinerary($sixDaysSafari->id);

        // Create 9 Days Great Migration Safari Tour
        $nineDaysSafari = Tour::create([
            'name' => '9 DAYS GREAT MIGRATION SAFARI',
            'slug' => '9-days-great-migration-safari',
            'description' => 'Follow the Great Migration route across Tanzania\'s most spectacular landscapes. This 9-day adventure takes you from Tarangire through Lake Manyara, Lake Natron, Ngorongoro Crater, to the vast Serengeti plains.',
            'location' => 'Tarangire, Lake Manyara, Lake Natron, Ngorongoro, Serengeti',
            'duration_days' => 9,
            'base_price' => 4200,
            'international_price_min' => 4200,
            'international_price_max' => 5200,
            'best_season' => 'July to October for migration, August to October for flamingos',
            'images' => [
                'https://images.unsplash.com/photo-1547471080-7cc2caa01a7e?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1517849845537-4d257902454a?auto=format&fit=crop&w=800&q=80'
            ],
            'inclusions' => [
                'Airport transfers',
                'Accommodation as specified',
                'All meals as indicated (B=Breakfast, L=Lunch, D=Dinner)',
                'Game drives as specified',
                'Park fees',
                'Professional English-speaking safari guide',
                '4x4 safari vehicle with pop-up roof',
                'Cultural guided activities at Lake Natron',
                'Flight to Zanzibar (Day 9)',
                'Drinking water during game drives'
            ],
            'exclusions' => [
                'International flights',
                'Travel insurance',
                'Visa fees',
                'Personal expenses',
                'Tips and gratuities',
                'Alcoholic beverages',
                'Oldoinyo Lengai trek',
                'Hot air balloon safari',
                'Hot bush lunch',
                'Maasai boma visits'
            ],
            'package_destinations' => ['Tarangire', 'Lake Manyara', 'Lake Natron', 'Ngorongoro', 'Serengeti'],
            'target_markets' => ['International', 'Adventure', 'Migration', 'Photography', 'Cultural'],
            'interactive_features' => [
                'hot_air_balloon' => false,
                'cultural_visits' => true,
                'walking_safari' => true,
                'night_game_drives' => false
            ],
            'addons' => [
                'Walking safari' => 75,
                'Night game drive' => 85,
                'Cultural walks' => 50,
                'Traditional lunch' => 35,
                'Treetop walkway' => 45,
                'Canoeing safari' => 40,
                'Hot air balloon safari' => 550,
                'Hot bush lunch' => 85,
                'Olduvai Gorge Museum' => 35,
                'Maasai village visit' => 45
            ],
            'conversion_triggers' => [
                'great_migration_tracking',
                'lake_natron_flamingos',
                'cultural_immersion',
                'diverse_landscapes',
                'flight_to_zanzibar'
            ],
            'featured' => true,
            'status' => 'active'
        ]);

        // Create itineraries for 9 Days Safari
        $this->createNineDaysSafariItinerary($nineDaysSafari->id);
    }

    private function createSixDaysSafariItinerary($tourId): void
    {
        $itineraries = [
            [
                'day_number' => 0,
                'title' => 'Arrival and Briefing',
                'description' => 'Direct arrival at Kilimanjaro airport then transferred for you to reach your base lodge in time for a pre-safari briefing with your Safari guide and overnight. Accommodation: Meru view lodge - Mid-range lodge, Arusha, outside of park. Meals: Dinner. Activities: Airport transfer, pre-safari briefing. Driving time: 1 hour to Arusha.',
                'accommodation' => 'Meru view lodge - Mid-range lodge, Arusha, outside of park',
                'meals' => 'Dinner'
            ],
            [
                'day_number' => 1,
                'title' => 'Tarangire National Park',
                'description' => 'Proceed to Tarangire National Park for a game drive. Later drive to Karatu for an overnight. Accommodation: Farm of Dreams Lodge - Mid-range lodge, Karatu, just outside of the park. Meals: Breakfast, picnic lunch, dinner. Activities: Game drive in Tarangire. Driving time: 2-3 hours to Tarangire / 1-2 hours to Karatu. Wildlife: Elephants, Giraffes, Hippos, Buffaloes, Zebras, Wildebeests, Vultures, Warthogs, Impalas, Flamingos, Marabou Storks, Hyenas, Waterbucks, Dik-diks, Blue Monkeys, Olive Baboons.',
                'accommodation' => 'Farm of Dreams Lodge - Mid-range lodge, Karatu, just outside of the park',
                'meals' => 'Breakfast, picnic lunch, dinner'
            ],
            [
                'day_number' => 2,
                'title' => 'Serengeti National Park via Ngorongoro',
                'description' => 'Proceed to Serengeti National Park for a game drive via Ngorongoro conservation area. Accommodation: Embalakai Tented Camp - Mid-range Eco tented camp, Seronera, Central Serengeti. Meals: Breakfast, picnic lunch, dinner. Activities: Game drive en route and in Serengeti. Driving time: 3-4 hours to Serengeti. Wildlife: Elephant, giraffe, hippo, buffalo, zebra, wildebeest, lion, cheetah, hyena, warthog, kudu, leopard, ostrich, mongoose, hyrax, dik-dik.',
                'accommodation' => 'Embalakai Tented Camp - Mid-range Eco tented camp, Seronera, Central Serengeti',
                'meals' => 'Breakfast, picnic lunch, dinner'
            ],
            [
                'day_number' => 3,
                'title' => 'Central Serengeti with Hot Air Balloon',
                'description' => 'Early start (04:30am to 05:30am) for 1 hour Hot air balloon safari with Champagne breakfast before rejoining your safari guide for game drive. Accommodation: Embalakai Tented Camp - Mid-range Eco tented camp, Seronera, Central Serengeti. Meals: Breakfast, picnic lunch or hot lunch, dinner. Activities: Hot air balloon safari, game drive. Wildlife: Elephant, giraffe, hippo, buffalo, zebra, wildebeest, lion, cheetah, hyena, warthog, kudu, leopard, ostrich, mongoose, hyrax, dik-dik.',
                'accommodation' => 'Embalakai Tented Camp - Mid-range Eco tented camp, Seronera, Central Serengeti',
                'meals' => 'Breakfast, picnic lunch or hot lunch, dinner'
            ],
            [
                'day_number' => 4,
                'title' => 'Full Day in Serengeti',
                'description' => 'Another full day inside Serengeti National Park for a game drive. Accommodation: Embalakai Tented Camp - Mid-range Eco tented camp, Seronera, Central Serengeti. Meals: Breakfast, picnic lunch or hot lunch, dinner. Activities: Full day game drive. Wildlife: Elephant, giraffe, hippo, buffalo, zebra, wildebeest, lion, cheetah, hyena, warthog, kudu, leopard, ostrich, mongoose, hyrax, dik-dik.',
                'accommodation' => 'Embalakai Tented Camp - Mid-range Eco tented camp, Seronera, Central Serengeti',
                'meals' => 'Breakfast, picnic lunch or hot lunch, dinner'
            ],
            [
                'day_number' => 5,
                'title' => 'Serengeti to Ngorongoro',
                'description' => 'Proceed with game drive inside Serengeti National Park. Later drive to Ngorongoro conservation area for overnight stay. Accommodation: Embalakai Ngorongoro Camp - Mid-range Eco tented camp, Ngorongoro forest, inside of the park. Meals: Breakfast, picnic lunch, dinner. Activities: Game drive in Serengeti, transfer to Ngorongoro. Driving time: 0 hours to Serengeti / 2-3 hours to Ngorongoro. Wildlife: Elephant, giraffe, hippo, buffalo, zebra, wildebeest, lion, cheetah, hyena, warthog, kudu, leopard, ostrich, mongoose, hyrax, dik-dik.',
                'accommodation' => 'Embalakai Ngorongoro Camp - Mid-range Eco tented camp, Ngorongoro forest, inside of the park',
                'meals' => 'Breakfast, picnic lunch, dinner'
            ],
            [
                'day_number' => 6,
                'title' => 'Ngorongoro Crater to Karatu',
                'description' => 'Early start and proceed to Ngorongoro Crater for a game drive. Later drive to Karatu for overnight. Accommodation: Farm of Dreams Lodge - Mid-range lodge, Karatu, just outside of the park. Meals: Breakfast, picnic lunch, dinner. Activities: Crater game drive, transfer to Karatu. Driving time: 0.5-1 hour to Crater / 1 hour to Karatu. Wildlife: Elephant, hippo, buffalo, zebra, wildebeest, lion, hyena, jackal, vulture, warthog, impala, flamingo, ostrich, waterbuck.',
                'accommodation' => 'Farm of Dreams Lodge - Mid-range lodge, Karatu, just outside of the park',
                'meals' => 'Breakfast, picnic lunch, dinner'
            ],
            [
                'day_number' => 7,
                'title' => 'Departure',
                'description' => 'After lazy breakfast and check out, casual drive to Kilimanjaro airport for your flight back home. Accommodation: None. Meals: Breakfast, picnic lunch. Activities: Airport transfer. Driving time: 3-4 hours to Kilimanjaro airport.',
                'accommodation' => 'None',
                'meals' => 'Breakfast, picnic lunch'
            ]
        ];

        foreach ($itineraries as $itinerary) {
            Itinerary::create(array_merge($itinerary, ['tour_id' => $tourId]));
        }
    }

    private function createNineDaysSafariItinerary($tourId): void
    {
        $itineraries = [
            [
                'day_number' => 0,
                'title' => 'Arrival at Kilimanjaro',
                'description' => 'Direct arrival at Kilimanjaro International Airport (LX 8076 @18:45hrs), and then transferred to Arusha for overnight stay. Accommodation: Pazuri Inn - Budget-range Lodge, Arusha, near Arusha Airport. Meals: None. Activities: Airport transfer. Driving time: 1-2 hours to Arusha.',
                'accommodation' => 'Pazuri Inn - Budget-range Lodge, Arusha, near Arusha Airport',
                'meals' => 'None'
            ],
            [
                'day_number' => 1,
                'title' => 'Tarangire National Park',
                'description' => 'Proceed to Tarangire National Park for a game drive. Later drive to your lodge for overnight stay. Accommodation: Lake Burunge Baobab Tented Lodge - Mid-range eco tented lodge, West Tarangire, just outside of the park. Meals: Breakfast, picnic lunch, dinner. Activities: Game drive in Tarangire. Driving time: 2-3 hours to Tarangire/0.5 hours to lodge. Wildlife: Elephant, Giraffe, Buffalo, Zebra, Wildebeest, Lion, Warthog, Impala, Waterbuck, Ostrich, Dik-dik, Vervet Monkey, Baboon, Yellow-billed Stork, Lesser Kudu.',
                'accommodation' => 'Lake Burunge Baobab Tented Lodge - Mid-range eco tented lodge, West Tarangire, just outside of the park',
                'meals' => 'Breakfast, picnic lunch, dinner'
            ],
            [
                'day_number' => 2,
                'title' => 'Lake Manyara National Park',
                'description' => 'Proceed to Lake Manyara National Park for a game drive. Later drive to Mto wa Mbu for overnight stay. Accommodation: Heart and Soul lodge - Mid-range Lodge, Just outside of Manyara National Park. Meals: Breakfast, picnic lunch, dinner. Activities: Game drive in Lake Manyara. Driving time: 1-2 hours to Manyara/0.5 hours to Mto wa Mbu. Wildlife: Elephants, Giraffes, Hippos, Buffaloes, Zebras, Wildebeests, Vultures, Warthogs, Impalas, Flamingos, Marabou Storks, Hyenas, Waterbucks, Dik-diks, Blue Monkeys, Olive Baboons.',
                'accommodation' => 'Heart and Soul lodge - Mid-range Lodge, Just outside of Manyara National Park',
                'meals' => 'Breakfast, picnic lunch, dinner'
            ],
            [
                'day_number' => 3,
                'title' => 'Lake Natron (half day)',
                'description' => 'Proceed to Lake Natron. Activities include Nature hike to Engaresero Waterfalls, Bird watching and Flamingo Lake Natron Walk, visit the Hominid footprints. Accommodation: Africa Safari Lake Natron (Safari Comfort) - Mid-range eco tented camp, Lake Natron area. Meals: Breakfast, picnic lunch, dinner. Activities: Cultural guided activities, nature walks, bird watching. Driving time: 3 – 3.5 hours to Natron. Wildlife: Lesser Flamingos (especially from August to October), Zebras, Fringe-eared Oryxes, Gazelles, Gerenuks.',
                'accommodation' => 'Africa Safari Lake Natron (Safari Comfort) - Mid-range eco tented camp, Lake Natron area',
                'meals' => 'Breakfast, picnic lunch, dinner'
            ],
            [
                'day_number' => 4,
                'title' => 'Lake Natron (full day)',
                'description' => 'A full day of exploration at Lake Natron. Activities include Nature hike to Engaresero Waterfalls, Bird watching, Flamingo Lake Natron Walk, visit the bottom of Mount Oldoinyo Lengai, Hike to Embalulu crater, hike to rift valley rim, hike to Leparakash plains, visit the Hominid footprints. Accommodation: Africa Safari Lake Natron (Safari Comfort) - Mid-range eco tented camp, Lake Natron area. Meals: Breakfast, picnic lunch or hot lunch, dinner. Activities: Full day cultural guided activities, nature walks, hiking. Wildlife: Lesser Flamingos (especially from August to October), Zebras, Fringe-eared Oryxes, Gazelles, Gerenuks.',
                'accommodation' => 'Africa Safari Lake Natron (Safari Comfort) - Mid-range eco tented camp, Lake Natron area',
                'meals' => 'Breakfast, picnic lunch or hot lunch, dinner'
            ],
            [
                'day_number' => 5,
                'title' => 'Lake Natron to Ngorongoro',
                'description' => 'Spend half day in Lake Natron with cultural activities. Later drive to Ngorongoro Conservation Area for overnight stay. Accommodation: Embalakai Ngorongoro Camp - Mid-range Eco tented camp, Ngorongoro forest, inside of the park. Meals: Breakfast, picnic lunch, dinner. Activities: Half day cultural guided activities, transfer to Ngorongoro. Driving time: 0 hours to Lake Natron/3-4 hours to Ngorongoro. Wildlife: Lesser Flamingos (especially from August to October), Zebras, Fringe-eared Oryxes, Gazelles, Gerenuks.',
                'accommodation' => 'Embalakai Ngorongoro Camp - Mid-range Eco tented camp, Ngorongoro forest, inside of the park',
                'meals' => 'Breakfast, picnic lunch, dinner'
            ],
            [
                'day_number' => 6,
                'title' => 'Ngorongoro Crater to Serengeti',
                'description' => 'Early start and descend into the Ngorongoro Crater for game drive. In the afternoon drive to Serengeti National Park. Accommodation: Embalakai Serengeti Camp - Mid-range eco tented camp, Seronera, Central Serengeti. Meals: Breakfast, picnic lunch, dinner. Activities: Crater game drive, transfer to Serengeti. Driving time: 0.5-1 hours to crater /2-3 hours to Serengeti. Wildlife: Elephant, Hippo, Buffalo, Zebra, Wildebeest, Lion, Hyena, Jackal, Vulture, Warthog, Impala, Flamingo, Ostrich, Waterbuck.',
                'accommodation' => 'Embalakai Serengeti Camp - Mid-range eco tented camp, Seronera, Central Serengeti',
                'meals' => 'Breakfast, picnic lunch, dinner'
            ],
            [
                'day_number' => 7,
                'title' => 'Serengeti National Park (full day)',
                'description' => 'A full day game drive in Serengeti National Park. Accommodation: Embalakai Serengeti Camp - Mid-range eco tented camp, Seronera, Central Serengeti. Meals: Breakfast, picnic lunch or hot lunch, dinner. Activities: Full day game drive. Wildlife: Elephant, Buffalo, Zebra, Wildebeest, Giraffe, Lion, Hyena, Warthog, Impala, Grant\'s Gazelle, Topi, Eland, Baboon, Vervet Monkey, Thomson\'s Gazelle.',
                'accommodation' => 'Embalakai Serengeti Camp - Mid-range eco tented camp, Seronera, Central Serengeti',
                'meals' => 'Breakfast, picnic lunch or hot lunch, dinner'
            ],
            [
                'day_number' => 8,
                'title' => 'Serengeti to Karatu',
                'description' => 'Spend half day in Serengeti National Park for game drive, later drive to Karatu for overnight stay. Accommodation: Rhotia Valley Tented Lodge - Mid-range eco tented lodge, Karatu (Rhotia valley), just outside of the park. Meals: Breakfast, picnic lunch, dinner. Activities: Half day game drive, transfer to Karatu. Driving time: 0 hours to Central Serengeti/3-4 hours to Karatu. Wildlife: Elephant, Buffalo, Zebra, Wildebeest, Giraffe, Lion, Hyena, Warthog, Impala, Grant\'s Gazelle, Topi, Eland, Baboon, Vervet Monkey, Thomson\'s Gazelle.',
                'accommodation' => 'Rhotia Valley Tented Lodge - Mid-range eco tented lodge, Karatu (Rhotia valley), just outside of the park',
                'meals' => 'Breakfast, picnic lunch, dinner'
            ],
            [
                'day_number' => 9,
                'title' => 'Departure to Zanzibar',
                'description' => 'Drive to Arusha Airport to catch your flight to Zanzibar. End of our services. Accommodation: None. Meals: Breakfast, picnic lunch. Activities: Airport transfer, flight to Zanzibar. Driving time: 3-4 hour to Airport.',
                'accommodation' => 'None',
                'meals' => 'Breakfast, picnic lunch'
            ]
        ];

        foreach ($itineraries as $itinerary) {
            Itinerary::create(array_merge($itinerary, ['tour_id' => $tourId]));
        }
    }
}
