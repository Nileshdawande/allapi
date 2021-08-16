<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("firstname")->nullable();
            $table->string("lastname")->nullable();
            $table->integer("designation_id")->nullable();
            $table->integer("department_id")->nullable();
            $table->string("address_one")->nullable();
            $table->string("address_two")->nullable();
            $table->string("state")->nullable();
            $table->string("city")->nullable();
            $table->string("country")->nullable();
            $table->integer("pincode")->nullable();
            $table->string("email")->nullable();
            $table->string("website")->nullable();
            $table->bigInteger("contact_one")->nullable();
            $table->bigInteger("contact_two")->nullable();
            $table->date("registration_date")->nullable();
            $table->string("contact_type")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
