<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitmentRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment_requests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("recruitment_type_id");
            $table->string("recruitment_name");
            $table->date("recruitment_req_date");
            $table->date("recruitment_end_date");
            $table->integer("technology_id");
            $table->integer("client_id");
            $table->integer("no_of_candidate");
            $table->float("min_exp",8,2);
            $table->float("max_exp",8,2);
            $table->float("salary_from",8,2);
            $table->float("salary_to",8,2);
            $table->mediumText("description");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruitment_requests');
    }
}
