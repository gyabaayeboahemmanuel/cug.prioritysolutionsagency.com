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
            Schema::table('tertiary_details', function (Blueprint $table) {
                $table->string('institution_name2')->nullable();
                $table->string('start_year2')->nullable();
                $table->string('start_month2')->nullable();
                $table->string('completion_year2')->nullable();
                $table->string('completion_month2')->nullable();
                $table->string('certificate_obtained2')->nullable();
                $table->string('institution_name3')->nullable();
                $table->string('start_year3')->nullable();
                $table->string('start_month3')->nullable();
                $table->string('completion_year3')->nullable();
                $table->string('completion_month3')->nullable();
                $table->string('certificate_obtained3')->nullable();
            });
        }
        
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tertiary_details', function (Blueprint $table) {
            //
        });
    }
};
