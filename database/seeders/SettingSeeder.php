<?php

namespace Database\Seeders;

use App\Models\CompanySetting;
use App\Models\EmailSetting;
use App\Models\OtherSetting;
use App\Models\RecaptchaSetting;
use App\Models\SystemSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanySetting::create([
            'company_name' => 'Auto Dealer',
            'about' => 'We connect buyers and sellers with a seamless, trusted platform for discovering the perfect car. Our curated listings and user-friendly experience make car buying and selling simple and reliable.',
            'facebook_url' => 'https://www.facebook.com/',
            'linkedin_url' => 'https://www.linkedin.com/',
            'instagram_url' => 'https://www.instagram.com/',
            'twitter_url' => 'https://www.twitter.com/',
        ]);

        RecaptchaSetting::create([
            'google_recaptcha_type' => 'no_captcha',
        ]);

        SystemSetting::create([
            'max_upload_size' => '2048',
            'currency_symbol' => '$',
            'currency_symbol_position' => 'prefix',
            'footer_text' => 'All Copyrights Reserved',
        ]);

        EmailSetting::create([
            'mail_driver' => 'smtp',
            'mail_host' => 'smtp.mailtrap.io',
            'mail_port' => '2525',
            'mail_username' => '725adb089beee5',
            'mail_password' => 'b63984536f3df4',
            'mail_encryption' => 'tls',
            'mail_from_address' => 'admin@example.com',
            'mail_from_name' => 'Admin',
            'is_enabled' => '1',
        ]);
    }
}
