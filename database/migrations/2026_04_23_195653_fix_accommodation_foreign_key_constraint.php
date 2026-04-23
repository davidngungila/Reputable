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
        // Drop the foreign key constraint before dropping the accommodations table
        Schema::table('tours', function (Blueprint $table) {
            $table->dropForeign(['accommodation_id']);
            $table->dropColumn('accommodation_id');
        });
    }
};
