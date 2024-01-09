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
        Schema::create('company_careers', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('required_number')->nullable();
            $table->string('salary')->nullable();
            $table->string('min_qualification')->nullable();
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->text('formlink')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_tags')->nullable();
            $table->text('meta_description')->nullable();
            $table->additionalColumns();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_careers');
    }
};
