<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tour;
use App\Models\Itinerary;
use Illuminate\Support\Str;

class KilimanjaroPackagesSeeder extends Seeder
{
    public function run(): void
    {
        // MARANGU ROUTE PACKAGES
        
        // 5 Day Kilimanjaro Marangu Trek
        $tour1 = Tour::create([
            'name' => '5 Day Kilimanjaro Marangu Trek',
            'slug' => '5-day-kilimanjaro-marangu-trek',
            'description' => 'The classic Marangu Route, also known as the "Coca-Cola" route, is the oldest and most established path on Mount Kilimanjaro. This 5-day itinerary offers comfortable hut accommodations and a gradual ascent, making it ideal for trekkers seeking a more traditional climbing experience.',
            'location' => 'Mount Kilimanjaro - Marangu Route',
            'duration_days' => 5,
            'base_price' => 1850,
            'international_price_min' => 1850,
            'international_price_max' => 2200,
            'best_season' => 'January to March, June to October',
            'images' => [
                'https://images.unsplash.com/photo-1544735913-0e558e5b5395?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1517849845537-4d257902454a?auto=format&fit=crop&w=800&q=80'
            ],
            'inclusions' => [
                'All taxes and VAT applicable',
                'All National Park conservation, park entry, camping or hut and rescue fees',
                'Trained, certified, and experienced English-speaking Mountain guide/s at KINAPA minimum ratios',
                '1 x luggage porter carrying luggage of 15kg per person',
                'Specialist tent crew to service and set-up campsites',
                'KPAP and KRTO monitoring for fair treatment standards',
                'Trained and experienced personal mountain cook and waiter',
                'All meals on the mountain and eating utensils, cutlery, bowls, cups etc.',
                'Pre-climb briefing / equipment check with the guide / consultant in Moshi',
                'Transfer from Moshi based lodge to park gates per group',
                'Transfer from park gates to Moshi based lodge per group',
                'Luggage storage while on trek',
                'Boiled drinking water on trek (from 1st hut / camp onwards)',
                '1 Emergency oxygen cylinder per 5 passengers and first aid kit',
                'Hand washing station, sanitizers, and small personal wash basin at campsites',
                'Shared public toilet facilities at huts or campsites',
                'Basic sleeping mattress per person (provided by park for hut routes)',
                'Shared use of Mountain huts (sharing), chairs, tables, dining tent',
                'Celebration lunch with guides at Mweka gate (when descending via Mweka only)'
            ],
            'exclusions' => [
                'Tips / gratuities',
                'Beverages such as soft drinks, alcohol etc.',
                'International flights',
                'Insurance',
                'Visas',
                'Items of a personal nature',
                'Water on first day of trek',
                'Metal & hard plastic water bottles, water bladders etc.',
                'Pre climb or post climb accommodation',
                'Extra single tents for camping routes not already included',
                'Pre climb briefing in Arusha / out of Moshi and Arusha / out of Moshi gate transfers',
                'Additional emergency oxygen cylinders or any emergency cylinders for Mt Meru',
                'Comfort upgrades such as portable toilet, bed, larger tent, upgraded menu',
                'Airport or private / non-group gate transfers and out of Moshi transfers',
                'Domestic flights - One day trips',
                'Flying Doctors Emergency Evacuation membership',
                'Extra guides or porters',
                'Personal Mountain equipment such as sleeping bags, walking poles, duffel bags',
                'Additional day for acclimatization if not included in the itinerary'
            ],
            'package_destinations' => ['Mount Kilimanjaro', 'Marangu Route'],
            'target_markets' => ['Adventure', 'Trekking', 'Mountaineering', 'International'],
            'interactive_features' => [
                'hot_air_balloon' => false,
                'cultural_visits' => false,
                'walking_safari' => false,
                'night_game_drives' => false
            ],
            'addons' => [
                'Portable toilet' => 150,
                'Extra single tent' => 100,
                'Additional emergency oxygen' => 200,
                'Flying Doctors membership' => 50,
                'Personal equipment rental' => 150
            ],
            'conversion_triggers' => [
                'hut_accommodation',
                'classic_route',
                'gradual_ascent',
                'experienced_guides'
            ],
            'featured' => true,
            'status' => 'active'
        ]);

        $this->createMarangu5DayItinerary($tour1->id);

        // 6 Day Kilimanjaro Marangu Trek
        $tour2 = Tour::create([
            'name' => '6 Day Kilimanjaro Marangu Trek',
            'slug' => '6-day-kilimanjaro-marangu-trek',
            'description' => 'Enhanced Marangu Route experience with an extra acclimatization day at Mawenzi ridge. This 6-day itinerary increases your summit success chances by allowing better altitude adjustment while maintaining the comfort of hut accommodations.',
            'location' => 'Mount Kilimanjaro - Marangu Route',
            'duration_days' => 6,
            'base_price' => 2150,
            'international_price_min' => 2150,
            'international_price_max' => 2600,
            'best_season' => 'January to March, June to October',
            'images' => [
                'https://images.unsplash.com/photo-1544735913-0e558e5b5395?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1517849845537-4d257902454a?auto=format&fit=crop&w=800&q=80'
            ],
            'inclusions' => [
                'All taxes and VAT applicable',
                'All National Park conservation, park entry, camping or hut and rescue fees',
                'Trained, certified, and experienced English-speaking Mountain guide/s at KINAPA minimum ratios',
                '1 x luggage porter carrying luggage of 15kg per person',
                'Specialist tent crew to service and set-up campsites',
                'KPAP and KRTO monitoring for fair treatment standards',
                'Trained and experienced personal mountain cook and waiter',
                'All meals on the mountain and eating utensils, cutlery, bowls, cups etc.',
                'Pre-climb briefing / equipment check with the guide / consultant in Moshi',
                'Transfer from Moshi based lodge to park gates per group',
                'Transfer from park gates to Moshi based lodge per group',
                'Luggage storage while on trek',
                'Boiled drinking water on trek (from 1st hut / camp onwards)',
                '1 Emergency oxygen cylinder per 5 passengers and first aid kit',
                'Hand washing station, sanitizers, and small personal wash basin at campsites',
                'Shared public toilet facilities at huts or campsites',
                'Basic sleeping mattress per person (provided by park for hut routes)',
                'Shared use of Mountain huts (sharing), chairs, tables, dining tent',
                'Celebration lunch with guides at Mweka gate (when descending via Mweka only)'
            ],
            'exclusions' => [
                'Tips / gratuities',
                'Beverages such as soft drinks, alcohol etc.',
                'International flights',
                'Insurance',
                'Visas',
                'Items of a personal nature',
                'Water on first day of trek',
                'Metal & hard plastic water bottles, water bladders etc.',
                'Pre climb or post climb accommodation',
                'Extra single tents for camping routes not already included',
                'Pre climb briefing in Arusha / out of Moshi and Arusha / out of Moshi gate transfers',
                'Additional emergency oxygen cylinders or any emergency cylinders for Mt Meru',
                'Comfort upgrades such as portable toilet, bed, larger tent, upgraded menu',
                'Airport or private / non-group gate transfers and out of Moshi transfers',
                'Domestic flights - One day trips',
                'Flying Doctors Emergency Evacuation membership',
                'Extra guides or porters',
                'Personal Mountain equipment such as sleeping bags, walking poles, duffel bags',
                'Additional day for acclimatization if not included in the itinerary'
            ],
            'package_destinations' => ['Mount Kilimanjaro', 'Marangu Route'],
            'target_markets' => ['Adventure', 'Trekking', 'Mountaineering', 'International'],
            'interactive_features' => [
                'hot_air_balloon' => false,
                'cultural_visits' => false,
                'walking_safari' => false,
                'night_game_drives' => false
            ],
            'addons' => [
                'Portable toilet' => 150,
                'Extra single tent' => 100,
                'Additional emergency oxygen' => 200,
                'Flying Doctors membership' => 50,
                'Personal equipment rental' => 150
            ],
            'conversion_triggers' => [
                'acclimatization_day_included',
                'higher_success_rate',
                'hut_accommodation',
                'experienced_guides'
            ],
            'featured' => true,
            'status' => 'active'
        ]);

        $this->createMarangu6DayItinerary($tour2->id);

        // 7 Day Kilimanjaro Marangu Trek
        $tour3 = Tour::create([
            'name' => '7 Day Kilimanjaro Marangu Trek',
            'slug' => '7-day-kilimanjaro-marangu-trek',
            'description' => 'Ultimate Marangu Route experience with two acclimatization days. This 7-day itinerary provides maximum opportunity for altitude adjustment, making it perfect for trekkers who want the highest possible summit success while enjoying comfortable hut accommodations.',
            'location' => 'Mount Kilimanjaro - Marangu Route',
            'duration_days' => 7,
            'base_price' => 2450,
            'international_price_min' => 2450,
            'international_price_max' => 3000,
            'best_season' => 'January to March, June to October',
            'images' => [
                'https://images.unsplash.com/photo-1544735913-0e558e5b5395?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1517849845537-4d257902454a?auto=format&fit=crop&w=800&q=80'
            ],
            'inclusions' => [
                'All taxes and VAT applicable',
                'All National Park conservation, park entry, camping or hut and rescue fees',
                'Trained, certified, and experienced English-speaking Mountain guide/s at KINAPA minimum ratios',
                '1 x luggage porter carrying luggage of 15kg per person',
                'Specialist tent crew to service and set-up campsites',
                'KPAP and KRTO monitoring for fair treatment standards',
                'Trained and experienced personal mountain cook and waiter',
                'All meals on the mountain and eating utensils, cutlery, bowls, cups etc.',
                'Pre-climb briefing / equipment check with the guide / consultant in Moshi',
                'Transfer from Moshi based lodge to park gates per group',
                'Transfer from park gates to Moshi based lodge per group',
                'Luggage storage while on trek',
                'Boiled drinking water on trek (from 1st hut / camp onwards)',
                '1 Emergency oxygen cylinder per 5 passengers and first aid kit',
                'Hand washing station, sanitizers, and small personal wash basin at campsites',
                'Shared public toilet facilities at huts or campsites',
                'Basic sleeping mattress per person (provided by park for hut routes)',
                'Shared use of Mountain huts (sharing), chairs, tables, dining tent',
                'Celebration lunch with guides at Mweka gate (when descending via Mweka only)'
            ],
            'exclusions' => [
                'Tips / gratuities',
                'Beverages such as soft drinks, alcohol etc.',
                'International flights',
                'Insurance',
                'Visas',
                'Items of a personal nature',
                'Water on first day of trek',
                'Metal & hard plastic water bottles, water bladders etc.',
                'Pre climb or post climb accommodation',
                'Extra single tents for camping routes not already included',
                'Pre climb briefing in Arusha / out of Moshi and Arusha / out of Moshi gate transfers',
                'Additional emergency oxygen cylinders or any emergency cylinders for Mt Meru',
                'Comfort upgrades such as portable toilet, bed, larger tent, upgraded menu',
                'Airport or private / non-group gate transfers and out of Moshi transfers',
                'Domestic flights - One day trips',
                'Flying Doctors Emergency Evacuation membership',
                'Extra guides or porters',
                'Personal Mountain equipment such as sleeping bags, walking poles, duffel bags',
                'Additional day for acclimatization if not included in the itinerary'
            ],
            'package_destinations' => ['Mount Kilimanjaro', 'Marangu Route'],
            'target_markets' => ['Adventure', 'Trekking', 'Mountaineering', 'International'],
            'interactive_features' => [
                'hot_air_balloon' => false,
                'cultural_visits' => false,
                'walking_safari' => false,
                'night_game_drives' => false
            ],
            'addons' => [
                'Portable toilet' => 150,
                'Extra single tent' => 100,
                'Additional emergency oxygen' => 200,
                'Flying Doctors membership' => 50,
                'Personal equipment rental' => 150
            ],
            'conversion_triggers' => [
                'maximum_acclimatization',
                'highest_success_rate',
                'hut_accommodation',
                'experienced_guides'
            ],
            'featured' => true,
            'status' => 'active'
        ]);

        $this->createMarangu7DayItinerary($tour3->id);

        // MACHAME ROUTE PACKAGES
        
        // 6 Day Kilimanjaro Machame Trek
        $tour4 = Tour::create([
            'name' => '6 Day Kilimanjaro Machame Trek',
            'slug' => '6-day-kilimanjaro-machame-trek',
            'description' => 'The popular Machame Route, known as the "Whiskey" route, offers spectacular scenery and excellent acclimatization profile. This 6-day camping route traverses diverse ecosystems from rainforest to arctic zones, providing incredible views and high summit success rates.',
            'location' => 'Mount Kilimanjaro - Machame Route',
            'duration_days' => 6,
            'base_price' => 1950,
            'international_price_min' => 1950,
            'international_price_max' => 2400,
            'best_season' => 'January to March, June to October',
            'images' => [
                'https://images.unsplash.com/photo-1544735913-0e558e5b5395?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1517849845537-4d257902454a?auto=format&fit=crop&w=800&q=80'
            ],
            'inclusions' => [
                'All taxes and VAT applicable',
                'All National Park conservation, park entry, camping or hut and rescue fees',
                'Trained, certified, and experienced English-speaking Mountain guide/s at KINAPA minimum ratios',
                '1 x luggage porter carrying luggage of 15kg per person',
                'Specialist tent crew to service and set-up campsites',
                'KPAP and KRTO monitoring for fair treatment standards',
                'Trained and experienced personal mountain cook and waiter',
                'All meals on the mountain and eating utensils, cutlery, bowls, cups etc.',
                'Pre-climb briefing / equipment check with the guide / consultant in Moshi',
                'Transfer from Moshi based lodge to park gates per group',
                'Transfer from park gates to Moshi based lodge per group',
                'Crew transportation for remote gates (Londrossi /Lemosho/ Rongai / Umbwe)',
                'Luggage storage while on trek',
                'Boiled drinking water on trek (from 1st hut / camp onwards)',
                '1 Emergency oxygen cylinder per 5 passengers and first aid kit',
                'Hand washing station, sanitizers, and small personal wash basin at campsites',
                'Shared public toilet facilities at huts or campsites',
                'Basic sleeping mattress per person (provided by park for hut routes)',
                'Shared use of Four season tent (sharing for even numbered groups + 1 single tent for odd numbers), chairs, tables, dining tent for camping routes',
                'Celebration lunch with guides at Mweka gate (when descending via Mweka only)'
            ],
            'exclusions' => [
                'Tips / gratuities',
                'Beverages such as soft drinks, alcohol etc.',
                'International flights',
                'Insurance',
                'Visas',
                'Items of a personal nature',
                'Water on first day of trek',
                'Metal & hard plastic water bottles, water bladders etc.',
                'Pre climb or post climb accommodation',
                'Extra single tents for camping routes not already included',
                'Pre climb briefing in Arusha / out of Moshi and Arusha / out of Moshi gate transfers',
                'Additional emergency oxygen cylinders or any emergency cylinders for Mt Meru',
                'Comfort upgrades such as portable toilet, bed, larger tent, upgraded menu, celebration items etc.',
                'Airport or private / non-group gate transfers and out of Moshi transfers',
                'Domestic flights - One day trips',
                'Flying Doctors Emergency Evacuation membership',
                'Extra guides or porters',
                'Personal Mountain equipment such as sleeping bags, walking poles, duffel bags etc.',
                'Additional day for acclimatization if not included in the itinerary'
            ],
            'package_destinations' => ['Mount Kilimanjaro', 'Machame Route'],
            'target_markets' => ['Adventure', 'Trekking', 'Mountaineering', 'International'],
            'interactive_features' => [
                'hot_air_balloon' => false,
                'cultural_visits' => false,
                'walking_safari' => false,
                'night_game_drives' => false
            ],
            'addons' => [
                'Portable toilet' => 150,
                'Extra single tent' => 100,
                'Additional emergency oxygen' => 200,
                'Flying Doctors membership' => 50,
                'Personal equipment rental' => 150
            ],
            'conversion_triggers' => [
                'scenic_route',
                'camping_experience',
                'good_acclimatization',
                'experienced_guides'
            ],
            'featured' => true,
            'status' => 'active'
        ]);

        $this->createMachame6DayItinerary($tour4->id);

        // 7 Day Kilimanjaro Machame Trek
        $tour5 = Tour::create([
            'name' => '7 Day Kilimanjaro Machame Trek',
            'slug' => '7-day-kilimanjaro-machame-trek',
            'description' => 'Enhanced Machame Route with additional acclimatization day at Karanga camp. This 7-day itinerary provides better altitude adjustment and increased summit success while maintaining the spectacular scenery and camping experience of the popular "Whiskey" route.',
            'location' => 'Mount Kilimanjaro - Machame Route',
            'duration_days' => 7,
            'base_price' => 2250,
            'international_price_min' => 2250,
            'international_price_max' => 2800,
            'best_season' => 'January to March, June to October',
            'images' => [
                'https://images.unsplash.com/photo-1544735913-0e558e5b5395?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1517849845537-4d257902454a?auto=format&fit=crop&w=800&q=80'
            ],
            'inclusions' => [
                'All taxes and VAT applicable',
                'All National Park conservation, park entry, camping or hut and rescue fees',
                'Trained, certified, and experienced English-speaking Mountain guide/s at KINAPA minimum ratios',
                '1 x luggage porter carrying luggage of 15kg per person',
                'Specialist tent crew to service and set-up campsites',
                'KPAP and KRTO monitoring for fair treatment standards',
                'Trained and experienced personal mountain cook and waiter',
                'All meals on the mountain and eating utensils, cutlery, bowls, cups etc.',
                'Pre-climb briefing / equipment check with the guide / consultant in Moshi',
                'Transfer from Moshi based lodge to park gates per group',
                'Transfer from park gates to Moshi based lodge per group',
                'Crew transportation for remote gates (Londrossi /Lemosho/ Rongai / Umbwe)',
                'Luggage storage while on trek',
                'Boiled drinking water on trek (from 1st hut / camp onwards)',
                '1 Emergency oxygen cylinder per 5 passengers and first aid kit',
                'Hand washing station, sanitizers, and small personal wash basin at campsites',
                'Shared public toilet facilities at huts or campsites',
                'Basic sleeping mattress per person (provided by park for hut routes)',
                'Shared use of Four season tent (sharing for even numbered groups + 1 single tent for odd numbers), chairs, tables, dining tent for camping routes',
                'Celebration lunch with guides at Mweka gate (when descending via Mweka only)'
            ],
            'exclusions' => [
                'Tips / gratuities',
                'Beverages such as soft drinks, alcohol etc.',
                'International flights',
                'Insurance',
                'Visas',
                'Items of a personal nature',
                'Water on first day of trek',
                'Metal & hard plastic water bottles, water bladders etc.',
                'Pre climb or post climb accommodation',
                'Extra single tents for camping routes not already included',
                'Pre climb briefing in Arusha / out of Moshi and Arusha / out of Moshi gate transfers',
                'Additional emergency oxygen cylinders or any emergency cylinders for Mt Meru',
                'Comfort upgrades such as portable toilet, bed, larger tent, upgraded menu, celebration items etc.',
                'Airport or private / non-group gate transfers and out of Moshi transfers',
                'Domestic flights - One day trips',
                'Flying Doctors Emergency Evacuation membership',
                'Extra guides or porters',
                'Personal Mountain equipment such as sleeping bags, walking poles, duffel bags etc.',
                'Additional day for acclimatization if not included in the itinerary'
            ],
            'package_destinations' => ['Mount Kilimanjaro', 'Machame Route'],
            'target_markets' => ['Adventure', 'Trekking', 'Mountaineering', 'International'],
            'interactive_features' => [
                'hot_air_balloon' => false,
                'cultural_visits' => false,
                'walking_safari' => false,
                'night_game_drives' => false
            ],
            'addons' => [
                'Portable toilet' => 150,
                'Extra single tent' => 100,
                'Additional emergency oxygen' => 200,
                'Flying Doctors membership' => 50,
                'Personal equipment rental' => 150
            ],
            'conversion_triggers' => [
                'acclimatization_day_included',
                'higher_success_rate',
                'scenic_route',
                'camping_experience'
            ],
            'featured' => true,
            'status' => 'active'
        ]);

        $this->createMachame7DayItinerary($tour5->id);

        // 8 Day Kilimanjaro Machame Trek
        $tour6 = Tour::create([
            'name' => '8 Day Kilimanjaro Machame Trek',
            'slug' => '8-day-kilimanjaro-machame-trek',
            'description' => 'Ultimate Machame Route experience with two acclimatization days including a northern circuit detour via Moir hut. This 8-day itinerary offers maximum acclimatization, unique northern perspectives, and the highest summit success rates on the popular "Whiskey" route.',
            'location' => 'Mount Kilimanjaro - Machame Route',
            'duration_days' => 8,
            'base_price' => 2550,
            'international_price_min' => 2550,
            'international_price_max' => 3200,
            'best_season' => 'January to March, June to October',
            'images' => [
                'https://images.unsplash.com/photo-1544735913-0e558e5b5395?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1517849845537-4d257902454a?auto=format&fit=crop&w=800&q=80'
            ],
            'inclusions' => [
                'All taxes and VAT applicable',
                'All National Park conservation, park entry, camping or hut and rescue fees',
                'Trained, certified, and experienced English-speaking Mountain guide/s at KINAPA minimum ratios',
                '1 x luggage porter carrying luggage of 15kg per person',
                'Specialist tent crew to service and set-up campsites',
                'KPAP and KRTO monitoring for fair treatment standards',
                'Trained and experienced personal mountain cook and waiter',
                'All meals on the mountain and eating utensils, cutlery, bowls, cups etc.',
                'Pre-climb briefing / equipment check with the guide / consultant in Moshi',
                'Transfer from Moshi based lodge to park gates per group',
                'Transfer from park gates to Moshi based lodge per group',
                'Crew transportation for remote gates (Londrossi /Lemosho/ Rongai / Umbwe)',
                'Luggage storage while on trek',
                'Boiled drinking water on trek (from 1st hut / camp onwards)',
                '1 Emergency oxygen cylinder per 5 passengers and first aid kit',
                'Hand washing station, sanitizers, and small personal wash basin at campsites',
                'Shared public toilet facilities at huts or campsites',
                'Basic sleeping mattress per person (provided by park for hut routes)',
                'Shared use of Four season tent (sharing for even numbered groups + 1 single tent for odd numbers), chairs, tables, dining tent for camping routes',
                'Celebration lunch with guides at Mweka gate (when descending via Mweka only)'
            ],
            'exclusions' => [
                'Tips / gratuities',
                'Beverages such as soft drinks, alcohol etc.',
                'International flights',
                'Insurance',
                'Visas',
                'Items of a personal nature',
                'Water on first day of trek',
                'Metal & hard plastic water bottles, water bladders etc.',
                'Pre climb or post climb accommodation',
                'Extra single tents for camping routes not already included',
                'Pre climb briefing in Arusha / out of Moshi and Arusha / out of Moshi gate transfers',
                'Additional emergency oxygen cylinders or any emergency cylinders for Mt Meru',
                'Comfort upgrades such as portable toilet, bed, larger tent, upgraded menu, celebration items etc.',
                'Airport or private / non-group gate transfers and out of Moshi transfers',
                'Domestic flights - One day trips',
                'Flying Doctors Emergency Evacuation membership',
                'Extra guides or porters',
                'Personal Mountain equipment such as sleeping bags, walking poles, duffel bags etc.',
                'Additional day for acclimatization if not included in the itinerary'
            ],
            'package_destinations' => ['Mount Kilimanjaro', 'Machame Route'],
            'target_markets' => ['Adventure', 'Trekking', 'Mountaineering', 'International'],
            'interactive_features' => [
                'hot_air_balloon' => false,
                'cultural_visits' => false,
                'walking_safari' => false,
                'night_game_drives' => false
            ],
            'addons' => [
                'Portable toilet' => 150,
                'Extra single tent' => 100,
                'Additional emergency oxygen' => 200,
                'Flying Doctors membership' => 50,
                'Personal equipment rental' => 150
            ],
            'conversion_triggers' => [
                'maximum_acclimatization',
                'northern_circuit_experience',
                'highest_success_rate',
                'unique_perspectives'
            ],
            'featured' => true,
            'status' => 'active'
        ]);

        $this->createMachame8DayItinerary($tour6->id);

        // LEMOSHO ROUTE PACKAGES
        
        // 8 Day Kilimanjaro Lemosho Trek
        $tour7 = Tour::create([
            'name' => '8 Day Kilimanjaro Lemosho Trek',
            'slug' => '8-day-kilimanjaro-lemosho-trek',
            'description' => 'Beautiful Lemosho Route offering excellent acclimatization and spectacular scenery. This 8-day camping route approaches from the west, providing remote wilderness experience, diverse ecosystems, and high summit success rates with gradual altitude gain.',
            'location' => 'Mount Kilimanjaro - Lemosho Route',
            'duration_days' => 8,
            'base_price' => 2450,
            'international_price_min' => 2450,
            'international_price_max' => 3000,
            'best_season' => 'January to March, June to October',
            'images' => [
                'https://images.unsplash.com/photo-1544735913-0e558e5b5395?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1517849845537-4d257902454a?auto=format&fit=crop&w=800&q=80'
            ],
            'inclusions' => [
                'All taxes and VAT applicable',
                'All National Park conservation, park entry, camping or hut and rescue fees',
                'Trained, certified, and experienced English-speaking Mountain guide/s at KINAPA minimum ratios',
                '1 x luggage porter carrying luggage of 15kg per person',
                'Specialist tent crew to service and set-up campsites',
                'KPAP and KRTO monitoring for fair treatment standards',
                'Trained and experienced personal mountain cook and waiter',
                'All meals on the mountain and eating utensils, cutlery, bowls, cups etc.',
                'Pre-climb briefing / equipment check with the guide / consultant in Moshi',
                'Transfer from Moshi based lodge to park gates per group',
                'Transfer from park gates to Moshi based lodge per group',
                'Crew transportation for remote gates (Londrossi /Lemosho/ Rongai / Umbwe)',
                'Luggage storage while on trek',
                'Boiled drinking water on trek (from 1st hut / camp onwards)',
                '1 Emergency oxygen cylinder per 5 passengers and first aid kit',
                'Hand washing station, sanitizers, and small personal wash basin at campsites',
                'Shared public toilet facilities at huts or campsites',
                'Basic sleeping mattress per person (provided by park for hut routes)',
                'Shared use of Four season tent (sharing for even numbered groups + 1 single tent for odd numbers), chairs, tables, dining tent for camping routes',
                'Celebration lunch with guides at Mweka gate (when descending via Mweka only)'
            ],
            'exclusions' => [
                'Tips / gratuities',
                'Beverages such as soft drinks, alcohol etc.',
                'International flights',
                'Insurance',
                'Visas',
                'Items of a personal nature',
                'Water on first day of trek',
                'Metal & hard plastic water bottles, water bladders etc.',
                'Pre climb or post climb accommodation',
                'Extra single tents for camping routes not already included',
                'Pre climb briefing in Arusha / out of Moshi and Arusha / out of Moshi gate transfers',
                'Additional emergency oxygen cylinders or any emergency cylinders for Mt Meru',
                'Comfort upgrades such as portable toilet, bed, larger tent, upgraded menu, celebration items etc.',
                'Airport or private / non-group gate transfers and out of Moshi transfers',
                'Domestic flights - One day trips',
                'Flying Doctors Emergency Evacuation membership',
                'Extra guides or porters',
                'Personal Mountain equipment such as sleeping bags, walking poles, duffel bags etc.',
                'Additional day for acclimatization if not included in the itinerary'
            ],
            'package_destinations' => ['Mount Kilimanjaro', 'Lemosho Route'],
            'target_markets' => ['Adventure', 'Trekking', 'Mountaineering', 'International'],
            'interactive_features' => [
                'hot_air_balloon' => false,
                'cultural_visits' => false,
                'walking_safari' => false,
                'night_game_drives' => false
            ],
            'addons' => [
                'Portable toilet' => 150,
                'Extra single tent' => 100,
                'Additional emergency oxygen' => 200,
                'Flying Doctors membership' => 50,
                'Personal equipment rental' => 150
            ],
            'conversion_triggers' => [
                'remote_wilderness',
                'excellent_acclimatization',
                'western_approach',
                'scenic_diversity'
            ],
            'featured' => true,
            'status' => 'active'
        ]);

        $this->createLemosho8DayItinerary($tour7->id);

        // 9 Day Kilimanjaro Lemosho Trek
        $tour8 = Tour::create([
            'name' => '9 Day Kilimanjaro Lemosho Trek',
            'slug' => '9-day-kilimanjaro-lemosho-trek',
            'description' => 'Ultimate Lemosho Route with extended acclimatization including northern circuit detour. This 9-day itinerary provides maximum altitude adjustment, remote wilderness experience, and the highest summit success rates while exploring diverse landscapes from the western approach.',
            'location' => 'Mount Kilimanjaro - Lemosho Route',
            'duration_days' => 9,
            'base_price' => 2750,
            'international_price_min' => 2750,
            'international_price_max' => 3400,
            'best_season' => 'January to March, June to October',
            'images' => [
                'https://images.unsplash.com/photo-1544735913-0e558e5b5395?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1517849845537-4d257902454a?auto=format&fit=crop&w=800&q=80'
            ],
            'inclusions' => [
                'All taxes and VAT applicable',
                'All National Park conservation, park entry, camping or hut and rescue fees',
                'Trained, certified, and experienced English-speaking Mountain guide/s at KINAPA minimum ratios',
                '1 x luggage porter carrying luggage of 15kg per person',
                'Specialist tent crew to service and set-up campsites',
                'KPAP and KRTO monitoring for fair treatment standards',
                'Trained and experienced personal mountain cook and waiter',
                'All meals on the mountain and eating utensils, cutlery, bowls, cups etc.',
                'Pre-climb briefing / equipment check with the guide / consultant in Moshi',
                'Transfer from Moshi based lodge to park gates per group',
                'Transfer from park gates to Moshi based lodge per group',
                'Crew transportation for remote gates (Londrossi /Lemosho/ Rongai / Umbwe)',
                'Luggage storage while on trek',
                'Boiled drinking water on trek (from 1st hut / camp onwards)',
                '1 Emergency oxygen cylinder per 5 passengers and first aid kit',
                'Hand washing station, sanitizers, and small personal wash basin at campsites',
                'Shared public toilet facilities at huts or campsites',
                'Basic sleeping mattress per person (provided by park for hut routes)',
                'Shared use of Four season tent (sharing for even numbered groups + 1 single tent for odd numbers), chairs, tables, dining tent for camping routes',
                'Celebration lunch with guides at Mweka gate (when descending via Mweka only)'
            ],
            'exclusions' => [
                'Tips / gratuities',
                'Beverages such as soft drinks, alcohol etc.',
                'International flights',
                'Insurance',
                'Visas',
                'Items of a personal nature',
                'Water on first day of trek',
                'Metal & hard plastic water bottles, water bladders etc.',
                'Pre climb or post climb accommodation',
                'Extra single tents for camping routes not already included',
                'Pre climb briefing in Arusha / out of Moshi and Arusha / out of Moshi gate transfers',
                'Additional emergency oxygen cylinders or any emergency cylinders for Mt Meru',
                'Comfort upgrades such as portable toilet, bed, larger tent, upgraded menu, celebration items etc.',
                'Airport or private / non-group gate transfers and out of Moshi transfers',
                'Domestic flights - One day trips',
                'Flying Doctors Emergency Evacuation membership',
                'Extra guides or porters',
                'Personal Mountain equipment such as sleeping bags, walking poles, duffel bags etc.',
                'Additional day for acclimatization if not included in the itinerary'
            ],
            'package_destinations' => ['Mount Kilimanjaro', 'Lemosho Route'],
            'target_markets' => ['Adventure', 'Trekking', 'Mountaineering', 'International'],
            'interactive_features' => [
                'hot_air_balloon' => false,
                'cultural_visits' => false,
                'walking_safari' => false,
                'night_game_drives' => false
            ],
            'addons' => [
                'Portable toilet' => 150,
                'Extra single tent' => 100,
                'Additional emergency oxygen' => 200,
                'Flying Doctors membership' => 50,
                'Personal equipment rental' => 150
            ],
            'conversion_triggers' => [
                'maximum_acclimatization',
                'northern_circuit_detour',
                'remote_wilderness',
                'highest_success_rate'
            ],
            'featured' => true,
            'status' => 'active'
        ]);

        $this->createLemosho9DayItinerary($tour8->id);

        // NORTHERN CIRCUIT ROUTE PACKAGES
        
        // 8 Day Kilimanjaro Northern Circuit Trek
        $tour9 = Tour::create([
            'name' => '8 Day Kilimanjaro Northern Circuit Trek',
            'slug' => '8-day-kilimanjaro-northern-circuit-trek',
            'description' => 'Exclusive Northern Circuit Route offering the most comprehensive Kilimanjaro experience. This 8-day itinerary circumnavigates the mountain through remote northern slopes, providing unique perspectives, excellent acclimatization, and minimal crowds with high summit success rates.',
            'location' => 'Mount Kilimanjaro - Northern Circuit Route',
            'duration_days' => 8,
            'base_price' => 2850,
            'international_price_min' => 2850,
            'international_price_max' => 3500,
            'best_season' => 'January to March, June to October',
            'images' => [
                'https://images.unsplash.com/photo-1544735913-0e558e5b5395?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1517849845537-4d257902454a?auto=format&fit=crop&w=800&q=80'
            ],
            'inclusions' => [
                'All taxes and VAT applicable',
                'All National Park conservation, park entry, camping or hut and rescue fees',
                'Trained, certified, and experienced English-speaking Mountain guide/s at KINAPA minimum ratios',
                '1 x luggage porter carrying luggage of 15kg per person',
                'Specialist tent crew to service and set-up campsites',
                'KPAP and KRTO monitoring for fair treatment standards',
                'Trained and experienced personal mountain cook and waiter',
                'All meals on the mountain and eating utensils, cutlery, bowls, cups etc.',
                'Pre-climb briefing / equipment check with the guide / consultant in Moshi',
                'Transfer from Moshi based lodge to park gates per group',
                'Transfer from park gates to Moshi based lodge per group',
                'Crew transportation for remote gates (Londrossi /Lemosho/ Rongai / Umbwe)',
                'Luggage storage while on trek',
                'Boiled drinking water on trek (from 1st hut / camp onwards)',
                '1 Emergency oxygen cylinder per 5 passengers and first aid kit',
                'Hand washing station, sanitizers, and small personal wash basin at campsites',
                'Shared public toilet facilities at huts or campsites',
                'Basic sleeping mattress per person (provided by park for hut routes)',
                'Shared use of Four season tent (sharing for even numbered groups + 1 single tent for odd numbers), chairs, tables, dining tent for camping routes',
                'Celebration lunch with guides at Mweka gate (when descending via Mweka only)',
                'Private portable toilet per 5 passengers (inc. toilet, toilet tent, porter to carry / clean, toilet rolls)'
            ],
            'exclusions' => [
                'Tips / gratuities',
                'Beverages such as soft drinks, alcohol etc.',
                'International flights',
                'Insurance',
                'Visas',
                'Items of a personal nature',
                'Water on first day of trek',
                'Metal & hard plastic water bottles, water bladders etc.',
                'Pre climb or post climb accommodation',
                'Extra single tents for camping routes not already included',
                'Pre climb briefing in Arusha / out of Moshi and Arusha / out of Moshi gate transfers',
                'Additional emergency oxygen cylinders or any emergency cylinders for Mt Meru',
                'Comfort upgrades such as portable toilet, bed, larger tent, upgraded menu, celebration items etc.',
                'Airport or private / non-group gate transfers and out of Moshi transfers',
                'Domestic flights - One day trips',
                'Flying Doctors Emergency Evacuation membership',
                'Extra guides or porters',
                'Personal Mountain equipment such as sleeping bags, walking poles, duffel bags etc.',
                'Additional day for acclimatization if not included in the itinerary'
            ],
            'package_destinations' => ['Mount Kilimanjaro', 'Northern Circuit Route'],
            'target_markets' => ['Adventure', 'Trekking', 'Mountaineering', 'International'],
            'interactive_features' => [
                'hot_air_balloon' => false,
                'cultural_visits' => false,
                'walking_safari' => false,
                'night_game_drives' => false
            ],
            'addons' => [
                'Extra single tent' => 100,
                'Additional emergency oxygen' => 200,
                'Flying Doctors membership' => 50,
                'Personal equipment rental' => 150
            ],
            'conversion_triggers' => [
                'exclusive_route',
                'private_toilet_included',
                'remote_wilderness',
                'comprehensive_experience'
            ],
            'featured' => true,
            'status' => 'active'
        ]);

        $this->createNorthernCircuit8DayItinerary($tour9->id);

        // 9 Day Kilimanjaro Northern Circuit Trek
        $tour10 = Tour::create([
            'name' => '9 Day Kilimanjaro Northern Circuit Trek',
            'slug' => '9-day-kilimanjaro-northern-circuit-trek',
            'description' => 'Enhanced Northern Circuit Route with additional acclimatization day. This 9-day itinerary provides extended exploration of Kilimanjaro\'s remote northern slopes, excellent altitude adjustment, and the most comprehensive mountain experience with highest summit success rates.',
            'location' => 'Mount Kilimanjaro - Northern Circuit Route',
            'duration_days' => 9,
            'base_price' => 3150,
            'international_price_min' => 3150,
            'international_price_max' => 3800,
            'best_season' => 'January to March, June to October',
            'images' => [
                'https://images.unsplash.com/photo-1544735913-0e558e5b5395?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1517849845537-4d257902454a?auto=format&fit=crop&w=800&q=80'
            ],
            'inclusions' => [
                'All taxes and VAT applicable',
                'All National Park conservation, park entry, camping or hut and rescue fees',
                'Trained, certified, and experienced English-speaking Mountain guide/s at KINAPA minimum ratios',
                '1 x luggage porter carrying luggage of 15kg per person',
                'Specialist tent crew to service and set-up campsites',
                'KPAP and KRTO monitoring for fair treatment standards',
                'Trained and experienced personal mountain cook and waiter',
                'All meals on the mountain and eating utensils, cutlery, bowls, cups etc.',
                'Pre-climb briefing / equipment check with the guide / consultant in Moshi',
                'Transfer from Moshi based lodge to park gates per group',
                'Transfer from park gates to Moshi based lodge per group',
                'Crew transportation for remote gates (Londrossi /Lemosho/ Rongai / Umbwe)',
                'Luggage storage while on trek',
                'Boiled drinking water on trek (from 1st hut / camp onwards)',
                '1 Emergency oxygen cylinder per 5 passengers and first aid kit',
                'Hand washing station, sanitizers, and small personal wash basin at campsites',
                'Shared public toilet facilities at huts or campsites',
                'Basic sleeping mattress per person (provided by park for hut routes)',
                'Shared use of Four season tent (sharing for even numbered groups + 1 single tent for odd numbers), chairs, tables, dining tent for camping routes',
                'Celebration lunch with guides at Mweka gate (when descending via Mweka only)',
                'Private portable toilet per 5 passengers (inc. toilet, toilet tent, porter to carry / clean, toilet rolls)'
            ],
            'exclusions' => [
                'Tips / gratuities',
                'Beverages such as soft drinks, alcohol etc.',
                'International flights',
                'Insurance',
                'Visas',
                'Items of a personal nature',
                'Water on first day of trek',
                'Metal & hard plastic water bottles, water bladders etc.',
                'Pre climb or post climb accommodation',
                'Extra single tents for camping routes not already included',
                'Pre climb briefing in Arusha / out of Moshi and Arusha / out of Moshi gate transfers',
                'Additional emergency oxygen cylinders or any emergency cylinders for Mt Meru',
                'Comfort upgrades such as portable toilet, bed, larger tent, upgraded menu, celebration items etc.',
                'Airport or private / non-group gate transfers and out of Moshi transfers',
                'Domestic flights - One day trips',
                'Flying Doctors Emergency Evacuation membership',
                'Extra guides or porters',
                'Personal Mountain equipment such as sleeping bags, walking poles, duffel bags etc.',
                'Additional day for acclimatization if not included in the itinerary'
            ],
            'package_destinations' => ['Mount Kilimanjaro', 'Northern Circuit Route'],
            'target_markets' => ['Adventure', 'Trekking', 'Mountaineering', 'International'],
            'interactive_features' => [
                'hot_air_balloon' => false,
                'cultural_visits' => false,
                'walking_safari' => false,
                'night_game_drives' => false
            ],
            'addons' => [
                'Extra single tent' => 100,
                'Additional emergency oxygen' => 200,
                'Flying Doctors membership' => 50,
                'Personal equipment rental' => 150
            ],
            'conversion_triggers' => [
                'extended_exploration',
                'maximum_acclimatization',
                'private_toilet_included',
                'highest_success_rate'
            ],
            'featured' => true,
            'status' => 'active'
        ]);

        $this->createNorthernCircuit9DayItinerary($tour10->id);

        // 10 Day Kilimanjaro Northern Circuit Trek
        $tour11 = Tour::create([
            'name' => '10 Day Kilimanjaro Northern Circuit Trek',
            'slug' => '10-day-kilimanjaro-northern-circuit-trek',
            'description' => 'Ultimate Northern Circuit Route with comprehensive exploration including Mawenzi Tarn. This 10-day itinerary offers the most extensive Kilimanjaro experience with maximum acclimatization, remote wilderness, and unique perspectives of both major peaks.',
            'location' => 'Mount Kilimanjaro - Northern Circuit Route',
            'duration_days' => 10,
            'base_price' => 3450,
            'international_price_min' => 3450,
            'international_price_max' => 4100,
            'best_season' => 'January to March, June to October',
            'images' => [
                'https://images.unsplash.com/photo-1544735913-0e558e5b5395?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1517849845537-4d257902454a?auto=format&fit=crop&w=800&q=80'
            ],
            'inclusions' => [
                'All taxes and VAT applicable',
                'All National Park conservation, park entry, camping or hut and rescue fees',
                'Trained, certified, and experienced English-speaking Mountain guide/s at KINAPA minimum ratios',
                '1 x luggage porter carrying luggage of 15kg per person',
                'Specialist tent crew to service and set-up campsites',
                'KPAP and KRTO monitoring for fair treatment standards',
                'Trained and experienced personal mountain cook and waiter',
                'All meals on the mountain and eating utensils, cutlery, bowls, cups etc.',
                'Pre-climb briefing / equipment check with the guide / consultant in Moshi',
                'Transfer from Moshi based lodge to park gates per group',
                'Transfer from park gates to Moshi based lodge per group',
                'Crew transportation for remote gates (Londrossi /Lemosho/ Rongai / Umbwe)',
                'Luggage storage while on trek',
                'Boiled drinking water on trek (from 1st hut / camp onwards)',
                '1 Emergency oxygen cylinder per 5 passengers and first aid kit',
                'Hand washing station, sanitizers, and small personal wash basin at campsites',
                'Shared public toilet facilities at huts or campsites',
                'Basic sleeping mattress per person (provided by park for hut routes)',
                'Shared use of Four season tent (sharing for even numbered groups + 1 single tent for odd numbers), chairs, tables, dining tent for camping routes',
                'Celebration lunch with guides at Mweka gate (when descending via Mweka only)',
                'Private portable toilet per 5 passengers (inc. toilet, toilet tent, porter to carry / clean, toilet rolls)'
            ],
            'exclusions' => [
                'Tips / gratuities',
                'Beverages such as soft drinks, alcohol etc.',
                'International flights',
                'Insurance',
                'Visas',
                'Items of a personal nature',
                'Water on first day of trek',
                'Metal & hard plastic water bottles, water bladders etc.',
                'Pre climb or post climb accommodation',
                'Extra single tents for camping routes not already included',
                'Pre climb briefing in Arusha / out of Moshi and Arusha / out of Moshi gate transfers',
                'Additional emergency oxygen cylinders or any emergency cylinders for Mt Meru',
                'Comfort upgrades such as portable toilet, bed, larger tent, upgraded menu, celebration items etc.',
                'Airport or private / non-group gate transfers and out of Moshi transfers',
                'Domestic flights - One day trips',
                'Flying Doctors Emergency Evacuation membership',
                'Extra guides or porters',
                'Personal Mountain equipment such as sleeping bags, walking poles, duffel bags etc.',
                'Additional day for acclimatization if not included in the itinerary'
            ],
            'package_destinations' => ['Mount Kilimanjaro', 'Northern Circuit Route'],
            'target_markets' => ['Adventure', 'Trekking', 'Mountaineering', 'International'],
            'interactive_features' => [
                'hot_air_balloon' => false,
                'cultural_visits' => false,
                'walking_safari' => false,
                'night_game_drives' => false
            ],
            'addons' => [
                'Extra single tent' => 100,
                'Additional emergency oxygen' => 200,
                'Flying Doctors membership' => 50,
                'Personal equipment rental' => 150
            ],
            'conversion_triggers' => [
                'comprehensive_exploration',
                'mawenzi_tarn_included',
                'private_toilet_included',
                'ultimate_experience'
            ],
            'featured' => true,
            'status' => 'active'
        ]);

        $this->createNorthernCircuit10DayItinerary($tour11->id);

        // 11 Day Kilimanjaro Northern Circuit Trek
        $tour12 = Tour::create([
            'name' => '11 Day Kilimanjaro Northern Circuit Trek',
            'slug' => '11-day-kilimanjaro-northern-circuit-trek',
            'description' => 'Premium Northern Circuit Route with maximum acclimatization and exploration. This 11-day itinerary provides the most extensive Kilimanjaro experience including Mawenzi Tarn, extended northern exploration, and optimal altitude adjustment for ultimate summit success.',
            'location' => 'Mount Kilimanjaro - Northern Circuit Route',
            'duration_days' => 11,
            'base_price' => 3750,
            'international_price_min' => 3750,
            'international_price_max' => 4400,
            'best_season' => 'January to March, June to October',
            'images' => [
                'https://images.unsplash.com/photo-1544735913-0e558e5b5395?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1517849845537-4d257902454a?auto=format&fit=crop&w=800&q=80'
            ],
            'inclusions' => [
                'All taxes and VAT applicable',
                'All National Park conservation, park entry, camping or hut and rescue fees',
                'Trained, certified, and experienced English-speaking Mountain guide/s at KINAPA minimum ratios',
                '1 x luggage porter carrying luggage of 15kg per person',
                'Specialist tent crew to service and set-up campsites',
                'KPAP and KRTO monitoring for fair treatment standards',
                'Trained and experienced personal mountain cook and waiter',
                'All meals on the mountain and eating utensils, cutlery, bowls, cups etc.',
                'Pre-climb briefing / equipment check with the guide / consultant in Moshi',
                'Transfer from Moshi based lodge to park gates per group',
                'Transfer from park gates to Moshi based lodge per group',
                'Crew transportation for remote gates (Londrossi /Lemosho/ Rongai / Umbwe)',
                'Luggage storage while on trek',
                'Boiled drinking water on trek (from 1st hut / camp onwards)',
                '1 Emergency oxygen cylinder per 5 passengers and first aid kit',
                'Hand washing station, sanitizers, and small personal wash basin at campsites',
                'Shared public toilet facilities at huts or campsites',
                'Basic sleeping mattress per person (provided by park for hut routes)',
                'Shared use of Four season tent (sharing for even numbered groups + 1 single tent for odd numbers), chairs, tables, dining tent for camping routes',
                'Celebration lunch with guides at Mweka gate (when descending via Mweka only)',
                'Private portable toilet per 5 passengers (inc. toilet, toilet tent, porter to carry / clean, toilet rolls)'
            ],
            'exclusions' => [
                'Tips / gratuities',
                'Beverages such as soft drinks, alcohol etc.',
                'International flights',
                'Insurance',
                'Visas',
                'Items of a personal nature',
                'Water on first day of trek',
                'Metal & hard plastic water bottles, water bladders etc.',
                'Pre climb or post climb accommodation',
                'Extra single tents for camping routes not already included',
                'Pre climb briefing in Arusha / out of Moshi and Arusha / out of Moshi gate transfers',
                'Additional emergency oxygen cylinders or any emergency cylinders for Mt Meru',
                'Comfort upgrades such as portable toilet, bed, larger tent, upgraded menu, celebration items etc.',
                'Airport or private / non-group gate transfers and out of Moshi transfers',
                'Domestic flights - One day trips',
                'Flying Doctors Emergency Evacuation membership',
                'Extra guides or porters',
                'Personal Mountain equipment such as sleeping bags, walking poles, duffel bags etc.',
                'Additional day for acclimatization if not included in the itinerary'
            ],
            'package_destinations' => ['Mount Kilimanjaro', 'Northern Circuit Route'],
            'target_markets' => ['Adventure', 'Trekking', 'Mountaineering', 'International'],
            'interactive_features' => [
                'hot_air_balloon' => false,
                'cultural_visits' => false,
                'walking_safari' => false,
                'night_game_drives' => false
            ],
            'addons' => [
                'Extra single tent' => 100,
                'Additional emergency oxygen' => 200,
                'Flying Doctors membership' => 50,
                'Personal equipment rental' => 150
            ],
            'conversion_triggers' => [
                'premium_experience',
                'maximum_acclimatization',
                'private_toilet_included',
                'ultimate_success_rate'
            ],
            'featured' => true,
            'status' => 'active'
        ]);

        $this->createNorthernCircuit11DayItinerary($tour12->id);

        // 12 Day Kilimanjaro Northern Circuit Trek
        $tour13 = Tour::create([
            'name' => '12 Day Kilimanjaro Northern Circuit Trek',
            'slug' => '12-day-kilimanjaro-northern-circuit-trek',
            'description' => 'Ultimate Northern Circuit Route with maximum exploration and acclimatization. This 12-day premium itinerary provides the most comprehensive Kilimanjaro experience including Mawenzi Tarn, extended northern exploration, and optimal altitude adjustment for guaranteed summit success.',
            'location' => 'Mount Kilimanjaro - Northern Circuit Route',
            'duration_days' => 12,
            'base_price' => 4050,
            'international_price_min' => 4050,
            'international_price_max' => 4700,
            'best_season' => 'January to March, June to October',
            'images' => [
                'https://images.unsplash.com/photo-1544735913-0e558e5b5395?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1517849845537-4d257902454a?auto=format&fit=crop&w=800&q=80'
            ],
            'inclusions' => [
                'All taxes and VAT applicable',
                'All National Park conservation, park entry, camping or hut and rescue fees',
                'Trained, certified, and experienced English-speaking Mountain guide/s at KINAPA minimum ratios',
                '1 x luggage porter carrying luggage of 15kg per person',
                'Specialist tent crew to service and set-up campsites',
                'KPAP and KRTO monitoring for fair treatment standards',
                'Trained and experienced personal mountain cook and waiter',
                'All meals on the mountain and eating utensils, cutlery, bowls, cups etc.',
                'Pre-climb briefing / equipment check with the guide / consultant in Moshi',
                'Transfer from Moshi based lodge to park gates per group',
                'Transfer from park gates to Moshi based lodge per group',
                'Crew transportation for remote gates (Londrossi /Lemosho/ Rongai / Umbwe)',
                'Luggage storage while on trek',
                'Boiled drinking water on trek (from 1st hut / camp onwards)',
                '1 Emergency oxygen cylinder per 5 passengers and first aid kit',
                'Hand washing station, sanitizers, and small personal wash basin at campsites',
                'Shared public toilet facilities at huts or campsites',
                'Basic sleeping mattress per person (provided by park for hut routes)',
                'Shared use of Four season tent (sharing for even numbered groups + 1 single tent for odd numbers), chairs, tables, dining tent for camping routes',
                'Celebration lunch with guides at Mweka gate (when descending via Mweka only)',
                'Private portable toilet per 5 passengers (inc. toilet, toilet tent, porter to carry / clean, toilet rolls)'
            ],
            'exclusions' => [
                'Tips / gratuities',
                'Beverages such as soft drinks, alcohol etc.',
                'International flights',
                'Insurance',
                'Visas',
                'Items of a personal nature',
                'Water on first day of trek',
                'Metal & hard plastic water bottles, water bladders etc.',
                'Pre climb or post climb accommodation',
                'Extra single tents for camping routes not already included',
                'Pre climb briefing in Arusha / out of Moshi and Arusha / out of Moshi gate transfers',
                'Additional emergency oxygen cylinders or any emergency cylinders for Mt Meru',
                'Comfort upgrades such as portable toilet, bed, larger tent, upgraded menu, celebration items etc.',
                'Airport or private / non-group gate transfers and out of Moshi transfers',
                'Domestic flights - One day trips',
                'Flying Doctors Emergency Evacuation membership',
                'Extra guides or porters',
                'Personal Mountain equipment such as sleeping bags, walking poles, duffel bags etc.',
                'Additional day for acclimatization if not included in the itinerary'
            ],
            'package_destinations' => ['Mount Kilimanjaro', 'Northern Circuit Route'],
            'target_markets' => ['Adventure', 'Trekking', 'Mountaineering', 'International'],
            'interactive_features' => [
                'hot_air_balloon' => false,
                'cultural_visits' => false,
                'walking_safari' => false,
                'night_game_drives' => false
            ],
            'addons' => [
                'Extra single tent' => 100,
                'Additional emergency oxygen' => 200,
                'Flying Doctors membership' => 50,
                'Personal equipment rental' => 150
            ],
            'conversion_triggers' => [
                'ultimate_exploration',
                'maximum_duration',
                'private_toilet_included',
                'guaranteed_success'
            ],
            'featured' => true,
            'status' => 'active'
        ]);

        $this->createNorthernCircuit12DayItinerary($tour13->id);
    }

