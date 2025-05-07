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
        Schema::table('personal_details', function (Blueprint $table) {
            $table->string('academic_year')->nullable();
            $table->enum('form_type', ['undergraduate', 'postgraduate'])->default('undergraduate');
            $table->boolean('is_printed')->default(false);
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personal_details', function (Blueprint $table) {
            //
        });
    }
};
