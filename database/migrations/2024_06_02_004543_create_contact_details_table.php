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
        Schema::create('contact_details', function (Blueprint $table) {
            $table->id();
            $table->string('app_id')->unique();
            $table->string('phone_number')->nullable(); // for Sms and calls
            $table->string('online_number')->nullable(); // For Whatsapp and Telegram or GekyChat
            $table->string('email_address')->unique()->nullable(); // Unique ensures no duplicate email addresses
            $table->text('postal_address')->nullable(); // For longer text like postal address
            $table->string('city_of_post_office_box')->nullable(); // Assuming this is a string, adjust as needed
            $table->text('residential_address')->nullable(); // For GPS or house number, assuming it might be long
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_details');
    }
};
