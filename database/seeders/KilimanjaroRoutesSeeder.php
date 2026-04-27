<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class KilimanjaroRoutesSeeder extends Seeder
{
    public function run(): void
    {
        $routes = [
            [
                'name' => 'Machame Route',
                'slug' => 'machame-route',
                'description' => 'The Machame Route is one of the most popular routes to climb Mount Kilimanjaro. Known as the "Whiskey Route," it offers stunning scenery and a challenging climb with good acclimatization opportunities.',
                'activity_type' => 'mountain_trekking',
                'location' => 'Mount Kilimanjaro',
                'duration' => '6-7 days',
                'difficulty_level' => 'Moderate to Difficult',
                'age_requirement' => '18+',
                'group_size' => 12,
                'price' => 1850.00,
                'highlights' => [
                    'Scenic views through rainforest and moorland',
                    'Barranco Wall climbing challenge',
                    'Excellent acclimatization profile',
                    'High summit success rate',
                    'Camping experience'
                ],
                'inclusions' => [
                    'Professional mountain guides',
                    'Porters and cook',
                    'All camping equipment',
                    'All meals on the mountain',
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
                    'Sleeping bag (-20°C)',
                    'Headlamp',
                    'Sun protection',
                    'Water bottles'
                ],
                'safety_info' => [
                    'Daily health checks',
                    'Emergency oxygen available',
                    'First aid trained guides',
                    'Satellite phone communication',
                    'Evacuation plan in place'
                ],
                'best_time' => 'June to October, January to March',
                'images' => [
                    'images/kilimanjaro-machame-1.jpg',
                    'images/kilimanjaro-machame-2.jpg',
                    'images/kilimanjaro-machame-3.jpg'
                ],
                'status' => 'active',
                'featured' => true
            ],
            [
                'name' => 'Marangu Route',
                'slug' => 'marangu-route',
                'description' => 'The Marangu Route is the oldest and most established route on Kilimanjaro. Known as the "Coca-Cola Route," it offers hut accommodation and a gradual ascent, making it popular for first-time climbers.',
                'activity_type' => 'mountain_trekking',
                'location' => 'Mount Kilimanjaro',
                'duration' => '5-6 days',
                'difficulty_level' => 'Moderate',
                'age_requirement' => '16+',
                'group_size' => 15,
                'price' => 1650.00,
                'highlights' => [
                    'Hut accommodation (no camping)',
                    'Gradual ascent profile',
                    'Most comfortable route',
                    'Shorter duration option',
                    'Well-maintained paths'
                ],
                'inclusions' => [
                    'Professional mountain guides',
                    'Porters and cook',
                    'Hut accommodation',
                    'All meals on the mountain',
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
                    'Daily health checks',
                    'Emergency oxygen available',
                    'First aid trained guides',
                    'Radio communication',
                    'Evacuation plan in place'
                ],
                'best_time' => 'June to October, January to March',
                'images' => [
                    'images/kilimanjaro-marangu-1.jpg',
                    'images/kilimanjaro-marangu-2.jpg',
                    'images/kilimanjaro-marangu-3.jpg'
                ],
                'status' => 'active',
                'featured' => true
            ],
            [
                'name' => 'Lemosho Route',
                'slug' => 'lemoso-route',
                'description' => 'The Lemosho Route is one of the newer and more scenic routes on Kilimanjaro. It approaches from the west and offers excellent acclimatization with beautiful views of the Shira Plateau.',
                'activity_type' => 'mountain_trekking',
                'location' => 'Mount Kilimanjaro',
                'duration' => '7-8 days',
                'difficulty_level' => 'Moderate to Difficult',
                'age_requirement' => '18+',
                'group_size' => 10,
                'price' => 2100.00,
                'highlights' => [
                    'Remote and less crowded',
                    'Excellent acclimatization',
                    'Shira Plateau views',
                    'High summit success rate',
                    'Diverse ecosystems'
                ],
                'inclusions' => [
                    'Professional mountain guides',
                    'Porters and cook',
                    'All camping equipment',
                    'All meals on the mountain',
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
                    'Sleeping bag (-20°C)',
                    'Headlamp',
                    'Sun protection',
                    'Water bottles'
                ],
                'safety_info' => [
                    'Daily health checks',
                    'Emergency oxygen available',
                    'First aid trained guides',
                    'Satellite phone communication',
                    'Evacuation plan in place'
                ],
                'best_time' => 'June to October, January to March',
                'images' => [
                    'images/kilimanjaro-lemoso-1.jpg',
                    'images/kilimanjaro-lemoso-2.jpg',
                    'images/kilimanjaro-lemoso-3.jpg'
                ],
                'status' => 'active',
                'featured' => true
            ],
            [
                'name' => 'Rongai Route',
                'slug' => 'rongai-route',
                'description' => 'The Rongai Route approaches Kilimanjaro from the north, near the Kenyan border. It is less traveled and offers a different perspective of the mountain with drier conditions.',
                'activity_type' => 'mountain_trekking',
                'location' => 'Mount Kilimanjaro',
                'duration' => '6-7 days',
                'difficulty_level' => 'Moderate',
                'age_requirement' => '16+',
                'group_size' => 12,
                'price' => 1750.00,
                'highlights' => [
                    'Less crowded route',
                    'Drier conditions',
                    'Views of Kenyan plains',
                    'Gentle ascent profile',
                    'Wildlife viewing opportunities'
                ],
                'inclusions' => [
                    'Professional mountain guides',
                    'Porters and cook',
                    'All camping equipment',
                    'All meals on the mountain',
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
                    'Sleeping bag (-20°C)',
                    'Headlamp',
                    'Sun protection',
                    'Water bottles'
                ],
                'safety_info' => [
                    'Daily health checks',
                    'Emergency oxygen available',
                    'First aid trained guides',
                    'Radio communication',
                    'Evacuation plan in place'
                ],
                'best_time' => 'June to October, January to March',
                'images' => [
                    'images/kilimanjaro-rongai-1.jpg',
                    'images/kilimanjaro-rongai-2.jpg',
                    'images/kilimanjaro-rongai-3.jpg'
                ],
                'status' => 'active',
                'featured' => false
            ],
            [
                'name' => 'Northern Circuit Route',
                'slug' => 'northern-circuit-route',
                'description' => 'The Northern Circuit is the longest route on Kilimanjaro, circling the mountain and offering the most comprehensive experience. It has the highest success rate due to excellent acclimatization.',
                'activity_type' => 'mountain_trekking',
                'location' => 'Mount Kilimanjaro',
                'duration' => '8-9 days',
                'difficulty_level' => 'Difficult',
                'age_requirement' => '18+',
                'group_size' => 8,
                'price' => 2400.00,
                'highlights' => [
                    'Longest route on Kilimanjaro',
                    'Highest summit success rate',
                    'Circumnavigates the mountain',
                    'Remote northern slopes',
                    'Complete Kilimanjaro experience'
                ],
                'inclusions' => [
                    'Professional mountain guides',
                    'Porters and cook',
                    'All camping equipment',
                    'All meals on the mountain',
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
                    'Sleeping bag (-20°C)',
                    'Headlamp',
                    'Sun protection',
                    'Water bottles'
                ],
                'safety_info' => [
                    'Daily health checks',
                    'Emergency oxygen available',
                    'First aid trained guides',
                    'Satellite phone communication',
                    'Evacuation plan in place'
                ],
                'best_time' => 'June to October, January to March',
                'images' => [
                    'images/kilimanjaro-northern-1.jpg',
                    'images/kilimanjaro-northern-2.jpg',
                    'images/kilimanjaro-northern-3.jpg'
                ],
                'status' => 'active',
                'featured' => true
            ],
            [
                'name' => 'Umbwe Route',
                'slug' => 'umbwe-route',
                'description' => 'The Umbwe Route is the most challenging and direct route to the summit. It is steep and demanding, recommended only for experienced hikers seeking a tough adventure.',
                'activity_type' => 'mountain_trekking',
                'location' => 'Mount Kilimanjaro',
                'duration' => '6-7 days',
                'difficulty_level' => 'Very Difficult',
                'age_requirement' => '21+',
                'group_size' => 6,
                'price' => 1950.00,
                'highlights' => [
                    'Most challenging route',
                    'Steep and direct ascent',
                    'For experienced climbers',
                    'Less traveled path',
                    'Remote wilderness experience'
                ],
                'inclusions' => [
                    'Professional mountain guides',
                    'Porters and cook',
                    'All camping equipment',
                    'All meals on the mountain',
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
                    'Sleeping bag (-20°C)',
                    'Headlamp',
                    'Sun protection',
                    'Water bottles'
                ],
                'safety_info' => [
                    'Daily health checks',
                    'Emergency oxygen available',
                    'First aid trained guides',
                    'Satellite phone communication',
                    'Evacuation plan in place'
                ],
                'best_time' => 'June to October, January to March',
                'images' => [
                    'images/kilimanjaro-umbwe-1.jpg',
                    'images/kilimanjaro-umbwe-2.jpg',
                    'images/kilimanjaro-umbwe-3.jpg'
                ],
                'status' => 'active',
                'featured' => false
            ],
            [
                'name' => 'Shira Route',
                'slug' => 'shira-route',
                'description' => 'The Shira Route approaches from the west and begins at the Shira Plateau. It offers spectacular views and good acclimatization, though it requires a vehicle transfer to the starting point.',
                'activity_type' => 'mountain_trekking',
                'location' => 'Mount Kilimanjaro',
                'duration' => '7-8 days',
                'difficulty_level' => 'Moderate to Difficult',
                'age_requirement' => '18+',
                'group_size' => 10,
                'price' => 2000.00,
                'highlights' => [
                    'Shira Plateau views',
                    'Vehicle transfer to start',
                    'Good acclimatization',
                    'Scenic western approach',
                    'Less crowded beginning'
                ],
                'inclusions' => [
                    'Professional mountain guides',
                    'Porters and cook',
                    'All camping equipment',
                    'All meals on the mountain',
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
                    'Sleeping bag (-20°C)',
                    'Headlamp',
                    'Sun protection',
                    'Water bottles'
                ],
                'safety_info' => [
                    'Daily health checks',
                    'Emergency oxygen available',
                    'First aid trained guides',
                    'Satellite phone communication',
                    'Evacuation plan in place'
                ],
                'best_time' => 'June to October, January to March',
                'images' => [
                    'images/kilimanjaro-shira-1.jpg',
                    'images/kilimanjaro-shira-2.jpg',
                    'images/kilimanjaro-shira-3.jpg'
                ],
                'status' => 'active',
                'featured' => false
            ]
        ];

        foreach ($routes as $route) {
            Activity::create($route);
        }
    }
}
