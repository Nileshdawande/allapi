<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("interview_details_number")->unique();
            $table->integer("interview_schedule_id");
            $table->date("interview_date");
            $table->integer("candidate_id");
            $table->string("interview_remarks");
            $table->integer("interview_points");
            $table->string("interview_passed");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interview_details');
    }
}
