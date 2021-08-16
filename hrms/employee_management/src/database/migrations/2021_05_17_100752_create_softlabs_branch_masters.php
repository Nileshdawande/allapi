<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoftlabsBranchMasters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('softlabs_branch_masters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("branch_code",100)->unique();
            $table->string("branch_name");
            $table->mediumText("address_one");
            $table->mediumText("address_two")->nullable();
            $table->mediumText("address_three")->nullable();
            $table->bigInteger("branch_pincode");
            $table->string("branch_city");
            $table->string("branch_state");
            $table->string("branch_country");
            $table->date("branch_start_date");
            $table->date("date_of_decommissioning");
            $table->string("branch_status");
            $table->string("branch_head_office");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('softlabs_branch_masters');
    }
}
