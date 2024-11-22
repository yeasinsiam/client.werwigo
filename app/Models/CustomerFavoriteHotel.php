<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerFavoriteHotel extends Model
{
    protected $fillable = [
        'hotel_id',
        'customer_user_id'
    ];


    public function hotel()
    {
        return  $this->belongsTo(Hotel::class);
    }
}
