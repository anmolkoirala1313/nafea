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
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('initial_password')->nullable();
            $table->string('passport_number')->nullable();
            $table->date('passport_issue_date')->nullable();
            $table->date('passport_expiry_date')->nullable();
            $table->string('issue_place')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('address')->nullable();
            $table->string('contact')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->boolean('martial_status')->nullable();
            $table->string('wife_name')->nullable();
            $table->text('children_name')->nullable();
            $table->string('applied_country')->nullable();
            $table->string('applied_for')->nullable();
            $table->string('photo')->nullable();
            $table->string('passport_photo')->nullable();
            $table->string('case_id')->nullable();
            $table->string('case_file')->nullable();
            $table->string('case_file_type')->nullable();
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
