<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class HotelCategory extends Model implements HasMedia
{

    use HasSlug, InteractsWithMedia;

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }


    protected $fillable = [
        'title',
        // 'svg',
        // 'svg_active',
        'slug',

        'position'
    ];

    /**
     * Get the icon property from media
     */
    public function getIconAttribute()
    {
        return $this->getFirstMedia('icon');
    }

    /**
     * Get the iconActive property from media
     */
    // public function getIconActiveAttribute()
    // {
    //     return $this->getFirstMedia('icon_active');
    // }

    public function registerMediaCollections(): void
    {
        // Registering thumbnail media
        $this
            ->addMediaCollection('icon')
            ->singleFile()
            ->acceptsMimeTypes(['image/png']);
        // $this
        //     ->addMediaCollection('icon_active')
        //     ->singleFile()
        //     ->acceptsMimeTypes(['image/png']);
    }



    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'hotel_category');
    }
}
