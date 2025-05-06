<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function timezone()
    {
        return $this->belongsTo(Timezone::class);
    }
}
