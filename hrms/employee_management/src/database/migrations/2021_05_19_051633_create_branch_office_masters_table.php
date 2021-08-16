<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchOfficeMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_office_masters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("branch_id")->unique();
            $table->integer("office_id")->unique();
            $table->string("status");
            $table->date("date_of_activation");
            $table->date("date_of_deactivation");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branch_office_masters');
    }
}
