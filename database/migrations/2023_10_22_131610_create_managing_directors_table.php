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
        Schema::create('managing_directors', function (Blueprint $table) {
            $table->id();
            $table->integer('order')->nullable()->default(0);
            $table->string('title')->nullable();
            $table->string('designation')->nullable();
            $table->text('description')->nullable();
            $table->string('button')->nullable();
            $table->string('link')->nullable();
            $table->string('image')->nullable();
            $table->additionalColumns();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('managing_directors');
    }
};
