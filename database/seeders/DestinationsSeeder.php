<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Seeder;

class DestinationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $destinations = [
            [
                'name' => 'Serengeti National Park',
                'description' => 'The Serengeti National Park is a vast grassland ecosystem in northern Tanzania, renowned for hosting the annual Great Migration of over 1.5 million wildebeest and hundreds of thousands of zebras and gazelles. This UNESCO World Heritage Site offers unparalleled wildlife viewing opportunities, including the Big Five, and spans 14,763 square kilometers of endless savanna.',
                'location' => 'Northern Tanzania, near the Kenya border',
                'coordinates' => ['latitude' => -2.1540, 'longitude' => 34.6857],
                'highlights' => [
                    'Great Migration of wildebeest and zebras',
                    'Big Five wildlife viewing',
                    'Hot air balloon safaris',
                    'Endless savanna landscapes',
                    'Predator sightings including lions, leopards, and cheetahs'
                ],
                'best_time_to_visit' => 'June to October (dry season) for general wildlife; January to March for calving season in southern Serengeti',
                'weather_info' => 'Dry season (June-October): Warm days (25-30°C) and cool nights. Wet season (November-May): Rainy with lush landscapes, great for bird watching.',
                'images' => [
                    'images/01.jpg',
                    'images/Serengeti wbeest.jpg',
                    'images/Wildbeest Migration.jpg',
                    'images/MaraRiverCrossing_EN-US6477868211_1920x1080.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Ngorongoro Conservation Area',
                'description' => 'The Ngorongoro Conservation Area is a UNESCO World Heritage Site featuring the world\'s largest unbroken volcanic caldera. This natural wonder spans 8,292 square kilometers and hosts an incredible density of wildlife, including the rare black rhino. The area is unique in that it allows human habitation alongside wildlife conservation.',
                'location' => 'Northern Tanzania, Arusha Region',
                'coordinates' => ['latitude' => -3.1863, 'longitude' => 35.5619],
                'highlights' => [
                    'World\'s largest volcanic caldera',
                    'High density of wildlife including black rhinos',
                    'Maasai cultural experiences',
                    'Olduvai Gorge archaeological site',
                    'Diverse ecosystems from forest to savanna'
                ],
                'best_time_to_visit' => 'June to October for clear views and wildlife viewing; April to May for fewer crowds',
                'weather_info' => 'Cooler due to altitude (2,286m). Temperatures range from 10-20°C. Misty mornings common in the crater.',
                'images' => [
                    'images/ngorongoro-conservation-area-2735629_1920.jpg',
                    'images/Buffalo Ngorongoro.jpg',
                    'images/Wildebeest ngorongoro.jpg',
                    'images/ngoro flam.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Mount Kilimanjaro',
                'description' => 'Mount Kilimanjaro is Africa\'s highest peak at 5,895 meters (19,341 feet) and the world\'s tallest free-standing mountain. This iconic destination offers climbers the opportunity to ascend through five distinct climate zones, from tropical rainforest to arctic summit. The mountain is a dormant volcano with three volcanic cones: Kibo, Mawenzi, and Shira.',
                'location' => 'Northern Tanzania, near the Kenya border',
                'coordinates' => ['latitude' => -3.0674, 'longitude' => 37.3556],
                'highlights' => [
                    'Africa\'s highest peak (5,895m)',
                    'Seven climbing routes including Marangu and Machame',
                    'Five distinct climate zones',
                    'Spectacular sunrise from Uhuru Peak',
                    'Diverse flora and fauna along the trails'
                ],
                'best_time_to_visit' => 'January to March and June to October for optimal climbing conditions',
                'weather_info' => 'Varies dramatically by altitude. Base: 25-30°C. Summit: -20°C to -25°C. Weather can change rapidly.',
                'images' => [
                    'images/kilimanjaro-342697_1920.jpg',
                    'images/kilimanjaro-279998_1280.jpg',
                    'images/mount-kilimanjaro-278082_1920.jpg',
                    'images/stella-point-4032287_1280.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Tarangire National Park',
                'description' => 'Tarangire National Park is famous for its massive elephant herds and iconic baobab trees. The park covers 2,850 square kilometers and offers a more intimate safari experience compared to the Serengeti. During the dry season, the Tarangire River provides the only permanent water source, attracting wildlife from across the region.',
                'location' => 'Northern Tanzania, Manyara Region',
                'coordinates' => ['latitude' => -4.0295, 'longitude' => 36.0035],
                'highlights' => [
                    'Large elephant herds (up to 300 at a time)',
                    'Massive ancient baobab trees',
                    'Tree-climbing lions',
                    'Diverse bird species (over 550)',
                    'Less crowded than other parks'
                ],
                'best_time_to_visit' => 'June to October for dry season wildlife concentration; January to February for bird watching',
                'weather_info' => 'Dry season (June-October): 25-30°C. Wet season (November-May): Rainy with lush vegetation.',
                'images' => [
                    'images/Tarangire.jpg',
                    'images/tarangire-76483_1920.jpg',
                    'images/Elephant tarangire.jpg',
                    'images/Baobabb.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Lake Manyara National Park',
                'description' => 'Lake Manyara National Park is a scenic gem known for its tree-climbing lions, diverse bird life, and stunning lake views. The park covers 330 square kilometers, including the alkaline Lake Manyara which attracts thousands of flamingos. The compact size makes it perfect for a day trip with incredible wildlife density.',
                'location' => 'Northern Tanzania, Arusha Region',
                'coordinates' => ['latitude' => -3.4167, 'longitude' => 36.1333],
                'highlights' => [
                    'Famous tree-climbing lions',
                    'Thousands of flamingos on the lake',
                    'Diverse bird species (over 400)',
                    'Hippo pool viewing',
                    'Underground water forest'
                ],
                'best_time_to_visit' => 'July to October for dry season; December to February for flamingos',
                'weather_info' => 'Mild climate due to altitude. 20-25°C during day, cooler at night. Rainy season brings lush vegetation.',
                'images' => [
                    'images/Eleph manyaraaa.jpg',
                    'images/Elephant in manyara.jpg',
                    'images/Elephant manyara.jpg',
                    'images/Flamingo.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Zanzibar Archipelago',
                'description' => 'The Zanzibar Archipelago is a tropical paradise consisting of several islands, with Unguja (the main island) and Pemba being the most visited. Known as the "Spice Islands," Zanzibar offers pristine white sand beaches, crystal-clear turquoise waters, historic Stone Town, and rich Swahili culture. It\'s the perfect destination for beach relaxation and cultural exploration.',
                'location' => 'Indian Ocean, off the coast of Tanzania',
                'coordinates' => ['latitude' => -6.1659, 'longitude' => 39.2026],
                'highlights' => [
                    'Pristine white sand beaches',
                    'Historic Stone Town (UNESCO World Heritage Site)',
                    'Spice tours and cultural experiences',
                    'Diving and snorkeling in coral reefs',
                    'Dolphin tours and sunset dhow cruises'
                ],
                'best_time_to_visit' => 'June to October for dry season and best diving conditions; December to February for warm weather',
                'weather_info' => 'Tropical climate. 25-30°C year-round. Humidity higher during rainy seasons (March-May, November-December).',
                'images' => [
                    'images/07.jpg',
                    'images/boat.jpg',
                    'images/06.jpg',
                    'images/05.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Selous Game Reserve',
                'description' => 'The Selous Game Reserve is Africa\'s largest game reserve, covering 54,600 square kilometers of untouched wilderness. This UNESCO World Heritage Site offers remote and exclusive safari experiences with incredible wildlife diversity. The reserve is named after Frederick Selous, a famous hunter and conservationist, and remains one of Tanzania\'s best-kept secrets.',
                'location' => 'Southern Tanzania',
                'coordinates' => ['latitude' => -7.7333, 'longitude' => 36.6167],
                'highlights' => [
                    'Africa\'s largest game reserve',
                    'Walking safaris and boat safaris on Rufiji River',
                    'Large populations of elephants, wild dogs, and hippos',
                    'Remote and uncrowded wilderness experience',
                    'Hot springs and diverse landscapes'
                ],
                'best_time_to_visit' => 'June to October for dry season wildlife viewing',
                'weather_info' => 'Hot and humid. 28-35°C during dry season. Cooler during wet season but accessibility limited.',
                'images' => [
                    'images/africa-4275737_1920.jpg',
                    'images/africa-9445784_1920.jpg',
                    'images/nature-3146794_1920.jpg',
                    'images/wildlife-3128802_1920.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Ruaha National Park',
                'description' => 'Ruaha National Park is Tanzania\'s largest national park, covering 20,226 square kilometers of diverse landscapes. Known for its rugged wilderness and excellent elephant population, Ruaha offers a remote safari experience away from the crowds. The park features the Great Ruaha River, which provides vital water sources for wildlife and creates stunning landscapes.',
                'location' => 'Central Tanzania',
                'coordinates' => ['latitude' => -7.7167, 'longitude' => 35.0833],
                'highlights' => [
                    'Tanzania\'s largest national park',
                    'Large elephant population (over 10,000)',
                    'Excellent lion and leopard sightings',
                    'Great Ruaha River scenery',
                    'Remote and authentic wilderness experience'
                ],
                'best_time_to_visit' => 'June to October for dry season wildlife viewing',
                'weather_info' => 'Hot and dry. 25-35°C. Cool nights during dry season. Wet season (November-May) makes some areas inaccessible.',
                'images' => [
                    'images/africa-4149975_1920.jpg',
                    'images/africa-4275740_1280.jpg',
                    'images/elephant-4032274_1920.jpg',
                    'images/elephants-376512_1920.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Lake Victoria',
                'description' => 'Lake Victoria is Africa\'s largest lake by area and the world\'s largest tropical lake. Shared by Tanzania, Uganda, and Kenya, it offers unique cultural experiences, fishing communities, and island exploration. The lake is the source of the Nile River and supports diverse ecosystems and local communities.',
                'location' => 'Northern Tanzania, bordering Uganda and Kenya',
                'coordinates' => ['latitude' => -1.0, 'longitude' => 33.0],
                'highlights' => [
                    'Africa\'s largest lake',
                    'Cultural experiences with fishing communities',
                    'Island hopping (Saa Nane, Rubondo Island)',
                    'Bird watching and fishing',
                    'Source of the Nile River'
                ],
                'best_time_to_visit' => 'June to October for dry season; January to February for pleasant weather',
                'weather_info' => 'Tropical climate. 22-28°C year-round. Rainy seasons bring heavy downpours.',
                'images' => [
                    'images/water-3093341_1280.jpg',
                    'images/birds.jpg',
                    'images/hornbill.jpg',
                    'images/Egret.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Mahale Mountains National Park',
                'description' => 'Mahale Mountains National Park is a remote paradise on the shores of Lake Tanganyika, famous for its chimpanzee population. The park offers a unique combination of mountain trekking to see habituated chimpanzees and beach relaxation on one of the world\'s clearest lakes. This hidden gem provides an exclusive and intimate wildlife experience.',
                'location' => 'Western Tanzania, on Lake Tanganyika',
                'coordinates' => ['latitude' => -6.1167, 'longitude' => 29.8667],
                'highlights' => [
                    'Habituated chimpanzee trekking',
                    'Crystal-clear Lake Tanganyika',
                    'Mountain hiking with stunning views',
                    'Remote and exclusive experience',
                    'Diverse primate species'
                ],
                'best_time_to_visit' => 'May to October for dry season and best chimpanzee viewing',
                'weather_info' => 'Tropical with mountain influence. 20-30°C. Humid near the lake. Dry season best for trekking.',
                'images' => [
                    'images/monkey.jpg',
                    'images/Monkey velvet.jpg',
                    'images/Mokney blue.jpg',
                    'images/colobus-monkey-2548308_1280.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Gombe Stream National Park',
                'description' => 'Gombe Stream National Park is Tanzania\'s smallest national park but world-famous as the site of Jane Goodall\'s pioneering chimpanzee research. Located on the shores of Lake Tanganyika, this park offers intimate chimpanzee encounters, beautiful hiking trails, and stunning lake views. It\'s a must-visit for primate enthusiasts and those interested in conservation history.',
                'location' => 'Western Tanzania, on Lake Tanganyika',
                'coordinates' => ['latitude' => -4.6667, 'longitude' => 29.6667],
                'highlights' => [
                    'Jane Goodall\'s chimpanzee research site',
                    'Habituated chimpanzee families',
                    'Intimate primate encounters',
                    'Beautiful lake scenery and hiking',
                    'Rich conservation history'
                ],
                'best_time_to_visit' => 'July to October for dry season and best chimpanzee viewing',
                'weather_info' => 'Tropical climate. 20-30°C. Humid near the lake. Dry season essential for hiking.',
                'images' => [
                    'images/monkey.jpg',
                    'images/Monkey velvet.jpg',
                    'images/Mokney blue.jpg',
                    'images/colobus-monkey-2548308_1280.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Katavi National Park',
                'description' => 'Katavi National Park is Tanzania\'s third-largest national park and one of its most remote and wild destinations. Known for its massive hippo and crocodile populations in the Katuma River, Katavi offers an authentic wilderness experience reminiscent of Africa as it was decades ago. The park sees very few visitors, ensuring an exclusive safari adventure.',
                'location' => 'Western Tanzania',
                'coordinates' => ['latitude' => -6.8333, 'longitude' => 31.1667],
                'highlights' => [
                    'Massive hippo concentrations (over 200 at a time)',
                    'Large crocodile populations',
                    'Remote and uncrowded wilderness',
                    'Excellent buffalo and elephant sightings',
                    'Authentic African safari experience'
                ],
                'best_time_to_visit' => 'May to October for dry season wildlife viewing',
                'weather_info' => 'Hot and dry. 30-35°C. Cool nights. Wet season (November-April) makes park inaccessible.',
                'images' => [
                    'images/africa-223014_1920.jpg',
                    'images/waterbuck.jpg',
                    'images/Warthog&bird.jpg',
                    'images/impala-6950983_1920.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Arusha National Park',
                'description' => 'Arusha National Park is a hidden gem offering diverse landscapes within a compact area. Despite its small size (137 square kilometers), the park features Mount Meru, the Momella Lakes, and the Ngurdoto Crater. It\'s perfect for day trips, canoeing, and walking safaris, with stunning views of Mount Kilimanjaro on clear days.',
                'location' => 'Northern Tanzania, near Arusha city',
                'coordinates' => ['latitude' => -3.2589, 'longitude' => 36.9879],
                'highlights' => [
                    'Mount Meru climbing',
                    'Canoeing on Momella Lakes',
                    'Walking safaris',
                    'Ngurdoto Crater views',
                    'Views of Mount Kilimanjaro'
                ],
                'best_time_to_visit' => 'June to October for dry season; December to February for clear mountain views',
                'weather_info' => 'Mild due to altitude. 15-25°C. Cooler at higher elevations. Misty mornings common.',
                'images' => [
                    'images/mount-kilimanjaro-7312239_1920.jpg',
                    'images/flamingos-6480822_1920.jpg',
                    'images/amboseli-4967430_1280.jpg',
                    'images/tree-2600482_1920.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Mafia Island Marine Park',
                'description' => 'Mafia Island Marine Park is a pristine marine conservation area offering some of the best diving and snorkeling in East Africa. Located south of Zanzibar, this remote island features healthy coral reefs, diverse marine life including whale sharks, and peaceful beaches. It\'s an ideal destination for marine enthusiasts seeking tranquility.',
                'location' => 'Indian Ocean, south of Zanzibar',
                'coordinates' => ['latitude' => -7.9167, 'longitude' => 39.6500],
                'highlights' => [
                    'World-class diving and snorkeling',
                    'Whale shark encounters',
                    'Healthy coral reefs',
                    'Peaceful and uncrowded beaches',
                    'Marine conservation area'
                ],
                'best_time_to_visit' => 'October to March for best diving conditions and whale shark season',
                'weather_info' => 'Tropical climate. 25-30°C year-round. Best diving visibility during dry season.',
                'images' => [
                    'images/07.jpg',
                    'images/06.jpg',
                    'images/05.jpg',
                    'images/boat.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Pemba Island',
                'description' => 'Pemba Island is the northernmost island of the Zanzibar Archipelago, known for its lush green hills, clove plantations, and excellent diving spots. Less developed than Zanzibar, Pemba offers authentic Swahili culture, pristine beaches, and some of the best diving in East Africa with steep drop-offs and healthy coral reefs.',
                'location' => 'Indian Ocean, north of Zanzibar',
                'coordinates' => ['latitude' => -5.0667, 'longitude' => 39.7667],
                'highlights' => [
                    'World-class diving with steep drop-offs',
                    'Clove plantations and spice tours',
                    'Authentic Swahili culture',
                    'Lush green landscapes',
                    'Peaceful and uncrowded beaches'
                ],
                'best_time_to_visit' => 'July to October for dry season and best diving conditions',
                'weather_info' => 'Tropical climate. 25-30°C year-round. Humidity during rainy seasons.',
                'images' => [
                    'images/07.jpg',
                    'images/06.jpg',
                    'images/05.jpg',
                    'images/boat.jpg'
                ],
                'status' => 'active'
            ]
        ];

        foreach ($destinations as $destination) {
            Destination::create($destination);
        }
    }
}
