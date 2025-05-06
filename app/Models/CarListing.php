<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarListing extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'car_brand_id',
        'car_model_id',
        'car_fuel_type_id',
        'car_body_type_id',
        'title',
        'car_id',
        'condition',
        'year',
        'price',
        'drive_type',
        'transmission',
        'mileage',
        'horsepower',
        'fuel_efficiency',
        'engine_capacity',
        'cylenders',
        'color',
        'vin',
        'seats',
        'doors',
        'main_image',
        'address',
        'city',
        'state',
        'zip_code',
        'description',
        'features',
        'contact_name',
        'contact_phone',
        'contact_email',
        'is_featured',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($carListing) {
            $carListing->car_id = 'VEHICLE' . str_pad($carListing->id, 5, '0', STR_PAD_LEFT);
            $carListing->saveQuietly(); // Safe after the ID exists
        });
    }
}
