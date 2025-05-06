<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use App\Models\CompanySetting;
use App\Models\Country;
use App\Models\Designation;
use App\Models\EmailSetting;
use App\Models\Gender;
use App\Models\Language;
use App\Models\MaritalStatus;
use App\Models\OtherSetting;
use App\Models\Profile;
use App\Models\RecaptchaSetting;
use App\Models\SystemSetting;
use App\Models\Timezone;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('view setting');
        try {
            $user = Auth::user();
            $countries = Country::where('is_active', 'active')->get();
            $languages = Language::where('is_active', 'active')->get();
            $timezones = Timezone::where('is_active', 'active')->get();
            $companySetting = CompanySetting::first();
            $recaptchaSetting = RecaptchaSetting::first();
            $systemSetting = SystemSetting::first();
            $emailSetting = EmailSetting::first();
            return view('dashboard.settings.index',compact('countries','companySetting','recaptchaSetting','systemSetting','languages','timezones','emailSetting'));
        } catch (\Throwable $th) {
            Log::error('Settings index Failed', ['error' => $th->getMessage()]);
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

    public function updateCompanySettings(Request $request, $id)
    {
        if (!Gate::any(['update setting', 'create setting'])) {
            abort(403, 'Unauthorized');
        }
        // dd($request->all());
        $validate = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'nullable|numeric', // Changed from integer
            'country_id' => 'nullable|integer|exists:countries,id', // Ensuring it's an integer
            'city' => 'nullable|string|max:255',
            'zip' => 'nullable|digits:6', // Ensuring it's exactly 6 digits
            'address' => 'nullable|string|max:255',
            'light_logo' => 'nullable|file|mimes:jpeg,png,jpg|max_size',
            'dark_logo' => 'nullable|file|mimes:jpeg,png,jpg|max_size',
            'favicon' => 'nullable|file|mimes:jpeg,png,jpg|max_size',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput($request->all())->with('error', 'Validation Error!');
        }
        try {
            $companySetting = CompanySetting::find($id);
            if(!$companySetting){
                $companySetting = new CompanySetting();
            }
            $companySetting->company_name = $request->company_name;
            $companySetting->email = $request->email;
            $companySetting->phone_number = $request->phone_number;
            $companySetting->country_id = $request->country_id;
            $companySetting->city = $request->city;
            $companySetting->zip = $request->zip;
            $companySetting->address = $request->address;
            if ($request->hasFile('light_logo')) {
                if (isset($companySetting->light_logo) && File::exists(public_path($companySetting->light_logo))) {
                    File::delete(public_path($companySetting->light_logo));
                }

                $lightLogo = $request->file('light_logo');
                $lightLogo_ext = $lightLogo->getClientOriginalExtension();
                $lightLogo_name = time() . '_lightLogo.' . $lightLogo_ext;

                $lightLogo_path = 'uploads/company';
                $lightLogo->move(public_path($lightLogo_path), $lightLogo_name);
                $companySetting->light_logo = $lightLogo_path . "/" . $lightLogo_name;
            }
            if ($request->hasFile('dark_logo')) {
                if (isset($companySetting->dark_logo) && File::exists(public_path($companySetting->dark_logo))) {
                    File::delete(public_path($companySetting->dark_logo));
                }

                $darkLogo = $request->file('dark_logo');
                $darkLogo_ext = $darkLogo->getClientOriginalExtension();
                $darkLogo_name = time() . '_darkLogo.' . $darkLogo_ext;

                $darkLogo_path = 'uploads/company';
                $darkLogo->move(public_path($darkLogo_path), $darkLogo_name);
                $companySetting->dark_logo = $darkLogo_path . "/" . $darkLogo_name;
            }
            if ($request->hasFile('favicon')) {
                if (isset($companySetting->favicon) && File::exists(public_path($companySetting->favicon))) {
                    File::delete(public_path($companySetting->favicon));
                }

                $favicon = $request->file('favicon');
                $favicon_ext = $favicon->getClientOriginalExtension();
                $favicon_name = time() . '_favicon.' . $favicon_ext;

                $favicon_path = 'uploads/company';
                $favicon->move(public_path($favicon_path), $favicon_name);
                $companySetting->favicon = $favicon_path . "/" . $favicon_name;
            }
            $companySetting->save();
            return redirect()->back()->with('success', 'Company Settings Updated Successfully');
        } catch (\Throwable $th) {
            throw $th;
            Log::error('Company Settings Update Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
        }
    }

    public function updateRecaptchaSettings(Request $request, $id)
    {
        if (!Gate::any(['update setting', 'create setting'])) {
            abort(403, 'Unauthorized');
        }
        $rules = [
            'google_recaptcha_type' => 'required|in:v2,v3,no_captcha',
        ];

        // Conditionally add validation rules based on the google_recaptcha_type value
        if ($request->input('google_recaptcha_type') !== 'no_captcha') {
            $rules['google_recaptcha_key'] = 'required|string|max:255';
            $rules['google_recaptcha_secret'] = 'required|string|max:255';
        } else {
            $rules['google_recaptcha_key'] = 'nullable|string|max:255';
            $rules['google_recaptcha_secret'] = 'nullable|string|max:255';
        }

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return Redirect()->back()->withErrors($validator)->withInput($request->all())->with('error', 'File Validation Error!');
        }
        try {
            $recaptchaSetting = RecaptchaSetting::find($id);
            if(!$recaptchaSetting){
                $recaptchaSetting = new RecaptchaSetting();
            }
            $recaptchaSetting->google_recaptcha_key = $request->google_recaptcha_key;
            $recaptchaSetting->google_recaptcha_secret = $request->google_recaptcha_secret;
            $recaptchaSetting->google_recaptcha_type = $request->google_recaptcha_type;
            $recaptchaSetting->save();
            return redirect()->back()->with('success', 'Recaptcha Settings Updated Successfully');
        } catch (\Throwable $th) {
            throw $th;
            Log::error('Recaptcha Settings Update Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
        }
    }

    public function updateSystemSettings(Request $request, $id)
    {
        if (!Gate::any(['update setting', 'create setting'])) {
            abort(403, 'Unauthorized');
        }
        $rules = [
            'max_upload_size' => 'required|numeric',
            'currency_symbol' => 'required|string|max:255',
            'currency_symbol_position' => 'required|in:prefix,postfix',
            'language_id' => 'nullable|exists:languages,id',
            'timezone_id' => 'nullable|exists:timezones,id',
            'footer_text' => 'required|string|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return Redirect()->back()->withErrors($validator)->withInput($request->all())->with('error', 'Validation Error!');
        }
        try {
            $systemSetting = SystemSetting::find($id);
            if(!$systemSetting){
                $systemSetting = new SystemSetting();
            }
            $systemSetting->max_upload_size = $request->max_upload_size;
            $systemSetting->currency_symbol = $request->currency_symbol;
            $systemSetting->currency_symbol_position = $request->currency_symbol_position;
            $systemSetting->language_id = $request->language_id;
            $systemSetting->timezone_id = $request->timezone_id;
            $systemSetting->footer_text = $request->footer_text;
            $systemSetting->save();
            return redirect()->back()->with('success', 'System Settings Updated Successfully');
        } catch (\Throwable $th) {
            // throw $th;
            Log::error('System Settings Update Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
        }
    }

    public function updateEmailSettings(Request $request, $id)
    {
        if (!Gate::any(['update setting', 'create setting'])) {
            abort(403, 'Unauthorized');
        }
        $rules = [
            'mail_driver' => 'required|string|max:255',
            'mail_host' => 'required|string|max:255',
            'mail_port' => 'required|string|max:255',
            'mail_username' => 'required|string|max:255',
            'mail_password' => 'required|string|max:255',
            'mail_encryption' => 'required|string|max:255',
            'mail_from_address' => 'required|email',
            'mail_from_name' => 'required|string|max:255',
            'is_enabled' => 'required|in:0,1',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return Redirect()->back()->withErrors($validator)->withInput($request->all())->with('error', 'Validation Error!');
        }
        try {
            $emailSetting = EmailSetting::find($id);
            if(!$emailSetting){
                $emailSetting = new EmailSetting();
            }
            $emailSetting->mail_driver = $request->mail_driver;
            $emailSetting->mail_host = $request->mail_host;
            $emailSetting->mail_port = $request->mail_port;
            $emailSetting->mail_username = $request->mail_username;
            $emailSetting->mail_password = $request->mail_password;
            $emailSetting->mail_encryption = $request->mail_encryption;
            $emailSetting->mail_from_address = $request->mail_from_address;
            $emailSetting->mail_from_name = $request->mail_from_name;
            $emailSetting->is_enabled = $request->is_enabled;
            $emailSetting->save();
            return redirect()->back()->with('success', 'Email Settings Updated Successfully');
        } catch (\Throwable $th) {
            // throw $th;
            Log::error('Email Settings Update Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
        }
    }

    public function sendTestMail(Request $request)
    {
        $this->authorize('view setting');
        $validator = Validator::make($request->all(), [
            'test_mail' => 'required|email',
        ]);
        if($validator->fails()) {
            return Redirect()->back()->withErrors($validator)->withInput($request->all())->with('error', 'Test Email Validation Error!');
        }
        $recipient = $request->test_mail;
        $messageContent = 'This is a test email sent from your application.';
        try {
            Mail::to($recipient)->send(new TestMail($messageContent, $recipient));
            return redirect()->back()->with('success', 'Test Email Sent Successfully');
        } catch (\Throwable $th) {
            // throw $th;
            Log::error('Test Email Sent Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
        }
    }
}
