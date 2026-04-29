<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HeroSlide;

class HeroSlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $heroSlides = [
            [
                'title' => 'Discover Tanzania\'s Wild Beauty',
                'subtitle' => 'Experience unforgettable safaris in Serengeti, Ngorongoro, and more',
                'image_url' => 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468771/tanzania-4149975_1920_j8h9ka.jpg',
                'button_text' => 'Explore Tours',
                'button_url' => '/tours',
                'is_active' => true,
                'sort_order' => 1,
                'position' => 'home'
            ],
            [
                'title' => 'Conquer Mount Kilimanjaro',
                'subtitle' => 'Africa\'s highest peak awaits your adventure',
                'image_url' => 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468773/tree-2600482_1920_c50vn6.jpg',
                'button_text' => 'View Routes',
                'button_url' => '/mountains/kilimanjaro',
                'is_active' => true,
                'sort_order' => 2,
                'position' => 'home'
            ],
            [
                'title' => 'Relax on Zanzibar\'s Beaches',
                'subtitle' => 'Paradise islands with pristine white sand beaches',
                'image_url' => 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468771/spphoto_skxxer.jpg',
                'button_text' => 'Discover Zanzibar',
                'button_url' => '/destinations',
                'is_active' => true,
                'sort_order' => 3,
                'position' => 'home'
            ],
            [
                'title' => 'Professional Mountain Guides',
                'subtitle' => 'Experienced local guides for your safety and success',
                'image_url' => 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468777/waterbuck_ggd5wl.jpg',
                'button_text' => 'Meet Our Guides',
                'button_url' => '/mountains/kilimanjaro/guides',
                'is_active' => true,
                'sort_order' => 1,
                'position' => 'mountains'
            ],
            [
                'title' => 'Complete Equipment Guide',
                'subtitle' => 'Everything you need for your mountain adventure',
                'image_url' => 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468773/tree-3079250_1280_m8apya.jpg',
                'button_text' => 'View Equipment',
                'button_url' => '/mountains/kilimanjaro/equipment',
                'is_active' => true,
                'sort_order' => 2,
                'position' => 'mountains'
            ],
            [
                'title' => 'About Reputable Tours',
                'subtitle' => 'Your trusted partner for Tanzanian adventures since 2010',
                'image_url' => 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468773/tree-222836_1920_bt1bf3.jpg',
                'button_text' => 'Learn More',
                'button_url' => '/about',
                'is_active' => true,
                'sort_order' => 1,
                'position' => 'about'
            ],
            [
                'title' => 'Contact Our Team',
                'subtitle' => 'Get in touch for personalized tour planning',
                'image_url' => 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468770/strauss-4642855_1280_i5umy2.jpg',
                'button_text' => 'Get in Touch',
                'button_url' => '/contact',
                'is_active' => true,
                'sort_order' => 1,
                'position' => 'contact'
            ]
        ];

        foreach ($heroSlides as $slide) {
            HeroSlide::create($slide);
        }
    }
}