    // Itinerary creation methods for each route
    private function createMarangu5DayItinerary($tourId): void
    {
        $itineraries = [
            [
                'day_number' => 0,
                'title' => 'Arrival and pre-climb briefing day',
                'description' => 'Today has no planned activities and is only an arrival day for you to reach your base lodge in time for a pre-climb briefing (time to be confirmed) with your mountain guide. Approx. driving distance: 1-2 hours. Approx. trekking time: None. Approx. trekking distance: None. Start altitude: Unknown. End altitude: Unknown. Highest Altitude reached: Unknown. Altitude gain: Unknown. Meals included: None.',
                'accommodation' => 'Chanya Lodge - Mid-range lodge, Moshi, outside of town center',
                'meals' => 'None'
            ],
            [
                'day_number' => 1,
                'title' => 'Moshi town to Marangu gate to Mandara Hut',
                'description' => 'You will be transferred by road from Moshi town (09:00am) to Marangu gate. After registration you trek today through the mountain rain forest zone with your guide. You may encounter some wild animals such as colobus monkey and some bird species and plant species on your way to Mandara hut. After a rest you will then trek to the rim of Maundi Crater with a spectacular view of Mawenzi peak. Later descend back to Mandara hut. Approx. driving distance: 1-2 hours. Approx. trekking time: 3-5 hours. Approx. trekking distance: 7km / 4.5mi. Start altitude: 1860m or 6100ft. End altitude: 2775m or 9105ft. Highest Altitude reached: 2775m or 9105ft. Altitude +gain / -loss: +915m or +3005ft. Meals included: Breakfast, picnic lunch, dinner.',
                'accommodation' => 'Mandara Hut - Shared mountain huts, Rainforest, Kilimanjaro National Park. Altitude: 2775m or 9105ft',
                'meals' => 'Breakfast, picnic lunch, dinner'
            ],
            [
                'day_number' => 2,
                'title' => 'Mandara Hut to Horombo Hut',
                'description' => 'Today\'s hike is a little longer than the day before and takes you outside of the rain forest and into the heather & moorland zone ascending through the changed landscape. Today starts to feel more like a mountain trek with the peaks of Kibo and Mawenzi towering in the background on a clear day. You may encounter some birds along the trail and eventually come across the giant Kilimanjaro groundsels unique to the park. Approx. driving distance: None. Approx. trekking time: 5-6 hours. Approx. trekking distance: 11km / 7mi. Start altitude: 2775m or 9105ft. End altitude: 3700m or 12140ft. Highest Altitude reached: 3700m or 12140ft. Altitude +gain / -loss: +925m or +3035ft. Meals included: Breakfast, picnic lunch or lunch, dinner.',
                'accommodation' => 'Horombo Hut - Shared mountain huts, Heather & moorland, Kilimanjaro National Park. Altitude: 3700m or 12140ft',
                'meals' => 'Breakfast, picnic lunch or lunch, dinner'
            ],
            [
                'day_number' => 3,
                'title' => 'Horombo Hut to Kibo Hut',
                'description' => 'Your hike today takes you directly towards the Kibo cone steadily climbing through the alpine desert with the landscape changing dramatically as you leave the heather and moorland zone behind and journey on the barren saddle (the dip between the Kibo and Mawenzi peaks). You reach the hut in time to rest for your summit attempt tonight. Approx. driving distance: None. Approx. trekking time: 5-7 hours. Approx. trekking distance: 12km / 7.5mi. Start altitude: 3700m or 12140ft. End altitude: 4703m or 15430ft. Highest Altitude reached: 4703m or 15430ft. Altitude +gain / -loss: +1003m or +3290ft. Meals included: Breakfast, picnic lunch or lunch, dinner.',
                'accommodation' => 'Kibo Hut - Shared mountain huts, Alpine desert, Kilimanjaro National Park. Altitude: 4703m or 15430ft',
                'meals' => 'Breakfast, picnic lunch or lunch, dinner'
            ],
            [
                'day_number' => 4,
                'title' => 'Kibo hut to Gilman\'s point to Uhuru peak to Horombo Hut',
                'description' => 'In the early morning (around 00:00am) you begin your final ascent to the summit of Uhuru peak through the arctic zone. The trek is a steep hike over loose volcanic scree through the dark and cold night and takes a slow pace in a zig-zag pattern towards Gilman\'s Point (5681m or 18640ft) which is your first stop on the Kibo crater rim. From here a short (but difficult) hike remains to take you past Stella point (the first stop on the rim for those summiting from Barafu camp / the Southern circuit) and further around till Uhuru Peak (5895m or 19341ft), the highest point in Africa. You usually don\'t spend that long at the peak due to the extreme altitude and will descend back down to the base camp for your breakfast / brunch. After your gear is packed up you continue the descent back through the alpine desert and heather and moorland where you stop for the night. Approx. driving distance: None. Approx. trekking time: 14-18 hours. Approx. trekking distance: 21km / 13mi. Start altitude: 4703m or 15430ft. End altitude: 3700m or 12220ft. Highest Altitude reached: 5895m or 19431ft. Altitude +gain / -loss: +1192m or 4001ft / -2195m or -7211ft. Meals included: Breakfast, picnic lunch or lunch, dinner.',
                'accommodation' => 'Horombo Hut Camp - Shared mountain huts, Heather & moorland, Kilimanjaro National Park. Altitude: 3700m or 12220ft',
                'meals' => 'Breakfast, picnic lunch or lunch, dinner'
            ],
            [
                'day_number' => 5,
                'title' => 'Horombo Hut to Marangu gate',
                'description' => 'Your final day on Kilimanjaro is a descent through the southeastern rain forest zone until Marangu gate where our vehicle will be waiting to take you back to Moshi town. Usually, the crew will leave you at Marangu gate and it\'s a perfect opportunity to say goodbye and a great location to hand your optional tip to the crew as a token of your appreciation. Approx. driving distance: 1 hour. Approx. trekking time: 5-7 hours. Approx. trekking distance: 17km / 10.5mi. Start altitude: 3700m or 12220ft. End altitude: 1860m or 6100ft. Highest Altitude reached: 3700m or 12220ft. Altitude +gain / -loss: -1840m or -6120ft. Meals included: Breakfast, picnic lunch or lunch.',
                'accommodation' => 'Chanya Lodge - Mid-range lodge, Moshi, outside of town center',
                'meals' => 'Breakfast, picnic lunch or lunch'
            ],
            [
                'day_number' => 6,
                'title' => 'Departure day or continue with next activity',
                'description' => 'Today has no planned activities and our services end after check-out (10:00am). Approx. driving distance: None. Approx. trekking time: None. Approx. trekking distance: None. Start altitude: Unknown. End altitude: Unknown. Highest Altitude reached: Unknown. Altitude gain: Unknown. Meals included: Breakfast.',
                'accommodation' => 'None included but optionally available',
                'meals' => 'Breakfast'
            ]
        ];

        foreach ($itineraries as $itinerary) {
            Itinerary::create(array_merge($itinerary, ['tour_id' => $tourId]));
        }
    }

