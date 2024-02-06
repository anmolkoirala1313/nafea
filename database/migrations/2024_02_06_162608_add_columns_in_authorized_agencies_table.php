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
            $table->text('promoter_email')->nullable()->after('fax');
            $table->text('promoter_phone')->nullable()->after('fax');
            $table->text('promoter_name')->nullable()->after('fax');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('authorized_agencies', function (Blueprint $table) {
            $table->text('promoter_email');
            $table->text('promoter_phone');
            $table->text('promoter_name');
        });
    }
};
