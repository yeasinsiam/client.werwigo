<?php

namespace Database\Seeders;

use App\Models\HotelTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HotelTag::create([
            'title' => 'Couple Friendly'
        ]);
        HotelTag::create([
            'title' => 'Couple Breakfast'
        ]);
        HotelTag::create([
            'title' => 'Couple Candle Light Dinner'
        ]);
    }
}
