<?php

namespace App\Http\Controllers\Testing;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        for ($i = 0; $i < 6; $i++) {
            $hotel  = Hotel::create([
                'title' => 'After Hours Residence Hotel',
                'address' => "Road 18 Block A House 12 Banani, Dhaka",
                'excerpt' => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit necessitatibus deleniti commodi nam voluptatum, illo maiores animi ratione eum quasi libero. Nemo corporis, dolorem itaque recusandae suscipit a adipisci laboriosam inventore cumque sapiente eveniet..",

                'description' =>  "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit necessitatibus deleniti commodi nam voluptatum, illo maiores animi ratione eum quasi libero. Nemo corporis, dolorem itaque recusandae suscipit a adipisci laboriosam inventore cumque sapiente eveniet, hic minima facere harum assumenda veritatis iste, ullam reprehenderit optio tempora aut obcaecati illum! Quisquam inventore quia cumque nemo labore molestias perspiciatis laudantium molestiae quidem dolore similique debitis, delectus saepe aliquam reprehenderit ullam omnis beatae aspernatur eius? Optio fuga, assumenda molestias, sapiente totam eum eius atque perspiciatis harum quam, rem sed natus quisquam! Dolorem quibusdam officia nostrum, nobis ullam fugiat ab voluptas beatae voluptatem dolorum! Itaque.",

                'google_map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233667.4993062149!2d90.2548756396412!3d23.781067236782466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1693039283534!5m2!1sen!2sbd',




                'booking_type' => 'direct',
                'direct_booking_link' => 'https://www.facebook.com/',


            ]);

            $hotel->categories()->attach([1]);
            $hotel->tags()->attach([1, 3]);
            $hotel->services()->attach([1, 2, 3]);
            $hotel->ratings()->createMany([
                [
                    'type' => 'luxury',
                    'rate' => 5
                ],
                [
                    'type' => 'intimate',
                    'rate' => 3.2
                ],
                [
                    'type' => 'romantic',
                    'rate' => 4.5
                ],
            ]);

            // thumbnail
            $hotel->addMedia(public_path('/demo/hotel-' . fake()->numberBetween(1, 5) . '.jpg'))
                ->preservingOriginal()
                ->toMediaCollection('thumbnail');

            // gallery
            $hotel->addMedia(public_path('/demo/hotel-2.jpg'))
                ->preservingOriginal()
                ->toMediaCollection('gallery');
            $hotel->addMedia(public_path('/demo/hotel-3.jpg'))
                ->preservingOriginal()
                ->toMediaCollection('gallery');
            // $hotel->addMedia(public_path('/demo/hotel-4.jpg'))
            //     ->preservingOriginal()
            //     ->toMediaCollection('gallery');
            // $hotel->addMedia(public_path('/demo/hotel-5.jpg'))
            //     ->preservingOriginal()
            //     ->toMediaCollection('gallery');
        }


        return 'done';
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
