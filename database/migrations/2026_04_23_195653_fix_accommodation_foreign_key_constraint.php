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
        // This migration ensures the foreign key constraint is properly handled
        // The accommodation_id column and foreign key already exist in the tours table
        // No changes needed for up() as the foreign key is already in place
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the foreign key constraint before dropping the accommodations table (if it exists)
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
    }
};
