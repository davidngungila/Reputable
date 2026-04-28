<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\Destination;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TourDestinationLinkerSeeder extends Seeder
{
    public function run(): void
    {
        if (!Schema::hasTable('tour_destinations')) {
            $this->command->warn('tour_destinations table does not exist. Skipping.');
            return;
        }

        $this->command->info('Linking destinations to tours...');

        $tours = Tour::all();

        foreach ($tours as $tour) {
            if (!empty($tour->package_destinations) && is_array($tour->package_destinations)) {
                foreach ($tour->package_destinations as $packageDest) {
                    if (isset($packageDest['label'])) {
                        $destination = Destination::where('name', 'like', '%' . $packageDest['label'] . '%')
                            ->first();

                        if ($destination) {
                            $exists = \DB::table('tour_destinations')
                                ->where('tour_id', $tour->id)
                                ->where('destination_id', $destination->id)
                                ->exists();

                            if (!$exists) {
                                \DB::table('tour_destinations')->insert([
                                    'tour_id' => $tour->id,
                                    'destination_id' => $destination->id,
                                    'created_at' => now(),
                                    'updated_at' => now(),
                                ]);
                                $this->command->info("Linked: {$tour->name} -> {$destination->name}");
                            }
                        }
                    }
                }
            }
        }

        $this->command->info('Destination linking completed.');
    }
}
