<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DiscoverSection;
use App\Http\Requests\StoreDiscoverSectionRequest;
use App\Http\Requests\UpdateDiscoverSectionRequest;
use App\Models\DiscoverSectionCarousel;
use Illuminate\Http\Request;

class DiscoverSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discoverSection = DiscoverSection::first();

        $discoverSectionCarousel =   DiscoverSectionCarousel::with('media', 'category')->get();


        return view('pages.admin.discover-section.index', compact('discoverSection', 'discoverSectionCarousel'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'subtitle' => 'required|string',
        ]);

        DiscoverSection::first()->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle
        ]);

        return redirect()->back();
    }
}
