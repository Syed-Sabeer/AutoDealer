<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'profile_image',
        'dob',
        'gender_id',
        'marital_status_id',
        'language_id',
        'designation_id',
        'country_id',
        'city',
        'zip',
        'street',
        'phone_number',
        'bio',
        'facebook_url',
        'linkedin_url',
        'skype_url',
        'instagram_url',
        'github_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function maritalStatus()
    {
        return $this->belongsTo(MaritalStatus::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
