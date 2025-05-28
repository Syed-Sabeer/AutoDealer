<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CarBodyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class BodyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('view body type');
        try {
            $carBodyTypes = CarBodyType::orderBy('name')->get();
            return view('dashboard.body-type.index', compact('carBodyTypes'));
        } catch (\Throwable $th) {
            Log::error('CarBodyType Index Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create body type');
        try {
            return view('dashboard.body-type.create');
        } catch (\Throwable $th) {
            Log::error('CarBodyType Create Failed', ['error' => $th->getMessage()]);
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
        $this->authorize('create body type');
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:car_body_types,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max_size',
            'description' => 'nullable|string',
            'is_featured' => 'nullable|in:on',
        ]);

        if ($validator->fails()) {
            Log::error('Car Body Type Store Validation Failed', ['error' => $validator->errors()->all()]);
            return redirect()->back()->withErrors($validator)->withInput($request->all())->with('error', 'Validation Error!');
        }

        try {
            DB::beginTransaction();
            $isFeatured = isset($request->is_featured) && $request->is_featured == 'on' ? '1' : '0';
            $carBodyType = new CarBodyType();
            $carBodyType->name = $request->name;
            $carBodyType->slug = $request->slug;
            $carBodyType->description = $request->description;
            $carBodyType->is_featured = $isFeatured;

            if ($request->hasFile('image')) {
                $Image = $request->file('image');
                $Image_ext = $Image->getClientOriginalExtension();
                $Image_name = time() . '_image.' . $Image_ext;

                $Image_path = 'uploads/company/body_types';
                $Image->move(public_path($Image_path), $Image_name);
                $carBodyType->image = $Image_path . "/" . $Image_name;
            }

            $carBodyType->save();

            DB::commit();
            return redirect()->route('dashboard.body-types.index')->with('success', 'Car Body type Created Successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Car Body type Store Failed', ['error' => $th->getMessage()]);
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
        $this->authorize('update body type');
        try {
            $carBodyType = CarBodyType::findOrFail($id);
            return view('dashboard.body-type.edit', compact('carBodyType'));
        } catch (\Throwable $th) {
            Log::error('Car Body Type Edit Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('update body type');
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:car_body_types,slug,'.$id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max_size',
            'description' => 'nullable|string',
            'is_featured' => 'nullable|in:on',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all())->with('error', 'Validation Error!');
        }
        try {
            $isFeatured = isset($request->is_featured) && $request->is_featured == 'on' ? '1' : '0';
            $carBodyType = CarBodyType::findOrFail($id);
            $carBodyType->name = $request->name;
            $carBodyType->slug = $request->slug;
            $carBodyType->description = $request->description;
            $carBodyType->is_featured = $isFeatured;

            if ($request->hasFile('image')) {
                if (isset($carBodyType->image) && File::exists(public_path($carBodyType->image))) {
                    File::delete(public_path($carBodyType->image));
                }
                $Image = $request->file('image');
                $Image_ext = $Image->getClientOriginalExtension();
                $Image_name = time() . '_image.' . $Image_ext;

                $Image_path = 'uploads/company/body_types';
                $Image->move(public_path($Image_path), $Image_name);
                $carBodyType->image = $Image_path . "/" . $Image_name;
            }

            $carBodyType->save();

            return redirect()->route('dashboard.body-types.index')->with('success', 'Car Body Type Updated Successfully');
        } catch (\Throwable $th) {
            Log::error('CarBodyType Update Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete body type');
        try {
            $carBodyType = CarBodyType::findOrFail($id);
            if (isset($carBodyType->image) && File::exists(public_path($carBodyType->image))) {
                File::delete(public_path($carBodyType->image));
            }
            $carBodyType->delete();
            return redirect()->back()->with('success', 'Car Body Type Deleted Successfully');
        } catch (\Throwable $th) {
            Log::error('Car Body Type Delete Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }

    public function updateStatus(string $id)
    {
        $this->authorize('update body type');
        try {
            $carBodyType = CarBodyType::findOrFail($id);
            $message = $carBodyType->is_active == 'active' ? 'Car Body Type Deactivated Successfully' : 'Car Body Type Activated Successfully';
            if ($carBodyType->is_active == 'active') {
                $carBodyType->is_active = 'inactive';
                $carBodyType->save();
            } else {
                $carBodyType->is_active = 'active';
                $carBodyType->save();
            }
            return redirect()->back()->with('success', $message);
        } catch (\Throwable $th) {
            Log::error('Car Body Type Status Updation Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }
}
