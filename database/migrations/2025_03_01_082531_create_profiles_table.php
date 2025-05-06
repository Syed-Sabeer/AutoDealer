<?php

use App\Models\Country;
use App\Models\Designation;
use App\Models\Gender;
use App\Models\Language;
use App\Models\MaritalStatus;
use App\Models\User;
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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('profile_image')->nullable();
            $table->timestamp('dob')->nullable();
            $table->foreignIdFor(Gender::class)->nullable()
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(MaritalStatus::class)->nullable()
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(Language::class)->nullable()
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(Designation::class)->nullable()
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(Country::class)->nullable()
                ->constrained()
                ->cascadeOnDelete();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('street')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('bio')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('skype_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('github_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
