<?php

namespace App\Http\Livewire\Components\Sections\HotelSearchFilterSection;

use App\Models\Admin;
use App\Models\Hotel;
use App\Models\HotelCategory;
use App\Models\HotelTag;
use App\Models\ParentHotel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SearchFilterPopup extends Component
{

    public string $currentRouteName = '';
    public string $search = '';
    public Collection $categories;



    protected $queryString = [
        'search'   => ['except' => ''],

    ];




    public function setLocation($city_country)
    {
        $this->redirectToExplorePageIfNotExplorePage('filter-hotel-location', $city_country);

        $this->emit('filter-hotel-location', $city_country);
        $this->reset('search');
        $this->dispatchBrowserEvent('close-hotel-filter-popup');
    }
    public function setTag($tagSlug)
    {
        $this->redirectToExplorePageIfNotExplorePage('filter-hotel-tag', $tagSlug);

        $this->emit('filter-hotel-tag', $tagSlug);
        $this->reset('search');
        $this->dispatchBrowserEvent('close-hotel-filter-popup');
    }

    public function setUploadedUser($adminUploadedUserId)
    {
        $this->redirectToExplorePageIfNotExplorePage('filter-hotel-uploaded-user', $adminUploadedUserId);


        $this->emit('filter-hotel-uploaded-user', $adminUploadedUserId);
        $this->reset('search');
        $this->dispatchBrowserEvent('close-hotel-filter-popup');
    }


    public function setStay($parentHotelId)
    {
        $this->redirectToExplorePageIfNotExplorePage('filter-hotel-stay', $parentHotelId);


        $this->emit('filter-hotel-stay', $parentHotelId);
        $this->reset('search');
        $this->dispatchBrowserEvent('close-hotel-filter-popup');
    }



    function mount()
    {
        $this->currentRouteName = request()->route()?->getName() ?? "";
        $this->categories = HotelCategory::orderBy('position')->get();
    }



    public function render()
    {


        $locations =  ParentHotel::select('id', 'title', 'address', 'city_country')->where('address', 'LIKE', '%' .  $this->search  . '%')->orWhere('city_country', 'LIKE', '%' .  $this->search  . '%')->latest()->limit(10)->get();

        $tags =  HotelTag::select('id', 'title', 'slug')->withCount([
            'hotels as parent_hotel_count' => function ($query) {
                $query->select(DB::raw('count(distinct parent_hotel_id)'));
            }
        ])->where('title', 'LIKE', '%' .  $this->search  . '%')->latest()->limit(10)->get();

        $uploadedUsers = Admin::select('id', 'username')->with('media')->withCount([
            'hotels as parent_hotel_count' => function ($query) {
                $query->select(DB::raw('count(distinct parent_hotel_id)'));
            }
        ])->where('username', 'LIKE', '%' .  $this->search  . '%')->limit(10)->latest()->get();


        $stays =  ParentHotel::withAvg([
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
        ], 'rate')->withCount('ratings')->where('title', 'LIKE', '%' .  $this->search  . '%')->limit(10)->latest()->get();


        return view('livewire.components.sections.hotel-search-filter-section.search-filter-popup', compact('locations', 'tags', 'uploadedUsers', 'stays'));
    }


    protected function redirectToExplorePageIfNotExplorePage($type, $value)
    {

        if ($this->currentRouteName != 'it.home' && $this->currentRouteName != 'en.home')
            switch ($type) {
                case 'filter-hotel-location':
                    return redirect()->route('home', ['location' => $value]);
                    break;
                case 'filter-hotel-tag':
                    return redirect()->route('home', ['tag' => $value]);

                    break;
                case 'filter-hotel-uploaded-user':
                    return redirect()->route('home', ['uploaded-user' => $value]);

                    break;
                case 'filter-hotel-stay':
                    return redirect()->route('home', ['stay' => $value]);
                    break;
            }
    }
}