<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HotelService;
use App\Http\Requests\StoreHotelServiceRequest;
use App\Http\Requests\UpdateHotelServiceRequest;
use Illuminate\Http\Request;

class HotelServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service = null;

        if (request()->query('id')) {
            $service = HotelService::findOrFail(request()->query('id'));
        }

        $services = HotelService::latest()->get();
        return view('pages.admin.hotels.services.index', compact('services', 'service'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'icon_class' => 'required|string|unique:hotel_services,icon_class'
        ]);

        HotelService::create([
            'title' => $request->title,
            'icon_class' => $request->icon_class
        ]);

        return redirect()->back();
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HotelService $hotelService)
    {
        $request->validate([
            'title' => 'required|string',
            'icon_class' => 'required|string|unique:hotel_services,icon_class,' . $hotelService->id
        ]);

        $hotelService->update([
            'title' => $request->title,
            'icon_class' => $request->icon_class
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelService $hotelService)
    {
        $hotelService->delete();
        return redirect()->route('admin.hotel-services.index');
    }
}
