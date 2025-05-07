<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('employment_details', function (Blueprint $table) {
            $table->id();
            $table->string('app_id');  // Define as a string instead of foreignId
            $table->foreign('app_id')->references('app_id')->on('users')->onDelete('cascade'); // Foreign key to link to the applicant
            $table->string('employer_name')->nullable();
            $table->string('employer_phone')->nullable();
            $table->string('employer_address')->nullable();
            $table->string('employer_email')->nullable();
            $table->date('employment_from')->nullable();
            $table->date('employment_to')->nullable();
            $table->string('current_position')->nullable();
            $table->text('responsibilities')->nullable();
    
            // Previous full-time employment (optional)
            $table->string('prev_employer_name')->nullable();
            $table->string('prev_employer_phone')->nullable();
            $table->string('prev_employer_address')->nullable();
            $table->string('prev_employer_email')->nullable();
            $table->string('prev_employment_from_month')->nullable();
            $table->string('prev_employment_from_year')->nullable();
            $table->string('prev_employment_to_month')->nullable();
            $table->string('prev_employment_to_year')->nullable();
            $table->string('prev_position')->nullable();
            $table->text('prev_responsibilities')->nullable();
    
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employment_details');
    }
};
