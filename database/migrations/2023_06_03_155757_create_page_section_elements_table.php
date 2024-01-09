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
        Schema::create('page_section_elements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_section_id')->constrained()->cascadeOnUpdate();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->string('list_title')->nullable();
            $table->string('list_subtitle')->nullable();
            $table->string('list_image')->nullable();
            $table->longText('list_description')->nullable();
            $table->longText('list_summary')->nullable();
            $table->string('button')->nullable();
            $table->string('button_link')->nullable();
            $table->additionalColumns();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_section_elements');
    }
};
