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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('passport_number');
            $table->date('passport_issue_date');
            $table->date('passport_expiry_date');
            $table->string('issue_place');
            $table->string('state');
            $table->string('district');
            $table->string('address');
            $table->string('number');
            $table->string('father_name');
            $table->string('mother_name');
            $table->boolean('martial_status');
            $table->string('wife_name');
            $table->text('children_name');
            $table->string('applied_country');
            $table->string('applied_for');
            $table->string('photo');
            $table->string('passport_photo');
            $table->string('case_id');
            $table->string('case_file');
            $table->string('case_file_type');
            $table->additionalColumns();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
