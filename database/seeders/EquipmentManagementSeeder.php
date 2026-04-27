<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class EquipmentManagementSeeder extends Seeder
{
    public function run(): void
    {
        $equipment = [
            [
                'name' => 'Mountain Sleeping Bag (-20°C)',
                'slug' => 'mountain-sleeping-bag',
                'description' => 'High-quality sleeping bag rated for -20°C temperatures, essential for high-altitude climbing on Kilimanjaro and Meru.',
                'activity_type' => 'equipment',
                'location' => 'Arusha - Equipment Rental',
                'duration' => 'Per trip',
                'difficulty_level' => 'N/A',
                'age_requirement' => 'N/A',
                'group_size' => 1,
                'price' => 45.00,
                'highlights' => [
                    'Rated to -20°C',
                    'Water-resistant outer shell',
                    'Hood design for warmth',
                    'Compressible for packing',
                    'Professional grade'
                ],
                'inclusions' => [
                    'Sleeping bag rental',
                    'Compression sack',
                    'Cleaning before use',
                    'Basic maintenance'
                ],
                'exclusions' => [
                    'Sleeping bag liner',
                    'Pillow',
                    'Damage replacement fee',
                    'Late return fees'
                ],
                'what_to_bring' => [
                    'Valid ID for rental',
                    'Security deposit',
                    'Return on time'
                ],
                'safety_info' => [
                    'Inspect before use',
                    'Report any damage',
                    'Keep dry during trip',
                    'Store properly when not in use'
                ],
                'best_time' => 'Year-round',
                'images' => [
                    'images/equipment-sleeping-bag-1.jpg',
                    'images/equipment-sleeping-bag-2.jpg'
                ],
                'status' => 'active',
                'featured' => true
            ],
            [
                'name' => 'Hiking Boots Rental',
                'slug' => 'hiking-boots-rental',
                'description' => 'Professional hiking boots suitable for mountain trekking. Various sizes available with broken-in comfort for long-distance walking.',
                'activity_type' => 'equipment',
                'location' => 'Arusha - Equipment Rental',
                'duration' => 'Per trip',
                'difficulty_level' => 'N/A',
                'age_requirement' => 'N/A',
                'group_size' => 1,
                'price' => 35.00,
                'highlights' => [
                    'Waterproof construction',
                    'Vibram soles',
                    'Ankle support',
                    'Various sizes available',
                    'Broken-in comfort'
                ],
                'inclusions' => [
                    'Hiking boots rental',
                    'Insoles',
                    'Cleaning before use',
                    'Size fitting assistance'
                ],
                'exclusions' => [
                    'Hiking socks',
                    'Gaiters',
                    'Damage replacement fee',
                    'Late return fees'
                ],
                'what_to_bring' => [
                    'Valid ID for rental',
                    'Security deposit',
                    'Your own socks for fitting'
                ],
                'safety_info' => [
                    'Proper fitting essential',
                    'Break in before trek',
                    'Keep clean and dry',
                    'Check sole condition'
                ],
                'best_time' => 'Year-round',
                'images' => [
                    'images/equipment-boots-1.jpg',
                    'images/equipment-boots-2.jpg'
                ],
                'status' => 'active',
                'featured' => true
            ],
            [
                'name' => 'Trekking Poles Set',
                'slug' => 'trekking-poles-set',
                'description' => 'Lightweight aluminum trekking poles with adjustable height and ergonomic grips. Essential for stability and reducing knee strain on steep terrain.',
                'activity_type' => 'equipment',
                'location' => 'Arusha - Equipment Rental',
                'duration' => 'Per trip',
                'difficulty_level' => 'N/A',
                'age_requirement' => 'N/A',
                'group_size' => 1,
                'price' => 25.00,
                'highlights' => [
                    'Lightweight aluminum',
                    'Adjustable height',
                    'Ergonomic grips',
                    'Shock absorption',
                    'Carrying straps included'
                ],
                'inclusions' => [
                    'Pair of trekking poles',
                    'Carrying case',
                    'Rubber tips',
                    'Basic maintenance'
                ],
                'exclusions' => [
                    'Replacement tips',
                    'Snow baskets',
                    'Damage replacement fee',
                    'Late return fees'
                ],
                'what_to_bring' => [
                    'Valid ID for rental',
                    'Security deposit'
                ],
                'safety_info' => [
                    'Adjust to proper height',
                    'Use straps correctly',
                    'Check locking mechanism',
                    'Replace worn tips'
                ],
                'best_time' => 'Year-round',
                'images' => [
                    'images/equipment-poles-1.jpg',
                    'images/equipment-poles-2.jpg'
                ],
                'status' => 'active',
                'featured' => true
            ],
            [
                'name' => 'Headlamp with Batteries',
                'slug' => 'headlamp-with-batteries',
                'description' => 'High-powered LED headlamp with spare batteries. Essential for night summit attempts and early morning starts on mountain treks.',
                'activity_type' => 'equipment',
                'location' => 'Arusha - Equipment Rental',
                'duration' => 'Per trip',
                'difficulty_level' => 'N/A',
                'age_requirement' => 'N/A',
                'group_size' => 1,
                'price' => 20.00,
                'highlights' => [
                    'High LED output',
                    'Multiple brightness modes',
                    'Water-resistant',
                    'Comfortable head strap',
                    'Long battery life'
                ],
                'inclusions' => [
                    'Headlamp unit',
                    'Spare batteries',
                    'Carrying case',
                    'Battery test before rental'
                ],
                'exclusions' => [
                    'Additional batteries',
                    'Charger (if rechargeable)',
                    'Damage replacement fee',
                    'Late return fees'
                ],
                'what_to_bring' => [
                    'Valid ID for rental',
                    'Security deposit'
                ],
                'safety_info' => [
                    'Test before departure',
                    'Keep spare batteries warm',
                    'Turn off when not in use',
                    'Check waterproof seal'
                ],
                'best_time' => 'Year-round',
                'images' => [
                    'images/equipment-headlamp-1.jpg',
                    'images/equipment-headlamp-2.jpg'
                ],
                'status' => 'active',
                'featured' => false
            ],
            [
                'name' => 'Down Jacket Rental',
                'slug' => 'down-jacket-rental',
                'description' => 'Premium down jacket for extreme cold conditions at high altitude. Lightweight yet incredibly warm for summit night and cold camps.',
                'activity_type' => 'equipment',
                'location' => 'Arusha - Equipment Rental',
                'duration' => 'Per trip',
                'difficulty_level' => 'N/A',
                'age_requirement' => 'N/A',
                'group_size' => 1,
                'price' => 55.00,
                'highlights' => [
                    '800-fill down',
                    'Water-resistant shell',
                    'Hood included',
                    'Multiple pockets',
                    'Packable design'
                ],
                'inclusions' => [
                    'Down jacket rental',
                    'Compression sack',
                    'Cleaning before use',
                    'Size fitting assistance'
                ],
                'exclusions' => [
                    'Base layers',
                    'Mid layers',
                    'Damage replacement fee',
                    'Late return fees'
                ],
                'what_to_bring' => [
                    'Valid ID for rental',
                    'Security deposit',
                    'Your own base layers'
                ],
                'safety_info' => [
                    'Keep dry at all times',
                    'Store in compression sack',
                    'Check for tears before use',
                    'Avoid snagging on rocks'
                ],
                'best_time' => 'Year-round',
                'images' => [
                    'images/equipment-jacket-1.jpg',
                    'images/equipment-jacket-2.jpg'
                ],
                'status' => 'active',
                'featured' => true
            ],
            [
                'name' => 'Camping Tent (4-person)',
                'slug' => 'camping-tent-4-person',
                'description' => 'High-altitude camping tent designed for mountain conditions. Weather-resistant and spacious for comfortable sleeping on multi-day treks.',
                'activity_type' => 'equipment',
                'location' => 'Arusha - Equipment Rental',
                'duration' => 'Per trip',
                'difficulty_level' => 'N/A',
                'age_requirement' => 'N/A',
                'group_size' => 4,
                'price' => 80.00,
                'highlights' => [
                    '4-person capacity',
                    'Weather-resistant',
                    'Double-wall construction',
                    'Easy setup',
                    'Vestibule for gear storage'
                ],
                'inclusions' => [
                    'Tent body and rainfly',
                    'Poles and stakes',
                    'Ground sheet',
                    'Setup instructions'
                ],
                'exclusions' => [
                    'Sleeping pads',
                    'Repair kit',
                    'Damage replacement fee',
                    'Late return fees'
                ],
                'what_to_bring' => [
                    'Valid ID for rental',
                    'Security deposit'
                ],
                'safety_info' => [
                    'Practice setup before trip',
                    'Check all zippers',
                    'Ensure proper staking',
                    'Dry before packing'
                ],
                'best_time' => 'Year-round',
                'images' => [
                    'images/equipment-tent-1.jpg',
                    'images/equipment-tent-2.jpg'
                ],
                'status' => 'active',
                'featured' => false
            ],
            [
                'name' => 'Waterproof Duffel Bag',
                'slug' => 'waterproof-duffel-bag',
                'description' => 'Large waterproof duffel bag for protecting gear from rain and dust during mountain treks. Essential for keeping equipment dry in variable weather.',
                'activity_type' => 'equipment',
                'location' => 'Arusha - Equipment Rental',
                'duration' => 'Per trip',
                'difficulty_level' => 'N/A',
                'age_requirement' => 'N/A',
                'group_size' => 1,
                'price' => 30.00,
                'highlights' => [
                    '100% waterproof',
                    'Large capacity (90L)',
                    'Durable construction',
                    'Shoulder straps',
                    'Multiple pockets'
                ],
                'inclusions' => [
                    'Duffel bag rental',
                    'Lock',
                    'Cleaning before use'
                ],
                'exclusions' => [
                    'Day pack',
                    'Packing cubes',
                    'Damage replacement fee',
                    'Late return fees'
                ],
                'what_to_bring' => [
                    'Valid ID for rental',
                    'Security deposit'
                ],
                'safety_info' => [
                    'Test waterproof seal',
                    'Do not overfill',
                    'Secure with lock',
                    'Check for wear'
                ],
                'best_time' => 'Year-round',
                'images' => [
                    'images/equipment-duffel-1.jpg',
                    'images/equipment-duffel-2.jpg'
                ],
                'status' => 'active',
                'featured' => false
            ],
            [
                'name' => 'Gaiters for Hiking',
                'slug' => 'gaiters-for-hiking',
                'description' => 'Waterproof gaiters to protect boots and lower legs from mud, rocks, and snow. Essential for keeping feet dry and comfortable on mountain trails.',
                'activity_type' => 'equipment',
                'location' => 'Arusha - Equipment Rental',
                'duration' => 'Per trip',
                'difficulty_level' => 'N/A',
                'age_requirement' => 'N/A',
                'group_size' => 1,
                'price' => 15.00,
                'highlights' => [
                    'Waterproof material',
                    'Adjustable fit',
                    'Durable construction',
                    'Easy to put on',
                    'Fits most boot sizes'
                ],
                'inclusions' => [
                    'Pair of gaiters',
                    'Cleaning before use',
                    'Size fitting assistance'
                ],
                'exclusions' => [
                    'Hiking boots',
                    'Damage replacement fee',
                    'Late return fees'
                ],
                'what_to_bring' => [
                    'Valid ID for rental',
                    'Security deposit',
                    'Your hiking boots'
                ],
                'safety_info' => [
                    'Ensure proper fit',
                    'Check straps',
                    'Keep clean',
                    'Store properly'
                ],
                'best_time' => 'Year-round',
                'images' => [
                    'images/equipment-gaiters-1.jpg',
                    'images/equipment-gaiters-2.jpg'
                ],
                'status' => 'active',
                'featured' => false
            ]
        ];

        foreach ($equipment as $item) {
            Activity::create($item);
        }
    }
}
