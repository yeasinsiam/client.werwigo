<?php

namespace App\Http\Livewire\Pages\Home;

use App\Models\Hotel;
use App\Services\RecentHotelSearchSessionService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class HotelListingSeciton extends Component
{

    public Collection $favoriteHotels;
    public bool $isFavoritePage = false;
    public int $perPage = 20;

    // public bool $isFiltered = false;

    // ============== ( Query )
    public int $romanticScoringFrom    = 1;
    public int $romanticScoringTo      = 10;

    public int $intimateScoringFrom    = 1;
    public int $intimateScoringTo      = 10;

    public int $luxuriousScoringFrom   = 1;
    public int $luxuriousScoringTo     = 10;

    public int $ratingFrom     = 1;
    public int $ratingTo     = 10;


    // public array $booking_type      = [];
    public string $category            = '';
    public array $tags                 = [];
    public array $amenities            = [];

    public string $query               = '';
    public string $googleRating        = '';
    public bool $bestGoogleRaring      = false;
    public string $checkIn             = '';
    public string $checkOut            =  '';
    public int $adults                 = 2;
    public int $rooms                  = 1;

    public string $activeSort          = '';
    public $recentSearch               = false;
    // ============== ( End Query )
    public Collection $hotelCategories;





    protected $queryString = [
        'romanticScoringFrom'   => ['except' => 1, 'as' => 'romantic-scoring-from'],
        'romanticScoringTo'     => ['except' => 10, 'as' => 'romantic-scoring-to'],

        'intimateScoringFrom'   => ['except' => 1, 'as' => 'intimate-scoring-from'],
        'intimateScoringTo'     => ['except' => 10, 'as' => 'intimate-scoring-to'],

        'luxuriousScoringFrom'     => ['except' => 1, 'as' => 'luxurious-scoring-from'],
        'luxuriousScoringTo'       => ['except' => 10, 'as' => 'luxurious-scoring-to'],
        'luxuriousScoringTo'       => ['except' => 10, 'as' => 'luxurious-scoring-to'],

        'ratingFrom'       => ['except' => 1, 'as' => 'rating-from'],
        'ratingTo'       => ['except' => 10, 'as' => 'rating-to'],

        // 'booking_type'             => ['except' => [], 'as' => 'booking-type'],
        'category'              => ['except' => ''],
        'tags'                  => ['except' => []],
        'amenities'             => ['except' => []],


        'query'             => ['except' => ''],
        'googleRating'      => ['except' => '', 'as' => 'google-rating'],
        'bestGoogleRaring'  => ['except' => false, 'as' => 'best-google-rating'],
        'checkIn'           => ['except' => '', 'as' => 'check-in'],
        'checkOut'          => ['except' => '', 'as' => 'check-out'],
        'adults'            => ['except' => null],
        'rooms'             => ['except' => null],

        'activeSort'            => ['except' => '', 'as' => 'active-sort'],
        'recentSearch'          => ['except' => false, 'as' => 'recent-search'],
    ];



    // ============================ ( Events ) ======================\\

    protected $listeners = [
        // 'filter-query' => 'handleChangeQuery',
        'filter-hotels' => "handleFilterHotels", //new
        'filter-hotel-listing-sort' => "handleFilterHotelListingSort", //new
        'filter-hotel-listing-best-google-review' => "handleFilterHotelListingBestGoogleReview", //new
        'filter-hotel-listing-category' => "handleFilterHotelListingCategory", //new
        'reset-all-filters' => 'handleResetAllFilters',
        'load-more-hotels' => 'handleLoadMoreHotels',

        // 'store-hotel-to-recent-search' => 'handleStoreHotelToRecentSearch'
    ];



    public function handleFilterHotels(array $data)
    {


        $this->romanticScoringFrom =  $data["romantic-scoring-from"];
        $this->romanticScoringTo = $data["romantic-scoring-to"];

        $this->intimateScoringFrom =  $data["intimate-scoring-from"];
        $this->intimateScoringTo = $data["intimate-scoring-to"];

        $this->luxuriousScoringFrom =  $data["luxurious-scoring-from"];
        $this->luxuriousScoringTo = $data["luxurious-scoring-to"];



        // $this->booking_type = $data['booking-type'];
        // $this->category   = $data['category'];
        $this->tags         = $data['tags'];
        $this->amenities    = $data['amenities'];

        $this->query        = $data['query'];
        $this->googleRating = $data['googleRating'];
        $this->checkIn      = $data['checkIn'];
        $this->checkOut     = $data['checkOut'];
        $this->adults     = $data['adults'];
        $this->rooms     = $data['rooms'];




        $this->reset('recentSearch');


        $this->triggerServerIsFilteredEvents();
    }


    public function handleFilterHotelListingCategory(string $categorySlug)
    {

        $this->category = $categorySlug;
        $this->bestGoogleRaring = false;
        $this->activeSort = '';

        $this->triggerServerIsFilteredEvents();
    }

    public function handleFilterHotelListingBestGoogleReview()
    {
        $this->category = '';
        $this->bestGoogleRaring = !$this->bestGoogleRaring;
        $this->activeSort = '';

        $this->triggerServerIsFilteredEvents();
    }
    public function handleFilterHotelListingSort(string $sort)
    {

        $this->activeSort = $sort;
        $this->bestGoogleRaring = false;
        $this->category = '';
        $this->triggerServerIsFilteredEvents();
    }

    public function handleResetAllFilters()
    {

        $this->resetExcept(
            'favoriteHotels',
            'hotelCategories',
            'isFavoritePage',
            'perPage',
            'checkIn',
            'checkOut',
            // 'activeSort'
            // 'adults',
            // 'rooms',
        );
        $this->checkIn = now()->format('m/d/Y');
        $this->checkOut = now()->addDay()->format('m/d/Y');


        $this->triggerServerIsFilteredEvents();
    }

    protected function triggerServerIsFilteredEvents()
    {
        if ($this->getIsFiltered()) {
            $this->emit('hotel-listing-filtered');
            // $this->isFiltered = true;
        } else {
            $this->emit('hotel-listing-not-filtered');
            // $this->isFiltered = false;
        }
    }


    public function handleLoadMoreHotels()
    {
        $this->perPage  += 20;
    }



    public function changeRating($val)
    {
        switch ($val) {
            case '1':
                $this->ratingFrom = 1;
                $this->ratingTo = 3;
                $this->dispatchBrowserEventToSetActiveFilter(true, null, null);
                break;
            case '3':
                $this->ratingFrom = 3;
                $this->ratingTo = 6;
                $this->dispatchBrowserEventToSetActiveFilter(true, null, null);
                break;
            case '6':
                $this->ratingFrom = 6;
                $this->ratingTo = 9;
                $this->dispatchBrowserEventToSetActiveFilter(true, null, null);
                break;
            case '10':
                $this->ratingFrom = 10;
                $this->ratingTo = 10;
                $this->dispatchBrowserEventToSetActiveFilter(true, null, null);
                break;

            default:
                $this->ratingFrom = 1;
                $this->ratingTo = 10;
                $this->dispatchBrowserEventToSetActiveFilter(false, null, null);

                break;
        }
    }
    // ============================ ( Lifecycle ) ======================\\
    public function mount()
    {
        $this->checkIn = now()->format('m/d/Y');
        $this->checkOut = now()->addDay()->format('m/d/Y');
    }

    public function updated($name, $value)
    {
        if ($name == 'googleRating') {
            if ($value) {
                $this->dispatchBrowserEventToSetActiveFilter(null, true, null);
            } else {
                $this->dispatchBrowserEventToSetActiveFilter(null, false, null);
            }
        }
        if (($name == 'activeSort')) {
            if ($value &&  $value != 'from-recent') {
                $this->dispatchBrowserEventToSetActiveFilter(null, null, true);
            } else {
                $this->dispatchBrowserEventToSetActiveFilter(null, null, false);
            }
        }
    }




    // ============================ ( Render ) ======================\\


    public function render(RecentHotelSearchSessionService $recentHotelSearchSessionService)
    {

        // if (!$this->isFiltered)
        //     return <<<'blade'
        //     <section class="max-w-5xl px-6 mx-auto mt-7 lg:px-0" id="hotel-listing-section" wire:id="{{ $this->id }}">
        //     </section>
        // blade;



        // if ($this->recentSearch && !empty($recentHotelSearchSessionService->get())) {


        //     $hotels = Hotel::with('categories', 'tags', 'services', 'ratings', 'media')
        //         ->whereIn('id', $recentHotelSearchSessionService->get())
        //         ->orderBy(DB::raw("FIELD(id, " . implode(',',  array_reverse($recentHotelSearchSessionService->get())) . ")"))
        //         ->get();
        // } else {
        $hotels = Hotel::with(['categories', 'tags', 'services', 'media', 'parentHotel' => function ($query) {
            $query->with('ratings');
            $query->withAvg([
                'ratings as romantic_avg' => function ($query) {
                    $query->where('type', 'romantic');
                },
                'ratings as intimate_avg' => function ($query) {
                    $query->where('type', 'intimate');
                },
                'ratings as luxury_avg' => function ($query) {
                    $query->where('type', 'luxury');
                },
                'ratings as average_rating'
            ], 'rate');

            $query->withCount('ratings');
        }])

            ->when(!empty($this->query), function (Builder $query) {
                $query->whereHas('parentHotel', function (Builder $query) {
                    $query->where('address', 'LIKE', '%' . $this->query . '%');
                });
            })
            ->when($this->googleRating, function (Builder $query) {
                $query->whereHas('parentHotel', function (Builder $query) {
                    $query->whereBetween('google_rating', [intval($this->googleRating), intval($this->googleRating) + .9]);
                    // $query->whereBetween('google_rating', [1, intval($this->googleRating) + .9]);
                });
            })


            //Not working code invalid code
            // ->when($this->ratingFrom != 1 || $this->ratingFrom != 10, function (Builder $query) {
            //     $query->whereHas('parentHotel', function (Builder $query) {
            //         // $query->havingBetween('average_rating', [$this->ratingFrom, $this->ratingFrom]);
            //         $query->having('average_rating', '>=', 3);
            //         $query->having('average_rating', '<=', 7);
            //     });
            // })
            ->when($this->romanticScoringFrom != 1 || $this->romanticScoringTo != 10, function (Builder $query) {
                $query->whereHas('parentHotel.ratings', function (Builder $query) {
                    $query->where('type', 'romantic')->whereBetween('rate', [$this->romanticScoringFrom, $this->romanticScoringTo]);
                });
            })
            ->when($this->intimateScoringFrom != 1 || $this->intimateScoringTo != 10, function (Builder $query) {
                $query->whereHas('parentHotel.ratings', function (Builder $query) {
                    $query->where('type', 'intimate')->whereBetween('rate', [$this->intimateScoringFrom, $this->intimateScoringTo]);
                });
            })
            ->when($this->luxuriousScoringFrom != 1 || $this->luxuriousScoringTo != 10, function (Builder $query) {
                $query->whereHas('parentHotel.ratings', function (Builder $query) {
                    $query->where('type', 'luxury')->whereBetween('rate', [$this->luxuriousScoringFrom, $this->luxuriousScoringTo]);
                });
            })
            ->when($this->category, function (Builder $query) {
                $query->whereHas('categories', function (Builder $query) {
                    $query->where('slug', $this->category);
                });
            })
            ->when(!empty($this->tags) && !in_array('all', $this->tags), function (Builder $query) {
                foreach ($this->tags as  $tag) {
                    $query->whereHas('tags', function (Builder $query) use ($tag) {
                        $query->where('slug', $tag);
                    });
                }
            })
            ->when(!empty($this->amenities) && !in_array('all', $this->amenities), function (Builder $query) {
                foreach ($this->amenities as  $amenity) {
                    $query->whereHas('services', function (Builder $query) use ($amenity) {
                        $query->where('slug', $amenity);
                    });
                }
            })
            // Sorting filter
            ->when(!$this->activeSort, function ($query) {
                $query->latest();
            })
            ->when($this->activeSort == 'from-recent', function ($query) {
                $query->latest();
            })
            ->when($this->activeSort == 'more-clicked', function ($query) {
                $query->orderByDesc('hotels.view_count');
            })

            ->when($this->isFavoritePage, function (Builder $query) {
                $query->whereHas('customerFavorites', function (Builder $query) {
                    $query->where('customer_user_id', auth('admin')->user()->id);
                });
            })
            ->paginate($this->perPage);
        // }

        // dd($hotels);


        $isFiltered = $this->getIsFiltered();

        $isFavoritePage = request()->routeIs('favorites');



        return view('livewire.pages.home.hotel-listing-seciton', compact('hotels', 'isFiltered', 'isFavoritePage'));
    }

    // ============================ ( Others ) ======================\\

    protected function getIsFiltered()
    {
        return  $this->romanticScoringFrom != 1 || $this->romanticScoringTo != 10 ||
            $this->intimateScoringFrom != 1 || $this->intimateScoringTo != 10 ||
            $this->luxuriousScoringFrom != 1 || $this->luxuriousScoringTo != 10 ||
            // !empty($this->booking_type)
            !empty($this->category) || !empty($this->tags) || !empty($this->amenities)
            || $this->query || $this->googleRating   || $this->ratingFrom != 1 || $this->ratingTo != 10 || ($this->activeSort && $this->activeSort != 'from-recent');
    }

    public function dispatchBrowserEventToSetActiveFilter($isRatingFromToActive = null, $isGStarActive = null, $activeSort = null)
    {
        $this->dispatchBrowserEvent('sync-set-active', [
            'isRatingFromToActive' => $isRatingFromToActive,
            'isGStarActive' => $isGStarActive,
            'activeSort' => $activeSort
        ]);
    }
}

