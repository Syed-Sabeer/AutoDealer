<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::user();
            $profile = Profile::with('gender','maritalStatus','language','designation','country')->where('user_id', $user->id)->first();
            return view('frontend.pages.user.dashboard',compact('profile','user'));
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
            $user = Auth::user();
            $profile = Profile::with('gender','maritalStatus','language','designation','country')->where('user_id', $user->id)->first();
            return view('frontend.pages.user.my-listing',compact('profile','user'));
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
            $profile = Profile::with('gender','maritalStatus','language','designation','country')->where('user_id', $user->id)->first();
            return view('frontend.pages.user.add-listing',compact('profile','user'));
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
            return view('frontend.pages.user.my-favourite',compact('profile','user'));
        } catch (\Throwable $th) {
            Log::error('Frontend Dashboard Index Failed', ['error' => $th->getMessage()]);
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
}
