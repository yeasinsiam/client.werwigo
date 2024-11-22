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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();


            $table->string('headline');
            // $table->mediumText('excerpt');
            $table->longText('description');

            // meta
            $table->string('slug')->unique();

            $table->bigInteger('view_count')->default(0);
            $table->foreignId('admin_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('parent_hotel_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
// <?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::create('hotels', function (Blueprint $table) {
//             $table->id();
//             $table->string('google_place_id');
//             $table->string('title');
//             $table->text('address');
//             $table->string('google_rating');
//             $table->string('google_total_reviews');

//             $table->string('headline');
//             $table->mediumText('excerpt');
//             $table->longText('description');

//             // meta
//             $table->string('slug')->unique();


//             // $table->enum('booking_type', ['direct', 'request', 'online']);
//             // $table->string('direct_booking_link')->nullable();
//             // $table->float('booking_request_price_per_night')->nullable();
//             // $table->string('booking_request_link')->nullable();
//             // $table->json('online_booking_links')->nullable()->default('[]');


//             $table->bigInteger('view_count')->default(0);


//             $table->foreignId('admin_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();

//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('hotels');
//     }
// };
