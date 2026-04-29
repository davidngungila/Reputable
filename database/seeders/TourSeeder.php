<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tour;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class TourSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Tour::truncate();
        Schema::enableForeignKeyConstraints();
        
        $tours = [
            [
                'name' => '6 DAYS SAFARI (TARANGIRE, NGORONGORO & SERENGETI)',
                'slug' => '6-days-safari-tarangire-ngorongoro-serengeti',
                'description' => 'Experience the best of Tanzania\'s northern circuit in 6 days. This comprehensive safari takes you through Tarangire National Park, Ngorongoro Crater, and the vast Serengeti plains with optional hot air balloon safari.',
                'location' => 'Tarangire, Ngorongoro, Serengeti',
                'duration_days' => 6,
                'base_price' => 2850.00,
                'international_price_min' => 2850.00,
                'international_price_max' => 3500.00,
                'best_season' => 'June to October, December to March',
                'package_destinations' => [
                    ['entity_type' => 'destination', 'entity_ref' => 'tarangire-national-park', 'label' => 'Tarangire National Park'],
                    ['entity_type' => 'destination', 'entity_ref' => 'ngorongoro-crater', 'label' => 'Ngorongoro Crater'],
                    ['entity_type' => 'destination', 'entity_ref' => 'serengeti-national-park', 'label' => 'Serengeti National Park'],
                ],
                'target_markets' => ['International', 'Adventure', 'Wildlife', 'Photography'],
                'interactive_features' => [
                    'hot_air_balloon' => true,
                    'cultural_visits' => false,
                    'walking_safari' => false,
                    'night_game_drives' => false,
                ],
                'addons' => [
                    'Cultural walks' => 50,
                    'Walking safari' => 75,
                    'Traditional lunch' => 35,
                    'Night game drive' => 85,
                    'Treetop walkway' => 45,
                    'Canoeing safari' => 40,
                ],
                'conversion_triggers' => ['hot_air_balloon_included', 'big_five_guaranteed', 'experienced_guides', 'mid_range_accommodation'],
                'featured' => true,
                'status' => 'active',
                'images' => ['https://res.cloudinary.com/dqflffa1o/image/upload/v1777468788/Zeebraaa_cpydg9.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468788/Zebrah_at_Water_umdou8.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468787/Zebra_comb_pmwqzo.jpg'],
                'inclusions' => ['Airport transfers', 'Accommodation as specified', 'All meals as indicated', 'Game drives as specified', 'Park fees', 'Professional English-speaking safari guide', '4x4 safari vehicle with pop-up roof', 'Hot air balloon safari (Day 3)', 'Drinking water during game drives'],
                'exclusions' => ['International flights', 'Travel insurance', 'Visa fees', 'Personal expenses', 'Tips and gratuities', 'Alcoholic beverages', 'Cultural walks and walking safaris', 'Night game drives', 'Maasai village visits', 'Olduvai Gorge Museum visits'],
            ],
            [
                'name' => '9 DAYS GREAT MIGRATION SAFARI',
                'slug' => '9-days-great-migration-safari',
                'description' => 'Follow the Great Migration route across Tanzania\'s most spectacular landscapes. This 9-day adventure takes you from Tarangire through Lake Manyara, Lake Natron, Ngorongoro Crater, to the vast Serengeti plains.',
                'location' => 'Tarangire, Lake Manyara, Lake Natron, Ngorongoro, Serengeti',
                'duration_days' => 9,
                'base_price' => 4200.00,
                'international_price_min' => 4200.00,
                'international_price_max' => 5200.00,
                'best_season' => 'July to October for migration, August to October for flamingos',
                'package_destinations' => [
                    ['entity_type' => 'destination', 'entity_ref' => 'tarangire-national-park', 'label' => 'Tarangire National Park'],
                    ['entity_type' => 'destination', 'entity_ref' => 'lake-manyara', 'label' => 'Lake Manyara'],
                    ['entity_type' => 'destination', 'entity_ref' => 'lake-natron', 'label' => 'Lake Natron'],
                    ['entity_type' => 'destination', 'entity_ref' => 'ngorongoro-crater', 'label' => 'Ngorongoro Crater'],
                    ['entity_type' => 'destination', 'entity_ref' => 'serengeti-national-park', 'label' => 'Serengeti National Park'],
                ],
                'target_markets' => ['Adventure', 'Wildlife', 'Photography', 'Migration enthusiasts'],
                'interactive_features' => [
                    'hot_air_balloon' => false,
                    'cultural_visits' => false,
                    'walking_safari' => false,
                    'night_game_drives' => false,
                ],
                'addons' => [
                    'Cultural walks' => 50,
                    'Walking safari' => 75,
                    'Traditional lunch' => 35,
                    'Night game drive' => 85,
                    'Treetop walkway' => 45,
                    'Canoeing safari' => 40,
                ],
                'conversion_triggers' => ['diverse_landscapes', 'flight_to_zanzibar'],
                'featured' => true,
                'status' => 'active',
                'images' => ['https://res.cloudinary.com/dqflffa1o/image/upload/v1777468786/Wwwwwbeest_lnndaz.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468785/Wildbeest_Migration_vnkbqc.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468771/tanzania-2275107_1920_cmihwj.jpg'],
                'inclusions' => ['Airport transfers', 'Accommodation as specified', 'All meals as indicated', 'Game drives as specified', 'Park fees', 'Professional English-speaking safari guide', '4x4 safari vehicle with pop-up roof', 'Flight to Zanzibar', 'Drinking water during game drives'],
                'exclusions' => ['International flights', 'Travel insurance', 'Visa fees', 'Personal expenses', 'Tips and gratuities', 'Alcoholic beverages', 'Cultural walks and walking safaris', 'Night game drives', 'Maasai village visits', 'Olduvai Gorge Museum visits'],
            ],
            [
                'name' => '6 DAYS COMBO ADVENTURE (MERU TREKKING & SAFARI)',
                'slug' => '6-days-combo-adventure-meru-trekking-safari',
                'description' => 'Combine the thrill of climbing Mount Meru with classic Tanzania safari. This adventure includes 4-day Mount Meru trek followed by 2-day Tarangire safari experience.',
                'location' => 'Mount Meru, Tarangire',
                'duration_days' => 6,
                'base_price' => 3200.00,
                'international_price_min' => 3200.00,
                'international_price_max' => 3800.00,
                'best_season' => 'January to March, June to October',
                'package_destinations' => [
                    ['entity_type' => 'destination', 'entity_ref' => 'mount-meru', 'label' => 'Mount Meru'],
                    ['entity_type' => 'destination', 'entity_ref' => 'tarangire-national-park', 'label' => 'Tarangire National Park'],
                ],
                'target_markets' => ['Adventure', 'Trekking', 'Mountaineering', 'International'],
                'interactive_features' => [
                    'hot_air_balloon' => false,
                    'cultural_visits' => false,
                    'walking_safari' => false,
                    'night_game_drives' => false,
                ],
                'addons' => [
                    'Cultural walks' => 50,
                    'Walking safari' => 75,
                    'Traditional lunch' => 35,
                    'Night game drive' => 85,
                    'Treetop walkway' => 45,
                    'Canoeing safari' => 40,
                ],
                'conversion_triggers' => ['mountain_climbing', 'safari_combination', 'diverse_experience'],
                'featured' => true,
                'status' => 'active',
                'images' => ['https://res.cloudinary.com/dqflffa1o/image/upload/v1777468772/tiger-5167034_1920_leu8nd.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468772/tree-222836_1920_bt1bf3.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468773/tree-2600482_1920_c50vn6.jpg'],
                'inclusions' => ['Airport transfers', 'Accommodation as specified', 'All meals as indicated', 'Game drives as specified', 'Park fees', 'Professional English-speaking safari guide', '4x4 safari vehicle with pop-up roof', 'Mountain guide and porters', 'Climbing equipment', 'Drinking water during game drives'],
                'exclusions' => ['International flights', 'Travel insurance', 'Visa fees', 'Personal expenses', 'Tips and gratuities', 'Alcoholic beverages', 'Cultural walks and walking safaris', 'Night game drives', 'Maasai village visits', 'Personal climbing gear'],
            ],
            [
                'name' => '6 DAYS CLASSIC SAFARI (TARANGIRE, NGORONGORO & SERENGETI)',
                'slug' => '6-days-classic-safari-tarangire-ngorongoro-serengeti',
                'description' => 'Classic Tanzania safari experience covering the northern circuit highlights. Enjoy game drives in Tarangire, Ngorongoro Crater descent, and Serengeti exploration with hot air balloon option.',
                'location' => 'Tarangire, Ngorongoro, Serengeti',
                'duration_days' => 6,
                'base_price' => 3100.00,
                'international_price_min' => 3100.00,
                'international_price_max' => 3800.00,
                'best_season' => 'June to October, December to March',
                'package_destinations' => [
                    ['entity_type' => 'destination', 'entity_ref' => 'tarangire-national-park', 'label' => 'Tarangire National Park'],
                    ['entity_type' => 'destination', 'entity_ref' => 'ngorongoro-crater', 'label' => 'Ngorongoro Crater'],
                    ['entity_type' => 'destination', 'entity_ref' => 'serengeti-national-park', 'label' => 'Serengeti National Park'],
                ],
                'target_markets' => ['International', 'Adventure', 'Wildlife', 'Photography'],
                'interactive_features' => [
                    'hot_air_balloon' => true,
                    'cultural_visits' => false,
                    'walking_safari' => false,
                    'night_game_drives' => false,
                ],
                'addons' => [
                    'Cultural walks' => 50,
                    'Walking safari' => 75,
                    'Traditional lunch' => 35,
                    'Night game drive' => 85,
                    'Treetop walkway' => 45,
                    'Canoeing safari' => 40,
                ],
                'conversion_triggers' => ['classic_route', 'hot_air_balloon_available', 'mid_range_accommodation'],
                'featured' => true,
                'status' => 'active',
                'images' => ['https://res.cloudinary.com/dqflffa1o/image/upload/v1777468776/warthog-6605830_1920_f8rvu8.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468774/Vulture_xd2vgg.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468774/Vulture_Wildbeest_tysgw1.jpg'],
                'inclusions' => ['Airport transfers', 'Accommodation as specified', 'All meals as indicated', 'Game drives as specified', 'Park fees', 'Professional English-speaking safari guide', '4x4 safari vehicle with pop-up roof', 'Hot air balloon safari (Day 4)', 'Drinking water during game drives'],
                'exclusions' => ['International flights', 'Travel insurance', 'Visa fees', 'Personal expenses', 'Tips and gratuities', 'Alcoholic beverages', 'Cultural walks and walking safaris', 'Night game drives', 'Maasai village visits', 'Olduvai Gorge Museum visits'],
            ],
            [
                'name' => '6 DAYS EXITING SAFARI (TARANGIRE, BURUNGE, NGORONGORO & SERENGETI)',
                'slug' => '6-days-exiting-safari-tarangire-burunge-ngorongoro-serengeti',
                'description' => 'An exciting safari adventure covering Tarangire, Lake Burunge, Ngorongoro Crater and Serengeti. Experience diverse landscapes and wildlife with mid to high-range accommodation.',
                'location' => 'Tarangire, Lake Burunge, Ngorongoro, Serengeti',
                'duration_days' => 6,
                'base_price' => 3300.00,
                'international_price_min' => 3300.00,
                'international_price_max' => 4000.00,
                'best_season' => 'June to October, December to March',
                'package_destinations' => [
                    ['entity_type' => 'destination', 'entity_ref' => 'tarangire-national-park', 'label' => 'Tarangire National Park'],
                    ['entity_type' => 'destination', 'entity_ref' => 'lake-burunge', 'label' => 'Lake Burunge'],
                    ['entity_type' => 'destination', 'entity_ref' => 'ngorongoro-crater', 'label' => 'Ngorongoro Crater'],
                    ['entity_type' => 'destination', 'entity_ref' => 'serengeti-national-park', 'label' => 'Serengeti National Park'],
                ],
                'target_markets' => ['Adventure', 'Wildlife', 'Photography'],
                'interactive_features' => [
                    'hot_air_balloon' => false,
                    'cultural_visits' => false,
                    'walking_safari' => false,
                    'night_game_drives' => false,
                ],
                'addons' => [
                    'Cultural walks' => 50,
                    'Walking safari' => 75,
                    'Traditional lunch' => 35,
                    'Night game drive' => 85,
                    'Treetop walkway' => 45,
                    'Canoeing safari' => 40,
                ],
                'conversion_triggers' => ['diverse_landscapes', 'comprehensive_wildlife'],
                'featured' => true,
                'status' => 'active',
                'images' => ['https://res.cloudinary.com/dqflffa1o/image/upload/v1777468784/wildebeest-migration-2322111_1920_zvehye.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468785/wildmovement_enpccp.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468785/wildlife-3146790_1920_skrfdw.jpg'],
                'inclusions' => ['Airport transfers', 'Accommodation as specified', 'All meals as indicated', 'Game drives as specified', 'Park fees', 'Professional English-speaking safari guide', '4x4 safari vehicle with pop-up roof', 'Drinking water during game drives'],
                'exclusions' => ['International flights', 'Travel insurance', 'Visa fees', 'Personal expenses', 'Tips and gratuities', 'Alcoholic beverages', 'Cultural walks and walking safaris', 'Night game drives', 'Maasai village visits', 'Olduvai Gorge Museum visits'],
            ],
            [
                'name' => '6 DAYS EXITING SAFARI (MATERUNI, MT KILIMANJARO, ARUSHA NP, NGORONGORO & SERENGETI)',
                'slug' => '6-days-exiting-safari-materuni-mt-kilimanjaro-arusha-np-ngorongoro-serengeti',
                'description' => 'Ultimate adventure combining cultural experiences, Kilimanjaro day hike, Arusha National Park walking safari, Ngorongoro Crater, and Serengeti game drives.',
                'location' => 'Materuni, Mount Kilimanjaro, Arusha NP, Ngorongoro, Serengeti',
                'duration_days' => 6,
                'base_price' => 3800.00,
                'international_price_min' => 3800.00,
                'international_price_max' => 4500.00,
                'best_season' => 'June to October, December to March',
                'package_destinations' => [
                    ['entity_type' => 'destination', 'entity_ref' => 'materuni', 'label' => 'Materuni'],
                    ['entity_type' => 'destination', 'entity_ref' => 'mount-kilimanjaro', 'label' => 'Mount Kilimanjaro'],
                    ['entity_type' => 'destination', 'entity_ref' => 'arusha-national-park', 'label' => 'Arusha National Park'],
                    ['entity_type' => 'destination', 'entity_ref' => 'ngorongoro-crater', 'label' => 'Ngorongoro Crater'],
                    ['entity_type' => 'destination', 'entity_ref' => 'serengeti-national-park', 'label' => 'Serengeti National Park'],
                ],
                'target_markets' => ['Adventure', 'Cultural', 'Wildlife', 'Photography'],
                'interactive_features' => [
                    'hot_air_balloon' => false,
                    'cultural_visits' => true,
                    'walking_safari' => true,
                    'night_game_drives' => false,
                ],
                'addons' => [
                    'Cultural walks' => 50,
                    'Walking safari' => 75,
                    'Traditional lunch' => 35,
                    'Night game drive' => 85,
                    'Treetop walkway' => 45,
                    'Canoeing safari' => 40,
                ],
                'conversion_triggers' => ['cultural_immersion', 'walking_safari_included'],
                'featured' => true,
                'status' => 'active',
                'images' => ['https://res.cloudinary.com/dqflffa1o/image/upload/v1777468777/waterbuck_ggd5wl.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468777/warttthhog_sg9xqf.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468777/Warttthog_xjcjyw.jpg'],
                'inclusions' => ['Airport transfers', 'Accommodation as specified', 'All meals as indicated', 'Game drives as specified', 'Park fees', 'Professional English-speaking safari guide', '4x4 safari vehicle with pop-up roof', 'Cultural activities', 'Walking safari', 'Kilimanjaro day hike', 'Drinking water during game drives'],
                'exclusions' => ['International flights', 'Travel insurance', 'Visa fees', 'Personal expenses', 'Tips and gratuities', 'Alcoholic beverages', 'Canoeing safari', 'Napururu waterfall hike', 'Personal climbing gear'],
            ],
            [
                'name' => '7 DAYS DRIVE IN FLY OUT SAFARI (ARUSHA, TARANGIRE, MTO WA MBU BIKING NGORONGORO & SERENGETI)',
                'slug' => '7-days-drive-in-fly-out-safari-arusha-tarangire-mto-wa-mbu-biking-ngorongoro-serengeti',
                'description' => 'Comprehensive safari with unique experiences including Arusha National Park walking safari, Tarangire game drives, Mto wa Mbu mountain biking, Ngorongoro Crater, and Serengeti with fly-out convenience.',
                'location' => 'Arusha, Tarangire, Mto wa Mbu, Ngorongoro, Serengeti',
                'duration_days' => 7,
                'base_price' => 3500.00,
                'international_price_min' => 3500.00,
                'international_price_max' => 4200.00,
                'best_season' => 'June to October, December to March',
                'package_destinations' => [
                    ['entity_type' => 'destination', 'entity_ref' => 'arusha-national-park', 'label' => 'Arusha National Park'],
                    ['entity_type' => 'destination', 'entity_ref' => 'tarangire-national-park', 'label' => 'Tarangire National Park'],
                    ['entity_type' => 'destination', 'entity_ref' => 'mto-wa-mbu', 'label' => 'Mto wa Mbu'],
                    ['entity_type' => 'destination', 'entity_ref' => 'ngorongoro-crater', 'label' => 'Ngorongoro Crater'],
                    ['entity_type' => 'destination', 'entity_ref' => 'serengeti-national-park', 'label' => 'Serengeti National Park'],
                ],
                'target_markets' => ['Adventure', 'Active', 'Wildlife', 'Photography'],
                'interactive_features' => [
                    'hot_air_balloon' => false,
                    'cultural_visits' => false,
                    'walking_safari' => true,
                    'night_game_drives' => false,
                ],
                'addons' => [
                    'Cultural walks' => 50,
                    'Walking safari' => 75,
                    'Traditional lunch' => 35,
                    'Night game drive' => 85,
                    'Treetop walkway' => 45,
                    'Canoeing safari' => 40,
                ],
                'conversion_triggers' => ['mountain_biking', 'walking_safari', 'fly_out_convenience'],
                'featured' => true,
                'status' => 'active',
                'images' => ['https://res.cloudinary.com/dqflffa1o/image/upload/v1777468765/Serengeti_wbeest_lxzeyh.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468764/serengeti_central_ok01lq.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468770/springbok-8063883_1920_bcrj32.jpg'],
                'inclusions' => ['Airport transfers', 'Accommodation as specified', 'All meals as indicated', 'Game drives as specified', 'Park fees', 'Professional English-speaking safari guide', '4x4 safari vehicle with pop-up roof', 'Mountain biking tour', 'Walking safari', 'Drinking water during game drives'],
                'exclusions' => ['International flights', 'Travel insurance', 'Visa fees', 'Personal expenses', 'Tips and gratuities', 'Alcoholic beverages', 'Canoeing safari', 'Napururu waterfall hike'],
            ],
            [
                'name' => '8 DAYS UNTAMMED SAFARI',
                'slug' => '8-days-untammed-safari',
                'description' => 'Experience the wild side of Tanzania with 8 days of untamed adventure. Explore Tarangire, enjoy mountain biking, discover Manyara, and immerse yourself in Serengeti and Ngorongoro.',
                'location' => 'Tarangire, Lake Manyara, Ngorongoro, Serengeti',
                'duration_days' => 8,
                'base_price' => 3600.00,
                'international_price_min' => 3600.00,
                'international_price_max' => 4300.00,
                'best_season' => 'June to October, December to March',
                'package_destinations' => [
                    ['entity_type' => 'destination', 'entity_ref' => 'tarangire-national-park', 'label' => 'Tarangire National Park'],
                    ['entity_type' => 'destination', 'entity_ref' => 'lake-manyara', 'label' => 'Lake Manyara'],
                    ['entity_type' => 'destination', 'entity_ref' => 'ngorongoro-crater', 'label' => 'Ngorongoro Crater'],
                    ['entity_type' => 'destination', 'entity_ref' => 'serengeti-national-park', 'label' => 'Serengeti National Park'],
                ],
                'target_markets' => ['Adventure', 'Wildlife', 'Photography', 'Active'],
                'interactive_features' => [
                    'hot_air_balloon' => false,
                    'cultural_visits' => false,
                    'walking_safari' => false,
                    'night_game_drives' => false,
                ],
                'addons' => [
                    'Cultural walks' => 50,
                    'Walking safari' => 75,
                    'Traditional lunch' => 35,
                    'Night game drive' => 85,
                    'Treetop walkway' => 45,
                    'Canoeing safari' => 40,
                ],
                'conversion_triggers' => ['mountain_biking', 'diverse_activities', 'flight_to_zanzibar'],
                'featured' => true,
                'status' => 'active',
                'images' => ['https://res.cloudinary.com/dqflffa1o/image/upload/v1777468773/tree-3079250_1280_m8apya.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468773/umbwee_biardh.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468773/trekkin_crg3w9.jpg'],
                'inclusions' => ['Airport transfers', 'Accommodation as specified', 'All meals as indicated', 'Game drives as specified', 'Park fees', 'Professional English-speaking safari guide', '4x4 safari vehicle with pop-up roof', 'Mountain biking tour', 'Drinking water during game drives'],
                'exclusions' => ['International flights', 'Travel insurance', 'Visa fees', 'Personal expenses', 'Tips and gratuities', 'Alcoholic beverages', 'Cultural walks and walking safaris', 'Night game drives', 'Maasai village visits', 'Olduvai Gorge Museum visits'],
            ],
            [
                'name' => '8 DAYS CLASSIC SAFARI (DRIVE IN – FLY OUT)',
                'slug' => '8-days-classic-safari-drive-in-fly-out',
                'description' => 'Classic 8-day Tanzania safari with drive-in convenience and fly-out comfort. Experience Arusha National Park walking safari, Tarangire, Lake Manyara, Ngorongoro Crater, and extensive Serengeti exploration.',
                'location' => 'Arusha, Tarangire, Lake Manyara, Ngorongoro, Serengeti',
                'duration_days' => 8,
                'base_price' => 3400.00,
                'international_price_min' => 3400.00,
                'international_price_max' => 4100.00,
                'best_season' => 'June to October, December to March',
                'package_destinations' => [
                    ['entity_type' => 'destination', 'entity_ref' => 'arusha-national-park', 'label' => 'Arusha National Park'],
                    ['entity_type' => 'destination', 'entity_ref' => 'tarangire-national-park', 'label' => 'Tarangire National Park'],
                    ['entity_type' => 'destination', 'entity_ref' => 'lake-manyara', 'label' => 'Lake Manyara'],
                    ['entity_type' => 'destination', 'entity_ref' => 'ngorongoro-crater', 'label' => 'Ngorongoro Crater'],
                    ['entity_type' => 'destination', 'entity_ref' => 'serengeti-national-park', 'label' => 'Serengeti National Park'],
                ],
                'target_markets' => ['Classic', 'Wildlife', 'Photography', 'Comfort'],
                'interactive_features' => [
                    'hot_air_balloon' => false,
                    'cultural_visits' => false,
                    'walking_safari' => true,
                    'night_game_drives' => false,
                ],
                'addons' => [
                    'Cultural walks' => 50,
                    'Walking safari' => 75,
                    'Traditional lunch' => 35,
                    'Night game drive' => 85,
                    'Treetop walkway' => 45,
                    'Canoeing safari' => 40,
                ],
                'conversion_triggers' => ['comprehensive_coverage', 'fly_out_convenience'],
                'featured' => true,
                'status' => 'active',
                'images' => ['https://res.cloudinary.com/dqflffa1o/image/upload/v1777468641/pexels-magda-ehlers-pexels-10900930_ea9ujm.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468640/pexels-magda-ehlers-pexels-6628898_drdrzf.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468640/pexels-manish-dhapwal-509105125-16253211_h8eswk.jpg'],
                'inclusions' => ['Airport transfers', 'Accommodation as specified', 'All meals as indicated', 'Game drives as specified', 'Park fees', 'Professional English-speaking safari guide', '4x4 safari vehicle with pop-up roof', 'Walking safari with armed ranger', 'Drinking water during game drives'],
                'exclusions' => ['International flights', 'Travel insurance', 'Visa fees', 'Personal expenses', 'Tips and gratuities', 'Alcoholic beverages', 'Canoeing safari', 'Napururu waterfall hike', 'Hot air balloon safari'],
            ],
            [
                'name' => '8 DAYS MAGICAL SAFARI (DRIVE IN – FLY OUT)',
                'slug' => '8-days-magical-safari-drive-in-fly-out',
                'description' => 'Magical 8-day safari combining cultural experiences, Kilimanjaro scenic flight, Tarangire, Ngorongoro Crater, Olduvai Gorge Museum, and Serengeti with hot air balloon and fly-out convenience.',
                'location' => 'Materuni, Mount Kilimanjaro, Tarangire, Ngorongoro, Serengeti',
                'duration_days' => 8,
                'base_price' => 4800.00,
                'international_price_min' => 4800.00,
                'international_price_max' => 5800.00,
                'best_season' => 'June to October, December to March',
                'package_destinations' => [
                    ['entity_type' => 'destination', 'entity_ref' => 'materuni', 'label' => 'Materuni'],
                    ['entity_type' => 'destination', 'entity_ref' => 'mount-kilimanjaro', 'label' => 'Mount Kilimanjaro'],
                    ['entity_type' => 'destination', 'entity_ref' => 'tarangire-national-park', 'label' => 'Tarangire National Park'],
                    ['entity_type' => 'destination', 'entity_ref' => 'ngorongoro-crater', 'label' => 'Ngorongoro Crater'],
                    ['entity_type' => 'destination', 'entity_ref' => 'serengeti-national-park', 'label' => 'Serengeti National Park'],
                ],
                'target_markets' => ['Luxury', 'Cultural', 'Photography', 'Adventure'],
                'interactive_features' => [
                    'hot_air_balloon' => true,
                    'cultural_visits' => true,
                    'walking_safari' => false,
                    'night_game_drives' => false,
                ],
                'addons' => [
                    'Cultural walks' => 50,
                    'Walking safari' => 75,
                    'Traditional lunch' => 35,
                    'Night game drive' => 85,
                    'Treetop walkway' => 45,
                    'Canoeing safari' => 40,
                ],
                'conversion_triggers' => ['cultural_immersion', 'luxury_accommodation'],
                'featured' => true,
                'status' => 'active',
                'images' => ['https://res.cloudinary.com/dqflffa1o/image/upload/v1777468722/pexels-valerie-sutton-34163824-11156606_1_lebmt7.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468720/pexels-valerie-sutton-34163824-7103440_rdl9qi.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468719/pexels-valerie-sutton-34163824-7071827_vhsbws.jpg'],
                'inclusions' => ['Airport transfers', 'Accommodation as specified', 'All meals as indicated', 'Game drives as specified', 'Park fees', 'Professional English-speaking safari guide', '4x4 safari vehicle with pop-up roof', 'Kilimanjaro scenic flight', 'Hot air balloon safari', 'Olduvai Gorge Museum visit', 'Drinking water during game drives'],
                'exclusions' => ['International flights', 'Travel insurance', 'Visa fees', 'Personal expenses', 'Tips and gratuities', 'Alcoholic beverages', 'Maasai village cultural visit', 'Hot bush lunch', 'Personal climbing gear'],
            ],
            [
                'name' => '4 DAYS SAFARI (TARANGIRE & NGORONGORO)',
                'slug' => '4-days-safari-tarangire-ngorongoro',
                'description' => 'Perfect short safari experience focusing on Tanzania\'s highlights. Explore Tarangire National Park known for elephants and baobab trees, then descend into the spectacular Ngorongoro Crater.',
                'location' => 'Tarangire, Ngorongoro',
                'duration_days' => 4,
                'base_price' => 2200.00,
                'international_price_min' => 2200.00,
                'international_price_max' => 2600.00,
                'best_season' => 'June to October, December to March',
                'package_destinations' => [
                    ['entity_type' => 'destination', 'entity_ref' => 'tarangire-national-park', 'label' => 'Tarangire National Park'],
                    ['entity_type' => 'destination', 'entity_ref' => 'ngorongoro-crater', 'label' => 'Ngorongoro Crater'],
                ],
                'target_markets' => ['Short break', 'Wildlife', 'Photography', 'First-time safari'],
                'interactive_features' => [
                    'hot_air_balloon' => false,
                    'cultural_visits' => false,
                    'walking_safari' => false,
                    'night_game_drives' => false,
                ],
                'addons' => [
                    'Cultural walks' => 50,
                    'Walking safari' => 75,
                    'Traditional lunch' => 35,
                    'Night game drive' => 85,
                    'Treetop walkway' => 45,
                    'Canoeing safari' => 40,
                ],
                'conversion_triggers' => ['short_duration', 'crater_experience', 'flight_to_zanzibar'],
                'featured' => true,
                'status' => 'active',
                'images' => ['https://res.cloudinary.com/dqflffa1o/image/upload/v1777468772/Tarangire_ck2ohe.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468772/tarangire-76483_1920_c7sttf.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468770/stella-point-4032287_1280_bpmyyh.jpg'],
                'inclusions' => ['Airport transfers', 'Accommodation as specified', 'All meals as indicated', 'Game drives as specified', 'Park fees', 'Professional English-speaking safari guide', '4x4 safari vehicle with pop-up roof', 'Drinking water during game drives'],
                'exclusions' => ['International flights', 'Travel insurance', 'Visa fees', 'Personal expenses', 'Tips and gratuities', 'Alcoholic beverages', 'Maasai village cultural visit', 'Olduvai gorge'],
            ],
            [
                'name' => '6 DAYS CLASSIC SAFARI (MATERUNI, ARUSHA, TARANGIRE, NGORONGORO & SERENGETI)',
                'slug' => '6-days-classic-safari-materuni-arusha-tarangire-ngorongoro-serengeti',
                'description' => 'Classic safari with cultural immersion. Experience Materuni waterfalls and coffee tour, Arusha National Park, Tarangire, Ngorongoro Crater, and Serengeti with bush lunch experience.',
                'location' => 'Materuni, Arusha, Tarangire, Ngorongoro, Serengeti',
                'duration_days' => 6,
                'base_price' => 3500.00,
                'international_price_min' => 3500.00,
                'international_price_max' => 4200.00,
                'best_season' => 'June to October, December to March',
                'package_destinations' => [
                    ['entity_type' => 'destination', 'entity_ref' => 'materuni', 'label' => 'Materuni'],
                    ['entity_type' => 'destination', 'entity_ref' => 'arusha-national-park', 'label' => 'Arusha National Park'],
                    ['entity_type' => 'destination', 'entity_ref' => 'tarangire-national-park', 'label' => 'Tarangire National Park'],
                    ['entity_type' => 'destination', 'entity_ref' => 'ngorongoro-crater', 'label' => 'Ngorongoro Crater'],
                    ['entity_type' => 'destination', 'entity_ref' => 'serengeti-national-park', 'label' => 'Serengeti National Park'],
                ],
                'target_markets' => ['Cultural', 'Classic', 'Wildlife', 'Photography'],
                'interactive_features' => [
                    'hot_air_balloon' => false,
                    'cultural_visits' => true,
                    'walking_safari' => false,
                    'night_game_drives' => false,
                ],
                'addons' => [
                    'Cultural walks' => 50,
                    'Walking safari' => 75,
                    'Traditional lunch' => 35,
                    'Night game drive' => 85,
                    'Treetop walkway' => 45,
                    'Canoeing safari' => 40,
                ],
                'conversion_triggers' => ['classic_route_with_culture', 'comprehensive_experience'],
                'featured' => true,
                'status' => 'active',
                'images' => ['https://res.cloudinary.com/dqflffa1o/image/upload/v1777468631/pexels-magda-ehlers-pexels-1320434_pi4noj.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468631/pexels-line-knipst-574109081-27021540_adku58.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468630/pexels-magda-ehlers-pexels-789630_wlsvzn.jpg'],
                'inclusions' => ['Airport transfers', 'Accommodation as specified', 'All meals as indicated', 'Game drives as specified', 'Park fees', 'Professional English-speaking safari guide', '4x4 safari vehicle with pop-up roof', 'Materuni cultural activities', 'Bush lunch experience', 'Drinking water during game drives'],
                'exclusions' => ['International flights', 'Travel insurance', 'Visa fees', 'Personal expenses', 'Tips and gratuities', 'Alcoholic beverages', 'Maasai village cultural visit', 'Olduvai Gorge Museum visit'],
            ],
            [
                'name' => '6 DAYS CLASSIC SAFARI WITH TUK TUK',
                'slug' => '6-days-classic-safari-with-tuk-tuk',
                'description' => 'Unique classic safari experience with Tuk Tuk adventure. Explore Tarangire, enjoy leisure day with Tuk Tuk ride, discover Ngorongoro Crater, and experience extensive Serengeti game drives.',
                'location' => 'Tarangire, Mto wa Mbu, Ngorongoro, Serengeti',
                'duration_days' => 6,
                'base_price' => 3300.00,
                'international_price_min' => 3300.00,
                'international_price_max' => 3900.00,
                'best_season' => 'June to October, December to March',
                'package_destinations' => [
                    ['entity_type' => 'destination', 'entity_ref' => 'tarangire-national-park', 'label' => 'Tarangire National Park'],
                    ['entity_type' => 'destination', 'entity_ref' => 'mto-wa-mbu', 'label' => 'Mto wa Mbu'],
                    ['entity_type' => 'destination', 'entity_ref' => 'ngorongoro-crater', 'label' => 'Ngorongoro Crater'],
                    ['entity_type' => 'destination', 'entity_ref' => 'serengeti-national-park', 'label' => 'Serengeti National Park'],
                ],
                'target_markets' => ['Unique', 'Cultural', 'Wildlife', 'Adventure'],
                'interactive_features' => [
                    'hot_air_balloon' => false,
                    'cultural_visits' => false,
                    'walking_safari' => false,
                    'night_game_drives' => false,
                ],
                'addons' => [
                    'Cultural walks' => 50,
                    'Walking safari' => 75,
                    'Traditional lunch' => 35,
                    'Night game drive' => 85,
                    'Treetop walkway' => 45,
                    'Canoeing safari' => 40,
                ],
                'conversion_triggers' => ['tuk_tuk_experience', 'unique_transport', 'classic_route'],
                'featured' => true,
                'status' => 'active',
                'images' => ['https://res.cloudinary.com/dqflffa1o/image/upload/v1777468769/Sovegnier_iqyqga.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468769/south-africa-4156075_1280_zohmv4.jpg', 'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468768/south-africa-3084196_1920_jqkkee.jpg'],
                'inclusions' => ['Airport transfers', 'Accommodation as specified', 'All meals as indicated', 'Game drives as specified', 'Park fees', 'Professional English-speaking safari guide', '4x4 safari vehicle with pop-up roof', 'Tuk Tuk experience', 'Drinking water during game drives'],
                'exclusions' => ['International flights', 'Travel insurance', 'Visa fees', 'Personal expenses', 'Tips and gratuities', 'Alcoholic beverages', 'Hot air balloon safari', 'Maasai village cultural visit', 'Olduvai Gorge Museum visit'],
            ],
        ];

        foreach ($tours as $t) {
            $t['slug'] = Str::slug($t['name']);
            
            // Only use fields that actually exist in the database
            $safeData = [
                'name' => $t['name'],
                'slug' => $t['slug'],
                'description' => $t['description'],
                'location' => $t['location'],
                'duration_days' => $t['duration_days'],
                'base_price' => $t['base_price'],
                'international_price_min' => $t['international_price_min'] ?? null,
                'international_price_max' => $t['international_price_max'] ?? null,
                'best_season' => $t['best_season'] ?? null,
                'package_destinations' => $t['package_destinations'] ?? [],
                'target_markets' => $t['target_markets'] ?? [],
                'interactive_features' => $t['interactive_features'] ?? [],
                'addons' => $t['addons'] ?? [],
                'conversion_triggers' => $t['conversion_triggers'] ?? [],
                'featured' => $t['featured'] ?? false,
                'status' => $t['status'] ?? 'active',
                'images' => $t['images'] ?? [],
                'inclusions' => $t['inclusions'] ?? [],
                'exclusions' => $t['exclusions'] ?? [],
            ];
            
            // Add optional fields only if they exist in the database
            if (Schema::hasColumn('tours', 'package_highlights')) {
                $safeData['package_highlights'] = $t['package_highlights'] ?? null;
            }
            if (Schema::hasColumn('tours', 'route')) {
                $safeData['route'] = $t['route'] ?? null;
            }
            if (Schema::hasColumn('tours', 'difficulty')) {
                $safeData['difficulty'] = $t['difficulty'] ?? 'easy';
            }
            if (Schema::hasColumn('tours', 'difficulty_level')) {
                $safeData['difficulty_level'] = $t['difficulty_level'] ?? 'easy';
            }
            if (Schema::hasColumn('tours', 'max_altitude')) {
                $safeData['max_altitude'] = $t['max_altitude'] ?? null;
            }
            if (Schema::hasColumn('tours', 'altitude_gain')) {
                $safeData['altitude_gain'] = $t['altitude_gain'] ?? null;
            }
            if (Schema::hasColumn('tours', 'package_type')) {
                $safeData['package_type'] = $t['package_type'] ?? null;
            }
            if (Schema::hasColumn('tours', 'route_name')) {
                $safeData['route_name'] = $t['route_name'] ?? null;
            }
            if (Schema::hasColumn('tours', 'base_location')) {
                $safeData['base_location'] = $t['base_location'] ?? null;
            }
            if (Schema::hasColumn('tours', 'starting_gate')) {
                $safeData['starting_gate'] = $t['starting_gate'] ?? null;
            }
            if (Schema::hasColumn('tours', 'tour_type')) {
                $safeData['tour_type'] = $t['tour_type'] ?? 'safari';
            }
            if (Schema::hasColumn('tours', 'max_group_size')) {
                $safeData['max_group_size'] = $t['max_group_size'] ?? 20;
            }
            if (Schema::hasColumn('tours', 'min_age')) {
                $safeData['min_age'] = $t['min_age'] ?? 0;
            }
            
            Tour::create($safeData);
        }
    }
}
