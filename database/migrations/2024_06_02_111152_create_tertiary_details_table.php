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
        Schema::create('tertiary_details', function (Blueprint $table) {
            $table->id();
            $table->string('app_id')->unique();
            // Name of the tertiary institution
            $table->string('institution_name')->nullable();

            // Year and Month Started
            $table->year('start_year')->nullable();
            $table->string('start_month')->nullable(); // Assuming 1-12 for months

            // Year and Month Completed
            $table->year('completion_year')->nullable();
            $table->string('completion_month')->nullable(); // Assuming 1-12 for months

            // Certificate Obtained
            $table->string('certificate_obtained')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tertiary_details');
    }
};
