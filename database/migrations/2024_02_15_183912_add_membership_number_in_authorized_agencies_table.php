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
        Schema::table('authorized_agencies', function (Blueprint $table) {
            $table->text('membership_number')->nullable()->after('fax');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('authorized_agencies', function (Blueprint $table) {
            $table->text('membership_number');
        });
    }
};
