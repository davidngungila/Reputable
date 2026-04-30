<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TrekkingEquipment;

class TrekkingEquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipment = [
            [
                'name' => 'Hiking Boots',
                'slug' => 'hiking-boots',
                'description' => 'High-quality waterproof hiking boots with good ankle support are essential for mountain trekking.',
                'category' => 'clothing',
                'is_required' => true,
                'is_provided' => false,
                'specifications' => 'Waterproof, ankle-high, broken-in before trek, good grip',
                'care_instructions' => 'Clean after use, waterproof regularly, store in dry place',
                'images' => [
                    'https://images.unsplash.com/photo-1559304692-083a2216e5a6?auto=format&fit=crop&w=800&q=80'
                ],
                'featured_image' => 'https://images.unsplash.com/photo-1559304692-083a2216e5a6?auto=format&fit=crop&w=800&q=80',
                'price' => 120.00,
                'rental_info' => 'Available for rent: $15/day',
                'tips' => 'Break in boots for at least 2 weeks before trekking to prevent blisters.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Sleeping Bag',
                'slug' => 'sleeping-bag',
                'description' => 'Warm sleeping bag rated for extreme cold temperatures essential for high-altitude camping.',
                'category' => 'gear',
                'is_required' => true,
                'is_provided' => true,
                'specifications' => 'Rated for -10°C to -15°C, lightweight, compressible',
                'care_instructions' => 'Air dry after use, store uncompressed, follow washing instructions',
                'images' => [
                    'https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=80'
                ],
                'featured_image' => 'https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=80',
                'price' => null,
                'rental_info' => 'Provided by trek operator',
                'tips' => 'Test your sleeping bag before the trek if possible.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Backpack',
                'slug' => 'backpack',
                'description' => 'Comfortable backpack with proper support for carrying personal items during daily trekking.',
                'category' => 'gear',
                'is_required' => true,
                'is_provided' => false,
                'specifications' => '30-40 liters, waterproof, comfortable hip belt, multiple compartments',
                'care_instructions' => 'Clean regularly, check for wear and tear, store dry',
                'images' => [
                    'https://images.unsplash.com/photo-1553062407-98eeb64c6a60?auto=format&fit=crop&w=800&q=80'
                ],
                'featured_image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a60?auto=format&fit=crop&w=800&q=80',
                'price' => 80.00,
                'rental_info' => 'Available for rent: $12/day',
                'tips' => 'Pack heavier items at the bottom and closer to your back.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Trekking Poles',
                'slug' => 'trekking-poles',
                'description' => 'Adjustable trekking poles provide stability and reduce strain on knees during ascent and descent.',
                'category' => 'gear',
                'is_required' => false,
                'is_provided' => true,
                'specifications' => 'Adjustable length, lightweight, comfortable grips',
                'care_instructions' => 'Clean after use, check locking mechanisms, store dry',
                'images' => [
                    'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=800&q=80'
                ],
                'featured_image' => 'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=800&q=80',
                'price' => null,
                'rental_info' => 'Provided by trek operator',
                'tips' => 'Use poles on both sides for better balance and reduced joint stress.',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Headlamp',
                'slug' => 'headlamp',
                'description' => 'Essential for early morning summit attempts and navigating camp after dark.',
                'category' => 'gear',
                'is_required' => true,
                'is_provided' => false,
                'specifications' => 'LED, bright beam, long battery life, waterproof',
                'care_instructions' => 'Remove batteries when not in use, clean contacts, store dry',
                'images' => [
                    'https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=80'
                ],
                'featured_image' => 'https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=80',
                'price' => 35.00,
                'rental_info' => 'Available for rent: $8/day',
                'tips' => 'Bring extra batteries and keep them warm in cold weather.',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Thermal Underwear',
                'slug' => 'thermal-underwear',
                'description' => 'Moisture-wicking thermal base layers essential for staying warm in cold mountain conditions.',
                'category' => 'clothing',
                'is_required' => true,
                'is_provided' => false,
                'specifications' => 'Merino wool or synthetic, moisture-wicking, quick-drying',
                'care_instructions' => 'Follow washing instructions, avoid fabric softener, air dry',
                'images' => [
                    'https://images.unsplash.com/photo-1519904981063-b0cf448d479e?auto=format&fit=crop&w=800&q=80'
                ],
                'featured_image' => 'https://images.unsplash.com/photo-1519904981063-b0cf448d479e?auto=format&fit=crop&w=800&q=80',
                'price' => 60.00,
                'rental_info' => 'Available for rent: $10/day',
                'tips' => 'Avoid cotton - it retains moisture and can lead to hypothermia.',
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'First Aid Kit',
                'slug' => 'first-aid-kit',
                'description' => 'Personal first aid kit with basic medical supplies for minor injuries and ailments.',
                'category' => 'medical',
                'is_required' => true,
                'is_provided' => false,
                'specifications' => 'Band-aids, antiseptic wipes, pain relievers, blister treatment',
                'care_instructions' => 'Check expiration dates regularly, restock after use',
                'images' => [
                    'https://images.unsplash.com/photo-1559827260-dc66d52bef19?auto=format&fit=crop&w=800&q=80'
                ],
                'featured_image' => 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?auto=format&fit=crop&w=800&q=80',
                'price' => 25.00,
                'rental_info' => 'Available for rent: $5/day',
                'tips' => 'Include personal medications and altitude sickness medication if prescribed.',
                'sort_order' => 7,
                'is_active' => true,
            ],
            [
                'name' => 'Water Bottle',
                'slug' => 'water-bottle',
                'description' => 'Insulated water bottle to keep water from freezing and ensure adequate hydration.',
                'category' => 'gear',
                'is_required' => true,
                'is_provided' => false,
                'specifications' => '1-2 liters, insulated, wide mouth for easy filling',
                'care_instructions' => 'Clean regularly, dry thoroughly, avoid freezing',
                'images' => [
                    'https://images.unsplash.com/photo-1511690656952-34342bb7c2f2?auto=format&fit=crop&w=800&q=80'
                ],
                'featured_image' => 'https://images.unsplash.com/photo-1511690656952-34342bb7c2f2?auto=format&fit=crop&w=800&q=80',
                'price' => 30.00,
                'rental_info' => 'Available for rent: $6/day',
                'tips' => 'Drink water regularly even if not thirsty to prevent dehydration.',
                'sort_order' => 8,
                'is_active' => true,
            ],
        ];

        foreach ($equipment as $item) {
            TrekkingEquipment::create($item);
        }
    }
}
