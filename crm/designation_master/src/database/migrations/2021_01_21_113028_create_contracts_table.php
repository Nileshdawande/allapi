<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("contract_number",100)->unique();
            $table->string("company");
            $table->integer("lead_id");
            $table->string("requirement_category");
            $table->string("sales_employee");
            $table->string("contract_type");
            $table->mediumText("contract_short_des");
            $table->mediumText("contract_detailed");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
