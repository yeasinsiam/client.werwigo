<?php

namespace App\Http\Livewire\Components\Hotel;

use App\Models\CustomerFavoriteHotel;
use App\Models\Hotel;
use App\Services\FavoriteHotelSessionService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class FavoriteHotelIcon extends Component
{
    public string $wrapperClass = '';
    public string $iconClass = '';
    public string $activeIconClass = '';

    public bool $isFavorite = false;
    public Hotel $hotel;

    protected $listeners = [
        'toggle-Favorite' => 'handleToggleFavorite',
    ];


    public function mount(Collection  $customerFavoriteHotels)
    {
        $this->isFavorite = $customerFavoriteHotels->firstWhere('hotel_id', $this->hotel->id) ? true : false;
    }

    public function handleToggleFavorite()
    {

        if (!$this->isFavorite) {
            CustomerFavoriteHotel::create([
                'hotel_id' =>  $this->hotel->id,
                'customer_user_id' => auth('admin')->user()->id
            ]);
        } else {
            $favorite = CustomerFavoriteHotel::where('hotel_id', $this->hotel->id)
                ->where('customer_user_id', auth('admin')->user()?->id)->first();

            if ($favorite)
                $favorite->delete();
        }

        $this->isFavorite = !$this->isFavorite;
    }

    public function render()
    {
        return view('livewire.components.hotel.favorite-hotel-icon');
    }
}



// <?php

// namespace App\Http\Livewire\Components\Hotel;

// use App\Models\Hotel;
// use App\Services\FavoriteHotelSessionService;
// use Livewire\Component;

// class FavoriteHotelIcon extends Component
// {
//     public string $wrapperClass = '';
//     public string $iconClass = '';
//     public string $activeIconClass = '';

//     public bool $isFavorite = false;
//     public Hotel $hotel;

//     protected $listeners = [
//         'toggle-Favorite' => 'handleToggleFavorite',
//     ];


//     public function mount(FavoriteHotelSessionService $favoriteHotelSessionService)
//     {
//         $this->isFavorite = $favoriteHotelSessionService->isFavorite($this->hotel);
//     }

//     public function handleToggleFavorite(FavoriteHotelSessionService $favoriteHotelSessionService)
//     {

//         if (!$this->isFavorite) {
//             $favoriteHotelSessionService->add($this->hotel);
//         } else {
//             $favoriteHotelSessionService->remove($this->hotel);
//         }

//         $this->isFavorite = !$this->isFavorite;
//     }

//     public function render()
//     {
//         return view('livewire.components.hotel.favorite-hotel-icon');
//     }
// }