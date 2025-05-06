<?php

namespace App\Http\Middleware;

use App\Helpers\Helper;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::has('locale')) {
            $locale = Session::get('locale');
            Log::info("Using session locale: " . $locale);
        } else {
            $locale = Helper::getDefaultLanguage();
            Log::info("Using default locale: " . $locale);
        }

        App::setLocale($locale);
        return $next($request);
    }
}
