<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateInterviewResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_interview_results', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("can_int_sch_id");
            $table->integer("parameter_id");
            $table->integer("parameter_points");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_interview_results');
    }
}
