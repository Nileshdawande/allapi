<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeAllocationHeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_allocation_heads', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("employee_id")->unique();
            $table->date("date_of_allocation");
            $table->integer("designation_id");
            $table->integer("department_id");
            $table->integer("branch_id");
            $table->double("gross_salary",10,2);
            $table->float("deduction",8,2);
            $table->double("net_salary",10,2);
            $table->string("allocation_type");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_allocation_heads');
    }
}
