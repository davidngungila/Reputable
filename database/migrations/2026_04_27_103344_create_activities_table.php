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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->string('activity_type')->nullable();
            $table->string('location')->nullable();
            $table->string('duration')->nullable();
            $table->string('difficulty_level')->nullable();
            $table->string('age_requirement')->nullable();
            $table->integer('group_size')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->json('highlights')->nullable();
            $table->json('inclusions')->nullable();
            $table->json('exclusions')->nullable();
            $table->json('what_to_bring')->nullable();
            $table->json('safety_info')->nullable();
            $table->string('best_time')->nullable();
            $table->json('images')->nullable();
            $table->string('status')->default('active');
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
