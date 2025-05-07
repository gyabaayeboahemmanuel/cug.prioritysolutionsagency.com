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
        Schema::create('personal_details', function (Blueprint $table) {
            // Primary Key
            $table->id();
            $table->string('app_id')->unique();
            $table->string('avatar')->nullable(); // Default is No

            // Personal Details
            $table->string('title')->nullable(true);
            $table->string('surname')->nullable(true);
            $table->string('first_name')->nullable(true);
            $table->string('middle_name')->nullable(true); // Optional
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable(true);

            // Date of Birth
            $table->date('date_of_birth')->nullable(true);

            // Place of Birth
            $table->string('place_of_birth')->nullable(true);

            // Region of Birth
            $table->string('region_of_birth')->nullable(true);

            // Home Town
            $table->string('hometown')->nullable(true);

            // Region of Home Town
            $table->string('region_of_hometown')->nullable(true);

            // Country
            $table->string('country')->nullable(true);

            // Marital Status
            $table->enum('marital_status', ['Single', 'Married', 'Divorced', 'Widowed'])->nullable(true);

            // Number of Children
            $table->integer('number_of_children')->nullable(true); // Optional

            // Religion
            $table->string('religion')->nullable(true);

            // Church/Mosque/Shrine
            $table->string('worship_place')->nullable(true); // Optional

            // Employment Status
            $table->string('is_employed')->nullable(true); // Default is No

            // If Employed
            $table->string('occupation')->nullable(true); // Optional
            $table->string('facility')->nullable(true); // Optional

            // Intend Finance Education
            $table->string('intend_finance_education')->nullable(); // Default is No

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_details');
    }
};
