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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('logo');
            $table->string('logo_white')->nullable();
            $table->string('favicon')->nullable();
            $table->string('theme_mode')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('viber')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('ticktock')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_tags')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('google_analytics')->nullable();
            $table->text('google_map')->nullable();
            $table->text('meta_pixel')->nullable();
            $table->additionalColumns();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
