<?php

namespace App\Services;

use App\Models\Hotel;
use Illuminate\Support\Facades\Session;

class FavoriteHotelSessionService
{


    protected string $sessionId = 'favorite-hotel';



    public function get()
    {
        return Session::get($this->sessionId, []);
    }

    public function add(Hotel $hotel)
    {
        $favorite = Session::get($this->sessionId, []);

        if (!in_array($hotel->id, $favorite)) {
            $favorite[] = $hotel->id;
            Session::put($this->sessionId, $favorite);
        }
    }

    public function isFavorite(Hotel $hotel)
    {
        $favorite = Session::get($this->sessionId, []);

        if (in_array($hotel->id, $favorite)) {
            return true;
        }
        return false;
    }

    public function remove(Hotel $hotel)
    {
        $favorite = Session::get($this->sessionId, []);

        $index = array_search($hotel->id, $favorite);
        if ($index !== false) {
            unset($favorite[$index]);
            Session::put($this->sessionId, $favorite);
        }
    }
}
