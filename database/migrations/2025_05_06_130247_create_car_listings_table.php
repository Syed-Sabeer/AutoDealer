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
        Schema::create('car_listings', function (Blueprint $table) {
            $table->id();
            // Foreign Keys
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('car_brand_id')->constrained('car_brands')->onDelete('cascade');
            $table->foreignId('car_model_id')->constrained('car_models')->onDelete('cascade');
            $table->foreignId('car_fuel_type_id')->constrained('car_fuel_types')->onDelete('cascade');
            $table->foreignId('car_body_type_id')->constrained('car_body_types')->onDelete('cascade');
            
            // Core Listing Information
            $table->string('title');
            $table->string('car_id')->unique();
            $table->enum('condition', ['new', 'used', 'certified'])->default('new');
            $table->integer('year');
            $table->decimal('price', 12, 2);
            $table->enum('drive_type', ['2WD', '4WD', 'AWD', 'RWD'])->default('2WD');
            $table->enum('transmission', ['automatic', 'manual', 'semi-automatic', 'cvt'])->default('automatic');
            $table->string('mileage')->nullable();
            $table->string('horsepower')->nullable();
            $table->decimal('fuel_efficiency', 5, 2)->nullable(); // e.g. 10.50

            $table->string('engine_capacity')->nullable();
            $table->string('cylenders')->nullable();
            $table->string('color')->nullable();
            $table->string('vin')->nullable();
            $table->integer('seats')->unsigned()->nullable();
            $table->integer('doors')->unsigned()->nullable();
            
            $table->string('main_image')->nullable();

            $table->string('address')->nullable();
            $table->string('city');
            $table->string('state')->nullable();
            $table->string('zip_code');

            $table->text('description')->nullable();
            $table->json('features')->nullable();

            $table->string('contact_name');
            $table->string('contact_phone');
            $table->string('contact_email')->nullable();

            $table->enum('is_featured', ['0', '1'])->default('0');
            $table->enum('status', ['draft', 'published', 'sold', 'archived','expired'])->default('draft');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_listings');
    }
};
