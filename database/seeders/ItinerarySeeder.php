<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tour;
use App\Models\Itinerary;
use Illuminate\Support\Facades\Schema;

class ItinerarySeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Itinerary::truncate();
        Schema::enableForeignKeyConstraints();

        // 6 DAYS SAFARI (TARANGIRE, NGORONGORO & SERENGETI)
        $tour1 = Tour::where('slug', '6-days-safari-tarangire-ngorongoro-serengeti')->first();
        if ($tour1) {
            $tour1->itineraries()->createMany([
                [
                    'day_number' => 0,
                    'title' => 'Arrival Day',
                    'description' => 'Direct arrival at Kilimanjaro airport then transferred for you to reach your base lodge in time for a pre-safari briefing (time to be confirmed) with your Safari guide and overnight. Driving time: 1 hour to Arusha. Game drive: None. Activities included: Airport transfer. Activities excluded: None. Commonly seen animals: None. Occasionally seen animals: None. Rarely seen animals: None.',
                    'accommodation' => 'Meru view lodge',
                    'meals' => 'Dinner'
                ],
                [
                    'day_number' => 1,
                    'title' => 'Tarangire National Park',
                    'description' => 'Proceed to Tarangire National Park for a game drive. Later drive to Karatu for an overnight. Driving time: 2-3 hours to Tarangire / 1-2 hours to Karatu. Game drive: Late morning (time permitting), afternoon. Activities included: None. Activities excluded: Cultural walks, walking safari, traditional lunch, night game drive, treetop walkway, canoeing safari. Commonly seen animals: Elephants, Giraffes, Hippos, Buffaloes, Zebras, Wildebeests, Vultures, Warthogs, Impalas, Flamingos, Marabou Storks, Hyenas, Waterbucks, Dik-diks, Blue Monkeys, Olive Baboons. Occasionally seen animals: Lions, Servals, Mongooses. Rarely seen animals: Cheetahs, Leopards.',
                    'accommodation' => 'Farm of Dreams Lodge',
                    'meals' => 'Breakfast, picnic lunch, dinner'
                ],
                [
                    'day_number' => 2,
                    'title' => 'Proceed to Serengeti National Park',
                    'description' => 'Proceed to Serengeti National Park for a game drive via Ngorongoro conservation area. Driving time: 3-4 hours to Serengeti. Game drive: En route, afternoon. Activities included: None. Activities excluded: Olduvai Gorge Museum Visit, Maasai Cultural Boma visit. Commonly seen animals: Elephant, giraffe, hippo, buffalo, zebra, wildebeest, lion, cheetah, hyena, warthog, kudu, leopard, ostrich, mongoose, hyrax, dik-dik. Occasionally seen animals: Crocodile, caracal, serval, klipspringer. Rarely seen animals: Black rhino, wild dog.',
                    'accommodation' => 'Embalakai Tented Camp',
                    'meals' => 'Breakfast, picnic lunch, dinner'
                ],
                [
                    'day_number' => 3,
                    'title' => 'Central Serengeti National Park + Hot Air Balloon',
                    'description' => 'Today you start extra early (04:30am to 05:30am pick up from your lodge by Balloon operator) for a 1 hour Hot air balloon safari. You will have an Out of Africa style "Champagne breakfast" before rejoining your safari guide and continuing with the remainder of your game drive today inside Serengeti National Park. Driving time: 0 hours to Central Serengeti. Game drive: Morning, afternoon. Activities included: Hot air balloon. Activities excluded: None. Commonly seen animals: Elephant, giraffe, hippo, buffalo, zebra, wildebeest, lion, cheetah, hyena, warthog, kudu, leopard, ostrich, mongoose, hyrax, dik-dik. Occasionally seen animals: Crocodile, caracal, serval, klipspringer. Rarely seen animals: Black rhino, wild dog.',
                    'accommodation' => 'Embalakai Tented Camp',
                    'meals' => 'Breakfast, picnic lunch or hot lunch, dinner'
                ],
                [
                    'day_number' => 4,
                    'title' => 'Full day Serengeti National Park',
                    'description' => 'Another full day inside Serengeti National Park for a game drive. Driving time: 0 hours to Central Serengeti. Game drive: Morning, afternoon. Activities included: None. Activities excluded: Hot air balloon. Commonly seen animals: Elephant, giraffe, hippo, buffalo, zebra, wildebeest, lion, cheetah, hyena, warthog, kudu, leopard, ostrich, mongoose, hyrax, dik-dik. Occasionally seen animals: Crocodile, caracal, serval, klipspringer. Rarely seen animals: Black rhino, wild dog.',
                    'accommodation' => 'Embalakai Tented Camp',
                    'meals' => 'Breakfast, picnic lunch or hot lunch, dinner'
                ],
                [
                    'day_number' => 5,
                    'title' => 'Serengeti to Ngorongoro Conservation Area',
                    'description' => 'Proceed with game drive inside Serengeti National Park. Later drive to Ngorongoro conservation area for overnight stay. Driving time: 0 hours to Serengeti / 2-3 hours to Ngorongoro. Game drive: Morning, En-route. Activities included: None. Activities excluded: Hot air balloon safari. Commonly seen animals: Elephant, giraffe, hippo, buffalo, zebra, wildebeest, lion, cheetah, hyena, warthog, kudu, leopard, ostrich, mongoose, hyrax, dik-dik. Occasionally seen animals: Crocodile, caracal, serval, klipspringer. Rarely seen animals: Black rhino, wild dog.',
                    'accommodation' => 'Embalakai Ngorongoro Camp',
                    'meals' => 'Breakfast, picnic lunch, dinner'
                ],
                [
                    'day_number' => 6,
                    'title' => 'Ngorongoro Crater Game Drive',
                    'description' => 'Early start and proceed to Ngorongoro Crater for a game drive. Later drive to Karatu for overnight. Driving time: 0.5-1 hour to Crater / 1 hour to Karatu. Game drive: Morning, afternoon (time permitting). Activities included: None. Activities excluded: Maasai village cultural visit, Olduvai gorge. Commonly seen animals: Elephant, hippo, buffalo, zebra, wildebeest, lion, hyena, jackal, vulture, warthog, impala, flamingo, ostrich, waterbuck. Occasionally seen animals: Black rhino, cheetah, dik-dik. Rarely seen animals: Leopard, caracal, serval.',
                    'accommodation' => 'Farm of Dreams Lodge',
                    'meals' => 'Breakfast, picnic lunch, dinner'
                ],
                [
                    'day_number' => 7,
                    'title' => 'Departure Day',
                    'description' => 'After lazy breakfast and check out, you will have a casual drive to Kilimanjaro airport for your flight (LX8076 @2015hrs, latest check in @1800hrs) back home. Check out – 1000hrs. Driving time: 3-4 hours to Kilimanjaro airport. Game drive: None. Activities included: None. Activities excluded: None. Commonly seen animals: None. Occasionally seen animals: None. Rarely seen animals: None.',
                    'accommodation' => 'None',
                    'meals' => 'Breakfast, picnic lunch'
                ]
            ]);
        }

        // 9 DAYS GREAT MIGRATION SAFARI
        $tour2 = Tour::where('slug', '9-days-great-migration-safari')->first();
        if ($tour2) {
            $tour2->itineraries()->createMany([
                [
                    'day_number' => 0,
                    'title' => 'Arrival Day',
                    'description' => 'Direct arrival at Kilimanjaro International Airport (LX 8076 @18:45hrs), and then transferred to Arusha for overnight stay. Driving time: 1-2 hours to Arusha. Game drive: None. Activities included: Airport transfer. Activities excluded: Extra activities. Commonly seen animals: None. Occasionally seen animals: None. Rarely seen animals: None.',
                    'accommodation' => 'Pazuri Inn',
                    'meals' => 'None'
                ],
                [
                    'day_number' => 1,
                    'title' => 'Tarangire National Park',
                    'description' => 'Proceed to Tarangire National Park for a game drive. Later drive to your lodge for overnight stay. Driving time: 2-3 hours to Tarangire/0.5 hours to lodge. Game drive: Late morning (time permitting), afternoon. Activities included: None. Activities excluded: Walking safari, night game drive. Commonly seen animals: Elephant, Giraffe, Buffalo, Zebra, Wildebeest, Lion, Warthog, Impala, Waterbuck, Ostrich, Dik-dik, Vervet Monkey, Baboon, Yellow-billed Stork, Lesser Kudu. Occasionally seen animals: Leopard, Hyena, Jackal, Python, Mongoose, Reedbuck, Hartebeest, Marabou Stork, Lovebird, Greater Kudu. Rarely seen animals: Cheetah, African Wild Dog, Eland, Bat-eared Fox, Honey Badger, Caracal, Aardwolf.',
                    'accommodation' => 'Lake Burunge Baobab Tented Lodge',
                    'meals' => 'Breakfast, picnic lunch, dinner'
                ],
                [
                    'day_number' => 2,
                    'title' => 'Lake Manyara National Park',
                    'description' => 'Proceed to Lake Manyara National Park for a game drive. Later drive to Mto wa Mbu for overnight stay. Driving time: 1-2 hours to Manyara/0.5 hours to Mto wa Mbu. Game drive: Morning (time permitting), afternoon. Activities included: None. Activities excluded: Cultural walks, walking safari, traditional lunch, night game drive, treetop walkway, canoeing safari. Commonly seen animals: Elephants, Giraffes, Hippos, Buffaloes, Zebras, Wildebeests, Vultures, Warthogs, Impalas, Flamingos, Marabou Storks, Hyenas, Waterbucks, Dik-diks, Blue Monkeys, Olive Baboons. Occasionally seen animals: Lions, Servals, Mongooses. Rarely seen animals: Cheetahs, Leopards.',
                    'accommodation' => 'Heart and Soul lodge',
                    'meals' => 'Breakfast, picnic lunch, dinner'
                ],
                [
                    'day_number' => 3,
                    'title' => 'Lake Natron (Half Day)',
                    'description' => 'Today you will proceed to Lake Natron. You have the option of the following activities (all time permitting): Nature hike to Engaresero Waterfalls, Bird watching and Flamingo Lake Natron Walk, visit the Hominid footprints. Driving time: 3 – 3.5 hours to Natron. Game drive: None. Activities included: Half day cultural guided activity fees. Activities excluded: Oldoinyo Lengai trek, other activities not included by the cultural tourism office, Maasa boma visit. Commonly seen animals: Lesser Flamingos (especially from August to October), Zebras, Fringe-eared Oryxes, Gazelles, Gerenuks. Occasionally seen animals: Giraffes, Wildebeests, Grant\'s and Thomson\'s Gazelles. Rarely seen animals: Lions, Cheetahs.',
                    'accommodation' => 'Africa Safari Lake Natron (Safari Comfort)',
                    'meals' => 'Breakfast, picnic lunch, dinner'
                ],
                [
                    'day_number' => 4,
                    'title' => 'Lake Natron (Full Day)',
                    'description' => 'A full day of exploration at Lake Natron. You have the option of the following activities (all time permitting): Nature hike to Engaresero Waterfalls, Bird watching and Flamingo Lake Natron Walk, visit the bottom of Mount Oldoinyo Lengai, Hike to Embalulu crater, hike to rift valley rim, hike to Leparakash plains, visit the Hominid footprints. Driving time: 0 hours to Natron. Game drive: None. Activities included: Full day cultural guided activity fees. Activities excluded: Oldoinyo Lengai trek, other activities not included by the cultural tourism office, Maasa boma visit. Commonly seen animals: Lesser Flamingos (especially from August to October), Zebras, Fringe-eared Oryxes, Gazelles, Gerenuks. Occasionally seen animals: Giraffes, Wildebeests, Grant\'s and Thomson\'s Gazelles. Rarely seen animals: Lions, Cheetahs.',
                    'accommodation' => 'Africa Safari Lake Natron (Safari Comfort)',
                    'meals' => 'Breakfast, picnic lunch or hot lunch, dinner'
                ],
                [
                    'day_number' => 5,
                    'title' => 'Lake Natron (Half Day) to Ngorongoro Conservation Area',
                    'description' => 'Spend half day in Lake Natron. You have the option of the following activities (all time permitting): Nature hike to Engaresero Waterfalls, Bird watching and Flamingo Lake Natron Walk, visit the Hominid footprints. Later drive to Ngorongoro Conservation Area for overnight stay. Driving time: 0 hours to Lake Natron/3-4 hours to Ngorongoro. Game drive: None. Activities included: Half day cultural guided activity fees. Activities excluded: Oldoinyo Lengai trek, other activities not included by the cultural tourism office, Maasa boma visit. Commonly seen animals: Lesser Flamingos (especially from August to October), Zebras, Fringe-eared Oryxes, Gazelles, Gerenuks. Occasionally seen animals: Giraffes, Wildebeests, Grant\'s and Thomson\'s Gazelles. Rarely seen animals: Lions, Cheetahs.',
                    'accommodation' => 'Embalakai Ngorongoro Camp',
                    'meals' => 'Breakfast, picnic lunch, dinner'
                ],
                [
                    'day_number' => 6,
                    'title' => 'Ngorongoro Crater to Serengeti',
                    'description' => 'You start early and descend into the Ngorongoro Crater for your game drive. In the afternoon you will drive to Serengeti National Park. Driving time: 0.5-1 hours to crater /2-3 hours to Serengeti. Game drive: Morning (Crater), afternoon (to Serengeti). Activities included: None. Activities excluded: Maasai village cultural visit, Olduvai Gorge Museum entry fees. Commonly seen animals: Elephant, Hippo, Buffalo, Zebra, Wildebeest, Lion, Hyena, Jackal, Vulture, Warthog, Impala, Flamingo, Ostrich, Waterbuck. Occasionally seen animals: Black Rhino, Cheetah, Dik-Dik. Rarely seen animals: Leopard, Caracal, Serval.',
                    'accommodation' => 'Embalakai Serengeti Camp',
                    'meals' => 'Breakfast, picnic lunch, dinner'
                ],
                [
                    'day_number' => 7,
                    'title' => 'Serengeti National Park (Full Day)',
                    'description' => 'A full day game drive in Serengeti National Park. Driving time: 0 hours to Central Serengeti. Game drive: Morning, afternoon. Activities included: None. Activities excluded: Hot air balloon safari, Hot bush lunch. Commonly seen animals: Elephant, Buffalo, Zebra, Wildebeest, Giraffe, Lion, Hyena, Warthog, Impala, Grant\'s Gazelle, Topi, Eland, Baboon, Vervet Monkey, Thomson\'s Gazelle. Occasionally seen animals: Cheetah, Leopard, Hippopotamus, Crocodile, Jackal, Hartebeest, Waterbuck, Ostrich, Secretary Bird, Kori Bustard, Bat-eared Fox, Klipspringer, Bushbuck. Rarely seen animals: Black Rhino, African Wild Dog, Serval, Caracal, Pangolin, Aardwolf, Roan Antelope, Lesser Kudu, Striped Hyena.',
                    'accommodation' => 'Embalakai Serengeti Camp',
                    'meals' => 'Breakfast, picnic lunch or hot lunch, dinner'
                ],
                [
                    'day_number' => 8,
                    'title' => 'Serengeti National Park to Karatu',
                    'description' => 'Spend half day in Serengeti National Park for game drive, later drive to Karatu for overnight stay. Driving time: 0 hours to Central Serengeti/3-4 hours to Karatu. Game drive: Morning, enroute. Activities included: None. Activities excluded: Hot air balloon safari, Olduvai Gorge Museum visit, Maasai village cultural visit. Commonly seen animals: Elephant, Buffalo, Zebra, Wildebeest, Giraffe, Lion, Hyena, Warthog, Impala, Grant\'s Gazelle, Topi, Eland, Baboon, Vervet Monkey, Thomson\'s Gazelle. Occasionally seen animals: Cheetah, Leopard, Hippopotamus, Crocodile, Jackal, Hartebeest, Waterbuck, Ostrich, Secretary Bird, Kori Bustard, Bat-eared Fox, Klipspringer, Bushbuck. Rarely seen animals: Black Rhino, African Wild Dog, Serval, Caracal, Pangolin, Aardwolf, Roan Antelope, Lesser Kudu, Striped Hyena.',
                    'accommodation' => 'Rhotia Valley Tented Lodge',
                    'meals' => 'Breakfast, picnic lunch, dinner'
                ],
                [
                    'day_number' => 9,
                    'title' => 'Drive to Arusha Airport',
                    'description' => 'Drive to Arusha Airport to catch your flight to Zanzibar. End of our services. Driving time: 3-4 hour to Airport. Game drive: None. Activities included: Flight to Zanzibar. Activities excluded: None. Commonly seen animals: None. Occasionally seen animals: None. Rarely seen animals: None.',
                    'accommodation' => 'None',
                    'meals' => 'Breakfast, picnic lunch'
                ]
            ]);
        }

        // 6 DAYS COMBO ADVENTURE (MERU TREKKING & SAFARI)
        $tour3 = Tour::where('slug', '6-days-combo-adventure-meru-trekking-safari')->first();
        if ($tour3) {
            $tour3->itineraries()->createMany([
                [
                    'day_number' => 0,
                    'title' => 'Arrival Day',
                    'description' => 'Direct arrival at Kilimanjaro airport then transferred for you to reach your base lodge in time for a pre-climb briefing (time to be confirmed) with your Mountain guide. Driving time: 1-2 hours. Game drive: None. Activities included: None. Activities excluded: None. Commonly seen animals: None. Occasionally seen animals: None. Rarely seen animals: None.',
                    'accommodation' => 'Meru view lodge',
                    'meals' => 'Dinner'
                ],
                [
                    'day_number' => 1,
                    'title' => 'Arusha to Arusha National Park (Momella gate) to Miriakamba Hut',
                    'description' => 'You will be transferred by road from Arusha (10:00am) to Momella gate inside of Arusha National Park. After registration you trek today through the grassland and into the rain forest with your guide and armed ranger (shared by all groups for everyone\'s safety whilst you hike near wildlife). You may encounter some wild animals such as buffalo, giraffes, zebras or antelopes and plenty of bird and plant species on your way to Miriakamba hut. Driving time: 0.5 hours. Trekking time: 4-6 hours. Trekking distance: 14km / 8.5mi. Start altitude: 1640m or 5380ft. End altitude: 2515m or 8250ft. Highest altitude: 2515m or 8250ft. Altitude gain: +875 or +2870ft. Commonly seen animals: Buffalo, Giraffes, Zebras, Antelopes, Bird species, Plant species.',
                    'accommodation' => 'Miriakamba Hut',
                    'meals' => 'Breakfast, Picnic lunch, dinner'
                ],
                [
                    'day_number' => 2,
                    'title' => 'Miriakamba Hut to Saddle Hut to Little Meru peak (optional)',
                    'description' => 'Today\'s hike is steep and leaves the rain forest behind and takes you into the heather & moorland zone ascending through the changed landscape along the edges of the saddle between the Meru peaks as you start to get views of the Crater and Ash Tray. After arriving at the Saddle Huts you can hike further to the peak of "Little Meru" for additional acclimatization before your summit attempt. Trekking time: 3-4 hours. Trekking distance: 11km / 7mi. Start altitude: 2515m or 8250ft. End altitude: 3565m or 11695ft. Highest altitude: 3800m or 12470ft. Altitude gain: +1285m or +4220ft / -235m or -775ft.',
                    'accommodation' => 'Saddle Hut',
                    'meals' => 'Breakfast, picnic lunch or lunch, dinner'
                ],
                [
                    'day_number' => 3,
                    'title' => 'Saddle Hut to Socialist Peak to Miriakamba Huts',
                    'description' => 'In the early morning (around 00:00am) you begin your final ascent to the summit of Meru through the alpine zone. The trek is a steep hike over loose volcanic scree taking you to Rhino Point (3800m or 12470ft) then to Cobra point (4350m or 14270ft) before reaching the ridge of ash and rock till the Socialist Peak (4566m or 14980ft) which is Tanzania\'s second highest and Africa\'s 4th highest mountain top where you may enjoy sunrise before descending back through the trail all the way down to the rain forest zone with your night at Miriakamba huts. Trekking time: 12-15 hours. Trekking distance: 18km / 11mi. Start altitude: 3565m or 11695ft. End altitude: 2515m or 8250ft. Highest altitude: 4566m or 14980ft. Altitude gain: +1001m or +3285ft / -2051m or -6730ft.',
                    'accommodation' => 'Miriakamba Hut',
                    'meals' => 'Breakfast, picnic lunch or lunch, dinner'
                ],
                [
                    'day_number' => 4,
                    'title' => 'Mirikamba Huts to Arusha National Park (Momella gate) to Arusha',
                    'description' => 'Your final day on Meru is a quick descent through the same rain forest as on the first day until Momella gate where our vehicle will be waiting to take you back to Arusha town. Usually, the crew will leave you at Momella gate and it\'s a perfect opportunity to say goodbye and a great location to hand your optional tip to the crew as a token of your appreciation. Driving time: 1 hour. Trekking time: 3-5 hours. Trekking distance: 7km / 4.5mi. Start altitude: 2515m or 8250ft. End altitude: 1640m or 5380ft. Highest altitude: 2515m or 8250ft. Altitude gain: -875m or -2870ft.',
                    'accommodation' => 'Meru view lodge',
                    'meals' => 'Breakfast, picnic lunch or lunch, dinner'
                ],
                [
                    'day_number' => 5,
                    'title' => 'Tarangire National Park',
                    'description' => 'Today pick up at 0800hrs and proceed to Tarangire National Park for a game drive. Later drive to your lodge for overnight. Driving time: 2-3 hours to Tarangire / 0.5 hours to lodge. Game drive: Late morning (time permitting), afternoon. Activities included: None. Activities excluded: Walking safari, night game drive. Commonly seen animals: Elephant, Giraffe, Buffalo, Zebra, Wildebeest, Lion, Warthog, Impala, Waterbuck, Ostrich, Dik-dik, Vervet Monkey, Baboon, Yellow-billed Stork, Lesser Kudu. Occasionally seen animals: Leopard, Hyena, Jackal, Python, Mongoose, Reedbuck, Hartebeest, Marabou Stork, Lovebird, Greater Kudu. Rarely seen animals: Cheetah, African Wild Dog, Eland, Bat-eared Fox, Honey Badger, Caracal, Aardwolf.',
                    'accommodation' => 'Lake Burunge Tented Lodge',
                    'meals' => 'Breakfast, picnic lunch, dinner'
                ],
                [
                    'day_number' => 6,
                    'title' => 'Tarangire National Park to Arusha',
                    'description' => 'Final day game drive inside Tarangire National Park. Later drive to Arusha for overnight stay. Driving time: 0.5 hours to the park /2-3 hours to Arusha. Game drive: Morning, afternoon (time permitting). Activities included: None. Activities excluded: Walking safari, night game drive, hot air balloon safari. Commonly seen animals: Elephant, Giraffe, Buffalo, Zebra, Wildebeest, Lion, Warthog, Impala, Waterbuck, Ostrich, Dik-dik, Vervet Monkey, Baboon, Yellow-billed Stork, Lesser Kudu. Occasionally seen animals: Leopard, Hyena, Jackal, Python, Mongoose, Reedbuck, Hartebeest, Marabou Stork, Lovebird, Greater Kudu. Rarely seen animals: Cheetah, African Wild Dog, Eland, Bat-eared Fox, Honey Badger, Caracal, Aardwolf.',
                    'accommodation' => 'African View Lodge',
                    'meals' => 'Breakfast, picnic lunch, dinner'
                ],
                [
                    'day_number' => 7,
                    'title' => 'Leisure and departure day',
                    'description' => 'Today after your lazy breakfast and check out, you will be transferred to Kilimanjaro airport to catch your flight back home. End of our services. Driving time: 1 hour to Kilimanjaro airport. Game drive: None. Activities included: Airport transfer. Activities excluded: None. Commonly seen animals: None. Occasionally seen animals: None. Rarely seen animals: None.',
                    'accommodation' => 'None',
                    'meals' => 'Breakfast'
                ]
            ]);
        }

        // Generate generic itineraries for any tour without one
        $allTours = Tour::whereDoesntHave('itineraries')->get();
        foreach ($allTours as $tour) {
            $days = [];
            for ($i = 1; $i <= min($tour->duration_days, 3); $i++) {
                $days[] = [
                    'day_number' => $i,
                    'title' => 'Adventure Day ' . $i,
                    'description' => 'Experience the highlights of ' . $tour->location . ' with expert guidance. Game drives in morning and afternoon. Commonly seen animals: Elephant, Lion, Leopard, Buffalo, Rhinoceros. Occasionally seen animals: Cheetah, Hyena, Wild dog. Rarely seen animals: Black rhino.',
                    'accommodation' => 'Luxury Wilderness Lodge',
                    'meals' => 'B, L, D'
                ];
            }
            $tour->itineraries()->createMany($days);
        }
    }
}
