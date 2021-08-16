<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date("lead_received_date");
            $table->integer("lead_source_id");
            $table->integer("lead_cat_id");
            $table->string("lead_weight");
            $table->string("domestic")->nullable();
            $table->string("offshore")->nullable();
            $table->mediumText("lead_details")->nullable();
            $table->integer("company_id")->nullable();
            $table->integer("contact_id")->nullable();
            $table->double('budget', 15, 2)->nullable();
            $table->string("currency");
            $table->integer("interaction_id")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
