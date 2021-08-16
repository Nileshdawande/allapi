<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followups', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date("interaction_date");
            $table->integer("lead_id");
            $table->string("interaction_name");
            $table->string("lead_weight");
            $table->string("lead_status");
            $table->date("next_followup_date");
            $table->integer("followup_id")->nullable();
            $table->mediumText("remarks")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('followups');
    }
}
