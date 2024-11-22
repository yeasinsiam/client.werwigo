<?php

use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\Auth\RegisterController as AdminRegisterController;
use App\Http\Controllers\Admin\CustomerUserController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\HotelCategoryController;
use App\Http\Controllers\Admin\HotelController as AdminHotelController;
use App\Http\Controllers\Admin\HotelServiceController;
use App\Http\Controllers\Admin\HotelTagController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\TermsOfServiceController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyAccount\ContactsAndSupportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\TermsOfServiceSectionController;
use App\Http\Controllers\Testing\TestingController;
use App\Models\CustomerFavoriteHotel;
use App\Models\ParentHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::localized(
    function () {

        Route::view('/', 'pages.v2.index')->name('home');
        Route::view('terms-of-service', 'pages.v2.terms-of-service')->name('terms-of-service');
        Route::view('contacts-and-support', 'pages.v2.contacts-and-support')->name('contacts-and-support');
        Route::post('contacts-and-support/contact-mail',  [ContactsAndSupportController::class, 'sendContactMail'])->name('contacts-and-support.post-contact-mail');

        Route::middleware('auth:admin')->post('login/destroy', [LoginController::class, 'destroy'])->name('login.destroy');
        Route::middleware('guest:admin')->group(function () {
            Route::get('login-admin', [LoginController::class, 'index'])->name('login.index');
            Route::post('login', [LoginController::class, 'store'])->name('login.store');
            // Route::resource('sign-up', SignUpController::class)->only('index', 'store');
        });
    }



);








Route::prefix('admin')->as('admin.')->group(function () {



    Route::get('/', function () {
        return redirect()->route('admin.hotels.index');
    });



    Route::middleware('auth:admin')->group(function () {

        Route::post('hotel-ratings/{hotel}/store', [AdminHotelController::class, 'storeRatings'])->name('hotel-ratings.store');
        Route::delete('hotel-ratings/{hotel_rate}/delete', [AdminHotelController::class, 'deleteRatings'])->name('hotel-ratings.delete');
        Route::delete('hotel-opinions/{hotelOpinion}/delete', [AdminHotelController::class, 'deleteOpinion'])->name('hotel-opinions.delete');
        Route::resource('hotels', AdminHotelController::class)->except('show');


        Route::middleware('role:super-admin')->group(function () {
            Route::resource('hotel-categories', HotelCategoryController::class)->only('index', 'store', 'update', 'destroy');
            Route::resource('hotel-tags', HotelTagController::class)->only('index', 'store', 'update', 'destroy');
        });




        Route::resource('faqs', FaqController::class)->except('show');
        Route::middleware('role:super-admin')->group(function () {
            // Users
            Route::resource('users', CustomerUserController::class)->except('show', 'create', 'store');

            // Terms of service
            Route::get('terms-of-service', [TermsOfServiceController::class, 'index'])->name('terms-of-service.index');
            Route::post('terms-of-service', [TermsOfServiceController::class, 'update'])->name('terms-of-service.update');
        });

        // Profile
        Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('profile/logout', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});






// ================================================= (Testing Route  ) ===================================\\

Route::get('testing/seed-hotels', [TestingController::class, 'index']);







// ======================================== ( Web Api Route )=======================

// google place details
Route::get('/web-api/google-place-details', function (Request $request) {



    if (!$request->query('place_id') || !auth('admin')->check())
        return abort(404);

    $fields = 'name,formatted_address,rating,user_ratings_total';

    $url = 'https://maps.googleapis.com/maps/api/place/details/json?key=' . env('GOOGLE_API_KEY') . '&fields=' . $fields .  '&place_id=' . $request->query('place_id');
    $response = Http::get($url);
    $response = $response->json();

    if (!isset($response['result']))
        return abort(404);


    return response()->json($response);
});





Route::get('/asdfzxcv', function (Request $request) {
    ParentHotel::get()->each->syncRatings();
    dd('done');
});


// Route::get('/test', function (Request $request) {



//     $parentHotels = ParentHotel::whereDate('sync_date', '<=', now()->subDays(30)->toDateString())->get();


//     foreach ($parentHotels as $parentHotel) {

//         $fields = 'name,formatted_address,rating,user_ratings_total,address_components';

//         $url = 'https://maps.googleapis.com/maps/api/place/details/json?key=' . env('GOOGLE_API_KEY') . '&fields=' . $fields . '&place_id=' . $parentHotel->google_place_id;
//         $response = Http::get($url);
//         $response = $response->json();

//         if ($response['status'] === 'OK') {
//             $place = $response['result'];
//             $locality = '';
//             $country = '';



//             foreach ($place['address_components'] as $component) {
//                 if (in_array('locality', $component['types'])) {
//                     $locality = $component['long_name'];
//                     break; // Exit the loop once locality is found
//                 } elseif (in_array('administrative_area_level_1', $component['types'])) {
//                     $locality = $component['long_name'];
//                 } elseif (in_array('country', $component['types'])) {
//                     $country = $component['long_name'];
//                     break; // Exit the loop once country is found
//                 } elseif (in_array('political', $component['types'])) {
//                     $country = $component['long_name'];
//                 }
//             }
//             // foreach ($place['address_components'] as $component) {
//             //     if (in_array('locality', $component['types'])) {
//             //         $locality = $component['long_name'];
//             //     } elseif (!$locality && in_array('administrative_area_level_1', $component['types'])) {
//             //         $locality = $component['long_name'];
//             //     }

//             //     if (in_array('country', $component['types'])) {
//             //         $country = $component['long_name'];
//             //     } elseif (!$country &&  in_array('political', $component['types'])) {
//             //         $country = $component['long_name'];
//             //     }
//             //['']
//             $parentHotel->update([
//                 'title' => $response['result']['name'],
//                 'address' => $response['result']['formatted_address'],
//                 'city_country' => $locality . ' ' . $country,
//                 'google_rating' => $response['result']['rating'],
//                 'google_total_reviews' => $response['result']['user_ratings_total'],
//                 'sync_date'     => now()
//             ]);
//         }
//     }







//     // dd(ParentHotel::whereDate('sync_date', '<=', now()->subDays(30)->toDateString())->get());
//     // return response()->json($response);
// });