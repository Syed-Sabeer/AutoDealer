<?php

namespace App\Providers;

use App\Models\EmailSetting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class MailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        try {
            $emailSetting = EmailSetting::first();
            if ($emailSetting) {
                Config::set('mail.default', $emailSetting ? $emailSetting->mail_driver : env('MAIL_MAILER', 'smtp'));
                Config::set('mail.mailers.smtp.host', $emailSetting ? $emailSetting->mail_host : env('MAIL_HOST', 'default_host'));
                Config::set('mail.mailers.smtp.port', $emailSetting ? $emailSetting->mail_port : env('MAIL_PORT', 587));
                Config::set('mail.mailers.smtp.username', $emailSetting ? $emailSetting->mail_username : env('MAIL_USERNAME', 'default_username'));
                Config::set('mail.mailers.smtp.password', $emailSetting ? $emailSetting->mail_password : env('MAIL_PASSWORD', 'default_password'));
                Config::set('mail.mailers.smtp.encryption', $emailSetting ? $emailSetting->mail_encryption : env('MAIL_ENCRYPTION', 'tls'));
                Config::set('mail.from.address', $emailSetting ? $emailSetting->mail_from_address : env('MAIL_FROM_ADDRESS', 'default_from@example.com'));
                Config::set('mail.from.name', $emailSetting ? $emailSetting->mail_from_name : env('MAIL_FROM_NAME', 'Default Name'));
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