// <?php

// namespace App\Http\Livewire\Pages\Home;

// use App\Models\Hotel;
// use App\Services\RecentHotelSearchSessionService;
// use Carbon\Carbon;
// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\Collection;
// use Illuminate\Http\Response;
// use Illuminate\Support\Facades\DB;
// use Livewire\Component;

// class HotelListingSeciton extends Component
// {

//     public Collection $favoriteHotels;
//     public bool $isFavoritePage = false;
//     public int $perPage = 20;

//     // public bool $isFiltered = false;

//     // ============== ( Query )
//     public int $romanticScoringFrom    = 1;
//     public int $romanticScoringTo      = 10;

//     public int $intimateScoringFrom    = 1;
//     public int $intimateScoringTo      = 10;

//     public int $luxuriousScoringFrom   = 1;
//     public int $luxuriousScoringTo     = 10;

//     // public array $booking_type      = [];
//     public string $category            = '';
//     public array $tags                 = [];
//     public array $amenities            = [];

//     public string $query               = '';
//     public string $googleRating        = '';
//     public string $checkIn             = '';
//     public string $checkOut            =  '';
//     public int $adults                 = 2;
//     public int $rooms                  = 1;

//     public string $activeSort          = '';
//     public $recentSearch               = false;
//     // ============== ( End Query )
//     public Collection $hotelCategories;





