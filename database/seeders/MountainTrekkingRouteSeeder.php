<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MountainTrekkingRoute;

class MountainTrekkingRouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $routes = [
            [
                'name' => 'Marangu Route - Coca Cola Route',
                'slug' => 'marangu-route-coca-cola-route',
                'description' => 'The Marangu Route is the oldest and most well-established route on Mount Kilimanjaro. Known as the "Coca Cola Route," it offers comfortable hut accommodations and is considered the easiest path to the summit.',
                'mountain_name' => 'Mount Kilimanjaro',
                'duration' => '6 Days',
                'difficulty' => 'Easy to Moderate',
                'duration_days' => 6,
                'price_from' => 1850.00,
                'price_to' => 2200.00,
                'success_rate' => '85%',
                'highlights' => [
                    'Comfortable hut accommodations',
                    'Gradual ascent profile',
                    'Scenic rainforest section',
                    'Well-maintained paths',
                    'Hot meals provided daily'
                ],
                'itinerary' => [
                    'Day 1: Marangu Gate to Mandara Hut (8km, 3-4 hours)',
                    'Day 2: Mandara Hut to Horombo Hut (12km, 6-8 hours)',
                    'Day 3: Horombo Hut acclimatization day',
                    'Day 4: Horombo Hut to Kibo Hut (10km, 6-8 hours)',
                    'Day 5: Kibo Hut to Uhuru Peak to Horombo Hut (22km, 12-14 hours)',
                    'Day 6: Horombo Hut to Marangu Gate (20km, 5-7 hours)'
                ],
                'included' => [
                    'Park fees and rescue fees',
                    'Professional mountain guides',
                    'Porters and cook',
                    'All meals during the trek',
                    'Hut accommodation',
                    'Transport to/from mountain gate'
                ],
                'excluded' => [
                    'International flights',
                    'Travel insurance',
                    'Personal equipment',
                    'Tips for guides and porters',
                    'Alcoholic beverages'
                ],
                'best_season' => 'January-March, June-October',
                'images' => [
                    'https://images.unsplash.com/photo-1519904981063-b0cf448d479e?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1464822759844-d150baec0494?auto=format&fit=crop&w=800&q=80'
                ],
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Machame Route - Whiskey Route',
                'slug' => 'machame-route-whiskey-route',
                'description' => 'The Machame Route is one of the most popular and scenic routes on Kilimanjaro. Known as the "Whiskey Route," it offers stunning views, challenging terrain, and excellent acclimatization opportunities.',
                'mountain_name' => 'Mount Kilimanjaro',
                'duration' => '7 Days',
                'difficulty' => 'Challenging',
                'duration_days' => 7,
                'price_from' => 2100.00,
                'price_to' => 2500.00,
                'success_rate' => '92%',
                'highlights' => [
                    'Breathtaking panoramic views',
                    'Excellent acclimatization profile',
                    'Diverse ecosystems and landscapes',
                    'Climbing Barranco Wall',
                    'Approaching from the south'
                ],
                'itinerary' => [
                    'Day 1: Machame Gate to Machame Camp (11km, 5-7 hours)',
                    'Day 2: Machame Camp to Shira Cave (9km, 4-6 hours)',
                    'Day 3: Shira Cave to Barranco Camp (10km, 6-8 hours)',
                    'Day 4: Barranco Camp to Karanga Camp (5km, 4-5 hours)',
                    'Day 5: Karanga Camp to Barafu Camp (4km, 3-4 hours)',
                    'Day 6: Barafu Camp to Uhuru Peak to Mweka Camp (17km, 8-12 hours)',
                    'Day 7: Mweka Camp to Mweka Gate (10km, 3-4 hours)'
                ],
                'included' => [
                    'All park fees and permits',
                    'Experienced English-speaking guides',
                    'Porters and cook services',
                    'Nutritious meals',
                    'Camping equipment',
                    'Airport transfers'
                ],
                'excluded' => [
                    'International airfare',
                    'Travel and medical insurance',
                    'Personal climbing gear',
                    'Visa fees',
                    'Tips and gratuities'
                ],
                'best_season' => 'January-March, June-October',
                'images' => [
                    'https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1559827260-dc66d52bef19?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=800&q=80'
                ],
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Rongai Route - Northern Approach',
                'slug' => 'rongai-route-northern-approach',
                'description' => 'The Rongai Route approaches Kilimanjaro from the north, offering a unique perspective and excellent acclimatization. This less-traveled path provides wilderness experience with high success rates.',
                'mountain_name' => 'Mount Kilimanjaro',
                'duration' => '6 Days',
                'difficulty' => 'Moderate',
                'duration_days' => 6,
                'price_from' => 1950.00,
                'price_to' => 2350.00,
                'success_rate' => '90%',
                'highlights' => [
                    'Less crowded route',
                    'Wilderness experience',
                    'Excellent acclimatization',
                    'Views from the north',
                    'Scenic alpine desert'
                ],
                'itinerary' => [
                    'Day 1: Rongai Gate to Simba Camp (8km, 3-4 hours)',
                    'Day 2: Simba Camp to Second Cave (5km, 4-5 hours)',
                    'Day 3: Second Cave to Kikelewa Camp (5km, 3-4 hours)',
                    'Day 4: Kikelewa Camp to Mawenzi Tarn (5km, 4-5 hours)',
                    'Day 5: Mawenzi Tarn to Kibo Hut (8km, 5-6 hours)',
                    'Day 6: Kibo Hut to Uhuru Peak to Horombo Hut (22km, 12-14 hours)',
                    'Day 7: Horombo Hut to Marangu Gate (20km, 5-7 hours)'
                ],
                'included' => [
                    'All national park fees',
                    'Professional mountain guides',
                    'Porters and cooking staff',
                    'All meals during trek',
                    'Camping equipment',
                    'Transport to/from trailheads'
                ],
                'excluded' => [
                    'International flights',
                    'Travel insurance',
                    'Personal equipment',
                    'Tips for crew',
                    'Alcoholic drinks'
                ],
                'best_season' => 'Year-round (best June-October)',
                'images' => [
                    'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1519904981063-b0cf448d479e?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=800&q=80'
                ],
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Mount Meru Climb - Momella Route',
                'slug' => 'mount-meru-climb-momella-route',
                'description' => 'Mount Meru is Tanzania\'s second-highest peak and an excellent acclimatization climb before Kilimanjaro. The Momella Route offers diverse wildlife and stunning views of Kilimanjaro.',
                'mountain_name' => 'Mount Meru',
                'duration' => '4 Days',
                'difficulty' => 'Moderate to Challenging',
                'duration_days' => 4,
                'price_from' => 1200.00,
                'price_to' => 1500.00,
                'success_rate' => '95%',
                'highlights' => [
                    'Excellent Kilimanjaro acclimatization',
                    'Wildlife viewing opportunities',
                    'Dramatic crater views',
                    'Less crowded than Kilimanjaro',
                    'Arusha National Park scenery'
                ],
                'itinerary' => [
                    'Day 1: Momella Gate to Miriakamba Hut (10km, 4-6 hours)',
                    'Day 2: Miriakamba Hut to Saddle Hut (8km, 3-5 hours)',
                    'Day 3: Saddle Hut to Socialist Peak to Miriakamba Hut (12km, 8-10 hours)',
                    'Day 4: Miriakamba Hut to Momella Gate (10km, 2-3 hours)'
                ],
                'included' => [
                    'Arusha National Park fees',
                    'Professional guides and porters',
                    'All meals during climb',
                    'Hut accommodation',
                    'Camping equipment',
                    'Transport from Arusha'
                ],
                'excluded' => [
                    'International flights',
                    'Travel insurance',
                    'Personal gear',
                    'Tips for staff',
                    'Alcoholic beverages'
                ],
                'best_season' => 'Year-round (avoid April-May)',
                'images' => [
                    'https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1519904981063-b0cf448d479e?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1464822759844-d150baec0494?auto=format&fit=crop&w=800&q=80'
                ],
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($routes as $route) {
            MountainTrekkingRoute::create($route);
        }
    }
}
