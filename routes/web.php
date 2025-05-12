<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\GithubController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\ArchivedCarListingController;
use App\Http\Controllers\Dashboard\BodyTypeController;
use App\Http\Controllers\Dashboard\CarBrandController;
use App\Http\Controllers\Dashboard\CarListingController as DashboardCarListingController;
use App\Http\Controllers\Dashboard\CarModelController;
use App\Http\Controllers\Dashboard\FeatureController;
use App\Http\Controllers\Dashboard\FuelTypeController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\NotificationController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\RolePermission\PermissionController;
use App\Http\Controllers\Dashboard\RolePermission\RoleController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\User\ArchivedUserController;
use App\Http\Controllers\Dashboard\User\UserController;
use App\Http\Controllers\Frontend\AjaxController;
use App\Http\Controllers\Frontend\CarListingController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Middleware\CheckAccountActivation;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/lang/{lang}', function ($lang) {
    // dd($lang);
    if(! in_array($lang, ['en','fr','ar','de'])){
        abort(404);
    }else{
        session(['locale' => $lang]);
        App::setLocale($lang);
        Log::info("Locale set to: " . $lang);
        return redirect()->back();
    }
})->name('lang');

Route::get('/current-time', function () {
    return response()->json([
        'time' => Carbon::now()->format('h:iA') // Returns time in 12-hour format with AM/PM
    ]);
});

Auth::routes();
Route::get('/', function () {
    return redirect()->route('frontend.home');
});
// Guest Routes
Route::group(['middleware' => ['guest']], function () {

    //User Login Authentication Routes
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login-attempt', [LoginController::class, 'login_attempt'])->name('login.attempt');

    //User Register Authentication Routes
    Route::get('register', [RegisterController::class, 'register'])->name('register');
    Route::post('registration-attempt', [RegisterController::class, 'register_attempt'])->name('register.attempt');

    // Google Authentication Routes
    // Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google.login');
    // Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.login.callback');
    // // Github Authentication Routes
    // Route::get('auth/github', [GithubController::class, 'redirectToGithub'])->name('auth.github.login');
    // Route::get('auth/github/callback', [GithubController::class, 'handleGithubCallback'])->name('auth.github.login.callback');
    // Facebook Authentication Routes
    // Route::controller(FacebookController::class)->group(function () {
    //     Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    //     Route::get('auth/facebook/callback', 'handleFacebookCallback');
    // });

});

// Authentication Routes
Route::group(['middleware' => ['auth']], function () {
    Route::get('login-verification', [AuthController::class, 'login_verification'])->name('login.verification');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('verify-account', [AuthController::class, 'verify_account'])->name('verify.account');
    Route::post('resend-code', [AuthController::class, 'resend_code'])->name('resend.code');

    // Verified notification
    Route::get('email/verify/{id}/{hash}', [AuthController::class, 'verification_verify'])->middleware(['signed'])->name('verification.verify');
    Route::get('email/verify', [AuthController::class, 'verification_notice'])->name('verification.notice');
    Route::post('email/verification-notification', [AuthController::class, 'verification_send'])->middleware(['throttle:2,1'])->name('verification.send');
    // Verified notification
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/deactivated', function () {
        return view('errors.deactivated');
    })->name('deactivated');
    Route::middleware(['check.activation'])->group(function () {

        Route::resource('profile', ProfileController::class);
        Route::post('profile/setting/account/{id}', [ProfileController::class, 'accountDeactivation'])->name('account.deactivate');
        Route::post('profile/security/password/{id}', [ProfileController::class, 'passwordUpdate'])->name('update.password');

        Route::get('/notifications', [NotificationController::class, 'index']);
        Route::post('/notifications/{id}/mark-as-read', [NotificationController::class, 'markAsRead']);
        Route::post('/notifications/mark-all-as-read', [NotificationController::class, 'markAllAsRead']);
        Route::post('/notifications/{id}/delete', [NotificationController::class, 'deleteNotification']);
        Route::get('/notifications/send-test-noti/{id}', [NotificationController::class, 'testNotification']);

        Route::get('admin/dashboard', [HomeController::class, 'index'])->name('dashboard');

        // Admin Dashboard Authentication Routes
        Route::prefix('admin/dashboard')->name('dashboard.')->group(function () {

            Route::resource('user', UserController::class);
            Route::resource('archived-user', ArchivedUserController::class);
            Route::get('user/restore/{id}', [ArchivedUserController::class, 'restoreUser'])->name('archived-user.restore');
            Route::get('user/status/{id}', [UserController::class, 'updateStatus'])->name('user.status.update');

            // Role & Permission Start
            Route::resource('permissions', PermissionController::class);

            Route::resource('roles', RoleController::class);
            //Role & Permission End

            // Setting Routes
            Route::resource('setting', SettingController::class);
            Route::put('company/setting/{id}', [SettingController::class, 'updateCompanySettings'])->name('setting.company.update');
            Route::put('recaptcha/setting/{id}', [SettingController::class, 'updateRecaptchaSettings'])->name('setting.recaptcha.update');
            Route::put('system/setting/{id}', [SettingController::class, 'updateSystemSettings'])->name('setting.system.update');
            Route::put('email/setting/{id}', [SettingController::class, 'updateEmailSettings'])->name('setting.email.update');
            Route::post('send-mail/setting', [SettingController::class, 'sendTestMail'])->name('setting.send_test_mail');

            // User Dashboard Authentication Routes

            // Car Brands
            Route::resource('car-brands', CarBrandController::class);
            Route::get('car-brands/status/{id}', [CarBrandController::class, 'updateStatus'])->name('car-brands.status.update');

            // Car Models
            Route::get('car-models/{id}', [CarModelController::class, 'index'])->name('car-models.index');
            Route::get('car-models/{id}/create', [CarModelController::class, 'create'])->name('car-models.create');
            Route::post('car-models/{id}/store', [CarModelController::class, 'store'])->name('car-models.store');
            Route::get('car-models/edit/{id}', [CarModelController::class, 'edit'])->name('car-models.edit');
            Route::put('car-models/update/{id}', [CarModelController::class, 'update'])->name('car-models.update');
            Route::delete('car-models/destroy/{id}', [CarModelController::class, 'destroy'])->name('car-models.destroy');
            Route::get('car-models/status/{id}', [CarModelController::class, 'updateStatus'])->name('car-models.status.update');

            // Body Types
            Route::resource('body-types', BodyTypeController::class);
            Route::get('body-types/status/{id}', [BodyTypeController::class, 'updateStatus'])->name('body-types.status.update');

            // Fuel Types
            Route::resource('fuel-types', FuelTypeController::class);
            Route::get('fuel-types/status/{id}', [FuelTypeController::class, 'updateStatus'])->name('fuel-types.status.update');

            // Features
            Route::resource('features', FeatureController::class);
            Route::get('features/status/{id}', [FeatureController::class, 'updateStatus'])->name('features.status.update');

            // Car Listings
            Route::resource('car-listings', DashboardCarListingController::class);
            Route::post('car-listings/status/{id}', [DashboardCarListingController::class, 'updateStatus'])->name('car-listings.status.update');
            Route::get('archived-car-listings', [ArchivedCarListingController::class, 'index'])->name('archived-car-listings.index');
            Route::delete('archived-car-listings/destroy/{id}', [ArchivedCarListingController::class, 'destroy'])->name('archived-car-listings.destroy');
            Route::get('archived-car-listings/restore/{id}', [ArchivedCarListingController::class, 'restoreCarListing'])->name('archived-car-listings.restore');

        });
    });

});

