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
            // Package Details
            $table->string('package_type')->nullable(); // Kilimanjaro Climbing, Safari, Combo Adventure
            $table->string('route_name')->nullable(); // Marangu Route, Machame Route, etc.
            $table->string('base_location')->nullable(); // Moshi, Arusha
            $table->string('starting_gate')->nullable(); // Kilimanjaro airport, Marangu gate
            
            // Enhanced inclusions/exclusions
            $table->json('detailed_inclusions')->nullable();
            $table->json('optional_extras')->nullable(); // Pre/post climb accommodation, private huts, etc.
            $table->json('detailed_exclusions')->nullable();
            
            // Safari specific
            $table->json('extra_activities')->nullable(); // Hot air balloon, walking safari, etc.
            
            // Relationships
            $table->foreignId('accommodation_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn([
                'package_type',
                'route_name',
                'base_location',
                'starting_gate',
                'detailed_inclusions',
                'optional_extras',
                'detailed_exclusions',
                'extra_activities',
                'accommodation_id'
            ]);
        });
    }
};
