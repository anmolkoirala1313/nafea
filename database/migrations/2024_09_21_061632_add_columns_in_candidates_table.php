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
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->text('email')->nullable()->after(	'last_name');
            $table->text('fullname')->nullable()->after(	'last_name');
            $table->text('grievance')->nullable()->after(	'case_file_type');
            $table->foreignId('authorized_agency_id')->after('Id')->nullable()->constrained()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->foreignId('user_id')->after('Id')->nullable()->constrained()->cascadeOnUpdate();
            $table->dropForeign(['authorized_agency_id']);
            $table->dropColumn('authorized_agency_id');
            $table->dropColumn('fullname');
            $table->dropColumn('email');
            $table->dropColumn('grievance');
        });
    }
};
