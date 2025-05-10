<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMatureApplicantToProgramdetailsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('program_details', function (Blueprint $table) {
            $table->string('mature_applicant')->nullable()->after('streams');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('program_details', function (Blueprint $table) {
            $table->dropColumn('mature_applicant');
        });
    }
}
