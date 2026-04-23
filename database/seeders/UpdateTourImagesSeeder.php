<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tour;

class UpdateTourImagesSeeder extends Seeder
{
    public function run(): void
    {
        // Available local images
        $localImages = [
            'images/01.jpg',
            'images/02.jpg', 
            'images/03.jpg',
            'images/05.jpg',
            'images/06.jpg',
            'images/07.jpg',
            'images/DSC_2338-(1).jpg'
        ];

        // Get all tours
        $tours = Tour::all();
        
        foreach ($tours as $index => $tour) {
            // Assign 3 images to each tour in a rotating pattern
            $tourImages = [];
            
            // Use modulo to cycle through images for each tour
            for ($i = 0; $i < 3; $i++) {
                $imageIndex = ($index * 3 + $i) % count($localImages);
                $tourImages[] = $localImages[$imageIndex];
            }
            
            // Update the tour with local images
            $tour->update([
                'images' => $tourImages
            ]);
            
            $this->command->info("Updated tour '{$tour->name}' with images: " . implode(', ', $tourImages));
        }
        
        $this->command->info("Successfully updated {$tours->count()} tours with local images.");
    }
}
