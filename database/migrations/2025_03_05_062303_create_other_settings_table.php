<?php

use App\Models\Language;
use App\Models\Timezone;
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
        Schema::create('other_settings', function (Blueprint $table) {
            $table->id();
            $table->string('max_upload_size')->nullable();
            $table->string('currency_symbol')->nullable();
            $table->enum('currency_symbol_position',['prefix', 'postfix'])->default('prefix');
            $table->foreignIdFor(Language::class)->nullable()
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(Timezone::class)->nullable()
                ->constrained()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other_settings');
    }
};