// Frontend Pages Routes
Route::name('frontend.')->group(function () {
    Route::group(['middleware' => ['guest']], function () {
        //User Login Authentication Routes
        Route::get('login', [LoginController::class, 'login'])->name('login');
        Route::post('login-attempt', [LoginController::class, 'login_attempt'])->name('login.attempt');

        //User Register Authentication Routes
        Route::get('register', [RegisterController::class, 'register'])->name('register');
        Route::post('registration-attempt', [RegisterController::class, 'register_attempt'])->name('register.attempt');

    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/deactivated', function () {
            return view('errors.deactivated');
        })->name('deactivated');
        Route::middleware(['check.activation'])->group(function () {
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::get('dashboard/profile', [DashboardController::class, 'profile'])->name('profile');
            Route::post('dashboard/update-profile-image', [DashboardController::class, 'updateProfileImage'])->name('update-profile-image');
            Route::get('dashboard/my-listings', [DashboardController::class, 'myListings'])->name('my-listings');
            Route::get('dashboard/add-listings', [DashboardController::class, 'addListings'])->name('add-listings');
            Route::get('dashboard/my-favourites', [DashboardController::class, 'myFavourites'])->name('my-favourites');
            Route::get('dashboard/settings', [DashboardController::class, 'settings'])->name('settings');
            Route::get('dashboard/add-to-favourite/{id}', [DashboardController::class, 'addToFavourite'])->name('add.favourites');

            //Car Listing
            Route::get('car-listings/store', [CarListingController::class, 'store'])->name('car-listings.store');
            Route::get('car-listings/delete/{id}', [CarListingController::class, 'destroy'])->name('car-listings.destroy');
            Route::get('car-listings/edit/{id}', [CarListingController::class, 'edit'])->name('car-listings.edit');
            Route::put('car-listings/update/{id}', [CarListingController::class, 'update'])->name('car-listings.update');
            Route::get('car-listings/delete-car-image/{id}', [CarListingController::class, 'deleteImage'])->name('car-listings.delete-car-image');
            // Route::resource('car-listings', CarListingController::class);
        });

    });
    Route::get('home', [FrontendHomeController::class, 'home'])->name('home');
    Route::get('about', [FrontendHomeController::class, 'about'])->name('about');
    Route::get('inventory', [FrontendHomeController::class, 'inventory'])->name('inventory');
    Route::get('contact', [FrontendHomeController::class, 'contact'])->name('contact');
    Route::get('inventory-details/{carID}', [FrontendHomeController::class, 'inventoryDetails'])->name('inventory.details');
    Route::get('/get-models-by-brand/{brand_id}', [AjaxController::class, 'getModelsByBrand'])->name('get-models');

});


//Artisan Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/clear-cache', function () {
        Artisan::call('cache:clear');
        return "Application cache cleared!";
    })->name('clear.cache');

    Route::get('/clear-config', function () {
        Artisan::call('config:clear');
        return "Configuration cache cleared!";
    })->name('clear.config');

    Route::get('/clear-view', function () {
        Artisan::call('view:clear');
        return "View cache cleared!";
    })->name('clear.view');

    Route::get('/clear-route', function () {
        Artisan::call('route:clear');
        return "Route cache cleared!";
    })->name('clear.route');

    Route::get('/clear-optimize', function () {
        Artisan::call('optimize:clear');
        return "Optimization cache cleared!";
    })->name('clear.optimize');
});

