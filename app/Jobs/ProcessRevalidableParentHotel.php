<?php

namespace App\Jobs;

use App\Models\ParentHotel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;


class ProcessRevalidableParentHotel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public ParentHotel $parentHotel
    ) {
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {


        $parentHotel = $this->parentHotel;

        // info($parentHotel->title);

        $fields = 'name,formatted_address,rating,user_ratings_total,address_components';

        $url = 'https://maps.googleapis.com/maps/api/place/details/json?key=' . env('GOOGLE_API_KEY') . '&fields=' . $fields . '&place_id=' . $parentHotel->google_place_id;
        $response = Http::get($url);
        $response = $response->json();

        if ($response['status'] === 'OK') {
            $place = $response['result'];
            $locality = '';
            $country = '';



            foreach ($place['address_components'] as $component) {
                if (in_array('locality', $component['types'])) {
                    $locality = $component['long_name'];
                    break; // Exit the loop once locality is found
                } elseif (in_array('administrative_area_level_1', $component['types'])) {
                    $locality = $component['long_name'];
                } elseif (in_array('country', $component['types'])) {
                    $country = $component['long_name'];
                    break; // Exit the loop once country is found
                } elseif (in_array('political', $component['types'])) {
                    $country = $component['long_name'];
                }
            }
            // foreach ($place['address_components'] as $component) {
            //     if (in_array('locality', $component['types'])) {
            //         $locality = $component['long_name'];
            //     } elseif (!$locality && in_array('administrative_area_level_1', $component['types'])) {
            //         $locality = $component['long_name'];
            //     }

            //     if (in_array('country', $component['types'])) {
            //         $country = $component['long_name'];
            //     } elseif (!$country &&  in_array('political', $component['types'])) {
            //         $country = $component['long_name'];
            //     }
            //['']
            $parentHotel->update([
                'title' => $response['result']['name'],
                'address' => $response['result']['formatted_address'],
                'city_country' => $locality . ' ' . $country,
                'google_rating' => $response['result']['rating'],
                'google_total_reviews' => $response['result']['user_ratings_total'],
                'sync_date'     => now()
            ]);
        }
    }
}
