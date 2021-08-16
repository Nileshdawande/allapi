<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyAnnualLeavesMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_annual_leaves_masters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("year");
            $table->integer("branch_id")->unique();
            $table->date("annual_leave_date");
            $table->integer("leave_on_account_of");
            $table->integer("leave_cancelled");
            $table->mediumText("reason_for_cancellation");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_annual_leaves_masters');
    }
}
