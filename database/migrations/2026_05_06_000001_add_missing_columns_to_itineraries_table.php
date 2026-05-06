<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('itineraries', function (Blueprint $table) {
            $table->json('activities')->nullable()->after('description');
            $table->json('meals')->change(); // Change from string to json
            $table->string('transportation')->nullable()->after('accommodation');
        });
    }

    public function down(): void
    {
        Schema::table('itineraries', function (Blueprint $table) {
            $table->dropColumn('activities');
            $table->dropColumn('transportation');
            $table->string('meals')->nullable()->change(); // Revert back to string
        });
    }
};
