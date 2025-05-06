<?php

namespace App\Rules;

use App\Models\SystemSetting;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MaxUploadSize implements ValidationRule
{
    protected $maxSize;

    public function __construct()
    {
        $systemSetting = SystemSetting::first();
        $this->maxSize = $systemSetting ? $systemSetting->max_upload_size : 2048;
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value->isValid() && $value->getSize() > $this->maxSize * 1024) {
            $fail('The uploaded file exceeds the maximum allowed size of ' . $this->maxSize . ' KB.');
        }
    }
}
