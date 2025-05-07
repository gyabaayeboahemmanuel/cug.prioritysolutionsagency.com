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
        Schema::table('academic_details', function (Blueprint $table) {
            // Second academic details
            $table->string('name_of_shs2')->nullable()->after('name_of_shs');
            $table->string('course_offered2')->nullable()->after('course_offered');
            $table->date('start_date2')->nullable()->after('start_date');
            $table->date('completion_date2')->nullable()->after('completion_date');
            $table->string('exams_type2')->nullable()->after('exams_type');
            $table->string('index_number2')->nullable()->after('index_number');
            $table->year('exams_year2')->nullable()->after('exams_year');

            // Third academic details
            $table->string('name_of_shs3')->nullable()->after('name_of_shs2');
            $table->string('course_offered3')->nullable()->after('course_offered2');
            $table->date('start_date3')->nullable()->after('start_date2');
            $table->date('completion_date3')->nullable()->after('completion_date2');
            $table->string('exams_type3')->nullable()->after('exams_type2');
            $table->string('index_number3')->nullable()->after('index_number2');
            $table->year('exams_year3')->nullable()->after('exams_year2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('academic_details', function (Blueprint $table) {
            $table->dropColumn([
                'name_of_shs2', 'course_offered2', 'start_date2', 'completion_date2', 'exams_type2', 'index_number2', 'exams_year2',
                'name_of_shs3', 'course_offered3', 'start_date3', 'completion_date3', 'exams_type3', 'index_number3', 'exams_year3'
            ]);
        });
    }
};
