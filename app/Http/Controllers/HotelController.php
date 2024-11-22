<?php

namespace App\Http\Controllers;

use App\Models\CustomerFavoriteHotel;
use App\Models\Hotel;
use App\Models\HotelOpinion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {


        $hotel->increment('view_count');

        $id = 'hotel-' . $hotel->id;
        $customerFavoriteHotels = CustomerFavoriteHotel::where('customer_user_id', auth('admin')->user()?->id)
            ->get();


        $hotel->load(['parentHotel' => function ($query) {
            $query->with('ratings');
            $query->withAvg(
                [
                    'ratings as romantic_avg' => function ($query) {
                        $query->where('type', 'romantic');
                    },
                    'ratings as intimate_avg' => function ($query) {
                        $query->where('type', 'intimate');
                    },
                    'ratings as luxury_avg' => function ($query) {
                        $query->where('type', 'luxury');
                    },
                    'ratings as average_rating'
                ],
                'rate'
            );

            $query->withCount('ratings');
        }]);


        // $hotel->loadAvg([
        //     'ratings as romantic_avg' => function ($query) {
        //         $query->where('type', 'romantic');
        //     },
        //     'ratings as intimate_avg' => function ($query) {
        //         $query->where('type', 'intimate');
        //     },
        //     'ratings as luxury_avg' => function ($query) {
        //         $query->where('type', 'luxury');
        //     }

        // ], 'rate');

        // $hotel->loadCount('ratings');


        // Checkout and checkin date
        if (request()->query('check-in')) {
            $checkIn =  Carbon::createFromFormat('m/d/Y', request()->query('check-in'));
        } else {
            $checkIn = Carbon::now();
        }
        if (request()->query('check-out')) {
            $checkOut =  Carbon::createFromFormat('m/d/Y', request()->query('check-out'));
        } else {
            $checkOut = Carbon::now()->addDay();
        }


        $hotelOpinions = $hotel->parentHotel->opinions()->latest()->get();
        $hotelOpinionsParticipatesCount = $hotel->parentHotel->opinions()->distinct()->count('admin_id');


        $xl7 = true;

        // $hotelOpinions = HotelOpinion::with('hotel.admin')->whereHas('hotel', function ($q) use ($hotel) {
        //     $q->where('google_place_id', $hotel->google_place_id);
        // })->latest()->get();


        return view('pages.hotels.show', compact('id', 'hotel', 'customerFavoriteHotels', 'checkIn', 'checkOut', 'hotelOpinions', 'hotelOpinionsParticipatesCount', 'xl7'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        //
    }
}
