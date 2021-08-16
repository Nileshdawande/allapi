<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
          $table->id();
          $table->timestamps();
          $table->integer("created_by")->nullable()->comment("user_id");
          $table->integer("updated_by")->nullable()->comment("user_id");
          $table->string("firstname");
          $table->string("middlename");
          $table->string("lastname");
          $table->string("email",100)->unique();
          $table->string("password",100);
          $table->boolean("status")->default(false);
          $table->mediumText("access")->nullable();
          $table->string("role")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
