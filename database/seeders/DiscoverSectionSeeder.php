<?php

namespace Database\Seeders;

use App\Models\DiscoverSection;
use App\Models\DiscoverSectionCarousel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscoverSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DiscoverSection::create([
            'title' => 'Discover your next <span class="text-[#000000] whitespace-nowrap">romantic escape</span>',
            'subtitle' => 'Discover all the facilities in each city where we are, for your next romantic escape.'
        ]);


        // Seed carousels
        $carousel1 = DiscoverSectionCarousel::create([
            'hotel_category_id' => 1
        ]);
        // thumbnail
        $carousel1->addMedia(public_path('/demo/hotel-4.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('thumbnail');


        $carousel2 = DiscoverSectionCarousel::create([
            'hotel_category_id' => 1
        ]);
        // thumbnail
        $carousel2->addMedia(public_path('/demo/hotel-1.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('thumbnail');


        $carousel3 = DiscoverSectionCarousel::create([
            'hotel_category_id' => 1
        ]);
        // thumbnail
        $carousel3->addMedia(public_path('/demo/hotel-2.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('thumbnail');


        $carousel4 = DiscoverSectionCarousel::create([
            'hotel_category_id' => 1
        ]);
        // thumbnail
        $carousel4->addMedia(public_path('/demo/hotel-3.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('thumbnail');
    }
}
