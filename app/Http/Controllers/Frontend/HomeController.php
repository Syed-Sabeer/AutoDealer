<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CarBodyType;
use App\Models\CarBrand;
use App\Models\CarFeature;
use App\Models\CarFuelType;
use App\Models\CarListing;
use App\Models\CarListingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function home()
    {
        try {
            $carBrands = CarBrand::where('is_active', 'active')->orderBy('name')->get();
            $carBodyTypes = CarBodyType::where('is_active', 'active')->orderBy('name')->get();
            return view('frontend.pages.home', compact('carBrands', 'carBodyTypes'));
        } catch (\Throwable $th) {
            Log::error('Home view Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }
    public function about()
    {
        try {
            return view('frontend.pages.about');
        } catch (\Throwable $th) {
            Log::error('About view Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }
    public function contact()
    {
        try {
            return view('frontend.pages.contact');
        } catch (\Throwable $th) {
            Log::error('Contact view Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }
    public function inventory()
    {
        // dd(request()->all());
        try {
            // $carListings = CarListing::with('carBrand','carFuelType')->where('status', 'published')->paginate(9);
            $carListings = CarListing::with('carBrand', 'carFuelType', 'carBrand', 'carModel')->where('status', 'published');

            if (request('brands')) {
                $carListings->whereIn('car_brand_id', request('brands'));
            }

            // if (request('year')) {
            //     $carListings->whereIn('year', request('year'));
            // }

            if (request('from_year') && request('to_year')) {
                $carListings->whereBetween('year', [request('from_year'), request('to_year')]);
            } elseif (request('from_year')) {
                $carListings->where('year', '>=', request('from_year'));
            } elseif (request('to_year')) {
                $carListings->where('year', '<=', request('to_year'));
            }

            if (request('seats')) {
                $carListings->where('seats', request('seats'));
            }

            if (request('doors')) {
                $carListings->where('doors', request('doors'));
            }

            if (request('color')) {
                $carListings->where('color', request('color'));
            }


            if (request('condition')) {
                $carListings->whereIn('condition', request('condition'));
            }

            if (request('models')) {
                $carListings->whereIn('car_model_id', request('models'));
            }

            if (request('fuel_types')) {
                $carListings->whereIn('car_fuel_type_id', request('fuel_types'));
            }

            if (request('body_types')) {
                $carListings->whereIn('car_body_type_id', request('body_types'));
            }

            if (request('transmission')) {
                $carListings->whereIn('transmission', request('transmission'));
            }

            if (request('features')) {
                $features = request('features');
                foreach ((array) $features as $feature) {
                    $carListings->whereJsonContains('features', $feature);
                }
            }

            if (request('min_price') !== null && request('max_price') !== null) {
                $carListings->whereBetween('price', [
                    request('min_price'),
                    request('max_price')
                ]);
            }

            if (request('from_mileage') !== null && request('to_mileage') !== null) {
                $carListings->whereBetween('mileage', [
                    request('from_mileage'),
                    request('to_mileage')
                ]);
            }

            switch (request('sort')) {
                case 'featured':
                    $carListings->orderByDesc('is_featured');
                    break;
                case 'latest':
                    $carListings->orderByDesc('created_at');
                    break;
                case 'low_price':
                    $carListings->orderBy('price');
                    break;
                case 'high_price':
                    $carListings->orderByDesc('price');
                    break;
                default:
                    $carListings->orderBy('id');
                    break;
            }

            if (request('search')) {
                $carListings->where('title', 'like', '%' . request('search') . '%');
            }

            // if (request('postcode') && request('distance')) {
            //     Log::info('Postcode filter initiated');

            //     $postcode = strtoupper(str_replace(' ', '', request('postcode')));
            //     $distance = (float) request('distance');

            //     try {
            //         // Get lat/lng of user input postcode
            //         $userGeo = Http::get("https://api.postcodes.io/postcodes/{$postcode}");
            //         Log::info("User Geo API Response: " . json_encode($userGeo->json()));

            //         if ($userGeo->successful() && isset($userGeo['result'])) {
            //             Log::info('User Geo API successful');
            //             $userLat = $userGeo['result']['latitude'];
            //             $userLng = $userGeo['result']['longitude'];

            //             $matchingIds = [];

            //             $allCars = $carListings->get();
            //             foreach ($allCars as $car) {
            //                 Log::info('Foreach init');
            //                 if (!isset($car->latitude) || !isset($car->longitude)) {
            //                     Log::info('Car does not have lat/lng');
            //                     continue;
            //                 }

            //                 $lat = $car->latitude;
            //                 $lng = $car->longitude;

            //                 // Haversine formula
            //                 $theta = $userLng - $lng;
            //                 $dist = sin(deg2rad($userLat)) * sin(deg2rad($lat)) +
            //                     cos(deg2rad($userLat)) * cos(deg2rad($lat)) * cos(deg2rad($theta));
            //                 $dist = acos($dist);
            //                 $dist = rad2deg($dist);
            //                 $miles = $dist * 60 * 1.1515;
            //                 Log::info("Distance between user and car: " . $miles . " miles");

            //                 if ($miles <= $distance) {
            //                     $matchingIds[] = $car->id;
            //                 }
            //             }

            //             Log::info("Matching Car IDs: " . json_encode($matchingIds));

            //             $carListings = $carListings->whereIn('id', $matchingIds);
            //         }
            //     } catch (\Exception $e) {
            //         Log::error("Postcode API Error: " . $e->getMessage());
            //     }
            // }

            // Distance filtering
            $userLat = $userLng = $maxRadius = null;
            $filteredCars = collect();

            if (request('postcode')) {
                try {
                    $pc = strtoupper(str_replace(' ', '', request('postcode')));
                    $resp = Http::get("https://api.postcodes.io/postcodes/{$pc}");
                    if ($resp->successful() && $resp['result']) {
                        $userLat = $resp['result']['latitude'];
                        $userLng = $resp['result']['longitude'];
                    }
                } catch (\Exception $e) {
                    Log::error("Postcode lookup failed: " . $e->getMessage());
                }
            } elseif (request()->has(['lat', 'lng'])) {
                $userLat = (float) request('lat');
                $userLng = (float) request('lng');
            }

            $maxRadius = request('distance') ? (float) request('distance') : null;

            if ($userLat && $userLng) {
                $allCars = $carListings->get();
                foreach ($allCars as $car) {
                    if (!$car->latitude || !$car->longitude) continue;

                    $theta = $userLng - $car->longitude;
                    $dist = sin(deg2rad($userLat)) * sin(deg2rad($car->latitude)) +
                            cos(deg2rad($userLat)) * cos(deg2rad($car->latitude)) * cos(deg2rad($theta));
                    $dist = acos($dist);
                    $dist = rad2deg($dist) * 60 * 1.1515; // miles

                    $car->calculated_distance = round($dist, 2);

                    if (is_null($maxRadius) || $dist <= $maxRadius) {
                        $filteredCars->push($car);
                    }
                }

                // Sort by distance
                $carListings = $filteredCars->sortBy('calculated_distance')->values();
                $carListings = new \Illuminate\Pagination\LengthAwarePaginator(
                    $carListings->forPage(request()->get('page', 1), 9),
                    $carListings->count(),
                    9,
                    request()->get('page', 1),
                    ['path' => request()->url(), 'query' => request()->query()]
                );
            } else {
                // Regular pagination
                $carListings = $carListings->paginate(9)->withQueryString();
            }

            // $carListings = $carListings->paginate(9)->withQueryString();

            $carBrands = CarBrand::where('is_featured', '1')->where('is_active', 'active')->orderBy('name')->get();
            $allBrands = CarBrand::where('is_active', 'active')->orderBy('name')->get();
            $carFuelTypes = CarFuelType::where('is_featured', '1')->where('is_active', 'active')->orderBy('name')->get();
            $carFeatures = CarFeature::where('is_featured', '1')->where('is_active', 'active')->orderBy('name')->get();
            $carBodyTypes = CarBodyType::where('is_active', 'active')->orderBy('name')->get();
            $maxPrice = CarListing::where('status', 'published')->max('price');

            return view('frontend.pages.inventory.listing', compact('carListings', 'carBrands', 'carFuelTypes', 'carFeatures', 'maxPrice', 'allBrands', 'carBodyTypes'));
        } catch (\Throwable $th) {
            Log::error('Inventory view Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }
    public function inventoryDetails($carId)
    {
        try {
            $carListing = CarListing::with('carBrand', 'carFuelType', 'carModel', 'carBodyType', 'user.profile')->where('car_id', $carId)->first();
            $carListingImages = CarListingImage::where('car_listing_id', $carListing->id)->get();
            $carBrands = CarBrand::where('is_featured', '1')->where('is_active', 'active')->get();
            $carFuelTypes = CarFuelType::where('is_featured', '1')->where('is_active', 'active')->get();
            $carFeatures = CarFeature::where('is_featured', '1')->where('is_active', 'active')->get();
            $maxPrice = CarListing::where('status', 'published')->max('price');
            $relatedListings = CarListing::with('carBrand', 'carFuelType')->where('status', 'published')
                ->inRandomOrder()
                ->take(4)
                ->get();
            return view('frontend.pages.inventory.single', compact('carListing', 'carListingImages', 'relatedListings'));
        } catch (\Throwable $th) {
            Log::error('Inventory Details view Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }
}
