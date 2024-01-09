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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('package_ribbon_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->foreignId('package_category_id')->constrained()->cascadeOnUpdate();
            $table->string('title');
            $table->string('key');
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->string('duration')->nullable();
            $table->text('map')->nullable();
            $table->string('cover')->nullable();
            $table->longText('description')->nullable();
            $table->longText('itinerary')->nullable();
            $table->additionalColumns();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
