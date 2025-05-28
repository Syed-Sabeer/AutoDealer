<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CarFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('view feature');
        try {
            $carFeatures = CarFeature::orderBy('name')->get();
            return view('dashboard.feature.index', compact('carFeatures'));
        } catch (\Throwable $th) {
            Log::error('carFeatures Index Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create feature');
        try {
            return view('dashboard.feature.create');
        } catch (\Throwable $th) {
            Log::error('carFeatures Create Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->authorize('create feature');
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:car_features,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max_size',
            'description' => 'nullable|string',
            'is_featured' => 'nullable|in:on',
        ]);

        if ($validator->fails()) {
            Log::error('carFeatures Store Validation Failed', ['error' => $validator->errors()->all()]);
            return redirect()->back()->withErrors($validator)->withInput($request->all())->with('error', 'Validation Error!');
        }

        try {
            DB::beginTransaction();
            $isFeatured = isset($request->is_featured) && $request->is_featured == 'on' ? '1' : '0';
            $carFeature = new CarFeature();
            $carFeature->name = $request->name;
            $carFeature->slug = $request->slug;
            $carFeature->description = $request->description;
            $carFeature->is_featured = $isFeatured;

            if ($request->hasFile('image')) {
                $Image = $request->file('image');
                $Image_ext = $Image->getClientOriginalExtension();
                $Image_name = time() . '_image.' . $Image_ext;

                $Image_path = 'uploads/company/features';
                $Image->move(public_path($Image_path), $Image_name);
                $carFeature->image = $Image_path . "/" . $Image_name;
            }

            $carFeature->save();

            DB::commit();
            return redirect()->route('dashboard.features.index')->with('success', 'Car Feature Created Successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Car Features Store Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
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
        $this->authorize('update feature');
        try {
            $carFeature = CarFeature::findOrFail($id);
            return view('dashboard.feature.edit', compact('carFeature'));
        } catch (\Throwable $th) {
            Log::error('carFeature Edit Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('update feature');
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:car_features,slug,'.$id,
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max_size',
            'description' => 'nullable|string',
            'is_featured' => 'nullable|in:on',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all())->with('error', 'Validation Error!');
        }
        try {
            $isFeatured = isset($request->is_featured) && $request->is_featured == 'on' ? '1' : '0';
            $carFeature = CarFeature::findOrFail($id);
            $carFeature->name = $request->name;
            $carFeature->slug = $request->slug;
            $carFeature->description = $request->description;
            $carFeature->is_featured = $isFeatured;

            if ($request->hasFile('image')) {
                if (isset($carFeature->image) && File::exists(public_path($carFeature->image))) {
                    File::delete(public_path($carFeature->image));
                }
                $Image = $request->file('image');
                $Image_ext = $Image->getClientOriginalExtension();
                $Image_name = time() . '_image.' . $Image_ext;

                $Image_path = 'uploads/company/fuel_types';
                $Image->move(public_path($Image_path), $Image_name);
                $carFeature->image = $Image_path . "/" . $Image_name;
            }

            $carFeature->save();

            return redirect()->route('dashboard.features.index')->with('success', 'Car Feature Updated Successfully');
        } catch (\Throwable $th) {
            Log::error('carFeature Update Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete feature');
        try {
            $carFeature = CarFeature::findOrFail($id);
            if (isset($carFeature->image) && File::exists(public_path($carFeature->image))) {
                File::delete(public_path($carFeature->image));
            }
            $carFeature->delete();
            return redirect()->back()->with('success', 'Car Feature Deleted Successfully');
        } catch (\Throwable $th) {
            Log::error('Car Feature Delete Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }

    public function updateStatus(string $id)
    {
        $this->authorize('update feature');
        try {
            $carFeature = CarFeature::findOrFail($id);
            $message = $carFeature->is_active == 'active' ? 'Car Feature Deactivated Successfully' : 'Car Feature Activated Successfully';
            if ($carFeature->is_active == 'active') {
                $carFeature->is_active = 'inactive';
                $carFeature->save();
            } else {
                $carFeature->is_active = 'active';
                $carFeature->save();
            }
            return redirect()->back()->with('success', $message);
        } catch (\Throwable $th) {
            Log::error('Car Feature Status Updation Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }
}
