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
        Schema::create('references', function (Blueprint $table) {
            $table->id();
            $table->string('app_id');  // Define as a string instead of foreignId
            $table->foreign('app_id')->references('app_id')->on('users')->onDelete('cascade');// Foreign key to link to the applicant
    
            // Reference 1
            $table->string('ref1_name')->nullable();
            $table->string('ref1_organisation')->nullable();
            $table->string('ref1_position')->nullable();
            $table->string('ref1_phone')->nullable();
            $table->string('ref1_email')->nullable();
    
            // Reference 2
            $table->string('ref2_name')->nullable();
            $table->string('ref2_organisation')->nullable();
            $table->string('ref2_position')->nullable();
            $table->string('ref2_phone')->nullable();
            $table->string('ref2_email')->nullable();
    
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('references');
    }
};
