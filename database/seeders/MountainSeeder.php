<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mountain;

class MountainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mountains = [
            [
                'name' => 'Mount Kilimanjaro',
                'slug' => 'kilimanjaro',
                'description' => 'Mount Kilimanjaro is Africa\'s highest peak at 5,895 meters (19,341 feet) and the world\'s tallest free-standing mountain. This iconic destination offers climbers the opportunity to ascend through five distinct climate zones, from tropical rainforest to arctic summit. The mountain is a dormant volcano with three volcanic cones: Kibo, Mawenzi, and Shira.',
                'location' => 'Northern Tanzania, near the Kenya border',
                'height' => 5895.00,
                'height_unit' => 'meters',
                'coordinates' => ['latitude' => -3.0674, 'longitude' => 37.3556],
                'difficulty_level' => 'Moderate to Strenuous',
                'duration_days' => 7,
                'price_from' => 1200.00,
                'best_season' => 'January to March and June to October',
                'weather_info' => 'Varies dramatically by altitude. Base: 25-30°C. Summit: -20°C to -25°C. Weather can change rapidly.',
                'highlights' => [
                    'Africa\'s highest peak (5,895m)',
                    'Five distinct climate zones',
                    'Spectacular sunrise from Uhuru Peak',
                    'Diverse flora and fauna along the trails'
                ],
                'trekking_info' => 'Kilimanjaro offers seven main routes to the summit, each with different characteristics in terms of scenery, difficulty, and success rates. The most popular routes are Marangu (the "Coca-Cola" route) and Machame (the "Whiskey" route). All routes require proper acclimatization and physical preparation.',
                'routes' => [
                    [
                        'name' => 'Marangu Route',
                        'duration' => '5-6 days',
                        'difficulty' => 'Moderate',
                        'success_rate' => '85%',
                        'description' => 'The oldest and most well-established route, also known as the "Coca-Cola" route. Features hut accommodation and gradual ascent.',
                        'highlights' => ['Hut accommodation', 'Gradual ascent', 'Well-maintained trails'],
                        'price' => 1200.00
                    ],
                    [
                        'name' => 'Machame Route',
                        'duration' => '6-7 days',
                        'difficulty' => 'Strenuous',
                        'success_rate' => '90%',
                        'description' => 'The most popular scenic route, also known as the "Whiskey" route. Offers diverse landscapes and camping accommodation.',
                        'highlights' => ['Scenic diversity', 'High success rate', 'Camping experience'],
                        'price' => 1400.00
                    ],
                    [
                        'name' => 'Lemosho Route',
                        'duration' => '7-8 days',
                        'difficulty' => 'Strenuous',
                        'success_rate' => '95%',
                        'description' => 'A beautiful, remote route with excellent acclimatization profile and low traffic.',
                        'highlights' => ['Remote wilderness', 'Excellent acclimatization', 'High success rate'],
                        'price' => 1600.00
                    ],
                    [
                        'name' => 'Rongai Route',
                        'duration' => '6-7 days',
                        'difficulty' => 'Moderate',
                        'success_rate' => '85%',
                        'description' => 'The only route approaching from the north, offering drier conditions and unique perspectives.',
                        'highlights' => ['Drier conditions', 'Less crowded', 'Unique approach'],
                        'price' => 1400.00
                    ],
                    [
                        'name' => 'Northern Circuit',
                        'duration' => '9 days',
                        'difficulty' => 'Strenuous',
                        'success_rate' => '98%',
                        'description' => 'The longest route with the best acclimatization profile and highest success rate.',
                        'highlights' => ['Best acclimatization', 'Highest success rate', 'Complete circumnavigation'],
                        'price' => 2000.00
                    ],
                    [
                        'name' => 'Umbwe Route',
                        'duration' => '6 days',
                        'difficulty' => 'Very Strenuous',
                        'success_rate' => '70%',
                        'description' => 'The most challenging route with steep ascent and limited acclimatization time.',
                        'highlights' => ['Challenging terrain', 'Direct ascent', 'For experienced climbers'],
                        'price' => 1500.00
                    ],
                    [
                        'name' => 'Shira Route',
                        'duration' => '7 days',
                        'difficulty' => 'Strenuous',
                        'success_rate' => '85%',
                        'description' => 'Similar to Lemosho but starts at higher elevation, bypassing the forest section.',
                        'highlights' => ['High start point', 'Scenic plateau', 'Less forest trekking'],
                        'price' => 1500.00
                    ]
                ],
                'equipment_guide' => [
                    'clothing' => [
                        'Waterproof hiking boots',
                        'Thermal underwear',
                        'Fleece jacket',
                        'Waterproof jacket and pants',
                        'Warm hat and gloves',
                        'Hiking pants',
                        'Moisture-wicking base layers'
                    ],
                    'gear' => [
                        'Sleeping bag (-20°C rating)',
                        'Backpack (40-50L)',
                        'Trekking poles',
                        'Headlamp with extra batteries',
                        'Water bottles or hydration system',
                        'Sunglasses and sunscreen',
                        'First aid kit'
                    ],
                    'optional' => [
                        'Camera',
                        'Power bank',
                        'Book or entertainment',
                        'Snacks and energy bars',
                        'Personal medications'
                    ]
                ],
                'expert_guides' => [
                    [
                        'name' => 'John Mwangi',
                        'experience' => '15+ years',
                        'specialties' => ['Marangu Route', 'Machame Route'],
                        'languages' => ['English', 'Swahili', 'German'],
                        'certifications' => ['Kilimanjaro National Park Guide', 'Wilderness First Responder'],
                        'rating' => 4.9
                    ],
                    [
                        'name' => 'Sarah Johnson',
                        'experience' => '10+ years',
                        'specialties' => ['Lemosho Route', 'Northern Circuit'],
                        'languages' => ['English', 'French', 'Swahili'],
                        'certifications' => ['Mountain Guide Certification', 'Altitude Medicine Training'],
                        'rating' => 4.8
                    ],
                    [
                        'name' => 'Michael Kimaro',
                        'experience' => '20+ years',
                        'specialties' => ['All Routes', 'High Altitude Medicine'],
                        'languages' => ['English', 'Swahili', 'Chaga'],
                        'certifications' => ['Senior Guide Certification', 'Wilderness EMT'],
                        'rating' => 5.0
                    ]
                ],
                'images' => [
                    'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468773/tree-2600482_1920_c50vn6.jpg',
                    'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468772/tiger-5167034_1920_leu8nd.jpg',
                    'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468773/tree-3079250_1280_m8apya.jpg',
                    'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468770/stella-point-4032287_1280_bpmyyh.jpg'
                ],
                'status' => 'active'
            ],
            [
                'name' => 'Mount Meru',
                'slug' => 'meru',
                'description' => 'Mount Meru is Tanzania\'s second-highest peak at 4,566 meters and an excellent alternative to Kilimanjaro. The mountain offers challenging climbing through diverse ecosystems, from rainforest to alpine desert. The summit provides spectacular views of Mount Kilimanjaro and the surrounding landscape.',
                'location' => 'Northern Tanzania, Arusha National Park',
                'height' => 4566.00,
                'height_unit' => 'meters',
                'coordinates' => ['latitude' => -3.2589, 'longitude' => 36.9879],
                'difficulty_level' => 'Strenuous',
                'duration_days' => 4,
                'price_from' => 800.00,
                'best_season' => 'June to October',
                'weather_info' => 'Varies by altitude. Base: 20-25°C. Summit: -10°C to -15°C. Weather can change rapidly.',
                'highlights' => [
                    'Tanzania\'s second-highest peak (4,566m)',
                    'Challenging climbing experience',
                    'Diverse ecosystems',
                    'Views of Mount Kilimanjaro',
                    'Less crowded than Kilimanjaro'
                ],
                'trekking_info' => 'Mount Meru is often used as a training climb for Kilimanjaro. The trek involves a steep ascent with some scrambling sections near the summit. The route passes through diverse vegetation zones and offers excellent wildlife viewing opportunities in Arusha National Park.',
                'routes' => [
                    [
                        'name' => 'Momela Route',
                        'duration' => '4 days',
                        'difficulty' => 'Strenuous',
                        'success_rate' => '90%',
                        'description' => 'The primary route up Mount Meru, featuring diverse ecosystems and challenging terrain.',
                        'highlights' => ['Diverse ecosystems', 'Wildlife viewing', 'Challenging terrain'],
                        'price' => 800.00
                    ]
                ],
                'equipment_guide' => [
                    'clothing' => [
                        'Hiking boots',
                        'Thermal layers',
                        'Waterproof jacket',
                        'Warm hat and gloves',
                        'Hiking pants',
                        'Base layers'
                    ],
                    'gear' => [
                        'Sleeping bag (-10°C rating)',
                        'Backpack (30-40L)',
                        'Trekking poles',
                        'Headlamp',
                        'Water bottles',
                        'First aid kit'
                    ],
                    'optional' => [
                        'Camera',
                        'Snacks',
                        'Personal medications'
                    ]
                ],
                'expert_guides' => [
                    [
                        'name' => 'David Moshi',
                        'experience' => '12+ years',
                        'specialties' => ['Mount Meru', 'Arusha National Park'],
                        'languages' => ['English', 'Swahili'],
                        'certifications' => ['Meru Guide Certification', 'Wilderness First Aid'],
                        'rating' => 4.7
                    ],
                    [
                        'name' => 'Grace Kileo',
                        'experience' => '8+ years',
                        'specialties' => ['Mount Meru', 'Wildlife Guide'],
                        'languages' => ['English', 'Swahili', 'Italian'],
                        'certifications' => ['Mountain Guide', 'Wildlife Guide'],
                        'rating' => 4.8
                    ]
                ],
                'images' => [
                    'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468773/tree-3079250_1280_m8apya.jpg',
                    'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468773/tree-2600482_1920_c50vn6.jpg',
                    'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468773/tree-222836_1920_bt1bf3.jpg',
                    'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468773/umbwee_biardh.jpg'
                ],
                'status' => 'active'
            ]
        ];

        foreach ($mountains as $mountain) {
            Mountain::create($mountain);
        }
    }
}
