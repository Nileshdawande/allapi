<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateInterviewSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_interview_schedules', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("interview_details_id");
            $table->integer("interview_type_id");
            $table->integer("employee_interviewer_id")->null();
            $table->date("interview_schedule_date");
            $table->time("interview_schedule_time");
            $table->date("interview_actual_date");
            $table->time("interview_actual_time");
            $table->integer("interview_points");
            $table->mediumText("remarks");
            $table->string("interview_result");
            $table->mediumText("attachments");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_interview_schedules');
    }
}
