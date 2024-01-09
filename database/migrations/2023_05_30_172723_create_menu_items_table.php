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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained()->cascadeOnUpdate();
            $table->string('title');
            $table->string('name')->nullable();
            $table->string('slug');
            $table->string('type')->nullable();
            $table->string('target')->nullable();
            $table->integer('page_id')->nullable();
            $table->integer('blog_id')->nullable();
            $table->integer('package_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->additionalColumns();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
