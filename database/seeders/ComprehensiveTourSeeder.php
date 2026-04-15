<?php

namespace Database\Seeders;

use App\Models\Tour;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class ComprehensiveTourSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Tour::truncate();
        Schema::enableForeignKeyConstraints();
        
        $tours = [
            // Kilimanjaro Packages - Marangu Route
            [
                'name' => '5 Day Kilimanjaro Marangu Trek',
                'description' => 'Classic route with mountain huts, perfect for first-time climbers. Includes all park fees, experienced guides, and comfortable hut accommodation.',
                'location' => 'Mount Kilimanjaro - Marangu Route',
                'duration_days' => 5,
                'base_price' => 1850.00,
                'package_type' => 'Kilimanjaro Climbing',
                'route_name' => 'Marangu Route',
                'base_location' => 'Moshi',
                'starting_gate' => 'Marangu gate',
                'route' => 'Marangu',
                'difficulty' => 'Moderate',
                'international_price_min' => 1850.00,
                'international_price_max' => 3200.00,
                'best_season' => 'January - March, June - October',
                'package_destinations' => '[{"entity_type":"destination","entity_ref":"mount-kilimanjaro","label":"Mount Kilimanjaro"}]',
                'target_markets' => '["First-time climbers","Hiking enthusiasts"]',
                'interactive_features' => '["Route difficulty meter","Summit success rate stats"]',
                'detailed_inclusions' => '["All taxes and VAT","Park conservation, entry, camping/hut, and rescue fees","English-speaking mountain guides (with ratios)","Luggage porter (15kg per person)","Tent crew, cook, waiter","All meals on the mountain & eating utensils","Pre-climb briefing & equipment check","Transfers (lodge to park gates and back)","Boiled drinking water","Emergency oxygen cylinder & first aid kit","Hand washing station, sleeping mattress","Celebration lunch"]',
                'optional_extras' => '["Pre/post climb accommodation","Extra single tents or private huts","Additional emergency oxygen cylinders","Comfort upgrades (private portable toilet, larger tent, upgraded menu)","Airport or private transfers","Domestic flights","Flying Doctors membership","Extra guides or porters","Personal mountain equipment (sleeping bags, poles)","Additional acclimatization day"]',
                'detailed_exclusions' => '["Tips / gratuities","Beverages (soft drinks, alcohol)","International flights","Insurance","Visas","Items of a personal nature","Water on the first day of trek","Metal & hard plastic water bottles (soft plastics not permitted)"]',
                'addons' => '["Private toilet upgrade","Extra oxygen"]',
                'conversion_triggers' => '["Limited hut availability during peak season"]',
                'featured' => true,
                'status' => 'active',
                'images' => '["images/03.jpg","images/DSC_2338-(1).jpg"]',
                'inclusions' => '["All Park Fees","Certified Guides","Porters","Hut Accommodation","All Meals","Safety Equipment"]',
                'exclusions' => '["Tips","Personal Gear","Travel Insurance"]',
            ],
            [
                'name' => '6 Day Kilimanjaro Marangu Trek',
                'description' => 'Extended acclimatization day for better summit success. Includes Mawenzi ridge acclimatization hike.',
                'location' => 'Mount Kilimanjaro - Marangu Route',
                'duration_days' => 6,
                'base_price' => 1950.00,
                'package_type' => 'Kilimanjaro Climbing',
                'route_name' => 'Marangu Route',
                'base_location' => 'Moshi',
                'starting_gate' => 'Marangu gate',
                'route' => 'Marangu',
                'difficulty' => 'Moderate',
                'international_price_min' => 1950.00,
                'international_price_max' => 3400.00,
                'best_season' => 'January - March, June - October',
                'package_destinations' => '[{"entity_type":"destination","entity_ref":"mount-kilimanjaro","label":"Mount Kilimanjaro"}]',
                'target_markets' => '["First-time climbers","Hiking enthusiasts"]',
                'interactive_features' => '["Route difficulty meter","Summit success rate stats"]',
                'detailed_inclusions' => '["All taxes and VAT","Park conservation, entry, camping/hut, and rescue fees","English-speaking mountain guides (with ratios)","Luggage porter (15kg per person)","Tent crew, cook, waiter","All meals on the mountain & eating utensils","Pre-climb briefing & equipment check","Transfers (lodge to park gates and back)","Boiled drinking water","Emergency oxygen cylinder & first aid kit","Hand washing station, sleeping mattress","Mawenzi ridge acclimatization hike"]',
                'optional_extras' => '["Pre/post climb accommodation","Extra single tents or private huts","Additional emergency oxygen cylinders","Comfort upgrades (private portable toilet, larger tent, upgraded menu)","Airport or private transfers","Domestic flights","Flying Doctors membership","Extra guides or porters","Personal mountain equipment (sleeping bags, poles)","Additional acclimatization day"]',
                'detailed_exclusions' => '["Tips / gratuities","Beverages (soft drinks, alcohol)","International flights","Insurance","Visas","Items of a personal nature","Water on the first day of trek","Metal & hard plastic water bottles (soft plastics not permitted)"]',
                'addons' => '["Private toilet upgrade","Extra oxygen"]',
                'conversion_triggers' => '["Limited hut availability during peak season"]',
                'featured' => true,
                'status' => 'active',
                'images' => '["images/03.jpg","images/DSC_2338-(1).jpg"]',
                'inclusions' => '["All Park Fees","Certified Guides","Porters","Hut Accommodation","All Meals","Safety Equipment"]',
                'exclusions' => '["Tips","Personal Gear","Travel Insurance"]',
            ],
        ];

        foreach ($tours as $t) {
            $t['slug'] = Str::slug($t['name']);
            Tour::create($t);
        }
    }
}
