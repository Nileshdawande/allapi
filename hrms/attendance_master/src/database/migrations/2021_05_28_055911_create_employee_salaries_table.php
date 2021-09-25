<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_salaries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("employee_id");
            $table->string("month_of_year");
            $table->date("date_of_salary_processing");
            $table->integer("no_of_expected_wroking_days");
            $table->integer("no_of_days_worked");
            $table->double("salary_deduction_amount",8,2);
            $table->string("salary_deduction_type");
            $table->double("net_amount",8,2);
            $table->string("salary_transferred");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_salaries');
    }
}
