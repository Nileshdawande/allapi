<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeAnnualLeavesMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_annual_leaves_masters', function (Blueprint $table) {
          $table->id();
          $table->timestamps();
          $table->string("year");
          $table->integer("branch_id")->unique();
          $table->integer("leave_type_id");
          $table->integer("no_of_leaves");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_annual_leaves_masters');
    }
}