//     protected $queryString = [
//         'romanticScoringFrom'   => ['except' => 1, 'as' => 'romantic-scoring-from'],
//         'romanticScoringTo'     => ['except' => 10, 'as' => 'romantic-scoring-to'],

//         'intimateScoringFrom'   => ['except' => 1, 'as' => 'intimate-scoring-from'],
//         'intimateScoringTo'     => ['except' => 10, 'as' => 'intimate-scoring-to'],

//         'luxuriousScoringFrom'     => ['except' => 1, 'as' => 'luxurious-scoring-from'],
//         'luxuriousScoringTo'       => ['except' => 10, 'as' => 'luxurious-scoring-to'],

//         // 'booking_type'             => ['except' => [], 'as' => 'booking-type'],
//         'category'              => ['except' => ''],
//         'tags'                  => ['except' => []],
//         'amenities'             => ['except' => []],


//         'query'             => ['except' => ''],
//         'googleRating'      => ['except' => '', 'as' => 'google-rating'],
//         'checkIn'           => ['except' => '', 'as' => 'check-in'],
//         'checkOut'          => ['except' => '', 'as' => 'check-out'],
//         'adults'            => ['except' => null],
//         'rooms'             => ['except' => null],

//         'activeSort'            => ['except' => '', 'as' => 'active-sort'],
//         'recentSearch'          => ['except' => false, 'as' => 'recent-search'],
//     ];



