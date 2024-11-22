<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HotelTag;
use App\Http\Requests\StoreHotelTagRequest;
use App\Http\Requests\UpdateHotelTagRequest;
use Illuminate\Http\Request;

class HotelTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tag = null;

        if (request()->query('id')) {
            $tag = HotelTag::findOrFail(request()->query('id'));
        }

        $tags = HotelTag::latest()->get();
        return view('pages.admin.hotels.tags.index', compact('tags', 'tag'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string'
        ]);

        HotelTag::create([
            'title' => $request->title
        ]);

        return redirect()->back();
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HotelTag $hotelTag)
    {
        $request->validate([
            'title' => 'required|string'
        ]);

        $hotelTag->update([
            'title' => $request->title
        ]);

        return redirect()->route('admin.hotel-tags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelTag $hotelTag)
    {
        $hotelTag->delete();
        return redirect()->route('admin.hotel-tags.index');
    }
}
