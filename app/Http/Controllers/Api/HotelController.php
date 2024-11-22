<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\ParentHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class HotelController extends Controller
{
    /**
     * Show hotel
     */
    public function show($hotelId, Request $request)
    {
        $parentHotel  = ParentHotel::find($hotelId);

        if (!$parentHotel)
            return response()->json(['message' => 'Hotel not found.'], 404);

        $parentHotel->load('hotel.admin');

        $data = [
            'id' => $parentHotel->id,
            'title' => $parentHotel->title,
            'address' => $parentHotel->address,
            'city_country' => $parentHotel->city_country,
            'best_rating' =>  number_format(floatval($parentHotel->best_rating), 1),
            'best_rating_name' => $parentHotel->best_rating_type ?? 'new',
            'google_rating' => $parentHotel->google_rating,
            'google_total_reviews' => $parentHotel->google_total_reviews,
            'created_at' => $parentHotel->created_at,
            'vibes' => $parentHotel->hotel->map(function ($hotel) {
                return [
                    'user' => $hotel->admin
                ];
            }, [])
        ];

        return response()->json($data);
    }
}
