<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CarFuelType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FuelTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('view fuel type');
        try {
            $carFuelTypes = CarFuelType::orderBy('name')->get();
            return view('dashboard.fuel-type.index', compact('carFuelTypes'));
        } catch (\Throwable $th) {
            Log::error('carFuelType Index Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create fuel type');
        try {
            return view('dashboard.fuel-type.create');
        } catch (\Throwable $th) {
            Log::error('CarfuelType Create Failed', ['error' => $th->getMessage()]);
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
        $this->authorize('create fuel type');
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:car_fuel_types,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max_size',
            'description' => 'nullable|string',
            'is_featured' => 'nullable|in:on',
        ]);

        if ($validator->fails()) {
            Log::error('Car Fuel Type Store Validation Failed', ['error' => $validator->errors()->all()]);
            return redirect()->back()->withErrors($validator)->withInput($request->all())->with('error', 'Validation Error!');
        }

        try {
            DB::beginTransaction();
            $isFeatured = isset($request->is_featured) && $request->is_featured == 'on' ? '1' : '0';
            $carFuelType = new CarFuelType();
            $carFuelType->name = $request->name;
            $carFuelType->slug = $request->slug;
            $carFuelType->description = $request->description;
            $carFuelType->is_featured = $isFeatured;

            if ($request->hasFile('image')) {
                $Image = $request->file('image');
                $Image_ext = $Image->getClientOriginalExtension();
                $Image_name = time() . '_image.' . $Image_ext;

                $Image_path = 'uploads/company/fuel_types';
                $Image->move(public_path($Image_path), $Image_name);
                $carFuelType->image = $Image_path . "/" . $Image_name;
            }

            $carFuelType->save();

            DB::commit();
            return redirect()->route('dashboard.fuel-types.index')->with('success', 'Car Fuel type Created Successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Car Fuel type Store Failed', ['error' => $th->getMessage()]);
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
        $this->authorize('update fuel type');
        try {
            $carFuelType = CarFuelType::findOrFail($id);
            return view('dashboard.fuel-type.edit', compact('carFuelType'));
        } catch (\Throwable $th) {
            Log::error('Car Fuel Type Edit Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('update fuel type');
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:car_fuel_types,slug,'.$id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max_size',
            'description' => 'nullable|string',
            'is_featured' => 'nullable|in:on',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all())->with('error', 'Validation Error!');
        }
        try {
            $isFeatured = isset($request->is_featured) && $request->is_featured == 'on' ? '1' : '0';
            $carFuelType = CarFuelType::findOrFail($id);
            $carFuelType->name = $request->name;
            $carFuelType->slug = $request->slug;
            $carFuelType->description = $request->description;
            $carFuelType->is_featured = $isFeatured;

            if ($request->hasFile('image')) {
                if (isset($carFuelType->image) && File::exists(public_path($carFuelType->image))) {
                    File::delete(public_path($carFuelType->image));
                }
                $Image = $request->file('image');
                $Image_ext = $Image->getClientOriginalExtension();
                $Image_name = time() . '_image.' . $Image_ext;

                $Image_path = 'uploads/company/fuel_types';
                $Image->move(public_path($Image_path), $Image_name);
                $carFuelType->image = $Image_path . "/" . $Image_name;
            }

            $carFuelType->save();

            return redirect()->route('dashboard.fuel-types.index')->with('success', 'Car Fuel Type Updated Successfully');
        } catch (\Throwable $th) {
            Log::error('CarFuelType Update Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete fuel type');
        try {
            $carFuelType = CarFuelType::findOrFail($id);
            if (isset($carFuelType->image) && File::exists(public_path($carFuelType->image))) {
                File::delete(public_path($carFuelType->image));
            }
            $carFuelType->delete();
            return redirect()->back()->with('success', 'Car Fuel Type Deleted Successfully');
        } catch (\Throwable $th) {
            Log::error('Car Fuel Type Delete Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }

    public function updateStatus(string $id)
    {
        $this->authorize('update fuel type');
        try {
            $carFuelType = CarFuelType::findOrFail($id);
            $message = $carFuelType->is_active == 'active' ? 'Car Fuel Type Deactivated Successfully' : 'Car Fuel Type Activated Successfully';
            if ($carFuelType->is_active == 'active') {
                $carFuelType->is_active = 'inactive';
                $carFuelType->save();
            } else {
                $carFuelType->is_active = 'active';
                $carFuelType->save();
            }
            return redirect()->back()->with('success', $message);
        } catch (\Throwable $th) {
            Log::error('Car Fuel Type Status Updation Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }
}

