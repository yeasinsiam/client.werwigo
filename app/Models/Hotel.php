<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\Admin;


class Hotel extends Model  implements HasMedia
{

    use HasSlug, InteractsWithMedia;

    // protected $appends = ['getRomanticRating', 'getIntimateRating', 'getLuxuryRating'];

    protected $fillable = [

        'headline',
        // 'excerpt',
        'description',

        'slug',


        // 'booking_type',
        // 'direct_booking_link',
        // 'booking_request_price_per_night',
        // 'booking_request_link',
        // 'online_booking_links',


        'view_count',


        'admin_id',
        'parent_hotel_id'
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    // protected $casts = [
    //     'online_booking_links' => 'collection',
    // ];


    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('headline')
            ->saveSlugsTo('slug');
    }


    /**
     * Get the thumbnail property from media
     */
    public function getThumbnailAttribute()
    {
        return $this->getFirstMedia('thumbnail');
    }
    /**
     * Get the gallery property from media
     */
    public function getGalleryAttribute()
    {
        return $this->getMedia('gallery');
    }


    public function registerMediaCollections(): void
    {
        // Registering thumbnail media
        $this
            ->addMediaCollection('thumbnail')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg'])
            ->withResponsiveImages();

        $this->addMediaCollection('gallery')
            ->acceptsMimeTypes(['image/jpeg'])
            ->withResponsiveImages();
    }

    public function categories()
    {
        return $this->belongsToMany(HotelCategory::class, 'hotel_category');
    }
    public function tags()
    {
        return $this->belongsToMany(HotelTag::class, 'hotel_tag');
    }
    public function services()
    {
        return $this->belongsToMany(HotelService::class, 'hotel_service');
    }


    public function customerFavorites()
    {
        return $this->hasMany(CustomerFavoriteHotel::class);
    }


    public function parentHotel()
    {
        return $this->belongsTo(ParentHotel::class);
    }




    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}


// <?php

// namespace App\Models;


// use Illuminate\Database\Eloquent\Model;
// use Spatie\Sluggable\HasSlug;
// use Spatie\Sluggable\SlugOptions;
// use Spatie\MediaLibrary\HasMedia;
// use Spatie\MediaLibrary\InteractsWithMedia;
// use App\Models\Admin;


// class Hotel extends Model  implements HasMedia
// {

//     use HasSlug, InteractsWithMedia;

//     // protected $appends = ['getRomanticRating', 'getIntimateRating', 'getLuxuryRating'];

//     protected $fillable = [

//         'google_place_id',
//         'title',
//         'address',
//         'google_rating',
//         'google_total_reviews',

//         'headline',
//         'excerpt',
//         'description',

//         'slug',


//         // 'booking_type',
//         // 'direct_booking_link',
//         // 'booking_request_price_per_night',
//         // 'booking_request_link',
//         // 'online_booking_links',


//         'view_count',


//         'admin_id'
//     ];


//     /**
//      * The attributes that should be cast.
//      *
//      * @var array
//      */
//     protected $casts = [
//         'online_booking_links' => 'collection',
//     ];

//     public function getRomanticRating()
//     {
//         return round($this->ratings->where('type', 'romantic')->average('rate'), 1);
//     }

//     public function getIntimateRating()
//     {
//         return round($this->ratings->where('type', 'intimate')->average('rate'), 1);
//     }

//     public function getLuxuryRating()
//     {
//         return round($this->ratings->where('type', 'luxury')->average('rate'), 1);
//     }


//     /**
//      * Get the options for generating the slug.
//      */
//     public function getSlugOptions(): SlugOptions
//     {
//         return SlugOptions::create()
//             ->generateSlugsFrom('title')
//             ->saveSlugsTo('slug');
//     }


//     /**
//      * Get the thumbnail property from media
//      */
//     public function getThumbnailAttribute()
//     {
//         return $this->getFirstMedia('thumbnail');
//     }
//     /**
//      * Get the gallery property from media
//      */
//     public function getGalleryAttribute()
//     {
//         return $this->getMedia('gallery');
//     }


//     public function registerMediaCollections(): void
//     {
//         // Registering thumbnail media
//         $this
//             ->addMediaCollection('thumbnail')
//             ->singleFile()
//             ->acceptsMimeTypes(['image/jpeg'])
//             ->withResponsiveImages();

//         $this->addMediaCollection('gallery')
//             ->acceptsMimeTypes(['image/jpeg'])
//             ->withResponsiveImages();
//     }

//     public function categories()
//     {
//         return $this->belongsToMany(HotelCategory::class, 'hotel_category');
//     }
//     public function tags()
//     {
//         return $this->belongsToMany(HotelTag::class, 'hotel_tag');
//     }
//     public function services()
//     {
//         return $this->belongsToMany(HotelService::class, 'hotel_service');
//     }
//     public function ratings()
//     {
//         return $this->hasMany(HotelRate::class);
//     }

//     public function customerFavorites()
//     {
//         return $this->hasMany(CustomerFavoriteHotel::class);
//     }

//     public function opinions()
//     {
//         return $this->hasMany(HotelOpinion::class);
//     }

//     public function admin()
//     {
//         return $this->belongsTo(Admin::class);
//     }
// }
