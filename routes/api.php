<?php

use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:admin-api')->get('/user', function (Request $request) {
    return $request->user();
});


// Hotel Location suggestion
Route::get('/hotel-location-suggestion', function (Request $request) {
    return response()->json($request->query('q') ?  \App\Models\ParentHotel::where('address', 'LIKE', '%' . $request->query('q') . '%')->select('id', 'address')->get() : []);
});
Route::get('/tag-keywords', function (Request $request) {
    return response()->json(\App\Models\HotelTag::where('title', 'LIKE', '%' . $request->query('q') . '%')->select('title')->pluck('title'));
});



Route::prefix('user')->controller(UserController::class)->group(function () {
    Route::post('get-auth-token', 'login');
    Route::post('register', 'register');

    Route::middleware('auth:admin-api')->group(function () {
        Route::post('revoke-auth-token', 'revokeAllTokens');
    });
});



Route::prefix('hotels')->controller(HotelController::class)->group(function () {
    Route::get('{hotelId}', 'show');
});
