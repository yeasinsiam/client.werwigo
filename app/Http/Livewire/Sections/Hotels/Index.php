<?php

namespace App\Http\Livewire\Sections\Hotels;

use Illuminate\Http\Request;
use Livewire\Component;

class Index extends Component
{



    public  bool $isHotelListingFiltered = false;





    protected $listeners = [
        'hotel-listing-filtered' => 'handleHotelListingFiltered',
        'hotel-listing-not-filtered' => 'handleNoHotelListingFiltered',
    ];

    // event handlers
    public function  handleHotelListingFiltered()
    {

        $this->isHotelListingFiltered = true;
    }


    public function  handleNoHotelListingFiltered()
    {

        $this->isHotelListingFiltered = false;
    }





    public function mount()
    {
        $this->isHotelListingFiltered =  $this->checkHotelListingFiltered();
    }



    public function render()
    {
        return view('livewire.sections.hotels.index');
    }

    protected function checkHotelListingFiltered()
    {

        return (request()->query('romantic-scoring-from') != null &&
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
    }
}
