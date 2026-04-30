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
        Schema::create('trekking_equipment', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('category'); // clothing, gear, safety, medical, etc.
            $table->boolean('is_required')->default(true);
            $table->boolean('is_provided')->default(false);
            $table->text('specifications')->nullable();
            $table->text('care_instructions')->nullable();
            $table->json('images')->nullable();
            $table->string('featured_image')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('rental_info')->nullable();
            $table->text('tips')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index(['category', 'is_active']);
            $table->index('slug');
            $table->index('is_required');
            $table->index('is_provided');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trekking_equipment');
    }
};
