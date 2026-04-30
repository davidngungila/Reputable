<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TrekkingGuide;

class TrekkingGuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guides = [
            [
                'name' => 'Joseph Mwangi',
                'slug' => 'joseph-mwangi',
                'bio' => 'Joseph is an experienced mountain guide with over 15 years of experience leading treks on Mount Kilimanjaro and Mount Meru. He is certified in wilderness first aid and has an exceptional success rate of 95% for summit attempts.',
                'specialization' => 'kilimanjaro',
                'languages' => ['English', 'Swahili', 'German'],
                'experience_years' => '15+',
                'certifications' => 'Wilderness First Aid, Kilimanjaro National Park Guide Certification',
                'achievements' => 'Led over 200 successful summit attempts, 95% success rate, Expert in altitude sickness management',
                'phone' => '+255 754 123 456',
                'email' => 'joseph.mwangi@reputabletours.com',
                'images' => [
                    'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=800&q=80'
                ],
                'profile_image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=800&q=80',
                'mountains_expertise' => ['Mount Kilimanjaro', 'Mount Meru'],
                'daily_rate' => 150.00,
                'services' => 'Full guiding services, altitude monitoring, group leadership, emergency response training',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'Joseph was an amazing guide! His knowledge and experience made our Kilimanjaro climb successful.', 'client' => 'Sarah Johnson'],
                    ['rating' => 5, 'comment' => 'Professional, knowledgeable, and caring. Highly recommend!', 'client' => 'Michael Chen']
                ],
                'rating' => 5,
                'total_trips' => 200,
                'is_available' => true,
                'is_featured' => true,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Grace Kimaro',
                'slug' => 'grace-kimaro',
                'bio' => 'Grace is one of the few female mountain guides in Tanzania with extensive experience on all major routes. She specializes in creating comfortable and supportive environments for trekkers, especially women and families.',
                'specialization' => 'general',
                'languages' => ['English', 'Swahili', 'French'],
                'experience_years' => '12+',
                'certifications' => 'Mount Kilimanjaro Guide Certification, Wilderness First Responder',
                'achievements' => 'First female guide to complete 100 Kilimanjaro summits, Specializes in family and women groups',
                'phone' => '+255 754 234 567',
                'email' => 'grace.kimaro@reputabletours.com',
                'images' => [
                    'https://images.unsplash.com/photo-1494790108755-2616b332c2ca?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&w=800&q=80'
                ],
                'profile_image' => 'https://images.unsplash.com/photo-1494790108755-2616b332c2ca?auto=format&fit=crop&w=800&q=80',
                'mountains_expertise' => ['Mount Kilimanjaro', 'Mount Meru'],
                'daily_rate' => 140.00,
                'services' => 'Personalized guiding, cultural insights, photography assistance, family-friendly approach',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'Grace made our family trek unforgettable! She was patient and knowledgeable.', 'client' => 'Emily Rodriguez'],
                    ['rating' => 5, 'comment' => 'Amazing guide! Very supportive and encouraging throughout the journey.', 'client' => 'Lisa Anderson']
                ],
                'rating' => 5,
                'total_trips' => 150,
                'is_available' => true,
                'is_featured' => true,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'David Moshi',
                'slug' => 'david-moshi',
                'bio' => 'David is a veteran mountain guide with deep knowledge of Mount Meru and Kilimanjaro. He is known for his excellent customer service and ability to handle challenging situations with calm professionalism.',
                'specialization' => 'meru',
                'languages' => ['English', 'Swahili'],
                'experience_years' => '18+',
                'certifications' => 'Senior Guide Certification, Advanced Wilderness First Aid',
                'achievements' => '300+ successful summits, Expert in Mount Meru routes, Emergency response specialist',
                'phone' => '+255 754 345 678',
                'email' => 'david.moshi@reputabletours.com',
                'images' => [
                    'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=800&q=80'
                ],
                'profile_image' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=800&q=80',
                'mountains_expertise' => ['Mount Meru', 'Mount Kilimanjaro'],
                'daily_rate' => 130.00,
                'services' => 'Expert Mount Meru guiding, wildlife knowledge, photography tips, cultural sharing',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'David made our Mount Meru climb incredible! His knowledge of wildlife was amazing.', 'client' => 'James Wilson'],
                    ['rating' => 4, 'comment' => 'Very experienced and professional. Made us feel safe throughout.', 'client' => 'Robert Taylor']
                ],
                'rating' => 5,
                'total_trips' => 300,
                'is_available' => true,
                'is_featured' => false,
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Anna Kikwete',
                'slug' => 'anna-kikwete',
                'bio' => 'Anna is a passionate mountain guide who combines her love for nature with excellent guiding skills. She specializes in educational treks and has a background in environmental science.',
                'specialization' => 'kilimanjaro',
                'languages' => ['English', 'Swahili', 'Spanish'],
                'experience_years' => '8+',
                'certifications' => 'Kilimanjaro Guide Certification, Environmental Education Certificate',
                'achievements' => 'Specializes in educational treks, Wildlife and ecology expert, 75 successful summits',
                'phone' => '+255 754 456 789',
                'email' => 'anna.kikwete@reputabletours.com',
                'images' => [
                    'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&w=800&q=80'
                ],
                'profile_image' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=800&q=80',
                'mountains_expertise' => ['Mount Kilimanjaro'],
                'daily_rate' => 120.00,
                'services' => 'Educational guiding, wildlife identification, ecology insights, photography guidance',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'Anna taught us so much about the mountain ecology! Amazing experience.', 'client' => 'Maria Garcia'],
                    ['rating' => 5, 'comment' => 'Knowledgeable and passionate. Made our trek educational and fun!', 'client' => 'Jennifer Lee']
                ],
                'rating' => 5,
                'total_trips' => 75,
                'is_available' => true,
                'is_featured' => false,
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Samuel Mwanga',
                'slug' => 'samuel-mwanga',
                'bio' => 'Samuel is an experienced guide known for his excellent physical fitness and ability to support trekkers through challenging sections. He has extensive knowledge of all major routes.',
                'specialization' => 'kilimanjaro',
                'languages' => ['English', 'Swahili', 'Italian'],
                'experience_years' => '10+',
                'certifications' => 'Advanced Guide Certification, Mountain Rescue Training',
                'achievements' => 'Expert in difficult terrain navigation, 180 successful summits, Physical training specialist',
                'phone' => '+255 754 567 890',
                'email' => 'samuel.mwanga@reputabletours.com',
                'images' => [
                    'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=800&q=80'
                ],
                'profile_image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=800&q=80',
                'mountains_expertise' => ['Mount Kilimanjaro'],
                'daily_rate' => 135.00,
                'services' => 'Physical support, route optimization, pace management, motivational guidance',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'Samuel helped me through the toughest parts. Amazing support!', 'client' => 'Thomas Brown'],
                    ['rating' => 4, 'comment' => 'Strong and knowledgeable. Great guide for challenging routes.', 'client' => 'Carlos Martinez']
                ],
                'rating' => 5,
                'total_trips' => 180,
                'is_available' => true,
                'is_featured' => false,
                'sort_order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($guides as $guide) {
            TrekkingGuide::create($guide);
        }
    }
}
