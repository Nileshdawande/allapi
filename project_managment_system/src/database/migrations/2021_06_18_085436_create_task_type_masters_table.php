<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTypeMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_type_masters', function (Blueprint $table) {
            $table->id();
            $table->string("type",100)->unique()->comment("Epic/Story/Task/Bug");
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
        Schema::dropIfExists('task_type_masters');
    }
}
