<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("interview_details_id");
            $table->integer("candidate_id")->unique();
            $table->date("offer_date");
            $table->double("gross_salary_offered",8,2);
            $table->string("offer_accepted");
            $table->integer("liasing_employee_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offer_details');
    }
}
