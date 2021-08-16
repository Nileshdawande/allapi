<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitmentRequestCandidates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment_request_candidates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("recruitment_request_id");
            $table->integer("candidate_id");
            $table->date("date_of_reg");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruitment_request_candidates');
    }
}
