<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_masters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("candidate_firstname");
            $table->string("candidate_middlename");
            $table->string("candidate_lastname");
            $table->string("candidate_first_address");
            $table->string("candidate_second_address")->nullable();
            $table->string("candidate_third_address")->nullable();
            $table->bigInteger("pincode");
            $table->string("city");
            $table->string("state");
            $table->string("country");
            $table->date("candidate_dob");
            $table->string("candidate_qual_one");
            $table->string("qual_one_details");
            $table->string("candidate_qual_two");
            $table->string("qual_two_details");
            $table->bigInteger("primary_contact");
            $table->bigInteger("secondary_contact");
            $table->string("job_type");
            $table->date("candidate_reg_date");
            $table->integer("last_salary")->nullable();
            $table->string("candidate_email");
            $table->string("candidate_linkedin_profile")->nullable();
            $table->integer("technology_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_masters');
    }
}
