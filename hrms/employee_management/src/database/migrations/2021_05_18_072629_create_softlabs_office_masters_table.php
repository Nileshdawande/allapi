<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoftlabsOfficeMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('softlabs_office_masters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("office_code",100)->unique();
            $table->string("office_name");
            $table->string("office_address_one");
            $table->string("office_address_two")->nullable();
            $table->string("office_address_three")->nullable();
            $table->string("office_city");
            $table->string("office_state");
            $table->string("office_country");
            $table->integer("office_pincode");
            $table->date("office_start_date");
            $table->string("office_area");
            $table->bigInteger("office_contact_one");
            $table->bigInteger("office_contact_two")->nullable();
            $table->string("office_contact_person");
            $table->bigInteger("office_con_per_phoneno");
            $table->string("office_status");
            $table->date("office_end_date");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('softlabs_office_masters');
    }
}
