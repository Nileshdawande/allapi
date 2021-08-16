<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->integer("parent_task_id")->nullable();
            $table->integer("project_id");
            $table->integer("type_id");
            $table->integer("status_id");
            $table->string("summary");
            $table->mediumText("description")->nullable();
            $table->integer("assignee")->comment("user_id");
            $table->date("start_date")->nullable()->default(null);
            $table->date("end_date")->nullable()->default(null);
            $table->string("priority");
            $table->timestamps();
            $table->integer("created_by")->nullable()->comment("user_id");
            $table->integer("updated_by")->nullable()->comment("user_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
