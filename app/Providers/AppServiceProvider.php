<?php

namespace App\Providers;

use App\Rules\MaxUploadSize;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('max_size', function ($attribute, $value, $parameters, $validator) {
            $rule = new MaxUploadSize();
            $fail = function ($message) use ($validator, $attribute) {
                $validator->errors()->add($attribute, $message);
            };
            $rule->validate($attribute, $value, $fail);
            return !$validator->errors()->has($attribute);
        });
    }
}
