<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewschedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviewschedules', function (Blueprint $table) {
          $table->id();
          $table->timestamps();
          $table->integer("interview_schedule_number")->unique();
          $table->integer("recruitment_req_id");
          $table->date("interview_schedule_date");
          $table->mediumText("interview_schedule_venue");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interviewschedules');
    }
}
