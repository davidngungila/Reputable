<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('itineraries', function (Blueprint $table) {
            // Daily Itinerary Details
            $table->string('daily_program_title')->nullable();
            $table->text('daily_description')->nullable();
            $table->string('driving_distance_time')->nullable(); // 1-2 hours
            $table->string('trekking_time')->nullable(); // 3-5 hours, 14-18 hours
            $table->string('trekking_distance')->nullable(); // 7km / 4.5mi, 19km / 12mi
            $table->string('start_altitude')->nullable(); // 1860m or 6100ft
            $table->string('end_altitude')->nullable(); // 2775m or 9105ft
            $table->string('highest_altitude')->nullable(); // 5895m or 19431ft
            $table->string('altitude_gain_loss')->nullable(); // +915m or +3005ft, -1840m or -6120ft
            $table->string('meals_included')->nullable(); // Breakfast, picnic lunch, dinner
            $table->string('overnight_location_name')->nullable(); // Mandara Hut, Embalakai Tented Camp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('itineraries', function (Blueprint $table) {
            $table->dropColumn([
                'daily_program_title',
                'daily_description',
                'driving_distance_time',
                'trekking_time',
                'trekking_distance',
                'start_altitude',
                'end_altitude',
                'highest_altitude',
                'altitude_gain_loss',
                'meals_included',
                'overnight_location_name'
            ]);
        });
    }
};
