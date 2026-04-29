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
        Schema::create('mountains', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('location');
            $table->decimal('height', 8, 2);
            $table->string('height_unit')->default('meters');
            $table->json('coordinates');
            $table->text('trekking_info')->nullable();
            $table->json('routes')->nullable();
            $table->json('equipment_guide')->nullable();
            $table->json('expert_guides')->nullable();
            $table->json('images')->nullable();
            $table->string('difficulty_level')->nullable();
            $table->integer('duration_days')->nullable();
            $table->decimal('price_from', 10, 2)->nullable();
            $table->string('best_season')->nullable();
            $table->text('weather_info')->nullable();
            $table->json('highlights')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mountains');
    }
};
