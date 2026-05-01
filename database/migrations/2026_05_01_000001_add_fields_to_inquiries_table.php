<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->string('nationality')->nullable()->after('phone');
            $table->date('travel_date')->nullable()->after('tour_id');
            $table->string('duration')->nullable()->after('travel_date');
            $table->string('group_size')->nullable()->after('duration');
        });
    }

    public function down()
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->dropColumn(['nationality', 'travel_date', 'duration', 'group_size']);
        });
    }
};