//     // ============================ ( Events ) ======================\\

//     protected $listeners = [
//         // 'filter-query' => 'handleChangeQuery',
//         'filter-hotels' => "handleFilterHotels", //new
//         'filter-hotel-listing-category' => "handleFilterHotelListingCategory", //new
//         'reset-all-filters' => 'handleResetAllFilters',
//         'load-more-hotels' => 'handleLoadMoreHotels',

//         // 'store-hotel-to-recent-search' => 'handleStoreHotelToRecentSearch'
//     ];



//     public function handleFilterHotels(array $data)
//     {


//         $this->romanticScoringFrom =  $data["romantic-scoring-from"];
//         $this->romanticScoringTo = $data["romantic-scoring-to"];

//         $this->intimateScoringFrom =  $data["intimate-scoring-from"];
//         $this->intimateScoringTo = $data["intimate-scoring-to"];

//         $this->luxuriousScoringFrom =  $data["luxurious-scoring-from"];
//         $this->luxuriousScoringTo = $data["luxurious-scoring-to"];



//         // $this->booking_type = $data['booking-type'];
//         // $this->category   = $data['category'];
//         $this->tags         = $data['tags'];
//         $this->amenities    = $data['amenities'];

//         $this->query        = $data['query'];
//         $this->googleRating = $data['googleRating'];
//         $this->checkIn      = $data['checkIn'];
//         $this->checkOut     = $data['checkOut'];
//         $this->adults     = $data['adults'];
//         $this->rooms     = $data['rooms'];




