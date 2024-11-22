<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentHotel extends Model
{
    use HasFactory;


    protected $fillable = [
        'google_place_id',
        'title',
        'address',
        'city_country',
        'google_rating',
        'google_total_reviews',
        'sync_date'
    ];


    // protected static function boot()
    // {
    //     parent::boot();



    //     static::created(function ($model) {
    //         $model->syncRatings();
    //     });
    // }


    public function getRomanticRating()
    {
        return round($this->ratings->where('type', 'romantic')->average('rate'), 1);
    }

    public function getIntimateRating()
    {
        return round($this->ratings->where('type', 'intimate')->average('rate'), 1);
    }

    public function getLuxuryRating()
    {
        return round($this->ratings->where('type', 'luxury')->average('rate'), 1);
    }



    public function  syncRatings()
    {
        $romantic_avg = $this->ratings()->where('type', 'romantic')->avg('rate');
        $intimate_avg = $this->ratings()->where('type', 'intimate')->avg('rate');
        $luxury_avg = $this->ratings()->where('type', 'luxury')->avg('rate');

        $ratingsCollection = collect(['romantic' => $romantic_avg, 'intimate' => $intimate_avg, 'luxury' => $luxury_avg]);
        $allSameRating = $ratingsCollection->every(function ($value) use ($ratingsCollection) {
            return $value === $ratingsCollection->first();
        });

        try {
            //code...

            if (!$allSameRating) {
                $highestRating = $ratingsCollection->max();
                $highestRatingName = $ratingsCollection
                    ->keys()
                    ->filter(function ($key) use ($ratingsCollection, $highestRating) {
                        return $ratingsCollection[$key] === $highestRating;
                    })
                    ->first();
            } else {
                $highestRatingName = $this->ratings()->select('type', 'created_at')->orderByDesc('created_at')->first()->type;
            }
        } catch (\Throwable $th) {
            $highestRatingName = null;
        }
        $this->rating_count = $this->ratings()->count() ?? 0;
        $this->best_rating = $this->ratings()->avg('rate') ?? 0;
        $this->best_rating_type = $highestRatingName;
        $this->romantic_avg = $romantic_avg ?? 0;
        $this->intimate_avg = $intimate_avg ?? 0;
        $this->luxury_avg = $luxury_avg ?? 0;


        $this->save();
    }




    // Relations


    public function opinions()
    {
        return $this->hasMany(HotelOpinion::class);
    }

    public function ratings()
    {
        return $this->hasMany(HotelRate::class);
    }
    public function hotel()
    {
        return $this->hasMany(Hotel::class);
    }
}
