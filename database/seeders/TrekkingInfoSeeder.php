<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TrekkingInfo;

class TrekkingInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $infos = [
            [
                'title' => 'Mountain Trekking Preparation Guide',
                'slug' => 'mountain-trekking-preparation-guide',
                'content' => 'Comprehensive guide to preparing for mountain trekking adventures in Tanzania. Learn about physical preparation, mental readiness, and essential planning steps.',
                'category' => 'preparation',
                'sections' => [
                    ['title' => 'Physical Fitness', 'content' => 'Start training at least 3-6 months before your trek. Focus on cardiovascular endurance, strength training, and hiking practice.'],
                    ['title' => 'Mental Preparation', 'content' => 'Prepare mentally for the challenges of high-altitude trekking. Set realistic goals and understand the physical demands.'],
                    ['title' => 'Medical Check-up', 'content' => 'Consult your doctor before undertaking high-altitude trekking. Discuss any pre-existing conditions and medications.']
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1559827260-dc66d52bef19?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1519904981063-b0cf448d479e?auto=format&fit=crop&w=800&q=80'
                ],
                'featured_image' => 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?auto=format&fit=crop&w=800&q=80',
                'sort_order' => 1,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Altitude Sickness Prevention',
                'slug' => 'altitude-sickness-prevention',
                'content' => 'Understanding and preventing altitude sickness is crucial for safe mountain trekking. Learn about symptoms, prevention strategies, and treatment options.',
                'category' => 'health',
                'sections' => [
                    ['title' => 'Understanding Altitude Sickness', 'content' => 'Altitude sickness occurs when your body cannot adapt to high altitude quickly enough. Symptoms include headache, nausea, and fatigue.'],
                    ['title' => 'Prevention Strategies', 'content' => 'Climb slowly, stay hydrated, avoid alcohol, and consider medication like Diamox after consulting your doctor.'],
                    ['title' => 'Recognition and Treatment', 'content' => 'Learn to recognize early symptoms and know when to descend. Immediate descent is the most effective treatment.']
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1464822759844-d150baec0494?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=800&q=80'
                ],
                'featured_image' => 'https://images.unsplash.com/photo-1464822759844-d150baec0494?auto=format&fit=crop&w=800&q=80',
                'sort_order' => 2,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Essential Trekking Equipment',
                'slug' => 'essential-trekking-equipment',
                'content' => 'Complete guide to essential equipment for mountain trekking in Tanzania. Learn what to pack, what to rent, and how to choose the right gear.',
                'category' => 'equipment',
                'sections' => [
                    ['title' => 'Clothing System', 'content' => 'Layer your clothing with base layers, mid-layers, and outer shells. Choose moisture-wicking materials over cotton.'],
                    ['title' => 'Footwear', 'content' => 'Invest in quality hiking boots that are well broken-in. Bring extra socks and consider gaiters for dust protection.'],
                    ['title' => 'Sleeping Gear', 'content' => 'A warm sleeping bag rated for -10°C to -15°C is essential for high-altitude camping.']
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=800&q=80'
                ],
                'featured_image' => 'https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=80',
                'sort_order' => 3,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'title' => 'Trekking Safety Guidelines',
                'slug' => 'trekking-safety-guidelines',
                'content' => 'Comprehensive safety guidelines for mountain trekking. Learn about emergency procedures, communication, and staying safe on the mountain.',
                'category' => 'safety',
                'sections' => [
                    ['title' => 'Emergency Procedures', 'content' => 'Know emergency evacuation procedures and have travel insurance that covers high-altitude trekking.'],
                    ['title' => 'Communication', 'content' => 'Understand communication methods on the mountain. Your guide will have satellite phone or radio contact.'],
                    ['title' => 'Wildlife Safety', 'content' => 'Learn about wildlife encounters and how to safely observe animals from a distance.']
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=800&q=80'
                ],
                'featured_image' => 'https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=800&q=80',
                'sort_order' => 4,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'title' => 'Nutrition and Hydration',
                'slug' => 'nutrition-and-hydration',
                'content' => 'Proper nutrition and hydration are essential for successful mountain trekking. Learn about dietary requirements and water purification.',
                'category' => 'health',
                'sections' => [
                    ['title' => 'Hydration Guidelines', 'content' => 'Drink 3-4 liters of water daily. Use water purification tablets or filters to treat water from streams.'],
                    ['title' => 'High-Altitude Nutrition', 'content' => 'Focus on carbohydrates for energy. Bring high-energy snacks like nuts, dried fruits, and energy bars.'],
                    ['title' => 'Meal Planning', 'content' => 'Your trek operator will provide meals, but bring personal snacks for between meals and emergencies.']
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1511690656952-34342bb7c2f2?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1505253716362-60aea3be6e63?auto=format&fit=crop&w=800&q=80'
                ],
                'featured_image' => 'https://images.unsplash.com/photo-1511690656952-34342bb7c2f2?auto=format&fit=crop&w=800&q=80',
                'sort_order' => 5,
                'is_active' => true,
                'is_featured' => false,
            ],
        ];

        foreach ($infos as $info) {
            TrekkingInfo::create($info);
        }
    }
}
