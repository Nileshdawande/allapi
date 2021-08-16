<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskStatusMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_status_masters', function (Blueprint $table) {
          $table->id();
          $table->string("status",100)->unique()->comment("Todo/Inprogress/Onhold/Done");
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
        Schema::dropIfExists('task_status_masters');
    }
}
