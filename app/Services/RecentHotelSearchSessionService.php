<?php

namespace App\Services;

use App\Models\Hotel;
use Illuminate\Support\Facades\Session;

class RecentHotelSearchSessionService
{


    protected string $sessionId = 'recent-hotel-search';



    public function get()
    {

        return  Session::get($this->sessionId, []);

        // return [
        //     'hotelIds' =>  Session::get($this->sessionId, []),
        //     'query' =>  Session::get($this->sessionId . '-query', [])
        // ];
    }
    // public function add($args, $query)
    public function add(Hotel $hotel)
    {


        $ids = $this->get();

        if (!in_array($hotel->id, $ids)) {
            $ids[] = $hotel->id;

            if (count($ids) > 5) {
                $ids = array_slice($ids, -5, 5);
            }
            Session::put($this->sessionId, $ids);
        }


        // Session::put($this->sessionId, $args);
        // Session::put($this->sessionId . '-query', $query);
    }
}
