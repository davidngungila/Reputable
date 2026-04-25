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
            $table->string('tour_type')->default('safari')->after('location');
            $table->string('max_group_size')->default(20)->after('duration_days');
            $table->integer('min_age')->default(0)->after('max_group_size');
            $table->json('what_to_bring')->nullable()->after('min_age');
            $table->json('highlights')->nullable()->after('what_to_bring');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn(['tour_type', 'max_group_size', 'min_age', 'what_to_bring', 'highlights']);
        });
    }
};
