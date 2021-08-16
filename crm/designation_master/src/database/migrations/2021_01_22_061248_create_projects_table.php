<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("project_name");
            $table->string("contract_name");
            $table->date("project_start_date");
            $table->date("project_expected_date");
            $table->string("requirement_category");
            $table->date("project_actual_date");
            $table->mediumText("project_details");
            $table->integer("project_leader")->comment("user_id");
            $table->string("status");
            $table->string("project_key")->nullable();
            $table->mediumText("members")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
