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
        Schema::create('page_section_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_section_id')->constrained()->cascadeOnUpdate();
            $table->text('filename');
            $table->text('resized_name');
            $table->text('original_name');
            $table->foreignId('upload_by')->constrained('users')->cascadeOnUpdate();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_section_galleries');
    }
};
