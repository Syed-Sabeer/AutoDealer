<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\CarListing;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole(['seller', 'user'])) {
            return redirect()->route('frontend.dashboard');
        }
        $totalSellers = User::role('seller')->count();
        $totalDeactivatedSellers = User::role('seller')->where('is_active', 'inactive')->count();
        $totalActiveSellers = User::role('seller')->where('is_active', 'active')->count();
        $totalUnverifiedSellers = User::role('seller')->where('email_verified_at', null)->count();
        $totalArchivedSellers = User::role('seller')->onlyTrashed()->count();

        $totalCarListed = CarListing::count();
        $draftedCarListings = CarListing::where('status', 'draft')->count();
        $publishedCarListings = CarListing::where('status', 'published')->count();
        $soldCarListings = CarListing::where('status', 'sold')->count();
        return view('dashboard.index', compact(
            'totalSellers', 
            'totalDeactivatedSellers', 
            'totalActiveSellers',
            'totalUnverifiedSellers',
            'totalArchivedSellers',
            'totalCarListed',
            'draftedCarListings',
            'publishedCarListings',
            'soldCarListings',
        ));
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
