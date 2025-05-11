<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\CarBodyType;
use App\Models\CarBrand;
use App\Models\CarFeature;
use App\Models\CarFuelType;
use App\Models\CarListing;
use App\Models\Profile;
use App\Models\User;
use App\Models\UserFavourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $user = User::where('id', auth()->user()->id)->first();
            $carListings = CarListing::with('carBrand','carModel', 'carBodyType')->where('user_id', $user->id)->latest()->limit(6)->get();
            $totalListings = CarListing::where('user_id', $user->id)->count();
            $publishedListings = CarListing::where('user_id', $user->id)->where('status', 'published')->count();
            $soldListings = CarListing::where('user_id', $user->id)->where('status', 'sold')->count();
            return view('frontend.pages.user.dashboard',compact('carListings','user','totalListings','publishedListings','soldListings'));
        } catch (\Throwable $th) {
            Log::error('Frontend Dashboard Index Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }
    public function profile()
    {
        try {
            $user = Auth::user();
            $profile = Profile::with('gender','maritalStatus','language','designation','country')->where('user_id', $user->id)->first();
            return view('frontend.pages.user.profile',compact('profile','user'));
        } catch (\Throwable $th) {
            Log::error('Frontend Dashboard Index Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }
    public function myListings()
    {
        try {
            $user = User::where('id', auth()->user()->id)->first();
            $carListings = CarListing::with('carBrand','carModel', 'carBodyType')->where('user_id', $user->id)->paginate(6);
            return view('frontend.pages.user.my-listing', compact('carListings'));
        } catch (\Throwable $th) {
            Log::error('Frontend Dashboard Index Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }
    public function addListings()
    {
        try {
            $user = Auth::user();
            $carBrands = CarBrand::where('is_active', 'active')->get();
            $carBodyTypes = CarBodyType::where('is_active', 'active')->get();
            $carFuelTypes = CarFuelType::where('is_active', 'active')->get();
            $carFeatures = CarFeature::where('is_active', 'active')->get();
            return view('frontend.pages.user.add-listing',compact('user','carBrands','carBodyTypes','carFuelTypes','carFeatures'));
        } catch (\Throwable $th) {
            Log::error('Frontend Dashboard Index Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }
    public function myFavourites()
    {
        try {
            $user = Auth::user();
            $profile = Profile::with('gender','maritalStatus','language','designation','country')->where('user_id', $user->id)->first();
            $userFavourites = UserFavourite::with('carListing.carFuelType')->where('user_id', $user->id)->paginate(6);
            return view('frontend.pages.user.my-favourite',compact('profile','user','userFavourites'));
        } catch (\Throwable $th) {
            Log::error('Frontend Dashboard Index Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }
    public function addToFavourite($id)
    {
        try {
            $user = Auth::user();
            $carListing = CarListing::findOrFail($id);
            $userFavourite = UserFavourite::where('user_id', $user->id)->where('car_listing_id', $carListing->id)->first();
            if ($userFavourite) {
                $userFavourite->delete();
                $message = "Removed from Favourite Successfully";
            } else {
                $userFavourite = new UserFavourite();
                $userFavourite->user_id = $user->id;
                $userFavourite->car_listing_id = $carListing->id;
                $userFavourite->save();
                $message = "Added to Favourite Successfully";
            }
            return redirect()->back()->with('success', $message);
        } catch (\Throwable $th) {
            Log::error('Frontend Add to Favourite Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }
    public function settings()
    {
        try {
            $user = Auth::user();
            $profile = Profile::with('gender','maritalStatus','language','designation','country')->where('user_id', $user->id)->first();
            return view('frontend.pages.user.settings',compact('profile','user'));
        } catch (\Throwable $th) {
            Log::error('Frontend Dashboard Index Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }

    public function updateProfileImage(Request $request)
    {
        try {
            $user = Auth::user();
            $profile = Profile::where('user_id', $user->id)->first();
            if ($request->hasFile('profile_image')) {
                if (isset($profile->profile_image) && File::exists(public_path($profile->profile_image))) {
                    File::delete(public_path($profile->profile_image));
                }
                $Image = $request->file('profile_image');
                $Image_ext = $Image->getClientOriginalExtension();
                $Image_name = time() . 'profile_image.' . $Image_ext;

                $Image_path = 'uploads/profile-images';
                $Image->move(public_path($Image_path), $Image_name);
                $profile->profile_image = $Image_path . "/" . $Image_name;
                $profile->save();
            }

            return response()->json([
                'success' => true,
                'message' => 'Image Deleted Successfully'
            ]);
        } catch (\Throwable $th) {
            Log::error('Frontend Dashboard Index Failed', ['error' => $th->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong! Please try again later'
            ]);
            throw $th;
        }
    }
}
