<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_masters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("company_name");
            $table->integer("company_type_id")->nullable();
            $table->string("system_type")->nullable();
            $table->string("address_first");
            $table->string("address_second");
            $table->string("city");
            $table->string("state");
            $table->string("country");
            $table->integer("pincode");
            $table->bigInteger("contact_one");
            $table->bigInteger("contact_two");
            $table->string("email");
            $table->string("website");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_masters');
    }
}
