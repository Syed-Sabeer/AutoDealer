<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CarBodyType;
use App\Models\CarBrand;
use App\Models\CarFeature;
use App\Models\CarFuelType;
use App\Models\CarListing;
use App\Models\CarListingImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class CarListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $user = User::where('id', auth()->user()->id)->first();
            $carListings = CarListing::with('carBrand', 'carModel', 'carBodyType')->where('user_id', $user->id)->get();
            return view('frontend.pages.user.my-listing', compact('carListings'));
        } catch (\Throwable $th) {
            Log::error('My Car List view Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'condition' => 'nullable|in:new,used,certified',
            'car_body_type_id' => 'required|exists:car_body_types,id',
            'car_brand_id' => 'required|exists:car_brands,id',
            'car_model_id' => 'required|exists:car_models,id',
            'price' => 'required|numeric',
            'year' => 'required|integer',
            'drive_type' => 'nullable|in:2WD,4WD,AWD,RWD',
            'transmission' => 'required|in:automatic,manual,semi-automatic,cvt',
            'car_fuel_type_id' => 'required|exists:car_fuel_types,id',
            'mileage' => 'required|integer',
            'engine_capacity' => 'required|integer',
            'fuel_efficiency' => 'nullable|numeric',
            'cylenders' => 'nullable|integer',
            'color' => 'required|string|max:255',
            'doors' => 'required|integer',
            'seats' => 'required|integer',
            'horsepower' => 'nullable|integer',
            'vin' => 'nullable|string|max:255|unique:car_listings,vin',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip_code' => 'required|string|max:255',
            'description' => 'required|string',
            'contact_name' => 'required|string|max:255',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|string|max:255',
            'agree' => 'required|in:on',
            'feature' => 'nullable|array',
            'feature.*' => 'string|max:255',
            'main_image' => 'required|image|mimes:jpeg,png,jpg|max_size',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max_size',
        ]);

        if ($validator->fails()) {
            Log::error('Car Listing Store Validation Failed', ['error' => $validator->errors()->all()]);
            return redirect()->back()->withErrors($validator)->withInput($request->all())->with('error', 'Validation Error!');
        }

        try {
            DB::beginTransaction();
            $carListing = new CarListing();
            $carListing->title = $request->title;
            $carListing->user_id = auth()->user()->id;
            $carListing->condition = $request->condition ?? null;
            $carListing->car_body_type_id = $request->car_body_type_id;
            $carListing->car_brand_id = $request->car_brand_id;
            $carListing->car_model_id = $request->car_model_id;
            $carListing->price = $request->price;
            $carListing->year = $request->year ?? null;
            $carListing->drive_type = $request->drive_type ?? null;
            $carListing->transmission = $request->transmission;
            $carListing->car_fuel_type_id = $request->car_fuel_type_id;
            $carListing->mileage = $request->mileage;
            $carListing->engine_capacity = $request->engine_capacity;
            $carListing->fuel_efficiency = $request->fuel_efficiency ?? null;
            $carListing->cylenders = $request->cylenders ?? null;
            $carListing->color = $request->color;
            $carListing->doors = $request->doors;
            $carListing->seats = $request->seats;
            $carListing->vin = $request->vin ?? null;
            $carListing->address = $request->address;
            $carListing->city = $request->city;
            $carListing->state = $request->state;
            $carListing->zip_code = $request->zip_code;
            $carListing->description = $request->description;
            $carListing->contact_name = $request->contact_name;
            $carListing->contact_email = $request->contact_email;
            $carListing->contact_phone = $request->contact_phone;
            $carListing->horsepower = $request->horsepower ?? null;
            $carListing->status = 'published';

            if ($request->zip_code) {
                $geo = Http::get("https://api.postcodes.io/postcodes/" . urlencode($request->zip_code));
                if ($geo->successful() && isset($geo['result'])) {
                    $carListing->latitude = $geo['result']['latitude'];
                    $carListing->longitude = $geo['result']['longitude'];
                }
            }

            if ($request->feature) {
                $feature = json_encode(collect($request->feature)->values()->all());
                $carListing->features = $feature;
            }

            if ($request->hasFile('main_image')) {
                $Image = $request->file('main_image');
                $Image_ext = $Image->getClientOriginalExtension();
                $Image_name = time() . 'main_image.' . $Image_ext;

                $Image_path = 'uploads/car_listings';
                $Image->move(public_path($Image_path), $Image_name);
                $carListing->main_image = $Image_path . "/" . $Image_name;
            }

            $carListing->save();

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $key => $image) {
                    $Image = $image;
                    $Image_ext = $Image->getClientOriginalExtension();
                    $Image_name = time() . 'image_' . $key . '.' . $Image_ext;

                    $Image_path = 'uploads/car_listings/gallery';
                    $Image->move(public_path($Image_path), $Image_name);

                    $carListingImage = new CarListingImage();
                    $carListingImage->car_listing_id = $carListing->id;
                    $carListingImage->image_url = $Image_path . "/" . $Image_name;
                    $carListingImage->save();
                }
            }

            DB::commit();
            return redirect()->route('frontend.my-listings')->with('success', 'Your Car Listed Successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Car Listing Store Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->withInput($request->all())->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $user = Auth::user();
            $carListing = CarListing::findOrFail($id);
            $carListingImages = CarListingImage::where('car_listing_id', $id)->get();
            $carBrands = CarBrand::where('is_active', 'active')->get();
            $carBodyTypes = CarBodyType::where('is_active', 'active')->get();
            $carFuelTypes = CarFuelType::where('is_active', 'active')->get();
            $carFeatures = CarFeature::where('is_active', 'active')->get();
            return view('frontend.pages.user.edit-listing', compact('carListing', 'carListingImages', 'user', 'carBrands', 'carBodyTypes', 'carFuelTypes', 'carFeatures'));
        } catch (\Throwable $th) {
            Log::error('CarListing Edit Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        {
            // dd($request->all());
            // $this->authorize('create car listing');
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'condition' => 'nullable|in:new,used,certified',
                'car_body_type_id' => 'required|exists:car_body_types,id',
                'car_brand_id' => 'required|exists:car_brands,id',
                'car_model_id' => 'required|exists:car_models,id',
                'price' => 'required|numeric',
                'year' => 'required|integer',
                'drive_type' => 'nullable|in:2WD,4WD,AWD,RWD',
                'transmission' => 'required|in:automatic,manual,semi-automatic,cvt',
                'car_fuel_type_id' => 'required|exists:car_fuel_types,id',
                'mileage' => 'required|integer',
                'engine_capacity' => 'required|integer',
                'fuel_efficiency' => 'nullable|numeric',
                'cylenders' => 'nullable|integer',
                'color' => 'required|string|max:255',
                'doors' => 'required|integer',
                'seats' => 'required|integer',
                'horsepower' => 'nullable|integer',
                'vin' => 'nullable|string|max:255|unique:car_listings,vin,' . $id,
                'address' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'zip_code' => 'required|string|max:255',
                'description' => 'required|string',
                'contact_name' => 'required|string|max:255',
                'contact_email' => 'required|email',
                'contact_phone' => 'required|string|max:255',
                'feature' => 'nullable|array',
                'feature.*' => 'string|max:255',
                'main_image' => 'nullable|image|mimes:jpeg,png,jpg|max_size',
                'images' => 'nullable|array',
                'images.*' => 'image|mimes:jpeg,png,jpg|max_size',
            ]);

            if ($validator->fails()) {
                Log::error('Car Listing Store Validation Failed', ['error' => $validator->errors()->all()]);
                return redirect()->back()->withErrors($validator)->withInput($request->all())->with('error', 'Validation Error!');
            }

            try {
                DB::beginTransaction();
                $carListing = CarListing::findOrFail($id);
                $carListing->title = $request->title;
                $carListing->condition = $request->condition ?? null;
                $carListing->car_body_type_id = $request->car_body_type_id;
                $carListing->car_brand_id = $request->car_brand_id;
                $carListing->car_model_id = $request->car_model_id;
                $carListing->price = $request->price;
                $carListing->year = $request->year ?? null;
                $carListing->drive_type = $request->drive_type ?? null;
                $carListing->transmission = $request->transmission;
                $carListing->car_fuel_type_id = $request->car_fuel_type_id;
                $carListing->mileage = $request->mileage;
                $carListing->engine_capacity = $request->engine_capacity;
                $carListing->fuel_efficiency = $request->fuel_efficiency ?? null;
                $carListing->cylenders = $request->cylenders ?? null;
                $carListing->color = $request->color;
                $carListing->doors = $request->doors;
                $carListing->seats = $request->seats;
                $carListing->vin = $request->vin ?? null;
                $carListing->address = $request->address;
                $carListing->city = $request->city;
                $carListing->state = $request->state;
                $carListing->zip_code = $request->zip_code;
                $carListing->description = $request->description;
                $carListing->contact_name = $request->contact_name;
                $carListing->contact_email = $request->contact_email;
                $carListing->contact_phone = $request->contact_phone;
                $carListing->horsepower = $request->horsepower ?? null;

                if ($request->zip_code) {
                    $geo = Http::get("https://api.postcodes.io/postcodes/" . urlencode($request->zip_code));
                    if ($geo->successful() && isset($geo['result'])) {
                        $carListing->latitude = $geo['result']['latitude'];
                        $carListing->longitude = $geo['result']['longitude'];
                    }
                }

                if ($request->feature) {
                    $feature = json_encode(collect($request->feature)->values()->all());
                    $carListing->features = $feature;
                }

                if ($request->hasFile('main_image')) {
                    if (isset($carListing->main_image) && File::exists(public_path($carListing->main_image))) {
                        File::delete(public_path($carListing->main_image));
                    }
                    $Image = $request->file('main_image');
                    $Image_ext = $Image->getClientOriginalExtension();
                    $Image_name = time() . 'main_image.' . $Image_ext;

                    $Image_path = 'uploads/car_listings';
                    $Image->move(public_path($Image_path), $Image_name);
                    $carListing->main_image = $Image_path . "/" . $Image_name;
                }

                $carListing->save();

                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $key => $image) {
                        $Image = $image;
                        $Image_ext = $Image->getClientOriginalExtension();
                        $Image_name = time() . 'image_' . $key . '.' . $Image_ext;

                        $Image_path = 'uploads/car_listings/gallery';
                        $Image->move(public_path($Image_path), $Image_name);

                        $carListingImage = new CarListingImage();
                        $carListingImage->car_listing_id = $carListing->id;
                        $carListingImage->image_url = $Image_path . "/" . $Image_name;
                        $carListingImage->save();
                    }
                }

                DB::commit();
                return redirect()->route('frontend.my-listings')->with('success', 'Car Listing Updated Successfully');
            } catch (\Throwable $th) {
                DB::rollBack();
                Log::error('Car Listing Updation Failed', ['error' => $th->getMessage()]);
                return redirect()->back()->withInput($request->all())->with('error', "Something went wrong! Please try again later");
                throw $th;
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $carListing = CarListing::findOrFail($id);
            // if (isset($carListing->main_image) && File::exists(public_path($carListing->main_image))) {
            //     File::delete(public_path($carListing->main_image));
            // }
            // $carListingImages = CarListingImage::where('car_listing_id', $id)->get();
            // foreach ($carListingImages as $carListingImage) {
            //     if (isset($carListingImage->image_url) && File::exists(public_path($carListingImage->image_url))) {
            //         File::delete(public_path($carListingImage->image_url));
            //     }
            //     $carListingImage->delete();
            // }
            $carListing->delete();
            return redirect()->back()->with('success', 'Car Deleted from List Successfully');
        } catch (\Throwable $th) {
            Log::error('CarListing Delete Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }

    public function deleteImage($id)
    {
        try {
            $carListingImage = CarListingImage::findOrFail($id);
            if (isset($carListingImage->image_url) && File::exists(public_path($carListingImage->image_url))) {
                File::delete(public_path($carListingImage->image_url));
            }
            $carListingImage->delete();
            return response()->json([
                'success' => true,
                'message' => 'Image Deleted Successfully'
            ]);
        } catch (\Throwable $th) {
            Log::error('CarListing Image Delete Failed', ['error' => $th->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong! Please try again later'
            ]);
            throw $th;
        }
    }
}
