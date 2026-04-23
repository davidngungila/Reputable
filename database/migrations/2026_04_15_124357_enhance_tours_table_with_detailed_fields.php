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
        Schema::table('tours', function (Blueprint $table) {
            // Only add fields that don't already exist
            if (!Schema::hasColumn('tours', 'package_highlights')) {
                $table->text('package_highlights')->nullable()->after('description');
            }
            if (!Schema::hasColumn('tours', 'difficulty_level')) {
                $table->string('difficulty_level')->nullable()->after('difficulty'); // More detailed difficulty
            }
            if (!Schema::hasColumn('tours', 'max_altitude')) {
                $table->integer('max_altitude')->nullable()->after('best_season'); // meters
            }
            if (!Schema::hasColumn('tours', 'altitude_gain')) {
                $table->string('altitude_gain')->nullable()->after('max_altitude'); // e.g., "+915m"
            }
            
            // Wildlife sightings for safari packages
            if (!Schema::hasColumn('tours', 'common_wildlife')) {
                $table->json('common_wildlife')->nullable()->after('conversion_triggers');
            }
            if (!Schema::hasColumn('tours', 'occasional_wildlife')) {
                $table->json('occasional_wildlife')->nullable()->after('common_wildlife');
            }
            if (!Schema::hasColumn('tours', 'rare_wildlife')) {
                $table->json('rare_wildlife')->nullable()->after('occasional_wildlife');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn([
                'package_highlights',
                'difficulty_level',
                'max_altitude',
                'altitude_gain',
                'common_wildlife',
                'occasional_wildlife',
                'rare_wildlife'
            ]);
        });
    }
};
