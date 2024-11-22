<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscoverSection extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'title',
        'subtitle',
    ];
}
