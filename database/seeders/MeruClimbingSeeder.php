<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class MeruClimbingSeeder extends Seeder
{
    public function run(): void
    {
        $routes = [
            [
                'name' => 'Momella Route',
                'slug' => 'momella-route',
                'description' => 'The Momella Route is the most popular route to climb Mount Meru. It offers diverse landscapes from montane forest to alpine desert, with stunning views of Kilimanjaro and the Ash Cone.',
                'activity_type' => 'mountain_trekking',
                'location' => 'Mount Meru, Arusha National Park',
                'duration' => '3-4 days',
                'difficulty_level' => 'Moderate',
                'age_requirement' => '16+',
                'group_size' => 10,
                'price' => 850.00,
                'highlights' => [
                    'Views of Kilimanjaro',
                    'Ash Cone exploration',
                    'Diverse ecosystems',
                    'Wildlife viewing',
                    'Less crowded than Kilimanjaro'
                ],
                'inclusions' => [
                    'Professional mountain guides',
                    'Armed rangers (for wildlife safety)',
                    'Porters and cook',
                    'All camping equipment',
                    'Park fees and permits',
                    'Airport transfers'
                ],
                'exclusions' => [
                    'International flights',
                    'Personal travel insurance',
                    'Tips for crew',
                    'Personal equipment',
                    'Visa fees'
                ],
                'what_to_bring' => [
                    'Hiking boots',
                    'Warm clothing layers',
                    'Sleeping bag (-10°C)',
                    'Headlamp',
                    'Sun protection',
                    'Water bottles'
                ],
                'safety_info' => [
                    'Armed ranger escort',
                    'Daily health checks',
                    'First aid trained guides',
                    'Radio communication',
                    'Evacuation plan in place'
                ],
                'best_time' => 'June to February',
                'images' => [
                    'images/meru-momella-1.jpg',
                    'images/meru-momella-2.jpg',
                    'images/meru-momella-3.jpg'
                ],
                'status' => 'active',
                'featured' => true
            ],
            [
                'name' => 'Little Meru Peak Climb',
                'slug' => 'little-meru-peak-climb',
                'description' => 'A shorter climb to Little Meru Peak (3,820m) as an acclimatization trek before attempting the main summit. Perfect for those with limited time or as a warm-up for Kilimanjaro.',
                'activity_type' => 'mountain_trekking',
                'location' => 'Mount Meru, Arusha National Park',
                'duration' => '2 days',
                'difficulty_level' => 'Easy to Moderate',
                'age_requirement' => '14+',
                'group_size' => 12,
                'price' => 450.00,
                'highlights' => [
                    'Quick acclimatization climb',
                    'Stunning sunrise views',
                    'Wildlife encounters',
                    'Perfect for beginners',
                    'Kilimanjaro views'
                ],
                'inclusions' => [
                    'Professional mountain guides',
                    'Armed rangers',
                    'Porters and cook',
                    'All camping equipment',
                    'Park fees and permits',
                    'Airport transfers'
                ],
                'exclusions' => [
                    'International flights',
                    'Personal travel insurance',
                    'Tips for crew',
                    'Personal equipment',
                    'Visa fees'
                ],
                'what_to_bring' => [
                    'Hiking boots',
                    'Warm clothing layers',
                    'Sleeping bag (0°C)',
                    'Headlamp',
                    'Sun protection',
                    'Water bottles'
                ],
                'safety_info' => [
                    'Armed ranger escort',
                    'Daily health checks',
                    'First aid trained guides',
                    'Radio communication',
                    'Evacuation plan in place'
                ],
                'best_time' => 'June to February',
                'images' => [
                    'images/meru-little-peak-1.jpg',
                    'images/meru-little-peak-2.jpg',
                    'images/meru-little-peak-3.jpg'
                ],
                'status' => 'active',
                'featured' => false
            ],
            [
                'name' => 'Meru Summit Trek',
                'slug' => 'meru-summit-trek',
                'description' => 'The complete ascent to Mount Meru summit (4,566m), Tanzania\'s second highest peak. A challenging but rewarding climb with spectacular crater views and Kilimanjaro on the horizon.',
                'activity_type' => 'mountain_trekking',
                'location' => 'Mount Meru, Arusha National Park',
                'duration' => '4 days',
                'difficulty_level' => 'Moderate to Difficult',
                'age_requirement' => '16+',
                'group_size' => 8,
                'price' => 950.00,
                'highlights' => [
                    'Summit of Tanzania\'s second highest peak',
                    'Crater rim views',
                    'Ash Cone close-up',
                    'Excellent Kilimanjaro views',
                    'Technical rock section'
                ],
                'inclusions' => [
                    'Professional mountain guides',
                    'Armed rangers',
                    'Porters and cook',
                    'All camping equipment',
                    'Park fees and permits',
                    'Airport transfers'
                ],
                'exclusions' => [
                    'International flights',
                    'Personal travel insurance',
                    'Tips for crew',
                    'Personal equipment',
                    'Visa fees'
                ],
                'what_to_bring' => [
                    'Hiking boots',
                    'Warm clothing layers',
                    'Sleeping bag (-15°C)',
                    'Headlamp',
                    'Sun protection',
                    'Water bottles',
                    'Climbing harness (optional)'
                ],
                'safety_info' => [
                    'Armed ranger escort',
                    'Daily health checks',
                    'First aid trained guides',
                    'Radio communication',
                    'Evacuation plan in place'
                ],
                'best_time' => 'June to February',
                'images' => [
                    'images/meru-summit-1.jpg',
                    'images/meru-summit-2.jpg',
                    'images/meru-summit-3.jpg'
                ],
                'status' => 'active',
                'featured' => true
            ]
        ];

        foreach ($routes as $route) {
            Activity::create($route);
        }
    }
}
