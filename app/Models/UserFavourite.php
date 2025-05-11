<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavourite extends Model
{
    use HasFactory;

    public function carListing()
    {
        return $this->belongsTo(CarListing::class, 'car_listing_id');
    }
}
