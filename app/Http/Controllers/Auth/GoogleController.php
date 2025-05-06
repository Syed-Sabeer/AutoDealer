<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            DB::beginTransaction();
            $googleUser = Socialite::driver('google')->user();

            Log::info('Google user data:', ['user' => $googleUser]);
            // Check if the user already exists
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                $user = new User();
                $user->name = $googleUser->getName();
                $user->email = $googleUser->getEmail();
                $user->password = Hash::make($googleUser->getEmail());
                $user->provider = 'google';
                $user->provider_id = $googleUser->getId();
                $user->email_verified_at = now();
                $username = $this->generateUsername($googleUser->getName());

                while (User::where('username', $username)->exists()) {
                    $username = $this->generateUsername($googleUser->getName());
                }
                $user->username = $username;
                $user->save();

                app('notificationService')->notifyUsers([$user], 'Welcome to ' . Helper::getCompanyName());
                app('notificationService')->notifyUsers([$user], 'You have been registered from google and your password is your email please change it to secured one from your profile security settings.');
            }

            $user->syncRoles('user');

            $profile = Profile::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'first_name'    => $googleUser->getName(),
                ]
            );
            if ($googleUser->getAvatar()) {
                if (isset($profile->profile_image) && File::exists(public_path($profile->profile_image))) {
                    File::delete(public_path($profile->profile_image));
                }
            
                $profileImageUrl = $googleUser->getAvatar(); // Get Google avatar URL
                $profileImage_ext = pathinfo($profileImageUrl, PATHINFO_EXTENSION) ?: 'jpg'; // Default to jpg if missing
                $profileImage_name = time() . '_profileImage.' . $profileImage_ext;
            
                $profileImage_path = 'uploads/profile-images';
                $fullImagePath = base_path("public/" . $profileImage_path . "/" . $profileImage_name); // Fixed path
            
                // Ensure directory exists
                if (!File::exists(base_path("public/" . $profileImage_path))) {
                    File::makeDirectory(base_path("public/" . $profileImage_path), 0777, true, true);
                }
            
                // Download and store the image
                file_put_contents($fullImagePath, file_get_contents($profileImageUrl));
            
                // Save to database
                $profile->profile_image = $profileImage_path . "/" . $profileImage_name;
                $profile->save();
            }                       

            Auth::attempt(['email' => $user->email, 'password' => $user->email]);
            DB::commit();
            return redirect()->route('dashboard')->with('success', 'Google login successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Google login failed:', ['error' => $e->getMessage()]);
            return redirect()->route('login')->with('error', 'Google login failed. Please try again.');
        }
    }

    public function generateUsername($name)
    {
        $name = strtolower(str_replace(' ', '', $name));
        $username = $name . rand(1000, 9999); // Random 4-digit number
        return $username;
    }

}
