<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{public function up()
    {
        // Personal Details
        Schema::table('personal_details', function (Blueprint $table) {
            $table->foreign('app_id')->references('app_id')->on('users')->onDelete('cascade');
        });
    
        // Contact Details
        Schema::table('contact_details', function (Blueprint $table) {
            $table->foreign('app_id')->references('app_id')->on('users')->onDelete('cascade');
        });
    
        // Family Details
        Schema::table('family_details', function (Blueprint $table) {
            $table->foreign('app_id')->references('app_id')->on('users')->onDelete('cascade');
        });
    
        // Academic Details
        Schema::table('academic_details', function (Blueprint $table) {
            $table->foreign('app_id')->references('app_id')->on('users')->onDelete('cascade');
        });
    
        // Program Details
        Schema::table('program_details', function (Blueprint $table) {
            $table->foreign('app_id')->references('app_id')->on('users')->onDelete('cascade');
        });
    
        // Tertiary Details
        Schema::table('tertiary_details', function (Blueprint $table) {
            $table->foreign('app_id')->references('app_id')->on('users')->onDelete('cascade');
        });
    
        // Attached Documents
        Schema::table('attached_documents', function (Blueprint $table) {
            $table->foreign('app_id')->references('app_id')->on('users')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('personal_details', function (Blueprint $table) {
            $table->dropForeign(['app_id']);
        });
    
        Schema::table('contact_details', function (Blueprint $table) {
            $table->dropForeign(['app_id']);
        });
    
        Schema::table('family_details', function (Blueprint $table) {
            $table->dropForeign(['app_id']);
        });
    
        Schema::table('academic_details', function (Blueprint $table) {
            $table->dropForeign(['app_id']);
        });
    
        Schema::table('program_details', function (Blueprint $table) {
            $table->dropForeign(['app_id']);
        });
    
        Schema::table('tertiary_details', function (Blueprint $table) {
            $table->dropForeign(['app_id']);
        });
    
        Schema::table('attached_documents', function (Blueprint $table) {
            $table->dropForeign(['app_id']);
        });
    }
    
};
