<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CarListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArchivedCarListingController extends Controller
{
    public function index()
    {
        $this->authorize('view archived car listing');
        try {
            $archivedCarListings = CarListing::onlyTrashed()->get();
            return view('dashboard.archived-car-listing.index', compact('archivedCarListings'));
        } catch (\Throwable $th) {
            // throw $th;
            Log::error("Archived Car Listing Index Failed:" . $th->getMessage());
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
        }
    }

    public function destroy(string $id)
    {
        $this->authorize('delete archived car listing');
        try {
            $carListing = CarListing::withTrashed()->findOrFail($id);
            $carListing->forceDelete();
            return redirect()->route('dashboard.archived-car-listings.index')->with('success', 'Car Listing Permanently Deleted Successfully');
        } catch (\Throwable $th) {
            // Handle the exception
            // throw $th;
            Log::error("archived car listing destroy Failed:" . $th->getMessage());
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
        }
    }

    public function restoreCarListing($id)
    {
        // dd($id);
        $this->authorize('update archived car listing');
        try {
            $carListing = CarListing::onlyTrashed()->findOrFail($id);
            $carListing->restore();
            return redirect()->route('dashboard.archived-car-listings.index')->with('success', 'Car Listing Restored Successfully');
        } catch (\Throwable $th) {
            // Handle the exception
            // throw $th;
            Log::error("Archived car listing restore Failed:" . $th->getMessage());
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
        }
    }
}
