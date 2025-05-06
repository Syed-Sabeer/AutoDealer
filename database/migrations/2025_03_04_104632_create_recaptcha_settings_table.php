<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recaptcha_settings', function (Blueprint $table) {
            $table->id();
            $table->string('google_recaptcha_key')->nullable();
            $table->string('google_recaptcha_secret')->nullable();
            $table->enum('google_recaptcha_type',['v2','v3','no_captcha'])->default('no_captcha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recaptcha_settings');
    }
};
