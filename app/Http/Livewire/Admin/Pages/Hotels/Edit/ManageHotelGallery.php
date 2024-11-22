<?php

namespace App\Http\Livewire\Admin\Pages\Hotels\Edit;

use App\Models\Hotel;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ManageHotelGallery extends Component
{

    public Hotel $hotel;


    public function render()
    {
        $gallery  =  $this->hotel->gallery;
        // $gallery  =  Media::find($this->hotel->gallery->pluck('id'));
        return view('livewire.admin.pages.hotels.edit.manage-hotel-gallery',  compact('gallery'));
    }

    public function removeImage(Media $media)
    {
        if ($this->hotel->gallery->count() > 1) {
            $media->delete();
            return  redirect()->route('admin.hotels.edit', $this->hotel->id);
        }
    }



    public function handleSort($items)
    {
        foreach ($items as $item) {
            $galleryItem =  $this->hotel->gallery->find($item['value']);
            $galleryItem->order_column = $item['order'];
            $galleryItem->save();
        }
    }
}
