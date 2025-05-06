<?php

namespace App\Providers;

use App\Helpers\Helper;
use App\Models\CompanySetting;
use App\Models\RecaptchaSetting;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class LocaleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        try {
            app()->setLocale(Helper::getDefaultLanguage());

            // Set the application's timezone
            config(['app.timezone' => Helper::getTimezone()]);
            date_default_timezone_set(Helper::getTimezone());

            $recaptchaSetting = RecaptchaSetting::first();
            if ($recaptchaSetting) {
                Config::set('captcha.version', $recaptchaSetting->google_recaptcha_type);
                Config::set('captcha.sitekey', $recaptchaSetting->google_recaptcha_key);
                Config::set('captcha.secret', $recaptchaSetting->google_recaptcha_secret);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
