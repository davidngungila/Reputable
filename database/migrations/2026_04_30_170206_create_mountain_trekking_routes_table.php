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
        Schema::create('mountain_trekking_routes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('mountain_name');
            $table->string('duration');
            $table->string('difficulty');
            $table->integer('duration_days');
            $table->decimal('price_from', 10, 2);
            $table->decimal('price_to', 10, 2)->nullable();
            $table->string('success_rate');
            $table->json('highlights')->nullable();
            $table->json('itinerary')->nullable();
            $table->json('included')->nullable();
            $table->json('excluded')->nullable();
            $table->string('best_season');
            $table->json('images')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index(['mountain_name', 'is_active']);
            $table->index('slug');
            $table->index('difficulty');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mountain_trekking_routes');
    }
};
