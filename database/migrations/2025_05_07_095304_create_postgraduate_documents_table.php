<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostgraduateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postgraduate_documents', function (Blueprint $table) {
            $table->id();
            $table->string('app_id');  // Define as a string instead of foreignId
            $table->foreign('app_id')->references('app_id')->on('users')->onDelete('cascade');
            $table->string('document_type'); // e.g., sop, cv, attestation, transcript
            $table->string('upload_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postgraduate_documents');
    }
}
