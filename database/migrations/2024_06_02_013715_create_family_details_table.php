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
        Schema::create('family_details', function (Blueprint $table) {
            $table->id();
            $table->string('app_id')->unique();
            // New fields for Father's Details
            $table->string('father_full_name')->nullable(true);
            $table->enum('father_status', ['Alive', 'Dead'])->default('Alive');
            $table->string('father_address')->nullable(true);
            $table->string('father_contact')->nullable(true);
            $table->string('father_occupation')->nullable(true);

            // New fields for Mother's Details
            $table->string('mother_full_name')->nullable(true);
            $table->enum('mother_status', ['Alive', 'Dead'])->default('Alive');
            $table->string('mother_address')->nullable(true);
            $table->string('mother_contact')->nullable(true);
            $table->string('mother_occupation')->nullable(true);

            // New fields for Guardian's Details
            $table->string('guardian_name')->nullable();
            $table->string('relation_to_applicant')->nullable();
            $table->string('guardian_address')->nullable();
            $table->string('guardian_occupation')->nullable();
            $table->string('guardian_phone_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_details');
    }
};
