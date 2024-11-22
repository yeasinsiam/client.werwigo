<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HotelCategory;
use App\Http\Requests\StoreHotelCategoryRequest;
use App\Http\Requests\UpdateHotelCategoryRequest;
use Illuminate\Http\Request;

class HotelCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = null;

        if (request()->query('id')) {
            $category = HotelCategory::findOrFail(request()->query('id'));
            // $this->validateNotOoohCategory($category);
        }

        $categories = HotelCategory::latest()->get();
        return view('pages.admin.hotels.categories.index', compact('categories', 'category'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            // 'icon' => 'required|mimes:png',

        ]);


        $firstSortingOrderPosition = $first = HotelCategory::latest('position')->first();

        $hotelCategory =  HotelCategory::create([
            'title' => $request->title,
            // 'svg' => $request->svg,
            // 'svg_active' => $request->svg_active
            'position' =>  $firstSortingOrderPosition ?
                $first->position + 1 :
                1
        ]);


        // $hotelCategory->addMediaFromRequest('icon')
        //     ->toMediaCollection('icon');

        // $hotelCategory->addMediaFromRequest('icon_active')
        //     ->toMediaCollection('icon_active');






        return redirect()->back();
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HotelCategory $hotelCategory)
    {

        // $this->validateNotOoohCategory($hotelCategory);

        $request->validate([
            'title' => 'required|string',
            // 'icon' => 'nullable|mimes:png',
            // 'icon_active' => 'nullable|mimes:png',
            // 'svg' => 'nullable|string',
            // 'svg_active' => 'required_with:svg'
        ]);

        $hotelCategory->update([
            'title' => $request->title,
            // 'svg' => $request->svg,
            // 'svg_active' => $request->svg_active
        ]);


        // if ($request->hasFile('icon'))
        //     $hotelCategory->addMediaFromRequest('icon')
        //         ->toMediaCollection('icon');

        // if ($request->hasFile('icon_active'))
        //     $hotelCategory->addMediaFromRequest('icon_active')
        //         ->toMediaCollection('icon_active');





        return redirect()->route('admin.hotel-categories.index', ['id' => $hotelCategory->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelCategory $hotelCategory)
    {
        // $this->validateNotOoohCategory($hotelCategory);

        $hotelCategory->delete();
        return redirect()->route('admin.hotel-categories.index');
    }



    // private function validateNotOoohCategory(HotelCategory $hotelCategory)
    // {

    //     if ($hotelCategory->id == 1) {
    //         abort(404);
    //     }
    // }
}
