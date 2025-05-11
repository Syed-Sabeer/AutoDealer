<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