//         $this->reset('recentSearch');


//         $this->triggerServerIsFilteredEvents();
//     }


//     public function handleFilterHotelListingCategory(string $categorySlug)
//     {

//         $this->category = $categorySlug;
//         $this->triggerServerIsFilteredEvents();
//     }
//     public function handleResetAllFilters()
//     {

//         $this->resetExcept(
//             'favoriteHotels',
//             'hotelCategories',
//             'isFavoritePage',
//             'perPage',
//             'checkIn',
//             'checkOut',
//             // 'adults',
//             // 'rooms',
//         );
//         $this->checkIn = now()->format('m/d/Y');
//         $this->checkOut = now()->addDay()->format('m/d/Y');


//         $this->triggerServerIsFilteredEvents();
//     }

//     protected function triggerServerIsFilteredEvents()
//     {
//         if ($this->getIsFiltered()) {
//             $this->emit('hotel-listing-filtered');
//             // $this->isFiltered = true;
//         } else {
//             $this->emit('hotel-listing-not-filtered');
//             // $this->isFiltered = false;
//         }
//     }


//     public function handleLoadMoreHotels()
//     {
//         $this->perPage  += 20;
//     }
//     // ============================ ( Lifecycle ) ======================\\
//     public function mount()
//     {
//         $this->checkIn = now()->format('m/d/Y');
//         $this->checkOut = now()->addDay()->format('m/d/Y');
//     }



//     // ============================ ( Render ) ======================\\


//     public function render(RecentHotelSearchSessionService $recentHotelSearchSessionService)
//     {

//         // if (!$this->isFiltered)
//         //     return <<<'blade'
//         //     <section class="max-w-5xl px-6 mx-auto mt-7 lg:px-0" id="hotel-listing-section" wire:id="{{ $this->id }}">
//         //     </section>
//         // blade;



//         // if ($this->recentSearch && !empty($recentHotelSearchSessionService->get())) {


//         //     $hotels = Hotel::with('categories', 'tags', 'services', 'ratings', 'media')
//         //         ->whereIn('id', $recentHotelSearchSessionService->get())
//         //         ->orderBy(DB::raw("FIELD(id, " . implode(',',  array_reverse($recentHotelSearchSessionService->get())) . ")"))
//         //         ->get();
//         // } else {




//         $hotels = Hotel::with('categories', 'tags', 'services', 'ratings', 'media')

//             ->withAvg([
//                 'ratings as romantic_avg' => function ($query) {
//                     $query->where('type', 'romantic');
//                 },
//                 'ratings as intimate_avg' => function ($query) {
//                     $query->where('type', 'intimate');
//                 },
//                 'ratings as luxury_avg' => function ($query) {
//                     $query->where('type', 'luxury');
//                 }

//             ], 'rate')
//             ->when(!empty($this->query), function (Builder $query) {
//                 $query->where('address', 'LIKE', '%' . $this->query . '%');
//             })
//             ->when($this->googleRating, function (Builder $query) {
//                 $query->whereBetween('google_rating', [1, intval($this->googleRating) + .9]);
//             })

