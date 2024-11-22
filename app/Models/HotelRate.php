<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelRate extends Model
{
    protected $table = 'hotel_ratings';

    protected $fillable = [
        'type',
        'rate',
        'parent_hotel_id',
        'admin_id',
        'updated_at',
        'created_at',
    ];

    public function parentHotel()
    {
        return $this->belongsTo(ParentHotel::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
