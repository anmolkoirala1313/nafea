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
        Schema::create('homepage_recruitments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('homepage_id')->constrained()->cascadeOnUpdate();
            $table->string('title')->nullable();
            $table->string('icon')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('created_by')->references('id')->on('users')->cascadeOnUpdate();
            $table->foreignId('updated_by')->nullable()->references('id')->on('users')->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_recruitments');
    }
};
