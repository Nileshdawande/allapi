<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_masters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("user_id")->nullable();
            $table->integer("employee_code")->unique();
            $table->integer("candidate_id");
            $table->string("employee_firstname");
            $table->string("employee_middlename");
            $table->string("employee_lastname");
            $table->mediumText("address_one");
            $table->mediumText("address_two")->nullable();
            $table->mediumText("address_three")->nullable();
            $table->string("city");
            $table->string("state");
            $table->string("country");
            $table->integer("pincode");
            $table->date("dob");
            $table->string("qual_one");
            $table->string("qual_one_details");
            $table->string("qual_two");
            $table->string("qual_two_details");
            $table->bigInteger("contact_one");
            $table->bigInteger("contact_two")->nullable();
            $table->date("employee_doj");
            $table->integer("department_id");
            $table->integer("employee_type_id");
            $table->date("date_of_leaving");
            $table->string("status");
            $table->integer("offer_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_masters');
    }
}
