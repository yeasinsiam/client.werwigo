<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class HotelTag extends Model
{


    use HasSlug;

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
        'slug'
    ];

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'hotel_tag');
    }
}
