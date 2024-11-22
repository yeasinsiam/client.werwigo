<?php

namespace App\Http\Livewire\Pages\Home;

use App\Models\Hotel;
use App\Models\ParentHotel;
use App\Services\RecentHotelSearchSessionService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class HotelListingSeciton extends Component
{

    public Collection $favoriteHotels;
    public bool $isFavoritePage = false;
    public int $perPage = 20;
    public Collection $hotelCategories;
    // ============== ( Query )
    public string $category            = '';
    public bool $bestGoogleRaring      = false;
    public string $activeSort          = '';
    public string $location             = '';
    public string $tag                  = '';
    public  $uploadedUser               = '';
    public  $stay                       = '';
    // ============== ( End Query )


    protected $queryString = [
        'category'              => ['except' => ''],
        'bestGoogleRaring'      => ['except' => false, 'as' => 'best-google-rating'],
        'activeSort'            => ['except' => '', 'as' => 'active-sort'],

        'location'            => ['except' => ''],
        'tag'                => ['except' => ''],
        'uploadedUser'            => ['except' => '', 'as' => 'uploaded-user'],
        'stay'              => ['except' => ''],
    ];


    // ============================ ( Events ) ======================\\

    protected $listeners = [
        'filter-hotel-listing-category' => "handleFilterHotelListingCategory",
        'filter-hotel-listing-best-google-review' => "handleFilterHotelListingBestGoogleReview",
        'filter-hotel-listing-sort' => "handleFilterHotelListingSort",
        'filter-hotel-location' => "handleFilterHotelLocation",
        'filter-hotel-tag' => "handleFilterHotelTag",
        'filter-hotel-uploaded-user' => "handleFilterHotelUploadedUser",
        'filter-hotel-stay' => "handleFilterHotelStay",



        'load-more-hotels' => 'handleLoadMoreHotels',

    ];

    public function handleFilterHotelListingCategory(string $categorySlug)
    {
        $this->category = $categorySlug;
        $this->bestGoogleRaring = false;
        $this->activeSort = '';
        if (!$categorySlug)
            $this->reset(['location', 'tag', 'uploadedUser', 'stay']);
        $this->dispatchBrowserEvent('hotel-filtered');
    }

    public function handleFilterHotelListingBestGoogleReview()
    {

        $this->category = '';
        $this->bestGoogleRaring = !$this->bestGoogleRaring;
        $this->activeSort = '';

        $this->dispatchBrowserEvent('hotel-filtered');
    }
    public function handleFilterHotelListingSort(string $sort)
    {
        $this->activeSort = $sort;
        $this->bestGoogleRaring = false;
        $this->category = '';

        $this->dispatchBrowserEvent('hotel-filtered');
    }

    public function handleFilterHotelLocation(string $location)
    {
        $this->location = $location;
        $this->category = '';
        $this->reset(['tag', 'uploadedUser', 'stay']);
        $this->dispatchBrowserEvent('search-filter-active');

        $this->dispatchBrowserEvent('hotel-filtered');
    }
    public function handleFilterHotelTag(string $tagSlug)
    {
        $this->tag = $tagSlug;
        $this->category = '';
        $this->reset(['location', 'uploadedUser', 'stay']);

        $this->dispatchBrowserEvent('hotel-filtered');
    }
    public function handleFilterHotelUploadedUser($adminUploadedUserId)
    {
        $this->uploadedUser = $adminUploadedUserId;
        $this->reset(['location', 'tag', 'stay']);
        $this->dispatchBrowserEvent('hotel-filtered');
    }
    public function handleFilterHotelStay($parentHotelId)
    {
        $this->stay = $parentHotelId;
        $this->category = '';
        $this->reset(['location', 'tag', 'uploadedUser']);
        $this->dispatchBrowserEvent('hotel-filtered');
    }





    public function handleLoadMoreHotels()
    {
        $this->perPage  += 20;
    }

    public function initFromWire()
    {
        if ($this->isSearchFilterActive()) {
            $this->dispatchBrowserEvent('search-filter-active');
        } else {
            $this->dispatchBrowserEvent('search-filter-inactive');
        }
    }




    // ============================ ( Render ) ======================\\
    public function render(RecentHotelSearchSessionService $recentHotelSearchSessionService)
    {

        if ($this->isSearchFilterActive()) {
            $this->dispatchBrowserEvent('search-filter-active');
        } else {
            $this->dispatchBrowserEvent('search-filter-inactive');
        }

        $hotels = Hotel::with(['categories', 'tags', 'services', 'media', 'admin', 'parentHotel' => function ($query) {
            $query->with('ratings');
            // $query->withAvg([
            //     'ratings as romantic_avg' => function ($query) {
            //         $query->where('type', 'romantic');
            //     },
            //     'ratings as intimate_avg' => function ($query) {
            //         $query->where('type', 'intimate');
            //     },
            //     'ratings as luxury_avg' => function ($query) {
            //         $query->where('type', 'luxury');
            //     },
            //     'ratings as average_rating'
            // ], 'rate');

            // $query->withCount('ratings');
        }])
            ->when($this->category, function (Builder $query) {
                $query->whereHas('categories', function (Builder $query) {
                    $query->where('slug', $this->category);
                });
            })
            ->when($this->location, function (Builder $query) {
                $query->whereHas('parentHotel', function (Builder $query) {
                    $query->where('city_country', 'LIKE', '%' . $this->location . '%');
                });
            })

            ->when($this->tag, function (Builder $query) {
                $query->whereHas('tags', function (Builder $query) {
                    $query->where('slug', 'LIKE', '%' . $this->tag . '%');
                });
            })

            ->when($this->uploadedUser, function (Builder $query) {
                $query->where('admin_id',  $this->uploadedUser);
            })

            ->when($this->stay, function (Builder $query) {
                $query->whereHas('parentHotel', function (Builder $query) {
                    $query->where('id',  $this->stay);
                });
            })

            ->when($this->activeSort == 'first-romantic', function ($query) {
                $query->orderByDesc(function ($query) {
                    $query->select('best_rating_type')
                        ->from('parent_hotels')
                        ->whereColumn('parent_hotels.id', 'hotels.parent_hotel_id')
                        ->orderByRaw('FIELD(best_rating_type, "romantic")')
                        ->limit(1);
                });
            })
            ->when($this->activeSort == 'first-intimate', function ($query) {
                $query->orderByDesc(function ($query) {
                    $query->select('best_rating_type')
                        ->from('parent_hotels')
                        ->whereColumn('parent_hotels.id', 'hotels.parent_hotel_id')
                        ->where('parent_hotels.best_rating_type', 'intimate')
                        ->orderBy('best_rating', 'desc')
                        ->limit(1);
                });
            })
            ->when($this->activeSort == 'first-luxurious', function ($query) {
                $query->orderByDesc(function ($query) {
                    $query->select('best_rating_type')
                        ->from('parent_hotels')
                        ->whereColumn('parent_hotels.id', 'hotels.parent_hotel_id')
                        ->where('parent_hotels.best_rating_type', 'luxury')
                        ->orderBy('best_rating', 'desc')
                        ->limit(1);
                });
            })

            ->when($this->activeSort == 'new-added', function ($query) {
                $query->orderBy(ParentHotel::select('rating_count')->whereColumn('parent_hotels.id', 'hotels.parent_hotel_id'));
            })
            ->when($this->activeSort == 'best-rating', function ($query) {
                $query->orderByDesc(ParentHotel::select('best_rating')->whereColumn('parent_hotels.id', 'hotels.parent_hotel_id'));
            })
            ->when($this->bestGoogleRaring, function ($query) {
                $query->orderByDesc(ParentHotel::select('google_rating')->whereColumn('parent_hotels.id', 'hotels.parent_hotel_id'));
            })
            ->when($this->activeSort == 'from-recent' || !$this->activeSort, function ($query) {
                $query->latest();
            })
            ->when($this->activeSort == 'more-clicked', function ($query) {
                $query->orderByDesc('view_count');
            })
            // Sorting filter end
            ->when($this->isFavoritePage, function (Builder $query) {
                $query->whereHas('customerFavorites', function (Builder $query) {
                    $query->where('customer_user_id', auth('admin')->user()->id);
                });
            })

            ->paginate($this->perPage);



        $isFavoritePage = request()->routeIs('favorites');

        return view('livewire.pages.home.hotel-listing-seciton', compact('hotels', 'isFavoritePage'));
    }


    protected function isSearchFilterActive()
    {
        return $this->location || $this->tag || $this->uploadedUser || $this->stay;
    }
}
