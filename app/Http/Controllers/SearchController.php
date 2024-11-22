<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Services\FavoriteHotelSessionService;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // try {
        //     $queryCheckIn = Carbon::createFromFormat('D, d/m/y', $request->query('check-in'));
        //     $queryCheckOut = Carbon::createFromFormat('D, d/m/y', $request->query('check-out'));

        //     if ($queryCheckIn->greaterThan($queryCheckOut)) {
        //         throw error('Check is should not be greater than checkout');
        //     }
        // } catch (\Throwable $th) {
        //     $queryCheckIn = now();
        //     $queryCheckOut = now()->addDay();
        // }


        // $hotels = Hotel::with('categories', 'tags', 'services', 'ratings', 'media')->get();

        return view('pages.search.index');
        // return view('pages.search.index', compact('hotels'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
