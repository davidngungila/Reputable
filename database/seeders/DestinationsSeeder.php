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
            ],
            [
                'name' => 'Mkomazi National Park',
                'description' => 'Mkomazi National Park is a hidden gem in northern Tanzania, known for its black rhino conservation program and diverse landscapes. The park covers 3,245 square kilometers and offers spectacular views of Mount Kilimanjaro, along with opportunities to see endangered wild dogs and rhinos.',
                'location' => 'Northern Tanzania, between Kilimanjaro and Tanga',
                'coordinates' => ['latitude' => -4.5333, 'longitude' => 38.0167],
                'highlights' => [
                    'Black rhino conservation program',
                    'Endangered wild dog sightings',
                    'Views of Mount Kilimanjaro',
                    'Diverse landscapes from savanna to mountains',
                    'Bird watching (over 400 species)'
                ],
                'best_time_to_visit' => 'June to October for dry season wildlife viewing',
                'weather_info' => 'Hot and dry. 25-30°C. Cool nights. Wet season (November-May) brings lush vegetation.',
                'images' => [
                    'images/africa-4149975_1920.jpg',
                    'images/elephant-4032274_1920.jpg',
                    'images/wildlife-3128802_1920.jpg',
                    'images/nature-3146794_1920.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Kitulo National Park',
                'description' => 'Kitulo National Park, known as the "Serengeti of Flowers," is a botanical paradise on the Kitulo Plateau. This unique park protects one of Africa\'s great floral spectacles, with over 350 species of wildflowers blooming during the rainy season. It\'s a haven for botanists and nature lovers.',
                'location' => 'Southern Tanzania, Mbeya Region',
                'coordinates' => ['latitude' => -9.0000, 'longitude' => 34.0000],
                'highlights' => [
                    'Spectacular wildflower displays',
                    'Orchids and endemic plant species',
                    'Mountain hiking trails',
                    'Bird watching (including endemic species)',
                    'Unique alpine ecosystem'
                ],
                'best_time_to_visit' => 'December to April for peak wildflower season',
                'weather_info' => 'Cool and misty due to altitude (2,600m). 15-20°C. Rainy season brings spectacular blooms.',
                'images' => [
                    'images/flowers.jpg',
                    'images/mountain.jpg',
                    'images/nature.jpg',
                    'images/landscape.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Mount Ol\'doinyo Lengai',
                'description' => 'Mount Ol\'doinyo Lengai, meaning "Mountain of God" in Maasai language, is an active volcano and one of Tanzania\'s most unique destinations. Known for its carbonatite lava that erupts at relatively low temperatures, this sacred mountain offers challenging climbs and stunning views of Lake Natron and the surrounding landscape.',
                'location' => 'Northern Tanzania, near Lake Natron',
                'coordinates' => ['latitude' => -2.7647, 'longitude' => 35.9014],
                'highlights' => [
                    'Active volcano with unique carbonatite lava',
                    'Sacred mountain for Maasai people',
                    'Challenging climbing experience',
                    'Stunning views of Lake Natron',
                    'Geothermal activity and hot springs'
                ],
                'best_time_to_visit' => 'June to October for dry season climbing conditions',
                'weather_info' => 'Hot and dry. 25-35°C. Summit can be windy. Early morning climbs recommended.',
                'images' => [
                    'images/volcano.jpg',
                    'images/mountain.jpg',
                    'images/lake.jpg',
                    'images/landscape.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Lake Natron',
                'description' => 'Lake Natron is a shallow salt lake in northern Tanzania, famous for its red waters and massive flamingo populations. The lake is a breeding ground for over 2.5 million lesser flamingos and offers dramatic landscapes with the backdrop of Mount Ol\'doinyo Lengai. It\'s a photographer\'s paradise.',
                'location' => 'Northern Tanzania, near the Kenya border',
                'coordinates' => ['latitude' => -2.2500, 'longitude' => 36.0000],
                'highlights' => [
                    'Massive flamingo breeding grounds',
                    'Red-colored alkaline waters',
                    'Dramatic landscapes and salt formations',
                    'Views of Mount Ol\'doinyo Lengai',
                    'Waterfalls and hiking trails'
                ],
                'best_time_to_visit' => 'June to October for dry season and best flamingo viewing',
                'weather_info' => 'Hot and dry. 30-40°C. Very alkaline environment. Early morning visits recommended.',
                'images' => [
                    'images/flamingo.jpg',
                    'images/lake.jpg',
                    'images/landscape.jpg',
                    'images/salt.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Udzungwa Mountains National Park',
                'description' => 'Udzungwa Mountains National Park is a biodiversity hotspot protecting a chain of a dozen large mountains covered in pristine rainforest. The park is known for its endemic species, including the Udzungwa red colobus monkey and several unique bird species. It offers excellent hiking trails and waterfalls.',
                'location' => 'Eastern Tanzania, Iringa Region',
                'coordinates' => ['latitude' => -7.7333, 'longitude' => 36.6667],
                'highlights' => [
                    'Endemic Udzungwa red colobus monkey',
                    'Pristine rainforest ecosystems',
                    'Spectacular waterfalls (Sanje Falls)',
                    'Excellent hiking trails',
                    'Bird watching (over 400 species)'
                ],
                'best_time_to_visit' => 'June to October for dry season hiking',
                'weather_info' => 'Cool and humid in mountains. 15-25°C. Rainy season (November-May) makes trails slippery.',
                'images' => [
                    'images/waterfall.jpg',
                    'images/forest.jpg',
                    'images/monkey.jpg',
                    'images/mountain.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Saadani National Park',
                'description' => 'Saadani National Park is unique as Tanzania\'s only coastal wildlife sanctuary, where the bush meets the beach. The park offers the rare opportunity to see wildlife including elephants, lions, and leopards against the backdrop of the Indian Ocean. It\'s perfect for combining safari and beach experiences.',
                'location' => 'Eastern Tanzania, Tanga Region on the coast',
                'coordinates' => ['latitude' => -5.7333, 'longitude' => 38.7167],
                'highlights' => [
                    'Only coastal wildlife sanctuary in Tanzania',
                    'Wildlife on the beach experience',
                    'Wami River boat safaris',
                    'Green turtle nesting sites',
                    'Combination of safari and beach'
                ],
                'best_time_to_visit' => 'June to October for dry season wildlife; January to February for turtle nesting',
                'weather_info' => 'Hot and humid coastal climate. 25-30°C. Sea breezes provide relief.',
                'images' => [
                    'images/beach.jpg',
                    'images/elephant.jpg',
                    'images/river.jpg',
                    'images/ocean.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Mikumi National Park',
                'description' => 'Mikumi National Park is Tanzania\'s fourth-largest national park and one of its most accessible. Located just a few hours from Dar es Salaam, the park offers excellent wildlife viewing including lions, elephants, buffaloes, and hippos. The Mkata Floodplain provides spectacular game viewing opportunities.',
                'location' => 'Eastern Tanzania, Morogoro Region',
                'coordinates' => ['latitude' => -6.9167, 'longitude' => 37.2500],
                'highlights' => [
                    'Most accessible park from Dar es Salaam',
                    'Excellent wildlife viewing on Mkata Floodplain',
                    'Lions, elephants, buffaloes, and hippos',
                    'Diverse landscapes from floodplains to mountains',
                    'Perfect for short safari trips'
                ],
                'best_time_to_visit' => 'June to October for dry season wildlife viewing',
                'weather_info' => 'Warm and dry. 25-30°C. Cool nights. Wet season (November-May) brings lush vegetation.',
                'images' => [
                    'images/elephant.jpg',
                    'images/lion.jpg',
                    'images/floodplain.jpg',
                    'images/sunset.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Usambara Mountains',
                'description' => 'The Usambara Mountains are a verdant mountain range in northeastern Tanzania, known for their biodiversity and cultural richness. The area offers excellent hiking trails through tropical forests, traditional villages, and stunning viewpoints. It\'s a perfect destination for nature lovers and cultural enthusiasts.',
                'location' => 'Eastern Tanzania, Tanga Region',
                'coordinates' => ['latitude' => -5.0000, 'longitude' => 38.5000],
                'highlights' => [
                    'Biodiversity hotspot with endemic species',
                    'Excellent hiking and walking trails',
                    'Traditional village cultural experiences',
                    'Stunning mountain viewpoints',
                    'Bird watching and butterfly watching'
                ],
                'best_time_to_visit' => 'June to October for dry season hiking',
                'weather_info' => 'Cool and misty in mountains. 15-25°C. Rainy season (November-May) brings lush greenery.',
                'images' => [
                    'images/mountain.jpg',
                    'images/forest.jpg',
                    'images/village.jpg',
                    'images/viewpoint.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Amani Nature Forest Reserve',
                'description' => 'Amani Nature Forest Reserve is a botanical paradise in the East Usambara Mountains, known for its incredible biodiversity and endemic species. The reserve protects pristine montane forest and is home to numerous endemic birds, butterflies, and plants. It\'s a must-visit for nature enthusiasts and researchers.',
                'location' => 'Eastern Tanzania, Tanga Region',
                'coordinates' => ['latitude' => -5.0833, 'longitude' => 38.6167],
                'highlights' => [
                    'High biodiversity with endemic species',
                    'Botanical research station',
                    'Endemic bird and butterfly species',
                    'Pristine montane forest',
                    'Nature trails and hiking'
                ],
                'best_time_to_visit' => 'June to October for dry season visits',
                'weather_info' => 'Cool and misty. 15-25°C. High humidity. Rainy season (November-May) brings lush growth.',
                'images' => [
                    'images/forest.jpg',
                    'images/butterfly.jpg',
                    'images/bird.jpg',
                    'images/nature.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Kalambo Falls',
                'description' => 'Kalambo Falls is one of Africa\'s highest waterfalls, plunging 215 meters into the Kalambo River gorge near the Zambian border. The falls are surrounded by pristine forest and archaeological sites, making it a spectacular natural wonder and an important cultural heritage site.',
                'location' => 'Southern Tanzania, near the Zambia border',
                'coordinates' => ['latitude' => -8.7667, 'longitude' => 31.2333],
                'highlights' => [
                    'One of Africa\'s highest waterfalls (215m)',
                    'Archaeological sites with ancient tools',
                    'Pristine forest surroundings',
                    'Spectacular natural scenery',
                    'Hiking and nature walks'
                ],
                'best_time_to_visit' => 'June to October for dry season and best waterfall flow',
                'weather_info' => 'Warm and humid. 20-28°C. Misty near the falls. Dry season best for access.',
                'images' => [
                    'images/waterfall.jpg',
                    'images/forest.jpg',
                    'images/river.jpg',
                    'images/canyon.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Kondoa Rock Art Sites',
                'description' => 'The Kondoa Rock Art Sites are a UNESCO World Heritage Site featuring over 150 painted rock shelters depicting ancient human life. These prehistoric paintings, dating back over 2,000 years, provide invaluable insights into the cultural heritage of the region and are among the most important rock art collections in Africa.',
                'location' => 'Northern Tanzania, Kondoa District',
                'coordinates' => ['latitude' => -4.9167, 'longitude' => 35.6667],
                'highlights' => [
                    'UNESCO World Heritage Site',
                    'Over 150 painted rock shelters',
                    'Ancient rock art over 2,000 years old',
                    'Cultural and historical significance',
                    'Guided tours and archaeological insights'
                ],
                'best_time_to_visit' => 'June to October for dry season access',
                'weather_info' => 'Warm and dry. 25-30°C. Cool nights. Wet season (November-May) can limit access.',
                'images' => [
                    'images/rockart.jpg',
                    'images/cave.jpg',
                    'images/painting.jpg',
                    'images/landscape.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Mbozi Meteorite',
                'description' => 'The Mbozi Meteorite is one of the world\'s largest meteorites, weighing approximately 16 tons and measuring about 3 meters in diameter. This iron meteorite is estimated to be around 30,000 years old and is a fascinating geological attraction that draws scientists and curious visitors alike.',
                'location' => 'Southern Tanzania, Mbeya Region',
                'coordinates' => ['latitude' => -9.0000, 'longitude' => 33.5000],
                'highlights' => [
                    'One of the world\'s largest meteorites (16 tons)',
                    'Estimated 30,000 years old',
                    'Unique geological formation',
                    'Scientific research site',
                    'Educational and fascinating attraction'
                ],
                'best_time_to_visit' => 'June to October for dry season access',
                'weather_info' => 'Warm and dry. 20-28°C. Cool nights. Accessible year-round.',
                'images' => [
                    'images/meteorite.jpg',
                    'images/rock.jpg',
                    'images/landscape.jpg',
                    'images/geology.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Lake Ngozi',
                'description' => 'Lake Ngozi is a stunning crater lake in the Mbeya Highlands, known for its emerald-green waters and dramatic volcanic scenery. The lake is surrounded by pristine forest and offers excellent hiking opportunities with breathtaking views. It\'s one of Tanzania\'s most beautiful natural attractions.',
                'location' => 'Southern Tanzania, Mbeya Region',
                'coordinates' => ['latitude' => -9.0000, 'longitude' => 33.5000],
                'highlights' => [
                    'Emerald-green crater lake',
                    'Dramatic volcanic scenery',
                    'Pristine forest surroundings',
                    'Excellent hiking trails',
                    'Breathtaking viewpoints'
                ],
                'best_time_to_visit' => 'June to October for dry season hiking',
                'weather_info' => 'Cool due to altitude. 15-25°C. Misty mornings. Dry season best for hiking.',
                'images' => [
                    'images/lake.jpg',
                    'images/crater.jpg',
                    'images/forest.jpg',
                    'images/viewpoint.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Kaporogwe Falls',
                'description' => 'Kaporogwe Falls is a beautiful waterfall cascading down the Kaporogwe River in southern Tanzania. The falls are surrounded by lush vegetation and offer a peaceful natural setting perfect for nature walks and picnics. It\'s a hidden gem for those seeking off-the-beaten-path natural attractions.',
                'location' => 'Southern Tanzania, Mbeya Region',
                'coordinates' => ['latitude' => -9.0000, 'longitude' => 33.5000],
                'highlights' => [
                    'Beautiful cascading waterfall',
                    'Lush vegetation surroundings',
                    'Peaceful natural setting',
                    'Nature walking trails',
                    'Hidden gem attraction'
                ],
                'best_time_to_visit' => 'June to October for dry season and best waterfall flow',
                'weather_info' => 'Warm and humid. 20-28°C. Misty near the falls. Dry season best for access.',
                'images' => [
                    'images/waterfall.jpg',
                    'images/river.jpg',
                    'images/forest.jpg',
                    'images/nature.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Matema Beach',
                'description' => 'Matema Beach is a pristine beach on the shores of Lake Nyasa (Lake Malawi) in southern Tanzania. Known for its golden sands and crystal-clear waters, the beach offers excellent swimming, snorkeling, and relaxation opportunities. The area is surrounded by mountains, creating a stunning backdrop.',
                'location' => 'Southern Tanzania, on Lake Nyasa',
                'coordinates' => ['latitude' => -9.6667, 'longitude' => 34.0000],
                'highlights' => [
                    'Pristine golden sand beach',
                    'Crystal-clear Lake Nyasa waters',
                    'Excellent swimming and snorkeling',
                    'Mountain backdrop scenery',
                    'Peaceful and uncrowded'
                ],
                'best_time_to_visit' => 'June to October for dry season and best beach conditions',
                'weather_info' => 'Warm and pleasant. 22-28°C. Lake breeze provides comfort. Dry season best for activities.',
                'images' => [
                    'images/beach.jpg',
                    'images/lake.jpg',
                    'images/sunset.jpg',
                    'images/mountain.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Lake Chala',
                'description' => 'Lake Chala is a stunning caldera lake on the border between Tanzania and Kenya, known for its deep blue waters and dramatic scenery. The lake is surrounded by steep crater walls and offers excellent hiking, swimming, and camping opportunities. It\'s a hidden gem with spectacular views.',
                'location' => 'Northern Tanzania, on the Kenya border',
                'coordinates' => ['latitude' => -3.2000, 'longitude' => 37.7000],
                'highlights' => [
                    'Deep blue caldera lake',
                    'Dramatic crater wall scenery',
                    'Excellent hiking trails',
                    'Swimming and camping opportunities',
                    'Spectacular views of Kilimanjaro'
                ],
                'best_time_to_visit' => 'June to October for dry season activities',
                'weather_info' => 'Warm and dry. 20-28°C. Cool nights. Dry season best for hiking and swimming.',
                'images' => [
                    'images/lake.jpg',
                    'images/crater.jpg',
                    'images/viewpoint.jpg',
                    'images/hiking.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Lake Jipe',
                'description' => 'Lake Jipe is a small but ecologically important lake on the border between Tanzania and Kenya. The lake is a haven for birdlife, including hippos and crocodiles, and offers excellent bird watching opportunities. The surrounding wetlands provide important habitat for numerous species.',
                'location' => 'Northern Tanzania, on the Kenya border',
                'coordinates' => ['latitude' => -3.8000, 'longitude' => 37.7000],
                'highlights' => [
                    'Important bird habitat',
                    'Hippos and crocodiles',
                    'Excellent bird watching',
                    'Wetland ecosystem',
                    'Border lake experience'
                ],
                'best_time_to_visit' => 'June to October for dry season bird watching',
                'weather_info' => 'Warm and humid. 25-30°C. Wet season (November-May) brings water and birds.',
                'images' => [
                    'images/lake.jpg',
                    'images/birds.jpg',
                    'images/hippo.jpg',
                    'images/wetland.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Lake Eyasi',
                'description' => 'Lake Eyasi is a seasonal salt lake in northern Tanzania, known for its cultural significance and the Hadzabe and Datoga tribes who live in the area. The lake offers unique cultural experiences, including hunting with the Hadzabe bushmen and visiting Datoga villages. It\'s a fascinating cultural destination.',
                'location' => 'Northern Tanzania, near the Rift Valley',
                'coordinates' => ['latitude' => -3.5000, 'longitude' => 35.0000],
                'highlights' => [
                    'Hadzabe bushmen cultural experience',
                    'Datoga tribe village visits',
                    'Traditional hunting demonstrations',
                    'Seasonal salt lake scenery',
                    'Unique cultural immersion'
                ],
                'best_time_to_visit' => 'June to October for dry season cultural visits',
                'weather_info' => 'Hot and dry. 25-35°C. Dusty conditions. Dry season best for cultural activities.',
                'images' => [
                    'images/tribe.jpg',
                    'images/lake.jpg',
                    'images/culture.jpg',
                    'images/landscape.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Amboni Caves',
                'description' => 'Amboni Caves are the most extensive limestone caves in East Africa, located near Tanga in northern Tanzania. The caves feature impressive stalactites, stalagmites, and underground chambers. They are both a geological wonder and hold cultural significance for local communities.',
                'location' => 'Eastern Tanzania, near Tanga',
                'coordinates' => ['latitude' => -5.0833, 'longitude' => 39.0333],
                'highlights' => [
                    'Most extensive limestone caves in East Africa',
                    'Impressive stalactites and stalagmites',
                    'Underground chambers and passages',
                    'Geological wonder',
                    'Cultural significance'
                ],
                'best_time_to_visit' => 'June to October for dry season access',
                'weather_info' => 'Warm and humid. 25-30°C. Cool inside caves. Dry season best for access.',
                'images' => [
                    'images/cave.jpg',
                    'images/stalactite.jpg',
                    'images/underground.jpg',
                    'images/geology.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Pare Mountains',
                'description' => 'The Pare Mountains are a scenic mountain range in northeastern Tanzania, offering excellent hiking opportunities and cultural experiences. The area is known for its traditional villages, stunning viewpoints, and diverse flora and fauna. It\'s a perfect destination for off-the-beaten-path adventures.',
                'location' => 'Northern Tanzania, Kilimanjaro Region',
                'coordinates' => ['latitude' => -4.0000, 'longitude' => 37.5000],
                'highlights' => [
                    'Excellent hiking and walking trails',
                    'Traditional village cultural experiences',
                    'Stunning mountain viewpoints',
                    'Diverse flora and fauna',
                    'Off-the-beaten-path adventure'
                ],
                'best_time_to_visit' => 'June to October for dry season hiking',
                'weather_info' => 'Cool and misty in mountains. 15-25°C. Rainy season (November-May) brings lush greenery.',
                'images' => [
                    'images/mountain.jpg',
                    'images/village.jpg',
                    'images/viewpoint.jpg',
                    'images/hiking.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Uluguru Mountains',
                'description' => 'The Uluguru Mountains are a biodiversity hotspot in eastern Tanzania, known for their endemic species and pristine rainforests. The mountains offer excellent hiking, bird watching, and opportunities to visit traditional Luguru villages. It\'s a paradise for nature enthusiasts and cultural explorers.',
                'location' => 'Eastern Tanzania, Morogoro Region',
                'coordinates' => ['latitude' => -6.8333, 'longitude' => 37.6667],
                'highlights' => [
                    'Biodiversity hotspot with endemic species',
                    'Pristine rainforest ecosystems',
                    'Excellent hiking trails',
                    'Bird watching (including endemic species)',
                    'Traditional Luguru village visits'
                ],
                'best_time_to_visit' => 'June to October for dry season hiking',
                'weather_info' => 'Cool and humid in mountains. 15-25°C. Rainy season (November-May) brings lush vegetation.',
                'images' => [
                    'images/mountain.jpg',
                    'images/forest.jpg',
                    'images/bird.jpg',
                    'images/village.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Lake Nyasa',
                'description' => 'Lake Nyasa (Lake Malawi) is one of Africa\'s Great Lakes, forming the border between Tanzania, Malawi, and Mozambique. The lake is known for its crystal-clear waters, diverse cichlid fish species, and beautiful beaches. It offers excellent swimming, snorkeling, and cultural experiences.',
                'location' => 'Southern Tanzania, bordering Malawi and Mozambique',
                'coordinates' => ['latitude' => -12.0000, 'longitude' => 34.0000],
                'highlights' => [
                    'One of Africa\'s Great Lakes',
                    'Crystal-clear waters',
                    'Diverse cichlid fish species',
                    'Beautiful beaches',
                    'Cultural experiences'
                ],
                'best_time_to_visit' => 'June to October for dry season activities',
                'weather_info' => 'Warm and pleasant. 22-28°C. Lake breeze provides comfort. Dry season best for activities.',
                'images' => [
                    'images/lake.jpg',
                    'images/beach.jpg',
                    'images/fish.jpg',
                    'images/sunset.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Mount Meru',
                'description' => 'Mount Meru is Tanzania\'s second-highest peak at 4,566 meters and an excellent alternative to Kilimanjaro. The mountain offers challenging climbing through diverse ecosystems, from rainforest to alpine desert. The summit provides spectacular views of Mount Kilimanjaro and the surrounding landscape.',
                'location' => 'Northern Tanzania, Arusha National Park',
                'coordinates' => ['latitude' => -3.2589, 'longitude' => 36.9879],
                'highlights' => [
                    'Tanzania\'s second-highest peak (4,566m)',
                    'Challenging climbing experience',
                    'Diverse ecosystems',
                    'Views of Mount Kilimanjaro',
                    'Less crowded than Kilimanjaro'
                ],
                'best_time_to_visit' => 'June to October for dry season climbing',
                'weather_info' => 'Varies by altitude. Base: 20-25°C. Summit: -10°C to -15°C. Weather can change rapidly.',
                'images' => [
                    'images/mountain.jpg',
                    'images/summit.jpg',
                    'images/forest.jpg',
                    'images/viewpoint.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Ngurdoto Crater',
                'description' => 'Ngurdoto Crater, often called the "Little Ngorongoro," is a volcanic crater in Arusha National Park. The crater floor is a swampy grassland surrounded by forest, offering excellent wildlife viewing including buffalo, warthog, and various antelope species. It\'s a compact and scenic destination.',
                'location' => 'Northern Tanzania, Arusha National Park',
                'coordinates' => ['latitude' => -3.2500, 'longitude' => 36.9833],
                'highlights' => [
                    'Mini crater similar to Ngorongoro',
                    'Swampy grassland floor',
                    'Excellent wildlife viewing',
                    'Forest surroundings',
                    'Compact and scenic destination'
                ],
                'best_time_to_visit' => 'June to October for dry season wildlife viewing',
                'weather_info' => 'Mild due to altitude. 15-25°C. Cool nights. Misty mornings common.',
                'images' => [
                    'images/crater.jpg',
                    'images/buffalo.jpg',
                    'images/forest.jpg',
                    'images/viewpoint.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Materuni Waterfalls',
                'description' => 'Materuni Waterfalls are spectacular twin waterfalls located on the slopes of Mount Kilimanjaro. The falls cascade through lush coffee plantations and offer excellent hiking opportunities. Visitors can also experience traditional Chagga culture and coffee tours in the area.',
                'location' => 'Northern Tanzania, Mount Kilimanjaro slopes',
                'coordinates' => ['latitude' => -3.3000, 'longitude' => 37.3667],
                'highlights' => [
                    'Spectacular twin waterfalls',
                    'Coffee plantation tours',
                    'Traditional Chagga culture',
                    'Excellent hiking trails',
                    'Views of Mount Kilimanjaro'
                ],
                'best_time_to_visit' => 'June to October for dry season hiking',
                'weather_info' => 'Cool and misty. 15-25°C. Rainy season (November-May) makes trails slippery.',
                'images' => [
                    'images/waterfall.jpg',
                    'images/coffee.jpg',
                    'images/hiking.jpg',
                    'images/kilimanjaro.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Ukerewe Island',
                'description' => 'Ukerewe Island is the largest island in Lake Victoria and offers a unique cultural experience away from the main tourist routes. The island is known for its traditional fishing communities, pristine beaches, and relaxed atmosphere. It\'s perfect for cultural immersion and lakeside relaxation.',
                'location' => 'Lake Victoria, Mwanza Region',
                'coordinates' => ['latitude' => -2.0000, 'longitude' => 33.0000],
                'highlights' => [
                    'Largest island in Lake Victoria',
                    'Traditional fishing communities',
                    'Pristine beaches',
                    'Cultural immersion',
                    'Relaxed atmosphere'
                ],
                'best_time_to_visit' => 'June to October for dry season activities',
                'weather_info' => 'Warm and pleasant. 22-28°C. Lake breeze provides comfort. Dry season best for activities.',
                'images' => [
                    'images/island.jpg',
                    'images/beach.jpg',
                    'images/fishing.jpg',
                    'images/lake.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Pugu Kazimzumbwi Nature Forest Reserve',
                'description' => 'Pugu Kazimzumbwi Nature Forest Reserve is one of the oldest forest reserves in Tanzania, protecting pristine coastal forest near Dar es Salaam. The reserve is a biodiversity hotspot with endemic species and offers excellent nature walks and bird watching opportunities.',
                'location' => 'Eastern Tanzania, near Dar es Salaam',
                'coordinates' => ['latitude' => -6.8333, 'longitude' => 39.0000],
                'highlights' => [
                    'One of Tanzania\'s oldest forest reserves',
                    'Biodiversity hotspot',
                    'Endemic species',
                    'Nature walking trails',
                    'Bird watching'
                ],
                'best_time_to_visit' => 'June to October for dry season visits',
                'weather_info' => 'Warm and humid. 25-30°C. Cool in forest. Dry season best for walking.',
                'images' => [
                    'images/forest.jpg',
                    'images/bird.jpg',
                    'images/nature.jpg',
                    'images/trail.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Mbudya Island Marine Reserve',
                'description' => 'Mbudya Island Marine Reserve is a pristine island paradise near Dar es Salaam, offering white sand beaches, crystal-clear waters, and excellent snorkeling. The reserve protects coral reefs and marine life, making it a perfect day trip destination for beach and marine enthusiasts.',
                'location' => 'Indian Ocean, near Dar es Salaam',
                'coordinates' => ['latitude' => -6.5000, 'longitude' => 39.3000],
                'highlights' => [
                    'White sand beaches',
                    'Crystal-clear waters',
                    'Excellent snorkeling',
                    'Coral reef protection',
                    'Day trip from Dar es Salaam'
                ],
                'best_time_to_visit' => 'June to October for dry season and best snorkeling',
                'weather_info' => 'Tropical climate. 25-30°C year-round. Best visibility during dry season.',
                'images' => [
                    'images/beach.jpg',
                    'images/snorkeling.jpg',
                    'images/island.jpg',
                    'images/coral.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Bongoyo Island Marine Reserve',
                'description' => 'Bongoyo Island Marine Reserve is a popular day trip destination from Dar es Salaam, featuring pristine beaches, clear waters, and excellent snorkeling opportunities. The island offers a peaceful escape from the city and is perfect for swimming, sunbathing, and marine life observation.',
                'location' => 'Indian Ocean, near Dar es Salaam',
                'coordinates' => ['latitude' => -6.5000, 'longitude' => 39.3000],
                'highlights' => [
                    'Popular day trip destination',
                    'Pristine beaches',
                    'Clear waters for swimming',
                    'Excellent snorkeling',
                    'Peaceful island escape'
                ],
                'best_time_to_visit' => 'June to October for dry season and best conditions',
                'weather_info' => 'Tropical climate. 25-30°C year-round. Best conditions during dry season.',
                'images' => [
                    'images/beach.jpg',
                    'images/island.jpg',
                    'images/swimming.jpg',
                    'images/sunset.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Pangavini Island Marine Reserve',
                'description' => 'Pangavini Island Marine Reserve is a small pristine island near Dar es Salaam, offering untouched beaches and excellent marine life viewing. The reserve protects important coral reefs and provides a peaceful retreat for those seeking solitude and natural beauty.',
                'location' => 'Indian Ocean, near Dar es Salaam',
                'coordinates' => ['latitude' => -6.5000, 'longitude' => 39.3000],
                'highlights' => [
                    'Untouched beaches',
                    'Excellent marine life viewing',
                    'Coral reef protection',
                    'Peaceful retreat',
                    'Pristine natural beauty'
                ],
                'best_time_to_visit' => 'June to October for dry season and best conditions',
                'weather_info' => 'Tropical climate. 25-30°C year-round. Best conditions during dry season.',
                'images' => [
                    'images/beach.jpg',
                    'images/island.jpg',
                    'images/marine.jpg',
                    'images/coral.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Fungu Yasin Sand Bar',
                'description' => 'Fungu Yasin Sand Bar is a stunning sandbar in the Indian Ocean near Dar es Salaam, offering unique scenery and excellent swimming opportunities. The sandbar emerges during low tide, creating a beautiful expanse of white sand surrounded by turquoise waters.',
                'location' => 'Indian Ocean, near Dar es Salaam',
                'coordinates' => ['latitude' => -6.5000, 'longitude' => 39.3000],
                'highlights' => [
                    'Stunning sandbar formation',
                    'Emerges during low tide',
                    'White sand and turquoise waters',
                    'Excellent swimming',
                    'Unique natural phenomenon'
                ],
                'best_time_to_visit' => 'June to October for dry season and best conditions',
                'weather_info' => 'Tropical climate. 25-30°C year-round. Best visibility during low tide.',
                'images' => [
                    'images/sandbar.jpg',
                    'images/beach.jpg',
                    'images/ocean.jpg',
                    'images/sunset.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Sinda Island Marine Reserve',
                'description' => 'Sinda Island Marine Reserve is a protected marine area near Dar es Salaam, featuring pristine beaches, coral reefs, and diverse marine life. The reserve offers excellent snorkeling, diving, and beach relaxation opportunities away from the crowds.',
                'location' => 'Indian Ocean, near Dar es Salaam',
                'coordinates' => ['latitude' => -6.5000, 'longitude' => 39.3000],
                'highlights' => [
                    'Protected marine area',
                    'Pristine beaches',
                    'Coral reefs',
                    'Diverse marine life',
                    'Excellent snorkeling and diving'
                ],
                'best_time_to_visit' => 'June to October for dry season and best conditions',
                'weather_info' => 'Tropical climate. 25-30°C year-round. Best visibility during dry season.',
                'images' => [
                    'images/beach.jpg',
                    'images/coral.jpg',
                    'images/marine.jpg',
                    'images/island.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Tanga Marine Park & Reserves',
                'description' => 'Tanga Marine Park & Reserves is a protected marine area along the northern coast of Tanzania, featuring coral reefs, mangrove forests, and diverse marine ecosystems. The park offers excellent diving, snorkeling, and opportunities to explore coastal biodiversity.',
                'location' => 'Eastern Tanzania, Tanga Region',
                'coordinates' => ['latitude' => -5.0833, 'longitude' => 39.0333],
                'highlights' => [
                    'Protected marine ecosystems',
                    'Coral reefs and mangroves',
                    'Excellent diving and snorkeling',
                    'Diverse marine life',
                    'Coastal biodiversity exploration'
                ],
                'best_time_to_visit' => 'June to October for dry season and best diving',
                'weather_info' => 'Tropical climate. 25-30°C year-round. Best visibility during dry season.',
                'images' => [
                    'images/marine.jpg',
                    'images/coral.jpg',
                    'images/diving.jpg',
                    'images/coast.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Maziwe Island Marine Reserve',
                'description' => 'Maziwe Island Marine Reserve is a small island sanctuary off the coast of Tanzania, protecting important coral reefs and marine habitats. The reserve offers excellent snorkeling and diving opportunities, with healthy coral formations and diverse fish populations.',
                'location' => 'Indian Ocean, off the coast of Tanga',
                'coordinates' => ['latitude' => -5.0833, 'longitude' => 39.0333],
                'highlights' => [
                    'Island sanctuary',
                    'Important coral reefs',
                    'Marine habitat protection',
                    'Excellent snorkeling and diving',
                    'Healthy coral formations'
                ],
                'best_time_to_visit' => 'June to October for dry season and best diving',
                'weather_info' => 'Tropical climate. 25-30°C year-round. Best visibility during dry season.',
                'images' => [
                    'images/island.jpg',
                    'images/coral.jpg',
                    'images/diving.jpg',
                    'images/marine.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Ulenge Island Marine Reserve',
                'description' => 'Ulenge Island Marine Reserve is a protected marine area featuring pristine coral reefs and diverse marine ecosystems. The reserve offers excellent opportunities for snorkeling, diving, and marine life observation in a protected environment.',
                'location' => 'Indian Ocean, off the coast of Tanga',
                'coordinates' => ['latitude' => -5.0833, 'longitude' => 39.0333],
                'highlights' => [
                    'Protected marine area',
                    'Pristine coral reefs',
                    'Diverse marine ecosystems',
                    'Excellent snorkeling and diving',
                    'Marine life observation'
                ],
                'best_time_to_visit' => 'June to October for dry season and best diving',
                'weather_info' => 'Tropical climate. 25-30°C year-round. Best visibility during dry season.',
                'images' => [
                    'images/island.jpg',
                    'images/coral.jpg',
                    'images/marine.jpg',
                    'images/diving.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Kwale Island Marine Reserve',
                'description' => 'Kwale Island Marine Reserve is a protected marine sanctuary featuring healthy coral reefs and abundant marine life. The reserve offers excellent snorkeling and diving opportunities, with clear waters and diverse fish populations.',
                'location' => 'Indian Ocean, off the coast of Tanga',
                'coordinates' => ['latitude' => -5.0833, 'longitude' => 39.0333],
                'highlights' => [
                    'Marine sanctuary',
                    'Healthy coral reefs',
                    'Abundant marine life',
                    'Excellent snorkeling and diving',
                    'Clear waters'
                ],
                'best_time_to_visit' => 'June to October for dry season and best diving',
                'weather_info' => 'Tropical climate. 25-30°C year-round. Best visibility during dry season.',
                'images' => [
                    'images/island.jpg',
                    'images/coral.jpg',
                    'images/diving.jpg',
                    'images/marine.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Kirui Island Marine Reserve',
                'description' => 'Kirui Island Marine Reserve is a protected marine area featuring pristine coral reefs and important marine habitats. The reserve offers excellent opportunities for marine exploration, including snorkeling, diving, and wildlife observation.',
                'location' => 'Indian Ocean, off the coast of Tanga',
                'coordinates' => ['latitude' => -5.0833, 'longitude' => 39.0333],
                'highlights' => [
                    'Protected marine area',
                    'Pristine coral reefs',
                    'Important marine habitats',
                    'Excellent snorkeling and diving',
                    'Marine wildlife observation'
                ],
                'best_time_to_visit' => 'June to October for dry season and best diving',
                'weather_info' => 'Tropical climate. 25-30°C year-round. Best visibility during dry season.',
                'images' => [
                    'images/island.jpg',
                    'images/coral.jpg',
                    'images/marine.jpg',
                    'images/diving.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Yambe Island',
                'description' => 'Yambe Island is a pristine island paradise offering beautiful beaches and excellent swimming opportunities. The island provides a peaceful retreat with white sand beaches and clear turquoise waters, perfect for relaxation and marine activities.',
                'location' => 'Indian Ocean, off the coast of Tanga',
                'coordinates' => ['latitude' => -5.0833, 'longitude' => 39.0333],
                'highlights' => [
                    'Pristine island paradise',
                    'Beautiful beaches',
                    'Excellent swimming',
                    'Clear turquoise waters',
                    'Peaceful retreat'
                ],
                'best_time_to_visit' => 'June to October for dry season and best conditions',
                'weather_info' => 'Tropical climate. 25-30°C year-round. Best conditions during dry season.',
                'images' => [
                    'images/island.jpg',
                    'images/beach.jpg',
                    'images/ocean.jpg',
                    'images/sunset.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Mwewe Island Marine Reserve',
                'description' => 'Mwewe Island Marine Reserve is a protected marine area featuring diverse coral reefs and marine ecosystems. The reserve offers excellent opportunities for snorkeling, diving, and marine life observation in a pristine environment.',
                'location' => 'Indian Ocean, off the coast of Tanga',
                'coordinates' => ['latitude' => -5.0833, 'longitude' => 39.0333],
                'highlights' => [
                    'Protected marine area',
                    'Diverse coral reefs',
                    'Marine ecosystems',
                    'Excellent snorkeling and diving',
                    'Pristine environment'
                ],
                'best_time_to_visit' => 'June to October for dry season and best diving',
                'weather_info' => 'Tropical climate. 25-30°C year-round. Best visibility during dry season.',
                'images' => [
                    'images/island.jpg',
                    'images/coral.jpg',
                    'images/marine.jpg',
                    'images/diving.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Toten Island',
                'description' => 'Toten Island is a beautiful island offering pristine beaches and excellent swimming opportunities. The island provides a peaceful escape with white sand beaches and clear waters, perfect for relaxation and beach activities.',
                'location' => 'Indian Ocean, off the coast of Tanga',
                'coordinates' => ['latitude' => -5.0833, 'longitude' => 39.0333],
                'highlights' => [
                    'Beautiful island',
                    'Pristine beaches',
                    'Excellent swimming',
                    'Clear waters',
                    'Peaceful escape'
                ],
                'best_time_to_visit' => 'June to October for dry season and best conditions',
                'weather_info' => 'Tropical climate. 25-30°C year-round. Best conditions during dry season.',
                'images' => [
                    'images/island.jpg',
                    'images/beach.jpg',
                    'images/ocean.jpg',
                    'images/sunset.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Mnazi Bay - Ruvuma Estuary Marine Park',
                'description' => 'Mnazi Bay - Ruvuma Estuary Marine Park is a protected marine area in southern Tanzania, featuring mangrove forests, coral reefs, and diverse marine ecosystems. The park offers excellent opportunities for marine exploration and wildlife viewing.',
                'location' => 'Southern Tanzania, near the Mozambique border',
                'coordinates' => ['latitude' => -10.5000, 'longitude' => 40.0000],
                'highlights' => [
                    'Protected marine area',
                    'Mangrove forests',
                    'Coral reefs',
                    'Diverse marine ecosystems',
                    'Marine exploration'
                ],
                'best_time_to_visit' => 'June to October for dry season and best conditions',
                'weather_info' => 'Tropical climate. 25-30°C year-round. Best conditions during dry season.',
                'images' => [
                    'images/marine.jpg',
                    'images/mangrove.jpg',
                    'images/coral.jpg',
                    'images/estuary.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Chumbe Island Marine Sanctuary',
                'description' => 'Chumbe Island Marine Sanctuary is a privately managed marine conservation area featuring pristine coral reefs and diverse marine life. The sanctuary offers excellent snorkeling, diving, and educational opportunities about marine conservation.',
                'location' => 'Indian Ocean, near Zanzibar',
                'coordinates' => ['latitude' => -6.1667, 'longitude' => 39.2000],
                'highlights' => [
                    'Marine conservation area',
                    'Pristine coral reefs',
                    'Diverse marine life',
                    'Excellent snorkeling and diving',
                    'Educational opportunities'
                ],
                'best_time_to_visit' => 'June to October for dry season and best diving',
                'weather_info' => 'Tropical climate. 25-30°C year-round. Best visibility during dry season.',
                'images' => [
                    'images/island.jpg',
                    'images/coral.jpg',
                    'images/diving.jpg',
                    'images/marine.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Mnemba Island Conservation Area',
                'description' => 'Mnemba Island Conservation Area is a protected marine area featuring pristine coral reefs and excellent diving opportunities. The conservation area protects important marine habitats and offers world-class snorkeling and diving experiences.',
                'location' => 'Indian Ocean, near Zanzibar',
                'coordinates' => ['latitude' => -5.7500, 'longitude' => 39.4000],
                'highlights' => [
                    'Protected marine area',
                    'Pristine coral reefs',
                    'Excellent diving opportunities',
                    'Important marine habitats',
                    'World-class snorkeling'
                ],
                'best_time_to_visit' => 'June to October for dry season and best diving',
                'weather_info' => 'Tropical climate. 25-30°C year-round. Best visibility during dry season.',
                'images' => [
                    'images/island.jpg',
                    'images/coral.jpg',
                    'images/diving.jpg',
                    'images/marine.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Kilwa',
                'description' => 'Kilwa is a historic coastal town in eastern Tanzania, known for its ancient Swahili ruins and rich cultural heritage. The area features UNESCO World Heritage Sites including Kilwa Kisiwani and Songo Mnara, offering fascinating insights into East African history.',
                'location' => 'Eastern Tanzania, Lindi Region',
                'coordinates' => ['latitude' => -8.9167, 'longitude' => 39.5000],
                'highlights' => [
                    'Historic coastal town',
                    'Ancient Swahili ruins',
                    'UNESCO World Heritage Sites',
                    'Rich cultural heritage',
                    'Historical insights'
                ],
                'best_time_to_visit' => 'June to October for dry season exploration',
                'weather_info' => 'Warm and humid. 25-30°C. Coastal breeze provides relief. Dry season best for exploration.',
                'images' => [
                    'images/ruins.jpg',
                    'images/history.jpg',
                    'images/coast.jpg',
                    'images/culture.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Kilwa Kisiwani',
                'description' => 'Kilwa Kisiwani is a UNESCO World Heritage Site featuring impressive ruins of an ancient Swahili city. The site includes remains of mosques, palaces, and fortifications, providing invaluable insights into the region\'s rich history and cultural heritage.',
                'location' => 'Eastern Tanzania, off the coast of Kilwa',
                'coordinates' => ['latitude' => -8.9167, 'longitude' => 39.5000],
                'highlights' => [
                    'UNESCO World Heritage Site',
                    'Ancient Swahili city ruins',
                    'Historic mosques and palaces',
                    'Fortifications and structures',
                    'Rich cultural heritage'
                ],
                'best_time_to_visit' => 'June to October for dry season exploration',
                'weather_info' => 'Warm and humid. 25-30°C. Coastal breeze provides relief. Dry season best for exploration.',
                'images' => [
                    'images/ruins.jpg',
                    'images/mosque.jpg',
                    'images/history.jpg',
                    'images/heritage.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Songo Mnara',
                'description' => 'Songo Mnara is an archaeological site featuring ruins of an ancient Swahili town. The site includes remains of stone buildings, mosques, and tombs, offering fascinating insights into the region\'s history and cultural heritage.',
                'location' => 'Eastern Tanzania, near Kilwa Kisiwani',
                'coordinates' => ['latitude' => -8.9167, 'longitude' => 39.5000],
                'highlights' => [
                    'Archaeological site',
                    'Ancient Swahili town ruins',
                    'Stone buildings and mosques',
                    'Historic tombs',
                    'Cultural heritage insights'
                ],
                'best_time_to_visit' => 'June to October for dry season exploration',
                'weather_info' => 'Warm and humid. 25-30°C. Coastal breeze provides relief. Dry season best for exploration.',
                'images' => [
                    'images/ruins.jpg',
                    'images/archaeology.jpg',
                    'images/history.jpg',
                    'images/tombs.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Kilwa Kivinje',
                'description' => 'Kilwa Kivinje is a historic coastal town featuring colonial-era buildings and rich cultural heritage. The town offers insights into Tanzania\'s colonial history and serves as a gateway to the Kilwa archipelago\'s historical sites.',
                'location' => 'Eastern Tanzania, Lindi Region',
                'coordinates' => ['latitude' => -8.9167, 'longitude' => 39.5000],
                'highlights' => [
                    'Historic coastal town',
                    'Colonial-era buildings',
                    'Rich cultural heritage',
                    'Colonial history insights',
                    'Gateway to historical sites'
                ],
                'best_time_to_visit' => 'June to October for dry season exploration',
                'weather_info' => 'Warm and humid. 25-30°C. Coastal breeze provides relief. Dry season best for exploration.',
                'images' => [
                    'images/town.jpg',
                    'images/colonial.jpg',
                    'images/history.jpg',
                    'images/coast.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Burigi-Chato National Park',
                'description' => 'Burigi-Chato National Park is a newly established park in western Tanzania, featuring diverse landscapes from wetlands to mountains. The park offers excellent wildlife viewing including elephants, buffaloes, and various antelope species in a pristine wilderness setting.',
                'location' => 'Western Tanzania, near Lake Victoria',
                'coordinates' => ['latitude' => -1.5000, 'longitude' => 31.5000],
                'highlights' => [
                    'Newly established national park',
                    'Diverse landscapes',
                    'Excellent wildlife viewing',
                    'Elephants and buffaloes',
                    'Pristine wilderness'
                ],
                'best_time_to_visit' => 'June to October for dry season wildlife viewing',
                'weather_info' => 'Warm and dry. 25-30°C. Cool nights. Wet season (November-May) limits access.',
                'images' => [
                    'images/wildlife.jpg',
                    'images/elephant.jpg',
                    'images/landscape.jpg',
                    'images/wetland.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Ibanda-Kyerwa National Park',
                'description' => 'Ibanda-Kyerwa National Park is a newly established park in western Tanzania, featuring diverse ecosystems and wildlife. The park offers excellent opportunities for wildlife viewing in a remote and pristine setting, away from the main tourist circuits.',
                'location' => 'Western Tanzania, near the Rwanda border',
                'coordinates' => ['latitude' => -1.5000, 'longitude' => 31.0000],
                'highlights' => [
                    'Newly established national park',
                    'Diverse ecosystems',
                    'Excellent wildlife viewing',
                    'Remote and pristine setting',
                    'Off-the-beaten-path experience'
                ],
                'best_time_to_visit' => 'June to October for dry season wildlife viewing',
                'weather_info' => 'Warm and dry. 25-30°C. Cool nights. Wet season (November-May) limits access.',
                'images' => [
                    'images/wildlife.jpg',
                    'images/landscape.jpg',
                    'images/forest.jpg',
                    'images/remote.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Saanane Island National Park',
                'description' => 'Saanane Island National Park is Tanzania\'s smallest national park, located on an island in Lake Victoria. The park offers unique wildlife viewing including hippos, crocodiles, and various antelope species, combined with beautiful lake scenery and walking safaris.',
                'location' => 'Lake Victoria, Mwanza Region',
                'coordinates' => ['latitude' => -2.5000, 'longitude' => 32.9000],
                'highlights' => [
                    'Tanzania\'s smallest national park',
                    'Island location in Lake Victoria',
                    'Hippos and crocodiles',
                    'Walking safaris',
                    'Beautiful lake scenery'
                ],
                'best_time_to_visit' => 'June to October for dry season wildlife viewing',
                'weather_info' => 'Warm and pleasant. 22-28°C. Lake breeze provides comfort. Dry season best for activities.',
                'images' => [
                    'images/island.jpg',
                    'images/hippo.jpg',
                    'images/lake.jpg',
                    'images/walking.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Rubondo Island National Park',
                'description' => 'Rubondo Island National Park is a unique island sanctuary in Lake Victoria, known for its diverse wildlife including chimpanzees, elephants, and numerous bird species. The park offers excellent walking safaris, fishing, and boat trips in a pristine island setting.',
                'location' => 'Lake Victoria, Mwanza Region',
                'coordinates' => ['latitude' => -2.3000, 'longitude' => 32.8000],
                'highlights' => [
                    'Unique island sanctuary',
                    'Chimpanzees and elephants',
                    'Numerous bird species',
                    'Walking safaris',
                    'Fishing and boat trips'
                ],
                'best_time_to_visit' => 'June to October for dry season activities',
                'weather_info' => 'Warm and pleasant. 22-28°C. Lake breeze provides comfort. Dry season best for activities.',
                'images' => [
                    'images/island.jpg',
                    'images/chimpanzee.jpg',
                    'images/bird.jpg',
                    'images/lake.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Nyerere National Park',
                'description' => 'Nyerere National Park, formerly part of Selous Game Reserve, is Tanzania\'s largest national park covering 30,893 square kilometers. The park offers exceptional wildlife viewing including elephants, lions, wild dogs, and hippos, with boat safaris on the Rufiji River being a highlight.',
                'location' => 'Southern Tanzania',
                'coordinates' => ['latitude' => -7.7333, 'longitude' => 36.6167],
                'highlights' => [
                    'Tanzania\'s largest national park',
                    'Exceptional wildlife viewing',
                    'Boat safaris on Rufiji River',
                    'Elephants, lions, and wild dogs',
                    'Remote wilderness experience'
                ],
                'best_time_to_visit' => 'June to October for dry season wildlife viewing',
                'weather_info' => 'Hot and dry. 28-35°C. Cool nights. Wet season (November-May) limits access.',
                'images' => [
                    'images/wildlife.jpg',
                    'images/elephant.jpg',
                    'images/river.jpg',
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
