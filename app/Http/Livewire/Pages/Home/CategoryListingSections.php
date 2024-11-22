<?php

namespace App\Http\Livewire\Pages\Home;

use App\Models\HotelCategory;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Livewire\Component;

class CategoryListingSections extends Component
{

    public EloquentCollection $favoriteHotels;
    public bool $isHotelListingFiltered = false;

    public  $activeCategory = "";
    public Collection $hotelCategories;

    public array $categorySortingArray = [];




    protected $queryString = [
        'activeCategory' =>  ['except' => '', 'as' => 'active_category'],
        // 'categorySortingArray' =>  ['except' => [], 'as' => 'category_sorting']
    ];


    // ============================ ( Events ) ======================\\

    // protected $listeners = [
    //     'hotel-listing-filtered' => 'handleHotelListingFiltered',
    //     'hotel-listing-not-filtered' => 'handleNoHotelListingFiltered',
    // ];

    // public function  handleHotelListingFiltered()
    // {

    //     $this->isHotelListingFiltered = true;
    //     $this->activeCategory = '';
    //     $this->hotelCategories = collect([]);
    // }


    // public function  handleNoHotelListingFiltered()
    // {

    //     $this->isHotelListingFiltered = false;
    //     $this->hotelCategories = $this->getHotelCategories();
    //     $this->activeCategory = '';
    // }





    // actions
    public function handleSetActiveCategory(HotelCategory $hotelCategory)
    {


        if ($this->activeCategory == $hotelCategory->slug) {
            $this->activeCategory = "";
            $this->dispatchBrowserEvent('active-category-selected', "");
        } else {
            $this->activeCategory = $hotelCategory->slug;
            $this->dispatchBrowserEvent('active-category-selected', $hotelCategory->slug);
        }
    }
    public function handleResetActiveCategories()
    {
        $this->activeCategory = '';
        $this->dispatchBrowserEvent('active-category-selected', "");
    }


    public function handleChangeCategorySorting($slug, $value)
    {
        $this->categorySortingArray[$slug] = $value;

        $this->dispatchBrowserEvent('category-sorting-filtered', $slug);
    }





    public function mount(Request $request)
    {

        if (
            $request->query('active_category') && !is_array($request->query('active_category'))
            && !$this->isHotelListingFiltered
        ) {
            $this->activeCategory = $request->query('active_category');
        } else {
            $this->activeCategory = '';
        }

        // $categories =
        //     !$this->isHotelListingFiltered ?
        //     $this->getHotelCategories() :
        //     collect([]);
        $categories =
            !$this->isHotelListingFiltered ?
            HotelCategory::get() :
            collect([]);


        $this->hotelCategories = $categories;



        $this->categorySortingArray = $categories->pluck('slug')->reduce(function (array $carry,  string $slug) {
            $carry[$slug] = 'from-recent';

            return $carry;
        }, []);
    }




    // ============================ ( Render ) ======================\\


    public function render()
    {





        if ($this->isHotelListingFiltered)
            return <<<'blade'
           <section wire:id="{{ $this->id }}" id="category-filter-hotels-section" class="max-w-5xl px-6 mx-auto mt-7 lg:px-0"></section>
        blade;




        return view('livewire.pages.home.category-listing-sections');
    }


    // protected function getHotelCategories()
    // {
    //     return  HotelCategory::with('hotels.categories', 'hotels.tags', 'hotels.services', 'hotels.ratings', 'hotels.media')->get();
    // }
}

// class CategoryListingSections extends Component
// {

//     public EloquentCollection $favoriteHotels;
//     public bool $isHotelListingFiltered = false;


//     public  $activeCategories = [];
//     public Collection $hotelCategories;

//     protected $queryString = [
//         'activeCategories' =>  ['except' => [], 'as' => 'active_categories']
//     ];


//     // ============================ ( Events ) ======================\\

//     protected $listeners = [
//         'hotel-listing-filtered' => 'handleHotelListingFiltered',
//         'hotel-listing-not-filtered' => 'handleNoHotelListingFiltered',
//     ];

//     public function  handleHotelListingFiltered()
//     {

//         $this->isHotelListingFiltered = true;
//         $this->activeCategories = [];
//         $this->hotelCategories = collect([]);
//     }


//     public function  handleNoHotelListingFiltered()
//     {

//         $this->isHotelListingFiltered = false;
//         $this->hotelCategories = $this->getHotelCategories();
//         $this->activeCategories = [];
//     }



//     // actions
//     public function handleSetActiveCategories(HotelCategory $hotelCategory)
//     {
//         $activeCategoriesCollection  = collect($this->activeCategories);

//         if ($activeCategoriesCollection->contains($hotelCategory->slug)) {
//             $this->activeCategories = $activeCategoriesCollection->reject(function ($value) use ($hotelCategory) {
//                 return $value == $hotelCategory->slug;
//             });
//         } else {
//             $this->activeCategories = $activeCategoriesCollection->push($hotelCategory->slug);
//         }
//     }
//     public function handleResetActiveCategories()
//     {
//         $this->activeCategories = [];
//     }




//     public function mount(Request $request)
//     {
//         if (
//             $request->query('active_categories') && is_array($request->query('active_categories'))
//             && !$this->isHotelListingFiltered
//         ) {
//             $this->activeCategories = $request->query('active_categories');
//         } else {
//             $this->activeCategories = [];
//         }

//         $this->hotelCategories = !$this->isHotelListingFiltered ?
//             $this->getHotelCategories() :
//             collect([]);
//     }


//     // ============================ ( Render ) ======================\\


//     public function render()
//     {


//         if ($this->isHotelListingFiltered)
//             return <<<'blade'
//            <section wire:id="{{ $this->id }}" id="category-filter-hotels-section" class="max-w-5xl px-6 mx-auto mt-7 lg:px-0"></section>
//         blade;



//         $activeCategoriesCollection = collect($this->activeCategories);

//         $allHotelIdsOfActiveCategories =  $this->hotelCategories->when(empty($this->activeCategories), function ($collection) {
//             return $collection->pluck('hotels')->collapse()->pluck('id')->unique();
//         }, function ($collection) {
//             return $collection->whereIn('slug', $this->activeCategories)->pluck('hotels')->collapse()->pluck('id')->unique();
//         })->toArray();


//         return view('livewire.pages.home.category-listing-sections', compact('activeCategoriesCollection', 'allHotelIdsOfActiveCategories'));
//     }


//     protected function getHotelCategories()
//     {
//         return  HotelCategory::with('hotels.categories', 'hotels.tags', 'hotels.services', 'hotels.ratings', 'hotels.media')->get();
//     }
// }
