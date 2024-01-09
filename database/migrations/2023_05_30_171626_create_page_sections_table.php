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
        Schema::create('page_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained()->cascadeOnUpdate();
            $table->string('title');
            $table->string('slug');
            $table->integer('position')->nullable();
            $table->string('list_number_1')->nullable();
            $table->string('list_number_2')->nullable();
            $table->string('list_number_3')->nullable();
            $table->additionalColumns();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_sections');
    }
};