    // Add stub methods for remaining itineraries
    private function createMarangu6DayItinerary($tourId): void
    {
        // Implementation for 6-day Marangu itinerary
    }

    private function createMarangu7DayItinerary($tourId): void
    {
        // Implementation for 7-day Marangu itinerary
    }

    private function createMachame6DayItinerary($tourId): void
    {
        // Implementation for 6-day Machame itinerary
    }

    private function createMachame7DayItinerary($tourId): void
    {
        // Implementation for 7-day Machame itinerary
    }

    private function createMachame8DayItinerary($tourId): void
    {
        // Implementation for 8-day Machame itinerary
    }

    private function createLemosho8DayItinerary($tourId): void
    {
        // Implementation for 8-day Lemosho itinerary
    }

    private function createLemosho9DayItinerary($tourId): void
    {
        // Implementation for 9-day Lemosho itinerary
    }

    private function createNorthernCircuit8DayItinerary($tourId): void
    {
        // Implementation for 8-day Northern Circuit itinerary
    }

    private function createNorthernCircuit9DayItinerary($tourId): void
    {
        // Implementation for 9-day Northern Circuit itinerary
    }

    private function createNorthernCircuit10DayItinerary($tourId): void
    {
        // Implementation for 10-day Northern Circuit itinerary
    }

    private function createNorthernCircuit11DayItinerary($tourId): void
    {
        // Implementation for 11-day Northern Circuit itinerary
    }

    private function createNorthernCircuit12DayItinerary($tourId): void
    {
        // Implementation for 12-day Northern Circuit itinerary
    }
}
