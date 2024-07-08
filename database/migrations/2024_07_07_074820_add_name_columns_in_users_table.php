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
        Schema::table('users', function (Blueprint $table) {
            $table->text('last_name')->nullable()->after('name');
            $table->text('middle_name')->nullable()->after('name');
            $table->text('first_name')->nullable()->after('name');
            $table->boolean('is_candidate')->default(0)->after('user_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('last_name');
            $table->dropColumn('middle_name');
            $table->dropColumn('first_name');
            $table->dropColumn('is_candidate');
        });
    }
};
