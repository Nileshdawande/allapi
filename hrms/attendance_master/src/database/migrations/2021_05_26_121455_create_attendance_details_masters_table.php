<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceDetailsMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_details_masters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("employee_id");
            $table->integer("office_id");
            $table->date("work_date");
            $table->string("working");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_details_masters');
    }
}
