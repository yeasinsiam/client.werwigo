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
        Schema::create('parent_hotels', function (Blueprint $table) {
            $table->id();
            $table->string('google_place_id')->unique();
            $table->string('title');
            $table->text('address');
            $table->text('city_country');
            $table->string('google_rating');
            $table->string('google_total_reviews');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parent_hotels');
    }
};
