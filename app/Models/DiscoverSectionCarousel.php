<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class DiscoverSectionCarousel extends Model  implements HasMedia
{
    use  InteractsWithMedia;


    protected $fillable = ['hotel_category_id'];

    /**
     * Get the thumbnail property from media
     */
    public function getThumbnailAttribute()
    {
        return $this->getFirstMedia('thumbnail');
    }

    public function registerMediaCollections(): void
    {
        // Registering thumbnail media
        $this
            ->addMediaCollection('thumbnail')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg'])
            ->withResponsiveImages();
    }

    public function category()
    {
        return $this->belongsTo(HotelCategory::class, 'hotel_category_id');
    }
}
