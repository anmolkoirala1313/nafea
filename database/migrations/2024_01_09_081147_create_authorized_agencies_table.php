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
        Schema::create('authorized_agencies', function (Blueprint $table) {
            $table->id();
            $table->string('order')->default(0);
            $table->string('permission_number');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email')->nullable();
            $table->string('fax')->nullable();
            $table->string('image')->nullable();
            $table->additionalColumns();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authorized_agencies');
    }
};
