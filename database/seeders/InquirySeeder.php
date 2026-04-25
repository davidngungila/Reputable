<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inquiry;
use App\Models\Tour;
use Illuminate\Support\Str;

class InquirySeeder extends Seeder
{
    public function run(): void
    {
        $tours = Tour::all();
        
        $sampleInquiries = [
            [
                'name' => 'John Smith',
                'email' => 'john.smith@example.com',
                'phone' => '+1-555-0101',
                'message' => 'I am interested in the 6-day safari package. Can you provide more details about accommodation and what\'s included in the price? I\'m planning to travel in July with my family of 4.',
                'status' => 'pending',
            ],
            [
                'name' => 'Sarah Johnson',
                'email' => 'sarah.j@example.com',
                'phone' => '+1-555-0102',
                'message' => 'Hello! I would like to know more about the Great Migration safari. What are the best months to see the migration? Also, do you offer vegetarian meal options?',
                'status' => 'responded',
                'admin_notes' => 'Sent detailed information about migration seasons and confirmed vegetarian options are available.',
            ],
            [
                'name' => 'Michael Chen',
                'email' => 'm.chen@example.com',
                'phone' => '+1-555-0103',
                'message' => 'I\'m interested in the Mount Meru trekking combined with safari. What level of fitness is required for the Meru climb? Do you provide climbing equipment?',
                'status' => 'pending',
            ],
            [
                'name' => 'Emma Wilson',
                'email' => 'emma.w@example.com',
                'phone' => '+1-555-0104',
                'message' => 'Do you offer group discounts for the 8-day safari? We are a group of 6 people looking to travel in September.',
                'status' => 'closed',
                'admin_notes' => 'Provided group discount information and booking details. Customer confirmed booking.',
            ],
            [
                'name' => 'David Brown',
                'email' => 'david.b@example.com',
                'phone' => '+1-555-0105',
                'message' => 'I have a question about the hot air balloon safari option. Is it available for all tours? What is the additional cost?',
                'status' => 'responded',
                'admin_notes' => 'Explained balloon safari availability and pricing. Customer considering the option.',
            ],
            [
                'name' => 'Lisa Anderson',
                'email' => 'lisa.a@example.com',
                'phone' => '+1-555-0106',
                'message' => 'What is the best time of year to visit Tanzania for wildlife viewing? I\'m particularly interested in seeing the big five.',
                'status' => 'pending',
            ],
            [
                'name' => 'Robert Taylor',
                'email' => 'r.taylor@example.com',
                'phone' => '+1-555-0107',
                'message' => 'Do you have any family-friendly safari packages? We are traveling with children aged 8 and 12.',
                'status' => 'responded',
                'admin_notes' => 'Recommended family-friendly tours and provided child-friendly activity information.',
            ],
            [
                'name' => 'Maria Garcia',
                'email' => 'maria.g@example.com',
                'phone' => '+1-555-0108',
                'message' => 'I would like to know about your photography safari options. Are there special tours for photographers?',
                'status' => 'pending',
            ],
        ];

        foreach ($sampleInquiries as $index => $inquiryData) {
            // Assign a random tour to some inquiries
            if ($index % 2 === 0 && $tours->count() > 0) {
                $inquiryData['tour_id'] = $tours->random()->id;
            }

            Inquiry::create($inquiryData);
        }

        // Create some follow-up inquiries from the same email
        $followUpInquiries = [
            [
                'name' => 'John Smith',
                'email' => 'john.smith@example.com',
                'message' => 'Thank you for the information! One more question - do you provide airport transfers from Kilimanjaro International Airport?',
                'status' => 'pending',
            ],
            [
                'name' => 'Sarah Johnson',
                'email' => 'sarah.j@example.com',
                'message' => 'The migration information was very helpful. I\'d like to proceed with booking for August. What are the next steps?',
                'status' => 'responded',
                'admin_notes' => 'Customer ready to book. Sent booking form and payment information.',
            ],
        ];

        foreach ($followUpInquiries as $inquiryData) {
            if ($tours->count() > 0) {
                $inquiryData['tour_id'] = $tours->random()->id;
            }
            Inquiry::create($inquiryData);
        }
    }
}
