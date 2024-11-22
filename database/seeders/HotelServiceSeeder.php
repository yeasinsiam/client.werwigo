<?php

namespace Database\Seeders;

use App\Models\HotelService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HotelService::create([
            'title' => 'Air Condition',
            'icon_class' => 'far fa-air-conditioner'
        ]);
        HotelService::create([
            'title' => 'WIFI',
            'icon_class' => 'far fa-wifi'
        ]);
        HotelService::create([
            'title' => 'Breakfast',
            'icon_class' => 'far fa-utensils'
        ]);
    }
}
