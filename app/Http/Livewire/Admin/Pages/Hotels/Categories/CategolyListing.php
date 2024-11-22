<?php

namespace App\Http\Livewire\Admin\Pages\Hotels\Categories;

use App\Models\HotelCategory;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CategolyListing extends Component
{


    // public Collection $categories;

    // public function mount()
    // {
    //     $this->categories =  HotelCategory::get();
    // }



    public function render()
    {
        $categories = HotelCategory::orderBy('position')->get();

        return view('livewire.admin.pages.hotels.categories.categoly-listing', compact('categories'));
    }


    public function handleSort($items)
    {

        // dd($items);
        foreach ($items as $item) {
            HotelCategory::find($item['value'])->update(['position' => $item['order']]);
        }
    }
}
