<?php

namespace App\Http\Controllers;

use App\Models\CustomerFavoriteHotel;
use App\Models\Hotel;
use App\Models\HotelCategory;
use App\Services\FavoriteHotelSessionService;
use App\Services\RecentHotelSearchSessionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RecentHotelSearchSessionService $recentHotelSearchSessionService)
    {

        // $favoriteHotels = CustomerFavoriteHotel::with(['hotel' => function ($hotelsQuery) {
        //     $hotelsQuery->with('categories', 'tags', 'services', 'ratings', 'media');
        //     $hotelsQuery->withAvg([
        //         'ratings as romantic_avg' => function ($query) {
        //             $query->where('type', 'romantic');
        //         },
        //         'ratings as intimate_avg' => function ($query) {
        //             $query->where('type', 'intimate');
        //         },
        //         'ratings as luxury_avg' => function ($query) {
        //             $query->where('type', 'luxury');
        //         }

        //     ], 'rate');
        // }])

        //     ->where('customer_user_id', auth('admin')->user()?->id)
        //     ->get();

        $favoriteHotels = CustomerFavoriteHotel::where('customer_user_id', auth('admin')->user()?->id)
            ->get();


        $hotelCategories =  HotelCategory::orderBy('position')->get();


        $isHotelListingFiltered = (request()->query('romantic-scoring-from') != null &&
            request()->query('romantic-scoring-from') != 1) ||

            (request()->query('romantic-scoring-to') != null &&
                request()->query('romantic-scoring-to') != 5) ||


            (request()->query('intimate-scoring-from') != null &&
                request()->query('intimate-scoring-from') != 1) ||

            (request()->query('intimate-scoring-to') != null &&
                request()->query('intimate-scoring-to') != 5) ||


            (request()->query('luxurious-scoring-from') != null &&
                request()->query('luxurious-scoring-from') != 1) ||


            (request()->query('luxurious-scoring-to') != null &&
                request()->query('luxurious-scoring-to') != 5) ||



            (request()->query('booking-type') != null &&
                !empty(request()->query('booking-type'))) ||

            (request()->query('categories') != null &&
                !empty(request()->query('categories'))) ||

            (request()->query('tags') != null &&
                !empty(request()->query('tags'))) ||

            (request()->query('amenities') != null &&
                !empty(request()->query('amenities'))) ||

            (request()->query('query') != null &&
                request()->query('query'));

        $xl7 = true;


        return view('pages.favorites', compact('isHotelListingFiltered', 'favoriteHotels', 'hotelCategories',  'xl7'));
    }



    // public function index(RecentHotelSearchSessionService $recentHotelSearchSessionService, FavoriteHotelSessionService $favoriteHotelSessionService)
    // {


    //     // $discoverSection =   DiscoverSection::first();
    //     // $discoverSectionCarousel =  DiscoverSectionCarousel::with('media', 'category')->get();





    //     // $favoriteHotels = Hotel::with('media')->whereIn('id', $favoriteHotelSessionService->get())
    //     //     ->when(!empty($favoriteHotelSessionService->get()), function ($query) use ($favoriteHotelSessionService) {
    //     //         return  $query->orderBy(DB::raw("FIELD(id, " . implode(',',  array_reverse($favoriteHotelSessionService->get())) . ")"));
    //     //     })
    //     //     ->take(5)->get();


    //     $recentSearchedHotels = Hotel::with('media')->whereIn('id', $recentHotelSearchSessionService->get())
    //         ->when(!empty($recentHotelSearchSessionService->get()), function ($query) use ($recentHotelSearchSessionService) {
    //             return  $query->orderBy(DB::raw("FIELD(id, " . implode(',',  array_reverse($recentHotelSearchSessionService->get())) . ")"));
    //         })
    //         ->take(5)->get();


    //     return view('pages.index', compact('recentSearchedHotels'));
    //     // return view('pages.index', compact('discoverSection', 'discoverSectionCarousel', 'favoriteHotels', 'recentSearchedHotels'));
    // }
}
