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
        Schema::create('attached_documents', function (Blueprint $table) {
            $table->id();
            $table->string('app_id');
            $table->string('ghanacard_upload_url'); 
            $table->string('birthcert_upload_url'); 
            $table->string('signature'); 
            $table->string('wassce_upload_url'); 
            $table->string('wassce2_upload_url')->nullable(); 
            $table->string('wassce3_upload_url')->nullable(); 
            $table->string('tertiarycert_upload_url')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attached_documents');
    }
};
