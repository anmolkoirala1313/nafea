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
        Schema::table('sliders', function (Blueprint $table) {
            $table->string('button')->nullable()->after('id');
            $table->string('link')->nullable()->after('id');
            $table->string('subtitle')->nullable()->after('id');
            $table->string('title')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->dropColumn('button');
            $table->dropColumn('link');
            $table->dropColumn('title');
            $table->dropColumn('subtitle');
        });
    }
};