//             ->when($this->romanticScoringFrom != 1 || $this->romanticScoringTo != 10, function (Builder $query) {
//                 $query->whereHas('ratings', function (Builder $query) {
//                     $query->where('type', 'romantic')->whereBetween('rate', [$this->romanticScoringFrom, $this->romanticScoringTo]);
//                 });
//             })
//             ->when($this->intimateScoringFrom != 1 || $this->intimateScoringTo != 10, function (Builder $query) {
//                 $query->whereHas('ratings', function (Builder $query) {
//                     $query->where('type', 'intimate')->whereBetween('rate', [$this->intimateScoringFrom, $this->intimateScoringTo]);
//                 });
//             })
//             ->when($this->luxuriousScoringFrom != 1 || $this->luxuriousScoringTo != 10, function (Builder $query) {
//                 $query->whereHas('ratings', function (Builder $query) {
//                     $query->where('type', 'luxury')->whereBetween('rate', [$this->luxuriousScoringFrom, $this->luxuriousScoringTo]);
//                 });
//             })
//             // ->when(!empty($this->booking_type) && !in_array('all', $this->booking_type), function (Builder $query) {


//             //     $query->where('booking_type', $this->booking_type);
//             // })
//             ->when($this->category, function (Builder $query) {
//                 $query->whereHas('categories', function (Builder $query) {
//                     $query->where('slug', $this->category);
//                 });
//             })
//             ->when(!empty($this->tags) && !in_array('all', $this->tags), function (Builder $query) {
//                 foreach ($this->tags as  $tag) {
//                     $query->whereHas('tags', function (Builder $query) use ($tag) {
//                         $query->where('slug', $tag);
//                     });
//                 }
//             })
//             ->when(!empty($this->amenities) && !in_array('all', $this->amenities), function (Builder $query) {
//                 foreach ($this->amenities as  $amenity) {
//                     $query->whereHas('services', function (Builder $query) use ($amenity) {
//                         $query->where('slug', $amenity);
//                     });
//                 }
//             })
//             // Sorting filter
//             ->when(!$this->activeSort, function ($query) {
//                 $query->latest();
//             })
//             ->when($this->activeSort == 'from-recent', function ($query) {
//                 $query->latest();
//             })
//             ->when($this->activeSort == 'more-clicked', function ($query) {
//                 $query->orderByDesc('hotels.view_count');
//             })
//             ->when($this->activeSort == 'best-rating', function ($query) {

//                 $query->withAvg('ratings as average_rating', 'rate')
//                     ->orderByDesc('average_rating');
//             })
//             ->when($this->activeSort == 'new-added', function ($query) {

//                 $query->withCount('ratings')
//                     ->orderBy('ratings_count');
//             })
//             ->when($this->activeSort == 'first-romantic', function ($query) {

//                 // $query->withAvg('ratings as average_rating', 'rate')
//                 //     ->whereHas('ratings', function ($query) {
//                 //         $query->where('type', 'romantic');
//                 //     })
//                 //     ->orderByDesc('average_rating');

//                 // $query->withAvg(['ratings' => function ($avgQuery) {
//                 //     $avgQuery->where('type', 'romantic');
//                 // }], 'rate')
//                 //     ->orderByDesc('ratings_avg_rate');

//                 // ----------------------
//                 // $query->withAvg([
//                 //     'ratings as romantic_avg' => function ($query) {
//                 //         $query->where('type', 'romantic');
//                 //     },
//                 //     'ratings as intimate_avg' => function ($query) {
//                 //         $query->where('type', 'intimate');
//                 //     },
//                 //     'ratings as luxury_avg' => function ($query) {
//                 //         $query->where('type', 'luxury');
//                 //     }

//                 // ], 'rate')->orderBy(function ($hotel) {
//                 //     if ($hotel->romantic_avg > $hotel->intimate_avg && $hotel->romantic_avg > $hotel->luxury_avg) {
//                 //         return 0;
//                 //     } else {
//                 //         return 1;
//                 //     }
//                 // });
//                 // ->where('romantic_avg', ">", 'intimate_avg')
//                 // ->where('romantic_avg', ">", 'luxury_avg');
//                 // ->orderByRaw('GREATEST(romantic_avg, luxury_avg) DESC');
//                 // ->orderByDesc('romantic_avg');
//                 // ->orderByDesc(function ($hotel) {

//                 // $hotel->
//                 // return $hotel->where('romantic_avg', '>', 'intimate_avg')
//                 //     ->where('romantic_avg', '>', 'luxury_avg');
//                 // });

