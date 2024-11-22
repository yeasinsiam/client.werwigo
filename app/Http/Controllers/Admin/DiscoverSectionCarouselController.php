<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DiscoverSectionCarousel;
use App\Models\HotelCategory;
use Illuminate\Http\Request;

class DiscoverSectionCarouselController extends Controller
{



    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        $hotelCategories = HotelCategory::get();

        return view('pages.admin.discover-section.carousel.create', compact('hotelCategories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'thumbnail' => 'required|mimes:jpeg,jpg',
            'category' => 'required|exists:hotel_categories,id',
        ]);

        $discoverSectionCarousel =  DiscoverSectionCarousel::create([
            'hotel_category_id'  => $request->category
        ]);

        // thumbnail
        $discoverSectionCarousel->addMediaFromRequest('thumbnail')
            ->toMediaCollection('thumbnail');

        return redirect()->route('admin.discover-section-carousel.edit', $discoverSectionCarousel->id);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DiscoverSectionCarousel $discoverSectionCarousel)
    {
        $hotelCategories = HotelCategory::get();

        return view('pages.admin.discover-section.carousel.edit', compact('discoverSectionCarousel', 'hotelCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DiscoverSectionCarousel $discoverSectionCarousel)
    {
        $request->validate([

            'thumbnail' => 'nullable|mimes:jpeg,jpg',
            'category' => 'required|exists:hotel_categories,id',
        ]);

        $discoverSectionCarousel->update([
            'hotel_category_id'  => $request->category
        ]);


        // thumbnail
        if ($request->hasFile('thumbnail'))
            $discoverSectionCarousel->addMediaFromRequest('thumbnail')
                ->toMediaCollection('thumbnail');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DiscoverSectionCarousel $discoverSectionCarousel)
    {
        $discoverSectionCarousel->delete();
        return redirect()->back();
    }
}
