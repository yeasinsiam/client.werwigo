<?php

namespace App\Http\Livewire\Sections\Hotels\Partials\HotelListing;

use App\Models\Hotel;
use App\Services\RecentHotelSearchSessionService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{

    public array $hotelIds = [];

    public int $romanticScoringFrom = 1;
    public int $romanticScoringTo = 5;

    public int $intimateScoringFrom = 1;
    public int $intimateScoringTo = 5;

    public int $luxuriousScoringFrom = 1;
    public int $luxuriousScoringTo = 5;

    public array $booking_type = [];
    public array $categories = [];
    public array $tags = [];
    public array $amenities = [];

    // public string $category = '';

    public string $query = '';


    public $hotel = '';
    public $recentSearch = false;



    protected $queryString = [
        'romanticScoringFrom'   => ['except' => 1, 'as' => 'romantic-scoring-from'],
        'romanticScoringTo'     => ['except' => 5, 'as' => 'romantic-scoring-to'],

        'intimateScoringFrom'   => ['except' => 1, 'as' => 'intimate-scoring-from'],
        'intimateScoringTo'     => ['except' => 5, 'as' => 'intimate-scoring-to'],

        'luxuriousScoringFrom'     => ['except' => 1, 'as' => 'luxurious-scoring-from'],
        'luxuriousScoringTo'       => ['except' => 5, 'as' => 'luxurious-scoring-to'],

        'booking_type'             => ['except' => [], 'as' => 'booking-type'],
        'categories'             => ['except' => []],
        'tags'                  => ['except' => []],
        'amenities'             => ['except' => []],


        // 'category'             => ['except' => ''],

        'query'             => ['except' => ''],


        'hotel'             => ['except' => ''],
        'recentSearch'      => ['except' => false, 'as' => 'recent-search'],


    ];


    protected $listeners = [
        // 'filter-hotel-scoring' => 'handleChangeScoring',
        // 'filter-hotel-more' => 'handleChangeMore',
        'filter-query' => 'handleChangeQuery',

        'filter-hotels' => "handleFilterHotels", //new

        'reset-all-filters' => 'handleResetAllFilters',


        'store-hotel-to-recent-search' => 'handleStoreHotelToRecentSearch'
    ];

    public function handleFilterHotels(array $data)
    {


        $this->romanticScoringFrom =  $data["romantic-scoring-from"];
        $this->romanticScoringTo = $data["romantic-scoring-to"];

        $this->intimateScoringFrom =  $data["intimate-scoring-from"];
        $this->intimateScoringTo = $data["intimate-scoring-to"];

        $this->luxuriousScoringFrom =  $data["luxurious-scoring-from"];
        $this->luxuriousScoringTo = $data["luxurious-scoring-to"];


        // dd($data['booking-type']);

        $this->booking_type = $data['booking-type'];
        $this->categories   = $data['categories'];
        $this->tags         = $data['tags'];
        $this->amenities    = $data['amenities'];


        $this->reset('hotel', 'recentSearch');



        if ($this->isFiltered()) {
            $this->emit('hotel-listing-filtered');
        } else {
            $this->emit('hotel-listing-not-filtered');
        }
    }


    public function handleResetAllFilters()
    {
        // $this->resetExcept('category');
        // $this->dispatchBrowserEvent('hotel-listing-filter-reseted');
        $this->reset();
        $this->emit('hotel-listing-not-filtered');
    }



    // public function handleChangeScoring(array $data)
    // {
    //     switch ($data['for']) {
    //         case 'romantic':
    //             $this->romanticScoringFrom = $data['from'];
    //             $this->romanticScoringTo = $data['to'];
    //             break;
    //         case 'intimate':
    //             $this->intimateScoringFrom = $data['from'];
    //             $this->intimateScoringTo = $data['to'];
    //             break;
    //         case 'luxurious':
    //             $this->luxuriousScoringFrom = $data['from'];
    //             $this->luxuriousScoringTo = $data['to'];
    //             break;
    //     }

    //     $this->reset('hotel');
    // }

    // public function handleChangeMore(array $data)
    // {



    //     $this->booking_type = $data['booking_type'];
    //     $this->categories   = $data['categories'];
    //     $this->tags         = $data['tags'];
    //     $this->amenities    = $data['amenities'];


    //     $this->reset('hotel');
    // }

    public function handleChangeQuery(string $data)
    {
        $this->query  = $data;

        $this->reset('hotel');
        if ($this->isFiltered()) {
            $this->emit('hotel-listing-filtered');
        } else {
            $this->emit('hotel-listing-not-filtered');
        }
    }



    public function handleStoreHotelToRecentSearch(Hotel $hotel, RecentHotelSearchSessionService $recentHotelSearchSessionService)
    {
        $recentHotelSearchSessionService->add($hotel);
    }


    // public function triggerIsFilterEvents()
    // {

    //     // Dispatch event if filter event triggers..
    //     if ($this->isFiltered()) {
    //         $this->emitUp('hotel-listing-filtered');
    //     } else {
    //         $this->emitUp('hotel-listing-not-filtered');
    //     }
    // }





    public function render(RecentHotelSearchSessionService $recentHotelSearchSessionService)
    {


        $componentId = $this->id;
        $isFiltered = $this->isFiltered();
        $hotels = collect([]);





        // if (!$isFiltered) {
        //     return view('livewire.sections.hotels.partials.hotel-listing.index', compact('hotels', 'componentId', 'isFiltered'));
        // }





        if ($this->hotel) {
            $hotels = Hotel::with('categories', 'tags', 'services', 'ratings', 'media')
                ->select('*')
                ->orderByRaw("CASE WHEN slug = ? THEN 0 ELSE 1 END", [$this->hotel])
                ->take(5)->get();
        } elseif ($this->recentSearch && !empty($recentHotelSearchSessionService->get())) {


            $hotels = Hotel::with('categories', 'tags', 'services', 'ratings', 'media')
                ->whereIn('id', $recentHotelSearchSessionService->get())
                ->orderBy(DB::raw("FIELD(id, " . implode(',',  array_reverse($recentHotelSearchSessionService->get())) . ")"))
                ->get();
        } else {

            $hotels = Hotel::with('categories', 'tags', 'services', 'ratings', 'media')

                ->when(!empty($this->query), function (Builder $query) {
                    $query->where('address', 'LIKE', '%' . $this->query . '%');
                })

                ->when($this->romanticScoringFrom != 1 || $this->romanticScoringTo != 5, function (Builder $query) {
                    $query->whereHas('ratings', function (Builder $query) {
                        $query->where('type', 'romantic')->whereBetween('rate', [$this->romanticScoringFrom, $this->romanticScoringTo]);
                    });
                })
                ->when($this->romanticScoringFrom != 1 || $this->romanticScoringTo != 5, function (Builder $query) {
                    $query->whereHas('ratings', function (Builder $query) {
                        $query->where('type', 'romantic')->whereBetween('rate', [$this->romanticScoringFrom, $this->romanticScoringTo]);
                    });
                })
                ->when($this->intimateScoringFrom != 1 || $this->intimateScoringTo != 5, function (Builder $query) {
                    $query->whereHas('ratings', function (Builder $query) {
                        $query->where('type', 'intimate')->whereBetween('rate', [$this->intimateScoringFrom, $this->intimateScoringTo]);
                    });
                })
                ->when($this->luxuriousScoringFrom != 1 || $this->luxuriousScoringTo != 5, function (Builder $query) {
                    $query->whereHas('ratings', function (Builder $query) {
                        $query->where('type', 'luxury')->whereBetween('rate', [$this->luxuriousScoringFrom, $this->luxuriousScoringTo]);
                    });
                })
                ->when(!empty($this->booking_type) && !in_array('all', $this->booking_type), function (Builder $query) {


                    $query->where('booking_type', $this->booking_type);
                })
                ->when(!empty($this->categories) && !in_array('all', $this->categories), function (Builder $query) {
                    $query->whereHas('categories', function (Builder $query) {
                        $query->whereIn('slug', $this->categories);
                    });
                })
                ->when(!empty($this->tags) && !in_array('all', $this->tags), function (Builder $query) {
                    $query->whereHas('tags', function (Builder $query) {
                        $query->whereIn('slug', $this->tags);
                    });
                })
                ->when(!empty($this->amenities) && !in_array('all', $this->amenities), function (Builder $query) {
                    $query->whereHas('services', function (Builder $query) {
                        $query->whereIn('slug', $this->amenities);
                    });
                })

                ->get();
        }


        $this->hotelIds = $hotels->pluck('id')->toArray();







        // Dispatch event if filter event triggers..
        // $this->triggerIsFilterEvents();


        // Store to recent search
        // if ($this->isFiltered()) {
        //     $recentHotelSearchSessionService->set($hotels->pluck('id'), [
        //         'romantic-scoring-from' => $this->romanticScoringFrom,
        //         'romantic-scoring-to' => $this->romanticScoringTo,
        //         'intimate-scoring-from' => $this->intimateScoringFrom,
        //         'intimate-scoring-to' => $this->intimateScoringTo,
        //         'luxury-scoring-from' => $this->luxuriousScoringFrom,
        //         'luxury-scoring-to' => $this->luxuriousScoringTo,
        //         'booking_type' => $this->booking_type,
        //         'categories' => $this->categories,
        //         'tags' => $this->tags,
        //         'query' => $this->query,
        //     ]);
        // }



        return view('livewire.sections.hotels.partials.hotel-listing.index', compact('hotels', 'componentId', 'isFiltered'));
    }


    public function isFiltered()
    {


        return  $this->romanticScoringFrom != 1 || $this->romanticScoringTo != 5 ||
            $this->intimateScoringFrom != 1 || $this->intimateScoringTo != 5 ||
            $this->luxuriousScoringFrom != 1 || $this->luxuriousScoringTo != 5 ||
            !empty($this->booking_type) ||  !empty($this->categories) || !empty($this->tags) || !empty($this->amenities)
            || $this->query;
    }
}
