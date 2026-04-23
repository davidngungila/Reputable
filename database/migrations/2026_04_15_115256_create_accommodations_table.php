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
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop foreign key constraint from tours table first (if it exists)
        if (Schema::hasColumn('tours', 'accommodation_id')) {
            Schema::table('tours', function (Blueprint $table) {
                // Try to drop foreign key only if it exists
                try {
                    $table->dropForeign(['accommodation_id']);
                } catch (\Exception $e) {
                    // Foreign key might not exist, continue
                }
                $table->dropColumn('accommodation_id');
            });
        }
        
        Schema::dropIfExists('accommodations');
    }
};