//                 // $query->orderByDesc(function ($hotel) {
//                 //     $hotel
//                 //         ->select('rate')
//                 //         ->from('hotel_ratings')
//                 //         ->whereColumn('hotel_id', 'hotels.id')
//                 //         ->orderByDesc('rate')
//                 //         ->limit(1);
//                 //     $hotel->where('type', 'romantic');
//                 // });





//                 // ->orderByDesc(function ($hotel) {
//                 //     return $hotel->where('romantic_avg' > )->avg('rate');
//                 // });
//                 // ->orderByDesc('average_rating')
//                 // ->orderByDesc(function ($hotel) {
//                 //     return $hotel->ratings->where('type', 'romantic')->avg('rate');
//                 // });
//                 // $query->withAvg(['ratings as average_rating', 'rate'])
//                 //     ->orderByDesc('average_rating')
//                 //     ->orderByDesc(function ($hotel) {
//                 //         return $hotel->ratings->where('type', 'romantic')->avg('rate');
//                 //     });
//                 // ->orderByDesc('average_rating');



//                 // $query->orderByDesc(function ($hotel) {
//                 //     $hotel
//                 //         ->select('rate')
//                 //         ->from('hotel_ratings')
//                 //         ->whereColumn('hotel_id', 'hotels.id')
//                 //         ->where('type', 'romantic')
//                 //         ->orderByDesc('rate')
//                 //         ->limit(1);
//                 // });
//             })
//             ->when($this->activeSort == 'first-intimate', function ($query) {
//                 // $query->orderByDesc(function ($hotel) {
//                 //     $hotel
//                 //         ->select('rate')
//                 //         ->from('hotel_ratings')
//                 //         ->whereColumn('hotel_id', 'hotels.id')
//                 //         ->where('type', 'intimate')
//                 //         ->orderByDesc('rate')
//                 //         ->limit(1);
//                 // });

//                 // $query->withAvg(['ratings' => function ($avgQuery) {
//                 //     $avgQuery->where('type', 'intimate');
//                 // }], 'rate')
//                 //     ->orderByDesc('ratings_avg_rate');
//             })
//             ->when($this->activeSort == 'first-luxurious', function ($query) {
//                 // $query->orderByDesc(function ($hotel) {
//                 //     $hotel
//                 //         ->select('rate')
//                 //         ->from('hotel_ratings')
//                 //         ->whereColumn('hotel_id', 'hotels.id')
//                 //         ->where('type', 'luxury')
//                 //         ->orderByDesc('rate')
//                 //         ->limit(1);
//                 // });
//                 // $query->withAvg('ratings as average_rating', 'rate')
//                 // $query->withAvg(['ratings' => function ($avgQuery) {
//                 //     $avgQuery->where('type', 'luxury');
//                 // }], 'rate')
//                 //     ->orderByDesc('ratings_avg_rate');
//                 // $query->orderByDesc(function ($hotel) {
//                 //     $hotel
//                 //         ->select('rate')
//                 //         ->from('hotel_ratings')
//                 //         ->whereColumn('hotel_id', 'hotels.id')
//                 //         ->orderByDesc('rate')
//                 //         ->limit(1);
//                 //     $hotel->where('type', 'luxury');
//                 // });
//             })

//             ->when($this->isFavoritePage, function (Builder $query) {
//                 $query->whereHas('customerFavorites', function (Builder $query) {
//                     $query->where('customer_user_id', auth('admin')->user()->id);
//                 });
//             })
//             ->paginate($this->perPage);
//         // }


//         // dd($hotels->toArray());






//         $isFiltered = $this->getIsFiltered();



//         return view('livewire.pages.home.hotel-listing-seciton', compact('hotels', 'isFiltered'));
//     }

//     // ============================ ( Others ) ======================\\

//     protected function getIsFiltered()
//     {
//         return  $this->romanticScoringFrom != 1 || $this->romanticScoringTo != 10 ||
//             $this->intimateScoringFrom != 1 || $this->intimateScoringTo != 10 ||
//             $this->luxuriousScoringFrom != 1 || $this->luxuriousScoringTo != 10 ||
//             // !empty($this->booking_type)
//             !empty($this->category) || !empty($this->tags) || !empty($this->amenities)
//             || $this->query || $this->googleRating;
//     }
// }