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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_category_id')->constrained()->cascadeOnUpdate();
            $table->string('title');
            $table->string('key');
            $table->string('slug')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('blogs');
    }
};
