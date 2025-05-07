<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlyersTable extends Migration
{
    public function up()
    {
        Schema::create('flyers', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('slug', 255)->nullable()->unique(); // optional
            $table->text('image_path');
            $table->string('faculty', 255);
            $table->string('programme', 255)->nullable(); // optional
            $table->string('mode', 50);
            $table->text('description')->nullable();
            $table->boolean('is_featured')->default(false); // optional
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('flyers');
    }
}
