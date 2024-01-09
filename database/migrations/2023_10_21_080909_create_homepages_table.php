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
        Schema::create('homepages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('button')->nullable();
            $table->string('link')->nullable();
            $table->string('video')->nullable();
            $table->string('image_position')->default('left')->nullable();
            $table->string('action_title')->nullable();
            $table->string('action_subtitle')->nullable();
            $table->string('action_button')->nullable();
            $table->string('action_link')->nullable();
            $table->string('action_image')->nullable();
            $table->string('core_title')->nullable();
            $table->string('core_subtitle')->nullable();
            $table->string('recruitment_title')->nullable();
            $table->string('recruitment_subtitle')->nullable();
            $table->text('mission')->nullable();
            $table->text('vision')->nullable();
            $table->text('value')->nullable();
            $table->string('grievance_title')->nullable();
            $table->text('grievance_description')->nullable();
            $table->string('grievance_button')->nullable();
            $table->string('grievance_link')->nullable();
            $table->string('why_title')->nullable();
            $table->string('why_subtitle')->nullable();
            $table->text('why_description')->nullable();
            $table->string('why_video')->nullable();
            $table->string('why_image')->nullable();
            $table->string('project_completed')->nullable();
            $table->string('happy_clients')->nullable();
            $table->string('visa_approved')->nullable();
            $table->string('success_stories')->nullable();
            $table->additionalColumns();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepages');
    }
};
