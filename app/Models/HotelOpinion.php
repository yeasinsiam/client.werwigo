<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelOpinion extends Model
{

    protected $fillable = [

        'comment',
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
