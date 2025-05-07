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
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function home()
    {
        try {
            $carBrands = CarBrand::where('is_active', 'active')->get();
            $carBodyTypes = CarBodyType::where('is_active', 'active')->get();
            return view('frontend.pages.home', compact('carBrands','carBodyTypes'));
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
    public function inventory()
    {
        // dd(request()->all());
        try {
            // $carListings = CarListing::with('carBrand','carFuelType')->where('status', 'published')->paginate(9);
            $carListings = CarListing::with('carBrand','carFuelType')->where('status', 'published');

            if (request('brands')) {
                $carListings->whereIn('car_brand_id', request('brands'));
            }

            if (request('year')) {
                $carListings->whereIn('year', request('year'));
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

            $carListings = $carListings->paginate(9)->withQueryString();

            $carBrands = CarBrand::where('is_featured', '1')->where('is_active', 'active')->get();
            $carFuelTypes = CarFuelType::where('is_featured', '1')->where('is_active', 'active')->get();
            $carFeatures = CarFeature::where('is_featured', '1')->where('is_active', 'active')->get();
            $maxPrice = CarListing::where('status', 'published')->max('price');
            return view('frontend.pages.inventory.listing', compact('carListings','carBrands','carFuelTypes','carFeatures','maxPrice'));
        } catch (\Throwable $th) {
            Log::error('Inventory view Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }
    public function inventoryDetails($carId)
    {
        try {
            $carListing = CarListing::with('carBrand','carFuelType','carModel', 'carBodyType','user.profile')->where('car_id', $carId)->first();
            $carListingImages = CarListingImage::where('car_listing_id', $carListing->id)->get();
            $carBrands = CarBrand::where('is_featured', '1')->where('is_active', 'active')->get();
            $carFuelTypes = CarFuelType::where('is_featured', '1')->where('is_active', 'active')->get();
            $carFeatures = CarFeature::where('is_featured', '1')->where('is_active', 'active')->get();
            $maxPrice = CarListing::where('status', 'published')->max('price');
            return view('frontend.pages.inventory.single', compact('carListing','carListingImages'));
        } catch (\Throwable $th) {
            Log::error('Inventory Details view Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }
}
