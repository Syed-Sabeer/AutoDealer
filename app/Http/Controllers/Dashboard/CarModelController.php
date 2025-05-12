<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CarBrand;
use App\Models\CarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $this->authorize('view car model');
        try {
            $carBrand = CarBrand::find($id);
            $carModels = CarModel::where('car_brand_id', $id)->get();
            return view('dashboard.car-model.index', compact('carModels','carBrand'));
        } catch (\Throwable $th) {
            Log::error('CarModel Index Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $this->authorize('create car model');
        try {
            $carBrand = CarBrand::find($id);
            return view('dashboard.car-model.create', compact('carBrand'));
        } catch (\Throwable $th) {
            Log::error('Car Model Create Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        // dd($request->all());
        $this->authorize('create car model');
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:car_models,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max_size',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            Log::error('Car Model Store Validation Failed', ['error' => $validator->errors()->all()]);
            return redirect()->back()->withErrors($validator)->withInput($request->all())->with('error', 'Validation Error!');
        }

        try {
            DB::beginTransaction();
            $carModel = new CarModel();
            $carModel->car_brand_id = $id;
            $carModel->name = $request->name;
            $carModel->slug = $request->slug;
            $carModel->description = $request->description;

            if ($request->hasFile('image')) {
                $Image = $request->file('image');
                $Image_ext = $Image->getClientOriginalExtension();
                $Image_name = time() . '_image.' . $Image_ext;

                $Image_path = 'uploads/company/models';
                $Image->move(public_path($Image_path), $Image_name);
                $carModel->image = $Image_path . "/" . $Image_name;
            }

            $carModel->save();

            DB::commit();
            return redirect()->route('dashboard.car-models.index', $id)->with('success', 'Car Model Created Successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Car Model Store Failed', ['error' => $th->getMessage()]);
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
        $this->authorize('update car model');
        try {
            $carModel = CarModel::findOrFail($id);
            return view('dashboard.car-model.edit', compact('carModel'));
        } catch (\Throwable $th) {
            Log::error('Car Model Edit Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('update car model');
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:car_brands,slug,'.$id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max_size',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all())->with('error', 'Validation Error!');
        }
        try {
            $carModel = CarModel::findOrFail($id);
            $carModel->name = $request->name;
            $carModel->slug = $request->slug;
            $carModel->description = $request->description;

            if ($request->hasFile('image')) {
                if (isset($blog->meta_image) && File::exists(public_path($blog->meta_image))) {
                    File::delete(public_path($blog->meta_image));
                }
                $Image = $request->file('image');
                $Image_ext = $Image->getClientOriginalExtension();
                $Image_name = time() . '_image.' . $Image_ext;

                $Image_path = 'uploads/company/models';
                $Image->move(public_path($Image_path), $Image_name);
                $carModel->image = $Image_path . "/" . $Image_name;
            }

            $carModel->save();

            return redirect()->route('dashboard.car-models.index', $carModel->car_brand_id)->with('success', 'Car Model Updated Successfully');
        } catch (\Throwable $th) {
            Log::error('CarModel Update Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete car model');
        try {
            $carModel = CarModel::findOrFail($id);
            if (isset($carModel->image) && File::exists(public_path($carModel->image))) {
                File::delete(public_path($carModel->image));
            }
            $carModel->delete();
            return redirect()->back()->with('success', 'Car Model Deleted Successfully');
        } catch (\Throwable $th) {
            Log::error('Car Model Delete Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }

    public function updateStatus(string $id)
    {
        $this->authorize('update car model');
        try {
            $carModel = CarModel::findOrFail($id);
            $message = $carModel->is_active == 'active' ? 'Car Model Deactivated Successfully' : 'Car Model Activated Successfully';
            if ($carModel->is_active == 'active') {
                $carModel->is_active = 'inactive';
                $carModel->save();
            } else {
                $carModel->is_active = 'active';
                $carModel->save();
            }
            return redirect()->back()->with('success', $message);
        } catch (\Throwable $th) {
            Log::error('Car Model Status Updation Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }
}
