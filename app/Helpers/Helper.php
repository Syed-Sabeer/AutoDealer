<?php

namespace App\Helpers;

use App\Models\BusinessSetting;
use App\Models\CarBodyType;
use App\Models\CarBrand;
use App\Models\CarListing;
use App\Models\CompanySetting;
use App\Models\Counter;
use App\Models\SystemSetting;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

class Helper
{
    public static function dashboard_route()
    {
        $user = User::find(Auth::user()->id);
        $route = $user->role->role.'.dashboard';
        return $route;
    }
    public static function getLogoLight()
    {
        return CompanySetting::first()->light_logo ?? asset('frontAssets/img/logo/logo-light.png');
    }
    public static function getLogoDark()
    {
        return CompanySetting::first()->dark_logo ?? asset('frontAssets/img/logo/logo.png');
    }
    public static function getFavicon()
    {
        return CompanySetting::first()->favicon ?? asset('frontAssets/img/logo/favicon.png');
    }
    public static function getCompanyName()
    {
        return CompanySetting::first()->company_name ?? env('APP_NAME');
    }
    public static function getCompanyEmail()
    {
        return CompanySetting::first()->email ?? 'test@gmail.com';
    }
    public static function getCompanyPhone()
    {
        return CompanySetting::first()->phone_number ?? '+1234567890';
    }
    public static function getCompanyAddress()
    {
        return CompanySetting::first()->address ?? '66 Broklyan';
    }
    public static function getCompanyCountry()
    {
        return CompanySetting::first()->country->name ?? 'USA';
    }
    public static function getCompanyCity()
    {
        return CompanySetting::first()->city ?? 'New York';
    }
    public static function getCompanyZip()
    {
        return CompanySetting::first()->zip ?? '12345';
    }
    public static function getTimezone()
    {
        $systemSetting = SystemSetting::with('timezone')->first();
        return $systemSetting->timezone->name ?? env('APP_TIMEZONE', 'UTC');
    }
    public static function getDefaultLanguage()
    {
        $systemSetting = SystemSetting::with('language')->first();
        return $systemSetting->language->iso_code ?? 'en';
    }
    public static function getfooterText()
    {
        return SystemSetting::first()->footer_text ?? 'All Copyrights Reserved';
    }
    public static function getMaxUploadSize()
    {
        $sizeInKB = SystemSetting::first()->max_upload_size ?? 2048; // Stored in KB

        return self::humanReadableSize($sizeInKB * 1024); // Convert KB to Bytes
    }

    // Helper function to format size into KB, MB, GB, etc.
    public static function humanReadableSize($bytes, $decimals = 2)
    {
        $sizes = ['B', 'KB', 'MB', 'GB', 'TB'];
        $factor = floor((strlen($bytes) - 1) / 3);

        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . $sizes[$factor];
    }


    // example use of currency format {{ \App\Helpers\Helper::formatCurrency($price) }}
    public static function formatCurrency($amount)
    {
        $currencySetting = SystemSetting::first();

        if (!$currencySetting) {
            return $amount; // Return the amount as is if settings are not found
        }

        $symbol = $currencySetting->currency_symbol;
        $position = $currencySetting->currency_symbol_position; // 'prefix' or 'postfix'

        if ($position === 'prefix') {
            return $symbol . $amount;
        }

        return $amount . $symbol;
    }

    public static function currencySymbol()
    {
        $currencySetting = SystemSetting::first();

        $symbol = $currencySetting->currency_symbol;

        return $symbol;
    }

    public static function renderRecaptcha($formId, $action = 'register')
    {
        if (config('captcha.version') === 'v3') {
            return self::renderRecaptchaV3($formId, $action);
        }
    }

    private static function renderRecaptchaV3($formId, $action)
    {
        $siteKey = config('captcha.sitekey');
        return <<<HTML
            <script src="https://www.google.com/recaptcha/enterprise.js?render={$siteKey}"></script>
            <script>
                function handleRecaptcha(formId, action) {
                    document.getElementById(formId).addEventListener('submit', function(e) {
                        e.preventDefault();
                        grecaptcha.enterprise.ready(async () => {
                            try {
                                const token = await grecaptcha.enterprise.execute('{$siteKey}', { action: action });
                                const form = document.getElementById(formId);
                                const input = document.createElement('input');
                                input.type = 'hidden';
                                input.name = 'g-recaptcha-response';
                                input.value = token;
                                form.appendChild(input);
                                form.submit();
                            } catch (error) {
                                console.error('Error executing reCAPTCHA:', error);
                            }
                        });
                    });
                }

                document.addEventListener('DOMContentLoaded', function() {
                    handleRecaptcha('{$formId}', '{$action}');
                });
            </script>
        HTML;
    }

    public static function getCarBodyTypes()
    {
        $carBodyTypes = CarBodyType::where('is_active', 'active')->get();
        if (isset($carBodyTypes) && count($carBodyTypes) > 0) {
            return $carBodyTypes;
        } else {
            return [];
        }
    }

    public static function getLatestCarListings()
    {
        $carListings = CarListing::with('carFuelType')->where('status', 'published')->latest()->limit(8)->get();
        if (isset($carListings) && count($carListings) > 0) {
            return $carListings;
        } else {
            return [];
        }
    }

    public static function getFeaturedBrands()
    {
        $carBrands = CarBrand::where('is_active', 'active')->where('is_featured', '1')->get();
        if (isset($carBrands) && count($carBrands) > 0) {
            return $carBrands;
        } else {
            return [];
        }
    }

    public static function getTestimonials()
    {
        $testimonials = Testimonial::where('is_active', 'active')->get();
        if (isset($testimonials) && count($testimonials) > 0) {
            return $testimonials;
        } else {
            return [];
        }
    }

    public static function getCounters()
    {
        $counter = Counter::first();
        return $counter;
    }

    public static function getCompanyFacebook()
    {
        return CompanySetting::first()->facebook_url ?? null;
    }
    public static function getCompanyInstagram()
    {
        return CompanySetting::first()->instagram_url ?? null;
    }
    public static function getCompanyTwitter()
    {
        return CompanySetting::first()->twitter_url ?? null;
    }
    public static function getCompanyLinkedin()
    {
        return CompanySetting::first()->linkedin_url ?? null;
    }
    public static function getCompanyAbout()
    {
        return CompanySetting::first()->about ?? null;
    }
}
