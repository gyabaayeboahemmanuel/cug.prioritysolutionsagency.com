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
        Schema::create('academic_details', function (Blueprint $table) {
            $table->id();
            $table->string('app_id')->unique();
           // Name of SHS
           $table->string('name_of_shs')->nullable();

           // Course offered
           $table->string('course_offered')->nullable();

           // Year, Month Started
           $table->date('start_date')->nullable(); // Assuming start date format is YYYY-MM-DD

           // Year, Month Completed
           $table->date('completion_date')->nullable(); // Assuming completion date format is YYYY-MM-DD

           // Exams Type
           $table->string('exams_type')->nullable();

           // Index Number
           $table->string('index_number')->nullable(); // Assuming index number should be unique

           // Exams Year
           $table->year('exams_year')->nullable(); // Assuming exams year is stored as a 4-digit year

           // Timestamps
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_details');
    }
};
