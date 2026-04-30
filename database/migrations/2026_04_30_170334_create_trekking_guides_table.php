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
        Schema::create('trekking_guides', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('bio');
            $table->string('specialization')->nullable(); // kilimanjaro, meru, general, etc.
            $table->string('languages')->nullable(); // JSON array of languages
            $table->string('experience_years')->nullable();
            $table->string('certifications')->nullable();
            $table->text('achievements')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->json('images')->nullable();
            $table->string('profile_image')->nullable();
            $table->json('mountains_expertise')->nullable(); // Array of mountains they guide
            $table->decimal('daily_rate', 10, 2)->nullable();
            $table->text('services')->nullable();
            $table->json('reviews')->nullable();
            $table->integer('rating')->default(5);
            $table->integer('total_trips')->default(0);
            $table->boolean('is_available')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index(['specialization', 'is_active']);
            $table->index('slug');
            $table->index('is_featured');
            $table->index('is_available');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trekking_guides');
    }
};
