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
        Schema::create('wildlife_sightings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->constrained()->onDelete('cascade');
            $table->json('commonly_seen'); // Elephants, Giraffes, Zebras, Lions
            $table->json('occasionally_seen'); // Black rhino, Cheetah, Dik-Dik
            $table->json('rarely_seen'); // Leopard, Caracal, Serval, Wild dog
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wildlife_sightings');
    }
};
