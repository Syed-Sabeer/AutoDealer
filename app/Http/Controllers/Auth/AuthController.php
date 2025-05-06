<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * User Logout
     */
    public function logout()
    {
        try {
            Auth::logout();
            return Redirect::route('login')->with('success', 'Logout Successfully!');
        } catch (\Throwable $th) {
            return Redirect::back()->with('error', "Something went wrong! Please try again later");
        }
    }

    public function login_verification()
    {
        if (Auth::user() && Auth::user()->email_verified_at !== null) {
            return view('auth.verification');
        } else {
            return redirect()->route('dashboard');
        }
    }

    // public function verify_account(Request $request)
    // {
    //     // dd($request->code);
    //     $validate = Validator::make($request->all(), [
    //         'code' => 'required|min:4|max:20',
    //     ]);

    //     if ($validate->fails()) {
    //         return Redirect::back()->withErrors($validate)->withInput($request->all())->with('error', 'Validation Error!');
    //     }
    //     try {
    //         $user = User::where('email', Auth::user()->email)->where('verification_code', $request->code)->first();
    //         if ($user) {
    //             // User Found
    //             $user->verification_status = 1;
    //             $user->code_resend_count = 0;
    //             $user->save();
    //             return redirect()->route('dashboard')->with('success', 'Your Account Has Been Verified');
    //         } else {
    //             return redirect()->back()->withInput($request->all())->with('error', "Please Enter Valid Code");
    //         }
    //     } catch (\Throwable $th) {
    //         // throw $th;
    //         return redirect()->back()->withInput($request->all())->with('error', "Request Failed:" . $th->getMessage());
    //     }
    // }

    // public function resend_code()
    // {
    //     try {
    //         if (Auth::check()) {

    //             $user = User::find(Auth::user()->id);
    //             $user->verification_code = random_int(10000, 999999);
    //             $user->code_resend_count = $user->code_resend_count+1;
    //             $user->save();

    //             $details = [
    //                 'email' => $user->email,
    //                 'title' => 'Mail from '. \App\Helpers\Helper::getCompanyName(),
    //                 'url' => route('login.verification'),
    //                 'body' => 'Here is your login verification code:',
    //                 'verification_code' => $user->verification_code
    //             ];

    //             dispatch(new SendVerificationCodeEmailJob($details));

    //             return response()->json([
    //                 'message' => "Verfication code has been updated"
    //             ]);
    //         } else {
    //             return response()->json([
    //                 'error' => 'Authentication Error, please try again!'
    //             ],400);
    //         }
    //     }catch(Exception $e) {
    //         return response()->json([
    //             'message' => $e->getMessage()
    //         ]);
    //         // dd($e->getMessage());
    //     }
    // }

    public function verification_verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->route('dashboard');
    }

    public function verification_notice()
    {
        try {
            $user = Auth::user();
            if ($user->email_verified_at !== null) {
                return redirect()->route('dashboard');
            }
            return view('auth.verify-email');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
        }
    }

    public function verification_send(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }
}
