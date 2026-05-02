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
        Schema::create('cloudinary_configs', function (Blueprint $table) {
            $table->id();
            $table->string('cloud_name');
            $table->string('api_key');
            $table->string('api_secret');
            $table->string('cloud_url');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cloudinary_configs');
    }
};
